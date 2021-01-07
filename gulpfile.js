var gulp = require('gulp'),
rename = require('gulp-rename'),
phpipe = require('gulp-phpipe');

var browserSync = require('browser-sync').create();
var sass = require('gulp-sass');
var autoPrefixer = require('gulp-autoprefixer');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var rename = require('gulp-rename');
var runSequence = require('run-sequence');


gulp.task('browserSync', function() {
  browserSync.init({
    proxy: 'localhost/pets', /* change path here if root wp directory has a different name */
    open: 'external'
  });
});

gulp.task('sass', function() {
  return gulp.src('assets/scss/**/*.scss')
  .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
  .pipe(autoPrefixer({
    browsers: ['> 1%', 'last 2 versions']
  }))
  .pipe(rename({suffix: '.min'}))
  .pipe(gulp.dest('dist/css'))
  .pipe(browserSync.stream());
});


gulp.task('js', function() {
  return gulp.src('assets/js/**/[^_]*.js')
  .pipe(uglify()).on('error', function(e){console.log(e);})
  .pipe(rename({suffix: '.min'}))
  .pipe(gulp.dest('dist/js'));
});





gulp.task('default', ['browserSync', 'sass', 'js'], function() {
  gulp.watch('assets/scss/**/*.scss', ['sass']);
  
  gulp.watch('assets/js/**/*.js', function() {
    runSequence('js', browserSync.reload);
  });
});
