// =============================================
// Mobile Navigation Toggle
// =============================================
const hamburger = document.getElementById('hamburger');
const navLinks = document.getElementById('navLinks');

// Toggle mobile menu when hamburger is clicked
hamburger.addEventListener('click', () => {
    navLinks.classList.toggle('active');
});

// Close mobile menu when a link is clicked
const navItems = document.querySelectorAll('.nav-links a');
navItems.forEach(item => {
    item.addEventListener('click', () => {
        navLinks.classList.remove('active');
    });
});

// =============================================
// Contact Form Submission with AJAX
// =============================================
const contactForm = document.getElementById('contactForm');
const formMessage = document.getElementById('formMessage');

contactForm.addEventListener('submit', async (e) => {
    e.preventDefault(); // Prevent default form submission
    
    // Get form data
    const formData = new FormData(contactForm);
    
    try {
        // Send form data to PHP backend
        const response = await fetch('php/submit_contact.php', {
            method: 'POST',
            body: formData
        });
        
        // Parse JSON response
        const result = await response.json();
        
        // Display success or error message
        if (result.success) {
            formMessage.textContent = result.message;
            formMessage.className = 'success';
            contactForm.reset(); // Clear form fields
        } else {
            formMessage.textContent = result.message;
            formMessage.className = 'error';
        }
        
        // Hide message after 5 seconds
        setTimeout(() => {
            formMessage.style.display = 'none';
        }, 5000);
        
    } catch (error) {
        // Handle any network errors
        formMessage.textContent = 'An error occurred. Please try again later.';
        formMessage.className = 'error';
    }
});

// =============================================
// Smooth Scrolling for Navigation Links
// (Already handled by CSS scroll-behavior, 
//  but this adds extra smoothness for older browsers)
// =============================================
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// =============================================
// Add active class to navigation on scroll
// =============================================
window.addEventListener('scroll', () => {
    const sections = document.querySelectorAll('section');
    const navLinks = document.querySelectorAll('.nav-links a');
    
    let current = '';
    
    sections.forEach(section => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.clientHeight;
        if (pageYOffset >= (sectionTop - 100)) {
            current = section.getAttribute('id');
        }
    });
    
    navLinks.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href').substring(1) === current) {
            link.classList.add('active');
        }
    });
});