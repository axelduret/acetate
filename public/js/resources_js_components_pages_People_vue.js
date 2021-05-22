(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_components_pages_People_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/pages/People.vue?vue&type=script&lang=js&":
/*!*******************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/pages/People.vue?vue&type=script&lang=js& ***!
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
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  components: {},
  data: function data() {
    return {
      overlay: true,
      perPage: 48,
      page: 1,
      people: "",
      meta: "",
      // App url.
      appURL: "http://127.0.0.1:8001",
      // Base url.
      baseURL: "/",
      apiToken: "2|swLLv5nsRLvz02L7pYaszc11sxKCvzd3lqI5jJbZ"
    };
  },
  mounted: function mounted() {
    this.fetchPeople();
  },
  methods: {
    fetchPeople: function fetchPeople() {
      var _this = this;

      this.overlay = true;
      this.people = null;
      axios.request({
        url: "people?per_page=" + this.perPage + "&page=" + this.page,
        method: "get",
        baseURL: this.baseURL + "api/",
        headers: {
          Authorization: "Bearer " + this.apiToken
        }
      }).then(function (response) {
        _this.people = response.data.people;
        _this.meta = response.data.meta;
        _this.overlay = false;
        return _this.people;
      })["catch"](function (error) {
        var path = "error/404";

        _this.$router.push("".concat(_this.baseURL).concat(_this.$i18n.locale, "/").concat(path));
      })["finally"](function () {});
    },
    onPageChange: function onPageChange() {
      this.fetchPeople();
    }
  }
});

/***/ }),

/***/ "./resources/js/components/pages/People.vue":
/*!**************************************************!*\
  !*** ./resources/js/components/pages/People.vue ***!
  \**************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _People_vue_vue_type_template_id_3df503b6___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./People.vue?vue&type=template&id=3df503b6& */ "./resources/js/components/pages/People.vue?vue&type=template&id=3df503b6&");
/* harmony import */ var _People_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./People.vue?vue&type=script&lang=js& */ "./resources/js/components/pages/People.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(
  _People_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _People_vue_vue_type_template_id_3df503b6___WEBPACK_IMPORTED_MODULE_0__.render,
  _People_vue_vue_type_template_id_3df503b6___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/pages/People.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/components/pages/People.vue?vue&type=script&lang=js&":
