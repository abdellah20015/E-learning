
window.onload = function() {
  // Get the elements
  var slider = document.querySelector(".slider");
  var slides = document.querySelectorAll(".slide");
  var prev = document.querySelector(".prev");
  var next = document.querySelector(".next");

  // Set the index of the current slide
  var index = 0;

  // Show the first slide
  slides[index].classList.add("active");

  // Create a function to change the slide
  function changeSlide() {
    // Remove the active class from the current slide
    slides[index].classList.remove("active");

    // Increment the index
    index++;

    // If the index is equal to the number of slides, reset it to 0
    if (index == slides.length) {
      index = 0;
    }

    // Add the active class to the new slide
    slides[index].classList.add("active");
  }

  // Create a variable to store the interval
  var interval;

  // Create a function to start the interval
  function startInterval() {
    // Set the interval to call the changeSlide function every 3 seconds
    interval = setInterval(changeSlide, 3000);
  }

  // Create a function to stop the interval
  function stopInterval() {
    // Clear the interval
    clearInterval(interval);
  }

  // Start the interval when the page is loaded
  startInterval();

  // Add an event listener to the prev button
  prev.addEventListener("click", function() {
    // Stop the interval
    stopInterval();

    // Remove the active class from the current slide
    slides[index].classList.remove("active");

    // Decrement the index
    index--;

    // If the index is negative, set it to the last slide
    if (index < 0) {
      index = slides.length - 1;
    }

    // Add the active class to the new slide
    slides[index].classList.add("active");

    // Start the interval again
    startInterval();
  });

  // Add an event listener to the next button
  next.addEventListener("click", function() {
    // Stop the interval
    stopInterval();

    // Change the slide
    changeSlide();

    // Start the interval again
    startInterval();
  });
}
