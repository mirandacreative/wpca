var gulp = require('gulp');
var browserSync = require('browser-sync').create();
var uglify = require('gulp-uglify');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var sourcemaps = require('gulp-sourcemaps');
var pump = require('pump');
var rename = require('gulp-rename');

gulp.task('sass', function () {
	return gulp.src('./css/source/custom.scss')
	.pipe(sourcemaps.init())
	.pipe(sass({outputStyle: 'compact'}).on('error', sass.logError))
	.pipe(sourcemaps.write('../maps', {
		includeContent: false,
		sourceRoot: './css/source'
	}))
	.pipe(gulp.dest('./css/min'));
});

gulp.task('sass:watch', function () {
	gulp.watch('./css/source/**/*.scss', ['sass']);
});

gulp.task('compress', function (cb) {
	pump([
		gulp.src('./js/source/*.js'),
		uglify(),
		gulp.dest('./js/min')
	], cb);
});

gulp.task('compress:watch', function () {
	gulp.watch('./js/source/**/*.js', ['compress']);
});

// gulp.task('serve', ['compass'], function() {

// 	// browserSync.init({
// 	//     server: "./app"
// 	// });

// 	gulp.watch("source/*.scss", ['sass']);
// 	// gulp.watch("app/*.html").on('change', browserSync.reload);
// });

gulp.task('default', [ 'sass', 'sass:watch', 'compress', 'compress:watch' ]);