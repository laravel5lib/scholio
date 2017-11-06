! function(t, e) {
    "object" == typeof exports && "object" == typeof module ? module.exports = e() : "function" == typeof define && define.amd ? define([], e) : "object" == typeof exports ? exports.VueMultiselect = e() : t.VueMultiselect = e()
}(this, function() {
    return function(t) {
        function e(n) {
            if (i[n]) return i[n].exports;
            var s = i[n] = {
                i: n,
                l: !1,
                exports: {}
            };
            return t[n].call(s.exports, s, s.exports, e), s.l = !0, s.exports
        }
        var i = {};
        return e.m = t, e.c = i, e.i = function(t) {
            return t
        }, e.d = function(t, i, n) {
            e.o(t, i) || Object.defineProperty(t, i, {
                configurable: !1,
                enumerable: !0,
                get: n
            })
        }, e.n = function(t) {
            var i = t && t.__esModule ? function() {
                return t.default
            } : function() {
                return t
            };
            return e.d(i, "a", i), i
        }, e.o = function(t, e) {
            return Object.prototype.hasOwnProperty.call(t, e)
        }, e.p = "/", e(e.s = 4)
    }([function(t, e, i) {
        "use strict";

        function n(t, e, i) {
            return e in t ? Object.defineProperty(t, e, {
                value: i,
                enumerable: !0,
                configurable: !0,
                writable: !0
            }) : t[e] = i, t
        }

        function s(t) {
            return 0 !== t && (!(!Array.isArray(t) || 0 !== t.length) || !t)
        }

        function l(t, e) {
            return void 0 === t && (t = "undefined"), null === t && (t = "null"), !1 === t && (t = "false"), -1 !== t.toString().toLowerCase().indexOf(e.trim())
        }

        function o(t, e, i, n) {
            return t.filter(function(t) {
                return l(n(t, i), e)
            })
        }

        function r(t) {
            return t.filter(function(t) {
                return !t.$isLabel
            })
        }

        function a(t, e) {
            return function(i) {
                return i.reduce(function(i, n) {
                    return n[t] && n[t].length ? (i.push({
                        $groupLabel: n[e],
                        $isLabel: !0
                    }), i.concat(n[t])) : i
                }, [])
            }
        }

        function u(t, e, i, s, l) {
            return function(r) {
                return r.map(function(r) {
                    var a;
                    if (!r[i]) return console.warn("Options passed to vue-multiselect do not contain groups, despite the config."), [];
                    var u = o(r[i], t, e, l);
                    return u.length ? (a = {}, n(a, s, r[s]), n(a, i, u), a) : []
                })
            }
        }
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var c = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(t) {
                return typeof t
            } : function(t) {
                return t && "function" == typeof Symbol && t.constructor === Symbol && t !== Symbol.prototype ? "symbol" : typeof t
            },
            h = i(2),
            p = function(t) {
                return t && t.__esModule ? t : {
                    default: t
                }
            }(h),
            d = function() {
                for (var t = arguments.length, e = Array(t), i = 0; i < t; i++) e[i] = arguments[i];
                return function(t) {
                    return e.reduce(function(t, e) {
                        return e(t)
                    }, t)
                }
            };
        e.default = {
            data: function() {
                return {
                    search: "",
                    isOpen: !1,
                    prefferedOpenDirection: "below",
                    optimizedHeight: this.maxHeight,
                    internalValue: this.value || 0 === this.value ? (0, p.default)(Array.isArray(this.value) ? this.value : [this.value]) : []
                }
            },
            props: {
                internalSearch: {
                    type: Boolean,
                    default: !0
                },
                options: {
                    type: Array,
                    required: !0
                },
                multiple: {
                    type: Boolean,
                    default: !1
                },
                value: {
                    type: null,
                    default: function() {
                        return []
                    }
                },
                trackBy: {
                    type: String
                },
                label: {
                    type: String
                },
                searchable: {
                    type: Boolean,
                    default: !0
                },
                clearOnSelect: {
                    type: Boolean,
                    default: !0
                },
                hideSelected: {
                    type: Boolean,
                    default: !1
                },
                placeholder: {
                    type: String,
                    default: "Select option"
                },
                allowEmpty: {
                    type: Boolean,
                    default: !0
                },
                resetAfter: {
                    type: Boolean,
                    default: !1
                },
                closeOnSelect: {
                    type: Boolean,
                    default: !0
                },
                customLabel: {
                    type: Function,
                    default: function(t, e) {
                        return s(t) ? "" : e ? t[e] : t
                    }
                },
                taggable: {
                    type: Boolean,
                    default: !1
                },
                tagPlaceholder: {
                    type: String,
                    default: "Press enter to create a tag"
                },
                max: {
                    type: [Number, Boolean],
                    default: !1
                },
                id: {
                    default: null
                },
                optionsLimit: {
                    type: Number,
                    default: 1e3
                },
                groupValues: {
                    type: String
                },
                groupLabel: {
                    type: String
                },
                blockKeys: {
                    type: Array,
                    default: function() {
                        return []
                    }
                },
                preserveSearch: {
                    type: Boolean,
                    default: !1
                }
            },
            mounted: function() {
                this.multiple || this.clearOnSelect || console.warn("[Vue-Multiselect warn]: ClearOnSelect and Multiple props can’t be both set to false."), !this.multiple && this.max && console.warn("[Vue-Multiselect warn]: Max prop should not be used when prop Multiple equals false.")
            },
            computed: {
                filteredOptions: function() {
                    var t = this.search || "",
                        e = t.toLowerCase(),
                        i = this.options.concat();
                    return i = this.internalSearch ? this.groupValues ? this.filterAndFlat(i, e, this.label) : o(i, e, this.label, this.customLabel) : this.groupValues ? a(this.groupValues, this.groupLabel)(i) : i, i = this.hideSelected ? i.filter(this.isNotSelected) : i, this.taggable && e.length && !this.isExistingOption(e) && i.unshift({
                        isTag: !0,
                        label: t
                    }), i.slice(0, this.optionsLimit)
                },
                valueKeys: function() {
                    var t = this;
                    return this.trackBy ? this.internalValue.map(function(e) {
                        return e[t.trackBy]
                    }) : this.internalValue
                },
                optionKeys: function() {
                    var t = this;
                    return (this.groupValues ? this.flatAndStrip(this.options) : this.options).map(function(e) {
                        return t.customLabel(e, t.label).toString().toLowerCase()
                    })
                },
                currentOptionLabel: function() {
                    return this.multiple ? this.searchable ? "" : this.placeholder : this.internalValue[0] ? this.getOptionLabel(this.internalValue[0]) : this.searchable ? "" : this.placeholder
                }
            },
            watch: {
                internalValue: function(t, e) {
                    this.resetAfter && this.internalValue.length && (this.search = "", this.internalValue = [])
                },
                search: function() {
                    this.$emit("search-change", this.search, this.id)
                },
                value: function(t) {
                    this.internalValue = this.getInternalValue(t)
                }
            },
            methods: {
                getValue: function() {
                    return this.multiple ? (0, p.default)(this.internalValue) : 0 === this.internalValue.length ? null : (0, p.default)(this.internalValue[0])
                },
                getInternalValue: function(t) {
                    return null === t || void 0 === t ? [] : this.multiple ? (0, p.default)(t) : (0, p.default)([t])
                },
                filterAndFlat: function(t, e, i) {
                    return d(u(e, i, this.groupValues, this.groupLabel, this.customLabel), a(this.groupValues, this.groupLabel))(t)
                },
                flatAndStrip: function(t) {
                    return d(a(this.groupValues, this.groupLabel), r)(t)
                },
                updateSearch: function(t) {
                    this.search = t
                },
                isExistingOption: function(t) {
                    return !!this.options && this.optionKeys.indexOf(t) > -1
                },
                isSelected: function(t) {
                    var e = this.trackBy ? t[this.trackBy] : t;
                    return this.valueKeys.indexOf(e) > -1
                },
                isNotSelected: function(t) {
                    return !this.isSelected(t)
                },
                getOptionLabel: function(t) {
                    if (s(t)) return "";
                    if (t.isTag) return t.label;
                    if (t.$isLabel) return t.$groupLabel;
                    var e = this.customLabel(t, this.label);
                    return s(e) ? "" : e
                },
                select: function(t, e) {
                    if (!(-1 !== this.blockKeys.indexOf(e) || this.disabled || t.$isLabel || t.$isDisabled) && (!this.max || !this.multiple || this.internalValue.length !== this.max) && ("Tab" !== e || this.pointerDirty)) {
                        if (t.isTag) this.$emit("tag", t.label, this.id), this.search = "", this.closeOnSelect && !this.multiple && this.deactivate();
                        else {
                            if (this.isSelected(t)) return void("Tab" !== e && this.removeElement(t));
                            this.multiple ? this.internalValue.push(t) : this.internalValue = [t], this.$emit("select", (0, p.default)(t), this.id), this.$emit("input", this.getValue(), this.id), this.clearOnSelect && (this.search = "")
                        }
                        this.closeOnSelect && this.deactivate()
                    }
                },
                removeElement: function(t) {
                    var e = !(arguments.length > 1 && void 0 !== arguments[1]) || arguments[1];
                    if (!this.disabled) {
                        if (!this.allowEmpty && this.internalValue.length <= 1) return void this.deactivate();
                        var i = "object" === (void 0 === t ? "undefined" : c(t)) ? this.valueKeys.indexOf(t[this.trackBy]) : this.valueKeys.indexOf(t);
                        this.internalValue.splice(i, 1), this.$emit("remove", (0, p.default)(t), this.id), this.$emit("input", this.getValue(), this.id), this.closeOnSelect && e && this.deactivate()
                    }
                },
                removeLastElement: function() {
                    -1 === this.blockKeys.indexOf("Delete") && 0 === this.search.length && Array.isArray(this.internalValue) && this.removeElement(this.internalValue[this.internalValue.length - 1], !1)
                },
                activate: function() {
                    var t = this;
                    this.isOpen || this.disabled || (this.adjustPosition(), this.groupValues && 0 === this.pointer && this.filteredOptions.length && (this.pointer = 1), this.isOpen = !0, this.searchable ? (this.preserveSearch || (this.search = ""), this.$nextTick(function() {
                        return t.$refs.search.focus()
                    })) : this.$el.focus(), this.$emit("open", this.id))
                },
                deactivate: function() {
                    this.isOpen && (this.isOpen = !1, this.searchable ? this.$refs.search.blur() : this.$el.blur(), this.preserveSearch || (this.search = ""), this.$emit("close", this.getValue(), this.id))
                },
                toggle: function() {
                    this.isOpen ? this.deactivate() : this.activate()
                },
                adjustPosition: function() {
                    if ("undefined" != typeof window) {
                        var t = this.$el.getBoundingClientRect().top,
                            e = window.innerHeight - this.$el.getBoundingClientRect().bottom;
                        e > this.maxHeight || e > t || "below" === this.openDirection || "bottom" === this.openDirection ? (this.prefferedOpenDirection = "below", this.optimizedHeight = Math.min(e - 40, this.maxHeight)) : (this.prefferedOpenDirection = "above", this.optimizedHeight = Math.min(t - 40, this.maxHeight))
                    }
                }
            }
        }
    }, function(t, e, i) {
        "use strict";
        Object.defineProperty(e, "__esModule", {
            value: !0
        }), e.default = {
            data: function() {
                return {
                    pointer: 0,
                    pointerDirty: !1
                }
            },
            props: {
                showPointer: {
                    type: Boolean,
                    default: !0
                },
                optionHeight: {
                    type: Number,
                    default: 40
                }
            },
            computed: {
                pointerPosition: function() {
                    return this.pointer * this.optionHeight
                },
                visibleElements: function() {
                    return this.optimizedHeight / this.optionHeight
                }
            },
            watch: {
                filteredOptions: function() {
                    this.pointerAdjust()
                },
                isOpen: function() {
                    this.pointerDirty = !1
                }
            },
            methods: {
                optionHighlight: function(t, e) {
                    return {
                        "multiselect__option--highlight": t === this.pointer && this.showPointer,
                        "multiselect__option--selected": this.isSelected(e)
                    }
                },
                addPointerElement: function() {
                    var t = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : "Enter",
                        e = t.key;
                    this.filteredOptions.length > 0 && this.select(this.filteredOptions[this.pointer], e), this.pointerReset()
                },
                pointerForward: function() {
                    this.pointer < this.filteredOptions.length - 1 && (this.pointer++, this.$refs.list.scrollTop <= this.pointerPosition - (this.visibleElements - 1) * this.optionHeight && (this.$refs.list.scrollTop = this.pointerPosition - (this.visibleElements - 1) * this.optionHeight), this.filteredOptions[this.pointer].$isLabel && this.pointerForward()), this.pointerDirty = !0
                },
                pointerBackward: function() {
                    this.pointer > 0 ? (this.pointer--, this.$refs.list.scrollTop >= this.pointerPosition && (this.$refs.list.scrollTop = this.pointerPosition), this.filteredOptions[this.pointer].$isLabel && this.pointerBackward()) : this.filteredOptions[0].$isLabel && this.pointerForward(), this.pointerDirty = !0
                },
                pointerReset: function() {
                    this.closeOnSelect && (this.pointer = 0, this.$refs.list && (this.$refs.list.scrollTop = 0))
                },
                pointerAdjust: function() {
                    this.pointer >= this.filteredOptions.length - 1 && (this.pointer = this.filteredOptions.length ? this.filteredOptions.length - 1 : 0)
                },
                pointerSet: function(t) {
                    this.pointer = t, this.pointerDirty = !0
                }
            }
        }
    }, function(t, e, i) {
        "use strict";

        function n(t) {
            if (Array.isArray(t)) return t.map(n);
            if (t && "object" === (void 0 === t ? "undefined" : s(t))) {
                for (var e = {}, i = Object.keys(t), l = 0, o = i.length; l < o; l++) {
                    var r = i[l];
                    e[r] = n(t[r])
                }
                return e
            }
            return t
        }
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var s = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(t) {
            return typeof t
        } : function(t) {
            return t && "function" == typeof Symbol && t.constructor === Symbol && t !== Symbol.prototype ? "symbol" : typeof t
        };
        e.default = n
    }, function(t, e, i) {
        i(6);
        var n = i(7)(i(5), i(8), null, null);
        t.exports = n.exports
    }, function(t, e, i) {
        "use strict";

        function n(t) {
            return t && t.__esModule ? t : {
                default: t
            }
        }
        Object.defineProperty(e, "__esModule", {
            value: !0
        }), e.deepClone = e.pointerMixin = e.multiselectMixin = e.Multiselect = void 0;
        var s = i(3),
            l = n(s),
            o = i(0),
            r = n(o),
            a = i(1),
            u = n(a),
            c = i(2),
            h = n(c);
        e.default = l.default, e.Multiselect = l.default, e.multiselectMixin = r.default, e.pointerMixin = u.default, e.deepClone = h.default
    }, function(t, e, i) {
        "use strict";

        function n(t) {
            return t && t.__esModule ? t : {
                default: t
            }
        }
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var s = i(0),
            l = n(s),
            o = i(1),
            r = n(o);
        e.default = {
            name: "vue-multiselect",
            mixins: [l.default, r.default],
            props: {
                name: {
                    type: String,
                    default: ""
                },
                selectLabel: {
                    type: String,
                    default: "Επιλογή"
                },
                selectedLabel: {
                    type: String,
                    default: "Selected"
                },
                deselectLabel: {
                    type: String,
                    default: "Press enter to remove"
                },
                showLabels: {
                    type: Boolean,
                    default: !0
                },
                limit: {
                    type: Number,
                    default: 99999
                },
                maxHeight: {
                    type: Number,
                    default: 300
                },
                limitText: {
                    type: Function,
                    default: function(t) {
                        return "and " + t + " more"
                    }
                },
                loading: {
                    type: Boolean,
                    default: !1
                },
                disabled: {
                    type: Boolean,
                    default: !1
                },
                openDirection: {
                    type: String,
                    default: ""
                },
                showNoResults: {
                    type: Boolean,
                    default: !0
                },
                tabindex: {
                    type: Number,
                    default: 0
                }
            },
            computed: {
                visibleValue: function() {
                    return this.multiple ? this.internalValue.slice(0, this.limit) : []
                },
                deselectLabelText: function() {
                    return this.showLabels ? this.deselectLabel : ""
                },
                selectLabelText: function() {
                    return this.showLabels ? this.selectLabel : ""
                },
                selectedLabelText: function() {
                    return this.showLabels ? this.selectedLabel : ""
                },
                inputStyle: function() {
                    if (this.multiple && this.value && this.value.length) return this.isOpen ? {
                        width: "250px"
                    } : {
                        display: "none"
                    }
                },
                contentStyle: function() {
                    return this.options.length ? {
                        display: "inline-block"
                    } : {
                        display: "block"
                    }
                },
                isAbove: function() {
                    return "above" === this.openDirection || "top" === this.openDirection || "below" !== this.openDirection && "bottom" !== this.openDirection && "above" === this.prefferedOpenDirection
                }
            }
        }
    }, function(t, e) {}, function(t, e) {
        t.exports = function(t, e, i, n) {
            var s, l = t = t || {},
                o = typeof t.default;
            "object" !== o && "function" !== o || (s = t, l = t.default);
            var r = "function" == typeof l ? l.options : l;
            if (e && (r.render = e.render, r.staticRenderFns = e.staticRenderFns), i && (r._scopeId = i), n) {
                var a = Object.create(r.computed || null);
                Object.keys(n).forEach(function(t) {
                    var e = n[t];
                    a[t] = function() {
                        return e
                    }
                }), r.computed = a
            }
            return {
                esModule: s,
                exports: l,
                options: r
            }
        }
    }, function(t, e) {
        t.exports = {
            render: function() {
                var t = this,
                    e = t.$createElement,
                    i = t._self._c || e;
                return i("div", {
                    staticClass: "multiselect",
                    class: {
                        "multiselect--active": t.isOpen, "multiselect--disabled": t.disabled, "multiselect--above": t.isAbove
                    },
                    attrs: {
                        tabindex: t.tabindex
                    },
                    on: {
                        focus: function(e) {
                            t.activate()
                        },
                        blur: function(e) {
                            !t.searchable && t.deactivate()
                        },
                        keydown: [function(e) {
                            return "button" in e || !t._k(e.keyCode, "down", 40) ? e.target !== e.currentTarget ? null : (e.preventDefault(), void t.pointerForward()) : null
                        }, function(e) {
                            return "button" in e || !t._k(e.keyCode, "up", 38) ? e.target !== e.currentTarget ? null : (e.preventDefault(), void t.pointerBackward()) : null
                        }, function(e) {
                            return "button" in e || !t._k(e.keyCode, "enter", 13) || !t._k(e.keyCode, "tab", 9) ? (e.stopPropagation(), e.target !== e.currentTarget ? null : void t.addPointerElement(e)) : null
                        }],
                        keyup: function(e) {
                            if (!("button" in e) && t._k(e.keyCode, "esc", 27)) return null;
                            t.deactivate()
                        }
                    }
                }, [t._t("caret", [i("div", {
                    staticClass: "multiselect__select",
                    on: {
                        mousedown: function(e) {
                            e.preventDefault(), e.stopPropagation(), t.toggle()
                        }
                    }
                })], {
                    toggle: t.toggle
                }), t._v(" "), t._t("clear", null, {
                    search: t.search
                }), t._v(" "), i("div", {
                    ref: "tags",
                    staticClass: "multiselect__tags"
                }, [i("div", {
                    directives: [{
                        name: "show",
                        rawName: "v-show",
                        value: t.visibleValue.length > 0,
                        expression: "visibleValue.length > 0"
                    }],
                    staticClass: "multiselect__tags-wrap"
                }, [t._l(t.visibleValue, function(e) {
                    return [t._t("tag", [i("span", {
                        staticClass: "multiselect__tag"
                    }, [i("span", {
                        domProps: {
                            textContent: t._s(t.getOptionLabel(e))
                        }
                    }), t._v(" "), i("i", {
                        staticClass: "multiselect__tag-icon",
                        attrs: {
                            "aria-hidden": "true",
                            tabindex: "1"
                        },
                        on: {
                            keydown: function(i) {
                                if (!("button" in i) && t._k(i.keyCode, "enter", 13)) return null;
                                i.preventDefault(), t.removeElement(e)
                            },
                            mousedown: function(i) {
                                i.preventDefault(), t.removeElement(e)
                            }
                        }
                    })])], {
                        option: e,
                        search: t.search,
                        remove: t.removeElement
                    })]
                })], 2), t._v(" "), t.internalValue && t.internalValue.length > t.limit ? [i("strong", {
                    staticClass: "multiselect__strong",
                    domProps: {
                        textContent: t._s(t.limitText(t.internalValue.length - t.limit))
                    }
                })] : t._e(), t._v(" "), i("transition", {
                    attrs: {
                        name: "multiselect__loading"
                    }
                }, [t._t("loading", [i("div", {
                    directives: [{
                        name: "show",
                        rawName: "v-show",
                        value: t.loading,
                        expression: "loading"
                    }],
                    staticClass: "multiselect__spinner"
                })])], 2), t._v(" "), t.searchable ? i("input", {
                    ref: "search",
                    staticClass: "multiselect__input",
                    style: t.inputStyle,
                    attrs: {
                        name: t.name,
                        id: t.id,
                        type: "text",
                        autocomplete: "off",
                        placeholder: t.placeholder,
                        disabled: t.disabled
                    },
                    domProps: {
                        value: t.isOpen ? t.search : t.currentOptionLabel
                    },
                    on: {
                        input: function(e) {
                            t.updateSearch(e.target.value)
                        },
                        focus: function(e) {
                            e.preventDefault(), t.activate()
                        },
                        blur: function(e) {
                            e.preventDefault(), t.deactivate()
                        },
                        keyup: function(e) {
                            if (!("button" in e) && t._k(e.keyCode, "esc", 27)) return null;
                            t.deactivate()
                        },
                        keydown: [function(e) {
                            if (!("button" in e) && t._k(e.keyCode, "down", 40)) return null;
                            e.preventDefault(), t.pointerForward()
                        }, function(e) {
                            if (!("button" in e) && t._k(e.keyCode, "up", 38)) return null;
                            e.preventDefault(), t.pointerBackward()
                        }, function(e) {
                            return "button" in e || !t._k(e.keyCode, "enter", 13) ? (e.preventDefault(), e.stopPropagation(), e.target !== e.currentTarget ? null : void t.addPointerElement(e)) : null
                        }, function(e) {
                            if (!("button" in e) && t._k(e.keyCode, "delete", [8, 46])) return null;
                            e.stopPropagation(), t.removeLastElement()
                        }]
                    }
                }) : t._e(), t._v(" "), t.searchable ? t._e() : i("span", {
                    staticClass: "multiselect__single",
                    domProps: {
                        textContent: t._s(t.currentOptionLabel)
                    },
                    on: {
                        mousedown: function(e) {
                            e.preventDefault(), t.toggle(e)
                        }
                    }
                })], 2), t._v(" "), i("transition", {
                    attrs: {
                        name: "multiselect"
                    }
                }, [i("div", {
                    directives: [{
                        name: "show",
                        rawName: "v-show",
                        value: t.isOpen,
                        expression: "isOpen"
                    }],
                    ref: "list",
                    staticClass: "multiselect__content-wrapper",
                    style: {
                        // maxHeight: t.optimizedHeight + "px"
                        maxHeight: "240px"
                    },
                    on: {
                        focus: t.activate,
                        mousedown: function(t) {
                            t.preventDefault()
                        }
                    }
                }, [i("ul", {
                    staticClass: "multiselect__content",
                    style: t.contentStyle
                }, [t._t("beforeList"), t._v(" "), t.multiple && t.max === t.internalValue.length ? i("li", [i("span", {
                    staticClass: "multiselect__option"
                }, [t._t("maxElements", [t._v("Maximum of " + t._s(t.max) + " options selected. First remove a selected option to select another.")])], 2)]) : t._e(), t._v(" "), !t.max || t.internalValue.length < t.max ? t._l(t.filteredOptions, function(e, n) {
                    return i("li", {
                        key: n,
                        staticClass: "multiselect__element"
                    }, [e && (e.$isLabel || e.$isDisabled) ? t._e() : i("span", {
                        staticClass: "multiselect__option",
                        class: t.optionHighlight(n, e),
                        attrs: {
                            "data-select": e && e.isTag ? t.tagPlaceholder : t.selectLabelText,
                            "data-selected": t.selectedLabelText,
                            "data-deselect": t.deselectLabelText
                        },
                        on: {
                            click: function(i) {
                                i.stopPropagation(), t.select(e)
                            },
                            mouseenter: function(e) {
                                if (e.target !== e.currentTarget) return null;
                                t.pointerSet(n)
                            }
                        }
                    }, [t._t("option", [i("span", [t._v(t._s(t.getOptionLabel(e)))])], {
                        option: e,
                        search: t.search
                    })], 2), t._v(" "), e && (e.$isLabel || e.$isDisabled) ? i("span", {
                        staticClass: "multiselect__option multiselect__option--disabled",
                        class: t.optionHighlight(n, e)
                    }, [t._t("option", [i("span", [t._v(t._s(t.getOptionLabel(e)))])], {
                        option: e,
                        search: t.search
                    })], 2) : t._e()])
                }) : t._e(), t._v(" "), i("li", {
                    directives: [{
                        name: "show",
                        rawName: "v-show",
                        value: t.showNoResults && 0 === t.filteredOptions.length && t.search && !t.loading,
                        expression: "showNoResults && (filteredOptions.length === 0 && search && !loading)"
                    }]
                }, [i("span", {
                    staticClass: "multiselect__option"
                }, [t._t("noResult", [t._v("No elements found. Consider changing the search query.")])], 2)]), t._v(" "), t._t("afterList")], 2)])])], 2)
            },
            staticRenderFns: []
        }
    }])
});