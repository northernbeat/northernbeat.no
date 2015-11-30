module.exports = function(gulp, plugins)
{

    var opts = { follow: true };
    
    return function()
    {
        gulp.src("src/templates/**/*")
            .pipe(gulp.dest("build/NorthernBeat3"));

        gulp.src(["src/lib/**/*", "!src/lib/functions.php"])
            .pipe(gulp.dest("build/NorthernBeat3/lib"));

        gulp.src("src/lib/functions.php")
            .pipe(gulp.dest("build/NorthernBeat3"));

        gulp.src("src/views/**/*", opts)
            .pipe(gulp.dest("build/NorthernBeat3/views", opts));

        gulp.src("vendor/**/*")
            .pipe(gulp.dest("build/NorthernBeat3/vendor"));

        gulp.src("src/assets/**/*")
            .pipe(gulp.dest("build/NorthernBeat3"));

        gulp.src("node_modules/jquery/dist/jquery.min.js")
            .pipe(gulp.dest("build/NorthernBeat3/js"));

        gulp.src("/Users/eirik.refsdal/github/other/bootstrap/dist/js/bootstrap.min.js")
            .pipe(gulp.dest("build/NorthernBeat3/js"));
    };
};
