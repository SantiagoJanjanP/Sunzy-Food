let slide = document.querySelectorAll('.slide');
let current = 0;
let autoPlayInterval; // Variable to store the interval for autoplay

function cls() {
    for (let i = 0; i < slide.length; i++) {
        slide[i].style.display = 'none';
    }
}

function next() {
    cls();
    if (current === slide.length - 1) current = -1;
    current++;

    slide[current].style.display = 'block';
    slide[current].style.left = '100%';

    // Use CSS transition for sliding effect
    slide[current].style.transition = 'left 0.4s ease-in-out';

    setTimeout(function () {
        slide[current].style.left = '0';
    }, 10);
}

function prev() {
    cls();
    if (current === 0) current = slide.length;
    current--;

    slide[current].style.display = 'block';
    slide[current].style.left = '-100%';

    // Use CSS transition for sliding effect
    slide[current].style.transition = 'left 0.4s ease-in-out';

    setTimeout(function () {
        slide[current].style.left = '0';
    }, 10);
}

function startAutoPlay() {
    autoPlayInterval = setInterval(next, 3000); // Adjust the interval as needed (e.g., 3000 milliseconds for 3 seconds)
}

function stopAutoPlay() {
    clearInterval(autoPlayInterval);
}

function start() {
    cls();
    slide[current].style.display = 'block';
    startAutoPlay(); // Start autoplay when the page loads
}

start();

// Pause autoplay when the user interacts with the slider
document.querySelector('.container').addEventListener('mouseenter', stopAutoPlay);
document.querySelector('.container').addEventListener('mouseleave', startAutoPlay);
