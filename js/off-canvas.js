/*  Copyright (c) David Bushell | http://dbushell.com/ */
(function (g, h, c) {
    var d = function (m) {
        return m.trim ? m.trim() : m.replace(/^\s+|\s+$/g, "")
    };
    var e = function (m, n) {
        return(" " + m.className + " ").indexOf(" " + n + " ") !== -1
    };
    var f = function (m, n) {
        if (!e(m, n)) {
            m.className = (m.className === "") ? n : m.className + " " + n
        }
    };
    var k = function (m, n) {
        m.className = d((" " + m.className + " ").replace(" " + n + " ", " "))
    };
    var l = function (m, n) {
        if (m) {
            do {
                if (m.id === n) {
                    return true
                }
                if (m.nodeType === 9) {
                    break
                }
            } while ((m = m.parentNode))
        }
        return false
    };
    var j = h.documentElement;
    var i = g.Modernizr.prefixed("transform"), b = g.Modernizr.prefixed("transition"), a = (function () {
        var m = {WebkitTransition: "webkitTransitionEnd", MozTransition: "transitionend", OTransition: "oTransitionEnd otransitionend", msTransition: "MSTransitionEnd", transition: "transitionend"};
        return m.hasOwnProperty(b) ? m[b] : false
    })();
    g.App = (function () {
        var p = false, q = {};
        var m = h.getElementById("inner-wrapper"), o = false, n = "js-nav";
        q.init = function () {
            if (p) {
                return
            }
            p = true;
            var r = function (s) {
                if (s && s.target === m) {
                    h.removeEventListener(a, r, false)
                }
                o = false
            };
            q.closeNav = function () {
                if (o) {
                    var s = (a && b) ? parseFloat(g.getComputedStyle(m, "")[b + "Duration"]) : 0;
                    if (s > 0) {
                        h.addEventListener(a, r, false)
                    } else {
                        r(null)
                    }
                }
                k(j, n)
            };
            q.openNav = function () {
                if (o) {
                    return
                }
                f(j, n);
                o = true
            };
            q.toggleNav = function (s) {
                if (o && e(j, n)) {
                    q.closeNav()
                } else {
                    q.openNav()
                }
                if (s) {
                    s.preventDefault()
                }
            };
            h.getElementById("nav-open-btn").addEventListener("click", q.toggleNav, false);
            h.getElementById("nav-close-btn").addEventListener("click", q.toggleNav, false);
            h.addEventListener("click", function (s) {
                if (o && !l(s.target, "nav")) {
                    s.preventDefault();
                    q.closeNav()
                }
            }, true);
            f(j, "js-ready")
        };
        return q
    })();
    if (g.addEventListener) {
        g.addEventListener("DOMContentLoaded", g.App.init, false)
    }
})(window, window.document);