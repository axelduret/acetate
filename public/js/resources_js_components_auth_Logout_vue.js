/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_components_auth_Logout_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/auth/Logout.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/auth/Logout.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"default\": () => (__WEBPACK_DEFAULT_EXPORT__)\n/* harmony export */ });\n/* harmony import */ var vuex__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vuex */ \"./node_modules/vuex/dist/vuex.esm.js\");\nfunction ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }\n\nfunction _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _defineProperty(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }\n\nfunction _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }\n\n//\n//\n\n/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({\n  methods: _objectSpread({}, (0,vuex__WEBPACK_IMPORTED_MODULE_0__.mapActions)({\n    setId: \"user/setId\",\n    setUsername: \"user/setUsername\",\n    setFirstname: \"user/setFirstname\",\n    setLastname: \"user/setLastname\",\n    setEmail: \"user/setEmail\",\n    setLanguage: \"user/setLanguage\",\n    setTheme: \"user/setTheme\",\n    setAvatar: \"user/setAvatar\",\n    setApiToken: \"user/setApiToken\",\n    setRole: \"user/setRole\",\n    setAbilities: \"user/setAbilities\"\n  })),\n  computed: (0,vuex__WEBPACK_IMPORTED_MODULE_0__.mapGetters)({\n    getUserFields: \"user/getUserFields\"\n  }),\n  // Logout request.\n  mounted: function mounted() {\n    var _this = this;\n\n    axios.post(\"/api/logout/\" + localStorage.getItem(\"user_id\")).then(function () {\n      // Clear localStorage.\n      localStorage.removeItem(\"user_id\");\n      localStorage.removeItem(\"user_username\");\n      localStorage.removeItem(\"user_firstname\");\n      localStorage.removeItem(\"user_lastname\");\n      localStorage.removeItem(\"user_email\");\n      localStorage.removeItem(\"user_language\");\n      localStorage.removeItem(\"user_avatar\");\n      localStorage.removeItem(\"user_api_token\");\n      localStorage.removeItem(\"user_role\");\n      localStorage.removeItem(\"user_abilities\"); // Clear vuex store.\n\n      _this.setId(null);\n\n      _this.setUsername(null);\n\n      _this.setFirstname(null);\n\n      _this.setLastname(null);\n\n      _this.setEmail(null);\n\n      _this.setLanguage(null);\n\n      _this.setAvatar(null);\n\n      _this.setApiToken(null);\n\n      _this.setRole(null);\n\n      _this.setAbilities(null); // Redirect to home route.\n\n\n      _this.$router.push(\"/\".concat(_this.$i18n.locale, \"/home\"));\n    })[\"catch\"](function (errors) {\n      // Log errors.\n      console.log(errors);\n    })[\"finally\"](function () {});\n  }\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vcmVzb3VyY2VzL2pzL2NvbXBvbmVudHMvYXV0aC9Mb2dvdXQudnVlPzMzNDgiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6Ijs7Ozs7Ozs7Ozs7OztBQUdBO0FBRUE7QUFDQSw2QkFFQTtBQUNBLHVCQURBO0FBRUEsbUNBRkE7QUFHQSxxQ0FIQTtBQUlBLG1DQUpBO0FBS0EsNkJBTEE7QUFNQSxtQ0FOQTtBQU9BLDZCQVBBO0FBUUEsK0JBUkE7QUFTQSxtQ0FUQTtBQVVBLDJCQVZBO0FBV0E7QUFYQSxJQUZBLENBREE7QUFpQkE7QUFDQTtBQURBLElBakJBO0FBb0JBO0FBQ0EsU0FyQkEscUJBcUJBO0FBQUE7O0FBQ0EsVUFDQSxJQURBLENBQ0EsZ0RBREEsRUFFQSxJQUZBLENBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLGdEQVhBLENBWUE7O0FBQ0E7O0FBQ0E7O0FBQ0E7O0FBQ0E7O0FBQ0E7O0FBQ0E7O0FBQ0E7O0FBQ0E7O0FBQ0E7O0FBQ0EsK0JBdEJBLENBdUJBOzs7QUFDQTtBQUNBLEtBM0JBLFdBNEJBO0FBQ0E7QUFDQTtBQUNBLEtBL0JBLGFBZ0NBLGNBaENBO0FBaUNBO0FBdkRBIiwiZmlsZSI6Ii4vbm9kZV9tb2R1bGVzL2JhYmVsLWxvYWRlci9saWIvaW5kZXguanM/P2Nsb25lZFJ1bGVTZXQtNVswXS5ydWxlc1swXS51c2VbMF0hLi9ub2RlX21vZHVsZXMvdnVlLWxvYWRlci9saWIvaW5kZXguanM/P3Z1ZS1sb2FkZXItb3B0aW9ucyEuL3Jlc291cmNlcy9qcy9jb21wb25lbnRzL2F1dGgvTG9nb3V0LnZ1ZT92dWUmdHlwZT1zY3JpcHQmbGFuZz1qcyYuanMiLCJzb3VyY2VzQ29udGVudCI6WyI8dGVtcGxhdGU+PC90ZW1wbGF0ZT5cclxuXHJcbjxzY3JpcHQ+XHJcbmltcG9ydCB7IG1hcEdldHRlcnMsIG1hcEFjdGlvbnMgfSBmcm9tIFwidnVleFwiO1xyXG5cclxuZXhwb3J0IGRlZmF1bHQge1xyXG4gIG1ldGhvZHM6IHtcclxuICAgIC8vIFZ1ZXggc2V0dGVycy5cclxuICAgIC4uLm1hcEFjdGlvbnMoe1xyXG4gICAgICBzZXRJZDogXCJ1c2VyL3NldElkXCIsXHJcbiAgICAgIHNldFVzZXJuYW1lOiBcInVzZXIvc2V0VXNlcm5hbWVcIixcclxuICAgICAgc2V0Rmlyc3RuYW1lOiBcInVzZXIvc2V0Rmlyc3RuYW1lXCIsXHJcbiAgICAgIHNldExhc3RuYW1lOiBcInVzZXIvc2V0TGFzdG5hbWVcIixcclxuICAgICAgc2V0RW1haWw6IFwidXNlci9zZXRFbWFpbFwiLFxyXG4gICAgICBzZXRMYW5ndWFnZTogXCJ1c2VyL3NldExhbmd1YWdlXCIsXHJcbiAgICAgIHNldFRoZW1lOiBcInVzZXIvc2V0VGhlbWVcIixcclxuICAgICAgc2V0QXZhdGFyOiBcInVzZXIvc2V0QXZhdGFyXCIsXHJcbiAgICAgIHNldEFwaVRva2VuOiBcInVzZXIvc2V0QXBpVG9rZW5cIixcclxuICAgICAgc2V0Um9sZTogXCJ1c2VyL3NldFJvbGVcIixcclxuICAgICAgc2V0QWJpbGl0aWVzOiBcInVzZXIvc2V0QWJpbGl0aWVzXCIsXHJcbiAgICB9KSxcclxuICB9LFxyXG4gIGNvbXB1dGVkOiBtYXBHZXR0ZXJzKHtcclxuICAgIGdldFVzZXJGaWVsZHM6IFwidXNlci9nZXRVc2VyRmllbGRzXCIsXHJcbiAgfSksXHJcbiAgLy8gTG9nb3V0IHJlcXVlc3QuXHJcbiAgbW91bnRlZCgpIHtcclxuICAgIGF4aW9zXHJcbiAgICAgIC5wb3N0KFwiL2FwaS9sb2dvdXQvXCIgKyBsb2NhbFN0b3JhZ2UuZ2V0SXRlbShcInVzZXJfaWRcIikpXHJcbiAgICAgIC50aGVuKCgpID0+IHtcclxuICAgICAgICAvLyBDbGVhciBsb2NhbFN0b3JhZ2UuXHJcbiAgICAgICAgbG9jYWxTdG9yYWdlLnJlbW92ZUl0ZW0oXCJ1c2VyX2lkXCIpO1xyXG4gICAgICAgIGxvY2FsU3RvcmFnZS5yZW1vdmVJdGVtKFwidXNlcl91c2VybmFtZVwiKTtcclxuICAgICAgICBsb2NhbFN0b3JhZ2UucmVtb3ZlSXRlbShcInVzZXJfZmlyc3RuYW1lXCIpO1xyXG4gICAgICAgIGxvY2FsU3RvcmFnZS5yZW1vdmVJdGVtKFwidXNlcl9sYXN0bmFtZVwiKTtcclxuICAgICAgICBsb2NhbFN0b3JhZ2UucmVtb3ZlSXRlbShcInVzZXJfZW1haWxcIik7XHJcbiAgICAgICAgbG9jYWxTdG9yYWdlLnJlbW92ZUl0ZW0oXCJ1c2VyX2xhbmd1YWdlXCIpO1xyXG4gICAgICAgIGxvY2FsU3RvcmFnZS5yZW1vdmVJdGVtKFwidXNlcl9hdmF0YXJcIik7XHJcbiAgICAgICAgbG9jYWxTdG9yYWdlLnJlbW92ZUl0ZW0oXCJ1c2VyX2FwaV90b2tlblwiKTtcclxuICAgICAgICBsb2NhbFN0b3JhZ2UucmVtb3ZlSXRlbShcInVzZXJfcm9sZVwiKTtcclxuICAgICAgICBsb2NhbFN0b3JhZ2UucmVtb3ZlSXRlbShcInVzZXJfYWJpbGl0aWVzXCIpO1xyXG4gICAgICAgIC8vIENsZWFyIHZ1ZXggc3RvcmUuXHJcbiAgICAgICAgdGhpcy5zZXRJZChudWxsKTtcclxuICAgICAgICB0aGlzLnNldFVzZXJuYW1lKG51bGwpO1xyXG4gICAgICAgIHRoaXMuc2V0Rmlyc3RuYW1lKG51bGwpO1xyXG4gICAgICAgIHRoaXMuc2V0TGFzdG5hbWUobnVsbCk7XHJcbiAgICAgICAgdGhpcy5zZXRFbWFpbChudWxsKTtcclxuICAgICAgICB0aGlzLnNldExhbmd1YWdlKG51bGwpO1xyXG4gICAgICAgIHRoaXMuc2V0QXZhdGFyKG51bGwpO1xyXG4gICAgICAgIHRoaXMuc2V0QXBpVG9rZW4obnVsbCk7XHJcbiAgICAgICAgdGhpcy5zZXRSb2xlKG51bGwpO1xyXG4gICAgICAgIHRoaXMuc2V0QWJpbGl0aWVzKG51bGwpO1xyXG4gICAgICAgIC8vIFJlZGlyZWN0IHRvIGhvbWUgcm91dGUuXHJcbiAgICAgICAgdGhpcy4kcm91dGVyLnB1c2goYC8ke3RoaXMuJGkxOG4ubG9jYWxlfS9ob21lYCk7XHJcbiAgICAgIH0pXHJcbiAgICAgIC5jYXRjaCgoZXJyb3JzKSA9PiB7XHJcbiAgICAgICAgLy8gTG9nIGVycm9ycy5cclxuICAgICAgICBjb25zb2xlLmxvZyhlcnJvcnMpO1xyXG4gICAgICB9KVxyXG4gICAgICAuZmluYWxseSgoKSA9PiB7fSk7XHJcbiAgfSxcclxufTtcclxuPC9zY3JpcHQ+XHJcblxyXG48c3R5bGU+XHJcbjwvc3R5bGU+Il0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/auth/Logout.vue?vue&type=script&lang=js&\n");

