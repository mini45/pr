var gulp = require('gulp'),
    sass = require('gulp-sass'),
    rename = require('gulp-rename'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify');

gulp.task('style', function () {
    return gulp.src([
        'resources/assets/sass/app.scss',
        //'vendor/bower_components/datatables/media/css/jquery.dataTables.css',
        'public/packages/**/*.css'
    ])
        .pipe(concat('app.scss'))
        .pipe(sass({outputStyle: "compressed"}))
        .pipe(gulp.dest('public/css/'));
});

gulp.task('copy', function () {
    gulp.src([
        'vendor/bower_components/jquery/dist/jquery.min.js',
        'vendor/bower_components/jquery-ui/jquery-ui.min.js',
        'vendor/bower_components/sass-bootstrap/dist/js/bootstrap.min.js',
        'vendor/bower_components/datatables/media/js/jquery.dataTables.min.js',
        'vendor/bower_components/datatables/media/js/dataTables.bootstrap.min.js',
        'vendor/bower_components/ui-contextmenu/jquery.ui-contextmenu.min.js',
        'resources/assets/js/fullcalendar.js',
        //'resources/assets/js/lang-all.js'
    ])
        .pipe(gulp.dest('public/js/'));

    gulp.src([
        'vendor/bower_components/datatables/media/images/*',
        //'vendor/bower_components/jquery-ui/themes/smoothness/images/*',
        'resources/assets/images/*'
    ])
        .pipe(gulp.dest('public/images/'));


    gulp.src([
        'vendor/bower_components/datatables/media/css/dataTables.bootstrap.min.css',
        'resources/assets/css/jquery-ui.min.css',
        'resources/assets/css/fullcalendar.min.css'
    ])
        .pipe(gulp.dest('public/css/'));

    gulp.src([
        'vendor/bower_components/sass-bootstrap/fonts/**/*',
        'vendor/bower_components/components-font-awesome/fonts/**/*',
        'resources/assets/fonts/**/*'
    ])
        .pipe(gulp.dest('public/fonts/'));

    return gulp.src([
        'vendor/bower_components/datatables/media/css/jquery.dataTables.min.css'
    ])
        .pipe(gulp.dest('public/css/'));
});

gulp.task('script', function () {
    gulp.src([
        'resources/assets/js/_event.js'
    ])
        .pipe(concat('_event.js'))
        .pipe(uglify())
        .pipe(rename('event.min.js'))
        .pipe(gulp.dest('public/js/'));

    gulp.src([
        'resources/assets/js/_news.js'
    ])
        .pipe(concat('_news.js'))
        .pipe(uglify())
        .pipe(rename('news.min.js'))
        .pipe(gulp.dest('public/js/'));

    gulp.src([
        'resources/assets/js/moment.js'
    ])
        .pipe(concat('moment.js'))
        .pipe(uglify())
        .pipe(rename('moment.min.js'))
        .pipe(gulp.dest('public/js/'));


    return gulp.src([
        'resources/assets/js/app.js',
        //'resources/assets/js/_*.js',
        'public/packages/**/*.js'
    ])
        .pipe(concat('app.js'))
        .pipe(uglify())
        .pipe(rename('app.min.js'))
        .pipe(gulp.dest('public/js/'));
});

gulp.task('watch', function () {
    gulp.watch('resources/assets/sass/**/*.scss', ['style']);


    gulp.watch('resources/assets/js/**/*.js', ['script']);
    gulp.watch('public/packages/**/*.js', ['script']);
});

gulp.task('default', ['style', 'script', 'copy']);