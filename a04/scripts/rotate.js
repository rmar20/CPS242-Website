//rotate.js
//Handles the image rotation seen on the website's home page

var today = new Date();
var prefix = "images/";

//Use that prefix to put the proper sequence of image filenames into an array
var imageArray = new Array(8);
for (i=0; i<imageArray.length; i++)
    imageArray[i] = prefix + (i+3) + ".jpg";
console.log(imageArray);

//Perform a "cicular rotation" of the images in the array
var imageCounter = 0;
function rotate()
{
    var imageObject = document.getElementById('placeholder');
    imageObject.src = imageArray[imageCounter];
    ++imageCounter;
    if (imageCounter == 8) imageCounter = 0;
}

//Called as soon as home page has loaded, to start image rotation
function startRotation()
{
	console.log('rotation started');
    document.getElementById('placeholder').src=imageArray[5];
    setInterval('rotate()', 5000);
}

