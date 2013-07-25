var fs = require('fs'),
    xml2js = require('xml2js'),
    events = require('events'),
    u = require('url');

var file = process.argv[2];

var wp = new events.EventEmitter();

var parser = new xml2js.Parser();
parser.addListener('end', function(result) {
	parseXml(result);
});

var parseXml = function(xml) {
	parseChannel(xml.rss.channel[0]);
};

var parseChannel = function(channel) {
	for(index in channel.item) {
		parseItem(channel.link, channel.item[index])
	}
}

var parseItem = function(root, item) {
	var folder = item.link[0].replace(root,'');
	console.log(folder);
}

/*
wp.on('read-link', function(item) {
	console.log(typeof item);
	return;
	if(item.link !== undefined) {
		var permalink = u.parse(item.link);
		console.log(permalink.pathname);
	}
	throw("STOP");
});
/**/

fs.readFile(file, function(err, data) {
    parser.parseString(data);
});