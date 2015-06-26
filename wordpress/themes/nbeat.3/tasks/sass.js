module.exports = function(gulp, plugins)
{
    var es       = require("event-stream");
    var header   = plugins.wpstylecss();
    var sassOpts = { includePaths: ["./node_modules",
                                    "./node_modules/compass-mixins/lib"]
                   };
    var css      = gulp.src("src/sass/nbeat.scss")
                       .pipe(plugins.sass(sassOpts));
    
    return function()
    {
        return es.merge(header, css)
            .pipe(plugins.concat("style.css"))
            .pipe(gulp.dest("build/NorthernBeat3"));
    };
};
