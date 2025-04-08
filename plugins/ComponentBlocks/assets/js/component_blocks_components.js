import { setRelationAsset } from "./cms.js";

const supportPlainTextMode = () => {
  const testElement = document.createElement('div');
  testElement.setAttribute('contenteditable', 'plaintext-only');
  return testElement.contentEditable === 'plaintext-only';
};

export const BlockController = Vue.defineComponent({
  props: ['blocks', 'isblock', 'iscontainer', 'index'],

  template: `<ul>
    <li v-if="index > 0" class="up">
      <button type="button" :class="'btn btn-sm btn-secondary' + (iscontainer ? ' btn-xsm' : '')" v-on:click="up(index)" ref="up">
        <svg role="img" :aria-label="$t('up')" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-up" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z"/>
        </svg>
      </button>
    </li>
    <li v-if="index < blocks.length - 1" class="down">
      <button :class="'btn btn-sm btn-secondary' + (iscontainer ? ' btn-xsm' : '')" type="button" v-on:click="down(index)" ref="down">
        <svg role="img" :aria-label="$t('down')" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
        </svg>
      </button>
    </li>
    <li class="delete">
      <button type="button" :class="'btn btn-sm btn-secondary delete' + (iscontainer ? ' btn-xsm' : '')" v-on:click="deleteBlock(index)">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" role="img" :aria-label="$t('delete')" width="16" height="16"><use xlink:href="#trash"></use></svg>
      </button>
    </li>
  </ul>`,

  methods: {
    up(index) {
      const data = this.blocks;
      const prev = data[index - 1];
      const clicked = data[index];
      data[index - 1] = clicked;
      data[index] = prev;
      this.$nextTick(() => {
        if (this.$refs.up) {
          this.$refs.up.focus();
        } else {
          this.$refs.down.focus();
        }
      });
    },

    down(index) {
      const data = this.blocks;
      const clicked = data[index];
      const next = data[index + 1];
      data[index] = next;
      data[index + 1] = clicked;
      this.$nextTick(() => {
        if (this.$refs.down) {
          this.$refs.down.focus();
        } else {
          this.$refs.up.focus();
        }
      });
    },

    deleteBlock(index) {
      let type = this.$t('field');
      if (this.isblock) {
        type = this.$t('block');
      } else if (this.iscontainer) {
        type = this.$t('container');
      }

      if (!window.confirm(this.$t('deleteBlock', { type: type, index: index + 1 }))) {
        return;
      }

      const prevBlockId = this.blocks[index - 1] ? this.blocks[index - 1].id : null;
      this.blocks.splice(index, 1);
      if (prevBlockId && this.blocks.length) {
        // NOTE: 前のブロックにフォーカスを移すが、前のブロックがなければ削除対象ブロックの次の要素にフォーカスが移るようである
        this.$nextTick(() => {
          if (this.$refs['block' + prevBlockId]) {
            this.$refs['block' + prevBlockId].focus();
          }
        });
      }
    },
  },
});

