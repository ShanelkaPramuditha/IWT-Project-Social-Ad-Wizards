const sliderImages = document.querySelector('.slider-images');
const imageWidth = document.querySelector('.slider').clientWidth;

let counter = 0;
const totalImages = sliderImages.children.length;

function slideToNext() {
  counter++;
  if (counter >= totalImages) {
    counter = 0;
  }
  sliderImages.style.transform = `translateX(${-imageWidth * counter}px)`;
}

setInterval(slideToNext, 3000);