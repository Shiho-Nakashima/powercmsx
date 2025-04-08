const ComponentBlocks = {
  template: `
    <draggable v-model="blocks" item-key="id" handle=".handle" @end="onDragEnd">
      <template #item="{element, index}">
        <div :class="'row form-group component-blocks-row ' + element.type + 'Edit'" :ref="'block' + element.id" tabindex="-1">
          <div class="col-md-2">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" width="16" height="16" class="handle" tabindex="-1"><use xlink:href="#grip_vertical"></use></svg>
            <span class="badge badge-secondary">{{index + 1}}</span> <block-label :element="element" />
          </div>
          <div class="col-md mb-3 mb-md-0 fields">
            <block-selection :element="element" :index="index" />
          </div>
          <div class="col-md-auto pl-3 pr-sm-3 control">
            <block-controller :blocks="blocks" :element="element" :isblock="1" :iscontainer="0" :index="index" :ref="'blockcontroller' + element.id" />
          </div>
        </div>
      </template>
    </draggable>
    <div class="row mt-2 select-component-container">
      <div class="col-12">
        <div class="select-component">
          <select class="form-control form-control-sm short custom-select mb-2 mb-sm-0 mr-3" ref="block_type">
            <option v-for="(value, key) in enableBlocks" :value="key">{{value}}</option>
          </select>
          <label class="mb-1 mb-sm-0" v-if="currentLang === 'ja'"><input type="number" ref="insert_to" :value="blocks.length" min="0" :max="blocks.length" class="mr-1 form-control form-control-sm insert-position">{{ $t('insertAfter') }}</label>
          <label class="mb-0" v-else>{{ $t('insertAfter') }}<input type="number" ref="insert_to" :value="blocks.length" min="0" :max="blocks.length" class="mr-1 ml-1 form-control form-control-sm insert-position"></label>
          <br class="d-lg-none"><button type="button" class="btn btn-sm btn-primary ml-0 ml-lg-4 mt-2 mt-lg-0 add-block" v-on:click="addBlock" :disabled="disableAddButton">{{ $t("addBlock") }}</button>
        </div>
      </div>
    </div>
    <div class="row mt-2" v-if="showData">
      <details class="col-12">
        <summary>{{ $t('dataSaved') }}</summary>
        <textarea :id="columnName" :name="columnName" class="form-control box-border" rows="5" cols="50" readonly>{{cmsdata}}</textarea>
      </details>
    </div>
  `,

  data() {
    return {
      columnName: null,
      blocks: [],
      enableBlocks: null,
      showData: false,
    }
  },

  computed: {
    cmsdata() {
      let data = this.blocks.slice();
      // NOTE: 空ブロックを整理したいが、随時整理すると上下・削除ボタンが意図した動作にならない。保存時に整理する？
      // data = data.filter(function (item) {
      //   return item.asset_id || item.text || item.fields || item.containers;
      // });
      return JSON.stringify(data);
    },
    currentLang() {
      return this.$i18n.locale;
    },
    disableAddButton() {
      if (this.enableBlocks) {
        return Object.keys(this.enableBlocks).length ? false : true;
      }
      return true;
    }
  },

  methods: {
    generateId(length = 8) {
      let id = '';
      const characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
      const charactersLength = characters.length;
      for (let i = 0; i < length; i += 1) {
        id += characters.charAt(Math.floor(Math.random() * charactersLength));
      }
      return id;
    },

    addBlock() {
      const type = this.$refs.block_type.value;
      const insertTo = this.$refs.insert_to.value;
      const id = this.generateId();
      let blockData = {
        id: id,
        type: type,
      };
      window.componentBlocksSettings.setBlockData(this, blockData, type);

      if (insertTo && 0 <= insertTo && insertTo <= this.blocks.length) {
        this.blocks.splice(insertTo, 0, blockData);
      } else {
        this.blocks.push(blockData);
      }

      this.$nextTick(() => this.$refs['block' + id].focus());
    },

    onDragEnd(e) {
      e.item.querySelector('.handle').focus();
    },
  }
};

// NOTE: モーダルの値がinput[type="hidden"]に反映されたとき、要素にイベントを送信しないとVueに反映されない
//       他によい書き方はないだろうか？
document.addEventListener('DOMContentLoaded', () => {
  const target = document.querySelector('#modal iframe');
  const observer = new MutationObserver(function (mutations) {
    if (mutations[0]?.oldValue) {
      const params = new URLSearchParams(mutations[0].oldValue);
      if (params?.has('target')) {
        const targetId = params.get('target');
        if (targetId.indexOf('object_vue_edit') > -1) {
          const target = document.getElementById(targetId);
          target.dispatchEvent(new Event('input'));
        }
      }
    }
  });
  target && observer.observe(target, {
      attributes: true,
      attributeOldValue: true,
  });
});

export default ComponentBlocks;
