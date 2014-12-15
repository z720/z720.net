/*jslint node:true */
var build = function () {
  'use strict';
  var gulp = require('gulp'),
    uglify = require('gulp-uglify'),
    concat = require('gulp-concat'),
    dalek = require('gulp-dalek'),
    less = require('gulp-less'),
    theme = 'public/themes/v06',
    themejs = theme + '/scripts',
    themecss = theme + '/style';

  // Generate Theme js Files
  gulp.task('theme.js', function () {
    return gulp.src(themejs + '/*.js')
        .pipe(uglify())
        .pipe(concat('script.min.js'))
        .pipe(gulp.dest(theme));
  });

  // Generate Theme css files (Less with imports)
  gulp.task('theme.css', function () {
    return gulp.src(themecss + '/style.less')
        .pipe(less())
        .pipe(gulp.dest(theme));
  });

  // Generate whole theme files (js+css)
  gulp.task('theme', [ 'theme.js', 'theme.css' ]);

  // Generate the build id
  gulp.task('fingerprint', function () {
    var fs = require('fs'),
      now = new Date(),
      year = new Date(now.getFullYear(), now.getMonth(), now.getDay()),
      key = Math.round(now.getTime() / 1000) % (3600 * 24 * 30),
      err = false;
    err = fs.writeFileSync('./build', process.env.BUILD_ID || 'beta-'.concat(key.toString(16)));
    if (err) {
      throw "Cannot write Build file: ".concat(err);
    }
    return gulp.src('./build');
  });

  // Generate projet files
  gulp.task('default', ['theme', 'fingerprint']);

  // Watch files
  gulp.task('watch', function () {
    gulp.watch(themejs.concat('/*.js'), ['theme.js', 'fingerprint']);
    gulp.watch(themecss.concat('/*.less'), ['theme.css', 'fingerprint']);
  });
  
  gulp.task('test', function () {
    return gulp.src(['test/*.js'])
      .pipe(dalek({
        browser: ['phantomjs'/*, 'chrome', 'chrome:canary'*/],
        reporter: ['html', 'junit']
      }));
  });
  
};
build();
