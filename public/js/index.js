document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("menu").addEventListener("click", function () {
    var links = document.getElementById("links");
    links.classList.toggle("hidden");
  });
});

let slideIndex = 0;

function showSlides() {
  const slides = document.querySelectorAll(".slides .slidee");
  if (slideIndex >= slides.length) {
    slideIndex = 0;
  }
  if (slideIndex < 0) {
    slideIndex = slides.length - 1;
  }

  for (let i = 0; i < slides.length; i++) {
    slides[i].classList.add("hidden");
    slides[i].classList.add("translate");
  }
  slides[slideIndex].classList.remove("hidden");
}

function moveSlide(n) {
  slideIndex += n;
  showSlides();
}

try {
    showSlides();

} catch (error) {

}
// function to increase scroll bar on click
// const scrollbar = document.querySelector(".scrollbar");
// console.log(scrollbar);
// scrollbar.addEventListener("click", () => {
//   if (scrollbar.scrollLeft === 0) {
//     return;
//   } else {
//     scrollbar.scrollLeft -= 100;
//   }
//   if (scrollbar.scrollLeft === scrollbar.scrollWidth - scrollbar.clientWidth) {
//     return;
//   } else {
//     scrollbar.scrollLeft += 100;
//   }
// });

// document.querySelector(".prev").addEventListener("click", () => {
//   scrollbar.scrollLeft -= 100;
// });
// document.querySelector(".next").addEventListener("click", () => {
//   console.log('enter');
//   scrollbar.scrollLeft += 100;
// });
function increaseScrollbar() {
  const scrollbar = document.querySelector(".scrollbar");
  scrollbar.scrollLeft -= 315;
}
function decreaseScrollbar() {
  const scrollbar = document.querySelector(".scrollbar");
  scrollbar.scrollLeft += 315;
}




