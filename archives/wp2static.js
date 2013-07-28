var fs = require('fs'),
    path = require('path'),
    xml2js = require('xml2js'),
    events = require('events'),
    u = require('url'),
    mkdirp = require('mkdirp'),
    http = require('http');

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
	for(var index in channel.item) {
		parseItem(channel.link, channel.item[index])
	}
}

var parseItem = function(root, item) {
	var folder = item.link[0].replace(root,'');
		for(prop in item){
			if(item[prop] instanceof Array && item[prop].length == 1) {
				item[prop] = item[prop][0];
			}
		}
    if(['publish','inherit'].indexOf(item['wp:status']) > -1 ) {
        if(folder.indexOf('?') == -1 
        	&& (item['wp:post_type'] == 'post') ) {
            var dest = './archives/wp'+folder,
                filename = '_'+item['wp:post_type']+'.v05.json';
            mkdirp(dest, function(err) {
                if (err) {
                    console.error(err);
                } else {
                		item['template'] = 'v05/'+item['wp:post_type']+'.jade';
                		item['filename'] = 'index.html';
                    var article = JSON.stringify(item);
                    fs.writeFile(dest+'/' + filename, article, function(err) {
                        if(err) {
                            console.error('filename: '+err);
                        } else {
                            console.info('> '+dest)
                        }
                    });
                }
            });
        } else if(item['wp:post_type'] == 'attachment3') {
                // download
                // put in the righ place
                console.info('>> '+item['wp:attachment_url']);
                var dest = item['wp:attachment_url'].replace(root,'');
                mkdirp(path.dirname('./archives/wp'+dest), function(err) {
                    if(err) {
                        console.error('dl: '+err);
                    } else {
                        var file = fs.createWriteStream('./archives/wp'+dest);
                        var request = http.get(item['wp:attachment_url'], function(response) {
                            response.pipe(file);
                        });
                    }
                });
        } else {
        	console.warn('xx: '+item.title + ' -> '+item.link);    
        }
    } else {
	    //console.info('Ignored:' + item['wp:status'][0]+ " - " + folder);
    }
}

fs.readFile(file, function(err, data) {
    parser.parseString(data);
});