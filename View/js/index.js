const API_KEY = "b5a6403b25f84e069a38cb5ba05fd2fc";
const API_ENDPOINT = "https://newsapi.org/v2/top-headlines";

// Define the parameters for the API request
const params = {
  country: "fr",
  category: "business",
  pageSize: 21,
  apiKey: API_KEY,
};

// Convert the parameters to a query string
const queryString = $.param(params);

// Make the API request
$.ajax({
  url: `${API_ENDPOINT}?${queryString}`,
  method: "GET",
  success: function (data) {
    // Convert the JSON data to HTML
    const articles = data.articles;
    const html = articles
      .map((article) => {
        return `
        <div class="article">
        <div class="article-img">
            <img src="${article.urlToImage}" alt="${article.title}" />
        </div>
        <div class="article-inf">
            <span class="article-author">By ${article.author}</span>
            <span class="article-date">${article.publishedAt}</span>
        </div>
        <h2><a href="${article.url}">${article.title}</a></h2>
        <p>${article.description}</p>
        <div class="lire-plus"><a href="${article.url}">Lire plus</a></div>
        </div>
      `;
      })
      .join("");
    $("#news-container").html(html);

    var $items = $("#news-container").find(".article");
    var itemsPerPage = 3;
    var numPages = Math.ceil($items.length / itemsPerPage);

    for (var i = 0; i < numPages; i++) {
      var $page = $("<div>").addClass("page");

      for (var j = 0; j < itemsPerPage; j++) {
        var itemIndex = i * itemsPerPage + j;
        if (itemIndex >= $items.length) break;

        $page.append($items.eq(itemIndex));
      }

      $("#news-container").append($page);
    }

    var currentSlide = 0;
    var $slides = $(".page");

    function showSlide() {
      $slides.hide();
      $slides.eq(currentSlide).show();
    }

    function nextSlide() {
      currentSlide++;
      if (currentSlide >= $slides.length) {
        currentSlide = 0;
      }
      showSlide();
    }

    function prevSlide() {
      currentSlide--;
      if (currentSlide < 0) {
        currentSlide = $slides.length - 1;
      }
      showSlide();
    }
    $("#next").on("click", nextSlide);
    $("#prev").on("click", prevSlide);
    showSlide();
  },
  error: function (error) {
    // Handle any errors
    console.error(error);
  },
});
