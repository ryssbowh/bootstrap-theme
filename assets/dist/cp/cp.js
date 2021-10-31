/******/ (function(modules) { // webpackBootstrap
/******/ 	// install a JSONP callback for chunk loading
/******/ 	function webpackJsonpCallback(data) {
/******/ 		var chunkIds = data[0];
/******/ 		var moreModules = data[1];
/******/ 		var executeModules = data[2];
/******/
/******/ 		// add "moreModules" to the modules object,
/******/ 		// then flag all "chunkIds" as loaded and fire callback
/******/ 		var moduleId, chunkId, i = 0, resolves = [];
/******/ 		for(;i < chunkIds.length; i++) {
/******/ 			chunkId = chunkIds[i];
/******/ 			if(Object.prototype.hasOwnProperty.call(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 				resolves.push(installedChunks[chunkId][0]);
/******/ 			}
/******/ 			installedChunks[chunkId] = 0;
/******/ 		}
/******/ 		for(moduleId in moreModules) {
/******/ 			if(Object.prototype.hasOwnProperty.call(moreModules, moduleId)) {
/******/ 				modules[moduleId] = moreModules[moduleId];
/******/ 			}
/******/ 		}
/******/ 		if(parentJsonpFunction) parentJsonpFunction(data);
/******/
/******/ 		while(resolves.length) {
/******/ 			resolves.shift()();
/******/ 		}
/******/
/******/ 		// add entry modules from loaded chunk to deferred list
/******/ 		deferredModules.push.apply(deferredModules, executeModules || []);
/******/
/******/ 		// run deferred modules when all chunks ready
/******/ 		return checkDeferredModules();
/******/ 	};
/******/ 	function checkDeferredModules() {
/******/ 		var result;
/******/ 		for(var i = 0; i < deferredModules.length; i++) {
/******/ 			var deferredModule = deferredModules[i];
/******/ 			var fulfilled = true;
/******/ 			for(var j = 1; j < deferredModule.length; j++) {
/******/ 				var depId = deferredModule[j];
/******/ 				if(installedChunks[depId] !== 0) fulfilled = false;
/******/ 			}
/******/ 			if(fulfilled) {
/******/ 				deferredModules.splice(i--, 1);
/******/ 				result = __webpack_require__(__webpack_require__.s = deferredModule[0]);
/******/ 			}
/******/ 		}
/******/
/******/ 		return result;
/******/ 	}
/******/
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// object to store loaded and loading chunks
/******/ 	// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 	// Promise = chunk loading, 0 = chunk loaded
/******/ 	var installedChunks = {
/******/ 		"cp": 0
/******/ 	};
/******/
/******/ 	var deferredModules = [];
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	var jsonpArray = window["webpackJsonp"] = window["webpackJsonp"] || [];
/******/ 	var oldJsonpFunction = jsonpArray.push.bind(jsonpArray);
/******/ 	jsonpArray.push = webpackJsonpCallback;
/******/ 	jsonpArray = jsonpArray.slice();
/******/ 	for(var i = 0; i < jsonpArray.length; i++) webpackJsonpCallback(jsonpArray[i]);
/******/ 	var parentJsonpFunction = oldJsonpFunction;
/******/
/******/
/******/ 	// add entry module to deferred list
/******/ 	deferredModules.push(["fNpb","vendor~cp"]);
/******/ 	// run deferred modules when ready
/******/ 	return checkDeferredModules();
/******/ })
/************************************************************************/
/******/ ({

/***/ "fNpb":
/*!**************************!*\
  !*** ./assets/src/cp.js ***!
  \**************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _cp_js_blocks_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./cp/js/blocks.js */ "pwyi");
/* harmony import */ var _cp_js_fieldDisplayers_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./cp/js/fieldDisplayers.js */ "h46a");
/* harmony import */ var _cp_js_fieldDisplayers_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_cp_js_fieldDisplayers_js__WEBPACK_IMPORTED_MODULE_1__);
/**
 * Import here any npm modules and your own js/scss
 * You can import npm modules as css, scss or js
 */

/**************
 * Javascript
 **************/
//App



/***/ }),

