jQuery(document).ready(function()
{
    $('.slider').glide({
        autoplay: 3500,
        hoverpause: false,	//set to false for nonstop rotate
        arrowRightText: '&rarr;',
        arrowLeftText: '&larr;'
    });
});