module.exports = function(gulp, plugins)
{
    return function()
    {
        gulp.src("src/templates/**/*")
            .pipe(gulp.dest("build/NorthernBeat3"));

        gulp.src(["src/lib/**/*", "!src/lib/functions.php"])
            .pipe(gulp.dest("build/NorthernBeat3/lib"));

        gulp.src("src/lib/functions.php")
            .pipe(gulp.dest("build/NorthernBeat3"));

        gulp.src("src/views/**/*")
            .pipe(gulp.dest("build/NorthernBeat3/views"));

        gulp.src("vendor/**/*")
            .pipe(gulp.dest("build/NorthernBeat3/vendor"));

        gulp.src("src/assets/**/*")
            .pipe(gulp.dest("build/NorthernBeat3"));
    };
};