/***/ "h46a":
/*!*********************************************!*\
  !*** ./assets/src/cp/js/fieldDisplayers.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

document.addEventListener("register-field-displayers-components", function (e) {
  e.detail['asset_carousel'] = {
    props: {
      displayer: Object,
      options: Object,
      errors: Object
    },
    emits: ['updateOptions'],
    template: "\n        <div>\n            <div class=\"field\" v-for=\"elem, volumeUid in displayer.viewModes\">\n                <div class=\"heading\">\n                    <label class=\"required\">{{ t('View mode for volume {volume}', {volume: elem.label}) }}</label>\n                </div>\n                <div class=\"input ltr\">                    \n                    <div class=\"select\">\n                        <select v-model=\"options.viewModes[volumeUid]\" @change=\"$emit('updateOptions', {viewModes: options.viewModes})\">\n                            <option v-for=\"label, uid in elem.viewModes\" :value=\"uid\">{{ label }}</option>\n                        </select>\n                    </div>\n                </div>\n                <ul class=\"errors\" v-if=\"errors['viewMode-'+volumeUid]\">\n                    <li v-for=\"error in errors['viewMode-'+volumeUid]\">{{ error }}</li>\n                </ul>\n            </div>\n            <div class=\"field\" v-if=\"displayer.viewModes.length == 0\">\n                <div class=\"warning with-icon\">\n                    {{ t(\"It seems this field doesn't have any valid source\") }}\n                </div>\n            </div>\n            <div class=\"field\">\n                <div class=\"heading\">\n                    <label>{{ t('Show controls', {}, 'bootstrap-theme') }}</label>\n                </div>\n                <lightswitch :on=\"options.showControls\" @change=\"$emit('updateOptions', {showControls: $event})\">\n                </lightswitch>\n            </div>\n            <div class=\"field\">\n                <div class=\"heading\">\n                    <label>{{ t('Show indicators', {}, 'bootstrap-theme') }}</label>\n                </div>\n                <lightswitch :on=\"options.showIndicators\" @change=\"$emit('updateOptions', {showIndicators: $event})\">\n                </lightswitch>\n            </div>\n            <div class=\"field\">\n                <div class=\"heading\">\n                    <label>{{ t('Disable touch swipe', {}, 'bootstrap-theme') }}</label>\n                </div>\n                <lightswitch :on=\"options.disableTouch\" @change=\"$emit('updateOptions', {disableTouch: $event})\">\n                </lightswitch>\n            </div>\n            <div class=\"field\">\n                <div class=\"heading\">\n                    <label>{{ t('Fade instead of slide', {}, 'bootstrap-theme') }}</label>\n                </div>\n                <lightswitch :on=\"options.fadeAnimation\" @change=\"$emit('updateOptions', {fadeAnimation: $event})\">\n                </lightswitch>\n            </div>\n            <div class=\"field\">\n                <div class=\"heading\">\n                    <label>{{ t('Autostart cycling', {}, 'bootstrap-theme') }}</label>\n                </div>\n                <lightswitch :on=\"options.autoStart\" @change=\"$emit('updateOptions', {autoStart: $event})\">\n                </lightswitch>\n            </div>\n            <div class=\"field\">\n                <div class=\"heading\">\n                    <label>{{ t('Pause on hover', {}, 'bootstrap-theme') }}</label>\n                </div>\n                <lightswitch :on=\"options.pause\" @change=\"$emit('updateOptions', {pause: $event})\">\n                </lightswitch>\n            </div>\n            <div class=\"field\">\n                <div class=\"heading\">\n                    <label>{{ t('Infinite', {}, 'bootstrap-theme') }}</label>\n                </div>\n                <lightswitch :on=\"options.infinite\" @change=\"$emit('updateOptions', {infinite: $event})\">\n                </lightswitch>\n            </div>\n            <div class=\"field\">\n                <div class=\"heading\">\n                    <label>{{ t('Disable keyboard', {}, 'bootstrap-theme') }}</label>\n                </div>\n                <lightswitch :on=\"options.disableKeyboard\" @change=\"$emit('updateOptions', {disableKeyboard: $event})\">\n                </lightswitch>\n            </div>\n            <div class=\"field\">\n                <div class=\"heading\">\n                    <label>{{ t('Interval between each slide (ms)', {}, 'bootstrap-theme') }}</label>\n                </div>\n                <div class=\"input ltr\">\n                    <input type=\"number\" class=\"fullwidth text\" @input=\"$emit('updateOptions', {interval: $event.target.value})\" min=\"100\" step=\"100\" :value=\"options.interval\">\n                </div>\n                <ul class=\"errors\" v-if=\"errors.interval\">\n                    <li v-for=\"error in errors.interval\">{{ error }}</li>\n                </ul>\n            </div>\n        </div>"
  };
});

/***/ }),

