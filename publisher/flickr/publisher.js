/*jslint node: true */
'use strict';

var fs = require('fs'),
	tpl = require('./template.js'),
	mkdirp = require('mkdirp'),
	location = process.argv[2],
	destination = process.argv[3] || process.cwd(),
	today = new Date();


var processFile = function (location, sourceFile, processedFolder, isLast) {
	fs.readFile(location + '/' + sourceFile, function (err, data) {
		try {
			var image = JSON.parse(data),
				destFolder = destination + '/' + today.getFullYear() + '/',
				destFile = destFolder + tpl.filename(image.title),
				content = "/*";
	
			if (err) {
				throw err;
			}
	
			content += tpl.meta('Title', image.title);
			content += tpl.meta('Link', image.shortURL);
			content += tpl.meta('Date', today);
			content += tpl.meta('Template', 'photo');
			content += tpl.meta('Background', image.URL);
			content += "\n*/\n";
			content += tpl.content("## [" + image.title + "](" + image.URL + ")");
			content += tpl.content(image.description);
			
			mkdirp(destFolder, function (err) {
				fs.writeFile(destFile, content, function (err) {
					if (err) {
						throw err;
					}
					fs.rename(location + '/' + sourceFile, processedFolder + '/' + sourceFile, function (err) {
						if (err) {
							throw err;
						}
						//git commit
						if (isLast) {
							console.log('end');
						}
					});
				});
			});
		} catch (exception) {
			console.error('Error while processing: ' + sourceFile + '\n\t' + exception);
		}
	});
};




if (location) {
	console.log('Processing ' + location);
	fs.readdir(location, function (err, files) {
		var i,
			processedFolder = location + '/processed';
		
		// Trigger an error if read failure
		if (err) {
			console.log('Error while processing: ' + location + '\n\t' + err);
			return;
		}
		
		// Init the processed archive
		mkdirp(processedFolder, function (err) {
			if (err) {
				console.log('Error while processing: Processed dir unavailable\n\t' + err);
				return;
			}
		
			// Loop through files
			for (i in files) {
				if (files.hasOwnProperty(i) && files[i].substr(-4, 4) === 'json') {
					// Files to process
					console.log('Processing: ' + files[i]);
					processFile(location, files[i], processedFolder, (i + 1 === files.length));
				}
			}
		});
	});
} else {
	console.log('Usage: <Source> <Target>');
}