export const ImageSelector = Vue.defineComponent({
  props: ['element', 'fieldKey'],

  data() {
    return {
      imageLink: null,
    }
  },

  mounted() {
    const id = this.element[this.fieldKey];
    if (id) {
      this.assetChangeHandler(id);
    }
  },

  template: `<div class="preview-image" v-if="element[fieldKey] > 0">
    <a :href="imageLink" target="_blank"><img :src="'${componentBlocksSettings.scriptUri}?__mode=get_thumbnail&_model=asset&id=' + element[fieldKey]" alt="" class="thumbnail"></a>
    <button :id="'component_blocks_' + element.id + '_' + fieldKey + '-close'" type="button" class="btn btn-secondary btn-sm deselect" :aria-label="$t('deselect')" :data-name="fieldKey" v-on:click="detachRelation">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
        <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
      </svg>
    </button>
  </div>
  <div class="select-asset">
    <input :id="'object_vue_edit_' + element.id + '_' + fieldKey" type="hidden" v-model.number="element[fieldKey]">
    <button type="button" :id="element.id + '_' + fieldKey" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal" :data-href="'${componentBlocksSettings.scriptUri}?__mode=view&amp;_type=list&amp;_model=asset&amp;workspace_id=${componentBlocksSettings.workspaceId}&amp;dialog_view=1&amp;single_select=1&amp;target=object_vue_edit_' + element.id + '_' + fieldKey + '&amp;get_col=label&amp;_filter=asset&amp;select_system_filters=filter_class_image&amp;_system_filters_option=image'">{{ $t("select") }}</button>
  </div>`,

  created() {
    this.$watch(`element.${this.fieldKey}`, async (id) => {
      this.assetChangeHandler(id, true);
    });
  },

  methods: {
    detachRelation() {
      if (window.confirm(this.$t('removeAsset'))) {
        this.element[this.fieldKey] = null;
      }
    },

    async assetChangeHandler(id, setRelation = false) {
      const json = await fetch(`${componentBlocksSettings.scriptUri}?__mode=component_blocks_object_info&model=asset&object_ids=${id}`)
        .then((response) => {
          if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
          }
          return response.json();
        });

      if (json[0]) {
        if (setRelation) {
          setRelationAsset(json);
        }
        this.imageLink = json[0].permalink;
      }
    },
  },
});

export const ObjectSelector = Vue.defineComponent({
  props: ['element', 'model', 'fieldKey', 'class', 'singleChoice'],

  data() {
    return {
      objectList: [],
      setWatcher: false,
    }
  },

  // .relation-listのHTMLは製品標準に合わせる
  template: `<div class="relation-list" v-if="objectList.length">
    <draggable tag="ul" v-model="objectList" item-key="id" :set="props = element" @end="onDragEnd">
      <template #item="{element, index}">
        <li class="badge badge-edit-tmpl badge-default badge-relation badge-draggable mr-2">
          <div class="assets-child-thumb mr-1" :data-model="model" :data-id="element.id"
            :style="'background-image: url(${componentBlocksSettings.scriptUri}?__mode=get_thumbnail&amp;square=1&amp;_model=' + model + '&amp;id=' + element.id + ');'"></div>
          <span>{{element.label}}</span>
          <a v-if="element.class !== 'file' && element.permalink" :href="element.permalink" class="asset-download-btn btn btn-secondary btn-sm attachment-download-btn-assets" :aria-label="$t('viewObject')" target="_blank">
            <i class="fa fa-external-link-square"></i>
          </a>
          <a v-if="element.linkurl" :href="element.linkurl" class="asset-linkurl-btn btn btn-secondary btn-sm attachment-download-btn-assets" :aria-label="$t('viewObject')" target="_blank">
            <i class="fa fa-globe"></i>
          </a>
          <button v-if="element.canEdit" type="button" class="_asset_vue_edit-edit btn btn-secondary btn-sm relation-editor"
            :aria-label="$t('editObject')" data-toggle="modal" data-target="#modal"
            :data-href="'${componentBlocksSettings.scriptUri}?__mode=view&amp;_type=edit&amp;_model=' + model + '&amp;id=' + element.id + '&amp;workspace_id=${componentBlocksSettings.workspaceId}&amp;dialog_view=1&amp;target=object_vue_edit_' + props.id + '_' + fieldKey + '&amp;get_col=label&amp;select_add=1&amp;direct_edit=1'">
            <i class="fa fa-pencil" aria-hidden="true"></i>
          </button>
          <button type="button" class="btn btn-secondary btn-sm detach-relation" :aria-label="$t('deselect')" @click="detachRelation(index)">
            <span aria-hidden="true">&times;</span>
          </button>
          <input v-if="singleChoice" type="hidden" class="insert-file-id" :name="'object_vue_edit_' + props.id + '_' + fieldKey" :value="element.id">
          <input v-else type="hidden" class="insert-file-id" :name="'object_vue_edit_' + props.id + '_' + fieldKey + '[]'" :value="element.id">
        </li>
      </template>
    </draggable>
  </div>
  <div class="select-asset">
    <input :id="'object_vue_edit_' + element.id + '_' + fieldKey" type="hidden" v-model="objectIds">
    <button type="button" :id="element.id" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal" :data-href="'${componentBlocksSettings.scriptUri}?__mode=view&amp;_type=list&amp;_model=' + model + '&amp;workspace_id=${componentBlocksSettings.workspaceId}&amp;dialog_view=1&amp;target=object_vue_edit_' + element.id + '_' + fieldKey + '&amp;ids_only=1&amp;_filter=asset' + filterParam">{{ $t("select") }}</button>
  </div>`,

  created() {
    if (this.$props.element[this.fieldKey] && this.$props.element[this.fieldKey].length > 0) {
      this.setObjectList();
    }
  },

  beforeUpdate() {
    if (this.model === 'asset' && !this.setWatcher) {
      this.setWatcher = true;
      this.$watch('objectList', (data) => {
        setRelationAsset(data);
      });
    }
  },

  computed: {
    objectIds: {
      get() {
        if (this.$props.element[this.fieldKey]) {
          return this.$props.element[this.fieldKey].join(',');
        }
        return null;
      },
      set(value) {
        const values = value.split(',');
        this.$props.element[this.fieldKey] = values.map((value) => value * 1);
        this.setObjectList();
      }
    },

    filterParam() {
      let param = '';

      if (Number(this.$props.singleChoice) === 1) {
        param += '&single_select=1';
      }

      if (this.$props.class) {
        param += '&select_system_filters=filter_class_' + this.$props.class + '&_system_filters_option=' + this.$props.class;
      }

      return param;
    }
  },

  methods: {
    async setObjectList() {
      const objectIds = this.$props.element[this.fieldKey].join(',');
      const json = await fetch(`${componentBlocksSettings.scriptUri}?__mode=component_blocks_object_info&model=${this.model}&object_ids=${objectIds}`)
        .then((response) => {
          if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
          }
          return response.json();
        });
      this.objectList = json;
    },

    detachRelation(index) {
      if (window.confirm(this.$t('removeAsset'))) {
        this.element[this.fieldKey].splice(index, 1);
        this.objectList.splice(index, 1);
      }
    },

    onDragEnd() {
      const objectIds = this.objectList.map((asset) => asset.id * 1);
      this.$props.element[this.fieldKey] = objectIds;
    },
  },
});

