// When the user scrolls the page, execute myFunction
window.onscroll = function() {myFunction()};

// Get the navbar
var navbar = document.getElementById("navbar");

// Get the offset position of the navbar
var sticky = navbar.offsetTop;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}

// Get all the nav links
const navLinks = document.querySelectorAll('#nav a');

// Add click event listener to each nav link
navLinks.forEach(link => {
  link.addEventListener('click', e => {
    e.preventDefault(); // Prevent the default behavior of the link
    const targetId = e.target.getAttribute('href'); // Get the target section ID
    const targetSection = document.querySelector(targetId); // Get the target section element
    targetSection.scrollIntoView({ behavior: 'smooth' }); // Scroll to the target section smoothly
  });
});

// Add scroll event listener to the window
window.addEventListener('scroll', e => {
  const scrollPosition = window.scrollY; // Get the current scroll position
  const sections = document.querySelectorAll('div[id]'); // Get all the sections with ID attribute
  let currentSectionId = '';

  // Loop through each section and check if it's currently on the screen
  sections.forEach(section => {
    const sectionTop = section.offsetTop - 50; // Get the top offset of the section
    const sectionHeight = section.offsetHeight; // Get the height of the section
    const sectionBottom = sectionTop + sectionHeight;

    if (scrollPosition >= sectionTop && scrollPosition < sectionBottom) {
      currentSectionId = '#' + section.getAttribute('id'); // Set the current section ID
    }
  });

  // Add the active class to the current nav link
  navLinks.forEach(link => {
    link.classList.remove('active');
    if (link.getAttribute('href') === currentSectionId) {
      link.classList.add('active');
      link.style.color = "rgb(117, 251, 253)"; // Set the color of the active link to red
    }else {
      link.style.color = ''; // Reset the color of the inactive links
    }
  });
});
