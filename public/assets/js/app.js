/**
 * Sidebar menu button
 */
$("#menu-toggle").click(function (e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});

/**
 * Code highlight
 */
var pres = document.querySelectorAll("pre>code");
for (var i = 0; i < pres.length; i++) {
    hljs.highlightBlock(pres[i]);
}

// add HighlightJS-badge (options are optional)
var options = { // optional
    contentSelector: "body",
    copyIconClass: "fa fa-copy px-1 theme-clipboard",
    checkIconClass: "fa fa-check px-1 theme-clipboard",
};
window.highlightJsBadge(options);

/**
 * Set anchor when scroll
 */
$(document).on('scroll', function (e) {
    $('#content > h1, h2, h3, h4, h5, h6').each(function () {
        if ($(this).offset().top < window.pageYOffset + 10 &&
            $(this).offset().top +
            $(this).height() > window.pageYOffset + 10
        ) {
            setTimeout(() => {
                window.location.hash = $(this).attr('id');
            });
        }
    });
});

/**
 * Darkmode
 */
$("#darkmode").click(function () {
    console.log('asdasd');
    $.get("/darkmode", () => document.location.reload());  
    
});