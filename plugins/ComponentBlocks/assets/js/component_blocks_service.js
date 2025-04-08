window.fieldService = {
  addField(element, type) {
    const id = window.componentBlocksSettings.setFieldData(this, element, type);
    this.$nextTick(() => {
      if (this.$refs['field' + id]) {
        this.$refs['field' + id].focus()
      }
    });
  },

  onDragEnd(e) {
    this.$root.onDragEnd(e);
  },

  setText(e) {
    e.target.bodyElement.dispatchEvent(new Event('input'));
  }
};

window.componentBlocksStore = Vue.reactive({
  initTextEditor: {
    // https://github.com/tinymce/tinymce-vue/issues/33
    language: 'ja',
    menubar: false,
    inline: true,
    relative_urls : false,
    convert_urls: true,
    plugins: ['link', 'lists', 'code'],
    toolbar: 'bold italic superscript subscript | bullist numlist | link | removeformat code',
    setup: componentBlocksSettings.editorOnSetup,
  },
});

window.componentBlocksValidation = () => {
  const validate = (block, rule, root = null) => {
    for (const prop in block) {
      if (rule[prop] && rule[prop].required) {
        if (block[prop] === null || block[prop] === '' || block[prop].toString() === '') {
          const label = rule[prop].label;
          const edit = rule[prop].edit;
          const labelIsRequired = window.componentBlocksSettings.phrases.labelIsRequired.replace('${label}', label);
          const editNotEntered = window.componentBlocksSettings.phrases.editNotEntered.replace('${edit}', edit);
          const message = label ? labelIsRequired : editNotEntered;
          if (!block.invalidMessages) {
            block.invalidMessages = [];
          }

          if (root) {
            root.invalid = true;
            root.invalidMessages.push(message);
          } else {
            block.invalid = true;
            block.invalidMessages.push(message);
          }
        }
      }
    };
  };

  const checkContainer = (containerBlock) => {
    containerBlock.containers.forEach((container) => {
      container.blocks.forEach((block) => {
        block.invalid = false;
        block.invalidMessages = [];
        const rule = validateRules[block.type] ?? null;
        if (block.useMultiBlock) {
          checkContainer(block);
        }
        if (rule) {
          validate(block, rule);
          if (rule.fields) {
            block.fields.forEach((field) => {
              validate(field, rule, block);
            });
          }
        }
      });
    });
  };

  return new Promise((resolve) => {
    const promises = window.componentBlocks.map((blockData) => {
      return new Promise((resolve) => {
        const [vm, validateRules] = blockData;

        vm.$data.blocks.forEach((block) => {
          const rule = validateRules[block.type] ?? null;
          block.invalid = false; // NOTE: 製品提供のバリデーションと独自バリデーションは同時利用できないことになる
          block.invalidMessages = [];
          if (rule) {
            validate(block, rule);
            if (rule.fields) {
              block.fields.forEach((field) => {
                validate(field, rule, block);
              });
            }
          }
          if (block.useMultiBlock) {
            checkContainer(block);
          }

          block.invalidMessages = [...new Set(block.invalidMessages)]; // NOTE: 重複を削除
        });

        vm.$nextTick(() => {
          resolve();
        });
      });
    });

    Promise.all(promises).then(resolve);
  });
};
