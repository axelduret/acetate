(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_components_pages_Events_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/pages/Events.vue?vue&type=script&lang=js&":
/*!*******************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/pages/Events.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  data: function data() {
    return {
      overlay: true,
      perPage: 50,
      events: "",
      appURL: "http://127.0.0.1:8001",
      baseURL: "/",
      apiToken: "2|qjUxaiyEIh49NzPoEpDsvsshY8q9pAy8VuPAxlZp",
      eventTab: null,
      eventTabs: [{
        name: "all",
        method: "all"
      }, {
        name: "conference",
        method: "conference"
      }, {
        name: "exhibition",
        method: "exhibition"
      }, {
        name: "music",
        method: "music"
      }, {
        name: "theater",
        method: "theater"
      }],
      query: null
    };
  },
  mounted: function mounted() {
    var _this = this;

    this.$nextTick(function () {
      _this.showTab("all");
    });
  },
  updated: function updated() {
    this.$nextTick(function () {});
  },
  methods: {
    showTab: function showTab(item) {
      var _this2 = this;

      this.events = null;
      this.overlay = true;

      if (item === "all") {
        this.query = "events?per_page=";
      } else {
        this.query = "events?type=" + item + "&per_page=";
      }

      axios.request({
        url: this.query + this.perPage,
        method: "get",
        baseURL: "/api/",
        headers: {
          Authorization: "Bearer " + this.apiToken
        }
      }).then(function (response) {
        _this2.events = response.data.events;
      })["catch"](function (error) {
        console.log(error);
      })["finally"](function () {
        _this2.overlay = false;
        return _this2.events;
      });
    },
    showEvent: function showEvent(id) {
      this.$router.push("events/" + id);
    },
    showPerson: function showPerson(id) {
      this.$router.push("people/" + id);
    },
    showVenue: function showVenue(id) {
      this.$router.push("venues/" + id);
    }
  }
});

/***/ }),

/***/ "./resources/js/components/pages/Events.vue":
/*!**************************************************!*\
  !*** ./resources/js/components/pages/Events.vue ***!
  \**************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Events_vue_vue_type_template_id_5f8650a2___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Events.vue?vue&type=template&id=5f8650a2& */ "./resources/js/components/pages/Events.vue?vue&type=template&id=5f8650a2&");
/* harmony import */ var _Events_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Events.vue?vue&type=script&lang=js& */ "./resources/js/components/pages/Events.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(
  _Events_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _Events_vue_vue_type_template_id_5f8650a2___WEBPACK_IMPORTED_MODULE_0__.render,
  _Events_vue_vue_type_template_id_5f8650a2___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/pages/Events.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/components/pages/Events.vue?vue&type=script&lang=js&":
