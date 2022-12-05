let overlayDark = document.querySelector(".overlay-dark");
let loginForm = document.querySelector(".login");

let btnConnect = document.querySelector(".btn-connect");

btnConnect.addEventListener("click", function () {
  console.log("click");
  overlayDark.classList.add("active");
  loginForm.classList.add("active");
});

overlayDark.addEventListener("click", function () {
  console.log("click");
  overlayDark.classList.remove("active");
  loginForm.classList.remove("active");
});