/***/ }),

/***/ "./resources/js/components/auth/Logout.vue":
/*!*************************************************!*\
  !*** ./resources/js/components/auth/Logout.vue ***!
  \*************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"default\": () => (__WEBPACK_DEFAULT_EXPORT__)\n/* harmony export */ });\n/* harmony import */ var _Logout_vue_vue_type_template_id_4f27ba76___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Logout.vue?vue&type=template&id=4f27ba76& */ \"./resources/js/components/auth/Logout.vue?vue&type=template&id=4f27ba76&\");\n/* harmony import */ var _Logout_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Logout.vue?vue&type=script&lang=js& */ \"./resources/js/components/auth/Logout.vue?vue&type=script&lang=js&\");\n/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ \"./node_modules/vue-loader/lib/runtime/componentNormalizer.js\");\n\n\n\n\n\n/* normalize component */\n;\nvar component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(\n  _Logout_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,\n  _Logout_vue_vue_type_template_id_4f27ba76___WEBPACK_IMPORTED_MODULE_0__.render,\n  _Logout_vue_vue_type_template_id_4f27ba76___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,\n  false,\n  null,\n  null,\n  null\n  \n)\n\n/* hot reload */\nif (false) { var api; }\ncomponent.options.__file = \"resources/js/components/auth/Logout.vue\"\n/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvY29tcG9uZW50cy9hdXRoL0xvZ291dC52dWU/YzIxMSJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiOzs7Ozs7O0FBQXFGO0FBQzNCO0FBQ0w7OztBQUdyRDtBQUNBLENBQWdHO0FBQ2hHLGdCQUFnQixvR0FBVTtBQUMxQixFQUFFLHlFQUFNO0FBQ1IsRUFBRSw4RUFBTTtBQUNSLEVBQUUsdUZBQWU7QUFDakI7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQSxJQUFJLEtBQVUsRUFBRSxZQWlCZjtBQUNEO0FBQ0EsaUVBQWUsaUIiLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvY29tcG9uZW50cy9hdXRoL0xvZ291dC52dWUuanMiLCJzb3VyY2VzQ29udGVudCI6WyJpbXBvcnQgeyByZW5kZXIsIHN0YXRpY1JlbmRlckZucyB9IGZyb20gXCIuL0xvZ291dC52dWU/dnVlJnR5cGU9dGVtcGxhdGUmaWQ9NGYyN2JhNzYmXCJcbmltcG9ydCBzY3JpcHQgZnJvbSBcIi4vTG9nb3V0LnZ1ZT92dWUmdHlwZT1zY3JpcHQmbGFuZz1qcyZcIlxuZXhwb3J0ICogZnJvbSBcIi4vTG9nb3V0LnZ1ZT92dWUmdHlwZT1zY3JpcHQmbGFuZz1qcyZcIlxuXG5cbi8qIG5vcm1hbGl6ZSBjb21wb25lbnQgKi9cbmltcG9ydCBub3JtYWxpemVyIGZyb20gXCIhLi4vLi4vLi4vLi4vbm9kZV9tb2R1bGVzL3Z1ZS1sb2FkZXIvbGliL3J1bnRpbWUvY29tcG9uZW50Tm9ybWFsaXplci5qc1wiXG52YXIgY29tcG9uZW50ID0gbm9ybWFsaXplcihcbiAgc2NyaXB0LFxuICByZW5kZXIsXG4gIHN0YXRpY1JlbmRlckZucyxcbiAgZmFsc2UsXG4gIG51bGwsXG4gIG51bGwsXG4gIG51bGxcbiAgXG4pXG5cbi8qIGhvdCByZWxvYWQgKi9cbmlmIChtb2R1bGUuaG90KSB7XG4gIHZhciBhcGkgPSByZXF1aXJlKFwiRDpcXFxcV2ViRGV2XFxcXFByb2plY3RzXFxcXGxpZi10YXR0b29cXFxcbm9kZV9tb2R1bGVzXFxcXHZ1ZS1ob3QtcmVsb2FkLWFwaVxcXFxkaXN0XFxcXGluZGV4LmpzXCIpXG4gIGFwaS5pbnN0YWxsKHJlcXVpcmUoJ3Z1ZScpKVxuICBpZiAoYXBpLmNvbXBhdGlibGUpIHtcbiAgICBtb2R1bGUuaG90LmFjY2VwdCgpXG4gICAgaWYgKCFhcGkuaXNSZWNvcmRlZCgnNGYyN2JhNzYnKSkge1xuICAgICAgYXBpLmNyZWF0ZVJlY29yZCgnNGYyN2JhNzYnLCBjb21wb25lbnQub3B0aW9ucylcbiAgICB9IGVsc2Uge1xuICAgICAgYXBpLnJlbG9hZCgnNGYyN2JhNzYnLCBjb21wb25lbnQub3B0aW9ucylcbiAgICB9XG4gICAgbW9kdWxlLmhvdC5hY2NlcHQoXCIuL0xvZ291dC52dWU/dnVlJnR5cGU9dGVtcGxhdGUmaWQ9NGYyN2JhNzYmXCIsIGZ1bmN0aW9uICgpIHtcbiAgICAgIGFwaS5yZXJlbmRlcignNGYyN2JhNzYnLCB7XG4gICAgICAgIHJlbmRlcjogcmVuZGVyLFxuICAgICAgICBzdGF0aWNSZW5kZXJGbnM6IHN0YXRpY1JlbmRlckZuc1xuICAgICAgfSlcbiAgICB9KVxuICB9XG59XG5jb21wb25lbnQub3B0aW9ucy5fX2ZpbGUgPSBcInJlc291cmNlcy9qcy9jb21wb25lbnRzL2F1dGgvTG9nb3V0LnZ1ZVwiXG5leHBvcnQgZGVmYXVsdCBjb21wb25lbnQuZXhwb3J0cyJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/components/auth/Logout.vue\n");

