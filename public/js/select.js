/*!
 * Select2 4.0.5
 * https://select2.github.io
 *
 * Released under the MIT license
 * https://github.com/select2/select2/blob/master/LICENSE.md
 */
!(function(e) {
    "function" == typeof define && define.amd ?
        define(["jquery"], e) :
        "object" == typeof module && module.exports ?
        (module.exports = function(t, n) {
            return void 0 === n && (n = "undefined" != typeof window ? require("jquery") : require("jquery")(t)), e(n), n;
        }) :
        e(jQuery);
})(function(e) {
    var t = (function() {
            if (e && e.fn && e.fn.select2 && e.fn.select2.amd) var t = e.fn.select2.amd;
            var n;
            return (
                (function() {
                    /**
                     * @license almond 0.3.3 Copyright jQuery Foundation and other contributors.
                     * Released under MIT license, http://github.com/requirejs/almond/LICENSE
                     */
                    var e, n, i;
                    (t && t.requirejs) ||
                    (t ? (n = t) : (t = {}),
                        (function(t) {
                            var o,
                                r,
                                s,
                                a,
                                l = {},
                                c = {},
                                u = {},
                                d = {},
                                p = Object.prototype.hasOwnProperty,
                                h = [].slice,
                                f = /\.js$/;

                            function g(e, t) {
                                return p.call(e, t);
                            }

                            function m(e, t) {
                                var n,
                                    i,
                                    o,
                                    r,
                                    s,
                                    a,
                                    l,
                                    c,
                                    d,
                                    p,
                                    h,
                                    g = t && t.split("/"),
                                    m = u.map,
                                    v = (m && m["*"]) || {};
                                if (e) {
                                    for (s = (e = e.split("/")).length - 1, u.nodeIdCompat && f.test(e[s]) && (e[s] = e[s].replace(f, "")), "." === e[0].charAt(0) && g && (e = g.slice(0, g.length - 1).concat(e)), d = 0; d < e.length; d++)
                                        if ("." === (h = e[d])) e.splice(d, 1), (d -= 1);
                                        else if (".." === h) {
                                        if (0 === d || (1 === d && ".." === e[2]) || ".." === e[d - 1]) continue;
                                        d > 0 && (e.splice(d - 1, 2), (d -= 2));
                                    }
                                    e = e.join("/");
                                }
                                if ((g || v) && m) {
                                    for (d = (n = e.split("/")).length; d > 0; d -= 1) {
                                        if (((i = n.slice(0, d).join("/")), g))
                                            for (p = g.length; p > 0; p -= 1)
                                                if ((o = m[g.slice(0, p).join("/")]) && (o = o[i])) {
                                                    (r = o), (a = d);
                                                    break;
                                                }
                                        if (r) break;
                                        !l && v && v[i] && ((l = v[i]), (c = d));
                                    }!r && l && ((r = l), (a = c)), r && (n.splice(0, a, r), (e = n.join("/")));
                                }
                                return e;
                            }

                            function v(e, t) {
                                return function() {
                                    var n = h.call(arguments, 0);
                                    return "string" != typeof n[0] && 1 === n.length && n.push(null), r.apply(void 0, n.concat([e, t]));
                                };
                            }

                            function y(e) {
                                return function(t) {
                                    l[e] = t;
                                };
                            }

                            function w(e) {
                                if (g(c, e)) {
                                    var t = c[e];
                                    delete c[e], (d[e] = !0), o.apply(void 0, t);
                                }
                                if (!g(l, e) && !g(d, e)) throw new Error("No " + e);
                                return l[e];
                            }

                            function _(e) {
                                var t,
                                    n = e ? e.indexOf("!") : -1;
                                return n > -1 && ((t = e.substring(0, n)), (e = e.substring(n + 1, e.length))), [t, e];
                            }

                            function $(e) {
                                return e ? _(e) : [];
                            }

                            function b(e) {
                                return function() {
                                    return (u && u.config && u.config[e]) || {};
                                };
                            }
                            (s = function(e, t) {
                                var n,
                                    i,
                                    o = _(e),
                                    r = o[0],
                                    s = t[1];
                                return (
                                    (e = o[1]),
                                    r && (n = w((r = m(r, s)))),
                                    r ?
                                    (e =
                                        n && n.normalize ?
                                        n.normalize(
                                            e,
                                            ((i = s),
                                                function(e) {
                                                    return m(e, i);
                                                })
                                        ) :
                                        m(e, s)) :
                                    ((r = (o = _((e = m(e, s))))[0]), (e = o[1]), r && (n = w(r))), { f: r ? r + "!" + e : e, n: e, pr: r, p: n }
                                );
                            }),
                            (a = {
                                require: function(e) {
                                    return v(e);
                                },
                                exports: function(e) {
                                    var t = l[e];
                                    return void 0 !== t ? t : (l[e] = {});
                                },
                                module: function(e) {
                                    return { id: e, uri: "", exports: l[e], config: b(e) };
                                },
                            }),
                            (o = function(e, t, n, i) {
                                var o,
                                    r,
                                    u,
                                    p,
                                    h,
                                    f,
                                    m,
                                    _ = [],
                                    b = typeof n;
                                if (((f = $((i = i || e))), "undefined" === b || "function" === b)) {
                                    for (t = !t.length && n.length ? ["require", "exports", "module"] : t, h = 0; h < t.length; h += 1)
                                        if ("require" === (r = (p = s(t[h], f)).f)) _[h] = a.require(e);
                                        else if ("exports" === r)(_[h] = a.exports(e)), (m = !0);
                                    else if ("module" === r) o = _[h] = a.module(e);
                                    else if (g(l, r) || g(c, r) || g(d, r)) _[h] = w(r);
                                    else {
                                        if (!p.p) throw new Error(e + " missing " + r);
                                        p.p.load(p.n, v(i, !0), y(r), {}), (_[h] = l[r]);
                                    }
                                    (u = n ? n.apply(l[e], _) : void 0), e && (o && void 0 !== o.exports && o.exports !== l[e] ? (l[e] = o.exports) : (void 0 === u && m) || (l[e] = u));
                                } else e && (l[e] = n);
                            }),
                            (e = n = r = function(e, t, n, i, l) {
                                if ("string" == typeof e) return a[e] ? a[e](t) : w(s(e, $(t)).f);
                                if (!e.splice) {
                                    if (((u = e).deps && r(u.deps, u.callback), !t)) return;
                                    t.splice ? ((e = t), (t = n), (n = null)) : (e = void 0);
                                }
                                return (
                                    (t = t || function() {}),
                                    "function" == typeof n && ((n = i), (i = l)),
                                    i ?
                                    o(void 0, e, t, n) :
                                    setTimeout(function() {
                                        o(void 0, e, t, n);
                                    }, 4),
                                    r
                                );
                            }),
                            (r.config = function(e) {
                                return r(e);
                            }),
                            (e._defined = l),
                            ((i = function(e, t, n) {
                                if ("string" != typeof e) throw new Error("See almond README: incorrect module build, no module name");
                                t.splice || ((n = t), (t = [])), g(l, e) || g(c, e) || (c[e] = [e, t, n]);
                            }).amd = { jQuery: !0 });
                        })(),
                        (t.requirejs = e),
                        (t.require = n),
                        (t.define = i));
                })(),
                t.define("almond", function() {}),
                t.define("jquery", [], function() {
                    var t = e || $;
                    return null == t && console && console.error && console.error("Select2: An instance of jQuery or a jQuery-compatible library was not found. Make sure that you are including jQuery before Select2 on your web page."), t;
                }),
                t.define("select2/utils", ["jquery"], function(e) {
                    var t = {};

                    function n(e) {
                        var t = e.prototype,
                            n = [];
                        for (var i in t) {
                            "function" == typeof t[i] && "constructor" !== i && n.push(i);
                        }
                        return n;
                    }
                    (t.Extend = function(e, t) {
                        var n = {}.hasOwnProperty;

                        function i() {
                            this.constructor = e;
                        }
                        for (var o in t) n.call(t, o) && (e[o] = t[o]);
                        return (i.prototype = t.prototype), (e.prototype = new i()), (e.__super__ = t.prototype), e;
                    }),
                    (t.Decorate = function(e, t) {
                        var i = n(t),
                            o = n(e);

                        function r() {
                            var n = Array.prototype.unshift,
                                i = t.prototype.constructor.length,
                                o = e.prototype.constructor;
                            i > 0 && (n.call(arguments, e.prototype.constructor), (o = t.prototype.constructor)), o.apply(this, arguments);
                        }
                        (t.displayName = e.displayName),
                        (r.prototype = new(function() {
                            this.constructor = r;
                        })());
                        for (var s = 0; s < o.length; s++) {
                            var a = o[s];
                            r.prototype[a] = e.prototype[a];
                        }
                        for (
                            var l = function(e) {
                                    var n = function() {};
                                    (e in r.prototype) && (n = r.prototype[e]);
                                    var i = t.prototype[e];
                                    return function() {
                                        var e = Array.prototype.unshift;
                                        return e.call(arguments, n), i.apply(this, arguments);
                                    };
                                },
                                c = 0; c < i.length; c++
                        ) {
                            var u = i[c];
                            r.prototype[u] = l(u);
                        }
                        return r;
                    });
                    var i = function() {
                        this.listeners = {};
                    };
                    return (
                        (i.prototype.on = function(e, t) {
                            (this.listeners = this.listeners || {}), e in this.listeners ? this.listeners[e].push(t) : (this.listeners[e] = [t]);
                        }),
                        (i.prototype.trigger = function(e) {
                            var t = Array.prototype.slice,
                                n = t.call(arguments, 1);
                            (this.listeners = this.listeners || {}),
                            null == n && (n = []),
                                0 === n.length && n.push({}),
                                (n[0]._type = e),
                                e in this.listeners && this.invoke(this.listeners[e], t.call(arguments, 1)),
                                "*" in this.listeners && this.invoke(this.listeners["*"], arguments);
                        }),
                        (i.prototype.invoke = function(e, t) {
                            for (var n = 0, i = e.length; n < i; n++) e[n].apply(this, t);
                        }),
                        (t.Observable = i),
                        (t.generateChars = function(e) {
                            for (var t = "", n = 0; n < e; n++) {
                                t += Math.floor(36 * Math.random()).toString(36);
                            }
                            return t;
                        }),
                        (t.bind = function(e, t) {
                            return function() {
                                e.apply(t, arguments);
                            };
                        }),
                        (t._convertData = function(e) {
                            for (var t in e) {
                                var n = t.split("-"),
                                    i = e;
                                if (1 !== n.length) {
                                    for (var o = 0; o < n.length; o++) {
                                        var r = n[o];
                                        (r = r.substring(0, 1).toLowerCase() + r.substring(1)) in i || (i[r] = {}), o == n.length - 1 && (i[r] = e[t]), (i = i[r]);
                                    }
                                    delete e[t];
                                }
                            }
                            return e;
                        }),
                        (t.hasScroll = function(t, n) {
                            var i = e(n),
                                o = n.style.overflowX,
                                r = n.style.overflowY;
                            return (o !== r || ("hidden" !== r && "visible" !== r)) && ("scroll" === o || "scroll" === r || i.innerHeight() < n.scrollHeight || i.innerWidth() < n.scrollWidth);
                        }),
                        (t.escapeMarkup = function(e) {
                            var t = { "\\": "&#92;", "&": "&amp;", "<": "&lt;", ">": "&gt;", '"': "&quot;", "'": "&#39;", "/": "&#47;" };
                            return "string" != typeof e ?
                                e :
                                String(e).replace(/[&<>"'\/\\]/g, function(e) {
                                    return t[e];
                                });
                        }),
                        (t.appendMany = function(t, n) {
                            if ("1.7" === e.fn.jquery.substr(0, 3)) {
                                var i = e();
                                e.map(n, function(e) {
                                        i = i.add(e);
                                    }),
                                    (n = i);
                            }
                            t.append(n);
                        }),
                        t
                    );
                }),
                t.define("select2/results", ["jquery", "./utils"], function(e, t) {
                    function n(e, t, i) {
                        (this.$element = e), (this.data = i), (this.options = t), n.__super__.constructor.call(this);
                    }
                    return (
                        t.Extend(n, t.Observable),
                        (n.prototype.render = function() {
                            var t = e('<ul class="select2-results__options" role="tree"></ul>');
                            return this.options.get("multiple") && t.attr("aria-multiselectable", "true"), (this.$results = t), t;
                        }),
                        (n.prototype.clear = function() {
                            this.$results.empty();
                        }),
                        (n.prototype.displayMessage = function(t) {
                            var n = this.options.get("escapeMarkup");
                            this.clear(), this.hideLoading();
                            var i = e('<li role="treeitem" aria-live="assertive" class="select2-results__option"></li>'),
                                o = this.options.get("translations").get(t.message);
                            i.append(n(o(t.args))), (i[0].className += " select2-results__message"), this.$results.append(i);
                        }),
                        (n.prototype.hideMessages = function() {
                            this.$results.find(".select2-results__message").remove();
                        }),
                        (n.prototype.append = function(e) {
                            this.hideLoading();
                            var t = [];
                            if (null != e.results && 0 !== e.results.length) {
                                e.results = this.sort(e.results);
                                for (var n = 0; n < e.results.length; n++) {
                                    var i = e.results[n],
                                        o = this.option(i);
                                    t.push(o);
                                }
                                this.$results.append(t);
                            } else 0 === this.$results.children().length && this.trigger("results:message", { message: "noResults" });
                        }),
                        (n.prototype.position = function(e, t) {
                            t.find(".select2-results").append(e);
                        }),
                        (n.prototype.sort = function(e) {
                            return this.options.get("sorter")(e);
                        }),
                        (n.prototype.highlightFirstItem = function() {
                            var e = this.$results.find(".select2-results__option[aria-selected]"),
                                t = e.filter("[aria-selected=true]");
                            t.length > 0 ? t.first().trigger("mouseenter") : e.first().trigger("mouseenter"), this.ensureHighlightVisible();
                        }),
                        (n.prototype.setClasses = function() {
                            var t = this;
                            this.data.current(function(n) {
                                var i = e.map(n, function(e) {
                                    return e.id.toString();
                                });
                                t.$results.find(".select2-results__option[aria-selected]").each(function() {
                                    var t = e(this),
                                        n = e.data(this, "data"),
                                        o = "" + n.id;
                                    (null != n.element && n.element.selected) || (null == n.element && e.inArray(o, i) > -1) ? t.attr("aria-selected", "true"): t.attr("aria-selected", "false");
                                });
                            });
                        }),
                        (n.prototype.showLoading = function(e) {
                            this.hideLoading();
                            var t = { disabled: !0, loading: !0, text: this.options.get("translations").get("searching")(e) },
                                n = this.option(t);
                            (n.className += " loading-results"), this.$results.prepend(n);
                        }),
                        (n.prototype.hideLoading = function() {
                            this.$results.find(".loading-results").remove();
                        }),
                        (n.prototype.option = function(t) {
                            var n = document.createElement("li");
                            n.className = "select2-results__option";
                            var i = { role: "treeitem", "aria-selected": "false" };
                            for (var o in (t.disabled && (delete i["aria-selected"], (i["aria-disabled"] = "true")),
                                    null == t.id && delete i["aria-selected"],
                                    null != t._resultId && (n.id = t._resultId),
                                    t.title && (n.title = t.title),
                                    t.children && ((i.role = "group"), (i["aria-label"] = t.text), delete i["aria-selected"]),
                                    i)) {
                                var r = i[o];
                                n.setAttribute(o, r);
                            }
                            if (t.children) {
                                var s = e(n),
                                    a = document.createElement("strong");
                                a.className = "select2-results__group";
                                e(a);
                                this.template(t, a);
                                for (var l = [], c = 0; c < t.children.length; c++) {
                                    var u = t.children[c],
                                        d = this.option(u);
                                    l.push(d);
                                }
                                var p = e("<ul></ul>", { class: "select2-results__options select2-results__options--nested" });
                                p.append(l), s.append(a), s.append(p);
                            } else this.template(t, n);
                            return e.data(n, "data", t), n;
                        }),
                        (n.prototype.bind = function(t, n) {
                            var i = this,
                                o = t.id + "-results";
                            this.$results.attr("id", o),
                                t.on("results:all", function(e) {
                                    i.clear(), i.append(e.data), t.isOpen() && (i.setClasses(), i.highlightFirstItem());
                                }),
                                t.on("results:append", function(e) {
                                    i.append(e.data), t.isOpen() && i.setClasses();
                                }),
                                t.on("query", function(e) {
                                    i.hideMessages(), i.showLoading(e);
                                }),
                                t.on("select", function() {
                                    t.isOpen() && (i.setClasses(), i.highlightFirstItem());
                                }),
                                t.on("unselect", function() {
                                    t.isOpen() && (i.setClasses(), i.highlightFirstItem());
                                }),
                                t.on("open", function() {
                                    i.$results.attr("aria-expanded", "true"), i.$results.attr("aria-hidden", "false"), i.setClasses(), i.ensureHighlightVisible();
                                }),
                                t.on("close", function() {
                                    i.$results.attr("aria-expanded", "false"), i.$results.attr("aria-hidden", "true"), i.$results.removeAttr("aria-activedescendant");
                                }),
                                t.on("results:toggle", function() {
                                    var e = i.getHighlightedResults();
                                    0 !== e.length && e.trigger("mouseup");
                                }),
                                t.on("results:select", function() {
                                    var e = i.getHighlightedResults();
                                    if (0 !== e.length) {
                                        var t = e.data("data");
                                        "true" == e.attr("aria-selected") ? i.trigger("close", {}) : i.trigger("select", { data: t });
                                    }
                                }),
                                t.on("results:previous", function() {
                                    var e = i.getHighlightedResults(),
                                        t = i.$results.find("[aria-selected]"),
                                        n = t.index(e);
                                    if (0 !== n) {
                                        var o = n - 1;
                                        0 === e.length && (o = 0);
                                        var r = t.eq(o);
                                        r.trigger("mouseenter");
                                        var s = i.$results.offset().top,
                                            a = r.offset().top,
                                            l = i.$results.scrollTop() + (a - s);
                                        0 === o ? i.$results.scrollTop(0) : a - s < 0 && i.$results.scrollTop(l);
                                    }
                                }),
                                t.on("results:next", function() {
                                    var e = i.getHighlightedResults(),
                                        t = i.$results.find("[aria-selected]"),
                                        n = t.index(e) + 1;
                                    if (!(n >= t.length)) {
                                        var o = t.eq(n);
                                        o.trigger("mouseenter");
                                        var r = i.$results.offset().top + i.$results.outerHeight(!1),
                                            s = o.offset().top + o.outerHeight(!1),
                                            a = i.$results.scrollTop() + s - r;
                                        0 === n ? i.$results.scrollTop(0) : s > r && i.$results.scrollTop(a);
                                    }
                                }),
                                t.on("results:focus", function(e) {
                                    e.element.addClass("select2-results__option--highlighted");
                                }),
                                t.on("results:message", function(e) {
                                    i.displayMessage(e);
                                }),
                                e.fn.mousewheel &&
                                this.$results.on("mousewheel", function(e) {
                                    var t = i.$results.scrollTop(),
                                        n = i.$results.get(0).scrollHeight - t + e.deltaY,
                                        o = e.deltaY > 0 && t - e.deltaY <= 0,
                                        r = e.deltaY < 0 && n <= i.$results.height();
                                    o ? (i.$results.scrollTop(0), e.preventDefault(), e.stopPropagation()) : r && (i.$results.scrollTop(i.$results.get(0).scrollHeight - i.$results.height()), e.preventDefault(), e.stopPropagation());
                                }),
                                this.$results.on("mouseup", ".select2-results__option[aria-selected]", function(t) {
                                    var n = e(this),
                                        o = n.data("data");
                                    "true" !== n.attr("aria-selected") ? i.trigger("select", { originalEvent: t, data: o }) : i.options.get("multiple") ? i.trigger("unselect", { originalEvent: t, data: o }) : i.trigger("close", {});
                                }),
                                this.$results.on("mouseenter", ".select2-results__option[aria-selected]", function(t) {
                                    var n = e(this).data("data");
                                    i.getHighlightedResults().removeClass("select2-results__option--highlighted"), i.trigger("results:focus", { data: n, element: e(this) });
                                });
                        }),
                        (n.prototype.getHighlightedResults = function() {
                            return this.$results.find(".select2-results__option--highlighted");
                        }),
                        (n.prototype.destroy = function() {
                            this.$results.remove();
                        }),
                        (n.prototype.ensureHighlightVisible = function() {
                            var e = this.getHighlightedResults();
                            if (0 !== e.length) {
                                var t = this.$results.find("[aria-selected]").index(e),
                                    n = this.$results.offset().top,
                                    i = e.offset().top,
                                    o = this.$results.scrollTop() + (i - n),
                                    r = i - n;
                                (o -= 2 * e.outerHeight(!1)), t <= 2 ? this.$results.scrollTop(0) : (r > this.$results.outerHeight() || r < 0) && this.$results.scrollTop(o);
                            }
                        }),
                        (n.prototype.template = function(t, n) {
                            var i = this.options.get("templateResult"),
                                o = this.options.get("escapeMarkup"),
                                r = i(t, n);
                            null == r ? (n.style.display = "none") : "string" == typeof r ? (n.innerHTML = o(r)) : e(n).append(r);
                        }),
                        n
                    );
                }),
                t.define("select2/keys", [], function() {
                    return { BACKSPACE: 8, TAB: 9, ENTER: 13, SHIFT: 16, CTRL: 17, ALT: 18, ESC: 27, SPACE: 32, PAGE_UP: 33, PAGE_DOWN: 34, END: 35, HOME: 36, LEFT: 37, UP: 38, RIGHT: 39, DOWN: 40, DELETE: 46 };
                }),
                t.define("select2/selection/base", ["jquery", "../utils", "../keys"], function(e, t, n) {
                    function i(e, t) {
                        (this.$element = e), (this.options = t), i.__super__.constructor.call(this);
                    }
                    return (
                        t.Extend(i, t.Observable),
                        (i.prototype.render = function() {
                            var t = e('<span class="select2-selection" role="combobox"  aria-haspopup="true" aria-expanded="false"></span>');
                            return (
                                (this._tabindex = 0),
                                null != this.$element.data("old-tabindex") ? (this._tabindex = this.$element.data("old-tabindex")) : null != this.$element.attr("tabindex") && (this._tabindex = this.$element.attr("tabindex")),
                                t.attr("title", this.$element.attr("title")),
                                t.attr("tabindex", this._tabindex),
                                (this.$selection = t),
                                t
                            );
                        }),
                        (i.prototype.bind = function(e, t) {
                            var i = this,
                                o = (e.id, e.id + "-results");
                            (this.container = e),
                            this.$selection.on("focus", function(e) {
                                    i.trigger("focus", e);
                                }),
                                this.$selection.on("blur", function(e) {
                                    i._handleBlur(e);
                                }),
                                this.$selection.on("keydown", function(e) {
                                    i.trigger("keypress", e), e.which === n.SPACE && e.preventDefault();
                                }),
                                e.on("results:focus", function(e) {
                                    i.$selection.attr("aria-activedescendant", e.data._resultId);
                                }),
                                e.on("selection:update", function(e) {
                                    i.update(e.data);
                                }),
                                e.on("open", function() {
                                    i.$selection.attr("aria-expanded", "true"), i.$selection.attr("aria-owns", o), i._attachCloseHandler(e);
                                }),
                                e.on("close", function() {
                                    i.$selection.attr("aria-expanded", "false"), i.$selection.removeAttr("aria-activedescendant"), i.$selection.removeAttr("aria-owns"), i.$selection.focus(), i._detachCloseHandler(e);
                                }),
                                e.on("enable", function() {
                                    i.$selection.attr("tabindex", i._tabindex);
                                }),
                                e.on("disable", function() {
                                    i.$selection.attr("tabindex", "-1");
                                });
                        }),
                        (i.prototype._handleBlur = function(t) {
                            var n = this;
                            window.setTimeout(function() {
                                document.activeElement == n.$selection[0] || e.contains(n.$selection[0], document.activeElement) || n.trigger("blur", t);
                            }, 1);
                        }),
                        (i.prototype._attachCloseHandler = function(t) {
                            e(document.body).on("mousedown.select2." + t.id, function(t) {
                                var n = e(t.target).closest(".select2");
                                e(".select2.select2-container--open").each(function() {
                                    var t = e(this);
                                    this != n[0] && t.data("element").select2("close");
                                });
                            });
                        }),
                        (i.prototype._detachCloseHandler = function(t) {
                            e(document.body).off("mousedown.select2." + t.id);
                        }),
                        (i.prototype.position = function(e, t) {
                            t.find(".selection").append(e);
                        }),
                        (i.prototype.destroy = function() {
                            this._detachCloseHandler(this.container);
                        }),
                        (i.prototype.update = function(e) {
                            throw new Error("The `update` method must be defined in child classes.");
                        }),
                        i
                    );
                }),
                t.define("select2/selection/single", ["jquery", "./base", "../utils", "../keys"], function(e, t, n, i) {
                    function o() {
                        o.__super__.constructor.apply(this, arguments);
                    }
                    return (
                        n.Extend(o, t),
                        (o.prototype.render = function() {
                            var e = o.__super__.render.call(this);
                            return e.addClass("select2-selection--single"), e.html('<span class="select2-selection__rendered"></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span>'), e;
                        }),
                        (o.prototype.bind = function(e, t) {
                            var n = this;
                            o.__super__.bind.apply(this, arguments);
                            var i = e.id + "-container";
                            this.$selection.find(".select2-selection__rendered").attr("id", i),
                                this.$selection.attr("aria-labelledby", i),
                                this.$selection.on("mousedown", function(e) {
                                    1 === e.which && n.trigger("toggle", { originalEvent: e });
                                }),
                                this.$selection.on("focus", function(e) {}),
                                this.$selection.on("blur", function(e) {}),
                                e.on("focus", function(t) {
                                    e.isOpen() || n.$selection.focus();
                                }),
                                e.on("selection:update", function(e) {
                                    n.update(e.data);
                                });
                        }),
                        (o.prototype.clear = function() {
                            this.$selection.find(".select2-selection__rendered").empty();
                        }),
                        (o.prototype.display = function(e, t) {
                            var n = this.options.get("templateSelection");
                            return this.options.get("escapeMarkup")(n(e, t));
                        }),
                        (o.prototype.selectionContainer = function() {
                            return e("<span></span>");
                        }),
                        (o.prototype.update = function(e) {
                            if (0 !== e.length) {
                                var t = e[0],
                                    n = this.$selection.find(".select2-selection__rendered"),
                                    i = this.display(t, n);
                                n.empty().append(i), n.prop("title", t.title || t.text);
                            } else this.clear();
                        }),
                        o
                    );
                }),
                t.define("select2/selection/multiple", ["jquery", "./base", "../utils"], function(e, t, n) {
                    function i(e, t) {
                        i.__super__.constructor.apply(this, arguments);
                    }
                    return (
                        n.Extend(i, t),
                        (i.prototype.render = function() {
                            var e = i.__super__.render.call(this);
                            return e.addClass("select2-selection--multiple"), e.html('<ul class="select2-selection__rendered"></ul>'), e;
                        }),
                        (i.prototype.bind = function(t, n) {
                            var o = this;
                            i.__super__.bind.apply(this, arguments),
                                this.$selection.on("click", function(e) {
                                    o.trigger("toggle", { originalEvent: e });
                                }),
                                this.$selection.on("click", ".select2-selection__choice__remove", function(t) {
                                    if (!o.options.get("disabled")) {
                                        var n = e(this).parent().data("data");
                                        o.trigger("unselect", { originalEvent: t, data: n });
                                    }
                                });
                        }),
                        (i.prototype.clear = function() {
                            this.$selection.find(".select2-selection__rendered").empty();
                        }),
                        (i.prototype.display = function(e, t) {
                            var n = this.options.get("templateSelection");
                            return this.options.get("escapeMarkup")(n(e, t));
                        }),
                        (i.prototype.selectionContainer = function() {
                            return e('<li class="select2-selection__choice"><span class="select2-selection__choice__remove" role="presentation">&times;</span></li>');
                        }),
                        (i.prototype.update = function(e) {
                            if ((this.clear(), 0 !== e.length)) {
                                for (var t = [], i = 0; i < e.length; i++) {
                                    var o = e[i],
                                        r = this.selectionContainer(),
                                        s = this.display(o, r);
                                    r.append(s), r.prop("title", o.title || o.text), r.data("data", o), t.push(r);
                                }
                                var a = this.$selection.find(".select2-selection__rendered");
                                n.appendMany(a, t);
                            }
                        }),
                        i
                    );
                }),
                t.define("select2/selection/placeholder", ["../utils"], function(e) {
                    function t(e, t, n) {
                        (this.placeholder = this.normalizePlaceholder(n.get("placeholder"))), e.call(this, t, n);
                    }
                    return (
                        (t.prototype.normalizePlaceholder = function(e, t) {
                            return "string" == typeof t && (t = { id: "", text: t }), t;
                        }),
                        (t.prototype.createPlaceholder = function(e, t) {
                            var n = this.selectionContainer();
                            return n.html(this.display(t)), n.addClass("select2-selection__placeholder").removeClass("select2-selection__choice"), n;
                        }),
                        (t.prototype.update = function(e, t) {
                            var n = 1 == t.length && t[0].id != this.placeholder.id;
                            if (t.length > 1 || n) return e.call(this, t);
                            this.clear();
                            var i = this.createPlaceholder(this.placeholder);
                            this.$selection.find(".select2-selection__rendered").append(i);
                        }),
                        t
                    );
                }),
                t.define("select2/selection/allowClear", ["jquery", "../keys"], function(e, t) {
                    function n() {}
                    return (
                        (n.prototype.bind = function(e, t, n) {
                            var i = this;
                            e.call(this, t, n),
                                null == this.placeholder && this.options.get("debug") && window.console && console.error && console.error("Select2: The `allowClear` option should be used in combination with the `placeholder` option."),
                                this.$selection.on("mousedown", ".select2-selection__clear", function(e) {
                                    i._handleClear(e);
                                }),
                                t.on("keypress", function(e) {
                                    i._handleKeyboardClear(e, t);
                                });
                        }),
                        (n.prototype._handleClear = function(e, t) {
                            if (!this.options.get("disabled")) {
                                var n = this.$selection.find(".select2-selection__clear");
                                if (0 !== n.length) {
                                    t.stopPropagation();
                                    for (var i = n.data("data"), o = 0; o < i.length; o++) {
                                        var r = { data: i[o] };
                                        if ((this.trigger("unselect", r), r.prevented)) return;
                                    }
                                    this.$element.val(this.placeholder.id).trigger("change"), this.trigger("toggle", {});
                                }
                            }
                        }),
                        (n.prototype._handleKeyboardClear = function(e, n, i) {
                            i.isOpen() || (n.which != t.DELETE && n.which != t.BACKSPACE) || this._handleClear(n);
                        }),
                        (n.prototype.update = function(t, n) {
                            if ((t.call(this, n), !(this.$selection.find(".select2-selection__placeholder").length > 0 || 0 === n.length))) {
                                var i = e('<span class="select2-selection__clear">&times;</span>');
                                i.data("data", n), this.$selection.find(".select2-selection__rendered").prepend(i);
                            }
                        }),
                        n
                    );
                }),
                t.define("select2/selection/search", ["jquery", "../utils", "../keys"], function(e, t, n) {
                    function i(e, t, n) {
                        e.call(this, t, n);
                    }
                    return (
                        (i.prototype.render = function(t) {
                            var n = e(
                                '<li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="-1" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="textbox" aria-autocomplete="list" /></li>'
                            );
                            (this.$searchContainer = n), (this.$search = n.find("input"));
                            var i = t.call(this);
                            return this._transferTabIndex(), i;
                        }),
                        (i.prototype.bind = function(e, t, i) {
                            var o = this;
                            e.call(this, t, i),
                                t.on("open", function() {
                                    o.$search.trigger("focus");
                                }),
                                t.on("close", function() {
                                    o.$search.val(""), o.$search.removeAttr("aria-activedescendant"), o.$search.trigger("focus");
                                }),
                                t.on("enable", function() {
                                    o.$search.prop("disabled", !1), o._transferTabIndex();
                                }),
                                t.on("disable", function() {
                                    o.$search.prop("disabled", !0);
                                }),
                                t.on("focus", function(e) {
                                    o.$search.trigger("focus");
                                }),
                                t.on("results:focus", function(e) {
                                    o.$search.attr("aria-activedescendant", e.id);
                                }),
                                this.$selection.on("focusin", ".select2-search--inline", function(e) {
                                    o.trigger("focus", e);
                                }),
                                this.$selection.on("focusout", ".select2-search--inline", function(e) {
                                    o._handleBlur(e);
                                }),
                                this.$selection.on("keydown", ".select2-search--inline", function(e) {
                                    if ((e.stopPropagation(), o.trigger("keypress", e), (o._keyUpPrevented = e.isDefaultPrevented()), e.which === n.BACKSPACE && "" === o.$search.val())) {
                                        var t = o.$searchContainer.prev(".select2-selection__choice");
                                        if (t.length > 0) {
                                            var i = t.data("data");
                                            o.searchRemoveChoice(i), e.preventDefault();
                                        }
                                    }
                                });
                            var r = document.documentMode,
                                s = r && r <= 11;
                            this.$selection.on("input.searchcheck", ".select2-search--inline", function(e) {
                                    s ? o.$selection.off("input.search input.searchcheck") : o.$selection.off("keyup.search");
                                }),
                                this.$selection.on("keyup.search input.search", ".select2-search--inline", function(e) {
                                    if (s && "input" === e.type) o.$selection.off("input.search input.searchcheck");
                                    else {
                                        var t = e.which;
                                        t != n.SHIFT && t != n.CTRL && t != n.ALT && t != n.TAB && o.handleSearch(e);
                                    }
                                });
                        }),
                        (i.prototype._transferTabIndex = function(e) {
                            this.$search.attr("tabindex", this.$selection.attr("tabindex")), this.$selection.attr("tabindex", "-1");
                        }),
                        (i.prototype.createPlaceholder = function(e, t) {
                            this.$search.attr("placeholder", t.text);
                        }),
                        (i.prototype.update = function(e, t) {
                            var n = this.$search[0] == document.activeElement;
                            this.$search.attr("placeholder", ""), e.call(this, t), this.$selection.find(".select2-selection__rendered").append(this.$searchContainer), this.resizeSearch(), n && this.$search.focus();
                        }),
                        (i.prototype.handleSearch = function() {
                            if ((this.resizeSearch(), !this._keyUpPrevented)) {
                                var e = this.$search.val();
                                this.trigger("query", { term: e });
                            }
                            this._keyUpPrevented = !1;
                        }),
                        (i.prototype.searchRemoveChoice = function(e, t) {
                            this.trigger("unselect", { data: t }), this.$search.val(t.text), this.handleSearch();
                        }),
                        (i.prototype.resizeSearch = function() {
                            this.$search.css("width", "25px");
                            var e = "";
                            "" !== this.$search.attr("placeholder") ? (e = this.$selection.find(".select2-selection__rendered").innerWidth()) : (e = 0.75 * (this.$search.val().length + 1) + "em");
                            this.$search.css("width", e);
                        }),
                        i
                    );
                }),
                t.define("select2/selection/eventRelay", ["jquery"], function(e) {
                    function t() {}
                    return (
                        (t.prototype.bind = function(t, n, i) {
                            var o = this,
                                r = ["open", "opening", "close", "closing", "select", "selecting", "unselect", "unselecting"],
                                s = ["opening", "closing", "selecting", "unselecting"];
                            t.call(this, n, i),
                                n.on("*", function(t, n) {
                                    if (-1 !== e.inArray(t, r)) {
                                        n = n || {};
                                        var i = e.Event("select2:" + t, { params: n });
                                        o.$element.trigger(i), -1 !== e.inArray(t, s) && (n.prevented = i.isDefaultPrevented());
                                    }
                                });
                        }),
                        t
                    );
                }),
                t.define("select2/translation", ["jquery", "require"], function(e, t) {
                    function n(e) {
                        this.dict = e || {};
                    }
                    return (
                        (n.prototype.all = function() {
                            return this.dict;
                        }),
                        (n.prototype.get = function(e) {
                            return this.dict[e];
                        }),
                        (n.prototype.extend = function(t) {
                            this.dict = e.extend({}, t.all(), this.dict);
                        }),
                        (n._cache = {}),
                        (n.loadPath = function(e) {
                            if (!(e in n._cache)) {
                                var i = t(e);
                                n._cache[e] = i;
                            }
                            return new n(n._cache[e]);
                        }),
                        n
                    );
                }),
                t.define("select2/diacritics", [], function() {
                    return {
                        "Ⓐ": "A",
                        Ａ: "A",
                        À: "A",
                        Á: "A",
                        Â: "A",
                        Ầ: "A",
                        Ấ: "A",
                        Ẫ: "A",
                        Ẩ: "A",
                        Ã: "A",
                        Ā: "A",
                        Ă: "A",
                        Ằ: "A",
                        Ắ: "A",
                        Ẵ: "A",
                        Ẳ: "A",
                        Ȧ: "A",
                        Ǡ: "A",
                        Ä: "A",
                        Ǟ: "A",
                        Ả: "A",
                        Å: "A",
                        Ǻ: "A",
                        Ǎ: "A",
                        Ȁ: "A",
                        Ȃ: "A",
                        Ạ: "A",
                        Ậ: "A",
                        Ặ: "A",
                        Ḁ: "A",
                        Ą: "A",
                        Ⱥ: "A",
                        Ɐ: "A",
                        Ꜳ: "AA",
                        Æ: "AE",
                        Ǽ: "AE",
                        Ǣ: "AE",
                        Ꜵ: "AO",
                        Ꜷ: "AU",
                        Ꜹ: "AV",
                        Ꜻ: "AV",
                        Ꜽ: "AY",
                        "Ⓑ": "B",
                        Ｂ: "B",
                        Ḃ: "B",
                        Ḅ: "B",
                        Ḇ: "B",
                        Ƀ: "B",
                        Ƃ: "B",
                        Ɓ: "B",
                        "Ⓒ": "C",
                        Ｃ: "C",
                        Ć: "C",
                        Ĉ: "C",
                        Ċ: "C",
                        Č: "C",
                        Ç: "C",
                        Ḉ: "C",
                        Ƈ: "C",
                        Ȼ: "C",
                        Ꜿ: "C",
                        "Ⓓ": "D",
                        Ｄ: "D",
                        Ḋ: "D",
                        Ď: "D",
                        Ḍ: "D",
                        Ḑ: "D",
                        Ḓ: "D",
                        Ḏ: "D",
                        Đ: "D",
                        Ƌ: "D",
                        Ɗ: "D",
                        Ɖ: "D",
                        Ꝺ: "D",
                        Ǳ: "DZ",
                        Ǆ: "DZ",
                        ǲ: "Dz",
                        ǅ: "Dz",
                        "Ⓔ": "E",
                        Ｅ: "E",
                        È: "E",
                        É: "E",
                        Ê: "E",
                        Ề: "E",
                        Ế: "E",
                        Ễ: "E",
                        Ể: "E",
                        Ẽ: "E",
                        Ē: "E",
                        Ḕ: "E",
                        Ḗ: "E",
                        Ĕ: "E",
                        Ė: "E",
                        Ë: "E",
                        Ẻ: "E",
                        Ě: "E",
                        Ȅ: "E",
                        Ȇ: "E",
                        Ẹ: "E",
                        Ệ: "E",
                        Ȩ: "E",
                        Ḝ: "E",
                        Ę: "E",
                        Ḙ: "E",
                        Ḛ: "E",
                        Ɛ: "E",
                        Ǝ: "E",
                        "Ⓕ": "F",
                        Ｆ: "F",
                        Ḟ: "F",
                        Ƒ: "F",
                        Ꝼ: "F",
                        "Ⓖ": "G",
                        Ｇ: "G",
                        Ǵ: "G",
                        Ĝ: "G",
                        Ḡ: "G",
                        Ğ: "G",
                        Ġ: "G",
                        Ǧ: "G",
                        Ģ: "G",
                        Ǥ: "G",
                        Ɠ: "G",
                        Ꞡ: "G",
                        Ᵹ: "G",
                        Ꝿ: "G",
                        "Ⓗ": "H",
                        Ｈ: "H",
                        Ĥ: "H",
                        Ḣ: "H",
                        Ḧ: "H",
                        Ȟ: "H",
                        Ḥ: "H",
                        Ḩ: "H",
                        Ḫ: "H",
                        Ħ: "H",
                        Ⱨ: "H",
                        Ⱶ: "H",
                        Ɥ: "H",
                        "Ⓘ": "I",
                        Ｉ: "I",
                        Ì: "I",
                        Í: "I",
                        Î: "I",
                        Ĩ: "I",
                        Ī: "I",
                        Ĭ: "I",
                        İ: "I",
                        Ï: "I",
                        Ḯ: "I",
                        Ỉ: "I",
                        Ǐ: "I",
                        Ȉ: "I",
                        Ȋ: "I",
                        Ị: "I",
                        Į: "I",
                        Ḭ: "I",
                        Ɨ: "I",
                        "Ⓙ": "J",
                        Ｊ: "J",
                        Ĵ: "J",
                        Ɉ: "J",
                        "Ⓚ": "K",
                        Ｋ: "K",
                        Ḱ: "K",
                        Ǩ: "K",
                        Ḳ: "K",
                        Ķ: "K",
                        Ḵ: "K",
                        Ƙ: "K",
                        Ⱪ: "K",
                        Ꝁ: "K",
                        Ꝃ: "K",
                        Ꝅ: "K",
                        Ꞣ: "K",
                        "Ⓛ": "L",
                        Ｌ: "L",
                        Ŀ: "L",
                        Ĺ: "L",
                        Ľ: "L",
                        Ḷ: "L",
                        Ḹ: "L",
                        Ļ: "L",
                        Ḽ: "L",
                        Ḻ: "L",
                        Ł: "L",
                        Ƚ: "L",
                        Ɫ: "L",
                        Ⱡ: "L",
                        Ꝉ: "L",
                        Ꝇ: "L",
                        Ꞁ: "L",
                        Ǉ: "LJ",
                        ǈ: "Lj",
                        "Ⓜ": "M",
                        Ｍ: "M",
                        Ḿ: "M",
                        Ṁ: "M",
                        Ṃ: "M",
                        Ɱ: "M",
                        Ɯ: "M",
                        "Ⓝ": "N",
                        Ｎ: "N",
                        Ǹ: "N",
                        Ń: "N",
                        Ñ: "N",
                        Ṅ: "N",
                        Ň: "N",
                        Ṇ: "N",
                        Ņ: "N",
                        Ṋ: "N",
                        Ṉ: "N",
                        Ƞ: "N",
                        Ɲ: "N",
                        Ꞑ: "N",
                        Ꞥ: "N",
                        Ǌ: "NJ",
                        ǋ: "Nj",
                        "Ⓞ": "O",
                        Ｏ: "O",
                        Ò: "O",
                        Ó: "O",
                        Ô: "O",
                        Ồ: "O",
                        Ố: "O",
                        Ỗ: "O",
                        Ổ: "O",
                        Õ: "O",
                        Ṍ: "O",
                        Ȭ: "O",
                        Ṏ: "O",
                        Ō: "O",
                        Ṑ: "O",
                        Ṓ: "O",
                        Ŏ: "O",
                        Ȯ: "O",
                        Ȱ: "O",
                        Ö: "O",
                        Ȫ: "O",
                        Ỏ: "O",
                        Ő: "O",
                        Ǒ: "O",
                        Ȍ: "O",
                        Ȏ: "O",
                        Ơ: "O",
                        Ờ: "O",
                        Ớ: "O",
                        Ỡ: "O",
                        Ở: "O",
                        Ợ: "O",
                        Ọ: "O",
                        Ộ: "O",
                        Ǫ: "O",
                        Ǭ: "O",
                        Ø: "O",
                        Ǿ: "O",
                        Ɔ: "O",
                        Ɵ: "O",
                        Ꝋ: "O",
                        Ꝍ: "O",
                        Ƣ: "OI",
                        Ꝏ: "OO",
                        Ȣ: "OU",
                        "Ⓟ": "P",
                        Ｐ: "P",
                        Ṕ: "P",
                        Ṗ: "P",
                        Ƥ: "P",
                        Ᵽ: "P",
                        Ꝑ: "P",
                        Ꝓ: "P",
                        Ꝕ: "P",
                        "Ⓠ": "Q",
                        Ｑ: "Q",
                        Ꝗ: "Q",
                        Ꝙ: "Q",
                        Ɋ: "Q",
                        "Ⓡ": "R",
                        Ｒ: "R",
                        Ŕ: "R",
                        Ṙ: "R",
                        Ř: "R",
                        Ȑ: "R",
                        Ȓ: "R",
                        Ṛ: "R",
                        Ṝ: "R",
                        Ŗ: "R",
                        Ṟ: "R",
                        Ɍ: "R",
                        Ɽ: "R",
                        Ꝛ: "R",
                        Ꞧ: "R",
                        Ꞃ: "R",
                        "Ⓢ": "S",
                        Ｓ: "S",
                        ẞ: "S",
                        Ś: "S",
                        Ṥ: "S",
                        Ŝ: "S",
                        Ṡ: "S",
                        Š: "S",
                        Ṧ: "S",
                        Ṣ: "S",
                        Ṩ: "S",
                        Ș: "S",
                        Ş: "S",
                        Ȿ: "S",
                        Ꞩ: "S",
                        Ꞅ: "S",
                        "Ⓣ": "T",
                        Ｔ: "T",
                        Ṫ: "T",
                        Ť: "T",
                        Ṭ: "T",
                        Ț: "T",
                        Ţ: "T",
                        Ṱ: "T",
                        Ṯ: "T",
                        Ŧ: "T",
                        Ƭ: "T",
                        Ʈ: "T",
                        Ⱦ: "T",
                        Ꞇ: "T",
                        Ꜩ: "TZ",
                        "Ⓤ": "U",
                        Ｕ: "U",
                        Ù: "U",
                        Ú: "U",
                        Û: "U",
                        Ũ: "U",
                        Ṹ: "U",
                        Ū: "U",
                        Ṻ: "U",
                        Ŭ: "U",
                        Ü: "U",
                        Ǜ: "U",
                        Ǘ: "U",
                        Ǖ: "U",
                        Ǚ: "U",
                        Ủ: "U",
                        Ů: "U",
                        Ű: "U",
                        Ǔ: "U",
                        Ȕ: "U",
                        Ȗ: "U",
                        Ư: "U",
                        Ừ: "U",
                        Ứ: "U",
                        Ữ: "U",
                        Ử: "U",
                        Ự: "U",
                        Ụ: "U",
                        Ṳ: "U",
                        Ų: "U",
                        Ṷ: "U",
                        Ṵ: "U",
                        Ʉ: "U",
                        "Ⓥ": "V",
                        Ｖ: "V",
                        Ṽ: "V",
                        Ṿ: "V",
                        Ʋ: "V",
                        Ꝟ: "V",
                        Ʌ: "V",
                        Ꝡ: "VY",
                        "Ⓦ": "W",
                        Ｗ: "W",
                        Ẁ: "W",
                        Ẃ: "W",
                        Ŵ: "W",
                        Ẇ: "W",
                        Ẅ: "W",
                        Ẉ: "W",
                        Ⱳ: "W",
                        "Ⓧ": "X",
                        Ｘ: "X",
                        Ẋ: "X",
                        Ẍ: "X",
                        "Ⓨ": "Y",
                        Ｙ: "Y",
                        Ỳ: "Y",
                        Ý: "Y",
                        Ŷ: "Y",
                        Ỹ: "Y",
                        Ȳ: "Y",
                        Ẏ: "Y",
                        Ÿ: "Y",
                        Ỷ: "Y",
                        Ỵ: "Y",
                        Ƴ: "Y",
                        Ɏ: "Y",
                        Ỿ: "Y",
                        "Ⓩ": "Z",
                        Ｚ: "Z",
                        Ź: "Z",
                        Ẑ: "Z",
                        Ż: "Z",
                        Ž: "Z",
                        Ẓ: "Z",
                        Ẕ: "Z",
                        Ƶ: "Z",
                        Ȥ: "Z",
                        Ɀ: "Z",
                        Ⱬ: "Z",
                        Ꝣ: "Z",
                        "ⓐ": "a",
                        ａ: "a",
                        ẚ: "a",
                        à: "a",
                        á: "a",
                        â: "a",
                        ầ: "a",
                        ấ: "a",
                        ẫ: "a",
                        ẩ: "a",
                        ã: "a",
                        ā: "a",
                        ă: "a",
                        ằ: "a",
                        ắ: "a",
                        ẵ: "a",
                        ẳ: "a",
                        ȧ: "a",
                        ǡ: "a",
                        ä: "a",
                        ǟ: "a",
                        ả: "a",
                        å: "a",
                        ǻ: "a",
                        ǎ: "a",
                        ȁ: "a",
                        ȃ: "a",
                        ạ: "a",
                        ậ: "a",
                        ặ: "a",
                        ḁ: "a",
                        ą: "a",
                        ⱥ: "a",
                        ɐ: "a",
                        ꜳ: "aa",
                        æ: "ae",
                        ǽ: "ae",
                        ǣ: "ae",
                        ꜵ: "ao",
                        ꜷ: "au",
                        ꜹ: "av",
                        ꜻ: "av",
                        ꜽ: "ay",
                        "ⓑ": "b",
                        ｂ: "b",
                        ḃ: "b",
                        ḅ: "b",
                        ḇ: "b",
                        ƀ: "b",
                        ƃ: "b",
                        ɓ: "b",
                        "ⓒ": "c",
                        ｃ: "c",
                        ć: "c",
                        ĉ: "c",
                        ċ: "c",
                        č: "c",
                        ç: "c",
                        ḉ: "c",
                        ƈ: "c",
                        ȼ: "c",
                        ꜿ: "c",
                        ↄ: "c",
                        "ⓓ": "d",
                        ｄ: "d",
                        ḋ: "d",
                        ď: "d",
                        ḍ: "d",
                        ḑ: "d",
                        ḓ: "d",
                        ḏ: "d",
                        đ: "d",
                        ƌ: "d",
                        ɖ: "d",
                        ɗ: "d",
                        ꝺ: "d",
                        ǳ: "dz",
                        ǆ: "dz",
                        "ⓔ": "e",
                        ｅ: "e",
                        è: "e",
                        é: "e",
                        ê: "e",
                        ề: "e",
                        ế: "e",
                        ễ: "e",
                        ể: "e",
                        ẽ: "e",
                        ē: "e",
                        ḕ: "e",
                        ḗ: "e",
                        ĕ: "e",
                        ė: "e",
                        ë: "e",
                        ẻ: "e",
                        ě: "e",
                        ȅ: "e",
                        ȇ: "e",
                        ẹ: "e",
                        ệ: "e",
                        ȩ: "e",
                        ḝ: "e",
                        ę: "e",
                        ḙ: "e",
                        ḛ: "e",
                        ɇ: "e",
                        ɛ: "e",
                        ǝ: "e",
                        "ⓕ": "f",
                        ｆ: "f",
                        ḟ: "f",
                        ƒ: "f",
                        ꝼ: "f",
                        "ⓖ": "g",
                        ｇ: "g",
                        ǵ: "g",
                        ĝ: "g",
                        ḡ: "g",
                        ğ: "g",
                        ġ: "g",
                        ǧ: "g",
                        ģ: "g",
                        ǥ: "g",
                        ɠ: "g",
                        ꞡ: "g",
                        ᵹ: "g",
                        ꝿ: "g",
                        "ⓗ": "h",
                        ｈ: "h",
                        ĥ: "h",
                        ḣ: "h",
                        ḧ: "h",
                        ȟ: "h",
                        ḥ: "h",
                        ḩ: "h",
                        ḫ: "h",
                        ẖ: "h",
                        ħ: "h",
                        ⱨ: "h",
                        ⱶ: "h",
                        ɥ: "h",
                        ƕ: "hv",
                        "ⓘ": "i",
                        ｉ: "i",
                        ì: "i",
                        í: "i",
                        î: "i",
                        ĩ: "i",
                        ī: "i",
                        ĭ: "i",
                        ï: "i",
                        ḯ: "i",
                        ỉ: "i",
                        ǐ: "i",
                        ȉ: "i",
                        ȋ: "i",
                        ị: "i",
                        į: "i",
                        ḭ: "i",
                        ɨ: "i",
                        ı: "i",
                        "ⓙ": "j",
                        ｊ: "j",
                        ĵ: "j",
                        ǰ: "j",
                        ɉ: "j",
                        "ⓚ": "k",
                        ｋ: "k",
                        ḱ: "k",
                        ǩ: "k",
                        ḳ: "k",
                        ķ: "k",
                        ḵ: "k",
                        ƙ: "k",
                        ⱪ: "k",
                        ꝁ: "k",
                        ꝃ: "k",
                        ꝅ: "k",
                        ꞣ: "k",
                        "ⓛ": "l",
                        ｌ: "l",
                        ŀ: "l",
                        ĺ: "l",
                        ľ: "l",
                        ḷ: "l",
                        ḹ: "l",
                        ļ: "l",
                        ḽ: "l",
                        ḻ: "l",
                        ſ: "l",
                        ł: "l",
                        ƚ: "l",
                        ɫ: "l",
                        ⱡ: "l",
                        ꝉ: "l",
                        ꞁ: "l",
                        ꝇ: "l",
                        ǉ: "lj",
                        "ⓜ": "m",
                        ｍ: "m",
                        ḿ: "m",
                        ṁ: "m",
                        ṃ: "m",
                        ɱ: "m",
                        ɯ: "m",
                        "ⓝ": "n",
                        ｎ: "n",
                        ǹ: "n",
                        ń: "n",
                        ñ: "n",
                        ṅ: "n",
                        ň: "n",
                        ṇ: "n",
                        ņ: "n",
                        ṋ: "n",
                        ṉ: "n",
                        ƞ: "n",
                        ɲ: "n",
                        ŉ: "n",
                        ꞑ: "n",
                        ꞥ: "n",
                        ǌ: "nj",
                        "ⓞ": "o",
                        ｏ: "o",
                        ò: "o",
                        ó: "o",
                        ô: "o",
                        ồ: "o",
                        ố: "o",
                        ỗ: "o",
                        ổ: "o",
                        õ: "o",
                        ṍ: "o",
                        ȭ: "o",
                        ṏ: "o",
                        ō: "o",
                        ṑ: "o",
                        ṓ: "o",
                        ŏ: "o",
                        ȯ: "o",
                        ȱ: "o",
                        ö: "o",
                        ȫ: "o",
                        ỏ: "o",
                        ő: "o",
                        ǒ: "o",
                        ȍ: "o",
                        ȏ: "o",
                        ơ: "o",
                        ờ: "o",
                        ớ: "o",
                        ỡ: "o",
                        ở: "o",
                        ợ: "o",
                        ọ: "o",
                        ộ: "o",
                        ǫ: "o",
                        ǭ: "o",
                        ø: "o",
                        ǿ: "o",
                        ɔ: "o",
                        ꝋ: "o",
                        ꝍ: "o",
                        ɵ: "o",
                        ƣ: "oi",
                        ȣ: "ou",
                        ꝏ: "oo",
                        "ⓟ": "p",
                        ｐ: "p",
                        ṕ: "p",
                        ṗ: "p",
                        ƥ: "p",
                        ᵽ: "p",
                        ꝑ: "p",
                        ꝓ: "p",
                        ꝕ: "p",
                        "ⓠ": "q",
                        ｑ: "q",
                        ɋ: "q",
                        ꝗ: "q",
                        ꝙ: "q",
                        "ⓡ": "r",
                        ｒ: "r",
                        ŕ: "r",
                        ṙ: "r",
                        ř: "r",
                        ȑ: "r",
                        ȓ: "r",
                        ṛ: "r",
                        ṝ: "r",
                        ŗ: "r",
                        ṟ: "r",
                        ɍ: "r",
                        ɽ: "r",
                        ꝛ: "r",
                        ꞧ: "r",
                        ꞃ: "r",
                        "ⓢ": "s",
                        ｓ: "s",
                        ß: "s",
                        ś: "s",
                        ṥ: "s",
                        ŝ: "s",
                        ṡ: "s",
                        š: "s",
                        ṧ: "s",
                        ṣ: "s",
                        ṩ: "s",
                        ș: "s",
                        ş: "s",
                        ȿ: "s",
                        ꞩ: "s",
                        ꞅ: "s",
                        ẛ: "s",
                        "ⓣ": "t",
                        ｔ: "t",
                        ṫ: "t",
                        ẗ: "t",
                        ť: "t",
                        ṭ: "t",
                        ț: "t",
                        ţ: "t",
                        ṱ: "t",
                        ṯ: "t",
                        ŧ: "t",
                        ƭ: "t",
                        ʈ: "t",
                        ⱦ: "t",
                        ꞇ: "t",
                        ꜩ: "tz",
                        "ⓤ": "u",
                        ｕ: "u",
                        ù: "u",
                        ú: "u",
                        û: "u",
                        ũ: "u",
                        ṹ: "u",
                        ū: "u",
                        ṻ: "u",
                        ŭ: "u",
                        ü: "u",
                        ǜ: "u",
                        ǘ: "u",
                        ǖ: "u",
                        ǚ: "u",
                        ủ: "u",
                        ů: "u",
                        ű: "u",
                        ǔ: "u",
                        ȕ: "u",
                        ȗ: "u",
                        ư: "u",
                        ừ: "u",
                        ứ: "u",
                        ữ: "u",
                        ử: "u",
                        ự: "u",
                        ụ: "u",
                        ṳ: "u",
                        ų: "u",
                        ṷ: "u",
                        ṵ: "u",
                        ʉ: "u",
                        "ⓥ": "v",
                        ｖ: "v",
                        ṽ: "v",
                        ṿ: "v",
                        ʋ: "v",
                        ꝟ: "v",
                        ʌ: "v",
                        ꝡ: "vy",
                        "ⓦ": "w",
                        ｗ: "w",
                        ẁ: "w",
                        ẃ: "w",
                        ŵ: "w",
                        ẇ: "w",
                        ẅ: "w",
                        ẘ: "w",
                        ẉ: "w",
                        ⱳ: "w",
                        "ⓧ": "x",
                        ｘ: "x",
                        ẋ: "x",
                        ẍ: "x",
                        "ⓨ": "y",
                        ｙ: "y",
                        ỳ: "y",
                        ý: "y",
                        ŷ: "y",
                        ỹ: "y",
                        ȳ: "y",
                        ẏ: "y",
                        ÿ: "y",
                        ỷ: "y",
                        ẙ: "y",
                        ỵ: "y",
                        ƴ: "y",
                        ɏ: "y",
                        ỿ: "y",
                        "ⓩ": "z",
                        ｚ: "z",
                        ź: "z",
                        ẑ: "z",
                        ż: "z",
                        ž: "z",
                        ẓ: "z",
                        ẕ: "z",
                        ƶ: "z",
                        ȥ: "z",
                        ɀ: "z",
                        ⱬ: "z",
                        ꝣ: "z",
                        Ά: "Α",
                        Έ: "Ε",
                        Ή: "Η",
                        Ί: "Ι",
                        Ϊ: "Ι",
                        Ό: "Ο",
                        Ύ: "Υ",
                        Ϋ: "Υ",
                        Ώ: "Ω",
                        ά: "α",
                        έ: "ε",
                        ή: "η",
                        ί: "ι",
                        ϊ: "ι",
                        ΐ: "ι",
                        ό: "ο",
                        ύ: "υ",
                        ϋ: "υ",
                        ΰ: "υ",
                        ω: "ω",
                        ς: "σ",
                    };
                }),
                t.define("select2/data/base", ["../utils"], function(e) {
                    function t(e, n) {
                        t.__super__.constructor.call(this);
                    }
                    return (
                        e.Extend(t, e.Observable),
                        (t.prototype.current = function(e) {
                            throw new Error("The `current` method must be defined in child classes.");
                        }),
                        (t.prototype.query = function(e, t) {
                            throw new Error("The `query` method must be defined in child classes.");
                        }),
                        (t.prototype.bind = function(e, t) {}),
                        (t.prototype.destroy = function() {}),
                        (t.prototype.generateResultId = function(t, n) {
                            var i = t.id + "-result-";
                            return (i += e.generateChars(4)), null != n.id ? (i += "-" + n.id.toString()) : (i += "-" + e.generateChars(4)), i;
                        }),
                        t
                    );
                }),
                t.define("select2/data/select", ["./base", "../utils", "jquery"], function(e, t, n) {
                    function i(e, t) {
                        (this.$element = e), (this.options = t), i.__super__.constructor.call(this);
                    }
                    return (
                        t.Extend(i, e),
                        (i.prototype.current = function(e) {
                            var t = [],
                                i = this;
                            this.$element.find(":selected").each(function() {
                                    var e = n(this),
                                        o = i.item(e);
                                    t.push(o);
                                }),
                                e(t);
                        }),
                        (i.prototype.select = function(e) {
                            var t = this;
                            if (((e.selected = !0), n(e.element).is("option"))) return (e.element.selected = !0), void this.$element.trigger("change");
                            if (this.$element.prop("multiple"))
                                this.current(function(i) {
                                    var o = [];
                                    (e = [e]).push.apply(e, i);
                                    for (var r = 0; r < e.length; r++) {
                                        var s = e[r].id; -
                                        1 === n.inArray(s, o) && o.push(s);
                                    }
                                    t.$element.val(o), t.$element.trigger("change");
                                });
                            else {
                                var i = e.id;
                                this.$element.val(i), this.$element.trigger("change");
                            }
                        }),
                        (i.prototype.unselect = function(e) {
                            var t = this;
                            if (this.$element.prop("multiple")) {
                                if (((e.selected = !1), n(e.element).is("option"))) return (e.element.selected = !1), void this.$element.trigger("change");
                                this.current(function(i) {
                                    for (var o = [], r = 0; r < i.length; r++) {
                                        var s = i[r].id;
                                        s !== e.id && -1 === n.inArray(s, o) && o.push(s);
                                    }
                                    t.$element.val(o), t.$element.trigger("change");
                                });
                            }
                        }),
                        (i.prototype.bind = function(e, t) {
                            var n = this;
                            (this.container = e),
                            e.on("select", function(e) {
                                    n.select(e.data);
                                }),
                                e.on("unselect", function(e) {
                                    n.unselect(e.data);
                                });
                        }),
                        (i.prototype.destroy = function() {
                            this.$element.find("*").each(function() {
                                n.removeData(this, "data");
                            });
                        }),
                        (i.prototype.query = function(e, t) {
                            var i = [],
                                o = this;
                            this.$element.children().each(function() {
                                    var t = n(this);
                                    if (t.is("option") || t.is("optgroup")) {
                                        var r = o.item(t),
                                            s = o.matches(e, r);
                                        null !== s && i.push(s);
                                    }
                                }),
                                t({ results: i });
                        }),
                        (i.prototype.addOptions = function(e) {
                            t.appendMany(this.$element, e);
                        }),
                        (i.prototype.option = function(e) {
                            var t;
                            e.children ? ((t = document.createElement("optgroup")).label = e.text) : void 0 !== (t = document.createElement("option")).textContent ? (t.textContent = e.text) : (t.innerText = e.text),
                                void 0 !== e.id && (t.value = e.id),
                                e.disabled && (t.disabled = !0),
                                e.selected && (t.selected = !0),
                                e.title && (t.title = e.title);
                            var i = n(t),
                                o = this._normalizeItem(e);
                            return (o.element = t), n.data(t, "data", o), i;
                        }),
                        (i.prototype.item = function(e) {
                            var t = {};
                            if (null != (t = n.data(e[0], "data"))) return t;
                            if (e.is("option")) t = { id: e.val(), text: e.text(), disabled: e.prop("disabled"), selected: e.prop("selected"), title: e.prop("title") };
                            else if (e.is("optgroup")) {
                                t = { text: e.prop("label"), children: [], title: e.prop("title") };
                                for (var i = e.children("option"), o = [], r = 0; r < i.length; r++) {
                                    var s = n(i[r]),
                                        a = this.item(s);
                                    o.push(a);
                                }
                                t.children = o;
                            }
                            return ((t = this._normalizeItem(t)).element = e[0]), n.data(e[0], "data", t), t;
                        }),
                        (i.prototype._normalizeItem = function(e) {
                            n.isPlainObject(e) || (e = { id: e, text: e });
                            return (
                                null != (e = n.extend({}, { text: "" }, e)).id && (e.id = e.id.toString()),
                                null != e.text && (e.text = e.text.toString()),
                                null == e._resultId && e.id && null != this.container && (e._resultId = this.generateResultId(this.container, e)),
                                n.extend({}, { selected: !1, disabled: !1 }, e)
                            );
                        }),
                        (i.prototype.matches = function(e, t) {
                            return this.options.get("matcher")(e, t);
                        }),
                        i
                    );
                }),
                t.define("select2/data/array", ["./select", "../utils", "jquery"], function(e, t, n) {
                    function i(e, t) {
                        var n = t.get("data") || [];
                        i.__super__.constructor.call(this, e, t), this.addOptions(this.convertToOptions(n));
                    }
                    return (
                        t.Extend(i, e),
                        (i.prototype.select = function(e) {
                            var t = this.$element.find("option").filter(function(t, n) {
                                return n.value == e.id.toString();
                            });
                            0 === t.length && ((t = this.option(e)), this.addOptions(t)), i.__super__.select.call(this, e);
                        }),
                        (i.prototype.convertToOptions = function(e) {
                            var i = this,
                                o = this.$element.find("option"),
                                r = o
                                .map(function() {
                                    return i.item(n(this)).id;
                                })
                                .get(),
                                s = [];

                            function a(e) {
                                return function() {
                                    return n(this).val() == e.id;
                                };
                            }
                            for (var l = 0; l < e.length; l++) {
                                var c = this._normalizeItem(e[l]);
                                if (n.inArray(c.id, r) >= 0) {
                                    var u = o.filter(a(c)),
                                        d = this.item(u),
                                        p = n.extend(!0, {}, c, d),
                                        h = this.option(p);
                                    u.replaceWith(h);
                                } else {
                                    var f = this.option(c);
                                    if (c.children) {
                                        var g = this.convertToOptions(c.children);
                                        t.appendMany(f, g);
                                    }
                                    s.push(f);
                                }
                            }
                            return s;
                        }),
                        i
                    );
                }),
                t.define("select2/data/ajax", ["./array", "../utils", "jquery"], function(e, t, n) {
                    function i(e, t) {
                        (this.ajaxOptions = this._applyDefaults(t.get("ajax"))), null != this.ajaxOptions.processResults && (this.processResults = this.ajaxOptions.processResults), i.__super__.constructor.call(this, e, t);
                    }
                    return (
                        t.Extend(i, e),
                        (i.prototype._applyDefaults = function(e) {
                            var t = {
                                data: function(e) {
                                    return n.extend({}, e, { q: e.term });
                                },
                                transport: function(e, t, i) {
                                    var o = n.ajax(e);
                                    return o.then(t), o.fail(i), o;
                                },
                            };
                            return n.extend({}, t, e, !0);
                        }),
                        (i.prototype.processResults = function(e) {
                            return e;
                        }),
                        (i.prototype.query = function(e, t) {
                            var i = this;
                            null != this._request && (n.isFunction(this._request.abort) && this._request.abort(), (this._request = null));
                            var o = n.extend({ type: "GET" }, this.ajaxOptions);

                            function r() {
                                var r = o.transport(
                                    o,
                                    function(o) {
                                        var r = i.processResults(o, e);
                                        i.options.get("debug") &&
                                            window.console &&
                                            console.error &&
                                            ((r && r.results && n.isArray(r.results)) || console.error("Select2: The AJAX results did not return an array in the `results` key of the response.")),
                                            t(r);
                                    },
                                    function() {
                                        (r.status && "0" === r.status) || i.trigger("results:message", { message: "errorLoading" });
                                    }
                                );
                                i._request = r;
                            }
                            "function" == typeof o.url && (o.url = o.url.call(this.$element, e)),
                                "function" == typeof o.data && (o.data = o.data.call(this.$element, e)),
                                this.ajaxOptions.delay && null != e.term ? (this._queryTimeout && window.clearTimeout(this._queryTimeout), (this._queryTimeout = window.setTimeout(r, this.ajaxOptions.delay))) : r();
                        }),
                        i
                    );
                }),
                t.define("select2/data/tags", ["jquery"], function(e) {
                    function t(t, n, i) {
                        var o = i.get("tags"),
                            r = i.get("createTag");
                        void 0 !== r && (this.createTag = r);
                        var s = i.get("insertTag");
                        if ((void 0 !== s && (this.insertTag = s), t.call(this, n, i), e.isArray(o)))
                            for (var a = 0; a < o.length; a++) {
                                var l = o[a],
                                    c = this._normalizeItem(l),
                                    u = this.option(c);
                                this.$element.append(u);
                            }
                    }
                    return (
                        (t.prototype.query = function(e, t, n) {
                            var i = this;
                            this._removeOldTags(),
                                null != t.term && null == t.page ?
                                e.call(this, t, function e(o, r) {
                                    for (var s = o.results, a = 0; a < s.length; a++) {
                                        var l = s[a],
                                            c = null != l.children && !e({ results: l.children }, !0);
                                        if ((l.text || "").toUpperCase() === (t.term || "").toUpperCase() || c) return !r && ((o.data = s), void n(o));
                                    }
                                    if (r) return !0;
                                    var u = i.createTag(t);
                                    if (null != u) {
                                        var d = i.option(u);
                                        d.attr("data-select2-tag", !0), i.addOptions([d]), i.insertTag(s, u);
                                    }
                                    (o.results = s), n(o);
                                }) :
                                e.call(this, t, n);
                        }),
                        (t.prototype.createTag = function(t, n) {
                            var i = e.trim(n.term);
                            return "" === i ? null : { id: i, text: i };
                        }),
                        (t.prototype.insertTag = function(e, t, n) {
                            t.unshift(n);
                        }),
                        (t.prototype._removeOldTags = function(t) {
                            this._lastTag;
                            this.$element.find("option[data-select2-tag]").each(function() {
                                this.selected || e(this).remove();
                            });
                        }),
                        t
                    );
                }),
                t.define("select2/data/tokenizer", ["jquery"], function(e) {
                    function t(e, t, n) {
                        var i = n.get("tokenizer");
                        void 0 !== i && (this.tokenizer = i), e.call(this, t, n);
                    }
                    return (
                        (t.prototype.bind = function(e, t, n) {
                            e.call(this, t, n), (this.$search = t.dropdown.$search || t.selection.$search || n.find(".select2-search__field"));
                        }),
                        (t.prototype.query = function(t, n, i) {
                            var o = this;
                            n.term = n.term || "";
                            var r = this.tokenizer(n, this.options, function(t) {
                                var n = o._normalizeItem(t);
                                if (!o.$element.find("option").filter(function() {
                                        return e(this).val() === n.id;
                                    }).length) {
                                    var i = o.option(n);
                                    i.attr("data-select2-tag", !0), o._removeOldTags(), o.addOptions([i]);
                                }!(function(e) {
                                    o.trigger("select", { data: e });
                                })(n);
                            });
                            r.term !== n.term && (this.$search.length && (this.$search.val(r.term), this.$search.focus()), (n.term = r.term)), t.call(this, n, i);
                        }),
                        (t.prototype.tokenizer = function(t, n, i, o) {
                            for (
                                var r = i.get("tokenSeparators") || [],
                                    s = n.term,
                                    a = 0,
                                    l =
                                    this.createTag ||
                                    function(e) {
                                        return { id: e.term, text: e.term };
                                    }; a < s.length;

                            ) {
                                var c = s[a];
                                if (-1 !== e.inArray(c, r)) {
                                    var u = s.substr(0, a),
                                        d = l(e.extend({}, n, { term: u }));
                                    null != d ? (o(d), (s = s.substr(a + 1) || ""), (a = 0)) : a++;
                                } else a++;
                            }
                            return { term: s };
                        }),
                        t
                    );
                }),
                t.define("select2/data/minimumInputLength", [], function() {
                    function e(e, t, n) {
                        (this.minimumInputLength = n.get("minimumInputLength")), e.call(this, t, n);
                    }
                    return (
                        (e.prototype.query = function(e, t, n) {
                            (t.term = t.term || ""),
                            t.term.length < this.minimumInputLength ? this.trigger("results:message", { message: "inputTooShort", args: { minimum: this.minimumInputLength, input: t.term, params: t } }) : e.call(this, t, n);
                        }),
                        e
                    );
                }),
                t.define("select2/data/maximumInputLength", [], function() {
                    function e(e, t, n) {
                        (this.maximumInputLength = n.get("maximumInputLength")), e.call(this, t, n);
                    }
                    return (
                        (e.prototype.query = function(e, t, n) {
                            (t.term = t.term || ""),
                            this.maximumInputLength > 0 && t.term.length > this.maximumInputLength ?
                                this.trigger("results:message", { message: "inputTooLong", args: { maximum: this.maximumInputLength, input: t.term, params: t } }) :
                                e.call(this, t, n);
                        }),
                        e
                    );
                }),
                t.define("select2/data/maximumSelectionLength", [], function() {
                    function e(e, t, n) {
                        (this.maximumSelectionLength = n.get("maximumSelectionLength")), e.call(this, t, n);
                    }
                    return (
                        (e.prototype.query = function(e, t, n) {
                            var i = this;
                            this.current(function(o) {
                                var r = null != o ? o.length : 0;
                                i.maximumSelectionLength > 0 && r >= i.maximumSelectionLength ? i.trigger("results:message", { message: "maximumSelected", args: { maximum: i.maximumSelectionLength } }) : e.call(i, t, n);
                            });
                        }),
                        e
                    );
                }),
                t.define("select2/dropdown", ["jquery", "./utils"], function(e, t) {
                    function n(e, t) {
                        (this.$element = e), (this.options = t), n.__super__.constructor.call(this);
                    }
                    return (
                        t.Extend(n, t.Observable),
                        (n.prototype.render = function() {
                            var t = e('<span class="select2-dropdown"><span class="select2-results"></span></span>');
                            return t.attr("dir", this.options.get("dir")), (this.$dropdown = t), t;
                        }),
                        (n.prototype.bind = function() {}),
                        (n.prototype.position = function(e, t) {}),
                        (n.prototype.destroy = function() {
                            this.$dropdown.remove();
                        }),
                        n
                    );
                }),
                t.define("select2/dropdown/search", ["jquery", "../utils"], function(e, t) {
                    function n() {}
                    return (
                        (n.prototype.render = function(t) {
                            var n = t.call(this),
                                i = e(
                                    '<span class="select2-search select2-search--dropdown"><input class="select2-search__field" type="search" tabindex="-1" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="textbox" /></span>'
                                );
                            return (this.$searchContainer = i), (this.$search = i.find("input")), n.prepend(i), n;
                        }),
                        (n.prototype.bind = function(t, n, i) {
                            var o = this;
                            t.call(this, n, i),
                                this.$search.on("keydown", function(e) {
                                    o.trigger("keypress", e), (o._keyUpPrevented = e.isDefaultPrevented());
                                }),
                                this.$search.on("input", function(t) {
                                    e(this).off("keyup");
                                }),
                                this.$search.on("keyup input", function(e) {
                                    o.handleSearch(e);
                                }),
                                n.on("open", function() {
                                    o.$search.attr("tabindex", 0),
                                        o.$search.focus(),
                                        window.setTimeout(function() {
                                            o.$search.focus();
                                        }, 0);
                                }),
                                n.on("close", function() {
                                    o.$search.attr("tabindex", -1), o.$search.val("");
                                }),
                                n.on("focus", function() {
                                    n.isOpen() || o.$search.focus();
                                }),
                                n.on("results:all", function(e) {
                                    (null != e.query.term && "" !== e.query.term) || (o.showSearch(e) ? o.$searchContainer.removeClass("select2-search--hide") : o.$searchContainer.addClass("select2-search--hide"));
                                });
                        }),
                        (n.prototype.handleSearch = function(e) {
                            if (!this._keyUpPrevented) {
                                var t = this.$search.val();
                                this.trigger("query", { term: t });
                            }
                            this._keyUpPrevented = !1;
                        }),
                        (n.prototype.showSearch = function(e, t) {
                            return !0;
                        }),
                        n
                    );
                }),
                t.define("select2/dropdown/hidePlaceholder", [], function() {
                    function e(e, t, n, i) {
                        (this.placeholder = this.normalizePlaceholder(n.get("placeholder"))), e.call(this, t, n, i);
                    }
                    return (
                        (e.prototype.append = function(e, t) {
                            (t.results = this.removePlaceholder(t.results)), e.call(this, t);
                        }),
                        (e.prototype.normalizePlaceholder = function(e, t) {
                            return "string" == typeof t && (t = { id: "", text: t }), t;
                        }),
                        (e.prototype.removePlaceholder = function(e, t) {
                            for (var n = t.slice(0), i = t.length - 1; i >= 0; i--) {
                                var o = t[i];
                                this.placeholder.id === o.id && n.splice(i, 1);
                            }
                            return n;
                        }),
                        e
                    );
                }),
                t.define("select2/dropdown/infiniteScroll", ["jquery"], function(e) {
                    function t(e, t, n, i) {
                        (this.lastParams = {}), e.call(this, t, n, i), (this.$loadingMore = this.createLoadingMore()), (this.loading = !1);
                    }
                    return (
                        (t.prototype.append = function(e, t) {
                            this.$loadingMore.remove(), (this.loading = !1), e.call(this, t), this.showLoadingMore(t) && this.$results.append(this.$loadingMore);
                        }),
                        (t.prototype.bind = function(t, n, i) {
                            var o = this;
                            t.call(this, n, i),
                                n.on("query", function(e) {
                                    (o.lastParams = e), (o.loading = !0);
                                }),
                                n.on("query:append", function(e) {
                                    (o.lastParams = e), (o.loading = !0);
                                }),
                                this.$results.on("scroll", function() {
                                    var t = e.contains(document.documentElement, o.$loadingMore[0]);
                                    !o.loading && t && o.$results.offset().top + o.$results.outerHeight(!1) + 50 >= o.$loadingMore.offset().top + o.$loadingMore.outerHeight(!1) && o.loadMore();
                                });
                        }),
                        (t.prototype.loadMore = function() {
                            this.loading = !0;
                            var t = e.extend({}, { page: 1 }, this.lastParams);
                            t.page++, this.trigger("query:append", t);
                        }),
                        (t.prototype.showLoadingMore = function(e, t) {
                            return t.pagination && t.pagination.more;
                        }),
                        (t.prototype.createLoadingMore = function() {
                            var t = e('<li class="select2-results__option select2-results__option--load-more"role="treeitem" aria-disabled="true"></li>'),
                                n = this.options.get("translations").get("loadingMore");
                            return t.html(n(this.lastParams)), t;
                        }),
                        t
                    );
                }),
                t.define("select2/dropdown/attachBody", ["jquery", "../utils"], function(e, t) {
                    function n(t, n, i) {
                        (this.$dropdownParent = i.get("dropdownParent") || e(document.body)), t.call(this, n, i);
                    }
                    return (
                        (n.prototype.bind = function(e, t, n) {
                            var i = this,
                                o = !1;
                            e.call(this, t, n),
                                t.on("open", function() {
                                    i._showDropdown(),
                                        i._attachPositioningHandler(t),
                                        o ||
                                        ((o = !0),
                                            t.on("results:all", function() {
                                                i._positionDropdown(), i._resizeDropdown();
                                            }),
                                            t.on("results:append", function() {
                                                i._positionDropdown(), i._resizeDropdown();
                                            }));
                                }),
                                t.on("close", function() {
                                    i._hideDropdown(), i._detachPositioningHandler(t);
                                }),
                                this.$dropdownContainer.on("mousedown", function(e) {
                                    e.stopPropagation();
                                });
                        }),
                        (n.prototype.destroy = function(e) {
                            e.call(this), this.$dropdownContainer.remove();
                        }),
                        (n.prototype.position = function(e, t, n) {
                            t.attr("class", n.attr("class")), t.removeClass("select2"), t.addClass("select2-container--open"), t.css({ position: "absolute", top: -999999 }), (this.$container = n);
                        }),
                        (n.prototype.render = function(t) {
                            var n = e("<span></span>"),
                                i = t.call(this);
                            return n.append(i), (this.$dropdownContainer = n), n;
                        }),
                        (n.prototype._hideDropdown = function(e) {
                            this.$dropdownContainer.detach();
                        }),
                        (n.prototype._attachPositioningHandler = function(n, i) {
                            var o = this,
                                r = "scroll.select2." + i.id,
                                s = "resize.select2." + i.id,
                                a = "orientationchange.select2." + i.id,
                                l = this.$container.parents().filter(t.hasScroll);
                            l.each(function() {
                                    e(this).data("select2-scroll-position", { x: e(this).scrollLeft(), y: e(this).scrollTop() });
                                }),
                                l.on(r, function(t) {
                                    var n = e(this).data("select2-scroll-position");
                                    e(this).scrollTop(n.y);
                                }),
                                e(window).on(r + " " + s + " " + a, function(e) {
                                    o._positionDropdown(), o._resizeDropdown();
                                });
                        }),
                        (n.prototype._detachPositioningHandler = function(n, i) {
                            var o = "scroll.select2." + i.id,
                                r = "resize.select2." + i.id,
                                s = "orientationchange.select2." + i.id;
                            this.$container.parents().filter(t.hasScroll).off(o), e(window).off(o + " " + r + " " + s);
                        }),
                        (n.prototype._positionDropdown = function() {
                            var t = e(window),
                                n = this.$dropdown.hasClass("select2-dropdown--above"),
                                i = this.$dropdown.hasClass("select2-dropdown--below"),
                                o = null,
                                r = this.$container.offset();
                            r.bottom = r.top + this.$container.outerHeight(!1);
                            var s = { height: this.$container.outerHeight(!1) };
                            (s.top = r.top), (s.bottom = r.top + s.height);
                            var a = this.$dropdown.outerHeight(!1),
                                l = t.scrollTop(),
                                c = t.scrollTop() + t.height(),
                                u = l < r.top - a,
                                d = c > r.bottom + a,
                                p = { left: r.left, top: s.bottom },
                                h = this.$dropdownParent;
                            "static" === h.css("position") && (h = h.offsetParent());
                            var f = h.offset();
                            (p.top -= f.top),
                            (p.left -= f.left),
                            n || i || (o = "below"),
                                d || !u || n ? !u && d && n && (o = "below") : (o = "above"),
                                ("above" == o || (n && "below" !== o)) && (p.top = s.top - f.top - a),
                                null != o &&
                                (this.$dropdown.removeClass("select2-dropdown--below select2-dropdown--above").addClass("select2-dropdown--" + o),
                                    this.$container.removeClass("select2-container--below select2-container--above").addClass("select2-container--" + o)),
                                this.$dropdownContainer.css(p);
                        }),
                        (n.prototype._resizeDropdown = function() {
                            var e = { width: this.$container.outerWidth(!1) + "px" };
                            this.options.get("dropdownAutoWidth") && ((e.minWidth = e.width), (e.position = "relative"), (e.width = "auto")), this.$dropdown.css(e);
                        }),
                        (n.prototype._showDropdown = function(e) {
                            this.$dropdownContainer.appendTo(this.$dropdownParent), this._positionDropdown(), this._resizeDropdown();
                        }),
                        n
                    );
                }),
                t.define("select2/dropdown/minimumResultsForSearch", [], function() {
                    function e(e, t, n, i) {
                        (this.minimumResultsForSearch = n.get("minimumResultsForSearch")), this.minimumResultsForSearch < 0 && (this.minimumResultsForSearch = 1 / 0), e.call(this, t, n, i);
                    }
                    return (
                        (e.prototype.showSearch = function(e, t) {
                            return (!(
                                (function e(t) {
                                    for (var n = 0, i = 0; i < t.length; i++) {
                                        var o = t[i];
                                        o.children ? (n += e(o.children)) : n++;
                                    }
                                    return n;
                                })(t.data.results) < this.minimumResultsForSearch
                            ) && e.call(this, t));
                        }),
                        e
                    );
                }),
                t.define("select2/dropdown/selectOnClose", [], function() {
                    function e() {}
                    return (
                        (e.prototype.bind = function(e, t, n) {
                            var i = this;
                            e.call(this, t, n),
                                t.on("close", function(e) {
                                    i._handleSelectOnClose(e);
                                });
                        }),
                        (e.prototype._handleSelectOnClose = function(e, t) {
                            if (t && null != t.originalSelect2Event) {
                                var n = t.originalSelect2Event;
                                if ("select" === n._type || "unselect" === n._type) return;
                            }
                            var i = this.getHighlightedResults();
                            if (!(i.length < 1)) {
                                var o = i.data("data");
                                (null != o.element && o.element.selected) || (null == o.element && o.selected) || this.trigger("select", { data: o });
                            }
                        }),
                        e
                    );
                }),
                t.define("select2/dropdown/closeOnSelect", [], function() {
                    function e() {}
                    return (
                        (e.prototype.bind = function(e, t, n) {
                            var i = this;
                            e.call(this, t, n),
                                t.on("select", function(e) {
                                    i._selectTriggered(e);
                                }),
                                t.on("unselect", function(e) {
                                    i._selectTriggered(e);
                                });
                        }),
                        (e.prototype._selectTriggered = function(e, t) {
                            var n = t.originalEvent;
                            (n && n.ctrlKey) || this.trigger("close", { originalEvent: n, originalSelect2Event: t });
                        }),
                        e
                    );
                }),
                t.define("select2/i18n/en", [], function() {
                    return {
                        errorLoading: function() {
                            return "The results could not be loaded.";
                        },
                        inputTooLong: function(e) {
                            var t = e.input.length - e.maximum,
                                n = "Please delete " + t + " character";
                            return 1 != t && (n += "s"), n;
                        },
                        inputTooShort: function(e) {
                            return "Please enter " + (e.minimum - e.input.length) + " or more characters";
                        },
                        loadingMore: function() {
                            return "Loading more results…";
                        },
                        maximumSelected: function(e) {
                            var t = "You can only select " + e.maximum + " item";
                            return 1 != e.maximum && (t += "s"), t;
                        },
                        noResults: function() {
                            return "No results found";
                        },
                        searching: function() {
                            return "Searching…";
                        },
                    };
                }),
                t.define(
                    "select2/defaults", [
                        "jquery",
                        "require",
                        "./results",
                        "./selection/single",
                        "./selection/multiple",
                        "./selection/placeholder",
                        "./selection/allowClear",
                        "./selection/search",
                        "./selection/eventRelay",
                        "./utils",
                        "./translation",
                        "./diacritics",
                        "./data/select",
                        "./data/array",
                        "./data/ajax",
                        "./data/tags",
                        "./data/tokenizer",
                        "./data/minimumInputLength",
                        "./data/maximumInputLength",
                        "./data/maximumSelectionLength",
                        "./dropdown",
                        "./dropdown/search",
                        "./dropdown/hidePlaceholder",
                        "./dropdown/infiniteScroll",
                        "./dropdown/attachBody",
                        "./dropdown/minimumResultsForSearch",
                        "./dropdown/selectOnClose",
                        "./dropdown/closeOnSelect",
                        "./i18n/en",
                    ],
                    function(e, t, n, i, o, r, s, a, l, c, u, d, p, h, f, g, m, v, y, w, _, $, b, x, A, C, S, O, E) {
                        function D() {
                            this.reset();
                        }
                        return (
                            (D.prototype.apply = function(d) {
                                if (null == (d = e.extend(!0, {}, this.defaults, d)).dataAdapter) {
                                    if (
                                        (null != d.ajax ? (d.dataAdapter = f) : null != d.data ? (d.dataAdapter = h) : (d.dataAdapter = p),
                                            d.minimumInputLength > 0 && (d.dataAdapter = c.Decorate(d.dataAdapter, v)),
                                            d.maximumInputLength > 0 && (d.dataAdapter = c.Decorate(d.dataAdapter, y)),
                                            d.maximumSelectionLength > 0 && (d.dataAdapter = c.Decorate(d.dataAdapter, w)),
                                            d.tags && (d.dataAdapter = c.Decorate(d.dataAdapter, g)),
                                            (null == d.tokenSeparators && null == d.tokenizer) || (d.dataAdapter = c.Decorate(d.dataAdapter, m)),
                                            null != d.query)
                                    ) {
                                        var E = t(d.amdBase + "compat/query");
                                        d.dataAdapter = c.Decorate(d.dataAdapter, E);
                                    }
                                    if (null != d.initSelection) {
                                        var D = t(d.amdBase + "compat/initSelection");
                                        d.dataAdapter = c.Decorate(d.dataAdapter, D);
                                    }
                                }
                                if (
                                    (null == d.resultsAdapter &&
                                        ((d.resultsAdapter = n),
                                            null != d.ajax && (d.resultsAdapter = c.Decorate(d.resultsAdapter, x)),
                                            null != d.placeholder && (d.resultsAdapter = c.Decorate(d.resultsAdapter, b)),
                                            d.selectOnClose && (d.resultsAdapter = c.Decorate(d.resultsAdapter, S))),
                                        null == d.dropdownAdapter)
                                ) {
                                    if (d.multiple) d.dropdownAdapter = _;
                                    else {
                                        var T = c.Decorate(_, $);
                                        d.dropdownAdapter = T;
                                    }
                                    if (
                                        (0 !== d.minimumResultsForSearch && (d.dropdownAdapter = c.Decorate(d.dropdownAdapter, C)),
                                            d.closeOnSelect && (d.dropdownAdapter = c.Decorate(d.dropdownAdapter, O)),
                                            null != d.dropdownCssClass || null != d.dropdownCss || null != d.adaptDropdownCssClass)
                                    ) {
                                        var q = t(d.amdBase + "compat/dropdownCss");
                                        d.dropdownAdapter = c.Decorate(d.dropdownAdapter, q);
                                    }
                                    d.dropdownAdapter = c.Decorate(d.dropdownAdapter, A);
                                }
                                if (null == d.selectionAdapter) {
                                    if (
                                        (d.multiple ? (d.selectionAdapter = o) : (d.selectionAdapter = i),
                                            null != d.placeholder && (d.selectionAdapter = c.Decorate(d.selectionAdapter, r)),
                                            d.allowClear && (d.selectionAdapter = c.Decorate(d.selectionAdapter, s)),
                                            d.multiple && (d.selectionAdapter = c.Decorate(d.selectionAdapter, a)),
                                            null != d.containerCssClass || null != d.containerCss || null != d.adaptContainerCssClass)
                                    ) {
                                        var j = t(d.amdBase + "compat/containerCss");
                                        d.selectionAdapter = c.Decorate(d.selectionAdapter, j);
                                    }
                                    d.selectionAdapter = c.Decorate(d.selectionAdapter, l);
                                }
                                if ("string" == typeof d.language)
                                    if (d.language.indexOf("-") > 0) {
                                        var L = d.language.split("-")[0];
                                        d.language = [d.language, L];
                                    } else d.language = [d.language];
                                if (e.isArray(d.language)) {
                                    var k = new u();
                                    d.language.push("en");
                                    for (var P = d.language, I = 0; I < P.length; I++) {
                                        var M = P[I],
                                            R = {};
                                        try {
                                            R = u.loadPath(M);
                                        } catch (e) {
                                            try {
                                                (M = this.defaults.amdLanguageBase + M), (R = u.loadPath(M));
                                            } catch (e) {
                                                d.debug && window.console && console.warn && console.warn('Select2: The language file for "' + M + '" could not be automatically loaded. A fallback will be used instead.');
                                                continue;
                                            }
                                        }
                                        k.extend(R);
                                    }
                                    d.translations = k;
                                } else {
                                    var z = u.loadPath(this.defaults.amdLanguageBase + "en"),
                                        H = new u(d.language);
                                    H.extend(z), (d.translations = H);
                                }
                                return d;
                            }),
                            (D.prototype.reset = function() {
                                function t(e) {
                                    return e.replace(/[^\u0000-\u007E]/g, function(e) {
                                        return d[e] || e;
                                    });
                                }
                                this.defaults = {
                                    amdBase: "./",
                                    amdLanguageBase: "./i18n/",
                                    closeOnSelect: !0,
                                    debug: !1,
                                    dropdownAutoWidth: !1,
                                    escapeMarkup: c.escapeMarkup,
                                    language: E,
                                    matcher: function n(i, o) {
                                        if ("" === e.trim(i.term)) return o;
                                        if (o.children && o.children.length > 0) {
                                            for (var r = e.extend(!0, {}, o), s = o.children.length - 1; s >= 0; s--) {
                                                null == n(i, o.children[s]) && r.children.splice(s, 1);
                                            }
                                            return r.children.length > 0 ? r : n(i, r);
                                        }
                                        var a = t(o.text).toUpperCase(),
                                            l = t(i.term).toUpperCase();
                                        return a.indexOf(l) > -1 ? o : null;
                                    },
                                    minimumInputLength: 0,
                                    maximumInputLength: 0,
                                    maximumSelectionLength: 0,
                                    minimumResultsForSearch: 0,
                                    selectOnClose: !1,
                                    sorter: function(e) {
                                        return e;
                                    },
                                    templateResult: function(e) {
                                        return e.text;
                                    },
                                    templateSelection: function(e) {
                                        return e.text;
                                    },
                                    theme: "default",
                                    width: "resolve",
                                };
                            }),
                            (D.prototype.set = function(t, n) {
                                var i = {};
                                i[e.camelCase(t)] = n;
                                var o = c._convertData(i);
                                e.extend(this.defaults, o);
                            }),
                            new D()
                        );
                    }
                ),
                t.define("select2/options", ["require", "jquery", "./defaults", "./utils"], function(e, t, n, i) {
                    function o(t, o) {
                        if (((this.options = t), null != o && this.fromElement(o), (this.options = n.apply(this.options)), o && o.is("input"))) {
                            var r = e(this.get("amdBase") + "compat/inputData");
                            this.options.dataAdapter = i.Decorate(this.options.dataAdapter, r);
                        }
                    }
                    return (
                        (o.prototype.fromElement = function(e) {
                            var n = ["select2"];
                            null == this.options.multiple && (this.options.multiple = e.prop("multiple")),
                                null == this.options.disabled && (this.options.disabled = e.prop("disabled")),
                                null == this.options.language && (e.prop("lang") ? (this.options.language = e.prop("lang").toLowerCase()) : e.closest("[lang]").prop("lang") && (this.options.language = e.closest("[lang]").prop("lang"))),
                                null == this.options.dir && (e.prop("dir") ? (this.options.dir = e.prop("dir")) : e.closest("[dir]").prop("dir") ? (this.options.dir = e.closest("[dir]").prop("dir")) : (this.options.dir = "ltr")),
                                e.prop("disabled", this.options.disabled),
                                e.prop("multiple", this.options.multiple),
                                e.data("select2Tags") &&
                                (this.options.debug &&
                                    window.console &&
                                    console.warn &&
                                    console.warn('Select2: The `data-select2-tags` attribute has been changed to use the `data-data` and `data-tags="true"` attributes and will be removed in future versions of Select2.'),
                                    e.data("data", e.data("select2Tags")),
                                    e.data("tags", !0)),
                                e.data("ajaxUrl") &&
                                (this.options.debug &&
                                    window.console &&
                                    console.warn &&
                                    console.warn("Select2: The `data-ajax-url` attribute has been changed to `data-ajax--url` and support for the old attribute will be removed in future versions of Select2."),
                                    e.attr("ajax--url", e.data("ajaxUrl")),
                                    e.data("ajax--url", e.data("ajaxUrl")));
                            var o = {};
                            o = t.fn.jquery && "1." == t.fn.jquery.substr(0, 2) && e[0].dataset ? t.extend(!0, {}, e[0].dataset, e.data()) : e.data();
                            var r = t.extend(!0, {}, o);
                            for (var s in (r = i._convertData(r))) t.inArray(s, n) > -1 || (t.isPlainObject(this.options[s]) ? t.extend(this.options[s], r[s]) : (this.options[s] = r[s]));
                            return this;
                        }),
                        (o.prototype.get = function(e) {
                            return this.options[e];
                        }),
                        (o.prototype.set = function(e, t) {
                            this.options[e] = t;
                        }),
                        o
                    );
                }),
                t.define("select2/core", ["jquery", "./options", "./utils", "./keys"], function(e, t, n, i) {
                    var o = function(e, n) {
                        null != e.data("select2") && e.data("select2").destroy(), (this.$element = e), (this.id = this._generateId(e)), (n = n || {}), (this.options = new t(n, e)), o.__super__.constructor.call(this);
                        var i = e.attr("tabindex") || 0;
                        e.data("old-tabindex", i), e.attr("tabindex", "-1");
                        var r = this.options.get("dataAdapter");
                        this.dataAdapter = new r(e, this.options);
                        var s = this.render();
                        this._placeContainer(s);
                        var a = this.options.get("selectionAdapter");
                        (this.selection = new a(e, this.options)), (this.$selection = this.selection.render()), this.selection.position(this.$selection, s);
                        var l = this.options.get("dropdownAdapter");
                        (this.dropdown = new l(e, this.options)), (this.$dropdown = this.dropdown.render()), this.dropdown.position(this.$dropdown, s);
                        var c = this.options.get("resultsAdapter");
                        (this.results = new c(e, this.options, this.dataAdapter)), (this.$results = this.results.render()), this.results.position(this.$results, this.$dropdown);
                        var u = this;
                        this._bindAdapters(),
                            this._registerDomEvents(),
                            this._registerDataEvents(),
                            this._registerSelectionEvents(),
                            this._registerDropdownEvents(),
                            this._registerResultsEvents(),
                            this._registerEvents(),
                            this.dataAdapter.current(function(e) {
                                u.trigger("selection:update", { data: e });
                            }),
                            e.addClass("select2-hidden-accessible"),
                            e.attr("aria-hidden", "true"),
                            this._syncAttributes(),
                            e.data("select2", this);
                    };
                    return (
                        n.Extend(o, n.Observable),
                        (o.prototype._generateId = function(e) {
                            return "select2-" + (null != e.attr("id") ? e.attr("id") : null != e.attr("name") ? e.attr("name") + "-" + n.generateChars(2) : n.generateChars(4)).replace(/(:|\.|\[|\]|,)/g, "");
                        }),
                        (o.prototype._placeContainer = function(e) {
                            e.insertAfter(this.$element);
                            var t = this._resolveWidth(this.$element, this.options.get("width"));
                            null != t && e.css("width", t);
                        }),
                        (o.prototype._resolveWidth = function(e, t) {
                            var n = /^width:(([-+]?([0-9]*\.)?[0-9]+)(px|em|ex|%|in|cm|mm|pt|pc))/i;
                            if ("resolve" == t) {
                                var i = this._resolveWidth(e, "style");
                                return null != i ? i : this._resolveWidth(e, "element");
                            }
                            if ("element" == t) {
                                var o = e.outerWidth(!1);
                                return o <= 0 ? "auto" : o + "px";
                            }
                            if ("style" == t) {
                                var r = e.attr("style");
                                if ("string" != typeof r) return null;
                                for (var s = r.split(";"), a = 0, l = s.length; a < l; a += 1) {
                                    var c = s[a].replace(/\s/g, "").match(n);
                                    if (null !== c && c.length >= 1) return c[1];
                                }
                                return null;
                            }
                            return t;
                        }),
                        (o.prototype._bindAdapters = function() {
                            this.dataAdapter.bind(this, this.$container), this.selection.bind(this, this.$container), this.dropdown.bind(this, this.$container), this.results.bind(this, this.$container);
                        }),
                        (o.prototype._registerDomEvents = function() {
                            var t = this;
                            this.$element.on("change.select2", function() {
                                    t.dataAdapter.current(function(e) {
                                        t.trigger("selection:update", { data: e });
                                    });
                                }),
                                this.$element.on("focus.select2", function(e) {
                                    t.trigger("focus", e);
                                }),
                                (this._syncA = n.bind(this._syncAttributes, this)),
                                (this._syncS = n.bind(this._syncSubtree, this)),
                                this.$element[0].attachEvent && this.$element[0].attachEvent("onpropertychange", this._syncA);
                            var i = window.MutationObserver || window.WebKitMutationObserver || window.MozMutationObserver;
                            null != i ?
                                ((this._observer = new i(function(n) {
                                        e.each(n, t._syncA), e.each(n, t._syncS);
                                    })),
                                    this._observer.observe(this.$element[0], { attributes: !0, childList: !0, subtree: !1 })) :
                                this.$element[0].addEventListener &&
                                (this.$element[0].addEventListener("DOMAttrModified", t._syncA, !1), this.$element[0].addEventListener("DOMNodeInserted", t._syncS, !1), this.$element[0].addEventListener("DOMNodeRemoved", t._syncS, !1));
                        }),
                        (o.prototype._registerDataEvents = function() {
                            var e = this;
                            this.dataAdapter.on("*", function(t, n) {
                                e.trigger(t, n);
                            });
                        }),
                        (o.prototype._registerSelectionEvents = function() {
                            var t = this,
                                n = ["toggle", "focus"];
                            this.selection.on("toggle", function() {
                                    t.toggleDropdown();
                                }),
                                this.selection.on("focus", function(e) {
                                    t.focus(e);
                                }),
                                this.selection.on("*", function(i, o) {
                                    -1 === e.inArray(i, n) && t.trigger(i, o);
                                });
                        }),
                        (o.prototype._registerDropdownEvents = function() {
                            var e = this;
                            this.dropdown.on("*", function(t, n) {
                                e.trigger(t, n);
                            });
                        }),
                        (o.prototype._registerResultsEvents = function() {
                            var e = this;
                            this.results.on("*", function(t, n) {
                                e.trigger(t, n);
                            });
                        }),
                        (o.prototype._registerEvents = function() {
                            var e = this;
                            this.on("open", function() {
                                    e.$container.addClass("select2-container--open");
                                }),
                                this.on("close", function() {
                                    e.$container.removeClass("select2-container--open");
                                }),
                                this.on("enable", function() {
                                    e.$container.removeClass("select2-container--disabled");
                                }),
                                this.on("disable", function() {
                                    e.$container.addClass("select2-container--disabled");
                                }),
                                this.on("blur", function() {
                                    e.$container.removeClass("select2-container--focus");
                                }),
                                this.on("query", function(t) {
                                    e.isOpen() || e.trigger("open", {}),
                                        this.dataAdapter.query(t, function(n) {
                                            e.trigger("results:all", { data: n, query: t });
                                        });
                                }),
                                this.on("query:append", function(t) {
                                    this.dataAdapter.query(t, function(n) {
                                        e.trigger("results:append", { data: n, query: t });
                                    });
                                }),
                                this.on("keypress", function(t) {
                                    var n = t.which;
                                    e.isOpen() ?
                                        n === i.ESC || n === i.TAB || (n === i.UP && t.altKey) ?
                                        (e.close(), t.preventDefault()) :
                                        n === i.ENTER ?
                                        (e.trigger("results:select", {}), t.preventDefault()) :
                                        n === i.SPACE && t.ctrlKey ?
                                        (e.trigger("results:toggle", {}), t.preventDefault()) :
                                        n === i.UP ?
                                        (e.trigger("results:previous", {}), t.preventDefault()) :
                                        n === i.DOWN && (e.trigger("results:next", {}), t.preventDefault()) :
                                        (n === i.ENTER || n === i.SPACE || (n === i.DOWN && t.altKey)) && (e.open(), t.preventDefault());
                                });
                        }),
                        (o.prototype._syncAttributes = function() {
                            this.options.set("disabled", this.$element.prop("disabled")), this.options.get("disabled") ? (this.isOpen() && this.close(), this.trigger("disable", {})) : this.trigger("enable", {});
                        }),
                        (o.prototype._syncSubtree = function(e, t) {
                            var n = !1,
                                i = this;
                            if (!e || !e.target || "OPTION" === e.target.nodeName || "OPTGROUP" === e.target.nodeName) {
                                if (t)
                                    if (t.addedNodes && t.addedNodes.length > 0)
                                        for (var o = 0; o < t.addedNodes.length; o++) {
                                            t.addedNodes[o].selected && (n = !0);
                                        }
                                    else t.removedNodes && t.removedNodes.length > 0 && (n = !0);
                                else n = !0;
                                n &&
                                    this.dataAdapter.current(function(e) {
                                        i.trigger("selection:update", { data: e });
                                    });
                            }
                        }),
                        (o.prototype.trigger = function(e, t) {
                            var n = o.__super__.trigger,
                                i = { open: "opening", close: "closing", select: "selecting", unselect: "unselecting" };
                            if ((void 0 === t && (t = {}), e in i)) {
                                var r = i[e],
                                    s = { prevented: !1, name: e, args: t };
                                if ((n.call(this, r, s), s.prevented)) return void(t.prevented = !0);
                            }
                            n.call(this, e, t);
                        }),
                        (o.prototype.toggleDropdown = function() {
                            this.options.get("disabled") || (this.isOpen() ? this.close() : this.open());
                        }),
                        (o.prototype.open = function() {
                            this.isOpen() || this.trigger("query", {});
                        }),
                        (o.prototype.close = function() {
                            this.isOpen() && this.trigger("close", {});
                        }),
                        (o.prototype.isOpen = function() {
                            return this.$container.hasClass("select2-container--open");
                        }),
                        (o.prototype.hasFocus = function() {
                            return this.$container.hasClass("select2-container--focus");
                        }),
                        (o.prototype.focus = function(e) {
                            this.hasFocus() || (this.$container.addClass("select2-container--focus"), this.trigger("focus", {}));
                        }),
                        (o.prototype.enable = function(e) {
                            this.options.get("debug") &&
                                window.console &&
                                console.warn &&
                                console.warn('Select2: The `select2("enable")` method has been deprecated and will be removed in later Select2 versions. Use $element.prop("disabled") instead.'),
                                (null != e && 0 !== e.length) || (e = [!0]);
                            var t = !e[0];
                            this.$element.prop("disabled", t);
                        }),
                        (o.prototype.data = function() {
                            this.options.get("debug") &&
                                arguments.length > 0 &&
                                window.console &&
                                console.warn &&
                                console.warn('Select2: Data can no longer be set using `select2("data")`. You should consider setting the value instead using `$element.val()`.');
                            var e = [];
                            return (
                                this.dataAdapter.current(function(t) {
                                    e = t;
                                }),
                                e
                            );
                        }),
                        (o.prototype.val = function(t) {
                            if (
                                (this.options.get("debug") &&
                                    window.console &&
                                    console.warn &&
                                    console.warn('Select2: The `select2("val")` method has been deprecated and will be removed in later Select2 versions. Use $element.val() instead.'),
                                    null == t || 0 === t.length)
                            )
                                return this.$element.val();
                            var n = t[0];
                            e.isArray(n) &&
                                (n = e.map(n, function(e) {
                                    return e.toString();
                                })),
                                this.$element.val(n).trigger("change");
                        }),
                        (o.prototype.destroy = function() {
                            this.$container.remove(),
                                this.$element[0].detachEvent && this.$element[0].detachEvent("onpropertychange", this._syncA),
                                null != this._observer ?
                                (this._observer.disconnect(), (this._observer = null)) :
                                this.$element[0].removeEventListener &&
                                (this.$element[0].removeEventListener("DOMAttrModified", this._syncA, !1),
                                    this.$element[0].removeEventListener("DOMNodeInserted", this._syncS, !1),
                                    this.$element[0].removeEventListener("DOMNodeRemoved", this._syncS, !1)),
                                (this._syncA = null),
                                (this._syncS = null),
                                this.$element.off(".select2"),
                                this.$element.attr("tabindex", this.$element.data("old-tabindex")),
                                this.$element.removeClass("select2-hidden-accessible"),
                                this.$element.attr("aria-hidden", "false"),
                                this.$element.removeData("select2"),
                                this.dataAdapter.destroy(),
                                this.selection.destroy(),
                                this.dropdown.destroy(),
                                this.results.destroy(),
                                (this.dataAdapter = null),
                                (this.selection = null),
                                (this.dropdown = null),
                                (this.results = null);
                        }),
                        (o.prototype.render = function() {
                            var t = e('<span class="select2 select2-container"><span class="selection"></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>');
                            return t.attr("dir", this.options.get("dir")), (this.$container = t), this.$container.addClass("select2-container--" + this.options.get("theme")), t.data("element", this.$element), t;
                        }),
                        o
                    );
                }),
                t.define("select2/compat/utils", ["jquery"], function(e) {
                    return {
                        syncCssClasses: function(t, n, i) {
                            var o,
                                r,
                                s = [];
                            (o = e.trim(t.attr("class"))) &&
                            e((o = "" + o).split(/\s+/)).each(function() {
                                    0 === this.indexOf("select2-") && s.push(this);
                                }),
                                (o = e.trim(n.attr("class"))) &&
                                e((o = "" + o).split(/\s+/)).each(function() {
                                    0 !== this.indexOf("select2-") && null != (r = i(this)) && s.push(r);
                                }),
                                t.attr("class", s.join(" "));
                        },
                    };
                }),
                t.define("select2/compat/containerCss", ["jquery", "./utils"], function(e, t) {
                    function n(e) {
                        return null;
                    }

                    function i() {}
                    return (
                        (i.prototype.render = function(i) {
                            var o = i.call(this),
                                r = this.options.get("containerCssClass") || "";
                            e.isFunction(r) && (r = r(this.$element));
                            var s = this.options.get("adaptContainerCssClass");
                            if (((s = s || n), -1 !== r.indexOf(":all:"))) {
                                r = r.replace(":all:", "");
                                var a = s;
                                s = function(e) {
                                    var t = a(e);
                                    return null != t ? t + " " + e : e;
                                };
                            }
                            var l = this.options.get("containerCss") || {};
                            return e.isFunction(l) && (l = l(this.$element)), t.syncCssClasses(o, this.$element, s), o.css(l), o.addClass(r), o;
                        }),
                        i
                    );
                }),
                t.define("select2/compat/dropdownCss", ["jquery", "./utils"], function(e, t) {
                    function n(e) {
                        return null;
                    }

                    function i() {}
                    return (
                        (i.prototype.render = function(i) {
                            var o = i.call(this),
                                r = this.options.get("dropdownCssClass") || "";
                            e.isFunction(r) && (r = r(this.$element));
                            var s = this.options.get("adaptDropdownCssClass");
                            if (((s = s || n), -1 !== r.indexOf(":all:"))) {
                                r = r.replace(":all:", "");
                                var a = s;
                                s = function(e) {
                                    var t = a(e);
                                    return null != t ? t + " " + e : e;
                                };
                            }
                            var l = this.options.get("dropdownCss") || {};
                            return e.isFunction(l) && (l = l(this.$element)), t.syncCssClasses(o, this.$element, s), o.css(l), o.addClass(r), o;
                        }),
                        i
                    );
                }),
                t.define("select2/compat/initSelection", ["jquery"], function(e) {
                    function t(e, t, n) {
                        n.get("debug") &&
                            window.console &&
                            console.warn &&
                            console.warn(
                                "Select2: The `initSelection` option has been deprecated in favor of a custom data adapter that overrides the `current` method. This method is now called multiple times instead of a single time when the instance is initialized. Support will be removed for the `initSelection` option in future versions of Select2"
                            ),
                            (this.initSelection = n.get("initSelection")),
                            (this._isInitialized = !1),
                            e.call(this, t, n);
                    }
                    return (
                        (t.prototype.current = function(t, n) {
                            var i = this;
                            this._isInitialized ?
                                t.call(this, n) :
                                this.initSelection.call(null, this.$element, function(t) {
                                    (i._isInitialized = !0), e.isArray(t) || (t = [t]), n(t);
                                });
                        }),
                        t
                    );
                }),
                t.define("select2/compat/inputData", ["jquery"], function(e) {
                    function t(e, t, n) {
                        (this._currentData = []),
                        (this._valueSeparator = n.get("valueSeparator") || ","),
                        "hidden" === t.prop("type") &&
                            n.get("debug") &&
                            console &&
                            console.warn &&
                            console.warn("Select2: Using a hidden input with Select2 is no longer supported and may stop working in the future. It is recommended to use a `<select>` element instead."),
                            e.call(this, t, n);
                    }
                    return (
                        (t.prototype.current = function(t, n) {
                            function i(t, n) {
                                var o = [];
                                return t.selected || -1 !== e.inArray(t.id, n) ? ((t.selected = !0), o.push(t)) : (t.selected = !1), t.children && o.push.apply(o, i(t.children, n)), o;
                            }
                            for (var o = [], r = 0; r < this._currentData.length; r++) {
                                var s = this._currentData[r];
                                o.push.apply(o, i(s, this.$element.val().split(this._valueSeparator)));
                            }
                            n(o);
                        }),
                        (t.prototype.select = function(t, n) {
                            if (this.options.get("multiple")) {
                                var i = this.$element.val();
                                (i += this._valueSeparator + n.id), this.$element.val(i), this.$element.trigger("change");
                            } else
                                this.current(function(t) {
                                    e.map(t, function(e) {
                                        e.selected = !1;
                                    });
                                }),
                                this.$element.val(n.id),
                                this.$element.trigger("change");
                        }),
                        (t.prototype.unselect = function(e, t) {
                            var n = this;
                            (t.selected = !1),
                            this.current(function(e) {
                                for (var i = [], o = 0; o < e.length; o++) {
                                    var r = e[o];
                                    t.id != r.id && i.push(r.id);
                                }
                                n.$element.val(i.join(n._valueSeparator)), n.$element.trigger("change");
                            });
                        }),
                        (t.prototype.query = function(e, t, n) {
                            for (var i = [], o = 0; o < this._currentData.length; o++) {
                                var r = this._currentData[o],
                                    s = this.matches(t, r);
                                null !== s && i.push(s);
                            }
                            n({ results: i });
                        }),
                        (t.prototype.addOptions = function(t, n) {
                            var i = e.map(n, function(t) {
                                return e.data(t[0], "data");
                            });
                            this._currentData.push.apply(this._currentData, i);
                        }),
                        t
                    );
                }),
                t.define("select2/compat/matcher", ["jquery"], function(e) {
                    return function(t) {
                        return function(n, i) {
                            var o = e.extend(!0, {}, i);
                            if (null == n.term || "" === e.trim(n.term)) return o;
                            if (i.children) {
                                for (var r = i.children.length - 1; r >= 0; r--) {
                                    var s = i.children[r];
                                    t(n.term, s.text, s) || o.children.splice(r, 1);
                                }
                                if (o.children.length > 0) return o;
                            }
                            return t(n.term, i.text, i) ? o : null;
                        };
                    };
                }),
                t.define("select2/compat/query", [], function() {
                    function e(e, t, n) {
                        n.get("debug") &&
                            window.console &&
                            console.warn &&
                            console.warn("Select2: The `query` option has been deprecated in favor of a custom data adapter that overrides the `query` method. Support will be removed for the `query` option in future versions of Select2."),
                            e.call(this, t, n);
                    }
                    return (
                        (e.prototype.query = function(e, t, n) {
                            (t.callback = n), this.options.get("query").call(null, t);
                        }),
                        e
                    );
                }),
                t.define("select2/dropdown/attachContainer", [], function() {
                    function e(e, t, n) {
                        e.call(this, t, n);
                    }
                    return (
                        (e.prototype.position = function(e, t, n) {
                            n.find(".dropdown-wrapper").append(t), t.addClass("select2-dropdown--below"), n.addClass("select2-container--below");
                        }),
                        e
                    );
                }),
                t.define("select2/dropdown/stopPropagation", [], function() {
                    function e() {}
                    return (
                        (e.prototype.bind = function(e, t, n) {
                            e.call(this, t, n);
                            this.$dropdown.on(
                                [
                                    "blur",
                                    "change",
                                    "click",
                                    "dblclick",
                                    "focus",
                                    "focusin",
                                    "focusout",
                                    "input",
                                    "keydown",
                                    "keyup",
                                    "keypress",
                                    "mousedown",
                                    "mouseenter",
                                    "mouseleave",
                                    "mousemove",
                                    "mouseover",
                                    "mouseup",
                                    "search",
                                    "touchend",
                                    "touchstart",
                                ].join(" "),
                                function(e) {
                                    e.stopPropagation();
                                }
                            );
                        }),
                        e
                    );
                }),
                t.define("select2/selection/stopPropagation", [], function() {
                    function e() {}
                    return (
                        (e.prototype.bind = function(e, t, n) {
                            e.call(this, t, n);
                            this.$selection.on(
                                [
                                    "blur",
                                    "change",
                                    "click",
                                    "dblclick",
                                    "focus",
                                    "focusin",
                                    "focusout",
                                    "input",
                                    "keydown",
                                    "keyup",
                                    "keypress",
                                    "mousedown",
                                    "mouseenter",
                                    "mouseleave",
                                    "mousemove",
                                    "mouseover",
                                    "mouseup",
                                    "search",
                                    "touchend",
                                    "touchstart",
                                ].join(" "),
                                function(e) {
                                    e.stopPropagation();
                                }
                            );
                        }),
                        e
                    );
                }),
                /*!
                 * jQuery Mousewheel 3.1.13
                 *
                 * Copyright jQuery Foundation and other contributors
                 * Released under the MIT license
                 * http://jquery.org/license
                 */
                (n = function(e) {
                    var t,
                        n,
                        i = ["wheel", "mousewheel", "DOMMouseScroll", "MozMousePixelScroll"],
                        o = "onwheel" in document || document.documentMode >= 9 ? ["wheel"] : ["mousewheel", "DomMouseScroll", "MozMousePixelScroll"],
                        r = Array.prototype.slice;
                    if (e.event.fixHooks)
                        for (var s = i.length; s;) e.event.fixHooks[i[--s]] = e.event.mouseHooks;
                    var a = (e.event.special.mousewheel = {
                        version: "3.1.12",
                        setup: function() {
                            if (this.addEventListener)
                                for (var t = o.length; t;) this.addEventListener(o[--t], l, !1);
                            else this.onmousewheel = l;
                            e.data(this, "mousewheel-line-height", a.getLineHeight(this)), e.data(this, "mousewheel-page-height", a.getPageHeight(this));
                        },
                        teardown: function() {
                            if (this.removeEventListener)
                                for (var t = o.length; t;) this.removeEventListener(o[--t], l, !1);
                            else this.onmousewheel = null;
                            e.removeData(this, "mousewheel-line-height"), e.removeData(this, "mousewheel-page-height");
                        },
                        getLineHeight: function(t) {
                            var n = e(t),
                                i = n["offsetParent" in e.fn ? "offsetParent" : "parent"]();
                            return i.length || (i = e("body")), parseInt(i.css("fontSize"), 10) || parseInt(n.css("fontSize"), 10) || 16;
                        },
                        getPageHeight: function(t) {
                            return e(t).height();
                        },
                        settings: { adjustOldDeltas: !0, normalizeOffset: !0 },
                    });

                    function l(i) {
                        var o = i || window.event,
                            s = r.call(arguments, 1),
                            l = 0,
                            d = 0,
                            p = 0,
                            h = 0,
                            f = 0,
                            g = 0;
                        if (
                            (((i = e.event.fix(o)).type = "mousewheel"),
                                "detail" in o && (p = -1 * o.detail),
                                "wheelDelta" in o && (p = o.wheelDelta),
                                "wheelDeltaY" in o && (p = o.wheelDeltaY),
                                "wheelDeltaX" in o && (d = -1 * o.wheelDeltaX),
                                "axis" in o && o.axis === o.HORIZONTAL_AXIS && ((d = -1 * p), (p = 0)),
                                (l = 0 === p ? d : p),
                                "deltaY" in o && (l = p = -1 * o.deltaY),
                                "deltaX" in o && ((d = o.deltaX), 0 === p && (l = -1 * d)),
                                0 !== p || 0 !== d)
                        ) {
                            if (1 === o.deltaMode) {
                                var m = e.data(this, "mousewheel-line-height");
                                (l *= m), (p *= m), (d *= m);
                            } else if (2 === o.deltaMode) {
                                var v = e.data(this, "mousewheel-page-height");
                                (l *= v), (p *= v), (d *= v);
                            }
                            if (
                                ((h = Math.max(Math.abs(p), Math.abs(d))),
                                    (!n || h < n) && ((n = h), u(o, h) && (n /= 40)),
                                    u(o, h) && ((l /= 40), (d /= 40), (p /= 40)),
                                    (l = Math[l >= 1 ? "floor" : "ceil"](l / n)),
                                    (d = Math[d >= 1 ? "floor" : "ceil"](d / n)),
                                    (p = Math[p >= 1 ? "floor" : "ceil"](p / n)),
                                    a.settings.normalizeOffset && this.getBoundingClientRect)
                            ) {
                                var y = this.getBoundingClientRect();
                                (f = i.clientX - y.left), (g = i.clientY - y.top);
                            }
                            return (
                                (i.deltaX = d),
                                (i.deltaY = p),
                                (i.deltaFactor = n),
                                (i.offsetX = f),
                                (i.offsetY = g),
                                (i.deltaMode = 0),
                                s.unshift(i, l, d, p),
                                t && clearTimeout(t),
                                (t = setTimeout(c, 200)),
                                (e.event.dispatch || e.event.handle).apply(this, s)
                            );
                        }
                    }

                    function c() {
                        n = null;
                    }

                    function u(e, t) {
                        return a.settings.adjustOldDeltas && "mousewheel" === e.type && t % 120 == 0;
                    }
                    e.fn.extend({
                        mousewheel: function(e) {
                            return e ? this.bind("mousewheel", e) : this.trigger("mousewheel");
                        },
                        unmousewheel: function(e) {
                            return this.unbind("mousewheel", e);
                        },
                    });
                }),
                "function" == typeof t.define && t.define.amd ? t.define("jquery-mousewheel", ["jquery"], n) : "object" == typeof exports ? (module.exports = n) : n(e),
                t.define("jquery.select2", ["jquery", "jquery-mousewheel", "./select2/core", "./select2/defaults"], function(e, t, n, i) {
                    if (null == e.fn.select2) {
                        var o = ["open", "close", "destroy"];
                        e.fn.select2 = function(t) {
                            if ("object" == typeof(t = t || {}))
                                return (
                                    this.each(function() {
                                        var i = e.extend(!0, {}, t);
                                        new n(e(this), i);
                                    }),
                                    this
                                );
                            if ("string" == typeof t) {
                                var i,
                                    r = Array.prototype.slice.call(arguments, 1);
                                return (
                                    this.each(function() {
                                        var n = e(this).data("select2");
                                        null == n && window.console && console.error && console.error("The select2('" + t + "') method was called on an element that is not using Select2."), (i = n[t].apply(n, r));
                                    }),
                                    e.inArray(t, o) > -1 ? this : i
                                );
                            }
                            throw new Error("Invalid arguments for Select2: " + t);
                        };
                    }
                    return null == e.fn.select2.defaults && (e.fn.select2.defaults = i), n;
                }), { define: t.define, require: t.require }
            );
        })(),
        n = t.require("jquery.select2");
    return (e.fn.select2.amd = t), n;
});