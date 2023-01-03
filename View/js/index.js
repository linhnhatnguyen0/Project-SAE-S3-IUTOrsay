let overlayDark = document.querySelector(".overlay-dark");
let loginForm = document.querySelector(".login");
let signUpForm = document.querySelector(".sign-up");
let ind = document.querySelector("#indicator");
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
  signUpForm.classList.remove("active-sign-up");
});

ind.addEventListener("click", function () {
  console.log("click");
  signUpForm.classList.add("active-sign-up");
  loginForm.classList.remove("active");
});
