const API_KEY = "pub_170686fa6f6355abbccf2dd8a335603c3b544";
const API_ENDPOINT = "https://newsdata.io/api/1/news";

// Define the parameters for the API request
let params = {
  apikey: API_KEY,
  language: "fr",
};

// Convert the parameters to a query string
const queryString = $.param(params);

// Make the API request
$.ajax({
  url: `${API_ENDPOINT}?${queryString}`,
  method: "GET",
  success: function (data) {
    // Convert the JSON data to HTML
    const articles = data.results;
    console.log(data);
    params.page = data.results.nextPage;
    const query = $.param(params);
    while (data.results.nextPage != null) {
      if (data.results.nextPage != null) {
        params;
        $.ajax({
          url: `${API_ENDPOINT}?${queryString}`,
          method: "GET",
          success: function (dataNext) {
            articles.push(dataNext.results);
          },
        });
      }
    }
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

const html = articles
  .map((article) => {
    return `
  <div class="article">
  <div class="article-img">
  <img src="${article.image_url}" alt="${article.title}" />
  </div>
  <div class="article-inf">
            <span class="article-author">By ${article.creator}</span>
            <span class="article-date">${article.pubDate}</span>
        </div>
        <h2><a href="${article.link}">${article.title}</a></h2>
        <p>${article.description}</p>
        <div class="lire-plus"><a href="${article.link}">Lire plus</a></div>
        </div>
        `;
  })
  .join("");
$("#news-container").html(html);
$("#news-container").append($page);
