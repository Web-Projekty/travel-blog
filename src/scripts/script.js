var slideIndex = 1;
const imbedimage = document.querySelector("#imbedimage");

function plusSlides(n) {
    showSlides((slideIndex += n));
}

function currentSlide(n) {
    showSlides((slideIndex = n));
}
var video = document.getElementById("video");
var slide = document.getElementById("slide");
var fade = document.getElementsByClassName("fade");
var dots = document.getElementsByClassName("dot");
function showSlides(n) {
    console.log(n);
    var i;

    //create
    var newVideo = document.createElement("video");
    var newSource = document.createElement("source");
    //add id
    newVideo.id = "loadingVideo";
    newSource.id = "loadingSlide";
    //set src
    newSource.src = "src/res/vid/v" + n + ".mp4";
    newSource.type = "video/mp4";

    //set other atributes
    newVideo.setAttribute("autoplay", "");
    newVideo.setAttribute("muted", "");
    newVideo.setAttribute("loop", "");
    newVideo.setAttribute("onended", "nextSlide()");

    //append
    fade[0].appendChild(newVideo);
    loadingVideo = document.getElementById("loadingVideo");
    loadingVideo.appendChild(newSource);
    loadingSlide = document.getElementById("loadingSlide");

    //old
    //video.style.opacity = "0";
    //slide.src = "src/res/vid/v" + n + ".mp4";

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

    //event listeners
    loadingVideo.addEventListener("loadeddata", changeSlides());
}
function changeSlides() {
    console.log("loaded");

    //remove old video
    if (slide != null) {
        slide.remove;
    }
    if (video != null) {
        video.remove;
    }

    //rename ids
    loadingSlide.id = "slide";
    loadingVideo.id = "video";
    loadingVideo.load();

    loadingVideo.style.opacity = "1";
    loadingVideo.removeEventListener("loadeddata",changeSlides())
}

function nextSlide() {
    plusSlides(1);
}
