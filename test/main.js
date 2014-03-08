module.exports = {
	'Title is correct': function(test) {
		test.open('http://z720.net.local/')
		.assert.title().is('Welcome | z720.net', 'Title is ocrrect')
		.screenshot('test/screenshots/home.png')
		.done();
	},
	'RSS exists': function(test) {
		test.open('http://z720.net.local/feed')
		.assert.numberOfElements('item', 10, '10 lasts posts')
		.done();
	}
};