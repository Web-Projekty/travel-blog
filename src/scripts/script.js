var slideIndex = 1;
const imbedimage = document.querySelector("#imbedimage");

function plusSlides(n) {
    showSlides((slideIndex += n));
}

function currentSlide(n) {
    showSlides((slideIndex = n));
}

function showSlides(n) {
    var i;
    var video = document.getElementById("video");
    var slide = document.getElementById("slide");
    var dots = document.getElementsByClassName("dot");
    /*if (n > slides.length) {
        slideIndex = 1;
    }
    /*if (n < 1) {
    slideIndex = slides.length;
  }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";*/
    slide.src = "src/res/vid/v" + n + ".mp4";
    video.load();
}

function nextSlide() {
    plusSlides(1);
}
