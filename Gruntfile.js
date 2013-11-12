module.exports = function(grunt) {
	
	// Project configuration.
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		less: {
			// Compile all targeted LESS files individually
			default_theme: {
				options: {
					concat: false
					/*require: ["src/mixins.less", "bootstrap/variables.less"]*/
				},
				src: 'public/themes/default/*.less',
				dest: 'public/themes/default/style.css'
			}
		},
		uglify: {
			default_theme: {
				files: {
					'public/themes/default/script.min.js': ['public/themes/default/scripts/modernizr-2.6.1.min.js']
				}
			}
		}
	});


	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-less');
	// Default task(s).
	grunt.registerTask('build', ['less', 'uglify']);
	grunt.registerTask('default', ['build']);

};