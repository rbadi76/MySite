// Gulp.js configuration
var 
    // modules
    gulp = require('gulp'),
    sass = require('gulp-sass'),
    sourcemaps = require('gulp-sourcemaps'),

    // development mode
    devBuild = (process.env.NODE_ENV !== 'production'),

    // folders
    folder = {
        src: 'src/',
        build: '../htdocs/wp-content/themes/amora-child/'
    }
;

gulp.task('sass', function(){
    return gulp.src(folder.src + 'sass/**/*.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest(folder.build));
});

gulp.task('watch', function(){
    gulp.watch(folder.src + 'sass/**/*.scss', gulp.series('sass'));
});

gulp.task('default', gulp.series('sass', 'watch'));