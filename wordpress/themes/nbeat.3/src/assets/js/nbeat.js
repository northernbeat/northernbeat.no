$(document).ready(function() {

    handleHamburgerEvents();
    setCaseColors();
    // showContentDebug();
    // drawLogo();



    function handleHamburgerEvents()
    {
        $(".no-nbeat-hamburger").on("click", function() {
            var toggle = $(this).attr("data-toggle");

            if (typeof toggle !== typeof undefined && toggle !== false) {
                $(this).toggleClass("is-active");
                $("#" + toggle).toggleClass("is-active");
            } else {
                console.log("The no-nbeat-hamburger item you clicked on does not have an attached data-toggle attribute, so unable to continue.");
            }
        });
    }



    function setCaseColors()
    {
        $(".no-nbeat-bg-attrs").each(function() {
            $(this).css("background-color", $(this).attr("data-bg"));
            $(this).css("color", $(this).attr("data-fg"));
        });

        $(".no-nbeat-fg-attrs").each(function() {
            $(this).css("color", $(this).attr("data-fg"));
        });
    }

    

    function showContentDebug()
    {
        var colors = ["#EBF7F8", "#D0E0EB", "#88ABC2", "#49708A"];

        $(".content-section").each(function() {
            var color = colors[Math.floor(Math.random() * colors.length)];
            $(this).css("background", color + " url(\"/wp-content/themes/NorthernBeat3/img/diagonal.png\") repeat");
        });
    }


    
    function drawLogo()
    {
        var c = document.getElementById("logo");
        var len = 0.03 * Math.PI;
        var space = 0.014 * Math.PI;
        var start = Math.PI - space;
        var num = 11;
        var old = start;
        var width = 12;
        var style = "red";

        for (var i = 0; i <= num; ++i) {
            var ctx = c.getContext("2d");
            var start = old + space;
            var end = start + len;
            old = end;
            
            ctx.beginPath();
            ctx.arc(73, 75, 69, start, end);
            ctx.lineWidth = width;
            ctx.strokeStyle = style;
            ctx.stroke();
        }
    }

});
