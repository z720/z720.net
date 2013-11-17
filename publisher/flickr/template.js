/*jslint node: true */
'use strict';

exports.meta = function (key, value) {
	return "\n" + key + ": " + value;
};

exports.content = function (c) {
	return "\n" + c;
};

exports.filename = function (s) {
	return s.replace(/\.$/g,'').replace(/[ \.]/gi, "-") + '.md';
};