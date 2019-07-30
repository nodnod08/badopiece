/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
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
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 12);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/AdminIndexComponent.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/AdminIndexComponent.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************/
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
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
  components: {},
  data: function data() {
    return {};
  },
  methods: {},
  created: function created() {}
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/AdminIndexComponent.vue?vue&type=template&id=79964a5f&":
/*!**********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/AdminIndexComponent.vue?vue&type=template&id=79964a5f& ***!
  \**********************************************************************************************************************************************************************************************************************/
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
  return _c(
    "div",
    { staticClass: "right-panel", attrs: { id: "right-panel" } },
    [
      _c("header", { staticClass: "header", attrs: { id: "header" } }, [
        _c("div", { staticClass: "top-left" }, [
          _c("div", { staticClass: "navbar-header" }, [
            _c("a", { staticClass: "navbar-brand", attrs: { href: "#" } }, [
              _c("img", {
                attrs: {
                  width: "110",
                  height: "40",
                  src: "images/logo3.png",
                  alt: "Logo"
                }
              })
            ]),
            _vm._v(" "),
            _c(
              "a",
              { staticClass: "navbar-brand hidden", attrs: { href: "#" } },
              [_c("img", { attrs: { src: "images/logo3.png", alt: "Logo" } })]
            ),
            _vm._v(" "),
            _vm._m(0)
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "top-right" }, [
          _c("div", { staticClass: "header-menu" }, [
            _c("div", { staticClass: "header-left" }, [
              _vm._m(1),
              _vm._v(" "),
              _vm._m(2),
              _vm._v(" "),
              _vm._m(3),
              _vm._v(" "),
              _c("div", { staticClass: "dropdown for-message" }, [
                _vm._m(4),
                _vm._v(" "),
                _c(
                  "div",
                  {
                    staticClass: "dropdown-menu",
                    attrs: { "aria-labelledby": "message" }
                  },
                  [
                    _c("p", { staticClass: "red" }, [
                      _vm._v("You have 4 Mails")
                    ]),
                    _vm._v(" "),
                    _c(
                      "a",
                      {
                        staticClass: "dropdown-item media",
                        attrs: { href: "#" }
                      },
                      [
                        _c("span", { staticClass: "photo media-left" }, [
                          _c("img", {
                            attrs: {
                              alt: "avatar",
                              src: "admin/images/avatar/1.jpg"
                            }
                          })
                        ]),
                        _vm._v(" "),
                        _vm._m(5)
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "a",
                      {
                        staticClass: "dropdown-item media",
                        attrs: { href: "#" }
                      },
                      [
                        _c("span", { staticClass: "photo media-left" }, [
                          _c("img", {
                            attrs: {
                              alt: "avatar",
                              src: "admin/images/avatar/2.jpg"
                            }
                          })
                        ]),
                        _vm._v(" "),
                        _vm._m(6)
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "a",
                      {
                        staticClass: "dropdown-item media",
                        attrs: { href: "#" }
                      },
                      [
                        _c("span", { staticClass: "photo media-left" }, [
                          _c("img", {
                            attrs: {
                              alt: "avatar",
                              src: "admin/images/avatar/3.jpg"
                            }
                          })
                        ]),
                        _vm._v(" "),
                        _vm._m(7)
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "a",
                      {
                        staticClass: "dropdown-item media",
                        attrs: { href: "#" }
                      },
                      [
                        _c("span", { staticClass: "photo media-left" }, [
                          _c("img", {
                            attrs: {
                              alt: "avatar",
                              src: "admin/images/avatar/4.jpg"
                            }
                          })
                        ]),
                        _vm._v(" "),
                        _vm._m(8)
                      ]
                    )
                  ]
                )
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "user-area dropdown float-right" }, [
              _c(
                "a",
                {
                  staticClass: "dropdown-toggle active",
                  attrs: {
                    href: "#",
                    "data-toggle": "dropdown",
                    "aria-haspopup": "true",
                    "aria-expanded": "false"
                  }
                },
                [
                  _c("img", {
                    staticClass: "user-avatar rounded-circle",
                    attrs: { src: "admin/images/admin.jpg", alt: "User Avatar" }
                  })
                ]
              ),
              _vm._v(" "),
              _vm._m(9)
            ])
          ])
        ])
      ]),
      _vm._v(" "),
      _vm._m(10),
      _vm._v(" "),
      _c("div", { staticClass: "clearfix" }),
      _vm._v(" "),
      _vm._m(11)
    ]
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("a", { staticClass: "menutoggle", attrs: { id: "menuToggle" } }, [
      _c("i", { staticClass: "fa fa-bars" })
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("button", { staticClass: "search-trigger" }, [
      _c("i", { staticClass: "fa fa-search" })
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "form-inline" }, [
      _c("form", { staticClass: "search-form" }, [
        _c("input", {
          staticClass: "form-control mr-sm-2",
          attrs: {
            type: "text",
            placeholder: "Search ...",
            "aria-label": "Search"
          }
        }),
        _vm._v(" "),
        _c(
          "button",
          { staticClass: "search-close", attrs: { type: "submit" } },
          [_c("i", { staticClass: "fa fa-close" })]
        )
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "dropdown for-notification" }, [
      _c(
        "button",
        {
          staticClass: "btn btn-secondary dropdown-toggle",
          attrs: {
            type: "button",
            id: "notification",
            "data-toggle": "dropdown",
            "aria-haspopup": "true",
            "aria-expanded": "false"
          }
        },
        [
          _c("i", { staticClass: "fa fa-bell" }),
          _vm._v(" "),
          _c("span", { staticClass: "count bg-danger" }, [_vm._v("3")])
        ]
      ),
      _vm._v(" "),
      _c(
        "div",
        {
          staticClass: "dropdown-menu",
          attrs: { "aria-labelledby": "notification" }
        },
        [
          _c("p", { staticClass: "red" }, [_vm._v("You have 3 Notification")]),
          _vm._v(" "),
          _c(
            "a",
            { staticClass: "dropdown-item media", attrs: { href: "#" } },
            [
              _c("i", { staticClass: "fa fa-check" }),
              _vm._v(" "),
              _c("p", [_vm._v("Server #1 overloaded.")])
            ]
          ),
          _vm._v(" "),
          _c(
            "a",
            { staticClass: "dropdown-item media", attrs: { href: "#" } },
            [
              _c("i", { staticClass: "fa fa-info" }),
              _vm._v(" "),
              _c("p", [_vm._v("Server #2 overloaded.")])
            ]
          ),
          _vm._v(" "),
          _c(
            "a",
            { staticClass: "dropdown-item media", attrs: { href: "#" } },
            [
              _c("i", { staticClass: "fa fa-warning" }),
              _vm._v(" "),
              _c("p", [_vm._v("Server #3 overloaded.")])
            ]
          )
        ]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "button",
      {
        staticClass: "btn btn-secondary dropdown-toggle",
        attrs: {
          type: "button",
          id: "message",
          "data-toggle": "dropdown",
          "aria-haspopup": "true",
          "aria-expanded": "false"
        }
      },
      [
        _c("i", { staticClass: "fa fa-envelope" }),
        _vm._v(" "),
        _c("span", { staticClass: "count bg-primary" }, [_vm._v("4")])
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "message media-body" }, [
      _c("span", { staticClass: "name float-left" }, [
        _vm._v("Jonathan Smith")
      ]),
      _vm._v(" "),
      _c("span", { staticClass: "time float-right" }, [_vm._v("Just now")]),
      _vm._v(" "),
      _c("p", [_vm._v("Hello, this is an example msg")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "message media-body" }, [
      _c("span", { staticClass: "name float-left" }, [_vm._v("Jack Sanders")]),
      _vm._v(" "),
      _c("span", { staticClass: "time float-right" }, [
        _vm._v("5 minutes ago")
      ]),
      _vm._v(" "),
      _c("p", [_vm._v("Lorem ipsum dolor sit amet, consectetur")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "message media-body" }, [
      _c("span", { staticClass: "name float-left" }, [
        _vm._v("Cheryl Wheeler")
      ]),
      _vm._v(" "),
      _c("span", { staticClass: "time float-right" }, [
        _vm._v("10 minutes ago")
      ]),
      _vm._v(" "),
      _c("p", [_vm._v("Hello, this is an example msg")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "message media-body" }, [
      _c("span", { staticClass: "name float-left" }, [_vm._v("Rachel Santos")]),
      _vm._v(" "),
      _c("span", { staticClass: "time float-right" }, [
        _vm._v("15 minutes ago")
      ]),
      _vm._v(" "),
      _c("p", [_vm._v("Lorem ipsum dolor sit amet, consectetur")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "user-menu dropdown-menu" }, [
      _c("a", { staticClass: "nav-link", attrs: { href: "#" } }, [
        _c("i", { staticClass: "fa fa- user" }),
        _vm._v("My Profile\n            ")
      ]),
      _vm._v(" "),
      _c("a", { staticClass: "nav-link", attrs: { href: "#" } }, [
        _c("i", { staticClass: "fa fa- user" }),
        _vm._v("Notifications\n              "),
        _c("span", { staticClass: "count" }, [_vm._v("13")])
      ]),
      _vm._v(" "),
      _c("a", { staticClass: "nav-link", attrs: { href: "#" } }, [
        _c("i", { staticClass: "fa fa -cog" }),
        _vm._v("Settings\n            ")
      ]),
      _vm._v(" "),
      _c("a", { staticClass: "nav-link", attrs: { href: "#" } }, [
        _c("i", { staticClass: "fa fa-power -off" }),
        _vm._v("Logout\n            ")
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "content" }, [
      _c("div", { staticClass: "animated fadeIn" }, [
        _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-lg-3 col-md-6" }, [
            _c("div", { staticClass: "card" }, [
              _c("div", { staticClass: "card-body" }, [
                _c("div", { staticClass: "stat-widget-five" }, [
                  _c("div", { staticClass: "stat-icon dib flat-color-1" }, [
                    _c("i", { staticClass: "pe-7s-cash" })
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "stat-content" }, [
                    _c("div", { staticClass: "text-left dib" }, [
                      _c("div", { staticClass: "stat-text" }, [
                        _vm._v("$"),
                        _c("span", { staticClass: "count" }, [_vm._v("23569")])
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "stat-heading" }, [
                        _vm._v("Revenue")
                      ])
                    ])
                  ])
                ])
              ])
            ])
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "col-lg-3 col-md-6" }, [
            _c("div", { staticClass: "card" }, [
              _c("div", { staticClass: "card-body" }, [
                _c("div", { staticClass: "stat-widget-five" }, [
                  _c("div", { staticClass: "stat-icon dib flat-color-2" }, [
                    _c("i", { staticClass: "pe-7s-cart" })
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "stat-content" }, [
                    _c("div", { staticClass: "text-left dib" }, [
                      _c("div", { staticClass: "stat-text" }, [
                        _c("span", { staticClass: "count" }, [_vm._v("3435")])
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "stat-heading" }, [
                        _vm._v("Sales")
                      ])
                    ])
                  ])
                ])
              ])
            ])
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "col-lg-3 col-md-6" }, [
            _c("div", { staticClass: "card" }, [
              _c("div", { staticClass: "card-body" }, [
                _c("div", { staticClass: "stat-widget-five" }, [
                  _c("div", { staticClass: "stat-icon dib flat-color-3" }, [
                    _c("i", { staticClass: "pe-7s-browser" })
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "stat-content" }, [
                    _c("div", { staticClass: "text-left dib" }, [
                      _c("div", { staticClass: "stat-text" }, [
                        _c("span", { staticClass: "count" }, [_vm._v("349")])
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "stat-heading" }, [
                        _vm._v("Templates")
                      ])
                    ])
                  ])
                ])
              ])
            ])
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "col-lg-3 col-md-6" }, [
            _c("div", { staticClass: "card" }, [
              _c("div", { staticClass: "card-body" }, [
                _c("div", { staticClass: "stat-widget-five" }, [
                  _c("div", { staticClass: "stat-icon dib flat-color-4" }, [
                    _c("i", { staticClass: "pe-7s-users" })
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "stat-content" }, [
                    _c("div", { staticClass: "text-left dib" }, [
                      _c("div", { staticClass: "stat-text" }, [
                        _c("span", { staticClass: "count" }, [_vm._v("2986")])
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "stat-heading" }, [
                        _vm._v("Clients")
                      ])
                    ])
                  ])
                ])
              ])
            ])
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-lg-12" }, [
            _c("div", { staticClass: "card" }, [
              _c("div", { staticClass: "card-body" }, [
                _c("h4", { staticClass: "box-title" }, [_vm._v("Traffic ")])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "row" }, [
                _c("div", { staticClass: "col-lg-8" }, [
                  _c("div", { staticClass: "card-body" }, [
                    _c("div", {
                      staticClass: "traffic-chart",
                      attrs: { id: "traffic-chart" }
                    })
                  ])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "col-lg-4" }, [
                  _c("div", { staticClass: "card-body" }, [
                    _c("div", { staticClass: "progress-box progress-1" }, [
                      _c("h4", { staticClass: "por-title" }, [
                        _vm._v("Visits")
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "por-txt" }, [
                        _vm._v("96,930 Users (40%)")
                      ]),
                      _vm._v(" "),
                      _c(
                        "div",
                        {
                          staticClass: "progress mb-2",
                          staticStyle: { height: "5px" }
                        },
                        [
                          _c("div", {
                            staticClass: "progress-bar bg-flat-color-1",
                            staticStyle: { width: "40%" },
                            attrs: {
                              role: "progressbar",
                              "aria-valuenow": "25",
                              "aria-valuemin": "0",
                              "aria-valuemax": "100"
                            }
                          })
                        ]
                      )
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "progress-box progress-2" }, [
                      _c("h4", { staticClass: "por-title" }, [
                        _vm._v("Bounce Rate")
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "por-txt" }, [
                        _vm._v("3,220 Users (24%)")
                      ]),
                      _vm._v(" "),
                      _c(
                        "div",
                        {
                          staticClass: "progress mb-2",
                          staticStyle: { height: "5px" }
                        },
                        [
                          _c("div", {
                            staticClass: "progress-bar bg-flat-color-2",
                            staticStyle: { width: "24%" },
                            attrs: {
                              role: "progressbar",
                              "aria-valuenow": "25",
                              "aria-valuemin": "0",
                              "aria-valuemax": "100"
                            }
                          })
                        ]
                      )
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "progress-box progress-2" }, [
                      _c("h4", { staticClass: "por-title" }, [
                        _vm._v("Unique Visitors")
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "por-txt" }, [
                        _vm._v("29,658 Users (60%)")
                      ]),
                      _vm._v(" "),
                      _c(
                        "div",
                        {
                          staticClass: "progress mb-2",
                          staticStyle: { height: "5px" }
                        },
                        [
                          _c("div", {
                            staticClass: "progress-bar bg-flat-color-3",
                            staticStyle: { width: "60%" },
                            attrs: {
                              role: "progressbar",
                              "aria-valuenow": "60",
                              "aria-valuemin": "0",
                              "aria-valuemax": "100"
                            }
                          })
                        ]
                      )
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "progress-box progress-2" }, [
                      _c("h4", { staticClass: "por-title" }, [
                        _vm._v("Targeted  Visitors")
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "por-txt" }, [
                        _vm._v("99,658 Users (90%)")
                      ]),
                      _vm._v(" "),
                      _c(
                        "div",
                        {
                          staticClass: "progress mb-2",
                          staticStyle: { height: "5px" }
                        },
                        [
                          _c("div", {
                            staticClass: "progress-bar bg-flat-color-4",
                            staticStyle: { width: "90%" },
                            attrs: {
                              role: "progressbar",
                              "aria-valuenow": "90",
                              "aria-valuemin": "0",
                              "aria-valuemax": "100"
                            }
                          })
                        ]
                      )
                    ])
                  ])
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "card-body" })
            ])
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "clearfix" }),
        _vm._v(" "),
        _c("div", { staticClass: "orders" }, [
          _c("div", { staticClass: "row" }, [
            _c("div", { staticClass: "col-xl-8" }, [
              _c("div", { staticClass: "card" }, [
                _c("div", { staticClass: "card-body" }, [
                  _c("h4", { staticClass: "box-title" }, [_vm._v("Orders ")])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "card-body--" }, [
                  _c("div", { staticClass: "table-stats order-table ov-h" }, [
                    _c("table", { staticClass: "table " }, [
                      _c("thead", [
                        _c("tr", [
                          _c("th", { staticClass: "serial" }, [_vm._v("#")]),
                          _vm._v(" "),
                          _c("th", { staticClass: "avatar" }, [
                            _vm._v("Avatar")
                          ]),
                          _vm._v(" "),
                          _c("th", [_vm._v("ID")]),
                          _vm._v(" "),
                          _c("th", [_vm._v("Name")]),
                          _vm._v(" "),
                          _c("th", [_vm._v("Product")]),
                          _vm._v(" "),
                          _c("th", [_vm._v("Quantity")]),
                          _vm._v(" "),
                          _c("th", [_vm._v("Status")])
                        ])
                      ]),
                      _vm._v(" "),
                      _c("tbody", [
                        _c("tr", [
                          _c("td", { staticClass: "serial" }, [_vm._v("1.")]),
                          _vm._v(" "),
                          _c("td", { staticClass: "avatar" }, [
                            _c("div", { staticClass: "round-img" })
                          ]),
                          _vm._v(" "),
                          _c("td", [_vm._v(" #5469 ")]),
                          _vm._v(" "),
                          _c("td", [
                            _c("span", { staticClass: "name" }, [
                              _vm._v("Louis Stanley")
                            ])
                          ]),
                          _vm._v(" "),
                          _c("td", [
                            _c("span", { staticClass: "product" }, [
                              _vm._v("iMax")
                            ])
                          ]),
                          _vm._v(" "),
                          _c("td", [
                            _c("span", { staticClass: "count" }, [
                              _vm._v("231")
                            ])
                          ]),
                          _vm._v(" "),
                          _c("td", [
                            _c(
                              "span",
                              { staticClass: "badge badge-complete" },
                              [_vm._v("Complete")]
                            )
                          ])
                        ]),
                        _vm._v(" "),
                        _c("tr", [
                          _c("td", { staticClass: "serial" }, [_vm._v("2.")]),
                          _vm._v(" "),
                          _c("td", { staticClass: "avatar" }, [
                            _c("div", { staticClass: "round-img" })
                          ]),
                          _vm._v(" "),
                          _c("td", [_vm._v(" #5468 ")]),
                          _vm._v(" "),
                          _c("td", [
                            _c("span", { staticClass: "name" }, [
                              _vm._v("Gregory Dixon")
                            ])
                          ]),
                          _vm._v(" "),
                          _c("td", [
                            _c("span", { staticClass: "product" }, [
                              _vm._v("iPad")
                            ])
                          ]),
                          _vm._v(" "),
                          _c("td", [
                            _c("span", { staticClass: "count" }, [
                              _vm._v("250")
                            ])
                          ]),
                          _vm._v(" "),
                          _c("td", [
                            _c(
                              "span",
                              { staticClass: "badge badge-complete" },
                              [_vm._v("Complete")]
                            )
                          ])
                        ]),
                        _vm._v(" "),
                        _c("tr", [
                          _c("td", { staticClass: "serial" }, [_vm._v("3.")]),
                          _vm._v(" "),
                          _c("td", { staticClass: "avatar" }, [
                            _c("div", { staticClass: "round-img" })
                          ]),
                          _vm._v(" "),
                          _c("td", [_vm._v(" #5467 ")]),
                          _vm._v(" "),
                          _c("td", [
                            _c("span", { staticClass: "name" }, [
                              _vm._v("Catherine Dixon")
                            ])
                          ]),
                          _vm._v(" "),
                          _c("td", [
                            _c("span", { staticClass: "product" }, [
                              _vm._v("SSD")
                            ])
                          ]),
                          _vm._v(" "),
                          _c("td", [
                            _c("span", { staticClass: "count" }, [
                              _vm._v("250")
                            ])
                          ]),
                          _vm._v(" "),
                          _c("td", [
                            _c(
                              "span",
                              { staticClass: "badge badge-complete" },
                              [_vm._v("Complete")]
                            )
                          ])
                        ]),
                        _vm._v(" "),
                        _c("tr", [
                          _c("td", { staticClass: "serial" }, [_vm._v("4.")]),
                          _vm._v(" "),
                          _c("td", { staticClass: "avatar" }, [
                            _c("div", { staticClass: "round-img" })
                          ]),
                          _vm._v(" "),
                          _c("td", [_vm._v(" #5466 ")]),
                          _vm._v(" "),
                          _c("td", [
                            _c("span", { staticClass: "name" }, [
                              _vm._v("Mary Silva")
                            ])
                          ]),
                          _vm._v(" "),
                          _c("td", [
                            _c("span", { staticClass: "product" }, [
                              _vm._v("Magic Mouse")
                            ])
                          ]),
                          _vm._v(" "),
                          _c("td", [
                            _c("span", { staticClass: "count" }, [
                              _vm._v("250")
                            ])
                          ]),
                          _vm._v(" "),
                          _c("td", [
                            _c("span", { staticClass: "badge badge-pending" }, [
                              _vm._v("Pending")
                            ])
                          ])
                        ]),
                        _vm._v(" "),
                        _c("tr", { staticClass: " pb-0" }, [
                          _c("td", { staticClass: "serial" }, [_vm._v("5.")]),
                          _vm._v(" "),
                          _c("td", { staticClass: "avatar pb-0" }, [
                            _c("div", { staticClass: "round-img" })
                          ]),
                          _vm._v(" "),
                          _c("td", [_vm._v(" #5465 ")]),
                          _vm._v(" "),
                          _c("td", [
                            _c("span", { staticClass: "name" }, [
                              _vm._v("Johnny Stephens")
                            ])
                          ]),
                          _vm._v(" "),
                          _c("td", [
                            _c("span", { staticClass: "product" }, [
                              _vm._v("Monitor")
                            ])
                          ]),
                          _vm._v(" "),
                          _c("td", [
                            _c("span", { staticClass: "count" }, [
                              _vm._v("250")
                            ])
                          ]),
                          _vm._v(" "),
                          _c("td", [
                            _c(
                              "span",
                              { staticClass: "badge badge-complete" },
                              [_vm._v("Complete")]
                            )
                          ])
                        ])
                      ])
                    ])
                  ])
                ])
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "col-xl-4" }, [
              _c("div", { staticClass: "row" }, [
                _c("div", { staticClass: "col-lg-6 col-xl-12" }, [
                  _c("div", { staticClass: "card br-0" }, [
                    _c("div", { staticClass: "card-body" }, [
                      _c("div", { staticClass: "chart-container ov-h" }, [
                        _c("div", {
                          staticClass: "float-chart",
                          attrs: { id: "flotPie1" }
                        })
                      ])
                    ])
                  ])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "col-lg-6 col-xl-12" }, [
                  _c("div", { staticClass: "card bg-flat-color-3  " }, [
                    _c("div", { staticClass: "card-body" }, [
                      _c(
                        "h4",
                        { staticClass: "card-title m-0  white-color " },
                        [_vm._v("August 2018")]
                      )
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "card-body" }, [
                      _c("div", {
                        staticClass: "flot-line",
                        attrs: { id: "flotLine5" }
                      })
                    ])
                  ])
                ])
              ])
            ])
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-lg-6" }, [
            _c("div", { staticClass: "card" }, [
              _c("div", { staticClass: "card-body" }, [
                _c("h4", { staticClass: "card-title box-title" }, [
                  _vm._v("To Do List")
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "card-content" }, [
                  _c("div", { staticClass: "todo-list" }, [
                    _c("div", { staticClass: "tdl-holder" }, [
                      _c("div", { staticClass: "tdl-content" }, [
                        _c("ul", [
                          _c("li", [
                            _c("label", [
                              _c("input", { attrs: { type: "checkbox" } }),
                              _c("i", { staticClass: "check-box" }),
                              _c("span", [
                                _vm._v(
                                  "Conveniently fabricate interactive technology for ...."
                                )
                              ]),
                              _vm._v(" "),
                              _c("a", {
                                staticClass: "fa fa-times",
                                attrs: { href: "#" }
                              }),
                              _vm._v(" "),
                              _c("a", {
                                staticClass: "fa fa-pencil",
                                attrs: { href: "#" }
                              }),
                              _vm._v(" "),
                              _c("a", {
                                staticClass: "fa fa-check",
                                attrs: { href: "#" }
                              })
                            ])
                          ]),
                          _vm._v(" "),
                          _c("li", [
                            _c("label", [
                              _c("input", { attrs: { type: "checkbox" } }),
                              _c("i", { staticClass: "check-box" }),
                              _c("span", [_vm._v("Creating component page")]),
                              _vm._v(" "),
                              _c("a", {
                                staticClass: "fa fa-times",
                                attrs: { href: "#" }
                              }),
                              _vm._v(" "),
                              _c("a", {
                                staticClass: "fa fa-pencil",
                                attrs: { href: "#" }
                              }),
                              _vm._v(" "),
                              _c("a", {
                                staticClass: "fa fa-check",
                                attrs: { href: "#" }
                              })
                            ])
                          ]),
                          _vm._v(" "),
                          _c("li", [
                            _c("label", [
                              _c("input", {
                                attrs: { type: "checkbox", checked: "" }
                              }),
                              _c("i", { staticClass: "check-box" }),
                              _c("span", [
                                _vm._v("Follow back those who follow you")
                              ]),
                              _vm._v(" "),
                              _c("a", {
                                staticClass: "fa fa-times",
                                attrs: { href: "#" }
                              }),
                              _vm._v(" "),
                              _c("a", {
                                staticClass: "fa fa-pencil",
                                attrs: { href: "#" }
                              }),
                              _vm._v(" "),
                              _c("a", {
                                staticClass: "fa fa-check",
                                attrs: { href: "#" }
                              })
                            ])
                          ]),
                          _vm._v(" "),
                          _c("li", [
                            _c("label", [
                              _c("input", {
                                attrs: { type: "checkbox", checked: "" }
                              }),
                              _c("i", { staticClass: "check-box" }),
                              _c("span", [_vm._v("Design One page theme")]),
                              _vm._v(" "),
                              _c("a", {
                                staticClass: "fa fa-times",
                                attrs: { href: "#" }
                              }),
                              _vm._v(" "),
                              _c("a", {
                                staticClass: "fa fa-pencil",
                                attrs: { href: "#" }
                              }),
                              _vm._v(" "),
                              _c("a", {
                                staticClass: "fa fa-check",
                                attrs: { href: "#" }
                              })
                            ])
                          ]),
                          _vm._v(" "),
                          _c("li", [
                            _c("label", [
                              _c("input", {
                                attrs: { type: "checkbox", checked: "" }
                              }),
                              _c("i", { staticClass: "check-box" }),
                              _c("span", [_vm._v("Creating component page")]),
                              _vm._v(" "),
                              _c("a", {
                                staticClass: "fa fa-times",
                                attrs: { href: "#" }
                              }),
                              _vm._v(" "),
                              _c("a", {
                                staticClass: "fa fa-pencil",
                                attrs: { href: "#" }
                              }),
                              _vm._v(" "),
                              _c("a", {
                                staticClass: "fa fa-check",
                                attrs: { href: "#" }
                              })
                            ])
                          ])
                        ])
                      ])
                    ])
                  ])
                ])
              ])
            ])
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "col-lg-6" }, [
            _c("div", { staticClass: "card" }, [
              _c("div", { staticClass: "card-body" }, [
                _c("h4", { staticClass: "card-title box-title" }, [
                  _vm._v("Live Chat")
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "card-content" }, [
                  _c("div", { staticClass: "messenger-box" }, [
                    _c("ul", [
                      _c("li", [
                        _c(
                          "div",
                          { staticClass: "msg-received msg-container" },
                          [
                            _c("div", { staticClass: "avatar" }, [
                              _c("div", { staticClass: "send-time" }, [
                                _vm._v("11.11 am")
                              ])
                            ]),
                            _vm._v(" "),
                            _c("div", { staticClass: "msg-box" }, [
                              _c("div", { staticClass: "inner-box" }, [
                                _c("div", { staticClass: "name" }, [
                                  _vm._v(
                                    "\n                                                          John Doe\n                                                      "
                                  )
                                ]),
                                _vm._v(" "),
                                _c("div", { staticClass: "meg" }, [
                                  _vm._v(
                                    "\n                                                          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis sunt placeat velit ad reiciendis ipsam\n                                                      "
                                  )
                                ])
                              ])
                            ])
                          ]
                        )
                      ]),
                      _vm._v(" "),
                      _c("li", [
                        _c("div", { staticClass: "msg-sent msg-container" }, [
                          _c("div", { staticClass: "avatar" }, [
                            _c("div", { staticClass: "send-time" }, [
                              _vm._v("11.11 am")
                            ])
                          ]),
                          _vm._v(" "),
                          _c("div", { staticClass: "msg-box" }, [
                            _c("div", { staticClass: "inner-box" }, [
                              _c("div", { staticClass: "name" }, [
                                _vm._v(
                                  "\n                                                          John Doe\n                                                      "
                                )
                              ]),
                              _vm._v(" "),
                              _c("div", { staticClass: "meg" }, [
                                _vm._v(
                                  "\n                                                          Hay how are you doing?\n                                                      "
                                )
                              ])
                            ])
                          ])
                        ])
                      ])
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "send-mgs" }, [
                      _c("div", { staticClass: "yourmsg" }, [
                        _c("input", {
                          staticClass: "form-control",
                          attrs: { type: "text" }
                        })
                      ]),
                      _vm._v(" "),
                      _c("button", { staticClass: "btn msg-send-btn" }, [
                        _c("i", { staticClass: "pe-7s-paper-plane" })
                      ])
                    ])
                  ])
                ])
              ])
            ])
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-md-12 col-lg-4" }, [
            _c("div", { staticClass: "card" }, [
              _c("div", { staticClass: "card-body" }, [
                _c("div", { staticClass: "calender-cont widget-calender" }, [
                  _c("div", { attrs: { id: "calendar" } })
                ])
              ])
            ])
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "col-lg-4 col-md-6" }, [
            _c("div", { staticClass: "card ov-h" }, [
              _c("div", { staticClass: "card-body bg-flat-color-2" }, [
                _c("div", {
                  staticClass: "float-chart ml-4 mr-4",
                  attrs: { id: "flotBarChart" }
                })
              ]),
              _vm._v(" "),
              _c("div", {
                staticClass: "float-chart",
                attrs: { id: "cellPaiChart" }
              })
            ])
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "col-lg-4 col-md-6" }, [
            _c("div", { staticClass: "card weather-box" }, [
              _c("h4", { staticClass: "weather-title box-title" }, [
                _vm._v("Weather")
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "card-body" }, [
                _c("div", { staticClass: "weather-widget" }, [
                  _c("div", {
                    staticClass: "weather-one",
                    attrs: { id: "weather-one" }
                  })
                ])
              ])
            ])
          ])
        ]),
        _vm._v(" "),
        _c(
          "div",
          {
            staticClass: "modal fade none-border",
            attrs: { id: "event-modal" }
          },
          [
            _c("div", { staticClass: "modal-dialog" }, [
              _c("div", { staticClass: "modal-content" }, [
                _c("div", { staticClass: "modal-header" }, [
                  _c(
                    "button",
                    {
                      staticClass: "close",
                      attrs: {
                        type: "button",
                        "data-dismiss": "modal",
                        "aria-hidden": "true"
                      }
                    },
                    [_vm._v("×")]
                  ),
                  _vm._v(" "),
                  _c("h4", { staticClass: "modal-title" }, [
                    _c("strong", [_vm._v("Add New Event")])
                  ])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "modal-body" }),
                _vm._v(" "),
                _c("div", { staticClass: "modal-footer" }, [
                  _c(
                    "button",
                    {
                      staticClass: "btn btn-default waves-effect",
                      attrs: { type: "button", "data-dismiss": "modal" }
                    },
                    [_vm._v("Close")]
                  ),
                  _vm._v(" "),
                  _c(
                    "button",
                    {
                      staticClass:
                        "btn btn-success save-event waves-effect waves-light",
                      attrs: { type: "button" }
                    },
                    [_vm._v("Create event")]
                  ),
                  _vm._v(" "),
                  _c(
                    "button",
                    {
                      staticClass:
                        "btn btn-danger delete-event waves-effect waves-light",
                      attrs: { type: "button", "data-dismiss": "modal" }
                    },
                    [_vm._v("Delete")]
                  )
                ])
              ])
            ])
          ]
        ),
        _vm._v(" "),
        _c(
          "div",
          {
            staticClass: "modal fade none-border",
            attrs: { id: "add-category" }
          },
          [
            _c("div", { staticClass: "modal-dialog" }, [
              _c("div", { staticClass: "modal-content" }, [
                _c("div", { staticClass: "modal-header" }, [
                  _c(
                    "button",
                    {
                      staticClass: "close",
                      attrs: {
                        type: "button",
                        "data-dismiss": "modal",
                        "aria-hidden": "true"
                      }
                    },
                    [_vm._v("×")]
                  ),
                  _vm._v(" "),
                  _c("h4", { staticClass: "modal-title" }, [
                    _c("strong", [_vm._v("Add a category ")])
                  ])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "modal-body" }, [
                  _c("form", [
                    _c("div", { staticClass: "row" }, [
                      _c("div", { staticClass: "col-md-6" }, [
                        _c("label", { staticClass: "control-label" }, [
                          _vm._v("Category Name")
                        ]),
                        _vm._v(" "),
                        _c("input", {
                          staticClass: "form-control form-white",
                          attrs: {
                            placeholder: "Enter name",
                            type: "text",
                            name: "category-name"
                          }
                        })
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "col-md-6" }, [
                        _c("label", { staticClass: "control-label" }, [
                          _vm._v("Choose Category Color")
                        ]),
                        _vm._v(" "),
                        _c(
                          "select",
                          {
                            staticClass: "form-control form-white",
                            attrs: {
                              "data-placeholder": "Choose a color...",
                              name: "category-color"
                            }
                          },
                          [
                            _c("option", { attrs: { value: "success" } }, [
                              _vm._v("Success")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "danger" } }, [
                              _vm._v("Danger")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "info" } }, [
                              _vm._v("Info")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "pink" } }, [
                              _vm._v("Pink")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "primary" } }, [
                              _vm._v("Primary")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "warning" } }, [
                              _vm._v("Warning")
                            ])
                          ]
                        )
                      ])
                    ])
                  ])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "modal-footer" }, [
                  _c(
                    "button",
                    {
                      staticClass: "btn btn-default waves-effect",
                      attrs: { type: "button", "data-dismiss": "modal" }
                    },
                    [_vm._v("Close")]
                  ),
                  _vm._v(" "),
                  _c(
                    "button",
                    {
                      staticClass:
                        "btn btn-danger waves-effect waves-light save-category",
                      attrs: { type: "button", "data-dismiss": "modal" }
                    },
                    [_vm._v("Save")]
                  )
                ])
              ])
            ])
          ]
        )
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("footer", { staticClass: "site-footer" }, [
      _c("div", { staticClass: "footer-inner bg-white" }, [
        _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-sm-6" }, [
            _vm._v("Copyright © 2018 Ela Admin")
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "col-sm-6 text-right" }, [
            _vm._v("\n          Designed by\n          "),
            _c("a", { attrs: { href: "https://colorlib.com" } }, [
              _vm._v("Colorlib")
            ])
          ])
        ])
      ])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js":
/*!********************************************************************!*\
  !*** ./node_modules/vue-loader/lib/runtime/componentNormalizer.js ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return normalizeComponent; });
/* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file (except for modules).
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

function normalizeComponent (
  scriptExports,
  render,
  staticRenderFns,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier, /* server only */
  shadowMode /* vue-cli only */
) {
  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

  // render functions
  if (render) {
    options.render = render
    options.staticRenderFns = staticRenderFns
    options._compiled = true
  }

  // functional template
  if (functionalTemplate) {
    options.functional = true
  }

  // scopedId
  if (scopeId) {
    options._scopeId = 'data-v-' + scopeId
  }

  var hook
  if (moduleIdentifier) { // server build
    hook = function (context) {
      // 2.3 injection
      context =
        context || // cached call
        (this.$vnode && this.$vnode.ssrContext) || // stateful
        (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
      // 2.2 with runInNewContext: true
      if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
        context = __VUE_SSR_CONTEXT__
      }
      // inject component styles
      if (injectStyles) {
        injectStyles.call(this, context)
      }
      // register component module identifier for async chunk inferrence
      if (context && context._registeredComponents) {
        context._registeredComponents.add(moduleIdentifier)
      }
    }
    // used by ssr in case component is cached and beforeCreate
    // never gets called
    options._ssrRegister = hook
  } else if (injectStyles) {
    hook = shadowMode
      ? function () { injectStyles.call(this, this.$root.$options.shadowRoot) }
      : injectStyles
  }

  if (hook) {
    if (options.functional) {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functioal component in vue file
      var originalRender = options.render
      options.render = function renderWithStyleInjection (h, context) {
        hook.call(context)
        return originalRender(h, context)
      }
    } else {
      // inject component registration as beforeCreate hook
      var existing = options.beforeCreate
      options.beforeCreate = existing
        ? [].concat(existing, hook)
        : [hook]
    }
  }

  return {
    exports: scriptExports,
    options: options
  }
}


/***/ }),

/***/ "./resources/js/admin_index.js":
/*!*************************************!*\
  !*** ./resources/js/admin_index.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
// require("./bootstrap");

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */
// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));
Vue.component('admin-component', __webpack_require__(/*! ./components/AdminIndexComponent.vue */ "./resources/js/components/AdminIndexComponent.vue").default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

var admin = new Vue({
  el: '#admin'
});

/***/ }),

/***/ "./resources/js/components/AdminIndexComponent.vue":
/*!*********************************************************!*\
  !*** ./resources/js/components/AdminIndexComponent.vue ***!
  \*********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _AdminIndexComponent_vue_vue_type_template_id_79964a5f___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./AdminIndexComponent.vue?vue&type=template&id=79964a5f& */ "./resources/js/components/AdminIndexComponent.vue?vue&type=template&id=79964a5f&");
/* harmony import */ var _AdminIndexComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./AdminIndexComponent.vue?vue&type=script&lang=js& */ "./resources/js/components/AdminIndexComponent.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _AdminIndexComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _AdminIndexComponent_vue_vue_type_template_id_79964a5f___WEBPACK_IMPORTED_MODULE_0__["render"],
  _AdminIndexComponent_vue_vue_type_template_id_79964a5f___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/AdminIndexComponent.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/AdminIndexComponent.vue?vue&type=script&lang=js&":
/*!**********************************************************************************!*\
  !*** ./resources/js/components/AdminIndexComponent.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_AdminIndexComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./AdminIndexComponent.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/AdminIndexComponent.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_AdminIndexComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/AdminIndexComponent.vue?vue&type=template&id=79964a5f&":
/*!****************************************************************************************!*\
  !*** ./resources/js/components/AdminIndexComponent.vue?vue&type=template&id=79964a5f& ***!
  \****************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_AdminIndexComponent_vue_vue_type_template_id_79964a5f___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./AdminIndexComponent.vue?vue&type=template&id=79964a5f& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/AdminIndexComponent.vue?vue&type=template&id=79964a5f&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_AdminIndexComponent_vue_vue_type_template_id_79964a5f___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_AdminIndexComponent_vue_vue_type_template_id_79964a5f___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ 12:
/*!*******************************************!*\
  !*** multi ./resources/js/admin_index.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\badopiece\resources\js\admin_index.js */"./resources/js/admin_index.js");


/***/ })

/******/ });