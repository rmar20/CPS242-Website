//rotate.js
//Handles the image rotation seen on the website's home page

var today = new Date();
var prefix = "images/";

//Use that prefix to put the proper sequence of image filenames into an array
var imageArray = new Array(2);
for (i=1; i<imageArray.length+1; i++)
    imageArray[i-1] = prefix + i + ".png";
console.log(imageArray);

//Perform a "cicular rotation" of the images in the array
var imageCounter = 0;
function rotate()
{
    var imageObject = document.getElementById('placeholder');
    imageObject.src = imageArray[imageCounter];
    ++imageCounter;
    if (imageCounter == 2) imageCounter = 0;
}

//Called as soon as home page has loaded, to start image rotation
function startRotation()
{
	console.log('rotation started');
    document.getElementById('placeholder').src=imageArray[5];
    setInterval('rotate()', 5000);
}