export const MultiBlock = Vue.defineComponent({
  props: ['element', 'enableblocks'],

  template: `
    <draggable v-model="element.containers" item-key="id" :set="parentContainers = element.containers" handle=".handle" @end="onDragEnd">
      <template #item="{element, index}">
        <div class="multiblock-container" :ref="'container' + element.id" tabindex="-1">
          <div class="row header">
            <div class="col">
              <svg version="1.1" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" width="16" height="16" class="handle" tabindex="-1"><use xlink:href="#grip_vertical"></use></svg>
              <span>{{ $t("container") }}{{index + 1}}</span>
              <div class="control">
                <BlockController :blocks="parentContainers" :iscontainer="1" :index="index" :ref="'blockcontroller' + element.id" />
              </div>
            </div>
          </div>
          <div class="row blocks">
            <div class="col-12">
              <div class="row">
                <draggable v-model="element.blocks" item-key="id" class="col" handle=".handle" @end="onDragEnd">
                  <template #item="{element, index}">
                    <div :class="'row block ' + element.type + 'Edit'" :ref="'block' + element.id" tabindex="-1">
                      <div class="col">
                        <div class="block-name">
                          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" width="16" height="16" class="handle" tabindex="-1"><use xlink:href="#grip_vertical"></use></svg>
                          <block-label :element="element" />
                        </div>
                        <block-selection :element="element" />
                      </div>
                      <div class="col-auto pr-3 control">
                        <BlockController :blocks="getBlocks(element)" :index="index" :ref="'blockcontroller' + element.id" />
                      </div>
                    </div>
                  </template>
                </draggable>
              </div>
              <div class="row mt-3 mb-3">
                <div class="col">
                  <div class="select-component multiblock">
                    <select class="form-control form-control-sm short custom-select mr-2" :ref="'subblock_type' + element.id">
                      <option v-for="(value, key) in enableblocks" :value="key">{{value}}</option>
                    </select>
                    <button type="button" class="btn btn-sm btn-info add-block" v-on:click="addSubBlock(element)">{{ $t("addBlock") }}</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </template>
    </draggable>
    <div class="row">
      <div class="col">
        <button type="button" class="btn btn-primary btn-sm add-container ml-0" v-on:click="addContainer(element)">{{ $t("addContainer") }}</button>
      </div>
    </div>
  `,

  methods: {
    addContainer(blockData) {
      const id = this.$root.generateId();
      let containerData = {
        id: id,
        blocks: [],
      };
      blockData.containers.push(containerData);
      this.$nextTick(() => this.$refs['container' + id].focus());
    },

    addSubBlock(element) {
      const id = this.$root.generateId();
      const type = this.$refs['subblock_type' + element.id].value;
      let blockData = {
        id: id,
        type: type,
      };
      window.componentBlocksSettings.setBlockData(this, blockData, type);
      element.blocks.push(blockData);
      this.$nextTick(() => this.$refs['block' + id].focus());
    },

    getBlocks(element) {
      function findObjectById(blocks, targetId, container = null) {
        for (const block of blocks) {
          if (block.id === targetId) {
            return container;
          } else if (block.useMultiBlock) {
            const result = findObjectById(block.containers, targetId);
            if (result) {
              return result;
            }
          } else if (block.blocks) {
            const result = findObjectById(block.blocks, targetId, block);
            if (result) {
              return result;
            }
          }
        }
      }

      return findObjectById(this.element.containers, element.id).blocks ?? [];
    },

    onDragEnd(e) {
      this.$root.onDragEnd(e);
    },
  },
});

