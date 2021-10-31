document.addEventListener("register-field-displayers-components", function(e) {
    e.detail['asset_carousel'] = {
        props: {
            displayer: Object,
            options: Object,
            errors: Object
        },
        emits: ['updateOptions'],
        template: `
        <div>
            <div class="field" v-for="elem, volumeUid in displayer.viewModes">
                <div class="heading">
                    <label class="required">{{ t('View mode for volume {volume}', {volume: elem.label}) }}</label>
                </div>
                <div class="input ltr">                    
                    <div class="select">
                        <select v-model="options.viewModes[volumeUid]" @change="$emit('updateOptions', {viewModes: options.viewModes})">
                            <option v-for="label, uid in elem.viewModes" :value="uid">{{ label }}</option>
                        </select>
                    </div>
                </div>
                <ul class="errors" v-if="errors['viewMode-'+volumeUid]">
                    <li v-for="error in errors['viewMode-'+volumeUid]">{{ error }}</li>
                </ul>
            </div>
            <div class="field" v-if="displayer.viewModes.length == 0">
                <div class="warning with-icon">
                    {{ t("It seems this field doesn't have any valid source") }}
                </div>
            </div>
            <div class="field">
                <div class="heading">
                    <label>{{ t('Show controls', {}, 'bootstrap-theme') }}</label>
                </div>
                <lightswitch :on="options.showControls" @change="$emit('updateOptions', {showControls: $event})">
                </lightswitch>
            </div>
            <div class="field">
                <div class="heading">
                    <label>{{ t('Show indicators', {}, 'bootstrap-theme') }}</label>
                </div>
                <lightswitch :on="options.showIndicators" @change="$emit('updateOptions', {showIndicators: $event})">
                </lightswitch>
            </div>
            <div class="field">
                <div class="heading">
                    <label>{{ t('Disable touch swipe', {}, 'bootstrap-theme') }}</label>
                </div>
                <lightswitch :on="options.disableTouch" @change="$emit('updateOptions', {disableTouch: $event})">
                </lightswitch>
            </div>
            <div class="field">
                <div class="heading">
                    <label>{{ t('Fade instead of slide', {}, 'bootstrap-theme') }}</label>
                </div>
                <lightswitch :on="options.fadeAnimation" @change="$emit('updateOptions', {fadeAnimation: $event})">
                </lightswitch>
            </div>
            <div class="field">
                <div class="heading">
                    <label>{{ t('Autostart cycling', {}, 'bootstrap-theme') }}</label>
                </div>
                <lightswitch :on="options.autoStart" @change="$emit('updateOptions', {autoStart: $event})">
                </lightswitch>
            </div>
            <div class="field">
                <div class="heading">
                    <label>{{ t('Pause on hover', {}, 'bootstrap-theme') }}</label>
                </div>
                <lightswitch :on="options.pause" @change="$emit('updateOptions', {pause: $event})">
                </lightswitch>
            </div>
            <div class="field">
                <div class="heading">
                    <label>{{ t('Infinite', {}, 'bootstrap-theme') }}</label>
                </div>
                <lightswitch :on="options.infinite" @change="$emit('updateOptions', {infinite: $event})">
                </lightswitch>
            </div>
            <div class="field">
                <div class="heading">
                    <label>{{ t('Disable keyboard', {}, 'bootstrap-theme') }}</label>
                </div>
                <lightswitch :on="options.disableKeyboard" @change="$emit('updateOptions', {disableKeyboard: $event})">
                </lightswitch>
            </div>
            <div class="field">
                <div class="heading">
                    <label>{{ t('Interval between each slide (ms)', {}, 'bootstrap-theme') }}</label>
                </div>
                <div class="input ltr">
                    <input type="number" class="fullwidth text" @input="$emit('updateOptions', {interval: $event.target.value})" min="100" step="100" :value="options.interval">
                </div>
                <ul class="errors" v-if="errors.interval">
                    <li v-for="error in errors.interval">{{ error }}</li>
                </ul>
            </div>
        </div>`
    };
});
