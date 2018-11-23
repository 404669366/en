(function (factory) {
    if (typeof define === 'function' && define.amd) {
        define(['jquery'], factory);
    } else if (typeof module === 'object' && module.exports) {
        module.exports = factory(require('jquery'));
    } else {
        factory(window.jQuery);
    }
}(function ($) {
    'use strict';
    var isSupportAmd = typeof define === 'function' && define.amd;
    var isFontInstalled = function (fontName) {
        var testFontName = fontName === 'Comic Sans MS' ? 'Courier New' : 'Comic Sans MS';
        var $tester = $('<div>').css({
            position: 'absolute',
            left: '-9999px',
            top: '-9999px',
            fontSize: '200px'
        }).text('mmmmmmmmmwwwwwww').appendTo(document.body);
        var originalWidth = $tester.css('fontFamily', testFontName).width();
        var width = $tester.css('fontFamily', fontName + ',' + testFontName).width();
        $tester.remove();
        return originalWidth !== width;
    };
    var userAgent = navigator.userAgent;
    var isMSIE = /MSIE|Trident/i.test(userAgent);
    var browserVersion;
    if (isMSIE) {
        var matches = /MSIE (\d+[.]\d+)/.exec(userAgent);
        if (matches) {
            browserVersion = parseFloat(matches[1]);
        }
        matches = /Trident\/.*rv:([0-9]{1,}[\.0-9]{0,})/.exec(userAgent);
        if (matches) {
            browserVersion = parseFloat(matches[1]);
        }
    }
    var isEdge = /Edge\/\d+/.test(userAgent);
    var hasCodeMirror = !!window.CodeMirror;
    if (!hasCodeMirror && isSupportAmd && typeof require !== 'undefined') {
        if (typeof require.resolve !== 'undefined') {
            try {
                require.resolve('codemirror');
                hasCodeMirror = true;
            } catch (e) {
            }
        } else if (typeof eval('require').specified !== 'undefined') {
            hasCodeMirror = eval('require').specified('codemirror');
        }
    }
    var isSupportTouch = (('ontouchstart' in window) || (navigator.MaxTouchPoints > 0) || (navigator.msMaxTouchPoints > 0));
    var agent = {
        isMac: navigator.appVersion.indexOf('Mac') > -1,
        isMSIE: isMSIE,
        isEdge: isEdge,
        isFF: !isEdge && /firefox/i.test(userAgent),
        isPhantom: /PhantomJS/i.test(userAgent),
        isWebkit: !isEdge && /webkit/i.test(userAgent),
        isChrome: !isEdge && /chrome/i.test(userAgent),
        isSafari: !isEdge && /safari/i.test(userAgent),
        browserVersion: browserVersion,
        jqueryVersion: parseFloat($.fn.jquery),
        isSupportAmd: isSupportAmd,
        isSupportTouch: isSupportTouch,
        hasCodeMirror: hasCodeMirror,
        isFontInstalled: isFontInstalled,
        isW3CRangeSupport: !!document.createRange
    };
    var func = (function () {
        var eq = function (itemA) {
            return function (itemB) {
                return itemA === itemB;
            };
        };
        var eq2 = function (itemA, itemB) {
            return itemA === itemB;
        };
        var peq2 = function (propName) {
            return function (itemA, itemB) {
                return itemA[propName] === itemB[propName];
            };
        };
        var ok = function () {
            return true;
        };
        var fail = function () {
            return false;
        };
        var not = function (f) {
            return function () {
                return !f.apply(f, arguments);
            };
        };
        var and = function (fA, fB) {
            return function (item) {
                return fA(item) && fB(item);
            };
        };
        var self = function (a) {
            return a;
        };
        var invoke = function (obj, method) {
            return function () {
                return obj[method].apply(obj, arguments);
            };
        };
        var idCounter = 0;
        var uniqueId = function (prefix) {
            var id = ++idCounter + '';
            return prefix ? prefix + id : id;
        };
        var rect2bnd = function (rect) {
            var $document = $(document);
            return {
                top: rect.top + $document.scrollTop(),
                left: rect.left + $document.scrollLeft(),
                width: rect.right - rect.left,
                height: rect.bottom - rect.top
            };
        };
        var invertObject = function (obj) {
            var inverted = {};
            for (var key in obj) {
                if (obj.hasOwnProperty(key)) {
                    inverted[obj[key]] = key;
                }
            }
            return inverted;
        };
        var namespaceToCamel = function (namespace, prefix) {
            prefix = prefix || '';
            return prefix + namespace.split('.').map(function (name) {
                return name.substring(0, 1).toUpperCase() + name.substring(1);
            }).join('');
        };
        var debounce = function (func, wait, immediate) {
            var timeout;
            return function () {
                var context = this, args = arguments;
                var later = function () {
                    timeout = null;
                    if (!immediate) {
                        func.apply(context, args);
                    }
                };
                var callNow = immediate && !timeout;
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
                if (callNow) {
                    func.apply(context, args);
                }
            };
        };
        return {
            eq: eq,
            eq2: eq2,
            peq2: peq2,
            ok: ok,
            fail: fail,
            self: self,
            not: not,
            and: and,
            invoke: invoke,
            uniqueId: uniqueId,
            rect2bnd: rect2bnd,
            invertObject: invertObject,
            namespaceToCamel: namespaceToCamel,
            debounce: debounce
        };
    })();
    var list = (function () {
        var head = function (array) {
            return array[0];
        };
        var last = function (array) {
            return array[array.length - 1];
        };
        var initial = function (array) {
            return array.slice(0, array.length - 1);
        };
        var tail = function (array) {
            return array.slice(1);
        };
        var find = function (array, pred) {
            for (var idx = 0, len = array.length; idx < len; idx++) {
                var item = array[idx];
                if (pred(item)) {
                    return item;
                }
            }
        };
        var all = function (array, pred) {
            for (var idx = 0, len = array.length; idx < len; idx++) {
                if (!pred(array[idx])) {
                    return false;
                }
            }
            return true;
        };
        var indexOf = function (array, item) {
            return $.inArray(item, array);
        };
        var contains = function (array, item) {
            return indexOf(array, item) !== -1;
        };
        var sum = function (array, fn) {
            fn = fn || func.self;
            return array.reduce(function (memo, v) {
                return memo + fn(v);
            }, 0);
        };
        var from = function (collection) {
            var result = [], idx = -1, length = collection.length;
            while (++idx < length) {
                result[idx] = collection[idx];
            }
            return result;
        };
        var isEmpty = function (array) {
            return !array || !array.length;
        };
        var clusterBy = function (array, fn) {
            if (!array.length) {
                return [];
            }
            var aTail = tail(array);
            return aTail.reduce(function (memo, v) {
                var aLast = last(memo);
                if (fn(last(aLast), v)) {
                    aLast[aLast.length] = v;
                } else {
                    memo[memo.length] = [v];
                }
                return memo;
            }, [[head(array)]]);
        };
        var compact = function (array) {
            var aResult = [];
            for (var idx = 0, len = array.length; idx < len; idx++) {
                if (array[idx]) {
                    aResult.push(array[idx]);
                }
            }
            return aResult;
        };
        var unique = function (array) {
            var results = [];
            for (var idx = 0, len = array.length; idx < len; idx++) {
                if (!contains(results, array[idx])) {
                    results.push(array[idx]);
                }
            }
            return results;
        };
        var next = function (array, item) {
            var idx = indexOf(array, item);
            if (idx === -1) {
                return null;
            }
            return array[idx + 1];
        };
        var prev = function (array, item) {
            var idx = indexOf(array, item);
            if (idx === -1) {
                return null;
            }
            return array[idx - 1];
        };
        return {
            head: head,
            last: last,
            initial: initial,
            tail: tail,
            prev: prev,
            next: next,
            find: find,
            contains: contains,
            all: all,
            sum: sum,
            from: from,
            isEmpty: isEmpty,
            clusterBy: clusterBy,
            compact: compact,
            unique: unique
        };
    })();
    var NBSP_CHAR = String.fromCharCode(160);
    var ZERO_WIDTH_NBSP_CHAR = '\ufeff';
    var dom = (function () {
        var isEditable = function (node) {
            return node && $(node).hasClass('note-editable');
        };
        var isControlSizing = function (node) {
            return node && $(node).hasClass('note-control-sizing');
        };
        var makePredByNodeName = function (nodeName) {
            nodeName = nodeName.toUpperCase();
            return function (node) {
                return node && node.nodeName.toUpperCase() === nodeName;
            };
        };
        var isText = function (node) {
            return node && node.nodeType === 3;
        };
        var isElement = function (node) {
            return node && node.nodeType === 1;
        };
        var isVoid = function (node) {
            return node && /^BR|^IMG|^HR|^IFRAME|^BUTTON|^INPUT/.test(node.nodeName.toUpperCase());
        };
        var isPara = function (node) {
            if (isEditable(node)) {
                return false;
            }
            return node && /^DIV|^P|^LI|^H[1-7]/.test(node.nodeName.toUpperCase());
        };
        var isHeading = function (node) {
            return node && /^H[1-7]/.test(node.nodeName.toUpperCase());
        };
        var isPre = makePredByNodeName('PRE');
        var isLi = makePredByNodeName('LI');
        var isPurePara = function (node) {
            return isPara(node) && !isLi(node);
        };
        var isTable = makePredByNodeName('TABLE');
        var isData = makePredByNodeName('DATA');
        var isInline = function (node) {
            return !isBodyContainer(node) && !isList(node) && !isHr(node) && !isPara(node) && !isTable(node) && !isBlockquote(node) && !isData(node);
        };
        var isList = function (node) {
            return node && /^UL|^OL/.test(node.nodeName.toUpperCase());
        };
        var isHr = makePredByNodeName('HR');
        var isCell = function (node) {
            return node && /^TD|^TH/.test(node.nodeName.toUpperCase());
        };
        var isBlockquote = makePredByNodeName('BLOCKQUOTE');
        var isBodyContainer = function (node) {
            return isCell(node) || isBlockquote(node) || isEditable(node);
        };
        var isAnchor = makePredByNodeName('A');
        var isParaInline = function (node) {
            return isInline(node) && !!ancestor(node, isPara);
        };
        var isBodyInline = function (node) {
            return isInline(node) && !ancestor(node, isPara);
        };
        var isBody = makePredByNodeName('BODY');
        var isClosestSibling = function (nodeA, nodeB) {
            return nodeA.nextSibling === nodeB || nodeA.previousSibling === nodeB;
        };
        var withClosestSiblings = function (node, pred) {
            pred = pred || func.ok;
            var siblings = [];
            if (node.previousSibling && pred(node.previousSibling)) {
                siblings.push(node.previousSibling);
            }
            siblings.push(node);
            if (node.nextSibling && pred(node.nextSibling)) {
                siblings.push(node.nextSibling);
            }
            return siblings;
        };
        var blankHTML = agent.isMSIE && agent.browserVersion < 11 ? '&nbsp;' : '<br>';
        var nodeLength = function (node) {
            if (isText(node)) {
                return node.nodeValue.length;
            }
            if (node) {
                return node.childNodes.length;
            }
            return 0;
        };
        var isEmpty = function (node) {
            var len = nodeLength(node);
            if (len === 0) {
                return true;
            } else if (!isText(node) && len === 1 && node.innerHTML === blankHTML) {
                return true;
            } else if (list.all(node.childNodes, isText) && node.innerHTML === '') {
                return true;
            }
            return false;
        };
        var paddingBlankHTML = function (node) {
            if (!isVoid(node) && !nodeLength(node)) {
                node.innerHTML = blankHTML;
            }
        };
        var ancestor = function (node, pred) {
            while (node) {
                if (pred(node)) {
                    return node;
                }
                if (isEditable(node)) {
                    break;
                }
                node = node.parentNode;
            }
            return null;
        };
        var singleChildAncestor = function (node, pred) {
            node = node.parentNode;
            while (node) {
                if (nodeLength(node) !== 1) {
                    break;
                }
                if (pred(node)) {
                    return node;
                }
                if (isEditable(node)) {
                    break;
                }
                node = node.parentNode;
            }
            return null;
        };
        var listAncestor = function (node, pred) {
            pred = pred || func.fail;
            var ancestors = [];
            ancestor(node, function (el) {
                if (!isEditable(el)) {
                    ancestors.push(el);
                }
                return pred(el);
            });
            return ancestors;
        };
        var lastAncestor = function (node, pred) {
            var ancestors = listAncestor(node);
            return list.last(ancestors.filter(pred));
        };
        var commonAncestor = function (nodeA, nodeB) {
            var ancestors = listAncestor(nodeA);
            for (var n = nodeB; n; n = n.parentNode) {
                if ($.inArray(n, ancestors) > -1) {
                    return n;
                }
            }
            return null;
        };
        var listPrev = function (node, pred) {
            pred = pred || func.fail;
            var nodes = [];
            while (node) {
                if (pred(node)) {
                    break;
                }
                nodes.push(node);
                node = node.previousSibling;
            }
            return nodes;
        };
        var listNext = function (node, pred) {
            pred = pred || func.fail;
            var nodes = [];
            while (node) {
                if (pred(node)) {
                    break;
                }
                nodes.push(node);
                node = node.nextSibling;
            }
            return nodes;
        };
        var listDescendant = function (node, pred) {
            var descendants = [];
            pred = pred || func.ok;
            (function fnWalk(current) {
                if (node !== current && pred(current)) {
                    descendants.push(current);
                }
                for (var idx = 0, len = current.childNodes.length; idx < len; idx++) {
                    fnWalk(current.childNodes[idx]);
                }
            })(node);
            return descendants;
        };
        var wrap = function (node, wrapperName) {
            var parent = node.parentNode;
            var wrapper = $('<' + wrapperName + '>')[0];
            parent.insertBefore(wrapper, node);
            wrapper.appendChild(node);
            return wrapper;
        };
        var insertAfter = function (node, preceding) {
            var next = preceding.nextSibling, parent = preceding.parentNode;
            if (next) {
                parent.insertBefore(node, next);
            } else {
                parent.appendChild(node);
            }
            return node;
        };
        var appendChildNodes = function (node, aChild) {
            $.each(aChild, function (idx, child) {
                node.appendChild(child);
            });
            return node;
        };
        var isLeftEdgePoint = function (point) {
            return point.offset === 0;
        };
        var isRightEdgePoint = function (point) {
            return point.offset === nodeLength(point.node);
        };
        var isEdgePoint = function (point) {
            return isLeftEdgePoint(point) || isRightEdgePoint(point);
        };
        var isLeftEdgeOf = function (node, ancestor) {
            while (node && node !== ancestor) {
                if (position(node) !== 0) {
                    return false;
                }
                node = node.parentNode;
            }
            return true;
        };
        var isRightEdgeOf = function (node, ancestor) {
            if (!ancestor) {
                return false;
            }
            while (node && node !== ancestor) {
                if (position(node) !== nodeLength(node.parentNode) - 1) {
                    return false;
                }
                node = node.parentNode;
            }
            return true;
        };
        var isLeftEdgePointOf = function (point, ancestor) {
            return isLeftEdgePoint(point) && isLeftEdgeOf(point.node, ancestor);
        };
        var isRightEdgePointOf = function (point, ancestor) {
            return isRightEdgePoint(point) && isRightEdgeOf(point.node, ancestor);
        };
        var position = function (node) {
            var offset = 0;
            while ((node = node.previousSibling)) {
                offset += 1;
            }
            return offset;
        };
        var hasChildren = function (node) {
            return !!(node && node.childNodes && node.childNodes.length);
        };
        var prevPoint = function (point, isSkipInnerOffset) {
            var node, offset;
            if (point.offset === 0) {
                if (isEditable(point.node)) {
                    return null;
                }
                node = point.node.parentNode;
                offset = position(point.node);
            } else if (hasChildren(point.node)) {
                node = point.node.childNodes[point.offset - 1];
                offset = nodeLength(node);
            } else {
                node = point.node;
                offset = isSkipInnerOffset ? 0 : point.offset - 1;
            }
            return {node: node, offset: offset};
        };
        var nextPoint = function (point, isSkipInnerOffset) {
            var node, offset;
            if (nodeLength(point.node) === point.offset) {
                if (isEditable(point.node)) {
                    return null;
                }
                node = point.node.parentNode;
                offset = position(point.node) + 1;
            } else if (hasChildren(point.node)) {
                node = point.node.childNodes[point.offset];
                offset = 0;
            } else {
                node = point.node;
                offset = isSkipInnerOffset ? nodeLength(point.node) : point.offset + 1;
            }
            return {node: node, offset: offset};
        };
        var isSamePoint = function (pointA, pointB) {
            return pointA.node === pointB.node && pointA.offset === pointB.offset;
        };
        var isVisiblePoint = function (point) {
            if (isText(point.node) || !hasChildren(point.node) || isEmpty(point.node)) {
                return true;
            }
            var leftNode = point.node.childNodes[point.offset - 1];
            var rightNode = point.node.childNodes[point.offset];
            if ((!leftNode || isVoid(leftNode)) && (!rightNode || isVoid(rightNode))) {
                return true;
            }
            return false;
        };
        var prevPointUntil = function (point, pred) {
            while (point) {
                if (pred(point)) {
                    return point;
                }
                point = prevPoint(point);
            }
            return null;
        };
        var nextPointUntil = function (point, pred) {
            while (point) {
                if (pred(point)) {
                    return point;
                }
                point = nextPoint(point);
            }
            return null;
        };
        var isCharPoint = function (point) {
            if (!isText(point.node)) {
                return false;
            }
            var ch = point.node.nodeValue.charAt(point.offset - 1);
            return ch && (ch !== ' ' && ch !== NBSP_CHAR);
        };
        var walkPoint = function (startPoint, endPoint, handler, isSkipInnerOffset) {
            var point = startPoint;
            while (point) {
                handler(point);
                if (isSamePoint(point, endPoint)) {
                    break;
                }
                var isSkipOffset = isSkipInnerOffset && startPoint.node !== point.node && endPoint.node !== point.node;
                point = nextPoint(point, isSkipOffset);
            }
        };
        var makeOffsetPath = function (ancestor, node) {
            var ancestors = listAncestor(node, func.eq(ancestor));
            return ancestors.map(position).reverse();
        };
        var fromOffsetPath = function (ancestor, offsets) {
            var current = ancestor;
            for (var i = 0, len = offsets.length; i < len; i++) {
                if (current.childNodes.length <= offsets[i]) {
                    current = current.childNodes[current.childNodes.length - 1];
                } else {
                    current = current.childNodes[offsets[i]];
                }
            }
            return current;
        };
        var splitNode = function (point, options) {
            var isSkipPaddingBlankHTML = options && options.isSkipPaddingBlankHTML;
            var isNotSplitEdgePoint = options && options.isNotSplitEdgePoint;
            if (isEdgePoint(point) && (isText(point.node) || isNotSplitEdgePoint)) {
                if (isLeftEdgePoint(point)) {
                    return point.node;
                } else if (isRightEdgePoint(point)) {
                    return point.node.nextSibling;
                }
            }
            if (isText(point.node)) {
                return point.node.splitText(point.offset);
            } else {
                var childNode = point.node.childNodes[point.offset];
                var clone = insertAfter(point.node.cloneNode(false), point.node);
                appendChildNodes(clone, listNext(childNode));
                if (!isSkipPaddingBlankHTML) {
                    paddingBlankHTML(point.node);
                    paddingBlankHTML(clone);
                }
                return clone;
            }
        };
        var splitTree = function (root, point, options) {
            var ancestors = listAncestor(point.node, func.eq(root));
            if (!ancestors.length) {
                return null;
            } else if (ancestors.length === 1) {
                return splitNode(point, options);
            }
            return ancestors.reduce(function (node, parent) {
                if (node === point.node) {
                    node = splitNode(point, options);
                }
                return splitNode({node: parent, offset: node ? dom.position(node) : nodeLength(parent)}, options);
            });
        };
        var splitPoint = function (point, isInline) {
            var pred = isInline ? isPara : isBodyContainer;
            var ancestors = listAncestor(point.node, pred);
            var topAncestor = list.last(ancestors) || point.node;
            var splitRoot, container;
            if (pred(topAncestor)) {
                splitRoot = ancestors[ancestors.length - 2];
                container = topAncestor;
            } else {
                splitRoot = topAncestor;
                container = splitRoot.parentNode;
            }
            var pivot = splitRoot && splitTree(splitRoot, point, {
                isSkipPaddingBlankHTML: isInline,
                isNotSplitEdgePoint: isInline
            });
            if (!pivot && container === point.node) {
                pivot = point.node.childNodes[point.offset];
            }
            return {rightNode: pivot, container: container};
        };
        var create = function (nodeName) {
            return document.createElement(nodeName);
        };
        var createText = function (text) {
            return document.createTextNode(text);
        };
        var remove = function (node, isRemoveChild) {
            if (!node || !node.parentNode) {
                return;
            }
            if (node.removeNode) {
                return node.removeNode(isRemoveChild);
            }
            var parent = node.parentNode;
            if (!isRemoveChild) {
                var nodes = [];
                var i, len;
                for (i = 0, len = node.childNodes.length; i < len; i++) {
                    nodes.push(node.childNodes[i]);
                }
                for (i = 0, len = nodes.length; i < len; i++) {
                    parent.insertBefore(nodes[i], node);
                }
            }
            parent.removeChild(node);
        };
        var removeWhile = function (node, pred) {
            while (node) {
                if (isEditable(node) || !pred(node)) {
                    break;
                }
                var parent = node.parentNode;
                remove(node);
                node = parent;
            }
        };
        var replace = function (node, nodeName) {
            if (node.nodeName.toUpperCase() === nodeName.toUpperCase()) {
                return node;
            }
            var newNode = create(nodeName);
            if (node.style.cssText) {
                newNode.style.cssText = node.style.cssText;
            }
            appendChildNodes(newNode, list.from(node.childNodes));
            insertAfter(newNode, node);
            remove(node);
            return newNode;
        };
        var isTextarea = makePredByNodeName('TEXTAREA');
        var value = function ($node, stripLinebreaks) {
            var val = isTextarea($node[0]) ? $node.val() : $node.html();
            if (stripLinebreaks) {
                return val.replace(/[\n\r]/g, '');
            }
            return val;
        };
        var html = function ($node, isNewlineOnBlock) {
            var markup = value($node);
            if (isNewlineOnBlock) {
                var regexTag = /<(\/?)(\b(?!!)[^>\s]*)(.*?)(\s*\/?>)/g;
                markup = markup.replace(regexTag, function (match, endSlash, name) {
                    name = name.toUpperCase();
                    var isEndOfInlineContainer = /^DIV|^TD|^TH|^P|^LI|^H[1-7]/.test(name) && !!endSlash;
                    var isBlockNode = /^BLOCKQUOTE|^TABLE|^TBODY|^TR|^HR|^UL|^OL/.test(name);
                    return match + ((isEndOfInlineContainer || isBlockNode) ? '\n' : '');
                });
                markup = $.trim(markup);
            }
            return markup;
        };
        var posFromPlaceholder = function (placeholder) {
            var $placeholder = $(placeholder);
            var pos = $placeholder.offset();
            var height = $placeholder.outerHeight(true);
            return {left: pos.left, top: pos.top + height};
        };
        var attachEvents = function ($node, events) {
            Object.keys(events).forEach(function (key) {
                $node.on(key, events[key]);
            });
        };
        var detachEvents = function ($node, events) {
            Object.keys(events).forEach(function (key) {
                $node.off(key, events[key]);
            });
        };
        var isCustomStyleTag = function (node) {
            return node && !dom.isText(node) && list.contains(node.classList, 'note-styletag');
        };
        return {
            NBSP_CHAR: NBSP_CHAR,
            ZERO_WIDTH_NBSP_CHAR: ZERO_WIDTH_NBSP_CHAR,
            blank: blankHTML,
            emptyPara: '<p>' + blankHTML + '</p>',
            makePredByNodeName: makePredByNodeName,
            isEditable: isEditable,
            isControlSizing: isControlSizing,
            isText: isText,
            isElement: isElement,
            isVoid: isVoid,
            isPara: isPara,
            isPurePara: isPurePara,
            isHeading: isHeading,
            isInline: isInline,
            isBlock: func.not(isInline),
            isBodyInline: isBodyInline,
            isBody: isBody,
            isParaInline: isParaInline,
            isPre: isPre,
            isList: isList,
            isTable: isTable,
            isData: isData,
            isCell: isCell,
            isBlockquote: isBlockquote,
            isBodyContainer: isBodyContainer,
            isAnchor: isAnchor,
            isDiv: makePredByNodeName('DIV'),
            isLi: isLi,
            isBR: makePredByNodeName('BR'),
            isSpan: makePredByNodeName('SPAN'),
            isB: makePredByNodeName('B'),
            isU: makePredByNodeName('U'),
            isS: makePredByNodeName('S'),
            isI: makePredByNodeName('I'),
            isImg: makePredByNodeName('IMG'),
            isTextarea: isTextarea,
            isEmpty: isEmpty,
            isEmptyAnchor: func.and(isAnchor, isEmpty),
            isClosestSibling: isClosestSibling,
            withClosestSiblings: withClosestSiblings,
            nodeLength: nodeLength,
            isLeftEdgePoint: isLeftEdgePoint,
            isRightEdgePoint: isRightEdgePoint,
            isEdgePoint: isEdgePoint,
            isLeftEdgeOf: isLeftEdgeOf,
            isRightEdgeOf: isRightEdgeOf,
            isLeftEdgePointOf: isLeftEdgePointOf,
            isRightEdgePointOf: isRightEdgePointOf,
            prevPoint: prevPoint,
            nextPoint: nextPoint,
            isSamePoint: isSamePoint,
            isVisiblePoint: isVisiblePoint,
            prevPointUntil: prevPointUntil,
            nextPointUntil: nextPointUntil,
            isCharPoint: isCharPoint,
            walkPoint: walkPoint,
            ancestor: ancestor,
            singleChildAncestor: singleChildAncestor,
            listAncestor: listAncestor,
            lastAncestor: lastAncestor,
            listNext: listNext,
            listPrev: listPrev,
            listDescendant: listDescendant,
            commonAncestor: commonAncestor,
            wrap: wrap,
            insertAfter: insertAfter,
            appendChildNodes: appendChildNodes,
            position: position,
            hasChildren: hasChildren,
            makeOffsetPath: makeOffsetPath,
            fromOffsetPath: fromOffsetPath,
            splitTree: splitTree,
            splitPoint: splitPoint,
            create: create,
            createText: createText,
            remove: remove,
            removeWhile: removeWhile,
            replace: replace,
            html: html,
            value: value,
            posFromPlaceholder: posFromPlaceholder,
            attachEvents: attachEvents,
            detachEvents: detachEvents,
            isCustomStyleTag: isCustomStyleTag
        };
    })();
    var Context = function ($note, options) {
        var self = this;
        var ui = $.summernote.ui;
        this.memos = {};
        this.modules = {};
        this.layoutInfo = {};
        this.options = options;
        this.initialize = function () {
            this.layoutInfo = ui.createLayout($note, options);
            this._initialize();
            $note.hide();
            return this;
        };
        this.destroy = function () {
            this._destroy();
            $note.removeData('summernote');
            ui.removeLayout($note, this.layoutInfo);
        };
        this.reset = function () {
            var disabled = self.isDisabled();
            this.code(dom.emptyPara);
            this._destroy();
            this._initialize();
            if (disabled) {
                self.disable();
            }
        };
        this._initialize = function () {
            var buttons = $.extend({}, this.options.buttons);
            Object.keys(buttons).forEach(function (key) {
                self.memo('button.' + key, buttons[key]);
            });
            var modules = $.extend({}, this.options.modules, $.summernote.plugins || {});
            Object.keys(modules).forEach(function (key) {
                self.module(key, modules[key], true);
            });
            Object.keys(this.modules).forEach(function (key) {
                self.initializeModule(key);
            });
        };
        this._destroy = function () {
            Object.keys(this.modules).reverse().forEach(function (key) {
                self.removeModule(key);
            });
            Object.keys(this.memos).forEach(function (key) {
                self.removeMemo(key);
            });
            this.triggerEvent('destroy', this);
        };
        this.code = function (html) {
            var isActivated = this.invoke('codeview.isActivated');
            if (html === undefined) {
                this.invoke('codeview.sync');
                return isActivated ? this.layoutInfo.codable.val() : this.layoutInfo.editable.html();
            } else {
                if (isActivated) {
                    this.layoutInfo.codable.val(html);
                } else {
                    this.layoutInfo.editable.html(html);
                }
                $note.val(html);
                this.triggerEvent('change', html);
            }
        };
        this.isDisabled = function () {
            return this.layoutInfo.editable.attr('contenteditable') === 'false';
        };
        this.enable = function () {
            this.layoutInfo.editable.attr('contenteditable', true);
            this.invoke('toolbar.activate', true);
            this.triggerEvent('disable', false);
        };
        this.disable = function () {
            if (this.invoke('codeview.isActivated')) {
                this.invoke('codeview.deactivate');
            }
            this.layoutInfo.editable.attr('contenteditable', false);
            this.invoke('toolbar.deactivate', true);
            this.triggerEvent('disable', true);
        };
        this.triggerEvent = function () {
            var namespace = list.head(arguments);
            var args = list.tail(list.from(arguments));
            var callback = this.options.callbacks[func.namespaceToCamel(namespace, 'on')];
            if (callback) {
                callback.apply($note[0], args);
            }
            $note.trigger('summernote.' + namespace, args);
        };
        this.initializeModule = function (key) {
            var module = this.modules[key];
            module.shouldInitialize = module.shouldInitialize || func.ok;
            if (!module.shouldInitialize()) {
                return;
            }
            if (module.initialize) {
                module.initialize();
            }
            if (module.events) {
                dom.attachEvents($note, module.events);
            }
        };
        this.module = function (key, ModuleClass, withoutIntialize) {
            if (arguments.length === 1) {
                return this.modules[key];
            }
            this.modules[key] = new ModuleClass(this);
            if (!withoutIntialize) {
                this.initializeModule(key);
            }
        };
        this.removeModule = function (key) {
            var module = this.modules[key];
            if (module.shouldInitialize()) {
                if (module.events) {
                    dom.detachEvents($note, module.events);
                }
                if (module.destroy) {
                    module.destroy();
                }
            }
            delete this.modules[key];
        };
        this.memo = function (key, obj) {
            if (arguments.length === 1) {
                return this.memos[key];
            }
            this.memos[key] = obj;
        };
        this.removeMemo = function (key) {
            if (this.memos[key] && this.memos[key].destroy) {
                this.memos[key].destroy();
            }
            delete this.memos[key];
        };
        this.createInvokeHandlerAndUpdateState = function (namespace, value) {
            return function (event) {
                self.createInvokeHandler(namespace, value)(event);
                self.invoke('buttons.updateCurrentStyle');
            };
        };
        this.createInvokeHandler = function (namespace, value) {
            return function (event) {
                event.preventDefault();
                var $target = $(event.target);
                self.invoke(namespace, value || $target.closest('[data-value]').data('value'), $target);
            };
        };
        this.invoke = function () {
            var namespace = list.head(arguments);
            var args = list.tail(list.from(arguments));
            var splits = namespace.split('.');
            var hasSeparator = splits.length > 1;
            var moduleName = hasSeparator && list.head(splits);
            var methodName = hasSeparator ? list.last(splits) : list.head(splits);
            var module = this.modules[moduleName || 'editor'];
            if (!moduleName && this[methodName]) {
                return this[methodName].apply(this, args);
            } else if (module && module[methodName] && module.shouldInitialize()) {
                return module[methodName].apply(module, args);
            }
        };
        return this.initialize();
    };
    $.fn.extend({
        summernote: function () {
            var type = $.type(list.head(arguments));
            var isExternalAPICalled = type === 'string';
            var hasInitOptions = type === 'object';
            var options = hasInitOptions ? list.head(arguments) : {};
            options = $.extend({}, $.summernote.options, options);
            options.langInfo = $.extend(true, {}, $.summernote.lang['en-US'], $.summernote.lang[options.lang]);
            options.icons = $.extend(true, {}, $.summernote.options.icons, options.icons);
            options.tooltip = options.tooltip === 'auto' ? !agent.isSupportTouch : options.tooltip;
            this.each(function (idx, note) {
                var $note = $(note);
                if (!$note.data('summernote')) {
                    var context = new Context($note, options);
                    $note.data('summernote', context);
                    $note.data('summernote').triggerEvent('init', context.layoutInfo);
                }
            });
            var $note = this.first();
            if ($note.length) {
                var context = $note.data('summernote');
                if (isExternalAPICalled) {
                    return context.invoke.apply(context, list.from(arguments));
                } else if (options.focus) {
                    context.invoke('editor.focus');
                }
            }
            return this;
        }
    });
    var Renderer = function (markup, children, options, callback) {
        this.render = function ($parent) {
            var $node = $(markup);
            if (options && options.contents) {
                $node.html(options.contents);
            }
            if (options && options.className) {
                $node.addClass(options.className);
            }
            if (options && options.data) {
                $.each(options.data, function (k, v) {
                    $node.attr('data-' + k, v);
                });
            }
            if (options && options.click) {
                $node.on('click', options.click);
            }
            if (children) {
                var $container = $node.find('.note-children-container');
                children.forEach(function (child) {
                    child.render($container.length ? $container : $node);
                });
            }
            if (callback) {
                callback($node, options);
            }
            if (options && options.callback) {
                options.callback($node);
            }
            if ($parent) {
                $parent.append($node);
            }
            return $node;
        };
    };
    var renderer = {
        create: function (markup, callback) {
            return function () {
                var children = $.isArray(arguments[0]) ? arguments[0] : [];
                var options = typeof arguments[1] === 'object' ? arguments[1] : arguments[0];
                if (options && options.children) {
                    children = options.children;
                }
                return new Renderer(markup, children, options, callback);
            };
        }
    };
    var editor = renderer.create('<div class="note-editor note-frame panel panel-default"/>');
    var toolbar = renderer.create('<div class="note-toolbar panel-heading"/>');
    var editingArea = renderer.create('<div class="note-editing-area"/>');
    var codable = renderer.create('<textarea class="note-codable"/>');
    var editable = renderer.create('<div class="note-editable panel-body" contentEditable="true"/>');
    var statusbar = renderer.create(['<div class="note-statusbar">', '  <div class="note-resizebar">', '    <div class="note-icon-bar"/>', '    <div class="note-icon-bar"/>', '    <div class="note-icon-bar"/>', '  </div>', '</div>'].join(''));
    var airEditor = renderer.create('<div class="note-editor"/>');
    var airEditable = renderer.create('<div class="note-editable" contentEditable="true"/>');
    var buttonGroup = renderer.create('<div class="note-btn-group btn-group">');
    var dropdown = renderer.create('<div class="dropdown-menu">', function ($node, options) {
        var markup = $.isArray(options.items) ? options.items.map(function (item) {
            var value = (typeof item === 'string') ? item : (item.value || '');
            var content = options.template ? options.template(item) : item;
            var option = (typeof item === 'object') ? item.option : undefined;
            var dataValue = 'data-value="' + value + '"';
            var dataOption = (option !== undefined) ? ' data-option="' + option + '"' : '';
            return '<li><a href="#" ' + (dataValue + dataOption) + '>' + content + '</a></li>';
        }).join('') : options.items;
        $node.html(markup);
    });
    var dropdownCheck = renderer.create('<div class="dropdown-menu note-check">', function ($node, options) {
        var markup = $.isArray(options.items) ? options.items.map(function (item) {
            var value = (typeof item === 'string') ? item : (item.value || '');
            var content = options.template ? options.template(item) : item;
            return '<li><a href="#" data-value="' + value + '">' + icon(options.checkClassName) + ' ' + content + '</a></li>';
        }).join('') : options.items;
        $node.html(markup);
    });
    var palette = renderer.create('<div class="note-color-palette"/>', function ($node, options) {
        var contents = [];
        for (var row = 0, rowSize = options.colors.length; row < rowSize; row++) {
            var eventName = options.eventName;
            var colors = options.colors[row];
            var buttons = [];
            for (var col = 0, colSize = colors.length; col < colSize; col++) {
                var color = colors[col];
                buttons.push(['<button type="button" class="note-color-btn"', 'style="background-color:', color, '" ', 'data-event="', eventName, '" ', 'data-value="', color, '" ', 'title="', color, '" ', 'data-toggle="button" tabindex="-1"></button>'].join(''));
            }
            contents.push('<div class="note-color-row">' + buttons.join('') + '</div>');
        }
        $node.html(contents.join(''));
        $node.find('.note-color-btn').tooltip({container: 'body', trigger: 'hover', placement: 'bottom'});
    });
    var dialog = renderer.create('<div class="modal" aria-hidden="false" tabindex="-1"/>', function ($node, options) {
        if (options.fade) {
            $node.addClass('fade');
        }
        $node.html(['<div class="modal-dialog">', '  <div class="modal-content">', (options.title ? '    <div class="modal-header">' +
            '      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
            '      <h4 class="modal-title">' + options.title + '</h4>' +
            '    </div>' : ''), '    <div class="modal-body">' + options.body + '</div>', (options.footer ? '    <div class="modal-footer">' + options.footer + '</div>' : ''), '  </div>', '</div>'].join(''));
    });
    var popover = renderer.create(['<div class="note-popover popover in">', '  <div class="arrow"/>', '  <div class="popover-content note-children-container"/>', '</div>'].join(''), function ($node, options) {
        var direction = typeof options.direction !== 'undefined' ? options.direction : 'bottom';
        $node.addClass(direction);
        if (options.hideArrow) {
            $node.find('.arrow').hide();
        }
    });
    var icon = function (iconClassName, tagName) {
        tagName = tagName || 'i';
        return '<' + tagName + ' class="' + iconClassName + '"/>';
    };
    var ui = {
        editor: editor,
        toolbar: toolbar,
        editingArea: editingArea,
        codable: codable,
        editable: editable,
        statusbar: statusbar,
        airEditor: airEditor,
        airEditable: airEditable,
        buttonGroup: buttonGroup,
        dropdown: dropdown,
        dropdownCheck: dropdownCheck,
        palette: palette,
        dialog: dialog,
        popover: popover,
        icon: icon,
        options: {},
        button: function ($node, options) {
            return renderer.create('<button type="button" class="note-btn btn btn-default btn-sm" tabindex="-1">', function ($node, options) {
                if (options && options.tooltip && self.options.tooltip) {
                    $node.attr({title: options.tooltip}).tooltip({
                        container: 'body',
                        trigger: 'hover',
                        placement: 'bottom'
                    });
                }
            })($node, options);
        },
        toggleBtn: function ($btn, isEnable) {
            $btn.toggleClass('disabled', !isEnable);
            $btn.attr('disabled', !isEnable);
        },
        toggleBtnActive: function ($btn, isActive) {
            $btn.toggleClass('active', isActive);
        },
        onDialogShown: function ($dialog, handler) {
            $dialog.one('shown.bs.modal', handler);
        },
        onDialogHidden: function ($dialog, handler) {
            $dialog.one('hidden.bs.modal', handler);
        },
        showDialog: function ($dialog) {
            $dialog.modal('show');
        },
        hideDialog: function ($dialog) {
            $dialog.modal('hide');
        },
        createLayout: function ($note, options) {
            self.options = options;
            var $editor = (options.airMode ? ui.airEditor([ui.editingArea([ui.airEditable()])]) : ui.editor([ui.toolbar(), ui.editingArea([ui.codable(), ui.editable()]), ui.statusbar()])).render();
            $editor.insertAfter($note);
            return {
                note: $note,
                editor: $editor,
                toolbar: $editor.find('.note-toolbar'),
                editingArea: $editor.find('.note-editing-area'),
                editable: $editor.find('.note-editable'),
                codable: $editor.find('.note-codable'),
                statusbar: $editor.find('.note-statusbar')
            };
        },
        removeLayout: function ($note, layoutInfo) {
            $note.html(layoutInfo.editable.html());
            layoutInfo.editor.remove();
            $note.show();
        }
    };
    $.summernote = $.summernote || {lang: {}};
    $.extend($.summernote.lang, {
        'en-US': {
            font: {
                bold: 'Bold',
                italic: 'Italic',
                underline: 'Underline',
                clear: 'Remove Font Style',
                height: 'Line Height',
                name: 'Font Family',
                strikethrough: 'Strikethrough',
                subscript: 'Subscript',
                superscript: 'Superscript',
                size: 'Font Size'
            },
            image: {
                image: 'Picture',
                insert: 'Insert Image',
                resizeFull: 'Resize Full',
                resizeHalf: 'Resize Half',
                resizeQuarter: 'Resize Quarter',
                floatLeft: 'Float Left',
                floatRight: 'Float Right',
                floatNone: 'Float None',
                shapeRounded: 'Shape: Rounded',
                shapeCircle: 'Shape: Circle',
                shapeThumbnail: 'Shape: Thumbnail',
                shapeNone: 'Shape: None',
                dragImageHere: 'Drag image or text here',
                dropImage: 'Drop image or Text',
                selectFromFiles: 'Select from files',
                maximumFileSize: 'Maximum file size',
                maximumFileSizeError: 'Maximum file size exceeded.',
                url: 'Image URL',
                remove: 'Remove Image'
            },
            video: {
                video: 'Video',
                videoLink: 'Video Link',
                insert: 'Insert Video',
                url: 'Video URL?',
                providers: '(YouTube, Vimeo, Vine, Instagram, DailyMotion or Youku)'
            },
            link: {
                link: 'Link',
                insert: 'Insert Link',
                unlink: 'Unlink',
                edit: 'Edit',
                textToDisplay: 'Text to display',
                url: 'To what URL should this link go?',
                openInNewWindow: 'Open in new window'
            },
            table: {
                table: 'Table',
                addRowAbove: 'Add row above',
                addRowBelow: 'Add row below',
                addColLeft: 'Add column left',
                addColRight: 'Add column right',
                delRow: 'Delete row',
                delCol: 'Delete column',
                delTable: 'Delete table'
            },
            hr: {insert: 'Insert Horizontal Rule'},
            style: {
                style: 'Style',
                p: 'Normal',
                blockquote: 'Quote',
                pre: 'Code',
                h1: 'Header 1',
                h2: 'Header 2',
                h3: 'Header 3',
                h4: 'Header 4',
                h5: 'Header 5',
                h6: 'Header 6'
            },
            lists: {unordered: 'Unordered list', ordered: 'Ordered list'},
            options: {help: 'Help', fullscreen: 'Full Screen', codeview: 'Code View'},
            paragraph: {
                paragraph: 'Paragraph',
                outdent: 'Outdent',
                indent: 'Indent',
                left: 'Align left',
                center: 'Align center',
                right: 'Align right',
                justify: 'Justify full'
            },
            color: {
                recent: 'Recent Color',
                more: 'More Color',
                background: 'Background Color',
                foreground: 'Foreground Color',
                transparent: 'Transparent',
                setTransparent: 'Set transparent',
                reset: 'Reset',
                resetToDefault: 'Reset to default'
            },
            shortcut: {
                shortcuts: 'Keyboard shortcuts',
                close: 'Close',
                textFormatting: 'Text formatting',
                action: 'Action',
                paragraphFormatting: 'Paragraph formatting',
                documentStyle: 'Document Style',
                extraKeys: 'Extra keys'
            },
            help: {
                'insertParagraph': 'Insert Paragraph',
                'undo': 'Undoes the last command',
                'redo': 'Redoes the last command',
                'tab': 'Tab',
                'untab': 'Untab',
                'bold': 'Set a bold style',
                'italic': 'Set a italic style',
                'underline': 'Set a underline style',
                'strikethrough': 'Set a strikethrough style',
                'removeFormat': 'Clean a style',
                'justifyLeft': 'Set left align',
                'justifyCenter': 'Set center align',
                'justifyRight': 'Set right align',
                'justifyFull': 'Set full align',
                'insertUnorderedList': 'Toggle unordered list',
                'insertOrderedList': 'Toggle ordered list',
                'outdent': 'Outdent on current paragraph',
                'indent': 'Indent on current paragraph',
                'formatPara': 'Change current block\'s format as a paragraph(P tag)',
                'formatH1': 'Change current block\'s format as H1',
                'formatH2': 'Change current block\'s format as H2',
                'formatH3': 'Change current block\'s format as H3',
                'formatH4': 'Change current block\'s format as H4',
                'formatH5': 'Change current block\'s format as H5',
                'formatH6': 'Change current block\'s format as H6',
                'insertHorizontalRule': 'Insert horizontal rule',
                'linkDialog.show': 'Show Link Dialog'
            },
            history: {undo: 'Undo', redo: 'Redo'},
            specialChar: {specialChar: 'SPECIAL CHARACTERS', select: 'Select Special characters'}
        }
    });
    var key = (function () {
        var keyMap = {
            'BACKSPACE': 8,
            'TAB': 9,
            'ENTER': 13,
            'SPACE': 32,
            'LEFT': 37,
            'UP': 38,
            'RIGHT': 39,
            'DOWN': 40,
            'NUM0': 48,
            'NUM1': 49,
            'NUM2': 50,
            'NUM3': 51,
            'NUM4': 52,
            'NUM5': 53,
            'NUM6': 54,
            'NUM7': 55,
            'NUM8': 56,
            'B': 66,
            'E': 69,
            'I': 73,
            'J': 74,
            'K': 75,
            'L': 76,
            'R': 82,
            'S': 83,
            'U': 85,
            'V': 86,
            'Y': 89,
            'Z': 90,
            'SLASH': 191,
            'LEFTBRACKET': 219,
            'BACKSLASH': 220,
            'RIGHTBRACKET': 221
        };
        return {
            isEdit: function (keyCode) {
                return list.contains([keyMap.BACKSPACE, keyMap.TAB, keyMap.ENTER, keyMap.SPACE], keyCode);
            }, isMove: function (keyCode) {
                return list.contains([keyMap.LEFT, keyMap.UP, keyMap.RIGHT, keyMap.DOWN], keyCode);
            }, nameFromCode: func.invertObject(keyMap), code: keyMap
        };
    })();
    var range = (function () {
        var textRangeToPoint = function (textRange, isStart) {
            var container = textRange.parentElement(), offset;
            var tester = document.body.createTextRange(), prevContainer;
            var childNodes = list.from(container.childNodes);
            for (offset = 0; offset < childNodes.length; offset++) {
                if (dom.isText(childNodes[offset])) {
                    continue;
                }
                tester.moveToElementText(childNodes[offset]);
                if (tester.compareEndPoints('StartToStart', textRange) >= 0) {
                    break;
                }
                prevContainer = childNodes[offset];
            }
            if (offset !== 0 && dom.isText(childNodes[offset - 1])) {
                var textRangeStart = document.body.createTextRange(), curTextNode = null;
                textRangeStart.moveToElementText(prevContainer || container);
                textRangeStart.collapse(!prevContainer);
                curTextNode = prevContainer ? prevContainer.nextSibling : container.firstChild;
                var pointTester = textRange.duplicate();
                pointTester.setEndPoint('StartToStart', textRangeStart);
                var textCount = pointTester.text.replace(/[\r\n]/g, '').length;
                while (textCount > curTextNode.nodeValue.length && curTextNode.nextSibling) {
                    textCount -= curTextNode.nodeValue.length;
                    curTextNode = curTextNode.nextSibling;
                }
                var dummy = curTextNode.nodeValue;
                if (isStart && curTextNode.nextSibling && dom.isText(curTextNode.nextSibling) && textCount === curTextNode.nodeValue.length) {
                    textCount -= curTextNode.nodeValue.length;
                    curTextNode = curTextNode.nextSibling;
                }
                container = curTextNode;
                offset = textCount;
            }
            return {cont: container, offset: offset};
        };
        var pointToTextRange = function (point) {
            var textRangeInfo = function (container, offset) {
                var node, isCollapseToStart;
                if (dom.isText(container)) {
                    var prevTextNodes = dom.listPrev(container, func.not(dom.isText));
                    var prevContainer = list.last(prevTextNodes).previousSibling;
                    node = prevContainer || container.parentNode;
                    offset += list.sum(list.tail(prevTextNodes), dom.nodeLength);
                    isCollapseToStart = !prevContainer;
                } else {
                    node = container.childNodes[offset] || container;
                    if (dom.isText(node)) {
                        return textRangeInfo(node, 0);
                    }
                    offset = 0;
                    isCollapseToStart = false;
                }
                return {node: node, collapseToStart: isCollapseToStart, offset: offset};
            };
            var textRange = document.body.createTextRange();
            var info = textRangeInfo(point.node, point.offset);
            textRange.moveToElementText(info.node);
            textRange.collapse(info.collapseToStart);
            textRange.moveStart('character', info.offset);
            return textRange;
        };
        var WrappedRange = function (sc, so, ec, eo) {
            this.sc = sc;
            this.so = so;
            this.ec = ec;
            this.eo = eo;
            var nativeRange = function () {
                if (agent.isW3CRangeSupport) {
                    var w3cRange = document.createRange();
                    w3cRange.setStart(sc, so);
                    w3cRange.setEnd(ec, eo);
                    return w3cRange;
                } else {
                    var textRange = pointToTextRange({node: sc, offset: so});
                    textRange.setEndPoint('EndToEnd', pointToTextRange({node: ec, offset: eo}));
                    return textRange;
                }
            };
            this.getPoints = function () {
                return {sc: sc, so: so, ec: ec, eo: eo};
            };
            this.getStartPoint = function () {
                return {node: sc, offset: so};
            };
            this.getEndPoint = function () {
                return {node: ec, offset: eo};
            };
            this.select = function () {
                var nativeRng = nativeRange();
                if (agent.isW3CRangeSupport) {
                    var selection = document.getSelection();
                    if (selection.rangeCount > 0) {
                        selection.removeAllRanges();
                    }
                    selection.addRange(nativeRng);
                } else {
                    nativeRng.select();
                }
                return this;
            };
            this.scrollIntoView = function (container) {
                var height = $(container).height();
                if (container.scrollTop + height < this.sc.offsetTop) {
                    container.scrollTop += Math.abs(container.scrollTop + height - this.sc.offsetTop);
                }
                return this;
            };
            this.normalize = function () {
                var getVisiblePoint = function (point, isLeftToRight) {
                    if ((dom.isVisiblePoint(point) && !dom.isEdgePoint(point)) || (dom.isVisiblePoint(point) && dom.isRightEdgePoint(point) && !isLeftToRight) || (dom.isVisiblePoint(point) && dom.isLeftEdgePoint(point) && isLeftToRight) || (dom.isVisiblePoint(point) && dom.isBlock(point.node) && dom.isEmpty(point.node))) {
                        return point;
                    }
                    var block = dom.ancestor(point.node, dom.isBlock);
                    if (((dom.isLeftEdgePointOf(point, block) || dom.isVoid(dom.prevPoint(point).node)) && !isLeftToRight) || ((dom.isRightEdgePointOf(point, block) || dom.isVoid(dom.nextPoint(point).node)) && isLeftToRight)) {
                        if (dom.isVisiblePoint(point)) {
                            return point;
                        }
                        isLeftToRight = !isLeftToRight;
                    }
                    var nextPoint = isLeftToRight ? dom.nextPointUntil(dom.nextPoint(point), dom.isVisiblePoint) : dom.prevPointUntil(dom.prevPoint(point), dom.isVisiblePoint);
                    return nextPoint || point;
                };
                var endPoint = getVisiblePoint(this.getEndPoint(), false);
                var startPoint = this.isCollapsed() ? endPoint : getVisiblePoint(this.getStartPoint(), true);
                return new WrappedRange(startPoint.node, startPoint.offset, endPoint.node, endPoint.offset);
            };
            this.nodes = function (pred, options) {
                pred = pred || func.ok;
                var includeAncestor = options && options.includeAncestor;
                var fullyContains = options && options.fullyContains;
                var startPoint = this.getStartPoint();
                var endPoint = this.getEndPoint();
                var nodes = [];
                var leftEdgeNodes = [];
                dom.walkPoint(startPoint, endPoint, function (point) {
                    if (dom.isEditable(point.node)) {
                        return;
                    }
                    var node;
                    if (fullyContains) {
                        if (dom.isLeftEdgePoint(point)) {
                            leftEdgeNodes.push(point.node);
                        }
                        if (dom.isRightEdgePoint(point) && list.contains(leftEdgeNodes, point.node)) {
                            node = point.node;
                        }
                    } else if (includeAncestor) {
                        node = dom.ancestor(point.node, pred);
                    } else {
                        node = point.node;
                    }
                    if (node && pred(node)) {
                        nodes.push(node);
                    }
                }, true);
                return list.unique(nodes);
            };
            this.commonAncestor = function () {
                return dom.commonAncestor(sc, ec);
            };
            this.expand = function (pred) {
                var startAncestor = dom.ancestor(sc, pred);
                var endAncestor = dom.ancestor(ec, pred);
                if (!startAncestor && !endAncestor) {
                    return new WrappedRange(sc, so, ec, eo);
                }
                var boundaryPoints = this.getPoints();
                if (startAncestor) {
                    boundaryPoints.sc = startAncestor;
                    boundaryPoints.so = 0;
                }
                if (endAncestor) {
                    boundaryPoints.ec = endAncestor;
                    boundaryPoints.eo = dom.nodeLength(endAncestor);
                }
                return new WrappedRange(boundaryPoints.sc, boundaryPoints.so, boundaryPoints.ec, boundaryPoints.eo);
            };
            this.collapse = function (isCollapseToStart) {
                if (isCollapseToStart) {
                    return new WrappedRange(sc, so, sc, so);
                } else {
                    return new WrappedRange(ec, eo, ec, eo);
                }
            };
            this.splitText = function () {
                var isSameContainer = sc === ec;
                var boundaryPoints = this.getPoints();
                if (dom.isText(ec) && !dom.isEdgePoint(this.getEndPoint())) {
                    ec.splitText(eo);
                }
                if (dom.isText(sc) && !dom.isEdgePoint(this.getStartPoint())) {
                    boundaryPoints.sc = sc.splitText(so);
                    boundaryPoints.so = 0;
                    if (isSameContainer) {
                        boundaryPoints.ec = boundaryPoints.sc;
                        boundaryPoints.eo = eo - so;
                    }
                }
                return new WrappedRange(boundaryPoints.sc, boundaryPoints.so, boundaryPoints.ec, boundaryPoints.eo);
            };
            this.deleteContents = function () {
                if (this.isCollapsed()) {
                    return this;
                }
                var rng = this.splitText();
                var nodes = rng.nodes(null, {fullyContains: true});
                var point = dom.prevPointUntil(rng.getStartPoint(), function (point) {
                    return !list.contains(nodes, point.node);
                });
                var emptyParents = [];
                $.each(nodes, function (idx, node) {
                    var parent = node.parentNode;
                    if (point.node !== parent && dom.nodeLength(parent) === 1) {
                        emptyParents.push(parent);
                    }
                    dom.remove(node, false);
                });
                $.each(emptyParents, function (idx, node) {
                    dom.remove(node, false);
                });
                return new WrappedRange(point.node, point.offset, point.node, point.offset).normalize();
            };
            var makeIsOn = function (pred) {
                return function () {
                    var ancestor = dom.ancestor(sc, pred);
                    return !!ancestor && (ancestor === dom.ancestor(ec, pred));
                };
            };
            this.isOnEditable = makeIsOn(dom.isEditable);
            this.isOnList = makeIsOn(dom.isList);
            this.isOnAnchor = makeIsOn(dom.isAnchor);
            this.isOnCell = makeIsOn(dom.isCell);
            this.isOnData = makeIsOn(dom.isData);
            this.isLeftEdgeOf = function (pred) {
                if (!dom.isLeftEdgePoint(this.getStartPoint())) {
                    return false;
                }
                var node = dom.ancestor(this.sc, pred);
                return node && dom.isLeftEdgeOf(this.sc, node);
            };
            this.isCollapsed = function () {
                return sc === ec && so === eo;
            };
            this.wrapBodyInlineWithPara = function () {
                if (dom.isBodyContainer(sc) && dom.isEmpty(sc)) {
                    sc.innerHTML = dom.emptyPara;
                    return new WrappedRange(sc.firstChild, 0, sc.firstChild, 0);
                }
                var rng = this.normalize();
                if (dom.isParaInline(sc) || dom.isPara(sc)) {
                    return rng;
                }
                var topAncestor;
                if (dom.isInline(rng.sc)) {
                    var ancestors = dom.listAncestor(rng.sc, func.not(dom.isInline));
                    topAncestor = list.last(ancestors);
                    if (!dom.isInline(topAncestor)) {
                        topAncestor = ancestors[ancestors.length - 2] || rng.sc.childNodes[rng.so];
                    }
                } else {
                    topAncestor = rng.sc.childNodes[rng.so > 0 ? rng.so - 1 : 0];
                }
                var inlineSiblings = dom.listPrev(topAncestor, dom.isParaInline).reverse();
                inlineSiblings = inlineSiblings.concat(dom.listNext(topAncestor.nextSibling, dom.isParaInline));
                if (inlineSiblings.length) {
                    var para = dom.wrap(list.head(inlineSiblings), 'p');
                    dom.appendChildNodes(para, list.tail(inlineSiblings));
                }
                return this.normalize();
            };
            this.insertNode = function (node) {
                var rng = this.wrapBodyInlineWithPara().deleteContents();
                var info = dom.splitPoint(rng.getStartPoint(), dom.isInline(node));
                if (info.rightNode) {
                    info.rightNode.parentNode.insertBefore(node, info.rightNode);
                } else {
                    info.container.appendChild(node);
                }
                return node;
            };
            this.pasteHTML = function (markup) {
                var contentsContainer = $('<div></div>').html(markup)[0];
                var childNodes = list.from(contentsContainer.childNodes);
                var rng = this.wrapBodyInlineWithPara().deleteContents();
                return childNodes.reverse().map(function (childNode) {
                    return rng.insertNode(childNode);
                }).reverse();
            };
            this.toString = function () {
                var nativeRng = nativeRange();
                return agent.isW3CRangeSupport ? nativeRng.toString() : nativeRng.text;
            };
            this.getWordRange = function (findAfter) {
                var endPoint = this.getEndPoint();
                if (!dom.isCharPoint(endPoint)) {
                    return this;
                }
                var startPoint = dom.prevPointUntil(endPoint, function (point) {
                    return !dom.isCharPoint(point);
                });
                if (findAfter) {
                    endPoint = dom.nextPointUntil(endPoint, function (point) {
                        return !dom.isCharPoint(point);
                    });
                }
                return new WrappedRange(startPoint.node, startPoint.offset, endPoint.node, endPoint.offset);
            };
            this.bookmark = function (editable) {
                return {
                    s: {path: dom.makeOffsetPath(editable, sc), offset: so},
                    e: {path: dom.makeOffsetPath(editable, ec), offset: eo}
                };
            };
            this.paraBookmark = function (paras) {
                return {
                    s: {path: list.tail(dom.makeOffsetPath(list.head(paras), sc)), offset: so},
                    e: {path: list.tail(dom.makeOffsetPath(list.last(paras), ec)), offset: eo}
                };
            };
            this.getClientRects = function () {
                var nativeRng = nativeRange();
                return nativeRng.getClientRects();
            };
        };
        return {
            create: function (sc, so, ec, eo) {
                if (arguments.length === 4) {
                    return new WrappedRange(sc, so, ec, eo);
                } else if (arguments.length === 2) {
                    ec = sc;
                    eo = so;
                    return new WrappedRange(sc, so, ec, eo);
                } else {
                    var wrappedRange = this.createFromSelection();
                    if (!wrappedRange && arguments.length === 1) {
                        wrappedRange = this.createFromNode(arguments[0]);
                        return wrappedRange.collapse(dom.emptyPara === arguments[0].innerHTML);
                    }
                    return wrappedRange;
                }
            }, createFromSelection: function () {
                var sc, so, ec, eo;
                if (agent.isW3CRangeSupport) {
                    var selection = document.getSelection();
                    if (!selection || selection.rangeCount === 0) {
                        return null;
                    } else if (dom.isBody(selection.anchorNode)) {
                        return null;
                    }
                    var nativeRng = selection.getRangeAt(0);
                    sc = nativeRng.startContainer;
                    so = nativeRng.startOffset;
                    ec = nativeRng.endContainer;
                    eo = nativeRng.endOffset;
                } else {
                    var textRange = document.selection.createRange();
                    var textRangeEnd = textRange.duplicate();
                    textRangeEnd.collapse(false);
                    var textRangeStart = textRange;
                    textRangeStart.collapse(true);
                    var startPoint = textRangeToPoint(textRangeStart, true),
                        endPoint = textRangeToPoint(textRangeEnd, false);
                    if (dom.isText(startPoint.node) && dom.isLeftEdgePoint(startPoint) && dom.isTextNode(endPoint.node) && dom.isRightEdgePoint(endPoint) && endPoint.node.nextSibling === startPoint.node) {
                        startPoint = endPoint;
                    }
                    sc = startPoint.cont;
                    so = startPoint.offset;
                    ec = endPoint.cont;
                    eo = endPoint.offset;
                }
                return new WrappedRange(sc, so, ec, eo);
            }, createFromNode: function (node) {
                var sc = node;
                var so = 0;
                var ec = node;
                var eo = dom.nodeLength(ec);
                if (dom.isVoid(sc)) {
                    so = dom.listPrev(sc).length - 1;
                    sc = sc.parentNode;
                }
                if (dom.isBR(ec)) {
                    eo = dom.listPrev(ec).length - 1;
                    ec = ec.parentNode;
                } else if (dom.isVoid(ec)) {
                    eo = dom.listPrev(ec).length;
                    ec = ec.parentNode;
                }
                return this.create(sc, so, ec, eo);
            }, createFromNodeBefore: function (node) {
                return this.createFromNode(node).collapse(true);
            }, createFromNodeAfter: function (node) {
                return this.createFromNode(node).collapse();
            }, createFromBookmark: function (editable, bookmark) {
                var sc = dom.fromOffsetPath(editable, bookmark.s.path);
                var so = bookmark.s.offset;
                var ec = dom.fromOffsetPath(editable, bookmark.e.path);
                var eo = bookmark.e.offset;
                return new WrappedRange(sc, so, ec, eo);
            }, createFromParaBookmark: function (bookmark, paras) {
                var so = bookmark.s.offset;
                var eo = bookmark.e.offset;
                var sc = dom.fromOffsetPath(list.head(paras), bookmark.s.path);
                var ec = dom.fromOffsetPath(list.last(paras), bookmark.e.path);
                return new WrappedRange(sc, so, ec, eo);
            }
        };
    })();
    var async = (function () {
        var readFileAsDataURL = function (file) {
            return $.Deferred(function (deferred) {
                $.extend(new FileReader(), {
                    onload: function (e) {
                        var dataURL = e.target.result;
                        deferred.resolve(dataURL);
                    }, onerror: function () {
                        deferred.reject(this);
                    }
                }).readAsDataURL(file);
            }).promise();
        };
        var createImage = function (url) {
            return $.Deferred(function (deferred) {
                var $img = $('<img>');
                $img.one('load', function () {
                    $img.off('error abort');
                    deferred.resolve($img);
                }).one('error abort', function () {
                    $img.off('load').detach();
                    deferred.reject($img);
                }).css({display: 'none'}).appendTo(document.body).attr('src', url);
            }).promise();
        };
        return {readFileAsDataURL: readFileAsDataURL, createImage: createImage};
    })();
    var History = function ($editable) {
        var stack = [], stackOffset = -1;
        var editable = $editable[0];
        var makeSnapshot = function () {
            var rng = range.create(editable);
            var emptyBookmark = {s: {path: [], offset: 0}, e: {path: [], offset: 0}};
            return {contents: $editable.html(), bookmark: (rng ? rng.bookmark(editable) : emptyBookmark)};
        };
        var applySnapshot = function (snapshot) {
            if (snapshot.contents !== null) {
                $editable.html(snapshot.contents);
            }
            if (snapshot.bookmark !== null) {
                range.createFromBookmark(editable, snapshot.bookmark).select();
            }
        };
        this.rewind = function () {
            if ($editable.html() !== stack[stackOffset].contents) {
                this.recordUndo();
            }
            stackOffset = 0;
            applySnapshot(stack[stackOffset]);
        };
        this.reset = function () {
            stack = [];
            stackOffset = -1;
            $editable.html('');
            this.recordUndo();
        };
        this.undo = function () {
            if ($editable.html() !== stack[stackOffset].contents) {
                this.recordUndo();
            }
            if (0 < stackOffset) {
                stackOffset--;
                applySnapshot(stack[stackOffset]);
            }
        };
        this.redo = function () {
            if (stack.length - 1 > stackOffset) {
                stackOffset++;
                applySnapshot(stack[stackOffset]);
            }
        };
        this.recordUndo = function () {
            stackOffset++;
            if (stack.length > stackOffset) {
                stack = stack.slice(0, stackOffset);
            }
            stack.push(makeSnapshot());
        };
    };
    var Style = function () {
        var jQueryCSS = function ($obj, propertyNames) {
            if (agent.jqueryVersion < 1.9) {
                var result = {};
                $.each(propertyNames, function (idx, propertyName) {
                    result[propertyName] = $obj.css(propertyName);
                });
                return result;
            }
            return $obj.css.call($obj, propertyNames);
        };
        this.fromNode = function ($node) {
            var properties = ['font-family', 'font-size', 'text-align', 'list-style-type', 'line-height'];
            var styleInfo = jQueryCSS($node, properties) || {};
            styleInfo['font-size'] = parseInt(styleInfo['font-size'], 10);
            return styleInfo;
        };
        this.stylePara = function (rng, styleInfo) {
            $.each(rng.nodes(dom.isPara, {includeAncestor: true}), function (idx, para) {
                $(para).css(styleInfo);
            });
        };
        this.styleNodes = function (rng, options) {
            rng = rng.splitText();
            var nodeName = options && options.nodeName || 'SPAN';
            var expandClosestSibling = !!(options && options.expandClosestSibling);
            var onlyPartialContains = !!(options && options.onlyPartialContains);
            if (rng.isCollapsed()) {
                return [rng.insertNode(dom.create(nodeName))];
            }
            var pred = dom.makePredByNodeName(nodeName);
            var nodes = rng.nodes(dom.isText, {fullyContains: true}).map(function (text) {
                return dom.singleChildAncestor(text, pred) || dom.wrap(text, nodeName);
            });
            if (expandClosestSibling) {
                if (onlyPartialContains) {
                    var nodesInRange = rng.nodes();
                    pred = func.and(pred, function (node) {
                        return list.contains(nodesInRange, node);
                    });
                }
                return nodes.map(function (node) {
                    var siblings = dom.withClosestSiblings(node, pred);
                    var head = list.head(siblings);
                    var tails = list.tail(siblings);
                    $.each(tails, function (idx, elem) {
                        dom.appendChildNodes(head, elem.childNodes);
                        dom.remove(elem);
                    });
                    return list.head(siblings);
                });
            } else {
                return nodes;
            }
        };
        this.current = function (rng) {
            var $cont = $(!dom.isElement(rng.sc) ? rng.sc.parentNode : rng.sc);
            var styleInfo = this.fromNode($cont);
            try {
                styleInfo = $.extend(styleInfo, {
                    'font-bold': document.queryCommandState('bold') ? 'bold' : 'normal',
                    'font-italic': document.queryCommandState('italic') ? 'italic' : 'normal',
                    'font-underline': document.queryCommandState('underline') ? 'underline' : 'normal',
                    'font-subscript': document.queryCommandState('subscript') ? 'subscript' : 'normal',
                    'font-superscript': document.queryCommandState('superscript') ? 'superscript' : 'normal',
                    'font-strikethrough': document.queryCommandState('strikethrough') ? 'strikethrough' : 'normal',
                    'font-family': document.queryCommandValue('fontname') || styleInfo['font-family']
                });
            } catch (e) {
            }
            if (!rng.isOnList()) {
                styleInfo['list-style'] = 'none';
            } else {
                var orderedTypes = ['circle', 'disc', 'disc-leading-zero', 'square'];
                var isUnordered = $.inArray(styleInfo['list-style-type'], orderedTypes) > -1;
                styleInfo['list-style'] = isUnordered ? 'unordered' : 'ordered';
            }
            var para = dom.ancestor(rng.sc, dom.isPara);
            if (para && para.style['line-height']) {
                styleInfo['line-height'] = para.style.lineHeight;
            } else {
                var lineHeight = parseInt(styleInfo['line-height'], 10) / parseInt(styleInfo['font-size'], 10);
                styleInfo['line-height'] = lineHeight.toFixed(1);
            }
            styleInfo.anchor = rng.isOnAnchor() && dom.ancestor(rng.sc, dom.isAnchor);
            styleInfo.ancestors = dom.listAncestor(rng.sc, dom.isEditable);
            styleInfo.range = rng;
            return styleInfo;
        };
    };
    var Bullet = function () {
        var self = this;
        this.insertOrderedList = function (editable) {
            this.toggleList('OL', editable);
        };
        this.insertUnorderedList = function (editable) {
            this.toggleList('UL', editable);
        };
        this.indent = function (editable) {
            var self = this;
            var rng = range.create(editable).wrapBodyInlineWithPara();
            var paras = rng.nodes(dom.isPara, {includeAncestor: true});
            var clustereds = list.clusterBy(paras, func.peq2('parentNode'));
            $.each(clustereds, function (idx, paras) {
                var head = list.head(paras);
                if (dom.isLi(head)) {
                    self.wrapList(paras, head.parentNode.nodeName);
                } else {
                    $.each(paras, function (idx, para) {
                        $(para).css('marginLeft', function (idx, val) {
                            return (parseInt(val, 10) || 0) + 25;
                        });
                    });
                }
            });
            rng.select();
        };
        this.outdent = function (editable) {
            var self = this;
            var rng = range.create(editable).wrapBodyInlineWithPara();
            var paras = rng.nodes(dom.isPara, {includeAncestor: true});
            var clustereds = list.clusterBy(paras, func.peq2('parentNode'));
            $.each(clustereds, function (idx, paras) {
                var head = list.head(paras);
                if (dom.isLi(head)) {
                    self.releaseList([paras]);
                } else {
                    $.each(paras, function (idx, para) {
                        $(para).css('marginLeft', function (idx, val) {
                            val = (parseInt(val, 10) || 0);
                            return val > 25 ? val - 25 : '';
                        });
                    });
                }
            });
            rng.select();
        };
        this.toggleList = function (listName, editable) {
            var rng = range.create(editable).wrapBodyInlineWithPara();
            var paras = rng.nodes(dom.isPara, {includeAncestor: true});
            var bookmark = rng.paraBookmark(paras);
            var clustereds = list.clusterBy(paras, func.peq2('parentNode'));
            if (list.find(paras, dom.isPurePara)) {
                var wrappedParas = [];
                $.each(clustereds, function (idx, paras) {
                    wrappedParas = wrappedParas.concat(self.wrapList(paras, listName));
                });
                paras = wrappedParas;
            } else {
                var diffLists = rng.nodes(dom.isList, {includeAncestor: true}).filter(function (listNode) {
                    return !$.nodeName(listNode, listName);
                });
                if (diffLists.length) {
                    $.each(diffLists, function (idx, listNode) {
                        dom.replace(listNode, listName);
                    });
                } else {
                    paras = this.releaseList(clustereds, true);
                }
            }
            range.createFromParaBookmark(bookmark, paras).select();
        };
        this.wrapList = function (paras, listName) {
            var head = list.head(paras);
            var last = list.last(paras);
            var prevList = dom.isList(head.previousSibling) && head.previousSibling;
            var nextList = dom.isList(last.nextSibling) && last.nextSibling;
            var listNode = prevList || dom.insertAfter(dom.create(listName || 'UL'), last);
            paras = paras.map(function (para) {
                return dom.isPurePara(para) ? dom.replace(para, 'LI') : para;
            });
            dom.appendChildNodes(listNode, paras);
            if (nextList) {
                dom.appendChildNodes(listNode, list.from(nextList.childNodes));
                dom.remove(nextList);
            }
            return paras;
        };
        this.releaseList = function (clustereds, isEscapseToBody) {
            var releasedParas = [];
            $.each(clustereds, function (idx, paras) {
                var head = list.head(paras);
                var last = list.last(paras);
                var headList = isEscapseToBody ? dom.lastAncestor(head, dom.isList) : head.parentNode;
                var lastList = headList.childNodes.length > 1 ? dom.splitTree(headList, {
                    node: last.parentNode,
                    offset: dom.position(last) + 1
                }, {isSkipPaddingBlankHTML: true}) : null;
                var middleList = dom.splitTree(headList, {
                    node: head.parentNode,
                    offset: dom.position(head)
                }, {isSkipPaddingBlankHTML: true});
                paras = isEscapseToBody ? dom.listDescendant(middleList, dom.isLi) : list.from(middleList.childNodes).filter(dom.isLi);
                if (isEscapseToBody || !dom.isList(headList.parentNode)) {
                    paras = paras.map(function (para) {
                        return dom.replace(para, 'P');
                    });
                }
                $.each(list.from(paras).reverse(), function (idx, para) {
                    dom.insertAfter(para, headList);
                });
                var rootLists = list.compact([headList, middleList, lastList]);
                $.each(rootLists, function (idx, rootList) {
                    var listNodes = [rootList].concat(dom.listDescendant(rootList, dom.isList));
                    $.each(listNodes.reverse(), function (idx, listNode) {
                        if (!dom.nodeLength(listNode)) {
                            dom.remove(listNode, true);
                        }
                    });
                });
                releasedParas = releasedParas.concat(paras);
            });
            return releasedParas;
        };
    };
    var Typing = function () {
        var bullet = new Bullet();
        this.insertTab = function (rng, tabsize) {
            var tab = dom.createText(new Array(tabsize + 1).join(dom.NBSP_CHAR));
            rng = rng.deleteContents();
            rng.insertNode(tab, true);
            rng = range.create(tab, tabsize);
            rng.select();
        };
        this.insertParagraph = function (editable) {
            var rng = range.create(editable);
            rng = rng.deleteContents();
            rng = rng.wrapBodyInlineWithPara();
            var splitRoot = dom.ancestor(rng.sc, dom.isPara);
            var nextPara;
            if (splitRoot) {
                if (dom.isEmpty(splitRoot) && dom.isLi(splitRoot)) {
                    bullet.toggleList(splitRoot.parentNode.nodeName);
                    return;
                } else if (dom.isEmpty(splitRoot) && dom.isPara(splitRoot) && dom.isBlockquote(splitRoot.parentNode)) {
                    dom.insertAfter(splitRoot, splitRoot.parentNode);
                    nextPara = splitRoot;
                } else {
                    nextPara = dom.splitTree(splitRoot, rng.getStartPoint());
                    var emptyAnchors = dom.listDescendant(splitRoot, dom.isEmptyAnchor);
                    emptyAnchors = emptyAnchors.concat(dom.listDescendant(nextPara, dom.isEmptyAnchor));
                    $.each(emptyAnchors, function (idx, anchor) {
                        dom.remove(anchor);
                    });
                    if ((dom.isHeading(nextPara) || dom.isPre(nextPara) || dom.isCustomStyleTag(nextPara)) && dom.isEmpty(nextPara)) {
                        nextPara = dom.replace(nextPara, 'p');
                    }
                }
            } else {
                var next = rng.sc.childNodes[rng.so];
                nextPara = $(dom.emptyPara)[0];
                if (next) {
                    rng.sc.insertBefore(nextPara, next);
                } else {
                    rng.sc.appendChild(nextPara);
                }
            }
            range.create(nextPara, 0).normalize().select().scrollIntoView(editable);
        };
    };
    var TableResultAction = function (startPoint, where, action, domTable) {
        var _startPoint = {'colPos': 0, 'rowPos': 0};
        var _virtualTable = [];
        var _actionCellList = [];

        function setStartPoint() {
            if (!startPoint || !startPoint.tagName || (startPoint.tagName.toLowerCase() !== 'td' && startPoint.tagName.toLowerCase() !== 'th')) {
                console.error('Impossible to identify start Cell point.', startPoint);
                return;
            }
            _startPoint.colPos = startPoint.cellIndex;
            if (!startPoint.parentElement || !startPoint.parentElement.tagName || startPoint.parentElement.tagName.toLowerCase() !== 'tr') {
                console.error('Impossible to identify start Row point.', startPoint);
                return;
            }
            _startPoint.rowPos = startPoint.parentElement.rowIndex;
        }

        function setVirtualTablePosition(rowIndex, cellIndex, baseRow, baseCell, isRowSpan, isColSpan, isVirtualCell) {
            var objPosition = {
                'baseRow': baseRow,
                'baseCell': baseCell,
                'isRowSpan': isRowSpan,
                'isColSpan': isColSpan,
                'isVirtual': isVirtualCell
            };
            if (!_virtualTable[rowIndex]) {
                _virtualTable[rowIndex] = [];
            }
            _virtualTable[rowIndex][cellIndex] = objPosition;
        }

        function getActionCell(virtualTableCellObj, resultAction, virtualRowPosition, virtualColPosition) {
            return {
                'baseCell': virtualTableCellObj.baseCell,
                'action': resultAction,
                'virtualTable': {'rowIndex': virtualRowPosition, 'cellIndex': virtualColPosition}
            };
        }

        function recoverCellIndex(rowIndex, cellIndex) {
            if (!_virtualTable[rowIndex]) {
                return cellIndex;
            }
            if (!_virtualTable[rowIndex][cellIndex]) {
                return cellIndex;
            }
            var newCellIndex = cellIndex;
            while (_virtualTable[rowIndex][newCellIndex]) {
                newCellIndex++;
                if (!_virtualTable[rowIndex][newCellIndex]) {
                    return newCellIndex;
                }
            }
        }

        function addCellInfoToVirtual(row, cell) {
            var cellIndex = recoverCellIndex(row.rowIndex, cell.cellIndex);
            var cellHasColspan = (cell.colSpan > 1);
            var cellHasRowspan = (cell.rowSpan > 1);
            var isThisSelectedCell = (row.rowIndex === _startPoint.rowPos && cell.cellIndex === _startPoint.colPos);
            setVirtualTablePosition(row.rowIndex, cellIndex, row, cell, cellHasRowspan, cellHasColspan, false);
            var rowspanNumber = cell.attributes.rowSpan ? parseInt(cell.attributes.rowSpan.value, 10) : 0;
            if (rowspanNumber > 1) {
                for (var rp = 1; rp < rowspanNumber; rp++) {
                    var rowspanIndex = row.rowIndex + rp;
                    adjustStartPoint(rowspanIndex, cellIndex, cell, isThisSelectedCell);
                    setVirtualTablePosition(rowspanIndex, cellIndex, row, cell, true, cellHasColspan, true);
                }
            }
            var colspanNumber = cell.attributes.colSpan ? parseInt(cell.attributes.colSpan.value, 10) : 0;
            if (colspanNumber > 1) {
                for (var cp = 1; cp < colspanNumber; cp++) {
                    var cellspanIndex = recoverCellIndex(row.rowIndex, (cellIndex + cp));
                    adjustStartPoint(row.rowIndex, cellspanIndex, cell, isThisSelectedCell);
                    setVirtualTablePosition(row.rowIndex, cellspanIndex, row, cell, cellHasRowspan, true, true);
                }
            }
        }

        function adjustStartPoint(rowIndex, cellIndex, cell, isSelectedCell) {
            if (rowIndex === _startPoint.rowPos && _startPoint.colPos >= cell.cellIndex && cell.cellIndex <= cellIndex && !isSelectedCell) {
                _startPoint.colPos++;
            }
        }

        function createVirtualTable() {
            var rows = domTable.rows;
            for (var rowIndex = 0; rowIndex < rows.length; rowIndex++) {
                var cells = rows[rowIndex].cells;
                for (var cellIndex = 0; cellIndex < cells.length; cellIndex++) {
                    addCellInfoToVirtual(rows[rowIndex], cells[cellIndex]);
                }
            }
        }

        function getDeleteResultActionToCell(cell) {
            switch (where) {
                case TableResultAction.where.Column:
                    if (cell.isColSpan) {
                        return TableResultAction.resultAction.SubtractSpanCount;
                    }
                    break;
                case TableResultAction.where.Row:
                    if (!cell.isVirtual && cell.isRowSpan) {
                        return TableResultAction.resultAction.AddCell;
                    }
                    else if (cell.isRowSpan) {
                        return TableResultAction.resultAction.SubtractSpanCount;
                    }
                    break;
            }
            return TableResultAction.resultAction.RemoveCell;
        }

        function getAddResultActionToCell(cell) {
            switch (where) {
                case TableResultAction.where.Column:
                    if (cell.isColSpan) {
                        return TableResultAction.resultAction.SumSpanCount;
                    } else if (cell.isRowSpan && cell.isVirtual) {
                        return TableResultAction.resultAction.Ignore;
                    }
                    break;
                case TableResultAction.where.Row:
                    if (cell.isRowSpan) {
                        return TableResultAction.resultAction.SumSpanCount;
                    } else if (cell.isColSpan && cell.isVirtual) {
                        return TableResultAction.resultAction.Ignore;
                    }
                    break;
            }
            return TableResultAction.resultAction.AddCell;
        }

        function init() {
            setStartPoint();
            createVirtualTable();
        }

        this.getActionList = function () {
            var fixedRow = (where === TableResultAction.where.Row) ? _startPoint.rowPos : -1;
            var fixedCol = (where === TableResultAction.where.Column) ? _startPoint.colPos : -1;
            var actualPosition = 0;
            var canContinue = true;
            while (canContinue) {
                var rowPosition = (fixedRow >= 0) ? fixedRow : actualPosition;
                var colPosition = (fixedCol >= 0) ? fixedCol : actualPosition;
                var row = _virtualTable[rowPosition];
                if (!row) {
                    canContinue = false;
                    return _actionCellList;
                }
                var cell = row[colPosition];
                if (!cell) {
                    canContinue = false;
                    return _actionCellList;
                }
                var resultAction = TableResultAction.resultAction.Ignore;
                switch (action) {
                    case TableResultAction.requestAction.Add:
                        resultAction = getAddResultActionToCell(cell);
                        break;
                    case TableResultAction.requestAction.Delete:
                        resultAction = getDeleteResultActionToCell(cell);
                        break;
                }
                _actionCellList.push(getActionCell(cell, resultAction, rowPosition, colPosition));
                actualPosition++;
            }
            return _actionCellList;
        };
        init();
    };
    TableResultAction.where = {'Row': 0, 'Column': 1};
    TableResultAction.requestAction = {'Add': 0, 'Delete': 1};
    TableResultAction.resultAction = {
        'Ignore': 0,
        'SubtractSpanCount': 1,
        'RemoveCell': 2,
        'AddCell': 3,
        'SumSpanCount': 4
    };
    var Table = function () {
        this.tab = function (rng, isShift) {
            var cell = dom.ancestor(rng.commonAncestor(), dom.isCell);
            var table = dom.ancestor(cell, dom.isTable);
            var cells = dom.listDescendant(table, dom.isCell);
            var nextCell = list[isShift ? 'prev' : 'next'](cells, cell);
            if (nextCell) {
                range.create(nextCell, 0).select();
            }
        };
        this.addRow = function (rng, position) {
            var cell = dom.ancestor(rng.commonAncestor(), dom.isCell);
            var currentTr = $(cell).closest('tr');
            var trAttributes = this.recoverAttributes(currentTr);
            var html = $('<tr' + trAttributes + '></tr>');
            var vTable = new TableResultAction(cell, TableResultAction.where.Row, TableResultAction.requestAction.Add, $(currentTr).closest('table')[0]);
            var actions = vTable.getActionList();
            for (var idCell = 0; idCell < actions.length; idCell++) {
                var currentCell = actions[idCell];
                var tdAttributes = this.recoverAttributes(currentCell.baseCell);
                switch (currentCell.action) {
                    case TableResultAction.resultAction.AddCell:
                        html.append('<td' + tdAttributes + '>' + dom.blank + '</td>');
                        break;
                    case TableResultAction.resultAction.SumSpanCount:
                        if (position === 'top') {
                            var baseCellTr = currentCell.baseCell.parent;
                            var isTopFromRowSpan = (!baseCellTr ? 0 : currentCell.baseCell.closest('tr').rowIndex) <= currentTr[0].rowIndex;
                            if (isTopFromRowSpan) {
                                var newTd = $('<div></div>').append($('<td' + tdAttributes + '>' + dom.blank + '</td>').removeAttr('rowspan')).html();
                                html.append(newTd);
                                break;
                            }
                        }
                        var rowspanNumber = parseInt(currentCell.baseCell.rowSpan, 10);
                        rowspanNumber++;
                        currentCell.baseCell.setAttribute('rowSpan', rowspanNumber);
                        break;
                }
            }
            if (position === 'top') {
                currentTr.before(html);
            }
            else {
                var cellHasRowspan = (cell.rowSpan > 1);
                if (cellHasRowspan) {
                    var lastTrIndex = currentTr[0].rowIndex + (cell.rowSpan - 2);
                    $($(currentTr).parent().find('tr')[lastTrIndex]).after($(html));
                    return;
                }
                currentTr.after(html);
            }
        };
        this.addCol = function (rng, position) {
            var cell = dom.ancestor(rng.commonAncestor(), dom.isCell);
            var row = $(cell).closest('tr');
            var rowsGroup = $(row).siblings();
            rowsGroup.push(row);
            var vTable = new TableResultAction(cell, TableResultAction.where.Column, TableResultAction.requestAction.Add, $(row).closest('table')[0]);
            var actions = vTable.getActionList();
            for (var actionIndex = 0; actionIndex < actions.length; actionIndex++) {
                var currentCell = actions[actionIndex];
                var tdAttributes = this.recoverAttributes(currentCell.baseCell);
                switch (currentCell.action) {
                    case TableResultAction.resultAction.AddCell:
                        if (position === 'right') {
                            $(currentCell.baseCell).after('<td' + tdAttributes + '>' + dom.blank + '</td>');
                        } else {
                            $(currentCell.baseCell).before('<td' + tdAttributes + '>' + dom.blank + '</td>');
                        }
                        break;
                    case TableResultAction.resultAction.SumSpanCount:
                        if (position === 'right') {
                            var colspanNumber = parseInt(currentCell.baseCell.colSpan, 10);
                            colspanNumber++;
                            currentCell.baseCell.setAttribute('colSpan', colspanNumber);
                        } else {
                            $(currentCell.baseCell).before('<td' + tdAttributes + '>' + dom.blank + '</td>');
                        }
                        break;
                }
            }
        };
        this.recoverAttributes = function (el) {
            var resultStr = '';
            if (!el) {
                return resultStr;
            }
            var attrList = el.attributes || [];
            for (var i = 0; i < attrList.length; i++) {
                if (attrList[i].name.toLowerCase() === 'id') {
                    continue;
                }
                if (attrList[i].specified) {
                    resultStr += ' ' + attrList[i].name + '=\'' + attrList[i].value + '\'';
                }
            }
            return resultStr;
        };
        this.deleteRow = function (rng) {
            var cell = dom.ancestor(rng.commonAncestor(), dom.isCell);
            var row = $(cell).closest('tr');
            var cellPos = row.children('td, th').index($(cell));
            var rowPos = row[0].rowIndex;
            var vTable = new TableResultAction(cell, TableResultAction.where.Row, TableResultAction.requestAction.Delete, $(row).closest('table')[0]);
            var actions = vTable.getActionList();
            for (var actionIndex = 0; actionIndex < actions.length; actionIndex++) {
                if (!actions[actionIndex]) {
                    continue;
                }
                var baseCell = actions[actionIndex].baseCell;
                var virtualPosition = actions[actionIndex].virtualTable;
                var hasRowspan = (baseCell.rowSpan && baseCell.rowSpan > 1);
                var rowspanNumber = (hasRowspan) ? parseInt(baseCell.rowSpan, 10) : 0;
                switch (actions[actionIndex].action) {
                    case TableResultAction.resultAction.Ignore:
                        continue;
                    case TableResultAction.resultAction.AddCell:
                        var nextRow = row.next('tr')[0];
                        if (!nextRow) {
                            continue;
                        }
                        var cloneRow = row[0].cells[cellPos];
                        if (hasRowspan) {
                            if (rowspanNumber > 2) {
                                rowspanNumber--;
                                nextRow.insertBefore(cloneRow, nextRow.cells[cellPos]);
                                nextRow.cells[cellPos].setAttribute('rowSpan', rowspanNumber);
                                nextRow.cells[cellPos].innerHTML = '';
                            } else if (rowspanNumber === 2) {
                                nextRow.insertBefore(cloneRow, nextRow.cells[cellPos]);
                                nextRow.cells[cellPos].removeAttribute('rowSpan');
                                nextRow.cells[cellPos].innerHTML = '';
                            }
                        }
                        continue;
                    case TableResultAction.resultAction.SubtractSpanCount:
                        if (hasRowspan) {
                            if (rowspanNumber > 2) {
                                rowspanNumber--;
                                baseCell.setAttribute('rowSpan', rowspanNumber);
                                if (virtualPosition.rowIndex !== rowPos && baseCell.cellIndex === cellPos) {
                                    baseCell.innerHTML = '';
                                }
                            } else if (rowspanNumber === 2) {
                                baseCell.removeAttribute('rowSpan');
                                if (virtualPosition.rowIndex !== rowPos && baseCell.cellIndex === cellPos) {
                                    baseCell.innerHTML = '';
                                }
                            }
                        }
                        continue;
                    case TableResultAction.resultAction.RemoveCell:
                        continue;
                }
            }
            row.remove();
        };
        this.deleteCol = function (rng) {
            var cell = dom.ancestor(rng.commonAncestor(), dom.isCell);
            var row = $(cell).closest('tr');
            var cellPos = row.children('td, th').index($(cell));
            var vTable = new TableResultAction(cell, TableResultAction.where.Column, TableResultAction.requestAction.Delete, $(row).closest('table')[0]);
            var actions = vTable.getActionList();
            for (var actionIndex = 0; actionIndex < actions.length; actionIndex++) {
                if (!actions[actionIndex]) {
                    continue;
                }
                switch (actions[actionIndex].action) {
                    case TableResultAction.resultAction.Ignore:
                        continue;
                    case TableResultAction.resultAction.SubtractSpanCount:
                        var baseCell = actions[actionIndex].baseCell;
                        var hasColspan = (baseCell.colSpan && baseCell.colSpan > 1);
                        if (hasColspan) {
                            var colspanNumber = (baseCell.colSpan) ? parseInt(baseCell.colSpan, 10) : 0;
                            if (colspanNumber > 2) {
                                colspanNumber--;
                                baseCell.setAttribute('colSpan', colspanNumber);
                                if (baseCell.cellIndex === cellPos) {
                                    baseCell.innerHTML = '';
                                }
                            } else if (colspanNumber === 2) {
                                baseCell.removeAttribute('colSpan');
                                if (baseCell.cellIndex === cellPos) {
                                    baseCell.innerHTML = '';
                                }
                            }
                        }
                        continue;
                    case TableResultAction.resultAction.RemoveCell:
                        dom.remove(actions[actionIndex].baseCell, true);
                        continue;
                }
            }
        };
        this.createTable = function (colCount, rowCount, options) {
            var tds = [], tdHTML;
            for (var idxCol = 0; idxCol < colCount; idxCol++) {
                tds.push('<td>' + dom.blank + '</td>');
            }
            tdHTML = tds.join('');
            var trs = [], trHTML;
            for (var idxRow = 0; idxRow < rowCount; idxRow++) {
                trs.push('<tr>' + tdHTML + '</tr>');
            }
            trHTML = trs.join('');
            var $table = $('<table>' + trHTML + '</table>');
            if (options && options.tableClassName) {
                $table.addClass(options.tableClassName);
            }
            return $table[0];
        };
        this.deleteTable = function (rng) {
            var cell = dom.ancestor(rng.commonAncestor(), dom.isCell);
            $(cell).closest('table').remove();
        };
    };
    var KEY_BOGUS = 'bogus';
    var Editor = function (context) {
        var self = this;
        var $note = context.layoutInfo.note;
        var $editor = context.layoutInfo.editor;
        var $editable = context.layoutInfo.editable;
        var options = context.options;
        var lang = options.langInfo;
        var editable = $editable[0];
        var lastRange = null;
        var style = new Style();
        var table = new Table();
        var typing = new Typing();
        var bullet = new Bullet();
        var history = new History($editable);
        this.initialize = function () {
            $editable.on('keydown', function (event) {
                if (event.keyCode === key.code.ENTER) {
                    context.triggerEvent('enter', event);
                }
                context.triggerEvent('keydown', event);
                if (!event.isDefaultPrevented()) {
                    if (options.shortcuts) {
                        self.handleKeyMap(event);
                    } else {
                        self.preventDefaultEditableShortCuts(event);
                    }
                }
            }).on('keyup', function (event) {
                context.triggerEvent('keyup', event);
            }).on('focus', function (event) {
                context.triggerEvent('focus', event);
            }).on('blur', function (event) {
                context.triggerEvent('blur', event);
            }).on('mousedown', function (event) {
                context.triggerEvent('mousedown', event);
            }).on('mouseup', function (event) {
                context.triggerEvent('mouseup', event);
            }).on('scroll', function (event) {
                context.triggerEvent('scroll', event);
            }).on('paste', function (event) {
                context.triggerEvent('paste', event);
            });
            $editable.html(dom.html($note) || dom.emptyPara);
            var changeEventName = agent.isMSIE ? 'DOMCharacterDataModified DOMSubtreeModified DOMNodeInserted' : 'input';
            $editable.on(changeEventName, func.debounce(function () {
                context.triggerEvent('change', $editable.html());
            }, 250));
            $editor.on('focusin', function (event) {
                context.triggerEvent('focusin', event);
            }).on('focusout', function (event) {
                context.triggerEvent('focusout', event);
            });
            if (!options.airMode) {
                if (options.width) {
                    $editor.outerWidth(options.width);
                }
                if (options.height) {
                    $editable.outerHeight(options.height);
                }
                if (options.maxHeight) {
                    $editable.css('max-height', options.maxHeight);
                }
                if (options.minHeight) {
                    $editable.css('min-height', options.minHeight);
                }
            }
            history.recordUndo();
        };
        this.destroy = function () {
            $editable.off();
        };
        this.handleKeyMap = function (event) {
            var keyMap = options.keyMap[agent.isMac ? 'mac' : 'pc'];
            var keys = [];
            if (event.metaKey) {
                keys.push('CMD');
            }
            if (event.ctrlKey && !event.altKey) {
                keys.push('CTRL');
            }
            if (event.shiftKey) {
                keys.push('SHIFT');
            }
            var keyName = key.nameFromCode[event.keyCode];
            if (keyName) {
                keys.push(keyName);
            }
            var eventName = keyMap[keys.join('+')];
            if (eventName) {
                event.preventDefault();
                context.invoke(eventName);
            } else if (key.isEdit(event.keyCode)) {
                this.afterCommand();
            }
        };
        this.preventDefaultEditableShortCuts = function (event) {
            if ((event.ctrlKey || event.metaKey) && list.contains([66, 73, 85], event.keyCode)) {
                event.preventDefault();
            }
        };
        this.createRange = function () {
            this.focus();
            return range.create(editable);
        };
        this.saveRange = function (thenCollapse) {
            lastRange = this.createRange();
            if (thenCollapse) {
                lastRange.collapse().select();
            }
        };
        this.restoreRange = function () {
            if (lastRange) {
                lastRange.select();
                this.focus();
            }
        };
        this.saveTarget = function (node) {
            $editable.data('target', node);
        };
        this.clearTarget = function () {
            $editable.removeData('target');
        };
        this.restoreTarget = function () {
            return $editable.data('target');
        };
        this.currentStyle = function () {
            var rng = range.create();
            if (rng) {
                rng = rng.normalize();
            }
            return rng ? style.current(rng) : style.fromNode($editable);
        };
        this.styleFromNode = function ($node) {
            return style.fromNode($node);
        };
        this.undo = function () {
            context.triggerEvent('before.command', $editable.html());
            history.undo();
            context.triggerEvent('change', $editable.html());
        };
        context.memo('help.undo', lang.help.undo);
        this.redo = function () {
            context.triggerEvent('before.command', $editable.html());
            history.redo();
            context.triggerEvent('change', $editable.html());
        };
        context.memo('help.redo', lang.help.redo);
        var beforeCommand = this.beforeCommand = function () {
            context.triggerEvent('before.command', $editable.html());
            self.focus();
        };
        var afterCommand = this.afterCommand = function (isPreventTrigger) {
            history.recordUndo();
            if (!isPreventTrigger) {
                context.triggerEvent('change', $editable.html());
            }
        };
        var commands = ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull', 'formatBlock', 'removeFormat', 'backColor', 'foreColor', 'fontName'];
        for (var idx = 0, len = commands.length; idx < len; idx++) {
            this[commands[idx]] = (function (sCmd) {
                return function (value) {
                    beforeCommand();
                    document.execCommand(sCmd, false, value);
                    afterCommand(true);
                };
            })(commands[idx]);
            context.memo('help.' + commands[idx], lang.help[commands[idx]]);
        }
        this.tab = function () {
            var rng = this.createRange();
            if (rng.isCollapsed() && rng.isOnCell()) {
                table.tab(rng);
            } else {
                beforeCommand();
                typing.insertTab(rng, options.tabSize);
                afterCommand();
            }
        };
        context.memo('help.tab', lang.help.tab);
        this.untab = function () {
            var rng = this.createRange();
            if (rng.isCollapsed() && rng.isOnCell()) {
                table.tab(rng, true);
            }
        };
        context.memo('help.untab', lang.help.untab);
        this.wrapCommand = function (fn) {
            return function () {
                beforeCommand();
                fn.apply(self, arguments);
                afterCommand();
            };
        };
        this.insertParagraph = this.wrapCommand(function () {
            typing.insertParagraph(editable);
        });
        context.memo('help.insertParagraph', lang.help.insertParagraph);
        this.insertOrderedList = this.wrapCommand(function () {
            bullet.insertOrderedList(editable);
        });
        context.memo('help.insertOrderedList', lang.help.insertOrderedList);
        this.insertUnorderedList = this.wrapCommand(function () {
            bullet.insertUnorderedList(editable);
        });
        context.memo('help.insertUnorderedList', lang.help.insertUnorderedList);
        this.indent = this.wrapCommand(function () {
            bullet.indent(editable);
        });
        context.memo('help.indent', lang.help.indent);
        this.outdent = this.wrapCommand(function () {
            bullet.outdent(editable);
        });
        context.memo('help.outdent', lang.help.outdent);
        this.insertImage = function (src, param) {
            return async.createImage(src, param).then(function ($image) {
                beforeCommand();
                if (typeof param === 'function') {
                    param($image);
                } else {
                    if (typeof param === 'string') {
                        $image.attr('data-filename', param);
                    }
                    $image.css('width', Math.min($editable.width(), $image.width()));
                }
                $image.show();
                range.create(editable).insertNode($image[0]);
                range.createFromNodeAfter($image[0]).select();
                afterCommand();
            }).fail(function (e) {
                context.triggerEvent('image.upload.error', e);
            });
        };
        this.insertImages = function (files) {
            $.each(files, function (idx, file) {
                var filename = file.name;
                if (options.maximumImageFileSize && options.maximumImageFileSize < file.size) {
                    context.triggerEvent('image.upload.error', lang.image.maximumFileSizeError);
                } else {
                    async.readFileAsDataURL(file).then(function (dataURL) {
                        return self.insertImage(dataURL, filename);
                    }).fail(function () {
                        context.triggerEvent('image.upload.error');
                    });
                }
            });
        };
        this.insertImagesOrCallback = function (files) {
            var callbacks = options.callbacks;
            if (callbacks.onImageUpload) {
                context.triggerEvent('image.upload', files);
            } else {
                this.insertImages(files);
            }
        };
        this.insertNode = this.wrapCommand(function (node) {
            var rng = this.createRange();
            rng.insertNode(node);
            range.createFromNodeAfter(node).select();
        });
        this.insertText = this.wrapCommand(function (text) {
            var rng = this.createRange();
            var textNode = rng.insertNode(dom.createText(text));
            range.create(textNode, dom.nodeLength(textNode)).select();
        });
        this.getSelectedText = function () {
            var rng = this.createRange();
            if (rng.isOnAnchor()) {
                rng = range.createFromNode(dom.ancestor(rng.sc, dom.isAnchor));
            }
            return rng.toString();
        };
        this.pasteHTML = this.wrapCommand(function (markup) {
            var contents = this.createRange().pasteHTML(markup);
            range.createFromNodeAfter(list.last(contents)).select();
        });
        this.formatBlock = this.wrapCommand(function (tagName, $target) {
            var onApplyCustomStyle = context.options.callbacks.onApplyCustomStyle;
            if (onApplyCustomStyle) {
                onApplyCustomStyle.call(this, $target, context, this.onFormatBlock);
            } else {
                this.onFormatBlock(tagName);
            }
        });
        this.onFormatBlock = function (tagName) {
            tagName = agent.isMSIE ? '<' + tagName + '>' : tagName;
            document.execCommand('FormatBlock', false, tagName);
        };
        this.formatPara = function () {
            this.formatBlock('P');
        };
        context.memo('help.formatPara', lang.help.formatPara);
        for (var idx = 1; idx <= 6; idx++) {
            this['formatH' + idx] = function (idx) {
                return function () {
                    this.formatBlock('H' + idx);
                };
            }(idx);
            context.memo('help.formatH' + idx, lang.help['formatH' + idx]);
        }
        ;this.fontSize = function (value) {
            var rng = this.createRange();
            if (rng && rng.isCollapsed()) {
                var spans = style.styleNodes(rng);
                var firstSpan = list.head(spans);
                $(spans).css({'font-size': value + 'px'});
                if (firstSpan && !dom.nodeLength(firstSpan)) {
                    firstSpan.innerHTML = dom.ZERO_WIDTH_NBSP_CHAR;
                    range.createFromNodeAfter(firstSpan.firstChild).select();
                    $editable.data(KEY_BOGUS, firstSpan);
                }
            } else {
                beforeCommand();
                $(style.styleNodes(rng)).css({'font-size': value + 'px'});
                afterCommand();
            }
        };
        this.insertHorizontalRule = this.wrapCommand(function () {
            var hrNode = this.createRange().insertNode(dom.create('HR'));
            if (hrNode.nextSibling) {
                range.create(hrNode.nextSibling, 0).normalize().select();
            }
        });
        context.memo('help.insertHorizontalRule', lang.help.insertHorizontalRule);
        this.removeBogus = function () {
            var bogusNode = $editable.data(KEY_BOGUS);
            if (!bogusNode) {
                return;
            }
            var textNode = list.find(list.from(bogusNode.childNodes), dom.isText);
            var bogusCharIdx = textNode.nodeValue.indexOf(dom.ZERO_WIDTH_NBSP_CHAR);
            if (bogusCharIdx !== -1) {
                textNode.deleteData(bogusCharIdx, 1);
            }
            if (dom.isEmpty(bogusNode)) {
                dom.remove(bogusNode);
            }
            $editable.removeData(KEY_BOGUS);
        };
        this.lineHeight = this.wrapCommand(function (value) {
            style.stylePara(this.createRange(), {lineHeight: value});
        });
        this.unlink = function () {
            var rng = this.createRange();
            if (rng.isOnAnchor()) {
                var anchor = dom.ancestor(rng.sc, dom.isAnchor);
                rng = range.createFromNode(anchor);
                rng.select();
                beforeCommand();
                document.execCommand('unlink');
                afterCommand();
            }
        };
        this.createLink = this.wrapCommand(function (linkInfo) {
            var linkUrl = linkInfo.url;
            var linkText = linkInfo.text;
            var isNewWindow = linkInfo.isNewWindow;
            var rng = linkInfo.range || this.createRange();
            var isTextChanged = rng.toString() !== linkText;
            if (typeof linkUrl === 'string') {
                linkUrl = linkUrl.trim();
            }
            if (options.onCreateLink) {
                linkUrl = options.onCreateLink(linkUrl);
            } else {
                linkUrl = /^[A-Za-z][A-Za-z0-9+-.]*\:[\/\/]?/.test(linkUrl) ? linkUrl : 'http://' + linkUrl;
            }
            var anchors = [];
            if (isTextChanged) {
                rng = rng.deleteContents();
                var anchor = rng.insertNode($('<A>' + linkText + '</A>')[0]);
                anchors.push(anchor);
            } else {
                anchors = style.styleNodes(rng, {nodeName: 'A', expandClosestSibling: true, onlyPartialContains: true});
            }
            $.each(anchors, function (idx, anchor) {
                $(anchor).attr('href', linkUrl);
                if (isNewWindow) {
                    $(anchor).attr('target', '_blank');
                } else {
                    $(anchor).removeAttr('target');
                }
            });
            var startRange = range.createFromNodeBefore(list.head(anchors));
            var startPoint = startRange.getStartPoint();
            var endRange = range.createFromNodeAfter(list.last(anchors));
            var endPoint = endRange.getEndPoint();
            range.create(startPoint.node, startPoint.offset, endPoint.node, endPoint.offset).select();
        });
        this.getLinkInfo = function () {
            var rng = this.createRange().expand(dom.isAnchor);
            var $anchor = $(list.head(rng.nodes(dom.isAnchor)));
            var linkInfo = {range: rng, text: rng.toString(), url: $anchor.length ? $anchor.attr('href') : ''};
            if ($anchor.length) {
                linkInfo.isNewWindow = $anchor.attr('target') === '_blank';
            }
            return linkInfo;
        };
        this.color = this.wrapCommand(function (colorInfo) {
            var foreColor = colorInfo.foreColor;
            var backColor = colorInfo.backColor;
            if (foreColor) {
                document.execCommand('foreColor', false, foreColor);
            }
            if (backColor) {
                document.execCommand('backColor', false, backColor);
            }
        });
        this.insertTable = this.wrapCommand(function (dim) {
            var dimension = dim.split('x');
            var rng = this.createRange().deleteContents();
            rng.insertNode(table.createTable(dimension[0], dimension[1], options));
        });
        this.addRow = function (position) {
            var rng = this.createRange($editable);
            if (rng.isCollapsed() && rng.isOnCell()) {
                beforeCommand();
                table.addRow(rng, position);
                afterCommand();
            }
        };
        this.addCol = function (position) {
            var rng = this.createRange($editable);
            if (rng.isCollapsed() && rng.isOnCell()) {
                beforeCommand();
                table.addCol(rng, position);
                afterCommand();
            }
        };
        this.deleteRow = function () {
            var rng = this.createRange($editable);
            if (rng.isCollapsed() && rng.isOnCell()) {
                beforeCommand();
                table.deleteRow(rng);
                afterCommand();
            }
        };
        this.deleteCol = function () {
            var rng = this.createRange($editable);
            if (rng.isCollapsed() && rng.isOnCell()) {
                beforeCommand();
                table.deleteCol(rng);
                afterCommand();
            }
        };
        this.deleteTable = function () {
            var rng = this.createRange($editable);
            if (rng.isCollapsed() && rng.isOnCell()) {
                beforeCommand();
                table.deleteTable(rng);
                afterCommand();
            }
        };
        this.floatMe = this.wrapCommand(function (value) {
            var $target = $(this.restoreTarget());
            $target.css('float', value);
        });
        this.resize = this.wrapCommand(function (value) {
            var $target = $(this.restoreTarget());
            $target.css({width: value * 100 + '%', height: ''});
        });
        this.resizeTo = function (pos, $target, bKeepRatio) {
            var imageSize;
            if (bKeepRatio) {
                var newRatio = pos.y / pos.x;
                var ratio = $target.data('ratio');
                imageSize = {
                    width: ratio > newRatio ? pos.x : pos.y / ratio,
                    height: ratio > newRatio ? pos.x * ratio : pos.y
                };
            } else {
                imageSize = {width: pos.x, height: pos.y};
            }
            $target.css(imageSize);
        };
        this.removeMedia = this.wrapCommand(function () {
            var $target = $(this.restoreTarget()).detach();
            context.triggerEvent('media.delete', $target, $editable);
        });
        this.hasFocus = function () {
            return $editable.is(':focus');
        };
        this.focus = function () {
            if (!this.hasFocus()) {
                $editable.focus();
            }
        };
        this.isEmpty = function () {
            return dom.isEmpty($editable[0]) || dom.emptyPara === $editable.html();
        };
        this.empty = function () {
            context.invoke('code', dom.emptyPara);
        };
    };
    var Clipboard = function (context) {
        var self = this;
        var $editable = context.layoutInfo.editable;
        this.events = {
            'summernote.keydown': function (we, e) {
                if (self.needKeydownHook()) {
                    if ((e.ctrlKey || e.metaKey) && e.keyCode === key.code.V) {
                        context.invoke('editor.saveRange');
                        self.$paste.focus();
                        setTimeout(function () {
                            self.pasteByHook();
                        }, 0);
                    }
                }
            }
        };
        this.needKeydownHook = function () {
            return (agent.isMSIE && agent.browserVersion > 10) || agent.isFF;
        };
        this.initialize = function () {
            if (this.needKeydownHook()) {
                this.$paste = $('<div tabindex="-1" />').attr('contenteditable', true).css({
                    position: 'absolute',
                    left: -100000,
                    opacity: 0
                });
                $editable.before(this.$paste);
                this.$paste.on('paste', function (event) {
                    context.triggerEvent('paste', event);
                });
            } else {
                $editable.on('paste', this.pasteByEvent);
            }
        };
        this.destroy = function () {
            if (this.needKeydownHook()) {
                this.$paste.remove();
                this.$paste = null;
            }
        };
        this.pasteByHook = function () {
            var node = this.$paste[0].firstChild;
            var src = node && node.src;
            if (dom.isImg(node) && src.indexOf('data:') === 0) {
                var decodedData = atob(node.src.split(',')[1]);
                var array = new Uint8Array(decodedData.length);
                for (var i = 0; i < decodedData.length; i++) {
                    array[i] = decodedData.charCodeAt(i);
                }
                var blob = new Blob([array], {type: 'image/png'});
                blob.name = 'clipboard.png';
                context.invoke('editor.restoreRange');
                context.invoke('editor.focus');
                context.invoke('editor.insertImagesOrCallback', [blob]);
            } else {
                var pasteContent = $('<div />').html(this.$paste.html()).html();
                context.invoke('editor.restoreRange');
                context.invoke('editor.focus');
                if (pasteContent) {
                    context.invoke('editor.pasteHTML', pasteContent);
                }
            }
            this.$paste.empty();
        };
        this.pasteByEvent = function (event) {
            var clipboardData = event.originalEvent.clipboardData;
            if (clipboardData && clipboardData.items && clipboardData.items.length) {
                var item = list.head(clipboardData.items);
                if (item.kind === 'file' && item.type.indexOf('image/') !== -1) {
                    context.invoke('editor.insertImagesOrCallback', [item.getAsFile()]);
                }
                context.invoke('editor.afterCommand');
            }
        };
    };
    var Dropzone = function (context) {
        var $document = $(document);
        var $editor = context.layoutInfo.editor;
        var $editable = context.layoutInfo.editable;
        var options = context.options;
        var lang = options.langInfo;
        var documentEventHandlers = {};
        var $dropzone = $(['<div class="note-dropzone">', '  <div class="note-dropzone-message"/>', '</div>'].join('')).prependTo($editor);
        var detachDocumentEvent = function () {
            Object.keys(documentEventHandlers).forEach(function (key) {
                $document.off(key.substr(2).toLowerCase(), documentEventHandlers[key]);
            });
            documentEventHandlers = {};
        };
        this.initialize = function () {
            if (options.disableDragAndDrop) {
                documentEventHandlers.onDrop = function (e) {
                    e.preventDefault();
                };
                $document.on('drop', documentEventHandlers.onDrop);
            } else {
                this.attachDragAndDropEvent();
            }
        };
        this.attachDragAndDropEvent = function () {
            var collection = $(), $dropzoneMessage = $dropzone.find('.note-dropzone-message');
            documentEventHandlers.onDragenter = function (e) {
                var isCodeview = context.invoke('codeview.isActivated');
                var hasEditorSize = $editor.width() > 0 && $editor.height() > 0;
                if (!isCodeview && !collection.length && hasEditorSize) {
                    $editor.addClass('dragover');
                    $dropzone.width($editor.width());
                    $dropzone.height($editor.height());
                    $dropzoneMessage.text(lang.image.dragImageHere);
                }
                collection = collection.add(e.target);
            };
            documentEventHandlers.onDragleave = function (e) {
                collection = collection.not(e.target);
                if (!collection.length) {
                    $editor.removeClass('dragover');
                }
            };
            documentEventHandlers.onDrop = function () {
                collection = $();
                $editor.removeClass('dragover');
            };
            $document.on('dragenter', documentEventHandlers.onDragenter).on('dragleave', documentEventHandlers.onDragleave).on('drop', documentEventHandlers.onDrop);
            $dropzone.on('dragenter', function () {
                $dropzone.addClass('hover');
                $dropzoneMessage.text(lang.image.dropImage);
            }).on('dragleave', function () {
                $dropzone.removeClass('hover');
                $dropzoneMessage.text(lang.image.dragImageHere);
            });
            $dropzone.on('drop', function (event) {
                var dataTransfer = event.originalEvent.dataTransfer;
                if (dataTransfer && dataTransfer.files && dataTransfer.files.length) {
                    event.preventDefault();
                    $editable.focus();
                    context.invoke('editor.insertImagesOrCallback', dataTransfer.files);
                } else {
                    $.each(dataTransfer.types, function (idx, type) {
                        var content = dataTransfer.getData(type);
                        if (type.toLowerCase().indexOf('text') > -1) {
                            context.invoke('editor.pasteHTML', content);
                        } else {
                            $(content).each(function () {
                                context.invoke('editor.insertNode', this);
                            });
                        }
                    });
                }
            }).on('dragover', false);
        };
        this.destroy = function () {
            detachDocumentEvent();
        };
    };
    var CodeMirror;
    if (agent.hasCodeMirror) {
        if (agent.isSupportAmd) {
            require(['codemirror'], function (cm) {
                CodeMirror = cm;
            });
        } else {
            CodeMirror = window.CodeMirror;
        }
    }
    var Codeview = function (context) {
        var $editor = context.layoutInfo.editor;
        var $editable = context.layoutInfo.editable;
        var $codable = context.layoutInfo.codable;
        var options = context.options;
        this.sync = function () {
            var isCodeview = this.isActivated();
            if (isCodeview && agent.hasCodeMirror) {
                $codable.data('cmEditor').save();
            }
        };
        this.isActivated = function () {
            return $editor.hasClass('codeview');
        };
        this.toggle = function () {
            if (this.isActivated()) {
                this.deactivate();
            } else {
                this.activate();
            }
            context.triggerEvent('codeview.toggled');
        };
        this.activate = function () {
            $codable.val(dom.html($editable, options.prettifyHtml));
            $codable.height($editable.height());
            context.invoke('toolbar.updateCodeview', true);
            $editor.addClass('codeview');
            $codable.focus();
            if (agent.hasCodeMirror) {
                var cmEditor = CodeMirror.fromTextArea($codable[0], options.codemirror);
                if (options.codemirror.tern) {
                    var server = new CodeMirror.TernServer(options.codemirror.tern);
                    cmEditor.ternServer = server;
                    cmEditor.on('cursorActivity', function (cm) {
                        server.updateArgHints(cm);
                    });
                }
                cmEditor.setSize(null, $editable.outerHeight());
                $codable.data('cmEditor', cmEditor);
            }
        };
        this.deactivate = function () {
            if (agent.hasCodeMirror) {
                var cmEditor = $codable.data('cmEditor');
                $codable.val(cmEditor.getValue());
                cmEditor.toTextArea();
            }
            var value = dom.value($codable, options.prettifyHtml) || dom.emptyPara;
            var isChange = $editable.html() !== value;
            $editable.html(value);
            $editable.height(options.height ? $codable.height() : 'auto');
            $editor.removeClass('codeview');
            if (isChange) {
                context.triggerEvent('change', $editable.html(), $editable);
            }
            $editable.focus();
            context.invoke('toolbar.updateCodeview', false);
        };
        this.destroy = function () {
            if (this.isActivated()) {
                this.deactivate();
            }
        };
    };
    var EDITABLE_PADDING = 24;
    var Statusbar = function (context) {
        var $document = $(document);
        var $statusbar = context.layoutInfo.statusbar;
        var $editable = context.layoutInfo.editable;
        var options = context.options;
        this.initialize = function () {
            if (options.airMode || options.disableResizeEditor) {
                this.destroy();
                return;
            }
            $statusbar.on('mousedown', function (event) {
                event.preventDefault();
                event.stopPropagation();
                var editableTop = $editable.offset().top - $document.scrollTop();
                var onMouseMove = function (event) {
                    var height = event.clientY - (editableTop + EDITABLE_PADDING);
                    height = (options.minheight > 0) ? Math.max(height, options.minheight) : height;
                    height = (options.maxHeight > 0) ? Math.min(height, options.maxHeight) : height;
                    $editable.height(height);
                };
                $document.on('mousemove', onMouseMove).one('mouseup', function () {
                    $document.off('mousemove', onMouseMove);
                });
            });
        };
        this.destroy = function () {
            $statusbar.off();
            $statusbar.remove();
        };
    };
    var Fullscreen = function (context) {
        var self = this;
        var $editor = context.layoutInfo.editor;
        var $toolbar = context.layoutInfo.toolbar;
        var $editable = context.layoutInfo.editable;
        var $codable = context.layoutInfo.codable;
        var $window = $(window);
        var $scrollbar = $('html, body');
        this.resizeTo = function (size) {
            $editable.css('height', size.h);
            $codable.css('height', size.h);
            if ($codable.data('cmeditor')) {
                $codable.data('cmeditor').setsize(null, size.h);
            }
        };
        this.onResize = function () {
            self.resizeTo({h: $window.height() - $toolbar.outerHeight()});
        };
        this.toggle = function () {
            $editor.toggleClass('fullscreen');
            if (this.isFullscreen()) {
                $editable.data('orgHeight', $editable.css('height'));
                $window.on('resize', this.onResize).trigger('resize');
                $scrollbar.css('overflow', 'hidden');
            } else {
                $window.off('resize', this.onResize);
                this.resizeTo({h: $editable.data('orgHeight')});
                $scrollbar.css('overflow', 'visible');
            }
            context.invoke('toolbar.updateFullscreen', this.isFullscreen());
        };
        this.isFullscreen = function () {
            return $editor.hasClass('fullscreen');
        };
    };
    var Handle = function (context) {
        var self = this;
        var $document = $(document);
        var $editingArea = context.layoutInfo.editingArea;
        var options = context.options;
        this.events = {
            'summernote.mousedown': function (we, e) {
                if (self.update(e.target)) {
                    e.preventDefault();
                }
            }, 'summernote.keyup summernote.scroll summernote.change summernote.dialog.shown': function () {
                self.update();
            }, 'summernote.disable': function () {
                self.hide();
            }
        };
        this.initialize = function () {
            this.$handle = $(['<div class="note-handle">', '<div class="note-control-selection">', '<div class="note-control-selection-bg"></div>', '<div class="note-control-holder note-control-nw"></div>', '<div class="note-control-holder note-control-ne"></div>', '<div class="note-control-holder note-control-sw"></div>', '<div class="', (options.disableResizeImage ? 'note-control-holder' : 'note-control-sizing'), ' note-control-se"></div>', (options.disableResizeImage ? '' : '<div class="note-control-selection-info"></div>'), '</div>', '</div>'].join('')).prependTo($editingArea);
            this.$handle.on('mousedown', function (event) {
                if (dom.isControlSizing(event.target)) {
                    event.preventDefault();
                    event.stopPropagation();
                    var $target = self.$handle.find('.note-control-selection').data('target'),
                        posStart = $target.offset(), scrollTop = $document.scrollTop();
                    var onMouseMove = function (event) {
                        context.invoke('editor.resizeTo', {
                            x: event.clientX - posStart.left,
                            y: event.clientY - (posStart.top - scrollTop)
                        }, $target, !event.shiftKey);
                        self.update($target[0]);
                    };
                    $document.on('mousemove', onMouseMove).one('mouseup', function (e) {
                        e.preventDefault();
                        $document.off('mousemove', onMouseMove);
                        context.invoke('editor.afterCommand');
                    });
                    if (!$target.data('ratio')) {
                        $target.data('ratio', $target.height() / $target.width());
                    }
                }
            });
        };
        this.destroy = function () {
            this.$handle.remove();
        };
        this.update = function (target) {
            if (context.isDisabled()) {
                return false;
            }
            var isImage = dom.isImg(target);
            var $selection = this.$handle.find('.note-control-selection');
            context.invoke('imagePopover.update', target);
            if (isImage) {
                var $image = $(target);
                var pos = $image.position();
                var imageSize = {w: $image.outerWidth(true), h: $image.outerHeight(true)};
                $selection.css({
                    display: 'block',
                    left: pos.left,
                    top: pos.top,
                    width: imageSize.w,
                    height: imageSize.h
                }).data('target', $image);
                var sizingText = imageSize.w + 'x' + imageSize.h;
                $selection.find('.note-control-selection-info').text(sizingText);
                context.invoke('editor.saveTarget', target);
            } else {
                this.hide();
            }
            return isImage;
        };
        this.hide = function () {
            context.invoke('editor.clearTarget');
            this.$handle.children().hide();
        };
    };
    var AutoLink = function (context) {
        var self = this;
        var defaultScheme = 'http://';
        var linkPattern = /^([A-Za-z][A-Za-z0-9+-.]*\:[\/\/]?|mailto:[A-Z0-9._%+-]+@)?(www\.)?(.+)$/i;
        this.events = {
            'summernote.keyup': function (we, e) {
                if (!e.isDefaultPrevented()) {
                    self.handleKeyup(e);
                }
            }, 'summernote.keydown': function (we, e) {
                self.handleKeydown(e);
            }
        };
        this.initialize = function () {
            this.lastWordRange = null;
        };
        this.destroy = function () {
            this.lastWordRange = null;
        };
        this.replace = function () {
            if (!this.lastWordRange) {
                return;
            }
            var keyword = this.lastWordRange.toString();
            var match = keyword.match(linkPattern);
            if (match && (match[1] || match[2])) {
                var link = match[1] ? keyword : defaultScheme + keyword;
                var node = $('<a />').html(keyword).attr('href', link)[0];
                this.lastWordRange.insertNode(node);
                this.lastWordRange = null;
                context.invoke('editor.focus');
            }
        };
        this.handleKeydown = function (e) {
            if (list.contains([key.code.ENTER, key.code.SPACE], e.keyCode)) {
                var wordRange = context.invoke('editor.createRange').getWordRange();
                this.lastWordRange = wordRange;
            }
        };
        this.handleKeyup = function (e) {
            if (list.contains([key.code.ENTER, key.code.SPACE], e.keyCode)) {
                this.replace();
            }
        };
    };
    var AutoSync = function (context) {
        var $note = context.layoutInfo.note;
        this.events = {
            'summernote.change': function () {
                $note.val(context.invoke('code'));
            }
        };
        this.shouldInitialize = function () {
            return dom.isTextarea($note[0]);
        };
    };
    var Placeholder = function (context) {
        var self = this;
        var $editingArea = context.layoutInfo.editingArea;
        var options = context.options;
        this.events = {
            'summernote.init summernote.change': function () {
                self.update();
            }, 'summernote.codeview.toggled': function () {
                self.update();
            }
        };
        this.shouldInitialize = function () {
            return !!options.placeholder;
        };
        this.initialize = function () {
            this.$placeholder = $('<div class="note-placeholder">');
            this.$placeholder.on('click', function () {
                context.invoke('focus');
            }).text(options.placeholder).prependTo($editingArea);
        };
        this.destroy = function () {
            this.$placeholder.remove();
        };
        this.update = function () {
            var isShow = !context.invoke('codeview.isActivated') && context.invoke('editor.isEmpty');
            this.$placeholder.toggle(isShow);
        };
    };
    var Buttons = function (context) {
        var self = this;
        var ui = $.summernote.ui;
        var $toolbar = context.layoutInfo.toolbar;
        var options = context.options;
        var lang = options.langInfo;
        var invertedKeyMap = func.invertObject(options.keyMap[agent.isMac ? 'mac' : 'pc']);
        var representShortcut = this.representShortcut = function (editorMethod) {
            var shortcut = invertedKeyMap[editorMethod];
            if (!options.shortcuts || !shortcut) {
                return '';
            }
            if (agent.isMac) {
                shortcut = shortcut.replace('CMD', 'âŒ˜').replace('SHIFT', 'â‡§');
            }
            shortcut = shortcut.replace('BACKSLASH', '\\').replace('SLASH', '/').replace('LEFTBRACKET', '[').replace('RIGHTBRACKET', ']');
            return ' (' + shortcut + ')';
        };
        this.initialize = function () {
            this.addToolbarButtons();
            this.addImagePopoverButtons();
            this.addLinkPopoverButtons();
            this.addTablePopoverButtons();
            this.fontInstalledMap = {};
        };
        this.destroy = function () {
            delete this.fontInstalledMap;
        };
        this.isFontInstalled = function (name) {
            if (!self.fontInstalledMap.hasOwnProperty(name)) {
                self.fontInstalledMap[name] = agent.isFontInstalled(name) || list.contains(options.fontNamesIgnoreCheck, name);
            }
            return self.fontInstalledMap[name];
        };
        this.addToolbarButtons = function () {
            context.memo('button.style', function () {
                return ui.buttonGroup([ui.button({
                    className: 'dropdown-toggle',
                    contents: ui.icon(options.icons.magic) + ' ' + ui.icon(options.icons.caret, 'span'),
                    tooltip: lang.style.style,
                    data: {toggle: 'dropdown'}
                }), ui.dropdown({
                    className: 'dropdown-style', items: context.options.styleTags, template: function (item) {
                        if (typeof item === 'string') {
                            item = {tag: item, title: (lang.style.hasOwnProperty(item) ? lang.style[item] : item)};
                        }
                        var tag = item.tag;
                        var title = item.title;
                        var style = item.style ? ' style="' + item.style + '" ' : '';
                        var className = item.className ? ' class="' + item.className + '"' : '';
                        return '<' + tag + style + className + '>' + title + '</' + tag + '>';
                    }, click: context.createInvokeHandler('editor.formatBlock')
                })]).render();
            });
            context.memo('button.bold', function () {
                return ui.button({
                    className: 'note-btn-bold',
                    contents: ui.icon(options.icons.bold),
                    tooltip: lang.font.bold + representShortcut('bold'),
                    click: context.createInvokeHandlerAndUpdateState('editor.bold')
                }).render();
            });
            context.memo('button.italic', function () {
                return ui.button({
                    className: 'note-btn-italic',
                    contents: ui.icon(options.icons.italic),
                    tooltip: lang.font.italic + representShortcut('italic'),
                    click: context.createInvokeHandlerAndUpdateState('editor.italic')
                }).render();
            });
            context.memo('button.underline', function () {
                return ui.button({
                    className: 'note-btn-underline',
                    contents: ui.icon(options.icons.underline),
                    tooltip: lang.font.underline + representShortcut('underline'),
                    click: context.createInvokeHandlerAndUpdateState('editor.underline')
                }).render();
            });
            context.memo('button.clear', function () {
                return ui.button({
                    contents: ui.icon(options.icons.eraser),
                    tooltip: lang.font.clear + representShortcut('removeFormat'),
                    click: context.createInvokeHandler('editor.removeFormat')
                }).render();
            });
            context.memo('button.strikethrough', function () {
                return ui.button({
                    className: 'note-btn-strikethrough',
                    contents: ui.icon(options.icons.strikethrough),
                    tooltip: lang.font.strikethrough + representShortcut('strikethrough'),
                    click: context.createInvokeHandlerAndUpdateState('editor.strikethrough')
                }).render();
            });
            context.memo('button.superscript', function () {
                return ui.button({
                    className: 'note-btn-superscript',
                    contents: ui.icon(options.icons.superscript),
                    tooltip: lang.font.superscript,
                    click: context.createInvokeHandlerAndUpdateState('editor.superscript')
                }).render();
            });
            context.memo('button.subscript', function () {
                return ui.button({
                    className: 'note-btn-subscript',
                    contents: ui.icon(options.icons.subscript),
                    tooltip: lang.font.subscript,
                    click: context.createInvokeHandlerAndUpdateState('editor.subscript')
                }).render();
            });
            context.memo('button.fontname', function () {
                return ui.buttonGroup([ui.button({
                    className: 'dropdown-toggle',
                    contents: '<span class="note-current-fontname"/> ' + ui.icon(options.icons.caret, 'span'),
                    tooltip: lang.font.name,
                    data: {toggle: 'dropdown'}
                }), ui.dropdownCheck({
                    className: 'dropdown-fontname',
                    checkClassName: options.icons.menuCheck,
                    items: options.fontNames.filter(self.isFontInstalled),
                    template: function (item) {
                        return '<span style="font-family:' + item + '">' + item + '</span>';
                    },
                    click: context.createInvokeHandlerAndUpdateState('editor.fontName')
                })]).render();
            });
            context.memo('button.fontsize', function () {
                return ui.buttonGroup([ui.button({
                    className: 'dropdown-toggle',
                    contents: '<span class="note-current-fontsize"/>' + ui.icon(options.icons.caret, 'span'),
                    tooltip: lang.font.size,
                    data: {toggle: 'dropdown'}
                }), ui.dropdownCheck({
                    className: 'dropdown-fontsize',
                    checkClassName: options.icons.menuCheck,
                    items: options.fontSizes,
                    click: context.createInvokeHandler('editor.fontSize')
                })]).render();
            });
            context.memo('button.color', function () {
                return ui.buttonGroup({
                    className: 'note-color',
                    children: [ui.button({
                        className: 'note-current-color-button',
                        contents: ui.icon(options.icons.font + ' note-recent-color'),
                        tooltip: lang.color.recent,
                        click: function (e) {
                            var $button = $(e.currentTarget);
                            context.invoke('editor.color', {
                                backColor: $button.attr('data-backColor'),
                                foreColor: $button.attr('data-foreColor')
                            });
                        },
                        callback: function ($button) {
                            var $recentColor = $button.find('.note-recent-color');
                            $recentColor.css('background-color', '#FFFF00');
                            $button.attr('data-backColor', '#FFFF00');
                        }
                    }), ui.button({
                        className: 'dropdown-toggle',
                        contents: ui.icon(options.icons.caret, 'span'),
                        tooltip: lang.color.more,
                        data: {toggle: 'dropdown'}
                    }), ui.dropdown({
                        items: ['<li>', '<div class="btn-group">', '  <div class="note-palette-title">' + lang.color.background + '</div>', '  <div>', '    <button type="button" class="note-color-reset btn btn-default" data-event="backColor" data-value="inherit">', lang.color.transparent, '    </button>', '  </div>', '  <div class="note-holder" data-event="backColor"/>', '</div>', '<div class="btn-group">', '  <div class="note-palette-title">' + lang.color.foreground + '</div>', '  <div>', '    <button type="button" class="note-color-reset btn btn-default" data-event="removeFormat" data-value="foreColor">', lang.color.resetToDefault, '    </button>', '  </div>', '  <div class="note-holder" data-event="foreColor"/>', '</div>', '</li>'].join(''),
                        callback: function ($dropdown) {
                            $dropdown.find('.note-holder').each(function () {
                                var $holder = $(this);
                                $holder.append(ui.palette({
                                    colors: options.colors,
                                    eventName: $holder.data('event')
                                }).render());
                            });
                        },
                        click: function (event) {
                            var $button = $(event.target);
                            var eventName = $button.data('event');
                            var value = $button.data('value');
                            if (eventName && value) {
                                var key = eventName === 'backColor' ? 'background-color' : 'color';
                                var $color = $button.closest('.note-color').find('.note-recent-color');
                                var $currentButton = $button.closest('.note-color').find('.note-current-color-button');
                                $color.css(key, value);
                                $currentButton.attr('data-' + eventName, value);
                                context.invoke('editor.' + eventName, value);
                            }
                        }
                    })]
                }).render();
            });
            context.memo('button.ul', function () {
                return ui.button({
                    contents: ui.icon(options.icons.unorderedlist),
                    tooltip: lang.lists.unordered + representShortcut('insertUnorderedList'),
                    click: context.createInvokeHandler('editor.insertUnorderedList')
                }).render();
            });
            context.memo('button.ol', function () {
                return ui.button({
                    contents: ui.icon(options.icons.orderedlist),
                    tooltip: lang.lists.ordered + representShortcut('insertOrderedList'),
                    click: context.createInvokeHandler('editor.insertOrderedList')
                }).render();
            });
            var justifyLeft = ui.button({
                contents: ui.icon(options.icons.alignLeft),
                tooltip: lang.paragraph.left + representShortcut('justifyLeft'),
                click: context.createInvokeHandler('editor.justifyLeft')
            });
            var justifyCenter = ui.button({
                contents: ui.icon(options.icons.alignCenter),
                tooltip: lang.paragraph.center + representShortcut('justifyCenter'),
                click: context.createInvokeHandler('editor.justifyCenter')
            });
            var justifyRight = ui.button({
                contents: ui.icon(options.icons.alignRight),
                tooltip: lang.paragraph.right + representShortcut('justifyRight'),
                click: context.createInvokeHandler('editor.justifyRight')
            });
            var justifyFull = ui.button({
                contents: ui.icon(options.icons.alignJustify),
                tooltip: lang.paragraph.justify + representShortcut('justifyFull'),
                click: context.createInvokeHandler('editor.justifyFull')
            });
            var outdent = ui.button({
                contents: ui.icon(options.icons.outdent),
                tooltip: lang.paragraph.outdent + representShortcut('outdent'),
                click: context.createInvokeHandler('editor.outdent')
            });
            var indent = ui.button({
                contents: ui.icon(options.icons.indent),
                tooltip: lang.paragraph.indent + representShortcut('indent'),
                click: context.createInvokeHandler('editor.indent')
            });
            context.memo('button.justifyLeft', func.invoke(justifyLeft, 'render'));
            context.memo('button.justifyCenter', func.invoke(justifyCenter, 'render'));
            context.memo('button.justifyRight', func.invoke(justifyRight, 'render'));
            context.memo('button.justifyFull', func.invoke(justifyFull, 'render'));
            context.memo('button.outdent', func.invoke(outdent, 'render'));
            context.memo('button.indent', func.invoke(indent, 'render'));
            context.memo('button.paragraph', function () {
                return ui.buttonGroup([ui.button({
                    className: 'dropdown-toggle',
                    contents: ui.icon(options.icons.alignLeft) + ' ' + ui.icon(options.icons.caret, 'span'),
                    tooltip: lang.paragraph.paragraph,
                    data: {toggle: 'dropdown'}
                }), ui.dropdown([ui.buttonGroup({
                    className: 'note-align',
                    children: [justifyLeft, justifyCenter, justifyRight, justifyFull]
                }), ui.buttonGroup({className: 'note-list', children: [outdent, indent]})])]).render();
            });
            context.memo('button.height', function () {
                return ui.buttonGroup([ui.button({
                    className: 'dropdown-toggle',
                    contents: ui.icon(options.icons.textHeight) + ' ' + ui.icon(options.icons.caret, 'span'),
                    tooltip: lang.font.height,
                    data: {toggle: 'dropdown'}
                }), ui.dropdownCheck({
                    items: options.lineHeights,
                    checkClassName: options.icons.menuCheck,
                    className: 'dropdown-line-height',
                    click: context.createInvokeHandler('editor.lineHeight')
                })]).render();
            });
            context.memo('button.table', function () {
                return ui.buttonGroup([ui.button({
                    className: 'dropdown-toggle',
                    contents: ui.icon(options.icons.table) + ' ' + ui.icon(options.icons.caret, 'span'),
                    tooltip: lang.table.table,
                    data: {toggle: 'dropdown'}
                }), ui.dropdown({
                    className: 'note-table',
                    items: ['<div class="note-dimension-picker">', '  <div class="note-dimension-picker-mousecatcher" data-event="insertTable" data-value="1x1"/>', '  <div class="note-dimension-picker-highlighted"/>', '  <div class="note-dimension-picker-unhighlighted"/>', '</div>', '<div class="note-dimension-display">1 x 1</div>'].join('')
                })], {
                    callback: function ($node) {
                        var $catcher = $node.find('.note-dimension-picker-mousecatcher');
                        $catcher.css({
                            width: options.insertTableMaxSize.col + 'em',
                            height: options.insertTableMaxSize.row + 'em'
                        }).mousedown(context.createInvokeHandler('editor.insertTable')).on('mousemove', self.tableMoveHandler);
                    }
                }).render();
            });
            context.memo('button.link', function () {
                return ui.button({
                    contents: ui.icon(options.icons.link),
                    tooltip: lang.link.link + representShortcut('linkDialog.show'),
                    click: context.createInvokeHandler('linkDialog.show')
                }).render();
            });
            context.memo('button.picture', function () {
                return ui.button({
                    contents: ui.icon(options.icons.picture),
                    tooltip: lang.image.image,
                    click: context.createInvokeHandler('imageDialog.show')
                }).render();
            });
            context.memo('button.video', function () {
                return ui.button({
                    contents: ui.icon(options.icons.video),
                    tooltip: lang.video.video,
                    click: context.createInvokeHandler('videoDialog.show')
                }).render();
            });
            context.memo('button.hr', function () {
                return ui.button({
                    contents: ui.icon(options.icons.minus),
                    tooltip: lang.hr.insert + representShortcut('insertHorizontalRule'),
                    click: context.createInvokeHandler('editor.insertHorizontalRule')
                }).render();
            });
            context.memo('button.fullscreen', function () {
                return ui.button({
                    className: 'btn-fullscreen',
                    contents: ui.icon(options.icons.arrowsAlt),
                    tooltip: lang.options.fullscreen,
                    click: context.createInvokeHandler('fullscreen.toggle')
                }).render();
            });
            context.memo('button.codeview', function () {
                return ui.button({
                    className: 'btn-codeview',
                    contents: ui.icon(options.icons.code),
                    tooltip: lang.options.codeview,
                    click: context.createInvokeHandler('codeview.toggle')
                }).render();
            });
            context.memo('button.redo', function () {
                return ui.button({
                    contents: ui.icon(options.icons.redo),
                    tooltip: lang.history.redo + representShortcut('redo'),
                    click: context.createInvokeHandler('editor.redo')
                }).render();
            });
            context.memo('button.undo', function () {
                return ui.button({
                    contents: ui.icon(options.icons.undo),
                    tooltip: lang.history.undo + representShortcut('undo'),
                    click: context.createInvokeHandler('editor.undo')
                }).render();
            });
            context.memo('button.help', function () {
                return ui.button({
                    contents: ui.icon(options.icons.question),
                    tooltip: lang.options.help,
                    click: context.createInvokeHandler('helpDialog.show')
                }).render();
            });
        };
        this.addImagePopoverButtons = function () {
            context.memo('button.imageSize100', function () {
                return ui.button({
                    contents: '<span class="note-fontsize-10">100%</span>',
                    tooltip: lang.image.resizeFull,
                    click: context.createInvokeHandler('editor.resize', '1')
                }).render();
            });
            context.memo('button.imageSize50', function () {
                return ui.button({
                    contents: '<span class="note-fontsize-10">50%</span>',
                    tooltip: lang.image.resizeHalf,
                    click: context.createInvokeHandler('editor.resize', '0.5')
                }).render();
            });
            context.memo('button.imageSize25', function () {
                return ui.button({
                    contents: '<span class="note-fontsize-10">25%</span>',
                    tooltip: lang.image.resizeQuarter,
                    click: context.createInvokeHandler('editor.resize', '0.25')
                }).render();
            });
            context.memo('button.floatLeft', function () {
                return ui.button({
                    contents: ui.icon(options.icons.alignLeft),
                    tooltip: lang.image.floatLeft,
                    click: context.createInvokeHandler('editor.floatMe', 'left')
                }).render();
            });
            context.memo('button.floatRight', function () {
                return ui.button({
                    contents: ui.icon(options.icons.alignRight),
                    tooltip: lang.image.floatRight,
                    click: context.createInvokeHandler('editor.floatMe', 'right')
                }).render();
            });
            context.memo('button.floatNone', function () {
                return ui.button({
                    contents: ui.icon(options.icons.alignJustify),
                    tooltip: lang.image.floatNone,
                    click: context.createInvokeHandler('editor.floatMe', 'none')
                }).render();
            });
            context.memo('button.removeMedia', function () {
                return ui.button({
                    contents: ui.icon(options.icons.trash),
                    tooltip: lang.image.remove,
                    click: context.createInvokeHandler('editor.removeMedia')
                }).render();
            });
        };
        this.addLinkPopoverButtons = function () {
            context.memo('button.linkDialogShow', function () {
                return ui.button({
                    contents: ui.icon(options.icons.link),
                    tooltip: lang.link.edit,
                    click: context.createInvokeHandler('linkDialog.show')
                }).render();
            });
            context.memo('button.unlink', function () {
                return ui.button({
                    contents: ui.icon(options.icons.unlink),
                    tooltip: lang.link.unlink,
                    click: context.createInvokeHandler('editor.unlink')
                }).render();
            });
        };
        this.addTablePopoverButtons = function () {
            context.memo('button.addRowUp', function () {
                return ui.button({
                    className: 'btn-md',
                    contents: ui.icon(options.icons.rowAbove),
                    tooltip: lang.table.addRowAbove,
                    click: context.createInvokeHandler('editor.addRow', 'top')
                }).render();
            });
            context.memo('button.addRowDown', function () {
                return ui.button({
                    className: 'btn-md',
                    contents: ui.icon(options.icons.rowBelow),
                    tooltip: lang.table.addRowBelow,
                    click: context.createInvokeHandler('editor.addRow', 'bottom')
                }).render();
            });
            context.memo('button.addColLeft', function () {
                return ui.button({
                    className: 'btn-md',
                    contents: ui.icon(options.icons.colBefore),
                    tooltip: lang.table.addColLeft,
                    click: context.createInvokeHandler('editor.addCol', 'left')
                }).render();
            });
            context.memo('button.addColRight', function () {
                return ui.button({
                    className: 'btn-md',
                    contents: ui.icon(options.icons.colAfter),
                    tooltip: lang.table.addColRight,
                    click: context.createInvokeHandler('editor.addCol', 'right')
                }).render();
            });
            context.memo('button.deleteRow', function () {
                return ui.button({
                    className: 'btn-md',
                    contents: ui.icon(options.icons.rowRemove),
                    tooltip: lang.table.delRow,
                    click: context.createInvokeHandler('editor.deleteRow')
                }).render();
            });
            context.memo('button.deleteCol', function () {
                return ui.button({
                    className: 'btn-md',
                    contents: ui.icon(options.icons.colRemove),
                    tooltip: lang.table.delCol,
                    click: context.createInvokeHandler('editor.deleteCol')
                }).render();
            });
            context.memo('button.deleteTable', function () {
                return ui.button({
                    className: 'btn-md',
                    contents: ui.icon(options.icons.trash),
                    tooltip: lang.table.delTable,
                    click: context.createInvokeHandler('editor.deleteTable')
                }).render();
            });
        };
        this.build = function ($container, groups) {
            for (var groupIdx = 0, groupLen = groups.length; groupIdx < groupLen; groupIdx++) {
                var group = groups[groupIdx];
                var groupName = group[0];
                var buttons = group[1];
                var $group = ui.buttonGroup({className: 'note-' + groupName}).render();
                for (var idx = 0, len = buttons.length; idx < len; idx++) {
                    var button = context.memo('button.' + buttons[idx]);
                    if (button) {
                        $group.append(typeof button === 'function' ? button(context) : button);
                    }
                }
                $group.appendTo($container);
            }
        };
        this.updateCurrentStyle = function () {
            var styleInfo = context.invoke('editor.currentStyle');
            this.updateBtnStates({
                '.note-btn-bold': function () {
                    return styleInfo['font-bold'] === 'bold';
                }, '.note-btn-italic': function () {
                    return styleInfo['font-italic'] === 'italic';
                }, '.note-btn-underline': function () {
                    return styleInfo['font-underline'] === 'underline';
                }, '.note-btn-subscript': function () {
                    return styleInfo['font-subscript'] === 'subscript';
                }, '.note-btn-superscript': function () {
                    return styleInfo['font-superscript'] === 'superscript';
                }, '.note-btn-strikethrough': function () {
                    return styleInfo['font-strikethrough'] === 'strikethrough';
                }
            });
            if (styleInfo['font-family']) {
                var fontNames = styleInfo['font-family'].split(',').map(function (name) {
                    return name.replace(/[\'\"]/g, '').replace(/\s+$/, '').replace(/^\s+/, '');
                });
                var fontName = list.find(fontNames, self.isFontInstalled);
                $toolbar.find('.dropdown-fontname li a').each(function () {
                    var isChecked = ($(this).data('value') + '') === (fontName + '');
                    this.className = isChecked ? 'checked' : '';
                });
                $toolbar.find('.note-current-fontname').text(fontName);
            }
            if (styleInfo['font-size']) {
                var fontSize = styleInfo['font-size'];
                $toolbar.find('.dropdown-fontsize li a').each(function () {
                    var isChecked = ($(this).data('value') + '') === (fontSize + '');
                    this.className = isChecked ? 'checked' : '';
                });
                $toolbar.find('.note-current-fontsize').text(fontSize);
            }
            if (styleInfo['line-height']) {
                var lineHeight = styleInfo['line-height'];
                $toolbar.find('.dropdown-line-height li a').each(function () {
                    var isChecked = ($(this).data('value') + '') === (lineHeight + '');
                    this.className = isChecked ? 'checked' : '';
                });
            }
        };
        this.updateBtnStates = function (infos) {
            $.each(infos, function (selector, pred) {
                ui.toggleBtnActive($toolbar.find(selector), pred());
            });
        };
        this.tableMoveHandler = function (event) {
            var PX_PER_EM = 18;
            var $picker = $(event.target.parentNode);
            var $dimensionDisplay = $picker.next();
            var $catcher = $picker.find('.note-dimension-picker-mousecatcher');
            var $highlighted = $picker.find('.note-dimension-picker-highlighted');
            var $unhighlighted = $picker.find('.note-dimension-picker-unhighlighted');
            var posOffset;
            if (event.offsetX === undefined) {
                var posCatcher = $(event.target).offset();
                posOffset = {x: event.pageX - posCatcher.left, y: event.pageY - posCatcher.top};
            } else {
                posOffset = {x: event.offsetX, y: event.offsetY};
            }
            var dim = {c: Math.ceil(posOffset.x / PX_PER_EM) || 1, r: Math.ceil(posOffset.y / PX_PER_EM) || 1};
            $highlighted.css({width: dim.c + 'em', height: dim.r + 'em'});
            $catcher.data('value', dim.c + 'x' + dim.r);
            if (3 < dim.c && dim.c < options.insertTableMaxSize.col) {
                $unhighlighted.css({width: dim.c + 1 + 'em'});
            }
            if (3 < dim.r && dim.r < options.insertTableMaxSize.row) {
                $unhighlighted.css({height: dim.r + 1 + 'em'});
            }
            $dimensionDisplay.html(dim.c + ' x ' + dim.r);
        };
    };
    var Toolbar = function (context) {
        var ui = $.summernote.ui;
        var $note = context.layoutInfo.note;
        var $toolbar = context.layoutInfo.toolbar;
        var options = context.options;
        this.shouldInitialize = function () {
            return !options.airMode;
        };
        this.initialize = function () {
            options.toolbar = options.toolbar || [];
            if (!options.toolbar.length) {
                $toolbar.hide();
            } else {
                context.invoke('buttons.build', $toolbar, options.toolbar);
            }
            if (options.toolbarContainer) {
                $toolbar.appendTo(options.toolbarContainer);
            }
            $note.on('summernote.keyup summernote.mouseup summernote.change', function () {
                context.invoke('buttons.updateCurrentStyle');
            });
            context.invoke('buttons.updateCurrentStyle');
        };
        this.destroy = function () {
            $toolbar.children().remove();
        };
        this.updateFullscreen = function (isFullscreen) {
            ui.toggleBtnActive($toolbar.find('.btn-fullscreen'), isFullscreen);
        };
        this.updateCodeview = function (isCodeview) {
            ui.toggleBtnActive($toolbar.find('.btn-codeview'), isCodeview);
            if (isCodeview) {
                this.deactivate();
            } else {
                this.activate();
            }
        };
        this.activate = function (isIncludeCodeview) {
            var $btn = $toolbar.find('button');
            if (!isIncludeCodeview) {
                $btn = $btn.not('.btn-codeview');
            }
            ui.toggleBtn($btn, true);
        };
        this.deactivate = function (isIncludeCodeview) {
            var $btn = $toolbar.find('button');
            if (!isIncludeCodeview) {
                $btn = $btn.not('.btn-codeview');
            }
            ui.toggleBtn($btn, false);
        };
    };
    var LinkDialog = function (context) {
        var self = this;
        var ui = $.summernote.ui;
        var $editor = context.layoutInfo.editor;
        var options = context.options;
        var lang = options.langInfo;
        this.initialize = function () {
            var $container = options.dialogsInBody ? $(document.body) : $editor;
            var body = '<div class="form-group">' +
                '<label>' + lang.link.textToDisplay + '</label>' +
                '<input class="note-link-text form-control" type="text" />' +
                '</div>' +
                '<div class="form-group">' +
                '<label>' + lang.link.url + '</label>' +
                '<input class="note-link-url form-control" type="text" value="http://" />' +
                '</div>' +
                (!options.disableLinkTarget ? '<div class="checkbox">' +
                    '<label for="sn-checkbox-open-in-new-window">' +
                    '<input type="checkbox" id="sn-checkbox-open-in-new-window" checked />' + lang.link.openInNewWindow +
                    '</label>' +
                    '</div>' : '');
            var footer = '<button href="#" class="btn btn-primary note-link-btn disabled" disabled>' + lang.link.insert + '</button>';
            this.$dialog = ui.dialog({
                className: 'link-dialog',
                title: lang.link.insert,
                fade: options.dialogsFade,
                body: body,
                footer: footer
            }).render().appendTo($container);
        };
        this.destroy = function () {
            ui.hideDialog(this.$dialog);
            this.$dialog.remove();
        };
        this.bindEnterKey = function ($input, $btn) {
            $input.on('keypress', function (event) {
                if (event.keyCode === key.code.ENTER) {
                    $btn.trigger('click');
                }
            });
        };
        this.toggleLinkBtn = function ($linkBtn, $linkText, $linkUrl) {
            ui.toggleBtn($linkBtn, $linkText.val() && $linkUrl.val());
        };
        this.showLinkDialog = function (linkInfo) {
            return $.Deferred(function (deferred) {
                var $linkText = self.$dialog.find('.note-link-text'), $linkUrl = self.$dialog.find('.note-link-url'),
                    $linkBtn = self.$dialog.find('.note-link-btn'),
                    $openInNewWindow = self.$dialog.find('input[type=checkbox]');
                ui.onDialogShown(self.$dialog, function () {
                    context.triggerEvent('dialog.shown');
                    if (!linkInfo.url) {
                        linkInfo.url = linkInfo.text;
                    }
                    $linkText.val(linkInfo.text);
                    var handleLinkTextUpdate = function () {
                        self.toggleLinkBtn($linkBtn, $linkText, $linkUrl);
                        linkInfo.text = $linkText.val();
                    };
                    $linkText.on('input', handleLinkTextUpdate).on('paste', function () {
                        setTimeout(handleLinkTextUpdate, 0);
                    });
                    var handleLinkUrlUpdate = function () {
                        self.toggleLinkBtn($linkBtn, $linkText, $linkUrl);
                        if (!linkInfo.text) {
                            $linkText.val($linkUrl.val());
                        }
                    };
                    $linkUrl.on('input', handleLinkUrlUpdate).on('paste', function () {
                        setTimeout(handleLinkUrlUpdate, 0);
                    }).val(linkInfo.url).trigger('focus');
                    self.toggleLinkBtn($linkBtn, $linkText, $linkUrl);
                    self.bindEnterKey($linkUrl, $linkBtn);
                    self.bindEnterKey($linkText, $linkBtn);
                    var isChecked = linkInfo.isNewWindow !== undefined ? linkInfo.isNewWindow : context.options.linkTargetBlank;
                    $openInNewWindow.prop('checked', isChecked);
                    $linkBtn.one('click', function (event) {
                        event.preventDefault();
                        deferred.resolve({
                            range: linkInfo.range,
                            url: $linkUrl.val(),
                            text: $linkText.val(),
                            isNewWindow: $openInNewWindow.is(':checked')
                        });
                        self.$dialog.modal('hide');
                    });
                });
                ui.onDialogHidden(self.$dialog, function () {
                    $linkText.off('input paste keypress');
                    $linkUrl.off('input paste keypress');
                    $linkBtn.off('click');
                    if (deferred.state() === 'pending') {
                        deferred.reject();
                    }
                });
                ui.showDialog(self.$dialog);
            }).promise();
        };
        this.show = function () {
            var linkInfo = context.invoke('editor.getLinkInfo');
            context.invoke('editor.saveRange');
            this.showLinkDialog(linkInfo).then(function (linkInfo) {
                context.invoke('editor.restoreRange');
                context.invoke('editor.createLink', linkInfo);
            }).fail(function () {
                context.invoke('editor.restoreRange');
            });
        };
        context.memo('help.linkDialog.show', options.langInfo.help['linkDialog.show']);
    };
    var LinkPopover = function (context) {
        var self = this;
        var ui = $.summernote.ui;
        var options = context.options;
        this.events = {
            'summernote.keyup summernote.mouseup summernote.change summernote.scroll': function () {
                self.update();
            }, 'summernote.disable summernote.dialog.shown': function () {
                self.hide();
            }
        };
        this.shouldInitialize = function () {
            return !list.isEmpty(options.popover.link);
        };
        this.initialize = function () {
            this.$popover = ui.popover({
                className: 'note-link-popover', callback: function ($node) {
                    var $content = $node.find('.popover-content');
                    $content.prepend('<span><a target="_blank"></a>&nbsp;</span>');
                }
            }).render().appendTo('body');
            var $content = this.$popover.find('.popover-content');
            context.invoke('buttons.build', $content, options.popover.link);
        };
        this.destroy = function () {
            this.$popover.remove();
        };
        this.update = function () {
            if (!context.invoke('editor.hasFocus')) {
                this.hide();
                return;
            }
            var rng = context.invoke('editor.createRange');
            if (rng.isCollapsed() && rng.isOnAnchor()) {
                var anchor = dom.ancestor(rng.sc, dom.isAnchor);
                var href = $(anchor).attr('href');
                this.$popover.find('a').attr('href', href).html(href);
                var pos = dom.posFromPlaceholder(anchor);
                this.$popover.css({display: 'block', left: pos.left, top: pos.top});
            } else {
                this.hide();
            }
        };
        this.hide = function () {
            this.$popover.hide();
        };
    };
    var ImageDialog = function (context) {
        var self = this;
        var ui = $.summernote.ui;
        var $editor = context.layoutInfo.editor;
        var options = context.options;
        var lang = options.langInfo;
        this.initialize = function () {
            var $container = options.dialogsInBody ? $(document.body) : $editor;
            var imageLimitation = '';
            if (options.maximumImageFileSize) {
                var unit = Math.floor(Math.log(options.maximumImageFileSize) / Math.log(1024));
                var readableSize = (options.maximumImageFileSize / Math.pow(1024, unit)).toFixed(2) * 1 +
                    ' ' + ' KMGTP'[unit] + 'B';
                imageLimitation = '<small>' + lang.image.maximumFileSize + ' : ' + readableSize + '</small>';
            }
            var body = '<div class="form-group note-group-select-from-files">' +
                '<label>' + lang.image.selectFromFiles + '</label>' +
                '<input class="note-image-input form-control" type="file" name="files" accept="image/*" multiple="multiple" />' +
                imageLimitation +
                '</div>' +
                '<div class="form-group note-group-image-url" style="overflow:auto;">' +
                '<label>' + lang.image.url + '</label>' +
                '<input class="note-image-url form-control col-md-12" type="text" />' +
                '</div>';
            var footer = '<button href="#" class="btn btn-primary note-image-btn disabled" disabled>' + lang.image.insert + '</button>';
            this.$dialog = ui.dialog({
                title: lang.image.insert,
                fade: options.dialogsFade,
                body: body,
                footer: footer
            }).render().appendTo($container);
        };
        this.destroy = function () {
            ui.hideDialog(this.$dialog);
            this.$dialog.remove();
        };
        this.bindEnterKey = function ($input, $btn) {
            $input.on('keypress', function (event) {
                if (event.keyCode === key.code.ENTER) {
                    $btn.trigger('click');
                }
            });
        };
        this.show = function () {
            context.invoke('editor.saveRange');
            this.showImageDialog().then(function (data) {
                ui.hideDialog(self.$dialog);
                context.invoke('editor.restoreRange');
                if (typeof data === 'string') {
                    context.invoke('editor.insertImage', data);
                } else {
                    context.invoke('editor.insertImagesOrCallback', data);
                }
            }).fail(function () {
                context.invoke('editor.restoreRange');
            });
        };
        this.showImageDialog = function () {
            return $.Deferred(function (deferred) {
                var $imageInput = self.$dialog.find('.note-image-input'),
                    $imageUrl = self.$dialog.find('.note-image-url'), $imageBtn = self.$dialog.find('.note-image-btn');
                ui.onDialogShown(self.$dialog, function () {
                    context.triggerEvent('dialog.shown');
                    $imageInput.replaceWith($imageInput.clone().on('change', function () {
                        deferred.resolve(this.files || this.value);
                    }).val(''));
                    $imageBtn.click(function (event) {
                        event.preventDefault();
                        deferred.resolve($imageUrl.val());
                    });
                    $imageUrl.on('keyup paste', function () {
                        var url = $imageUrl.val();
                        ui.toggleBtn($imageBtn, url);
                    }).val('').trigger('focus');
                    self.bindEnterKey($imageUrl, $imageBtn);
                });
                ui.onDialogHidden(self.$dialog, function () {
                    $imageInput.off('change');
                    $imageUrl.off('keyup paste keypress');
                    $imageBtn.off('click');
                    if (deferred.state() === 'pending') {
                        deferred.reject();
                    }
                });
                ui.showDialog(self.$dialog);
            });
        };
    };
    var ImagePopover = function (context) {
        var self = this;
        var ui = $.summernote.ui;
        var options = context.options;
        this.events = {
            'summernote.disable': function () {
                self.hide();
            }
        };
        this.shouldInitialize = function () {
            return !list.isEmpty(options.popover.image);
        };
        this.initialize = function () {
            this.$popover = ui.popover({className: 'note-image-popover'}).render().appendTo('body');
            var $content = this.$popover.find('.popover-content');
            context.invoke('buttons.build', $content, options.popover.image);
        };
        this.destroy = function () {
            this.$popover.remove();
        };
        this.update = function (target) {
            if (dom.isImg(target)) {
                var pos = dom.posFromPlaceholder(target);
                this.$popover.css({display: 'block', left: pos.left, top: pos.top});
            } else {
                this.hide();
            }
        };
        this.hide = function () {
            this.$popover.hide();
        };
    };
    var TablePopover = function (context) {
        var self = this;
        var ui = $.summernote.ui;
        var options = context.options;
        this.events = {
            'summernote.mousedown': function (we, e) {
                self.update(e.target);
            }, 'summernote.keyup summernote.scroll summernote.change': function () {
                self.update();
            }, 'summernote.disable': function () {
                self.hide();
            }
        };
        this.shouldInitialize = function () {
            return !list.isEmpty(options.popover.table);
        };
        this.initialize = function () {
            this.$popover = ui.popover({className: 'note-table-popover'}).render().appendTo('body');
            var $content = this.$popover.find('.popover-content');
            context.invoke('buttons.build', $content, options.popover.table);
            if (agent.isFF) {
                document.execCommand('enableInlineTableEditing', false, false);
            }
        };
        this.destroy = function () {
            this.$popover.remove();
        };
        this.update = function (target) {
            if (context.isDisabled()) {
                return false;
            }
            var isCell = dom.isCell(target);
            if (isCell) {
                var pos = dom.posFromPlaceholder(target);
                this.$popover.css({display: 'block', left: pos.left, top: pos.top});
            } else {
                this.hide();
            }
            return isCell;
        };
        this.hide = function () {
            this.$popover.hide();
        };
    };
    var VideoDialog = function (context) {
        var self = this;
        var ui = $.summernote.ui;
        var $editor = context.layoutInfo.editor;
        var options = context.options;
        var lang = options.langInfo;
        this.initialize = function () {
            var $container = options.dialogsInBody ? $(document.body) : $editor;
            var body = '<div class="form-group row-fluid">' +
                '<label>' + lang.video.url + ' <small class="text-muted">' + lang.video.providers + '</small></label>' +
                '<input class="note-video-url form-control span12" type="text" />' +
                '</div>';
            var footer = '<button href="#" class="btn btn-primary note-video-btn disabled" disabled>' + lang.video.insert + '</button>';
            this.$dialog = ui.dialog({
                title: lang.video.insert,
                fade: options.dialogsFade,
                body: body,
                footer: footer
            }).render().appendTo($container);
        };
        this.destroy = function () {
            ui.hideDialog(this.$dialog);
            this.$dialog.remove();
        };
        this.bindEnterKey = function ($input, $btn) {
            $input.on('keypress', function (event) {
                if (event.keyCode === key.code.ENTER) {
                    $btn.trigger('click');
                }
            });
        };
        this.createVideoNode = function (url) {
            var ytRegExp = /^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/;
            var ytMatch = url.match(ytRegExp);
            var igRegExp = /(?:www\.|\/\/)instagram\.com\/p\/(.[a-zA-Z0-9_-]*)/;
            var igMatch = url.match(igRegExp);
            var vRegExp = /\/\/vine\.co\/v\/([a-zA-Z0-9]+)/;
            var vMatch = url.match(vRegExp);
            var vimRegExp = /\/\/(player\.)?vimeo\.com\/([a-z]*\/)*(\d+)[?]?.*/;
            var vimMatch = url.match(vimRegExp);
            var dmRegExp = /.+dailymotion.com\/(video|hub)\/([^_]+)[^#]*(#video=([^_&]+))?/;
            var dmMatch = url.match(dmRegExp);
            var youkuRegExp = /\/\/v\.youku\.com\/v_show\/id_(\w+)=*\.html/;
            var youkuMatch = url.match(youkuRegExp);
            var qqRegExp = /\/\/v\.qq\.com.*?vid=(.+)/;
            var qqMatch = url.match(qqRegExp);
            var qqRegExp2 = /\/\/v\.qq\.com\/x?\/?(page|cover).*?\/([^\/]+)\.html\??.*/;
            var qqMatch2 = url.match(qqRegExp2);
            var mp4RegExp = /^.+.(mp4|m4v)$/;
            var mp4Match = url.match(mp4RegExp);
            var oggRegExp = /^.+.(ogg|ogv)$/;
            var oggMatch = url.match(oggRegExp);
            var webmRegExp = /^.+.(webm)$/;
            var webmMatch = url.match(webmRegExp);
            var $video;
            if (ytMatch && ytMatch[1].length === 11) {
                var youtubeId = ytMatch[1];
                $video = $('<iframe>').attr('frameborder', 0).attr('src', '//www.youtube.com/embed/' + youtubeId).attr('width', '640').attr('height', '360');
            } else if (igMatch && igMatch[0].length) {
                $video = $('<iframe>').attr('frameborder', 0).attr('src', 'https://instagram.com/p/' + igMatch[1] + '/embed/').attr('width', '612').attr('height', '710').attr('scrolling', 'no').attr('allowtransparency', 'true');
            } else if (vMatch && vMatch[0].length) {
                $video = $('<iframe>').attr('frameborder', 0).attr('src', vMatch[0] + '/embed/simple').attr('width', '600').attr('height', '600').attr('class', 'vine-embed');
            } else if (vimMatch && vimMatch[3].length) {
                $video = $('<iframe webkitallowfullscreen mozallowfullscreen allowfullscreen>').attr('frameborder', 0).attr('src', '//player.vimeo.com/video/' + vimMatch[3]).attr('width', '640').attr('height', '360');
            } else if (dmMatch && dmMatch[2].length) {
                $video = $('<iframe>').attr('frameborder', 0).attr('src', '//www.dailymotion.com/embed/video/' + dmMatch[2]).attr('width', '640').attr('height', '360');
            } else if (youkuMatch && youkuMatch[1].length) {
                $video = $('<iframe webkitallowfullscreen mozallowfullscreen allowfullscreen>').attr('frameborder', 0).attr('height', '498').attr('width', '510').attr('src', '//player.youku.com/embed/' + youkuMatch[1]);
            } else if ((qqMatch && qqMatch[1].length) || (qqMatch2 && qqMatch2[2].length)) {
                var vid = ((qqMatch && qqMatch[1].length) ? qqMatch[1] : qqMatch2[2]);
                $video = $('<iframe webkitallowfullscreen mozallowfullscreen allowfullscreen>').attr('frameborder', 0).attr('height', '310').attr('width', '500').attr('src', 'http://v.qq.com/iframe/player.html?vid=' + vid + '&amp;auto=0');
            } else if (mp4Match || oggMatch || webmMatch) {
                $video = $('<video controls>').attr('src', url).attr('width', '640').attr('height', '360');
            } else {
                return false;
            }
            $video.addClass('note-video-clip');
            return $video[0];
        };
        this.show = function () {
            var text = context.invoke('editor.getSelectedText');
            context.invoke('editor.saveRange');
            this.showVideoDialog(text).then(function (url) {
                ui.hideDialog(self.$dialog);
                context.invoke('editor.restoreRange');
                var $node = self.createVideoNode(url);
                if ($node) {
                    context.invoke('editor.insertNode', $node);
                }
            }).fail(function () {
                context.invoke('editor.restoreRange');
            });
        };
        this.showVideoDialog = function (text) {
            return $.Deferred(function (deferred) {
                var $videoUrl = self.$dialog.find('.note-video-url'), $videoBtn = self.$dialog.find('.note-video-btn');
                ui.onDialogShown(self.$dialog, function () {
                    context.triggerEvent('dialog.shown');
                    $videoUrl.val(text).on('input', function () {
                        ui.toggleBtn($videoBtn, $videoUrl.val());
                    }).trigger('focus');
                    $videoBtn.click(function (event) {
                        event.preventDefault();
                        deferred.resolve($videoUrl.val());
                    });
                    self.bindEnterKey($videoUrl, $videoBtn);
                });
                ui.onDialogHidden(self.$dialog, function () {
                    $videoUrl.off('input');
                    $videoBtn.off('click');
                    if (deferred.state() === 'pending') {
                        deferred.reject();
                    }
                });
                ui.showDialog(self.$dialog);
            });
        };
    };
    var HelpDialog = function (context) {
        var self = this;
        var ui = $.summernote.ui;
        var $editor = context.layoutInfo.editor;
        var options = context.options;
        var lang = options.langInfo;
        this.createShortCutList = function () {
            var keyMap = options.keyMap[agent.isMac ? 'mac' : 'pc'];
            return Object.keys(keyMap).map(function (key) {
                var command = keyMap[key];
                var $row = $('<div><div class="help-list-item"/></div>');
                $row.append($('<label><kbd>' + key + '</kdb></label>').css({
                    'width': 180,
                    'margin-right': 10
                })).append($('<span/>').html(context.memo('help.' + command) || command));
                return $row.html();
            }).join('');
        };
        this.initialize = function () {
            var $container = options.dialogsInBody ? $(document.body) : $editor;
            var body = ['<p class="text-center">', '<a href="http://summernote.org/" target="_blank">Summernote 0.8.6</a> Â· ', '<a href="https://github.com/summernote/summernote" target="_blank">Project</a> Â· ', '<a href="https://github.com/summernote/summernote/issues" target="_blank">Issues</a>', '</p>'].join('');
            this.$dialog = ui.dialog({
                title: lang.options.help,
                fade: options.dialogsFade,
                body: this.createShortCutList(),
                footer: body,
                callback: function ($node) {
                    $node.find('.modal-body').css({'max-height': 300, 'overflow': 'scroll'});
                }
            }).render().appendTo($container);
        };
        this.destroy = function () {
            ui.hideDialog(this.$dialog);
            this.$dialog.remove();
        };
        this.showHelpDialog = function () {
            return $.Deferred(function (deferred) {
                ui.onDialogShown(self.$dialog, function () {
                    context.triggerEvent('dialog.shown');
                    deferred.resolve();
                });
                ui.showDialog(self.$dialog);
            }).promise();
        };
        this.show = function () {
            context.invoke('editor.saveRange');
            this.showHelpDialog().then(function () {
                context.invoke('editor.restoreRange');
            });
        };
    };
    var AirPopover = function (context) {
        var self = this;
        var ui = $.summernote.ui;
        var options = context.options;
        var AIR_MODE_POPOVER_X_OFFSET = 20;
        this.events = {
            'summernote.keyup summernote.mouseup summernote.scroll': function () {
                self.update();
            }, 'summernote.disable summernote.change summernote.dialog.shown': function () {
                self.hide();
            }, 'summernote.focusout': function (we, e) {
                if (agent.isFF) {
                    return;
                }
                if (!e.relatedTarget || !dom.ancestor(e.relatedTarget, func.eq(self.$popover[0]))) {
                    self.hide();
                }
            }
        };
        this.shouldInitialize = function () {
            return options.airMode && !list.isEmpty(options.popover.air);
        };
        this.initialize = function () {
            this.$popover = ui.popover({className: 'note-air-popover'}).render().appendTo('body');
            var $content = this.$popover.find('.popover-content');
            context.invoke('buttons.build', $content, options.popover.air);
        };
        this.destroy = function () {
            this.$popover.remove();
        };
        this.update = function () {
            var styleInfo = context.invoke('editor.currentStyle');
            if (styleInfo.range && !styleInfo.range.isCollapsed()) {
                var rect = list.last(styleInfo.range.getClientRects());
                if (rect) {
                    var bnd = func.rect2bnd(rect);
                    this.$popover.css({
                        display: 'block',
                        left: Math.max(bnd.left + bnd.width / 2, 0) - AIR_MODE_POPOVER_X_OFFSET,
                        top: bnd.top + bnd.height
                    });
                }
            } else {
                this.hide();
            }
        };
        this.hide = function () {
            this.$popover.hide();
        };
    };
    var HintPopover = function (context) {
        var self = this;
        var ui = $.summernote.ui;
        var POPOVER_DIST = 5;
        var hint = context.options.hint || [];
        var direction = context.options.hintDirection || 'bottom';
        var hints = $.isArray(hint) ? hint : [hint];
        this.events = {
            'summernote.keyup': function (we, e) {
                if (!e.isDefaultPrevented()) {
                    self.handleKeyup(e);
                }
            }, 'summernote.keydown': function (we, e) {
                self.handleKeydown(e);
            }, 'summernote.disable summernote.dialog.shown': function () {
                self.hide();
            }
        };
        this.shouldInitialize = function () {
            return hints.length > 0;
        };
        this.initialize = function () {
            this.lastWordRange = null;
            this.$popover = ui.popover({
                className: 'note-hint-popover',
                hideArrow: true,
                direction: ''
            }).render().appendTo('body');
            this.$popover.hide();
            this.$content = this.$popover.find('.popover-content');
            this.$content.on('click', '.note-hint-item', function () {
                self.$content.find('.active').removeClass('active');
                $(this).addClass('active');
                self.replace();
            });
        };
        this.destroy = function () {
            this.$popover.remove();
        };
        this.selectItem = function ($item) {
            this.$content.find('.active').removeClass('active');
            $item.addClass('active');
            this.$content[0].scrollTop = $item[0].offsetTop - (this.$content.innerHeight() / 2);
        };
        this.moveDown = function () {
            var $current = this.$content.find('.note-hint-item.active');
            var $next = $current.next();
            if ($next.length) {
                this.selectItem($next);
            } else {
                var $nextGroup = $current.parent().next();
                if (!$nextGroup.length) {
                    $nextGroup = this.$content.find('.note-hint-group').first();
                }
                this.selectItem($nextGroup.find('.note-hint-item').first());
            }
        };
        this.moveUp = function () {
            var $current = this.$content.find('.note-hint-item.active');
            var $prev = $current.prev();
            if ($prev.length) {
                this.selectItem($prev);
            } else {
                var $prevGroup = $current.parent().prev();
                if (!$prevGroup.length) {
                    $prevGroup = this.$content.find('.note-hint-group').last();
                }
                this.selectItem($prevGroup.find('.note-hint-item').last());
            }
        };
        this.replace = function () {
            var $item = this.$content.find('.note-hint-item.active');
            if ($item.length) {
                var node = this.nodeFromItem($item);
                this.lastWordRange.insertNode(node);
                range.createFromNode(node).collapse().select();
                this.lastWordRange = null;
                this.hide();
                context.triggerEvent('change', context.layoutInfo.editable.html(), context.layoutInfo.editable);
                context.invoke('editor.focus');
            }
        };
        this.nodeFromItem = function ($item) {
            var hint = hints[$item.data('index')];
            var item = $item.data('item');
            var node = hint.content ? hint.content(item) : item;
            if (typeof node === 'string') {
                node = dom.createText(node);
            }
            return node;
        };
        this.createItemTemplates = function (hintIdx, items) {
            var hint = hints[hintIdx];
            return items.map(function (item, idx) {
                var $item = $('<div class="note-hint-item"/>');
                $item.append(hint.template ? hint.template(item) : item + '');
                $item.data({'index': hintIdx, 'item': item});
                if (hintIdx === 0 && idx === 0) {
                    $item.addClass('active');
                }
                return $item;
            });
        };
        this.handleKeydown = function (e) {
            if (!this.$popover.is(':visible')) {
                return;
            }
            if (e.keyCode === key.code.ENTER) {
                e.preventDefault();
                this.replace();
            } else if (e.keyCode === key.code.UP) {
                e.preventDefault();
                this.moveUp();
            } else if (e.keyCode === key.code.DOWN) {
                e.preventDefault();
                this.moveDown();
            }
        };
        this.searchKeyword = function (index, keyword, callback) {
            var hint = hints[index];
            if (hint && hint.match.test(keyword) && hint.search) {
                var matches = hint.match.exec(keyword);
                hint.search(matches[1], callback);
            } else {
                callback();
            }
        };
        this.createGroup = function (idx, keyword) {
            var $group = $('<div class="note-hint-group note-hint-group-' + idx + '"/>');
            this.searchKeyword(idx, keyword, function (items) {
                items = items || [];
                if (items.length) {
                    $group.html(self.createItemTemplates(idx, items));
                    self.show();
                }
            });
            return $group;
        };
        this.handleKeyup = function (e) {
            if (list.contains([key.code.ENTER, key.code.UP, key.code.DOWN], e.keyCode)) {
                if (e.keyCode === key.code.ENTER) {
                    if (this.$popover.is(':visible')) {
                        return;
                    }
                }
            } else {
                var wordRange = context.invoke('editor.createRange').getWordRange();
                var keyword = wordRange.toString();
                if (hints.length && keyword) {
                    this.$content.empty();
                    var bnd = func.rect2bnd(list.last(wordRange.getClientRects()));
                    if (bnd) {
                        this.$popover.hide();
                        this.lastWordRange = wordRange;
                        hints.forEach(function (hint, idx) {
                            if (hint.match.test(keyword)) {
                                self.createGroup(idx, keyword).appendTo(self.$content);
                            }
                        });
                        if (direction === 'top') {
                            this.$popover.css({
                                left: bnd.left,
                                top: bnd.top - this.$popover.outerHeight() - POPOVER_DIST
                            });
                        } else {
                            this.$popover.css({left: bnd.left, top: bnd.top + bnd.height + POPOVER_DIST});
                        }
                    }
                } else {
                    this.hide();
                }
            }
        };
        this.show = function () {
            this.$popover.show();
        };
        this.hide = function () {
            this.$popover.hide();
        };
    };
    $.summernote = $.extend($.summernote, {
        version: '0.8.6',
        ui: ui,
        dom: dom,
        plugins: {},
        options: {
            modules: {
                'editor': Editor,
                'clipboard': Clipboard,
                'dropzone': Dropzone,
                'codeview': Codeview,
                'statusbar': Statusbar,
                'fullscreen': Fullscreen,
                'handle': Handle,
                'hintPopover': HintPopover,
                'autoLink': AutoLink,
                'autoSync': AutoSync,
                'placeholder': Placeholder,
                'buttons': Buttons,
                'toolbar': Toolbar,
                'linkDialog': LinkDialog,
                'linkPopover': LinkPopover,
                'imageDialog': ImageDialog,
                'imagePopover': ImagePopover,
                'tablePopover': TablePopover,
                'videoDialog': VideoDialog,
                'helpDialog': HelpDialog,
                'airPopover': AirPopover
            },
            buttons: {},
            lang: 'en-US',
            toolbar: [['style', ['style']], ['font', ['bold', 'underline', 'clear']], ['fontname', ['fontname']], ['color', ['color']], ['para', ['ul', 'ol', 'paragraph']], ['table', ['table']], ['insert', ['link', 'picture', 'video']], ['view', ['fullscreen', 'codeview', 'help']]],
            popover: {
                image: [['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']], ['float', ['floatLeft', 'floatRight', 'floatNone']], ['remove', ['removeMedia']]],
                link: [['link', ['linkDialogShow', 'unlink']]],
                table: [['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']], ['delete', ['deleteRow', 'deleteCol', 'deleteTable']]],
                air: [['color', ['color']], ['font', ['bold', 'underline', 'clear']], ['para', ['ul', 'paragraph']], ['table', ['table']], ['insert', ['link', 'picture']]]
            },
            airMode: false,
            width: null,
            height: null,
            linkTargetBlank: true,
            focus: false,
            tabSize: 4,
            styleWithSpan: true,
            shortcuts: true,
            textareaAutoSync: true,
            direction: null,
            tooltip: 'auto',
            styleTags: ['p', 'blockquote', 'pre', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'],
            fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Helvetica Neue', 'Helvetica', 'Impact', 'Lucida Grande', 'Tahoma', 'Times New Roman', 'Verdana'],
            fontSizes: ['8', '9', '10', '11', '12', '14', '18', '24', '36'],
            colors: [['#000000', '#424242', '#636363', '#9C9C94', '#CEC6CE', '#EFEFEF', '#F7F7F7', '#FFFFFF'], ['#FF0000', '#FF9C00', '#FFFF00', '#00FF00', '#00FFFF', '#0000FF', '#9C00FF', '#FF00FF'], ['#F7C6CE', '#FFE7CE', '#FFEFC6', '#D6EFD6', '#CEDEE7', '#CEE7F7', '#D6D6E7', '#E7D6DE'], ['#E79C9C', '#FFC69C', '#FFE79C', '#B5D6A5', '#A5C6CE', '#9CC6EF', '#B5A5D6', '#D6A5BD'], ['#E76363', '#F7AD6B', '#FFD663', '#94BD7B', '#73A5AD', '#6BADDE', '#8C7BC6', '#C67BA5'], ['#CE0000', '#E79439', '#EFC631', '#6BA54A', '#4A7B8C', '#3984C6', '#634AA5', '#A54A7B'], ['#9C0000', '#B56308', '#BD9400', '#397B21', '#104A5A', '#085294', '#311873', '#731842'], ['#630000', '#7B3900', '#846300', '#295218', '#083139', '#003163', '#21104A', '#4A1031']],
            lineHeights: ['1.0', '1.2', '1.4', '1.5', '1.6', '1.8', '2.0', '3.0'],
            tableClassName: 'table table-bordered',
            insertTableMaxSize: {col: 10, row: 10},
            dialogsInBody: false,
            dialogsFade: false,
            maximumImageFileSize: null,
            callbacks: {
                onInit: null,
                onFocus: null,
                onBlur: null,
                onEnter: null,
                onKeyup: null,
                onKeydown: null,
                onImageUpload: null,
                onImageUploadError: null
            },
            codemirror: {mode: 'text/html', htmlMode: true, lineNumbers: true},
            keyMap: {
                pc: {
                    'ENTER': 'insertParagraph',
                    'CTRL+Z': 'undo',
                    'CTRL+Y': 'redo',
                    'TAB': 'tab',
                    'SHIFT+TAB': 'untab',
                    'CTRL+B': 'bold',
                    'CTRL+I': 'italic',
                    'CTRL+U': 'underline',
                    'CTRL+SHIFT+S': 'strikethrough',
                    'CTRL+BACKSLASH': 'removeFormat',
                    'CTRL+SHIFT+L': 'justifyLeft',
                    'CTRL+SHIFT+E': 'justifyCenter',
                    'CTRL+SHIFT+R': 'justifyRight',
                    'CTRL+SHIFT+J': 'justifyFull',
                    'CTRL+SHIFT+NUM7': 'insertUnorderedList',
                    'CTRL+SHIFT+NUM8': 'insertOrderedList',
                    'CTRL+LEFTBRACKET': 'outdent',
                    'CTRL+RIGHTBRACKET': 'indent',
                    'CTRL+NUM0': 'formatPara',
                    'CTRL+NUM1': 'formatH1',
                    'CTRL+NUM2': 'formatH2',
                    'CTRL+NUM3': 'formatH3',
                    'CTRL+NUM4': 'formatH4',
                    'CTRL+NUM5': 'formatH5',
                    'CTRL+NUM6': 'formatH6',
                    'CTRL+ENTER': 'insertHorizontalRule',
                    'CTRL+K': 'linkDialog.show'
                },
                mac: {
                    'ENTER': 'insertParagraph',
                    'CMD+Z': 'undo',
                    'CMD+SHIFT+Z': 'redo',
                    'TAB': 'tab',
                    'SHIFT+TAB': 'untab',
                    'CMD+B': 'bold',
                    'CMD+I': 'italic',
                    'CMD+U': 'underline',
                    'CMD+SHIFT+S': 'strikethrough',
                    'CMD+BACKSLASH': 'removeFormat',
                    'CMD+SHIFT+L': 'justifyLeft',
                    'CMD+SHIFT+E': 'justifyCenter',
                    'CMD+SHIFT+R': 'justifyRight',
                    'CMD+SHIFT+J': 'justifyFull',
                    'CMD+SHIFT+NUM7': 'insertUnorderedList',
                    'CMD+SHIFT+NUM8': 'insertOrderedList',
                    'CMD+LEFTBRACKET': 'outdent',
                    'CMD+RIGHTBRACKET': 'indent',
                    'CMD+NUM0': 'formatPara',
                    'CMD+NUM1': 'formatH1',
                    'CMD+NUM2': 'formatH2',
                    'CMD+NUM3': 'formatH3',
                    'CMD+NUM4': 'formatH4',
                    'CMD+NUM5': 'formatH5',
                    'CMD+NUM6': 'formatH6',
                    'CMD+ENTER': 'insertHorizontalRule',
                    'CMD+K': 'linkDialog.show'
                }
            },
            icons: {
                'align': 'note-icon-align',
                'alignCenter': 'note-icon-align-center',
                'alignJustify': 'note-icon-align-justify',
                'alignLeft': 'note-icon-align-left',
                'alignRight': 'note-icon-align-right',
                'rowBelow': 'note-icon-row-below',
                'colBefore': 'note-icon-col-before',
                'colAfter': 'note-icon-col-after',
                'rowAbove': 'note-icon-row-above',
                'rowRemove': 'note-icon-row-remove',
                'colRemove': 'note-icon-col-remove',
                'indent': 'note-icon-align-indent',
                'outdent': 'note-icon-align-outdent',
                'arrowsAlt': 'note-icon-arrows-alt',
                'bold': 'note-icon-bold',
                'caret': 'note-icon-caret',
                'circle': 'note-icon-circle',
                'close': 'note-icon-close',
                'code': 'note-icon-code',
                'eraser': 'note-icon-eraser',
                'font': 'note-icon-font',
                'frame': 'note-icon-frame',
                'italic': 'note-icon-italic',
                'link': 'note-icon-link',
                'unlink': 'note-icon-chain-broken',
                'magic': 'note-icon-magic',
                'menuCheck': 'note-icon-check',
                'minus': 'note-icon-minus',
                'orderedlist': 'note-icon-orderedlist',
                'pencil': 'note-icon-pencil',
                'picture': 'note-icon-picture',
                'question': 'note-icon-question',
                'redo': 'note-icon-redo',
                'square': 'note-icon-square',
                'strikethrough': 'note-icon-strikethrough',
                'subscript': 'note-icon-subscript',
                'superscript': 'note-icon-superscript',
                'table': 'note-icon-table',
                'textHeight': 'note-icon-text-height',
                'trash': 'note-icon-trash',
                'underline': 'note-icon-underline',
                'undo': 'note-icon-undo',
                'unorderedlist': 'note-icon-unorderedlist',
                'video': 'note-icon-video'
            }
        }
    });
}));