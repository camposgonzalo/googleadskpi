(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[2],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/KeywordRequestComponent.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/KeywordRequestComponent.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************************************************************************************************/
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
/* harmony default export */ __webpack_exports__["default"] = ({
  props: ["type", "groups", "campaigns", "form", "showButtons", "currentUser"],
  data: function data() {
    return {
      keyword: "",
      keywords: [],
      formRequest: {
        type: "Crear",
        level: "Palabra ".concat(this.type),
        user_id: this.currentUser.id
      },
      resource: "ads-request",
      records: [],
      errors: {}
    };
  },
  created: function created() {},
  methods: {
    addKeyword: function addKeyword() {
      if (this.keyword != "") {
        this.form.keyword.push(this.keyword);
      }

      this.keyword = "";
    },
    initForm: function initForm() {
      this.form = {
        keyword: []
      };
      this.errors = {};
      this.formRequest = {
        type: "Crear",
        level: "Palabra ".concat(this.type),
        user_id: this.currentUser.id
      };
    },
    getRecords: function getRecords() {
      var _this = this;

      this.$http.get("/".concat(this.resource, "/records")).then(function (response) {
        _this.records = response.data.data;
      });
    },
    saveDraft: function saveDraft() {
      this.formRequest.state = "Borrador";
      this.saveKeyword();
    },
    savePending: function savePending() {
      this.formRequest.state = "Pendiente";
      this.saveKeyword();
    },
    saveKeyword: function saveKeyword() {
      var _this2 = this;

      var form = this.form;
      this.form.type = this.type; // this.form.keyword = JSON.stringify(this.form.keyword);

      form.keyword = JSON.stringify(form.keyword);
      this.formRequest.request = JSON.stringify(form);
      this.$http.post("/".concat(this.resource, "/keyword"), form).then(function (response) {
        _this2.formRequest.keyword_id = response.data.record.id;

        _this2.saveRequest();

        _this2.$message({
          message: response.data.message,
          type: "success"
        });
      })["catch"](function (error) {
        _this2.errors = error.response.data.errors;

        _this2.$message.error("Sucedió un error.");
      });
    },
    saveRequest: function saveRequest() {
      var _this3 = this;

      this.$http.post("/".concat(this.resource), this.formRequest).then(function (response) {
        _this3.initForm();

        _this3.$message({
          message: response.data.message,
          type: "success"
        });

        _this3.cerrar();
      })["catch"](function (error) {
        _this3.$message.error("Sucedió un error.");
      });
    },
    cerrar: function cerrar() {
      this.$emit("cerrar");
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/KeywordRequestComponent.vue?vue&type=template&id=6fdca71c&":
/*!**************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/KeywordRequestComponent.vue?vue&type=template&id=6fdca71c& ***!
  \**************************************************************************************************************************************************************************************************************************/
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
        _vm._v(
          "\n            Vista Solicitud de Palabras " +
            _vm._s(_vm.type) +
            "s\n        "
        )
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "row" }, [
        _c(
          "div",
          { staticClass: "col-md-6" },
          [
            _c("div", { staticClass: "col-md-12" }, [
              _c(
                "div",
                {
                  staticClass: "form-group",
                  class: {
                    "has-danger": _vm.errors.name
                  }
                },
                [
                  _c("label", { staticClass: "control-label" }, [
                    _vm._v("Ingresar palabra " + _vm._s(_vm.type)),
                    _c("span", { staticClass: "text-danger" }, [_vm._v("*")])
                  ]),
                  _vm._v(" "),
                  _c(
                    "el-input",
                    {
                      staticClass: "input-with-select",
                      attrs: { placeholder: "Please input" },
                      model: {
                        value: _vm.keyword,
                        callback: function($$v) {
                          _vm.keyword = $$v
                        },
                        expression: "keyword"
                      }
                    },
                    [
                      _c("el-button", {
                        attrs: { slot: "append", icon: "el-icon-plus" },
                        on: { click: _vm.addKeyword },
                        slot: "append"
                      })
                    ],
                    1
                  ),
                  _vm._v(" "),
                  _vm.errors.keyword
                    ? _c("small", {
                        staticClass: "form-control-feedback",
                        domProps: { textContent: _vm._s(_vm.errors.keyword[0]) }
                      })
                    : _vm._e()
                ],
                1
              )
            ]),
            _vm._v(" "),
            _vm._l(_vm.form.keyword, function(item, index) {
              return _c(
                "div",
                { key: index, staticClass: "col-md-12" },
                [
                  _c(
                    "el-input",
                    {
                      staticClass: "input-with-select",
                      attrs: { placeholder: item },
                      model: {
                        value: _vm.form.keyword[index],
                        callback: function($$v) {
                          _vm.$set(_vm.form.keyword, index, $$v)
                        },
                        expression: "form.keyword[index]"
                      }
                    },
                    [
                      _c("el-button", {
                        attrs: { slot: "append", icon: "el-icon-delete" },
                        on: {
                          click: function($event) {
                            return _vm.form.keyword.splice(index, 1)
                          }
                        },
                        slot: "append"
                      })
                    ],
                    1
                  )
                ],
                1
              )
            })
          ],
          2
        ),
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
          ])
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
                _c("el-button", { on: { click: _vm.saveDraft } }, [
                  _vm._v("Guardar como borrador")
                ]),
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
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/KeywordRequestComponent.vue":
/*!*************************************************************!*\
  !*** ./resources/js/components/KeywordRequestComponent.vue ***!
  \*************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _KeywordRequestComponent_vue_vue_type_template_id_6fdca71c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./KeywordRequestComponent.vue?vue&type=template&id=6fdca71c& */ "./resources/js/components/KeywordRequestComponent.vue?vue&type=template&id=6fdca71c&");
/* harmony import */ var _KeywordRequestComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./KeywordRequestComponent.vue?vue&type=script&lang=js& */ "./resources/js/components/KeywordRequestComponent.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _KeywordRequestComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _KeywordRequestComponent_vue_vue_type_template_id_6fdca71c___WEBPACK_IMPORTED_MODULE_0__["render"],
  _KeywordRequestComponent_vue_vue_type_template_id_6fdca71c___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/KeywordRequestComponent.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/KeywordRequestComponent.vue?vue&type=script&lang=js&":
/*!**************************************************************************************!*\
  !*** ./resources/js/components/KeywordRequestComponent.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_KeywordRequestComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./KeywordRequestComponent.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/KeywordRequestComponent.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_KeywordRequestComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/KeywordRequestComponent.vue?vue&type=template&id=6fdca71c&":
/*!********************************************************************************************!*\
  !*** ./resources/js/components/KeywordRequestComponent.vue?vue&type=template&id=6fdca71c& ***!
  \********************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_KeywordRequestComponent_vue_vue_type_template_id_6fdca71c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./KeywordRequestComponent.vue?vue&type=template&id=6fdca71c& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/KeywordRequestComponent.vue?vue&type=template&id=6fdca71c&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_KeywordRequestComponent_vue_vue_type_template_id_6fdca71c___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_KeywordRequestComponent_vue_vue_type_template_id_6fdca71c___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);