/*!***************************************************************************!*\
  !*** ./resources/js/components/pages/Events.vue?vue&type=script&lang=js& ***!
  \***************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Events_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Events.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/pages/Events.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Events_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/components/pages/Events.vue?vue&type=template&id=5f8650a2&":
/*!*********************************************************************************!*\
  !*** ./resources/js/components/pages/Events.vue?vue&type=template&id=5f8650a2& ***!
  \*********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Events_vue_vue_type_template_id_5f8650a2___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Events_vue_vue_type_template_id_5f8650a2___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Events_vue_vue_type_template_id_5f8650a2___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Events.vue?vue&type=template&id=5f8650a2& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/pages/Events.vue?vue&type=template&id=5f8650a2&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/pages/Events.vue?vue&type=template&id=5f8650a2&":
/*!************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/pages/Events.vue?vue&type=template&id=5f8650a2& ***!
  \************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render),
/* harmony export */   "staticRenderFns": () => (/* binding */ staticRenderFns)
/* harmony export */ });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "v-container",
    [
      _c(
        "div",
        [
          _c(
            "v-tabs",
            {
              attrs: {
                "show-arrows": "",
                "background-color": "appBackground",
                color: _vm.$vuetify.theme.dark ? "primary" : "secondary",
                grow: ""
              },
              model: {
                value: _vm.eventTab,
                callback: function($$v) {
                  _vm.eventTab = $$v
                },
                expression: "eventTab"
              }
            },
            _vm._l(_vm.eventTabs, function(tab, index) {
              return _c(
                "v-tab",
                {
                  key: index,
                  on: {
                    click: function($event) {
                      return _vm.showTab(tab.method)
                    }
                  }
                },
                [_vm._v(_vm._s(_vm.$t("page.events.tabs." + tab.name)))]
              )
            }),
            1
          ),
          _vm._v(" "),
          _c(
            "v-tabs-items",
            {
              model: {
                value: _vm.eventTab,
                callback: function($$v) {
                  _vm.eventTab = $$v
                },
                expression: "eventTab"
              }
            },
            _vm._l(_vm.eventTabs, function(tab, index) {
              return _c(
                "v-tab-item",
                { key: index },
                [
                  _c("v-container", [
                    _c(
                      "div",
                      [
                        _c(
                          "v-row",
                          { attrs: { dense: "" } },
                          _vm._l(_vm.events, function(event, index) {
                            return _c(
                              "v-col",
                              {
                                key: index,
                                attrs: {
                                  cols: "12",
                                  sm: "12",
                                  md: "6",
                                  lg: "4",
                                  xl: "3"
                                }
                              },
                              [
                                _c(
                                  "v-card",
                                  {
                                    staticClass: "mx-auto pb-4",
                                    attrs: { "max-width": "500px" }
                                  },
                                  [
                                    _c(
                                      "div",
                                      [
                                        _c(
                                          "v-list-item",
                                          {
                                            staticClass: "greybg rounded-t",
                                            attrs: { "three-line": "" }
                                          },
                                          [
                                            _c(
                                              "v-list-item-avatar",
                                              {
                                                staticClass: "rounded",
                                                attrs: {
                                                  tile: "",
                                                  size: "80",
                                                  color: _vm.$vuetify.theme.dark
                                                    ? "primary"
                                                    : "white"
                                                }
                                              },
                                              [
                                                _c("v-img", {
                                                  attrs: {
                                                    src:
                                                      _vm.appURL +
                                                      _vm.baseURL +
                                                      event.avatar,
                                                    title: event.name
                                                  }
                                                })
                                              ],
                                              1
                                            ),
                                            _vm._v(" "),
                                            _c(
                                              "v-list-item-content",
                                              [
                                                _c(
                                                  "div",
                                                  {
                                                    staticClass:
                                                      "overline primary--text"
                                                  },
                                                  [
                                                    _c(
                                                      "v-row",
                                                      [
                                                        _c(
                                                          "v-col",
                                                          {
                                                            staticClass:
                                                              "col-auto"
                                                          },
                                                          _vm._l(
                                                            event.taxonomies,
                                                            function(
                                                              taxonomy,
                                                              index
                                                            ) {
                                                              return _c(
                                                                "span",
                                                                { key: index },
                                                                [
                                                                  taxonomy.type
                                                                    ? _c(
                                                                        "span",
                                                                        [
                                                                          index ===
                                                                          0
                                                                            ? _c(
                                                                                "span",
                                                                                [
                                                                                  taxonomy.type ===
                                                                                  "music"
                                                                                    ? _c(
                                                                                        "span",
                                                                                        {
                                                                                          staticClass:
                                                                                            "primary--text"
                                                                                        },
                                                                                        [
                                                                                          _vm._v(
                                                                                            _vm._s(
                                                                                              _vm.$t(
                                                                                                "taxonomy.type.music"
                                                                                              )
                                                                                            )
                                                                                          )
                                                                                        ]
                                                                                      )
                                                                                    : _vm._e(),
                                                                                  _vm._v(
                                                                                    " "
                                                                                  ),
                                                                                  taxonomy.type ===
                                                                                  "conference"
                                                                                    ? _c(
                                                                                        "span",
                                                                                        {
                                                                                          staticClass:
                                                                                            "primary--text"
                                                                                        },
                                                                                        [
                                                                                          _vm._v(
                                                                                            _vm._s(
                                                                                              _vm.$t(
                                                                                                "taxonomy.type.conference"
                                                                                              )
                                                                                            )
                                                                                          )
                                                                                        ]
                                                                                      )
                                                                                    : _vm._e(),
                                                                                  _vm._v(
                                                                                    " "
                                                                                  ),
                                                                                  taxonomy.type ===
                                                                                  "exhibition"
                                                                                    ? _c(
                                                                                        "span",
                                                                                        {
                                                                                          staticClass:
                                                                                            "primary--text"
                                                                                        },
                                                                                        [
                                                                                          _vm._v(
                                                                                            _vm._s(
                                                                                              _vm.$t(
                                                                                                "taxonomy.type.exhibition"
                                                                                              )
                                                                                            )
                                                                                          )
                                                                                        ]
                                                                                      )
                                                                                    : _vm._e(),
                                                                                  _vm._v(
                                                                                    " "
                                                                                  ),
                                                                                  taxonomy.type ===
                                                                                  "theater"
                                                                                    ? _c(
                                                                                        "span",
                                                                                        {
                                                                                          staticClass:
                                                                                            "primary--text"
                                                                                        },
                                                                                        [
                                                                                          _vm._v(
                                                                                            _vm._s(
                                                                                              _vm.$t(
                                                                                                "taxonomy.type.theater"
                                                                                              )
                                                                                            )
                                                                                          )
                                                                                        ]
                                                                                      )
                                                                                    : _vm._e()
                                                                                ]
                                                                              )
                                                                            : _vm._e()
                                                                        ]
                                                                      )
                                                                    : _vm._e()
                                                                ]
                                                              )
                                                            }
                                                          ),
                                                          0
                                                        ),
                                                        _c("v-spacer"),
                                                        _vm._v(" "),
                                                        _c(
                                                          "v-col",
                                                          {
                                                            staticClass:
                                                              "col-auto ml-auto",
                                                            staticStyle: {
                                                              "margin-bottom":
                                                                "1rem"
                                                            }
                                                          },
                                                          [
                                                            _c(
                                                              "span",
                                                              {
                                                                staticClass:
                                                                  "primary--text px-0"
                                                              },
                                                              [
                                                                _c(
                                                                  "v-icon",
                                                                  {
                                                                    staticClass:
                                                                      "primary--text",
                                                                    attrs: {
                                                                      dark: "",
                                                                      small: ""
                                                                    }
                                                                  },
                                                                  [
                                                                    _vm._v(
                                                                      "\n                                  mdi-star-outline\n                                "
                                                                    )
                                                                  ]
                                                                )
                                                              ],
                                                              1
                                                            )
                                                          ]
                                                        )
                                                      ],
                                                      1
                                                    )
                                                  ],
                                                  1
                                                ),
                                                _vm._v(" "),
                                                _c(
                                                  "v-list-item-title",
                                                  {
                                                    staticClass:
                                                      "title primary--text mb-1"
                                                  },
                                                  [
                                                    _vm._v(
                                                      _vm._s(event.name) +
                                                        "\n                        "
                                                    )
                                                  ]
                                                )
                                              ],
                                              1
                                            )
                                          ],
                                          1
                                        ),
                                        _vm._v(" "),
                                        _c(
                                          "v-row",
                                          { staticClass: "pb-3" },
                                          [
                                            _c(
                                              "v-col",
                                              {
                                                staticClass:
                                                  "mx-4 pt-5 col-auto mr-auto"
                                              },
                                              [
                                                event.people.length > 0
                                                  ? _c(
                                                      "span",
                                                      {
                                                        staticClass:
                                                          "caption primary--text"
                                                      },
                                                      [
                                                        _c(
                                                          "span",
                                                          [
                                                            _c(
                                                              "v-icon",
                                                              {
                                                                staticClass:
                                                                  "mr-1 primary--text",
                                                                staticStyle: {
                                                                  "margin-bottom":
                                                                    "0.08rem"
                                                                },
                                                                attrs: {
                                                                  small: ""
                                                                }
                                                              },
                                                              [
                                                                _vm._v(
                                                                  "mdi-account-group"
                                                                )
                                                              ]
                                                            ),
                                                            _vm._l(
                                                              event.people,
                                                              function(
                                                                person,
                                                                index
                                                              ) {
                                                                return _c(
                                                                  "span",
                                                                  {
                                                                    key: index
                                                                  },
                                                                  [
                                                                    event.people
                                                                      .length <
                                                                    4
                                                                      ? _c(
                                                                          "span",
                                                                          [
                                                                            _vm._v(
                                                                              " "
                                                                            ),
                                                                            _c(
                                                                              "a",
                                                                              {
                                                                                staticClass:
                                                                                  "events_links",
                                                                                attrs: {
                                                                                  title:
                                                                                    person.nickname
                                                                                },
                                                                                on: {
                                                                                  click: function(
                                                                                    $event
                                                                                  ) {
                                                                                    return _vm.showPerson(
                                                                                      person.id
                                                                                    )
                                                                                  }
                                                                                }
                                                                              },
                                                                              [
                                                                                _vm._v(
                                                                                  _vm._s(
                                                                                    person.nickname
                                                                                  )
                                                                                )
                                                                              ]
                                                                            ),
                                                                            _vm._v(
                                                                              " "
                                                                            ),
                                                                            index <
                                                                            event
                                                                              .people
                                                                              .length -
                                                                              1
                                                                              ? _c(
                                                                                  "span",
                                                                                  [
                                                                                    _vm._v(
                                                                                      ",\n                                "
                                                                                    )
                                                                                  ]
                                                                                )
                                                                              : _vm._e()
                                                                          ]
                                                                        )
                                                                      : _vm._e(),
                                                                    _vm._v(" "),
                                                                    event.people
                                                                      .length >=
                                                                    4
                                                                      ? _c(
                                                                          "span",
                                                                          [
                                                                            index <
                                                                            2
                                                                              ? _c(
                                                                                  "span",
                                                                                  [
                                                                                    _vm._v(
                                                                                      " "
                                                                                    ),
                                                                                    _c(
                                                                                      "a",
                                                                                      {
                                                                                        staticClass:
                                                                                          "events_links",
                                                                                        attrs: {
                                                                                          title:
                                                                                            person.nickname
                                                                                        },
                                                                                        on: {
                                                                                          click: function(
                                                                                            $event
                                                                                          ) {
                                                                                            return _vm.showPerson(
                                                                                              person.id
                                                                                            )
                                                                                          }
                                                                                        }
                                                                                      },
                                                                                      [
                                                                                        _vm._v(
                                                                                          _vm._s(
                                                                                            person.nickname
                                                                                          )
                                                                                        )
                                                                                      ]
                                                                                    ),
                                                                                    _vm._v(
                                                                                      ",\n                                "
                                                                                    )
                                                                                  ]
                                                                                )
                                                                              : _vm._e(),
                                                                            _vm._v(
                                                                              " "
                                                                            ),
                                                                            index ===
                                                                            2
                                                                              ? _c(
                                                                                  "span",
                                                                                  [
                                                                                    _vm._v(
                                                                                      " "
                                                                                    ),
                                                                                    _c(
                                                                                      "a",
                                                                                      {
                                                                                        staticClass:
                                                                                          "events_links",
                                                                                        attrs: {
                                                                                          title:
                                                                                            person.nickname
                                                                                        },
                                                                                        on: {
                                                                                          click: function(
                                                                                            $event
                                                                                          ) {
                                                                                            return _vm.showPerson(
                                                                                              person.id
                                                                                            )
                                                                                          }
                                                                                        }
                                                                                      },
                                                                                      [
                                                                                        _vm._v(
                                                                                          _vm._s(
                                                                                            person.nickname
                                                                                          )
                                                                                        )
                                                                                      ]
                                                                                    ),
                                                                                    _vm._v(
                                                                                      ", ..."
                                                                                    )
                                                                                  ]
                                                                                )
                                                                              : _vm._e()
                                                                          ]
                                                                        )
                                                                      : _vm._e()
                                                                  ]
                                                                )
                                                              }
                                                            ),
                                                            _c("v-spacer")
                                                          ],
                                                          2
                                                        )
                                                      ]
                                                    )
                                                  : _vm._e(),
                                                _vm._v(" "),
                                                event.people.length <= 0
                                                  ? _c(
                                                      "span",
                                                      {
                                                        staticClass:
                                                          "caption primary--text"
                                                      },
                                                      [
                                                        _c(
                                                          "span",
                                                          [
                                                            _c(
                                                              "v-icon",
                                                              {
                                                                staticClass:
                                                                  "mr-1 primary--text",
                                                                staticStyle: {
                                                                  "margin-bottom":
                                                                    "0.08rem"
                                                                },
                                                                attrs: {
                                                                  small: ""
                                                                }
                                                              },
                                                              [
                                                                _vm._v(
                                                                  "mdi-account-group"
                                                                )
                                                              ]
                                                            ),
                                                            _c(
                                                              "span",
                                                              {
                                                                attrs: {
                                                                  title: _vm.$t(
                                                                    "page.events.no_people_title"
                                                                  )
                                                                }
                                                              },
                                                              [
                                                                _vm._v(
                                                                  "\n                              " +
                                                                    _vm._s(
                                                                      _vm.$t(
                                                                        "page.events.no_people"
                                                                      )
                                                                    )
                                                                )
                                                              ]
                                                            )
                                                          ],
                                                          1
                                                        ),
                                                        _c("v-spacer")
                                                      ],
                                                      1
                                                    )
                                                  : _vm._e(),
                                                _vm._v(" "),
                                                event.venues.length > 0
                                                  ? _c(
                                                      "span",
                                                      {
                                                        staticClass:
                                                          "caption primary--text"
                                                      },
                                                      [
                                                        _c(
                                                          "span",
                                                          [
                                                            _c(
                                                              "v-icon",
                                                              {
                                                                staticClass:
                                                                  "mr-1 primary--text",
                                                                staticStyle: {
                                                                  "margin-bottom":
                                                                    "0.08rem"
                                                                },
                                                                attrs: {
                                                                  small: ""
                                                                }
                                                              },
                                                              [
                                                                _vm._v(
                                                                  "mdi-office-building-marker"
                                                                )
                                                              ]
                                                            ),
                                                            _vm._v(" "),
                                                            _c(
                                                              "a",
                                                              {
                                                                staticClass:
                                                                  "events_links",
                                                                attrs: {
                                                                  title:
                                                                    event
                                                                      .venues[0]
                                                                      .name
                                                                },
                                                                on: {
                                                                  click: function(
                                                                    $event
                                                                  ) {
                                                                    return _vm.showVenue(
                                                                      event
                                                                        .venues[0]
                                                                        .id
                                                                    )
                                                                  }
                                                                }
                                                              },
                                                              [
                                                                _vm._v(
                                                                  _vm._s(
                                                                    event
                                                                      .venues[0]
                                                                      .name
                                                                  )
                                                                )
                                                              ]
                                                            ),
                                                            _vm._v(" "),
                                                            _c("v-spacer")
                                                          ],
                                                          1
                                                        )
                                                      ]
                                                    )
                                                  : _vm._e(),
                                                _vm._v(" "),
                                                event.venues.length <= 0
                                                  ? _c(
                                                      "span",
                                                      {
                                                        staticClass:
                                                          "caption primary--text"
                                                      },
                                                      [
                                                        _c(
                                                          "span",
                                                          [
                                                            _c(
                                                              "v-icon",
                                                              {
                                                                staticClass:
                                                                  "mr-1 primary--text",
                                                                staticStyle: {
                                                                  "margin-bottom":
                                                                    "0.08rem"
                                                                },
                                                                attrs: {
                                                                  small: ""
                                                                }
                                                              },
                                                              [
                                                                _vm._v(
                                                                  "mdi-office-building-marker"
                                                                )
                                                              ]
                                                            ),
                                                            _c(
                                                              "span",
                                                              {
                                                                attrs: {
                                                                  title: _vm.$t(
                                                                    "page.events.no_venues_title"
                                                                  )
                                                                }
                                                              },
                                                              [
                                                                _vm._v(
                                                                  "\n                              " +
                                                                    _vm._s(
                                                                      _vm.$t(
                                                                        "page.events.no_venues"
                                                                      )
                                                                    )
                                                                )
                                                              ]
                                                            )
                                                          ],
                                                          1
                                                        ),
                                                        _c("v-spacer")
                                                      ],
                                                      1
                                                    )
                                                  : _vm._e(),
                                                _vm._v(" "),
                                                event.start_date ===
                                                event.end_date
                                                  ? _c(
                                                      "span",
                                                      {
                                                        staticClass:
                                                          "caption primary--text"
                                                      },
                                                      [
                                                        _c(
                                                          "v-icon",
                                                          {
                                                            staticClass:
                                                              "mr-1 primary--text",
                                                            staticStyle: {
                                                              "margin-bottom":
                                                                "0.08rem"
                                                            },
                                                            attrs: { small: "" }
                                                          },
                                                          [
                                                            _vm._v(
                                                              "mdi-calendar-blank"
                                                            )
                                                          ]
                                                        ),
                                                        _vm._v(
                                                          "\n                          " +
                                                            _vm._s(
                                                              _vm._f(
                                                                "formatDate"
                                                              )(
                                                                event.start_date
                                                              )
                                                            ) +
                                                            "\n                        "
                                                        )
                                                      ],
                                                      1
                                                    )
                                                  : _vm._e(),
                                                _vm._v(" "),
                                                event.start_date !==
                                                event.end_date
                                                  ? _c(
                                                      "span",
                                                      {
                                                        staticClass:
                                                          "caption primary--text"
                                                      },
                                                      [
                                                        _c(
                                                          "v-icon",
                                                          {
                                                            staticClass:
                                                              "mr-1 primary--text",
                                                            staticStyle: {
                                                              "margin-bottom":
                                                                "0.08rem"
                                                            },
                                                            attrs: { small: "" }
                                                          },
                                                          [
                                                            _vm._v(
                                                              "mdi-calendar-blank-multiple"
                                                            )
                                                          ]
                                                        ),
                                                        _vm._v(
                                                          "\n                          " +
                                                            _vm._s(
                                                              _vm.$t(
                                                                "page.events.From"
                                                              )
                                                            ) +
                                                            "\n                          " +
                                                            _vm._s(
                                                              _vm._f(
                                                                "formatMultipleDates"
                                                              )(
                                                                event.start_date
                                                              )
                                                            ) +
                                                            "\n                          " +
                                                            _vm._s(
                                                              _vm.$t(
                                                                "page.events.to"
                                                              )
                                                            ) +
                                                            "\n                          " +
                                                            _vm._s(
                                                              _vm._f(
                                                                "formatMultipleDates"
                                                              )(event.end_date)
                                                            )
                                                        )
                                                      ],
                                                      1
                                                    )
                                                  : _vm._e(),
                                                _vm._v(" "),
                                                _c("v-spacer"),
                                                _vm._v(" "),
                                                _c(
                                                  "span",
                                                  {
                                                    staticClass:
                                                      "caption primary--text"
                                                  },
                                                  [
                                                    _c(
                                                      "v-icon",
                                                      {
                                                        staticClass:
                                                          "mr-1 primary--text",
                                                        staticStyle: {
                                                          "margin-bottom":
                                                            "0.08rem"
                                                        },
                                                        attrs: { small: "" }
                                                      },
                                                      [
                                                        _vm._v(
                                                          "mdi-clock-time-four-outline"
                                                        )
                                                      ]
                                                    ),
                                                    _vm._v(
                                                      "\n                          " +
                                                        _vm._s(
                                                          _vm._f("formatTime")(
                                                            event.start_time
                                                          )
                                                        ) +
                                                        " -\n                          " +
                                                        _vm._s(
                                                          _vm._f("formatTime")(
                                                            event.end_time
                                                          )
                                                        )
                                                    )
                                                  ],
                                                  1
                                                ),
                                                _vm._v(" "),
                                                _c("v-spacer"),
                                                _vm._v(" "),
                                                event.prices.length > 0
                                                  ? _c(
                                                      "span",
                                                      {
                                                        staticClass:
                                                          "caption primary--text"
                                                      },
                                                      [
                                                        _c(
                                                          "v-icon",
                                                          {
                                                            staticClass:
                                                              "mr-1 primary--text",
                                                            staticStyle: {
                                                              "margin-bottom":
                                                                "0.08rem"
                                                            },
                                                            attrs: { small: "" }
                                                          },
                                                          [
                                                            _vm._v(
                                                              "mdi-cash-usd-outline"
                                                            )
                                                          ]
                                                        ),
                                                        _vm._v(" "),
                                                        _vm._l(
                                                          event.prices,
                                                          function(
                                                            price,
                                                            index
                                                          ) {
                                                            return _c(
                                                              "span",
                                                              { key: index },
                                                              [
                                                                index <
                                                                event.prices
                                                                  .length -
                                                                  1
                                                                  ? _c("span", [
                                                                      price.cost >
                                                                      0
                                                                        ? _c(
                                                                            "span",
                                                                            [
                                                                              _vm._v(
                                                                                "\n                                " +
                                                                                  _vm._s(
                                                                                    price.cost
                                                                                  ) +
                                                                                  " chf |"
                                                                              )
                                                                            ]
                                                                          )
                                                                        : _c(
                                                                            "span",
                                                                            [
                                                                              _vm._v(
                                                                                "\n                                " +
                                                                                  _vm._s(
                                                                                    _vm.$t(
                                                                                      "price.free"
                                                                                    )
                                                                                  ) +
                                                                                  " |"
                                                                              )
                                                                            ]
                                                                          )
                                                                    ])
                                                                  : _vm._e(),
                                                                index >=
                                                                event.prices
                                                                  .length -
                                                                  1
                                                                  ? _c("span", [
                                                                      price.cost >
                                                                      0
                                                                        ? _c(
                                                                            "span",
                                                                            [
                                                                              _vm._v(
                                                                                "\n                                " +
                                                                                  _vm._s(
                                                                                    price.cost
                                                                                  ) +
                                                                                  " chf"
                                                                              )
                                                                            ]
                                                                          )
                                                                        : _c(
                                                                            "span",
                                                                            [
                                                                              _vm._v(
                                                                                "\n                                " +
                                                                                  _vm._s(
                                                                                    _vm.$t(
                                                                                      "price.free"
                                                                                    )
                                                                                  )
                                                                              )
                                                                            ]
                                                                          )
                                                                    ])
                                                                  : _vm._e()
                                                              ]
                                                            )
                                                          }
                                                        ),
                                                        _c("v-spacer")
                                                      ],
                                                      2
                                                    )
                                                  : _vm._e(),
                                                _vm._v(" "),
                                                event.prices.length <= 0
                                                  ? _c(
                                                      "span",
                                                      {
                                                        staticClass:
                                                          "caption primary--text"
                                                      },
                                                      [
                                                        _c(
                                                          "span",
                                                          [
                                                            _c(
                                                              "v-icon",
                                                              {
                                                                staticClass:
                                                                  "mr-1 primary--text",
                                                                staticStyle: {
                                                                  "margin-bottom":
                                                                    "0.08rem"
                                                                },
                                                                attrs: {
                                                                  small: ""
                                                                }
                                                              },
                                                              [
                                                                _vm._v(
                                                                  "mdi-cash-usd-outline"
                                                                )
                                                              ]
                                                            ),
                                                            _c(
                                                              "span",
                                                              {
                                                                attrs: {
                                                                  title: _vm.$t(
                                                                    "page.events.no_prices_title"
                                                                  )
                                                                }
                                                              },
                                                              [
                                                                _vm._v(
                                                                  "\n                              " +
                                                                    _vm._s(
                                                                      _vm.$t(
                                                                        "page.events.no_prices"
                                                                      )
                                                                    )
                                                                )
                                                              ]
                                                            )
                                                          ],
                                                          1
                                                        ),
                                                        _c("v-spacer")
                                                      ],
                                                      1
                                                    )
                                                  : _vm._e()
                                              ],
                                              1
                                            )
                                          ],
                                          1
                                        ),
                                        _vm._v(" "),
                                        _c("v-divider", {
                                          staticClass: "mx-2"
                                        }),
                                        _vm._v(" "),
                                        event.taxonomies.length > 0
                                          ? _c(
                                              "div",
                                              [
                                                _c(
                                                  "v-row",
                                                  { staticClass: "py-0" },
                                                  [
                                                    _c(
                                                      "v-col",
                                                      {
                                                        staticClass:
                                                          "my-auto col-auto"
                                                      },
                                                      [
                                                        _c(
                                                          "span",
                                                          {
                                                            staticClass:
                                                              "primary--text"
                                                          },
                                                          [
                                                            _c(
                                                              "v-chip-group",
                                                              {
                                                                staticClass:
                                                                  "col-auto my-2 py-0",
                                                                attrs: {
                                                                  "show-arrows":
                                                                    ""
                                                                }
                                                              },
                                                              _vm._l(
                                                                event.taxonomies,
                                                                function(
                                                                  taxonomy,
                                                                  index
                                                                ) {
                                                                  return _c(
                                                                    "span",
                                                                    {
                                                                      key: index
                                                                    },
                                                                    [
                                                                      _c(
                                                                        "v-chip",
                                                                        {
                                                                          staticClass:
                                                                            "greybg primary--text",
                                                                          attrs: {
                                                                            "x-small":
                                                                              ""
                                                                          }
                                                                        },
                                                                        [
                                                                          _vm._v(
                                                                            _vm._s(
                                                                              taxonomy.category
                                                                            )
                                                                          )
                                                                        ]
                                                                      ),
                                                                      _c(
                                                                        "v-chip",
                                                                        {
                                                                          staticClass:
                                                                            "greybg primary--text",
                                                                          attrs: {
                                                                            "x-small":
                                                                              ""
                                                                          }
                                                                        },
                                                                        [
                                                                          _vm._v(
                                                                            _vm._s(
                                                                              taxonomy.sub_category
                                                                            )
                                                                          )
                                                                        ]
                                                                      )
                                                                    ],
                                                                    1
                                                                  )
                                                                }
                                                              ),
                                                              0
                                                            )
                                                          ],
                                                          1
                                                        )
                                                      ]
                                                    )
                                                  ],
                                                  1
                                                ),
                                                _vm._v(" "),
                                                _c("v-divider", {
                                                  staticClass: "mx-2"
                                                })
                                              ],
                                              1
                                            )
                                          : _vm._e(),
                                        _vm._v(" "),
                                        event.taxonomies.length <= 0
                                          ? _c(
                                              "div",
                                              [
                                                _c(
                                                  "v-row",
                                                  { staticClass: "py-0" },
                                                  [
                                                    _c(
                                                      "v-col",
                                                      {
                                                        staticClass:
                                                          "my-auto col-auto"
                                                      },
                                                      [
                                                        _c("span", {
                                                          staticClass:
                                                            "mx-auto col-auto primary--text",
                                                          staticStyle: {
                                                            "line-height":
                                                              "3rem"
                                                          }
                                                        })
                                                      ]
                                                    )
                                                  ],
                                                  1
                                                ),
                                                _vm._v(" "),
                                                _c("v-divider", {
                                                  staticClass: "mx-2"
                                                })
                                              ],
                                              1
                                            )
                                          : _vm._e(),
                                        _vm._v(" "),
                                        _c(
                                          "v-row",
                                          { staticClass: "pt-3" },
                                          [
                                            _c(
                                              "v-col",
                                              {
                                                staticClass:
                                                  "ml-4 my-auto col-auto"
                                              },
                                              [
                                                _c(
                                                  "v-btn",
                                                  {
                                                    attrs: {
                                                      text: "",
                                                      color: "info accent-4"
                                                    },
                                                    on: {
                                                      click: function($event) {
                                                        return _vm.showEvent(
                                                          event.id
                                                        )
                                                      }
                                                    }
                                                  },
                                                  [
                                                    _vm._v(
                                                      _vm._s(
                                                        _vm.$t(
                                                          "page.events.more_info"
                                                        )
                                                      )
                                                    )
                                                  ]
                                                )
                                              ],
                                              1
                                            ),
                                            _vm._v(" "),
                                            _c(
                                              "v-col",
                                              {
                                                staticClass:
                                                  "mx-4 my-auto col-auto ml-auto"
                                              },
                                              [
                                                _c(
                                                  "span",
                                                  {
                                                    staticClass:
                                                      "orange--text mr-3"
                                                  },
                                                  [
                                                    _c(
                                                      "v-icon",
                                                      {
                                                        staticClass:
                                                          "orange--text mr-1",
                                                        staticStyle: {
                                                          "margin-bottom":
                                                            "0.05rem"
                                                        },
                                                        attrs: {
                                                          dark: "",
                                                          small: ""
                                                        }
                                                      },
                                                      [
                                                        _vm._v(
                                                          "\n                            mdi-comment "
                                                        )
                                                      ]
                                                    ),
                                                    _c(
                                                      "span",
                                                      {
                                                        staticClass:
                                                          "subtitle-2"
                                                      },
                                                      [
                                                        _vm._v(
                                                          _vm._s(
                                                            event.comments_count
                                                          ) +
                                                            "\n                          "
                                                        )
                                                      ]
                                                    )
                                                  ],
                                                  1
                                                ),
                                                _vm._v(" "),
                                                _c(
                                                  "span",
                                                  { staticClass: "pink--text" },
                                                  [
                                                    _c(
                                                      "v-icon",
                                                      {
                                                        staticClass:
                                                          "pink--text mr-1",
                                                        staticStyle: {
                                                          "margin-bottom":
                                                            "0.05rem"
                                                        },
                                                        attrs: {
                                                          dark: "",
                                                          small: ""
                                                        }
                                                      },
                                                      [
                                                        _vm._v(
                                                          "\n                            mdi-heart "
                                                        )
                                                      ]
                                                    ),
                                                    _c(
                                                      "span",
                                                      {
                                                        staticClass:
                                                          "subtitle-2"
                                                      },
                                                      [
                                                        _vm._v(
                                                          _vm._s(
                                                            event.likes_count
                                                          )
                                                        )
                                                      ]
                                                    )
                                                  ],
                                                  1
                                                )
                                              ]
                                            )
                                          ],
                                          1
                                        )
                                      ],
                                      1
                                    )
                                  ]
                                )
                              ],
                              1
                            )
                          }),
                          1
                        )
                      ],
                      1
                    )
                  ])
                ],
                1
              )
            }),
            1
          )
        ],
        1
      ),
      _vm._v(" "),
      _c(
        "v-overlay",
        {
          class: _vm.$vuetify.theme.dark ? "primary--text" : "secondary--text",
          attrs: { opacity: 0.1, value: _vm.overlay }
        },
        [
          _c(
            "v-progress-circular",
            { attrs: { indeterminate: "", size: "90" } },
            [
              _c(
                "span",
                {
                  staticClass: "caption",
                  class: _vm.$vuetify.theme.dark
                    ? "primary--text"
                    : "secondary--text"
                },
                [_vm._v(_vm._s(_vm.$t("loading")))]
              )
            ]
          )
        ],
        1
      )
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ })

}]);