/*!***************************************************************************!*\
  !*** ./resources/js/components/pages/People.vue?vue&type=script&lang=js& ***!
  \***************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_People_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./People.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/pages/People.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_People_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/components/pages/People.vue?vue&type=template&id=3df503b6&":
/*!*********************************************************************************!*\
  !*** ./resources/js/components/pages/People.vue?vue&type=template&id=3df503b6& ***!
  \*********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_People_vue_vue_type_template_id_3df503b6___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_People_vue_vue_type_template_id_3df503b6___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_People_vue_vue_type_template_id_3df503b6___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./People.vue?vue&type=template&id=3df503b6& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/pages/People.vue?vue&type=template&id=3df503b6&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/pages/People.vue?vue&type=template&id=3df503b6&":
/*!************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/pages/People.vue?vue&type=template&id=3df503b6& ***!
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
          _vm.overlay === false
            ? _c("v-container", [
                _c(
                  "div",
                  [
                    _c(
                      "v-row",
                      { attrs: { dense: "" } },
                      _vm._l(_vm.people, function(person, index) {
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
                                                  "storage/avatar/person/" +
                                                  person.avatar,
                                                title: person.nickname
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
                                                                  "\n                                                            mdi-star-outline\n                                                        "
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
                                                  _vm._s(person.nickname) +
                                                    "\n                                        "
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
                                            _c(
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
                                                          small: "",
                                                          title: _vm.$t(
                                                            "page.people.title.name"
                                                          )
                                                        }
                                                      },
                                                      [
                                                        _vm._v(
                                                          "mdi-account-box"
                                                        )
                                                      ]
                                                    ),
                                                    _vm._v(" "),
                                                    _c("span", [
                                                      _vm._v(
                                                        _vm._s(
                                                          person.firstname
                                                        ) +
                                                          "\n                                                    " +
                                                          _vm._s(
                                                            person.lastname
                                                          )
                                                      )
                                                    ]),
                                                    _vm._v(" "),
                                                    _c("v-spacer")
                                                  ],
                                                  1
                                                )
                                              ]
                                            ),
                                            _vm._v(" "),
                                            _c(
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
                                                          small: "",
                                                          title: _vm.$t(
                                                            "page.people.title.company"
                                                          )
                                                        }
                                                      },
                                                      [_vm._v("mdi-briefcase")]
                                                    ),
                                                    _vm._v(" "),
                                                    _c("span", [
                                                      _vm._v(
                                                        _vm._s(person.company)
                                                      )
                                                    ]),
                                                    _vm._v(" "),
                                                    _c("v-spacer")
                                                  ],
                                                  1
                                                )
                                              ]
                                            )
                                          ]
                                        )
                                      ],
                                      1
                                    ),
                                    _vm._v(" "),
                                    _c("v-divider", { staticClass: "mx-2" }),
                                    _vm._v(" "),
                                    person.taxonomies.length > 0
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
                                                      "my-auto mx-auto col-auto"
                                                  },
                                                  [
                                                    _c(
                                                      "span",
                                                      {
                                                        staticClass:
                                                          "primary--text",
                                                        attrs: {
                                                          justify: "center"
                                                        }
                                                      },
                                                      [
                                                        _c(
                                                          "v-chip-group",
                                                          {
                                                            staticClass:
                                                              "col-auto my-2 py-0",
                                                            attrs: {
                                                              "show-arrows": ""
                                                            }
                                                          },
                                                          _vm._l(
                                                            person.taxonomies,
                                                            function(
                                                              taxonomy,
                                                              index
                                                            ) {
                                                              return _c(
                                                                "span",
                                                                { key: index },
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
                                    person.taxonomies.length <= 0
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
                                                      "my-auto mx-auto col-auto"
                                                  },
                                                  [
                                                    _c(
                                                      "span",
                                                      {
                                                        staticClass:
                                                          "mx-auto col-auto  caption",
                                                        class: _vm.$vuetify
                                                          .theme.dark
                                                          ? "grey--text"
                                                          : "grey--text",
                                                        staticStyle: {
                                                          "line-height": "3rem"
                                                        },
                                                        attrs: {
                                                          justify: "center"
                                                        }
                                                      },
                                                      [
                                                        _vm._v(
                                                          _vm._s(
                                                            _vm.$t(
                                                              "page.people.no_taxonomies_title"
                                                            )
                                                          ) +
                                                            "\n                                            "
                                                        )
                                                      ]
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
                                    _c(
                                      "v-row",
                                      { staticClass: "pt-3" },
                                      [
                                        _c(
                                          "v-col",
                                          {
                                            staticClass: "ml-4 my-auto col-auto"
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
                                                    return _vm.showPerson(
                                                      person.id
                                                    )
                                                  }
                                                }
                                              },
                                              [
                                                _vm._v(
                                                  _vm._s(
                                                    _vm.$t(
                                                      "page.people.more_info"
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
                                                staticClass: "mr-3",
                                                class: _vm.$vuetify.theme.dark
                                                  ? "primary--text"
                                                  : "secondary--text"
                                              },
                                              [
                                                _c(
                                                  "v-icon",
                                                  {
                                                    staticClass: "mr-1",
                                                    class: _vm.$vuetify.theme
                                                      .dark
                                                      ? "primary--text"
                                                      : "secondary--text",
                                                    staticStyle: {
                                                      "margin-bottom": "0.05rem"
                                                    },
                                                    attrs: {
                                                      dark: "",
                                                      small: ""
                                                    }
                                                  },
                                                  [
                                                    _vm._v(
                                                      "\n                                                mdi-comment-outline "
                                                    )
                                                  ]
                                                ),
                                                _c(
                                                  "span",
                                                  { staticClass: "subtitle-2" },
                                                  [
                                                    _vm._v(
                                                      _vm._s(
                                                        person.comments_count
                                                      ) +
                                                        "\n                                            "
                                                    )
                                                  ]
                                                )
                                              ],
                                              1
                                            ),
                                            _vm._v(" "),
                                            _c(
                                              "span",
                                              {
                                                class: _vm.$vuetify.theme.dark
                                                  ? "primary--text"
                                                  : "secondary--text"
                                              },
                                              [
                                                _c(
                                                  "v-icon",
                                                  {
                                                    staticClass: "mr-1",
                                                    class: _vm.$vuetify.theme
                                                      .dark
                                                      ? "primary--text"
                                                      : "secondary--text",
                                                    staticStyle: {
                                                      "margin-bottom": "0.05rem"
                                                    },
                                                    attrs: {
                                                      dark: "",
                                                      small: ""
                                                    }
                                                  },
                                                  [
                                                    _vm._v(
                                                      "\n                                                mdi-heart-outline "
                                                    )
                                                  ]
                                                ),
                                                _c(
                                                  "span",
                                                  { staticClass: "subtitle-2" },
                                                  [
                                                    _vm._v(
                                                      _vm._s(person.likes_count)
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
                    ),
                    _vm._v(" "),
                    _vm.meta.last_page != 1 && _vm.overlay == false
                      ? _c("v-col", { staticClass: "my-0 py-o" }, [
                          _c(
                            "div",
                            { staticClass: "text-center mt-4 mb-0 py-0" },
                            [
                              _c(
                                "v-container",
                                [
                                  _c(
                                    "v-row",
                                    { attrs: { justify: "center" } },
                                    [
                                      _c(
                                        "v-col",
                                        { attrs: { cols: "12" } },
                                        [
                                          _c(
                                            "v-container",
                                            { staticClass: "max-width" },
                                            [
                                              _c("v-pagination", {
                                                attrs: {
                                                  color: _vm.$vuetify.theme.dark
                                                    ? "primary"
                                                    : "secondary",
                                                  length: _vm.meta.last_page,
                                                  circle: ""
                                                },
                                                on: { input: _vm.onPageChange },
                                                model: {
                                                  value: _vm.page,
                                                  callback: function($$v) {
                                                    _vm.page = $$v
                                                  },
                                                  expression: "page"
                                                }
                                              })
                                            ],
                                            1
                                          )
                                        ],
                                        1
                                      )
                                    ],
                                    1
                                  )
                                ],
                                1
                              )
                            ],
                            1
                          )
                        ])
                      : _vm._e()
                  ],
                  1
                )
              ])
            : _vm._e()
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