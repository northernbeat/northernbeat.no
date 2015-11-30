$(document).ready(function() {

    var footer = $("#footer");
    var prevLocation;
    
    handleHamburgerEvents();
    setCaseColors();
    // showContentDebug();
    // drawLogo();
    initFooter();
    handleScroll();
    initEmployeeModal();

    

    function handleHamburgerEvents()
    {
        $(".no-nbeat-hamburger").on("click", function() {
            var toggle = $(this).attr("data-toggle");

            if (typeof toggle !== typeof undefined && toggle !== false) {
                $(this).toggleClass("is-active");
                $("#" + toggle).toggleClass("is-active");
                changeLogoColors();
            } else {
                console.log("The no-nbeat-hamburger item you clicked on does not have an attached data-toggle attribute, so unable to continue.");
            }
        });
    }



    function changeLogoColors()
    {
        var header = $("#header");
        var logo   = $("#toplogo");
        var img    = $("#svglogo");
        var blue   = "/wp-content/themes/NorthernBeat3/img/logo.svg";
        var white  = "/wp-content/themes/NorthernBeat3/img/logo-white.svg";
        
        if (logo.hasClass("logo-white")) {
            // console.log("har hvit logo, ingenting å gjøre");
            return;
        }

        if (header.hasClass("is-active")) {
            // -var svg = $("#svglogo").svg("get");
            // $($('#sirkel').val(), svg.root()).attr('fill', "#ffffff");
            // $("#svglogo").children().css('fill', '#ffffff');
            $("#svglogo").attr("src", white);
        } else {
            $("#svglogo").attr("src", blue);
        }
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



    function handleScroll()
    {
        var didScroll = false;
 
        $(window).scroll(function() {
            didScroll = true;
        });
 
        setInterval(function() {
            if (didScroll) {
                didScroll = false;

                setFooterOpacity();
            }
        }, 250);
    }



    function initFooter()
    {
        var dh = $(document).height();
        var wh = $(window).height();
        var fh = footer.height();

        if (wh >= dh - fh) {
            footer.fadeIn(0);
        }
    }


    function setFooterOpacity()
    {
        if ($(window).scrollTop() + $(window).height() > (getDocHeight() - 500)) {
            footer.fadeIn(0);
        } else {
            footer.fadeOut(0);
        }
    }

    
    function getDocHeight() {
        var D = document;
        return Math.max(
            D.body.scrollHeight, D.documentElement.scrollHeight,
            D.body.offsetHeight, D.documentElement.offsetHeight,
            D.body.clientHeight, D.documentElement.clientHeight
        );
    }



    function initEmployeeModal()
    {
        var el;
        var slug;
        
        $("#empModal").on("show.bs.modal", function(e) {
            if ($("#modal-autoopen").length) {
                slug = $("#modal-autoopen").data("slug");
                $("#modal-autoopen").remove();
            } else {
                el   = $(e.relatedTarget);
                slug = el.data("slug");
            }

            populateEmpModal(slug);
            prevLocation = window.location.pathname;
            window.history.pushState({}, "", "/menneskene/" + slug + "/");
        });
        
        $("#empModal").on("hide.bs.modal", function(e) {
            if ("/menneskene/" + slug + "/" == prevLocation) {
                window.history.pushState({}, "Menneskene", "/menneskene/");
            } else {
                window.history.pushState({}, "", prevLocation);
            }
        });

        if ($("#modal-autoopen").length) {
            $("#empModal").modal("show");
        }
    }


    
    function populateEmpModal(slug)
    {
        var id    = "modal-" + slug;
        var img   = $("#" + id + " .photo img").first().attr("src");
        var name  = $("#" + id + " .name").first().html();
        var role  = $("#" + id + " .role").first().text();
        var phone = $("#" + id + " .phone").first().text();
        var email = $("#" + id + " .email").first().text();
        var desc  = $("#" + id + " .text").first().text();

        $("#empModal .name").html(name);
        $("#empModal .role").text(role);
        $("#empModal .phone").text(phone);
        $("#empModal .email a").text(email);
        $("#empModal .email a").attr("href", "mailto:" + email);
        $("#empModal .photo img").attr("src", img);
        $("#empModal .text").text(desc);
    }


});
