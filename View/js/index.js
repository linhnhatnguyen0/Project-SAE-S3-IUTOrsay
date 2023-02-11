const API_KEY = "b5a6403b25f84e069a38cb5ba05fd2fc";
const API_ENDPOINT = "https://newsapi.org/v2/top-headlines";

// Define the parameters for the API request
const params = {
  country: "fr",
  category: "business",
  apiKey: API_KEY,
};

// Convert the parameters to a query string
const queryString = new URLSearchParams(params).toString();

// Make the API request
fetch(`${API_ENDPOINT}?${queryString}`)
  .then((response) => response.json())
  .then((data) => {
    console.log(data);
    // Convert the JSON data to HTML
    const articles = data.articles;
    const html = articles
      .map((article) => {
        return `
        <div class="article">
          <h2><a href="${article.url}">${article.title}</a></h2>
          <p>${article.content}</p>
        </div>
      `;
      })
      .join("");
    document.querySelector("#news-container").innerHTML = html;
  })
  .catch((error) => {
    // Handle any errors
    console.error(error);
  });
