var gulp = require('gulp');
var postcss = require('gulp-postcss');
var sourcemaps = require('gulp-sourcemaps');
var cssnext = require('postcss-cssnext');
var precss = require('precss');
var cssnano = require('cssnano');
var partialImport = require('postcss-partial-import');

gulp.task('css', function () {
  var processors = [
    partialImport,
    cssnext({
      warnForDuplicates: false
    }),
    precss,
    cssnano
  ];

  return gulp.src('./css/style.css')
    .pipe( sourcemaps.init() )
    .pipe( postcss(processors) )
    .pipe( sourcemaps.write('.') )
    .pipe( gulp.dest('./build/') );
});

gulp.task('watch', function () {
  gulp.watch(['./css/*.css', './css/**/*.css'], ['css']);
});