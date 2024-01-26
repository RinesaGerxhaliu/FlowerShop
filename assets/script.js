let slideIndex = 0;

function showSlide(index) {
  const slider = document.getElementById("slider");
  const slides = document.getElementsByClassName("slide");

  if (index >= slides.length) {
    slideIndex = 0;
  } else if (index < 0) {
    slideIndex = slides.length - 1;
  } else {
    slideIndex = index;
  }

  const translateValue = -slideIndex * 100 + "%";
  slider.style.transform = "translateX(" + translateValue + ")";
}

function prevSlide() {
  showSlide(slideIndex - 1);
}

function nextSlide() {
  showSlide(slideIndex + 1);
}

document.getElementById('mobile-menu').addEventListener('click', function() {
    document.querySelector('.listat').classList.toggle('show');
});
