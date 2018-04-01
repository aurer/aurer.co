const gulp = require('gulp');
const sass = require('gulp-sass');
const sync = require('browser-sync');

gulp.task('sass', () => {
	return gulp.src('src/scss/main.scss')
		.pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
		.pipe(gulp.dest('assets/css'))
		.pipe(sync.stream());
})

gulp.task('serve', () => {
	sync.init({
    proxy: "http://aurer.test"
  });

	gulp.watch('src/scss/main.scss', ['sass'])
})

gulp.task('default', ['sass']);

gulp.task('dev', ['default', 'serve']);
