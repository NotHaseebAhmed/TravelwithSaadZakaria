!(function (e, t) {
    "object" == typeof exports && "undefined" != typeof module
        ? (module.exports = t())
        : "function" == typeof define && define.amd
          ? define(t)
          : ((e = "undefined" != typeof globalThis ? globalThis : e || self).Swiper = t());
})(this, function () {
    "use strict";
    function e(e) {
        return null !== e && "object" == typeof e && "constructor" in e && e.constructor === Object;
    }
    function t(i, n) {
        void 0 === i && (i = {}),
            void 0 === n && (n = {}),
            Object.keys(n).forEach((s) => {
                void 0 === i[s] ? (i[s] = n[s]) : e(n[s]) && e(i[s]) && Object.keys(n[s]).length > 0 && t(i[s], n[s]);
            });
    }
    let i = {
        body: {},
        addEventListener() {},
        removeEventListener() {},
        activeElement: { blur() {}, nodeName: "" },
        querySelector: () => null,
        querySelectorAll: () => [],
        getElementById: () => null,
        createEvent: () => ({ initEvent() {} }),
        createElement: () => ({
            children: [],
            childNodes: [],
            style: {},
            setAttribute() {},
            getElementsByTagName: () => [],
        }),
        createElementNS: () => ({}),
        importNode: () => null,
        location: { hash: "", host: "", hostname: "", href: "", origin: "", pathname: "", protocol: "", search: "" },
    };
    function n() {
        let e = "undefined" != typeof document ? document : {};
        return t(e, i), e;
    }
    let s = {
        document: i,
        navigator: { userAgent: "" },
        location: { hash: "", host: "", hostname: "", href: "", origin: "", pathname: "", protocol: "", search: "" },
        history: { replaceState() {}, pushState() {}, go() {}, back() {} },
        CustomEvent: function () {
            return this;
        },
        addEventListener() {},
        removeEventListener() {},
        getComputedStyle: () => ({ getPropertyValue: () => "" }),
        Image() {},
        Date() {},
        screen: {},
        setTimeout() {},
        clearTimeout() {},
        matchMedia: () => ({}),
        requestAnimationFrame: (e) => ("undefined" == typeof setTimeout ? (e(), null) : setTimeout(e, 0)),
        cancelAnimationFrame(e) {
            "undefined" != typeof setTimeout && clearTimeout(e);
        },
    };
    function r() {
        let e = "undefined" != typeof window ? window : {};
        return t(e, s), e;
    }
    class a extends Array {
        constructor(e) {
            "number" == typeof e
                ? super(e)
                : (super(...(e || [])),
                  (function (e) {
                      let t = e.__proto__;
                      Object.defineProperty(e, "__proto__", {
                          get: () => t,
                          set(e) {
                              t.__proto__ = e;
                          },
                      });
                  })(this));
        }
    }
    function l(e) {
        void 0 === e && (e = []);
        let t = [];
        return (
            e.forEach((e) => {
                Array.isArray(e) ? t.push(...l(e)) : t.push(e);
            }),
            t
        );
    }
    function o(e, t) {
        return Array.prototype.filter.call(e, t);
    }
    function d(e, t) {
        let i = r(),
            s = n(),
            l = [];
        if (!t && e instanceof a) return e;
        if (!e) return new a(l);
        if ("string" == typeof e) {
            let o = e.trim();
            if (o.indexOf("<") >= 0 && o.indexOf(">") >= 0) {
                let d = "div";
                0 === o.indexOf("<li") && (d = "ul"),
                    0 === o.indexOf("<tr") && (d = "tbody"),
                    (0 !== o.indexOf("<td") && 0 !== o.indexOf("<th")) || (d = "tr"),
                    0 === o.indexOf("<tbody") && (d = "table"),
                    0 === o.indexOf("<option") && (d = "select");
                let c = s.createElement(d);
                c.innerHTML = o;
                for (let u = 0; u < c.childNodes.length; u += 1) l.push(c.childNodes[u]);
            } else
                l = (function (e, t) {
                    if ("string" != typeof e) return [e];
                    let i = [],
                        n = t.querySelectorAll(e);
                    for (let s = 0; s < n.length; s += 1) i.push(n[s]);
                    return i;
                })(e.trim(), t || s);
        } else if (e.nodeType || e === i || e === s) l.push(e);
        else if (Array.isArray(e)) {
            if (e instanceof a) return e;
            l = e;
        }
        return new a(
            (function (e) {
                let t = [];
                for (let i = 0; i < e.length; i += 1) -1 === t.indexOf(e[i]) && t.push(e[i]);
                return t;
            })(l)
        );
    }
    d.fn = a.prototype;
    let c = {
        addClass: function () {
            for (var e = arguments.length, t = Array(e), i = 0; i < e; i++) t[i] = arguments[i];
            let n = l(t.map((e) => e.split(" ")));
            return (
                this.forEach((e) => {
                    e.classList.add(...n);
                }),
                this
            );
        },
        removeClass: function () {
            for (var e = arguments.length, t = Array(e), i = 0; i < e; i++) t[i] = arguments[i];
            let n = l(t.map((e) => e.split(" ")));
            return (
                this.forEach((e) => {
                    e.classList.remove(...n);
                }),
                this
            );
        },
        hasClass: function () {
            for (var e = arguments.length, t = Array(e), i = 0; i < e; i++) t[i] = arguments[i];
            let n = l(t.map((e) => e.split(" ")));
            return o(this, (e) => n.filter((t) => e.classList.contains(t)).length > 0).length > 0;
        },
        toggleClass: function () {
            for (var e = arguments.length, t = Array(e), i = 0; i < e; i++) t[i] = arguments[i];
            let n = l(t.map((e) => e.split(" ")));
            this.forEach((e) => {
                n.forEach((t) => {
                    e.classList.toggle(t);
                });
            });
        },
        attr: function (e, t) {
            if (1 === arguments.length && "string" == typeof e) return this[0] ? this[0].getAttribute(e) : void 0;
            for (let i = 0; i < this.length; i += 1)
                if (2 === arguments.length) this[i].setAttribute(e, t);
                else for (let n in e) (this[i][n] = e[n]), this[i].setAttribute(n, e[n]);
            return this;
        },
        removeAttr: function (e) {
            for (let t = 0; t < this.length; t += 1) this[t].removeAttribute(e);
            return this;
        },
        transform: function (e) {
            for (let t = 0; t < this.length; t += 1) this[t].style.transform = e;
            return this;
        },
        transition: function (e) {
            for (let t = 0; t < this.length; t += 1)
                this[t].style.transitionDuration = "string" != typeof e ? `${e}ms` : e;
            return this;
        },
        on: function () {
            for (var e = arguments.length, t = Array(e), i = 0; i < e; i++) t[i] = arguments[i];
            let [n, s, r, a] = t;
            function l(e) {
                let t = e.target;
                if (!t) return;
                let i = e.target.dom7EventData || [];
                if ((0 > i.indexOf(e) && i.unshift(e), d(t).is(s))) r.apply(t, i);
                else {
                    let n = d(t).parents();
                    for (let a = 0; a < n.length; a += 1) d(n[a]).is(s) && r.apply(n[a], i);
                }
            }
            function o(e) {
                let t = (e && e.target && e.target.dom7EventData) || [];
                0 > t.indexOf(e) && t.unshift(e), r.apply(this, t);
            }
            "function" == typeof t[1] && (([n, r, a] = t), (s = void 0)), a || (a = !1);
            let c = n.split(" "),
                u;
            for (let p = 0; p < this.length; p += 1) {
                let h = this[p];
                if (s)
                    for (u = 0; u < c.length; u += 1) {
                        let f = c[u];
                        h.dom7LiveListeners || (h.dom7LiveListeners = {}),
                            h.dom7LiveListeners[f] || (h.dom7LiveListeners[f] = []),
                            h.dom7LiveListeners[f].push({ listener: r, proxyListener: l }),
                            h.addEventListener(f, l, a);
                    }
                else
                    for (u = 0; u < c.length; u += 1) {
                        let m = c[u];
                        h.dom7Listeners || (h.dom7Listeners = {}),
                            h.dom7Listeners[m] || (h.dom7Listeners[m] = []),
                            h.dom7Listeners[m].push({ listener: r, proxyListener: o }),
                            h.addEventListener(m, o, a);
                    }
            }
            return this;
        },
        off: function () {
            for (var e = arguments.length, t = Array(e), i = 0; i < e; i++) t[i] = arguments[i];
            let [n, s, r, a] = t;
            "function" == typeof t[1] && (([n, r, a] = t), (s = void 0)), a || (a = !1);
            let l = n.split(" ");
            for (let o = 0; o < l.length; o += 1) {
                let d = l[o];
                for (let c = 0; c < this.length; c += 1) {
                    let u = this[c],
                        p;
                    if (
                        (!s && u.dom7Listeners
                            ? (p = u.dom7Listeners[d])
                            : s && u.dom7LiveListeners && (p = u.dom7LiveListeners[d]),
                        p && p.length)
                    )
                        for (let h = p.length - 1; h >= 0; h -= 1) {
                            let f = p[h];
                            (r && f.listener === r) ||
                            (r && f.listener && f.listener.dom7proxy && f.listener.dom7proxy === r)
                                ? (u.removeEventListener(d, f.proxyListener, a), p.splice(h, 1))
                                : r || (u.removeEventListener(d, f.proxyListener, a), p.splice(h, 1));
                        }
                }
            }
            return this;
        },
        trigger: function () {
            let e = r();
            for (var t = arguments.length, i = Array(t), n = 0; n < t; n++) i[n] = arguments[n];
            let s = i[0].split(" "),
                a = i[1];
            for (let l = 0; l < s.length; l += 1) {
                let o = s[l];
                for (let d = 0; d < this.length; d += 1) {
                    let c = this[d];
                    if (e.CustomEvent) {
                        let u = new e.CustomEvent(o, { detail: a, bubbles: !0, cancelable: !0 });
                        (c.dom7EventData = i.filter((e, t) => t > 0)),
                            c.dispatchEvent(u),
                            (c.dom7EventData = []),
                            delete c.dom7EventData;
                    }
                }
            }
            return this;
        },
        transitionEnd: function (e) {
            let t = this;
            return (
                e &&
                    t.on("transitionend", function i(n) {
                        n.target === this && (e.call(this, n), t.off("transitionend", i));
                    }),
                this
            );
        },
        outerWidth: function (e) {
            if (this.length > 0) {
                if (e) {
                    let t = this.styles();
                    return (
                        this[0].offsetWidth +
                        parseFloat(t.getPropertyValue("margin-right")) +
                        parseFloat(t.getPropertyValue("margin-left"))
                    );
                }
                return this[0].offsetWidth;
            }
            return null;
        },
        outerHeight: function (e) {
            if (this.length > 0) {
                if (e) {
                    let t = this.styles();
                    return (
                        this[0].offsetHeight +
                        parseFloat(t.getPropertyValue("margin-top")) +
                        parseFloat(t.getPropertyValue("margin-bottom"))
                    );
                }
                return this[0].offsetHeight;
            }
            return null;
        },
        styles: function () {
            let e = r();
            return this[0] ? e.getComputedStyle(this[0], null) : {};
        },
        offset: function () {
            if (this.length > 0) {
                let e = r(),
                    t = n(),
                    i = this[0],
                    s = i.getBoundingClientRect(),
                    a = t.body,
                    l = i.clientTop || a.clientTop || 0,
                    o = i.clientLeft || a.clientLeft || 0,
                    d = i === e ? e.scrollY : i.scrollTop,
                    c = i === e ? e.scrollX : i.scrollLeft;
                return { top: s.top + d - l, left: s.left + c - o };
            }
            return null;
        },
        css: function (e, t) {
            let i = r(),
                n;
            if (1 === arguments.length) {
                if ("string" != typeof e) {
                    for (n = 0; n < this.length; n += 1) for (let s in e) this[n].style[s] = e[s];
                    return this;
                }
                if (this[0]) return i.getComputedStyle(this[0], null).getPropertyValue(e);
            }
            if (2 === arguments.length && "string" == typeof e)
                for (n = 0; n < this.length; n += 1) this[n].style[e] = t;
            return this;
        },
        each: function (e) {
            return (
                e &&
                    this.forEach((t, i) => {
                        e.apply(t, [t, i]);
                    }),
                this
            );
        },
        html: function (e) {
            if (void 0 === e) return this[0] ? this[0].innerHTML : null;
            for (let t = 0; t < this.length; t += 1) this[t].innerHTML = e;
            return this;
        },
        text: function (e) {
            if (void 0 === e) return this[0] ? this[0].textContent.trim() : null;
            for (let t = 0; t < this.length; t += 1) this[t].textContent = e;
            return this;
        },
        is: function (e) {
            let t = r(),
                i = n(),
                s = this[0],
                l,
                o;
            if (!s || void 0 === e) return !1;
            if ("string" == typeof e) {
                if (s.matches) return s.matches(e);
                if (s.webkitMatchesSelector) return s.webkitMatchesSelector(e);
                if (s.msMatchesSelector) return s.msMatchesSelector(e);
                for (l = d(e), o = 0; o < l.length; o += 1) if (l[o] === s) return !0;
                return !1;
            }
            if (e === i) return s === i;
            if (e === t) return s === t;
            if (e.nodeType || e instanceof a) {
                for (l = e.nodeType ? [e] : e, o = 0; o < l.length; o += 1) if (l[o] === s) return !0;
            }
            return !1;
        },
        index: function () {
            let e,
                t = this[0];
            if (t) {
                for (e = 0; null !== (t = t.previousSibling); ) 1 === t.nodeType && (e += 1);
                return e;
            }
        },
        eq: function (e) {
            if (void 0 === e) return this;
            let t = this.length;
            if (e > t - 1) return d([]);
            if (e < 0) {
                let i = t + e;
                return d(i < 0 ? [] : [this[i]]);
            }
            return d([this[e]]);
        },
        append: function () {
            let e,
                t = n();
            for (let i = 0; i < arguments.length; i += 1) {
                e = i < 0 || arguments.length <= i ? void 0 : arguments[i];
                for (let s = 0; s < this.length; s += 1)
                    if ("string" == typeof e) {
                        let r = t.createElement("div");
                        for (r.innerHTML = e; r.firstChild; ) this[s].appendChild(r.firstChild);
                    } else if (e instanceof a) for (let l = 0; l < e.length; l += 1) this[s].appendChild(e[l]);
                    else this[s].appendChild(e);
            }
            return this;
        },
        prepend: function (e) {
            let t = n(),
                i,
                s;
            for (i = 0; i < this.length; i += 1)
                if ("string" == typeof e) {
                    let r = t.createElement("div");
                    for (r.innerHTML = e, s = r.childNodes.length - 1; s >= 0; s -= 1)
                        this[i].insertBefore(r.childNodes[s], this[i].childNodes[0]);
                } else if (e instanceof a)
                    for (s = 0; s < e.length; s += 1) this[i].insertBefore(e[s], this[i].childNodes[0]);
                else this[i].insertBefore(e, this[i].childNodes[0]);
            return this;
        },
        next: function (e) {
            return this.length > 0
                ? e
                    ? this[0].nextElementSibling && d(this[0].nextElementSibling).is(e)
                        ? d([this[0].nextElementSibling])
                        : d([])
                    : this[0].nextElementSibling
                      ? d([this[0].nextElementSibling])
                      : d([])
                : d([]);
        },
        nextAll: function (e) {
            let t = [],
                i = this[0];
            if (!i) return d([]);
            for (; i.nextElementSibling; ) {
                let n = i.nextElementSibling;
                e ? d(n).is(e) && t.push(n) : t.push(n), (i = n);
            }
            return d(t);
        },
        prev: function (e) {
            if (this.length > 0) {
                let t = this[0];
                return e
                    ? t.previousElementSibling && d(t.previousElementSibling).is(e)
                        ? d([t.previousElementSibling])
                        : d([])
                    : t.previousElementSibling
                      ? d([t.previousElementSibling])
                      : d([]);
            }
            return d([]);
        },
        prevAll: function (e) {
            let t = [],
                i = this[0];
            if (!i) return d([]);
            for (; i.previousElementSibling; ) {
                let n = i.previousElementSibling;
                e ? d(n).is(e) && t.push(n) : t.push(n), (i = n);
            }
            return d(t);
        },
        parent: function (e) {
            let t = [];
            for (let i = 0; i < this.length; i += 1)
                null !== this[i].parentNode &&
                    (e ? d(this[i].parentNode).is(e) && t.push(this[i].parentNode) : t.push(this[i].parentNode));
            return d(t);
        },
        parents: function (e) {
            let t = [];
            for (let i = 0; i < this.length; i += 1) {
                let n = this[i].parentNode;
                for (; n; ) e ? d(n).is(e) && t.push(n) : t.push(n), (n = n.parentNode);
            }
            return d(t);
        },
        closest: function (e) {
            let t = this;
            return void 0 === e ? d([]) : (t.is(e) || (t = t.parents(e).eq(0)), t);
        },
        find: function (e) {
            let t = [];
            for (let i = 0; i < this.length; i += 1) {
                let n = this[i].querySelectorAll(e);
                for (let s = 0; s < n.length; s += 1) t.push(n[s]);
            }
            return d(t);
        },
        children: function (e) {
            let t = [];
            for (let i = 0; i < this.length; i += 1) {
                let n = this[i].children;
                for (let s = 0; s < n.length; s += 1) (e && !d(n[s]).is(e)) || t.push(n[s]);
            }
            return d(t);
        },
        filter: function (e) {
            return d(o(this, e));
        },
        remove: function () {
            for (let e = 0; e < this.length; e += 1) this[e].parentNode && this[e].parentNode.removeChild(this[e]);
            return this;
        },
    };
    function u(e, t) {
        return void 0 === t && (t = 0), setTimeout(e, t);
    }
    function p() {
        return Date.now();
    }
    function h(e, t) {
        void 0 === t && (t = "x");
        let i = r(),
            n,
            s,
            a,
            l = (function (e) {
                let t = r(),
                    i;
                return (
                    t.getComputedStyle && (i = t.getComputedStyle(e, null)),
                    !i && e.currentStyle && (i = e.currentStyle),
                    i || (i = e.style),
                    i
                );
            })(e);
        return (
            i.WebKitCSSMatrix
                ? ((s = l.transform || l.webkitTransform).split(",").length > 6 &&
                      (s = s
                          .split(", ")
                          .map((e) => e.replace(",", "."))
                          .join(", ")),
                  (a = new i.WebKitCSSMatrix("none" === s ? "" : s)))
                : (n = (a =
                      l.MozTransform ||
                      l.OTransform ||
                      l.MsTransform ||
                      l.msTransform ||
                      l.transform ||
                      l.getPropertyValue("transform").replace("translate(", "matrix(1, 0, 0, 1,"))
                      .toString()
                      .split(",")),
            "x" === t && (s = i.WebKitCSSMatrix ? a.m41 : 16 === n.length ? parseFloat(n[12]) : parseFloat(n[4])),
            "y" === t && (s = i.WebKitCSSMatrix ? a.m42 : 16 === n.length ? parseFloat(n[13]) : parseFloat(n[5])),
            s || 0
        );
    }
    function f(e) {
        return (
            "object" == typeof e &&
            null !== e &&
            e.constructor &&
            "Object" === Object.prototype.toString.call(e).slice(8, -1)
        );
    }
    function m(e) {
        return "undefined" != typeof window && void 0 !== window.HTMLElement
            ? e instanceof HTMLElement
            : e && (1 === e.nodeType || 11 === e.nodeType);
    }
    function g() {
        let e = Object(arguments.length <= 0 ? void 0 : arguments[0]),
            t = ["__proto__", "constructor", "prototype"];
        for (let i = 1; i < arguments.length; i += 1) {
            let n = i < 0 || arguments.length <= i ? void 0 : arguments[i];
            if (null != n && !m(n)) {
                let s = Object.keys(Object(n)).filter((e) => 0 > t.indexOf(e));
                for (let r = 0, a = s.length; r < a; r += 1) {
                    let l = s[r],
                        o = Object.getOwnPropertyDescriptor(n, l);
                    void 0 !== o &&
                        o.enumerable &&
                        (f(e[l]) && f(n[l])
                            ? n[l].__swiper__
                                ? (e[l] = n[l])
                                : g(e[l], n[l])
                            : !f(e[l]) && f(n[l])
                              ? ((e[l] = {}), n[l].__swiper__ ? (e[l] = n[l]) : g(e[l], n[l]))
                              : (e[l] = n[l]));
                }
            }
        }
        return e;
    }
    function $(e, t, i) {
        e.style.setProperty(t, i);
    }
    function v(e) {
        let { swiper: t, targetPosition: i, side: n } = e,
            s = r(),
            a = -t.translate,
            l,
            o = null,
            d = t.params.speed;
        (t.wrapperEl.style.scrollSnapType = "none"), s.cancelAnimationFrame(t.cssModeFrameID);
        let c = i > a ? "next" : "prev",
            u = (e, t) => ("next" === c && e >= t) || ("prev" === c && e <= t),
            p = () => {
                (l = new Date().getTime()), null === o && (o = l);
                let e = Math.max(Math.min((l - o) / d, 1), 0),
                    r = a + (0.5 - Math.cos(e * Math.PI) / 2) * (i - a);
                if ((u(r, i) && (r = i), t.wrapperEl.scrollTo({ [n]: r }), u(r, i)))
                    return (
                        (t.wrapperEl.style.overflow = "hidden"),
                        (t.wrapperEl.style.scrollSnapType = ""),
                        setTimeout(() => {
                            (t.wrapperEl.style.overflow = ""), t.wrapperEl.scrollTo({ [n]: r });
                        }),
                        void s.cancelAnimationFrame(t.cssModeFrameID)
                    );
                t.cssModeFrameID = s.requestAnimationFrame(p);
            };
        p();
    }
    let y, _, b;
    function x() {
        return (
            y ||
                (y = (function () {
                    let e = r(),
                        t = n();
                    return {
                        smoothScroll: t.documentElement && "scrollBehavior" in t.documentElement.style,
                        touch: !!("ontouchstart" in e || (e.DocumentTouch && t instanceof e.DocumentTouch)),
                        passiveListener: (function () {
                            let t = !1;
                            try {
                                let i = Object.defineProperty({}, "passive", {
                                    get() {
                                        t = !0;
                                    },
                                });
                                e.addEventListener("testPassiveListener", null, i);
                            } catch (n) {}
                            return t;
                        })(),
                        gestures: "ongesturestart" in e,
                    };
                })()),
            y
        );
    }
    function w(e) {
        let { swiper: t, runCallbacks: i, direction: n, step: s } = e,
            { activeIndex: r, previousIndex: a } = t,
            l = n;
        if ((l || (l = r > a ? "next" : r < a ? "prev" : "reset"), t.emit(`transition${s}`), i && r !== a)) {
            if ("reset" === l) return void t.emit(`slideResetTransition${s}`);
            t.emit(`slideChangeTransition${s}`),
                "next" === l ? t.emit(`slideNextTransition${s}`) : t.emit(`slidePrevTransition${s}`);
        }
    }
    function S(e) {
        let t = this,
            i = n(),
            s = r(),
            a = t.touchEventsData,
            { params: l, touches: o, enabled: c } = t;
        if (!c || (t.animating && l.preventInteractionOnTransition)) return;
        !t.animating && l.cssMode && l.loop && t.loopFix();
        let u = e;
        u.originalEvent && (u = u.originalEvent);
        let h = d(u.target);
        if (
            ("wrapper" === l.touchEventsTarget && !h.closest(t.wrapperEl).length) ||
            ((a.isTouchEvent = "touchstart" === u.type), !a.isTouchEvent && "which" in u && 3 === u.which) ||
            (!a.isTouchEvent && "button" in u && u.button > 0) ||
            (a.isTouched && a.isMoved)
        )
            return;
        l.noSwipingClass &&
            "" !== l.noSwipingClass &&
            u.target &&
            u.target.shadowRoot &&
            e.path &&
            e.path[0] &&
            (h = d(e.path[0]));
        let f = l.noSwipingSelector ? l.noSwipingSelector : `.${l.noSwipingClass}`,
            m = !(!u.target || !u.target.shadowRoot);
        if (
            l.noSwiping &&
            (m
                ? (function (e, t) {
                      return (
                          void 0 === t && (t = this),
                          (function t(i) {
                              return i && i !== n() && i !== r()
                                  ? (i.assignedSlot && (i = i.assignedSlot), i.closest(e) || t(i.getRootNode().host))
                                  : null;
                          })(t)
                      );
                  })(f, u.target)
                : h.closest(f)[0])
        )
            return void (t.allowClick = !0);
        if (l.swipeHandler && !h.closest(l.swipeHandler)[0]) return;
        (o.currentX = "touchstart" === u.type ? u.targetTouches[0].pageX : u.pageX),
            (o.currentY = "touchstart" === u.type ? u.targetTouches[0].pageY : u.pageY);
        let g = o.currentX,
            $ = o.currentY,
            v = l.edgeSwipeDetection || l.iOSEdgeSwipeDetection,
            y = l.edgeSwipeThreshold || l.iOSEdgeSwipeThreshold;
        if (v && (g <= y || g >= s.innerWidth - y)) {
            if ("prevent" !== v) return;
            e.preventDefault();
        }
        if (
            (Object.assign(a, {
                isTouched: !0,
                isMoved: !1,
                allowTouchCallbacks: !0,
                isScrolling: void 0,
                startMoving: void 0,
            }),
            (o.startX = g),
            (o.startY = $),
            (a.touchStartTime = p()),
            (t.allowClick = !0),
            t.updateSize(),
            (t.swipeDirection = void 0),
            l.threshold > 0 && (a.allowThresholdMove = !1),
            "touchstart" !== u.type)
        ) {
            let _ = !0;
            h.is(a.focusableElements) && ((_ = !1), "SELECT" === h[0].nodeName && (a.isTouched = !1)),
                i.activeElement &&
                    d(i.activeElement).is(a.focusableElements) &&
                    i.activeElement !== h[0] &&
                    i.activeElement.blur();
            let b = _ && t.allowTouchMove && l.touchStartPreventDefault;
            (l.touchStartForcePreventDefault || b) && !h[0].isContentEditable && u.preventDefault();
        }
        t.params.freeMode &&
            t.params.freeMode.enabled &&
            t.freeMode &&
            t.animating &&
            !l.cssMode &&
            t.freeMode.onTouchStart(),
            t.emit("touchStart", u);
    }
    function E(e) {
        let t = n(),
            i = this,
            s = i.touchEventsData,
            { params: r, touches: a, rtlTranslate: l, enabled: o } = i;
        if (!o) return;
        let c = e;
        if ((c.originalEvent && (c = c.originalEvent), !s.isTouched))
            return void (s.startMoving && s.isScrolling && i.emit("touchMoveOpposite", c));
        if (s.isTouchEvent && "touchmove" !== c.type) return;
        let u = "touchmove" === c.type && c.targetTouches && (c.targetTouches[0] || c.changedTouches[0]),
            h = "touchmove" === c.type ? u.pageX : c.pageX,
            f = "touchmove" === c.type ? u.pageY : c.pageY;
        if (c.preventedByNestedSwiper) return (a.startX = h), void (a.startY = f);
        if (!i.allowTouchMove)
            return (
                d(c.target).is(s.focusableElements) || (i.allowClick = !1),
                void (
                    s.isTouched &&
                    (Object.assign(a, { startX: h, startY: f, currentX: h, currentY: f }), (s.touchStartTime = p()))
                )
            );
        if (s.isTouchEvent && r.touchReleaseOnEdges && !r.loop) {
            if (i.isVertical()) {
                if (
                    (f < a.startY && i.translate <= i.maxTranslate()) ||
                    (f > a.startY && i.translate >= i.minTranslate())
                )
                    return (s.isTouched = !1), void (s.isMoved = !1);
            } else if (
                (h < a.startX && i.translate <= i.maxTranslate()) ||
                (h > a.startX && i.translate >= i.minTranslate())
            )
                return;
        }
        if (s.isTouchEvent && t.activeElement && c.target === t.activeElement && d(c.target).is(s.focusableElements))
            return (s.isMoved = !0), void (i.allowClick = !1);
        if ((s.allowTouchCallbacks && i.emit("touchMove", c), c.targetTouches && c.targetTouches.length > 1)) return;
        (a.currentX = h), (a.currentY = f);
        let m = a.currentX - a.startX,
            g = a.currentY - a.startY;
        if (i.params.threshold && Math.sqrt(m ** 2 + g ** 2) < i.params.threshold) return;
        if (void 0 === s.isScrolling) {
            let $;
            (i.isHorizontal() && a.currentY === a.startY) || (i.isVertical() && a.currentX === a.startX)
                ? (s.isScrolling = !1)
                : m * m + g * g >= 25 &&
                  (($ = (180 * Math.atan2(Math.abs(g), Math.abs(m))) / Math.PI),
                  (s.isScrolling = i.isHorizontal() ? $ > r.touchAngle : 90 - $ > r.touchAngle));
        }
        if (
            (s.isScrolling && i.emit("touchMoveOpposite", c),
            void 0 === s.startMoving && ((a.currentX === a.startX && a.currentY === a.startY) || (s.startMoving = !0)),
            s.isScrolling)
        )
            return void (s.isTouched = !1);
        if (!s.startMoving) return;
        (i.allowClick = !1),
            !r.cssMode && c.cancelable && c.preventDefault(),
            r.touchMoveStopPropagation && !r.nested && c.stopPropagation(),
            s.isMoved ||
                (r.loop && !r.cssMode && i.loopFix(),
                (s.startTranslate = i.getTranslate()),
                i.setTransition(0),
                i.animating && i.$wrapperEl.trigger("webkitTransitionEnd transitionend"),
                (s.allowMomentumBounce = !1),
                r.grabCursor && (!0 === i.allowSlideNext || !0 === i.allowSlidePrev) && i.setGrabCursor(!0),
                i.emit("sliderFirstMove", c)),
            i.emit("sliderMove", c),
            (s.isMoved = !0);
        let v = i.isHorizontal() ? m : g;
        (a.diff = v),
            (v *= r.touchRatio),
            l && (v = -v),
            (i.swipeDirection = v > 0 ? "prev" : "next"),
            (s.currentTranslate = v + s.startTranslate);
        let y = !0,
            _ = r.resistanceRatio;
        if (
            (r.touchReleaseOnEdges && (_ = 0),
            v > 0 && s.currentTranslate > i.minTranslate()
                ? ((y = !1),
                  r.resistance &&
                      (s.currentTranslate = i.minTranslate() - 1 + (-i.minTranslate() + s.startTranslate + v) ** _))
                : v < 0 &&
                  s.currentTranslate < i.maxTranslate() &&
                  ((y = !1),
                  r.resistance &&
                      (s.currentTranslate = i.maxTranslate() + 1 - (i.maxTranslate() - s.startTranslate - v) ** _)),
            y && (c.preventedByNestedSwiper = !0),
            !i.allowSlideNext &&
                "next" === i.swipeDirection &&
                s.currentTranslate < s.startTranslate &&
                (s.currentTranslate = s.startTranslate),
            !i.allowSlidePrev &&
                "prev" === i.swipeDirection &&
                s.currentTranslate > s.startTranslate &&
                (s.currentTranslate = s.startTranslate),
            i.allowSlidePrev || i.allowSlideNext || (s.currentTranslate = s.startTranslate),
            r.threshold > 0)
        ) {
            if (!(Math.abs(v) > r.threshold || s.allowThresholdMove))
                return void (s.currentTranslate = s.startTranslate);
            if (!s.allowThresholdMove)
                return (
                    (s.allowThresholdMove = !0),
                    (a.startX = a.currentX),
                    (a.startY = a.currentY),
                    (s.currentTranslate = s.startTranslate),
                    void (a.diff = i.isHorizontal() ? a.currentX - a.startX : a.currentY - a.startY)
                );
        }
        r.followFinger &&
            !r.cssMode &&
            (((r.freeMode && r.freeMode.enabled && i.freeMode) || r.watchSlidesProgress) &&
                (i.updateActiveIndex(), i.updateSlidesClasses()),
            i.params.freeMode && r.freeMode.enabled && i.freeMode && i.freeMode.onTouchMove(),
            i.updateProgress(s.currentTranslate),
            i.setTranslate(s.currentTranslate));
    }
    function T(e) {
        let t = this,
            i = t.touchEventsData,
            { params: n, touches: s, rtlTranslate: r, slidesGrid: a, enabled: l } = t;
        if (!l) return;
        let o = e;
        if (
            (o.originalEvent && (o = o.originalEvent),
            i.allowTouchCallbacks && t.emit("touchEnd", o),
            (i.allowTouchCallbacks = !1),
            !i.isTouched)
        )
            return i.isMoved && n.grabCursor && t.setGrabCursor(!1), (i.isMoved = !1), void (i.startMoving = !1);
        n.grabCursor &&
            i.isMoved &&
            i.isTouched &&
            (!0 === t.allowSlideNext || !0 === t.allowSlidePrev) &&
            t.setGrabCursor(!1);
        let d = p(),
            c = d - i.touchStartTime;
        if (t.allowClick) {
            let h = o.path || (o.composedPath && o.composedPath());
            t.updateClickedSlide((h && h[0]) || o.target),
                t.emit("tap click", o),
                c < 300 && d - i.lastClickTime < 300 && t.emit("doubleTap doubleClick", o);
        }
        if (
            ((i.lastClickTime = p()),
            u(() => {
                t.destroyed || (t.allowClick = !0);
            }),
            !i.isTouched || !i.isMoved || !t.swipeDirection || 0 === s.diff || i.currentTranslate === i.startTranslate)
        )
            return (i.isTouched = !1), (i.isMoved = !1), void (i.startMoving = !1);
        let f;
        if (
            ((i.isTouched = !1),
            (i.isMoved = !1),
            (i.startMoving = !1),
            (f = n.followFinger ? (r ? t.translate : -t.translate) : -i.currentTranslate),
            n.cssMode)
        )
            return;
        if (t.params.freeMode && n.freeMode.enabled) return void t.freeMode.onTouchEnd({ currentPos: f });
        let m = 0,
            g = t.slidesSizesGrid[0];
        for (let $ = 0; $ < a.length; $ += $ < n.slidesPerGroupSkip ? 1 : n.slidesPerGroup) {
            let v = $ < n.slidesPerGroupSkip - 1 ? 1 : n.slidesPerGroup;
            void 0 !== a[$ + v]
                ? f >= a[$] && f < a[$ + v] && ((m = $), (g = a[$ + v] - a[$]))
                : f >= a[$] && ((m = $), (g = a[a.length - 1] - a[a.length - 2]));
        }
        let y = null,
            _ = null;
        n.rewind &&
            (t.isBeginning
                ? (_ =
                      t.params.virtual && t.params.virtual.enabled && t.virtual
                          ? t.virtual.slides.length - 1
                          : t.slides.length - 1)
                : t.isEnd && (y = 0));
        let b = (f - a[m]) / g,
            x = m < n.slidesPerGroupSkip - 1 ? 1 : n.slidesPerGroup;
        if (c > n.longSwipesMs) {
            if (!n.longSwipes) return void t.slideTo(t.activeIndex);
            "next" === t.swipeDirection &&
                (b >= n.longSwipesRatio ? t.slideTo(n.rewind && t.isEnd ? y : m + x) : t.slideTo(m)),
                "prev" === t.swipeDirection &&
                    (b > 1 - n.longSwipesRatio
                        ? t.slideTo(m + x)
                        : null !== _ && b < 0 && Math.abs(b) > n.longSwipesRatio
                          ? t.slideTo(_)
                          : t.slideTo(m));
        } else {
            if (!n.shortSwipes) return void t.slideTo(t.activeIndex);
            t.navigation && (o.target === t.navigation.nextEl || o.target === t.navigation.prevEl)
                ? o.target === t.navigation.nextEl
                    ? t.slideTo(m + x)
                    : t.slideTo(m)
                : ("next" === t.swipeDirection && t.slideTo(null !== y ? y : m + x),
                  "prev" === t.swipeDirection && t.slideTo(null !== _ ? _ : m));
        }
    }
    function C() {
        let e = this,
            { params: t, el: i } = e;
        if (i && 0 === i.offsetWidth) return;
        t.breakpoints && e.setBreakpoint();
        let { allowSlideNext: n, allowSlidePrev: s, snapGrid: r } = e;
        (e.allowSlideNext = !0),
            (e.allowSlidePrev = !0),
            e.updateSize(),
            e.updateSlides(),
            e.updateSlidesClasses(),
            ("auto" === t.slidesPerView || t.slidesPerView > 1) && e.isEnd && !e.isBeginning && !e.params.centeredSlides
                ? e.slideTo(e.slides.length - 1, 0, !1, !0)
                : e.slideTo(e.activeIndex, 0, !1, !0),
            e.autoplay && e.autoplay.running && e.autoplay.paused && e.autoplay.run(),
            (e.allowSlidePrev = s),
            (e.allowSlideNext = n),
            e.params.watchOverflow && r !== e.snapGrid && e.checkOverflow();
    }
    function k(e) {
        this.enabled &&
            (this.allowClick ||
                (this.params.preventClicks && e.preventDefault(),
                this.params.preventClicksPropagation &&
                    this.animating &&
                    (e.stopPropagation(), e.stopImmediatePropagation())));
    }
    function P() {
        let e = this,
            { wrapperEl: t, rtlTranslate: i, enabled: n } = e;
        if (!n) return;
        let s;
        (e.previousTranslate = e.translate),
            e.isHorizontal() ? (e.translate = -t.scrollLeft) : (e.translate = -t.scrollTop),
            0 === e.translate && (e.translate = 0),
            e.updateActiveIndex(),
            e.updateSlidesClasses();
        let r = e.maxTranslate() - e.minTranslate();
        (s = 0 === r ? 0 : (e.translate - e.minTranslate()) / r) !== e.progress &&
            e.updateProgress(i ? -e.translate : e.translate),
            e.emit("setTranslate", e.translate, !1);
    }
    Object.keys(c).forEach((e) => {
        Object.defineProperty(d.fn, e, { value: c[e], writable: !0 });
    });
    let A = !1;
    function z() {}
    let L = (e, t) => {
            let i = n(),
                { params: s, touchEvents: r, el: a, wrapperEl: l, device: o, support: d } = e,
                c = !!s.nested,
                u = "on" === t ? "addEventListener" : "removeEventListener",
                p = t;
            if (d.touch) {
                let h = !("touchstart" !== r.start || !d.passiveListener || !s.passiveListeners) && {
                    passive: !0,
                    capture: !1,
                };
                a[u](r.start, e.onTouchStart, h),
                    a[u](r.move, e.onTouchMove, d.passiveListener ? { passive: !1, capture: c } : c),
                    a[u](r.end, e.onTouchEnd, h),
                    r.cancel && a[u](r.cancel, e.onTouchEnd, h);
            } else a[u](r.start, e.onTouchStart, !1), i[u](r.move, e.onTouchMove, c), i[u](r.end, e.onTouchEnd, !1);
            (s.preventClicks || s.preventClicksPropagation) && a[u]("click", e.onClick, !0),
                s.cssMode && l[u]("scroll", e.onScroll),
                s.updateOnWindowResize
                    ? e[p](
                          o.ios || o.android ? "resize orientationchange observerUpdate" : "resize observerUpdate",
                          C,
                          !0
                      )
                    : e[p]("observerUpdate", C, !0);
        },
        O = (e, t) => e.grid && t.grid && t.grid.rows > 1;
    var M = {
        init: !0,
        direction: "horizontal",
        touchEventsTarget: "wrapper",
        initialSlide: 0,
        speed: 300,
        cssMode: !1,
        updateOnWindowResize: !0,
        resizeObserver: !0,
        nested: !1,
        createElements: !1,
        enabled: !0,
        focusableElements: "input, select, option, textarea, button, video, label",
        width: null,
        height: null,
        preventInteractionOnTransition: !1,
        userAgent: null,
        url: null,
        edgeSwipeDetection: !1,
        edgeSwipeThreshold: 20,
        autoHeight: !1,
        setWrapperSize: !1,
        virtualTranslate: !1,
        effect: "slide",
        breakpoints: void 0,
        breakpointsBase: "window",
        spaceBetween: 0,
        slidesPerView: 1,
        slidesPerGroup: 1,
        slidesPerGroupSkip: 0,
        slidesPerGroupAuto: !1,
        centeredSlides: !1,
        centeredSlidesBounds: !1,
        slidesOffsetBefore: 0,
        slidesOffsetAfter: 0,
        normalizeSlideIndex: !0,
        centerInsufficientSlides: !1,
        watchOverflow: !0,
        roundLengths: !1,
        touchRatio: 1,
        touchAngle: 45,
        simulateTouch: !0,
        shortSwipes: !0,
        longSwipes: !0,
        longSwipesRatio: 0.5,
        longSwipesMs: 300,
        followFinger: !0,
        allowTouchMove: !0,
        threshold: 0,
        touchMoveStopPropagation: !1,
        touchStartPreventDefault: !0,
        touchStartForcePreventDefault: !1,
        touchReleaseOnEdges: !1,
        uniqueNavElements: !0,
        resistance: !0,
        resistanceRatio: 0.85,
        watchSlidesProgress: !1,
        grabCursor: !1,
        preventClicks: !0,
        preventClicksPropagation: !0,
        slideToClickedSlide: !1,
        preloadImages: !0,
        updateOnImagesReady: !0,
        loop: !1,
        loopAdditionalSlides: 0,
        loopedSlides: null,
        loopFillGroupWithBlank: !1,
        loopPreventsSlide: !0,
        rewind: !1,
        allowSlidePrev: !0,
        allowSlideNext: !0,
        swipeHandler: null,
        noSwiping: !0,
        noSwipingClass: "swiper-no-swiping",
        noSwipingSelector: null,
        passiveListeners: !0,
        maxBackfaceHiddenSlides: 10,
        containerModifierClass: "swiper-",
        slideClass: "swiper-slide",
        slideBlankClass: "swiper-slide-invisible-blank",
        slideActiveClass: "swiper-slide-active",
        slideDuplicateActiveClass: "swiper-slide-duplicate-active",
        slideVisibleClass: "swiper-slide-visible",
        slideDuplicateClass: "swiper-slide-duplicate",
        slideNextClass: "swiper-slide-next",
        slideDuplicateNextClass: "swiper-slide-duplicate-next",
        slidePrevClass: "swiper-slide-prev",
        slideDuplicatePrevClass: "swiper-slide-duplicate-prev",
        wrapperClass: "swiper-wrapper",
        runCallbacksOnInit: !0,
        _emitClasses: !1,
    };
    let I = {
            eventsEmitter: {
                on(e, t, i) {
                    let n = this;
                    if (!n.eventsListeners || n.destroyed || "function" != typeof t) return n;
                    let s = i ? "unshift" : "push";
                    return (
                        e.split(" ").forEach((e) => {
                            n.eventsListeners[e] || (n.eventsListeners[e] = []), n.eventsListeners[e][s](t);
                        }),
                        n
                    );
                },
                once(e, t, i) {
                    let n = this;
                    if (!n.eventsListeners || n.destroyed || "function" != typeof t) return n;
                    function s() {
                        n.off(e, s), s.__emitterProxy && delete s.__emitterProxy;
                        for (var i = arguments.length, r = Array(i), a = 0; a < i; a++) r[a] = arguments[a];
                        t.apply(n, r);
                    }
                    return (s.__emitterProxy = t), n.on(e, s, i);
                },
                onAny(e, t) {
                    return (
                        !this.eventsListeners ||
                            this.destroyed ||
                            "function" != typeof e ||
                            (0 > this.eventsAnyListeners.indexOf(e) &&
                                this.eventsAnyListeners[t ? "unshift" : "push"](e)),
                        this
                    );
                },
                offAny(e) {
                    if (!this.eventsListeners || this.destroyed || !this.eventsAnyListeners) return this;
                    let t = this.eventsAnyListeners.indexOf(e);
                    return t >= 0 && this.eventsAnyListeners.splice(t, 1), this;
                },
                off(e, t) {
                    let i = this;
                    return (
                        !i.eventsListeners ||
                            i.destroyed ||
                            (i.eventsListeners &&
                                e.split(" ").forEach((e) => {
                                    void 0 === t
                                        ? (i.eventsListeners[e] = [])
                                        : i.eventsListeners[e] &&
                                          i.eventsListeners[e].forEach((n, s) => {
                                              (n === t || (n.__emitterProxy && n.__emitterProxy === t)) &&
                                                  i.eventsListeners[e].splice(s, 1);
                                          });
                                })),
                        i
                    );
                },
                emit() {
                    let e = this;
                    if (!e.eventsListeners || e.destroyed || !e.eventsListeners) return e;
                    let t, i, n;
                    for (var s = arguments.length, r = Array(s), a = 0; a < s; a++) r[a] = arguments[a];
                    return (
                        "string" == typeof r[0] || Array.isArray(r[0])
                            ? ((t = r[0]), (i = r.slice(1, r.length)), (n = e))
                            : ((t = r[0].events), (i = r[0].data), (n = r[0].context || e)),
                        i.unshift(n),
                        (Array.isArray(t) ? t : t.split(" ")).forEach((t) => {
                            e.eventsAnyListeners &&
                                e.eventsAnyListeners.length &&
                                e.eventsAnyListeners.forEach((e) => {
                                    e.apply(n, [t, ...i]);
                                }),
                                e.eventsListeners &&
                                    e.eventsListeners[t] &&
                                    e.eventsListeners[t].forEach((e) => {
                                        e.apply(n, i);
                                    });
                        }),
                        e
                    );
                },
            },
            update: {
                updateSize: function () {
                    let e,
                        t,
                        i = this.$el;
                    (e =
                        void 0 !== this.params.width && null !== this.params.width
                            ? this.params.width
                            : i[0].clientWidth),
                        (t =
                            void 0 !== this.params.height && null !== this.params.height
                                ? this.params.height
                                : i[0].clientHeight),
                        (0 === e && this.isHorizontal()) ||
                            (0 === t && this.isVertical()) ||
                            ((e =
                                e -
                                parseInt(i.css("padding-left") || 0, 10) -
                                parseInt(i.css("padding-right") || 0, 10)),
                            (t =
                                t -
                                parseInt(i.css("padding-top") || 0, 10) -
                                parseInt(i.css("padding-bottom") || 0, 10)),
                            Number.isNaN(e) && (e = 0),
                            Number.isNaN(t) && (t = 0),
                            Object.assign(this, { width: e, height: t, size: this.isHorizontal() ? e : t }));
                },
                updateSlides: function () {
                    let e = this;
                    function t(t) {
                        return e.isHorizontal()
                            ? t
                            : {
                                  width: "height",
                                  "margin-top": "margin-left",
                                  "margin-bottom ": "margin-right",
                                  "margin-left": "margin-top",
                                  "margin-right": "margin-bottom",
                                  "padding-left": "padding-top",
                                  "padding-right": "padding-bottom",
                                  marginRight: "marginBottom",
                              }[t];
                    }
                    function i(e, i) {
                        return parseFloat(e.getPropertyValue(t(i)) || 0);
                    }
                    let n = e.params,
                        { $wrapperEl: s, size: r, rtlTranslate: a, wrongRTL: l } = e,
                        o = e.virtual && n.virtual.enabled,
                        d = o ? e.virtual.slides.length : e.slides.length,
                        c = s.children(`.${e.params.slideClass}`),
                        u = o ? e.virtual.slides.length : c.length,
                        p = [],
                        h = [],
                        f = [],
                        m = n.slidesOffsetBefore;
                    "function" == typeof m && (m = n.slidesOffsetBefore.call(e));
                    let g = n.slidesOffsetAfter;
                    "function" == typeof g && (g = n.slidesOffsetAfter.call(e));
                    let v = e.snapGrid.length,
                        y = e.slidesGrid.length,
                        _ = n.spaceBetween,
                        b = -m,
                        x = 0,
                        w = 0;
                    if (void 0 === r) return;
                    "string" == typeof _ && _.indexOf("%") >= 0 && (_ = (parseFloat(_.replace("%", "")) / 100) * r),
                        (e.virtualSize = -_),
                        a
                            ? c.css({ marginLeft: "", marginBottom: "", marginTop: "" })
                            : c.css({ marginRight: "", marginBottom: "", marginTop: "" }),
                        n.centeredSlides &&
                            n.cssMode &&
                            ($(e.wrapperEl, "--swiper-centered-offset-before", ""),
                            $(e.wrapperEl, "--swiper-centered-offset-after", ""));
                    let S = n.grid && n.grid.rows > 1 && e.grid,
                        E;
                    S && e.grid.initSlides(u);
                    let T =
                        "auto" === n.slidesPerView &&
                        n.breakpoints &&
                        Object.keys(n.breakpoints).filter((e) => void 0 !== n.breakpoints[e].slidesPerView).length > 0;
                    for (let C = 0; C < u; C += 1) {
                        E = 0;
                        let k = c.eq(C);
                        if ((S && e.grid.updateSlide(C, k, u, t), "none" !== k.css("display"))) {
                            if ("auto" === n.slidesPerView) {
                                T && (c[C].style[t("width")] = "");
                                let P = getComputedStyle(k[0]),
                                    A = k[0].style.transform,
                                    z = k[0].style.webkitTransform;
                                if (
                                    (A && (k[0].style.transform = "none"),
                                    z && (k[0].style.webkitTransform = "none"),
                                    n.roundLengths)
                                )
                                    E = e.isHorizontal() ? k.outerWidth(!0) : k.outerHeight(!0);
                                else {
                                    let L = i(P, "width"),
                                        O = i(P, "padding-left"),
                                        M = i(P, "padding-right"),
                                        I = i(P, "margin-left"),
                                        D = i(P, "margin-right"),
                                        N = P.getPropertyValue("box-sizing");
                                    if (N && "border-box" === N) E = L + I + D;
                                    else {
                                        let { clientWidth: B, offsetWidth: V } = k[0];
                                        E = L + O + M + I + D + (V - B);
                                    }
                                }
                                A && (k[0].style.transform = A),
                                    z && (k[0].style.webkitTransform = z),
                                    n.roundLengths && (E = Math.floor(E));
                            } else
                                (E = (r - (n.slidesPerView - 1) * _) / n.slidesPerView),
                                    n.roundLengths && (E = Math.floor(E)),
                                    c[C] && (c[C].style[t("width")] = `${E}px`);
                            c[C] && (c[C].swiperSlideSize = E),
                                f.push(E),
                                n.centeredSlides
                                    ? ((b = b + E / 2 + x / 2 + _),
                                      0 === x && 0 !== C && (b = b - r / 2 - _),
                                      0 === C && (b = b - r / 2 - _),
                                      0.001 > Math.abs(b) && (b = 0),
                                      n.roundLengths && (b = Math.floor(b)),
                                      w % n.slidesPerGroup == 0 && p.push(b),
                                      h.push(b))
                                    : (n.roundLengths && (b = Math.floor(b)),
                                      (w - Math.min(e.params.slidesPerGroupSkip, w)) % e.params.slidesPerGroup == 0 &&
                                          p.push(b),
                                      h.push(b),
                                      (b = b + E + _)),
                                (e.virtualSize += E + _),
                                (x = E),
                                (w += 1);
                        }
                    }
                    if (
                        ((e.virtualSize = Math.max(e.virtualSize, r) + g),
                        a &&
                            l &&
                            ("slide" === n.effect || "coverflow" === n.effect) &&
                            s.css({ width: `${e.virtualSize + n.spaceBetween}px` }),
                        n.setWrapperSize && s.css({ [t("width")]: `${e.virtualSize + n.spaceBetween}px` }),
                        S && e.grid.updateWrapperSize(E, p, t),
                        !n.centeredSlides)
                    ) {
                        let X = [];
                        for (let Y = 0; Y < p.length; Y += 1) {
                            let R = p[Y];
                            n.roundLengths && (R = Math.floor(R)), p[Y] <= e.virtualSize - r && X.push(R);
                        }
                        (p = X),
                            Math.floor(e.virtualSize - r) - Math.floor(p[p.length - 1]) > 1 &&
                                p.push(e.virtualSize - r);
                    }
                    if ((0 === p.length && (p = [0]), 0 !== n.spaceBetween)) {
                        let H = e.isHorizontal() && a ? "marginLeft" : t("marginRight");
                        c.filter((e, t) => !n.cssMode || t !== c.length - 1).css({ [H]: `${_}px` });
                    }
                    if (n.centeredSlides && n.centeredSlidesBounds) {
                        let q = 0;
                        f.forEach((e) => {
                            q += e + (n.spaceBetween ? n.spaceBetween : 0);
                        }),
                            (q -= n.spaceBetween);
                        let G = q - r;
                        p = p.map((e) => (e < 0 ? -m : e > G ? G + g : e));
                    }
                    if (n.centerInsufficientSlides) {
                        let W = 0;
                        if (
                            (f.forEach((e) => {
                                W += e + (n.spaceBetween ? n.spaceBetween : 0);
                            }),
                            (W -= n.spaceBetween) < r)
                        ) {
                            let F = (r - W) / 2;
                            p.forEach((e, t) => {
                                p[t] = e - F;
                            }),
                                h.forEach((e, t) => {
                                    h[t] = e + F;
                                });
                        }
                    }
                    if (
                        (Object.assign(e, { slides: c, snapGrid: p, slidesGrid: h, slidesSizesGrid: f }),
                        n.centeredSlides && n.cssMode && !n.centeredSlidesBounds)
                    ) {
                        $(e.wrapperEl, "--swiper-centered-offset-before", -p[0] + "px"),
                            $(e.wrapperEl, "--swiper-centered-offset-after", e.size / 2 - f[f.length - 1] / 2 + "px");
                        let j = -e.snapGrid[0],
                            U = -e.slidesGrid[0];
                        (e.snapGrid = e.snapGrid.map((e) => e + j)), (e.slidesGrid = e.slidesGrid.map((e) => e + U));
                    }
                    if (
                        (u !== d && e.emit("slidesLengthChange"),
                        p.length !== v && (e.params.watchOverflow && e.checkOverflow(), e.emit("snapGridLengthChange")),
                        h.length !== y && e.emit("slidesGridLengthChange"),
                        n.watchSlidesProgress && e.updateSlidesOffset(),
                        !(o || n.cssMode || ("slide" !== n.effect && "fade" !== n.effect)))
                    ) {
                        let Z = `${n.containerModifierClass}backface-hidden`,
                            Q = e.$el.hasClass(Z);
                        u <= n.maxBackfaceHiddenSlides ? Q || e.$el.addClass(Z) : Q && e.$el.removeClass(Z);
                    }
                },
                updateAutoHeight: function (e) {
                    let t = this,
                        i = [],
                        n = t.virtual && t.params.virtual.enabled,
                        s,
                        r = 0;
                    "number" == typeof e ? t.setTransition(e) : !0 === e && t.setTransition(t.params.speed);
                    let a = (e) =>
                        n
                            ? t.slides.filter((t) => parseInt(t.getAttribute("data-swiper-slide-index"), 10) === e)[0]
                            : t.slides.eq(e)[0];
                    if ("auto" !== t.params.slidesPerView && t.params.slidesPerView > 1) {
                        if (t.params.centeredSlides)
                            t.visibleSlides.each((e) => {
                                i.push(e);
                            });
                        else
                            for (s = 0; s < Math.ceil(t.params.slidesPerView); s += 1) {
                                let l = t.activeIndex + s;
                                if (l > t.slides.length && !n) break;
                                i.push(a(l));
                            }
                    } else i.push(a(t.activeIndex));
                    for (s = 0; s < i.length; s += 1)
                        if (void 0 !== i[s]) {
                            let o = i[s].offsetHeight;
                            r = o > r ? o : r;
                        }
                    (r || 0 === r) && t.$wrapperEl.css("height", `${r}px`);
                },
                updateSlidesOffset: function () {
                    let e = this.slides;
                    for (let t = 0; t < e.length; t += 1)
                        e[t].swiperSlideOffset = this.isHorizontal() ? e[t].offsetLeft : e[t].offsetTop;
                },
                updateSlidesProgress: function (e) {
                    void 0 === e && (e = (this && this.translate) || 0);
                    let t = this,
                        i = t.params,
                        { slides: n, rtlTranslate: s, snapGrid: r } = t;
                    if (0 === n.length) return;
                    void 0 === n[0].swiperSlideOffset && t.updateSlidesOffset();
                    let a = -e;
                    s && (a = e),
                        n.removeClass(i.slideVisibleClass),
                        (t.visibleSlidesIndexes = []),
                        (t.visibleSlides = []);
                    for (let l = 0; l < n.length; l += 1) {
                        let o = n[l],
                            c = o.swiperSlideOffset;
                        i.cssMode && i.centeredSlides && (c -= n[0].swiperSlideOffset);
                        let u =
                                (a + (i.centeredSlides ? t.minTranslate() : 0) - c) /
                                (o.swiperSlideSize + i.spaceBetween),
                            p =
                                (a - r[0] + (i.centeredSlides ? t.minTranslate() : 0) - c) /
                                (o.swiperSlideSize + i.spaceBetween),
                            h = -(a - c),
                            f = h + t.slidesSizesGrid[l];
                        ((h >= 0 && h < t.size - 1) || (f > 1 && f <= t.size) || (h <= 0 && f >= t.size)) &&
                            (t.visibleSlides.push(o),
                            t.visibleSlidesIndexes.push(l),
                            n.eq(l).addClass(i.slideVisibleClass)),
                            (o.progress = s ? -u : u),
                            (o.originalProgress = s ? -p : p);
                    }
                    t.visibleSlides = d(t.visibleSlides);
                },
                updateProgress: function (e) {
                    if (void 0 === e) {
                        let t = this.rtlTranslate ? -1 : 1;
                        e = (this && this.translate && this.translate * t) || 0;
                    }
                    let i = this.params,
                        n = this.maxTranslate() - this.minTranslate(),
                        { progress: s, isBeginning: r, isEnd: a } = this,
                        l = r,
                        o = a;
                    0 === n
                        ? ((s = 0), (r = !0), (a = !0))
                        : ((r = (s = (e - this.minTranslate()) / n) <= 0), (a = s >= 1)),
                        Object.assign(this, { progress: s, isBeginning: r, isEnd: a }),
                        (i.watchSlidesProgress || (i.centeredSlides && i.autoHeight)) && this.updateSlidesProgress(e),
                        r && !l && this.emit("reachBeginning toEdge"),
                        a && !o && this.emit("reachEnd toEdge"),
                        ((l && !r) || (o && !a)) && this.emit("fromEdge"),
                        this.emit("progress", s);
                },
                updateSlidesClasses: function () {
                    let { slides: e, params: t, $wrapperEl: i, activeIndex: n, realIndex: s } = this,
                        r = this.virtual && t.virtual.enabled,
                        a;
                    e.removeClass(
                        `${t.slideActiveClass} ${t.slideNextClass} ${t.slidePrevClass} ${t.slideDuplicateActiveClass} ${t.slideDuplicateNextClass} ${t.slideDuplicatePrevClass}`
                    ),
                        (a = r
                            ? this.$wrapperEl.find(`.${t.slideClass}[data-swiper-slide-index="${n}"]`)
                            : e.eq(n)).addClass(t.slideActiveClass),
                        t.loop &&
                            (a.hasClass(t.slideDuplicateClass)
                                ? i
                                      .children(
                                          `.${t.slideClass}:not(.${t.slideDuplicateClass})[data-swiper-slide-index="${s}"]`
                                      )
                                      .addClass(t.slideDuplicateActiveClass)
                                : i
                                      .children(
                                          `.${t.slideClass}.${t.slideDuplicateClass}[data-swiper-slide-index="${s}"]`
                                      )
                                      .addClass(t.slideDuplicateActiveClass));
                    let l = a.nextAll(`.${t.slideClass}`).eq(0).addClass(t.slideNextClass);
                    t.loop && 0 === l.length && (l = e.eq(0)).addClass(t.slideNextClass);
                    let o = a.prevAll(`.${t.slideClass}`).eq(0).addClass(t.slidePrevClass);
                    t.loop && 0 === o.length && (o = e.eq(-1)).addClass(t.slidePrevClass),
                        t.loop &&
                            (l.hasClass(t.slideDuplicateClass)
                                ? i
                                      .children(
                                          `.${t.slideClass}:not(.${t.slideDuplicateClass})[data-swiper-slide-index="${l.attr("data-swiper-slide-index")}"]`
                                      )
                                      .addClass(t.slideDuplicateNextClass)
                                : i
                                      .children(
                                          `.${t.slideClass}.${t.slideDuplicateClass}[data-swiper-slide-index="${l.attr("data-swiper-slide-index")}"]`
                                      )
                                      .addClass(t.slideDuplicateNextClass),
                            o.hasClass(t.slideDuplicateClass)
                                ? i
                                      .children(
                                          `.${t.slideClass}:not(.${t.slideDuplicateClass})[data-swiper-slide-index="${o.attr("data-swiper-slide-index")}"]`
                                      )
                                      .addClass(t.slideDuplicatePrevClass)
                                : i
                                      .children(
                                          `.${t.slideClass}.${t.slideDuplicateClass}[data-swiper-slide-index="${o.attr("data-swiper-slide-index")}"]`
                                      )
                                      .addClass(t.slideDuplicatePrevClass)),
                        this.emitSlidesClasses();
                },
                updateActiveIndex: function (e) {
                    let t = this,
                        i = t.rtlTranslate ? t.translate : -t.translate,
                        { slidesGrid: n, snapGrid: s, params: r, activeIndex: a, realIndex: l, snapIndex: o } = t,
                        d,
                        c = e;
                    if (void 0 === c) {
                        for (let u = 0; u < n.length; u += 1)
                            void 0 !== n[u + 1]
                                ? i >= n[u] && i < n[u + 1] - (n[u + 1] - n[u]) / 2
                                    ? (c = u)
                                    : i >= n[u] && i < n[u + 1] && (c = u + 1)
                                : i >= n[u] && (c = u);
                        r.normalizeSlideIndex && (c < 0 || void 0 === c) && (c = 0);
                    }
                    if (s.indexOf(i) >= 0) d = s.indexOf(i);
                    else {
                        let p = Math.min(r.slidesPerGroupSkip, c);
                        d = p + Math.floor((c - p) / r.slidesPerGroup);
                    }
                    if ((d >= s.length && (d = s.length - 1), c === a))
                        return void (d !== o && ((t.snapIndex = d), t.emit("snapIndexChange")));
                    let h = parseInt(t.slides.eq(c).attr("data-swiper-slide-index") || c, 10);
                    Object.assign(t, { snapIndex: d, realIndex: h, previousIndex: a, activeIndex: c }),
                        t.emit("activeIndexChange"),
                        t.emit("snapIndexChange"),
                        l !== h && t.emit("realIndexChange"),
                        (t.initialized || t.params.runCallbacksOnInit) && t.emit("slideChange");
                },
                updateClickedSlide: function (e) {
                    let t = this,
                        i = t.params,
                        n = d(e).closest(`.${i.slideClass}`)[0],
                        s,
                        r = !1;
                    if (n) {
                        for (let a = 0; a < t.slides.length; a += 1)
                            if (t.slides[a] === n) {
                                (r = !0), (s = a);
                                break;
                            }
                    }
                    if (!n || !r) return (t.clickedSlide = void 0), void (t.clickedIndex = void 0);
                    (t.clickedSlide = n),
                        t.virtual && t.params.virtual.enabled
                            ? (t.clickedIndex = parseInt(d(n).attr("data-swiper-slide-index"), 10))
                            : (t.clickedIndex = s),
                        i.slideToClickedSlide &&
                            void 0 !== t.clickedIndex &&
                            t.clickedIndex !== t.activeIndex &&
                            t.slideToClickedSlide();
                },
            },
            translate: {
                getTranslate: function (e) {
                    void 0 === e && (e = this.isHorizontal() ? "x" : "y");
                    let { params: t, rtlTranslate: i, translate: n, $wrapperEl: s } = this;
                    if (t.virtualTranslate) return i ? -n : n;
                    if (t.cssMode) return n;
                    let r = h(s[0], e);
                    return i && (r = -r), r || 0;
                },
                setTranslate: function (e, t) {
                    let i = this,
                        { rtlTranslate: n, params: s, $wrapperEl: r, wrapperEl: a, progress: l } = i,
                        o,
                        d = 0,
                        c = 0;
                    i.isHorizontal() ? (d = n ? -e : e) : (c = e),
                        s.roundLengths && ((d = Math.floor(d)), (c = Math.floor(c))),
                        s.cssMode
                            ? (a[i.isHorizontal() ? "scrollLeft" : "scrollTop"] = i.isHorizontal() ? -d : -c)
                            : s.virtualTranslate || r.transform(`translate3d(${d}px, ${c}px, 0px)`),
                        (i.previousTranslate = i.translate),
                        (i.translate = i.isHorizontal() ? d : c);
                    let u = i.maxTranslate() - i.minTranslate();
                    (o = 0 === u ? 0 : (e - i.minTranslate()) / u) !== l && i.updateProgress(e),
                        i.emit("setTranslate", i.translate, t);
                },
                minTranslate: function () {
                    return -this.snapGrid[0];
                },
                maxTranslate: function () {
                    return -this.snapGrid[this.snapGrid.length - 1];
                },
                translateTo: function (e, t, i, n, s) {
                    void 0 === e && (e = 0),
                        void 0 === t && (t = this.params.speed),
                        void 0 === i && (i = !0),
                        void 0 === n && (n = !0);
                    let r = this,
                        { params: a, wrapperEl: l } = r;
                    if (r.animating && a.preventInteractionOnTransition) return !1;
                    let o = r.minTranslate(),
                        d = r.maxTranslate(),
                        c;
                    if (((c = n && e > o ? o : n && e < d ? d : e), r.updateProgress(c), a.cssMode)) {
                        let u = r.isHorizontal();
                        if (0 === t) l[u ? "scrollLeft" : "scrollTop"] = -c;
                        else {
                            if (!r.support.smoothScroll)
                                return v({ swiper: r, targetPosition: -c, side: u ? "left" : "top" }), !0;
                            l.scrollTo({ [u ? "left" : "top"]: -c, behavior: "smooth" });
                        }
                        return !0;
                    }
                    return (
                        0 === t
                            ? (r.setTransition(0),
                              r.setTranslate(c),
                              i && (r.emit("beforeTransitionStart", t, s), r.emit("transitionEnd")))
                            : (r.setTransition(t),
                              r.setTranslate(c),
                              i && (r.emit("beforeTransitionStart", t, s), r.emit("transitionStart")),
                              r.animating ||
                                  ((r.animating = !0),
                                  r.onTranslateToWrapperTransitionEnd ||
                                      (r.onTranslateToWrapperTransitionEnd = function (e) {
                                          r &&
                                              !r.destroyed &&
                                              e.target === this &&
                                              (r.$wrapperEl[0].removeEventListener(
                                                  "transitionend",
                                                  r.onTranslateToWrapperTransitionEnd
                                              ),
                                              r.$wrapperEl[0].removeEventListener(
                                                  "webkitTransitionEnd",
                                                  r.onTranslateToWrapperTransitionEnd
                                              ),
                                              (r.onTranslateToWrapperTransitionEnd = null),
                                              delete r.onTranslateToWrapperTransitionEnd,
                                              i && r.emit("transitionEnd"));
                                      }),
                                  r.$wrapperEl[0].addEventListener(
                                      "transitionend",
                                      r.onTranslateToWrapperTransitionEnd
                                  ),
                                  r.$wrapperEl[0].addEventListener(
                                      "webkitTransitionEnd",
                                      r.onTranslateToWrapperTransitionEnd
                                  ))),
                        !0
                    );
                },
            },
            transition: {
                setTransition: function (e, t) {
                    this.params.cssMode || this.$wrapperEl.transition(e), this.emit("setTransition", e, t);
                },
                transitionStart: function (e, t) {
                    void 0 === e && (e = !0);
                    let { params: i } = this;
                    i.cssMode ||
                        (i.autoHeight && this.updateAutoHeight(),
                        w({ swiper: this, runCallbacks: e, direction: t, step: "Start" }));
                },
                transitionEnd: function (e, t) {
                    void 0 === e && (e = !0);
                    let i = this,
                        { params: n } = i;
                    (i.animating = !1),
                        n.cssMode || (i.setTransition(0), w({ swiper: i, runCallbacks: e, direction: t, step: "End" }));
                },
            },
            slide: {
                slideTo: function (e, t, i, n, s) {
                    if (
                        (void 0 === e && (e = 0),
                        void 0 === t && (t = this.params.speed),
                        void 0 === i && (i = !0),
                        "number" != typeof e && "string" != typeof e)
                    )
                        throw Error(
                            `The 'index' argument cannot have type other than 'number' or 'string'. [${typeof e}] given.`
                        );
                    if ("string" == typeof e) {
                        let r = parseInt(e, 10);
                        if (!isFinite(r))
                            throw Error(
                                `The passed-in 'index' (string) couldn't be converted to 'number'. [${e}] given.`
                            );
                        e = r;
                    }
                    let a = this,
                        l = e;
                    l < 0 && (l = 0);
                    let {
                        params: o,
                        snapGrid: d,
                        slidesGrid: c,
                        previousIndex: u,
                        activeIndex: p,
                        rtlTranslate: h,
                        wrapperEl: f,
                        enabled: m,
                    } = a;
                    if ((a.animating && o.preventInteractionOnTransition) || (!m && !n && !s)) return !1;
                    let g = Math.min(a.params.slidesPerGroupSkip, l),
                        $ = g + Math.floor((l - g) / a.params.slidesPerGroup);
                    $ >= d.length && ($ = d.length - 1),
                        (p || o.initialSlide || 0) === (u || 0) && i && a.emit("beforeSlideChangeStart");
                    let y = -d[$];
                    if ((a.updateProgress(y), o.normalizeSlideIndex))
                        for (let _ = 0; _ < c.length; _ += 1) {
                            let b = -Math.floor(100 * y),
                                x = Math.floor(100 * c[_]),
                                w = Math.floor(100 * c[_ + 1]);
                            void 0 !== c[_ + 1]
                                ? b >= x && b < w - (w - x) / 2
                                    ? (l = _)
                                    : b >= x && b < w && (l = _ + 1)
                                : b >= x && (l = _);
                        }
                    if (
                        a.initialized &&
                        l !== p &&
                        ((!a.allowSlideNext && y < a.translate && y < a.minTranslate()) ||
                            (!a.allowSlidePrev && y > a.translate && y > a.maxTranslate() && (p || 0) !== l))
                    )
                        return !1;
                    let S;
                    if (
                        ((S = l > p ? "next" : l < p ? "prev" : "reset"),
                        (h && -y === a.translate) || (!h && y === a.translate))
                    )
                        return (
                            a.updateActiveIndex(l),
                            o.autoHeight && a.updateAutoHeight(),
                            a.updateSlidesClasses(),
                            "slide" !== o.effect && a.setTranslate(y),
                            "reset" !== S && (a.transitionStart(i, S), a.transitionEnd(i, S)),
                            !1
                        );
                    if (o.cssMode) {
                        let E = a.isHorizontal(),
                            T = h ? y : -y;
                        if (0 === t) {
                            let C = a.virtual && a.params.virtual.enabled;
                            C && ((a.wrapperEl.style.scrollSnapType = "none"), (a._immediateVirtual = !0)),
                                (f[E ? "scrollLeft" : "scrollTop"] = T),
                                C &&
                                    requestAnimationFrame(() => {
                                        (a.wrapperEl.style.scrollSnapType = ""), (a._swiperImmediateVirtual = !1);
                                    });
                        } else {
                            if (!a.support.smoothScroll)
                                return v({ swiper: a, targetPosition: T, side: E ? "left" : "top" }), !0;
                            f.scrollTo({ [E ? "left" : "top"]: T, behavior: "smooth" });
                        }
                        return !0;
                    }
                    return (
                        a.setTransition(t),
                        a.setTranslate(y),
                        a.updateActiveIndex(l),
                        a.updateSlidesClasses(),
                        a.emit("beforeTransitionStart", t, n),
                        a.transitionStart(i, S),
                        0 === t
                            ? a.transitionEnd(i, S)
                            : a.animating ||
                              ((a.animating = !0),
                              a.onSlideToWrapperTransitionEnd ||
                                  (a.onSlideToWrapperTransitionEnd = function (e) {
                                      a &&
                                          !a.destroyed &&
                                          e.target === this &&
                                          (a.$wrapperEl[0].removeEventListener(
                                              "transitionend",
                                              a.onSlideToWrapperTransitionEnd
                                          ),
                                          a.$wrapperEl[0].removeEventListener(
                                              "webkitTransitionEnd",
                                              a.onSlideToWrapperTransitionEnd
                                          ),
                                          (a.onSlideToWrapperTransitionEnd = null),
                                          delete a.onSlideToWrapperTransitionEnd,
                                          a.transitionEnd(i, S));
                                  }),
                              a.$wrapperEl[0].addEventListener("transitionend", a.onSlideToWrapperTransitionEnd),
                              a.$wrapperEl[0].addEventListener("webkitTransitionEnd", a.onSlideToWrapperTransitionEnd)),
                        !0
                    );
                },
                slideToLoop: function (e, t, i, n) {
                    void 0 === e && (e = 0), void 0 === t && (t = this.params.speed), void 0 === i && (i = !0);
                    let s = e;
                    return this.params.loop && (s += this.loopedSlides), this.slideTo(s, t, i, n);
                },
                slideNext: function (e, t, i) {
                    void 0 === e && (e = this.params.speed), void 0 === t && (t = !0);
                    let n = this,
                        { animating: s, enabled: r, params: a } = n;
                    if (!r) return n;
                    let l = a.slidesPerGroup;
                    "auto" === a.slidesPerView &&
                        1 === a.slidesPerGroup &&
                        a.slidesPerGroupAuto &&
                        (l = Math.max(n.slidesPerViewDynamic("current", !0), 1));
                    let o = n.activeIndex < a.slidesPerGroupSkip ? 1 : l;
                    if (a.loop) {
                        if (s && a.loopPreventsSlide) return !1;
                        n.loopFix(), (n._clientLeft = n.$wrapperEl[0].clientLeft);
                    }
                    return a.rewind && n.isEnd ? n.slideTo(0, e, t, i) : n.slideTo(n.activeIndex + o, e, t, i);
                },
                slidePrev: function (e, t, i) {
                    void 0 === e && (e = this.params.speed), void 0 === t && (t = !0);
                    let n = this,
                        { params: s, animating: r, snapGrid: a, slidesGrid: l, rtlTranslate: o, enabled: d } = n;
                    if (!d) return n;
                    if (s.loop) {
                        if (r && s.loopPreventsSlide) return !1;
                        n.loopFix(), (n._clientLeft = n.$wrapperEl[0].clientLeft);
                    }
                    function c(e) {
                        return e < 0 ? -Math.floor(Math.abs(e)) : Math.floor(e);
                    }
                    let u = c(o ? n.translate : -n.translate),
                        p = a.map((e) => c(e)),
                        h = a[p.indexOf(u) - 1];
                    if (void 0 === h && s.cssMode) {
                        let f;
                        a.forEach((e, t) => {
                            u >= e && (f = t);
                        }),
                            void 0 !== f && (h = a[f > 0 ? f - 1 : f]);
                    }
                    let m = 0;
                    if (
                        (void 0 !== h &&
                            ((m = l.indexOf(h)) < 0 && (m = n.activeIndex - 1),
                            "auto" === s.slidesPerView &&
                                1 === s.slidesPerGroup &&
                                s.slidesPerGroupAuto &&
                                (m = Math.max((m = m - n.slidesPerViewDynamic("previous", !0) + 1), 0))),
                        s.rewind && n.isBeginning)
                    ) {
                        let g =
                            n.params.virtual && n.params.virtual.enabled && n.virtual
                                ? n.virtual.slides.length - 1
                                : n.slides.length - 1;
                        return n.slideTo(g, e, t, i);
                    }
                    return n.slideTo(m, e, t, i);
                },
                slideReset: function (e, t, i) {
                    return (
                        void 0 === e && (e = this.params.speed),
                        void 0 === t && (t = !0),
                        this.slideTo(this.activeIndex, e, t, i)
                    );
                },
                slideToClosest: function (e, t, i, n) {
                    void 0 === e && (e = this.params.speed), void 0 === t && (t = !0), void 0 === n && (n = 0.5);
                    let s = this.activeIndex,
                        r = Math.min(this.params.slidesPerGroupSkip, s),
                        a = r + Math.floor((s - r) / this.params.slidesPerGroup),
                        l = this.rtlTranslate ? this.translate : -this.translate;
                    if (l >= this.snapGrid[a]) {
                        let o = this.snapGrid[a];
                        l - o > (this.snapGrid[a + 1] - o) * n && (s += this.params.slidesPerGroup);
                    } else {
                        let d = this.snapGrid[a - 1];
                        l - d <= (this.snapGrid[a] - d) * n && (s -= this.params.slidesPerGroup);
                    }
                    return (s = Math.min((s = Math.max(s, 0)), this.slidesGrid.length - 1)), this.slideTo(s, e, t, i);
                },
                slideToClickedSlide: function () {
                    let e = this,
                        { params: t, $wrapperEl: i } = e,
                        n = "auto" === t.slidesPerView ? e.slidesPerViewDynamic() : t.slidesPerView,
                        s,
                        r = e.clickedIndex;
                    if (t.loop) {
                        if (e.animating) return;
                        (s = parseInt(d(e.clickedSlide).attr("data-swiper-slide-index"), 10)),
                            t.centeredSlides
                                ? r < e.loopedSlides - n / 2 || r > e.slides.length - e.loopedSlides + n / 2
                                    ? (e.loopFix(),
                                      (r = i
                                          .children(
                                              `.${t.slideClass}[data-swiper-slide-index="${s}"]:not(.${t.slideDuplicateClass})`
                                          )
                                          .eq(0)
                                          .index()),
                                      u(() => {
                                          e.slideTo(r);
                                      }))
                                    : e.slideTo(r)
                                : r > e.slides.length - n
                                  ? (e.loopFix(),
                                    (r = i
                                        .children(
                                            `.${t.slideClass}[data-swiper-slide-index="${s}"]:not(.${t.slideDuplicateClass})`
                                        )
                                        .eq(0)
                                        .index()),
                                    u(() => {
                                        e.slideTo(r);
                                    }))
                                  : e.slideTo(r);
                    } else e.slideTo(r);
                },
            },
            loop: {
                loopCreate: function () {
                    let e = this,
                        t = n(),
                        { params: i, $wrapperEl: s } = e,
                        r = s.children().length > 0 ? d(s.children()[0].parentNode) : s;
                    r.children(`.${i.slideClass}.${i.slideDuplicateClass}`).remove();
                    let a = r.children(`.${i.slideClass}`);
                    if (i.loopFillGroupWithBlank) {
                        let l = i.slidesPerGroup - (a.length % i.slidesPerGroup);
                        if (l !== i.slidesPerGroup) {
                            for (let o = 0; o < l; o += 1) {
                                let c = d(t.createElement("div")).addClass(`${i.slideClass} ${i.slideBlankClass}`);
                                r.append(c);
                            }
                            a = r.children(`.${i.slideClass}`);
                        }
                    }
                    "auto" !== i.slidesPerView || i.loopedSlides || (i.loopedSlides = a.length),
                        (e.loopedSlides = Math.ceil(parseFloat(i.loopedSlides || i.slidesPerView, 10))),
                        (e.loopedSlides += i.loopAdditionalSlides),
                        e.loopedSlides > a.length && (e.loopedSlides = a.length);
                    let u = [],
                        p = [];
                    a.each((t, i) => {
                        let n = d(t);
                        i < e.loopedSlides && p.push(t),
                            i < a.length && i >= a.length - e.loopedSlides && u.push(t),
                            n.attr("data-swiper-slide-index", i);
                    });
                    for (let h = 0; h < p.length; h += 1)
                        r.append(d(p[h].cloneNode(!0)).addClass(i.slideDuplicateClass));
                    for (let f = u.length - 1; f >= 0; f -= 1)
                        r.prepend(d(u[f].cloneNode(!0)).addClass(i.slideDuplicateClass));
                },
                loopFix: function () {
                    let e = this;
                    e.emit("beforeLoopFix");
                    let {
                            activeIndex: t,
                            slides: i,
                            loopedSlides: n,
                            allowSlidePrev: s,
                            allowSlideNext: r,
                            snapGrid: a,
                            rtlTranslate: l,
                        } = e,
                        o;
                    (e.allowSlidePrev = !0), (e.allowSlideNext = !0);
                    let d = -a[t] - e.getTranslate();
                    t < n
                        ? ((o = i.length - 3 * n + t),
                          (o += n),
                          e.slideTo(o, 0, !1, !0) && 0 !== d && e.setTranslate((l ? -e.translate : e.translate) - d))
                        : t >= i.length - n &&
                          ((o = -i.length + t + n),
                          (o += n),
                          e.slideTo(o, 0, !1, !0) && 0 !== d && e.setTranslate((l ? -e.translate : e.translate) - d)),
                        (e.allowSlidePrev = s),
                        (e.allowSlideNext = r),
                        e.emit("loopFix");
                },
                loopDestroy: function () {
                    let { $wrapperEl: e, params: t, slides: i } = this;
                    e
                        .children(`.${t.slideClass}.${t.slideDuplicateClass},.${t.slideClass}.${t.slideBlankClass}`)
                        .remove(),
                        i.removeAttr("data-swiper-slide-index");
                },
            },
            grabCursor: {
                setGrabCursor: function (e) {
                    if (
                        this.support.touch ||
                        !this.params.simulateTouch ||
                        (this.params.watchOverflow && this.isLocked) ||
                        this.params.cssMode
                    )
                        return;
                    let t = "container" === this.params.touchEventsTarget ? this.el : this.wrapperEl;
                    (t.style.cursor = "move"), (t.style.cursor = e ? "grabbing" : "grab");
                },
                unsetGrabCursor: function () {
                    let e = this;
                    e.support.touch ||
                        (e.params.watchOverflow && e.isLocked) ||
                        e.params.cssMode ||
                        (e["container" === e.params.touchEventsTarget ? "el" : "wrapperEl"].style.cursor = "");
                },
            },
            events: {
                attachEvents: function () {
                    let e = this,
                        t = n(),
                        { params: i, support: s } = e;
                    (e.onTouchStart = S.bind(e)),
                        (e.onTouchMove = E.bind(e)),
                        (e.onTouchEnd = T.bind(e)),
                        i.cssMode && (e.onScroll = P.bind(e)),
                        (e.onClick = k.bind(e)),
                        s.touch && !A && (t.addEventListener("touchstart", z), (A = !0)),
                        L(e, "on");
                },
                detachEvents: function () {
                    L(this, "off");
                },
            },
            breakpoints: {
                setBreakpoint: function () {
                    let e = this,
                        { activeIndex: t, initialized: i, loopedSlides: n = 0, params: s, $el: r } = e,
                        a = s.breakpoints;
                    if (!a || (a && 0 === Object.keys(a).length)) return;
                    let l = e.getBreakpoint(a, e.params.breakpointsBase, e.el);
                    if (!l || e.currentBreakpoint === l) return;
                    let o = (l in a ? a[l] : void 0) || e.originalParams,
                        d = O(e, s),
                        c = O(e, o),
                        u = s.enabled;
                    d && !c
                        ? (r.removeClass(`${s.containerModifierClass}grid ${s.containerModifierClass}grid-column`),
                          e.emitContainerClasses())
                        : !d &&
                          c &&
                          (r.addClass(`${s.containerModifierClass}grid`),
                          ((o.grid.fill && "column" === o.grid.fill) || (!o.grid.fill && "column" === s.grid.fill)) &&
                              r.addClass(`${s.containerModifierClass}grid-column`),
                          e.emitContainerClasses());
                    let p = o.direction && o.direction !== s.direction,
                        h = s.loop && (o.slidesPerView !== s.slidesPerView || p);
                    p && i && e.changeDirection(), g(e.params, o);
                    let f = e.params.enabled;
                    Object.assign(e, {
                        allowTouchMove: e.params.allowTouchMove,
                        allowSlideNext: e.params.allowSlideNext,
                        allowSlidePrev: e.params.allowSlidePrev,
                    }),
                        u && !f ? e.disable() : !u && f && e.enable(),
                        (e.currentBreakpoint = l),
                        e.emit("_beforeBreakpoint", o),
                        h &&
                            i &&
                            (e.loopDestroy(),
                            e.loopCreate(),
                            e.updateSlides(),
                            e.slideTo(t - n + e.loopedSlides, 0, !1)),
                        e.emit("breakpoint", o);
                },
                getBreakpoint: function (e, t, i) {
                    if ((void 0 === t && (t = "window"), !e || ("container" === t && !i))) return;
                    let n = !1,
                        s = r(),
                        a = "window" === t ? s.innerHeight : i.clientHeight,
                        l = Object.keys(e).map((e) => {
                            if ("string" == typeof e && 0 === e.indexOf("@")) {
                                let t = parseFloat(e.substr(1));
                                return { value: a * t, point: e };
                            }
                            return { value: e, point: e };
                        });
                    l.sort((e, t) => parseInt(e.value, 10) - parseInt(t.value, 10));
                    for (let o = 0; o < l.length; o += 1) {
                        let { point: d, value: c } = l[o];
                        "window" === t
                            ? s.matchMedia(`(min-width: ${c}px)`).matches && (n = d)
                            : c <= i.clientWidth && (n = d);
                    }
                    return n || "max";
                },
            },
            checkOverflow: {
                checkOverflow: function () {
                    let e = this,
                        { isLocked: t, params: i } = e,
                        { slidesOffsetBefore: n } = i;
                    if (n) {
                        let s = e.slides.length - 1,
                            r = e.slidesGrid[s] + e.slidesSizesGrid[s] + 2 * n;
                        e.isLocked = e.size > r;
                    } else e.isLocked = 1 === e.snapGrid.length;
                    !0 === i.allowSlideNext && (e.allowSlideNext = !e.isLocked),
                        !0 === i.allowSlidePrev && (e.allowSlidePrev = !e.isLocked),
                        t && t !== e.isLocked && (e.isEnd = !1),
                        t !== e.isLocked && e.emit(e.isLocked ? "lock" : "unlock");
                },
            },
            classes: {
                addClasses: function () {
                    let { classNames: e, params: t, rtl: i, $el: n, device: s, support: r } = this,
                        a = (function (e, t) {
                            let i = [];
                            return (
                                e.forEach((e) => {
                                    "object" == typeof e
                                        ? Object.keys(e).forEach((n) => {
                                              e[n] && i.push(t + n);
                                          })
                                        : "string" == typeof e && i.push(t + e);
                                }),
                                i
                            );
                        })(
                            [
                                "initialized",
                                t.direction,
                                { "pointer-events": !r.touch },
                                { "free-mode": this.params.freeMode && t.freeMode.enabled },
                                { autoheight: t.autoHeight },
                                { rtl: i },
                                { grid: t.grid && t.grid.rows > 1 },
                                { "grid-column": t.grid && t.grid.rows > 1 && "column" === t.grid.fill },
                                { android: s.android },
                                { ios: s.ios },
                                { "css-mode": t.cssMode },
                                { centered: t.cssMode && t.centeredSlides },
                                { "watch-progress": t.watchSlidesProgress },
                            ],
                            t.containerModifierClass
                        );
                    e.push(...a), n.addClass([...e].join(" ")), this.emitContainerClasses();
                },
                removeClasses: function () {
                    let { $el: e, classNames: t } = this;
                    e.removeClass(t.join(" ")), this.emitContainerClasses();
                },
            },
            images: {
                loadImage: function (e, t, i, n, s, a) {
                    let l = r(),
                        o;
                    function c() {
                        a && a();
                    }
                    d(e).parent("picture")[0] || (e.complete && s)
                        ? c()
                        : t
                          ? (((o = new l.Image()).onload = c),
                            (o.onerror = c),
                            n && (o.sizes = n),
                            i && (o.srcset = i),
                            t && (o.src = t))
                          : c();
                },
                preloadImages: function () {
                    let e = this;
                    function t() {
                        null != e &&
                            e &&
                            !e.destroyed &&
                            (void 0 !== e.imagesLoaded && (e.imagesLoaded += 1),
                            e.imagesLoaded === e.imagesToLoad.length &&
                                (e.params.updateOnImagesReady && e.update(), e.emit("imagesReady")));
                    }
                    e.imagesToLoad = e.$el.find("img");
                    for (let i = 0; i < e.imagesToLoad.length; i += 1) {
                        let n = e.imagesToLoad[i];
                        e.loadImage(
                            n,
                            n.currentSrc || n.getAttribute("src"),
                            n.srcset || n.getAttribute("srcset"),
                            n.sizes || n.getAttribute("sizes"),
                            !0,
                            t
                        );
                    }
                },
            },
        },
        D = {};
    class N {
        constructor() {
            let e, t;
            for (var i, n = arguments.length, s = Array(n), a = 0; a < n; a++) s[a] = arguments[a];
            if (
                (1 === s.length && s[0].constructor && "Object" === Object.prototype.toString.call(s[0]).slice(8, -1)
                    ? (t = s[0])
                    : ([e, t] = s),
                t || (t = {}),
                (t = g({}, t)),
                e && !t.el && (t.el = e),
                t.el && d(t.el).length > 1)
            ) {
                let l = [];
                return (
                    d(t.el).each((e) => {
                        let i = g({}, t, { el: e });
                        l.push(new N(i));
                    }),
                    l
                );
            }
            let o = this;
            (o.__swiper__ = !0),
                (o.support = x()),
                (o.device =
                    ((i = { userAgent: t.userAgent }),
                    _ ||
                        (_ = (function (e) {
                            let { userAgent: t } = void 0 === e ? {} : e,
                                i = x(),
                                n = r(),
                                s = n.navigator.platform,
                                a = t || n.navigator.userAgent,
                                l = { ios: !1, android: !1 },
                                o = n.screen.width,
                                d = n.screen.height,
                                c = a.match(/(Android);?[\s\/]+([\d.]+)?/),
                                u = a.match(/(iPad).*OS\s([\d_]+)/),
                                p = a.match(/(iPod)(.*OS\s([\d_]+))?/),
                                h = !u && a.match(/(iPhone\sOS|iOS)\s([\d_]+)/),
                                f = "MacIntel" === s;
                            return (
                                !u &&
                                    f &&
                                    i.touch &&
                                    [
                                        "1024x1366",
                                        "1366x1024",
                                        "834x1194",
                                        "1194x834",
                                        "834x1112",
                                        "1112x834",
                                        "768x1024",
                                        "1024x768",
                                        "820x1180",
                                        "1180x820",
                                        "810x1080",
                                        "1080x810",
                                    ].indexOf(`${o}x${d}`) >= 0 &&
                                    ((u = a.match(/(Version)\/([\d.]+)/)) || (u = [0, 1, "13_0_0"]), (f = !1)),
                                c && "Win32" !== s && ((l.os = "android"), (l.android = !0)),
                                (u || h || p) && ((l.os = "ios"), (l.ios = !0)),
                                l
                            );
                        })(i)),
                    _)),
                (o.browser =
                    (b ||
                        (b = (function () {
                            let e = r();
                            return {
                                isSafari: (function () {
                                    let t = e.navigator.userAgent.toLowerCase();
                                    return (
                                        t.indexOf("safari") >= 0 && 0 > t.indexOf("chrome") && 0 > t.indexOf("android")
                                    );
                                })(),
                                isWebView: /(iPhone|iPod|iPad).*AppleWebKit(?!.*Safari)/i.test(e.navigator.userAgent),
                            };
                        })()),
                    b)),
                (o.eventsListeners = {}),
                (o.eventsAnyListeners = []),
                (o.modules = [...o.__modules__]),
                t.modules && Array.isArray(t.modules) && o.modules.push(...t.modules);
            let c = {};
            o.modules.forEach((e) => {
                var i, n;
                e({
                    swiper: o,
                    extendParams:
                        ((i = t),
                        (n = c),
                        function (e) {
                            void 0 === e && (e = {});
                            let t = Object.keys(e)[0],
                                s = e[t];
                            "object" == typeof s &&
                                null !== s &&
                                (["navigation", "pagination", "scrollbar"].indexOf(t) >= 0 &&
                                    !0 === i[t] &&
                                    (i[t] = { auto: !0 }),
                                t in i &&
                                    "enabled" in s &&
                                    (!0 === i[t] && (i[t] = { enabled: !0 }),
                                    "object" != typeof i[t] || "enabled" in i[t] || (i[t].enabled = !0),
                                    i[t] || (i[t] = { enabled: !1 }))),
                                g(n, e);
                        }),
                    on: o.on.bind(o),
                    once: o.once.bind(o),
                    off: o.off.bind(o),
                    emit: o.emit.bind(o),
                });
            });
            let u = g({}, M, c);
            return (
                (o.params = g({}, u, D, t)),
                (o.originalParams = g({}, o.params)),
                (o.passedParams = g({}, t)),
                o.params &&
                    o.params.on &&
                    Object.keys(o.params.on).forEach((e) => {
                        o.on(e, o.params.on[e]);
                    }),
                o.params && o.params.onAny && o.onAny(o.params.onAny),
                (o.$ = d),
                Object.assign(o, {
                    enabled: o.params.enabled,
                    el: e,
                    classNames: [],
                    slides: d(),
                    slidesGrid: [],
                    snapGrid: [],
                    slidesSizesGrid: [],
                    isHorizontal: () => "horizontal" === o.params.direction,
                    isVertical: () => "vertical" === o.params.direction,
                    activeIndex: 0,
                    realIndex: 0,
                    isBeginning: !0,
                    isEnd: !1,
                    translate: 0,
                    previousTranslate: 0,
                    progress: 0,
                    velocity: 0,
                    animating: !1,
                    allowSlideNext: o.params.allowSlideNext,
                    allowSlidePrev: o.params.allowSlidePrev,
                    touchEvents: (function () {
                        let e = ["touchstart", "touchmove", "touchend", "touchcancel"],
                            t = ["pointerdown", "pointermove", "pointerup"];
                        return (
                            (o.touchEventsTouch = { start: e[0], move: e[1], end: e[2], cancel: e[3] }),
                            (o.touchEventsDesktop = { start: t[0], move: t[1], end: t[2] }),
                            o.support.touch || !o.params.simulateTouch ? o.touchEventsTouch : o.touchEventsDesktop
                        );
                    })(),
                    touchEventsData: {
                        isTouched: void 0,
                        isMoved: void 0,
                        allowTouchCallbacks: void 0,
                        touchStartTime: void 0,
                        isScrolling: void 0,
                        currentTranslate: void 0,
                        startTranslate: void 0,
                        allowThresholdMove: void 0,
                        focusableElements: o.params.focusableElements,
                        lastClickTime: p(),
                        clickTimeout: void 0,
                        velocities: [],
                        allowMomentumBounce: void 0,
                        isTouchEvent: void 0,
                        startMoving: void 0,
                    },
                    allowClick: !0,
                    allowTouchMove: o.params.allowTouchMove,
                    touches: { startX: 0, startY: 0, currentX: 0, currentY: 0, diff: 0 },
                    imagesToLoad: [],
                    imagesLoaded: 0,
                }),
                o.emit("_swiper"),
                o.params.init && o.init(),
                o
            );
        }
        enable() {
            let e = this;
            e.enabled || ((e.enabled = !0), e.params.grabCursor && e.setGrabCursor(), e.emit("enable"));
        }
        disable() {
            let e = this;
            e.enabled && ((e.enabled = !1), e.params.grabCursor && e.unsetGrabCursor(), e.emit("disable"));
        }
        setProgress(e, t) {
            e = Math.min(Math.max(e, 0), 1);
            let i = this.minTranslate(),
                n = (this.maxTranslate() - i) * e + i;
            this.translateTo(n, void 0 === t ? 0 : t), this.updateActiveIndex(), this.updateSlidesClasses();
        }
        emitContainerClasses() {
            let e = this;
            if (!e.params._emitClasses || !e.el) return;
            let t = e.el.className
                .split(" ")
                .filter((t) => 0 === t.indexOf("swiper") || 0 === t.indexOf(e.params.containerModifierClass));
            e.emit("_containerClasses", t.join(" "));
        }
        getSlideClasses(e) {
            let t = this;
            return t.destroyed
                ? ""
                : e.className
                      .split(" ")
                      .filter((e) => 0 === e.indexOf("swiper-slide") || 0 === e.indexOf(t.params.slideClass))
                      .join(" ");
        }
        emitSlidesClasses() {
            let e = this;
            if (!e.params._emitClasses || !e.el) return;
            let t = [];
            e.slides.each((i) => {
                let n = e.getSlideClasses(i);
                t.push({ slideEl: i, classNames: n }), e.emit("_slideClass", i, n);
            }),
                e.emit("_slideClasses", t);
        }
        slidesPerViewDynamic(e, t) {
            void 0 === e && (e = "current"), void 0 === t && (t = !1);
            let { params: i, slides: n, slidesGrid: s, slidesSizesGrid: r, size: a, activeIndex: l } = this,
                o = 1;
            if (i.centeredSlides) {
                let d,
                    c = n[l].swiperSlideSize;
                for (let u = l + 1; u < n.length; u += 1)
                    n[u] && !d && ((c += n[u].swiperSlideSize), (o += 1), c > a && (d = !0));
                for (let p = l - 1; p >= 0; p -= 1)
                    n[p] && !d && ((c += n[p].swiperSlideSize), (o += 1), c > a && (d = !0));
            } else if ("current" === e)
                for (let h = l + 1; h < n.length; h += 1) (t ? s[h] + r[h] - s[l] < a : s[h] - s[l] < a) && (o += 1);
            else for (let f = l - 1; f >= 0; f -= 1) s[l] - s[f] < a && (o += 1);
            return o;
        }
        update() {
            let e = this;
            if (!e || e.destroyed) return;
            let { snapGrid: t, params: i } = e;
            function n() {
                let t = e.rtlTranslate ? -1 * e.translate : e.translate,
                    i = Math.min(Math.max(t, e.maxTranslate()), e.minTranslate());
                e.setTranslate(i), e.updateActiveIndex(), e.updateSlidesClasses();
            }
            let s;
            i.breakpoints && e.setBreakpoint(),
                e.updateSize(),
                e.updateSlides(),
                e.updateProgress(),
                e.updateSlidesClasses(),
                e.params.freeMode && e.params.freeMode.enabled
                    ? (n(), e.params.autoHeight && e.updateAutoHeight())
                    : (s =
                          ("auto" === e.params.slidesPerView || e.params.slidesPerView > 1) &&
                          e.isEnd &&
                          !e.params.centeredSlides
                              ? e.slideTo(e.slides.length - 1, 0, !1, !0)
                              : e.slideTo(e.activeIndex, 0, !1, !0)) || n(),
                i.watchOverflow && t !== e.snapGrid && e.checkOverflow(),
                e.emit("update");
        }
        changeDirection(e, t) {
            void 0 === t && (t = !0);
            let i = this,
                n = i.params.direction;
            return (
                e || (e = "horizontal" === n ? "vertical" : "horizontal"),
                e === n ||
                    ("horizontal" !== e && "vertical" !== e) ||
                    (i.$el
                        .removeClass(`${i.params.containerModifierClass}${n}`)
                        .addClass(`${i.params.containerModifierClass}${e}`),
                    i.emitContainerClasses(),
                    (i.params.direction = e),
                    i.slides.each((t) => {
                        "vertical" === e ? (t.style.width = "") : (t.style.height = "");
                    }),
                    i.emit("changeDirection"),
                    t && i.update()),
                i
            );
        }
        mount(e) {
            let t = this;
            if (t.mounted) return !0;
            let i = d(e || t.params.el);
            if (!(e = i[0])) return !1;
            e.swiper = t;
            let s = () => `.${(t.params.wrapperClass || "").trim().split(" ").join(".")}`,
                r = (() => {
                    if (e && e.shadowRoot && e.shadowRoot.querySelector) {
                        let t = d(e.shadowRoot.querySelector(s()));
                        return (t.children = (e) => i.children(e)), t;
                    }
                    return i.children(s());
                })();
            if (0 === r.length && t.params.createElements) {
                let a = n().createElement("div");
                (r = d(a)),
                    (a.className = t.params.wrapperClass),
                    i.append(a),
                    i.children(`.${t.params.slideClass}`).each((e) => {
                        r.append(e);
                    });
            }
            return (
                Object.assign(t, {
                    $el: i,
                    el: e,
                    $wrapperEl: r,
                    wrapperEl: r[0],
                    mounted: !0,
                    rtl: "rtl" === e.dir.toLowerCase() || "rtl" === i.css("direction"),
                    rtlTranslate:
                        "horizontal" === t.params.direction &&
                        ("rtl" === e.dir.toLowerCase() || "rtl" === i.css("direction")),
                    wrongRTL: "-webkit-box" === r.css("display"),
                }),
                !0
            );
        }
        init(e) {
            let t = this;
            return (
                t.initialized ||
                    !1 === t.mount(e) ||
                    (t.emit("beforeInit"),
                    t.params.breakpoints && t.setBreakpoint(),
                    t.addClasses(),
                    t.params.loop && t.loopCreate(),
                    t.updateSize(),
                    t.updateSlides(),
                    t.params.watchOverflow && t.checkOverflow(),
                    t.params.grabCursor && t.enabled && t.setGrabCursor(),
                    t.params.preloadImages && t.preloadImages(),
                    t.params.loop
                        ? t.slideTo(t.params.initialSlide + t.loopedSlides, 0, t.params.runCallbacksOnInit, !1, !0)
                        : t.slideTo(t.params.initialSlide, 0, t.params.runCallbacksOnInit, !1, !0),
                    t.attachEvents(),
                    (t.initialized = !0),
                    t.emit("init"),
                    t.emit("afterInit")),
                t
            );
        }
        destroy(e, t) {
            void 0 === e && (e = !0), void 0 === t && (t = !0);
            let i = this,
                { params: n, $el: s, $wrapperEl: r, slides: a } = i;
            return (
                void 0 === i.params ||
                    i.destroyed ||
                    (i.emit("beforeDestroy"),
                    (i.initialized = !1),
                    i.detachEvents(),
                    n.loop && i.loopDestroy(),
                    t &&
                        (i.removeClasses(),
                        s.removeAttr("style"),
                        r.removeAttr("style"),
                        a &&
                            a.length &&
                            a
                                .removeClass(
                                    [n.slideVisibleClass, n.slideActiveClass, n.slideNextClass, n.slidePrevClass].join(
                                        " "
                                    )
                                )
                                .removeAttr("style")
                                .removeAttr("data-swiper-slide-index")),
                    i.emit("destroy"),
                    Object.keys(i.eventsListeners).forEach((e) => {
                        i.off(e);
                    }),
                    !1 !== e &&
                        ((i.$el[0].swiper = null),
                        (function (e) {
                            let t = e;
                            Object.keys(t).forEach((e) => {
                                try {
                                    t[e] = null;
                                } catch (i) {}
                                try {
                                    delete t[e];
                                } catch (n) {}
                            });
                        })(i)),
                    (i.destroyed = !0)),
                null
            );
        }
        static extendDefaults(e) {
            g(D, e);
        }
        static get extendedDefaults() {
            return D;
        }
        static get defaults() {
            return M;
        }
        static installModule(e) {
            N.prototype.__modules__ || (N.prototype.__modules__ = []);
            let t = N.prototype.__modules__;
            "function" == typeof e && 0 > t.indexOf(e) && t.push(e);
        }
        static use(e) {
            return Array.isArray(e) ? (e.forEach((e) => N.installModule(e)), N) : (N.installModule(e), N);
        }
    }
    function B(e, t, i, s) {
        let r = n();
        return (
            e.params.createElements &&
                Object.keys(s).forEach((n) => {
                    if (!i[n] && !0 === i.auto) {
                        let a = e.$el.children(`.${s[n]}`)[0];
                        a || (((a = r.createElement("div")).className = s[n]), e.$el.append(a)), (i[n] = a), (t[n] = a);
                    }
                }),
            i
        );
    }
    function V(e) {
        return (
            void 0 === e && (e = ""),
            `.${e
                .trim()
                .replace(/([\.:!\/])/g, "\\$1")
                .replace(/ /g, ".")}`
        );
    }
    function X(e) {
        let { $wrapperEl: t, params: i } = this;
        if ((i.loop && this.loopDestroy(), "object" == typeof e && "length" in e))
            for (let n = 0; n < e.length; n += 1) e[n] && t.append(e[n]);
        else t.append(e);
        i.loop && this.loopCreate(), i.observer || this.update();
    }
    function Y(e) {
        let { params: t, $wrapperEl: i, activeIndex: n } = this;
        t.loop && this.loopDestroy();
        let s = n + 1;
        if ("object" == typeof e && "length" in e) {
            for (let r = 0; r < e.length; r += 1) e[r] && i.prepend(e[r]);
            s = n + e.length;
        } else i.prepend(e);
        t.loop && this.loopCreate(), t.observer || this.update(), this.slideTo(s, 0, !1);
    }
    function R(e, t) {
        let i = this,
            { $wrapperEl: n, params: s, activeIndex: r } = i,
            a = r;
        s.loop && ((a -= i.loopedSlides), i.loopDestroy(), (i.slides = n.children(`.${s.slideClass}`)));
        let l = i.slides.length;
        if (e <= 0) return void i.prependSlide(t);
        if (e >= l) return void i.appendSlide(t);
        let o = a > e ? a + 1 : a,
            d = [];
        for (let c = l - 1; c >= e; c -= 1) {
            let u = i.slides.eq(c);
            u.remove(), d.unshift(u);
        }
        if ("object" == typeof t && "length" in t) {
            for (let p = 0; p < t.length; p += 1) t[p] && n.append(t[p]);
            o = a > e ? a + t.length : a;
        } else n.append(t);
        for (let h = 0; h < d.length; h += 1) n.append(d[h]);
        s.loop && i.loopCreate(),
            s.observer || i.update(),
            s.loop ? i.slideTo(o + i.loopedSlides, 0, !1) : i.slideTo(o, 0, !1);
    }
    function H(e) {
        let t = this,
            { params: i, $wrapperEl: n, activeIndex: s } = t,
            r = s;
        i.loop && ((r -= t.loopedSlides), t.loopDestroy(), (t.slides = n.children(`.${i.slideClass}`)));
        let a,
            l = r;
        if ("object" == typeof e && "length" in e) {
            for (let o = 0; o < e.length; o += 1) (a = e[o]), t.slides[a] && t.slides.eq(a).remove(), a < l && (l -= 1);
            l = Math.max(l, 0);
        } else (a = e), t.slides[a] && t.slides.eq(a).remove(), a < l && (l -= 1), (l = Math.max(l, 0));
        i.loop && t.loopCreate(),
            i.observer || t.update(),
            i.loop ? t.slideTo(l + t.loopedSlides, 0, !1) : t.slideTo(l, 0, !1);
    }
    function q() {
        let e = [];
        for (let t = 0; t < this.slides.length; t += 1) e.push(t);
        this.removeSlide(e);
    }
    function G(e) {
        let {
                effect: t,
                swiper: i,
                on: n,
                setTranslate: s,
                setTransition: r,
                overwriteParams: a,
                perspective: l,
                recreateShadows: o,
                getEffectParams: d,
            } = e,
            c;
        n("beforeInit", () => {
            if (i.params.effect !== t) return;
            i.classNames.push(`${i.params.containerModifierClass}${t}`),
                l && l() && i.classNames.push(`${i.params.containerModifierClass}3d`);
            let e = a ? a() : {};
            Object.assign(i.params, e), Object.assign(i.originalParams, e);
        }),
            n("setTranslate", () => {
                i.params.effect === t && s();
            }),
            n("setTransition", (e, n) => {
                i.params.effect === t && r(n);
            }),
            n("transitionEnd", () => {
                i.params.effect === t &&
                    o &&
                    d &&
                    d().slideShadows &&
                    (i.slides.each((e) => {
                        i.$(e)
                            .find(
                                ".swiper-slide-shadow-top, .swiper-slide-shadow-right, .swiper-slide-shadow-bottom, .swiper-slide-shadow-left"
                            )
                            .remove();
                    }),
                    o());
            }),
            n("virtualUpdate", () => {
                i.params.effect === t &&
                    (i.slides.length || (c = !0),
                    requestAnimationFrame(() => {
                        c && i.slides && i.slides.length && (s(), (c = !1));
                    }));
            });
    }
    function W(e, t) {
        return e.transformEl
            ? t.find(e.transformEl).css({ "backface-visibility": "hidden", "-webkit-backface-visibility": "hidden" })
            : t;
    }
    function F(e) {
        let { swiper: t, duration: i, transformEl: n, allSlides: s } = e,
            { slides: r, activeIndex: a, $wrapperEl: l } = t;
        if (t.params.virtualTranslate && 0 !== i) {
            let o,
                d = !1;
            (o = s ? (n ? r.find(n) : r) : n ? r.eq(a).find(n) : r.eq(a)).transitionEnd(() => {
                if (d || !t || t.destroyed) return;
                (d = !0), (t.animating = !1);
                let e = ["webkitTransitionEnd", "transitionend"];
                for (let i = 0; i < e.length; i += 1) l.trigger(e[i]);
            });
        }
    }
    function j(e, t, i) {
        let n = "swiper-slide-shadow" + (i ? `-${i}` : ""),
            s = e.transformEl ? t.find(e.transformEl) : t,
            r = s.children(`.${n}`);
        return r.length || ((r = d(`<div class="swiper-slide-shadow${i ? `-${i}` : ""}"></div>`)), s.append(r)), r;
    }
    Object.keys(I).forEach((e) => {
        Object.keys(I[e]).forEach((t) => {
            N.prototype[t] = I[e][t];
        });
    }),
        N.use([
            function (e) {
                let { swiper: t, on: i, emit: n } = e,
                    s = r(),
                    a = null,
                    l = null,
                    o = () => {
                        t && !t.destroyed && t.initialized && (n("beforeResize"), n("resize"));
                    },
                    d = () => {
                        t && !t.destroyed && t.initialized && n("orientationchange");
                    };
                i("init", () => {
                    t.params.resizeObserver && void 0 !== s.ResizeObserver
                        ? t &&
                          !t.destroyed &&
                          t.initialized &&
                          (a = new ResizeObserver((e) => {
                              l = s.requestAnimationFrame(() => {
                                  let { width: i, height: n } = t,
                                      s = i,
                                      r = n;
                                  e.forEach((e) => {
                                      let { contentBoxSize: i, contentRect: n, target: a } = e;
                                      (a && a !== t.el) ||
                                          ((s = n ? n.width : (i[0] || i).inlineSize),
                                          (r = n ? n.height : (i[0] || i).blockSize));
                                  }),
                                      (s === i && r === n) || o();
                              });
                          })).observe(t.el)
                        : (s.addEventListener("resize", o), s.addEventListener("orientationchange", d));
                }),
                    i("destroy", () => {
                        l && s.cancelAnimationFrame(l),
                            a && a.unobserve && t.el && (a.unobserve(t.el), (a = null)),
                            s.removeEventListener("resize", o),
                            s.removeEventListener("orientationchange", d);
                    });
            },
            function (e) {
                let { swiper: t, extendParams: i, on: n, emit: s } = e,
                    a = [],
                    l = r(),
                    o = function (e, t) {
                        void 0 === t && (t = {});
                        let i = new (l.MutationObserver || l.WebkitMutationObserver)((e) => {
                            if (1 === e.length) return void s("observerUpdate", e[0]);
                            let t = function () {
                                s("observerUpdate", e[0]);
                            };
                            l.requestAnimationFrame ? l.requestAnimationFrame(t) : l.setTimeout(t, 0);
                        });
                        i.observe(e, {
                            attributes: void 0 === t.attributes || t.attributes,
                            childList: void 0 === t.childList || t.childList,
                            characterData: void 0 === t.characterData || t.characterData,
                        }),
                            a.push(i);
                    };
                i({ observer: !1, observeParents: !1, observeSlideChildren: !1 }),
                    n("init", () => {
                        if (t.params.observer) {
                            if (t.params.observeParents) {
                                let e = t.$el.parents();
                                for (let i = 0; i < e.length; i += 1) o(e[i]);
                            }
                            o(t.$el[0], { childList: t.params.observeSlideChildren }),
                                o(t.$wrapperEl[0], { attributes: !1 });
                        }
                    }),
                    n("destroy", () => {
                        a.forEach((e) => {
                            e.disconnect();
                        }),
                            a.splice(0, a.length);
                    });
            },
        ]);
    let U = [
        function (e) {
            let t,
                { swiper: i, extendParams: n, on: s, emit: r } = e;
            function a(e, t) {
                let n = i.params.virtual;
                if (n.cache && i.virtual.cache[t]) return i.virtual.cache[t];
                let s = n.renderSlide
                    ? d(n.renderSlide.call(i, e, t))
                    : d(`<div class="${i.params.slideClass}" data-swiper-slide-index="${t}">${e}</div>`);
                return (
                    s.attr("data-swiper-slide-index") || s.attr("data-swiper-slide-index", t),
                    n.cache && (i.virtual.cache[t] = s),
                    s
                );
            }
            function l(e) {
                let { slidesPerView: t, slidesPerGroup: n, centeredSlides: s } = i.params,
                    { addSlidesBefore: l, addSlidesAfter: o } = i.params.virtual,
                    { from: d, to: c, slides: u, slidesGrid: p, offset: h } = i.virtual;
                i.params.cssMode || i.updateActiveIndex();
                let f = i.activeIndex || 0,
                    m,
                    g,
                    $;
                (m = i.rtlTranslate ? "right" : i.isHorizontal() ? "left" : "top"),
                    s
                        ? ((g = Math.floor(t / 2) + n + o), ($ = Math.floor(t / 2) + n + l))
                        : ((g = t + (n - 1) + o), ($ = n + l));
                let v = Math.max((f || 0) - $, 0),
                    y = Math.min((f || 0) + g, u.length - 1),
                    _ = (i.slidesGrid[v] || 0) - (i.slidesGrid[0] || 0);
                function b() {
                    i.updateSlides(),
                        i.updateProgress(),
                        i.updateSlidesClasses(),
                        i.lazy && i.params.lazy.enabled && i.lazy.load(),
                        r("virtualUpdate");
                }
                if (
                    (Object.assign(i.virtual, { from: v, to: y, offset: _, slidesGrid: i.slidesGrid }),
                    d === v && c === y && !e)
                )
                    return (
                        i.slidesGrid !== p && _ !== h && i.slides.css(m, `${_}px`),
                        i.updateProgress(),
                        void r("virtualUpdate")
                    );
                if (i.params.virtual.renderExternal)
                    return (
                        i.params.virtual.renderExternal.call(i, {
                            offset: _,
                            from: v,
                            to: y,
                            slides: (function () {
                                let e = [];
                                for (let t = v; t <= y; t += 1) e.push(u[t]);
                                return e;
                            })(),
                        }),
                        void (i.params.virtual.renderExternalUpdate ? b() : r("virtualUpdate"))
                    );
                let x = [],
                    w = [];
                if (e) i.$wrapperEl.find(`.${i.params.slideClass}`).remove();
                else
                    for (let S = d; S <= c; S += 1)
                        (S < v || S > y) &&
                            i.$wrapperEl.find(`.${i.params.slideClass}[data-swiper-slide-index="${S}"]`).remove();
                for (let E = 0; E < u.length; E += 1)
                    E >= v && E <= y && (void 0 === c || e ? w.push(E) : (E > c && w.push(E), E < d && x.push(E)));
                w.forEach((e) => {
                    i.$wrapperEl.append(a(u[e], e));
                }),
                    x
                        .sort((e, t) => t - e)
                        .forEach((e) => {
                            i.$wrapperEl.prepend(a(u[e], e));
                        }),
                    i.$wrapperEl.children(".swiper-slide").css(m, `${_}px`),
                    b();
            }
            n({
                virtual: {
                    enabled: !1,
                    slides: [],
                    cache: !0,
                    renderSlide: null,
                    renderExternal: null,
                    renderExternalUpdate: !0,
                    addSlidesBefore: 0,
                    addSlidesAfter: 0,
                },
            }),
                (i.virtual = { cache: {}, from: void 0, to: void 0, slides: [], offset: 0, slidesGrid: [] }),
                s("beforeInit", () => {
                    i.params.virtual.enabled &&
                        ((i.virtual.slides = i.params.virtual.slides),
                        i.classNames.push(`${i.params.containerModifierClass}virtual`),
                        (i.params.watchSlidesProgress = !0),
                        (i.originalParams.watchSlidesProgress = !0),
                        i.params.initialSlide || l());
                }),
                s("setTranslate", () => {
                    i.params.virtual.enabled &&
                        (i.params.cssMode && !i._immediateVirtual
                            ? (clearTimeout(t),
                              (t = setTimeout(() => {
                                  l();
                              }, 100)))
                            : l());
                }),
                s("init update resize", () => {
                    i.params.virtual.enabled &&
                        i.params.cssMode &&
                        $(i.wrapperEl, "--swiper-virtual-size", `${i.virtualSize}px`);
                }),
                Object.assign(i.virtual, {
                    appendSlide: function (e) {
                        if ("object" == typeof e && "length" in e)
                            for (let t = 0; t < e.length; t += 1) e[t] && i.virtual.slides.push(e[t]);
                        else i.virtual.slides.push(e);
                        l(!0);
                    },
                    prependSlide: function (e) {
                        let t = i.activeIndex,
                            n = t + 1,
                            s = 1;
                        if (Array.isArray(e)) {
                            for (let r = 0; r < e.length; r += 1) e[r] && i.virtual.slides.unshift(e[r]);
                            (n = t + e.length), (s = e.length);
                        } else i.virtual.slides.unshift(e);
                        if (i.params.virtual.cache) {
                            let a = i.virtual.cache,
                                o = {};
                            Object.keys(a).forEach((e) => {
                                let t = a[e],
                                    i = t.attr("data-swiper-slide-index");
                                i && t.attr("data-swiper-slide-index", parseInt(i, 10) + s),
                                    (o[parseInt(e, 10) + s] = t);
                            }),
                                (i.virtual.cache = o);
                        }
                        l(!0), i.slideTo(n, 0);
                    },
                    removeSlide: function (e) {
                        if (null == e) return;
                        let t = i.activeIndex;
                        if (Array.isArray(e))
                            for (let n = e.length - 1; n >= 0; n -= 1)
                                i.virtual.slides.splice(e[n], 1),
                                    i.params.virtual.cache && delete i.virtual.cache[e[n]],
                                    e[n] < t && (t -= 1),
                                    (t = Math.max(t, 0));
                        else
                            i.virtual.slides.splice(e, 1),
                                i.params.virtual.cache && delete i.virtual.cache[e],
                                e < t && (t -= 1),
                                (t = Math.max(t, 0));
                        l(!0), i.slideTo(t, 0);
                    },
                    removeAllSlides: function () {
                        (i.virtual.slides = []),
                            i.params.virtual.cache && (i.virtual.cache = {}),
                            l(!0),
                            i.slideTo(0, 0);
                    },
                    update: l,
                });
        },
        function (e) {
            let { swiper: t, extendParams: i, on: s, emit: a } = e,
                l = n(),
                o = r();
            function c(e) {
                if (!t.enabled) return;
                let { rtlTranslate: i } = t,
                    n = e;
                n.originalEvent && (n = n.originalEvent);
                let s = n.keyCode || n.charCode,
                    r = t.params.keyboard.pageUpDown,
                    d = r && 33 === s,
                    c = r && 34 === s,
                    u = 37 === s,
                    p = 39 === s,
                    h = 38 === s,
                    f = 40 === s;
                if (
                    (!t.allowSlideNext && ((t.isHorizontal() && p) || (t.isVertical() && f) || c)) ||
                    (!t.allowSlidePrev && ((t.isHorizontal() && u) || (t.isVertical() && h) || d))
                )
                    return !1;
                if (
                    !(
                        n.shiftKey ||
                        n.altKey ||
                        n.ctrlKey ||
                        n.metaKey ||
                        (l.activeElement &&
                            l.activeElement.nodeName &&
                            ("input" === l.activeElement.nodeName.toLowerCase() ||
                                "textarea" === l.activeElement.nodeName.toLowerCase()))
                    )
                ) {
                    if (t.params.keyboard.onlyInViewport && (d || c || u || p || h || f)) {
                        let m = !1;
                        if (
                            t.$el.parents(`.${t.params.slideClass}`).length > 0 &&
                            0 === t.$el.parents(`.${t.params.slideActiveClass}`).length
                        )
                            return;
                        let g = t.$el,
                            $ = g[0].clientWidth,
                            v = g[0].clientHeight,
                            y = o.innerWidth,
                            _ = o.innerHeight,
                            b = t.$el.offset();
                        i && (b.left -= t.$el[0].scrollLeft);
                        let x = [
                            [b.left, b.top],
                            [b.left + $, b.top],
                            [b.left, b.top + v],
                            [b.left + $, b.top + v],
                        ];
                        for (let w = 0; w < x.length; w += 1) {
                            let S = x[w];
                            if (S[0] >= 0 && S[0] <= y && S[1] >= 0 && S[1] <= _) {
                                if (0 === S[0] && 0 === S[1]) continue;
                                m = !0;
                            }
                        }
                        if (!m) return;
                    }
                    t.isHorizontal()
                        ? ((d || c || u || p) && (n.preventDefault ? n.preventDefault() : (n.returnValue = !1)),
                          (((c || p) && !i) || ((d || u) && i)) && t.slideNext(),
                          (((d || u) && !i) || ((c || p) && i)) && t.slidePrev())
                        : ((d || c || h || f) && (n.preventDefault ? n.preventDefault() : (n.returnValue = !1)),
                          (c || f) && t.slideNext(),
                          (d || h) && t.slidePrev()),
                        a("keyPress", s);
                }
            }
            function u() {
                t.keyboard.enabled || (d(l).on("keydown", c), (t.keyboard.enabled = !0));
            }
            function p() {
                t.keyboard.enabled && (d(l).off("keydown", c), (t.keyboard.enabled = !1));
            }
            (t.keyboard = { enabled: !1 }),
                i({ keyboard: { enabled: !1, onlyInViewport: !0, pageUpDown: !0 } }),
                s("init", () => {
                    t.params.keyboard.enabled && u();
                }),
                s("destroy", () => {
                    t.keyboard.enabled && p();
                }),
                Object.assign(t.keyboard, { enable: u, disable: p });
        },
        function (e) {
            let { swiper: t, extendParams: i, on: n, emit: s } = e,
                a = r(),
                l;
            i({
                mousewheel: {
                    enabled: !1,
                    releaseOnEdges: !1,
                    invert: !1,
                    forceToAxis: !1,
                    sensitivity: 1,
                    eventsTarget: "container",
                    thresholdDelta: null,
                    thresholdTime: null,
                },
            }),
                (t.mousewheel = { enabled: !1 });
            let o,
                c = p(),
                h = [];
            function f() {
                t.enabled && (t.mouseEntered = !0);
            }
            function m() {
                t.enabled && (t.mouseEntered = !1);
            }
            function g(e) {
                return (
                    !(t.params.mousewheel.thresholdDelta && e.delta < t.params.mousewheel.thresholdDelta) &&
                    !(t.params.mousewheel.thresholdTime && p() - c < t.params.mousewheel.thresholdTime) &&
                    ((e.delta >= 6 && p() - c < 60) ||
                        (e.direction < 0
                            ? (t.isEnd && !t.params.loop) || t.animating || (t.slideNext(), s("scroll", e.raw))
                            : (t.isBeginning && !t.params.loop) || t.animating || (t.slidePrev(), s("scroll", e.raw)),
                        (c = new a.Date().getTime()),
                        !1))
                );
            }
            function $(e) {
                var i;
                let n = e,
                    r = !0;
                if (!t.enabled) return;
                let a = t.params.mousewheel;
                t.params.cssMode && n.preventDefault();
                let c = t.$el;
                if (
                    ("container" !== t.params.mousewheel.eventsTarget && (c = d(t.params.mousewheel.eventsTarget)),
                    !t.mouseEntered && !c[0].contains(n.target) && !a.releaseOnEdges)
                )
                    return !0;
                n.originalEvent && (n = n.originalEvent);
                let f = 0,
                    m,
                    $,
                    v,
                    y,
                    _ = t.rtlTranslate ? -1 : 1,
                    b =
                        ((i = n),
                        (m = 0),
                        ($ = 0),
                        (v = 0),
                        (y = 0),
                        "detail" in i && ($ = i.detail),
                        "wheelDelta" in i && ($ = -i.wheelDelta / 120),
                        "wheelDeltaY" in i && ($ = -i.wheelDeltaY / 120),
                        "wheelDeltaX" in i && (m = -i.wheelDeltaX / 120),
                        "axis" in i && i.axis === i.HORIZONTAL_AXIS && ((m = $), ($ = 0)),
                        (v = 10 * m),
                        (y = 10 * $),
                        "deltaY" in i && (y = i.deltaY),
                        "deltaX" in i && (v = i.deltaX),
                        i.shiftKey && !v && ((v = y), (y = 0)),
                        (v || y) &&
                            i.deltaMode &&
                            (1 === i.deltaMode ? ((v *= 40), (y *= 40)) : ((v *= 800), (y *= 800))),
                        v && !m && (m = v < 1 ? -1 : 1),
                        y && !$ && ($ = y < 1 ? -1 : 1),
                        { spinX: m, spinY: $, pixelX: v, pixelY: y });
                if (a.forceToAxis) {
                    if (t.isHorizontal()) {
                        if (!(Math.abs(b.pixelX) > Math.abs(b.pixelY))) return !0;
                        f = -b.pixelX * _;
                    } else {
                        if (!(Math.abs(b.pixelY) > Math.abs(b.pixelX))) return !0;
                        f = -b.pixelY;
                    }
                } else f = Math.abs(b.pixelX) > Math.abs(b.pixelY) ? -b.pixelX * _ : -b.pixelY;
                if (0 === f) return !0;
                a.invert && (f = -f);
                let x = t.getTranslate() + f * a.sensitivity;
                if (
                    (x >= t.minTranslate() && (x = t.minTranslate()),
                    x <= t.maxTranslate() && (x = t.maxTranslate()),
                    (r = !!t.params.loop || !(x === t.minTranslate() || x === t.maxTranslate())) &&
                        t.params.nested &&
                        n.stopPropagation(),
                    t.params.freeMode && t.params.freeMode.enabled)
                ) {
                    let w = { time: p(), delta: Math.abs(f), direction: Math.sign(f) },
                        S = o && w.time < o.time + 500 && w.delta <= o.delta && w.direction === o.direction;
                    if (!S) {
                        (o = void 0), t.params.loop && t.loopFix();
                        let E = t.getTranslate() + f * a.sensitivity,
                            T = t.isBeginning,
                            C = t.isEnd;
                        if (
                            (E >= t.minTranslate() && (E = t.minTranslate()),
                            E <= t.maxTranslate() && (E = t.maxTranslate()),
                            t.setTransition(0),
                            t.setTranslate(E),
                            t.updateProgress(),
                            t.updateActiveIndex(),
                            t.updateSlidesClasses(),
                            ((!T && t.isBeginning) || (!C && t.isEnd)) && t.updateSlidesClasses(),
                            t.params.freeMode.sticky)
                        ) {
                            clearTimeout(l), (l = void 0), h.length >= 15 && h.shift();
                            let k = h.length ? h[h.length - 1] : void 0,
                                P = h[0];
                            if ((h.push(w), k && (w.delta > k.delta || w.direction !== k.direction))) h.splice(0);
                            else if (
                                h.length >= 15 &&
                                w.time - P.time < 500 &&
                                P.delta - w.delta >= 1 &&
                                w.delta <= 6
                            ) {
                                let A = f > 0 ? 0.8 : 0.2;
                                (o = w),
                                    h.splice(0),
                                    (l = u(() => {
                                        t.slideToClosest(t.params.speed, !0, void 0, A);
                                    }, 0));
                            }
                            l ||
                                (l = u(() => {
                                    (o = w), h.splice(0), t.slideToClosest(t.params.speed, !0, void 0, 0.5);
                                }, 500));
                        }
                        if (
                            (S || s("scroll", n),
                            t.params.autoplay && t.params.autoplayDisableOnInteraction && t.autoplay.stop(),
                            E === t.minTranslate() || E === t.maxTranslate())
                        )
                            return !0;
                    }
                } else {
                    let z = { time: p(), delta: Math.abs(f), direction: Math.sign(f), raw: e };
                    h.length >= 2 && h.shift();
                    let L = h.length ? h[h.length - 1] : void 0;
                    if (
                        (h.push(z),
                        L ? (z.direction !== L.direction || z.delta > L.delta || z.time > L.time + 150) && g(z) : g(z),
                        (function (e) {
                            let i = t.params.mousewheel;
                            if (e.direction < 0) {
                                if (t.isEnd && !t.params.loop && i.releaseOnEdges) return !0;
                            } else if (t.isBeginning && !t.params.loop && i.releaseOnEdges) return !0;
                            return !1;
                        })(z))
                    )
                        return !0;
                }
                return n.preventDefault ? n.preventDefault() : (n.returnValue = !1), !1;
            }
            function v(e) {
                let i = t.$el;
                "container" !== t.params.mousewheel.eventsTarget && (i = d(t.params.mousewheel.eventsTarget)),
                    i[e]("mouseenter", f),
                    i[e]("mouseleave", m),
                    i[e]("wheel", $);
            }
            function y() {
                return t.params.cssMode
                    ? (t.wrapperEl.removeEventListener("wheel", $), !0)
                    : !t.mousewheel.enabled && (v("on"), (t.mousewheel.enabled = !0), !0);
            }
            function _() {
                return t.params.cssMode
                    ? (t.wrapperEl.addEventListener(event, $), !0)
                    : !!t.mousewheel.enabled && (v("off"), (t.mousewheel.enabled = !1), !0);
            }
            n("init", () => {
                !t.params.mousewheel.enabled && t.params.cssMode && _(), t.params.mousewheel.enabled && y();
            }),
                n("destroy", () => {
                    t.params.cssMode && y(), t.mousewheel.enabled && _();
                }),
                Object.assign(t.mousewheel, { enable: y, disable: _ });
        },
        function (e) {
            let { swiper: t, extendParams: i, on: n, emit: s } = e;
            function r(e) {
                let i;
                return (
                    e &&
                        ((i = d(e)),
                        t.params.uniqueNavElements &&
                            "string" == typeof e &&
                            i.length > 1 &&
                            1 === t.$el.find(e).length &&
                            (i = t.$el.find(e))),
                    i
                );
            }
            function a(e, i) {
                let n = t.params.navigation;
                e &&
                    e.length > 0 &&
                    (e[i ? "addClass" : "removeClass"](n.disabledClass),
                    e[0] && "BUTTON" === e[0].tagName && (e[0].disabled = i),
                    t.params.watchOverflow && t.enabled && e[t.isLocked ? "addClass" : "removeClass"](n.lockClass));
            }
            function l() {
                if (t.params.loop) return;
                let { $nextEl: e, $prevEl: i } = t.navigation;
                a(i, t.isBeginning && !t.params.rewind), a(e, t.isEnd && !t.params.rewind);
            }
            function o(e) {
                e.preventDefault(), (!t.isBeginning || t.params.loop || t.params.rewind) && t.slidePrev();
            }
            function c(e) {
                e.preventDefault(), (!t.isEnd || t.params.loop || t.params.rewind) && t.slideNext();
            }
            function u() {
                let e = t.params.navigation;
                if (
                    ((t.params.navigation = B(t, t.originalParams.navigation, t.params.navigation, {
                        nextEl: "swiper-button-next",
                        prevEl: "swiper-button-prev",
                    })),
                    !e.nextEl && !e.prevEl)
                )
                    return;
                let i = r(e.nextEl),
                    n = r(e.prevEl);
                i && i.length > 0 && i.on("click", c),
                    n && n.length > 0 && n.on("click", o),
                    Object.assign(t.navigation, { $nextEl: i, nextEl: i && i[0], $prevEl: n, prevEl: n && n[0] }),
                    t.enabled || (i && i.addClass(e.lockClass), n && n.addClass(e.lockClass));
            }
            function p() {
                let { $nextEl: e, $prevEl: i } = t.navigation;
                e && e.length && (e.off("click", c), e.removeClass(t.params.navigation.disabledClass)),
                    i && i.length && (i.off("click", o), i.removeClass(t.params.navigation.disabledClass));
            }
            i({
                navigation: {
                    nextEl: null,
                    prevEl: null,
                    hideOnClick: !1,
                    disabledClass: "swiper-button-disabled",
                    hiddenClass: "swiper-button-hidden",
                    lockClass: "swiper-button-lock",
                },
            }),
                (t.navigation = { nextEl: null, $nextEl: null, prevEl: null, $prevEl: null }),
                n("init", () => {
                    u(), l();
                }),
                n("toEdge fromEdge lock unlock", () => {
                    l();
                }),
                n("destroy", () => {
                    p();
                }),
                n("enable disable", () => {
                    let { $nextEl: e, $prevEl: i } = t.navigation;
                    e && e[t.enabled ? "removeClass" : "addClass"](t.params.navigation.lockClass),
                        i && i[t.enabled ? "removeClass" : "addClass"](t.params.navigation.lockClass);
                }),
                n("click", (e, i) => {
                    let { $nextEl: n, $prevEl: r } = t.navigation,
                        a = i.target;
                    if (t.params.navigation.hideOnClick && !d(a).is(r) && !d(a).is(n)) {
                        if (
                            t.pagination &&
                            t.params.pagination &&
                            t.params.pagination.clickable &&
                            (t.pagination.el === a || t.pagination.el.contains(a))
                        )
                            return;
                        let l;
                        n
                            ? (l = n.hasClass(t.params.navigation.hiddenClass))
                            : r && (l = r.hasClass(t.params.navigation.hiddenClass)),
                            s(!0 === l ? "navigationShow" : "navigationHide"),
                            n && n.toggleClass(t.params.navigation.hiddenClass),
                            r && r.toggleClass(t.params.navigation.hiddenClass);
                    }
                }),
                Object.assign(t.navigation, { update: l, init: u, destroy: p });
        },
        function (e) {
            let { swiper: t, extendParams: i, on: n, emit: s } = e,
                r = "swiper-pagination",
                a;
            i({
                pagination: {
                    el: null,
                    bulletElement: "span",
                    clickable: !1,
                    hideOnClick: !1,
                    renderBullet: null,
                    renderProgressbar: null,
                    renderFraction: null,
                    renderCustom: null,
                    progressbarOpposite: !1,
                    type: "bullets",
                    dynamicBullets: !1,
                    dynamicMainBullets: 1,
                    formatFractionCurrent: (e) => e,
                    formatFractionTotal: (e) => e,
                    bulletClass: `${r}-bullet`,
                    bulletActiveClass: `${r}-bullet-active`,
                    modifierClass: `${r}-`,
                    currentClass: `${r}-current`,
                    totalClass: `${r}-total`,
                    hiddenClass: `${r}-hidden`,
                    progressbarFillClass: `${r}-progressbar-fill`,
                    progressbarOppositeClass: `${r}-progressbar-opposite`,
                    clickableClass: `${r}-clickable`,
                    lockClass: `${r}-lock`,
                    horizontalClass: `${r}-horizontal`,
                    verticalClass: `${r}-vertical`,
                },
            }),
                (t.pagination = { el: null, $el: null, bullets: [] });
            let l = 0;
            function o() {
                return (
                    !t.params.pagination.el || !t.pagination.el || !t.pagination.$el || 0 === t.pagination.$el.length
                );
            }
            function c(e, i) {
                let { bulletActiveClass: n } = t.params.pagination;
                e[i]().addClass(`${n}-${i}`)[i]().addClass(`${n}-${i}-${i}`);
            }
            function u() {
                let e = t.rtl,
                    i = t.params.pagination;
                if (o()) return;
                let n = t.virtual && t.params.virtual.enabled ? t.virtual.slides.length : t.slides.length,
                    r = t.pagination.$el,
                    u,
                    p = t.params.loop
                        ? Math.ceil((n - 2 * t.loopedSlides) / t.params.slidesPerGroup)
                        : t.snapGrid.length;
                if (
                    (t.params.loop
                        ? ((u = Math.ceil((t.activeIndex - t.loopedSlides) / t.params.slidesPerGroup)) >
                              n - 1 - 2 * t.loopedSlides && (u -= n - 2 * t.loopedSlides),
                          u > p - 1 && (u -= p),
                          u < 0 && "bullets" !== t.params.paginationType && (u = p + u))
                        : (u = void 0 !== t.snapIndex ? t.snapIndex : t.activeIndex || 0),
                    "bullets" === i.type && t.pagination.bullets && t.pagination.bullets.length > 0)
                ) {
                    let h = t.pagination.bullets,
                        f,
                        m,
                        g;
                    if (
                        (i.dynamicBullets &&
                            ((a = h.eq(0)[t.isHorizontal() ? "outerWidth" : "outerHeight"](!0)),
                            r.css(t.isHorizontal() ? "width" : "height", a * (i.dynamicMainBullets + 4) + "px"),
                            i.dynamicMainBullets > 1 &&
                                void 0 !== t.previousIndex &&
                                ((l += u - (t.previousIndex - t.loopedSlides || 0)) > i.dynamicMainBullets - 1
                                    ? (l = i.dynamicMainBullets - 1)
                                    : l < 0 && (l = 0)),
                            (g =
                                ((m = (f = Math.max(u - l, 0)) + (Math.min(h.length, i.dynamicMainBullets) - 1)) + f) /
                                2)),
                        h.removeClass(
                            ["", "-next", "-next-next", "-prev", "-prev-prev", "-main"]
                                .map((e) => `${i.bulletActiveClass}${e}`)
                                .join(" ")
                        ),
                        r.length > 1)
                    )
                        h.each((e) => {
                            let t = d(e),
                                n = t.index();
                            n === u && t.addClass(i.bulletActiveClass),
                                i.dynamicBullets &&
                                    (n >= f && n <= m && t.addClass(`${i.bulletActiveClass}-main`),
                                    n === f && c(t, "prev"),
                                    n === m && c(t, "next"));
                        });
                    else {
                        let $ = h.eq(u),
                            v = $.index();
                        if (($.addClass(i.bulletActiveClass), i.dynamicBullets)) {
                            let y = h.eq(f),
                                _ = h.eq(m);
                            for (let b = f; b <= m; b += 1) h.eq(b).addClass(`${i.bulletActiveClass}-main`);
                            if (t.params.loop) {
                                if (v >= h.length) {
                                    for (let x = i.dynamicMainBullets; x >= 0; x -= 1)
                                        h.eq(h.length - x).addClass(`${i.bulletActiveClass}-main`);
                                    h.eq(h.length - i.dynamicMainBullets - 1).addClass(`${i.bulletActiveClass}-prev`);
                                } else c(y, "prev"), c(_, "next");
                            } else c(y, "prev"), c(_, "next");
                        }
                    }
                    if (i.dynamicBullets) {
                        let w = Math.min(h.length, i.dynamicMainBullets + 4),
                            S = (a * w - a) / 2 - g * a;
                        h.css(t.isHorizontal() ? (e ? "right" : "left") : "top", `${S}px`);
                    }
                }
                if (
                    ("fraction" === i.type &&
                        (r.find(V(i.currentClass)).text(i.formatFractionCurrent(u + 1)),
                        r.find(V(i.totalClass)).text(i.formatFractionTotal(p))),
                    "progressbar" === i.type)
                ) {
                    let E;
                    E = i.progressbarOpposite
                        ? t.isHorizontal()
                            ? "vertical"
                            : "horizontal"
                        : t.isHorizontal()
                          ? "horizontal"
                          : "vertical";
                    let T = (u + 1) / p,
                        C = 1,
                        k = 1;
                    "horizontal" === E ? (C = T) : (k = T),
                        r
                            .find(V(i.progressbarFillClass))
                            .transform(`translate3d(0,0,0) scaleX(${C}) scaleY(${k})`)
                            .transition(t.params.speed);
                }
                "custom" === i.type && i.renderCustom
                    ? (r.html(i.renderCustom(t, u + 1, p)), s("paginationRender", r[0]))
                    : s("paginationUpdate", r[0]),
                    t.params.watchOverflow && t.enabled && r[t.isLocked ? "addClass" : "removeClass"](i.lockClass);
            }
            function p() {
                let e = t.params.pagination;
                if (o()) return;
                let i = t.virtual && t.params.virtual.enabled ? t.virtual.slides.length : t.slides.length,
                    n = t.pagination.$el,
                    r = "";
                if ("bullets" === e.type) {
                    let a = t.params.loop
                        ? Math.ceil((i - 2 * t.loopedSlides) / t.params.slidesPerGroup)
                        : t.snapGrid.length;
                    t.params.freeMode && t.params.freeMode.enabled && !t.params.loop && a > i && (a = i);
                    for (let l = 0; l < a; l += 1)
                        e.renderBullet
                            ? (r += e.renderBullet.call(t, l, e.bulletClass))
                            : (r += `<${e.bulletElement} class="${e.bulletClass}"></${e.bulletElement}>`);
                    n.html(r), (t.pagination.bullets = n.find(V(e.bulletClass)));
                }
                "fraction" === e.type &&
                    ((r = e.renderFraction
                        ? e.renderFraction.call(t, e.currentClass, e.totalClass)
                        : `<span class="${e.currentClass}"></span> / <span class="${e.totalClass}"></span>`),
                    n.html(r)),
                    "progressbar" === e.type &&
                        ((r = e.renderProgressbar
                            ? e.renderProgressbar.call(t, e.progressbarFillClass)
                            : `<span class="${e.progressbarFillClass}"></span>`),
                        n.html(r)),
                    "custom" !== e.type && s("paginationRender", t.pagination.$el[0]);
            }
            function h() {
                t.params.pagination = B(t, t.originalParams.pagination, t.params.pagination, {
                    el: "swiper-pagination",
                });
                let e = t.params.pagination;
                if (!e.el) return;
                let i = d(e.el);
                0 !== i.length &&
                    (t.params.uniqueNavElements &&
                        "string" == typeof e.el &&
                        i.length > 1 &&
                        (i = t.$el.find(e.el)).length > 1 &&
                        (i = i.filter((e) => d(e).parents(".swiper")[0] === t.el)),
                    "bullets" === e.type && e.clickable && i.addClass(e.clickableClass),
                    i.addClass(e.modifierClass + e.type),
                    i.addClass(t.isHorizontal() ? e.horizontalClass : e.verticalClass),
                    "bullets" === e.type &&
                        e.dynamicBullets &&
                        (i.addClass(`${e.modifierClass}${e.type}-dynamic`),
                        (l = 0),
                        e.dynamicMainBullets < 1 && (e.dynamicMainBullets = 1)),
                    "progressbar" === e.type && e.progressbarOpposite && i.addClass(e.progressbarOppositeClass),
                    e.clickable &&
                        i.on("click", V(e.bulletClass), function (e) {
                            e.preventDefault();
                            let i = d(this).index() * t.params.slidesPerGroup;
                            t.params.loop && (i += t.loopedSlides), t.slideTo(i);
                        }),
                    Object.assign(t.pagination, { $el: i, el: i[0] }),
                    t.enabled || i.addClass(e.lockClass));
            }
            function f() {
                let e = t.params.pagination;
                if (o()) return;
                let i = t.pagination.$el;
                i.removeClass(e.hiddenClass),
                    i.removeClass(e.modifierClass + e.type),
                    i.removeClass(t.isHorizontal() ? e.horizontalClass : e.verticalClass),
                    t.pagination.bullets &&
                        t.pagination.bullets.removeClass &&
                        t.pagination.bullets.removeClass(e.bulletActiveClass),
                    e.clickable && i.off("click", V(e.bulletClass));
            }
            n("init", () => {
                h(), p(), u();
            }),
                n("activeIndexChange", () => {
                    (t.params.loop || void 0 === t.snapIndex) && u();
                }),
                n("snapIndexChange", () => {
                    t.params.loop || u();
                }),
                n("slidesLengthChange", () => {
                    t.params.loop && (p(), u());
                }),
                n("snapGridLengthChange", () => {
                    t.params.loop || (p(), u());
                }),
                n("destroy", () => {
                    f();
                }),
                n("enable disable", () => {
                    let { $el: e } = t.pagination;
                    e && e[t.enabled ? "removeClass" : "addClass"](t.params.pagination.lockClass);
                }),
                n("lock unlock", () => {
                    u();
                }),
                n("click", (e, i) => {
                    let n = i.target,
                        { $el: r } = t.pagination;
                    if (
                        t.params.pagination.el &&
                        t.params.pagination.hideOnClick &&
                        r.length > 0 &&
                        !d(n).hasClass(t.params.pagination.bulletClass)
                    ) {
                        if (
                            t.navigation &&
                            ((t.navigation.nextEl && n === t.navigation.nextEl) ||
                                (t.navigation.prevEl && n === t.navigation.prevEl))
                        )
                            return;
                        let a = r.hasClass(t.params.pagination.hiddenClass);
                        s(!0 === a ? "paginationShow" : "paginationHide"),
                            r.toggleClass(t.params.pagination.hiddenClass);
                    }
                }),
                Object.assign(t.pagination, { render: p, update: u, init: h, destroy: f });
        },
        function (e) {
            let { swiper: t, extendParams: i, on: s, emit: r } = e,
                a = n(),
                l,
                o,
                c,
                p,
                h = !1,
                f = null,
                m = null;
            function g() {
                if (!t.params.scrollbar.el || !t.scrollbar.el) return;
                let { scrollbar: e, rtlTranslate: i, progress: n } = t,
                    { $dragEl: s, $el: r } = e,
                    a = t.params.scrollbar,
                    l = o,
                    d = (c - o) * n;
                i
                    ? (d = -d) > 0
                        ? ((l = o - d), (d = 0))
                        : -d + o > c && (l = c + d)
                    : d < 0
                      ? ((l = o + d), (d = 0))
                      : d + o > c && (l = c - d),
                    t.isHorizontal()
                        ? (s.transform(`translate3d(${d}px, 0, 0)`), (s[0].style.width = `${l}px`))
                        : (s.transform(`translate3d(0px, ${d}px, 0)`), (s[0].style.height = `${l}px`)),
                    a.hide &&
                        (clearTimeout(f),
                        (r[0].style.opacity = 1),
                        (f = setTimeout(() => {
                            (r[0].style.opacity = 0), r.transition(400);
                        }, 1e3)));
            }
            function $() {
                if (!t.params.scrollbar.el || !t.scrollbar.el) return;
                let { scrollbar: e } = t,
                    { $dragEl: i, $el: n } = e;
                (i[0].style.width = ""),
                    (i[0].style.height = ""),
                    (c = t.isHorizontal() ? n[0].offsetWidth : n[0].offsetHeight),
                    (p =
                        t.size /
                        (t.virtualSize + t.params.slidesOffsetBefore - (t.params.centeredSlides ? t.snapGrid[0] : 0))),
                    (o = "auto" === t.params.scrollbar.dragSize ? c * p : parseInt(t.params.scrollbar.dragSize, 10)),
                    t.isHorizontal() ? (i[0].style.width = `${o}px`) : (i[0].style.height = `${o}px`),
                    (n[0].style.display = p >= 1 ? "none" : ""),
                    t.params.scrollbar.hide && (n[0].style.opacity = 0),
                    t.params.watchOverflow &&
                        t.enabled &&
                        e.$el[t.isLocked ? "addClass" : "removeClass"](t.params.scrollbar.lockClass);
            }
            function v(e) {
                return t.isHorizontal()
                    ? "touchstart" === e.type || "touchmove" === e.type
                        ? e.targetTouches[0].clientX
                        : e.clientX
                    : "touchstart" === e.type || "touchmove" === e.type
                      ? e.targetTouches[0].clientY
                      : e.clientY;
            }
            function y(e) {
                let { scrollbar: i, rtlTranslate: n } = t,
                    { $el: s } = i,
                    r;
                (r = Math.max(
                    Math.min(
                        (r =
                            (v(e) - s.offset()[t.isHorizontal() ? "left" : "top"] - (null !== l ? l : o / 2)) /
                            (c - o)),
                        1
                    ),
                    0
                )),
                    n && (r = 1 - r);
                let a = t.minTranslate() + (t.maxTranslate() - t.minTranslate()) * r;
                t.updateProgress(a), t.setTranslate(a), t.updateActiveIndex(), t.updateSlidesClasses();
            }
            function _(e) {
                let i = t.params.scrollbar,
                    { scrollbar: n, $wrapperEl: s } = t,
                    { $el: a, $dragEl: o } = n;
                (h = !0),
                    (l =
                        e.target === o[0] || e.target === o
                            ? v(e) - e.target.getBoundingClientRect()[t.isHorizontal() ? "left" : "top"]
                            : null),
                    e.preventDefault(),
                    e.stopPropagation(),
                    s.transition(100),
                    o.transition(100),
                    y(e),
                    clearTimeout(m),
                    a.transition(0),
                    i.hide && a.css("opacity", 1),
                    t.params.cssMode && t.$wrapperEl.css("scroll-snap-type", "none"),
                    r("scrollbarDragStart", e);
            }
            function b(e) {
                let { scrollbar: i, $wrapperEl: n } = t,
                    { $el: s, $dragEl: a } = i;
                h &&
                    (e.preventDefault ? e.preventDefault() : (e.returnValue = !1),
                    y(e),
                    n.transition(0),
                    s.transition(0),
                    a.transition(0),
                    r("scrollbarDragMove", e));
            }
            function x(e) {
                let i = t.params.scrollbar,
                    { scrollbar: n, $wrapperEl: s } = t,
                    { $el: a } = n;
                h &&
                    ((h = !1),
                    t.params.cssMode && (t.$wrapperEl.css("scroll-snap-type", ""), s.transition("")),
                    i.hide &&
                        (clearTimeout(m),
                        (m = u(() => {
                            a.css("opacity", 0), a.transition(400);
                        }, 1e3))),
                    r("scrollbarDragEnd", e),
                    i.snapOnRelease && t.slideToClosest());
            }
            function w(e) {
                let { scrollbar: i, touchEventsTouch: n, touchEventsDesktop: s, params: r, support: l } = t,
                    o = i.$el[0],
                    d = !(!l.passiveListener || !r.passiveListeners) && { passive: !1, capture: !1 },
                    c = !(!l.passiveListener || !r.passiveListeners) && { passive: !0, capture: !1 };
                if (!o) return;
                let u = "on" === e ? "addEventListener" : "removeEventListener";
                l.touch
                    ? (o[u](n.start, _, d), o[u](n.move, b, d), o[u](n.end, x, c))
                    : (o[u](s.start, _, d), a[u](s.move, b, d), a[u](s.end, x, c));
            }
            function S() {
                let { scrollbar: e, $el: i } = t;
                t.params.scrollbar = B(t, t.originalParams.scrollbar, t.params.scrollbar, { el: "swiper-scrollbar" });
                let n = t.params.scrollbar;
                if (!n.el) return;
                let s = d(n.el);
                t.params.uniqueNavElements &&
                    "string" == typeof n.el &&
                    s.length > 1 &&
                    1 === i.find(n.el).length &&
                    (s = i.find(n.el));
                let r = s.find(`.${t.params.scrollbar.dragClass}`);
                0 === r.length && ((r = d(`<div class="${t.params.scrollbar.dragClass}"></div>`)), s.append(r)),
                    Object.assign(e, { $el: s, el: s[0], $dragEl: r, dragEl: r[0] }),
                    n.draggable && t.params.scrollbar.el && w("on"),
                    s && s[t.enabled ? "removeClass" : "addClass"](t.params.scrollbar.lockClass);
            }
            function E() {
                t.params.scrollbar.el && w("off");
            }
            i({
                scrollbar: {
                    el: null,
                    dragSize: "auto",
                    hide: !1,
                    draggable: !1,
                    snapOnRelease: !0,
                    lockClass: "swiper-scrollbar-lock",
                    dragClass: "swiper-scrollbar-drag",
                },
            }),
                (t.scrollbar = { el: null, dragEl: null, $el: null, $dragEl: null }),
                s("init", () => {
                    S(), $(), g();
                }),
                s("update resize observerUpdate lock unlock", () => {
                    $();
                }),
                s("setTranslate", () => {
                    g();
                }),
                s("setTransition", (e, i) => {
                    var n;
                    (n = i), t.params.scrollbar.el && t.scrollbar.el && t.scrollbar.$dragEl.transition(n);
                }),
                s("enable disable", () => {
                    let { $el: e } = t.scrollbar;
                    e && e[t.enabled ? "removeClass" : "addClass"](t.params.scrollbar.lockClass);
                }),
                s("destroy", () => {
                    E();
                }),
                Object.assign(t.scrollbar, { updateSize: $, setTranslate: g, init: S, destroy: E });
        },
        function (e) {
            let { swiper: t, extendParams: i, on: n } = e;
            i({ parallax: { enabled: !1 } });
            let s = (e, i) => {
                    let { rtl: n } = t,
                        s = d(e),
                        r = n ? -1 : 1,
                        a = s.attr("data-swiper-parallax") || "0",
                        l = s.attr("data-swiper-parallax-x"),
                        o = s.attr("data-swiper-parallax-y"),
                        c = s.attr("data-swiper-parallax-scale"),
                        u = s.attr("data-swiper-parallax-opacity");
                    l || o
                        ? ((l = l || "0"), (o = o || "0"))
                        : t.isHorizontal()
                          ? ((l = a), (o = "0"))
                          : ((o = a), (l = "0")),
                        (l = l.indexOf("%") >= 0 ? parseInt(l, 10) * i * r + "%" : l * i * r + "px"),
                        (o = o.indexOf("%") >= 0 ? parseInt(o, 10) * i + "%" : o * i + "px"),
                        null != u && (s[0].style.opacity = u - (u - 1) * (1 - Math.abs(i))),
                        null == c
                            ? s.transform(`translate3d(${l}, ${o}, 0px)`)
                            : s.transform(`translate3d(${l}, ${o}, 0px) scale(${c - (c - 1) * (1 - Math.abs(i))})`);
                },
                r = () => {
                    let { $el: e, slides: i, progress: n, snapGrid: r } = t;
                    e
                        .children(
                            "[data-swiper-parallax], [data-swiper-parallax-x], [data-swiper-parallax-y], [data-swiper-parallax-opacity], [data-swiper-parallax-scale]"
                        )
                        .each((e) => {
                            s(e, n);
                        }),
                        i.each((e, i) => {
                            let a = e.progress;
                            t.params.slidesPerGroup > 1 &&
                                "auto" !== t.params.slidesPerView &&
                                (a += Math.ceil(i / 2) - n * (r.length - 1)),
                                (a = Math.min(Math.max(a, -1), 1)),
                                d(e)
                                    .find(
                                        "[data-swiper-parallax], [data-swiper-parallax-x], [data-swiper-parallax-y], [data-swiper-parallax-opacity], [data-swiper-parallax-scale]"
                                    )
                                    .each((e) => {
                                        s(e, a);
                                    });
                        });
                };
            n("beforeInit", () => {
                t.params.parallax.enabled &&
                    ((t.params.watchSlidesProgress = !0), (t.originalParams.watchSlidesProgress = !0));
            }),
                n("init", () => {
                    t.params.parallax.enabled && r();
                }),
                n("setTranslate", () => {
                    t.params.parallax.enabled && r();
                }),
                n("setTransition", (e, i) => {
                    t.params.parallax.enabled &&
                        (function (e) {
                            void 0 === e && (e = t.params.speed);
                            let { $el: i } = t;
                            i.find(
                                "[data-swiper-parallax], [data-swiper-parallax-x], [data-swiper-parallax-y], [data-swiper-parallax-opacity], [data-swiper-parallax-scale]"
                            ).each((t) => {
                                let i = d(t),
                                    n = parseInt(i.attr("data-swiper-parallax-duration"), 10) || e;
                                0 === e && (n = 0), i.transition(n);
                            });
                        })(i);
                });
        },
        function (e) {
            let { swiper: t, extendParams: i, on: n, emit: s } = e,
                a = r();
            i({
                zoom: {
                    enabled: !1,
                    maxRatio: 3,
                    minRatio: 1,
                    toggle: !0,
                    containerClass: "swiper-zoom-container",
                    zoomedSlideClass: "swiper-slide-zoomed",
                },
            }),
                (t.zoom = { enabled: !1 });
            let l,
                o,
                c,
                u = 1,
                p = !1,
                f = {
                    $slideEl: void 0,
                    slideWidth: void 0,
                    slideHeight: void 0,
                    $imageEl: void 0,
                    $imageWrapEl: void 0,
                    maxRatio: 3,
                },
                m = {
                    isTouched: void 0,
                    isMoved: void 0,
                    currentX: void 0,
                    currentY: void 0,
                    minX: void 0,
                    minY: void 0,
                    maxX: void 0,
                    maxY: void 0,
                    width: void 0,
                    height: void 0,
                    startX: void 0,
                    startY: void 0,
                    touchesStart: {},
                    touchesCurrent: {},
                },
                g = { x: void 0, y: void 0, prevPositionX: void 0, prevPositionY: void 0, prevTime: void 0 },
                $ = 1;
            function v(e) {
                if (e.targetTouches.length < 2) return 1;
                let t = e.targetTouches[0].pageX,
                    i = e.targetTouches[0].pageY,
                    n = e.targetTouches[1].pageX,
                    s = e.targetTouches[1].pageY;
                return Math.sqrt((n - t) ** 2 + (s - i) ** 2);
            }
            function y(e) {
                let i = t.support,
                    n = t.params.zoom;
                if (((o = !1), (c = !1), !i.gestures)) {
                    if ("touchstart" !== e.type || ("touchstart" === e.type && e.targetTouches.length < 2)) return;
                    (o = !0), (f.scaleStart = v(e));
                }
                (f.$slideEl && f.$slideEl.length) ||
                ((f.$slideEl = d(e.target).closest(`.${t.params.slideClass}`)),
                0 === f.$slideEl.length && (f.$slideEl = t.slides.eq(t.activeIndex)),
                (f.$imageEl = f.$slideEl
                    .find(`.${n.containerClass}`)
                    .eq(0)
                    .find("picture, img, svg, canvas, .swiper-zoom-target")
                    .eq(0)),
                (f.$imageWrapEl = f.$imageEl.parent(`.${n.containerClass}`)),
                (f.maxRatio = f.$imageWrapEl.attr("data-swiper-zoom") || n.maxRatio),
                0 !== f.$imageWrapEl.length)
                    ? (f.$imageEl && f.$imageEl.transition(0), (p = !0))
                    : (f.$imageEl = void 0);
            }
            function _(e) {
                let i = t.support,
                    n = t.params.zoom,
                    s = t.zoom;
                if (!i.gestures) {
                    if ("touchmove" !== e.type || ("touchmove" === e.type && e.targetTouches.length < 2)) return;
                    (c = !0), (f.scaleMove = v(e));
                }
                f.$imageEl && 0 !== f.$imageEl.length
                    ? (i.gestures ? (s.scale = e.scale * u) : (s.scale = (f.scaleMove / f.scaleStart) * u),
                      s.scale > f.maxRatio && (s.scale = f.maxRatio - 1 + (s.scale - f.maxRatio + 1) ** 0.5),
                      s.scale < n.minRatio && (s.scale = n.minRatio + 1 - (n.minRatio - s.scale + 1) ** 0.5),
                      f.$imageEl.transform(`translate3d(0,0,0) scale(${s.scale})`))
                    : "gesturechange" === e.type && y(e);
            }
            function b(e) {
                let i = t.device,
                    n = t.support,
                    s = t.params.zoom,
                    r = t.zoom;
                if (!n.gestures) {
                    if (
                        !o ||
                        !c ||
                        "touchend" !== e.type ||
                        ("touchend" === e.type && e.changedTouches.length < 2 && !i.android)
                    )
                        return;
                    (o = !1), (c = !1);
                }
                f.$imageEl &&
                    0 !== f.$imageEl.length &&
                    ((r.scale = Math.max(Math.min(r.scale, f.maxRatio), s.minRatio)),
                    f.$imageEl.transition(t.params.speed).transform(`translate3d(0,0,0) scale(${r.scale})`),
                    (u = r.scale),
                    (p = !1),
                    1 === r.scale && (f.$slideEl = void 0));
            }
            function x(e) {
                let i = t.zoom;
                if (!f.$imageEl || 0 === f.$imageEl.length || ((t.allowClick = !1), !m.isTouched || !f.$slideEl))
                    return;
                m.isMoved ||
                    ((m.width = f.$imageEl[0].offsetWidth),
                    (m.height = f.$imageEl[0].offsetHeight),
                    (m.startX = h(f.$imageWrapEl[0], "x") || 0),
                    (m.startY = h(f.$imageWrapEl[0], "y") || 0),
                    (f.slideWidth = f.$slideEl[0].offsetWidth),
                    (f.slideHeight = f.$slideEl[0].offsetHeight),
                    f.$imageWrapEl.transition(0));
                let n = m.width * i.scale,
                    s = m.height * i.scale;
                if (!(n < f.slideWidth && s < f.slideHeight)) {
                    if (
                        ((m.minX = Math.min(f.slideWidth / 2 - n / 2, 0)),
                        (m.maxX = -m.minX),
                        (m.minY = Math.min(f.slideHeight / 2 - s / 2, 0)),
                        (m.maxY = -m.minY),
                        (m.touchesCurrent.x = "touchmove" === e.type ? e.targetTouches[0].pageX : e.pageX),
                        (m.touchesCurrent.y = "touchmove" === e.type ? e.targetTouches[0].pageY : e.pageY),
                        !m.isMoved &&
                            !p &&
                            ((t.isHorizontal() &&
                                ((Math.floor(m.minX) === Math.floor(m.startX) &&
                                    m.touchesCurrent.x < m.touchesStart.x) ||
                                    (Math.floor(m.maxX) === Math.floor(m.startX) &&
                                        m.touchesCurrent.x > m.touchesStart.x))) ||
                                (!t.isHorizontal() &&
                                    ((Math.floor(m.minY) === Math.floor(m.startY) &&
                                        m.touchesCurrent.y < m.touchesStart.y) ||
                                        (Math.floor(m.maxY) === Math.floor(m.startY) &&
                                            m.touchesCurrent.y > m.touchesStart.y)))))
                    )
                        return void (m.isTouched = !1);
                    e.cancelable && e.preventDefault(),
                        e.stopPropagation(),
                        (m.isMoved = !0),
                        (m.currentX = m.touchesCurrent.x - m.touchesStart.x + m.startX),
                        (m.currentY = m.touchesCurrent.y - m.touchesStart.y + m.startY),
                        m.currentX < m.minX && (m.currentX = m.minX + 1 - (m.minX - m.currentX + 1) ** 0.8),
                        m.currentX > m.maxX && (m.currentX = m.maxX - 1 + (m.currentX - m.maxX + 1) ** 0.8),
                        m.currentY < m.minY && (m.currentY = m.minY + 1 - (m.minY - m.currentY + 1) ** 0.8),
                        m.currentY > m.maxY && (m.currentY = m.maxY - 1 + (m.currentY - m.maxY + 1) ** 0.8),
                        g.prevPositionX || (g.prevPositionX = m.touchesCurrent.x),
                        g.prevPositionY || (g.prevPositionY = m.touchesCurrent.y),
                        g.prevTime || (g.prevTime = Date.now()),
                        (g.x = (m.touchesCurrent.x - g.prevPositionX) / (Date.now() - g.prevTime) / 2),
                        (g.y = (m.touchesCurrent.y - g.prevPositionY) / (Date.now() - g.prevTime) / 2),
                        2 > Math.abs(m.touchesCurrent.x - g.prevPositionX) && (g.x = 0),
                        2 > Math.abs(m.touchesCurrent.y - g.prevPositionY) && (g.y = 0),
                        (g.prevPositionX = m.touchesCurrent.x),
                        (g.prevPositionY = m.touchesCurrent.y),
                        (g.prevTime = Date.now()),
                        f.$imageWrapEl.transform(`translate3d(${m.currentX}px, ${m.currentY}px,0)`);
                }
            }
            function w() {
                let e = t.zoom;
                f.$slideEl &&
                    t.previousIndex !== t.activeIndex &&
                    (f.$imageEl && f.$imageEl.transform("translate3d(0,0,0) scale(1)"),
                    f.$imageWrapEl && f.$imageWrapEl.transform("translate3d(0,0,0)"),
                    (e.scale = 1),
                    (u = 1),
                    (f.$slideEl = void 0),
                    (f.$imageEl = void 0),
                    (f.$imageWrapEl = void 0));
            }
            function S(e) {
                let i = t.zoom,
                    n = t.params.zoom;
                if (
                    (f.$slideEl ||
                        (e && e.target && (f.$slideEl = d(e.target).closest(`.${t.params.slideClass}`)),
                        f.$slideEl ||
                            (t.params.virtual && t.params.virtual.enabled && t.virtual
                                ? (f.$slideEl = t.$wrapperEl.children(`.${t.params.slideActiveClass}`))
                                : (f.$slideEl = t.slides.eq(t.activeIndex))),
                        (f.$imageEl = f.$slideEl
                            .find(`.${n.containerClass}`)
                            .eq(0)
                            .find("picture, img, svg, canvas, .swiper-zoom-target")
                            .eq(0)),
                        (f.$imageWrapEl = f.$imageEl.parent(`.${n.containerClass}`))),
                    !f.$imageEl || 0 === f.$imageEl.length || !f.$imageWrapEl || 0 === f.$imageWrapEl.length)
                )
                    return;
                let s, r, l, o, c, p, h, g, $, v, y, _, b, x, w, S, E, T;
                t.params.cssMode && ((t.wrapperEl.style.overflow = "hidden"), (t.wrapperEl.style.touchAction = "none")),
                    f.$slideEl.addClass(`${n.zoomedSlideClass}`),
                    void 0 === m.touchesStart.x && e
                        ? ((s = "touchend" === e.type ? e.changedTouches[0].pageX : e.pageX),
                          (r = "touchend" === e.type ? e.changedTouches[0].pageY : e.pageY))
                        : ((s = m.touchesStart.x), (r = m.touchesStart.y)),
                    (i.scale = f.$imageWrapEl.attr("data-swiper-zoom") || n.maxRatio),
                    (u = f.$imageWrapEl.attr("data-swiper-zoom") || n.maxRatio),
                    e
                        ? ((E = f.$slideEl[0].offsetWidth),
                          (T = f.$slideEl[0].offsetHeight),
                          (l = f.$slideEl.offset().left + a.scrollX),
                          (o = f.$slideEl.offset().top + a.scrollY),
                          (c = l + E / 2 - s),
                          (p = o + T / 2 - r),
                          ($ = f.$imageEl[0].offsetWidth),
                          (v = f.$imageEl[0].offsetHeight),
                          (y = $ * i.scale),
                          (_ = v * i.scale),
                          (b = Math.min(E / 2 - y / 2, 0)),
                          (x = Math.min(T / 2 - _ / 2, 0)),
                          (w = -b),
                          (S = -x),
                          (h = c * i.scale),
                          (g = p * i.scale),
                          h < b && (h = b),
                          h > w && (h = w),
                          g < x && (g = x),
                          g > S && (g = S))
                        : ((h = 0), (g = 0)),
                    f.$imageWrapEl.transition(300).transform(`translate3d(${h}px, ${g}px,0)`),
                    f.$imageEl.transition(300).transform(`translate3d(0,0,0) scale(${i.scale})`);
            }
            function E() {
                let e = t.zoom,
                    i = t.params.zoom;
                f.$slideEl ||
                    (t.params.virtual && t.params.virtual.enabled && t.virtual
                        ? (f.$slideEl = t.$wrapperEl.children(`.${t.params.slideActiveClass}`))
                        : (f.$slideEl = t.slides.eq(t.activeIndex)),
                    (f.$imageEl = f.$slideEl
                        .find(`.${i.containerClass}`)
                        .eq(0)
                        .find("picture, img, svg, canvas, .swiper-zoom-target")
                        .eq(0)),
                    (f.$imageWrapEl = f.$imageEl.parent(`.${i.containerClass}`))),
                    f.$imageEl &&
                        0 !== f.$imageEl.length &&
                        f.$imageWrapEl &&
                        0 !== f.$imageWrapEl.length &&
                        (t.params.cssMode && ((t.wrapperEl.style.overflow = ""), (t.wrapperEl.style.touchAction = "")),
                        (e.scale = 1),
                        (u = 1),
                        f.$imageWrapEl.transition(300).transform("translate3d(0,0,0)"),
                        f.$imageEl.transition(300).transform("translate3d(0,0,0) scale(1)"),
                        f.$slideEl.removeClass(`${i.zoomedSlideClass}`),
                        (f.$slideEl = void 0));
            }
            function T(e) {
                let i = t.zoom;
                i.scale && 1 !== i.scale ? E() : S(e);
            }
            function C() {
                let e = t.support;
                return {
                    passiveListener: !(
                        "touchstart" !== t.touchEvents.start ||
                        !e.passiveListener ||
                        !t.params.passiveListeners
                    ) && { passive: !0, capture: !1 },
                    activeListenerWithCapture: !e.passiveListener || { passive: !1, capture: !0 },
                };
            }
            function k() {
                return `.${t.params.slideClass}`;
            }
            function P(e) {
                let { passiveListener: i } = C(),
                    n = k();
                t.$wrapperEl[e]("gesturestart", n, y, i),
                    t.$wrapperEl[e]("gesturechange", n, _, i),
                    t.$wrapperEl[e]("gestureend", n, b, i);
            }
            function A() {
                l || ((l = !0), P("on"));
            }
            function z() {
                l && ((l = !1), P("off"));
            }
            function L() {
                let e = t.zoom;
                if (e.enabled) return;
                e.enabled = !0;
                let i = t.support,
                    { passiveListener: n, activeListenerWithCapture: s } = C(),
                    r = k();
                i.gestures
                    ? (t.$wrapperEl.on(t.touchEvents.start, A, n), t.$wrapperEl.on(t.touchEvents.end, z, n))
                    : "touchstart" === t.touchEvents.start &&
                      (t.$wrapperEl.on(t.touchEvents.start, r, y, n),
                      t.$wrapperEl.on(t.touchEvents.move, r, _, s),
                      t.$wrapperEl.on(t.touchEvents.end, r, b, n),
                      t.touchEvents.cancel && t.$wrapperEl.on(t.touchEvents.cancel, r, b, n)),
                    t.$wrapperEl.on(t.touchEvents.move, `.${t.params.zoom.containerClass}`, x, s);
            }
            function O() {
                let e = t.zoom;
                if (!e.enabled) return;
                let i = t.support;
                e.enabled = !1;
                let { passiveListener: n, activeListenerWithCapture: s } = C(),
                    r = k();
                i.gestures
                    ? (t.$wrapperEl.off(t.touchEvents.start, A, n), t.$wrapperEl.off(t.touchEvents.end, z, n))
                    : "touchstart" === t.touchEvents.start &&
                      (t.$wrapperEl.off(t.touchEvents.start, r, y, n),
                      t.$wrapperEl.off(t.touchEvents.move, r, _, s),
                      t.$wrapperEl.off(t.touchEvents.end, r, b, n),
                      t.touchEvents.cancel && t.$wrapperEl.off(t.touchEvents.cancel, r, b, n)),
                    t.$wrapperEl.off(t.touchEvents.move, `.${t.params.zoom.containerClass}`, x, s);
            }
            Object.defineProperty(t.zoom, "scale", {
                get: () => $,
                set(e) {
                    if ($ !== e) {
                        let t = f.$imageEl ? f.$imageEl[0] : void 0,
                            i = f.$slideEl ? f.$slideEl[0] : void 0;
                        s("zoomChange", e, t, i);
                    }
                    $ = e;
                },
            }),
                n("init", () => {
                    t.params.zoom.enabled && L();
                }),
                n("destroy", () => {
                    O();
                }),
                n("touchStart", (e, i) => {
                    t.zoom.enabled &&
                        (function (e) {
                            let i = t.device;
                            f.$imageEl &&
                                0 !== f.$imageEl.length &&
                                (m.isTouched ||
                                    (i.android && e.cancelable && e.preventDefault(),
                                    (m.isTouched = !0),
                                    (m.touchesStart.x = "touchstart" === e.type ? e.targetTouches[0].pageX : e.pageX),
                                    (m.touchesStart.y = "touchstart" === e.type ? e.targetTouches[0].pageY : e.pageY)));
                        })(i);
                }),
                n("touchEnd", (e, i) => {
                    t.zoom.enabled &&
                        (function () {
                            let e = t.zoom;
                            if (!f.$imageEl || 0 === f.$imageEl.length) return;
                            if (!m.isTouched || !m.isMoved) return (m.isTouched = !1), void (m.isMoved = !1);
                            (m.isTouched = !1), (m.isMoved = !1);
                            let i = 300,
                                n = 300,
                                s = g.x * i,
                                r = m.currentX + s,
                                a = g.y * n,
                                l = m.currentY + a;
                            0 !== g.x && (i = Math.abs((r - m.currentX) / g.x)),
                                0 !== g.y && (n = Math.abs((l - m.currentY) / g.y));
                            let o = Math.max(i, n);
                            (m.currentX = r), (m.currentY = l);
                            let d = m.width * e.scale,
                                c = m.height * e.scale;
                            (m.minX = Math.min(f.slideWidth / 2 - d / 2, 0)),
                                (m.maxX = -m.minX),
                                (m.minY = Math.min(f.slideHeight / 2 - c / 2, 0)),
                                (m.maxY = -m.minY),
                                (m.currentX = Math.max(Math.min(m.currentX, m.maxX), m.minX)),
                                (m.currentY = Math.max(Math.min(m.currentY, m.maxY), m.minY)),
                                f.$imageWrapEl
                                    .transition(o)
                                    .transform(`translate3d(${m.currentX}px, ${m.currentY}px,0)`);
                        })();
                }),
                n("doubleTap", (e, i) => {
                    !t.animating && t.params.zoom.enabled && t.zoom.enabled && t.params.zoom.toggle && T(i);
                }),
                n("transitionEnd", () => {
                    t.zoom.enabled && t.params.zoom.enabled && w();
                }),
                n("slideChange", () => {
                    t.zoom.enabled && t.params.zoom.enabled && t.params.cssMode && w();
                }),
                Object.assign(t.zoom, { enable: L, disable: O, in: S, out: E, toggle: T });
        },
        function (e) {
            let { swiper: t, extendParams: i, on: n, emit: s } = e;
            i({
                lazy: {
                    checkInView: !1,
                    enabled: !1,
                    loadPrevNext: !1,
                    loadPrevNextAmount: 1,
                    loadOnTransitionStart: !1,
                    scrollingElement: "",
                    elementClass: "swiper-lazy",
                    loadingClass: "swiper-lazy-loading",
                    loadedClass: "swiper-lazy-loaded",
                    preloaderClass: "swiper-lazy-preloader",
                },
            }),
                (t.lazy = {});
            let a = !1,
                l = !1;
            function o(e, i) {
                void 0 === i && (i = !0);
                let n = t.params.lazy;
                if (void 0 === e || 0 === t.slides.length) return;
                let r =
                        t.virtual && t.params.virtual.enabled
                            ? t.$wrapperEl.children(`.${t.params.slideClass}[data-swiper-slide-index="${e}"]`)
                            : t.slides.eq(e),
                    a = r.find(`.${n.elementClass}:not(.${n.loadedClass}):not(.${n.loadingClass})`);
                !r.hasClass(n.elementClass) || r.hasClass(n.loadedClass) || r.hasClass(n.loadingClass) || a.push(r[0]),
                    0 !== a.length &&
                        a.each((e) => {
                            let a = d(e);
                            a.addClass(n.loadingClass);
                            let l = a.attr("data-background"),
                                c = a.attr("data-src"),
                                u = a.attr("data-srcset"),
                                p = a.attr("data-sizes"),
                                h = a.parent("picture");
                            t.loadImage(a[0], c || l, u, p, !1, () => {
                                if (null != t && t && (!t || t.params) && !t.destroyed) {
                                    if (
                                        (l
                                            ? (a.css("background-image", `url("${l}")`),
                                              a.removeAttr("data-background"))
                                            : (u && (a.attr("srcset", u), a.removeAttr("data-srcset")),
                                              p && (a.attr("sizes", p), a.removeAttr("data-sizes")),
                                              h.length &&
                                                  h.children("source").each((e) => {
                                                      let t = d(e);
                                                      t.attr("data-srcset") &&
                                                          (t.attr("srcset", t.attr("data-srcset")),
                                                          t.removeAttr("data-srcset"));
                                                  }),
                                              c && (a.attr("src", c), a.removeAttr("data-src"))),
                                        a.addClass(n.loadedClass).removeClass(n.loadingClass),
                                        r.find(`.${n.preloaderClass}`).remove(),
                                        t.params.loop && i)
                                    ) {
                                        let e = r.attr("data-swiper-slide-index");
                                        r.hasClass(t.params.slideDuplicateClass)
                                            ? o(
                                                  t.$wrapperEl
                                                      .children(
                                                          `[data-swiper-slide-index="${e}"]:not(.${t.params.slideDuplicateClass})`
                                                      )
                                                      .index(),
                                                  !1
                                              )
                                            : o(
                                                  t.$wrapperEl
                                                      .children(
                                                          `.${t.params.slideDuplicateClass}[data-swiper-slide-index="${e}"]`
                                                      )
                                                      .index(),
                                                  !1
                                              );
                                    }
                                    s("lazyImageReady", r[0], a[0]), t.params.autoHeight && t.updateAutoHeight();
                                }
                            }),
                                s("lazyImageLoad", r[0], a[0]);
                        });
            }
            function c() {
                let { $wrapperEl: e, params: i, slides: n, activeIndex: s } = t,
                    r = t.virtual && i.virtual.enabled,
                    a = i.lazy,
                    c = i.slidesPerView;
                function u(t) {
                    if (r) {
                        if (e.children(`.${i.slideClass}[data-swiper-slide-index="${t}"]`).length) return !0;
                    } else if (n[t]) return !0;
                    return !1;
                }
                function p(e) {
                    return r ? d(e).attr("data-swiper-slide-index") : d(e).index();
                }
                if (("auto" === c && (c = 0), l || (l = !0), t.params.watchSlidesProgress))
                    e.children(`.${i.slideVisibleClass}`).each((e) => {
                        o(r ? d(e).attr("data-swiper-slide-index") : d(e).index());
                    });
                else if (c > 1) for (let h = s; h < s + c; h += 1) u(h) && o(h);
                else o(s);
                if (a.loadPrevNext) {
                    if (c > 1 || (a.loadPrevNextAmount && a.loadPrevNextAmount > 1)) {
                        let f = a.loadPrevNextAmount,
                            m = c,
                            g = Math.min(s + m + Math.max(f, m), n.length),
                            $ = Math.max(s - Math.max(m, f), 0);
                        for (let v = s + c; v < g; v += 1) u(v) && o(v);
                        for (let y = $; y < s; y += 1) u(y) && o(y);
                    } else {
                        let _ = e.children(`.${i.slideNextClass}`);
                        _.length > 0 && o(p(_));
                        let b = e.children(`.${i.slidePrevClass}`);
                        b.length > 0 && o(p(b));
                    }
                }
            }
            function u() {
                let e = r();
                if (!t || t.destroyed) return;
                let i = t.params.lazy.scrollingElement ? d(t.params.lazy.scrollingElement) : d(e),
                    n = i[0] === e,
                    s = n ? e.innerWidth : i[0].offsetWidth,
                    l = n ? e.innerHeight : i[0].offsetHeight,
                    o = t.$el.offset(),
                    { rtlTranslate: p } = t,
                    h = !1;
                p && (o.left -= t.$el[0].scrollLeft);
                let f = [
                    [o.left, o.top],
                    [o.left + t.width, o.top],
                    [o.left, o.top + t.height],
                    [o.left + t.width, o.top + t.height],
                ];
                for (let m = 0; m < f.length; m += 1) {
                    let g = f[m];
                    if (g[0] >= 0 && g[0] <= s && g[1] >= 0 && g[1] <= l) {
                        if (0 === g[0] && 0 === g[1]) continue;
                        h = !0;
                    }
                }
                let $ = !(
                    "touchstart" !== t.touchEvents.start ||
                    !t.support.passiveListener ||
                    !t.params.passiveListeners
                ) && { passive: !0, capture: !1 };
                h ? (c(), i.off("scroll", u, $)) : a || ((a = !0), i.on("scroll", u, $));
            }
            n("beforeInit", () => {
                t.params.lazy.enabled && t.params.preloadImages && (t.params.preloadImages = !1);
            }),
                n("init", () => {
                    t.params.lazy.enabled && (t.params.lazy.checkInView ? u() : c());
                }),
                n("scroll", () => {
                    t.params.freeMode && t.params.freeMode.enabled && !t.params.freeMode.sticky && c();
                }),
                n("scrollbarDragMove resize _freeModeNoMomentumRelease", () => {
                    t.params.lazy.enabled && (t.params.lazy.checkInView ? u() : c());
                }),
                n("transitionStart", () => {
                    t.params.lazy.enabled &&
                        (t.params.lazy.loadOnTransitionStart || (!t.params.lazy.loadOnTransitionStart && !l)) &&
                        (t.params.lazy.checkInView ? u() : c());
                }),
                n("transitionEnd", () => {
                    t.params.lazy.enabled &&
                        !t.params.lazy.loadOnTransitionStart &&
                        (t.params.lazy.checkInView ? u() : c());
                }),
                n("slideChange", () => {
                    let {
                        lazy: e,
                        cssMode: i,
                        watchSlidesProgress: n,
                        touchReleaseOnEdges: s,
                        resistanceRatio: r,
                    } = t.params;
                    e.enabled && (i || (n && (s || 0 === r))) && c();
                }),
                Object.assign(t.lazy, { load: c, loadInSlide: o });
        },
        function (e) {
            let { swiper: t, extendParams: i, on: n } = e;
            function s(e, t) {
                let i,
                    n,
                    s,
                    r = (e, t) => {
                        for (n = -1, i = e.length; i - n > 1; ) e[(s = (i + n) >> 1)] <= t ? (n = s) : (i = s);
                        return i;
                    },
                    a,
                    l;
                return (
                    (this.x = e),
                    (this.y = t),
                    (this.lastIndex = e.length - 1),
                    (this.interpolate = function (e) {
                        return e
                            ? ((a = (l = r(this.x, e)) - 1),
                              ((e - this.x[a]) * (this.y[l] - this.y[a])) / (this.x[l] - this.x[a]) + this.y[a])
                            : 0;
                    }),
                    this
                );
            }
            function r() {
                t.controller.control &&
                    t.controller.spline &&
                    ((t.controller.spline = void 0), delete t.controller.spline);
            }
            i({ controller: { control: void 0, inverse: !1, by: "slide" } }),
                (t.controller = { control: void 0 }),
                n("beforeInit", () => {
                    t.controller.control = t.params.controller.control;
                }),
                n("update", () => {
                    r();
                }),
                n("resize", () => {
                    r();
                }),
                n("observerUpdate", () => {
                    r();
                }),
                n("setTranslate", (e, i, n) => {
                    t.controller.control && t.controller.setTranslate(i, n);
                }),
                n("setTransition", (e, i, n) => {
                    t.controller.control && t.controller.setTransition(i, n);
                }),
                Object.assign(t.controller, {
                    setTranslate: function (e, i) {
                        let n = t.controller.control,
                            r,
                            a,
                            l = t.constructor;
                        function o(e) {
                            var i;
                            let n = t.rtlTranslate ? -t.translate : t.translate;
                            "slide" === t.params.controller.by &&
                                ((i = e),
                                t.controller.spline ||
                                    (t.controller.spline = t.params.loop
                                        ? new s(t.slidesGrid, i.slidesGrid)
                                        : new s(t.snapGrid, i.snapGrid)),
                                (a = -t.controller.spline.interpolate(-n))),
                                (a && "container" !== t.params.controller.by) ||
                                    ((r =
                                        (e.maxTranslate() - e.minTranslate()) / (t.maxTranslate() - t.minTranslate())),
                                    (a = (n - t.minTranslate()) * r + e.minTranslate())),
                                t.params.controller.inverse && (a = e.maxTranslate() - a),
                                e.updateProgress(a),
                                e.setTranslate(a, t),
                                e.updateActiveIndex(),
                                e.updateSlidesClasses();
                        }
                        if (Array.isArray(n))
                            for (let d = 0; d < n.length; d += 1) n[d] !== i && n[d] instanceof l && o(n[d]);
                        else n instanceof l && i !== n && o(n);
                    },
                    setTransition: function (e, i) {
                        let n = t.constructor,
                            s = t.controller.control,
                            r;
                        function a(i) {
                            i.setTransition(e, t),
                                0 !== e &&
                                    (i.transitionStart(),
                                    i.params.autoHeight &&
                                        u(() => {
                                            i.updateAutoHeight();
                                        }),
                                    i.$wrapperEl.transitionEnd(() => {
                                        s &&
                                            (i.params.loop && "slide" === t.params.controller.by && i.loopFix(),
                                            i.transitionEnd());
                                    }));
                        }
                        if (Array.isArray(s))
                            for (r = 0; r < s.length; r += 1) s[r] !== i && s[r] instanceof n && a(s[r]);
                        else s instanceof n && i !== s && a(s);
                    },
                });
        },
        function (e) {
            let { swiper: t, extendParams: i, on: n } = e;
            i({
                a11y: {
                    enabled: !0,
                    notificationClass: "swiper-notification",
                    prevSlideMessage: "Previous slide",
                    nextSlideMessage: "Next slide",
                    firstSlideMessage: "This is the first slide",
                    lastSlideMessage: "This is the last slide",
                    paginationBulletMessage: "Go to slide {{index}}",
                    slideLabelMessage: "{{index}} / {{slidesLength}}",
                    containerMessage: null,
                    containerRoleDescriptionMessage: null,
                    itemRoleDescriptionMessage: null,
                    slideRole: "group",
                    id: null,
                },
            });
            let s = null;
            function r(e) {
                let t = s;
                0 !== t.length && (t.html(""), t.html(e));
            }
            function a(e) {
                e.attr("tabIndex", "0");
            }
            function l(e) {
                e.attr("tabIndex", "-1");
            }
            function o(e, t) {
                e.attr("role", t);
            }
            function c(e, t) {
                e.attr("aria-roledescription", t);
            }
            function u(e, t) {
                e.attr("aria-label", t);
            }
            function p(e) {
                e.attr("aria-disabled", !0);
            }
            function h(e) {
                e.attr("aria-disabled", !1);
            }
            function f(e) {
                if (13 !== e.keyCode && 32 !== e.keyCode) return;
                let i = t.params.a11y,
                    n = d(e.target);
                t.navigation &&
                    t.navigation.$nextEl &&
                    n.is(t.navigation.$nextEl) &&
                    ((t.isEnd && !t.params.loop) || t.slideNext(),
                    t.isEnd ? r(i.lastSlideMessage) : r(i.nextSlideMessage)),
                    t.navigation &&
                        t.navigation.$prevEl &&
                        n.is(t.navigation.$prevEl) &&
                        ((t.isBeginning && !t.params.loop) || t.slidePrev(),
                        t.isBeginning ? r(i.firstSlideMessage) : r(i.prevSlideMessage)),
                    t.pagination && n.is(V(t.params.pagination.bulletClass)) && n[0].click();
            }
            function m() {
                return t.pagination && t.pagination.bullets && t.pagination.bullets.length;
            }
            function g() {
                return m() && t.params.pagination.clickable;
            }
            let $ = (e, t, i) => {
                    a(e),
                        "BUTTON" !== e[0].tagName && (o(e, "button"), e.on("keydown", f)),
                        u(e, i),
                        (function (e, t) {
                            e.attr("aria-controls", t);
                        })(e, t);
                },
                v = (e) => {
                    let i = e.target.closest(`.${t.params.slideClass}`);
                    if (!i || !t.slides.includes(i)) return;
                    let n = t.slides.indexOf(i) === t.activeIndex,
                        s = t.params.watchSlidesProgress && t.visibleSlides && t.visibleSlides.includes(i);
                    n || s || t.slideTo(t.slides.indexOf(i), 0);
                };
            n("beforeInit", () => {
                s = d(
                    `<span class="${t.params.a11y.notificationClass}" aria-live="assertive" aria-atomic="true"></span>`
                );
            }),
                n("afterInit", () => {
                    t.params.a11y.enabled &&
                        (function e() {
                            var i, n;
                            let r = t.params.a11y;
                            t.$el.append(s);
                            let a = t.$el;
                            r.containerRoleDescriptionMessage && c(a, r.containerRoleDescriptionMessage),
                                r.containerMessage && u(a, r.containerMessage);
                            let l = t.$wrapperEl,
                                p =
                                    r.id ||
                                    l.attr("id") ||
                                    `swiper-wrapper-${((i = 16), "x".repeat(i).replace(/x/g, () => Math.round(16 * Math.random()).toString(16)))}`,
                                h = t.params.autoplay && t.params.autoplay.enabled ? "off" : "polite";
                            (n = p),
                                l.attr("id", n),
                                (function (e, t) {
                                    e.attr("aria-live", t);
                                })(l, h),
                                r.itemRoleDescriptionMessage && c(d(t.slides), r.itemRoleDescriptionMessage),
                                o(d(t.slides), r.slideRole);
                            let m = t.params.loop
                                    ? t.slides.filter((e) => !e.classList.contains(t.params.slideDuplicateClass)).length
                                    : t.slides.length,
                                y,
                                _;
                            t.slides.each((e, i) => {
                                let n = d(e),
                                    s = t.params.loop ? parseInt(n.attr("data-swiper-slide-index"), 10) : i;
                                u(
                                    n,
                                    r.slideLabelMessage
                                        .replace(/\{\{index\}\}/, s + 1)
                                        .replace(/\{\{slidesLength\}\}/, m)
                                );
                            }),
                                t.navigation && t.navigation.$nextEl && (y = t.navigation.$nextEl),
                                t.navigation && t.navigation.$prevEl && (_ = t.navigation.$prevEl),
                                y && y.length && $(y, p, r.nextSlideMessage),
                                _ && _.length && $(_, p, r.prevSlideMessage),
                                g() && t.pagination.$el.on("keydown", V(t.params.pagination.bulletClass), f),
                                t.$el.on("focus", v, !0);
                        })();
                }),
                n("fromEdge toEdge afterInit lock unlock", () => {
                    t.params.a11y.enabled &&
                        (function () {
                            if (t.params.loop || t.params.rewind || !t.navigation) return;
                            let { $nextEl: e, $prevEl: i } = t.navigation;
                            i && i.length > 0 && (t.isBeginning ? (p(i), l(i)) : (h(i), a(i))),
                                e && e.length > 0 && (t.isEnd ? (p(e), l(e)) : (h(e), a(e)));
                        })();
                }),
                n("paginationUpdate", () => {
                    t.params.a11y.enabled &&
                        (function () {
                            let e = t.params.a11y;
                            m() &&
                                t.pagination.bullets.each((i) => {
                                    let n = d(i);
                                    t.params.pagination.clickable &&
                                        (a(n),
                                        t.params.pagination.renderBullet ||
                                            (o(n, "button"),
                                            u(n, e.paginationBulletMessage.replace(/\{\{index\}\}/, n.index() + 1)))),
                                        n.is(`.${t.params.pagination.bulletActiveClass}`)
                                            ? n.attr("aria-current", "true")
                                            : n.removeAttr("aria-current");
                                });
                        })();
                }),
                n("destroy", () => {
                    let e, i;
                    t.params.a11y.enabled &&
                        (s && s.length > 0 && s.remove(),
                        t.navigation && t.navigation.$nextEl && (e = t.navigation.$nextEl),
                        t.navigation && t.navigation.$prevEl && (i = t.navigation.$prevEl),
                        e && e.off("keydown", f),
                        i && i.off("keydown", f),
                        g() && t.pagination.$el.off("keydown", V(t.params.pagination.bulletClass), f),
                        t.$el.off("focus", v, !0));
                });
        },
        function (e) {
            let { swiper: t, extendParams: i, on: n } = e;
            i({ history: { enabled: !1, root: "", replaceState: !1, key: "slides" } });
            let s = !1,
                a = {},
                l = (e) =>
                    e
                        .toString()
                        .replace(/\s+/g, "-")
                        .replace(/[^\w-]+/g, "")
                        .replace(/--+/g, "-")
                        .replace(/^-+/, "")
                        .replace(/-+$/, ""),
                o = (e) => {
                    let t = r(),
                        i;
                    i = e ? new URL(e) : t.location;
                    let n = i.pathname
                            .slice(1)
                            .split("/")
                            .filter((e) => "" !== e),
                        s = n.length;
                    return { key: n[s - 2], value: n[s - 1] };
                },
                d = (e, i) => {
                    let n = r();
                    if (!s || !t.params.history.enabled) return;
                    let a;
                    a = t.params.url ? new URL(t.params.url) : n.location;
                    let o = t.slides.eq(i),
                        d = l(o.attr("data-history"));
                    if (t.params.history.root.length > 0) {
                        let c = t.params.history.root;
                        "/" === c[c.length - 1] && (c = c.slice(0, c.length - 1)), (d = `${c}/${e}/${d}`);
                    } else a.pathname.includes(e) || (d = `${e}/${d}`);
                    let u = n.history.state;
                    (u && u.value === d) ||
                        (t.params.history.replaceState
                            ? n.history.replaceState({ value: d }, null, d)
                            : n.history.pushState({ value: d }, null, d));
                },
                c = (e, i, n) => {
                    if (i)
                        for (let s = 0, r = t.slides.length; s < r; s += 1) {
                            let a = t.slides.eq(s);
                            if (l(a.attr("data-history")) === i && !a.hasClass(t.params.slideDuplicateClass)) {
                                let o = a.index();
                                t.slideTo(o, e, n);
                            }
                        }
                    else t.slideTo(0, e, n);
                },
                u = () => {
                    (a = o(t.params.url)), c(t.params.speed, t.paths.value, !1);
                };
            n("init", () => {
                t.params.history.enabled &&
                    (() => {
                        let e = r();
                        if (t.params.history) {
                            if (!e.history || !e.history.pushState)
                                return (t.params.history.enabled = !1), void (t.params.hashNavigation.enabled = !0);
                            (s = !0),
                                ((a = o(t.params.url)).key || a.value) &&
                                    (c(0, a.value, t.params.runCallbacksOnInit),
                                    t.params.history.replaceState || e.addEventListener("popstate", u));
                        }
                    })();
            }),
                n("destroy", () => {
                    t.params.history.enabled &&
                        (() => {
                            let e = r();
                            t.params.history.replaceState || e.removeEventListener("popstate", u);
                        })();
                }),
                n("transitionEnd _freeModeNoMomentumRelease", () => {
                    s && d(t.params.history.key, t.activeIndex);
                }),
                n("slideChange", () => {
                    s && t.params.cssMode && d(t.params.history.key, t.activeIndex);
                });
        },
        function (e) {
            let { swiper: t, extendParams: i, emit: s, on: a } = e,
                l = !1,
                o = n(),
                c = r();
            i({ hashNavigation: { enabled: !1, replaceState: !1, watchState: !1 } });
            let u = () => {
                    s("hashChange");
                    let e = o.location.hash.replace("#", "");
                    if (e !== t.slides.eq(t.activeIndex).attr("data-hash")) {
                        let i = t.$wrapperEl.children(`.${t.params.slideClass}[data-hash="${e}"]`).index();
                        if (void 0 === i) return;
                        t.slideTo(i);
                    }
                },
                p = () => {
                    if (l && t.params.hashNavigation.enabled) {
                        if (t.params.hashNavigation.replaceState && c.history && c.history.replaceState)
                            c.history.replaceState(
                                null,
                                null,
                                `#${t.slides.eq(t.activeIndex).attr("data-hash")}` || ""
                            ),
                                s("hashSet");
                        else {
                            let e = t.slides.eq(t.activeIndex),
                                i = e.attr("data-hash") || e.attr("data-history");
                            (o.location.hash = i || ""), s("hashSet");
                        }
                    }
                };
            a("init", () => {
                t.params.hashNavigation.enabled &&
                    (() => {
                        if (!t.params.hashNavigation.enabled || (t.params.history && t.params.history.enabled)) return;
                        l = !0;
                        let e = o.location.hash.replace("#", "");
                        if (e)
                            for (let i = 0, n = t.slides.length; i < n; i += 1) {
                                let s = t.slides.eq(i);
                                if (
                                    (s.attr("data-hash") || s.attr("data-history")) === e &&
                                    !s.hasClass(t.params.slideDuplicateClass)
                                ) {
                                    let r = s.index();
                                    t.slideTo(r, 0, t.params.runCallbacksOnInit, !0);
                                }
                            }
                        t.params.hashNavigation.watchState && d(c).on("hashchange", u);
                    })();
            }),
                a("destroy", () => {
                    t.params.hashNavigation.enabled && t.params.hashNavigation.watchState && d(c).off("hashchange", u);
                }),
                a("transitionEnd _freeModeNoMomentumRelease", () => {
                    l && p();
                }),
                a("slideChange", () => {
                    l && t.params.cssMode && p();
                });
        },
        function (e) {
            let t,
                { swiper: i, extendParams: s, on: r, emit: a } = e;
            function l() {
                let e = i.slides.eq(i.activeIndex),
                    n = i.params.autoplay.delay;
                e.attr("data-swiper-autoplay") && (n = e.attr("data-swiper-autoplay") || i.params.autoplay.delay),
                    clearTimeout(t),
                    (t = u(() => {
                        let e;
                        i.params.autoplay.reverseDirection
                            ? i.params.loop
                                ? (i.loopFix(), (e = i.slidePrev(i.params.speed, !0, !0)), a("autoplay"))
                                : i.isBeginning
                                  ? i.params.autoplay.stopOnLastSlide
                                      ? d()
                                      : ((e = i.slideTo(i.slides.length - 1, i.params.speed, !0, !0)), a("autoplay"))
                                  : ((e = i.slidePrev(i.params.speed, !0, !0)), a("autoplay"))
                            : i.params.loop
                              ? (i.loopFix(), (e = i.slideNext(i.params.speed, !0, !0)), a("autoplay"))
                              : i.isEnd
                                ? i.params.autoplay.stopOnLastSlide
                                    ? d()
                                    : ((e = i.slideTo(0, i.params.speed, !0, !0)), a("autoplay"))
                                : ((e = i.slideNext(i.params.speed, !0, !0)), a("autoplay")),
                            ((i.params.cssMode && i.autoplay.running) || !1 === e) && l();
                    }, n));
            }
            function o() {
                return void 0 === t && !i.autoplay.running && ((i.autoplay.running = !0), a("autoplayStart"), l(), !0);
            }
            function d() {
                return (
                    !!i.autoplay.running &&
                    void 0 !== t &&
                    (t && (clearTimeout(t), (t = void 0)), (i.autoplay.running = !1), a("autoplayStop"), !0)
                );
            }
            function c(e) {
                i.autoplay.running &&
                    (i.autoplay.paused ||
                        (t && clearTimeout(t),
                        (i.autoplay.paused = !0),
                        0 !== e && i.params.autoplay.waitForTransition
                            ? ["transitionend", "webkitTransitionEnd"].forEach((e) => {
                                  i.$wrapperEl[0].addEventListener(e, h);
                              })
                            : ((i.autoplay.paused = !1), l())));
            }
            function p() {
                let e = n();
                "hidden" === e.visibilityState && i.autoplay.running && c(),
                    "visible" === e.visibilityState && i.autoplay.paused && (l(), (i.autoplay.paused = !1));
            }
            function h(e) {
                i &&
                    !i.destroyed &&
                    i.$wrapperEl &&
                    e.target === i.$wrapperEl[0] &&
                    (["transitionend", "webkitTransitionEnd"].forEach((e) => {
                        i.$wrapperEl[0].removeEventListener(e, h);
                    }),
                    (i.autoplay.paused = !1),
                    i.autoplay.running ? l() : d());
            }
            function f() {
                i.params.autoplay.disableOnInteraction ? d() : (a("autoplayPause"), c()),
                    ["transitionend", "webkitTransitionEnd"].forEach((e) => {
                        i.$wrapperEl[0].removeEventListener(e, h);
                    });
            }
            function m() {
                i.params.autoplay.disableOnInteraction || ((i.autoplay.paused = !1), a("autoplayResume"), l());
            }
            (i.autoplay = { running: !1, paused: !1 }),
                s({
                    autoplay: {
                        enabled: !1,
                        delay: 3e3,
                        waitForTransition: !0,
                        disableOnInteraction: !0,
                        stopOnLastSlide: !1,
                        reverseDirection: !1,
                        pauseOnMouseEnter: !1,
                    },
                }),
                r("init", () => {
                    i.params.autoplay.enabled &&
                        (o(),
                        n().addEventListener("visibilitychange", p),
                        i.params.autoplay.pauseOnMouseEnter && (i.$el.on("mouseenter", f), i.$el.on("mouseleave", m)));
                }),
                r("beforeTransitionStart", (e, t, n) => {
                    i.autoplay.running && (n || !i.params.autoplay.disableOnInteraction ? i.autoplay.pause(t) : d());
                }),
                r("sliderFirstMove", () => {
                    i.autoplay.running && (i.params.autoplay.disableOnInteraction ? d() : c());
                }),
                r("touchEnd", () => {
                    i.params.cssMode && i.autoplay.paused && !i.params.autoplay.disableOnInteraction && l();
                }),
                r("destroy", () => {
                    i.$el.off("mouseenter", f),
                        i.$el.off("mouseleave", m),
                        i.autoplay.running && d(),
                        n().removeEventListener("visibilitychange", p);
                }),
                Object.assign(i.autoplay, { pause: c, run: l, start: o, stop: d });
        },
        function (e) {
            let { swiper: t, extendParams: i, on: n } = e;
            i({
                thumbs: {
                    swiper: null,
                    multipleActiveThumbs: !0,
                    autoScrollOffset: 0,
                    slideThumbActiveClass: "swiper-slide-thumb-active",
                    thumbsContainerClass: "swiper-thumbs",
                },
            });
            let s = !1,
                r = !1;
            function a() {
                let e = t.thumbs.swiper;
                if (!e || e.destroyed) return;
                let i = e.clickedIndex,
                    n = e.clickedSlide;
                if ((n && d(n).hasClass(t.params.thumbs.slideThumbActiveClass)) || null == i) return;
                let s;
                if (
                    ((s = e.params.loop ? parseInt(d(e.clickedSlide).attr("data-swiper-slide-index"), 10) : i),
                    t.params.loop)
                ) {
                    let r = t.activeIndex;
                    t.slides.eq(r).hasClass(t.params.slideDuplicateClass) &&
                        (t.loopFix(), (t._clientLeft = t.$wrapperEl[0].clientLeft), (r = t.activeIndex));
                    let a = t.slides.eq(r).prevAll(`[data-swiper-slide-index="${s}"]`).eq(0).index(),
                        l = t.slides.eq(r).nextAll(`[data-swiper-slide-index="${s}"]`).eq(0).index();
                    s = void 0 === a ? l : void 0 === l ? a : l - r < r - a ? l : a;
                }
                t.slideTo(s);
            }
            function l() {
                let { thumbs: e } = t.params;
                if (s) return !1;
                s = !0;
                let i = t.constructor;
                if (e.swiper instanceof i)
                    (t.thumbs.swiper = e.swiper),
                        Object.assign(t.thumbs.swiper.originalParams, {
                            watchSlidesProgress: !0,
                            slideToClickedSlide: !1,
                        }),
                        Object.assign(t.thumbs.swiper.params, { watchSlidesProgress: !0, slideToClickedSlide: !1 });
                else if (f(e.swiper)) {
                    let n = Object.assign({}, e.swiper);
                    Object.assign(n, { watchSlidesProgress: !0, slideToClickedSlide: !1 }),
                        (t.thumbs.swiper = new i(n)),
                        (r = !0);
                }
                return (
                    t.thumbs.swiper.$el.addClass(t.params.thumbs.thumbsContainerClass), t.thumbs.swiper.on("tap", a), !0
                );
            }
            function o(e) {
                let i = t.thumbs.swiper;
                if (!i || i.destroyed) return;
                let n = "auto" === i.params.slidesPerView ? i.slidesPerViewDynamic() : i.params.slidesPerView,
                    s = t.params.thumbs.autoScrollOffset,
                    r = s && !i.params.loop;
                if (t.realIndex !== i.realIndex || r) {
                    let a,
                        l,
                        o = i.activeIndex;
                    if (i.params.loop) {
                        i.slides.eq(o).hasClass(i.params.slideDuplicateClass) &&
                            (i.loopFix(), (i._clientLeft = i.$wrapperEl[0].clientLeft), (o = i.activeIndex));
                        let d = i.slides.eq(o).prevAll(`[data-swiper-slide-index="${t.realIndex}"]`).eq(0).index(),
                            c = i.slides.eq(o).nextAll(`[data-swiper-slide-index="${t.realIndex}"]`).eq(0).index();
                        (a =
                            void 0 === d
                                ? c
                                : void 0 === c
                                  ? d
                                  : c - o == o - d
                                    ? i.params.slidesPerGroup > 1
                                        ? c
                                        : o
                                    : c - o < o - d
                                      ? c
                                      : d),
                            (l = t.activeIndex > t.previousIndex ? "next" : "prev");
                    } else l = (a = t.realIndex) > t.previousIndex ? "next" : "prev";
                    r && (a += "next" === l ? s : -1 * s),
                        i.visibleSlidesIndexes &&
                            0 > i.visibleSlidesIndexes.indexOf(a) &&
                            (i.params.centeredSlides
                                ? (a = a > o ? a - Math.floor(n / 2) + 1 : a + Math.floor(n / 2) - 1)
                                : a > o && i.params.slidesPerGroup,
                            i.slideTo(a, e ? 0 : void 0));
                }
                let u = 1,
                    p = t.params.thumbs.slideThumbActiveClass;
                if (
                    (t.params.slidesPerView > 1 && !t.params.centeredSlides && (u = t.params.slidesPerView),
                    t.params.thumbs.multipleActiveThumbs || (u = 1),
                    (u = Math.floor(u)),
                    i.slides.removeClass(p),
                    i.params.loop || (i.params.virtual && i.params.virtual.enabled))
                )
                    for (let h = 0; h < u; h += 1)
                        i.$wrapperEl.children(`[data-swiper-slide-index="${t.realIndex + h}"]`).addClass(p);
                else for (let f = 0; f < u; f += 1) i.slides.eq(t.realIndex + f).addClass(p);
            }
            (t.thumbs = { swiper: null }),
                n("beforeInit", () => {
                    let { thumbs: e } = t.params;
                    e && e.swiper && (l(), o(!0));
                }),
                n("slideChange update resize observerUpdate", () => {
                    o();
                }),
                n("setTransition", (e, i) => {
                    let n = t.thumbs.swiper;
                    n && !n.destroyed && n.setTransition(i);
                }),
                n("beforeDestroy", () => {
                    let e = t.thumbs.swiper;
                    e && !e.destroyed && r && e.destroy();
                }),
                Object.assign(t.thumbs, { init: l, update: o });
        },
        function (e) {
            let { swiper: t, extendParams: i, emit: n, once: s } = e;
            i({
                freeMode: {
                    enabled: !1,
                    momentum: !0,
                    momentumRatio: 1,
                    momentumBounce: !0,
                    momentumBounceRatio: 1,
                    momentumVelocityRatio: 1,
                    sticky: !1,
                    minimumVelocity: 0.02,
                },
            }),
                Object.assign(t, {
                    freeMode: {
                        onTouchStart: function () {
                            let e = t.getTranslate();
                            t.setTranslate(e),
                                t.setTransition(0),
                                (t.touchEventsData.velocities.length = 0),
                                t.freeMode.onTouchEnd({ currentPos: t.rtl ? t.translate : -t.translate });
                        },
                        onTouchMove: function () {
                            let { touchEventsData: e, touches: i } = t;
                            0 === e.velocities.length &&
                                e.velocities.push({
                                    position: i[t.isHorizontal() ? "startX" : "startY"],
                                    time: e.touchStartTime,
                                }),
                                e.velocities.push({
                                    position: i[t.isHorizontal() ? "currentX" : "currentY"],
                                    time: p(),
                                });
                        },
                        onTouchEnd: function (e) {
                            let { currentPos: i } = e,
                                { params: r, $wrapperEl: a, rtlTranslate: l, snapGrid: o, touchEventsData: d } = t,
                                c = p() - d.touchStartTime;
                            if (i < -t.minTranslate()) t.slideTo(t.activeIndex);
                            else if (i > -t.maxTranslate())
                                t.slides.length < o.length ? t.slideTo(o.length - 1) : t.slideTo(t.slides.length - 1);
                            else {
                                if (r.freeMode.momentum) {
                                    if (d.velocities.length > 1) {
                                        let u = d.velocities.pop(),
                                            h = d.velocities.pop(),
                                            f = u.position - h.position,
                                            m = u.time - h.time;
                                        (t.velocity = f / m),
                                            (t.velocity /= 2),
                                            Math.abs(t.velocity) < r.freeMode.minimumVelocity && (t.velocity = 0),
                                            (m > 150 || p() - u.time > 300) && (t.velocity = 0);
                                    } else t.velocity = 0;
                                    (t.velocity *= r.freeMode.momentumVelocityRatio), (d.velocities.length = 0);
                                    let g = 1e3 * r.freeMode.momentumRatio,
                                        $ = t.velocity * g,
                                        v = t.translate + $;
                                    l && (v = -v);
                                    let y,
                                        _ = !1,
                                        b = 20 * Math.abs(t.velocity) * r.freeMode.momentumBounceRatio,
                                        x;
                                    if (v < t.maxTranslate())
                                        r.freeMode.momentumBounce
                                            ? (v + t.maxTranslate() < -b && (v = t.maxTranslate() - b),
                                              (y = t.maxTranslate()),
                                              (_ = !0),
                                              (d.allowMomentumBounce = !0))
                                            : (v = t.maxTranslate()),
                                            r.loop && r.centeredSlides && (x = !0);
                                    else if (v > t.minTranslate())
                                        r.freeMode.momentumBounce
                                            ? (v - t.minTranslate() > b && (v = t.minTranslate() + b),
                                              (y = t.minTranslate()),
                                              (_ = !0),
                                              (d.allowMomentumBounce = !0))
                                            : (v = t.minTranslate()),
                                            r.loop && r.centeredSlides && (x = !0);
                                    else if (r.freeMode.sticky) {
                                        let w;
                                        for (let S = 0; S < o.length; S += 1)
                                            if (o[S] > -v) {
                                                w = S;
                                                break;
                                            }
                                        v = -(v =
                                            Math.abs(o[w] - v) < Math.abs(o[w - 1] - v) || "next" === t.swipeDirection
                                                ? o[w]
                                                : o[w - 1]);
                                    }
                                    if (
                                        (x &&
                                            s("transitionEnd", () => {
                                                t.loopFix();
                                            }),
                                        0 !== t.velocity)
                                    ) {
                                        if (
                                            ((g = l
                                                ? Math.abs((-v - t.translate) / t.velocity)
                                                : Math.abs((v - t.translate) / t.velocity)),
                                            r.freeMode.sticky)
                                        ) {
                                            let E = Math.abs((l ? -v : v) - t.translate),
                                                T = t.slidesSizesGrid[t.activeIndex];
                                            g = E < T ? r.speed : E < 2 * T ? 1.5 * r.speed : 2.5 * r.speed;
                                        }
                                    } else if (r.freeMode.sticky) return void t.slideToClosest();
                                    r.freeMode.momentumBounce && _
                                        ? (t.updateProgress(y),
                                          t.setTransition(g),
                                          t.setTranslate(v),
                                          t.transitionStart(!0, t.swipeDirection),
                                          (t.animating = !0),
                                          a.transitionEnd(() => {
                                              t &&
                                                  !t.destroyed &&
                                                  d.allowMomentumBounce &&
                                                  (n("momentumBounce"),
                                                  t.setTransition(r.speed),
                                                  setTimeout(() => {
                                                      t.setTranslate(y),
                                                          a.transitionEnd(() => {
                                                              t && !t.destroyed && t.transitionEnd();
                                                          });
                                                  }, 0));
                                          }))
                                        : t.velocity
                                          ? (n("_freeModeNoMomentumRelease"),
                                            t.updateProgress(v),
                                            t.setTransition(g),
                                            t.setTranslate(v),
                                            t.transitionStart(!0, t.swipeDirection),
                                            t.animating ||
                                                ((t.animating = !0),
                                                a.transitionEnd(() => {
                                                    t && !t.destroyed && t.transitionEnd();
                                                })))
                                          : t.updateProgress(v),
                                        t.updateActiveIndex(),
                                        t.updateSlidesClasses();
                                } else {
                                    if (r.freeMode.sticky) return void t.slideToClosest();
                                    r.freeMode && n("_freeModeNoMomentumRelease");
                                }
                                (!r.freeMode.momentum || c >= r.longSwipesMs) &&
                                    (t.updateProgress(), t.updateActiveIndex(), t.updateSlidesClasses());
                            }
                        },
                    },
                });
        },
        function (e) {
            let t,
                i,
                n,
                { swiper: s, extendParams: r } = e;
            r({ grid: { rows: 1, fill: "column" } }),
                (s.grid = {
                    initSlides(e) {
                        let { slidesPerView: r } = s.params,
                            { rows: a, fill: l } = s.params.grid;
                        (i = t / a),
                            (n = Math.floor(e / a)),
                            (t = Math.floor(e / a) === e / a ? e : Math.ceil(e / a) * a),
                            "auto" !== r && "row" === l && (t = Math.max(t, r * a));
                    },
                    updateSlide(e, r, a, l) {
                        let { slidesPerGroup: o, spaceBetween: d } = s.params,
                            { rows: c, fill: u } = s.params.grid,
                            p,
                            h,
                            f;
                        if ("row" === u && o > 1) {
                            let m = Math.floor(e / (o * c)),
                                g = e - c * o * m,
                                $ = 0 === m ? o : Math.min(Math.ceil((a - m * c * o) / c), o);
                            (f = Math.floor(g / $)),
                                (p = (h = g - f * $ + m * o) + (f * t) / c),
                                r.css({ "-webkit-order": p, order: p });
                        } else
                            "column" === u
                                ? ((h = Math.floor(e / c)),
                                  (f = e - h * c),
                                  (h > n || (h === n && f === c - 1)) && (f += 1) >= c && ((f = 0), (h += 1)))
                                : ((f = Math.floor(e / i)), (h = e - f * i));
                        r.css(l("margin-top"), 0 !== f ? d && `${d}px` : "");
                    },
                    updateWrapperSize(e, i, n) {
                        let { spaceBetween: r, centeredSlides: a, roundLengths: l } = s.params,
                            { rows: o } = s.params.grid;
                        if (
                            ((s.virtualSize = (e + r) * t),
                            (s.virtualSize = Math.ceil(s.virtualSize / o) - r),
                            s.$wrapperEl.css({ [n("width")]: `${s.virtualSize + r}px` }),
                            a)
                        ) {
                            i.splice(0, i.length);
                            let d = [];
                            for (let c = 0; c < i.length; c += 1) {
                                let u = i[c];
                                l && (u = Math.floor(u)), i[c] < s.virtualSize + i[0] && d.push(u);
                            }
                            i.push(...d);
                        }
                    },
                });
        },
        function (e) {
            let { swiper: t } = e;
            Object.assign(t, {
                appendSlide: X.bind(t),
                prependSlide: Y.bind(t),
                addSlide: R.bind(t),
                removeSlide: H.bind(t),
                removeAllSlides: q.bind(t),
            });
        },
        function (e) {
            let { swiper: t, extendParams: i, on: n } = e;
            i({ fadeEffect: { crossFade: !1, transformEl: null } }),
                G({
                    effect: "fade",
                    swiper: t,
                    on: n,
                    setTranslate() {
                        let { slides: e } = t,
                            i = t.params.fadeEffect;
                        for (let n = 0; n < e.length; n += 1) {
                            let s = t.slides.eq(n),
                                r = -s[0].swiperSlideOffset;
                            t.params.virtualTranslate || (r -= t.translate);
                            let a = 0;
                            t.isHorizontal() || ((a = r), (r = 0));
                            let l = t.params.fadeEffect.crossFade
                                ? Math.max(1 - Math.abs(s[0].progress), 0)
                                : 1 + Math.min(Math.max(s[0].progress, -1), 0);
                            W(i, s).css({ opacity: l }).transform(`translate3d(${r}px, ${a}px, 0px)`);
                        }
                    },
                    setTransition(e) {
                        let { transformEl: i } = t.params.fadeEffect;
                        (i ? t.slides.find(i) : t.slides).transition(e),
                            F({ swiper: t, duration: e, transformEl: i, allSlides: !0 });
                    },
                    overwriteParams: () => ({
                        slidesPerView: 1,
                        slidesPerGroup: 1,
                        watchSlidesProgress: !0,
                        spaceBetween: 0,
                        virtualTranslate: !t.params.cssMode,
                    }),
                });
        },
        function (e) {
            let { swiper: t, extendParams: i, on: n } = e;
            i({ cubeEffect: { slideShadows: !0, shadow: !0, shadowOffset: 20, shadowScale: 0.94 } });
            let s = (e, t, i) => {
                let n = i ? e.find(".swiper-slide-shadow-left") : e.find(".swiper-slide-shadow-top"),
                    s = i ? e.find(".swiper-slide-shadow-right") : e.find(".swiper-slide-shadow-bottom");
                0 === n.length &&
                    ((n = d(`<div class="swiper-slide-shadow-${i ? "left" : "top"}"></div>`)), e.append(n)),
                    0 === s.length &&
                        ((s = d(`<div class="swiper-slide-shadow-${i ? "right" : "bottom"}"></div>`)), e.append(s)),
                    n.length && (n[0].style.opacity = Math.max(-t, 0)),
                    s.length && (s[0].style.opacity = Math.max(t, 0));
            };
            G({
                effect: "cube",
                swiper: t,
                on: n,
                setTranslate() {
                    let {
                            $el: e,
                            $wrapperEl: i,
                            slides: n,
                            width: r,
                            height: a,
                            rtlTranslate: l,
                            size: o,
                            browser: c,
                        } = t,
                        u = t.params.cubeEffect,
                        p = t.isHorizontal(),
                        h = t.virtual && t.params.virtual.enabled,
                        f,
                        m = 0;
                    u.shadow &&
                        (p
                            ? (0 === (f = i.find(".swiper-cube-shadow")).length &&
                                  ((f = d('<div class="swiper-cube-shadow"></div>')), i.append(f)),
                              f.css({ height: `${r}px` }))
                            : 0 === (f = e.find(".swiper-cube-shadow")).length &&
                              ((f = d('<div class="swiper-cube-shadow"></div>')), e.append(f)));
                    for (let g = 0; g < n.length; g += 1) {
                        let $ = n.eq(g),
                            v = g;
                        h && (v = parseInt($.attr("data-swiper-slide-index"), 10));
                        let y = 90 * v,
                            _ = Math.floor(y / 360);
                        l && (_ = Math.floor(-(y = -y) / 360));
                        let b = Math.max(Math.min($[0].progress, 1), -1),
                            x = 0,
                            w = 0,
                            S = 0;
                        v % 4 == 0
                            ? ((x = -(4 * _) * o), (S = 0))
                            : (v - 1) % 4 == 0
                              ? ((x = 0), (S = -(4 * _) * o))
                              : (v - 2) % 4 == 0
                                ? ((x = o + 4 * _ * o), (S = o))
                                : (v - 3) % 4 == 0 && ((x = -o), (S = 3 * o + 4 * o * _)),
                            l && (x = -x),
                            p || ((w = x), (x = 0));
                        let E = `rotateX(${p ? 0 : -y}deg) rotateY(${p ? y : 0}deg) translate3d(${x}px, ${w}px, ${S}px)`;
                        b <= 1 && b > -1 && ((m = 90 * v + 90 * b), l && (m = -(90 * v) - 90 * b)),
                            $.transform(E),
                            u.slideShadows && s($, b, p);
                    }
                    if (
                        (i.css({
                            "-webkit-transform-origin": `50% 50% -${o / 2}px`,
                            "transform-origin": `50% 50% -${o / 2}px`,
                        }),
                        u.shadow)
                    ) {
                        if (p)
                            f.transform(
                                `translate3d(0px, ${r / 2 + u.shadowOffset}px, ${-r / 2}px) rotateX(90deg) rotateZ(0deg) scale(${u.shadowScale})`
                            );
                        else {
                            let T = Math.abs(m) - 90 * Math.floor(Math.abs(m) / 90),
                                C = u.shadowScale,
                                k =
                                    u.shadowScale /
                                    (1.5 -
                                        (Math.sin((2 * T * Math.PI) / 360) / 2 +
                                            Math.cos((2 * T * Math.PI) / 360) / 2)),
                                P = u.shadowOffset;
                            f.transform(
                                `scale3d(${C}, 1, ${k}) translate3d(0px, ${a / 2 + P}px, ${-a / 2 / k}px) rotateX(-90deg)`
                            );
                        }
                    }
                    let A = c.isSafari || c.isWebView ? -o / 2 : 0;
                    i.transform(
                        `translate3d(0px,0,${A}px) rotateX(${t.isHorizontal() ? 0 : m}deg) rotateY(${t.isHorizontal() ? -m : 0}deg)`
                    ),
                        i[0].style.setProperty("--swiper-cube-translate-z", `${A}px`);
                },
                setTransition(e) {
                    let { $el: i, slides: n } = t;
                    n
                        .transition(e)
                        .find(
                            ".swiper-slide-shadow-top, .swiper-slide-shadow-right, .swiper-slide-shadow-bottom, .swiper-slide-shadow-left"
                        )
                        .transition(e),
                        t.params.cubeEffect.shadow && !t.isHorizontal() && i.find(".swiper-cube-shadow").transition(e);
                },
                recreateShadows() {
                    let e = t.isHorizontal();
                    t.slides.each((t) => {
                        let i = Math.max(Math.min(t.progress, 1), -1);
                        s(d(t), i, e);
                    });
                },
                getEffectParams: () => t.params.cubeEffect,
                perspective: () => !0,
                overwriteParams: () => ({
                    slidesPerView: 1,
                    slidesPerGroup: 1,
                    watchSlidesProgress: !0,
                    resistanceRatio: 0,
                    spaceBetween: 0,
                    centeredSlides: !1,
                    virtualTranslate: !0,
                }),
            });
        },
        function (e) {
            let { swiper: t, extendParams: i, on: n } = e;
            i({ flipEffect: { slideShadows: !0, limitRotation: !0, transformEl: null } });
            let s = (e, i, n) => {
                let s = t.isHorizontal() ? e.find(".swiper-slide-shadow-left") : e.find(".swiper-slide-shadow-top"),
                    r = t.isHorizontal() ? e.find(".swiper-slide-shadow-right") : e.find(".swiper-slide-shadow-bottom");
                0 === s.length && (s = j(n, e, t.isHorizontal() ? "left" : "top")),
                    0 === r.length && (r = j(n, e, t.isHorizontal() ? "right" : "bottom")),
                    s.length && (s[0].style.opacity = Math.max(-i, 0)),
                    r.length && (r[0].style.opacity = Math.max(i, 0));
            };
            G({
                effect: "flip",
                swiper: t,
                on: n,
                setTranslate() {
                    let { slides: e, rtlTranslate: i } = t,
                        n = t.params.flipEffect;
                    for (let r = 0; r < e.length; r += 1) {
                        let a = e.eq(r),
                            l = a[0].progress;
                        t.params.flipEffect.limitRotation && (l = Math.max(Math.min(a[0].progress, 1), -1));
                        let o = a[0].swiperSlideOffset,
                            d = -180 * l,
                            c = 0,
                            u = t.params.cssMode ? -o - t.translate : -o,
                            p = 0;
                        t.isHorizontal() ? i && (d = -d) : ((p = u), (u = 0), (c = -d), (d = 0)),
                            (a[0].style.zIndex = -Math.abs(Math.round(l)) + e.length),
                            n.slideShadows && s(a, l, n);
                        let h = `translate3d(${u}px, ${p}px, 0px) rotateX(${c}deg) rotateY(${d}deg)`;
                        W(n, a).transform(h);
                    }
                },
                setTransition(e) {
                    let { transformEl: i } = t.params.flipEffect;
                    (i ? t.slides.find(i) : t.slides)
                        .transition(e)
                        .find(
                            ".swiper-slide-shadow-top, .swiper-slide-shadow-right, .swiper-slide-shadow-bottom, .swiper-slide-shadow-left"
                        )
                        .transition(e),
                        F({ swiper: t, duration: e, transformEl: i });
                },
                recreateShadows() {
                    let e = t.params.flipEffect;
                    t.slides.each((i) => {
                        let n = d(i),
                            r = n[0].progress;
                        t.params.flipEffect.limitRotation && (r = Math.max(Math.min(i.progress, 1), -1)), s(n, r, e);
                    });
                },
                getEffectParams: () => t.params.flipEffect,
                perspective: () => !0,
                overwriteParams: () => ({
                    slidesPerView: 1,
                    slidesPerGroup: 1,
                    watchSlidesProgress: !0,
                    spaceBetween: 0,
                    virtualTranslate: !t.params.cssMode,
                }),
            });
        },
        function (e) {
            let { swiper: t, extendParams: i, on: n } = e;
            i({
                coverflowEffect: {
                    rotate: 50,
                    stretch: 0,
                    depth: 100,
                    scale: 1,
                    modifier: 1,
                    slideShadows: !0,
                    transformEl: null,
                },
            }),
                G({
                    effect: "coverflow",
                    swiper: t,
                    on: n,
                    setTranslate() {
                        let { width: e, height: i, slides: n, slidesSizesGrid: s } = t,
                            r = t.params.coverflowEffect,
                            a = t.isHorizontal(),
                            l = t.translate,
                            o = a ? e / 2 - l : i / 2 - l,
                            d = a ? r.rotate : -r.rotate,
                            c = r.depth;
                        for (let u = 0, p = n.length; u < p; u += 1) {
                            let h = n.eq(u),
                                f = s[u],
                                m = (o - h[0].swiperSlideOffset - f / 2) / f,
                                g = "function" == typeof r.modifier ? r.modifier(m) : m * r.modifier,
                                $ = a ? d * g : 0,
                                v = a ? 0 : d * g,
                                y = -c * Math.abs(g),
                                _ = r.stretch;
                            "string" == typeof _ && -1 !== _.indexOf("%") && (_ = (parseFloat(r.stretch) / 100) * f);
                            let b = a ? 0 : _ * g,
                                x = a ? _ * g : 0,
                                w = 1 - (1 - r.scale) * Math.abs(g);
                            0.001 > Math.abs(x) && (x = 0),
                                0.001 > Math.abs(b) && (b = 0),
                                0.001 > Math.abs(y) && (y = 0),
                                0.001 > Math.abs($) && ($ = 0),
                                0.001 > Math.abs(v) && (v = 0),
                                0.001 > Math.abs(w) && (w = 0);
                            let S = `translate3d(${x}px,${b}px,${y}px)  rotateX(${v}deg) rotateY(${$}deg) scale(${w})`;
                            if (
                                (W(r, h).transform(S),
                                (h[0].style.zIndex = 1 - Math.abs(Math.round(g))),
                                r.slideShadows)
                            ) {
                                let E = a ? h.find(".swiper-slide-shadow-left") : h.find(".swiper-slide-shadow-top"),
                                    T = a
                                        ? h.find(".swiper-slide-shadow-right")
                                        : h.find(".swiper-slide-shadow-bottom");
                                0 === E.length && (E = j(r, h, a ? "left" : "top")),
                                    0 === T.length && (T = j(r, h, a ? "right" : "bottom")),
                                    E.length && (E[0].style.opacity = g > 0 ? g : 0),
                                    T.length && (T[0].style.opacity = -g > 0 ? -g : 0);
                            }
                        }
                    },
                    setTransition(e) {
                        let { transformEl: i } = t.params.coverflowEffect;
                        (i ? t.slides.find(i) : t.slides)
                            .transition(e)
                            .find(
                                ".swiper-slide-shadow-top, .swiper-slide-shadow-right, .swiper-slide-shadow-bottom, .swiper-slide-shadow-left"
                            )
                            .transition(e);
                    },
                    perspective: () => !0,
                    overwriteParams: () => ({ watchSlidesProgress: !0 }),
                });
        },
        function (e) {
            let { swiper: t, extendParams: i, on: n } = e;
            i({
                creativeEffect: {
                    transformEl: null,
                    limitProgress: 1,
                    shadowPerProgress: !1,
                    progressMultiplier: 1,
                    perspective: !0,
                    prev: { translate: [0, 0, 0], rotate: [0, 0, 0], opacity: 1, scale: 1 },
                    next: { translate: [0, 0, 0], rotate: [0, 0, 0], opacity: 1, scale: 1 },
                },
            });
            let s = (e) => ("string" == typeof e ? e : `${e}px`);
            G({
                effect: "creative",
                swiper: t,
                on: n,
                setTranslate() {
                    let { slides: e, $wrapperEl: i, slidesSizesGrid: n } = t,
                        r = t.params.creativeEffect,
                        { progressMultiplier: a } = r,
                        l = t.params.centeredSlides;
                    if (l) {
                        let o = n[0] / 2 - t.params.slidesOffsetBefore || 0;
                        i.transform(`translateX(calc(50% - ${o}px))`);
                    }
                    for (let d = 0; d < e.length; d += 1) {
                        let c = e.eq(d),
                            u = c[0].progress,
                            p = Math.min(Math.max(c[0].progress, -r.limitProgress), r.limitProgress),
                            h = p;
                        l || (h = Math.min(Math.max(c[0].originalProgress, -r.limitProgress), r.limitProgress));
                        let f = c[0].swiperSlideOffset,
                            m = [t.params.cssMode ? -f - t.translate : -f, 0, 0],
                            g = [0, 0, 0],
                            $ = !1;
                        t.isHorizontal() || ((m[1] = m[0]), (m[0] = 0));
                        let v = { translate: [0, 0, 0], rotate: [0, 0, 0], scale: 1, opacity: 1 };
                        p < 0 ? ((v = r.next), ($ = !0)) : p > 0 && ((v = r.prev), ($ = !0)),
                            m.forEach((e, t) => {
                                m[t] = `calc(${e}px + (${s(v.translate[t])} * ${Math.abs(p * a)}))`;
                            }),
                            g.forEach((e, t) => {
                                g[t] = v.rotate[t] * Math.abs(p * a);
                            }),
                            (c[0].style.zIndex = -Math.abs(Math.round(u)) + e.length);
                        let y = m.join(", "),
                            _ = `rotateX(${g[0]}deg) rotateY(${g[1]}deg) rotateZ(${g[2]}deg)`,
                            b = h < 0 ? `scale(${1 + (1 - v.scale) * h * a})` : `scale(${1 - (1 - v.scale) * h * a})`,
                            x = h < 0 ? 1 + (1 - v.opacity) * h * a : 1 - (1 - v.opacity) * h * a,
                            w = `translate3d(${y}) ${_} ${b}`;
                        if (($ && v.shadow) || !$) {
                            let S = c.children(".swiper-slide-shadow");
                            if ((0 === S.length && v.shadow && (S = j(r, c)), S.length)) {
                                let E = r.shadowPerProgress ? p * (1 / r.limitProgress) : p;
                                S[0].style.opacity = Math.min(Math.max(Math.abs(E), 0), 1);
                            }
                        }
                        let T = W(r, c);
                        T.transform(w).css({ opacity: x }), v.origin && T.css("transform-origin", v.origin);
                    }
                },
                setTransition(e) {
                    let { transformEl: i } = t.params.creativeEffect;
                    (i ? t.slides.find(i) : t.slides).transition(e).find(".swiper-slide-shadow").transition(e),
                        F({ swiper: t, duration: e, transformEl: i, allSlides: !0 });
                },
                perspective: () => t.params.creativeEffect.perspective,
                overwriteParams: () => ({ watchSlidesProgress: !0, virtualTranslate: !t.params.cssMode }),
            });
        },
        function (e) {
            let { swiper: t, extendParams: i, on: n } = e;
            i({ cardsEffect: { slideShadows: !0, transformEl: null, rotate: !0 } }),
                G({
                    effect: "cards",
                    swiper: t,
                    on: n,
                    setTranslate() {
                        let { slides: e, activeIndex: i } = t,
                            n = t.params.cardsEffect,
                            { startTranslate: s, isTouched: r } = t.touchEventsData,
                            a = t.translate;
                        for (let l = 0; l < e.length; l += 1) {
                            let o = e.eq(l),
                                d = o[0].progress,
                                c = Math.min(Math.max(d, -4), 4),
                                u = o[0].swiperSlideOffset;
                            t.params.centeredSlides &&
                                !t.params.cssMode &&
                                t.$wrapperEl.transform(`translateX(${t.minTranslate()}px)`),
                                t.params.centeredSlides && t.params.cssMode && (u -= e[0].swiperSlideOffset);
                            let p = t.params.cssMode ? -u - t.translate : -u,
                                h = 0,
                                f = -100 * Math.abs(c),
                                m = 1,
                                g = -2 * c,
                                $ = 8 - 0.75 * Math.abs(c),
                                v = t.virtual && t.params.virtual.enabled ? t.virtual.from + l : l,
                                y = (v === i || v === i - 1) && c > 0 && c < 1 && (r || t.params.cssMode) && a < s,
                                _ = (v === i || v === i + 1) && c < 0 && c > -1 && (r || t.params.cssMode) && a > s;
                            if (y || _) {
                                let b = (1 - Math.abs((Math.abs(c) - 0.5) / 0.5)) ** 0.5;
                                (g += -28 * c * b), (m += -0.5 * b), ($ += 96 * b), (h = -25 * b * Math.abs(c) + "%");
                            }
                            if (
                                ((p =
                                    c < 0
                                        ? `calc(${p}px + (${$ * Math.abs(c)}%))`
                                        : c > 0
                                          ? `calc(${p}px + (-${$ * Math.abs(c)}%))`
                                          : `${p}px`),
                                !t.isHorizontal())
                            ) {
                                let x = h;
                                (h = p), (p = x);
                            }
                            let w = c < 0 ? "" + (1 + (1 - m) * c) : "" + (1 - (1 - m) * c),
                                S = `
        translate3d(${p}, ${h}, ${f}px)
        rotateZ(${n.rotate ? g : 0}deg)
        scale(${w})
      `;
                            if (n.slideShadows) {
                                let E = o.find(".swiper-slide-shadow");
                                0 === E.length && (E = j(n, o)),
                                    E.length &&
                                        (E[0].style.opacity = Math.min(Math.max((Math.abs(c) - 0.5) / 0.5, 0), 1));
                            }
                            (o[0].style.zIndex = -Math.abs(Math.round(d)) + e.length), W(n, o).transform(S);
                        }
                    },
                    setTransition(e) {
                        let { transformEl: i } = t.params.cardsEffect;
                        (i ? t.slides.find(i) : t.slides).transition(e).find(".swiper-slide-shadow").transition(e),
                            F({ swiper: t, duration: e, transformEl: i });
                    },
                    perspective: () => !0,
                    overwriteParams: () => ({ watchSlidesProgress: !0, virtualTranslate: !t.params.cssMode }),
                });
        },
    ];
    return N.use(U), N;
}),
    (function (e, t) {
        "object" == typeof exports && "undefined" != typeof module
            ? (module.exports = t())
            : "function" == typeof define && define.amd
              ? define(t)
              : ((e = e || self).LazyLoad = t());
    })(this, function () {
        "use strict";
        function e() {
            return (e =
                Object.assign ||
                function (e) {
                    for (var t = 1; t < arguments.length; t++) {
                        var i = arguments[t];
                        for (var n in i) Object.prototype.hasOwnProperty.call(i, n) && (e[n] = i[n]);
                    }
                    return e;
                }).apply(this, arguments);
        }
        var t = "undefined" != typeof window,
            i =
                (t && !("onscroll" in window)) ||
                ("undefined" != typeof navigator && /(gle|ing|ro)bot|crawl|spider/i.test(navigator.userAgent)),
            n = t && "IntersectionObserver" in window,
            s = t && "classList" in document.createElement("p"),
            r = t && window.devicePixelRatio > 1,
            a = {
                elements_selector: ".lazy",
                container: i || t ? document : null,
                threshold: 300,
                thresholds: null,
                data_src: "src",
                data_srcset: "srcset",
                data_sizes: "sizes",
                data_bg: "bg",
                data_bg_hidpi: "bg-hidpi",
                data_bg_multi: "bg-multi",
                data_bg_multi_hidpi: "bg-multi-hidpi",
                data_poster: "poster",
                class_applied: "applied",
                class_loading: "loading",
                class_loaded: "loaded",
                class_error: "error",
                unobserve_completed: !0,
                unobserve_entered: !1,
                cancel_on_exit: !0,
                callback_enter: null,
                callback_exit: null,
                callback_applied: null,
                callback_loading: null,
                callback_loaded: null,
                callback_error: null,
                callback_finish: null,
                callback_cancel: null,
                use_native: !1,
            },
            l = function (t) {
                return e({}, a, t);
            },
            o = function (e, t) {
                var i,
                    n = new e(t);
                try {
                    i = new CustomEvent("LazyLoad::Initialized", { detail: { instance: n } });
                } catch (s) {
                    (i = document.createEvent("CustomEvent")).initCustomEvent("LazyLoad::Initialized", !1, !1, {
                        instance: n,
                    });
                }
                window.dispatchEvent(i);
            },
            d = function (e, t) {
                return e.getAttribute("data-" + t);
            },
            c = function (e, t, i) {
                var n = "data-" + t;
                null !== i ? e.setAttribute(n, i) : e.removeAttribute(n);
            },
            u = function (e) {
                return d(e, "ll-status");
            },
            p = function (e, t) {
                return c(e, "ll-status", t);
            },
            h = function (e) {
                return p(e, null);
            },
            f = function (e) {
                return null === u(e);
            },
            m = function (e) {
                return "native" === u(e);
            },
            g = ["loading", "loaded", "applied", "error"],
            $ = function (e, t, i, n) {
                e && (void 0 === n ? (void 0 === i ? e(t) : e(t, i)) : e(t, i, n));
            },
            v = function (e, t) {
                s ? e.classList.add(t) : (e.className += (e.className ? " " : "") + t);
            },
            y = function (e, t) {
                s
                    ? e.classList.remove(t)
                    : (e.className = e.className
                          .replace(RegExp("(^|\\s+)" + t + "(\\s+|$)"), " ")
                          .replace(/^\s+/, "")
                          .replace(/\s+$/, ""));
            },
            _ = function (e) {
                return e.llTempImage;
            },
            b = function (e, t) {
                if (t) {
                    var i = t._observer;
                    i && i.unobserve(e);
                }
            },
            x = function (e, t) {
                e && (e.loadingCount += t);
            },
            w = function (e, t) {
                e && (e.toLoadCount = t);
            },
            S = function (e) {
                for (var t, i = [], n = 0; (t = e.children[n]); n += 1) "SOURCE" === t.tagName && i.push(t);
                return i;
            },
            E = function (e, t, i) {
                i && e.setAttribute(t, i);
            },
            T = function (e, t) {
                e.removeAttribute(t);
            },
            C = function (e) {
                return !!e.llOriginalAttrs;
            },
            k = function (e) {
                if (!C(e)) {
                    var t = {};
                    (t.src = e.getAttribute("src")),
                        (t.srcset = e.getAttribute("srcset")),
                        (t.sizes = e.getAttribute("sizes")),
                        (e.llOriginalAttrs = t);
                }
            },
            P = function (e) {
                if (C(e)) {
                    var t = e.llOriginalAttrs;
                    E(e, "src", t.src), E(e, "srcset", t.srcset), E(e, "sizes", t.sizes);
                }
            },
            A = function (e, t) {
                E(e, "sizes", d(e, t.data_sizes)), E(e, "srcset", d(e, t.data_srcset)), E(e, "src", d(e, t.data_src));
            },
            z = function (e) {
                T(e, "src"), T(e, "srcset"), T(e, "sizes");
            },
            L = function (e, t) {
                var i = e.parentNode;
                i && "PICTURE" === i.tagName && S(i).forEach(t);
            },
            O = function (e, t) {
                S(e).forEach(t);
            },
            M = {
                IMG: function (e, t) {
                    L(e, function (e) {
                        k(e), A(e, t);
                    }),
                        k(e),
                        A(e, t);
                },
                IFRAME: function (e, t) {
                    E(e, "src", d(e, t.data_src));
                },
                VIDEO: function (e, t) {
                    O(e, function (e) {
                        E(e, "src", d(e, t.data_src));
                    }),
                        E(e, "poster", d(e, t.data_poster)),
                        E(e, "src", d(e, t.data_src)),
                        e.load();
                },
            },
            I = function (e, t) {
                var i = M[e.tagName];
                i && i(e, t);
            },
            D = function (e, t, i) {
                x(i, 1), v(e, t.class_loading), p(e, "loading"), $(t.callback_loading, e, i);
            },
            N = {
                IMG: function (e, t) {
                    c(e, t.data_src, null),
                        c(e, t.data_srcset, null),
                        c(e, t.data_sizes, null),
                        L(e, function (e) {
                            c(e, t.data_srcset, null), c(e, t.data_sizes, null);
                        });
                },
                IFRAME: function (e, t) {
                    c(e, t.data_src, null);
                },
                VIDEO: function (e, t) {
                    c(e, t.data_src, null),
                        c(e, t.data_poster, null),
                        O(e, function (e) {
                            c(e, t.data_src, null);
                        });
                },
            },
            B = function (e, t) {
                c(e, t.data_bg_multi, null), c(e, t.data_bg_multi_hidpi, null);
            },
            V = function (e, t) {
                var i,
                    n,
                    s = N[e.tagName];
                s ? s(e, t) : ((i = e), c(i, (n = t).data_bg, null), c(i, n.data_bg_hidpi, null));
            },
            X = ["IMG", "IFRAME", "VIDEO"],
            Y = function (e, t) {
                var i, n;
                !t || (i = t).loadingCount > 0 || (n = t).toLoadCount > 0 || $(e.callback_finish, t);
            },
            R = function (e, t, i) {
                e.addEventListener(t, i), (e.llEvLisnrs[t] = i);
            },
            H = function (e, t, i) {
                e.removeEventListener(t, i);
            },
            q = function (e) {
                return !!e.llEvLisnrs;
            },
            G = function (e) {
                if (q(e)) {
                    var t = e.llEvLisnrs;
                    for (var i in t) {
                        var n = t[i];
                        H(e, i, n);
                    }
                    delete e.llEvLisnrs;
                }
            },
            W = function (e, t, i) {
                var n, s;
                delete (n = e).llTempImage,
                    x(i, -1),
                    (s = i) && (s.toLoadCount -= 1),
                    y(e, t.class_loading),
                    t.unobserve_completed && b(e, i);
            },
            F = function (e, t, i) {
                var n,
                    s,
                    r,
                    a,
                    l = _(e) || e;
                q(l) ||
                    ((n = l),
                    (s = function (n) {
                        var s, r, a, o;
                        (s = e),
                            (r = t),
                            (a = i),
                            (o = m(s)),
                            W(s, r, a),
                            v(s, r.class_loaded),
                            p(s, "loaded"),
                            V(s, r),
                            $(r.callback_loaded, s, a),
                            o || Y(r, a),
                            G(l);
                    }),
                    (r = function (n) {
                        var s, r, a, o;
                        (s = e),
                            (r = t),
                            (a = i),
                            (o = m(s)),
                            W(s, r, a),
                            v(s, r.class_error),
                            p(s, "error"),
                            $(r.callback_error, s, a),
                            o || Y(r, a),
                            G(l);
                    }),
                    q(n) || (n.llEvLisnrs = {}),
                    (a = "VIDEO" === n.tagName ? "loadeddata" : "load"),
                    R(n, a, s),
                    R(n, "error", r));
            },
            j = function (e, t, i) {
                var n, s, a, l, o, c, u, h, f, m, g, y, x, w, S, E;
                (e.llTempImage = document.createElement("IMG")),
                    F(e, t, i),
                    (s = e),
                    (a = t),
                    (l = i),
                    (o = d(s, a.data_bg)),
                    (c = d(s, a.data_bg_hidpi)),
                    (u = r && c ? c : o) &&
                        ((s.style.backgroundImage = 'url("'.concat(u, '")')), _(s).setAttribute("src", u), D(s, a, l)),
                    (h = e),
                    (f = t),
                    (m = i),
                    (g = d(h, f.data_bg_multi)),
                    (y = d(h, f.data_bg_multi_hidpi)),
                    (x = r && y ? y : g) &&
                        ((h.style.backgroundImage = x),
                        (w = h),
                        (S = f),
                        (E = m),
                        v(w, S.class_applied),
                        p(w, "applied"),
                        B(w, S),
                        S.unobserve_completed && b(w, S),
                        $(S.callback_applied, w, E));
            },
            U = function (e, t, i) {
                var n, s, r, a;
                ((n = e), X.indexOf(n.tagName) > -1)
                    ? ((s = e), (r = t), F(s, r, (a = i)), I(s, r), D(s, r, a))
                    : j(e, t, i);
            },
            Z = ["IMG", "IFRAME"],
            Q = function (e) {
                return e.use_native && "loading" in HTMLImageElement.prototype;
            },
            K = function (e, t, i) {
                e.forEach(function (e) {
                    var n, s, r, a, l, o, d, c, m, v, _, w, S, E, T, C, k, A, O, M;
                    return (n = e).isIntersecting || n.intersectionRatio > 0
                        ? ((s = e.target),
                          (r = e),
                          (a = t),
                          (l = i),
                          void (p(s, "entered"),
                          (o = s),
                          (d = a),
                          (c = l),
                          d.unobserve_entered && b(o, c),
                          $(a.callback_enter, s, r, l),
                          (m = s),
                          g.indexOf(u(m)) >= 0 || U(s, a, l)))
                        : ((v = e.target),
                          (_ = e),
                          (w = t),
                          (S = i),
                          void (
                              f(v) ||
                              ((E = v),
                              (T = _),
                              (C = w),
                              (k = S),
                              C.cancel_on_exit &&
                                  "loading" === u((A = E)) &&
                                  "IMG" === E.tagName &&
                                  (G(E),
                                  L((O = E), function (e) {
                                      z(e);
                                  }),
                                  z(O),
                                  L((M = E), function (e) {
                                      P(e);
                                  }),
                                  P(M),
                                  y(E, C.class_loading),
                                  x(k, -1),
                                  h(E),
                                  $(C.callback_cancel, E, T, k)),
                              $(w.callback_exit, v, _, S))
                          ));
                });
            },
            J = function (e) {
                return Array.prototype.slice.call(e);
            },
            ee = function (e) {
                return e.container.querySelectorAll(e.elements_selector);
            },
            et = function (e) {
                var t;
                return "error" === u((t = e));
            },
            ei = function (e, t) {
                var i;
                return (i = e || ee(t)), J(i).filter(f);
            },
            en = function (e, i) {
                var s,
                    r,
                    a,
                    o,
                    d,
                    c = l(e);
                (this._settings = c),
                    (this.loadingCount = 0),
                    (s = c),
                    (r = this),
                    n &&
                        !Q(s) &&
                        (r._observer = new IntersectionObserver(
                            function (e) {
                                K(e, s, r);
                            },
                            {
                                root: (a = s).container === document ? null : a.container,
                                rootMargin: a.thresholds || a.threshold + "px",
                            }
                        )),
                    (o = c),
                    (d = this),
                    t &&
                        window.addEventListener("online", function () {
                            var e, t, i;
                            (e = o),
                                (t = d),
                                ((i = ee(e)), J(i).filter(et)).forEach(function (t) {
                                    y(t, e.class_error), h(t);
                                }),
                                t.update();
                        }),
                    this.update(i);
            };
        return (
            (en.prototype = {
                update: function (e) {
                    var t,
                        s,
                        r,
                        a,
                        l,
                        o = this._settings,
                        d = ei(e, o);
                    w(this, d.length),
                        !i && n
                            ? Q(o)
                                ? ((r = d),
                                  (a = o),
                                  (l = this),
                                  r.forEach(function (e) {
                                      var t, i, n;
                                      -1 !== Z.indexOf(e.tagName) &&
                                          (e.setAttribute("loading", "lazy"),
                                          (t = e),
                                          F(t, (i = a), l),
                                          I(t, i),
                                          V(t, i),
                                          p(t, "native"));
                                  }),
                                  w(l, 0))
                                : ((s = d),
                                  (function (e) {
                                      e.disconnect();
                                  })((t = this._observer)),
                                  (function (e, t) {
                                      t.forEach(function (t) {
                                          e.observe(t);
                                      });
                                  })(t, s))
                            : this.loadAll(d);
                },
                destroy: function () {
                    this._observer && this._observer.disconnect(),
                        ee(this._settings).forEach(function (e) {
                            delete e.llOriginalAttrs;
                        }),
                        delete this._observer,
                        delete this._settings,
                        delete this.loadingCount,
                        delete this.toLoadCount;
                },
                loadAll: function (e) {
                    var t = this,
                        i = this._settings;
                    ei(e, i).forEach(function (e) {
                        b(e, t), U(e, i, t);
                    });
                },
            }),
            (en.load = function (e, t) {
                var i = l(t);
                U(e, i);
            }),
            (en.resetStatus = function (e) {
                h(e);
            }),
            t &&
                (function (e, t) {
                    if (t) {
                        if (t.length) for (var i, n = 0; (i = t[n]); n += 1) o(e, i);
                        else o(e, t);
                    }
                })(en, window.lazyLoadOptions),
            en
        );
    }),
    (function (e) {
        var t = {};
        function i(n) {
            if (t[n]) return t[n].exports;
            var s = (t[n] = { i: n, l: !1, exports: {} });
            return e[n].call(s.exports, s, s.exports, i), (s.l = !0), s.exports;
        }
        (i.m = e),
            (i.c = t),
            (i.d = function (e, t, n) {
                i.o(e, t) || Object.defineProperty(e, t, { enumerable: !0, get: n });
            }),
            (i.r = function (e) {
                "undefined" != typeof Symbol &&
                    Symbol.toStringTag &&
                    Object.defineProperty(e, Symbol.toStringTag, { value: "Module" }),
                    Object.defineProperty(e, "__esModule", { value: !0 });
            }),
            (i.t = function (e, t) {
                if ((1 & t && (e = i(e)), 8 & t || (4 & t && "object" == typeof e && e && e.__esModule))) return e;
                var n = Object.create(null);
                if (
                    (i.r(n),
                    Object.defineProperty(n, "default", { enumerable: !0, value: e }),
                    2 & t && "string" != typeof e)
                )
                    for (var s in e)
                        i.d(
                            n,
                            s,
                            function (t) {
                                return e[t];
                            }.bind(null, s)
                        );
                return n;
            }),
            (i.n = function (e) {
                var t =
                    e && e.__esModule
                        ? function () {
                              return e.default;
                          }
                        : function () {
                              return e;
                          };
                return i.d(t, "a", t), t;
            }),
            (i.o = function (e, t) {
                return Object.prototype.hasOwnProperty.call(e, t);
            }),
            (i.p = ""),
            i((i.s = 10));
    })([
        ,
        ,
        function (e, t) {
            e.exports = function (e) {
                "complete" === document.readyState || "interactive" === document.readyState
                    ? e.call()
                    : document.attachEvent
                      ? document.attachEvent("onreadystatechange", function () {
                            "interactive" === document.readyState && e.call();
                        })
                      : document.addEventListener && document.addEventListener("DOMContentLoaded", e);
            };
        },
        function (e, t, i) {
            (function (t) {
                var i =
                    "undefined" != typeof window ? window : void 0 !== t ? t : "undefined" != typeof self ? self : {};
                e.exports = i;
            }).call(this, i(4));
        },
        function (e, t) {
            function i(e) {
                return (i =
                    "function" == typeof Symbol && "symbol" == typeof Symbol.iterator
                        ? function (e) {
                              return typeof e;
                          }
                        : function (e) {
                              return e &&
                                  "function" == typeof Symbol &&
                                  e.constructor === Symbol &&
                                  e !== Symbol.prototype
                                  ? "symbol"
                                  : typeof e;
                          })(e);
            }
            var n = (function () {
                return this;
            })();
            try {
                n = n || Function("return this")();
            } catch (s) {
                "object" === ("undefined" == typeof window ? "undefined" : i(window)) && (n = window);
            }
            e.exports = n;
        },
        ,
        ,
        ,
        ,
        ,
        function (e, t, i) {
            e.exports = i(11);
        },
        function (e, t, i) {
            "use strict";
            i.r(t);
            var n = i(2),
                s = i.n(n),
                r = i(3),
                a = i(12);
            function l(e) {
                return (l =
                    "function" == typeof Symbol && "symbol" == typeof Symbol.iterator
                        ? function (e) {
                              return typeof e;
                          }
                        : function (e) {
                              return e &&
                                  "function" == typeof Symbol &&
                                  e.constructor === Symbol &&
                                  e !== Symbol.prototype
                                  ? "symbol"
                                  : typeof e;
                          })(e);
            }
            var o,
                d,
                c = r.window.jarallax;
            (r.window.jarallax = a.default),
                (r.window.jarallax.noConflict = function () {
                    return (r.window.jarallax = c), this;
                }),
                void 0 !== r.jQuery &&
                    (((o = function () {
                        for (var e = arguments.length, t = Array(e), i = 0; i < e; i++) t[i] = arguments[i];
                        Array.prototype.unshift.call(t, this);
                        var n = a.default.apply(r.window, t);
                        return "object" !== l(n) ? n : this;
                    }).constructor = a.default.constructor),
                    (d = r.jQuery.fn.jarallax),
                    (r.jQuery.fn.jarallax = o),
                    (r.jQuery.fn.jarallax.noConflict = function () {
                        return (r.jQuery.fn.jarallax = d), this;
                    })),
                s()(function () {
                    Object(a.default)(document.querySelectorAll("[data-jarallax]"));
                });
        },
        function (e, t, i) {
            "use strict";
            i.r(t);
            var n = i(2),
                s = i.n(n),
                r = i(3);
            function a(e, t) {
                (null == t || t > e.length) && (t = e.length);
                for (var i = 0, n = Array(t); i < t; i++) n[i] = e[i];
                return n;
            }
            function l(e) {
                return (l =
                    "function" == typeof Symbol && "symbol" == typeof Symbol.iterator
                        ? function (e) {
                              return typeof e;
                          }
                        : function (e) {
                              return e &&
                                  "function" == typeof Symbol &&
                                  e.constructor === Symbol &&
                                  e !== Symbol.prototype
                                  ? "symbol"
                                  : typeof e;
                          })(e);
            }
            function o(e, t) {
                for (var i = 0; i < t.length; i++) {
                    var n = t[i];
                    (n.enumerable = n.enumerable || !1),
                        (n.configurable = !0),
                        "value" in n && (n.writable = !0),
                        Object.defineProperty(e, n.key, n);
                }
            }
            var d,
                c,
                u = r.window.navigator,
                p =
                    -1 < u.userAgent.indexOf("MSIE ") ||
                    -1 < u.userAgent.indexOf("Trident/") ||
                    -1 < u.userAgent.indexOf("Edge/"),
                h = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(u.userAgent),
                f = (function () {
                    for (
                        var e = "transform WebkitTransform MozTransform".split(" "),
                            t = document.createElement("div"),
                            i = 0;
                        i < e.length;
                        i += 1
                    )
                        if (t && void 0 !== t.style[e[i]]) return e[i];
                    return !1;
                })();
            function m() {
                c = h
                    ? (!d &&
                          document.body &&
                          (((d = document.createElement("div")).style.cssText =
                              "position: fixed; top: -9999px; left: 0; height: 100vh; width: 0;"),
                          document.body.appendChild(d)),
                      (d ? d.clientHeight : 0) || r.window.innerHeight || document.documentElement.clientHeight)
                    : r.window.innerHeight || document.documentElement.clientHeight;
            }
            m(),
                r.window.addEventListener("resize", m),
                r.window.addEventListener("orientationchange", m),
                r.window.addEventListener("load", m),
                s()(function () {
                    m();
                });
            var g = [];
            function $() {
                g.length &&
                    (g.forEach(function (e, t) {
                        var i = e.instance,
                            n = e.oldData,
                            s = i.$item.getBoundingClientRect(),
                            a = {
                                width: s.width,
                                height: s.height,
                                top: s.top,
                                bottom: s.bottom,
                                wndW: r.window.innerWidth,
                                wndH: c,
                            },
                            l =
                                !n ||
                                n.wndW !== a.wndW ||
                                n.wndH !== a.wndH ||
                                n.width !== a.width ||
                                n.height !== a.height,
                            o = l || !n || n.top !== a.top || n.bottom !== a.bottom;
                        (g[t].oldData = a), l && i.onResize(), o && i.onScroll();
                    }),
                    r.window.requestAnimationFrame($));
            }
            function v(e, t) {
                ("object" === ("undefined" == typeof HTMLElement ? "undefined" : l(HTMLElement))
                    ? e instanceof HTMLElement
                    : e && "object" === l(e) && null !== e && 1 === e.nodeType && "string" == typeof e.nodeName) &&
                    (e = [e]);
                for (var i, n = e.length, s = 0, r = arguments.length, a = Array(2 < r ? r - 2 : 0), o = 2; o < r; o++)
                    a[o - 2] = arguments[o];
                for (; s < n; s += 1)
                    if (
                        ("object" === l(t) || void 0 === t
                            ? e[s].jarallax || (e[s].jarallax = new _(e[s], t))
                            : e[s].jarallax && (i = e[s].jarallax[t].apply(e[s].jarallax, a)),
                        void 0 !== i)
                    )
                        return i;
                return e;
            }
            var y = 0,
                _ = (function () {
                    var e, t, i;
                    function n(e, t) {
                        !(function (e, t) {
                            if (!(e instanceof t)) throw TypeError("Cannot call a class as a function");
                        })(this, n);
                        var i = this;
                        (i.instanceID = y),
                            (y += 1),
                            (i.$item = e),
                            (i.defaults = {
                                type: "scroll",
                                speed: 0.5,
                                imgSrc: null,
                                imgElement: ".jarallax-img",
                                imgSize: "cover",
                                imgPosition: "50% 50%",
                                imgRepeat: "no-repeat",
                                keepImg: !1,
                                elementInViewport: null,
                                zIndex: -100,
                                disableParallax: !1,
                                disableVideo: !1,
                                videoSrc: null,
                                videoStartTime: 0,
                                videoEndTime: 0,
                                videoVolume: 0,
                                videoLoop: !0,
                                videoPlayOnlyVisible: !0,
                                videoLazyLoading: !0,
                                onScroll: null,
                                onInit: null,
                                onDestroy: null,
                                onCoverImage: null,
                            });
                        var s,
                            r,
                            o = i.$item.dataset || {},
                            d = {};
                        Object.keys(o).forEach(function (e) {
                            var t = e.substr(0, 1).toLowerCase() + e.substr(1);
                            t && void 0 !== i.defaults[t] && (d[t] = o[e]);
                        }),
                            (i.options = i.extend({}, i.defaults, d, t)),
                            (i.pureOptions = i.extend({}, i.options)),
                            Object.keys(i.options).forEach(function (e) {
                                "true" === i.options[e]
                                    ? (i.options[e] = !0)
                                    : "false" === i.options[e] && (i.options[e] = !1);
                            }),
                            (i.options.speed = Math.min(2, Math.max(-1, parseFloat(i.options.speed)))),
                            "string" == typeof i.options.disableParallax &&
                                (i.options.disableParallax = RegExp(i.options.disableParallax)),
                            i.options.disableParallax instanceof RegExp &&
                                ((s = i.options.disableParallax),
                                (i.options.disableParallax = function () {
                                    return s.test(u.userAgent);
                                })),
                            "function" != typeof i.options.disableParallax &&
                                (i.options.disableParallax = function () {
                                    return !1;
                                }),
                            "string" == typeof i.options.disableVideo &&
                                (i.options.disableVideo = RegExp(i.options.disableVideo)),
                            i.options.disableVideo instanceof RegExp &&
                                ((r = i.options.disableVideo),
                                (i.options.disableVideo = function () {
                                    return r.test(u.userAgent);
                                })),
                            "function" != typeof i.options.disableVideo &&
                                (i.options.disableVideo = function () {
                                    return !1;
                                });
                        var c,
                            p = i.options.elementInViewport;
                        p &&
                            "object" === l(p) &&
                            void 0 !== p.length &&
                            (p = ((function (e) {
                                if (Array.isArray(e)) return e;
                            })((c = p)) ||
                                (function (e, t) {
                                    if ("undefined" != typeof Symbol && Symbol.iterator in Object(e)) {
                                        var i = [],
                                            n = !0,
                                            s = !1,
                                            r = void 0;
                                        try {
                                            for (
                                                var a, l = e[Symbol.iterator]();
                                                !(n = (a = l.next()).done) && (i.push(a.value), !t || i.length !== t);
                                                n = !0
                                            );
                                        } catch (o) {
                                            (s = !0), (r = o);
                                        } finally {
                                            try {
                                                n || null == l.return || l.return();
                                            } finally {
                                                if (s) throw r;
                                            }
                                        }
                                        return i;
                                    }
                                })(c, 1) ||
                                (function (e, t) {
                                    if (e) {
                                        if ("string" == typeof e) return a(e, t);
                                        var i = Object.prototype.toString.call(e).slice(8, -1);
                                        if (
                                            ("Object" === i && e.constructor && (i = e.constructor.name),
                                            "Map" === i || "Set" === i)
                                        )
                                            return Array.from(e);
                                        if ("Arguments" === i || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(i))
                                            return a(e, t);
                                    }
                                })(c, 1) ||
                                (function () {
                                    throw TypeError(
                                        "Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."
                                    );
                                })())[0]),
                            p instanceof Element || (p = null),
                            (i.options.elementInViewport = p),
                            (i.image = {
                                src: i.options.imgSrc || null,
                                $container: null,
                                useImgTag: !1,
                                position: /iPad|iPhone|iPod|Android/.test(u.userAgent) ? "absolute" : "fixed",
                            }),
                            i.initImg() && i.canInitParallax() && i.init();
                    }
                    return (
                        (e = n),
                        (t = [
                            {
                                key: "css",
                                value: function (e, t) {
                                    return "string" == typeof t
                                        ? r.window.getComputedStyle(e).getPropertyValue(t)
                                        : (t.transform && f && (t[f] = t.transform),
                                          Object.keys(t).forEach(function (i) {
                                              e.style[i] = t[i];
                                          }),
                                          e);
                                },
                            },
                            {
                                key: "extend",
                                value: function (e) {
                                    for (var t = arguments.length, i = Array(1 < t ? t - 1 : 0), n = 1; n < t; n++)
                                        i[n - 1] = arguments[n];
                                    return (
                                        (e = e || {}),
                                        Object.keys(i).forEach(function (t) {
                                            i[t] &&
                                                Object.keys(i[t]).forEach(function (n) {
                                                    e[n] = i[t][n];
                                                });
                                        }),
                                        e
                                    );
                                },
                            },
                            {
                                key: "getWindowData",
                                value: function () {
                                    return {
                                        width: r.window.innerWidth || document.documentElement.clientWidth,
                                        height: c,
                                        y: document.documentElement.scrollTop,
                                    };
                                },
                            },
                            {
                                key: "initImg",
                                value: function () {
                                    var e = this,
                                        t = e.options.imgElement;
                                    return (
                                        t && "string" == typeof t && (t = e.$item.querySelector(t)),
                                        t instanceof Element ||
                                            (e.options.imgSrc
                                                ? ((t = new Image()).src = e.options.imgSrc)
                                                : (t = null)),
                                        t &&
                                            (e.options.keepImg
                                                ? (e.image.$item = t.cloneNode(!0))
                                                : ((e.image.$item = t), (e.image.$itemParent = t.parentNode)),
                                            (e.image.useImgTag = !0)),
                                        !!e.image.$item ||
                                            (null === e.image.src &&
                                                ((e.image.src =
                                                    "data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"),
                                                (e.image.bgImage = e.css(e.$item, "background-image"))),
                                            !(!e.image.bgImage || "none" === e.image.bgImage))
                                    );
                                },
                            },
                            {
                                key: "canInitParallax",
                                value: function () {
                                    return f && !this.options.disableParallax();
                                },
                            },
                            {
                                key: "init",
                                value: function () {
                                    var e,
                                        t,
                                        i,
                                        n = this,
                                        s = {
                                            position: "absolute",
                                            top: 0,
                                            left: 0,
                                            width: "100%",
                                            height: "100%",
                                            overflow: "hidden",
                                        },
                                        a = {
                                            pointerEvents: "none",
                                            transformStyle: "preserve-3d",
                                            backfaceVisibility: "hidden",
                                            willChange: "transform,opacity",
                                        };
                                    n.options.keepImg ||
                                        ((e = n.$item.getAttribute("style")) &&
                                            n.$item.setAttribute("data-jarallax-original-styles", e),
                                        !n.image.useImgTag ||
                                            ((t = n.image.$item.getAttribute("style")) &&
                                                n.image.$item.setAttribute("data-jarallax-original-styles", t))),
                                        "static" === n.css(n.$item, "position") &&
                                            n.css(n.$item, { position: "relative" }),
                                        "auto" === n.css(n.$item, "z-index") && n.css(n.$item, { zIndex: 0 }),
                                        (n.image.$container = document.createElement("div")),
                                        n.css(n.image.$container, s),
                                        n.css(n.image.$container, { "z-index": n.options.zIndex }),
                                        p && n.css(n.image.$container, { opacity: 0.9999 }),
                                        n.image.$container.setAttribute(
                                            "id",
                                            "jarallax-container-".concat(n.instanceID)
                                        ),
                                        n.$item.appendChild(n.image.$container),
                                        n.image.useImgTag
                                            ? (a = n.extend(
                                                  {
                                                      "object-fit": n.options.imgSize,
                                                      "object-position": n.options.imgPosition,
                                                      "font-family": "object-fit: "
                                                          .concat(n.options.imgSize, "; object-position: ")
                                                          .concat(n.options.imgPosition, ";"),
                                                      "max-width": "none",
                                                  },
                                                  s,
                                                  a
                                              ))
                                            : ((n.image.$item = document.createElement("div")),
                                              n.image.src &&
                                                  (a = n.extend(
                                                      {
                                                          "background-position": n.options.imgPosition,
                                                          "background-size": n.options.imgSize,
                                                          "background-repeat": n.options.imgRepeat,
                                                          "background-image":
                                                              n.image.bgImage || 'url("'.concat(n.image.src, '")'),
                                                      },
                                                      s,
                                                      a
                                                  ))),
                                        ("opacity" !== n.options.type &&
                                            "scale" !== n.options.type &&
                                            "scale-opacity" !== n.options.type &&
                                            1 !== n.options.speed) ||
                                            (n.image.position = "absolute"),
                                        "fixed" === n.image.position &&
                                            ((i = (function (e) {
                                                for (var t = []; null !== e.parentElement; )
                                                    1 === (e = e.parentElement).nodeType && t.push(e);
                                                return t;
                                            })(n.$item).filter(function (e) {
                                                var t = r.window.getComputedStyle(e),
                                                    i = t["-webkit-transform"] || t["-moz-transform"] || t.transform;
                                                return (
                                                    (i && "none" !== i) ||
                                                    /(auto|scroll)/.test(t.overflow + t["overflow-y"] + t["overflow-x"])
                                                );
                                            })),
                                            (n.image.position = i.length ? "absolute" : "fixed")),
                                        (a.position = n.image.position),
                                        n.css(n.image.$item, a),
                                        n.image.$container.appendChild(n.image.$item),
                                        n.onResize(),
                                        n.onScroll(!0),
                                        n.options.onInit && n.options.onInit.call(n),
                                        "none" !== n.css(n.$item, "background-image") &&
                                            n.css(n.$item, { "background-image": "none" }),
                                        n.addToParallaxList();
                                },
                            },
                            {
                                key: "addToParallaxList",
                                value: function () {
                                    g.push({ instance: this }), 1 === g.length && r.window.requestAnimationFrame($);
                                },
                            },
                            {
                                key: "removeFromParallaxList",
                                value: function () {
                                    var e = this;
                                    g.forEach(function (t, i) {
                                        t.instance.instanceID === e.instanceID && g.splice(i, 1);
                                    });
                                },
                            },
                            {
                                key: "destroy",
                                value: function () {
                                    this.removeFromParallaxList();
                                    var e,
                                        t = this.$item.getAttribute("data-jarallax-original-styles");
                                    this.$item.removeAttribute("data-jarallax-original-styles"),
                                        t ? this.$item.setAttribute("style", t) : this.$item.removeAttribute("style"),
                                        this.image.useImgTag &&
                                            ((e = this.image.$item.getAttribute("data-jarallax-original-styles")),
                                            this.image.$item.removeAttribute("data-jarallax-original-styles"),
                                            e
                                                ? this.image.$item.setAttribute("style", t)
                                                : this.image.$item.removeAttribute("style"),
                                            this.image.$itemParent &&
                                                this.image.$itemParent.appendChild(this.image.$item)),
                                        this.$clipStyles && this.$clipStyles.parentNode.removeChild(this.$clipStyles),
                                        this.image.$container &&
                                            this.image.$container.parentNode.removeChild(this.image.$container),
                                        this.options.onDestroy && this.options.onDestroy.call(this),
                                        delete this.$item.jarallax;
                                },
                            },
                            {
                                key: "clipContainer",
                                value: function () {
                                    var e, t, i, n, s;
                                    "fixed" === this.image.position &&
                                        ((i = (t = (e = this).image.$container.getBoundingClientRect()).width),
                                        (n = t.height),
                                        e.$clipStyles ||
                                            ((e.$clipStyles = document.createElement("style")),
                                            e.$clipStyles.setAttribute("type", "text/css"),
                                            e.$clipStyles.setAttribute("id", "jarallax-clip-".concat(e.instanceID)),
                                            (document.head || document.getElementsByTagName("head")[0]).appendChild(
                                                e.$clipStyles
                                            )),
                                        (s = "#jarallax-container-"
                                            .concat(e.instanceID, " {\n           clip: rect(0 ")
                                            .concat(i, "px ")
                                            .concat(n, "px 0);\n           clip: rect(0, ")
                                            .concat(i, "px, ")
                                            .concat(n, "px, 0);\n        }")),
                                        e.$clipStyles.styleSheet
                                            ? (e.$clipStyles.styleSheet.cssText = s)
                                            : (e.$clipStyles.innerHTML = s));
                                },
                            },
                            {
                                key: "coverImage",
                                value: function () {
                                    var e = this,
                                        t = e.image.$container.getBoundingClientRect(),
                                        i = t.height,
                                        n = e.options.speed,
                                        s = "scroll" === e.options.type || "scroll-opacity" === e.options.type,
                                        r = 0,
                                        a = i,
                                        l = 0;
                                    return (
                                        s &&
                                            (n < 0
                                                ? ((r = n * Math.max(i, c)), c < i && (r -= n * (i - c)))
                                                : (r = n * (i + c)),
                                            1 < n
                                                ? (a = Math.abs(r - c))
                                                : n < 0
                                                  ? (a = r / n + Math.abs(r))
                                                  : (a += (c - i) * (1 - n)),
                                            (r /= 2)),
                                        (e.parallaxScrollDistance = r),
                                        (l = s ? (c - a) / 2 : (i - a) / 2),
                                        e.css(e.image.$item, {
                                            height: "".concat(a, "px"),
                                            marginTop: "".concat(l, "px"),
                                            left: "fixed" === e.image.position ? "".concat(t.left, "px") : "0",
                                            width: "".concat(t.width, "px"),
                                        }),
                                        e.options.onCoverImage && e.options.onCoverImage.call(e),
                                        { image: { height: a, marginTop: l }, container: t }
                                    );
                                },
                            },
                            {
                                key: "isVisible",
                                value: function () {
                                    return this.isElementInViewport || !1;
                                },
                            },
                            {
                                key: "onScroll",
                                value: function (e) {
                                    var t,
                                        i,
                                        n,
                                        s,
                                        a,
                                        l,
                                        o,
                                        d,
                                        u,
                                        p,
                                        h = this,
                                        f = h.$item.getBoundingClientRect(),
                                        m = f.top,
                                        g = f.height,
                                        $ = {},
                                        v = f;
                                    h.options.elementInViewport &&
                                        (v = h.options.elementInViewport.getBoundingClientRect()),
                                        (h.isElementInViewport =
                                            0 <= v.bottom &&
                                            0 <= v.right &&
                                            v.top <= c &&
                                            v.left <= r.window.innerWidth),
                                        (e || h.isElementInViewport) &&
                                            ((t = Math.max(0, m)),
                                            (i = Math.max(0, g + m)),
                                            (n = Math.max(0, -m)),
                                            (s = Math.max(0, m + g - c)),
                                            (a = Math.max(0, g - (m + g - c))),
                                            (l = Math.max(0, -m + c - g)),
                                            (o = 1 - ((c - m) / (c + g)) * 2),
                                            (d = 1),
                                            g < c
                                                ? (d = 1 - (n || s) / g)
                                                : i <= c
                                                  ? (d = i / c)
                                                  : a <= c && (d = a / c),
                                            ("opacity" !== h.options.type &&
                                                "scale-opacity" !== h.options.type &&
                                                "scroll-opacity" !== h.options.type) ||
                                                (($.transform = "translate3d(0,0,0)"), ($.opacity = d)),
                                            ("scale" !== h.options.type && "scale-opacity" !== h.options.type) ||
                                                ((u = 1),
                                                h.options.speed < 0
                                                    ? (u -= h.options.speed * d)
                                                    : (u += h.options.speed * (1 - d)),
                                                ($.transform = "scale(".concat(u, ") translate3d(0,0,0)"))),
                                            ("scroll" !== h.options.type && "scroll-opacity" !== h.options.type) ||
                                                ((p = h.parallaxScrollDistance * o),
                                                "absolute" === h.image.position && (p -= m),
                                                ($.transform = "translate3d(0,".concat(p, "px,0)"))),
                                            h.css(h.image.$item, $),
                                            h.options.onScroll &&
                                                h.options.onScroll.call(h, {
                                                    section: f,
                                                    beforeTop: t,
                                                    beforeTopEnd: i,
                                                    afterTop: n,
                                                    beforeBottom: s,
                                                    beforeBottomEnd: a,
                                                    afterBottom: l,
                                                    visiblePercent: d,
                                                    fromViewportCenter: o,
                                                }));
                                },
                            },
                            {
                                key: "onResize",
                                value: function () {
                                    this.coverImage(), this.clipContainer();
                                },
                            },
                        ]),
                        o(e.prototype, t),
                        i && o(e, i),
                        n
                    );
                })();
            (v.constructor = _), (t.default = v);
        },
    ]),
    (function (e, t) {
        "object" == typeof exports && "undefined" != typeof module
            ? t(exports)
            : "function" == typeof define && define.amd
              ? define(["exports"], t)
              : t(((e = e || self).window = e.window || {}));
    })(this, function (e) {
        "use strict";
        function t(e, t) {
            (e.prototype = Object.create(t.prototype)), ((e.prototype.constructor = e).__proto__ = t);
        }
        function i(e) {
            if (void 0 === e) throw ReferenceError("this hasn't been initialised - super() hasn't been called");
            return e;
        }
        function n(e) {
            return "string" == typeof e;
        }
        function s(e) {
            return "function" == typeof e;
        }
        function r(e) {
            return "number" == typeof e;
        }
        function a(e) {
            return void 0 === e;
        }
        function l(e) {
            return "object" == typeof e;
        }
        function o(e) {
            return !1 !== e;
        }
        function d() {
            return "undefined" != typeof window;
        }
        function c(e) {
            return s(e) || n(e);
        }
        function u(e) {
            return (e$ = eJ(e, e2)) && tW;
        }
        function p(e, t) {
            return console.warn("Invalid property", e, "set to", t, "Missing plugin? gsap.registerPlugin()");
        }
        function h(e, t) {
            return !t && console.warn(e);
        }
        function f(e, t) {
            return (e && (e2[e] = t) && e$ && (e$[e] = t)) || e2;
        }
        function m() {
            return 0;
        }
        function g(e) {
            var t,
                i,
                n = e[0];
            if ((l(n) || s(n) || (e = [e]), !(t = (n._gsap || {}).harness))) {
                for (i = eQ.length; i-- && !eQ[i].targetTest(n); );
                t = eQ[i];
            }
            for (i = e.length; i--; ) (e[i] && (e[i]._gsap || (e[i]._gsap = new tb(e[i], t)))) || e.splice(i, 1);
            return e;
        }
        function $(e) {
            return e._gsap || g(ts(e))[0]._gsap;
        }
        function v(e, t) {
            var i = e[t];
            return s(i) ? e[t]() : (a(i) && e.getAttribute(t)) || i;
        }
        function y(e, t) {
            return (e = e.split(",")).forEach(t) || e;
        }
        function _(e) {
            return Math.round(1e5 * e) / 1e5 || 0;
        }
        function b(e, t) {
            for (var i = t.length, n = 0; 0 > e.indexOf(t[n]) && ++n < i; );
            return n < i;
        }
        function x(e, t, i) {
            var n,
                s = r(e[1]),
                a = (s ? 2 : 1) + (t < 2 ? 0 : 1),
                l = e[a];
            if ((s && (l.duration = e[1]), (l.parent = i), t)) {
                for (n = l; i && !("immediateRender" in n); )
                    (n = i.vars.defaults || {}), (i = o(i.vars.inherit) && i.parent);
                (l.immediateRender = o(n.immediateRender)), t < 2 ? (l.runBackwards = 1) : (l.startAt = e[a - 1]);
            }
            return l;
        }
        function w() {
            var e,
                t,
                i = e6.length,
                n = e6.slice(0);
            for (ej = {}, e = e6.length = 0; e < i; e++)
                (t = n[e]) && t._lazy && (t.render(t._lazy[0], t._lazy[1], !0)._lazy = 0);
        }
        function S(e, t, i, n) {
            e6.length && w(), e.render(t, i, n), e6.length && w();
        }
        function E(e) {
            var t = parseFloat(e);
            return (t || 0 === t) && (e + "").match(eF).length < 2 ? t : e;
        }
        function T(e) {
            return e;
        }
        function C(e, t) {
            for (var i in t) i in e || (e[i] = t[i]);
            return e;
        }
        function k(e, t) {
            for (var i in t) i in e || "duration" === i || "ease" === i || (e[i] = t[i]);
        }
        function P(e, t) {
            for (var i in t) e[i] = l(t[i]) ? P(e[i] || (e[i] = {}), t[i]) : t[i];
            return e;
        }
        function A(e, t) {
            var i,
                n = {};
            for (i in e) i in t || (n[i] = e[i]);
            return n;
        }
        function z(e) {
            var t = e.parent || eh,
                i = e.keyframes ? k : C;
            if (o(e.inherit)) for (; t; ) i(e, t.vars.defaults), (t = t.parent || t._dp);
            return e;
        }
        function L(e, t, i, n) {
            void 0 === i && (i = "_first"), void 0 === n && (n = "_last");
            var s = t._prev,
                r = t._next;
            s ? (s._next = r) : e[i] === t && (e[i] = r),
                r ? (r._prev = s) : e[n] === t && (e[n] = s),
                (t._next = t._prev = t.parent = null);
        }
        function O(e, t) {
            e.parent && (!t || e.parent.autoRemoveChildren) && e.parent.remove(e), (e._act = 0);
        }
        function M(e) {
            for (var t = e; t; ) (t._dirty = 1), (t = t.parent);
            return e;
        }
        function I(e) {
            return e._repeat ? te(e._tTime, (e = e.duration() + e._rDelay)) * e : 0;
        }
        function D(e, t) {
            return (e - t._start) * t._ts + (0 <= t._ts ? 0 : t._dirty ? t.totalDuration() : t._tDur);
        }
        function N(e) {
            return (e._end = _(e._start + (e._tDur / Math.abs(e._ts || e._rts || eD) || 0)));
        }
        function B(e, t) {
            var i;
            if (
                ((t._time || (t._initted && !t._dur)) &&
                    ((i = D(e.rawTime(), t)),
                    (!t._dur || ti(0, t.totalDuration(), i) - t._tTime > eD) && t.render(i, !0)),
                M(e)._dp && e._initted && e._time >= e._dur && e._ts)
            ) {
                if (e._dur < e.duration()) for (i = e; i._dp; ) 0 <= i.rawTime() && i.totalTime(i._tTime), (i = i._dp);
                e._zTime = -eD;
            }
        }
        function V(e, t, i, n) {
            return (
                t.parent && O(t),
                (t._start = _(i + t._delay)),
                (t._end = _(t._start + (t.totalDuration() / Math.abs(t.timeScale()) || 0))),
                (function e(t, i, n, s, r) {
                    void 0 === n && (n = "_first"), void 0 === s && (s = "_last");
                    var a,
                        l = t[s];
                    if (r) for (a = i[r]; l && l[r] > a; ) l = l._prev;
                    l ? ((i._next = l._next), (l._next = i)) : ((i._next = t[n]), (t[n] = i)),
                        i._next ? (i._next._prev = i) : (t[s] = i),
                        (i._prev = l),
                        (i.parent = i._dp = t);
                })(e, t, "_first", "_last", e._sort ? "_start" : 0),
                (e._recent = t),
                n || B(e, t),
                e
            );
        }
        function X(e, t) {
            return (e2.ScrollTrigger || p("scrollTrigger", t)) && e2.ScrollTrigger.create(t, e);
        }
        function Y(e, t, i, n) {
            return (
                tC(e, t),
                e._initted
                    ? !i && e._pt && ((e._dur && !1 !== e.vars.lazy) || (!e._dur && e.vars.lazy)) && ey !== tu.frame
                        ? (e6.push(e), (e._lazy = [t, n]), 1)
                        : void 0
                    : 1
            );
        }
        function R(e, t, i) {
            var n = e._repeat,
                s = _(t) || 0;
            return (
                (e._dur = s),
                (e._tDur = n ? (n < 0 ? 1e10 : _(s * (n + 1) + e._rDelay * n)) : s),
                e._time > s && ((e._time = s), (e._tTime = Math.min(e._tTime, e._tDur))),
                i || M(e.parent),
                e.parent && N(e),
                e
            );
        }
        function H(e) {
            return e instanceof tS ? M(e) : R(e, e._dur);
        }
        function q(e, t) {
            var i,
                s,
                r = e.labels,
                a = e._recent || tt,
                l = e.duration() >= eI ? a.endTime(!1) : e._dur;
            return n(t) && (isNaN(t) || t in r)
                ? "<" === (i = t.charAt(0)) || ">" === i
                    ? ("<" === i ? a._start : a.endTime(0 <= a._repeat)) + (parseFloat(t.substr(1)) || 0)
                    : (i = t.indexOf("=")) < 0
                      ? (t in r || (r[t] = l), r[t])
                      : ((s = +(t.charAt(i - 1) + t.substr(i + 1))), 1 < i ? q(e, t.substr(0, i - 1)) + s : l + s)
                : null == t
                  ? l
                  : +t;
        }
        function G(e, t) {
            return e || 0 === e ? t(e) : t;
        }
        function W(e) {
            return (e + "").substr((parseFloat(e) + "").length);
        }
        function F(e, t) {
            return (
                e &&
                l(e) &&
                "length" in e &&
                ((!t && !e.length) || (e.length - 1 in e && l(e[0]))) &&
                !e.nodeType &&
                e !== ef
            );
        }
        function j(e) {
            return e.sort(function () {
                return 0.5 - Math.random();
            });
        }
        function U(e) {
            if (s(e)) return e;
            var t = l(e) ? e : { each: e },
                i = t$(t.ease),
                r = t.from || 0,
                a = parseFloat(t.base) || 0,
                o = {},
                d = 0 < r && r < 1,
                c = isNaN(r) || d,
                u = t.axis,
                p = r,
                h = r;
            return (
                n(r) ? (p = h = { center: 0.5, edges: 0.5, end: 1 }[r] || 0) : !d && c && ((p = r[0]), (h = r[1])),
                function (e, n, s) {
                    var l,
                        d,
                        f,
                        m,
                        g,
                        $,
                        v,
                        y,
                        b,
                        x = (s || t).length,
                        w = o[x];
                    if (!w) {
                        if (!(b = "auto" === t.grid ? 0 : (t.grid || [1, eI])[1])) {
                            for (v = -eI; v < (v = s[b++].getBoundingClientRect().left) && b < x; );
                            b--;
                        }
                        for (
                            w = o[x] = [],
                                l = c ? Math.min(b, x) * p - 0.5 : r % b,
                                d = c ? (x * h) / b - 0.5 : (r / b) | 0,
                                y = eI,
                                $ = v = 0;
                            $ < x;
                            $++
                        )
                            (f = ($ % b) - l),
                                (m = d - (($ / b) | 0)),
                                (w[$] = g = u ? Math.abs("y" === u ? m : f) : e3(f * f + m * m)),
                                v < g && (v = g),
                                g < y && (y = g);
                        "random" === r && j(w),
                            (w.max = v - y),
                            (w.min = y),
                            (w.v = x =
                                (parseFloat(t.amount) ||
                                    parseFloat(t.each) *
                                        (x < b ? x - 1 : u ? ("y" === u ? x / b : b) : Math.max(b, x / b)) ||
                                    0) * ("edges" === r ? -1 : 1)),
                            (w.b = x < 0 ? a - x : a),
                            (w.u = W(t.amount || t.each) || 0),
                            (i = i && x < 0 ? tg(i) : i);
                    }
                    return (x = (w[e] - w.min) / w.max || 0), _(w.b + (i ? i(x) : x) * w.v) + w.u;
                }
            );
        }
        function Z(e) {
            var t = e < 1 ? Math.pow(10, (e + "").length - 2) : 1;
            return function (i) {
                return Math.floor(Math.round(parseFloat(i) / e) * e * t) / t + (r(i) ? 0 : W(i));
            };
        }
        function Q(e, t) {
            var i,
                n,
                a = eY(e);
            return (
                !a &&
                    l(e) &&
                    ((i = a = e.radius || eI),
                    e.values ? ((e = ts(e.values)), (n = !r(e[0])) && (i *= i)) : (e = Z(e.increment))),
                G(
                    t,
                    a
                        ? s(e)
                            ? function (t) {
                                  return Math.abs((n = e(t)) - t) <= i ? n : t;
                              }
                            : function (t) {
                                  for (
                                      var s,
                                          a,
                                          l = parseFloat(n ? t.x : t),
                                          o = parseFloat(n ? t.y : 0),
                                          d = eI,
                                          c = 0,
                                          u = e.length;
                                      u--;

                                  )
                                      (s = n ? (s = e[u].x - l) * s + (a = e[u].y - o) * a : Math.abs(e[u] - l)) < d &&
                                          ((d = s), (c = u));
                                  return (c = !i || d <= i ? e[c] : t), n || c === t || r(t) ? c : c + W(t);
                              }
                        : Z(e)
                )
            );
        }
        function K(e, t, i, n) {
            return G(eY(e) ? !t : !0 === i ? ((i = 0), !1) : !n, function () {
                return eY(e)
                    ? e[~~(Math.random() * e.length)]
                    : (n = (i = i || 1e-5) < 1 ? Math.pow(10, (i + "").length - 2) : 1) &&
                          Math.floor(Math.round((e + Math.random() * (t - e)) / i) * i * n) / n;
            });
        }
        function J(e, t, i) {
            return G(i, function (i) {
                return e[~~t(i)];
            });
        }
        function ee(e) {
            for (var t, i, n, s, r = 0, a = ""; ~(t = e.indexOf("random(", r)); )
                (n = e.indexOf(")", t)),
                    (s = "[" === e.charAt(t + 7)),
                    (i = e.substr(t + 7, n - t - 7).match(s ? eF : eR)),
                    (a += e.substr(r, t - r) + K(s ? i : +i[0], +i[1], +i[2] || 1e-5)),
                    (r = n + 1);
            return a + e.substr(r, e.length - r);
        }
        function et(e, t, i) {
            var n,
                s,
                r,
                a = e.labels,
                l = eI;
            for (n in a) (s = a[n] - t) < 0 == !!i && s && l > (s = Math.abs(s)) && ((r = n), (l = s));
            return r;
        }
        function ei(e) {
            return O(e), 1 > e.progress() && ta(e, "onInterrupt"), e;
        }
        function en(e, t, i) {
            return (
                ((6 * (e = e < 0 ? e + 1 : 1 < e ? e - 1 : e) < 1
                    ? t + (i - t) * e * 6
                    : e < 0.5
                      ? i
                      : 3 * e < 2
                        ? t + (i - t) * (2 / 3 - e) * 6
                        : t) *
                    tl +
                    0.5) |
                0
            );
        }
        function es(e, t, i) {
            var n,
                s,
                a,
                l,
                o,
                d,
                c,
                u,
                p,
                h,
                f = e ? (r(e) ? [e >> 16, (e >> 8) & tl, e & tl] : 0) : to.black;
            if (!f) {
                if (("," === e.substr(-1) && (e = e.substr(0, e.length - 1)), to[e])) f = to[e];
                else if ("#" === e.charAt(0))
                    4 === e.length && (e = "#" + (n = e.charAt(1)) + n + (s = e.charAt(2)) + s + (a = e.charAt(3)) + a),
                        (f = [(e = parseInt(e.substr(1), 16)) >> 16, (e >> 8) & tl, e & tl]);
                else if ("hsl" === e.substr(0, 3)) {
                    if (((f = h = e.match(eR)), t)) {
                        if (~e.indexOf("=")) return (f = e.match(eH)), i && f.length < 4 && (f[3] = 1), f;
                    } else
                        (l = (+f[0] % 360) / 360),
                            (o = f[1] / 100),
                            (n = 2 * (d = f[2] / 100) - (s = d <= 0.5 ? d * (o + 1) : d + o - d * o)),
                            3 < f.length && (f[3] *= 1),
                            (f[0] = en(l + 1 / 3, n, s)),
                            (f[1] = en(l, n, s)),
                            (f[2] = en(l - 1 / 3, n, s));
                } else f = e.match(eR) || to.transparent;
                f = f.map(Number);
            }
            return (
                t &&
                    !h &&
                    ((n = f[0] / tl),
                    (d = ((c = Math.max(n, (s = f[1] / tl), (a = f[2] / tl))) + (u = Math.min(n, s, a))) / 2),
                    c === u
                        ? (l = o = 0)
                        : ((p = c - u),
                          (o = 0.5 < d ? p / (2 - c - u) : p / (c + u)),
                          (l = c === n ? (s - a) / p + (s < a ? 6 : 0) : c === s ? (a - n) / p + 2 : (n - s) / p + 4),
                          (l *= 60)),
                    (f[0] = ~~(l + 0.5)),
                    (f[1] = ~~(100 * o + 0.5)),
                    (f[2] = ~~(100 * d + 0.5))),
                i && f.length < 4 && (f[3] = 1),
                f
            );
        }
        function er(e) {
            var t = [],
                i = [],
                n = -1;
            return (
                e.split(td).forEach(function (e) {
                    var s = e.match(eq) || [];
                    t.push.apply(t, s), i.push((n += s.length + 1));
                }),
                (t.c = i),
                t
            );
        }
        function ea(e, t, i) {
            var n,
                s,
                r,
                a,
                l = "",
                o = (e + l).match(td),
                d = t ? "hsla(" : "rgba(",
                c = 0;
            if (!o) return e;
            if (
                ((o = o.map(function (e) {
                    return (
                        (e = es(e, t, 1)) && d + (t ? e[0] + "," + e[1] + "%," + e[2] + "%," + e[3] : e.join(",")) + ")"
                    );
                })),
                i && ((r = er(e)), (n = i.c).join(l) !== r.c.join(l)))
            )
                for (a = (s = e.replace(td, "1").split(eq)).length - 1; c < a; c++)
                    l +=
                        s[c] +
                        (~n.indexOf(c) ? o.shift() || d + "0,0,0,0)" : (r.length ? r : o.length ? o : i).shift());
            if (!s) for (a = (s = e.split(td)).length - 1; c < a; c++) l += s[c] + o[c];
            return l + s[a];
        }
        function el(e) {
            var t,
                i = e.join(" ");
            if (((td.lastIndex = 0), td.test(i)))
                return (t = tc.test(i)), (e[1] = ea(e[1], t)), (e[0] = ea(e[0], t, er(e[1]))), !0;
        }
        function eo(e, t) {
            for (var i, n = e._first; n; )
                n instanceof tS
                    ? eo(n, t)
                    : !n.vars.yoyoEase ||
                      (n._yoyo && n._repeat) ||
                      n._yoyo === t ||
                      (n.timeline
                          ? eo(n.timeline, t)
                          : ((i = n._ease), (n._ease = n._yEase), (n._yEase = i), (n._yoyo = t))),
                    (n = n._next);
        }
        function ed(e, t, i, n) {
            void 0 === i &&
                (i = function e(i) {
                    return 1 - t(1 - i);
                }),
                void 0 === n &&
                    (n = function e(i) {
                        return i < 0.5 ? t(2 * i) / 2 : 1 - t(2 * (1 - i)) / 2;
                    });
            var s,
                r = { easeIn: t, easeOut: i, easeInOut: n };
            return (
                y(e, function (e) {
                    for (var t in ((th[e] = e2[e] = r), (th[(s = e.toLowerCase())] = i), r))
                        th[s + ("easeIn" === t ? ".in" : "easeOut" === t ? ".out" : ".inOut")] = th[e + "." + t] = r[t];
                }),
                r
            );
        }
        function ec(e) {
            return function (t) {
                return t < 0.5 ? (1 - e(1 - 2 * t)) / 2 : 0.5 + e(2 * (t - 0.5)) / 2;
            };
        }
        function eu(e, t, i) {
            function n(e) {
                return 1 === e ? 1 : s * Math.pow(2, -10 * e) * eX((e - a) * r) + 1;
            }
            var s = 1 <= t ? t : 1,
                r = (i || (e ? 0.3 : 0.45)) / (t < 1 ? t : 1),
                a = (r / eN) * (Math.asin(1 / s) || 0),
                l =
                    "out" === e
                        ? n
                        : "in" === e
                          ? function (e) {
                                return 1 - n(1 - e);
                            }
                          : ec(n);
            return (
                (r = eN / r),
                (l.config = function (t, i) {
                    return eu(e, t, i);
                }),
                l
            );
        }
        function ep(e, t) {
            function i(e) {
                return e ? --e * e * ((t + 1) * e + t) + 1 : 0;
            }
            void 0 === t && (t = 1.70158);
            var n =
                "out" === e
                    ? i
                    : "in" === e
                      ? function (e) {
                            return 1 - i(1 - e);
                        }
                      : ec(i);
            return (
                (n.config = function (t) {
                    return ep(e, t);
                }),
                n
            );
        }
        var eh,
            ef,
            em,
            eg,
            e$,
            ev,
            ey,
            e_,
            eb,
            ex,
            ew,
            eS,
            eE,
            eT,
            e8,
            eC,
            ek,
            e9,
            eP,
            eA,
            ez,
            eL,
            eO,
            e0 = { autoSleep: 120, force3D: "auto", nullTargetWarn: 1, units: { lineHeight: "" } },
            eM = { duration: 0.5, overwrite: !1, delay: 0 },
            eI = 1e8,
            eD = 1 / eI,
            eN = 2 * Math.PI,
            e1 = eN / 4,
            eB = 0,
            e3 = Math.sqrt,
            eV = Math.cos,
            eX = Math.sin,
            eY = Array.isArray,
            eR = /(?:-?\.?\d|\.)+/gi,
            eH = /[-+=.]*\d+[.e\-+]*\d*[e\-\+]*\d*/g,
            eq = /[-+=.]*\d+[.e-]*\d*[a-z%]*/g,
            eG = /[-+=.]*\d+(?:\.|e-|e)*\d*/gi,
            eW = /\(([^()]+)\)/i,
            e7 = /[+-]=-?[\.\d]+/,
            eF = /[#\-+.]*\b[a-z\d-=+%.]+/gi,
            e2 = {},
            e5 = {},
            e6 = [],
            ej = {},
            e4 = {},
            eU = {},
            eZ = 30,
            eQ = [],
            eK = "",
            eJ = function e(t, i) {
                for (var n in i) t[n] = i[n];
                return t;
            },
            te = function e(t, i) {
                return (t /= i) && ~~t === t ? ~~t - 1 : ~~t;
            },
            tt = { _start: 0, endTime: m },
            ti = function e(t, i, n) {
                return n < t ? t : i < n ? i : n;
            },
            tn = [].slice,
            ts = function e(t, i) {
                var s, r, a;
                return !n(t) || i || (!em && tp())
                    ? eY(t)
                        ? ((s = t),
                          (r = i),
                          void 0 === a && (a = []),
                          s.forEach(function (e) {
                              return (n(e) && !r) || F(e, 1) ? a.push.apply(a, ts(e)) : a.push(e);
                          }) || a)
                        : F(t)
                          ? tn.call(t, 0)
                          : t
                            ? [t]
                            : []
                    : tn.call(eg.querySelectorAll(t), 0);
            },
            tr = function e(t, i, n, s, r) {
                var a = i - t,
                    l = s - n;
                return G(r, function (e) {
                    return n + (((e - t) / a) * l || 0);
                });
            },
            ta = function e(t, i, n) {
                var s,
                    r,
                    a = t.vars,
                    l = a[i];
                if (l)
                    return (
                        (s = a[i + "Params"]),
                        (r = a.callbackScope || t),
                        n && e6.length && w(),
                        s ? l.apply(r, s) : l.call(r)
                    );
            },
            tl = 255,
            to = {
                aqua: [0, tl, tl],
                lime: [0, tl, 0],
                silver: [192, 192, 192],
                black: [0, 0, 0],
                maroon: [128, 0, 0],
                teal: [0, 128, 128],
                blue: [0, 0, tl],
                navy: [0, 0, 128],
                white: [tl, tl, tl],
                olive: [128, 128, 0],
                yellow: [tl, tl, 0],
                orange: [tl, 165, 0],
                gray: [128, 128, 128],
                purple: [128, 0, 128],
                green: [0, 128, 0],
                red: [tl, 0, 0],
                pink: [tl, 192, 203],
                cyan: [0, tl, tl],
                transparent: [tl, tl, tl, 0],
            },
            td = (function () {
                var e,
                    t = "(?:\\b(?:(?:rgb|rgba|hsl|hsla)\\(.+?\\))|\\B#(?:[0-9a-f]{3}){1,2}\\b";
                for (e in to) t += "|" + e + "\\b";
                return RegExp(t + ")", "gi");
            })(),
            tc = /hsl[a]?\(/,
            tu =
                ((e8 = 500),
                (eC = 33),
                (e9 = ek = (eT = Date.now)()),
                (eA = eP = 1 / 240),
                (eE = {
                    time: 0,
                    frame: 0,
                    tick: function e() {
                        tv(!0);
                    },
                    wake: function e() {
                        ev &&
                            (!em &&
                                d() &&
                                ((eg = (ef = em = window).document || {}),
                                (e2.gsap = tW),
                                (ef.gsapVersions || (ef.gsapVersions = [])).push(tW.version),
                                u(e$ || ef.GreenSockGlobals || (!ef.gsap && ef) || {}),
                                (eS = ef.requestAnimationFrame)),
                            ex && eE.sleep(),
                            (ew =
                                eS ||
                                function (e) {
                                    return setTimeout(e, (1e3 * (eA - eE.time) + 1) | 0);
                                }),
                            (eb = 1),
                            tv(2));
                    },
                    sleep: function e() {
                        (eS ? ef.cancelAnimationFrame : clearTimeout)(ex), (eb = 0), (ew = m);
                    },
                    lagSmoothing: function e(t, i) {
                        eC = Math.min(i, (e8 = t || 1e8), 0);
                    },
                    fps: function e(t) {
                        (eP = 1 / (t || 240)), (eA = eE.time + eP);
                    },
                    add: function e(t) {
                        0 > ez.indexOf(t) && ez.push(t), tp();
                    },
                    remove: function e(t) {
                        var i;
                        ~(i = ez.indexOf(t)) && ez.splice(i, 1);
                    },
                    _listeners: (ez = []),
                })),
            tp = function e() {
                return !eb && tu.wake();
            },
            th = {},
            tf = /^[\d.\-M][\d.\-,\s]/,
            tm = /["']/g,
            tg = function e(t) {
                return function (e) {
                    return 1 - t(1 - e);
                };
            },
            t$ = function e(t, i) {
                var n, r, a;
                return (
                    (t &&
                        (s(t)
                            ? t
                            : th[t] ||
                              ((a = th[(r = ((n = t) + "").split("("))[0]]) && 1 < r.length && a.config
                                  ? a.config.apply(
                                        null,
                                        ~n.indexOf("{")
                                            ? [
                                                  (function e(t) {
                                                      for (
                                                          var i,
                                                              n,
                                                              s,
                                                              r = {},
                                                              a = t.substr(1, t.length - 3).split(":"),
                                                              l = a[0],
                                                              o = 1,
                                                              d = a.length;
                                                          o < d;
                                                          o++
                                                      )
                                                          (n = a[o]),
                                                              (i = o !== d - 1 ? n.lastIndexOf(",") : n.length),
                                                              (s = n.substr(0, i)),
                                                              (r[l] = isNaN(s) ? s.replace(tm, "").trim() : +s),
                                                              (l = n.substr(i + 1).trim());
                                                      return r;
                                                  })(r[1]),
                                              ]
                                            : eW.exec(n)[1].split(",").map(E)
                                    )
                                  : th._CE && tf.test(n)
                                    ? th._CE("", n)
                                    : a))) ||
                    i
                );
            };
        function tv(e) {
            var t,
                i,
                n = eT() - e9,
                s = !0 === e;
            e8 < n && (ek += n - eC),
                (e9 += n),
                (eE.time = (e9 - ek) / 1e3),
                (0 < (t = eE.time - eA) || s) && (eE.frame++, (eA += t + (eP <= t ? 0.004 : eP - t)), (i = 1)),
                s || (ex = ew(tv)),
                i &&
                    ez.forEach(function (t) {
                        return t(eE.time, n, eE.frame, e);
                    });
        }
        function ty(e) {
            return e < eO
                ? eL * e * e
                : e < 0.7272727272727273
                  ? eL * Math.pow(e - 1.5 / 2.75, 2) + 0.75
                  : e < 0.9090909090909092
                    ? eL * (e -= 2.25 / 2.75) * e + 0.9375
                    : eL * Math.pow(e - 2.625 / 2.75, 2) + 0.984375;
        }
        y("Linear,Quad,Cubic,Quart,Quint,Strong", function (e, t) {
            var i = t < 5 ? t + 1 : t;
            ed(
                e + ",Power" + (i - 1),
                t
                    ? function (e) {
                          return Math.pow(e, i);
                      }
                    : function (e) {
                          return e;
                      },
                function (e) {
                    return 1 - Math.pow(1 - e, i);
                },
                function (e) {
                    return e < 0.5 ? Math.pow(2 * e, i) / 2 : 1 - Math.pow(2 * (1 - e), i) / 2;
                }
            );
        }),
            (th.Linear.easeNone = th.none = th.Linear.easeIn),
            ed("Elastic", eu("in"), eu("out"), eu()),
            (eL = 7.5625),
            (eO = 1 / 2.75),
            ed(
                "Bounce",
                function (e) {
                    return 1 - ty(1 - e);
                },
                ty
            ),
            ed("Expo", function (e) {
                return e ? Math.pow(2, 10 * (e - 1)) : 0;
            }),
            ed("Circ", function (e) {
                return -(e3(1 - e * e) - 1);
            }),
            ed("Sine", function (e) {
                return 1 === e ? 1 : 1 - eV(e * e1);
            }),
            ed("Back", ep("in"), ep("out"), ep()),
            (th.SteppedEase =
                th.steps =
                e2.SteppedEase =
                    {
                        config: function e(t, i) {
                            void 0 === t && (t = 1);
                            var n = 1 / t,
                                s = t + (i ? 0 : 1),
                                r = i ? 1 : 0;
                            return function (e) {
                                return (((s * ti(0, 0.99999999, e)) | 0) + r) * n;
                            };
                        },
                    }),
            (eM.ease = th["quad.out"]),
            y("onComplete,onUpdate,onStart,onRepeat,onReverseComplete,onInterrupt", function (e) {
                return (eK += e + "," + e + "Params,");
            });
        var t_,
            tb = function e(t, i) {
                (this.id = eB++),
                    ((t._gsap = this).target = t),
                    (this.harness = i),
                    (this.get = i ? i.get : v),
                    (this.set = i ? i.getSetter : tI);
            },
            tx =
                (((t_ = tw.prototype).delay = function e(t) {
                    return t || 0 === t
                        ? (this.parent &&
                              this.parent.smoothChildTiming &&
                              this.startTime(this._start + t - this._delay),
                          (this._delay = t),
                          this)
                        : this._delay;
                }),
                (t_.duration = function e(t) {
                    return arguments.length
                        ? this.totalDuration(0 < this._repeat ? t + (t + this._rDelay) * this._repeat : t)
                        : this.totalDuration() && this._dur;
                }),
                (t_.totalDuration = function e(t) {
                    return arguments.length
                        ? ((this._dirty = 0),
                          R(this, this._repeat < 0 ? t : (t - this._repeat * this._rDelay) / (this._repeat + 1)))
                        : this._tDur;
                }),
                (t_.totalTime = function e(t, i) {
                    if ((tp(), !arguments.length)) return this._tTime;
                    var n = this.parent || this._dp;
                    if (n && n.smoothChildTiming && this._ts) {
                        for (
                            this._start = _(
                                n._time -
                                    (0 < this._ts
                                        ? t / this._ts
                                        : -(((this._dirty ? this.totalDuration() : this._tDur) - t) / this._ts))
                            ),
                                N(this),
                                n._dirty || M(n);
                            n.parent;

                        )
                            n.parent._time !==
                                n._start +
                                    (0 <= n._ts ? n._tTime / n._ts : -((n.totalDuration() - n._tTime) / n._ts)) &&
                                n.totalTime(n._tTime, !0),
                                (n = n.parent);
                        !this.parent &&
                            this._dp.autoRemoveChildren &&
                            ((0 < this._ts && t < this._tDur) || (this._ts < 0 && 0 < t) || (!this._tDur && !t)) &&
                            V(this._dp, this, this._start - this._delay);
                    }
                    return (
                        (this._tTime === t &&
                            (this._dur || i) &&
                            (!this._initted || Math.abs(this._zTime) !== eD) &&
                            (t || this._initted)) ||
                            (this._ts || (this._pTime = t), S(this, t, i)),
                        this
                    );
                }),
                (t_.time = function e(t, i) {
                    return arguments.length
                        ? this.totalTime(
                              Math.min(this.totalDuration(), t + I(this)) % this._dur || (t ? this._dur : 0),
                              i
                          )
                        : this._time;
                }),
                (t_.totalProgress = function e(t, i) {
                    return arguments.length
                        ? this.totalTime(this.totalDuration() * t, i)
                        : this.totalDuration()
                          ? Math.min(1, this._tTime / this._tDur)
                          : this.ratio;
                }),
                (t_.progress = function e(t, i) {
                    return arguments.length
                        ? this.totalTime(
                              this.duration() * (!this._yoyo || 1 & this.iteration() ? t : 1 - t) + I(this),
                              i
                          )
                        : this.duration()
                          ? Math.min(1, this._time / this._dur)
                          : this.ratio;
                }),
                (t_.iteration = function e(t, i) {
                    var n = this.duration() + this._rDelay;
                    return arguments.length
                        ? this.totalTime(this._time + (t - 1) * n, i)
                        : this._repeat
                          ? te(this._tTime, n) + 1
                          : 1;
                }),
                (t_.timeScale = function e(t) {
                    if (!arguments.length) return this._rts === -eD ? 0 : this._rts;
                    if (this._rts === t) return this;
                    var i = this.parent && this._ts ? D(this.parent._time, this) : this._tTime;
                    return (
                        (this._rts = +t || 0),
                        (this._ts = this._ps || t === -eD ? 0 : this._rts),
                        (function e(t) {
                            for (var i = t.parent; i && i.parent; ) (i._dirty = 1), i.totalDuration(), (i = i.parent);
                            return t;
                        })(this.totalTime(ti(0, this._tDur, i), !0))
                    );
                }),
                (t_.paused = function e(t) {
                    return arguments.length
                        ? (this._ps !== t &&
                              ((this._ps = t)
                                  ? ((this._pTime = this._tTime || Math.max(-this._delay, this.rawTime())),
                                    (this._ts = this._act = 0))
                                  : (tp(),
                                    (this._ts = this._rts),
                                    this.totalTime(
                                        this.parent && !this.parent.smoothChildTiming
                                            ? this.rawTime()
                                            : this._tTime || this._pTime,
                                        1 === this.progress() && (this._tTime -= eD) && Math.abs(this._zTime) !== eD
                                    ))),
                          this)
                        : this._ps;
                }),
                (t_.startTime = function e(t) {
                    if (arguments.length) {
                        this._start = t;
                        var i = this.parent || this._dp;
                        return i && (i._sort || !this.parent) && V(i, this, t - this._delay), this;
                    }
                    return this._start;
                }),
                (t_.endTime = function e(t) {
                    return this._start + (o(t) ? this.totalDuration() : this.duration()) / Math.abs(this._ts);
                }),
                (t_.rawTime = function e(t) {
                    var i = this.parent || this._dp;
                    return i
                        ? t && (!this._ts || (this._repeat && this._time && 1 > this.totalProgress()))
                            ? this._tTime % (this._dur + this._rDelay)
                            : this._ts
                              ? D(i.rawTime(t), this)
                              : this._tTime
                        : this._tTime;
                }),
                (t_.repeat = function e(t) {
                    return arguments.length ? ((this._repeat = t), H(this)) : this._repeat;
                }),
                (t_.repeatDelay = function e(t) {
                    return arguments.length ? ((this._rDelay = t), H(this)) : this._rDelay;
                }),
                (t_.yoyo = function e(t) {
                    return arguments.length ? ((this._yoyo = t), this) : this._yoyo;
                }),
                (t_.seek = function e(t, i) {
                    return this.totalTime(q(this, t), o(i));
                }),
                (t_.restart = function e(t, i) {
                    return this.play().totalTime(t ? -this._delay : 0, o(i));
                }),
                (t_.play = function e(t, i) {
                    return null != t && this.seek(t, i), this.reversed(!1).paused(!1);
                }),
                (t_.reverse = function e(t, i) {
                    return null != t && this.seek(t || this.totalDuration(), i), this.reversed(!0).paused(!1);
                }),
                (t_.pause = function e(t, i) {
                    return null != t && this.seek(t, i), this.paused(!0);
                }),
                (t_.resume = function e() {
                    return this.paused(!1);
                }),
                (t_.reversed = function e(t) {
                    return arguments.length
                        ? (!!t !== this.reversed() && this.timeScale(-this._rts || (t ? -eD : 0)), this)
                        : this._rts < 0;
                }),
                (t_.invalidate = function e() {
                    return (this._initted = 0), (this._zTime = -eD), this;
                }),
                (t_.isActive = function e(t) {
                    var i,
                        n = this.parent || this._dp,
                        s = this._start;
                    return !(
                        n &&
                        !(
                            this._ts &&
                            (this._initted || !t) &&
                            n.isActive(t) &&
                            (i = n.rawTime(!0)) >= s &&
                            i < this.endTime(!0) - eD
                        )
                    );
                }),
                (t_.eventCallback = function e(t, i, n) {
                    var s = this.vars;
                    return 1 < arguments.length
                        ? (i
                              ? ((s[t] = i), n && (s[t + "Params"] = n), "onUpdate" === t && (this._onUpdate = i))
                              : delete s[t],
                          this)
                        : s[t];
                }),
                (t_.then = function e(t) {
                    var i = this;
                    return new Promise(function (e) {
                        function n() {
                            var t = i.then;
                            (i.then = null),
                                s(r) && (r = r(i)) && (r.then || r === i) && (i.then = t),
                                e(r),
                                (i.then = t);
                        }
                        var r = s(t) ? t : T;
                        (i._initted && 1 === i.totalProgress() && 0 <= i._ts) || (!i._tTime && i._ts < 0)
                            ? n()
                            : (i._prom = n);
                    });
                }),
                (t_.kill = function e() {
                    ei(this);
                }),
                tw);
        function tw(e, t) {
            var i = e.parent || eh;
            (this.vars = e),
                (this._delay = +e.delay || 0),
                (this._repeat = e.repeat || 0) &&
                    ((this._rDelay = e.repeatDelay || 0), (this._yoyo = !!e.yoyo || !!e.yoyoEase)),
                (this._ts = 1),
                R(this, +e.duration, 1),
                (this.data = e.data),
                eb || tu.wake(),
                i && V(i, this, t || 0 === t ? t : i._time, 1),
                e.reversed && this.reverse(),
                e.paused && this.paused(!0);
        }
        C(tx.prototype, {
            _time: 0,
            _start: 0,
            _end: 0,
            _tTime: 0,
            _tDur: 0,
            _dirty: 0,
            _repeat: 0,
            _yoyo: !1,
            parent: null,
            _initted: !1,
            _rDelay: 0,
            _ts: 1,
            _dp: 0,
            ratio: 0,
            _zTime: -eD,
            _prom: 0,
            _ps: !1,
            _rts: 1,
        });
        var tS = (function (e) {
            function a(t, n) {
                var s;
                return (
                    void 0 === t && (t = {}),
                    ((s = e.call(this, t, n) || this).labels = {}),
                    (s.smoothChildTiming = !!t.smoothChildTiming),
                    (s.autoRemoveChildren = !!t.autoRemoveChildren),
                    (s._sort = o(t.sortChildren)),
                    s.parent && B(s.parent, i(s)),
                    t.scrollTrigger && X(i(s), t.scrollTrigger),
                    s
                );
            }
            t(a, e);
            var l = a.prototype;
            return (
                (l.to = function e(t, i, n, s) {
                    return new tA(t, x(arguments, 0, this), q(this, r(i) ? s : n)), this;
                }),
                (l.from = function e(t, i, n, s) {
                    return new tA(t, x(arguments, 1, this), q(this, r(i) ? s : n)), this;
                }),
                (l.fromTo = function e(t, i, n, s, a) {
                    return new tA(t, x(arguments, 2, this), q(this, r(i) ? a : s)), this;
                }),
                (l.set = function e(t, i, n) {
                    return (
                        (i.duration = 0),
                        (i.parent = this),
                        z(i).repeatDelay || (i.repeat = 0),
                        (i.immediateRender = !!i.immediateRender),
                        new tA(t, i, q(this, n), 1),
                        this
                    );
                }),
                (l.call = function e(t, i, n) {
                    return V(this, tA.delayedCall(0, t, i), q(this, n));
                }),
                (l.staggerTo = function e(t, i, n, s, r, a, l) {
                    return (
                        (n.duration = i),
                        (n.stagger = n.stagger || s),
                        (n.onComplete = a),
                        (n.onCompleteParams = l),
                        (n.parent = this),
                        new tA(t, n, q(this, r)),
                        this
                    );
                }),
                (l.staggerFrom = function e(t, i, n, s, r, a, l) {
                    return (
                        (n.runBackwards = 1),
                        (z(n).immediateRender = o(n.immediateRender)),
                        this.staggerTo(t, i, n, s, r, a, l)
                    );
                }),
                (l.staggerFromTo = function e(t, i, n, s, r, a, l, d) {
                    return (
                        (s.startAt = n),
                        (z(s).immediateRender = o(s.immediateRender)),
                        this.staggerTo(t, i, s, r, a, l, d)
                    );
                }),
                (l.render = function e(t, i, n) {
                    var s,
                        r,
                        a,
                        l,
                        o,
                        d,
                        c,
                        u,
                        p,
                        h,
                        f,
                        m,
                        g = this._time,
                        $ = this._dirty ? this.totalDuration() : this._tDur,
                        v = this._dur,
                        y = this !== eh && $ - eD < t && 0 <= t ? $ : t < eD ? 0 : t,
                        b = this._zTime < 0 != t < 0 && (this._initted || !v);
                    if (y !== this._tTime || n || b) {
                        if (
                            (g !== this._time && v && ((y += this._time - g), (t += this._time - g)),
                            (s = y),
                            (p = this._start),
                            (d = !(u = this._ts)),
                            b && (v || (g = this._zTime), (!t && i) || (this._zTime = t)),
                            this._repeat &&
                                ((f = this._yoyo),
                                (o = v + this._rDelay),
                                (v < (s = _(y % o)) || $ === y) && (s = v),
                                (l = ~~(y / o)) && l === y / o && ((s = v), l--),
                                (h = te(this._tTime, o)),
                                !g && this._tTime && h !== l && (h = l),
                                f && 1 & l && ((s = v - s), (m = 1)),
                                l !== h && !this._lock))
                        ) {
                            var x = f && 1 & h,
                                w = x === (f && 1 & l);
                            if (
                                (l < h && (x = !x),
                                (g = x ? 0 : v),
                                (this._lock = 1),
                                (this.render(g || (m ? 0 : _(l * o)), i, !v)._lock = 0),
                                !i && this.parent && ta(this, "onRepeat"),
                                this.vars.repeatRefresh && !m && (this.invalidate()._lock = 1),
                                g !== this._time ||
                                    !this._ts != d ||
                                    (w &&
                                        ((this._lock = 2),
                                        (g = x ? v + 1e-4 : -0.0001),
                                        this.render(g, !0),
                                        this.vars.repeatRefresh && !m && this.invalidate()),
                                    (this._lock = 0),
                                    !this._ts && !d))
                            )
                                return this;
                            eo(this, m);
                        }
                        if (
                            (this._hasPause &&
                                !this._forcing &&
                                this._lock < 2 &&
                                (c = (function e(t, i, n) {
                                    var s;
                                    if (i < n)
                                        for (s = t._first; s && s._start <= n; ) {
                                            if (!s._dur && "isPause" === s.data && s._start > i) return s;
                                            s = s._next;
                                        }
                                    else
                                        for (s = t._last; s && s._start >= n; ) {
                                            if (!s._dur && "isPause" === s.data && s._start < i) return s;
                                            s = s._prev;
                                        }
                                })(this, _(g), _(s))) &&
                                (y -= s - (s = c._start)),
                            (this._tTime = y),
                            (this._time = s),
                            (this._act = !u),
                            this._initted ||
                                ((this._onUpdate = this.vars.onUpdate), (this._initted = 1), (this._zTime = t)),
                            g || !s || i || ta(this, "onStart"),
                            g <= s && 0 <= t)
                        )
                            for (r = this._first; r; ) {
                                if (((a = r._next), (r._act || s >= r._start) && r._ts && c !== r)) {
                                    if (r.parent !== this) return this.render(t, i, n);
                                    if (
                                        (r.render(
                                            0 < r._ts
                                                ? (s - r._start) * r._ts
                                                : (r._dirty ? r.totalDuration() : r._tDur) + (s - r._start) * r._ts,
                                            i,
                                            n
                                        ),
                                        s !== this._time || (!this._ts && !d))
                                    ) {
                                        (c = 0), a && (y += this._zTime = -eD);
                                        break;
                                    }
                                }
                                r = a;
                            }
                        else {
                            r = this._last;
                            for (var S = t < 0 ? t : s; r; ) {
                                if (((a = r._prev), (r._act || S <= r._end) && r._ts && c !== r)) {
                                    if (r.parent !== this) return this.render(t, i, n);
                                    if (
                                        (r.render(
                                            0 < r._ts
                                                ? (S - r._start) * r._ts
                                                : (r._dirty ? r.totalDuration() : r._tDur) + (S - r._start) * r._ts,
                                            i,
                                            n
                                        ),
                                        s !== this._time || (!this._ts && !d))
                                    ) {
                                        (c = 0), a && (y += this._zTime = S ? -eD : eD);
                                        break;
                                    }
                                }
                                r = a;
                            }
                        }
                        if (c && !i && (this.pause(), (c.render(g <= s ? 0 : -eD)._zTime = g <= s ? 1 : -1), this._ts))
                            return (this._start = p), N(this), this.render(t, i, n);
                        this._onUpdate && !i && ta(this, "onUpdate", !0),
                            ((y === $ && $ >= this.totalDuration()) || (!y && g)) &&
                                ((p !== this._start && Math.abs(u) === Math.abs(this._ts)) ||
                                    this._lock ||
                                    ((t || !v) && ((y === $ && 0 < this._ts) || (!y && this._ts < 0)) && O(this, 1),
                                    i ||
                                        (t < 0 && !g) ||
                                        (!y && !g) ||
                                        (ta(this, y === $ ? "onComplete" : "onReverseComplete", !0),
                                        !this._prom || (y < $ && 0 < this.timeScale()) || this._prom())));
                    }
                    return this;
                }),
                (l.add = function e(t, i) {
                    var a = this;
                    if ((r(i) || (i = q(this, i)), !(t instanceof tx))) {
                        if (eY(t))
                            return (
                                t.forEach(function (e) {
                                    return a.add(e, i);
                                }),
                                M(this)
                            );
                        if (n(t)) return this.addLabel(t, i);
                        if (!s(t)) return this;
                        t = tA.delayedCall(0, t);
                    }
                    return this !== t ? V(this, t, i) : this;
                }),
                (l.getChildren = function e(t, i, n, s) {
                    void 0 === t && (t = !0),
                        void 0 === i && (i = !0),
                        void 0 === n && (n = !0),
                        void 0 === s && (s = -eI);
                    for (var r = [], a = this._first; a; )
                        a._start >= s &&
                            (a instanceof tA
                                ? i && r.push(a)
                                : (n && r.push(a), t && r.push.apply(r, a.getChildren(!0, i, n)))),
                            (a = a._next);
                    return r;
                }),
                (l.getById = function e(t) {
                    for (var i = this.getChildren(1, 1, 1), n = i.length; n--; ) if (i[n].vars.id === t) return i[n];
                }),
                (l.remove = function e(t) {
                    return n(t)
                        ? this.removeLabel(t)
                        : s(t)
                          ? this.killTweensOf(t)
                          : (L(this, t), t === this._recent && (this._recent = this._last), M(this));
                }),
                (l.totalTime = function t(i, n) {
                    return arguments.length
                        ? ((this._forcing = 1),
                          this.parent ||
                              this._dp ||
                              !this._ts ||
                              (this._start = _(
                                  tu.time - (0 < this._ts ? i / this._ts : -((this.totalDuration() - i) / this._ts))
                              )),
                          e.prototype.totalTime.call(this, i, n),
                          (this._forcing = 0),
                          this)
                        : this._tTime;
                }),
                (l.addLabel = function e(t, i) {
                    return (this.labels[t] = q(this, i)), this;
                }),
                (l.removeLabel = function e(t) {
                    return delete this.labels[t], this;
                }),
                (l.addPause = function e(t, i, n) {
                    var s = tA.delayedCall(0, i || m, n);
                    return (s.data = "isPause"), (this._hasPause = 1), V(this, s, q(this, t));
                }),
                (l.removePause = function e(t) {
                    var i = this._first;
                    for (t = q(this, t); i; ) i._start === t && "isPause" === i.data && O(i), (i = i._next);
                }),
                (l.killTweensOf = function e(t, i, n) {
                    for (var s = this.getTweensOf(t, n), r = s.length; r--; ) tT !== s[r] && s[r].kill(t, i);
                    return this;
                }),
                (l.getTweensOf = function e(t, i) {
                    for (var n, s = [], r = ts(t), a = this._first; a; )
                        a instanceof tA
                            ? b(a._targets, r) && (!i || a.isActive("started" === i)) && s.push(a)
                            : (n = a.getTweensOf(r, i)).length && s.push.apply(s, n),
                            (a = a._next);
                    return s;
                }),
                (l.tweenTo = function e(t, i) {
                    i = i || {};
                    var n = this,
                        s = q(n, t),
                        r = i.startAt,
                        a = i.onStart,
                        l = i.onStartParams,
                        o = tA.to(
                            n,
                            C(i, {
                                ease: "none",
                                lazy: !1,
                                time: s,
                                duration:
                                    i.duration ||
                                    Math.abs((s - (r && "time" in r ? r.time : n._time)) / n.timeScale()) ||
                                    eD,
                                onStart: function e() {
                                    n.pause();
                                    var t = i.duration || Math.abs((s - n._time) / n.timeScale());
                                    o._dur !== t && R(o, t).render(o._time, !0, !0), a && a.apply(o, l || []);
                                },
                            })
                        );
                    return o;
                }),
                (l.tweenFromTo = function e(t, i, n) {
                    return this.tweenTo(i, C({ startAt: { time: q(this, t) } }, n));
                }),
                (l.recent = function e() {
                    return this._recent;
                }),
                (l.nextLabel = function e(t) {
                    return void 0 === t && (t = this._time), et(this, q(this, t));
                }),
                (l.previousLabel = function e(t) {
                    return void 0 === t && (t = this._time), et(this, q(this, t), 1);
                }),
                (l.currentLabel = function e(t) {
                    return arguments.length ? this.seek(t, !0) : this.previousLabel(this._time + eD);
                }),
                (l.shiftChildren = function e(t, i, n) {
                    void 0 === n && (n = 0);
                    for (var s, r = this._first, a = this.labels; r; ) r._start >= n && (r._start += t), (r = r._next);
                    if (i) for (s in a) a[s] >= n && (a[s] += t);
                    return M(this);
                }),
                (l.invalidate = function t() {
                    var i = this._first;
                    for (this._lock = 0; i; ) i.invalidate(), (i = i._next);
                    return e.prototype.invalidate.call(this);
                }),
                (l.clear = function e(t) {
                    void 0 === t && (t = !0);
                    for (var i, n = this._first; n; ) (i = n._next), this.remove(n), (n = i);
                    return (this._time = this._tTime = this._pTime = 0), t && (this.labels = {}), M(this);
                }),
                (l.totalDuration = function e(t) {
                    var i,
                        n,
                        s,
                        r,
                        a = 0,
                        l = this,
                        o = l._last,
                        d = eI;
                    if (arguments.length)
                        return l.timeScale(
                            (l._repeat < 0 ? l.duration() : l.totalDuration()) / (l.reversed() ? -t : t)
                        );
                    if (l._dirty) {
                        for (r = l.parent; o; )
                            (i = o._prev),
                                o._dirty && o.totalDuration(),
                                d < (s = o._start) && l._sort && o._ts && !l._lock
                                    ? ((l._lock = 1), (V(l, o, s - o._delay, 1)._lock = 0))
                                    : (d = s),
                                s < 0 &&
                                    o._ts &&
                                    ((a -= s),
                                    ((!r && !l._dp) || (r && r.smoothChildTiming)) &&
                                        ((l._start += s / l._ts), (l._time -= s), (l._tTime -= s)),
                                    l.shiftChildren(-s, !1, -1 / 0),
                                    (d = 0)),
                                a < (n = N(o)) && o._ts && (a = n),
                                (o = i);
                        R(l, l === eh && l._time > a ? l._time : a, 1), (l._dirty = 0);
                    }
                    return l._tDur;
                }),
                (a.updateRoot = function e(t) {
                    if ((eh._ts && (S(eh, D(t, eh)), (ey = tu.frame)), tu.frame >= eZ)) {
                        eZ += e0.autoSleep || 120;
                        var i = eh._first;
                        if ((!i || !i._ts) && e0.autoSleep && tu._listeners.length < 2) {
                            for (; i && !i._ts; ) i = i._next;
                            i || tu.sleep();
                        }
                    }
                }),
                a
            );
        })(tx);
        function tE(e, t, i, r, a, o) {
            var d, c, u, p;
            if (
                e4[e] &&
                !1 !==
                    (d = new e4[e]()).init(
                        a,
                        d.rawVars
                            ? t[e]
                            : (function e(t, i, r, a, o) {
                                  if ((s(t) && (t = tk(t, o, i, r, a)), !l(t) || (t.style && t.nodeType) || eY(t)))
                                      return n(t) ? tk(t, o, i, r, a) : t;
                                  var d,
                                      c = {};
                                  for (d in t) c[d] = tk(t[d], o, i, r, a);
                                  return c;
                              })(t[e], r, a, o, i),
                        i,
                        r,
                        o
                    ) &&
                ((i._pt = c = new tY(i._pt, a, e, 0, 1, d.render, d, 0, d.priority)), i !== e_)
            )
                for (u = i._ptLookup[i._targets.indexOf(a)], p = d._props.length; p--; ) u[d._props[p]] = c;
            return d;
        }
        C(tS.prototype, { _lock: 0, _hasPause: 0, _forcing: 0 });
        var tT,
            t8 = function e(t, i, r, a, l, o, d, c, u) {
                s(a) && (a = a(l || 0, t, o));
                var h,
                    f = t[i],
                    m =
                        "get" !== r
                            ? r
                            : s(f)
                              ? u
                                  ? t[i.indexOf("set") || !s(t["get" + i.substr(3)]) ? i : "get" + i.substr(3)](u)
                                  : t[i]()
                              : f,
                    g = s(f) ? (u ? tM : t0) : tO;
                if (
                    (n(a) &&
                        (~a.indexOf("random(") && (a = ee(a)),
                        "=" === a.charAt(1) &&
                            (a =
                                parseFloat(m) +
                                parseFloat(a.substr(2)) * ("-" === a.charAt(0) ? -1 : 1) +
                                (W(m) || 0))),
                    m !== a)
                )
                    return isNaN(m + a)
                        ? (f || i in t || p(i, a),
                          function e(t, i, n, s, r, a, l) {
                              var o,
                                  d,
                                  c,
                                  u,
                                  p,
                                  h,
                                  f,
                                  m,
                                  g = new tY(this._pt, t, i, 0, 1, t1, null, r),
                                  $ = 0,
                                  v = 0;
                              for (
                                  g.b = n,
                                      g.e = s,
                                      n += "",
                                      (f = ~(s += "").indexOf("random(")) && (s = ee(s)),
                                      a && (a((m = [n, s]), t, i), (n = m[0]), (s = m[1])),
                                      d = n.match(eG) || [];
                                  (o = eG.exec(s));

                              )
                                  (u = o[0]),
                                      (p = s.substring($, o.index)),
                                      c ? (c = (c + 1) % 5) : "rgba(" === p.substr(-5) && (c = 1),
                                      u !== d[v++] &&
                                          ((h = parseFloat(d[v - 1]) || 0),
                                          (g._pt = {
                                              _next: g._pt,
                                              p: p || 1 === v ? p : ",",
                                              s: h,
                                              c:
                                                  "=" === u.charAt(1)
                                                      ? parseFloat(u.substr(2)) * ("-" === u.charAt(0) ? -1 : 1)
                                                      : parseFloat(u) - h,
                                              m: c && c < 4 ? Math.round : 0,
                                          }),
                                          ($ = eG.lastIndex));
                              return (
                                  (g.c = $ < s.length ? s.substring($, s.length) : ""),
                                  (g.fp = l),
                                  (e7.test(s) || f) && (g.e = 0),
                                  (this._pt = g)
                              );
                          }.call(this, t, i, m, a, g, c || e0.stringFilter, u))
                        : ((h = new tY(this._pt, t, i, +m || 0, a - (m || 0), "boolean" == typeof f ? tN : tD, 0, g)),
                          u && (h.fp = u),
                          d && h.modifier(d, this, t),
                          (this._pt = h));
            },
            tC = function e(t, i) {
                var n,
                    s,
                    r,
                    a,
                    l,
                    d,
                    c,
                    u,
                    p,
                    h,
                    f,
                    m,
                    v = t.vars,
                    y = v.ease,
                    _ = v.startAt,
                    b = v.immediateRender,
                    x = v.lazy,
                    S = v.onUpdate,
                    E = v.onUpdateParams,
                    T = v.callbackScope,
                    k = v.runBackwards,
                    P = v.yoyoEase,
                    z = v.keyframes,
                    L = v.autoRevert,
                    M = t._dur,
                    I = t._startAt,
                    D = t._targets,
                    N = t.parent,
                    B = N && "nested" === N.data ? N.parent._targets : D,
                    V = "auto" === t._overwrite,
                    X = t.timeline;
                if (
                    (!X || (z && y) || (y = "none"),
                    (t._ease = t$(y, eM.ease)),
                    (t._yEase = P ? tg(t$(!0 === P ? y : P, eM.ease)) : 0),
                    P && t._yoyo && !t._repeat && ((P = t._yEase), (t._yEase = t._ease), (t._ease = P)),
                    !X)
                ) {
                    if (
                        ((m = (u = D[0] ? $(D[0]).harness : 0) && v[u.prop]),
                        (n = A(v, e5)),
                        I && I.render(-1, !0).kill(),
                        _)
                    ) {
                        if (
                            (O(
                                (t._startAt = tA.set(
                                    D,
                                    C(
                                        {
                                            data: "isStart",
                                            overwrite: !1,
                                            parent: N,
                                            immediateRender: !0,
                                            lazy: o(x),
                                            startAt: null,
                                            delay: 0,
                                            onUpdate: S,
                                            onUpdateParams: E,
                                            callbackScope: T,
                                            stagger: 0,
                                        },
                                        _
                                    )
                                ))
                            ),
                            b)
                        ) {
                            if (0 < i) L || (t._startAt = 0);
                            else if (M) return;
                        }
                    } else if (k && M) {
                        if (I) L || (t._startAt = 0);
                        else if (
                            (i && (b = !1),
                            (r = C(
                                {
                                    overwrite: !1,
                                    data: "isFromStart",
                                    lazy: b && o(x),
                                    immediateRender: b,
                                    stagger: 0,
                                    parent: N,
                                },
                                n
                            )),
                            m && (r[u.prop] = m),
                            O((t._startAt = tA.set(D, r))),
                            b)
                        ) {
                            if (!i) return;
                        } else e(t._startAt, eD);
                    }
                    for (t._pt = 0, x = (M && o(x)) || (x && !M), s = 0; s < D.length; s++) {
                        if (
                            ((c = (l = D[s])._gsap || g(D)[s]._gsap),
                            (t._ptLookup[s] = h = {}),
                            ej[c.id] && w(),
                            (f = B === D ? s : B.indexOf(l)),
                            u &&
                                !1 !== (p = new u()).init(l, m || n, t, f, B) &&
                                ((t._pt = a = new tY(t._pt, l, p.name, 0, 1, p.render, p, 0, p.priority)),
                                p._props.forEach(function (e) {
                                    h[e] = a;
                                }),
                                p.priority && (d = 1)),
                            !u || m)
                        )
                            for (r in n)
                                e4[r] && (p = tE(r, n, t, f, l, B))
                                    ? p.priority && (d = 1)
                                    : (h[r] = a = t8.call(t, l, r, "get", n[r], f, B, 0, v.stringFilter));
                        t._op && t._op[s] && t.kill(l, t._op[s]),
                            V && t._pt && ((tT = t), eh.killTweensOf(l, h, "started"), (tT = 0)),
                            t._pt && x && (ej[c.id] = 1);
                    }
                    d && tX(t), t._onInit && t._onInit(t);
                }
                (t._from = !X && !!v.runBackwards), (t._onUpdate = S), (t._initted = !!t.parent);
            },
            tk = function e(t, i, r, a, l) {
                return s(t) ? t.call(i, r, a, l) : n(t) && ~t.indexOf("random(") ? ee(t) : t;
            },
            t9 = eK + "repeat,repeatDelay,yoyo,repeatRefresh,yoyoEase",
            tP = (t9 + ",id,stagger,delay,duration,paused,scrollTrigger").split(","),
            tA = (function (e) {
                function s(t, n, s, a) {
                    "number" == typeof n && ((s.duration = n), (n = s), (s = null));
                    var d,
                        u,
                        p,
                        f,
                        $,
                        v,
                        y,
                        b,
                        x,
                        w = (d = e.call(this, a ? n : z(n), s) || this).vars,
                        S = w.duration,
                        E = w.delay,
                        T = w.immediateRender,
                        k = w.stagger,
                        P = w.overwrite,
                        A = w.keyframes,
                        L = w.defaults,
                        O = w.scrollTrigger,
                        M = w.yoyoEase,
                        I = d.parent,
                        D = (eY(t) ? r(t[0]) : "length" in n) ? [t] : ts(t);
                    if (
                        ((d._targets = D.length
                            ? g(D)
                            : h("GSAP target " + t + " not found. https://greensock.com", !e0.nullTargetWarn) || []),
                        (d._ptLookup = []),
                        (d._overwrite = P),
                        A || k || c(S) || c(E))
                    ) {
                        if (
                            ((n = d.vars),
                            (u = d.timeline = new tS({ data: "nested", defaults: L || {} })).kill(),
                            (u.parent = i(d)),
                            A)
                        )
                            C(u.vars.defaults, { ease: "none" }),
                                A.forEach(function (e) {
                                    return u.to(D, e, ">");
                                });
                        else {
                            if ((($ = D.length), (b = k ? U(k) : m), l(k)))
                                for (v in k) ~t9.indexOf(v) && ((x = x || {})[v] = k[v]);
                            for (p = 0; p < $; p++) {
                                for (v in ((f = {}), n)) 0 > tP.indexOf(v) && (f[v] = n[v]);
                                (f.stagger = 0),
                                    M && (f.yoyoEase = M),
                                    x && eJ(f, x),
                                    (y = D[p]),
                                    (f.duration = +tk(S, i(d), p, y, D)),
                                    (f.delay = (+tk(E, i(d), p, y, D) || 0) - d._delay),
                                    !k &&
                                        1 === $ &&
                                        f.delay &&
                                        ((d._delay = E = f.delay), (d._start += E), (f.delay = 0)),
                                    u.to(y, f, b(p, y, D));
                            }
                            u.duration() ? (S = E = 0) : (d.timeline = 0);
                        }
                        S || d.duration((S = u.duration()));
                    } else d.timeline = 0;
                    return (
                        !0 === P && ((tT = i(d)), eh.killTweensOf(D), (tT = 0)),
                        I && B(I, i(d)),
                        (T ||
                            (!S &&
                                !A &&
                                d._start === _(I._time) &&
                                o(T) &&
                                (function e(t) {
                                    return !t || (t._ts && e(t.parent));
                                })(i(d)) &&
                                "nested" !== I.data)) &&
                            ((d._tTime = -eD), d.render(Math.max(0, -E))),
                        O && X(i(d), O),
                        d
                    );
                }
                t(s, e);
                var a = s.prototype;
                return (
                    (a.render = function e(t, i, n) {
                        var s,
                            r,
                            a,
                            l,
                            o,
                            d,
                            c,
                            u,
                            p,
                            h = this._time,
                            f = this._tDur,
                            m = this._dur,
                            g = f - eD < t && 0 <= t ? f : t < eD ? 0 : t;
                        if (m) {
                            if (g !== this._tTime || !t || n || (this._startAt && this._zTime < 0 != t < 0)) {
                                if (((s = g), (u = this.timeline), this._repeat)) {
                                    if (
                                        ((l = m + this._rDelay),
                                        (m < (s = _(g % l)) || f === g) && (s = m),
                                        (a = ~~(g / l)) && a === g / l && ((s = m), a--),
                                        (d = this._yoyo && 1 & a) && ((p = this._yEase), (s = m - s)),
                                        (o = te(this._tTime, l)),
                                        s === h && !n && this._initted)
                                    )
                                        return this;
                                    a !== o &&
                                        (u && this._yEase && eo(u, d),
                                        !this.vars.repeatRefresh ||
                                            d ||
                                            this._lock ||
                                            ((this._lock = n = 1), (this.render(_(l * a), !0).invalidate()._lock = 0)));
                                }
                                if (!this._initted) {
                                    if (Y(this, s, n, i)) return (this._tTime = 0), this;
                                    if (m !== this._dur) return this.render(t, i, n);
                                }
                                for (
                                    this._tTime = g,
                                        this._time = s,
                                        !this._act && this._ts && ((this._act = 1), (this._lazy = 0)),
                                        this.ratio = c = (p || this._ease)(s / m),
                                        this._from && (this.ratio = c = 1 - c),
                                        !s || h || i || ta(this, "onStart"),
                                        r = this._pt;
                                    r;

                                )
                                    r.r(c, r.d), (r = r._next);
                                (u && u.render(t < 0 ? t : !s && d ? -eD : u._dur * c, i, n)) ||
                                    (this._startAt && (this._zTime = t)),
                                    this._onUpdate &&
                                        !i &&
                                        (t < 0 && this._startAt && this._startAt.render(t, !0, n),
                                        ta(this, "onUpdate")),
                                    this._repeat &&
                                        a !== o &&
                                        this.vars.onRepeat &&
                                        !i &&
                                        this.parent &&
                                        ta(this, "onRepeat"),
                                    (g !== this._tDur && g) ||
                                        this._tTime !== g ||
                                        (t < 0 && this._startAt && !this._onUpdate && this._startAt.render(t, !0, !0),
                                        (t || !m) &&
                                            ((g === this._tDur && 0 < this._ts) || (!g && this._ts < 0)) &&
                                            O(this, 1),
                                        i ||
                                            (t < 0 && !h) ||
                                            (!g && !h) ||
                                            (ta(this, g === f ? "onComplete" : "onReverseComplete", !0),
                                            !this._prom || (g < f && 0 < this.timeScale()) || this._prom()));
                            }
                        } else
                            !(function e(t, i, n, s) {
                                var r,
                                    a,
                                    l = t.ratio,
                                    o =
                                        i < 0 ||
                                        (!i && l && !t._start && t._zTime > eD && !t._dp._lock) ||
                                        t._ts < 0 ||
                                        t._dp._ts < 0
                                            ? 0
                                            : 1,
                                    d = t._rDelay,
                                    c = 0;
                                if (
                                    (d &&
                                        t._repeat &&
                                        ((c = ti(0, t._tDur, i)),
                                        te(c, d) !== (a = te(t._tTime, d)) &&
                                            ((l = 1 - o), t.vars.repeatRefresh && t._initted && t.invalidate())),
                                    t._initted || !Y(t, i, s, n))
                                ) {
                                    if (o !== l || s || t._zTime === eD || (!i && t._zTime)) {
                                        for (
                                            a = t._zTime,
                                                t._zTime = i || (n ? eD : 0),
                                                n = n || (i && !a),
                                                t.ratio = o,
                                                t._from && (o = 1 - o),
                                                t._time = 0,
                                                t._tTime = c,
                                                n || ta(t, "onStart"),
                                                r = t._pt;
                                            r;

                                        )
                                            r.r(o, r.d), (r = r._next);
                                        t._startAt && i < 0 && t._startAt.render(i, !0, !0),
                                            t._onUpdate && !n && ta(t, "onUpdate"),
                                            c && t._repeat && !n && t.parent && ta(t, "onRepeat"),
                                            (i >= t._tDur || i < 0) &&
                                                t.ratio === o &&
                                                (o && O(t, 1),
                                                n ||
                                                    (ta(t, o ? "onComplete" : "onReverseComplete", !0),
                                                    t._prom && t._prom()));
                                    } else t._zTime || (t._zTime = i);
                                }
                            })(this, t, i, n);
                        return this;
                    }),
                    (a.targets = function e() {
                        return this._targets;
                    }),
                    (a.invalidate = function t() {
                        return (
                            (this._pt = this._op = this._startAt = this._onUpdate = this._act = this._lazy = 0),
                            (this._ptLookup = []),
                            this.timeline && this.timeline.invalidate(),
                            e.prototype.invalidate.call(this)
                        );
                    }),
                    (a.kill = function e(t, i) {
                        if (
                            (void 0 === i && (i = "all"), !(t || (i && "all" !== i)) && ((this._lazy = 0), this.parent))
                        )
                            return ei(this);
                        if (this.timeline) {
                            var s = this.timeline.totalDuration();
                            return (
                                this.timeline.killTweensOf(t, i, tT && !0 !== tT.vars.overwrite)._first || ei(this),
                                this.parent &&
                                    s !== this.timeline.totalDuration() &&
                                    R(this, (this._dur * this.timeline._tDur) / s),
                                this
                            );
                        }
                        var r,
                            a,
                            l,
                            o,
                            d,
                            c,
                            u,
                            p = this._targets,
                            h = t ? ts(t) : p,
                            f = this._ptLookup,
                            m = this._pt;
                        if (
                            (!i || "all" === i) &&
                            (function e(t, i) {
                                for (var n = t.length, s = n === i.length; s && n-- && t[n] === i[n]; );
                                return n < 0;
                            })(p, h)
                        )
                            return ei(this);
                        for (
                            r = this._op = this._op || [],
                                "all" !== i &&
                                    (n(i) &&
                                        ((d = {}),
                                        y(i, function (e) {
                                            return (d[e] = 1);
                                        }),
                                        (i = d)),
                                    (i = (function e(t, i) {
                                        var n,
                                            s,
                                            r,
                                            a,
                                            l = t[0] ? $(t[0]).harness : 0,
                                            o = l && l.aliases;
                                        if (!o) return i;
                                        for (s in ((n = eJ({}, i)), o))
                                            if ((s in n)) for (r = (a = o[s].split(",")).length; r--; ) n[a[r]] = n[s];
                                        return n;
                                    })(p, i))),
                                u = p.length;
                            u--;

                        )
                            if (~h.indexOf(p[u]))
                                for (d in ((a = f[u]),
                                "all" === i ? ((r[u] = i), (o = a), (l = {})) : ((l = r[u] = r[u] || {}), (o = i)),
                                o))
                                    (c = a && a[d]) &&
                                        (("kill" in c.d && !0 !== c.d.kill(d)) || L(this, c, "_pt"), delete a[d]),
                                        "all" !== l && (l[d] = 1);
                        return this._initted && !this._pt && m && ei(this), this;
                    }),
                    (s.to = function e(t, i, n) {
                        return new s(t, i, n);
                    }),
                    (s.from = function e(t, i) {
                        return new s(t, x(arguments, 1));
                    }),
                    (s.delayedCall = function e(t, i, n, r) {
                        return new s(i, 0, {
                            immediateRender: !1,
                            lazy: !1,
                            overwrite: !1,
                            delay: t,
                            onComplete: i,
                            onReverseComplete: i,
                            onCompleteParams: n,
                            onReverseCompleteParams: n,
                            callbackScope: r,
                        });
                    }),
                    (s.fromTo = function e(t, i, n) {
                        return new s(t, x(arguments, 2));
                    }),
                    (s.set = function e(t, i) {
                        return (i.duration = 0), i.repeatDelay || (i.repeat = 0), new s(t, i);
                    }),
                    (s.killTweensOf = function e(t, i, n) {
                        return eh.killTweensOf(t, i, n);
                    }),
                    s
                );
            })(tx);
        function tz(e, t, i) {
            return e.setAttribute(t, i);
        }
        function tL(e, t, i, n) {
            n.mSet(e, t, n.m.call(n.tween, i, n.mt), n);
        }
        C(tA.prototype, { _targets: [], _lazy: 0, _startAt: 0, _op: 0, _onInit: 0 }),
            y("staggerTo,staggerFrom,staggerFromTo", function (e) {
                tA[e] = function () {
                    var t = new tS(),
                        i = tn.call(arguments, 0);
                    return i.splice("staggerFromTo" === e ? 5 : 4, 0, 0), t[e].apply(t, i);
                };
            });
        var tO = function e(t, i, n) {
                return (t[i] = n);
            },
            t0 = function e(t, i, n) {
                return t[i](n);
            },
            tM = function e(t, i, n, s) {
                return t[i](s.fp, n);
            },
            tI = function e(t, i) {
                return s(t[i]) ? t0 : a(t[i]) && t.setAttribute ? tz : tO;
            },
            tD = function e(t, i) {
                return i.set(i.t, i.p, Math.round(1e4 * (i.s + i.c * t)) / 1e4, i);
            },
            tN = function e(t, i) {
                return i.set(i.t, i.p, !!(i.s + i.c * t), i);
            },
            t1 = function e(t, i) {
                var n = i._pt,
                    s = "";
                if (!t && i.b) s = i.b;
                else if (1 === t && i.e) s = i.e;
                else {
                    for (; n; )
                        (s = n.p + (n.m ? n.m(n.s + n.c * t) : Math.round(1e4 * (n.s + n.c * t)) / 1e4) + s),
                            (n = n._next);
                    s += i.c;
                }
                i.set(i.t, i.p, s, i);
            },
            tB = function e(t, i) {
                for (var n = i._pt; n; ) n.r(t, n.d), (n = n._next);
            },
            t3 = function e(t, i, n, s) {
                for (var r, a = this._pt; a; ) (r = a._next), a.p === s && a.modifier(t, i, n), (a = r);
            },
            tV = function e(t) {
                for (var i, n, s = this._pt; s; )
                    (n = s._next), (s.p !== t || s.op) && s.op !== t ? s.dep || (i = 1) : L(this, s, "_pt"), (s = n);
                return !i;
            },
            tX = function e(t) {
                for (var i, n, s, r, a = t._pt; a; ) {
                    for (i = a._next, n = s; n && n.pr > a.pr; ) n = n._next;
                    (a._prev = n ? n._prev : r) ? (a._prev._next = a) : (s = a),
                        (a._next = n) ? (n._prev = a) : (r = a),
                        (a = i);
                }
                t._pt = s;
            },
            tY =
                ((tR.prototype.modifier = function e(t, i, n) {
                    (this.mSet = this.mSet || this.set), (this.set = tL), (this.m = t), (this.mt = n), (this.tween = i);
                }),
                tR);
        function tR(e, t, i, n, s, r, a, l, o) {
            (this.t = t),
                (this.s = n),
                (this.c = s),
                (this.p = i),
                (this.r = r || tD),
                (this.d = a || this),
                (this.set = l || tO),
                (this.pr = o || 0),
                (this._next = e) && (e._prev = this);
        }
        y(
            eK +
                "parent,duration,ease,delay,overwrite,runBackwards,startAt,yoyo,immediateRender,repeat,repeatDelay,data,paused,reversed,lazy,callbackScope,stringFilter,id,yoyoEase,stagger,inherit,repeatRefresh,keyframes,autoRevert,scrollTrigger",
            function (e) {
                return (e5[e] = 1);
            }
        ),
            (e2.TweenMax = e2.TweenLite = tA),
            (e2.TimelineLite = e2.TimelineMax = tS),
            (eh = new tS({
                sortChildren: !1,
                defaults: eM,
                autoRemoveChildren: !0,
                id: "root",
                smoothChildTiming: !0,
            })),
            (e0.stringFilter = el);
        var tH = {
            registerPlugin: function e() {
                for (var t = arguments.length, i = Array(t), n = 0; n < t; n++) i[n] = arguments[n];
                i.forEach(function (e) {
                    return (function e(t) {
                        var i = (t = (!t.name && t.default) || t).name,
                            n = s(t),
                            r =
                                i && !n && t.init
                                    ? function () {
                                          this._props = [];
                                      }
                                    : t,
                            a = { init: m, render: tB, add: t8, kill: tV, modifier: t3, rawVars: 0 },
                            l = { targetTest: 0, get: 0, getSetter: tI, aliases: {}, register: 0 };
                        if ((tp(), t !== r)) {
                            if (e4[i]) return;
                            C(r, C(A(t, a), l)),
                                eJ(r.prototype, eJ(a, A(t, l))),
                                (e4[(r.prop = i)] = r),
                                t.targetTest && (eQ.push(r), (e5[i] = 1)),
                                (i = ("css" === i ? "CSS" : i.charAt(0).toUpperCase() + i.substr(1)) + "Plugin");
                        }
                        f(i, r), t.register && t.register(tW, r, tY);
                    })(e);
                });
            },
            timeline: function e(t) {
                return new tS(t);
            },
            getTweensOf: function e(t, i) {
                return eh.getTweensOf(t, i);
            },
            getProperty: function e(t, i, s, r) {
                n(t) && (t = ts(t)[0]);
                var a = $(t || {}).get,
                    l = s ? T : E;
                return (
                    "native" === s && (s = ""),
                    t
                        ? i
                            ? l(((e4[i] && e4[i].get) || a)(t, i, s, r))
                            : function (e, i, n) {
                                  return l(((e4[e] && e4[e].get) || a)(t, e, i, n));
                              }
                        : t
                );
            },
            quickSetter: function e(t, i, n) {
                if (1 < (t = ts(t)).length) {
                    var s = t.map(function (e) {
                            return tW.quickSetter(e, i, n);
                        }),
                        r = s.length;
                    return function (e) {
                        for (var t = r; t--; ) s[t](e);
                    };
                }
                t = t[0] || {};
                var a = e4[i],
                    l = $(t),
                    o = (l.harness && (l.harness.aliases || {})[i]) || i,
                    d = a
                        ? function (e) {
                              var i = new a();
                              (e_._pt = 0), i.init(t, n ? e + n : e, e_, 0, [t]), i.render(1, i), e_._pt && tB(1, e_);
                          }
                        : l.set(t, o);
                return a
                    ? d
                    : function (e) {
                          return d(t, o, n ? e + n : e, l, 1);
                      };
            },
            isTweening: function e(t) {
                return 0 < eh.getTweensOf(t, !0).length;
            },
            defaults: function e(t) {
                return t && t.ease && (t.ease = t$(t.ease, eM.ease)), P(eM, t || {});
            },
            config: function e(t) {
                return P(e0, t || {});
            },
            registerEffect: function e(t) {
                var i = t.name,
                    n = t.effect,
                    s = t.plugins,
                    r = t.defaults,
                    a = t.extendTimeline;
                (s || "").split(",").forEach(function (e) {
                    return e && !e4[e] && !e2[e] && h(i + " effect requires " + e + " plugin.");
                }),
                    (eU[i] = function (e, t, i) {
                        return n(ts(e), C(t || {}, r), i);
                    }),
                    a &&
                        (tS.prototype[i] = function (e, t, n) {
                            return this.add(eU[i](e, l(t) ? t : (n = t) && {}, this), n);
                        });
            },
            registerEase: function e(t, i) {
                th[t] = t$(i);
            },
            parseEase: function e(t, i) {
                return arguments.length ? t$(t, i) : th;
            },
            getById: function e(t) {
                return eh.getById(t);
            },
            exportRoot: function e(t, i) {
                void 0 === t && (t = {});
                var n,
                    s,
                    r = new tS(t);
                for (
                    r.smoothChildTiming = o(t.smoothChildTiming),
                        eh.remove(r),
                        r._dp = 0,
                        r._time = r._tTime = eh._time,
                        n = eh._first;
                    n;

                )
                    (s = n._next),
                        (!i && !n._dur && n instanceof tA && n.vars.onComplete === n._targets[0]) ||
                            V(r, n, n._start - n._delay),
                        (n = s);
                return V(eh, r, 0), r;
            },
            utils: {
                wrap: function e(t, i, n) {
                    var s = i - t;
                    return eY(t)
                        ? J(t, e(0, t.length), i)
                        : G(n, function (e) {
                              return ((s + ((e - t) % s)) % s) + t;
                          });
                },
                wrapYoyo: function e(t, i, n) {
                    var s = i - t,
                        r = 2 * s;
                    return eY(t)
                        ? J(t, e(0, t.length - 1), i)
                        : G(n, function (e) {
                              return t + (s < (e = (r + ((e - t) % r)) % r || 0) ? r - e : e);
                          });
                },
                distribute: U,
                random: K,
                snap: Q,
                normalize: function e(t, i, n) {
                    return tr(t, i, 0, 1, n);
                },
                getUnit: W,
                clamp: function e(t, i, n) {
                    return G(n, function (e) {
                        return ti(t, i, e);
                    });
                },
                splitColor: es,
                toArray: ts,
                mapRange: tr,
                pipe: function e() {
                    for (var t = arguments.length, i = Array(t), n = 0; n < t; n++) i[n] = arguments[n];
                    return function (e) {
                        return i.reduce(function (e, t) {
                            return t(e);
                        }, e);
                    };
                },
                unitize: function e(t, i) {
                    return function (e) {
                        return t(parseFloat(e)) + (i || W(e));
                    };
                },
                interpolate: function e(t, i, s, r) {
                    var a = isNaN(t + i)
                        ? 0
                        : function (e) {
                              return (1 - e) * t + e * i;
                          };
                    if (!a) {
                        var l,
                            o,
                            d,
                            c,
                            u,
                            p = n(t),
                            h = {};
                        if ((!0 === s && (r = 1) && (s = null), p)) (t = { p: t }), (i = { p: i });
                        else if (eY(t) && !eY(i)) {
                            for (d = [], u = (c = t.length) - 2, o = 1; o < c; o++) d.push(e(t[o - 1], t[o]));
                            c--,
                                (a = function e(t) {
                                    var i = Math.min(u, ~~(t *= c));
                                    return d[i](t - i);
                                }),
                                (s = i);
                        } else r || (t = eJ(eY(t) ? [] : {}, t));
                        if (!d) {
                            for (l in i) t8.call(h, t, l, "get", i[l]);
                            a = function e(i) {
                                return tB(i, h) || (p ? t.p : t);
                            };
                        }
                    }
                    return G(s, a);
                },
                shuffle: j,
            },
            install: u,
            effects: eU,
            ticker: tu,
            updateRoot: tS.updateRoot,
            plugins: e4,
            globalTimeline: eh,
            core: {
                PropTween: tY,
                globals: f,
                Tween: tA,
                Timeline: tS,
                Animation: tx,
                getCache: $,
                _removeLinkedListItem: L,
            },
        };
        function tq(e, t) {
            for (var i = e._pt; i && i.p !== t && i.op !== t && i.fp !== t; ) i = i._next;
            return i;
        }
        function tG(e, t) {
            return {
                name: e,
                rawVars: 1,
                init: function e(i, s, r) {
                    r._onInit = function (e) {
                        var i, r;
                        if (
                            (n(s) &&
                                ((i = {}),
                                y(s, function (e) {
                                    return (i[e] = 1);
                                }),
                                (s = i)),
                            t)
                        ) {
                            for (r in ((i = {}), s)) i[r] = t(s[r]);
                            s = i;
                        }
                        !(function e(t, i) {
                            var n,
                                s,
                                r,
                                a = t._targets;
                            for (n in i)
                                for (s = a.length; s--; )
                                    (r = (r = t._ptLookup[s][n]) && r.d) &&
                                        (r._pt && (r = tq(r, n)), r && r.modifier && r.modifier(i[n], t, a[s], n));
                        })(e, s);
                    };
                },
            };
        }
        y("to,from,fromTo,delayedCall,set,killTweensOf", function (e) {
            return (tH[e] = tA[e]);
        }),
            tu.add(tS.updateRoot),
            (e_ = tH.to({}, { duration: 0 }));
        var tW =
            tH.registerPlugin(
                {
                    name: "attr",
                    init: function e(t, i, n, s, r) {
                        var a, l;
                        for (a in i)
                            (l = this.add(t, "setAttribute", (t.getAttribute(a) || 0) + "", i[a], s, r, 0, 0, a)) &&
                                (l.op = a),
                                this._props.push(a);
                    },
                },
                {
                    name: "endArray",
                    init: function e(t, i) {
                        for (var n = i.length; n--; ) this.add(t, n, t[n] || 0, i[n]);
                    },
                },
                tG("roundProps", Z),
                tG("modifiers"),
                tG("snap", Q)
            ) || tH;
        function t7(e, t) {
            return t.set(t.t, t.p, Math.round(1e4 * (t.s + t.c * e)) / 1e4 + t.u, t);
        }
        function tF(e, t) {
            return t.set(t.t, t.p, 1 === e ? t.e : Math.round(1e4 * (t.s + t.c * e)) / 1e4 + t.u, t);
        }
        function t2(e, t) {
            return t.set(t.t, t.p, e ? Math.round(1e4 * (t.s + t.c * e)) / 1e4 + t.u : t.b, t);
        }
        function t5(e, t) {
            var i = t.s + t.c * e;
            t.set(t.t, t.p, ~~(i + (i < 0 ? -0.5 : 0.5)) + t.u, t);
        }
        function t6(e, t) {
            return t.set(t.t, t.p, e ? t.e : t.b, t);
        }
        function tj(e, t) {
            return t.set(t.t, t.p, 1 !== e ? t.b : t.e, t);
        }
        function t4(e, t, i) {
            return (e.style[t] = i);
        }
        function tU(e, t, i) {
            return e.style.setProperty(t, i);
        }
        function tZ(e, t, i) {
            return (e._gsap[t] = i);
        }
        function tQ(e, t, i) {
            return (e._gsap.scaleX = e._gsap.scaleY = i);
        }
        function tK(e, t, i, n, s) {
            var r = e._gsap;
            (r.scaleX = r.scaleY = i), r.renderTransform(s, r);
        }
        function tJ(e, t, i, n, s) {
            var r = e._gsap;
            (r[t] = i), r.renderTransform(s, r);
        }
        function ie(e, t) {
            var i = iS.createElementNS
                ? iS.createElementNS((t || "http://www.w3.org/1999/xhtml").replace(/^https/, "http"), e)
                : iS.createElement(e);
            return i.style ? i : iS.createElement(e);
        }
        function it(e, t, i) {
            var n = getComputedStyle(e);
            return (
                n[t] ||
                n.getPropertyValue(t.replace(iF, "-$1").toLowerCase()) ||
                n.getPropertyValue(t) ||
                (!i && it(e, iZ(t) || t, 1)) ||
                ""
            );
        }
        function ii() {
            "undefined" != typeof window &&
                window.document &&
                ((iE = (iS = (iw = window).document).documentElement),
                (i8 = ie("div") || { style: {} }),
                (iC = ie("div")),
                (ij = iZ(ij)),
                (i4 = iZ(i4)),
                (i8.style.cssText = "border-width:0;line-height:0;position:absolute;padding:0"),
                (i9 = !!iZ("perspective")),
                (iT = 1));
        }
        function is(e) {
            var t,
                i = ie(
                    "svg",
                    (this.ownerSVGElement && this.ownerSVGElement.getAttribute("xmlns")) || "http://www.w3.org/2000/svg"
                ),
                n = this.parentNode,
                s = this.nextSibling,
                r = this.style.cssText;
            if ((iE.appendChild(i), i.appendChild(this), (this.style.display = "block"), e))
                try {
                    (t = this.getBBox()), (this._gsapBBox = this.getBBox), (this.getBBox = is);
                } catch (a) {}
            else this._gsapBBox && (t = this._gsapBBox());
            return (
                n && (s ? n.insertBefore(this, s) : n.appendChild(this)), iE.removeChild(i), (this.style.cssText = r), t
            );
        }
        function ir(e, t) {
            for (var i = t.length; i--; ) if (e.hasAttribute(t[i])) return e.getAttribute(t[i]);
        }
        function ia(e) {
            var t;
            try {
                t = e.getBBox();
            } catch (i) {
                t = is.call(e, !0);
            }
            return (
                (t && (t.width || t.height)) || e.getBBox === is || (t = is.call(e, !0)),
                !t || t.width || t.x || t.y
                    ? t
                    : { x: +ir(e, ["x", "cx", "x1"]) || 0, y: +ir(e, ["y", "cy", "y1"]) || 0, width: 0, height: 0 }
            );
        }
        function il(e) {
            return !(!e.getCTM || (e.parentNode && !e.ownerSVGElement) || !ia(e));
        }
        function io(e, t) {
            if (t) {
                var i = e.style;
                t in iq && (t = ij),
                    i.removeProperty
                        ? (("ms" !== t.substr(0, 2) && "webkit" !== t.substr(0, 6)) || (t = "-" + t),
                          i.removeProperty(t.replace(iF, "-$1").toLowerCase()))
                        : i.removeAttribute(t);
            }
        }
        function id(e, t, i, n, s, r) {
            var a = new tY(e._pt, t, i, 0, 1, r ? tj : t6);
            return ((e._pt = a).b = n), (a.e = s), e._props.push(i), a;
        }
        function ic(e, t, i, n) {
            var s,
                r,
                a,
                l,
                o = parseFloat(i) || 0,
                d = (i + "").trim().substr((o + "").length) || "px",
                c = i8.style,
                u = i2.test(t),
                p = "svg" === e.tagName.toLowerCase(),
                h = (p ? "client" : "offset") + (u ? "Width" : "Height"),
                f = "px" === n,
                m = "%" === n;
            return n === d || !o || iQ[n] || iQ[d]
                ? o
                : ("px" === d || f || (o = ic(e, t, i, "px")),
                  (l = e.getCTM && il(e)),
                  m && (iq[t] || ~t.indexOf("adius"))
                      ? _((o / (l ? e.getBBox()[u ? "width" : "height"] : e[h])) * 100)
                      : ((c[u ? "width" : "height"] = 100 + (f ? d : n)),
                        (r = ~t.indexOf("adius") || ("em" === n && e.appendChild && !p) ? e : e.parentNode),
                        l && (r = (e.ownerSVGElement || {}).parentNode),
                        (r && r !== iS && r.appendChild) || (r = iS.body),
                        (a = r._gsap) && m && a.width && u && a.time === tu.time
                            ? _((o / a.width) * 100)
                            : ((m || "%" === d) && (c.position = it(e, "position")),
                              r === e && (c.position = "static"),
                              r.appendChild(i8),
                              (s = i8[h]),
                              r.removeChild(i8),
                              (c.position = "absolute"),
                              u && m && (((a = $(r)).time = tu.time), (a.width = r[h])),
                              _(f ? (s * o) / 100 : s && o ? (100 / s) * o : 0))));
        }
        function iu(e, t, i, n) {
            var s;
            return (
                iT || ii(),
                t in i6 && "transform" !== t && ~(t = i6[t]).indexOf(",") && (t = t.split(",")[0]),
                iq[t] && "transform" !== t
                    ? ((s = ni(e, n)), (s = "transformOrigin" !== t ? s[t] : nn(it(e, i4)) + " " + s.zOrigin + "px"))
                    : ((s = e.style[t]) && "auto" !== s && !n && !~(s + "").indexOf("calc(")) ||
                      (s = (iJ[t] && iJ[t](e, t, i)) || it(e, t) || v(e, t) || ("opacity" === t ? 1 : 0)),
                i && !~(s + "").indexOf(" ") ? ic(e, t, s, i) + i : s
            );
        }
        function ip(e, t, i, n) {
            if (!i || "none" === i) {
                var s = iZ(t, e, 1),
                    r = s && it(e, s, 1);
                r && r !== i && ((t = s), (i = r));
            }
            var a,
                l,
                o,
                d,
                c,
                u,
                p,
                h,
                f,
                m,
                g,
                $,
                v = new tY(this._pt, e.style, t, 0, 1, t1),
                y = 0,
                _ = 0;
            if (
                ((v.b = i),
                (v.e = n),
                (i += ""),
                "auto" == (n += "") && ((e.style[t] = n), (n = it(e, t) || n), (e.style[t] = i)),
                el((a = [i, n])),
                (n = a[1]),
                (o = (i = a[0]).match(eq) || []),
                (n.match(eq) || []).length)
            ) {
                for (; (l = eq.exec(n)); )
                    (p = l[0]),
                        (f = n.substring(y, l.index)),
                        c ? (c = (c + 1) % 5) : ("rgba(" !== f.substr(-5) && "hsla(" !== f.substr(-5)) || (c = 1),
                        p !== (u = o[_++] || "") &&
                            ((d = parseFloat(u) || 0),
                            (g = u.substr((d + "").length)),
                            ($ = "=" === p.charAt(1) ? +(p.charAt(0) + "1") : 0) && (p = p.substr(2)),
                            (h = parseFloat(p)),
                            (m = p.substr((h + "").length)),
                            (y = eq.lastIndex - m.length),
                            m || ((m = m || e0.units[t] || g), y === n.length && ((n += m), (v.e += m))),
                            g !== m && (d = ic(e, t, u, m) || 0),
                            (v._pt = {
                                _next: v._pt,
                                p: f || 1 === _ ? f : ",",
                                s: d,
                                c: $ ? $ * h : h - d,
                                m: c && c < 4 ? Math.round : 0,
                            }));
                v.c = y < n.length ? n.substring(y, n.length) : "";
            } else v.r = "display" === t && "none" === n ? tj : t6;
            return e7.test(n) && (v.e = 0), (this._pt = v);
        }
        function ih(e) {
            var t = e.split(" "),
                i = t[0],
                n = t[1] || "50%";
            return (
                ("top" !== i && "bottom" !== i && "left" !== n && "right" !== n) || ((e = i), (i = n), (n = e)),
                (t[0] = iK[i] || i),
                (t[1] = iK[n] || n),
                t.join(" ")
            );
        }
        function im(e, t) {
            if (t.tween && t.tween._time === t.tween._dur) {
                var i,
                    n,
                    s,
                    r = t.t,
                    a = r.style,
                    l = t.u,
                    o = r._gsap;
                if ("all" === l || !0 === l) (a.cssText = ""), (n = 1);
                else
                    for (s = (l = l.split(",")).length; -1 < --s; )
                        iq[(i = l[s])] && ((n = 1), (i = "transformOrigin" === i ? i4 : ij)), io(r, i);
                n && (io(r, ij), o && (o.svg && r.removeAttribute("transform"), ni(r, 1), (o.uncache = 1)));
            }
        }
        function ig(e) {
            return "matrix(1, 0, 0, 1, 0, 0)" === e || "none" === e || !e;
        }
        function i$(e) {
            var t = it(e, ij);
            return ig(t) ? ne : t.substr(7).match(eH).map(_);
        }
        function iv(e, t) {
            var i,
                n,
                s,
                r,
                a = e._gsap || $(e),
                l = e.style,
                o = i$(e);
            return a.svg && e.getAttribute("transform")
                ? "1,0,0,1,0,0" ===
                  (o = [(s = e.transform.baseVal.consolidate().matrix).a, s.b, s.c, s.d, s.e, s.f]).join(",")
                    ? ne
                    : o
                : (o !== ne ||
                      e.offsetParent ||
                      e === iE ||
                      a.svg ||
                      ((s = l.display),
                      (l.display = "block"),
                      ((i = e.parentNode) && e.offsetParent) || ((r = 1), (n = e.nextSibling), iE.appendChild(e)),
                      (o = i$(e)),
                      s ? (l.display = s) : io(e, "display"),
                      r && (n ? i.insertBefore(e, n) : i ? i.appendChild(e) : iE.removeChild(e))),
                  t && 6 < o.length ? [o[0], o[1], o[4], o[5], o[12], o[13]] : o);
        }
        function iy(e, t, i, n, s, r) {
            var a,
                l,
                o,
                d = e._gsap,
                c = s || iv(e, !0),
                u = d.xOrigin || 0,
                p = d.yOrigin || 0,
                h = d.xOffset || 0,
                f = d.yOffset || 0,
                m = c[0],
                g = c[1],
                $ = c[2],
                v = c[3],
                y = c[4],
                _ = c[5],
                b = t.split(" "),
                x = parseFloat(b[0]) || 0,
                w = parseFloat(b[1]) || 0;
            i
                ? c !== ne &&
                  (l = m * v - g * $) &&
                  ((o = x * (-g / l) + w * (m / l) - (m * _ - g * y) / l),
                  (x = x * (v / l) + w * (-$ / l) + ($ * _ - v * y) / l),
                  (w = o))
                : ((x = (a = ia(e)).x + (~b[0].indexOf("%") ? (x / 100) * a.width : x)),
                  (w = a.y + (~(b[1] || b[0]).indexOf("%") ? (w / 100) * a.height : w))),
                n || (!1 !== n && d.smooth)
                    ? ((y = x - u),
                      (_ = w - p),
                      (d.xOffset = h + (y * m + _ * $) - y),
                      (d.yOffset = f + (y * g + _ * v) - _))
                    : (d.xOffset = d.yOffset = 0),
                (d.xOrigin = x),
                (d.yOrigin = w),
                (d.smooth = !!n),
                (d.origin = t),
                (d.originIsAbsolute = !!i),
                (e.style[i4] = "0px 0px"),
                r &&
                    (id(r, d, "xOrigin", u, x),
                    id(r, d, "yOrigin", p, w),
                    id(r, d, "xOffset", h, d.xOffset),
                    id(r, d, "yOffset", f, d.yOffset)),
                e.setAttribute("data-svg-origin", x + " " + w);
        }
        function i_(e, t, i) {
            var n = W(t);
            return _(parseFloat(t) + parseFloat(ic(e, "x", i + "px", n))) + n;
        }
        function ib(e, t, i, s, r, a) {
            var l,
                o,
                d = n(r),
                c = parseFloat(r) * (d && ~r.indexOf("rad") ? iG : 1),
                u = a ? c * a : c - s,
                p = s + u + "deg";
            return (
                d &&
                    ("short" === (l = r.split("_")[1]) && (u %= 360) != u % 180 && (u += u < 0 ? 360 : -360),
                    "cw" === l && u < 0
                        ? (u = ((u + 36e9) % 360) - 360 * ~~(u / 360))
                        : "ccw" === l && 0 < u && (u = ((u - 36e9) % 360) - 360 * ~~(u / 360))),
                (e._pt = o = new tY(e._pt, t, i, s, u, tF)),
                (o.e = p),
                (o.u = "deg"),
                e._props.push(i),
                o
            );
        }
        function ix(e, t, i) {
            var n,
                s,
                r,
                a,
                l,
                o,
                d,
                c = iC.style,
                u = i._gsap;
            for (s in ((c.cssText = getComputedStyle(i).cssText + ";position:absolute;display:block;"),
            (c[ij] = t),
            iS.body.appendChild(iC),
            (n = ni(iC, 1)),
            iq))
                (r = u[s]) !== (a = n[s]) &&
                    0 > "perspective,force3D,transformOrigin,svgOrigin".indexOf(s) &&
                    ((l = W(r) !== (d = W(a)) ? ic(i, s, r, d) : parseFloat(r)),
                    (o = parseFloat(a)),
                    (e._pt = new tY(e._pt, u, s, l, o - l, t7)),
                    (e._pt.u = d || 0),
                    e._props.push(s));
            iS.body.removeChild(iC);
        }
        (tA.version = tS.version = tW.version = "3.3.4"), (ev = 1), d() && tp();
        var iw,
            iS,
            iE,
            iT,
            i8,
            iC,
            ik,
            i9,
            iP = th.Power0,
            iA = th.Power1,
            iz = th.Power2,
            iL = th.Power3,
            iO = th.Power4,
            i0 = th.Linear,
            iM = th.Quad,
            iI = th.Cubic,
            iD = th.Quart,
            iN = th.Quint,
            i1 = th.Strong,
            iB = th.Elastic,
            i3 = th.Back,
            iV = th.SteppedEase,
            iX = th.Bounce,
            iY = th.Sine,
            iR = th.Expo,
            iH = th.Circ,
            iq = {},
            iG = 180 / Math.PI,
            iW = Math.PI / 180,
            i7 = Math.atan2,
            iF = /([A-Z])/g,
            i2 = /(?:left|right|width|margin|padding|x)/i,
            i5 = /[\s,\(]\S/,
            i6 = { autoAlpha: "opacity,visibility", scale: "scaleX,scaleY", alpha: "opacity" },
            ij = "transform",
            i4 = ij + "Origin",
            iU = "O,Moz,ms,Ms,Webkit".split(","),
            iZ = function e(t, i, n) {
                var s = (i || i8).style,
                    r = 5;
                if (t in s && !n) return t;
                for (t = t.charAt(0).toUpperCase() + t.substr(1); r-- && !(iU[r] + t in s); );
                return r < 0 ? null : (3 === r ? "ms" : 0 <= r ? iU[r] : "") + t;
            },
            iQ = { deg: 1, rad: 1, turn: 1 },
            iK = { top: "0%", bottom: "100%", left: "0%", right: "100%", center: "50%" },
            iJ = {
                clearProps: function e(t, i, n, s, r) {
                    if ("isFromStart" !== r.data) {
                        var a = (t._pt = new tY(t._pt, i, n, 0, 0, im));
                        return (a.u = s), (a.pr = -10), (a.tween = r), t._props.push(n), 1;
                    }
                },
            },
            ne = [1, 0, 0, 1, 0, 0],
            nt = {},
            ni = function e(t, i) {
                var n = t._gsap || new tb(t);
                if ("x" in n && !i && !n.uncache) return n;
                var s,
                    r,
                    a,
                    l,
                    o,
                    d,
                    c,
                    u,
                    p,
                    h,
                    f,
                    m,
                    g,
                    $,
                    v,
                    y,
                    b,
                    x,
                    w,
                    S,
                    E,
                    T,
                    C,
                    k,
                    P,
                    A,
                    z,
                    L,
                    O,
                    M,
                    I,
                    D,
                    N = t.style,
                    B = n.scaleX < 0,
                    V = it(t, i4) || "0";
                return (
                    (s = r = a = d = c = u = p = h = f = 0),
                    (l = o = 1),
                    (n.svg = !(!t.getCTM || !il(t))),
                    ($ = iv(t, n.svg)),
                    n.svg &&
                        ((k = !n.uncache && t.getAttribute("data-svg-origin")),
                        iy(t, k || V, !!k || n.originIsAbsolute, !1 !== n.smooth, $)),
                    (m = n.xOrigin || 0),
                    (g = n.yOrigin || 0),
                    $ !== ne &&
                        ((x = $[0]),
                        (w = $[1]),
                        (S = $[2]),
                        (E = $[3]),
                        (s = T = $[4]),
                        (r = C = $[5]),
                        6 === $.length
                            ? ((l = Math.sqrt(x * x + w * w)),
                              (o = Math.sqrt(E * E + S * S)),
                              (d = x || w ? i7(w, x) * iG : 0),
                              (p = S || E ? i7(S, E) * iG + d : 0) && (o *= Math.cos(p * iW)),
                              n.svg && ((s -= m - (m * x + g * S)), (r -= g - (m * w + g * E))))
                            : ((D = $[6]),
                              (M = $[7]),
                              (z = $[8]),
                              (L = $[9]),
                              (O = $[10]),
                              (I = $[11]),
                              (s = $[12]),
                              (r = $[13]),
                              (a = $[14]),
                              (c = (v = i7(D, O)) * iG),
                              v &&
                                  ((k = T * (y = Math.cos(-v)) + z * (b = Math.sin(-v))),
                                  (P = C * y + L * b),
                                  (A = D * y + O * b),
                                  (z = -(T * b) + z * y),
                                  (L = -(C * b) + L * y),
                                  (O = -(D * b) + O * y),
                                  (I = -(M * b) + I * y),
                                  (T = k),
                                  (C = P),
                                  (D = A)),
                              (u = (v = i7(-S, O)) * iG),
                              v &&
                                  ((y = Math.cos(-v)),
                                  (I = E * (b = Math.sin(-v)) + I * y),
                                  (x = k = x * y - z * b),
                                  (w = P = w * y - L * b),
                                  (S = A = S * y - O * b)),
                              (d = (v = i7(w, x)) * iG),
                              v &&
                                  ((k = x * (y = Math.cos(v)) + w * (b = Math.sin(v))),
                                  (P = T * y + C * b),
                                  (w = w * y - x * b),
                                  (C = C * y - T * b),
                                  (x = k),
                                  (T = P)),
                              c && 359.9 < Math.abs(c) + Math.abs(d) && ((c = d = 0), (u = 180 - u)),
                              (l = _(Math.sqrt(x * x + w * w + S * S))),
                              (o = _(Math.sqrt(C * C + D * D))),
                              (p = 2e-4 < Math.abs((v = i7(T, C))) ? v * iG : 0),
                              (f = I ? 1 / (I < 0 ? -I : I) : 0)),
                        n.svg &&
                            ((k = t.getAttribute("transform")),
                            (n.forceCSS = t.setAttribute("transform", "") || !ig(it(t, ij))),
                            k && t.setAttribute("transform", k))),
                    90 < Math.abs(p) &&
                        270 > Math.abs(p) &&
                        (B
                            ? ((l *= -1), (p += d <= 0 ? 180 : -180), (d += d <= 0 ? 180 : -180))
                            : ((o *= -1), (p += p <= 0 ? 180 : -180))),
                    (n.x =
                        ((n.xPercent = s && Math.round(t.offsetWidth / 2) === Math.round(-s) ? -50 : 0) ? 0 : s) +
                        "px"),
                    (n.y =
                        ((n.yPercent = r && Math.round(t.offsetHeight / 2) === Math.round(-r) ? -50 : 0) ? 0 : r) +
                        "px"),
                    (n.z = a + "px"),
                    (n.scaleX = _(l)),
                    (n.scaleY = _(o)),
                    (n.rotation = _(d) + "deg"),
                    (n.rotationX = _(c) + "deg"),
                    (n.rotationY = _(u) + "deg"),
                    (n.skewX = p + "deg"),
                    (n.skewY = h + "deg"),
                    (n.transformPerspective = f + "px"),
                    (n.zOrigin = parseFloat(V.split(" ")[2]) || 0) && (N[i4] = nn(V)),
                    (n.xOffset = n.yOffset = 0),
                    (n.force3D = e0.force3D),
                    (n.renderTransform = n.svg ? nl : i9 ? na : ns),
                    (n.uncache = 0),
                    n
                );
            },
            nn = function e(t) {
                return (t = t.split(" "))[0] + " " + t[1];
            },
            ns = function e(t, i) {
                (i.z = "0px"), (i.rotationY = i.rotationX = "0deg"), (i.force3D = 0), na(t, i);
            },
            nr = "0deg",
            na = function e(t, i) {
                var n = i || this,
                    s = n.xPercent,
                    r = n.yPercent,
                    a = n.x,
                    l = n.y,
                    o = n.z,
                    d = n.rotation,
                    c = n.rotationY,
                    u = n.rotationX,
                    p = n.skewX,
                    h = n.skewY,
                    f = n.scaleX,
                    m = n.scaleY,
                    g = n.transformPerspective,
                    $ = n.force3D,
                    v = n.target,
                    y = n.zOrigin,
                    _ = "",
                    b = ("auto" === $ && t && 1 !== t) || !0 === $;
                if (y && (u !== nr || c !== nr)) {
                    var x,
                        w = parseFloat(c) * iW,
                        S = Math.sin(w),
                        E = Math.cos(w);
                    (x = Math.cos((w = parseFloat(u) * iW))),
                        (a = i_(v, a, -(S * x * y))),
                        (l = i_(v, l, -(-Math.sin(w) * y))),
                        (o = i_(v, o, -(E * x * y) + y));
                }
                "0px" !== g && (_ += "perspective(" + g + ") "),
                    (s || r) && (_ += "translate(" + s + "%, " + r + "%) "),
                    (b || "0px" !== a || "0px" !== l || "0px" !== o) &&
                        (_ +=
                            "0px" !== o || b
                                ? "translate3d(" + a + ", " + l + ", " + o + ") "
                                : "translate(" + a + ", " + l + ") "),
                    d !== nr && (_ += "rotate(" + d + ") "),
                    c !== nr && (_ += "rotateY(" + c + ") "),
                    u !== nr && (_ += "rotateX(" + u + ") "),
                    (p === nr && h === nr) || (_ += "skew(" + p + ", " + h + ") "),
                    (1 === f && 1 === m) || (_ += "scale(" + f + ", " + m + ") "),
                    (v.style[ij] = _ || "translate(0, 0)");
            },
            nl = function e(t, i) {
                var n,
                    s,
                    r,
                    a,
                    l,
                    o = i || this,
                    d = o.xPercent,
                    c = o.yPercent,
                    u = o.x,
                    p = o.y,
                    h = o.rotation,
                    f = o.skewX,
                    m = o.skewY,
                    g = o.scaleX,
                    $ = o.scaleY,
                    v = o.target,
                    y = o.xOrigin,
                    b = o.yOrigin,
                    x = o.xOffset,
                    w = o.yOffset,
                    S = o.forceCSS,
                    E = parseFloat(u),
                    T = parseFloat(p);
                (h = parseFloat(h)),
                    (f = parseFloat(f)),
                    (m = parseFloat(m)) && ((f += m = parseFloat(m)), (h += m)),
                    h || f
                        ? ((h *= iW),
                          (f *= iW),
                          (n = Math.cos(h) * g),
                          (s = Math.sin(h) * g),
                          (r = -(Math.sin(h - f) * $)),
                          (a = Math.cos(h - f) * $),
                          f &&
                              ((m *= iW),
                              (r *= l = Math.sqrt(1 + (l = Math.tan(f - m)) * l)),
                              (a *= l),
                              m && ((n *= l = Math.sqrt(1 + (l = Math.tan(m)) * l)), (s *= l))),
                          (n = _(n)),
                          (s = _(s)),
                          (r = _(r)),
                          (a = _(a)))
                        : ((n = g), (a = $), (s = r = 0)),
                    ((E && !~(u + "").indexOf("px")) || (T && !~(p + "").indexOf("px"))) &&
                        ((E = ic(v, "x", u, "px")), (T = ic(v, "y", p, "px"))),
                    (y || b || x || w) && ((E = _(E + y - (y * n + b * r) + x)), (T = _(T + b - (y * s + b * a) + w))),
                    (d || c) && ((E = _(E + (d / 100) * (l = v.getBBox()).width)), (T = _(T + (c / 100) * l.height))),
                    (l = "matrix(" + n + "," + s + "," + r + "," + a + "," + E + "," + T + ")"),
                    v.setAttribute("transform", l),
                    S && (v.style[ij] = l);
            };
        y("padding,margin,Width,Radius", function (e, t) {
            var i = "Right",
                n = "Bottom",
                s = "Left",
                r = (t < 3 ? ["Top", i, n, s] : ["Top" + s, "Top" + i, n + i, n + s]).map(function (i) {
                    return t < 2 ? e + i : "border" + i + e;
                });
            iJ[1 < t ? "border" + e : e] = function (e, t, i, n, s) {
                var a, l;
                if (arguments.length < 4)
                    return 5 ===
                        (l = (a = r.map(function (t) {
                            return iu(e, t, i);
                        })).join(" ")).split(a[0]).length
                        ? a[0]
                        : l;
                (a = (n + "").split(" ")),
                    (l = {}),
                    r.forEach(function (e, t) {
                        return (l[e] = a[t] = a[t] || a[((t - 1) / 2) | 0]);
                    }),
                    e.init(t, l, s);
            };
        });
        var no,
            nd,
            nc,
            nu = {
                name: "css",
                register: ii,
                targetTest: function e(t) {
                    return t.style && t.nodeType;
                },
                init: function e(t, i, n, s, r) {
                    var a,
                        l,
                        o,
                        d,
                        c,
                        u,
                        h,
                        f,
                        m,
                        g,
                        $,
                        v,
                        y,
                        _,
                        b,
                        x = this._props,
                        w = t.style;
                    for (h in (iT || ii(), i))
                        if ("autoRound" !== h && ((l = i[h]), !e4[h] || !tE(h, i, n, s, t, r))) {
                            if (
                                ((c = typeof l),
                                (u = iJ[h]),
                                "function" === c && (c = typeof (l = l.call(n, s, t, r))),
                                "string" === c && ~l.indexOf("random(") && (l = ee(l)),
                                u)
                            )
                                u(this, t, h, l, n) && (b = 1);
                            else if ("--" === h.substr(0, 2))
                                this.add(
                                    w,
                                    "setProperty",
                                    getComputedStyle(t).getPropertyValue(h) + "",
                                    l + "",
                                    s,
                                    r,
                                    0,
                                    0,
                                    h
                                );
                            else {
                                if (
                                    ((a = iu(t, h)),
                                    (d = parseFloat(a)),
                                    (g = "string" === c && "=" === l.charAt(1) ? +(l.charAt(0) + "1") : 0) &&
                                        (l = l.substr(2)),
                                    (o = parseFloat(l)),
                                    h in i6 &&
                                        ("autoAlpha" === h &&
                                            (1 === d && "hidden" === iu(t, "visibility") && o && (d = 0),
                                            id(
                                                this,
                                                w,
                                                "visibility",
                                                d ? "inherit" : "hidden",
                                                o ? "inherit" : "hidden",
                                                !o
                                            )),
                                        "scale" !== h &&
                                            "transform" !== h &&
                                            ~(h = i6[h]).indexOf(",") &&
                                            (h = h.split(",")[0])),
                                    ($ = h in iq))
                                ) {
                                    if (
                                        (v ||
                                            ((y = t._gsap).renderTransform || ni(t),
                                            (_ = !1 !== i.smoothOrigin && y.smooth),
                                            ((v = this._pt =
                                                new tY(this._pt, w, ij, 0, 1, y.renderTransform, y, 0, -1)).dep = 1)),
                                        "scale" === h)
                                    )
                                        (this._pt = new tY(this._pt, y, "scaleY", y.scaleY, g ? g * o : o - y.scaleY)),
                                            x.push("scaleY", h),
                                            (h += "X");
                                    else {
                                        if ("transformOrigin" === h) {
                                            (l = ih(l)),
                                                y.svg
                                                    ? iy(t, l, 0, _, 0, this)
                                                    : ((m = parseFloat(l.split(" ")[2]) || 0) !== y.zOrigin &&
                                                          id(this, y, "zOrigin", y.zOrigin, m),
                                                      id(this, w, h, nn(a), nn(l)));
                                            continue;
                                        }
                                        if ("svgOrigin" === h) {
                                            iy(t, l, 1, _, 0, this);
                                            continue;
                                        }
                                        if (h in nt) {
                                            ib(this, y, h, d, l, g);
                                            continue;
                                        }
                                        if ("smoothOrigin" === h) {
                                            id(this, y, "smooth", y.smooth, l);
                                            continue;
                                        }
                                        if ("force3D" === h) {
                                            y[h] = l;
                                            continue;
                                        }
                                        if ("transform" === h) {
                                            ix(this, l, t);
                                            continue;
                                        }
                                    }
                                } else h in w || (h = iZ(h) || h);
                                if ($ || ((o || 0 === o) && (d || 0 === d) && !i5.test(l) && h in w))
                                    (f = (a + "").substr((d + "").length)) !==
                                        (m =
                                            (l + "").substr(((o = o || 0) + "").length) ||
                                            (h in e0.units ? e0.units[h] : f)) && (d = ic(t, h, a, m)),
                                        (this._pt = new tY(
                                            this._pt,
                                            $ ? y : w,
                                            h,
                                            d,
                                            g ? g * o : o - d,
                                            "px" !== m || !1 === i.autoRound || $ ? t7 : t5
                                        )),
                                        (this._pt.u = m || 0),
                                        f !== m && ((this._pt.b = a), (this._pt.r = t2));
                                else if (h in w) ip.call(this, t, h, a, l);
                                else {
                                    if (!(h in t)) {
                                        p(h, l);
                                        continue;
                                    }
                                    this.add(t, h, t[h], l, s, r);
                                }
                                x.push(h);
                            }
                        }
                    b && tX(this);
                },
                get: iu,
                aliases: i6,
                getSetter: function e(t, i, n) {
                    var s = i6[i];
                    return (
                        s && 0 > s.indexOf(",") && (i = s),
                        i in iq && i !== i4 && (t._gsap.x || iu(t, "x"))
                            ? n && ik === n
                                ? "scale" === i
                                    ? tQ
                                    : tZ
                                : ((ik = n || {}), "scale" === i ? tK : tJ)
                            : t.style && !a(t.style[i])
                              ? t4
                              : ~i.indexOf("-")
                                ? tU
                                : tI(t, i)
                    );
                },
                core: { _removeProperty: io, _getMatrix: iv },
            };
        (tW.utils.checkPrefix = iZ),
            (nc = y(
                (no = "x,y,z,scale,scaleX,scaleY,xPercent,yPercent") +
                    "," +
                    (nd = "rotation,rotationX,rotationY,skewX,skewY") +
                    ",transform,transformOrigin,svgOrigin,force3D,smoothOrigin,transformPerspective",
                function (e) {
                    iq[e] = 1;
                }
            )),
            y(nd, function (e) {
                (e0.units[e] = "deg"), (nt[e] = 1);
            }),
            (i6[nc[13]] = no + "," + nd),
            y(
                "0:translateX,1:translateY,2:translateZ,8:rotate,8:rotationZ,8:rotateZ,9:rotateX,10:rotateY",
                function (e) {
                    var t = e.split(":");
                    i6[t[1]] = nc[t[0]];
                }
            ),
            y("x,y,z,top,right,bottom,left,width,height,fontSize,padding,margin,perspective", function (e) {
                e0.units[e] = "px";
            }),
            tW.registerPlugin(nu);
        var np = tW.registerPlugin(nu) || tW,
            nh = np.core.Tween;
        (e.Back = i3),
            (e.Bounce = iX),
            (e.CSSPlugin = nu),
            (e.Circ = iH),
            (e.Cubic = iI),
            (e.Elastic = iB),
            (e.Expo = iR),
            (e.Linear = i0),
            (e.Power0 = iP),
            (e.Power1 = iA),
            (e.Power2 = iz),
            (e.Power3 = iL),
            (e.Power4 = iO),
            (e.Quad = iM),
            (e.Quart = iD),
            (e.Quint = iN),
            (e.Sine = iY),
            (e.SteppedEase = iV),
            (e.Strong = i1),
            (e.TimelineLite = tS),
            (e.TimelineMax = tS),
            (e.TweenLite = tA),
            (e.TweenMax = nh),
            (e.default = np),
            (e.gsap = np),
            "undefined" == typeof window || window !== e
                ? Object.defineProperty(e, "__esModule", { value: !0 })
                : delete e.default;
    }),
    (function (e, t) {
        "object" == typeof exports && "undefined" != typeof module
            ? (module.exports = t())
            : "function" == typeof define && define.amd
              ? define(t)
              : ((e = e || self).GLightbox = t());
    })(this, function () {
        "use strict";
        function e(t) {
            return (e =
                "function" == typeof Symbol && "symbol" == typeof Symbol.iterator
                    ? function (e) {
                          return typeof e;
                      }
                    : function (e) {
                          return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype
                              ? "symbol"
                              : typeof e;
                      })(t);
        }
        function t(e, t) {
            if (!(e instanceof t)) throw TypeError("Cannot call a class as a function");
        }
        function i(e, t) {
            for (var i = 0; i < t.length; i++) {
                var n = t[i];
                (n.enumerable = n.enumerable || !1),
                    (n.configurable = !0),
                    "value" in n && (n.writable = !0),
                    Object.defineProperty(e, n.key, n);
            }
        }
        function n(e, t, n) {
            return t && i(e.prototype, t), n && i(e, n), e;
        }
        function s(e, t) {
            (null == t || t > e.length) && (t = e.length);
            for (var i = 0, n = Array(t); i < t; i++) n[i] = e[i];
            return n;
        }
        var r = Date.now();
        function a() {
            var e = {},
                t = !0,
                i = 0,
                n = arguments.length;
            for (
                "[object Boolean]" === Object.prototype.toString.call(arguments[0]) && ((t = arguments[0]), i++);
                i < n;
                i++
            ) {
                var s = arguments[i];
                !(function (i) {
                    for (var n in i)
                        Object.prototype.hasOwnProperty.call(i, n) &&
                            (t && "[object Object]" === Object.prototype.toString.call(i[n])
                                ? (e[n] = a(!0, e[n], i[n]))
                                : (e[n] = i[n]));
                })(s);
            }
            return e;
        }
        function l(e, t) {
            if (((E(e) || e === window || e === document) && (e = [e]), C(e) || k(e) || (e = [e]), 0 != z(e))) {
                if (C(e) && !k(e)) for (var i = e.length, n = 0; n < i && !1 !== t.call(e[n], e[n], n, e); n++);
                else if (k(e)) {
                    for (var s in e) if (A(e, s) && !1 === t.call(e[s], e[s], s, e)) break;
                }
            }
        }
        function o(e) {
            var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : null,
                i = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : null,
                n = (e[r] = e[r] || []),
                s = { all: n, evt: null, found: null };
            return (
                t &&
                    i &&
                    z(n) > 0 &&
                    l(n, function (e, n) {
                        if (e.eventName == t && e.fn.toString() == i.toString()) return (s.found = !0), (s.evt = n), !1;
                    }),
                s
            );
        }
        function d(e) {
            var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {},
                i = t.onElement,
                n = t.withCallback,
                s = t.avoidDuplicate,
                r = void 0 === s || s,
                a = t.once,
                d = void 0 !== a && a,
                c = t.useCapture,
                u = void 0 !== c && c,
                p = arguments.length > 2 ? arguments[2] : void 0,
                h = i || [];
            function f(e) {
                w(n) && n.call(p, e, this), d && f.destroy();
            }
            return (
                S(h) && (h = document.querySelectorAll(h)),
                (f.destroy = function () {
                    l(h, function (t) {
                        var i = o(t, e, f);
                        i.found && i.all.splice(i.evt, 1), t.removeEventListener && t.removeEventListener(e, f, u);
                    });
                }),
                l(h, function (t) {
                    var i = o(t, e, f);
                    ((t.addEventListener && r && !i.found) || !r) &&
                        (t.addEventListener(e, f, u), i.all.push({ eventName: e, fn: f }));
                }),
                f
            );
        }
        function c(e, t) {
            l(t.split(" "), function (t) {
                return e.classList.add(t);
            });
        }
        function u(e, t) {
            l(t.split(" "), function (t) {
                return e.classList.remove(t);
            });
        }
        function p(e, t) {
            return e.classList.contains(t);
        }
        function h(e, t) {
            for (; e !== document.body; ) {
                if (!(e = e.parentElement)) return !1;
                if ("function" == typeof e.matches ? e.matches(t) : e.msMatchesSelector(t)) return e;
            }
        }
        function f(e) {
            var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : "",
                i = arguments.length > 2 && void 0 !== arguments[2] && arguments[2];
            if (!e || "" === t) return !1;
            if ("none" == t) return w(i) && i(), !1;
            var n = (function e() {
                    var t,
                        i = document.createElement("fakeelement"),
                        n = {
                            animation: "animationend",
                            OAnimation: "oAnimationEnd",
                            MozAnimation: "animationend",
                            WebkitAnimation: "webkitAnimationEnd",
                        };
                    for (t in n) if (void 0 !== i.style[t]) return n[t];
                })(),
                s = t.split(" ");
            l(s, function (t) {
                c(e, "g" + t);
            }),
                d(n, {
                    onElement: e,
                    avoidDuplicate: !1,
                    once: !0,
                    withCallback: function (e, t) {
                        l(s, function (e) {
                            u(t, "g" + e);
                        }),
                            w(i) && i();
                    },
                });
        }
        function m(e) {
            var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : "";
            if ("" == t)
                return (
                    (e.style.webkitTransform = ""),
                    (e.style.MozTransform = ""),
                    (e.style.msTransform = ""),
                    (e.style.OTransform = ""),
                    (e.style.transform = ""),
                    !1
                );
            (e.style.webkitTransform = t),
                (e.style.MozTransform = t),
                (e.style.msTransform = t),
                (e.style.OTransform = t),
                (e.style.transform = t);
        }
        function g(e) {
            e.style.display = "block";
        }
        function $(e) {
            e.style.display = "none";
        }
        function v(e) {
            var t = document.createDocumentFragment(),
                i = document.createElement("div");
            for (i.innerHTML = e; i.firstChild; ) t.appendChild(i.firstChild);
            return t;
        }
        function y() {
            return {
                width: window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth,
                height: window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight,
            };
        }
        function _(e, t, i, n) {
            if (e()) t();
            else {
                i || (i = 100);
                var s,
                    r = setInterval(function () {
                        e() && (clearInterval(r), s && clearTimeout(s), t());
                    }, i);
                n &&
                    (s = setTimeout(function () {
                        clearInterval(r);
                    }, n));
            }
        }
        function b(e, t, i) {
            if (P(e)) console.error("Inject assets error");
            else if ((w(t) && ((i = t), (t = !1)), S(t) && t in window)) w(i) && i();
            else {
                var n;
                if (-1 !== e.indexOf(".css")) {
                    if ((n = document.querySelectorAll('link[href="' + e + '"]')) && n.length > 0)
                        return void (w(i) && i());
                    var s = document.getElementsByTagName("head")[0],
                        r = s.querySelectorAll('link[rel="stylesheet"]'),
                        a = document.createElement("link");
                    return (
                        (a.rel = "stylesheet"),
                        (a.type = "text/css"),
                        (a.href = e),
                        (a.media = "all"),
                        r ? s.insertBefore(a, r[0]) : s.appendChild(a),
                        void (w(i) && i())
                    );
                }
                if ((n = document.querySelectorAll('script[src="' + e + '"]')) && n.length > 0) {
                    if (w(i)) {
                        if (S(t))
                            return (
                                _(
                                    function () {
                                        return void 0 !== window[t];
                                    },
                                    function () {
                                        i();
                                    }
                                ),
                                !1
                            );
                        i();
                    }
                } else {
                    var l = document.createElement("script");
                    (l.type = "text/javascript"),
                        (l.src = e),
                        (l.onload = function () {
                            if (w(i)) {
                                if (S(t))
                                    return (
                                        _(
                                            function () {
                                                return void 0 !== window[t];
                                            },
                                            function () {
                                                i();
                                            }
                                        ),
                                        !1
                                    );
                                i();
                            }
                        }),
                        document.body.appendChild(l);
                }
            }
        }
        function x() {
            return (
                "navigator" in window &&
                window.navigator.userAgent.match(
                    /(iPad)|(iPhone)|(iPod)|(Android)|(PlayBook)|(BB10)|(BlackBerry)|(Opera Mini)|(IEMobile)|(webOS)|(MeeGo)/i
                )
            );
        }
        function w(e) {
            return "function" == typeof e;
        }
        function S(e) {
            return "string" == typeof e;
        }
        function E(e) {
            return !(!e || !e.nodeType || 1 != e.nodeType);
        }
        function T(e) {
            return Array.isArray(e);
        }
        function C(e) {
            return e && e.length && isFinite(e.length);
        }
        function k(t) {
            return "object" === e(t) && null != t && !w(t) && !T(t);
        }
        function P(e) {
            return null == e;
        }
        function A(e, t) {
            return null !== e && hasOwnProperty.call(e, t);
        }
        function z(e) {
            if (k(e)) {
                if (e.keys) return e.keys().length;
                var t = 0;
                for (var i in e) A(e, i) && t++;
                return t;
            }
            return e.length;
        }
        function L(e) {
            return !isNaN(parseFloat(e)) && isFinite(e);
        }
        function O(e) {
            return Math.sqrt(e.x * e.x + e.y * e.y);
        }
        var M = (function () {
            function e(i) {
                t(this, e), (this.handlers = []), (this.el = i);
            }
            return (
                n(e, [
                    {
                        key: "add",
                        value: function (e) {
                            this.handlers.push(e);
                        },
                    },
                    {
                        key: "del",
                        value: function (e) {
                            e || (this.handlers = []);
                            for (var t = this.handlers.length; t >= 0; t--)
                                this.handlers[t] === e && this.handlers.splice(t, 1);
                        },
                    },
                    {
                        key: "dispatch",
                        value: function () {
                            for (var e = 0, t = this.handlers.length; e < t; e++) {
                                var i = this.handlers[e];
                                "function" == typeof i && i.apply(this.el, arguments);
                            }
                        },
                    },
                ]),
                e
            );
        })();
        function I(e, t) {
            var i = new M(e);
            return i.add(t), i;
        }
        var D = (function () {
            function e(i, n) {
                t(this, e),
                    (this.element = "string" == typeof i ? document.querySelector(i) : i),
                    (this.start = this.start.bind(this)),
                    (this.move = this.move.bind(this)),
                    (this.end = this.end.bind(this)),
                    (this.cancel = this.cancel.bind(this)),
                    this.element.addEventListener("touchstart", this.start, !1),
                    this.element.addEventListener("touchmove", this.move, !1),
                    this.element.addEventListener("touchend", this.end, !1),
                    this.element.addEventListener("touchcancel", this.cancel, !1),
                    (this.preV = { x: null, y: null }),
                    (this.pinchStartLen = null),
                    (this.zoom = 1),
                    (this.isDoubleTap = !1);
                var s = function () {};
                (this.rotate = I(this.element, n.rotate || s)),
                    (this.touchStart = I(this.element, n.touchStart || s)),
                    (this.multipointStart = I(this.element, n.multipointStart || s)),
                    (this.multipointEnd = I(this.element, n.multipointEnd || s)),
                    (this.pinch = I(this.element, n.pinch || s)),
                    (this.swipe = I(this.element, n.swipe || s)),
                    (this.tap = I(this.element, n.tap || s)),
                    (this.doubleTap = I(this.element, n.doubleTap || s)),
                    (this.longTap = I(this.element, n.longTap || s)),
                    (this.singleTap = I(this.element, n.singleTap || s)),
                    (this.pressMove = I(this.element, n.pressMove || s)),
                    (this.twoFingerPressMove = I(this.element, n.twoFingerPressMove || s)),
                    (this.touchMove = I(this.element, n.touchMove || s)),
                    (this.touchEnd = I(this.element, n.touchEnd || s)),
                    (this.touchCancel = I(this.element, n.touchCancel || s)),
                    (this._cancelAllHandler = this.cancelAll.bind(this)),
                    window.addEventListener("scroll", this._cancelAllHandler),
                    (this.delta = null),
                    (this.last = null),
                    (this.now = null),
                    (this.tapTimeout = null),
                    (this.singleTapTimeout = null),
                    (this.longTapTimeout = null),
                    (this.swipeTimeout = null),
                    (this.x1 = this.x2 = this.y1 = this.y2 = null),
                    (this.preTapPosition = { x: null, y: null });
            }
            return (
                n(e, [
                    {
                        key: "start",
                        value: function (e) {
                            if (e.touches) {
                                (this.now = Date.now()),
                                    (this.x1 = e.touches[0].pageX),
                                    (this.y1 = e.touches[0].pageY),
                                    (this.delta = this.now - (this.last || this.now)),
                                    this.touchStart.dispatch(e, this.element),
                                    null !== this.preTapPosition.x &&
                                        ((this.isDoubleTap =
                                            this.delta > 0 &&
                                            this.delta <= 250 &&
                                            30 > Math.abs(this.preTapPosition.x - this.x1) &&
                                            30 > Math.abs(this.preTapPosition.y - this.y1)),
                                        this.isDoubleTap && clearTimeout(this.singleTapTimeout)),
                                    (this.preTapPosition.x = this.x1),
                                    (this.preTapPosition.y = this.y1),
                                    (this.last = this.now);
                                var t = this.preV;
                                if (e.touches.length > 1) {
                                    this._cancelLongTap(), this._cancelSingleTap();
                                    var i = { x: e.touches[1].pageX - this.x1, y: e.touches[1].pageY - this.y1 };
                                    (t.x = i.x),
                                        (t.y = i.y),
                                        (this.pinchStartLen = O(t)),
                                        this.multipointStart.dispatch(e, this.element);
                                }
                                (this._preventTap = !1),
                                    (this.longTapTimeout = setTimeout(
                                        function () {
                                            this.longTap.dispatch(e, this.element), (this._preventTap = !0);
                                        }.bind(this),
                                        750
                                    ));
                            }
                        },
                    },
                    {
                        key: "move",
                        value: function (e) {
                            if (e.touches) {
                                var t = this.preV,
                                    i = e.touches.length,
                                    n = e.touches[0].pageX,
                                    s = e.touches[0].pageY;
                                if (((this.isDoubleTap = !1), i > 1)) {
                                    var r,
                                        a,
                                        l,
                                        o,
                                        d,
                                        c = e.touches[1].pageX,
                                        u = e.touches[1].pageY,
                                        p = { x: e.touches[1].pageX - n, y: e.touches[1].pageY - s };
                                    null !== t.x &&
                                        (this.pinchStartLen > 0 &&
                                            ((e.zoom = O(p) / this.pinchStartLen),
                                            this.pinch.dispatch(e, this.element)),
                                        (e.angle =
                                            ((r = p),
                                            (l = (function (e, t) {
                                                var i = O(e) * O(t);
                                                if (0 === i) return 0;
                                                var n,
                                                    s,
                                                    r = ((n = e), (s = t), (n.x * s.x + n.y * s.y) / i);
                                                return r > 1 && (r = 1), Math.acos(r);
                                            })(r, (a = t))),
                                            (o = r),
                                            (d = a),
                                            o.x * d.y - d.x * o.y > 0 && (l *= -1),
                                            (180 * l) / Math.PI)),
                                        this.rotate.dispatch(e, this.element)),
                                        (t.x = p.x),
                                        (t.y = p.y),
                                        null !== this.x2 && null !== this.sx2
                                            ? ((e.deltaX = (n - this.x2 + c - this.sx2) / 2),
                                              (e.deltaY = (s - this.y2 + u - this.sy2) / 2))
                                            : ((e.deltaX = 0), (e.deltaY = 0)),
                                        this.twoFingerPressMove.dispatch(e, this.element),
                                        (this.sx2 = c),
                                        (this.sy2 = u);
                                } else {
                                    if (null !== this.x2) {
                                        (e.deltaX = n - this.x2), (e.deltaY = s - this.y2);
                                        var h = Math.abs(this.x1 - this.x2),
                                            f = Math.abs(this.y1 - this.y2);
                                        (h > 10 || f > 10) && (this._preventTap = !0);
                                    } else (e.deltaX = 0), (e.deltaY = 0);
                                    this.pressMove.dispatch(e, this.element);
                                }
                                this.touchMove.dispatch(e, this.element),
                                    this._cancelLongTap(),
                                    (this.x2 = n),
                                    (this.y2 = s),
                                    i > 1 && e.preventDefault();
                            }
                        },
                    },
                    {
                        key: "end",
                        value: function (e) {
                            if (e.changedTouches) {
                                this._cancelLongTap();
                                var t = this;
                                e.touches.length < 2 &&
                                    (this.multipointEnd.dispatch(e, this.element), (this.sx2 = this.sy2 = null)),
                                    (this.x2 && Math.abs(this.x1 - this.x2) > 30) ||
                                    (this.y2 && Math.abs(this.y1 - this.y2) > 30)
                                        ? ((e.direction = this._swipeDirection(this.x1, this.x2, this.y1, this.y2)),
                                          (this.swipeTimeout = setTimeout(function () {
                                              t.swipe.dispatch(e, t.element);
                                          }, 0)))
                                        : ((this.tapTimeout = setTimeout(function () {
                                              t._preventTap || t.tap.dispatch(e, t.element),
                                                  t.isDoubleTap &&
                                                      (t.doubleTap.dispatch(e, t.element), (t.isDoubleTap = !1));
                                          }, 0)),
                                          t.isDoubleTap ||
                                              (t.singleTapTimeout = setTimeout(function () {
                                                  t.singleTap.dispatch(e, t.element);
                                              }, 250))),
                                    this.touchEnd.dispatch(e, this.element),
                                    (this.preV.x = 0),
                                    (this.preV.y = 0),
                                    (this.zoom = 1),
                                    (this.pinchStartLen = null),
                                    (this.x1 = this.x2 = this.y1 = this.y2 = null);
                            }
                        },
                    },
                    {
                        key: "cancelAll",
                        value: function () {
                            (this._preventTap = !0),
                                clearTimeout(this.singleTapTimeout),
                                clearTimeout(this.tapTimeout),
                                clearTimeout(this.longTapTimeout),
                                clearTimeout(this.swipeTimeout);
                        },
                    },
                    {
                        key: "cancel",
                        value: function (e) {
                            this.cancelAll(), this.touchCancel.dispatch(e, this.element);
                        },
                    },
                    {
                        key: "_cancelLongTap",
                        value: function () {
                            clearTimeout(this.longTapTimeout);
                        },
                    },
                    {
                        key: "_cancelSingleTap",
                        value: function () {
                            clearTimeout(this.singleTapTimeout);
                        },
                    },
                    {
                        key: "_swipeDirection",
                        value: function (e, t, i, n) {
                            return Math.abs(e - t) >= Math.abs(i - n)
                                ? e - t > 0
                                    ? "Left"
                                    : "Right"
                                : i - n > 0
                                  ? "Up"
                                  : "Down";
                        },
                    },
                    {
                        key: "on",
                        value: function (e, t) {
                            this[e] && this[e].add(t);
                        },
                    },
                    {
                        key: "off",
                        value: function (e, t) {
                            this[e] && this[e].del(t);
                        },
                    },
                    {
                        key: "destroy",
                        value: function () {
                            return (
                                this.singleTapTimeout && clearTimeout(this.singleTapTimeout),
                                this.tapTimeout && clearTimeout(this.tapTimeout),
                                this.longTapTimeout && clearTimeout(this.longTapTimeout),
                                this.swipeTimeout && clearTimeout(this.swipeTimeout),
                                this.element.removeEventListener("touchstart", this.start),
                                this.element.removeEventListener("touchmove", this.move),
                                this.element.removeEventListener("touchend", this.end),
                                this.element.removeEventListener("touchcancel", this.cancel),
                                this.rotate.del(),
                                this.touchStart.del(),
                                this.multipointStart.del(),
                                this.multipointEnd.del(),
                                this.pinch.del(),
                                this.swipe.del(),
                                this.tap.del(),
                                this.doubleTap.del(),
                                this.longTap.del(),
                                this.singleTap.del(),
                                this.pressMove.del(),
                                this.twoFingerPressMove.del(),
                                this.touchMove.del(),
                                this.touchEnd.del(),
                                this.touchCancel.del(),
                                (this.preV =
                                    this.pinchStartLen =
                                    this.zoom =
                                    this.isDoubleTap =
                                    this.delta =
                                    this.last =
                                    this.now =
                                    this.tapTimeout =
                                    this.singleTapTimeout =
                                    this.longTapTimeout =
                                    this.swipeTimeout =
                                    this.x1 =
                                    this.x2 =
                                    this.y1 =
                                    this.y2 =
                                    this.preTapPosition =
                                    this.rotate =
                                    this.touchStart =
                                    this.multipointStart =
                                    this.multipointEnd =
                                    this.pinch =
                                    this.swipe =
                                    this.tap =
                                    this.doubleTap =
                                    this.longTap =
                                    this.singleTap =
                                    this.pressMove =
                                    this.touchMove =
                                    this.touchEnd =
                                    this.touchCancel =
                                    this.twoFingerPressMove =
                                        null),
                                window.removeEventListener("scroll", this._cancelAllHandler),
                                null
                            );
                        },
                    },
                ]),
                e
            );
        })();
        function N(e) {
            var t = (function () {
                    var e,
                        t = document.createElement("fakeelement"),
                        i = {
                            transition: "transitionend",
                            OTransition: "oTransitionEnd",
                            MozTransition: "transitionend",
                            WebkitTransition: "webkitTransitionEnd",
                        };
                    for (e in i) if (void 0 !== t.style[e]) return i[e];
                })(),
                i = p(e, "gslide-media") ? e : e.querySelector(".gslide-media"),
                n = e.querySelector(".gslide-description");
            c(i, "greset"),
                m(i, "translate3d(0, 0, 0)"),
                d(t, {
                    onElement: i,
                    once: !0,
                    withCallback: function (e, t) {
                        u(i, "greset");
                    },
                }),
                (i.style.opacity = ""),
                n && (n.style.opacity = "");
        }
        var B = (function () {
                function e(i, n) {
                    var s = this,
                        r = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : null;
                    if ((t(this, e), (this.img = i), (this.slide = n), (this.onclose = r), this.img.setZoomEvents))
                        return !1;
                    (this.active = !1),
                        (this.zoomedIn = !1),
                        (this.dragging = !1),
                        (this.currentX = null),
                        (this.currentY = null),
                        (this.initialX = null),
                        (this.initialY = null),
                        (this.xOffset = 0),
                        (this.yOffset = 0),
                        this.img.addEventListener(
                            "mousedown",
                            function (e) {
                                return s.dragStart(e);
                            },
                            !1
                        ),
                        this.img.addEventListener(
                            "mouseup",
                            function (e) {
                                return s.dragEnd(e);
                            },
                            !1
                        ),
                        this.img.addEventListener(
                            "mousemove",
                            function (e) {
                                return s.drag(e);
                            },
                            !1
                        ),
                        this.img.addEventListener(
                            "click",
                            function (e) {
                                return s.slide.classList.contains("dragging-nav")
                                    ? (s.zoomOut(), !1)
                                    : s.zoomedIn
                                      ? void (s.zoomedIn && !s.dragging && s.zoomOut())
                                      : s.zoomIn();
                            },
                            !1
                        ),
                        (this.img.setZoomEvents = !0);
                }
                return (
                    n(e, [
                        {
                            key: "zoomIn",
                            value: function () {
                                var e = this.widowWidth();
                                if (!(this.zoomedIn || e <= 768)) {
                                    var t = this.img;
                                    if (
                                        (t.setAttribute("data-style", t.getAttribute("style")),
                                        (t.style.maxWidth = t.naturalWidth + "px"),
                                        (t.style.maxHeight = t.naturalHeight + "px"),
                                        t.naturalWidth > e)
                                    ) {
                                        var i = e / 2 - t.naturalWidth / 2;
                                        this.setTranslate(this.img.parentNode, i, 0);
                                    }
                                    this.slide.classList.add("zoomed"), (this.zoomedIn = !0);
                                }
                            },
                        },
                        {
                            key: "zoomOut",
                            value: function () {
                                this.img.parentNode.setAttribute("style", ""),
                                    this.img.setAttribute("style", this.img.getAttribute("data-style")),
                                    this.slide.classList.remove("zoomed"),
                                    (this.zoomedIn = !1),
                                    (this.currentX = null),
                                    (this.currentY = null),
                                    (this.initialX = null),
                                    (this.initialY = null),
                                    (this.xOffset = 0),
                                    (this.yOffset = 0),
                                    this.onclose && "function" == typeof this.onclose && this.onclose();
                            },
                        },
                        {
                            key: "dragStart",
                            value: function (e) {
                                e.preventDefault(),
                                    this.zoomedIn
                                        ? ("touchstart" === e.type
                                              ? ((this.initialX = e.touches[0].clientX - this.xOffset),
                                                (this.initialY = e.touches[0].clientY - this.yOffset))
                                              : ((this.initialX = e.clientX - this.xOffset),
                                                (this.initialY = e.clientY - this.yOffset)),
                                          e.target === this.img &&
                                              ((this.active = !0), this.img.classList.add("dragging")))
                                        : (this.active = !1);
                            },
                        },
                        {
                            key: "dragEnd",
                            value: function (e) {
                                var t = this;
                                e.preventDefault(),
                                    (this.initialX = this.currentX),
                                    (this.initialY = this.currentY),
                                    (this.active = !1),
                                    setTimeout(function () {
                                        (t.dragging = !1), (t.img.isDragging = !1), t.img.classList.remove("dragging");
                                    }, 100);
                            },
                        },
                        {
                            key: "drag",
                            value: function (e) {
                                this.active &&
                                    (e.preventDefault(),
                                    "touchmove" === e.type
                                        ? ((this.currentX = e.touches[0].clientX - this.initialX),
                                          (this.currentY = e.touches[0].clientY - this.initialY))
                                        : ((this.currentX = e.clientX - this.initialX),
                                          (this.currentY = e.clientY - this.initialY)),
                                    (this.xOffset = this.currentX),
                                    (this.yOffset = this.currentY),
                                    (this.img.isDragging = !0),
                                    (this.dragging = !0),
                                    this.setTranslate(this.img, this.currentX, this.currentY));
                            },
                        },
                        {
                            key: "onMove",
                            value: function (e) {
                                if (this.zoomedIn) {
                                    var t = e.clientX - this.img.naturalWidth / 2,
                                        i = e.clientY - this.img.naturalHeight / 2;
                                    this.setTranslate(this.img, t, i);
                                }
                            },
                        },
                        {
                            key: "setTranslate",
                            value: function (e, t, i) {
                                e.style.transform = "translate3d(" + t + "px, " + i + "px, 0)";
                            },
                        },
                        {
                            key: "widowWidth",
                            value: function () {
                                return (
                                    window.innerWidth ||
                                    document.documentElement.clientWidth ||
                                    document.body.clientWidth
                                );
                            },
                        },
                    ]),
                    e
                );
            })(),
            V = (function () {
                function e() {
                    var i = this,
                        n = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {};
                    t(this, e);
                    var s = n.dragEl,
                        r = n.toleranceX,
                        a = n.toleranceY,
                        l = n.slide,
                        o = n.instance;
                    (this.el = s),
                        (this.active = !1),
                        (this.dragging = !1),
                        (this.currentX = null),
                        (this.currentY = null),
                        (this.initialX = null),
                        (this.initialY = null),
                        (this.xOffset = 0),
                        (this.yOffset = 0),
                        (this.direction = null),
                        (this.lastDirection = null),
                        (this.toleranceX = void 0 === r ? 40 : r),
                        (this.toleranceY = void 0 === a ? 65 : a),
                        (this.toleranceReached = !1),
                        (this.dragContainer = this.el),
                        (this.slide = void 0 === l ? null : l),
                        (this.instance = void 0 === o ? null : o),
                        this.el.addEventListener(
                            "mousedown",
                            function (e) {
                                return i.dragStart(e);
                            },
                            !1
                        ),
                        this.el.addEventListener(
                            "mouseup",
                            function (e) {
                                return i.dragEnd(e);
                            },
                            !1
                        ),
                        this.el.addEventListener(
                            "mousemove",
                            function (e) {
                                return i.drag(e);
                            },
                            !1
                        );
                }
                return (
                    n(e, [
                        {
                            key: "dragStart",
                            value: function (e) {
                                if (this.slide.classList.contains("zoomed")) this.active = !1;
                                else {
                                    "touchstart" === e.type
                                        ? ((this.initialX = e.touches[0].clientX - this.xOffset),
                                          (this.initialY = e.touches[0].clientY - this.yOffset))
                                        : ((this.initialX = e.clientX - this.xOffset),
                                          (this.initialY = e.clientY - this.yOffset));
                                    var t = e.target.nodeName.toLowerCase();
                                    e.target.classList.contains("nodrag") ||
                                    h(e.target, ".nodrag") ||
                                    -1 !== ["input", "select", "textarea", "button", "a"].indexOf(t)
                                        ? (this.active = !1)
                                        : (e.preventDefault(),
                                          (e.target === this.el || ("img" !== t && h(e.target, ".gslide-inline"))) &&
                                              ((this.active = !0),
                                              this.el.classList.add("dragging"),
                                              (this.dragContainer = h(e.target, ".ginner-container"))));
                                }
                            },
                        },
                        {
                            key: "dragEnd",
                            value: function (e) {
                                var t = this;
                                e && e.preventDefault(),
                                    (this.initialX = 0),
                                    (this.initialY = 0),
                                    (this.currentX = null),
                                    (this.currentY = null),
                                    (this.initialX = null),
                                    (this.initialY = null),
                                    (this.xOffset = 0),
                                    (this.yOffset = 0),
                                    (this.active = !1),
                                    this.doSlideChange &&
                                        ((this.instance.preventOutsideClick = !0),
                                        "right" == this.doSlideChange && this.instance.prevSlide(),
                                        "left" == this.doSlideChange && this.instance.nextSlide()),
                                    this.doSlideClose && this.instance.close(),
                                    this.toleranceReached || this.setTranslate(this.dragContainer, 0, 0, !0),
                                    setTimeout(function () {
                                        (t.instance.preventOutsideClick = !1),
                                            (t.toleranceReached = !1),
                                            (t.lastDirection = null),
                                            (t.dragging = !1),
                                            (t.el.isDragging = !1),
                                            t.el.classList.remove("dragging"),
                                            t.slide.classList.remove("dragging-nav"),
                                            (t.dragContainer.style.transform = ""),
                                            (t.dragContainer.style.transition = "");
                                    }, 100);
                            },
                        },
                        {
                            key: "drag",
                            value: function (e) {
                                if (this.active) {
                                    e.preventDefault(),
                                        this.slide.classList.add("dragging-nav"),
                                        "touchmove" === e.type
                                            ? ((this.currentX = e.touches[0].clientX - this.initialX),
                                              (this.currentY = e.touches[0].clientY - this.initialY))
                                            : ((this.currentX = e.clientX - this.initialX),
                                              (this.currentY = e.clientY - this.initialY)),
                                        (this.xOffset = this.currentX),
                                        (this.yOffset = this.currentY),
                                        (this.el.isDragging = !0),
                                        (this.dragging = !0),
                                        (this.doSlideChange = !1),
                                        (this.doSlideClose = !1);
                                    var t = Math.abs(this.currentX),
                                        i = Math.abs(this.currentY);
                                    if (
                                        t > 0 &&
                                        t >= Math.abs(this.currentY) &&
                                        (!this.lastDirection || "x" == this.lastDirection)
                                    ) {
                                        (this.yOffset = 0),
                                            (this.lastDirection = "x"),
                                            this.setTranslate(this.dragContainer, this.currentX, 0);
                                        var n = this.shouldChange();
                                        if (
                                            (!this.instance.settings.dragAutoSnap && n && (this.doSlideChange = n),
                                            this.instance.settings.dragAutoSnap && n)
                                        )
                                            return (
                                                (this.instance.preventOutsideClick = !0),
                                                (this.toleranceReached = !0),
                                                (this.active = !1),
                                                (this.instance.preventOutsideClick = !0),
                                                this.dragEnd(null),
                                                "right" == n && this.instance.prevSlide(),
                                                void ("left" == n && this.instance.nextSlide())
                                            );
                                    }
                                    if (
                                        this.toleranceY > 0 &&
                                        i > 0 &&
                                        i >= t &&
                                        (!this.lastDirection || "y" == this.lastDirection)
                                    ) {
                                        (this.xOffset = 0),
                                            (this.lastDirection = "y"),
                                            this.setTranslate(this.dragContainer, 0, this.currentY);
                                        var s = this.shouldClose();
                                        return (
                                            !this.instance.settings.dragAutoSnap && s && (this.doSlideClose = !0),
                                            void (this.instance.settings.dragAutoSnap && s && this.instance.close())
                                        );
                                    }
                                }
                            },
                        },
                        {
                            key: "shouldChange",
                            value: function () {
                                var e = !1;
                                if (Math.abs(this.currentX) >= this.toleranceX) {
                                    var t = this.currentX > 0 ? "right" : "left";
                                    (("left" == t && this.slide !== this.slide.parentNode.lastChild) ||
                                        ("right" == t && this.slide !== this.slide.parentNode.firstChild)) &&
                                        (e = t);
                                }
                                return e;
                            },
                        },
                        {
                            key: "shouldClose",
                            value: function () {
                                var e = !1;
                                return Math.abs(this.currentY) >= this.toleranceY && (e = !0), e;
                            },
                        },
                        {
                            key: "setTranslate",
                            value: function (e, t, i) {
                                var n = arguments.length > 3 && void 0 !== arguments[3] && arguments[3];
                                (e.style.transition = n ? "all .2s ease" : ""),
                                    (e.style.transform = "translate3d(".concat(t, "px, ").concat(i, "px, 0)"));
                            },
                        },
                    ]),
                    e
                );
            })();
        function X(e, t, i, n) {
            var s = this,
                r = e.querySelector(".ginner-container"),
                a = "gvideo" + i,
                l = e.querySelector(".gslide-media"),
                o = this.getAllPlayers();
            c(r, "gvideo-container"), l.insertBefore(v('<div class="gvideo-wrapper"></div>'), l.firstChild);
            var d = e.querySelector(".gvideo-wrapper");
            b(this.settings.plyr.css, "Plyr");
            var u = t.href,
                p = location.protocol.replace(":", ""),
                h = "",
                f = "",
                m = !1;
            "file" == p && (p = "http"),
                (l.style.maxWidth = t.width),
                b(this.settings.plyr.js, "Plyr", function () {
                    if (
                        (u.match(/vimeo\.com\/([0-9]*)/) && ((h = "vimeo"), (f = /vimeo.*\/(\d+)/i.exec(u)[1])),
                        (u.match(/(youtube\.com|youtube-nocookie\.com)\/watch\?v=([a-zA-Z0-9\-_]+)/) ||
                            u.match(/youtu\.be\/([a-zA-Z0-9\-_]+)/) ||
                            u.match(/(youtube\.com|youtube-nocookie\.com)\/embed\/([a-zA-Z0-9\-_]+)/)) &&
                            ((h = "youtube"),
                            (f = r =
                                void 0 !==
                                (e = (e = u).replace(/(>|<)/gi, "").split(/(vi\/|v=|\/v\/|youtu\.be\/|\/embed\/)/))[2]
                                    ? (r = e[2].split(/[^0-9a-z_\-]/i))[0]
                                    : e)),
                        null !== u.match(/\.(mp4|ogg|webm|mov)$/))
                    ) {
                        h = "local";
                        var e,
                            r,
                            l = '<video id="' + a + '" ';
                        (l += 'style="background:#000; max-width: '.concat(t.width, ';" ')),
                            (l += 'preload="metadata" '),
                            (l += 'x-webkit-airplay="allow" '),
                            (l += 'webkit-playsinline="" '),
                            (l += "controls "),
                            (l += 'class="gvideo-local">');
                        var p = u.toLowerCase().split(".").pop(),
                            g = { mp4: "", ogg: "", webm: "" };
                        for (var $ in ((g[(p = "mov" == p ? "mp4" : p)] = u), g))
                            if (g.hasOwnProperty($)) {
                                var y = g[$];
                                t.hasOwnProperty($) && (y = t[$]),
                                    "" !== y && (l += '<source src="'.concat(y, '" type="video/').concat($, '">'));
                            }
                        m = v((l += "</video>"));
                    }
                    var _ =
                        m ||
                        v(
                            '<div id="'
                                .concat(a, '" data-plyr-provider="')
                                .concat(h, '" data-plyr-embed-id="')
                                .concat(f, '"></div>')
                        );
                    c(d, "".concat(h, "-video gvideo")),
                        d.appendChild(_),
                        d.setAttribute("data-id", a),
                        d.setAttribute("data-index", i);
                    var b = A(s.settings.plyr, "config") ? s.settings.plyr.config : {},
                        x = new Plyr("#" + a, b);
                    x.on("ready", function (e) {
                        var t = e.detail.plyr;
                        (o[a] = t), w(n) && n();
                    }),
                        x.on("enterfullscreen", Y),
                        x.on("exitfullscreen", Y);
                });
        }
        function Y(e) {
            var t = h(e.target, ".gslide-media");
            "enterfullscreen" == e.type && c(t, "fullscreen"), "exitfullscreen" == e.type && u(t, "fullscreen");
        }
        function R(e, t, i, n) {
            var s,
                r = this,
                a = e.querySelector(".gslide-media"),
                l = !(!A(t, "href") || !t.href) && t.href.split("#").pop().trim(),
                o = !(!A(t, "content") || !t.content) && t.content;
            if (o && (S(o) && (s = v('<div class="ginlined-content">'.concat(o, "</div>"))), E(o))) {
                "none" == o.style.display && (o.style.display = "block");
                var u = document.createElement("div");
                (u.className = "ginlined-content"), u.appendChild(o), (s = u);
            }
            if (l) {
                var p = document.getElementById(l);
                if (!p) return !1;
                var h = p.cloneNode(!0);
                (h.style.height = t.height), (h.style.maxWidth = t.width), c(h, "ginlined-content"), (s = h);
            }
            if (!s) return console.error("Unable to append inline slide content", t), !1;
            (a.style.height = t.height),
                (a.style.width = t.width),
                a.appendChild(s),
                (this.events["inlineclose" + l] = d("click", {
                    onElement: a.querySelectorAll(".gtrigger-close"),
                    withCallback: function (e) {
                        e.preventDefault(), r.close();
                    },
                })),
                w(n) && n();
        }
        function H(e, t, i, n) {
            var s,
                r,
                a,
                l,
                o,
                d,
                u = e.querySelector(".gslide-media"),
                p =
                    ((r = (s = { url: t.href, callback: n }).url),
                    (a = s.allow),
                    (l = s.callback),
                    (o = s.appendTo),
                    ((d = document.createElement("iframe")).className = "vimeo-video gvideo"),
                    (d.src = r),
                    (d.style.width = "100%"),
                    (d.style.height = "100%"),
                    a && d.setAttribute("allow", a),
                    (d.onload = function () {
                        c(d, "node-ready"), w(l) && l();
                    }),
                    o && o.appendChild(d),
                    d);
            (u.parentNode.style.maxWidth = t.width), (u.parentNode.style.height = t.height), u.appendChild(p);
        }
        var q = (function () {
                function e() {
                    var i = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {};
                    t(this, e),
                        (this.defaults = {
                            href: "",
                            title: "",
                            type: "",
                            description: "",
                            descPosition: "bottom",
                            effect: "",
                            width: "",
                            height: "",
                            content: !1,
                            zoomable: !0,
                            draggable: !0,
                        }),
                        k(i) && (this.defaults = a(this.defaults, i));
                }
                return (
                    n(e, [
                        {
                            key: "sourceType",
                            value: function (e) {
                                var t = e;
                                return null !== (e = e.toLowerCase()).match(/\.(jpeg|jpg|jpe|gif|png|apn|webp|svg)$/)
                                    ? "image"
                                    : e.match(/(youtube\.com|youtube-nocookie\.com)\/watch\?v=([a-zA-Z0-9\-_]+)/) ||
                                        e.match(/youtu\.be\/([a-zA-Z0-9\-_]+)/) ||
                                        e.match(/(youtube\.com|youtube-nocookie\.com)\/embed\/([a-zA-Z0-9\-_]+)/) ||
                                        e.match(/vimeo\.com\/([0-9]*)/) ||
                                        null !== e.match(/\.(mp4|ogg|webm|mov)$/)
                                      ? "video"
                                      : null !== e.match(/\.(mp3|wav|wma|aac|ogg)$/)
                                        ? "audio"
                                        : e.indexOf("#") > -1 && "" !== t.split("#").pop().trim()
                                          ? "inline"
                                          : e.indexOf("goajax=true") > -1
                                            ? "ajax"
                                            : "external";
                            },
                        },
                        {
                            key: "parseConfig",
                            value: function (e, t) {
                                var i = this,
                                    n = a({ descPosition: t.descPosition }, this.defaults);
                                if (k(e) && !E(e)) {
                                    A(e, "type") ||
                                        (A(e, "content") && e.content
                                            ? (e.type = "inline")
                                            : A(e, "href") && (e.type = this.sourceType(e.href)));
                                    var s = a(n, e);
                                    return this.setSize(s, t), s;
                                }
                                var r = "",
                                    o = e.getAttribute("data-glightbox"),
                                    d = e.nodeName.toLowerCase();
                                if (
                                    ("a" === d && (r = e.href),
                                    "img" === d && (r = e.src),
                                    (n.href = r),
                                    l(n, function (s, r) {
                                        A(t, r) && "width" !== r && (n[r] = t[r]);
                                        var a = e.dataset[r];
                                        P(a) || (n[r] = i.sanitizeValue(a));
                                    }),
                                    n.content && (n.type = "inline"),
                                    !n.type && r && (n.type = this.sourceType(r)),
                                    P(o))
                                ) {
                                    if (!n.title && "a" == d) {
                                        var c = e.title;
                                        P(c) || "" === c || (n.title = c);
                                    }
                                    if (!n.title && "img" == d) {
                                        var u = e.alt;
                                        P(u) || "" === u || (n.title = u);
                                    }
                                } else {
                                    var p = [];
                                    l(n, function (e, t) {
                                        p.push(";\\s?" + t);
                                    }),
                                        (p = p.join("\\s?:|")),
                                        "" !== o.trim() &&
                                            l(n, function (e, t) {
                                                var s = RegExp("s?" + t + "s?:s?(.*?)(" + p + "s?:|$)"),
                                                    r = o.match(s);
                                                if (r && r.length && r[1]) {
                                                    var a = r[1].trim().replace(/;\s*$/, "");
                                                    n[t] = i.sanitizeValue(a);
                                                }
                                            });
                                }
                                if (
                                    n.description &&
                                    "." == n.description.substring(0, 1) &&
                                    document.querySelector(n.description)
                                )
                                    n.description = document.querySelector(n.description).innerHTML;
                                else {
                                    var h = e.querySelector(".glightbox-desc");
                                    h && (n.description = h.innerHTML);
                                }
                                return this.setSize(n, t), (this.slideConfig = n), n;
                            },
                        },
                        {
                            key: "setSize",
                            value: function (e, t) {
                                var i = "video" == e.type ? this.checkSize(t.videosWidth) : this.checkSize(t.width),
                                    n = this.checkSize(t.height);
                                return (
                                    (e.width = A(e, "width") && "" !== e.width ? this.checkSize(e.width) : i),
                                    (e.height = A(e, "height") && "" !== e.height ? this.checkSize(e.height) : n),
                                    e
                                );
                            },
                        },
                        {
                            key: "checkSize",
                            value: function (e) {
                                return L(e) ? "".concat(e, "px") : e;
                            },
                        },
                        {
                            key: "sanitizeValue",
                            value: function (e) {
                                return "true" !== e && "false" !== e ? e : "true" === e;
                            },
                        },
                    ]),
                    e
                );
            })(),
            G = (function () {
                function e(i, n, s) {
                    t(this, e), (this.element = i), (this.instance = n), (this.index = s);
                }
                return (
                    n(e, [
                        {
                            key: "setContent",
                            value: function () {
                                var e,
                                    t,
                                    i,
                                    n,
                                    s,
                                    r,
                                    a = this,
                                    l = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : null,
                                    o = arguments.length > 1 && void 0 !== arguments[1] && arguments[1];
                                if (p(l, "loaded")) return !1;
                                var d = this.instance.settings,
                                    u = this.slideConfig,
                                    h = x();
                                w(d.beforeSlideLoad) && d.beforeSlideLoad({ index: this.index, slide: l, player: !1 });
                                var f = u.type,
                                    m = u.descPosition,
                                    g = l.querySelector(".gslide-media"),
                                    $ = l.querySelector(".gslide-title"),
                                    v = l.querySelector(".gslide-desc"),
                                    y = l.querySelector(".gdesc-inner"),
                                    _ = o,
                                    b = "gSlideTitle_" + this.index,
                                    S = "gSlideDesc_" + this.index;
                                if (
                                    (w(d.afterSlideLoad) &&
                                        (_ = function () {
                                            w(o) && o(),
                                                d.afterSlideLoad({
                                                    index: a.index,
                                                    slide: l,
                                                    player: a.instance.getSlidePlayerInstance(a.index),
                                                });
                                        }),
                                    "" == u.title && "" == u.description
                                        ? y && y.parentNode.parentNode.removeChild(y.parentNode)
                                        : ($ && "" !== u.title
                                              ? (($.id = b), ($.innerHTML = u.title))
                                              : $.parentNode.removeChild($),
                                          v && "" !== u.description
                                              ? ((v.id = S),
                                                h && d.moreLength > 0
                                                    ? ((u.smallDescription = this.slideShortDesc(
                                                          u.description,
                                                          d.moreLength,
                                                          d.moreText
                                                      )),
                                                      (v.innerHTML = u.smallDescription),
                                                      this.descriptionEvents(v, u))
                                                    : (v.innerHTML = u.description))
                                              : v.parentNode.removeChild(v),
                                          c(g.parentNode, "desc-".concat(m)),
                                          c(y.parentNode, "description-".concat(m))),
                                    c(g, "gslide-".concat(f)),
                                    c(l, "loaded"),
                                    "video" !== f)
                                ) {
                                    if ("external" !== f)
                                        return "inline" === f
                                            ? (R.apply(this.instance, [l, u, this.index, _]),
                                              void (
                                                  d.draggable &&
                                                  new V({
                                                      dragEl: l.querySelector(".gslide-inline"),
                                                      toleranceX: d.dragToleranceX,
                                                      toleranceY: d.dragToleranceY,
                                                      slide: l,
                                                      instance: this.instance,
                                                  })
                                              ))
                                            : void ("image" !== f
                                                  ? w(_) && _()
                                                  : ((e = l),
                                                    (t = u),
                                                    (i = this.index),
                                                    (n = function () {
                                                        var e = l.querySelector("img");
                                                        d.draggable &&
                                                            new V({
                                                                dragEl: e,
                                                                toleranceX: d.dragToleranceX,
                                                                toleranceY: d.dragToleranceY,
                                                                slide: l,
                                                                instance: a.instance,
                                                            }),
                                                            u.zoomable &&
                                                                e.naturalWidth > e.offsetWidth &&
                                                                (c(e, "zoomable"),
                                                                new B(e, l, function () {
                                                                    a.instance.resize();
                                                                })),
                                                            w(_) && _();
                                                    }),
                                                    (s = e.querySelector(".gslide-media")),
                                                    void ((r = new Image()).addEventListener(
                                                        "load",
                                                        function () {
                                                            w(n) && n();
                                                        },
                                                        !1
                                                    ),
                                                    (r.src = t.href),
                                                    (r.alt = ""),
                                                    "" !== t.title &&
                                                        r.setAttribute("aria-labelledby", "gSlideTitle_" + i),
                                                    "" !== t.description &&
                                                        r.setAttribute("aria-describedby", "gSlideDesc_" + i),
                                                    s.insertBefore(r, s.firstChild))));
                                    H.apply(this, [l, u, this.index, _]);
                                } else X.apply(this.instance, [l, u, this.index, _]);
                            },
                        },
                        {
                            key: "slideShortDesc",
                            value: function (e) {
                                var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : 50,
                                    i = arguments.length > 2 && void 0 !== arguments[2] && arguments[2],
                                    n = document.createElement("div");
                                if (((n.innerHTML = e), (e = n.innerText.trim()).length <= t)) return e;
                                var s = e.substr(0, t - 1);
                                return i ? ((n = null), s + '... <a href="#" class="desc-more">' + i + "</a>") : s;
                            },
                        },
                        {
                            key: "descriptionEvents",
                            value: function (e, t) {
                                var i = this,
                                    n = e.querySelector(".desc-more");
                                if (!n) return !1;
                                d("click", {
                                    onElement: n,
                                    withCallback: function (e, n) {
                                        e.preventDefault();
                                        var s = document.body,
                                            r = h(n, ".gslide-desc");
                                        if (!r) return !1;
                                        (r.innerHTML = t.description), c(s, "gdesc-open");
                                        var a = d("click", {
                                            onElement: [s, h(r, ".gslide-description")],
                                            withCallback: function (e, n) {
                                                "a" !== e.target.nodeName.toLowerCase() &&
                                                    (u(s, "gdesc-open"),
                                                    c(s, "gdesc-closed"),
                                                    (r.innerHTML = t.smallDescription),
                                                    i.descriptionEvents(r, t),
                                                    setTimeout(function () {
                                                        u(s, "gdesc-closed");
                                                    }, 400),
                                                    a.destroy());
                                            },
                                        });
                                    },
                                });
                            },
                        },
                        {
                            key: "create",
                            value: function () {
                                return v(this.instance.settings.slideHTML);
                            },
                        },
                        {
                            key: "getConfig",
                            value: function () {
                                var e = new q(this.instance.settings.slideExtraAttributes);
                                return (
                                    (this.slideConfig = e.parseConfig(this.element, this.instance.settings)),
                                    this.slideConfig
                                );
                            },
                        },
                    ]),
                    e
                );
            })(),
            W = x(),
            F =
                null !== x() ||
                void 0 !== document.createTouch ||
                "ontouchstart" in window ||
                "onmsgesturechange" in window ||
                navigator.msMaxTouchPoints,
            j = document.getElementsByTagName("html")[0],
            U = {
                selector: ".glightbox",
                elements: null,
                skin: "clean",
                theme: "clean",
                closeButton: !0,
                startAt: null,
                autoplayVideos: !0,
                autofocusVideos: !0,
                descPosition: "bottom",
                width: "900px",
                height: "506px",
                videosWidth: "960px",
                beforeSlideChange: null,
                afterSlideChange: null,
                beforeSlideLoad: null,
                afterSlideLoad: null,
                slideInserted: null,
                slideRemoved: null,
                slideExtraAttributes: null,
                onOpen: null,
                onClose: null,
                loop: !1,
                zoomable: !0,
                draggable: !0,
                dragAutoSnap: !1,
                dragToleranceX: 40,
                dragToleranceY: 65,
                preload: !0,
                oneSlidePerOpen: !1,
                touchNavigation: !0,
                touchFollowAxis: !0,
                keyboardNavigation: !0,
                closeOnOutsideClick: !0,
                plugins: !1,
                plyr: {
                    css: "https://cdn.plyr.io/3.6.3/plyr.css",
                    js: "https://cdn.plyr.io/3.6.3/plyr.js",
                    config: {
                        ratio: "16:9",
                        fullscreen: { enabled: !0, iosNative: !0 },
                        youtube: { noCookie: !0, rel: 0, showinfo: 0, iv_load_policy: 3 },
                        vimeo: { byline: !1, portrait: !1, title: !1, transparent: !1 },
                    },
                },
                openEffect: "zoom",
                closeEffect: "zoom",
                slideEffect: "slide",
                moreText: "See more",
                moreLength: 60,
                cssEfects: {
                    fade: { in: "fadeIn", out: "fadeOut" },
                    zoom: { in: "zoomIn", out: "zoomOut" },
                    slide: { in: "slideInRight", out: "slideOutLeft" },
                    slideBack: { in: "slideInLeft", out: "slideOutRight" },
                    none: { in: "none", out: "none" },
                },
                svg: {
                    close: '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" xml:space="preserve"><g><g><path d="M505.943,6.058c-8.077-8.077-21.172-8.077-29.249,0L6.058,476.693c-8.077,8.077-8.077,21.172,0,29.249C10.096,509.982,15.39,512,20.683,512c5.293,0,10.586-2.019,14.625-6.059L505.943,35.306C514.019,27.23,514.019,14.135,505.943,6.058z"/></g></g><g><g><path d="M505.942,476.694L35.306,6.059c-8.076-8.077-21.172-8.077-29.248,0c-8.077,8.076-8.077,21.171,0,29.248l470.636,470.636c4.038,4.039,9.332,6.058,14.625,6.058c5.293,0,10.587-2.019,14.624-6.057C514.018,497.866,514.018,484.771,505.942,476.694z"/></g></g></svg>',
                    next: '<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 477.175 477.175" xml:space="preserve"> <g><path d="M360.731,229.075l-225.1-225.1c-5.3-5.3-13.8-5.3-19.1,0s-5.3,13.8,0,19.1l215.5,215.5l-215.5,215.5c-5.3,5.3-5.3,13.8,0,19.1c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-4l225.1-225.1C365.931,242.875,365.931,234.275,360.731,229.075z"/></g></svg>',
                    prev: '<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 477.175 477.175" xml:space="preserve"><g><path d="M145.188,238.575l215.5-215.5c5.3-5.3,5.3-13.8,0-19.1s-13.8-5.3-19.1,0l-225.1,225.1c-5.3,5.3-5.3,13.8,0,19.1l225.1,225c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4c5.3-5.3,5.3-13.8,0-19.1L145.188,238.575z"/></g></svg>',
                },
                slideHTML:
                    '<div class="gslide">\n    <div class="gslide-inner-content">\n        <div class="ginner-container">\n            <div class="gslide-media">\n            </div>\n            <div class="gslide-description">\n                <div class="gdesc-inner">\n                    <h4 class="gslide-title"></h4>\n                    <div class="gslide-desc"></div>\n                </div>\n            </div>\n        </div>\n    </div>\n</div>',
                lightboxHTML:
                    '<div id="glightbox-body" class="glightbox-container">\n    <div class="gloader visible"></div>\n    <div class="goverlay"></div>\n    <div class="gcontainer">\n    <div id="glightbox-slider" class="gslider"></div>\n    <button class="gnext gbtn" tabindex="0" aria-label="Next">{nextSVG}</button>\n    <button class="gprev gbtn" tabindex="1" aria-label="Previous">{prevSVG}</button>\n    <button class="gclose gbtn" tabindex="2" aria-label="Close">{closeSVG}</button>\n</div>\n</div>',
            },
            Z = (function () {
                function e() {
                    var i = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {};
                    t(this, e),
                        (this.settings = a(U, i)),
                        (this.effectsClasses = this.getAnimationClasses()),
                        (this.videoPlayers = {}),
                        (this.apiEvents = []),
                        (this.fullElementsList = !1);
                }
                return (
                    n(e, [
                        {
                            key: "init",
                            value: function () {
                                var e = this,
                                    t = this.getSelector();
                                t &&
                                    (this.baseEvents = d("click", {
                                        onElement: t,
                                        withCallback: function (t, i) {
                                            t.preventDefault(), e.open(i);
                                        },
                                    })),
                                    (this.elements = this.getElements());
                            },
                        },
                        {
                            key: "open",
                            value: function () {
                                var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : null,
                                    t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : null;
                                if (0 == this.elements.length) return !1;
                                (this.activeSlide = null),
                                    (this.prevActiveSlideIndex = null),
                                    (this.prevActiveSlide = null);
                                var i = L(t) ? t : this.settings.startAt;
                                if (E(e)) {
                                    var n = e.getAttribute("data-gallery");
                                    n &&
                                        ((this.fullElementsList = this.elements),
                                        (this.elements = this.getGalleryElements(this.elements, n))),
                                        P(i) && (i = this.getElementIndex(e)) < 0 && (i = 0);
                                }
                                L(i) || (i = 0),
                                    this.build(),
                                    f(
                                        this.overlay,
                                        "none" == this.settings.openEffect ? "none" : this.settings.cssEfects.fade.in
                                    );
                                var r = document.body,
                                    a = window.innerWidth - document.documentElement.clientWidth;
                                if (a > 0) {
                                    var l = document.createElement("style");
                                    (l.type = "text/css"),
                                        (l.className = "gcss-styles"),
                                        (l.innerText = ".gscrollbar-fixer {margin-right: ".concat(a, "px}")),
                                        document.head.appendChild(l),
                                        c(r, "gscrollbar-fixer");
                                }
                                c(r, "glightbox-open"),
                                    c(j, "glightbox-open"),
                                    W && (c(document.body, "glightbox-mobile"), (this.settings.slideEffect = "slide")),
                                    this.showSlide(i, !0),
                                    1 == this.elements.length
                                        ? (c(this.prevButton, "glightbox-button-hidden"),
                                          c(this.nextButton, "glightbox-button-hidden"))
                                        : (u(this.prevButton, "glightbox-button-hidden"),
                                          u(this.nextButton, "glightbox-button-hidden")),
                                    (this.lightboxOpen = !0),
                                    this.trigger("open"),
                                    w(this.settings.onOpen) && this.settings.onOpen(),
                                    F &&
                                        this.settings.touchNavigation &&
                                        (function e(t) {
                                            if (t.events.hasOwnProperty("touch")) return !1;
                                            var i,
                                                n,
                                                s,
                                                r = y(),
                                                a = r.width,
                                                l = r.height,
                                                o = !1,
                                                d = null,
                                                f = null,
                                                g = null,
                                                $ = !1,
                                                v = 1,
                                                _ = 1,
                                                b = !1,
                                                x = !1,
                                                w = null,
                                                S = null,
                                                E = null,
                                                T = null,
                                                C = 0,
                                                k = 0,
                                                P = !1,
                                                A = !1,
                                                z = {},
                                                L = {},
                                                O = 0,
                                                M = 0,
                                                I = document.getElementById("glightbox-slider"),
                                                B = document.querySelector(".goverlay"),
                                                V = new D(I, {
                                                    touchStart: function (e) {
                                                        (o = !0),
                                                            (p(e.targetTouches[0].target, "ginner-container") ||
                                                                h(e.targetTouches[0].target, ".gslide-desc") ||
                                                                "a" ==
                                                                    e.targetTouches[0].target.nodeName.toLowerCase()) &&
                                                                (o = !1),
                                                            h(e.targetTouches[0].target, ".gslide-inline") &&
                                                                !p(
                                                                    e.targetTouches[0].target.parentNode,
                                                                    "gslide-inline"
                                                                ) &&
                                                                (o = !1),
                                                            !o ||
                                                                ((L = e.targetTouches[0]),
                                                                (z.pageX = e.targetTouches[0].pageX),
                                                                (z.pageY = e.targetTouches[0].pageY),
                                                                (O = e.targetTouches[0].clientX),
                                                                (M = e.targetTouches[0].clientY),
                                                                (f = (d = t.activeSlide).querySelector(
                                                                    ".gslide-media"
                                                                )),
                                                                (s = d.querySelector(".gslide-inline")),
                                                                (g = null),
                                                                p(f, "gslide-image") && (g = f.querySelector("img")),
                                                                u(B, "greset"),
                                                                (e.pageX > 20 && e.pageX < window.innerWidth - 20) ||
                                                                    e.preventDefault());
                                                    },
                                                    touchMove: function (e) {
                                                        if (o && ((L = e.targetTouches[0]), !b && !x)) {
                                                            if (
                                                                s &&
                                                                s.offsetHeight > l &&
                                                                13 >= Math.abs(z.pageX - L.pageX)
                                                            )
                                                                return !1;
                                                            $ = !0;
                                                            var r,
                                                                d,
                                                                c = e.targetTouches[0].clientX;
                                                            if (
                                                                (Math.abs(O - c) >
                                                                Math.abs(M - e.targetTouches[0].clientY)
                                                                    ? ((P = !1), (A = !0))
                                                                    : ((A = !1), (P = !0)),
                                                                (C = (100 * (i = L.pageX - z.pageX)) / a),
                                                                (k = (100 * (n = L.pageY - z.pageY)) / l),
                                                                P &&
                                                                    g &&
                                                                    ((r = 1 - Math.abs(n) / l),
                                                                    (B.style.opacity = r),
                                                                    t.settings.touchFollowAxis && (C = 0)),
                                                                A &&
                                                                    ((r = 1 - Math.abs(i) / a),
                                                                    (f.style.opacity = r),
                                                                    t.settings.touchFollowAxis && (k = 0)),
                                                                !g)
                                                            )
                                                                return m(f, "translate3d(".concat(C, "%, 0, 0)"));
                                                            m(f, "translate3d(".concat(C, "%, ").concat(k, "%, 0)"));
                                                        }
                                                    },
                                                    touchEnd: function () {
                                                        if (o) {
                                                            if ((($ = !1), x || b)) return (E = w), void (T = S);
                                                            var e = Math.abs(parseInt(k)),
                                                                i = Math.abs(parseInt(C));
                                                            if (!(e > 29 && g))
                                                                return e < 29 && i < 25
                                                                    ? (c(B, "greset"), (B.style.opacity = 1), N(f))
                                                                    : void 0;
                                                            t.close();
                                                        }
                                                    },
                                                    multipointEnd: function () {
                                                        setTimeout(function () {
                                                            b = !1;
                                                        }, 50);
                                                    },
                                                    multipointStart: function () {
                                                        (b = !0), (v = _ || 1);
                                                    },
                                                    pinch: function (e) {
                                                        if (!g || $) return !1;
                                                        (b = !0), (g.scaleX = g.scaleY = v * e.zoom);
                                                        var t = v * e.zoom;
                                                        if (((x = !0), t <= 1))
                                                            return (
                                                                (x = !1),
                                                                (t = 1),
                                                                (T = null),
                                                                (E = null),
                                                                (w = null),
                                                                (S = null),
                                                                void g.setAttribute("style", "")
                                                            );
                                                        t > 4.5 && (t = 4.5),
                                                            (g.style.transform = "scale3d("
                                                                .concat(t, ", ")
                                                                .concat(t, ", 1)")),
                                                            (_ = t);
                                                    },
                                                    pressMove: function (e) {
                                                        if (x && !b) {
                                                            var t = L.pageX - z.pageX,
                                                                i = L.pageY - z.pageY;
                                                            E && (t += E), T && (i += T), (w = t), (S = i);
                                                            var n = "translate3d("
                                                                .concat(t, "px, ")
                                                                .concat(i, "px, 0)");
                                                            _ && (n += " scale3d(".concat(_, ", ").concat(_, ", 1)")),
                                                                m(g, n);
                                                        }
                                                    },
                                                    swipe: function (e) {
                                                        if (!x) {
                                                            if (b) b = !1;
                                                            else {
                                                                if ("Left" == e.direction) {
                                                                    if (t.index == t.elements.length - 1) return N(f);
                                                                    t.nextSlide();
                                                                }
                                                                if ("Right" == e.direction) {
                                                                    if (0 == t.index) return N(f);
                                                                    t.prevSlide();
                                                                }
                                                            }
                                                        }
                                                    },
                                                });
                                            t.events.touch = V;
                                        })(this),
                                    this.settings.keyboardNavigation &&
                                        (function e(t) {
                                            if (t.events.hasOwnProperty("keyboard")) return !1;
                                            t.events.keyboard = d("keydown", {
                                                onElement: window,
                                                withCallback: function (e, i) {
                                                    var n = (e = e || window.event).keyCode;
                                                    if (9 == n) {
                                                        var r =
                                                            !(
                                                                !document.activeElement ||
                                                                !document.activeElement.nodeName
                                                            ) && document.activeElement.nodeName.toLocaleLowerCase();
                                                        if ("input" == r || "textarea" == r || "button" == r) return;
                                                        e.preventDefault();
                                                        var a = document.querySelectorAll(".gbtn");
                                                        if (!a || a.length <= 0) return;
                                                        var l,
                                                            o = (
                                                                (function (e) {
                                                                    if (Array.isArray(e)) return s(e);
                                                                })((l = a)) ||
                                                                (function (e) {
                                                                    if (
                                                                        "undefined" != typeof Symbol &&
                                                                        Symbol.iterator in Object(e)
                                                                    )
                                                                        return Array.from(e);
                                                                })(l) ||
                                                                (function (e, t) {
                                                                    if (e) {
                                                                        if ("string" == typeof e) return s(e, t);
                                                                        var i = Object.prototype.toString
                                                                            .call(e)
                                                                            .slice(8, -1);
                                                                        if (
                                                                            ("Object" === i &&
                                                                                e.constructor &&
                                                                                (i = e.constructor.name),
                                                                            "Map" === i || "Set" === i)
                                                                        )
                                                                            return Array.from(e);
                                                                        if (
                                                                            "Arguments" === i ||
                                                                            /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(
                                                                                i
                                                                            )
                                                                        )
                                                                            return s(e, t);
                                                                    }
                                                                })(l) ||
                                                                (function () {
                                                                    throw TypeError(
                                                                        "Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."
                                                                    );
                                                                })()
                                                            ).filter(function (e) {
                                                                return p(e, "focused");
                                                            });
                                                        if (!o.length) {
                                                            var d = document.querySelector('.gbtn[tabindex="0"]');
                                                            return void (d && (d.focus(), c(d, "focused")));
                                                        }
                                                        a.forEach(function (e) {
                                                            return u(e, "focused");
                                                        });
                                                        var h = o[0].getAttribute("tabindex");
                                                        h = h || "0";
                                                        var f = parseInt(h) + 1;
                                                        f > a.length - 1 && (f = "0");
                                                        var m = document.querySelector(
                                                            '.gbtn[tabindex="'.concat(f, '"]')
                                                        );
                                                        m && (m.focus(), c(m, "focused"));
                                                    }
                                                    39 == n && t.nextSlide(),
                                                        37 == n && t.prevSlide(),
                                                        27 == n && t.close();
                                                },
                                            });
                                        })(this);
                            },
                        },
                        {
                            key: "openAt",
                            value: function () {
                                var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : 0;
                                this.open(null, e);
                            },
                        },
                        {
                            key: "showSlide",
                            value: function () {
                                var e = this,
                                    t = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : 0,
                                    i = arguments.length > 1 && void 0 !== arguments[1] && arguments[1];
                                g(this.loader), (this.index = parseInt(t));
                                var n = this.slidesContainer.querySelector(".current");
                                n && u(n, "current"), this.slideAnimateOut();
                                var s = this.slidesContainer.querySelectorAll(".gslide")[t];
                                if (p(s, "loaded")) this.slideAnimateIn(s, i), $(this.loader);
                                else {
                                    g(this.loader);
                                    var r = this.elements[t],
                                        a = {
                                            index: this.index,
                                            slide: s,
                                            slideNode: s,
                                            slideConfig: r.slideConfig,
                                            slideIndex: this.index,
                                            trigger: r.node,
                                            player: null,
                                        };
                                    this.trigger("slide_before_load", a),
                                        r.instance.setContent(s, function () {
                                            $(e.loader),
                                                e.resize(),
                                                e.slideAnimateIn(s, i),
                                                e.trigger("slide_after_load", a);
                                        });
                                }
                                (this.slideDescription = s.querySelector(".gslide-description")),
                                    (this.slideDescriptionContained =
                                        this.slideDescription && p(this.slideDescription.parentNode, "gslide-media")),
                                    this.settings.preload && (this.preloadSlide(t + 1), this.preloadSlide(t - 1)),
                                    this.updateNavigationClasses(),
                                    (this.activeSlide = s);
                            },
                        },
                        {
                            key: "preloadSlide",
                            value: function (e) {
                                var t = this;
                                if (e < 0 || e > this.elements.length - 1 || P(this.elements[e])) return !1;
                                var i = this.slidesContainer.querySelectorAll(".gslide")[e];
                                if (p(i, "loaded")) return !1;
                                var n = this.elements[e],
                                    s = n.type,
                                    r = {
                                        index: e,
                                        slide: i,
                                        slideNode: i,
                                        slideConfig: n.slideConfig,
                                        slideIndex: e,
                                        trigger: n.node,
                                        player: null,
                                    };
                                this.trigger("slide_before_load", r),
                                    "video" == s || "external" == s
                                        ? setTimeout(function () {
                                              n.instance.setContent(i, function () {
                                                  t.trigger("slide_after_load", r);
                                              });
                                          }, 200)
                                        : n.instance.setContent(i, function () {
                                              t.trigger("slide_after_load", r);
                                          });
                            },
                        },
                        {
                            key: "prevSlide",
                            value: function () {
                                this.goToSlide(this.index - 1);
                            },
                        },
                        {
                            key: "nextSlide",
                            value: function () {
                                this.goToSlide(this.index + 1);
                            },
                        },
                        {
                            key: "goToSlide",
                            value: function () {
                                var e = arguments.length > 0 && void 0 !== arguments[0] && arguments[0];
                                if (
                                    ((this.prevActiveSlide = this.activeSlide),
                                    (this.prevActiveSlideIndex = this.index),
                                    !this.loop() && (e < 0 || e > this.elements.length - 1))
                                )
                                    return !1;
                                e < 0 ? (e = this.elements.length - 1) : e >= this.elements.length && (e = 0),
                                    this.showSlide(e);
                            },
                        },
                        {
                            key: "insertSlide",
                            value: function () {
                                var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                                    t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : -1;
                                t < 0 && (t = this.elements.length);
                                var i = new G(e, this, t),
                                    n = i.getConfig(),
                                    s = a({}, n),
                                    r = i.create(),
                                    l = this.elements.length - 1;
                                (s.index = t),
                                    (s.node = !1),
                                    (s.instance = i),
                                    (s.slideConfig = n),
                                    this.elements.splice(t, 0, s);
                                var o = null,
                                    d = null;
                                if (this.slidesContainer) {
                                    if (t > l) this.slidesContainer.appendChild(r);
                                    else {
                                        var c = this.slidesContainer.querySelectorAll(".gslide")[t];
                                        this.slidesContainer.insertBefore(r, c);
                                    }
                                    ((this.settings.preload && 0 == this.index && 0 == t) ||
                                        this.index - 1 == t ||
                                        this.index + 1 == t) &&
                                        this.preloadSlide(t),
                                        0 == this.index && 0 == t && (this.index = 1),
                                        this.updateNavigationClasses(),
                                        (o = this.slidesContainer.querySelectorAll(".gslide")[t]),
                                        (d = this.getSlidePlayerInstance(t)),
                                        (s.slideNode = o);
                                }
                                this.trigger("slide_inserted", {
                                    index: t,
                                    slide: o,
                                    slideNode: o,
                                    slideConfig: n,
                                    slideIndex: t,
                                    trigger: null,
                                    player: d,
                                }),
                                    w(this.settings.slideInserted) &&
                                        this.settings.slideInserted({ index: t, slide: o, player: d });
                            },
                        },
                        {
                            key: "removeSlide",
                            value: function () {
                                var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : -1;
                                if (e < 0 || e > this.elements.length - 1) return !1;
                                var t = this.slidesContainer && this.slidesContainer.querySelectorAll(".gslide")[e];
                                t &&
                                    (this.getActiveSlideIndex() == e &&
                                        (e == this.elements.length - 1 ? this.prevSlide() : this.nextSlide()),
                                    t.parentNode.removeChild(t)),
                                    this.elements.splice(e, 1),
                                    this.trigger("slide_removed", e),
                                    w(this.settings.slideRemoved) && this.settings.slideRemoved(e);
                            },
                        },
                        {
                            key: "slideAnimateIn",
                            value: function (e, t) {
                                var i = this,
                                    n = e.querySelector(".gslide-media"),
                                    s = e.querySelector(".gslide-description"),
                                    r = {
                                        index: this.prevActiveSlideIndex,
                                        slide: this.prevActiveSlide,
                                        slideNode: this.prevActiveSlide,
                                        slideIndex: this.prevActiveSlide,
                                        slideConfig: P(this.prevActiveSlideIndex)
                                            ? null
                                            : this.elements[this.prevActiveSlideIndex].slideConfig,
                                        trigger: P(this.prevActiveSlideIndex)
                                            ? null
                                            : this.elements[this.prevActiveSlideIndex].node,
                                        player: this.getSlidePlayerInstance(this.prevActiveSlideIndex),
                                    },
                                    a = {
                                        index: this.index,
                                        slide: this.activeSlide,
                                        slideNode: this.activeSlide,
                                        slideConfig: this.elements[this.index].slideConfig,
                                        slideIndex: this.index,
                                        trigger: this.elements[this.index].node,
                                        player: this.getSlidePlayerInstance(this.index),
                                    };
                                if (
                                    (n.offsetWidth > 0 && s && ($(s), (s.style.display = "")),
                                    u(e, this.effectsClasses),
                                    t)
                                )
                                    f(e, this.settings.cssEfects[this.settings.openEffect].in, function () {
                                        i.settings.autoplayVideos && i.slidePlayerPlay(e),
                                            i.trigger("slide_changed", { prev: r, current: a }),
                                            w(i.settings.afterSlideChange) &&
                                                i.settings.afterSlideChange.apply(i, [r, a]);
                                    });
                                else {
                                    var l = this.settings.slideEffect,
                                        o = "none" !== l ? this.settings.cssEfects[l].in : l;
                                    this.prevActiveSlideIndex > this.index &&
                                        "slide" == this.settings.slideEffect &&
                                        (o = this.settings.cssEfects.slideBack.in),
                                        f(e, o, function () {
                                            i.settings.autoplayVideos && i.slidePlayerPlay(e),
                                                i.trigger("slide_changed", { prev: r, current: a }),
                                                w(i.settings.afterSlideChange) &&
                                                    i.settings.afterSlideChange.apply(i, [r, a]);
                                        });
                                }
                                setTimeout(function () {
                                    i.resize(e);
                                }, 100),
                                    c(e, "current");
                            },
                        },
                        {
                            key: "slideAnimateOut",
                            value: function () {
                                if (!this.prevActiveSlide) return !1;
                                var e = this.prevActiveSlide;
                                u(e, this.effectsClasses), c(e, "prev");
                                var t = this.settings.slideEffect,
                                    i = "none" !== t ? this.settings.cssEfects[t].out : t;
                                this.slidePlayerPause(e),
                                    this.trigger("slide_before_change", {
                                        prev: {
                                            index: this.prevActiveSlideIndex,
                                            slide: this.prevActiveSlide,
                                            slideNode: this.prevActiveSlide,
                                            slideIndex: this.prevActiveSlideIndex,
                                            slideConfig: P(this.prevActiveSlideIndex)
                                                ? null
                                                : this.elements[this.prevActiveSlideIndex].slideConfig,
                                            trigger: P(this.prevActiveSlideIndex)
                                                ? null
                                                : this.elements[this.prevActiveSlideIndex].node,
                                            player: this.getSlidePlayerInstance(this.prevActiveSlideIndex),
                                        },
                                        current: {
                                            index: this.index,
                                            slide: this.activeSlide,
                                            slideNode: this.activeSlide,
                                            slideIndex: this.index,
                                            slideConfig: this.elements[this.index].slideConfig,
                                            trigger: this.elements[this.index].node,
                                            player: this.getSlidePlayerInstance(this.index),
                                        },
                                    }),
                                    w(this.settings.beforeSlideChange) &&
                                        this.settings.beforeSlideChange.apply(this, [
                                            {
                                                index: this.prevActiveSlideIndex,
                                                slide: this.prevActiveSlide,
                                                player: this.getSlidePlayerInstance(this.prevActiveSlideIndex),
                                            },
                                            {
                                                index: this.index,
                                                slide: this.activeSlide,
                                                player: this.getSlidePlayerInstance(this.index),
                                            },
                                        ]),
                                    this.prevActiveSlideIndex > this.index &&
                                        "slide" == this.settings.slideEffect &&
                                        (i = this.settings.cssEfects.slideBack.out),
                                    f(e, i, function () {
                                        var t = e.querySelector(".gslide-media"),
                                            i = e.querySelector(".gslide-description");
                                        (t.style.transform = ""),
                                            u(t, "greset"),
                                            (t.style.opacity = ""),
                                            i && (i.style.opacity = ""),
                                            u(e, "prev");
                                    });
                            },
                        },
                        {
                            key: "getAllPlayers",
                            value: function () {
                                return this.videoPlayers;
                            },
                        },
                        {
                            key: "getSlidePlayerInstance",
                            value: function (e) {
                                var t = "gvideo" + e,
                                    i = this.getAllPlayers();
                                return !(!A(i, t) || !i[t]) && i[t];
                            },
                        },
                        {
                            key: "stopSlideVideo",
                            value: function (e) {
                                if (E(e)) {
                                    var t = e.querySelector(".gvideo-wrapper");
                                    t && (e = t.getAttribute("data-index"));
                                }
                                console.log("stopSlideVideo is deprecated, use slidePlayerPause");
                                var i = this.getSlidePlayerInstance(e);
                                i && i.playing && i.pause();
                            },
                        },
                        {
                            key: "slidePlayerPause",
                            value: function (e) {
                                if (E(e)) {
                                    var t = e.querySelector(".gvideo-wrapper");
                                    t && (e = t.getAttribute("data-index"));
                                }
                                var i = this.getSlidePlayerInstance(e);
                                i && i.playing && i.pause();
                            },
                        },
                        {
                            key: "playSlideVideo",
                            value: function (e) {
                                if (E(e)) {
                                    var t = e.querySelector(".gvideo-wrapper");
                                    t && (e = t.getAttribute("data-index"));
                                }
                                console.log("playSlideVideo is deprecated, use slidePlayerPlay");
                                var i = this.getSlidePlayerInstance(e);
                                i && !i.playing && i.play();
                            },
                        },
                        {
                            key: "slidePlayerPlay",
                            value: function (e) {
                                if (E(e)) {
                                    var t = e.querySelector(".gvideo-wrapper");
                                    t && (e = t.getAttribute("data-index"));
                                }
                                var i = this.getSlidePlayerInstance(e);
                                console.log("Player is"),
                                    console.log(i),
                                    i &&
                                        !i.playing &&
                                        (i.play(), this.settings.autofocusVideos && i.elements.container.focus());
                            },
                        },
                        {
                            key: "setElements",
                            value: function (e) {
                                var t = this;
                                this.settings.elements = !1;
                                var i = [];
                                e &&
                                    e.length &&
                                    l(e, function (e, n) {
                                        var s = new G(e, t, n),
                                            r = s.getConfig(),
                                            l = a({}, r);
                                        (l.slideConfig = r), (l.instance = s), (l.index = n), i.push(l);
                                    }),
                                    (this.elements = i),
                                    this.lightboxOpen &&
                                        ((this.slidesContainer.innerHTML = ""),
                                        this.elements.length &&
                                            (l(this.elements, function () {
                                                var e = v(t.settings.slideHTML);
                                                t.slidesContainer.appendChild(e);
                                            }),
                                            this.showSlide(0, !0)));
                            },
                        },
                        {
                            key: "getElementIndex",
                            value: function (e) {
                                var t = !1;
                                return (
                                    l(this.elements, function (i, n) {
                                        if (A(i, "node") && i.node == e) return (t = n), !0;
                                    }),
                                    t
                                );
                            },
                        },
                        {
                            key: "getElements",
                            value: function () {
                                var e = this,
                                    t = [];
                                (this.elements = this.elements ? this.elements : []),
                                    !P(this.settings.elements) &&
                                        T(this.settings.elements) &&
                                        this.settings.elements.length &&
                                        l(this.settings.elements, function (i, n) {
                                            var s = new G(i, e, n),
                                                r = s.getConfig(),
                                                l = a({}, r);
                                            (l.node = !1),
                                                (l.index = n),
                                                (l.instance = s),
                                                (l.slideConfig = r),
                                                t.push(l);
                                        });
                                var i = !1;
                                return (
                                    this.getSelector() && (i = document.querySelectorAll(this.getSelector())),
                                    i &&
                                        l(i, function (i, n) {
                                            var s = new G(i, e, n),
                                                r = s.getConfig(),
                                                l = a({}, r);
                                            (l.node = i),
                                                (l.index = n),
                                                (l.instance = s),
                                                (l.slideConfig = r),
                                                (l.gallery = i.getAttribute("data-gallery")),
                                                t.push(l);
                                        }),
                                    t
                                );
                            },
                        },
                        {
                            key: "getGalleryElements",
                            value: function (e, t) {
                                return e.filter(function (e) {
                                    return e.gallery == t;
                                });
                            },
                        },
                        {
                            key: "getSelector",
                            value: function () {
                                return (
                                    !this.settings.elements &&
                                    (this.settings.selector && "data-" == this.settings.selector.substring(0, 5)
                                        ? "*[".concat(this.settings.selector, "]")
                                        : this.settings.selector)
                                );
                            },
                        },
                        {
                            key: "getActiveSlide",
                            value: function () {
                                return this.slidesContainer.querySelectorAll(".gslide")[this.index];
                            },
                        },
                        {
                            key: "getActiveSlideIndex",
                            value: function () {
                                return this.index;
                            },
                        },
                        {
                            key: "getAnimationClasses",
                            value: function () {
                                var e = [];
                                for (var t in this.settings.cssEfects)
                                    if (this.settings.cssEfects.hasOwnProperty(t)) {
                                        var i = this.settings.cssEfects[t];
                                        e.push("g".concat(i.in)), e.push("g".concat(i.out));
                                    }
                                return e.join(" ");
                            },
                        },
                        {
                            key: "build",
                            value: function () {
                                var e = this;
                                if (this.built) return !1;
                                var t = A(this.settings.svg, "next") ? this.settings.svg.next : "",
                                    i = A(this.settings.svg, "prev") ? this.settings.svg.prev : "",
                                    n = A(this.settings.svg, "close") ? this.settings.svg.close : "",
                                    s = this.settings.lightboxHTML;
                                (s = v(
                                    (s = (s = (s = s.replace(/{nextSVG}/g, t)).replace(/{prevSVG}/g, i)).replace(
                                        /{closeSVG}/g,
                                        n
                                    ))
                                )),
                                    document.body.appendChild(s);
                                var r = document.getElementById("glightbox-body");
                                this.modal = r;
                                var a = r.querySelector(".gclose");
                                (this.prevButton = r.querySelector(".gprev")),
                                    (this.nextButton = r.querySelector(".gnext")),
                                    (this.overlay = r.querySelector(".goverlay")),
                                    (this.loader = r.querySelector(".gloader")),
                                    (this.slidesContainer = document.getElementById("glightbox-slider")),
                                    (this.events = {}),
                                    c(this.modal, "glightbox-" + this.settings.skin),
                                    this.settings.closeButton &&
                                        a &&
                                        (this.events.close = d("click", {
                                            onElement: a,
                                            withCallback: function (t, i) {
                                                t.preventDefault(), e.close();
                                            },
                                        })),
                                    a && !this.settings.closeButton && a.parentNode.removeChild(a),
                                    this.nextButton &&
                                        (this.events.next = d("click", {
                                            onElement: this.nextButton,
                                            withCallback: function (t, i) {
                                                t.preventDefault(), e.nextSlide();
                                            },
                                        })),
                                    this.prevButton &&
                                        (this.events.prev = d("click", {
                                            onElement: this.prevButton,
                                            withCallback: function (t, i) {
                                                t.preventDefault(), e.prevSlide();
                                            },
                                        })),
                                    this.settings.closeOnOutsideClick &&
                                        (this.events.outClose = d("click", {
                                            onElement: r,
                                            withCallback: function (t, i) {
                                                e.preventOutsideClick ||
                                                    p(document.body, "glightbox-mobile") ||
                                                    h(t.target, ".ginner-container") ||
                                                    h(t.target, ".gbtn") ||
                                                    p(t.target, "gnext") ||
                                                    p(t.target, "gprev") ||
                                                    e.close();
                                            },
                                        })),
                                    l(this.elements, function (t, i) {
                                        e.slidesContainer.appendChild(t.instance.create()),
                                            (t.slideNode = e.slidesContainer.querySelectorAll(".gslide")[i]);
                                    }),
                                    F && c(document.body, "glightbox-touch"),
                                    (this.events.resize = d("resize", {
                                        onElement: window,
                                        withCallback: function () {
                                            e.resize();
                                        },
                                    })),
                                    (this.built = !0);
                            },
                        },
                        {
                            key: "resize",
                            value: function () {
                                var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : null;
                                if ((e = e || this.activeSlide) && !p(e, "zoomed")) {
                                    var t = y(),
                                        i = e.querySelector(".gvideo-wrapper"),
                                        n = e.querySelector(".gslide-image"),
                                        s = this.slideDescription,
                                        r = t.width,
                                        a = t.height;
                                    if (
                                        (r <= 768
                                            ? c(document.body, "glightbox-mobile")
                                            : u(document.body, "glightbox-mobile"),
                                        i || n)
                                    ) {
                                        var l = !1;
                                        if (
                                            (s &&
                                                (p(s, "description-bottom") || p(s, "description-top")) &&
                                                !p(s, "gabsolute") &&
                                                (l = !0),
                                            n)
                                        ) {
                                            if (r <= 768) n.querySelector("img").setAttribute("style", "");
                                            else if (l) {
                                                var o = s.offsetHeight,
                                                    d = n.querySelector("img");
                                                d.setAttribute("style", "max-height: calc(100vh - ".concat(o, "px)")),
                                                    s.setAttribute("style", "max-width: ".concat(d.offsetWidth, "px;"));
                                            }
                                        }
                                        if (i) {
                                            var h = (
                                                    A(this.settings.plyr.config, "ratio")
                                                        ? this.settings.plyr.config.ratio
                                                        : "16:9"
                                                ).split(":"),
                                                f = 900 / (parseInt(h[0]) / parseInt(h[1]));
                                            if (((f = Math.floor(f)), l && (a -= s.offsetHeight), a < f && r > 900)) {
                                                var m = i.offsetWidth,
                                                    g = i.offsetHeight,
                                                    $ = a / g,
                                                    v = { width: m * $, height: g * $ };
                                                i.parentNode.setAttribute("style", "max-width: ".concat(v.width, "px")),
                                                    l && s.setAttribute("style", "max-width: ".concat(v.width, "px;"));
                                            } else
                                                (i.parentNode.style.maxWidth = "".concat(900, "px")),
                                                    l && s.setAttribute("style", "max-width: ".concat(900, "px;"));
                                        }
                                    }
                                }
                            },
                        },
                        {
                            key: "reload",
                            value: function () {
                                this.init();
                            },
                        },
                        {
                            key: "updateNavigationClasses",
                            value: function () {
                                var e = this.loop();
                                u(this.nextButton, "disabled"),
                                    u(this.prevButton, "disabled"),
                                    0 == this.index && this.elements.length - 1 == 0
                                        ? (c(this.prevButton, "disabled"), c(this.nextButton, "disabled"))
                                        : 0 !== this.index || e
                                          ? this.index !== this.elements.length - 1 ||
                                            e ||
                                            c(this.nextButton, "disabled")
                                          : c(this.prevButton, "disabled");
                            },
                        },
                        {
                            key: "loop",
                            value: function () {
                                var e = A(this.settings, "loopAtEnd") ? this.settings.loopAtEnd : null;
                                return A(this.settings, "loop") ? this.settings.loop : e;
                            },
                        },
                        {
                            key: "close",
                            value: function () {
                                var e = this;
                                if (!this.lightboxOpen) {
                                    if (this.events) {
                                        for (var t in this.events)
                                            this.events.hasOwnProperty(t) && this.events[t].destroy();
                                        this.events = null;
                                    }
                                    return !1;
                                }
                                if (this.closing) return !1;
                                (this.closing = !0),
                                    this.slidePlayerPause(this.activeSlide),
                                    this.fullElementsList && (this.elements = this.fullElementsList),
                                    c(this.modal, "glightbox-closing"),
                                    f(
                                        this.overlay,
                                        "none" == this.settings.openEffect ? "none" : this.settings.cssEfects.fade.out
                                    ),
                                    f(
                                        this.activeSlide,
                                        this.settings.cssEfects[this.settings.closeEffect].out,
                                        function () {
                                            if (
                                                ((e.activeSlide = null),
                                                (e.prevActiveSlideIndex = null),
                                                (e.prevActiveSlide = null),
                                                (e.built = !1),
                                                e.events)
                                            ) {
                                                for (var t in e.events)
                                                    e.events.hasOwnProperty(t) && e.events[t].destroy();
                                                e.events = null;
                                            }
                                            var i = document.body;
                                            u(j, "glightbox-open"),
                                                u(
                                                    i,
                                                    "glightbox-open touching gdesc-open glightbox-touch glightbox-mobile gscrollbar-fixer"
                                                ),
                                                e.modal.parentNode.removeChild(e.modal),
                                                e.trigger("close"),
                                                w(e.settings.onClose) && e.settings.onClose();
                                            var n = document.querySelector(".gcss-styles");
                                            n && n.parentNode.removeChild(n), (e.lightboxOpen = !1), (e.closing = null);
                                        }
                                    );
                            },
                        },
                        {
                            key: "destroy",
                            value: function () {
                                this.close(), this.clearAllEvents(), this.baseEvents && this.baseEvents.destroy();
                            },
                        },
                        {
                            key: "on",
                            value: function (e, t) {
                                var i = arguments.length > 2 && void 0 !== arguments[2] && arguments[2];
                                if (!e || !w(t)) throw TypeError("Event name and callback must be defined");
                                this.apiEvents.push({ evt: e, once: i, callback: t });
                            },
                        },
                        {
                            key: "once",
                            value: function (e, t) {
                                this.on(e, t, !0);
                            },
                        },
                        {
                            key: "trigger",
                            value: function (e) {
                                var t = this,
                                    i = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : null,
                                    n = [];
                                l(this.apiEvents, function (t, s) {
                                    var r = t.evt,
                                        a = t.once,
                                        l = t.callback;
                                    r == e && (l(i), a && n.push(s));
                                }),
                                    n.length &&
                                        l(n, function (e) {
                                            return t.apiEvents.splice(e, 1);
                                        });
                            },
                        },
                        {
                            key: "clearAllEvents",
                            value: function () {
                                this.apiEvents.splice(0, this.apiEvents.length);
                            },
                        },
                        {
                            key: "version",
                            value: function () {
                                return "3.0.7";
                            },
                        },
                    ]),
                    e
                );
            })();
        return function () {
            var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                t = new Z(e);
            return t.init(), t;
        };
    }),
    (function (e, t) {
        "function" == typeof define && define.amd
            ? define(t)
            : "object" == typeof exports
              ? (module.exports = t())
              : (e.ScrollMagic = t());
    })(this, function () {
        "use strict";
        var e = function () {};
        (e.version = "2.0.7"), window.addEventListener("mousewheel", function () {});
        var t = "data-scrollmagic-pin-spacer";
        e.Controller = function (n) {
            var r,
                a,
                l = "REVERSE",
                o = "PAUSED",
                d = i.defaults,
                c = this,
                u = s.extend({}, d, n),
                p = [],
                h = !1,
                f = 0,
                m = o,
                g = !0,
                $ = 0,
                v = !0,
                y = function () {
                    0 < u.refreshInterval && (a = window.setTimeout(T, u.refreshInterval));
                },
                _ = function () {
                    return u.vertical ? s.get.scrollTop(u.container) : s.get.scrollLeft(u.container);
                },
                b = function () {
                    return u.vertical ? s.get.height(u.container) : s.get.width(u.container);
                },
                x = (this._setScrollPos = function (e) {
                    u.vertical
                        ? g
                            ? window.scrollTo(s.get.scrollLeft(), e)
                            : (u.container.scrollTop = e)
                        : g
                          ? window.scrollTo(e, s.get.scrollTop())
                          : (u.container.scrollLeft = e);
                }),
                w = function () {
                    if (v && h) {
                        var e = s.type.Array(h) ? h : p.slice(0);
                        h = !1;
                        var t = f,
                            i = (f = c.scrollPos()) - t;
                        0 !== i && (m = 0 < i ? "FORWARD" : l),
                            m === l && e.reverse(),
                            e.forEach(function (e, t) {
                                e.update(!0);
                            });
                    }
                },
                S = function () {
                    r = s.rAF(w);
                },
                E = function (e) {
                    "resize" == e.type && (($ = b()), (m = o)), !0 !== h && ((h = !0), S());
                },
                T = function () {
                    if (!g && $ != b()) {
                        var e;
                        try {
                            e = new Event("resize", { bubbles: !1, cancelable: !1 });
                        } catch (t) {
                            (e = document.createEvent("Event")).initEvent("resize", !1, !1);
                        }
                        u.container.dispatchEvent(e);
                    }
                    p.forEach(function (e, t) {
                        e.refresh();
                    }),
                        y();
                };
            this._options = u;
            var C = function (e) {
                if (e.length <= 1) return e;
                var t = e.slice(0);
                return (
                    t.sort(function (e, t) {
                        return e.scrollOffset() > t.scrollOffset() ? 1 : -1;
                    }),
                    t
                );
            };
            return (
                (this.addScene = function (t) {
                    if (s.type.Array(t))
                        t.forEach(function (e, t) {
                            c.addScene(e);
                        });
                    else if (t instanceof e.Scene) {
                        if (t.controller() !== c) t.addTo(c);
                        else if (0 > p.indexOf(t))
                            for (var i in (p.push(t),
                            (p = C(p)),
                            t.on("shift.controller_sort", function () {
                                p = C(p);
                            }),
                            u.globalSceneOptions))
                                t[i] && t[i].call(t, u.globalSceneOptions[i]);
                    }
                    return c;
                }),
                (this.removeScene = function (e) {
                    if (s.type.Array(e))
                        e.forEach(function (e, t) {
                            c.removeScene(e);
                        });
                    else {
                        var t = p.indexOf(e);
                        -1 < t && (e.off("shift.controller_sort"), p.splice(t, 1), e.remove());
                    }
                    return c;
                }),
                (this.updateScene = function (t, i) {
                    return (
                        s.type.Array(t)
                            ? t.forEach(function (e, t) {
                                  c.updateScene(e, i);
                              })
                            : i
                              ? t.update(!0)
                              : !0 !== h &&
                                t instanceof e.Scene &&
                                (-1 == (h = h || []).indexOf(t) && h.push(t), (h = C(h)), S()),
                        c
                    );
                }),
                (this.update = function (e) {
                    return E({ type: "resize" }), e && w(), c;
                }),
                (this.scrollTo = function (i, n) {
                    if (s.type.Number(i)) x.call(u.container, i, n);
                    else if (i instanceof e.Scene) i.controller() === c && c.scrollTo(i.scrollOffset(), n);
                    else if (s.type.Function(i)) x = i;
                    else {
                        var r = s.get.elements(i)[0];
                        if (r) {
                            for (; r.parentNode.hasAttribute(t); ) r = r.parentNode;
                            var a = u.vertical ? "top" : "left",
                                l = s.get.offset(u.container),
                                o = s.get.offset(r);
                            g || (l[a] -= c.scrollPos()), c.scrollTo(o[a] - l[a], n);
                        }
                    }
                    return c;
                }),
                (this.scrollPos = function (e) {
                    return arguments.length ? (s.type.Function(e) && (_ = e), c) : _.call(c);
                }),
                (this.info = function (e) {
                    var t = {
                        size: $,
                        vertical: u.vertical,
                        scrollPos: f,
                        scrollDirection: m,
                        container: u.container,
                        isDocument: g,
                    };
                    return arguments.length ? (void 0 !== t[e] ? t[e] : void 0) : t;
                }),
                (this.loglevel = function (e) {
                    return c;
                }),
                (this.enabled = function (e) {
                    return arguments.length ? (v != e && ((v = !!e), c.updateScene(p, !0)), c) : v;
                }),
                (this.destroy = function (e) {
                    window.clearTimeout(a);
                    for (var t = p.length; t--; ) p[t].destroy(e);
                    return (
                        u.container.removeEventListener("resize", E),
                        u.container.removeEventListener("scroll", E),
                        s.cAF(r),
                        null
                    );
                }),
                (function () {
                    for (var e in u) d.hasOwnProperty(e) || delete u[e];
                    if (((u.container = s.get.elements(u.container)[0]), !u.container))
                        throw "ScrollMagic.Controller init failed.";
                    (g =
                        u.container === window ||
                        u.container === document.body ||
                        !document.body.contains(u.container)) && (u.container = window),
                        ($ = b()),
                        u.container.addEventListener("resize", E),
                        u.container.addEventListener("scroll", E);
                    var t = parseInt(u.refreshInterval, 10);
                    (u.refreshInterval = s.type.Number(t) ? t : d.refreshInterval), y();
                })(),
                c
            );
        };
        var i = {
            defaults: { container: window, vertical: !0, globalSceneOptions: {}, loglevel: 2, refreshInterval: 100 },
        };
        (e.Controller.addOption = function (e, t) {
            i.defaults[e] = t;
        }),
            (e.Controller.extend = function (t) {
                var i = this;
                (e.Controller = function () {
                    return (
                        i.apply(this, arguments), (this.$super = s.extend({}, this)), t.apply(this, arguments) || this
                    );
                }),
                    s.extend(e.Controller, i),
                    (e.Controller.prototype = i.prototype),
                    (e.Controller.prototype.constructor = e.Controller);
            }),
            (e.Scene = function (i) {
                var r,
                    a,
                    l = "BEFORE",
                    o = "DURING",
                    d = "AFTER",
                    c = n.defaults,
                    u = this,
                    p = s.extend({}, c, i),
                    h = l,
                    f = 0,
                    m = { start: 0, end: 0 },
                    g = 0,
                    $ = !0,
                    v = {};
                (this.on = function (e, t) {
                    return (
                        s.type.Function(t) &&
                            (e = e.trim().split(" ")).forEach(function (e) {
                                var i = e.split("."),
                                    n = i[0],
                                    s = i[1];
                                "*" != n && (v[n] || (v[n] = []), v[n].push({ namespace: s || "", callback: t }));
                            }),
                        u
                    );
                }),
                    (this.off = function (e, t) {
                        return (
                            e &&
                                (e = e.trim().split(" ")).forEach(function (e, i) {
                                    var n = e.split("."),
                                        s = n[0],
                                        r = n[1] || "";
                                    ("*" === s ? Object.keys(v) : [s]).forEach(function (e) {
                                        for (var i = v[e] || [], n = i.length; n--; ) {
                                            var s = i[n];
                                            !s ||
                                                (r !== s.namespace && "*" !== r) ||
                                                (t && t != s.callback) ||
                                                i.splice(n, 1);
                                        }
                                        i.length || delete v[e];
                                    });
                                }),
                            u
                        );
                    }),
                    (this.trigger = function (t, i) {
                        if (t) {
                            var n = t.trim().split("."),
                                s = n[0],
                                r = n[1],
                                a = v[s];
                            a &&
                                a.forEach(function (t, n) {
                                    (r && r !== t.namespace) || t.callback.call(u, new e.Event(s, t.namespace, u, i));
                                });
                        }
                        return u;
                    }),
                    u
                        .on("change.internal", function (e) {
                            "loglevel" !== e.what &&
                                "tweenChanges" !== e.what &&
                                ("triggerElement" === e.what ? w() : "reverse" === e.what && u.update());
                        })
                        .on("shift.internal", function (e) {
                            b(), u.update();
                        }),
                    (this.addTo = function (t) {
                        return (
                            t instanceof e.Controller &&
                                a != t &&
                                (a && a.removeScene(u),
                                (a = t),
                                T(),
                                x(!0),
                                w(!0),
                                b(),
                                a.info("container").addEventListener("resize", S),
                                t.addScene(u),
                                u.trigger("add", { controller: a }),
                                u.update()),
                            u
                        );
                    }),
                    (this.enabled = function (e) {
                        return arguments.length ? ($ != e && (($ = !!e), u.update(!0)), u) : $;
                    }),
                    (this.remove = function () {
                        if (a) {
                            a.info("container").removeEventListener("resize", S);
                            var e = a;
                            (a = void 0), e.removeScene(u), u.trigger("remove");
                        }
                        return u;
                    }),
                    (this.destroy = function (e) {
                        return u.trigger("destroy", { reset: e }), u.remove(), u.off("*.*"), null;
                    }),
                    (this.update = function (e) {
                        if (a) {
                            if (e) {
                                if (a.enabled() && $) {
                                    var t,
                                        i = a.info("scrollPos");
                                    (t = 0 < p.duration ? (i - m.start) / (m.end - m.start) : i >= m.start ? 1 : 0),
                                        u.trigger("update", { startPos: m.start, endPos: m.end, scrollPos: i }),
                                        u.progress(t);
                                } else y && h === o && P(!0);
                            } else a.updateScene(u, !1);
                        }
                        return u;
                    }),
                    (this.refresh = function () {
                        return x(), w(), u;
                    }),
                    (this.progress = function (e) {
                        if (arguments.length) {
                            var t = !1,
                                i = h,
                                n = a ? a.info("scrollDirection") : "PAUSED",
                                s = p.reverse || f <= e;
                            if (
                                (0 === p.duration
                                    ? ((t = f != e), (h = 0 == (f = e < 1 && s ? 0 : 1) ? l : o))
                                    : e < 0 && h !== l && s
                                      ? ((h = l), (t = ((f = 0), !0)))
                                      : 0 <= e && e < 1 && s
                                        ? ((f = e), (h = o), (t = !0))
                                        : 1 <= e && h !== d
                                          ? ((f = 1), (h = d), (t = !0))
                                          : h !== o || s || P(),
                                t)
                            ) {
                                var r = { progress: f, state: h, scrollDirection: n },
                                    c = h != i,
                                    m = function (e) {
                                        u.trigger(e, r);
                                    };
                                c && i !== o && (m("enter"), m(i === l ? "start" : "end")),
                                    m("progress"),
                                    c && h !== o && (m(h === l ? "start" : "end"), m("leave"));
                            }
                            return u;
                        }
                        return f;
                    });
                var y,
                    _,
                    b = function () {
                        (m = { start: g + p.offset }),
                            a && p.triggerElement && (m.start -= a.info("size") * p.triggerHook),
                            (m.end = m.start + p.duration);
                    },
                    x = function (e) {
                        if (r) {
                            var t = "duration";
                            C(t, r.call(u)) &&
                                !e &&
                                (u.trigger("change", { what: t, newval: p[t] }), u.trigger("shift", { reason: t }));
                        }
                    },
                    w = function (e) {
                        var i = 0,
                            n = p.triggerElement;
                        if (a && (n || 0 < g)) {
                            if (n) {
                                if (n.parentNode) {
                                    for (
                                        var r = a.info(),
                                            l = s.get.offset(r.container),
                                            o = r.vertical ? "top" : "left";
                                        n.parentNode.hasAttribute(t);

                                    )
                                        n = n.parentNode;
                                    var d = s.get.offset(n);
                                    r.isDocument || (l[o] -= a.scrollPos()), (i = d[o] - l[o]);
                                } else u.triggerElement(void 0);
                            }
                            var c = i != g;
                            (g = i), c && !e && u.trigger("shift", { reason: "triggerElementPosition" });
                        }
                    },
                    S = function (e) {
                        0 < p.triggerHook && u.trigger("shift", { reason: "containerResize" });
                    },
                    E = s.extend(n.validate, {
                        duration: function (e) {
                            if (s.type.String(e) && e.match(/^(\.|\d)*\d+%$/)) {
                                var t = parseFloat(e) / 100;
                                e = function () {
                                    return a ? a.info("size") * t : 0;
                                };
                            }
                            if (s.type.Function(e)) {
                                r = e;
                                try {
                                    e = parseFloat(r.call(u));
                                } catch (i) {
                                    e = -1;
                                }
                            }
                            if (((e = parseFloat(e)), !s.type.Number(e) || e < 0)) throw (r && (r = void 0), 0);
                            return e;
                        },
                    }),
                    T = function (e) {
                        (e = arguments.length ? [e] : Object.keys(E)).forEach(function (e, t) {
                            var i;
                            if (E[e])
                                try {
                                    i = E[e](p[e]);
                                } catch (n) {
                                    i = c[e];
                                } finally {
                                    p[e] = i;
                                }
                        });
                    },
                    C = function (e, t) {
                        var i = !1,
                            n = p[e];
                        return p[e] != t && ((p[e] = t), T(e), (i = n != p[e])), i;
                    },
                    k = function (e) {
                        u[e] ||
                            (u[e] = function (t) {
                                return arguments.length
                                    ? ("duration" === e && (r = void 0),
                                      C(e, t) &&
                                          (u.trigger("change", { what: e, newval: p[e] }),
                                          -1 < n.shifts.indexOf(e) && u.trigger("shift", { reason: e })),
                                      u)
                                    : p[e];
                            });
                    };
                (this.controller = function () {
                    return a;
                }),
                    (this.state = function () {
                        return h;
                    }),
                    (this.scrollOffset = function () {
                        return m.start;
                    }),
                    (this.triggerPosition = function () {
                        var e = p.offset;
                        return a && (p.triggerElement ? (e += g) : (e += a.info("size") * u.triggerHook())), e;
                    }),
                    u
                        .on("shift.internal", function (e) {
                            var t = "duration" === e.reason;
                            ((h === d && t) || (h === o && 0 === p.duration)) && P(), t && A();
                        })
                        .on("progress.internal", function (e) {
                            P();
                        })
                        .on("add.internal", function (e) {
                            A();
                        })
                        .on("destroy.internal", function (e) {
                            u.removePin(e.reset);
                        });
                var P = function (e) {
                        if (y && a) {
                            var t = a.info(),
                                i = _.spacer.firstChild;
                            if (e || h !== o) {
                                var n = { position: _.inFlow ? "relative" : "absolute", top: 0, left: 0 },
                                    r = s.css(i, "position") != n.position;
                                _.pushFollowers
                                    ? 0 < p.duration &&
                                      (h === d && 0 === parseFloat(s.css(_.spacer, "padding-top"))
                                          ? (r = !0)
                                          : h === l && 0 === parseFloat(s.css(_.spacer, "padding-bottom")) && (r = !0))
                                    : (n[t.vertical ? "top" : "left"] = p.duration * f),
                                    s.css(i, n),
                                    r && A();
                            } else {
                                "fixed" != s.css(i, "position") && (s.css(i, { position: "fixed" }), A());
                                var c = s.get.offset(_.spacer, !0),
                                    u =
                                        p.reverse || 0 === p.duration
                                            ? t.scrollPos - m.start
                                            : Math.round(f * p.duration * 10) / 10;
                                (c[t.vertical ? "top" : "left"] += u),
                                    s.css(_.spacer.firstChild, { top: c.top, left: c.left });
                            }
                        }
                    },
                    A = function () {
                        if (y && a && _.inFlow) {
                            var e = h === o,
                                t = a.info("vertical"),
                                i = _.spacer.firstChild,
                                n = s.isMarginCollapseType(s.css(_.spacer, "display")),
                                r = {};
                            _.relSize.width || _.relSize.autoFullWidth
                                ? e
                                    ? s.css(y, { width: s.get.width(_.spacer) })
                                    : s.css(y, { width: "100%" })
                                : ((r["min-width"] = s.get.width(t ? y : i, !0, !0)),
                                  (r.width = e ? r["min-width"] : "auto")),
                                _.relSize.height
                                    ? e
                                        ? s.css(y, {
                                              height: s.get.height(_.spacer) - (_.pushFollowers ? p.duration : 0),
                                          })
                                        : s.css(y, { height: "100%" })
                                    : ((r["min-height"] = s.get.height(t ? i : y, !0, !n)),
                                      (r.height = e ? r["min-height"] : "auto")),
                                _.pushFollowers &&
                                    ((r["padding" + (t ? "Top" : "Left")] = p.duration * f),
                                    (r["padding" + (t ? "Bottom" : "Right")] = p.duration * (1 - f))),
                                s.css(_.spacer, r);
                        }
                    },
                    z = function () {
                        a && y && h === o && !a.info("isDocument") && P();
                    },
                    L = function () {
                        a &&
                            y &&
                            h === o &&
                            (((_.relSize.width || _.relSize.autoFullWidth) &&
                                s.get.width(window) != s.get.width(_.spacer.parentNode)) ||
                                (_.relSize.height && s.get.height(window) != s.get.height(_.spacer.parentNode))) &&
                            A();
                    },
                    O = function (e) {
                        a &&
                            y &&
                            h === o &&
                            !a.info("isDocument") &&
                            (e.preventDefault(),
                            a._setScrollPos(
                                a.info("scrollPos") -
                                    ((e.wheelDelta || e[a.info("vertical") ? "wheelDeltaY" : "wheelDeltaX"]) / 3 ||
                                        -(30 * e.detail))
                            ));
                    };
                (this.setPin = function (e, i) {
                    if (
                        ((i = s.extend({}, { pushFollowers: !0, spacerClass: "scrollmagic-pin-spacer" }, i)),
                        !(e = s.get.elements(e)[0]) || "fixed" === s.css(e, "position"))
                    )
                        return u;
                    if (y) {
                        if (y === e) return u;
                        u.removePin();
                    }
                    var n = (y = e).parentNode.style.display,
                        r = [
                            "top",
                            "left",
                            "bottom",
                            "right",
                            "margin",
                            "marginLeft",
                            "marginRight",
                            "marginTop",
                            "marginBottom",
                        ];
                    y.parentNode.style.display = "none";
                    var a = "absolute" != s.css(y, "position"),
                        l = s.css(y, r.concat(["display"])),
                        o = s.css(y, ["width", "height"]);
                    (y.parentNode.style.display = n), !a && i.pushFollowers && (i.pushFollowers = !1);
                    var d = y.parentNode.insertBefore(document.createElement("div"), y),
                        c = s.extend(l, {
                            position: a ? "relative" : "absolute",
                            boxSizing: "content-box",
                            mozBoxSizing: "content-box",
                            webkitBoxSizing: "content-box",
                        });
                    if (
                        (a || s.extend(c, s.css(y, ["width", "height"])),
                        s.css(d, c),
                        d.setAttribute(t, ""),
                        s.addClass(d, i.spacerClass),
                        (_ = {
                            spacer: d,
                            relSize: {
                                width: "%" === o.width.slice(-1),
                                height: "%" === o.height.slice(-1),
                                autoFullWidth: "auto" === o.width && a && s.isMarginCollapseType(l.display),
                            },
                            pushFollowers: i.pushFollowers,
                            inFlow: a,
                        }),
                        !y.___origStyle)
                    ) {
                        y.___origStyle = {};
                        var p = y.style;
                        r.concat([
                            "width",
                            "height",
                            "position",
                            "boxSizing",
                            "mozBoxSizing",
                            "webkitBoxSizing",
                        ]).forEach(function (e) {
                            y.___origStyle[e] = p[e] || "";
                        });
                    }
                    return (
                        _.relSize.width && s.css(d, { width: o.width }),
                        _.relSize.height && s.css(d, { height: o.height }),
                        d.appendChild(y),
                        s.css(y, {
                            position: a ? "relative" : "absolute",
                            margin: "auto",
                            top: "auto",
                            left: "auto",
                            bottom: "auto",
                            right: "auto",
                        }),
                        (_.relSize.width || _.relSize.autoFullWidth) &&
                            s.css(y, {
                                boxSizing: "border-box",
                                mozBoxSizing: "border-box",
                                webkitBoxSizing: "border-box",
                            }),
                        window.addEventListener("scroll", z),
                        window.addEventListener("resize", z),
                        window.addEventListener("resize", L),
                        y.addEventListener("mousewheel", O),
                        y.addEventListener("DOMMouseScroll", O),
                        P(),
                        u
                    );
                }),
                    (this.removePin = function (e) {
                        if (y) {
                            if ((h === o && P(!0), e || !a)) {
                                var i = _.spacer.firstChild;
                                if (i.hasAttribute(t)) {
                                    var n = _.spacer.style,
                                        r = {};
                                    ["margin", "marginLeft", "marginRight", "marginTop", "marginBottom"].forEach(
                                        function (e) {
                                            r[e] = n[e] || "";
                                        }
                                    ),
                                        s.css(i, r);
                                }
                                _.spacer.parentNode.insertBefore(i, _.spacer),
                                    _.spacer.parentNode.removeChild(_.spacer),
                                    y.parentNode.hasAttribute(t) || (s.css(y, y.___origStyle), delete y.___origStyle);
                            }
                            window.removeEventListener("scroll", z),
                                window.removeEventListener("resize", z),
                                window.removeEventListener("resize", L),
                                y.removeEventListener("mousewheel", O),
                                y.removeEventListener("DOMMouseScroll", O),
                                (y = void 0);
                        }
                        return u;
                    });
                var M,
                    I = [];
                return (
                    u.on("destroy.internal", function (e) {
                        u.removeClassToggle(e.reset);
                    }),
                    (this.setClassToggle = function (e, t) {
                        var i = s.get.elements(e);
                        return (
                            0 !== i.length &&
                                s.type.String(t) &&
                                (0 < I.length && u.removeClassToggle(),
                                (M = t),
                                (I = i),
                                u.on("enter.internal_class leave.internal_class", function (e) {
                                    var t = "enter" === e.type ? s.addClass : s.removeClass;
                                    I.forEach(function (e, i) {
                                        t(e, M);
                                    });
                                })),
                            u
                        );
                    }),
                    (this.removeClassToggle = function (e) {
                        return (
                            e &&
                                I.forEach(function (e, t) {
                                    s.removeClass(e, M);
                                }),
                            u.off("start.internal_class end.internal_class"),
                            (M = void 0),
                            (I = []),
                            u
                        );
                    }),
                    (function () {
                        for (var e in p) c.hasOwnProperty(e) || delete p[e];
                        for (var t in c) k(t);
                        T();
                    })(),
                    u
                );
            });
        var n = {
            defaults: { duration: 0, offset: 0, triggerElement: void 0, triggerHook: 0.5, reverse: !0, loglevel: 2 },
            validate: {
                offset: function (e) {
                    if (((e = parseFloat(e)), !s.type.Number(e))) throw 0;
                    return e;
                },
                triggerElement: function (e) {
                    if ((e = e || void 0)) {
                        var t = s.get.elements(e)[0];
                        if (!t || !t.parentNode) throw 0;
                        e = t;
                    }
                    return e;
                },
                triggerHook: function (e) {
                    var t = { onCenter: 0.5, onEnter: 1, onLeave: 0 };
                    if (s.type.Number(e)) e = Math.max(0, Math.min(parseFloat(e), 1));
                    else {
                        if (!(e in t)) throw 0;
                        e = t[e];
                    }
                    return e;
                },
                reverse: function (e) {
                    return !!e;
                },
            },
            shifts: ["duration", "offset", "triggerHook"],
        };
        (e.Scene.addOption = function (e, t, i, s) {
            e in n.defaults || ((n.defaults[e] = t), (n.validate[e] = i), s && n.shifts.push(e));
        }),
            (e.Scene.extend = function (t) {
                var i = this;
                (e.Scene = function () {
                    return (
                        i.apply(this, arguments), (this.$super = s.extend({}, this)), t.apply(this, arguments) || this
                    );
                }),
                    s.extend(e.Scene, i),
                    (e.Scene.prototype = i.prototype),
                    (e.Scene.prototype.constructor = e.Scene);
            }),
            (e.Event = function (e, t, i, n) {
                for (var s in (n = n || {})) this[s] = n[s];
                return (
                    (this.type = e),
                    (this.target = this.currentTarget = i),
                    (this.namespace = t || ""),
                    (this.timeStamp = this.timestamp = Date.now()),
                    this
                );
            });
        var s = (e._util = (function (e) {
            var t,
                i = {},
                n = function (e) {
                    return parseFloat(e) || 0;
                },
                s = function (t) {
                    return t.currentStyle ? t.currentStyle : e.getComputedStyle(t);
                },
                r = function (t, i, r, a) {
                    if ((i = i === document ? e : i) === e) a = !1;
                    else if (!u.DomElement(i)) return 0;
                    t = t.charAt(0).toUpperCase() + t.substr(1).toLowerCase();
                    var l = (r ? i["offset" + t] || i["outer" + t] : i["client" + t] || i["inner" + t]) || 0;
                    if (r && a) {
                        var o = s(i);
                        l += "Height" === t ? n(o.marginTop) + n(o.marginBottom) : n(o.marginLeft) + n(o.marginRight);
                    }
                    return l;
                },
                a = function (e) {
                    return e.replace(/^[^a-z]+([a-z])/g, "$1").replace(/-([a-z])/g, function (e) {
                        return e[1].toUpperCase();
                    });
                };
            (i.extend = function (e) {
                for (e = e || {}, t = 1; t < arguments.length; t++)
                    if (arguments[t])
                        for (var i in arguments[t]) arguments[t].hasOwnProperty(i) && (e[i] = arguments[t][i]);
                return e;
            }),
                (i.isMarginCollapseType = function (e) {
                    return -1 < ["block", "flex", "list-item", "table", "-webkit-box"].indexOf(e);
                });
            var l = 0,
                o = ["ms", "moz", "webkit", "o"],
                d = e.requestAnimationFrame,
                c = e.cancelAnimationFrame;
            for (t = 0; !d && t < 4; ++t)
                (d = e[o[t] + "RequestAnimationFrame"]),
                    (c = e[o[t] + "CancelAnimationFrame"] || e[o[t] + "CancelRequestAnimationFrame"]);
            d ||
                (d = function (t) {
                    var i = new Date().getTime(),
                        n = Math.max(0, 16 - (i - l)),
                        s = e.setTimeout(function () {
                            t(i + n);
                        }, n);
                    return (l = i + n), s;
                }),
                c ||
                    (c = function (t) {
                        e.clearTimeout(t);
                    }),
                (i.rAF = d.bind(e)),
                (i.cAF = c.bind(e));
            var u = (i.type = function (e) {
                return Object.prototype.toString
                    .call(e)
                    .replace(/^\[object (.+)\]$/, "$1")
                    .toLowerCase();
            });
            (u.String = function (e) {
                return "string" === u(e);
            }),
                (u.Function = function (e) {
                    return "function" === u(e);
                }),
                (u.Array = function (e) {
                    return Array.isArray(e);
                }),
                (u.Number = function (e) {
                    return !u.Array(e) && 0 <= e - parseFloat(e) + 1;
                }),
                (u.DomElement = function (e) {
                    return "object" == typeof HTMLElement || "function" == typeof HTMLElement
                        ? e instanceof HTMLElement || e instanceof SVGElement
                        : e && "object" == typeof e && null !== e && 1 === e.nodeType && "string" == typeof e.nodeName;
                });
            var p = (i.get = {});
            return (
                (p.elements = function (t) {
                    var i = [];
                    if (u.String(t))
                        try {
                            t = document.querySelectorAll(t);
                        } catch (n) {
                            return i;
                        }
                    if ("nodelist" === u(t) || u.Array(t) || t instanceof NodeList)
                        for (var s = 0, r = (i.length = t.length); s < r; s++) {
                            var a = t[s];
                            i[s] = u.DomElement(a) ? a : p.elements(a);
                        }
                    else (u.DomElement(t) || t === document || t === e) && (i = [t]);
                    return i;
                }),
                (p.scrollTop = function (t) {
                    return t && "number" == typeof t.scrollTop ? t.scrollTop : e.pageYOffset || 0;
                }),
                (p.scrollLeft = function (t) {
                    return t && "number" == typeof t.scrollLeft ? t.scrollLeft : e.pageXOffset || 0;
                }),
                (p.width = function (e, t, i) {
                    return r("width", e, t, i);
                }),
                (p.height = function (e, t, i) {
                    return r("height", e, t, i);
                }),
                (p.offset = function (e, t) {
                    var i = { top: 0, left: 0 };
                    if (e && e.getBoundingClientRect) {
                        var n = e.getBoundingClientRect();
                        (i.top = n.top), (i.left = n.left), t || ((i.top += p.scrollTop()), (i.left += p.scrollLeft()));
                    }
                    return i;
                }),
                (i.addClass = function (e, t) {
                    t && (e.classList ? e.classList.add(t) : (e.className += " " + t));
                }),
                (i.removeClass = function (e, t) {
                    t &&
                        (e.classList
                            ? e.classList.remove(t)
                            : (e.className = e.className.replace(
                                  RegExp("(^|\\b)" + t.split(" ").join("|") + "(\\b|$)", "gi"),
                                  " "
                              )));
                }),
                (i.css = function (e, t) {
                    if (u.String(t)) return s(e)[a(t)];
                    if (u.Array(t)) {
                        var i = {},
                            n = s(e);
                        return (
                            t.forEach(function (e, t) {
                                i[e] = n[a(e)];
                            }),
                            i
                        );
                    }
                    for (var r in t) {
                        var l = t[r];
                        l == parseFloat(l) && (l += "px"), (e.style[a(r)] = l);
                    }
                }),
                i
            );
        })(window || {}));
        return e;
    }),
    (function (e, t) {
        "object" == typeof exports && "undefined" != typeof module
            ? t(exports)
            : "function" == typeof define && define.amd
              ? define(["exports"], t)
              : t(((e = "undefined" != typeof globalThis ? globalThis : e || self).noUiSlider = {}));
    })(this, function (e) {
        "use strict";
        function t(e) {
            return "object" == typeof e && "function" == typeof e.to;
        }
        function i(e) {
            e.parentElement.removeChild(e);
        }
        function n(e) {
            return null != e;
        }
        function s(e) {
            e.preventDefault();
        }
        function r(e) {
            return "number" == typeof e && !isNaN(e) && isFinite(e);
        }
        function a(e, t, i) {
            0 < i &&
                (c(e, t),
                setTimeout(function () {
                    u(e, t);
                }, i));
        }
        function l(e) {
            return Math.max(Math.min(e, 100), 0);
        }
        function o(e) {
            return Array.isArray(e) ? e : [e];
        }
        function d(e) {
            return 1 < (e = (e = String(e)).split(".")).length ? e[1].length : 0;
        }
        function c(e, t) {
            e.classList && !/\s/.test(t) ? e.classList.add(t) : (e.className += " " + t);
        }
        function u(e, t) {
            e.classList && !/\s/.test(t)
                ? e.classList.remove(t)
                : (e.className = e.className.replace(
                      RegExp("(^|\\b)" + t.split(" ").join("|") + "(\\b|$)", "gi"),
                      " "
                  ));
        }
        function p(e) {
            var t = void 0 !== window.pageXOffset,
                i = "CSS1Compat" === (e.compatMode || "");
            return {
                x: t ? window.pageXOffset : (i ? e.documentElement : e.body).scrollLeft,
                y: t ? window.pageYOffset : (i ? e.documentElement : e.body).scrollTop,
            };
        }
        function h(e, t) {
            return 100 / (t - e);
        }
        function f(e, t, i) {
            return (100 * t) / (e[i + 1] - e[i]);
        }
        function m(e, t) {
            for (var i = 1; e >= t[i]; ) i += 1;
            return i;
        }
        (e.PipsMode = void 0),
            ((F = e.PipsMode || (e.PipsMode = {})).Range = "range"),
            (F.Steps = "steps"),
            (F.Positions = "positions"),
            (F.Count = "count"),
            (F.Values = "values"),
            (e.PipsType = void 0),
            ((F = e.PipsType || (e.PipsType = {}))[(F.None = -1)] = "None"),
            (F[(F.NoValue = 0)] = "NoValue"),
            (F[(F.LargeValue = 1)] = "LargeValue"),
            (F[(F.SmallValue = 2)] = "SmallValue");
        var g =
            (($.prototype.getDistance = function (e) {
                for (var t = [], i = 0; i < this.xNumSteps.length - 1; i++) t[i] = f(this.xVal, e, i);
                return t;
            }),
            ($.prototype.getAbsoluteDistance = function (e, t, i) {
                var n = 0;
                if (e < this.xPct[this.xPct.length - 1]) for (; e > this.xPct[n + 1]; ) n++;
                else e === this.xPct[this.xPct.length - 1] && (n = this.xPct.length - 2);
                i || e !== this.xPct[n + 1] || n++;
                for (
                    var s,
                        r = 1,
                        a = (t = null === t ? [] : t)[n],
                        l = 0,
                        o = 0,
                        d = 0,
                        c = i
                            ? (e - this.xPct[n]) / (this.xPct[n + 1] - this.xPct[n])
                            : (this.xPct[n + 1] - e) / (this.xPct[n + 1] - this.xPct[n]);
                    0 < a;

                )
                    (s = this.xPct[n + 1 + d] - this.xPct[n + d]),
                        100 < t[n + d] * r + 100 - 100 * c
                            ? ((l = s * c), (r = (a - 100 * c) / t[n + d]), (c = 1))
                            : ((l = ((t[n + d] * s) / 100) * r), (r = 0)),
                        i ? ((o -= l), 1 <= this.xPct.length + d && d--) : ((o += l), 1 <= this.xPct.length - d && d++),
                        (a = t[n + d] * r);
                return e + o;
            }),
            ($.prototype.toStepping = function (e) {
                return (e = (function e(t, i, n) {
                    if (n >= t.slice(-1)[0]) return 100;
                    var s = m(n, t),
                        r = t[s - 1],
                        a = t[s],
                        t = i[s - 1],
                        s = i[s];
                    return t + f((a = [r, a]), a[0] < 0 ? n + Math.abs(a[0]) : n - a[0], 0) / h(t, s);
                })(this.xVal, this.xPct, e));
            }),
            ($.prototype.fromStepping = function (e) {
                return (function (e, t, i) {
                    if (100 <= i) return e.slice(-1)[0];
                    var n = m(i, t),
                        s = e[n - 1],
                        r = e[n],
                        e = t[n - 1],
                        n = t[n];
                    return ((i - e) * h(e, n) * ((r = [s, r])[1] - r[0])) / 100 + r[0];
                })(this.xVal, this.xPct, e);
            }),
            ($.prototype.getStep = function (e) {
                return (e = (function e(t, i, n, s) {
                    if (100 === s) return s;
                    var r = m(s, t),
                        a = t[r - 1],
                        l = t[r];
                    return n
                        ? (l - a) / 2 < s - a
                            ? l
                            : a
                        : i[r - 1]
                          ? t[r - 1] + Math.round((t = s - t[r - 1]) / (r = i[r - 1])) * r
                          : s;
                })(this.xPct, this.xSteps, this.snap, e));
            }),
            ($.prototype.getDefaultStep = function (e, t, i) {
                var n = m(e, this.xPct);
                return (
                    (100 === e || (t && e === this.xPct[n - 1])) && (n = Math.max(n - 1, 1)),
                    (this.xVal[n] - this.xVal[n - 1]) / i
                );
            }),
            ($.prototype.getNearbySteps = function (e) {
                return (
                    (e = m(e, this.xPct)),
                    {
                        stepBefore: {
                            startValue: this.xVal[e - 2],
                            step: this.xNumSteps[e - 2],
                            highestStep: this.xHighestCompleteStep[e - 2],
                        },
                        thisStep: {
                            startValue: this.xVal[e - 1],
                            step: this.xNumSteps[e - 1],
                            highestStep: this.xHighestCompleteStep[e - 1],
                        },
                        stepAfter: {
                            startValue: this.xVal[e],
                            step: this.xNumSteps[e],
                            highestStep: this.xHighestCompleteStep[e],
                        },
                    }
                );
            }),
            ($.prototype.countStepDecimals = function () {
                var e = this.xNumSteps.map(d);
                return Math.max.apply(null, e);
            }),
            ($.prototype.hasNoSize = function () {
                return this.xVal[0] === this.xVal[this.xVal.length - 1];
            }),
            ($.prototype.convert = function (e) {
                return this.getStep(this.toStepping(e));
            }),
            ($.prototype.handleEntryPoint = function (e, t) {
                if (((e = "min" === e ? 0 : "max" === e ? 100 : parseFloat(e)), !r(e) || !r(t[0])))
                    throw Error("noUiSlider: 'range' value isn't numeric.");
                this.xPct.push(e),
                    this.xVal.push(t[0]),
                    (t = Number(t[1])),
                    e ? this.xSteps.push(!isNaN(t) && t) : isNaN(t) || (this.xSteps[0] = t),
                    this.xHighestCompleteStep.push(0);
            }),
            ($.prototype.handleStepPoint = function (e, t) {
                t &&
                    (this.xVal[e] !== this.xVal[e + 1]
                        ? ((this.xSteps[e] =
                              f([this.xVal[e], this.xVal[e + 1]], t, 0) / h(this.xPct[e], this.xPct[e + 1])),
                          (t = Math.ceil(
                              Number((t = (this.xVal[e + 1] - this.xVal[e]) / this.xNumSteps[e]).toFixed(3)) - 1
                          )),
                          (t = this.xVal[e] + this.xNumSteps[e] * t),
                          (this.xHighestCompleteStep[e] = t))
                        : (this.xSteps[e] = this.xHighestCompleteStep[e] = this.xVal[e]));
            }),
            $);
        function $(e, t, i) {
            (this.xPct = []),
                (this.xVal = []),
                (this.xSteps = []),
                (this.xNumSteps = []),
                (this.xHighestCompleteStep = []),
                (this.xSteps = [i || !1]),
                (this.xNumSteps = [!1]),
                (this.snap = t);
            var n,
                s = [];
            for (
                Object.keys(e).forEach(function (t) {
                    s.push([o(e[t]), t]);
                }),
                    s.sort(function (e, t) {
                        return e[0][0] - t[0][0];
                    }),
                    n = 0;
                n < s.length;
                n++
            )
                this.handleEntryPoint(s[n][1], s[n][0]);
            for (this.xNumSteps = this.xSteps.slice(0), n = 0; n < this.xNumSteps.length; n++)
                this.handleStepPoint(n, this.xNumSteps[n]);
        }
        var v = {
                to: function (e) {
                    return void 0 === e ? "" : e.toFixed(2);
                },
                from: Number,
            },
            y = {
                target: "target",
                base: "base",
                origin: "origin",
                handle: "handle",
                handleLower: "handle-lower",
                handleUpper: "handle-upper",
                touchArea: "touch-area",
                horizontal: "horizontal",
                vertical: "vertical",
                background: "background",
                connect: "connect",
                connects: "connects",
                ltr: "ltr",
                rtl: "rtl",
                textDirectionLtr: "txt-dir-ltr",
                textDirectionRtl: "txt-dir-rtl",
                draggable: "draggable",
                drag: "state-drag",
                tap: "state-tap",
                active: "active",
                tooltip: "tooltip",
                pips: "pips",
                pipsHorizontal: "pips-horizontal",
                pipsVertical: "pips-vertical",
                marker: "marker",
                markerHorizontal: "marker-horizontal",
                markerVertical: "marker-vertical",
                markerNormal: "marker-normal",
                markerLarge: "marker-large",
                markerSub: "marker-sub",
                value: "value",
                valueHorizontal: "value-horizontal",
                valueVertical: "value-vertical",
                valueNormal: "value-normal",
                valueLarge: "value-large",
                valueSub: "value-sub",
            },
            _ = { tooltips: ".__tooltips", aria: ".__aria" };
        function b(e, t) {
            if (!r(t)) throw Error("noUiSlider: 'step' is not numeric.");
            e.singleStep = t;
        }
        function x(e, t) {
            if (!r(t)) throw Error("noUiSlider: 'keyboardPageMultiplier' is not numeric.");
            e.keyboardPageMultiplier = t;
        }
        function w(e, t) {
            if (!r(t)) throw Error("noUiSlider: 'keyboardMultiplier' is not numeric.");
            e.keyboardMultiplier = t;
        }
        function S(e, t) {
            if (!r(t)) throw Error("noUiSlider: 'keyboardDefaultStep' is not numeric.");
            e.keyboardDefaultStep = t;
        }
        function E(e, t) {
            if ("object" != typeof t || Array.isArray(t)) throw Error("noUiSlider: 'range' is not an object.");
            if (void 0 === t.min || void 0 === t.max) throw Error("noUiSlider: Missing 'min' or 'max' in 'range'.");
            e.spectrum = new g(t, e.snap || !1, e.singleStep);
        }
        function T(e, t) {
            if (!Array.isArray((t = o(t))) || !t.length) throw Error("noUiSlider: 'start' option is incorrect.");
            (e.handles = t.length), (e.start = t);
        }
        function C(e, t) {
            if ("boolean" != typeof t) throw Error("noUiSlider: 'snap' option must be a boolean.");
            e.snap = t;
        }
        function k(e, t) {
            if ("boolean" != typeof t) throw Error("noUiSlider: 'animate' option must be a boolean.");
            e.animate = t;
        }
        function P(e, t) {
            if ("number" != typeof t) throw Error("noUiSlider: 'animationDuration' option must be a number.");
            e.animationDuration = t;
        }
        function A(e, t) {
            var i,
                n = [!1];
            if (("lower" === t ? (t = [!0, !1]) : "upper" === t && (t = [!1, !0]), !0 === t || !1 === t)) {
                for (i = 1; i < e.handles; i++) n.push(t);
                n.push(!1);
            } else {
                if (!Array.isArray(t) || !t.length || t.length !== e.handles + 1)
                    throw Error("noUiSlider: 'connect' option doesn't match handle count.");
                n = t;
            }
            e.connect = n;
        }
        function z(e, t) {
            switch (t) {
                case "horizontal":
                    e.ort = 0;
                    break;
                case "vertical":
                    e.ort = 1;
                    break;
                default:
                    throw Error("noUiSlider: 'orientation' option is invalid.");
            }
        }
        function L(e, t) {
            if (!r(t)) throw Error("noUiSlider: 'margin' option must be numeric.");
            0 !== t && (e.margin = e.spectrum.getDistance(t));
        }
        function O(e, t) {
            if (!r(t)) throw Error("noUiSlider: 'limit' option must be numeric.");
            if (((e.limit = e.spectrum.getDistance(t)), !e.limit || e.handles < 2))
                throw Error("noUiSlider: 'limit' option is only supported on linear sliders with 2 or more handles.");
        }
        function M(e, t) {
            var i;
            if ((!r(t) && !Array.isArray(t)) || (Array.isArray(t) && 2 !== t.length && !r(t[0]) && !r(t[1])))
                throw Error("noUiSlider: 'padding' option must be numeric or array of exactly 2 numbers.");
            if (0 !== t) {
                for (
                    Array.isArray(t) || (t = [t, t]),
                        e.padding = [e.spectrum.getDistance(t[0]), e.spectrum.getDistance(t[1])],
                        i = 0;
                    i < e.spectrum.xNumSteps.length - 1;
                    i++
                )
                    if (e.padding[0][i] < 0 || e.padding[1][i] < 0)
                        throw Error("noUiSlider: 'padding' option must be a positive number(s).");
                var n = t[0] + t[1],
                    t = e.spectrum.xVal[0];
                if (1 < n / (e.spectrum.xVal[e.spectrum.xVal.length - 1] - t))
                    throw Error("noUiSlider: 'padding' option must not exceed 100% of the range.");
            }
        }
        function I(e, t) {
            switch (t) {
                case "ltr":
                    e.dir = 0;
                    break;
                case "rtl":
                    e.dir = 1;
                    break;
                default:
                    throw Error("noUiSlider: 'direction' option was not recognized.");
            }
        }
        function D(e, t) {
            if ("string" != typeof t) throw Error("noUiSlider: 'behaviour' must be a string containing options.");
            var i = 0 <= t.indexOf("tap"),
                n = 0 <= t.indexOf("drag"),
                s = 0 <= t.indexOf("fixed"),
                r = 0 <= t.indexOf("snap"),
                a = 0 <= t.indexOf("hover"),
                l = 0 <= t.indexOf("unconstrained"),
                o = 0 <= t.indexOf("drag-all"),
                t = 0 <= t.indexOf("smooth-steps");
            if (s) {
                if (2 !== e.handles) throw Error("noUiSlider: 'fixed' behaviour must be used with 2 handles");
                L(e, e.start[1] - e.start[0]);
            }
            if (l && (e.margin || e.limit))
                throw Error("noUiSlider: 'unconstrained' behaviour cannot be used with margin or limit");
            e.events = {
                tap: i || r,
                drag: n,
                dragAll: o,
                smoothSteps: t,
                fixed: s,
                snap: r,
                hover: a,
                unconstrained: l,
            };
        }
        function N(e, i) {
            if (!1 !== i) {
                if (!0 === i || t(i)) {
                    e.tooltips = [];
                    for (var n = 0; n < e.handles; n++) e.tooltips.push(i);
                } else {
                    if ((i = o(i)).length !== e.handles)
                        throw Error("noUiSlider: must pass a formatter for all handles.");
                    i.forEach(function (e) {
                        if ("boolean" != typeof e && !t(e))
                            throw Error("noUiSlider: 'tooltips' must be passed a formatter or 'false'.");
                    }),
                        (e.tooltips = i);
                }
            }
        }
        function B(e, t) {
            if (t.length !== e.handles) throw Error("noUiSlider: must pass a attributes for all handles.");
            e.handleAttributes = t;
        }
        function V(e, i) {
            if (!t(i)) throw Error("noUiSlider: 'ariaFormat' requires 'to' method.");
            e.ariaFormat = i;
        }
        function X(e, i) {
            var n;
            if (!t((n = i)) || "function" != typeof n.from)
                throw Error("noUiSlider: 'format' requires 'to' and 'from' methods.");
            e.format = i;
        }
        function Y(e, t) {
            if ("boolean" != typeof t) throw Error("noUiSlider: 'keyboardSupport' option must be a boolean.");
            e.keyboardSupport = t;
        }
        function R(e, t) {
            e.documentElement = t;
        }
        function H(e, t) {
            if ("string" != typeof t && !1 !== t) throw Error("noUiSlider: 'cssPrefix' must be a string or `false`.");
            e.cssPrefix = t;
        }
        function q(e, t) {
            if ("object" != typeof t) throw Error("noUiSlider: 'cssClasses' must be an object.");
            "string" == typeof e.cssPrefix
                ? ((e.cssClasses = {}),
                  Object.keys(t).forEach(function (i) {
                      e.cssClasses[i] = e.cssPrefix + t[i];
                  }))
                : (e.cssClasses = t);
        }
        function G(e) {
            var t = {
                    margin: null,
                    limit: null,
                    padding: null,
                    animate: !0,
                    animationDuration: 300,
                    ariaFormat: v,
                    format: v,
                },
                i = {
                    step: { r: !1, t: b },
                    keyboardPageMultiplier: { r: !1, t: x },
                    keyboardMultiplier: { r: !1, t: w },
                    keyboardDefaultStep: { r: !1, t: S },
                    start: { r: !0, t: T },
                    connect: { r: !0, t: A },
                    direction: { r: !0, t: I },
                    snap: { r: !1, t: C },
                    animate: { r: !1, t: k },
                    animationDuration: { r: !1, t: P },
                    range: { r: !0, t: E },
                    orientation: { r: !1, t: z },
                    margin: { r: !1, t: L },
                    limit: { r: !1, t: O },
                    padding: { r: !1, t: M },
                    behaviour: { r: !0, t: D },
                    ariaFormat: { r: !1, t: V },
                    format: { r: !1, t: X },
                    tooltips: { r: !1, t: N },
                    keyboardSupport: { r: !0, t: Y },
                    documentElement: { r: !1, t: R },
                    cssPrefix: { r: !0, t: H },
                    cssClasses: { r: !0, t: q },
                    handleAttributes: { r: !1, t: B },
                },
                s = {
                    connect: !1,
                    direction: "ltr",
                    behaviour: "tap",
                    orientation: "horizontal",
                    keyboardSupport: !0,
                    cssPrefix: "noUi-",
                    cssClasses: y,
                    keyboardPageMultiplier: 5,
                    keyboardMultiplier: 1,
                    keyboardDefaultStep: 10,
                };
            e.format && !e.ariaFormat && (e.ariaFormat = e.format),
                Object.keys(i).forEach(function (r) {
                    if (n(e[r]) || void 0 !== s[r]) i[r].t(t, (n(e[r]) ? e : s)[r]);
                    else if (i[r].r) throw Error("noUiSlider: '" + r + "' is required.");
                }),
                (t.pips = e.pips);
            var r = document.createElement("div"),
                a = void 0 !== r.style.msTransform,
                r = void 0 !== r.style.transform;
            return (
                (t.transformRule = r ? "transform" : a ? "msTransform" : "webkitTransform"),
                (t.style = [
                    ["left", "top"],
                    ["right", "bottom"],
                ][t.dir][t.ort]),
                t
            );
        }
        function W(t, r) {
            if (!t || !t.nodeName) throw Error("noUiSlider: create requires a single element, got: " + t);
            if (t.noUiSlider) throw Error("noUiSlider: Slider was already initialized.");
            return (
                (r = (function t(r, d, h) {
                    var f,
                        m,
                        g,
                        $,
                        v,
                        y,
                        b = window.navigator.pointerEnabled
                            ? { start: "pointerdown", move: "pointermove", end: "pointerup" }
                            : window.navigator.msPointerEnabled
                              ? { start: "MSPointerDown", move: "MSPointerMove", end: "MSPointerUp" }
                              : { start: "mousedown touchstart", move: "mousemove touchmove", end: "mouseup touchend" },
                        x =
                            window.CSS &&
                            CSS.supports &&
                            CSS.supports("touch-action", "none") &&
                            (function () {
                                var e = !1;
                                try {
                                    var t = Object.defineProperty({}, "passive", {
                                        get: function () {
                                            e = !0;
                                        },
                                    });
                                    window.addEventListener("test", null, t);
                                } catch (i) {}
                                return e;
                            })(),
                        w = r,
                        S = d.spectrum,
                        E = [],
                        T = [],
                        C = [],
                        k = 0,
                        P = {},
                        A = r.ownerDocument,
                        z = d.documentElement || A.documentElement,
                        L = A.body,
                        O = "rtl" === A.dir || 1 === d.ort ? 0 : 100;
                    function M(e, t) {
                        var i = A.createElement("div");
                        return t && c(i, t), e.appendChild(i), i;
                    }
                    function I(e, t) {
                        var i,
                            e = M(e, d.cssClasses.origin),
                            n = M(e, d.cssClasses.handle);
                        return (
                            M(n, d.cssClasses.touchArea),
                            n.setAttribute("data-handle", String(t)),
                            d.keyboardSupport &&
                                (n.setAttribute("tabindex", "0"),
                                n.addEventListener("keydown", function (e) {
                                    return (function (e, t) {
                                        if (B() || V(t)) return !1;
                                        var i = ["Left", "Right"],
                                            n = ["Down", "Up"],
                                            s = ["PageDown", "PageUp"],
                                            r = ["Home", "End"];
                                        d.dir && !d.ort ? i.reverse() : d.ort && !d.dir && (n.reverse(), s.reverse());
                                        var a = e.key.replace("Arrow", ""),
                                            l = a === s[0],
                                            o = a === s[1],
                                            s = a === n[0] || a === i[0] || l,
                                            n = a === n[1] || a === i[1] || o,
                                            i = a === r[0],
                                            r = a === r[1];
                                        if (!(s || n || i || r)) return !0;
                                        if ((e.preventDefault(), n || s)) {
                                            var c = s ? 0 : 1,
                                                c = ep(t)[c];
                                            if (null === c) return !1;
                                            !1 === c && (c = S.getDefaultStep(T[t], s, d.keyboardDefaultStep)),
                                                (c *= o || l ? d.keyboardPageMultiplier : d.keyboardMultiplier),
                                                (c = Math.max(c, 1e-7)),
                                                (c *= s ? -1 : 1),
                                                (c = E[t] + c);
                                        } else c = r ? d.spectrum.xVal[d.spectrum.xVal.length - 1] : d.spectrum.xVal[0];
                                        return (
                                            el(t, S.toStepping(c), !0, !0),
                                            et("slide", t),
                                            et("update", t),
                                            et("change", t),
                                            et("set", t),
                                            !1
                                        );
                                    })(e, t);
                                })),
                            void 0 !== d.handleAttributes &&
                                Object.keys((i = d.handleAttributes[t])).forEach(function (e) {
                                    n.setAttribute(e, i[e]);
                                }),
                            n.setAttribute("role", "slider"),
                            n.setAttribute("aria-orientation", d.ort ? "vertical" : "horizontal"),
                            0 === t
                                ? c(n, d.cssClasses.handleLower)
                                : t === d.handles - 1 && c(n, d.cssClasses.handleUpper),
                            e
                        );
                    }
                    function D(e, t) {
                        return !!t && M(e, d.cssClasses.connect);
                    }
                    function N(e, t) {
                        return !(!d.tooltips || !d.tooltips[t]) && M(e.firstChild, d.cssClasses.tooltip);
                    }
                    function B() {
                        return w.hasAttribute("disabled");
                    }
                    function V(e) {
                        return m[e].hasAttribute("disabled");
                    }
                    function X() {
                        v &&
                            (ee("update" + _.tooltips),
                            v.forEach(function (e) {
                                e && i(e);
                            }),
                            (v = null));
                    }
                    function Y() {
                        X(),
                            (v = m.map(N)),
                            J("update" + _.tooltips, function (e, t, i) {
                                v &&
                                    d.tooltips &&
                                    !1 !== v[t] &&
                                    ((e = e[t]),
                                    !0 !== d.tooltips[t] && (e = d.tooltips[t].to(i[t])),
                                    (v[t].innerHTML = e));
                            });
                    }
                    function R(e, t) {
                        return e.map(function (e) {
                            return S.fromStepping(t ? S.getStep(e) : e);
                        });
                    }
                    function H() {
                        $ && (i($), ($ = null));
                    }
                    function q(t) {
                        H();
                        var i,
                            n,
                            s,
                            r,
                            a,
                            l,
                            o,
                            u,
                            p =
                                ((n = (function (t) {
                                    if (t.mode === e.PipsMode.Range || t.mode === e.PipsMode.Steps) return S.xVal;
                                    if (t.mode !== e.PipsMode.Count)
                                        return t.mode === e.PipsMode.Positions
                                            ? R(t.values, t.stepped)
                                            : t.mode === e.PipsMode.Values
                                              ? t.stepped
                                                  ? t.values.map(function (e) {
                                                        return S.fromStepping(S.getStep(S.toStepping(e)));
                                                    })
                                                  : t.values
                                              : [];
                                    if (t.values < 2)
                                        throw Error("noUiSlider: 'values' (>= 2) required for mode 'count'.");
                                    for (var i = t.values - 1, n = 100 / i, s = []; i--; ) s[i] = i * n;
                                    return s.push(100), R(s, t.stepped);
                                })((i = t))),
                                (s = {}),
                                (r = S.xVal[0]),
                                (a = S.xVal[S.xVal.length - 1]),
                                (l = !1),
                                (o = !1),
                                (u = 0),
                                (n = n
                                    .slice()
                                    .sort(function (e, t) {
                                        return e - t;
                                    })
                                    .filter(function (e) {
                                        return !this[e] && (this[e] = !0);
                                    }, {}))[0] !== r && (n.unshift(r), (l = !0)),
                                n[n.length - 1] !== a && (n.push(a), (o = !0)),
                                n.forEach(function (t, r) {
                                    var a,
                                        d,
                                        c,
                                        p,
                                        h,
                                        f,
                                        m,
                                        g,
                                        t = t,
                                        $ = n[r + 1],
                                        v = i.mode === e.PipsMode.Steps,
                                        y = (y = v ? S.xNumSteps[r] : y) || $ - t;
                                    for (
                                        void 0 === $ && ($ = t), y = Math.max(y, 1e-7), a = t;
                                        a <= $;
                                        a = Number((a + y).toFixed(7))
                                    ) {
                                        for (
                                            f = (p = (c = S.toStepping(a)) - u) / (i.density || 1),
                                                g = p / (m = Math.round(f)),
                                                d = 1;
                                            d <= m;
                                            d += 1
                                        )
                                            s[(h = u + d * g).toFixed(5)] = [S.fromStepping(h), 0];
                                        (f =
                                            -1 < n.indexOf(a)
                                                ? e.PipsType.LargeValue
                                                : v
                                                  ? e.PipsType.SmallValue
                                                  : e.PipsType.NoValue),
                                            !r && l && a !== $ && (f = 0),
                                            (a === $ && o) || (s[c.toFixed(5)] = [a, f]),
                                            (u = c);
                                    }
                                }),
                                s),
                            h = t.filter,
                            t = t.format || {
                                to: function (e) {
                                    return String(Math.round(e));
                                },
                            };
                        return ($ = w.appendChild(
                            (function t(i, n, s) {
                                var r,
                                    a = A.createElement("div"),
                                    l =
                                        (((r = {})[e.PipsType.None] = ""),
                                        (r[e.PipsType.NoValue] = d.cssClasses.valueNormal),
                                        (r[e.PipsType.LargeValue] = d.cssClasses.valueLarge),
                                        (r[e.PipsType.SmallValue] = d.cssClasses.valueSub),
                                        r),
                                    o =
                                        (((r = {})[e.PipsType.None] = ""),
                                        (r[e.PipsType.NoValue] = d.cssClasses.markerNormal),
                                        (r[e.PipsType.LargeValue] = d.cssClasses.markerLarge),
                                        (r[e.PipsType.SmallValue] = d.cssClasses.markerSub),
                                        r),
                                    u = [d.cssClasses.valueHorizontal, d.cssClasses.valueVertical],
                                    p = [d.cssClasses.markerHorizontal, d.cssClasses.markerVertical];
                                function h(e, t) {
                                    var i = t === d.cssClasses.value;
                                    return t + " " + (i ? u : p)[d.ort] + " " + (i ? l : o)[e];
                                }
                                return (
                                    c(a, d.cssClasses.pips),
                                    c(a, 0 === d.ort ? d.cssClasses.pipsHorizontal : d.cssClasses.pipsVertical),
                                    Object.keys(i).forEach(function (t) {
                                        var r, l, o;
                                        (l = i[(r = t)][0]),
                                            (o = i[t][1]),
                                            (o = n ? n(l, o) : o) !== e.PipsType.None &&
                                                (((t = M(a, !1)).className = h(o, d.cssClasses.marker)),
                                                (t.style[d.style] = r + "%"),
                                                o > e.PipsType.NoValue &&
                                                    (((t = M(a, !1)).className = h(o, d.cssClasses.value)),
                                                    t.setAttribute("data-value", String(l)),
                                                    (t.style[d.style] = r + "%"),
                                                    (t.innerHTML = String(s.to(l)))));
                                    }),
                                    a
                                );
                            })(p, h, t)
                        ));
                    }
                    function W() {
                        var e = f.getBoundingClientRect(),
                            t = "offset" + ["Width", "Height"][d.ort];
                        return 0 === d.ort ? e.width || f[t] : e.height || f[t];
                    }
                    function F(e, t, i, n) {
                        function s(s) {
                            var r,
                                a = (function (e, t, i) {
                                    var n = 0 === e.type.indexOf("touch"),
                                        s = 0 === e.type.indexOf("mouse"),
                                        r = 0 === e.type.indexOf("pointer"),
                                        a = 0,
                                        l = 0;
                                    if (
                                        (0 === e.type.indexOf("MSPointer") && (r = !0),
                                        "mousedown" === e.type && !e.buttons && !e.touches)
                                    )
                                        return !1;
                                    if (n) {
                                        var o = function (t) {
                                            return (
                                                (t = t.target) === i ||
                                                i.contains(t) ||
                                                (e.composed && e.composedPath().shift() === i)
                                            );
                                        };
                                        if ("touchstart" === e.type) {
                                            if (1 < (n = Array.prototype.filter.call(e.touches, o)).length) return !1;
                                            (a = n[0].pageX), (l = n[0].pageY);
                                        } else {
                                            if (!(o = Array.prototype.find.call(e.changedTouches, o))) return !1;
                                            (a = o.pageX), (l = o.pageY);
                                        }
                                    }
                                    return (
                                        (t = t || p(A)),
                                        (s || r) && ((a = e.clientX + t.x), (l = e.clientY + t.y)),
                                        (e.pageOffset = t),
                                        (e.points = [a, l]),
                                        (e.cursor = s || r),
                                        e
                                    );
                                })(s, n.pageOffset, n.target || t);
                            return (
                                !!a &&
                                !(B() && !n.doNotReject) &&
                                ((r = w),
                                (s = d.cssClasses.tap),
                                !(
                                    (r.classList
                                        ? r.classList.contains(s)
                                        : RegExp("\\b" + s + "\\b").test(r.className)) && !n.doNotReject
                                ) &&
                                    !(e === b.start && void 0 !== a.buttons && 1 < a.buttons) &&
                                    (!n.hover || !a.buttons) &&
                                    (x || a.preventDefault(), (a.calcPoint = a.points[d.ort]), void i(a, n)))
                            );
                        }
                        var r = [];
                        return (
                            e.split(" ").forEach(function (e) {
                                t.addEventListener(e, s, !!x && { passive: !0 }), r.push([e, s]);
                            }),
                            r
                        );
                    }
                    function j(e) {
                        var t,
                            i,
                            n = l(
                                (n =
                                    (100 *
                                        (e -
                                            ((n = f),
                                            (t = d.ort),
                                            (i = n.getBoundingClientRect()),
                                            (n = (e = n.ownerDocument).documentElement),
                                            (e = p(e)),
                                            /webkit.*Chrome.*Mobile/i.test(navigator.userAgent) && (e.x = 0),
                                            t ? i.top + e.y - n.clientTop : i.left + e.x - n.clientLeft))) /
                                    W())
                            );
                        return d.dir ? 100 - n : n;
                    }
                    function U(e, t) {
                        "mouseout" === e.type && "HTML" === e.target.nodeName && null === e.relatedTarget && Q(e, t);
                    }
                    function Z(e, t) {
                        if (-1 === navigator.appVersion.indexOf("MSIE 9") && 0 === e.buttons && 0 !== t.buttonsProperty)
                            return Q(e, t);
                        es(
                            0 < (e = (d.dir ? -1 : 1) * (e.calcPoint - t.startCalcPoint)),
                            (100 * e) / t.baseSize,
                            t.locations,
                            t.handleNumbers,
                            t.connect
                        );
                    }
                    function Q(e, t) {
                        t.handle && (u(t.handle, d.cssClasses.active), --k),
                            t.listeners.forEach(function (e) {
                                z.removeEventListener(e[0], e[1]);
                            }),
                            0 === k &&
                                (u(w, d.cssClasses.drag),
                                ea(),
                                e.cursor && ((L.style.cursor = ""), L.removeEventListener("selectstart", s))),
                            d.events.smoothSteps &&
                                (t.handleNumbers.forEach(function (e) {
                                    el(e, T[e], !0, !0, !1, !1);
                                }),
                                t.handleNumbers.forEach(function (e) {
                                    et("update", e);
                                })),
                            t.handleNumbers.forEach(function (e) {
                                et("change", e), et("set", e), et("end", e);
                            });
                    }
                    function K(e, t) {
                        var i, n, r, a;
                        t.handleNumbers.some(V) ||
                            (1 === t.handleNumbers.length &&
                                ((a = m[t.handleNumbers[0]].children[0]), (k += 1), c(a, d.cssClasses.active)),
                            e.stopPropagation(),
                            (n = F(b.move, z, Z, {
                                target: e.target,
                                handle: a,
                                connect: t.connect,
                                listeners: (i = []),
                                startCalcPoint: e.calcPoint,
                                baseSize: W(),
                                pageOffset: e.pageOffset,
                                handleNumbers: t.handleNumbers,
                                buttonsProperty: e.buttons,
                                locations: T.slice(),
                            })),
                            (r = F(b.end, z, Q, {
                                target: e.target,
                                handle: a,
                                listeners: i,
                                doNotReject: !0,
                                handleNumbers: t.handleNumbers,
                            })),
                            (a = F("mouseout", z, U, {
                                target: e.target,
                                handle: a,
                                listeners: i,
                                doNotReject: !0,
                                handleNumbers: t.handleNumbers,
                            })),
                            i.push.apply(i, n.concat(r, a)),
                            e.cursor &&
                                ((L.style.cursor = getComputedStyle(e.target).cursor),
                                1 < m.length && c(w, d.cssClasses.drag),
                                L.addEventListener("selectstart", s, !1)),
                            t.handleNumbers.forEach(function (e) {
                                et("start", e);
                            }));
                    }
                    function J(e, t) {
                        (P[e] = P[e] || []),
                            P[e].push(t),
                            "update" === e.split(".")[0] &&
                                m.forEach(function (e, t) {
                                    et("update", t);
                                });
                    }
                    function ee(e) {
                        var t = e && e.split(".")[0],
                            i = t ? e.substring(t.length) : e;
                        Object.keys(P).forEach(function (e) {
                            var n = e.split(".")[0],
                                s = e.substring(n.length);
                            (t && t !== n) ||
                                (i && i !== s) ||
                                ((((n = s) !== _.aria && n !== _.tooltips) || i === s) && delete P[e]);
                        });
                    }
                    function et(e, t, i) {
                        Object.keys(P).forEach(function (n) {
                            e === n.split(".")[0] &&
                                P[n].forEach(function (e) {
                                    e.call(eh, E.map(d.format.to), t, E.slice(), i || !1, T.slice(), eh);
                                });
                        });
                    }
                    function ei(e, t, i, n, s, r, a) {
                        var o;
                        return (
                            1 < m.length &&
                                !d.events.unconstrained &&
                                (n && 0 < t && (i = Math.max(i, (o = S.getAbsoluteDistance(e[t - 1], d.margin, !1)))),
                                s &&
                                    t < m.length - 1 &&
                                    (i = Math.min(i, (o = S.getAbsoluteDistance(e[t + 1], d.margin, !0))))),
                            1 < m.length &&
                                d.limit &&
                                (n && 0 < t && (i = Math.min(i, (o = S.getAbsoluteDistance(e[t - 1], d.limit, !1)))),
                                s &&
                                    t < m.length - 1 &&
                                    (i = Math.max(i, (o = S.getAbsoluteDistance(e[t + 1], d.limit, !0))))),
                            d.padding &&
                                (0 === t && (i = Math.max(i, (o = S.getAbsoluteDistance(0, d.padding[0], !1)))),
                                t === m.length - 1 &&
                                    (i = Math.min(i, (o = S.getAbsoluteDistance(100, d.padding[1], !0))))),
                            !((i = l((i = a ? i : S.getStep(i)))) === e[t] && !r) && i
                        );
                    }
                    function en(e, t) {
                        var i = d.ort;
                        return (i ? t : e) + ", " + (i ? e : t);
                    }
                    function es(e, t, i, n, s) {
                        var r = i.slice(),
                            a = n[0],
                            l = d.events.smoothSteps,
                            o = [!e, e],
                            c = [e, !e];
                        (n = n.slice()),
                            e && n.reverse(),
                            1 < n.length
                                ? n.forEach(function (e, i) {
                                      !1 === (i = ei(r, e, r[e] + t, o[i], c[i], !1, l))
                                          ? (t = 0)
                                          : ((t = i - r[e]), (r[e] = i));
                                  })
                                : (o = c = [!0]);
                        var u = !1;
                        n.forEach(function (e, n) {
                            u = el(e, i[e] + t, o[n], c[n], !1, l) || u;
                        }),
                            u &&
                                (n.forEach(function (e) {
                                    et("update", e), et("slide", e);
                                }),
                                null != s && et("drag", a));
                    }
                    function er(e, t) {
                        return d.dir ? 100 - e - t : e;
                    }
                    function ea() {
                        C.forEach(function (e) {
                            var t = 50 < T[e] ? -1 : 1,
                                t = 3 + (m.length + t * e);
                            m[e].style.zIndex = String(t);
                        });
                    }
                    function el(e, t, i, n, s, r) {
                        return (
                            !1 !== (t = s ? t : ei(T, e, t, i, n, !1, r)) &&
                            ((T[e] = t),
                            (E[e] = S.fromStepping(t)),
                            (t = "translate(" + en(er(t, 0) - O + "%", "0") + ")"),
                            (m[e].style[d.transformRule] = t),
                            eo(e),
                            eo(e + 1),
                            !0)
                        );
                    }
                    function eo(e) {
                        var t, i;
                        g[e] &&
                            ((i = 100),
                            (t =
                                "translate(" +
                                en(
                                    er(
                                        (t = (t = 0) !== e ? T[e - 1] : t),
                                        (i = (i = e !== g.length - 1 ? T[e] : i) - t)
                                    ) + "%",
                                    "0"
                                ) +
                                ")"),
                            (i = "scale(" + en(i / 100, "1") + ")"),
                            (g[e].style[d.transformRule] = t + " " + i));
                    }
                    function ed(e, t) {
                        return null === e || !1 === e || void 0 === e
                            ? T[t]
                            : ("number" == typeof e && (e = String(e)),
                              !1 === (e = !1 !== (e = d.format.from(e)) ? S.toStepping(e) : e) || isNaN(e) ? T[t] : e);
                    }
                    function ec(e, t, i) {
                        var n = o(e),
                            e = void 0 === T[0];
                        (t = void 0 === t || t),
                            d.animate && !e && a(w, d.cssClasses.tap, d.animationDuration),
                            C.forEach(function (e) {
                                el(e, ed(n[e], e), !0, !1, i);
                            });
                        var s,
                            r = 1 === C.length ? 0 : 1;
                        for (
                            e &&
                            S.hasNoSize() &&
                            ((i = !0),
                            (T[0] = 0),
                            1 < C.length &&
                                ((s = 100 / (C.length - 1)),
                                C.forEach(function (e) {
                                    T[e] = e * s;
                                })));
                            r < C.length;
                            ++r
                        )
                            C.forEach(function (e) {
                                el(e, T[e], !0, !0, i);
                            });
                        ea(),
                            C.forEach(function (e) {
                                et("update", e), null !== n[e] && t && et("set", e);
                            });
                    }
                    function eu(e) {
                        return (e = void 0 !== e && e)
                            ? 1 === E.length
                                ? E[0]
                                : E.slice(0)
                            : 1 === (e = E.map(d.format.to)).length
                              ? e[0]
                              : e;
                    }
                    function ep(e) {
                        var t = T[e],
                            i = S.getNearbySteps(t),
                            n = E[e],
                            s = i.thisStep.step,
                            e = null;
                        return d.snap
                            ? [n - i.stepBefore.startValue || null, i.stepAfter.startValue - n || null]
                            : (!1 !== s && n + s > i.stepAfter.startValue && (s = i.stepAfter.startValue - n),
                              (e =
                                  n > i.thisStep.startValue
                                      ? i.thisStep.step
                                      : !1 !== i.stepBefore.step && n - i.stepBefore.highestStep),
                              100 === t ? (s = null) : 0 === t && (e = null),
                              (t = S.countStepDecimals()),
                              null !== s && !1 !== s && (s = Number(s.toFixed(t))),
                              [(e = null !== e && !1 !== e ? Number(e.toFixed(t)) : e), s]);
                    }
                    c((r = w), d.cssClasses.target),
                        0 === d.dir ? c(r, d.cssClasses.ltr) : c(r, d.cssClasses.rtl),
                        0 === d.ort ? c(r, d.cssClasses.horizontal) : c(r, d.cssClasses.vertical),
                        c(
                            r,
                            "rtl" === getComputedStyle(r).direction
                                ? d.cssClasses.textDirectionRtl
                                : d.cssClasses.textDirectionLtr
                        ),
                        (f = M(r, d.cssClasses.base)),
                        (function (e, t) {
                            var i = M(t, d.cssClasses.connects);
                            (m = []), (g = []).push(D(i, e[0]));
                            for (var n = 0; n < d.handles; n++) m.push(I(t, n)), (C[n] = n), g.push(D(i, e[n + 1]));
                        })(d.connect, f),
                        (y = d.events).fixed ||
                            m.forEach(function (e, t) {
                                F(b.start, e.children[0], K, { handleNumbers: [t] });
                            }),
                        y.tap &&
                            F(
                                b.start,
                                f,
                                function e(t) {
                                    t.stopPropagation();
                                    var i,
                                        n,
                                        s,
                                        r = j(t.calcPoint),
                                        l =
                                            ((i = r),
                                            (s = ((n = 100), !1)),
                                            m.forEach(function (e, t) {
                                                var r, a;
                                                V(t) ||
                                                    (((a = Math.abs((r = T[t]) - i)) < n ||
                                                        (a <= n && r < i) ||
                                                        (100 === a && 100 === n)) &&
                                                        ((s = t), (n = a)));
                                            }),
                                            s);
                                    !1 !== l &&
                                        (d.events.snap || a(w, d.cssClasses.tap, d.animationDuration),
                                        el(l, r, !0, !0),
                                        ea(),
                                        et("slide", l, !0),
                                        et("update", l, !0),
                                        d.events.snap
                                            ? K(t, { handleNumbers: [l] })
                                            : (et("change", l, !0), et("set", l, !0)));
                                },
                                {}
                            ),
                        y.hover &&
                            F(
                                b.move,
                                f,
                                function e(t) {
                                    var t = j(t.calcPoint),
                                        t = S.getStep(t),
                                        i = S.fromStepping(t);
                                    Object.keys(P).forEach(function (e) {
                                        "hover" === e.split(".")[0] &&
                                            P[e].forEach(function (e) {
                                                e.call(eh, i);
                                            });
                                    });
                                },
                                { hover: !0 }
                            ),
                        y.drag &&
                            g.forEach(function (e, t) {
                                var i, n, s, r, a;
                                !1 !== e &&
                                    0 !== t &&
                                    t !== g.length - 1 &&
                                    ((i = m[t - 1]),
                                    (n = m[t]),
                                    (s = [e]),
                                    (r = [i, n]),
                                    (a = [t - 1, t]),
                                    c(e, d.cssClasses.draggable),
                                    y.fixed && (s.push(i.children[0]), s.push(n.children[0])),
                                    y.dragAll && ((r = m), (a = C)),
                                    s.forEach(function (t) {
                                        F(b.start, t, K, { handles: r, handleNumbers: a, connect: e });
                                    }));
                            }),
                        ec(d.start),
                        d.pips && q(d.pips),
                        d.tooltips && Y(),
                        ee("update" + _.aria),
                        J("update" + _.aria, function (e, t, i, n, s) {
                            C.forEach(function (e) {
                                var t = m[e],
                                    n = ei(T, e, 0, !0, !0, !0),
                                    r = ei(T, e, 100, !0, !0, !0),
                                    a = s[e],
                                    e = String(d.ariaFormat.to(i[e])),
                                    n = S.fromStepping(n).toFixed(1),
                                    r = S.fromStepping(r).toFixed(1),
                                    a = S.fromStepping(a).toFixed(1);
                                t.children[0].setAttribute("aria-valuemin", n),
                                    t.children[0].setAttribute("aria-valuemax", r),
                                    t.children[0].setAttribute("aria-valuenow", a),
                                    t.children[0].setAttribute("aria-valuetext", e);
                            });
                        });
                    var eh = {
                        destroy: function () {
                            for (
                                ee(_.aria),
                                    ee(_.tooltips),
                                    Object.keys(d.cssClasses).forEach(function (e) {
                                        u(w, d.cssClasses[e]);
                                    });
                                w.firstChild;

                            )
                                w.removeChild(w.firstChild);
                            delete w.noUiSlider;
                        },
                        steps: function () {
                            return C.map(ep);
                        },
                        on: J,
                        off: ee,
                        get: eu,
                        set: ec,
                        setHandle: function (e, t, i, n) {
                            if (!(0 <= (e = Number(e)) && e < C.length))
                                throw Error("noUiSlider: invalid handle number, got: " + e);
                            el(e, ed(t, e), !0, !0, n), et("update", e), i && et("set", e);
                        },
                        reset: function (e) {
                            ec(d.start, e);
                        },
                        __moveHandles: function (e, t, i) {
                            es(e, t, T, i);
                        },
                        options: h,
                        updateOptions: function (e, t) {
                            var i = eu(),
                                s = [
                                    "margin",
                                    "limit",
                                    "padding",
                                    "range",
                                    "animate",
                                    "snap",
                                    "step",
                                    "format",
                                    "pips",
                                    "tooltips",
                                ];
                            s.forEach(function (t) {
                                void 0 !== e[t] && (h[t] = e[t]);
                            });
                            var r = G(h);
                            s.forEach(function (t) {
                                void 0 !== e[t] && (d[t] = r[t]);
                            }),
                                (S = r.spectrum),
                                (d.margin = r.margin),
                                (d.limit = r.limit),
                                (d.padding = r.padding),
                                d.pips ? q(d.pips) : H(),
                                (d.tooltips ? Y : X)(),
                                (T = []),
                                ec(n(e.start) ? e.start : i, t);
                        },
                        target: w,
                        removePips: H,
                        removeTooltips: X,
                        getPositions: function () {
                            return T.slice();
                        },
                        getTooltips: function () {
                            return v;
                        },
                        getOrigins: function () {
                            return m;
                        },
                        pips: q,
                    };
                    return eh;
                })(t, G(r), r)),
                (t.noUiSlider = r)
            );
        }
        var F = { __spectrum: g, cssClasses: y, create: W };
        (e.create = W), (e.cssClasses = y), (e.default = F), Object.defineProperty(e, "__esModule", { value: !0 });
    });
