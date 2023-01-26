let n = 0;
let windowHeight = $(window).height() + 20;
let image1 = $(".img-1");
let image2 = $(".img-2");
let image3 = $(".img-3");
let image4 = $(".img-4");

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
$(".dropdown-li").on("click", function () {
  $("input.tempInput").remove();
  $(this).append(
    '<input type="hidden" name="cat" class="tempInput" value="' +
      ($(this).index() + 1) +
      '"/>'
  );
  console.log($(this).index());
  $(this).parent().parent().parent().children("#nameCat").text($(this).text());
  $(".search-input-categorie-dropdown").css("opacity", 0);
});
$("label.for-dropdown").on("click", function () {
  if ($(".search-input-categorie-dropdown").css("opacity") == 0) {
    $(".search-input-categorie-dropdown").css("opacity", 1);
  }
  if ($(".search-input-categorie-dropdown").css("opacity") == 1) {
    $(".search-input-categorie-dropdown").css("opacity", 0);
  }
});

var txt2 = $("<p></p>").text("Please fill the input");
$("#sign-up input").blur(function () {
  if (!$.trim(this.value).length) {
    // zero-length string AFTER a trim
    $(this).parent().children("p").css("display", "block");
  } else {
    $(this).parent().children("p").css("display", "none");
  }
});

$(".sign-up-btn").on("click", function () {
  let check = true;
  $("input").each(function (param) {
    if (!$.trim(this.value).length) {
      // zero-length string AFTER a trim
      $(this).parent().children("p").css("display", "block");
      check = false;
    } else {
      $(this).parent().children("p").css("display", "none");
    }
  });
  console.log(check);
  if (!check) {
    $(this).attr("type", "button");
  } else {
    $(this).attr("type", "submit");
  }
});
