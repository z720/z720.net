var wintersmith = require('wintersmith');


var gen = wintersmith('./config.json');
gen.build(function(err) {
	if(err) throw err;
	console.log("Wintersmith Step: done!");
});
