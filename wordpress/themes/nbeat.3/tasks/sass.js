module.exports = function(gulp, plugins)
{
    var es       = require("event-stream");
    var header   = plugins.wpstylecss();
    var sassOpts = { includePaths: ["./node_modules",
                                    "/Users/eirikref/github/other/bootstrap/scss"
                                    // "./node_modules/bootstrap-sass/assets/stylesheets",
                                    // "./node_modules/compass-mixins/lib"
                                   ]
                   };
    var css      = gulp.src("src/sass/nbeat.scss")
                   .pipe(plugins.sass(sassOpts))
                   .pipe(plugins.minifyCss());
    
    return function()
    {
        return es.merge(header, css)
            .pipe(plugins.concat("style.css"))
            .pipe(gulp.dest("build/NorthernBeat3"));
    };
};
