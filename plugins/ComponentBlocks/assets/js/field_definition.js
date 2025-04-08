const property = (() => {
  return {
    key: null,
    label: null,
    edit: 'text',
    defaultValue: null,
    hint: null,
    required: false,
    choiceOptions: null,
    assetClass: '',
    relationModel: '',
    singleChoice: false,
  }
})();

export const FieldDefinition = {
  data() {
    return {
      properties: [],
      showDialog: false,
      detailData: {},
      type: '',
    }
  },

  computed: {
    cmsdata() {
      let data = this.properties.slice();
      return JSON.stringify(data);
    }
  },

  template: `
    <draggable class="block-property" v-model="properties" item-key="id" handle=".handle-container div">
      <template #item="{element, index}">
        <div class="row form-group">
          <div class="col-auto handle-container">
            <div>
              <svg version="1.1" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" width="16" height="16" class="handle" tabindex="-1"><use xlink:href="#grip_vertical"></use></svg>
            </div>
          </div>
          <div class="col-lg-3">
            <label :for="type + '_key_' + index">{{ $t('key') }} <i class="fa fa-asterisk required" aria-hidden="true"></i><span class="sr-only">{{ $t('required') }}</span></label>
            <input type="text" v-model="element.key" :id="type + '_key_' + index" class="form-control">
          </div>
          <div class="col">
            <label :for="type + '_label_' + index">{{ $t('label') }} ({{ $t('asNeeded') }})</label>
            <input type="text" v-model="element.label" :id="type + '_label_' + index" class="form-control">
          </div>
          <div class="col-lg-3">
            <label :for="type + '_edit_' + index">{{ $t('editType') }} <i class="fa fa-asterisk required" aria-hidden="true"></i><span class="sr-only">{{ $t('required') }}</span></label>
            <select v-model="element.edit" :id="type + '_edit_' + index" class="form-control custom-select">
              <option value="text">{{ $t('text') }}</option>
              <option value="number">{{ $t('numberText') }}</option>
              <option value="textarea">{{ $t('textArea') }}</option>
              <option value="editor">{{ $t('editorText') }}</option>
              <option value="radio">{{ $t('radio') }}</option>
              <option value="checkbox">{{ $t('checkbox') }}</option>
              <option value="image">{{ $t('image') }}</option>
              <option value="asset">{{ $t('asset') }}</option>
              <option value="table">{{ $t('table') }}</option>
              <option value="relation">{{ $t('relation') }}</option>
            </select>
          </div>
          <div>
            <button type="button" @click="openDialog(element)" :disabled="element.key ? false : true" class="btn btn-outline-primary detail-btn">{{ $t('detailSetting') }}</button>
            <button type="button" @click="deleteProperty(index)" class="btn btn-outline-danger delete-field ml-0 mr-0">{{ $t('delete') }}</button>
          </div>
        </div>
      </template>
    </draggable>
    <div class="row form-group">
      <button type="button" @click="addProperty" class="btn btn-primary btn-sm ml-3 add-field">{{ $t('addField') }}</button>
    </div>
    <textarea style="display: none;" :id="type" :name="type" class="form-control" rows="5" cols="50" readonly>{{cmsdata}}</textarea>
    <dialog ref="component_blocks_field_detail">
      <detail @close-detail="closeDetail" :detailData="detailData" />
    </dialog>
  `,

  created() {
    document.addEventListener('click', (e) => {
      if (e.target.tagName.toLowerCase() === 'dialog') {
        this.$refs.component_blocks_field_detail.close();
      }
    });
  },

  methods: {
    addProperty() {
      this.properties.push(Object.assign({}, property));
    },

    deleteProperty(index) {
      this.properties.splice(index, 1);
      // TODO: フォーカス制御
    },

    openDialog(data) {
      this.detailData = data;
      this.$refs.component_blocks_field_detail.showModal();
    },

    closeDetail() {
      this.$refs.component_blocks_field_detail.close();
    },
  },
};

// NOTE: detailDataはオブジェクトなので、親のプロパティだが直接変更している
export const Detail = Vue.defineComponent({
  props: ['detailData'],

  data() {
    return {
      models: componentBlocksSettings.models,
    }
  },

  template: `
    <div class="">
      <div class="modal-header">
        <h2 class="m-0">{{ $t('advancedFieldSettings') }}</h2>
      </div>
      <div class="modal-body">
        <div class="form-group default-value" v-if="dispDefaultValue">
          <label for="field_detail_default_value">{{ $t('initialValue') }}</label>
          <input type="text" v-model="detailData.defaultValue" id="field_detail_default_value" class="form-control">
        </div>
        <div class="form-group required" v-if="detailData.edit === 'table'">
          <div class="mb-2">{{ $t('initialValue') }}</div>
          <div id="table_editor">
            <TableEditor :key="detailData.key" :element="detailData" field-key="defaultValue" />
          </div>
        </div>
        <div class="form-group hint">
          <label for="field_detail_hint">{{ $t('hint') }}</label>
          <input type="text" v-model="detailData.hint" id="field_detail_hint" class="form-control">
        </div>
        <div class="form-group asset-class" v-if="detailData.edit === 'asset'">
          <label for="field_detail_asset_class">{{ $t('editType') }}</label>
          <select v-model="detailData.assetClass" id="field_detail_asset_class" class="form-control">
            <option value="">{{ $t('pleaseSelect') }}</option>
            <option value="image">{{ $t('image') }}</option>
            <option value="file">{{ $t('file') }}</option>
            <option value="pdf">{{ $t('pdf') }}</option>
          </select>
        </div>
        <div class="form-group single-choice" v-if="detailData.edit === 'asset' || detailData.edit === 'relation'">
          <label for="field_detail_single_choice">{{ $t('singleChoice') }}</label>
          <input type="checkbox" v-model="detailData.singleChoice" id="field_detail_single_choice" class="form-control">
        </div>
        <div class="form-group choice-options" v-if="detailData.edit === 'radio' || detailData.edit === 'checkbox'">
          <label for="field_detail_choice_options">{{ $t('choice') }} <i class="fa fa-asterisk required" aria-hidden="true"></i><span class="sr-only">{{ $t('required') }}</span></label>
          <input type="text" v-model="detailData.choiceOptions" id="field_detail_choice_options" class="form-control">
        </div>
        <div class="form-group relation-model" v-if="detailData.edit === 'relation'">
          <label for="field_detail_relation_model">{{ $t('relationModel') }} <i class="fa fa-asterisk required" aria-hidden="true"></i><span class="sr-only">{{ $t('required') }}</span></label>
          <select v-model="detailData.relationModel" id="field_detail_relation_model" class="form-control">
            <option value="">{{ $t('pleaseSelect') }}</option>
            <option :value="key" v-for="(value, key) in models">{{value}}</option>
          </select>
        </div>
        <div class="form-group required" v-if="detailData.edit !== 'table'">
          <label for="field_detail_required">{{ $t('required') }}</label>
          <input type="checkbox" v-model="detailData.required" id="field_detail_required" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <div>
          <input type="button" :value="$t('close')" @click="closeDetail" class="btn btn-primary">
        </div>
      </div>
    </div>
  `,

  computed: {
    dispDefaultValue() {
      if (
        this.detailData.edit === 'editor'
        || this.detailData.edit === 'image'
        || this.detailData.edit === 'asset'
        || this.detailData.edit === 'table'
        || this.detailData.edit === 'relation'
      ) {
        return false;
      }

      return true;
    }
  },

  methods: {
    closeDetail() {
      this.$emit('closeDetail');
    },
  },
});
