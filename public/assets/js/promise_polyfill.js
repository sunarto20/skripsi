/**
 * Minified by jsDelivr using Terser v3.14.1.
 * Original file: /npm/promise-polyfill@8.1.3/lib/index.js
 * 
 * Do NOT use SRI with dynamically generated files! More information: https://www.jsdelivr.com/using-sri-with-dynamic-files
 */
"use strict";

function finallyConstructor(e) {
    var n = this.constructor;
    return this.then(function (t) {
        return n.resolve(e()).then(function () {
            return t
        })
    }, function (t) {
        return n.resolve(e()).then(function () {
            return n.reject(t)
        })
    })
}
var setTimeoutFunc = setTimeout;

function isArray(e) {
    return Boolean(e && void 0 !== e.length)
}

function noop() {}

function bind(e, n) {
    return function () {
        e.apply(n, arguments)
    }
}

function Promise(e) {
    if (!(this instanceof Promise)) throw new TypeError("Promises must be constructed via new");
    if ("function" != typeof e) throw new TypeError("not a function");
    this._state = 0, this._handled = !1, this._value = void 0, this._deferreds = [], doResolve(e, this)
}

function handle(e, n) {
    for (; 3 === e._state;) e = e._value;
    0 !== e._state ? (e._handled = !0, Promise._immediateFn(function () {
        var t = 1 === e._state ? n.onFulfilled : n.onRejected;
        if (null !== t) {
            var r;
            try {
                r = t(e._value)
            } catch (e) {
                return void reject(n.promise, e)
            }
            resolve(n.promise, r)
        } else(1 === e._state ? resolve : reject)(n.promise, e._value)
    })) : e._deferreds.push(n)
}

function resolve(e, n) {
    try {
        if (n === e) throw new TypeError("A promise cannot be resolved with itself.");
        if (n && ("object" == typeof n || "function" == typeof n)) {
            var t = n.then;
            if (n instanceof Promise) return e._state = 3, e._value = n, void finale(e);
            if ("function" == typeof t) return void doResolve(bind(t, n), e)
        }
        e._state = 1, e._value = n, finale(e)
    } catch (n) {
        reject(e, n)
    }
}

function reject(e, n) {
    e._state = 2, e._value = n, finale(e)
}

function finale(e) {
    2 === e._state && 0 === e._deferreds.length && Promise._immediateFn(function () {
        e._handled || Promise._unhandledRejectionFn(e._value)
    });
    for (var n = 0, t = e._deferreds.length; n < t; n++) handle(e, e._deferreds[n]);
    e._deferreds = null
}

function Handler(e, n, t) {
    this.onFulfilled = "function" == typeof e ? e : null, this.onRejected = "function" == typeof n ? n : null, this.promise = t
}

function doResolve(e, n) {
    var t = !1;
    try {
        e(function (e) {
            t || (t = !0, resolve(n, e))
        }, function (e) {
            t || (t = !0, reject(n, e))
        })
    } catch (e) {
        if (t) return;
        t = !0, reject(n, e)
    }
}
Promise.prototype.catch = function (e) {
    return this.then(null, e)
}, Promise.prototype.then = function (e, n) {
    var t = new this.constructor(noop);
    return handle(this, new Handler(e, n, t)), t
}, Promise.prototype.finally = finallyConstructor, Promise.all = function (e) {
    return new Promise(function (n, t) {
        if (!isArray(e)) return t(new TypeError("Promise.all accepts an array"));
        var r = Array.prototype.slice.call(e);
        if (0 === r.length) return n([]);
        var o = r.length;

        function i(e, s) {
            try {
                if (s && ("object" == typeof s || "function" == typeof s)) {
                    var c = s.then;
                    if ("function" == typeof c) return void c.call(s, function (n) {
                        i(e, n)
                    }, t)
                }
                r[e] = s, 0 == --o && n(r)
            } catch (e) {
                t(e)
            }
        }
        for (var s = 0; s < r.length; s++) i(s, r[s])
    })
}, Promise.resolve = function (e) {
    return e && "object" == typeof e && e.constructor === Promise ? e : new Promise(function (n) {
        n(e)
    })
}, Promise.reject = function (e) {
    return new Promise(function (n, t) {
        t(e)
    })
}, Promise.race = function (e) {
    return new Promise(function (n, t) {
        if (!isArray(e)) return t(new TypeError("Promise.race accepts an array"));
        for (var r = 0, o = e.length; r < o; r++) Promise.resolve(e[r]).then(n, t)
    })
}, Promise._immediateFn = "function" == typeof setImmediate && function (e) {
    setImmediate(e)
} || function (e) {
    setTimeoutFunc(e, 0)
}, Promise._unhandledRejectionFn = function (e) {
    "undefined" != typeof console && console && console.warn("Possible Unhandled Promise Rejection:", e)
}, module.exports = Promise;
//# sourceMappingURL=/sm/b510c3ef41760e75eb4a5135350c9806a6d0b4049109cedce10e9e045a649c95.map
