module.exports = function(gulp, plugins)
{
    var opts = {
        "bin": "./bin/composer"
    };
    
    return function()
    {
        plugins.composer(opts);
    };
};
