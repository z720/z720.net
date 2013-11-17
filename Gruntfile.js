module.exports = function(grunt) {
	
	// Project configuration.
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		less: {
			// Compile all targeted LESS files individually
			v06_theme: {
				options: {
					concat: false
					/*require: ["src/mixins.less", "bootstrap/variables.less"]*/
				},
				src: 'public/themes/v06/style/style.less',
				dest: 'public/themes/v06/style.css'
			}
		},
		uglify: {
			v06_theme: {
				files: {
					'public/themes/v06/script.min.js': ['public/themes/v06/scripts/modernizr-2.6.1.min.js']
				}
			}
		},
		watch: {
			files: ['public/themes/v06/**/*.less', 'public/themes/v06/scripts/**/*.js'],
			tasks: ['less', 'uglify']
		}
	});


	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-less');
	grunt.loadNpmTasks('grunt-contrib-watch');
	// Default task(s).
	grunt.registerTask('build', ['less', 'uglify']);
	grunt.registerTask('default', ['build']);

};