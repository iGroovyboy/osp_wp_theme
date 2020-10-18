const gulp          = require('gulp'),
    del             = require('del'),
    browserSync     = require("browser-sync"),
    imageminJR      = require('imagemin-jpeg-recompress'),
    pngquant        = require('imagemin-pngquant'),
    reload          = browserSync.reload,
    gulpLoadPlugins = require('gulp-load-plugins'),
    plugins         = gulpLoadPlugins();

const path = {
    dist: {
        html:       'dist/',
        error:      'dist/error/',
        js:         'dist/js/',
        css:        'dist/css/',
        img:        'dist/img/',
        fonts:      'dist/css/fonts/',
        locale:     'dist/locale/',
        portfolio:  'dist/portfolio/'
    },
    theme: {
        js:         '../js/',
        css:        '../css/',
        img:        '../img/',
        fonts:      '../css/fonts/',
    },
    src: {
        homefolder: 'src/',
        home:       ['src/*.*', '!src/[_]*.*', '!src/*.pug'],
        html:       ['src/*.html', '!src/[_]*.html'],
        error:      ['src/error/*.pug', '!src/error/[_]*.pug'],
        php:        ['src/*.php', '!src/[_]*.php'],
        pug:        'src/index.pug',
        js:         'src/js/main.js',
        jslibs:     'src/js/libs/',
        css:        ['src/css/**/*.css', '!src/[_]*.css'],
        style:      ['src/styl/style.styl', '!src/[_]*.styl'],
        img:        'src/img/**/*.*',
        jpeg:       'src/img/**/*.jpg',
        svg:        'src/img/**/*.svg',
        fonts:      'src/fonts/**/*.*',
        locale:     'src/locale/**/*',
        favicons:   'src/favicons/**/*.*', 
    },
    watch: {
        html:   'src/**/*.html',
        pug:    'src/**/*.pug',
        js:     'src/js/**/*.js',
        css:    'src/css/**/*.css',
        style:  'src/styl/**/*.styl',
        img:    'src/img/**/*.*',
        fonts:  'src/fonts/**/*.*',
        php:    'src/*.php'
    },
    clean: './dist'
};

const config = {
    // server: {
    //    baseDir: "./dist"
    // },
    proxy: "osp.pp.ua",
    tunnel: false,
    // browser: "chrome",
    reloadOnRestart: false,
    notify: false,
    host: 'localhost',
    port: 3000,
    logPrefix: "Groovyboy"
};

gulp.task('webserver', () => {
    return browserSync(config);
});

gulp.task('cleanup:dist', (cb) => {
    return del([path.clean]);
});

gulp.task('pug:build', () => {
    return gulp.src(path.src.pug)
        .pipe(plugins.plumber())
        .pipe(plugins.pug({
            pretty: true
        }))
        // .pipe(plugins.rename({
        //     extname: '.php'
        // }))
        .pipe(gulp.dest(path.dist.html))
        .pipe(reload({stream: true}));
});

gulp.task('pug_error:build', () => {
    return gulp.src(path.src.error)
        .pipe(plugins.plumber())
        .pipe(plugins.pug({
            pretty: true
        }))
        //.pipe(plugins.rename({
        //    extname: '.php'
        //}))
        .pipe(gulp.dest(path.dist.error))
        .pipe(reload({stream: true}));
});

gulp.task('html:build', () => {
    return gulp.src(path.src.html) 
        .pipe(gulp.dest(path.dist.html))
        .pipe(reload({stream: true}));
});

gulp.task('scripts', () => {
    return gulp.src([
        //path.src.jslibs + 'jquery.mousewheel.min.js',
        // path.src.jslibs + 'jquery.mCustomScrollbar.concat.min.js',
        // path.src.jslibs + 'jquery.fancybox.min.js',
        // path.src.jslibs + 'typeit.min.js',
        // path.src.jslibs + 'jquery.fullpage.min.js',
        // path.src.jslibs + 'offreg.min.js',
        path.src.jslibs + 'slick-1.8.1/slick/slick.min.js',
        ])
    .pipe(plugins.concat('libs.min.js'))
    //.pipe(plugins.uglify({
    //    compress: {
    //        keep_fnames: true
    //    }
    //}))
    .pipe(gulp.dest(path.theme.js))
    .pipe(gulp.dest(path.dist.js));
});

gulp.task('customfilehandling', () => {
    //gulp.src(path.src.home)
    //    .pipe(gulp.dest(path.dist.html));

    //gulp.src(path.src.homefolder+'.htaccess')
    //    .pipe(gulp.dest(path.dist.html));

    // gulp.src(path.src.locale)
    //     .pipe(gulp.dest(path.dist.locale));

    // gulp.src(path.src.portfolio)
    //     .pipe(gulp.dest(path.dist.portfolio));

    return gulp.src([
        path.src.jslibs+'html5shiv/dist/html5shiv.min.js',
        path.src.jslibs+'jquery/dist/jquery.min.js'
        ])
        .pipe(gulp.dest(path.theme.js))
        .pipe(gulp.dest(path.dist.js));
});

