var FieldBlockBuilder = {
    parts: {
        'table': {
            // ComponentBlocks customized （第4引数追加）
            initEditField: function ($content, item_data, value, contentEditableValue) {
                let width_map = {
                    'wider': 506.625,
                    'wide': 337.75,
                    'normal': 225.0,
                    'narrow': 150.0,
                    'narrower': 100.0,
                };

                let max_col_count = item_data.max_columns ? item_data.max_columns : 20;
                let data_row_start_index = item_data.col_header_row_count ? item_data.col_header_row_count : 0;
                let data_col_start_index = item_data.row_header_col_count ? item_data.row_header_col_count : 0;
                let use_table_caption = item_data.use_table_caption ? item_data.use_table_caption : false;

                let $table = $content.find('table.editor-table:first');

                let $col_tmpl = $table.find('colgroup.body col:eq(0)').remove();
                let $col_head_tmpl = $table.find('thead th.header-col-cell:eq(0)').remove();
                let $row_tmpl = $table.find('tbody tr').remove();
                let $cell_tmpl = $row_tmpl.find('td').remove();

                let get_col_count = function () {
                    return $table.find('thead th.header-col-cell').length;
                };

                let get_row_count = function () {
                    return $table.find('tbody tr').length;
                };

                let get_select_range = function (row_index, col_index, row_end_index, col_end_index) {
                    for (let i = row_index; i <= row_end_index; i++) {
                        for (let j = col_index; j <= col_end_index; j++) {
                            let span_origin = get_span_origin(i, j);
                            if (span_origin) {
                                if (span_origin.row_index < row_index) {
                                    row_index = span_origin.row_index;
                                    i = span_origin.row_index;
                                    j = col_index - 1;
                                }
                                if (span_origin.row_end_index > row_end_index) row_end_index = span_origin.row_end_index;
                                if (span_origin.col_index < col_index) {
                                    col_index = span_origin.col_index;
                                    i = row_index;
                                    j = span_origin.col_index;
                                }
                                if (span_origin.col_end_index > col_end_index) col_end_index = span_origin.col_end_index;
                            }
                        }
                    }
                    return {
                        row_index: row_index,
                        col_index: col_index,
                        row_end_index: row_end_index,
                        col_end_index: col_end_index,
                    };
                };

                let get_span_origin = function (row_index, col_index) {
                    let $cur_tr = $table.find('tbody tr').eq(row_index);
                    let $cur_cell = $cur_tr.find('td').eq(col_index);

                    let cur_colspan = parseInt($cur_cell.attr('colspan'));
                    let cur_rowspan = parseInt($cur_cell.attr('rowspan'));

                    let $span_origin_cell;
                    if (cur_rowspan > 1 || cur_colspan > 1) {
                        $span_origin_cell = $cur_cell;
                    } else if (!$cur_cell.is(':visible')) {
                        SEARCH: {
                            for (let i = row_index; i >= 0; i--) {
                                $cur_tr = $table.find('tbody tr').eq(i);
                                for (let j = col_index; j >= 0; j--) {
                                    let $cell = $cur_tr.find('td').eq(j);

                                    let colspan = parseInt($cell.attr('colspan'));
                                    let rowspan = parseInt($cell.attr('rowspan'));
                                    if (colspan || rowspan) {
                                        let col_end_index = j + (colspan ? colspan : 1);
                                        let row_end_index = i + (rowspan ? rowspan : 1);
                                        if (j <= col_index && col_index <= col_end_index && i <= row_index && row_index <= row_end_index) {
                                            $span_origin_cell = $cell;
                                            break SEARCH;
                                        }
                                    }
                                }
                            }
                        }
                    }

                    if ($span_origin_cell) {
                        let colspan = parseInt($span_origin_cell.attr('colspan'));
                        let rowspan = parseInt($span_origin_cell.attr('rowspan'));
                        let col_index = $span_origin_cell[0].cellIndex - 1;
                        let row_index = $cur_tr[0].rowIndex - 1;
                        return {
                            $cell: $span_origin_cell,
                            colspan: colspan,
                            rowspan: rowspan,
                            col_index: col_index,
                            row_index: row_index,
                            col_end_index: col_index + (isNaN(colspan) ? 0 : colspan - 1),
                            row_end_index: row_index + (isNaN(rowspan) ? 0 : rowspan - 1)
                        };
                    } else {
                        return null;
                    }
                };

                let update_col_width = function () {
                    let $cols = $table.find('colgroup.body col');
                    let total_width_value = 0;
                    let width_values = [];

                    for (let i = 0; i < $cols.length; i++) {
                        let width_label = $cols.eq(i).attr('data-width-label');
                        let width_value = width_map[width_label] ? width_map[width_label] : width_map['normal'];
                        width_values.push(width_value);
                        total_width_value += width_value
                    }

                    for (let i = 0; i < $cols.length; i++) {
                        $cols.eq(i).css('width', (width_values[i] / total_width_value) * 100 + '%');
                    }
                }

                const set_row_header = function (row_index, $tr) {
                    const $aboveTds = $table.find(`tr:nth-child(${row_index + 1}) td`);
                    const headerData = Array.prototype.map.call($aboveTds, (td) => td.dataset.isRowHeader);
                    let counter = 0;
                    headerData.forEach((isHeader) => {
                        counter += 1;
                        if (isHeader) {
                            const $target = $tr.find(`td:nth-of-type(${counter})`);
                            $target[0].dataset.isRowHeader = 1;
                        }
                    });
                }

                let create_row = function (isAddButton = false) {
                    let col_count = get_col_count();
                    let $tr = $row_tmpl.clone();
                    for (let i = 0; i < col_count; i++) {
                        $tr.append($cell_tmpl.clone());
                    }
                    $table.find('tbody').append($tr);

                    // ComponentBlocks customized start
                    if (isAddButton) {
                        const rowIndex = $tr.index();
                        set_row_header(rowIndex - 1, $tr);
                    }
                    // ComponentBlocks customized end

                    return $tr;
                };

                let create_col = function (isAddButton = false) {
                    $table.find('thead tr').append($col_head_tmpl.clone());

                    $table.find('colgroup.body').append($col_tmpl.clone());

                    $table.find('tbody tr').each(function () {
                        let $tr = jQuery(this);
                        $tr.append($cell_tmpl.clone());

                        // ComponentBlocks customized start
                        if (isAddButton && $tr.find('td:nth-of-type(1)')[0].dataset.isColHeader) {
                            $tr.find('td:last-child')[0].dataset.isColHeader = 1;
                        }
                        // ComponentBlocks customized end
                    });
                };

                let insert_col_right = function (col_index) {
                    $table.find('thead th.header-col-cell').eq(col_index).after($col_head_tmpl.clone());
                    $table.find('colgroup.body col').eq(col_index).after($col_tmpl.clone());

                    let rowspan_remain = 0;
                    $table.find('tbody tr').each(function (i) {
                        let $tr = jQuery(this);
                        let $cur_cell = $tr.find('td').eq(col_index);
                        let $new_cell = $cell_tmpl.clone();

                        // ComponentBlocks customized start
                        if ($cur_cell[0].dataset.isColHeader) {
                            $new_cell[0].dataset.isColHeader = 1;
                        }
                        // ComponentBlocks customized end

                        if (rowspan_remain <= 0) {
                            let span_origin = get_span_origin(i, col_index);
                            if (span_origin) {
                                if (span_origin.col_index <= col_index && col_index < span_origin.col_end_index) {
                                    span_origin.$cell.attr('colspan', span_origin.colspan + 1);
                                    rowspan_remain = span_origin.rowspan > 1 ? span_origin.rowspan : 1;
                                }
                            }
                        }

                        if (rowspan_remain > 0) {
                            $new_cell.hide();
                            rowspan_remain--;
                        }

                        $cur_cell.after($new_cell);
                    });
                    update_col_width();
                };

                let insert_col_left = function (col_index) {
                    $table.find('thead th.header-col-cell').eq(col_index).before($col_head_tmpl.clone());
                    $table.find('colgroup.body col').eq(col_index).before($col_tmpl.clone());

                    let rowspan_remain = 0;
                    $table.find('tbody tr').each(function (i) {
                        let $tr = jQuery(this);
                        let $cur_cell = $tr.find('td').eq(col_index);
                        let $new_cell = $cell_tmpl.clone();

                        // ComponentBlocks customized start
                        if ($cur_cell[0].dataset.isColHeader) {
                            $new_cell[0].dataset.isColHeader = 1;
                        }
                        // ComponentBlocks customized end

                        if (rowspan_remain <= 0) {
                            let span_origin = get_span_origin(i, col_index);
                            if (span_origin) {
                                if (span_origin.col_index < col_index && col_index <= span_origin.col_end_index) {
                                    span_origin.$cell.attr('colspan', span_origin.colspan + 1);
                                    rowspan_remain = span_origin.rowspan > 1 ? span_origin.rowspan : 1;
                                }
                            }
                        }

                        if (rowspan_remain > 0) {
                            $new_cell.hide();
                            rowspan_remain--;
                        }

                        $cur_cell.before($new_cell);
                    });
                    update_col_width();
                };

                let delete_col = function (col_index) {
                    $table.find('colgroup.body col').eq(col_index).remove();
                    $table.find('thead th.header-col-cell').eq(col_index).remove();

                    let rowspan_remain = 0;
                    $table.find('tbody tr').each(function (i) {
                        let $cells = jQuery(this).find('td');
                        let $cur_cell = $cells.eq(col_index)

                        if (rowspan_remain <= 0) {
                            let span_origin = get_span_origin(i, col_index);
                            if (span_origin) {
                                if (span_origin.col_index == col_index) {
                                    if (span_origin.colspan >= 2) {
                                        let $right_cell = $cells.eq(span_origin.col_index + 1);
                                        $right_cell.attr('colspan', span_origin.colspan - 1);
                                        $right_cell.show();
                                        if (span_origin.rowspan > 1) {
                                            $right_cell.attr('rowspan', span_origin.rowspan);
                                            $right_cell.show();
                                            rowspan_remain = span_origin.rowspan > 1 ? span_origin.rowspan : 1;
                                        }
                                    }
                                } else if (span_origin.col_index <= col_index && col_index <= span_origin.col_end_index) {
                                    span_origin.$cell.attr('colspan', span_origin.colspan - 1);
                                    rowspan_remain = span_origin.rowspan > 1 ? span_origin.rowspan : 1;
                                }
                            }
                        }
                        rowspan_remain--;

                        $cur_cell.remove();
                    });

                    update_col_width();
                };

                let insert_row_above = function (row_index) {
                    let col_count = get_col_count();
                    let $cur_tr = $table.find('tbody tr').eq(row_index);
                    let $new_tr = $row_tmpl.clone();

                    let colspan_remain = 0;
                    for (let i = 0; i < col_count; i++) {
                        let $new_cell = $cell_tmpl.clone();

                        if (colspan_remain <= 0) {
                            let span_origin = get_span_origin(row_index, i);
                            if (span_origin) {
                                if (span_origin.row_index < row_index && row_index <= span_origin.row_index + span_origin.rowspan - 1) {
                                    span_origin.$cell.attr('rowspan', span_origin.rowspan + 1);
                                    colspan_remain = span_origin.colspan > 1 ? span_origin.colspan : 1;
                                }
                            }
                        }

                        if (colspan_remain > 0) {
                            $new_cell.hide();
                            colspan_remain--;
                        }

                        $new_tr.append($new_cell);
                    }
                    $cur_tr.before($new_tr);

                    // ComponentBlocks customized start
                    set_row_header(row_index + 1, $new_tr);
                    // ComponentBlocks customized end

                    return $new_tr;
                };

                let insert_row_below = function (row_index) {
                    let col_count = get_col_count();
                    let $cur_tr = $table.find('tbody tr').eq(row_index);
                    let $new_tr = $row_tmpl.clone();

                    let colspan_remain = 0;
                    for (let i = 0; i < col_count; i++) {
                        let $new_cell = $cell_tmpl.clone();

                        if (colspan_remain <= 0) {
                            let span_origin = get_span_origin(row_index, i);
                            if (span_origin) {
                                if (span_origin.row_index <= row_index && row_index < span_origin.row_index + span_origin.rowspan - 1) {
                                    span_origin.$cell.attr('rowspan', span_origin.rowspan + 1);
                                    colspan_remain = span_origin.colspan > 1 ? span_origin.colspan : 1;
                                }
                            }
                        }

                        if (colspan_remain > 0) {
                            $new_cell.hide();
                            colspan_remain--;
                        }

                        $new_tr.append($new_cell);
                    }
                    $cur_tr.after($new_tr);

                    // ComponentBlocks customized start
                    set_row_header(row_index, $new_tr);
                    // ComponentBlocks customized end

                    return $new_tr;
                };

                let delete_row = function (row_index) {
                    let col_count = get_col_count();
                    let $cur_tr = $table.find('tbody tr').eq(row_index);

                    let colspan_remain = 0;
                    for (let i = 0; i < col_count; i++) {
                        if (colspan_remain <= 0) {
                            let span_origin = get_span_origin(row_index, i);
                            if (span_origin) {
                                if (span_origin.row_index == row_index) {
                                    let $lower_tr = $table.find('tbody tr').eq(row_index + 1);
                                    let $lower_cell = $lower_tr.find('td').eq(span_origin.col_index);
                                    if (span_origin.rowspan >= 2) {
                                        $lower_cell.attr('rowspan', span_origin.rowspan - 1);
                                        $lower_cell.show();
                                        if (span_origin.colspan > 1) {
                                            $lower_cell.attr('colspan', span_origin.colspan);
                                            $lower_cell.show();
                                            colspan_remain = span_origin.colspan > 1 ? span_origin.colspan : 1;
                                        }
                                    }
                                } else if (span_origin.row_index <= row_index && row_index <= span_origin.row_end_index) {
                                    span_origin.$cell.attr('rowspan', span_origin.rowspan - 1);
                                    colspan_remain = span_origin.colspan > 1 ? span_origin.colspan : 1;
                                }
                            }
                        }
                        colspan_remain--;
                    }

                    $cur_tr.remove();
                };

                let marge_cell = function (row_index, col_index, row_end_index, col_end_index) {
                    for (let i = row_index; i <= row_end_index; i++) {
                        let $tr = $table.find('tbody tr').eq(i);
                        for (let j = col_index; j <= col_end_index; j++) {
                            let $cell = $tr.find('td').eq(j);
                            $cell.attr('colspan', '');
                            $cell.attr('rowspan', '');
                            $cell.hide();
                        }
                    }

                    let $tr = $table.find('tbody tr').eq(row_index);
                    let $cell = $tr.find('td').eq(col_index);

                    let colspan = col_end_index - col_index + 1;
                    let rowspan = row_end_index - row_index + 1;

                    $cell.attr('colspan', colspan > 1 ? colspan : '');
                    $cell.attr('rowspan', rowspan > 1 ? rowspan : '');
                    $cell.show();
                };

                let unmarge_cell = function (row_index, col_index) {
                    let span_origin = get_span_origin(row_index, col_index);
                    let $cell, rowspan, col_end_index;
                    if (span_origin) {
                        for (let i = span_origin.row_index; i <= span_origin.row_end_index; i++) {
                            let $tr = $table.find('tbody tr').eq(i);
                            for (let j = span_origin.col_index; j <= span_origin.col_end_index; j++) {
                                let $cell = $tr.find('td').eq(j);
                                $cell.attr('colspan', '');
                                $cell.attr('rowspan', '');
                                $cell.show();
                            }
                        }
                    }
                };

                // ComponentBlocks customized start
                let align_cell = function (row_index, col_index, align) {
                    $target = $table.find(`tbody tr:nth-child(${row_index + 1}) td:nth-of-type(${col_index + 1})`);
                    $target[0].dataset.align = align;
                };
                // ComponentBlocks customized end

                // ----

                let $btn_col_add = $content.find('.buttons .btn-col-add');
                let $btn_row_add = $content.find('.buttons .btn-row-add');

                let update_col_add_button_status = function () {
                    if (get_col_count() >= max_col_count) {
                        $btn_col_add.prop('disabled', true);
                        $btn_col_add.addClass('disabled');
                    } else {
                        $btn_col_add.prop('disabled', false);
                        $btn_col_add.removeClass('disabled');
                    }
                };

                $btn_row_add.on('click', function () {
                    create_row(true);
                });

                $btn_col_add.on('click', function () {
                    create_col(true);
                    update_col_width();
                    update_col_add_button_status();
                });

                // ----

                let $cur_menu = null;
                let menu_col_index;
                let menu_row_index;

                // column header menu

                let $col_menu = $content.find('.col-menu').menu().hide();

                $table.on('click', 'thead th.header-col-cell', function (event) {
                    if ($cur_menu) $cur_menu.hide();

                    let $th = jQuery(this).closest('th');
                    menu_col_index = $th[0].cellIndex - 1;

                    $col_menu.find('li').removeClass('ui-state-disabled')

                    let num_columns = get_col_count();

                    if (menu_col_index >= data_col_start_index) {
                        if (num_columns >= max_col_count) $col_menu.find('.item-col-add-left, .item-col-add-right').addClass('ui-state-disabled');
                        if (num_columns <= data_col_start_index + 1) $col_menu.find('.item-col-delete').addClass('ui-state-disabled');
                    } else {
                        $col_menu.find('.item-col-add-left, .item-col-add-right').addClass('ui-state-disabled');
                        $col_menu.find('.item-col-delete').addClass('ui-state-disabled');
                    }

                    let $col = $table.find('colgroup.body col').eq(menu_col_index);
                    let width_label = $col.attr('data-width-label');
                    $col_menu.find('.item-col-width').each(function () {
                        let $li = jQuery(this);
                        if ($li.attr('data-width-label') == width_label) {
                            $li.find('.ui-icon').show();
                        } else {
                            $li.find('.ui-icon').hide();
                        }
                    });

                    // ComponentBlocks customized start
                    const $item_col_th_icon = $col_menu.find('.item-col-th .ui-icon');
                    const col_index = $th.index();
                    if ($table.find(`tbody tr td:nth-child(${col_index + 1})`)[0].dataset.isRowHeader == 1) {
                        $item_col_th_icon.show();
                    } else {
                        $item_col_th_icon.hide();
                    }

                    $col_menu.find('.item-col-th').one('click', function() {
                        const index = $th.index();
                        const th = $th[0];
                        const $tds = $table.find(`tr td:nth-child(${index + 1})`);
                        const currentValue = parseInt($tds.eq(0)[0].dataset.isRowHeader, 10) ? 1 : 0;
                        const newValue = currentValue ? 0 : 1;
                        th.dataset.isRowHeader = newValue;
                        $tds.each(function () {
                            const td = this;
                            td.dataset.isRowHeader = newValue;
                        });
                    });
                    // ComponentBlocks customized end

                    $col_menu.show().position({
                        my: "left top",
                        at: "left bottom",
                        of: event
                    });
                    $cur_menu = $col_menu;
                    return false;
                });

                $col_menu.on('menuselect', function (event, ui) {
                    let $item = ui.item;

                    if ($item.hasClass('item-col-add-right')) {
                        insert_col_right(menu_col_index);
                    } else if ($item.hasClass('item-col-add-left')) {
                        insert_col_left(menu_col_index);
                    } else if ($item.hasClass('item-col-delete')) {
                        delete_col(menu_col_index);
                    } else if ($item.hasClass('item-col-width')) {
                        let $col = $table.find('colgroup.body col').eq(menu_col_index);
                        $col.attr('data-width-label', $item.attr('data-width-label'));
                        update_col_width();
                    }

                    update_col_add_button_status();
                });

                // row header menu

                let $row_menu = $content.find('.row-menu').menu().hide();

                $table.on('click', 'tbody .header-row-cell', function (event) {
                    if ($cur_menu) $cur_menu.hide();

                    let $tr = jQuery(this).closest('tr');
                    menu_row_index = $tr[0].rowIndex - 1;

                    $row_menu.find('li').removeClass('ui-state-disabled')

                    let num_rows = get_row_count();

                    if (menu_row_index >= data_row_start_index) {
                        if (num_rows <= data_row_start_index + 1) $row_menu.find('.item-row-delete').addClass('ui-state-disabled');
                    } else {
                        $row_menu.find('li').addClass('ui-state-disabled')
                    }

                    // ComponentBlocks customized start
                    const $item_row_th_icon = $row_menu.find('.item-row-th .ui-icon');
                    const row_index = $tr.index();
                    if ($table.find(`tbody tr:nth-child(${row_index + 1}) td`)[0].dataset.isColHeader == 1) {
                        $item_row_th_icon.show();
                    } else {
                        $item_row_th_icon.hide();
                    }

                    $row_menu.find('.item-row-th').one('click', function() {
                        const index = $tr.index();
                        const tr = $tr[0];
                        const $tds = $table.find(`tr:nth-child(${index + 1}) td`);
                        const currentValue = parseInt($tds.eq(0)[0].dataset.isColHeader, 10) ? 1 : 0;
                        const newValue = currentValue ? 0 : 1;
                        tr.dataset.isColHeader = newValue;
                        $tds.each(function () {
                            const td = this;
                            td.dataset.isColHeader = newValue;
                        });
                    });
                    // ComponentBlocks customized end

                    $row_menu.show().position({
                        my: "left top",
                        at: "right top",
                        of: event
                    });
                    $cur_menu = $row_menu;
                    return false;
                });

                $row_menu.on('menuselect', function (event, ui) {
                    let $item = ui.item;
                    if ($item.hasClass('item-row-add-below')) {
                        insert_row_below(menu_row_index);
                    } else if ($item.hasClass('item-row-add-above')) {
                        insert_row_above(menu_row_index);
                    } else if ($item.hasClass('item-row-delete')) {
                        delete_row(menu_row_index);
                    }
                });

                // cell menu

                let $cell_menu = $content.find('.cell-menu').menu().hide();

                $table.on('contextmenu', 'tbody td', function (event) {
                    if ($cur_menu) $cur_menu.hide();

                    let $cell = jQuery(this);
                    let $tr = $cell.closest('tr');
                    menu_col_index = $cell[0].cellIndex - 1;
                    menu_row_index = $tr[0].rowIndex - 1;

                    $cell_menu.find('li').removeClass('ui-state-disabled')

                    let span_origin = get_span_origin(menu_row_index, menu_col_index);

                    if (span_origin) {
                        var col_index = span_origin.col_index;
                        var col_end_index = span_origin.col_end_index;
                        var row_index = span_origin.row_index;
                        var row_end_index = span_origin.row_end_index;
                    } else {
                        var col_index = menu_col_index;
                        var col_end_index = menu_col_index;
                        var row_index = menu_row_index;
                        var row_end_index = menu_row_index;

                        $cell_menu.find('.item-cell-unmarge').addClass('ui-state-disabled');
                    }

                    let num_columns = get_col_count();
                    let num_rows = get_row_count();

                    if (menu_col_index >= data_col_start_index) {
                        if (col_index <= data_col_start_index) $cell_menu.find('.item-cell-marge-left').addClass('ui-state-disabled');
                        if (col_end_index >= num_columns - 1) $cell_menu.find('.item-cell-marge-right').addClass('ui-state-disabled');
                    } else {
                        $cell_menu.find('.item-cell-marge-left').addClass('ui-state-disabled');
                        $cell_menu.find('.item-cell-marge-right').addClass('ui-state-disabled')
                    }

                    if (menu_row_index >= data_row_start_index) {
                        if (row_index <= data_row_start_index) $cell_menu.find('.item-cell-marge-above').addClass('ui-state-disabled');
                        if (row_end_index >= num_rows - 1) $cell_menu.find('.item-cell-marge-below').addClass('ui-state-disabled');
                    } else {
                        $cell_menu.find('.item-cell-marge-above').addClass('ui-state-disabled');
                        $cell_menu.find('.item-cell-marge-below').addClass('ui-state-disabled');
                    }

                    $cell_menu.show().position({
                        my: "left top",
                        at: "right top",
                        of: event
                    });
                    $cur_menu = $cell_menu;
                    return false;
                });

                $cell_menu.on('menuselect', function (event, ui) {
                    let span_origin = get_span_origin(menu_row_index, menu_col_index);
                    if (span_origin) {
                        var row_end_index = span_origin.row_end_index;
                        var col_end_index = span_origin.col_end_index;
                    } else {
                        var row_end_index = menu_row_index;
                        var col_end_index = menu_col_index;
                    }

                    let $item = ui.item;
                    if ($item.hasClass('item-cell-marge-right')) {
                        let select_range = get_select_range(menu_row_index, menu_col_index, row_end_index, col_end_index + 1);
                        marge_cell(select_range.row_index, select_range.col_index, select_range.row_end_index, select_range.col_end_index);
                    } else if ($item.hasClass('item-cell-marge-below')) {
                        let select_range = get_select_range(menu_row_index, menu_col_index, row_end_index + 1, col_end_index);
                        marge_cell(select_range.row_index, select_range.col_index, select_range.row_end_index, select_range.col_end_index);
                    } else if ($item.hasClass('item-cell-marge-left')) {
                        let select_range = get_select_range(menu_row_index, menu_col_index - 1, row_end_index, col_end_index);
                        marge_cell(select_range.row_index, select_range.col_index, select_range.row_end_index, select_range.col_end_index);
                    } else if ($item.hasClass('item-cell-marge-above')) {
                        let select_range = get_select_range(menu_row_index - 1, menu_col_index, row_end_index, col_end_index);
                        marge_cell(select_range.row_index, select_range.col_index, select_range.row_end_index, select_range.col_end_index);
                    } else if ($item.hasClass('item-cell-unmarge')) {
                        unmarge_cell(menu_row_index, menu_col_index);
                    } else if ($item.hasClass('item-cell-align')) {
                        // ComponentBlocks customized
                        const align = $item[0].dataset.align;
                        align_cell(menu_row_index, menu_col_index, align);
                    }
                });

                jQuery(document).on('click', function (event) {
                    if ($cur_menu) {
                        $cur_menu.hide();
                        // ComponentBlocks customized start
                        $cur_menu.find('.item-col-th').off('click');
                        $cur_menu.find('.item-row-th').off('click');
                        // ComponentBlocks customized end
                        $cur_menu = null;
                    }
                });

                // ComponentBlocks customized （if文追加）
                if (contentEditableValue === 'true') {
                    $table.on('paste', 'tbody td', function (event) {
                        let text = event.originalEvent.clipboardData.getData("text/plain");
                        let selection = window.getSelection();
                        selection.deleteFromDocument();
                        selection.getRangeAt(0).insertNode(document.createTextNode(text));

                        return false;
                    });
                }

                if (data_col_start_index > 0) $table.addClass('has-row-header');
                if (data_row_start_index > 0) $table.addClass('has-col-header');

                if (!use_table_caption) {
                    $content.find('.FieldBlockBuilder-table-editor .table-caption').hide();
                }

                // 入力の復元
                if (!value) value = {};

                for (let i = 0; i < value.num_columns; i++) {
                    create_col();
                }
                while (get_col_count() < data_col_start_index + 1) {
                    create_col();
                }

                if (value.col_width_list) {
                    let $cols = $table.find('colgroup.body col');
                    for (let i = 0; i < value.col_width_list.length; i++) {
                        $cols.eq(i).attr('data-width-label', value.col_width_list[i]);
                    }
                }
                update_col_width();

                if (value.rows) {
                    for (let row = 0; row < value.rows.length; row++) {
                        let $tr = create_row();
                        let cols = value.rows[row];
                        for (let col = 0; col < cols.length; col++) {
                            let $cell = $tr.find('td').eq(col);
                            let col_item = cols[col];

                            let lines = col_item.value.split("\n");
                            for (let i = 0; i < lines.length; i++) {
                                let line = lines[i];
                                $cell.append(window.document.createTextNode(line));
                                if (i != lines.length - 1) $cell.append(jQuery('<br>'));
                            }

                            if (col_item.colspan) $cell.attr('colspan', col_item.colspan);
                            if (col_item.rowspan) $cell.attr('rowspan', col_item.rowspan);
                            if (!col_item.is_visible) $cell.hide();

                            // ComponentBlocks customized start
                            if (col_item.is_row_header) $cell[0].dataset.isRowHeader = 1;
                            if (col_item.is_col_header) $cell[0].dataset.isColHeader = 1;
                            if (col_item.align) $cell[0].dataset.align = col_item.align;
                            // ComponentBlocks customized end
                        }
                    }

                    $content.find('.FieldBlockBuilder-table-editor .table-caption input').val(value.table_caption);
                }

                while (get_row_count() < data_row_start_index + 1) {
                    create_row();
                }

                update_col_add_button_status();
            },
            getFieldValue: function ($content, item_data) {
                let $table = $content.find('table.editor-table:first');
                let $rows = $table.find('tbody tr');

                let num_columns = $table.find('thead th.header-col-cell').length;
                let col_width_list = [];
                $table.find('colgroup.body col').each(function (i) {
                    let width_label = jQuery(this).attr('data-width-label');
                    col_width_list.push(width_label);
                });

                let rows = [];
                $rows.each(function (i) {
                    let cols = [];
                    jQuery(this).find('td').each(function (i) {
                        let $cell = jQuery(this);
                        let text = '';
                        $cell.contents().each(function () {
                            let $node = jQuery(this);
                            if ($node.prop('nodeName') == 'BR') {
                                text += "\n";
                            } else {
                                text += $node.text();
                            }
                        });

                        cols.push({
                            value: text,
                            colspan: $cell.attr('colspan'),
                            rowspan: $cell.attr('rowspan'),
                            is_visible: $cell.is(':visible'),

                            // ComponentBlocks customized start
                            is_row_header: $cell[0].dataset.isRowHeader == 1 ? true : false,
                            is_col_header: $cell[0].dataset.isColHeader == 1 ? true : false,
                            align: $cell[0].dataset.align !== 'left' ? $cell[0].dataset.align : null,
                            // ComponentBlocks customized end
                        });
                    });
                    rows.push(cols);
                });

                let table_caption = $content.find('.FieldBlockBuilder-table-editor .table-caption input').val();

                return {
                    num_columns: num_columns,
                    col_width_list: col_width_list,
                    rows: rows,
                    table_caption: table_caption
                };
            },
            validate: function ($content, item_data, value) {
                if (item_data.required) {
                    let is_valid = false;
                    for (let row = 0; row < value.rows.length; row++) {
                        let cols = value.rows[row];
                        for (let col = 0; col < cols.length; col++) {
                            let col_item = cols[col];
                            if (col_item.is_visible && col_item.value) {
                                is_valid = true;
                            }
                        }
                    }
                    if (!is_valid) return 'required';
                }

                return null;
            }
        },
    },
};
