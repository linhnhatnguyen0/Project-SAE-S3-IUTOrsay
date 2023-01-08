$(document).scroll(function () {
  var image1 = $(".img-1");
  var image2 = $(".img-2");
  var image3 = $(".img-3");
  var image4 = $(".img-4");
  var imagePos = 0 - $(document).scrollTop();
  console.log(imagePos);
  if (imagePos < 0) {
    image1.animate({ left: imagePos + "px" }, 10, "linear");
    image2.animate({ right: imagePos + "px" }, 10, "linear");
    image4.animate({ right: imagePos + "px" }, 10, "linear");
    image3.animate({ bottom: -1 * imagePos + "px" }, 10, "linear");
  }
});
