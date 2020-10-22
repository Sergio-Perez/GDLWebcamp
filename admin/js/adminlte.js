! function(t, e) {
    "object" == typeof exports && "undefined" != typeof module ? e(exports) : "function" == typeof define && define.amd ? define(["exports"], e) : e((t = t || self).adminlte = {})
}(this, function(t) {
    "use strict";
    var o, e, s, i, n, a, r, l, c, d, h, f, u, g, p, _, m, C, y, v, b, w, x, E, A, D, I, S, R, T, L, j, Q, O, H, z, M, k, P, N, q, V, F, X, Y, B, Z, U, W, K, G, J, $, tt, et, it, nt, st, ot, at, rt, lt, ct, dt, ht, ft, ut, gt, pt, _t, mt, Ct, yt, vt, bt, wt, xt, Et, At, Dt, It, St, Rt, Tt, Lt, jt, Qt, Ot, Ht, zt, Mt, kt, Pt, Nt, qt, Vt, Ft, Xt, Yt, Bt, Zt, Ut, Wt, Kt, Gt, Jt, $t, te, ee, ie, ne, se, oe, ae, re, le, ce, de, he, fe, ue, ge, pe, _e, me, Ce, ye, ve, be, we, xe, Ee, Ae, De, Ie, Se, Re, Te, Le, je, Qe, Oe, He, ze, Me, ke, Pe, Ne, qe = (o = jQuery, e = "ControlSidebar", i = "." + (s = "lte.controlsidebar"), n = o.fn[e], a = {
            COLLAPSED: "collapsed" + i,
            EXPANDED: "expanded" + i
        }, r = ".control-sidebar", l = ".control-sidebar-content", c = '[data-widget="control-sidebar"]', d = ".main-header", h = ".main-footer", f = "control-sidebar-animate", u = "control-sidebar-open", g = "control-sidebar-slide-open", p = "layout-fixed", _ = "layout-navbar-fixed", m = "layout-sm-navbar-fixed", C = "layout-md-navbar-fixed", y = "layout-lg-navbar-fixed", v = "layout-xl-navbar-fixed", b = "layout-footer-fixed", w = "layout-sm-footer-fixed", x = "layout-md-footer-fixed", E = "layout-lg-footer-fixed", A = "layout-xl-footer-fixed", D = {
            controlsidebarSlide: !0,
            scrollbarTheme: "os-theme-light",
            scrollbarAutoHide: "l"
        }, I = function() {
            function n(t, e) {
                this._element = t, this._config = e, this._init()
            }
            var t = n.prototype;
            return t.collapse = function() {
                this._config.controlsidebarSlide ? (o("html").addClass(f), o("body").removeClass(g).delay(300).queue(function() {
                    o(r).hide(), o("html").removeClass(f), o(this).dequeue()
                })) : o("body").removeClass(u);
                var t = o.Event(a.COLLAPSED);
                o(this._element).trigger(t)
            }, t.show = function() {
                this._config.controlsidebarSlide ? (o("html").addClass(f), o(r).show().delay(10).queue(function() {
                    o("body").addClass(g).delay(300).queue(function() {
                        o("html").removeClass(f), o(this).dequeue()
                    }), o(this).dequeue()
                })) : o("body").addClass(u);
                var t = o.Event(a.EXPANDED);
                o(this._element).trigger(t)
            }, t.toggle = function() {
                o("body").hasClass(u) || o("body").hasClass(g) ? this.collapse() : this.show()
            }, t._init = function() {
                var t = this;
                this._fixHeight(), this._fixScrollHeight(), o(window).resize(function() {
                    t._fixHeight(), t._fixScrollHeight()
                }), o(window).scroll(function() {
                    (o("body").hasClass(u) || o("body").hasClass(g)) && t._fixScrollHeight()
                })
            }, t._fixScrollHeight = function() {
                var t = {
                        scroll: o(document).height(),
                        window: o(window).height(),
                        header: o(d).outerHeight(),
                        footer: o(h).outerHeight()
                    },
                    e = Math.abs(t.window + o(window).scrollTop() - t.scroll),
                    i = o(window).scrollTop(),
                    n = !1,
                    s = !1;
                o("body").hasClass(p) && ((o("body").hasClass(_) || o("body").hasClass(m) || o("body").hasClass(C) || o("body").hasClass(y) || o("body").hasClass(v)) && "fixed" === o(d).css("position") && (n = !0), (o("body").hasClass(b) || o("body").hasClass(w) || o("body").hasClass(x) || o("body").hasClass(E) || o("body").hasClass(A)) && "fixed" === o(h).css("position") && (s = !0), 0 === i && 0 === e ? (o(r).css("bottom", t.footer), o(r).css("top", t.header), o(r + ", " + r + " " + l).css("height", t.window - (t.header + t.footer))) : e <= t.footer ? !1 === s ? (o(r).css("bottom", t.footer - e), o(r + ", " + r + " " + l).css("height", t.window - (t.footer - e))) : o(r).css("bottom", t.footer) : i <= t.header ? !1 === n ? (o(r).css("top", t.header - i), o(r + ", " + r + " " + l).css("height", t.window - (t.header - i))) : o(r).css("top", t.header) : !1 === n ? (o(r).css("top", 0), o(r + ", " + r + " " + l).css("height", t.window)) : o(r).css("top", t.header))
            }, t._fixHeight = function() {
                var t, e = o(window).height(),
                    i = o(d).outerHeight(),
                    n = o(h).outerHeight();
                o("body").hasClass(p) && (t = e - i, (o("body").hasClass(b) || o("body").hasClass(w) || o("body").hasClass(x) || o("body").hasClass(E) || o("body").hasClass(A)) && "fixed" === o(h).css("position") && (t = e - i - n), o(r + " " + l).css("height", t), void 0 !== o.fn.overlayScrollbars && o(r + " " + l).overlayScrollbars({
                    className: this._config.scrollbarTheme,
                    sizeAutoCapable: !0,
                    scrollbars: {
                        autoHide: this._config.scrollbarAutoHide,
                        clickScrolling: !0
                    }
                }))
            }, n._jQueryInterface = function(i) {
                return this.each(function() {
                    var t = o(this).data(s),
                        e = o.extend({}, D, o(this).data());
                    if (t || (t = new n(this, e), o(this).data(s, t)), "undefined" === t[i]) throw new Error(i + " is not a function");
                    t[i]()
                })
            }, n
        }(), o(document).on("click", c, function(t) {
            t.preventDefault(), I._jQueryInterface.call(o(this), "toggle")
        }), o.fn[e] = I._jQueryInterface, o.fn[e].Constructor = I, o.fn[e].noConflict = function() {
            return o.fn[e] = n, I._jQueryInterface
        }, I),
        Ve = (S = jQuery, R = "Layout", T = "lte.layout", L = S.fn[R], j = ".main-header", Q = ".main-sidebar", O = ".main-sidebar .sidebar", H = ".content-wrapper", z = ".control-sidebar-content", M = '[data-widget="control-sidebar"]', k = ".main-footer", P = '[data-widget="pushmenu"]', N = ".login-box", q = ".register-box", V = "sidebar-focused", F = "layout-fixed", X = "control-sidebar-slide-open", Y = "control-sidebar-open", B = {
            scrollbarTheme: "os-theme-light",
            scrollbarAutoHide: "l",
            panelAutoHeight: !0,
            loginRegisterAutoHeight: !0
        }, Z = function() {
            function n(t, e) {
                this._config = e, this._element = t, this._init()
            }
            var t = n.prototype;
            return t.fixLayoutHeight = function(t) {
                void 0 === t && (t = null);
                var e = 0;
                (S("body").hasClass(X) || S("body").hasClass(Y) || "control_sidebar" == t) && (e = S(z).height());
                var i = {
                        window: S(window).height(),
                        header: 0 !== S(j).length ? S(j).outerHeight() : 0,
                        footer: 0 !== S(k).length ? S(k).outerHeight() : 0,
                        sidebar: 0 !== S(O).length ? S(O).height() : 0,
                        control_sidebar: e
                    },
                    n = this._max(i),
                    s = this._config.panelAutoHeight;
                !0 === s && (s = 0), !1 !== s && (n == i.control_sidebar ? S(H).css("min-height", n + s) : n == i.window ? S(H).css("min-height", n + s - i.header - i.footer) : S(H).css("min-height", n + s - i.header), this._isFooterFixed() && S(H).css("min-height", parseFloat(S(H).css("min-height")) + i.footer)), S("body").hasClass(F) && (!1 !== s && S(H).css("min-height", n + s - i.header - i.footer), void 0 !== S.fn.overlayScrollbars && S(O).overlayScrollbars({
                    className: this._config.scrollbarTheme,
                    sizeAutoCapable: !0,
                    scrollbars: {
                        autoHide: this._config.scrollbarAutoHide,
                        clickScrolling: !0
                    }
                }))
            }, t.fixLoginRegisterHeight = function() {
                var t;
                0 === S(N + ", " + q).length ? S("body, html").css("height", "auto") : 0 !== S(N + ", " + q).length && (t = S(N + ", " + q).height(), S("body").css("min-height") !== t && S("body").css("min-height", t))
            }, t._init = function() {
                var t = this;
                this.fixLayoutHeight(), !0 === this._config.loginRegisterAutoHeight ? this.fixLoginRegisterHeight() : Number.isInteger(this._config.loginRegisterAutoHeight) && setInterval(this.fixLoginRegisterHeight, this._config.loginRegisterAutoHeight), S(O).on("collapsed.lte.treeview expanded.lte.treeview", function() {
                    t.fixLayoutHeight()
                }), S(P).on("collapsed.lte.pushmenu shown.lte.pushmenu", function() {
                    t.fixLayoutHeight()
                }), S(M).on("collapsed.lte.controlsidebar", function() {
                    t.fixLayoutHeight()
                }).on("expanded.lte.controlsidebar", function() {
                    t.fixLayoutHeight("control_sidebar")
                }), S(window).resize(function() {
                    t.fixLayoutHeight()
                }), setTimeout(function() {
                    S("body.hold-transition").removeClass("hold-transition")
                }, 50)
            }, t._max = function(e) {
                var i = 0;
                return Object.keys(e).forEach(function(t) {
                    e[t] > i && (i = e[t])
                }), i
            }, t._isFooterFixed = function() {
                return "fixed" === S(".main-footer").css("position")
            }, n._jQueryInterface = function(i) {
                return void 0 === i && (i = ""), this.each(function() {
                    var t = S(this).data(T),
                        e = S.extend({}, B, S(this).data());
                    t || (t = new n(S(this), e), S(this).data(T, t)), "init" === i || "" === i ? t._init() : "fixLayoutHeight" !== i && "fixLoginRegisterHeight" !== i || t[i]()
                })
            }, n
        }(), S(window).on("load", function() {
            Z._jQueryInterface.call(S("body"))
        }), S(O + " a").on("focusin", function() {
            S(Q).addClass(V)
        }), S(O + " a").on("focusout", function() {
            S(Q).removeClass(V)
        }), S.fn[R] = Z._jQueryInterface, S.fn[R].Constructor = Z, S.fn[R].noConflict = function() {
            return S.fn[R] = L, Z._jQueryInterface
        }, Z),
        Fe = (U = jQuery, W = "PushMenu", G = "." + (K = "lte.pushmenu"), J = U.fn[W], tt = {
            autoCollapseSize: 992,
            enableRemember: !($ = {
                COLLAPSED: "collapsed" + G,
                SHOWN: "shown" + G
            }),
            noTransitionAfterReload: !0
        }, et = '[data-widget="pushmenu"]', it = "body", nt = "#sidebar-overlay", st = ".wrapper", ot = "sidebar-collapse", at = "sidebar-open", rt = "sidebar-closed", lt = function() {
            function n(t, e) {
                this._element = t, this._options = U.extend({}, tt, e), U(nt).length || this._addOverlay(), this._init()
            }
            var t = n.prototype;
            return t.expand = function() {
                this._options.autoCollapseSize && U(window).width() <= this._options.autoCollapseSize && U(it).addClass(at), U(it).removeClass(ot).removeClass(rt), this._options.enableRemember && localStorage.setItem("remember" + G, at);
                var t = U.Event($.SHOWN);
                U(this._element).trigger(t)
            }, t.collapse = function() {
                this._options.autoCollapseSize && U(window).width() <= this._options.autoCollapseSize && U(it).removeClass(at).addClass(rt), U(it).addClass(ot), this._options.enableRemember && localStorage.setItem("remember" + G, ot);
                var t = U.Event($.COLLAPSED);
                U(this._element).trigger(t)
            }, t.toggle = function() {
                U(it).hasClass(ot) ? this.expand() : this.collapse()
            }, t.autoCollapse = function(t) {
                void 0 === t && (t = !1), this._options.autoCollapseSize && (U(window).width() <= this._options.autoCollapseSize ? U(it).hasClass(at) || this.collapse() : 1 == t && (U(it).hasClass(at) ? U(it).removeClass(at) : U(it).hasClass(rt) && this.expand()))
            }, t.remember = function() {
                this._options.enableRemember && (localStorage.getItem("remember" + G) == ot ? this._options.noTransitionAfterReload ? U("body").addClass("hold-transition").addClass(ot).delay(50).queue(function() {
                    U(this).removeClass("hold-transition"), U(this).dequeue()
                }) : U("body").addClass(ot) : this._options.noTransitionAfterReload ? U("body").addClass("hold-transition").removeClass(ot).delay(50).queue(function() {
                    U(this).removeClass("hold-transition"), U(this).dequeue()
                }) : U("body").removeClass(ot))
            }, t._init = function() {
                var t = this;
                this.remember(), this.autoCollapse(), U(window).resize(function() {
                    t.autoCollapse(!0)
                })
            }, t._addOverlay = function() {
                var t = this,
                    e = U("<div />", {
                        id: "sidebar-overlay"
                    });
                e.on("click", function() {
                    t.collapse()
                }), U(st).append(e)
            }, n._jQueryInterface = function(i) {
                return this.each(function() {
                    var t = U(this).data(K),
                        e = U.extend({}, tt, U(this).data());
                    t || (t = new n(this, e), U(this).data(K, t)), "string" == typeof i && i.match(/collapse|expand|toggle/) && t[i]()
                })
            }, n
        }(), U(document).on("click", et, function(t) {
            t.preventDefault();
            var e = t.currentTarget;
            "pushmenu" !== U(e).data("widget") && (e = U(e).closest(et)), lt._jQueryInterface.call(U(e), "toggle")
        }), U(window).on("load", function() {
            lt._jQueryInterface.call(U(et))
        }), U.fn[W] = lt._jQueryInterface, U.fn[W].Constructor = lt, U.fn[W].noConflict = function() {
            return U.fn[W] = J, lt._jQueryInterface
        }, lt),
        Xe = (ct = jQuery, dt = "Treeview", ft = "." + (ht = "lte.treeview"), ut = ct.fn[dt], gt = {
            SELECTED: "selected" + ft,
            EXPANDED: "expanded" + ft,
            COLLAPSED: "collapsed" + ft,
            LOAD_DATA_API: "load" + ft
        }, pt = ".nav-item", _t = ".nav-treeview", mt = ".menu-open", yt = "menu-open", bt = {
            trigger: (Ct = '[data-widget="treeview"]') + " " + ".nav-link",
            animationSpeed: 300,
            accordion: !0,
            expandSidebar: !(vt = "sidebar-collapse"),
            sidebarButtonSelector: '[data-widget="pushmenu"]'
        }, wt = function() {
            function n(t, e) {
                this._config = e, this._element = t
            }
            var t = n.prototype;
            return t.init = function() {
                this._setupListeners()
            }, t.expand = function(t, e) {
                var i, n, s = this,
                    o = ct.Event(gt.EXPANDED);
                this._config.accordion && (n = (i = e.siblings(mt).first()).find(_t).first(), this.collapse(n, i)), t.stop().slideDown(this._config.animationSpeed, function() {
                    e.addClass(yt), ct(s._element).trigger(o)
                }), this._config.expandSidebar && this._expandSidebar()
            }, t.collapse = function(t, e) {
                var i = this,
                    n = ct.Event(gt.COLLAPSED);
                t.stop().slideUp(this._config.animationSpeed, function() {
                    e.removeClass(yt), ct(i._element).trigger(n), t.find(mt + " > " + _t).slideUp(), t.find(mt).removeClass(yt)
                })
            }, t.toggle = function(t) {
                var e, i = ct(t.currentTarget),
                    n = i.parent(),
                    s = n.find("> " + _t);
                (s.is(_t) || (n.is(pt) || (s = n.parent().find("> " + _t)), s.is(_t))) && (t.preventDefault(), (e = i.parents(pt).first()).hasClass(yt) ? this.collapse(ct(s), e) : this.expand(ct(s), e))
            }, t._setupListeners = function() {
                var e = this;
                ct(document).on("click", this._config.trigger, function(t) {
                    e.toggle(t)
                })
            }, t._expandSidebar = function() {
                ct("body").hasClass(vt) && ct(this._config.sidebarButtonSelector).PushMenu("expand")
            }, n._jQueryInterface = function(i) {
                return this.each(function() {
                    var t = ct(this).data(ht),
                        e = ct.extend({}, bt, ct(this).data());
                    t || (t = new n(ct(this), e), ct(this).data(ht, t)), "init" === i && t[i]()
                })
            }, n
        }(), ct(window).on(gt.LOAD_DATA_API, function() {
            ct(Ct).each(function() {
                wt._jQueryInterface.call(ct(this), "init")
            })
        }), ct.fn[dt] = wt._jQueryInterface, ct.fn[dt].Constructor = wt, ct.fn[dt].noConflict = function() {
            return ct.fn[dt] = ut, wt._jQueryInterface
        }, wt),
        Ye = (xt = jQuery, Et = "DirectChat", At = "lte.directchat", Dt = xt.fn[Et], It = "toggled{EVENT_KEY}", St = '[data-widget="chat-pane-toggle"]', Rt = ".direct-chat", Tt = "direct-chat-contacts-open", Lt = function() {
            function i(t, e) {
                this._element = t
            }
            return i.prototype.toggle = function() {
                xt(this._element).parents(Rt).first().toggleClass(Tt);
                var t = xt.Event(It);
                xt(this._element).trigger(t)
            }, i._jQueryInterface = function(e) {
                return this.each(function() {
                    var t = xt(this).data(At);
                    t || (t = new i(xt(this)), xt(this).data(At, t)), t[e]()
                })
            }, i
        }(), xt(document).on("click", St, function(t) {
            t && t.preventDefault(), Lt._jQueryInterface.call(xt(this), "toggle")
        }), xt.fn[Et] = Lt._jQueryInterface, xt.fn[Et].Constructor = Lt, xt.fn[Et].noConflict = function() {
            return xt.fn[Et] = Dt, Lt._jQueryInterface
        }, Lt),
        Be = (jt = jQuery, Qt = "TodoList", Ot = "lte.todolist", Ht = jt.fn[Qt], zt = '[data-widget="todo-list"]', Mt = "done", kt = {
            onCheck: function(t) {
                return t
            },
            onUnCheck: function(t) {
                return t
            }
        }, Pt = function() {
            function n(t, e) {
                this._config = e, this._element = t, this._init()
            }
            var t = n.prototype;
            return t.toggle = function(t) {
                t.parents("li").toggleClass(Mt), jt(t).prop("checked") ? this.check(t) : this.unCheck(jt(t))
            }, t.check = function(t) {
                this._config.onCheck.call(t)
            }, t.unCheck = function(t) {
                this._config.onUnCheck.call(t)
            }, t._init = function() {
                var e = this;
                jt(zt).find("input:checkbox:checked").parents("li").toggleClass(Mt), jt(zt).on("change", "input:checkbox", function(t) {
                    e.toggle(jt(t.target))
                })
            }, n._jQueryInterface = function(i) {
                return this.each(function() {
                    var t = jt(this).data(Ot),
                        e = jt.extend({}, kt, jt(this).data());
                    t || (t = new n(jt(this), e), jt(this).data(Ot, t)), "init" === i && t[i]()
                })
            }, n
        }(), jt(window).on("load", function() {
            Pt._jQueryInterface.call(jt(zt))
        }), jt.fn[Qt] = Pt._jQueryInterface, jt.fn[Qt].Constructor = Pt, jt.fn[Qt].noConflict = function() {
            return jt.fn[Qt] = Ht, Pt._jQueryInterface
        }, Pt),
        Ze = (Nt = jQuery, qt = "CardWidget", Ft = "." + (Vt = "lte.cardwidget"), Xt = Nt.fn[qt], Yt = {
            EXPANDED: "expanded" + Ft,
            COLLAPSED: "collapsed" + Ft,
            MAXIMIZED: "maximized" + Ft,
            MINIMIZED: "minimized" + Ft,
            REMOVED: "removed" + Ft
        }, Ut = "collapsing-card", Wt = "expanding-card", Kt = "was-collapsed", Gt = "maximized-card", $t = {
            animationSpeed: "normal",
            collapseTrigger: (Jt = {
                DATA_REMOVE: '[data-card-widget="remove"]',
                DATA_COLLAPSE: '[data-card-widget="collapse"]',
                DATA_MAXIMIZE: '[data-card-widget="maximize"]',
                CARD: "." + (Bt = "card"),
                CARD_HEADER: ".card-header",
                CARD_BODY: ".card-body",
                CARD_FOOTER: ".card-footer",
                COLLAPSED: "." + (Zt = "collapsed-card")
            }).DATA_COLLAPSE,
            removeTrigger: Jt.DATA_REMOVE,
            maximizeTrigger: Jt.DATA_MAXIMIZE,
            collapseIcon: "fa-minus",
            expandIcon: "fa-plus",
            maximizeIcon: "fa-expand",
            minimizeIcon: "fa-compress"
        }, te = function() {
            function n(t, e) {
                this._element = t, this._parent = t.parents(Jt.CARD).first(), t.hasClass(Bt) && (this._parent = t), this._settings = Nt.extend({}, $t, e)
            }
            var t = n.prototype;
            return t.collapse = function() {
                var t = this;
                this._parent.addClass(Ut).children(Jt.CARD_BODY + ", " + Jt.CARD_FOOTER).slideUp(this._settings.animationSpeed, function() {
                    t._parent.addClass(Zt).removeClass(Ut)
                }), this._parent.find("> " + Jt.CARD_HEADER + " " + this._settings.collapseTrigger + " ." + this._settings.collapseIcon).addClass(this._settings.expandIcon).removeClass(this._settings.collapseIcon);
                var e = Nt.Event(Yt.COLLAPSED);
                this._element.trigger(e, this._parent)
            }, t.expand = function() {
                var t = this;
                this._parent.addClass(Wt).children(Jt.CARD_BODY + ", " + Jt.CARD_FOOTER).slideDown(this._settings.animationSpeed, function() {
                    t._parent.removeClass(Zt).removeClass(Wt)
                }), this._parent.find("> " + Jt.CARD_HEADER + " " + this._settings.collapseTrigger + " ." + this._settings.expandIcon).addClass(this._settings.collapseIcon).removeClass(this._settings.expandIcon);
                var e = Nt.Event(Yt.EXPANDED);
                this._element.trigger(e, this._parent)
            }, t.remove = function() {
                this._parent.slideUp();
                var t = Nt.Event(Yt.REMOVED);
                this._element.trigger(t, this._parent)
            }, t.toggle = function() {
                this._parent.hasClass(Zt) ? this.expand() : this.collapse()
            }, t.maximize = function() {
                this._parent.find(this._settings.maximizeTrigger + " ." + this._settings.maximizeIcon).addClass(this._settings.minimizeIcon).removeClass(this._settings.maximizeIcon), this._parent.css({
                    height: this._parent.height(),
                    width: this._parent.width(),
                    transition: "all .15s"
                }).delay(150).queue(function() {
                    Nt(this).addClass(Gt), Nt("html").addClass(Gt), Nt(this).hasClass(Zt) && Nt(this).addClass(Kt), Nt(this).dequeue()
                });
                var t = Nt.Event(Yt.MAXIMIZED);
                this._element.trigger(t, this._parent)
            }, t.minimize = function() {
                this._parent.find(this._settings.maximizeTrigger + " ." + this._settings.minimizeIcon).addClass(this._settings.maximizeIcon).removeClass(this._settings.minimizeIcon), this._parent.css("cssText", "height:" + this._parent[0].style.height + " !important;width:" + this._parent[0].style.width + " !important; transition: all .15s;").delay(10).queue(function() {
                    Nt(this).removeClass(Gt), Nt("html").removeClass(Gt), Nt(this).css({
                        height: "inherit",
                        width: "inherit"
                    }), Nt(this).hasClass(Kt) && Nt(this).removeClass(Kt), Nt(this).dequeue()
                });
                var t = Nt.Event(Yt.MINIMIZED);
                this._element.trigger(t, this._parent)
            }, t.toggleMaximize = function() {
                this._parent.hasClass(Gt) ? this.minimize() : this.maximize()
            }, t._init = function(t) {
                var e = this;
                this._parent = t, Nt(this).find(this._settings.collapseTrigger).click(function() {
                    e.toggle()
                }), Nt(this).find(this._settings.maximizeTrigger).click(function() {
                    e.toggleMaximize()
                }), Nt(this).find(this._settings.removeTrigger).click(function() {
                    e.remove()
                })
            }, n._jQueryInterface = function(t) {
                var e = Nt(this).data(Vt),
                    i = Nt.extend({}, $t, Nt(this).data());
                e || (e = new n(Nt(this), i), Nt(this).data(Vt, "string" == typeof t ? e : t)), "string" == typeof t && t.match(/collapse|expand|remove|toggle|maximize|minimize|toggleMaximize/) ? e[t]() : "object" == typeof t && e._init(Nt(this))
            }, n
        }(), Nt(document).on("click", Jt.DATA_COLLAPSE, function(t) {
            t && t.preventDefault(), te._jQueryInterface.call(Nt(this), "toggle")
        }), Nt(document).on("click", Jt.DATA_REMOVE, function(t) {
            t && t.preventDefault(), te._jQueryInterface.call(Nt(this), "remove")
        }), Nt(document).on("click", Jt.DATA_MAXIMIZE, function(t) {
            t && t.preventDefault(), te._jQueryInterface.call(Nt(this), "toggleMaximize")
        }), Nt.fn[qt] = te._jQueryInterface, Nt.fn[qt].Constructor = te, Nt.fn[qt].noConflict = function() {
            return Nt.fn[qt] = Xt, te._jQueryInterface
        }, te),
        Ue = (ee = jQuery, ie = "CardRefresh", se = "." + (ne = "lte.cardrefresh"), oe = ee.fn[ie], ae = {
            LOADED: "loaded" + se,
            OVERLAY_ADDED: "overlay.added" + se,
            OVERLAY_REMOVED: "overlay.removed" + se
        }, ce = {
            source: "",
            sourceSelector: "",
            params: {},
            trigger: (le = {
                CARD: "." + (re = "card"),
                DATA_REFRESH: '[data-card-widget="card-refresh"]'
            }).DATA_REFRESH,
            content: ".card-body",
            loadInContent: !0,
            loadOnInit: !0,
            responseType: "",
            overlayTemplate: '<div class="overlay"><i class="fas fa-2x fa-sync-alt fa-spin"></i></div>',
            onLoadStart: function() {},
            onLoadDone: function(t) {
                return t
            }
        }, de = function() {
            function n(t, e) {
                if (this._element = t, this._parent = t.parents(le.CARD).first(), this._settings = ee.extend({}, ce, e), this._overlay = ee(this._settings.overlayTemplate), t.hasClass(re) && (this._parent = t), "" === this._settings.source) throw new Error("Source url was not defined. Please specify a url in your CardRefresh source option.")
            }
            var t = n.prototype;
            return t.load = function() {
                this._addOverlay(), this._settings.onLoadStart.call(ee(this)), ee.get(this._settings.source, this._settings.params, function(t) {
                    this._settings.loadInContent && ("" != this._settings.sourceSelector && (t = ee(t).find(this._settings.sourceSelector).html()), this._parent.find(this._settings.content).html(t)), this._settings.onLoadDone.call(ee(this), t), this._removeOverlay()
                }.bind(this), "" !== this._settings.responseType && this._settings.responseType);
                var t = ee.Event(ae.LOADED);
                ee(this._element).trigger(t)
            }, t._addOverlay = function() {
                this._parent.append(this._overlay);
                var t = ee.Event(ae.OVERLAY_ADDED);
                ee(this._element).trigger(t)
            }, t._removeOverlay = function() {
                this._parent.find(this._overlay).remove();
                var t = ee.Event(ae.OVERLAY_REMOVED);
                ee(this._element).trigger(t)
            }, t._init = function() {
                var t = this;
                ee(this).find(this._settings.trigger).on("click", function() {
                    t.load()
                }), this._settings.loadOnInit && this.load()
            }, n._jQueryInterface = function(t) {
                var e = ee(this).data(ne),
                    i = ee.extend({}, ce, ee(this).data());
                e || (e = new n(ee(this), i), ee(this).data(ne, "string" == typeof t ? e : t)), "string" == typeof t && t.match(/load/) ? e[t]() : e._init(ee(this))
            }, n
        }(), ee(document).on("click", le.DATA_REFRESH, function(t) {
            t && t.preventDefault(), de._jQueryInterface.call(ee(this), "load")
        }), ee(document).ready(function() {
            ee(le.DATA_REFRESH).each(function() {
                de._jQueryInterface.call(ee(this))
            })
        }), ee.fn[ie] = de._jQueryInterface, ee.fn[ie].Constructor = de, ee.fn[ie].noConflict = function() {
            return ee.fn[ie] = oe, de._jQueryInterface
        }, de),
        We = (he = jQuery, fe = "Dropdown", ue = "lte.dropdown", ge = he.fn[fe], pe = ".navbar", _e = ".dropdown-menu", me = ".dropdown-menu.show", Ce = '[data-toggle="dropdown"]', ye = "dropdown-menu-right", ve = {}, be = function() {
            function n(t, e) {
                this._config = e, this._element = t
            }
            var t = n.prototype;
            return t.toggleSubmenu = function() {
                this._element.siblings().show().toggleClass("show"), this._element.next().hasClass("show") || this._element.parents(".dropdown-menu").first().find(".show").removeClass("show").hide(), this._element.parents("li.nav-item.dropdown.show").on("hidden.bs.dropdown", function(t) {
                    he(".dropdown-submenu .show").removeClass("show").hide()
                })
            }, t.fixPosition = function() {
                var t, e, i, n = he(me);
                0 !== n.length && (n.hasClass(ye) ? (n.css("left", "inherit"), n.css("right", 0)) : (n.css("left", 0), n.css("right", "inherit")), t = n.offset(), e = n.width(), i = he(window).width() - t.left, t.left < 0 ? (n.css("left", "inherit"), n.css("right", t.left - 5)) : i < e && (n.css("left", "inherit"), n.css("right", 0)))
            }, n._jQueryInterface = function(i) {
                return this.each(function() {
                    var t = he(this).data(ue),
                        e = he.extend({}, ve, he(this).data());
                    t || (t = new n(he(this), e), he(this).data(ue, t)), "toggleSubmenu" !== i && "fixPosition" != i || t[i]()
                })
            }, n
        }(), he(_e + " " + Ce).on("click", function(t) {
            t.preventDefault(), t.stopPropagation(), be._jQueryInterface.call(he(this), "toggleSubmenu")
        }), he(pe + " " + Ce).on("click", function(t) {
            t.preventDefault(), setTimeout(function() {
                be._jQueryInterface.call(he(this), "fixPosition")
            }, 1)
        }), he.fn[fe] = be._jQueryInterface, he.fn[fe].Constructor = be, he.fn[fe].noConflict = function() {
            return he.fn[fe] = ge, be._jQueryInterface
        }, be),
        Ke = (we = jQuery, xe = "Toasts", Ee = ".lte.toasts", Ae = we.fn[xe], De = {
            INIT: "init" + Ee,
            CREATED: "created" + Ee,
            REMOVED: "removed" + Ee
        }, Ie = "#toastsContainerTopRight", Se = "#toastsContainerTopLeft", Re = "#toastsContainerBottomRight", Te = "#toastsContainerBottomLeft", Le = "toasts-top-right", je = "toasts-top-left", Qe = "toasts-bottom-right", Oe = "toasts-bottom-left", ze = "topLeft", Me = "bottomRight", Pe = {
            position: He = "topRight",
            fixed: !0,
            autohide: !(ke = "bottomLeft"),
            autoremove: !0,
            delay: 1e3,
            fade: !0,
            icon: null,
            image: null,
            imageAlt: null,
            imageHeight: "25px",
            title: null,
            subtitle: null,
            close: !0,
            body: null,
            class: null
        }, Ne = function() {
            function s(t, e) {
                this._config = e, this._prepareContainer();
                var i = we.Event(De.INIT);
                we("body").trigger(i)
            }
            var t = s.prototype;
            return t.create = function() {
                var t = we('<div class="toast" role="alert" aria-live="assertive" aria-atomic="true"/>');
                t.data("autohide", this._config.autohide), t.data("animation", this._config.fade), this._config.class && t.addClass(this._config.class), this._config.delay && 500 != this._config.delay && t.data("delay", this._config.delay);
                var e, i, n = we('<div class="toast-header">');
                null != this._config.image && (e = we("<img />").addClass("rounded mr-2").attr("src", this._config.image).attr("alt", this._config.imageAlt), null != this._config.imageHeight && e.height(this._config.imageHeight).width("auto"), n.append(e)), null != this._config.icon && n.append(we("<i />").addClass("mr-2").addClass(this._config.icon)), null != this._config.title && n.append(we("<strong />").addClass("mr-auto").html(this._config.title)), null != this._config.subtitle && n.append(we("<small />").html(this._config.subtitle)), 1 == this._config.close && (i = we('<button data-dismiss="toast" />').attr("type", "button").addClass("ml-2 mb-1 close").attr("aria-label", "Close").append('<span aria-hidden="true">&times;</span>'), null == this._config.title && i.toggleClass("ml-2 ml-auto"), n.append(i)), t.append(n), null != this._config.body && t.append(we('<div class="toast-body" />').html(this._config.body)), we(this._getContainerId()).prepend(t);
                var s = we.Event(De.CREATED);
                we("body").trigger(s), t.toast("show"), this._config.autoremove && t.on("hidden.bs.toast", function() {
                    we(this).delay(200).remove();
                    var t = we.Event(De.REMOVED);
                    we("body").trigger(t)
                })
            }, t._getContainerId = function() {
                return this._config.position == He ? Ie : this._config.position == ze ? Se : this._config.position == Me ? Re : this._config.position == ke ? Te : void 0
            }, t._prepareContainer = function() {
                var t;
                0 === we(this._getContainerId()).length && (t = we("<div />").attr("id", this._getContainerId().replace("#", "")), this._config.position == He ? t.addClass(Le) : this._config.position == ze ? t.addClass(je) : this._config.position == Me ? t.addClass(Qe) : this._config.position == ke && t.addClass(Oe), we("body").append(t)), this._config.fixed ? we(this._getContainerId()).addClass("fixed") : we(this._getContainerId()).removeClass("fixed")
            }, s._jQueryInterface = function(i, n) {
                return this.each(function() {
                    var t = we.extend({}, Pe, n),
                        e = new s(we(this), t);
                    "create" === i && e[i]()
                })
            }, s
        }(), we.fn[xe] = Ne._jQueryInterface, we.fn[xe].Constructor = Ne, we.fn[xe].noConflict = function() {
            return we.fn[xe] = Ae, Ne._jQueryInterface
        }, Ne);
    t.CardRefresh = Ue, t.CardWidget = Ze, t.ControlSidebar = qe, t.DirectChat = Ye, t.Dropdown = We, t.Layout = Ve, t.PushMenu = Fe, t.Toasts = Ke, t.TodoList = Be, t.Treeview = Xe, Object.defineProperty(t, "__esModule", {
        value: !0
    })
});