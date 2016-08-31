var gulp = require('gulp');
var sass = require('gulp-sass');
var watch = require('gulp-watch');

gulp.task('sass', function(){
	return gulp.src('scss/style.scss')
		.pipe(sass())
		.pipe(gulp.dest(''))
});

// Watch Files For Changes
gulp.task('watch', function() {
    gulp.watch('scss/*.scss', ['sass']);
});

gulp.task('default',['watch']);