/***/ }),

/***/ "./resources/js/components/auth/Logout.vue?vue&type=script&lang=js&":
/*!**************************************************************************!*\
  !*** ./resources/js/components/auth/Logout.vue?vue&type=script&lang=js& ***!
  \**************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"default\": () => (__WEBPACK_DEFAULT_EXPORT__)\n/* harmony export */ });\n/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Logout_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Logout.vue?vue&type=script&lang=js& */ \"./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/auth/Logout.vue?vue&type=script&lang=js&\");\n /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Logout_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); //# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvY29tcG9uZW50cy9hdXRoL0xvZ291dC52dWU/MDU3YyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiOzs7OztBQUFzTixDQUFDLGlFQUFlLHdNQUFHLEVBQUMiLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvY29tcG9uZW50cy9hdXRoL0xvZ291dC52dWU/dnVlJnR5cGU9c2NyaXB0Jmxhbmc9anMmLmpzIiwic291cmNlc0NvbnRlbnQiOlsiaW1wb3J0IG1vZCBmcm9tIFwiLSEuLi8uLi8uLi8uLi9ub2RlX21vZHVsZXMvYmFiZWwtbG9hZGVyL2xpYi9pbmRleC5qcz8/Y2xvbmVkUnVsZVNldC01WzBdLnJ1bGVzWzBdLnVzZVswXSEuLi8uLi8uLi8uLi9ub2RlX21vZHVsZXMvdnVlLWxvYWRlci9saWIvaW5kZXguanM/P3Z1ZS1sb2FkZXItb3B0aW9ucyEuL0xvZ291dC52dWU/dnVlJnR5cGU9c2NyaXB0Jmxhbmc9anMmXCI7IGV4cG9ydCBkZWZhdWx0IG1vZDsgZXhwb3J0ICogZnJvbSBcIi0hLi4vLi4vLi4vLi4vbm9kZV9tb2R1bGVzL2JhYmVsLWxvYWRlci9saWIvaW5kZXguanM/P2Nsb25lZFJ1bGVTZXQtNVswXS5ydWxlc1swXS51c2VbMF0hLi4vLi4vLi4vLi4vbm9kZV9tb2R1bGVzL3Z1ZS1sb2FkZXIvbGliL2luZGV4LmpzPz92dWUtbG9hZGVyLW9wdGlvbnMhLi9Mb2dvdXQudnVlP3Z1ZSZ0eXBlPXNjcmlwdCZsYW5nPWpzJlwiIl0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/js/components/auth/Logout.vue?vue&type=script&lang=js&\n");

