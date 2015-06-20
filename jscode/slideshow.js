// slideshow.js
// Summer 2015
// CIS 425
// Vincent Nguyen

var imageCount = 1;
var total = 5;

function slide()
{
	var image = document.getElementsByClassName('img');
	imageCount = imageCount + x;

    if (imageCount > total) {
        imageCount = 1;
    }

    if (imageCount < 1) {
        imageCount = total;

    }
	image.src = "images/img" + imageCount + ".jpg";

}
