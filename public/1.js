(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[1],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/AdRequestComponent.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/AdRequestComponent.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  props: ["groups", "campaigns", "form", "showButtons"],
  data: function data() {
    return {
      textarea: "",
      resource: "ads-request",
      records: [],
      errors: {},
      formRequest: {
        type: "Crear",
        level: "Anuncio"
      },
      showDraftButton: true
    };
  },
  created: function created() {},
  methods: {
    initForm: function initForm() {
      this.form = {};
    },
    saveDraft: function saveDraft() {
      this.formRequest.state = "Borrador";
      this.formRequest.request = JSON.stringify(this.form);
      this.saveAd(); // this.initForm();
    },
    savePending: function savePending() {
      this.formRequest.state = "Pendiente";
      this.saveAd();
    },
    saveAd: function saveAd() {
      var _this = this;

      this.$http.post("/".concat(this.resource, "/ad"), this.form).then(function (response) {
        _this.formRequest.ad_id = response.data.record.id;

        _this.initForm();

        _this.saveRequest();

        _this.$message({
          message: response.data.message,
          type: "success"
        });
      })["catch"](function (error) {
        _this.errors = error.response.data.errors;

        _this.$message.error("Sucedió un error.");
      });
    },
    saveRequest: function saveRequest() {
      var _this2 = this;

      this.$http.post("/".concat(this.resource), this.formRequest).then(function (response) {
        _this2.$message({
          message: response.data.message,
          type: "success"
        });
      })["catch"](function (error) {
        console.log(error);

        _this2.$message.error("Sucedió un error.");
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/AdRequestComponent.vue?vue&type=template&id=94dfa2c8&":
/*!*********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/AdRequestComponent.vue?vue&type=template&id=94dfa2c8& ***!
  \*********************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("form", { attrs: { autocomplete: "off" } }, [
    _c("fieldset", { staticClass: "border p-2" }, [
      _c("legend", { staticClass: "w-auto" }, [
        _vm._v("\n            Vista Solicitud de anuncio\n        ")
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "row" }, [
        _c("div", { staticClass: "col-md-6" }, [
          _c("div", { staticClass: "col-md-12" }, [
            _c(
              "div",
              {
                staticClass: "form-group",
                class: {
                  "has-danger": _vm.errors.title_one
                }
              },
              [
                _vm._m(0),
                _vm._v(" "),
                _c("el-input", {
                  attrs: { dusk: "title_one" },
                  model: {
                    value: _vm.form.title_one,
                    callback: function($$v) {
                      _vm.$set(_vm.form, "title_one", $$v)
                    },
                    expression: "form.title_one"
                  }
                }),
                _vm._v(" "),
                _vm.errors.title_one
                  ? _c("small", {
                      staticClass: "form-control-feedback",
                      domProps: { textContent: _vm._s(_vm.errors.title_one[0]) }
                    })
                  : _vm._e()
              ],
              1
            )
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "col-md-12" }, [
            _c(
              "div",
              {
                staticClass: "form-group",
                class: {
                  "has-danger": _vm.errors.title_two
                }
              },
              [
                _vm._m(1),
                _vm._v(" "),
                _c("el-input", {
                  attrs: { dusk: "title_two" },
                  model: {
                    value: _vm.form.title_two,
                    callback: function($$v) {
                      _vm.$set(_vm.form, "title_two", $$v)
                    },
                    expression: "form.title_two"
                  }
                }),
                _vm._v(" "),
                _vm.errors.title_two
                  ? _c("small", {
                      staticClass: "form-control-feedback",
                      domProps: { textContent: _vm._s(_vm.errors.title_two[0]) }
                    })
                  : _vm._e()
              ],
              1
            )
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "col-md-12" }, [
            _c(
              "div",
              {
                staticClass: "form-group",
                class: {
                  "has-danger": _vm.errors.description
                }
              },
              [
                _vm._m(2),
                _vm._v(" "),
                _c("el-input", {
                  attrs: { dusk: "description" },
                  model: {
                    value: _vm.form.description,
                    callback: function($$v) {
                      _vm.$set(_vm.form, "description", $$v)
                    },
                    expression: "form.description"
                  }
                }),
                _vm._v(" "),
                _vm.errors.description
                  ? _c("small", {
                      staticClass: "form-control-feedback",
                      domProps: {
                        textContent: _vm._s(_vm.errors.description[0])
                      }
                    })
                  : _vm._e()
              ],
              1
            )
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "col-md-12" }, [
            _c(
              "div",
              {
                staticClass: "form-group",
                class: {
                  "has-danger": _vm.errors.url
                }
              },
              [
                _vm._m(3),
                _vm._v(" "),
                _c("el-input", {
                  attrs: { dusk: "url" },
                  model: {
                    value: _vm.form.url,
                    callback: function($$v) {
                      _vm.$set(_vm.form, "url", $$v)
                    },
                    expression: "form.url"
                  }
                }),
                _vm._v(" "),
                _vm.errors.url
                  ? _c("small", {
                      staticClass: "form-control-feedback",
                      domProps: { textContent: _vm._s(_vm.errors.url[0]) }
                    })
                  : _vm._e()
              ],
              1
            )
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "col-md-6" }, [
          _c("div", { staticClass: "col-md-12" }, [
            _c("div", { staticClass: "row" }, [
              _c(
                "div",
                { staticClass: "col-md-6" },
                [
                  _c(
                    "el-select",
                    {
                      attrs: { placeholder: "Grupo" },
                      model: {
                        value: _vm.form.group,
                        callback: function($$v) {
                          _vm.$set(_vm.form, "group", $$v)
                        },
                        expression: "form.group"
                      }
                    },
                    _vm._l(_vm.groups, function(item) {
                      return _c("el-option", {
                        key: item,
                        attrs: { value: item }
                      })
                    }),
                    1
                  ),
                  _vm._v(" "),
                  _vm.errors.group
                    ? _c("small", {
                        staticClass: "form-control-feedback",
                        domProps: { textContent: _vm._s(_vm.errors.group[0]) }
                      })
                    : _vm._e()
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "div",
                { staticClass: "col-md-6" },
                [
                  _c(
                    "el-select",
                    {
                      attrs: { placeholder: "Campaña" },
                      model: {
                        value: _vm.form.campaign,
                        callback: function($$v) {
                          _vm.$set(_vm.form, "campaign", $$v)
                        },
                        expression: "form.campaign"
                      }
                    },
                    _vm._l(_vm.campaigns, function(item) {
                      return _c("el-option", {
                        key: item,
                        attrs: { value: item }
                      })
                    }),
                    1
                  ),
                  _vm._v(" "),
                  _vm.errors.campaign
                    ? _c("small", {
                        staticClass: "form-control-feedback",
                        domProps: {
                          textContent: _vm._s(_vm.errors.campaign[0])
                        }
                      })
                    : _vm._e()
                ],
                1
              )
            ])
          ]),
          _vm._v(" "),
          _c("br"),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "col-md-12" },
            [
              _c("el-input", {
                attrs: {
                  type: "textarea",
                  rows: 12,
                  placeholder: "Please input"
                },
                model: {
                  value: _vm.textarea,
                  callback: function($$v) {
                    _vm.textarea = $$v
                  },
                  expression: "textarea"
                }
              })
            ],
            1
          )
        ]),
        _vm._v(" "),
        _vm.showButtons
          ? _c(
              "div",
              {
                staticClass: "col-md-12",
                staticStyle: { display: "flex", "justify-content": "flex-end" }
              },
              [
                _vm.showDraftButton
                  ? _c("el-button", { on: { click: _vm.saveDraft } }, [
                      _vm._v("Guardar como borrador")
                    ])
                  : _vm._e(),
                _vm._v(" "),
                _c("el-button", { on: { click: _vm.savePending } }, [
                  _vm._v("Enviar solicitud")
                ])
              ],
              1
            )
          : _vm._e()
      ])
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { staticClass: "control-label" }, [
      _vm._v("Titulo 1"),
      _c("span", { staticClass: "text-danger" }, [_vm._v("*")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { staticClass: "control-label" }, [
      _vm._v("Titulo 2"),
      _c("span", { staticClass: "text-danger" }, [_vm._v("*")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { staticClass: "control-label" }, [
      _vm._v("Descripción del anuncios"),
      _c("span", { staticClass: "text-danger" }, [_vm._v("*")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { staticClass: "control-label" }, [
      _vm._v("Enlace"),
      _c("span", { staticClass: "text-danger" }, [_vm._v("*")])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/AdRequestComponent.vue":
/*!********************************************************!*\
  !*** ./resources/js/components/AdRequestComponent.vue ***!
  \********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _AdRequestComponent_vue_vue_type_template_id_94dfa2c8___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./AdRequestComponent.vue?vue&type=template&id=94dfa2c8& */ "./resources/js/components/AdRequestComponent.vue?vue&type=template&id=94dfa2c8&");
/* harmony import */ var _AdRequestComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./AdRequestComponent.vue?vue&type=script&lang=js& */ "./resources/js/components/AdRequestComponent.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _AdRequestComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _AdRequestComponent_vue_vue_type_template_id_94dfa2c8___WEBPACK_IMPORTED_MODULE_0__["render"],
  _AdRequestComponent_vue_vue_type_template_id_94dfa2c8___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/AdRequestComponent.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/AdRequestComponent.vue?vue&type=script&lang=js&":
/*!*********************************************************************************!*\
  !*** ./resources/js/components/AdRequestComponent.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_AdRequestComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./AdRequestComponent.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/AdRequestComponent.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_AdRequestComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/AdRequestComponent.vue?vue&type=template&id=94dfa2c8&":
/*!***************************************************************************************!*\
  !*** ./resources/js/components/AdRequestComponent.vue?vue&type=template&id=94dfa2c8& ***!
  \***************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_AdRequestComponent_vue_vue_type_template_id_94dfa2c8___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./AdRequestComponent.vue?vue&type=template&id=94dfa2c8& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/AdRequestComponent.vue?vue&type=template&id=94dfa2c8&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_AdRequestComponent_vue_vue_type_template_id_94dfa2c8___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_AdRequestComponent_vue_vue_type_template_id_94dfa2c8___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);