/***/ }),

/***/ "./resources/js/components/auth/Logout.vue?vue&type=template&id=4f27ba76&":
/*!********************************************************************************!*\
  !*** ./resources/js/components/auth/Logout.vue?vue&type=template&id=4f27ba76& ***!
  \********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Logout_vue_vue_type_template_id_4f27ba76___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Logout_vue_vue_type_template_id_4f27ba76___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Logout_vue_vue_type_template_id_4f27ba76___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Logout.vue?vue&type=template&id=4f27ba76& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/auth/Logout.vue?vue&type=template&id=4f27ba76&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/auth/Logout.vue?vue&type=template&id=4f27ba76&":
/*!***********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/auth/Logout.vue?vue&type=template&id=4f27ba76& ***!
  \***********************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"render\": () => (/* binding */ render),\n/* harmony export */   \"staticRenderFns\": () => (/* binding */ staticRenderFns)\n/* harmony export */ });\nvar render = function() {\n  var _vm = this\n  var _h = _vm.$createElement\n  var _c = _vm._self._c || _h\n  return _c(\"div\")\n}\nvar staticRenderFns = []\nrender._withStripped = true\n\n//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvY29tcG9uZW50cy9hdXRoL0xvZ291dC52dWU/ZTFkNSJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiOzs7OztBQUFBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EiLCJmaWxlIjoiLi9ub2RlX21vZHVsZXMvdnVlLWxvYWRlci9saWIvbG9hZGVycy90ZW1wbGF0ZUxvYWRlci5qcz8/dnVlLWxvYWRlci1vcHRpb25zIS4vbm9kZV9tb2R1bGVzL3Z1ZS1sb2FkZXIvbGliL2luZGV4LmpzPz92dWUtbG9hZGVyLW9wdGlvbnMhLi9yZXNvdXJjZXMvanMvY29tcG9uZW50cy9hdXRoL0xvZ291dC52dWU/dnVlJnR5cGU9dGVtcGxhdGUmaWQ9NGYyN2JhNzYmLmpzIiwic291cmNlc0NvbnRlbnQiOlsidmFyIHJlbmRlciA9IGZ1bmN0aW9uKCkge1xuICB2YXIgX3ZtID0gdGhpc1xuICB2YXIgX2ggPSBfdm0uJGNyZWF0ZUVsZW1lbnRcbiAgdmFyIF9jID0gX3ZtLl9zZWxmLl9jIHx8IF9oXG4gIHJldHVybiBfYyhcImRpdlwiKVxufVxudmFyIHN0YXRpY1JlbmRlckZucyA9IFtdXG5yZW5kZXIuX3dpdGhTdHJpcHBlZCA9IHRydWVcblxuZXhwb3J0IHsgcmVuZGVyLCBzdGF0aWNSZW5kZXJGbnMgfSJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/auth/Logout.vue?vue&type=template&id=4f27ba76&\n");

/***/ })

}]);