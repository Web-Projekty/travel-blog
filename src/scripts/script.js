var slideIndex = 1;
const imbedimage = document.querySelector("#imbedimage");

function plusSlides(n) {
  showSlides((slideIndex += n));
}

function currentSlide(n) {
  showSlides((slideIndex = n));
}

function showSlides(n, d) {
  console.log(n);
  var i;
  var video = document.getElementById("video");
  var slide = document.getElementById("slide");
  var fade = document.getElementsByClassName("fade");
  var dots = document.getElementsByClassName("dot");

  //create
  var newVideo = document.createElement("video");
  var newSource = document.createElement("source");
  //add id
  newVideo.id = "loadingVideo";
  newSource.id = "loadingSlide";
  //set src
  var path = "";
  for (let i = 0; i < d; i++) {
    path = path + "../";
  }
  console.log(path)
  newSource.src = path + "src/res/vid/v" + n + ".mp4";
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

  loadingVideo.addEventListener("loadeddata", changeSlides);
}
function changeSlides() {
  var video = document.getElementById("video");
  var slide = document.getElementById("slide");
  console.log("loaded");

  //remove old video
  if (slide != null) {
    slide.remove();
  }
  if (video != null) {
    video.remove();
  }

  //rename ids
  loadingVideo.load();

  loadingSlide.id = "slide";
  loadingVideo.id = "video";

  console.log("fad");
  loadingVideo.style.opacity = "1";
  loadingVideo.removeEventListener("loadeddata", changeSlides);
}

function nextSlide() {
  plusSlides(1);
}
