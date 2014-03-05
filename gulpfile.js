var gulp = require('gulp'),
	uglify = require('gulp-uglify'),
	concat = require('gulp-concat'),
	less = require('gulp-less'),
	theme = 'public/themes/v06',
	themejs = theme + '/scripts',
	themecss = theme + '/style';
console.log('Start gulp');
// Generate Theme js Files
gulp.task('theme.js', function() {
	return gulp.src(themejs + '/*.js')
		.pipe(uglify())
		.pipe(concat('script.min.js'))
		.pipe(gulp.dest(theme));
});
// Generate Theme css files (Less with imports)
gulp.task('theme.css', function() {
	return gulp.src(themecss + '/style.less')
		.pipe(less())
		.pipe(gulp.dest(theme));
});
// Generate whole theme files (js+css)
gulp.task('theme', [ 'theme.js', 'theme.css' ]);

// Generate the build id
gulp.task('identify-build', function () {
	var fs = require('fs');
	fs.writeFileSync('build', process.env.BUILD_ID || 'beta');
});

// Generate projet files
gulp.task('default', ['theme', 'identify-build']);