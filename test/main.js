module.exports = {
	'Title is correct': function(test) {
		test.open('http://dev.z720.net/')
		.assert.title().is('Welcome | z720.net', 'Title is correct')
		.screenshot('test/screenshots/home.png')
		.done();
	},
	'RSS exists': function(test) {
		test.open('http://dev.z720.net/feed')
		.assert.numberOfElements('item', 10, '10 lasts posts')
		.done();
	},
    'oEmbed is working': function (test) {
      test.open('http://dev.z720.net/2014/photo/DCAout/8-Rose')
      .assert.text('.EmbedCaption').is('Rose #DCAout')
      .done();
    }
};