export const TableEditor = Vue.defineComponent({
  props: ['element', 'index', 'fieldKey'],

  // _hdlr_field_block_builder_table_fieldから移植
  template: `
    <div :id="element.id + '_' + fieldKey" class="part-table">
      <div class="FieldBlockBuilder-item-parts FieldBlockBuilder-table-editor">
        <div class="field field-left-label table-caption">
          <div class="field-header first-child">
            <label>Table caption</label>
          </div>
          <div class="field-content">
            <input type="text" class="text full" value="">
          </div>
        </div>
        <table class="editor-table">
          <colgroup class="header">
            <col width="25px">
          </colgroup>
          <colgroup class="body">
            <col data-width-label="normal">
          </colgroup>
          <thead>
            <tr>
              <th class="editor-header header-corner-cell"><div class="spacer"></div></th>
              <th class="editor-header header-col-cell"><div class="spacer"></div></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th class="editor-header header-row-cell"><div class="spacer"></div></th>
              <td :contenteditable="contentEditableValue"></td>
            </tr>
          </tbody>
        </table>
        <div class="buttons">
          <div>
            <button type="button" class="btn btn-sm btn-secondary ml-0 btn-row-add">{{ $t("addRow") }}</button>
          </div>
          <div>
            <button type="button" class="btn btn-sm btn-secondary ml-0 btn-col-add">{{ $t("addColumn") }}</button>
          </div>
        </div>
        <div class="menu-wrapper">
          <ul class="col-menu">
            <li class="item-col-add-right"><div>{{ $t("addColumnToRight") }}</div></li>
            <li class="item-col-add-left"><div>{{ $t("addColumnToLeft") }}</div></li>
            <li>-</li>
            <li class="item-col-delete"><div>{{ $t("deleteColumn") }}</div></li>
            <li>-</li>
            <li><div>{{ $t("columnWidth") }}</div>
              <ul class="cell-width">
                <li class="item-col-width" data-width-label="wider"><div><span class="ui-icon ui-icon-check"></span>{{ $t("wider") }}</div></li>
                <li class="item-col-width" data-width-label="wide"><div><span class="ui-icon ui-icon-check"></span>{{ $t("wide") }}</div></li>
                <li class="item-col-width" data-width-label="normal"><div><span class="ui-icon ui-icon-check"></span>{{ $t("normal") }}</div></li>
                <li class="item-col-width" data-width-label="narrow"><div><span class="ui-icon ui-icon-check"></span>{{ $t("narrow") }}</div></li>
                <li class="item-col-width" data-width-label="narrower"><div><span class="ui-icon ui-icon-check"></span>{{ $t("narrower") }}</div></li>
              </ul>
            </li>
            <li>-</li>
            <li class="item-col-th"><div><span class="ui-icon ui-icon-check"></span>{{ $t("headerCol") }}</div></li>
          </ul>
          <ul class="row-menu">
            <li class="item-row-add-above"><div>{{ $t("addRowAbove") }}</div></li>
            <li class="item-row-add-below"><div>{{ $t("addRowBelow") }}</div></li>
            <li>-</li>
            <li class="item-row-delete"><div>{{ $t("deleteRow") }}</div></li>
            <li>-</li>
            <li class="item-row-th"><div><span class="ui-icon ui-icon-check"></span>{{ $t("headerRow") }}</div></li>
          </ul>
          <ul class="cell-menu">
            <li class="item-cell-marge-right"><div>{{ $t("mergeWithRightCell") }}</div></li>
            <li class="item-cell-marge-left"><div>{{ $t("mergeWithLeftCell") }}</div></li>
            <li class="item-cell-marge-above"><div>{{ $t("mergeWithCellAbove") }}</div></li>
            <li class="item-cell-marge-below"><div>{{ $t("mergeWithCellBelow") }}</div></li>
            <li>-</li>
            <li class="item-cell-unmarge"><div>{{ $t("unMerge") }}</div></li>
            <li>-</li>
            <li class="item-cell-align" data-align="left"><div>{{ $t("alignLeft") }}</div></li>
            <li class="item-cell-align" data-align="center"><div>{{ $t("alignCenter") }}</div></li>
            <li class="item-cell-align" data-align="right"><div>{{ $t("alignRight") }}</div></li>
          </ul>
        </div>
      </div>
    </div>
  `,

  mounted() {
    let $field;
    if (this.fieldKey === 'defaultValue') {
      $field = $('#table_editor');
    } else {
      $field = $('#' + this.element.id + '_' + this.fieldKey);
    }

    const $table = $field.find('table.editor-table:first');
    const itemData = {
      max_columns: 10,
      col_header_row_count: 0,
      row_header_col_count: 0,
      use_table_caption: false,
    };
    FieldBlockBuilder.parts.table.initEditField($field, itemData, this.element[this.fieldKey], this.contentEditableValue);

    let keyupTimerId = null;
    let observerTimerId = null;
    $table.on('keyup', 'td', (e) => {
      if (keyupTimerId) {
        clearTimeout(keyupTimerId);
      }

      keyupTimerId = setTimeout(() => {
        if (!e.originalEvent.isComposing) {
          this.element[this.fieldKey] = FieldBlockBuilder.parts.table.getFieldValue($field);
        }
      }, 1000);
    });

    const observer = new MutationObserver((mutationsList) => {
      if (observerTimerId) {
        clearTimeout(observerTimerId);
        observerTimerId = null;
      }

      for (let mutation of mutationsList) {
        const tag = mutation.target.tagName.toLowerCase();
        if (
          mutation.type === 'childList'
          || (mutation.type === 'attributes' && tag === 'td')
          || (mutation.type === 'attributes' && tag === 'col')
        ) {
          if (!observerTimerId) {
            observerTimerId = setTimeout(() => {
              this.element[this.fieldKey] = FieldBlockBuilder.parts.table.getFieldValue($field);
              observerTimerId = null;
            }, 1000);
          }
        }
      }
    });

    if ($table.length) {
      observer.observe($table[0], {
        childList: true,
        subtree: true,
        attributes: true,
      });
    }
  },

  computed: {
    contentEditableValue() {
      return supportPlainTextMode() ? 'plaintext-only' : 'true';
    },
  },
});