/***/ "pwyi":
/*!************************************!*\
  !*** ./assets/src/cp/js/blocks.js ***!
  \************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var core_js_modules_es_array_find_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! core-js/modules/es.array.find.js */ "fbCW");
/* harmony import */ var core_js_modules_es_array_find_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_find_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var core_js_modules_es_object_define_property_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! core-js/modules/es.object.define-property.js */ "eoL8");
/* harmony import */ var core_js_modules_es_object_define_property_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_define_property_js__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var core_js_modules_es_object_keys_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! core-js/modules/es.object.keys.js */ "tkto");
/* harmony import */ var core_js_modules_es_object_keys_js__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_keys_js__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var core_js_modules_es_symbol_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! core-js/modules/es.symbol.js */ "pNMO");
/* harmony import */ var core_js_modules_es_symbol_js__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_symbol_js__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var core_js_modules_es_array_filter_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! core-js/modules/es.array.filter.js */ "TeQF");
/* harmony import */ var core_js_modules_es_array_filter_js__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_filter_js__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var core_js_modules_es_object_get_own_property_descriptor_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! core-js/modules/es.object.get-own-property-descriptor.js */ "5DmW");
/* harmony import */ var core_js_modules_es_object_get_own_property_descriptor_js__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_get_own_property_descriptor_js__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var core_js_modules_es_array_for_each_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! core-js/modules/es.array.for-each.js */ "QWBl");
/* harmony import */ var core_js_modules_es_array_for_each_js__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_for_each_js__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var core_js_modules_web_dom_collections_for_each_js__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! core-js/modules/web.dom-collections.for-each.js */ "FZtP");
/* harmony import */ var core_js_modules_web_dom_collections_for_each_js__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_web_dom_collections_for_each_js__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var core_js_modules_es_object_get_own_property_descriptors_js__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! core-js/modules/es.object.get-own-property-descriptors.js */ "27RR");
/* harmony import */ var core_js_modules_es_object_get_own_property_descriptors_js__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_get_own_property_descriptors_js__WEBPACK_IMPORTED_MODULE_8__);
/* harmony import */ var core_js_modules_es_object_define_properties_js__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! core-js/modules/es.object.define-properties.js */ "HRxU");
/* harmony import */ var core_js_modules_es_object_define_properties_js__WEBPACK_IMPORTED_MODULE_9___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_define_properties_js__WEBPACK_IMPORTED_MODULE_9__);
/* harmony import */ var vuex__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! vuex */ "VQKG");











function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _defineProperty(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }


document.addEventListener("register-block-option-components", function (e) {
  e.detail['bootstrap-footer-menu'] = {
    computed: _objectSpread({}, Object(vuex__WEBPACK_IMPORTED_MODULE_10__["mapState"])(['editedBlock'])),
    props: {
      block: Object,
      errors: Object
    },
    mounted: function mounted() {
      var _this = this;

      this.$nextTick(function () {
        Craft.initUiElements(_this.$el);
        $(_this.$el).find('.lightswitch').on('change', function (e) {
          var options = {
            test: $(e.target).hasClass('on')
          };

          _this.$emit('updateOptions', options);
        });
      });
    },
    template: "\n        <div class=\"field\">\n            <div class=\"heading\">\n                <label>{{ t('Test') }}</label>\n            </div>\n            <div class=\"input ltr\">                    \n                <button type=\"button\" :class=\"{lightswitch: true, on: block.options.test}\">\n                    <div class=\"lightswitch-container\">\n                        <div class=\"handle\"></div>\n                    </div>\n                    <input type=\"hidden\" name=\"test\" :value=\"block.options.test ? 1 : ''\">\n                </button>\n            </div>\n        </div>",
    emits: ['updateOptions']
  };
});

/***/ })

/******/ });
//# sourceMappingURL=cp.js.map