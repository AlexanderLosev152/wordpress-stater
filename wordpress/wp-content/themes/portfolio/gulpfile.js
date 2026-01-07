import gulp from 'gulp';
import dartSass from 'sass';
import gulpSass from 'gulp-sass';
import postcss from 'gulp-postcss';
import autoprefixer from 'autoprefixer';
import cssnano from 'cssnano';
import sourcemaps from 'gulp-sourcemaps';
import rename from 'gulp-rename';
import browserSyncPkg from 'browser-sync';

const { src, dest, watch, series } = gulp;
const browserSync = browserSyncPkg.create();
const sass = gulpSass(dartSass);

const paths = {
	scss: 'src/scss/style.scss',
	scssWatch: 'src/scss/**/*.scss',
	cssDest: 'assets/css'
};

export function styles() {
	return src(paths.scss)
		.pipe(sourcemaps.init())
		.pipe(sass.sync().on('error', sass.logError))
		.pipe(postcss([autoprefixer(), cssnano()]))
		.pipe(rename({ suffix: '.min' }))
		.pipe(sourcemaps.write('.'))
		.pipe(dest(paths.cssDest))
		.pipe(browserSync.stream());
}

export function serve() {
	browserSync.init({
		proxy: 'http://localhost:8000/', // URL WordPress сайта
		notify: false,
		open: false
	});

	watch(paths.scssWatch, styles);
	watch('**/*.php').on('change', browserSync.reload);
}

export default series(styles, serve);
export const build = styles;
