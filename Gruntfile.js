module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    wintersmith: {
      config: "./config.json"
    }
  });

  grunt.registerTask('wintersmith', 'Wintersmith build task', function() {
    done();
    /*
    grunt.config.requires('wintersmith.config');
    var done = this.async();
    var wintersmith = require('wintersmith');
    var gen = wintersmith(grunt.config('wintersmith.config'));
    gen.build(function(err) {
      if(err) { 
        grunt.log.error("Wintersmith Step: error: "+err);
        done(false);
      }
      grunt.log.writeln('Wintersmith Step: done!');
      done();
    });
    /**/
  });

  // Default task(s).
  grunt.registerTask('build', ['wintersmith']);
  grunt.registerTask('default', ['build']);

};