let n = 0;
let windowHeight = $(window).height() + 20;
let image1 = $(".img-1");
let image2 = $(".img-2");
let image3 = $(".img-3");
let image4 = $(".img-4");
$(document).scroll(function () {
  var imagePos = $(document).scrollTop();
  console.log("imagePos=" + imagePos);
  // if (imagePos > 0) {
  //   image1.animate({ left: -600 + "px" }, 100, "linear");
  //   image2.animate({ right: -600 + "px" }, 100, "linear");
  //   image4.animate({ right: -600 + "px" }, 100, "linear");
  //   image3.animate({ bottom: 2000 + "px" }, 100, "linear");
  // }
  // if (imagePos == 0) {
  //   image1.animate({ left: 0 + "px" }, 100, "linear");
  //   image2.animate({ right: 0 + "px" }, 100, "linear");
  //   image4.animate({ right: 100 + "px" }, 100, "linear");
  //   image3.animate({ bottom: 0 + "px" }, 100, "linear");
  // }
});
$(document).ready(function () {
  if ($("main").children().attr("class") == "main-page") {
    console.log("haha");
    $(document).bind("mousewheel DOMMouseScroll", function (event) {
      if (
        event.originalEvent.wheelDelta > 0 ||
        event.originalEvent.detail < 0
      ) {
        $("header").animate({ top: 0 + "px" }, 100, "linear");
        $("html").animate({ scrollTop: n - windowHeight }, 100, "linear");
        console.log("n-=" + n);
        n -= windowHeight;
      } else {
        // scroll down
        $("header").animate({ top: -100 + "px" }, 100, "linear");
        $("html").animate({ scrollTop: n + windowHeight }, 100, "linear");
        console.log("n+=" + n);
        if (n < 1500) {
          n += windowHeight;
        }
      }
      if (n < 0) {
        n = 0;
      }
      if (n == 0) {
        setTimeout(() => {
          image1.animate({ left: 0 + "px" }, 100, "linear");
          image2.animate({ right: 0 + "px" }, 100, "linear");
          image4.animate({ right: 100 + "px" }, 100, "linear");
          image3.animate({ bottom: 0 + "px" }, 100, "linear");
        }, "100");
      }
      if (n != 0) {
        image1.animate({ left: -600 + "px" }, 100, "linear");
        image2.animate({ right: -600 + "px" }, 100, "linear");
        image4.animate({ right: -600 + "px" }, 100, "linear");
        image3.animate({ bottom: 2000 + "px" }, 100, "linear");
      }
    });
  }
});
$("#preferee-button-open").on("click", function () {
  $(".preferee-wd-left").animate({ left: -50 + "%" }, 300, "linear");
  $(".preferee-wd-right").animate({ right: -50 + "%" }, 300, "linear");
  $(".preferee-text-button-window").animate(
    { opacity: 0 },
    200,
    "linear",
    function () {
      $(".preferee-window").css("display", "none");
    }
  );
});
$("#connu-button-open").on("click", function () {
  $(".connu-wd-left").animate({ left: -50 + "%" }, 300, "linear");
  $(".connu-wd-right").animate({ right: -50 + "%" }, 300, "linear");
  $(".connu-text-button-window").animate(
    { opacity: 0 },
    200,
    "linear",
    function () {
      $(".connu-window").css("display", "none");
    }
  );
});
$("#decouvrir-btn").on("click", function () {
  $("html").animate({ scrollTop: n + windowHeight }, 100, "linear");
  $("header").animate({ top: -100 + "px" }, 100, "linear");
  n += windowHeight;
});
$("#dropdown-li").on("click", function () {
  $(this).append(
    '<input type="hidden" name="cat" value="' + $(this).attr("class") + '"/>'
  );
  console.log($(this).attr("class"));
  $(this).parent().parent().parent().children("#nameCat").text($(this).text());
  event.preventDefault();
});
