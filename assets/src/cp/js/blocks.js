import { mapState } from 'vuex';

document.addEventListener("register-block-option-components", function(e) {
    e.detail['bootstrap-footer-menu'] = {
        computed: {
            ...mapState(['editedBlock'])
        },
        props: {
            block: Object,
            errors: Object
        },
        mounted: function () {
            this.$nextTick(() => {
                Craft.initUiElements(this.$el);
                $(this.$el).find('.lightswitch').on('change', (e) => {
                    let options = {
                        test: $(e.target).hasClass('on')
                    };
                    this.$emit('updateOptions', options);
                });
            });
        },
        template: `
        <div class="field">
            <div class="heading">
                <label>{{ t('Test') }}</label>
            </div>
            <div class="input ltr">                    
                <button type="button" :class="{lightswitch: true, on: block.options.test}">
                    <div class="lightswitch-container">
                        <div class="handle"></div>
                    </div>
                    <input type="hidden" name="test" :value="block.options.test ? 1 : ''">
                </button>
            </div>
        </div>`,
        emits: ['updateOptions']
    };
});