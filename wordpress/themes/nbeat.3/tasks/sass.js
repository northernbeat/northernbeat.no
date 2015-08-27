module.exports = function(gulp, plugins)
{
    var es       = require("event-stream");
    var header   = plugins.wpstylecss();
    var sassOpts = { includePaths: ["./node_modules",
                                    "/Users/eirik.refsdal/github/other/bootstrap/scss"
                                    // "./node_modules/bootstrap-sass/assets/stylesheets",
                                    // "./node_modules/compass-mixins/lib"
                                   ]
                   };
    var css      = gulp.src("src/sass/nbeat.scss")
                       .pipe(plugins.sass(sassOpts));
    
    return function()
    {
        console.log("sass");
        return es.merge(header, css)
            .pipe(plugins.concat("style.css"))
            .pipe(gulp.dest("build/NorthernBeat3"));
    };
};
