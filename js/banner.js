let currentSlide = 0;

function showSlides(index) {
    const slides = document.querySelectorAll('.slide');
    if (index >= slides.length) {
        currentSlide = 0;
    }
    if (index < 0) {
        currentSlide = slides.length - 1;
    }
    slides.forEach((slide, i) => {
        slide.style.transform = `translateX(${-currentSlide * 100}%)`;
    });
}

function autoChangeSlide(index){
    setInterval=document.querySelectorAll('.slide')
    
}

function changeSlide(n) {
    currentSlide += n;
    showSlides(currentSlide);
}

// Initialize the slider
showSlides(currentSlide);
