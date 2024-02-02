import "./bootstrap.js";
import "./styles/app.css";  

const navbarToggle = document.querySelector(".navbar-toggler");
const navBarNav = document.querySelector(".navbar-nav");
const navBarText = document.querySelector("#navbarText");
navbarToggle.addEventListener("click", function () {
  if (!navbarToggle.classList.contains("collapsed")) {
    navBarText.classList.add("navbarText-mobile");
    navBarNav.classList.remove("ms-auto");
  } else {
    setTimeout(() => {
      navBarText.classList.remove("navbarText-mobile");
      navBarNav.classList.add("ms-auto");
    }, 3000);
  }
});

const screenDesktop = document.querySelector(".screenDesktop");
const screenMobileSM = document.querySelector(".screenMobileSM");
const screenMobileDispoXL = document.querySelector(".screenMobileDispoXL");
const screenMobileDispoSM = document.querySelector(".screenMobileDispoSM");
const contentCards = document.getElementById("content");
const contentCardsBlogDetails = document.getElementById("content-blog-details")
const progressiveContent = document.getElementById(
  "section-progressive-content"
);

if (window.innerWidth < 900) {
  if (screenDesktop !== null) {
    screenDesktop.style.display = "none";
  }
  if (screenMobileSM !== null) {
    screenMobileSM.style.display = "block";
  }
  if (screenMobileDispoXL !== null) {
    screenMobileDispoXL.style.display = "none";
  }
  if (screenMobileDispoSM !== null) {
    screenMobileDispoSM.style.display = "block";
  }
  if (contentCards !== null) {
    contentCards.classList.remove("screenDesktopForSlides");
  }
  if (contentCardsBlogDetails !== null) {
    contentCardsBlogDetails.classList.remove("screenDesktopForSlidesDetails");
  }
} else {
  if (screenDesktop !== null) {
    screenDesktop.style.display = "block";
  }
  if (screenMobileSM !== null) {
    screenMobileSM.style.display = "none";
  }
  if (screenMobileDispoXL !== null) {
    screenMobileDispoXL.style.display = "block";
  }
  if (screenMobileDispoSM !== null) {
    screenMobileDispoSM.style.display = "none";
  }
  if (contentCards !== null) {
    contentCards.classList.add("screenDesktopForSlidesDetails");
  }
  if (contentCardsBlogDetails !== null) {
    contentCardsBlogDetails.classList.add("screenDesktopForSlidesDetails");
  }
}

window.addEventListener("resize", function () {
  let win = this;
  console.log(win.innerWidth);
  if (win.innerWidth < 900) {

    if (screenDesktop !== null) {
      screenDesktop.style.display = "none";
    }
    if (screenMobileSM !== null) {
      screenMobileSM.style.display = "block";
    }
    if (screenMobileDispoXL !== null) {
      screenMobileDispoXL.style.display = "none";
    }
    if (screenMobileDispoSM !== null) {
      screenMobileDispoSM.style.display = "block";
    }
    if (contentCards !== null) {
      contentCards.classList.remove("screenDesktopForSlides");
    }
    if (contentCardsBlogDetails !== null) {
      contentCardsBlogDetails.classList.remove("screenDesktopForSlidesDetails");
    }
  } else {
    if (screenDesktop !== null) {
      screenDesktop.style.display = "block";
    }
    if (screenMobileSM !== null) {
      screenMobileSM.style.display = "none";
    }
    if (screenMobileDispoXL !== null) {
      screenMobileDispoXL.style.display = "block";
    }
    if (screenMobileDispoSM !== null) {
      screenMobileDispoSM.style.display = "none";
    }
    if (contentCards !== null) {
      contentCards.classList.add("screenDesktopForSlides");
    }
    if (contentCardsBlogDetails !== null) {
      contentCardsBlogDetails.classList.add("screenDesktopForSlidesDetails");
    }
  }
});

// sildes
const button = document.getElementById("slide");
const back = document.getElementById("slideBack");
const container = document.getElementById("container");
const cardWidth = 450;
let position = 0;

if (button !== null) {
  button.addEventListener("click", () => {
    position += cardWidth;
    container.scrollTo({
      left: position,
      behavior: "smooth",
    });
  });
}

if (back !== null) {
  back.addEventListener("click", () => {
    position -= cardWidth;
    container.scrollTo({
      left: position,
      behavior: "smooth",
    });
  });
}