gulp.task('customfilehandling:php', () => {
    return gulp.src(path.src.php)
        .pipe(gulp.dest(path.dist.html));
});

gulp.task('customfilehandling:favicons', () => {
    return gulp.src(path.src.favicons)
        .pipe(gulp.dest(path.dist.html));
});

gulp.task('js:build', () => {
    return gulp.src(path.src.js) 
        .pipe(plugins.plumber())
        // .pipe(plugins.sourcemaps.init()) 
        // .pipe(plugins.uglify())
        // .pipe(plugins.rename({suffix: '.min'}))
        .pipe(plugins.sourcemaps.write()) 
        .pipe(gulp.dest(path.theme.js))
        .pipe(gulp.dest(path.dist.js))
        .pipe(reload({stream: true}));
});

gulp.task('style:build', () => {
    return gulp.src(path.src.style) 
        .pipe(plugins.plumber())
        //.pipe(plugins.sourcemaps.init())
        .pipe(plugins.stylus(({
                'include css': true,
                compress: false
            })))
        .pipe(plugins.autoprefixer(['last 15 versions', '> 1%', 'ie 8', 'ie 7'],{cascade: true}))      
        //.pipe(plugins.sourcemaps.write())
        .pipe(gulp.dest(path.theme.css))
        .pipe(gulp.dest(path.dist.css))
        .pipe(reload({stream: true}));
});

gulp.task('minify:csslibs', () => {
    return gulp.src(path.src.css)
    .pipe(plugins.plumber())
    .pipe(plugins.sourcemaps.init())
        .pipe(plugins.concat('styles.min.css'))
        .pipe(plugins.cleanCss({compatibility: 'ie8'}))
    .pipe(plugins.sourcemaps.write()) 
    //.pipe(plugins.rename({suffix: '.min'}))
    .pipe(gulp.dest(path.theme.css))
    .pipe(gulp.dest(path.dist.css));
});

gulp.task('resize:portfolioimages', () => {
    return gulp.src(path.src.portfolio)
        .pipe(imageResize({
            height: 200,
            format: 'jpeg',
            filter: 'Catrom',
            quality: 0.3,
            crop: true
        }))
        .pipe(rename(function (path) {
            path.basename += '-thumb'
        }))

    .pipe(gulp.dest(path.src.portfolio))
});

gulp.task('imageJR:build', () => {
    return gulp.src(path.src.jpeg)
        .pipe(plugins.imagemin({
            use: [imageminJR({
                accurate: true,
                min: 50,
                max: 90,
                method: 'smallfry',
                quality:'high'
            })]
        }))
        .pipe(gulp.dest(path.theme.img))
        .pipe(gulp.dest(path.dist.img))
        .pipe(reload({stream: true}));
});

gulp.task('image:build', () => {
    return gulp.src(path.src.img) 
        .pipe(plugins.imagemin({
            progressive: true,
            svgoPlugins: [{removeViewBox: false}],
            use: [pngquant()],
            interlaced: true
        }))
        .pipe(gulp.dest(path.theme.img))
        .pipe(gulp.dest(path.dist.img))
        .pipe(reload({stream: true}));
});

gulp.task('fonts:build', () => {
    return gulp.src(path.src.fonts)
        .pipe(gulp.dest(path.theme.fonts))
        .pipe(gulp.dest(path.dist.fonts))
});

// gulp.task('build', [
//     'cleanup:dist',
//     'customfilehandling',
//     'customfilehandling:favicons',
//     'pug:build',
//     'pug_error:build',
//     //'html:build',
//     'js:build',
//     //'minify:csslibs',
//     'style:build',
//     'fonts:build',
//     'image:build',
//     'imageJR:build'
// ]);

gulp.task('build', gulp.series(    
    'cleanup:dist',
    'customfilehandling',
    'customfilehandling:favicons',
    // 'pug:build',
    // 'pug_error:build',
    'html:build',
    'scripts',
    'js:build',
    //'minify:csslibs',
    'style:build',
    'fonts:build',
    'image:build',
    'imageJR:build'
));

gulp.task('watch', () => {
    gulp.watch([path.watch.php], gulp.parallel('customfilehandling:php'));

    // gulp.watch([path.watch.pug], gulp.parallel('pug:build','pug_error:build'));

    gulp.watch([path.watch.html], gulp.parallel('html:build'));

    gulp.watch([path.watch.style], gulp.parallel('style:build'));
    
    gulp.watch([path.watch.js], gulp.parallel('js:build'));

    gulp.watch([path.watch.img], gulp.parallel('image:build','imageJR:build'));

    gulp.watch([path.watch.fonts], gulp.parallel('fonts:build'));
});

gulp.task('default', gulp.parallel('build', 'webserver', 'watch'));