// sildes blog-details
const buttonDetails = document.getElementById("slide-details");
const backDetails = document.getElementById("slideBack-details");
const containerBlogDetails = document.getElementById("container-blog-details");
const cardWidthBlogDetails = 450;
let positionBlogDetails = 0;

if (buttonDetails !== null) {
  buttonDetails.addEventListener("click", () => {
    positionBlogDetails += cardWidthBlogDetails;
    containerBlogDetails.scrollTo({
      left: positionBlogDetails,
      behavior: "smooth",
    });
  });
}

if (backDetails !== null) {
  backDetails.addEventListener("click", () => {
    positionBlogDetails -= cardWidthBlogDetails;
    containerBlogDetails.scrollTo({
      left: positionBlogDetails,
      behavior: "smooth",
    });
  });
}

// CONCEPTS

const concept1 = document.getElementById("concept1");
const concept2 = document.getElementById("concept2");
const concept3 = document.getElementById("concept3");
const initialImage = document.getElementById("main-concept1-img");
const secondaryImage = document.getElementById("main-concept2-img");
const tertiaryImage = document.getElementById("main-concept3-img");
const numberImage = document.getElementById("number-image");

if(concept1 !== null) {
  concept1.style.opacity = 1;
}
if(initialImage !== null) {
  initialImage.style.display = "block";
}
if(concept2 !== null) {
  concept2.style.opacity = 0.2;
}
if(secondaryImage !== null) {
  secondaryImage.style.display = "none";
}
if(concept3 !== null) {
  concept3.style.opacity = 0.2;
}
if(tertiaryImage !== null) {
  tertiaryImage.style.display = "none";
}

let lastKnownScrollPosition = 0
document.addEventListener("scroll", (event) => {
  lastKnownScrollPosition = window.scrollY;
  if (lastKnownScrollPosition > 1100 && lastKnownScrollPosition < 1249) {
    if(concept1 !== null) {
      concept1.style.opacity = 1;
    }
    if(initialImage !== null) {
      initialImage.style.display = "block";
    }
    if(concept2 !== null) {
      concept2.style.opacity = 0.2;
    }
    if(secondaryImage !== null) {
      secondaryImage.style.display = "none";
    }
    if(concept3 !== null) {
      concept3.style.opacity = 0.2;
    }
    if(tertiaryImage !== null) {
      tertiaryImage.style.display = "none";
    }
    if(numberImage !== null) {
      numberImage.textContent = "1"
    }
  } 
  if (lastKnownScrollPosition > 1250 && lastKnownScrollPosition < 1329) {
    if(concept1 !== null) {
      concept1.style.opacity = 0.2;
    }
    if(initialImage !== null) {
      initialImage.style.display = "none";
    }
    if(concept2 !== null) {
      concept2.style.opacity = 1;
    }
    if(secondaryImage !== null) {
      secondaryImage.style.display = "block";
    }
    if(concept3 !== null) {
      concept3.style.opacity = 0.2;
    }
    if(tertiaryImage !== null) {
      tertiaryImage.style.display = "none";
    }
    if(numberImage !== null) {
      numberImage.textContent = "2"
    }
  }
  if (lastKnownScrollPosition >= 1330){
    if(concept1 !== null) {
      concept1.style.opacity = 0.2;
    }
    if(initialImage !== null) {
      initialImage.style.display = "none";
    }
    if(concept2 !== null) {
      concept2.style.opacity = 0.2;
    }
    if(secondaryImage !== null) {
      secondaryImage.style.display = "none";
    }
    if(concept3 !== null) {
      concept3.style.opacity = 1;
    }
    if(tertiaryImage !== null) {
      tertiaryImage.style.display = "block";
    }
    if(numberImage !== null) {
      numberImage.textContent = "3"
    }
  }
});


// CONCEPTS MOBILE

// sildes
const buttonConcepts = document.getElementById("slide-concepts-mobile");
const backConcepts = document.getElementById("slideBack-concepts-mobile");
const containerConcepts = document.getElementById("container-concepts-mobile");
const cardWidthConcepts = 355;
let positionConcept = 0;

if (buttonConcepts !== null) {
  buttonConcepts.addEventListener("click", () => {
    positionConcept += cardWidthConcepts;
    containerConcepts.scrollTo({
      left: positionConcept,
      behavior: "smooth",
    });
  });
}

if (backConcepts !== null) {
  backConcepts.addEventListener("click", () => {
    positionConcept -= cardWidthConcepts;
    containerConcepts.scrollTo({
      left: positionConcept,
      behavior: "smooth",
    });
  });
}
