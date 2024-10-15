document.addEventListener('DOMContentLoaded', function() {
    // Smooth Scroll for login button
    const loginButton = document.querySelector('.btn-primary');
    if (loginButton) {
        const href = loginButton.getAttribute('href');
        if (href) {  // Only if the href attribute is not null
            loginButton.addEventListener('click', function(e) {
                e.preventDefault(); // Prevent default anchor behavior

                // Navigate to the login page directly if the href is valid
                window.location.href = href;
            });
        }
    }

    // Fade-in effect for the welcome box
    const welcomeBox = document.querySelector('.welcome-box');
    if (welcomeBox) {
        welcomeBox.style.opacity = 0; // Start with hidden
        setTimeout(function() {
            welcomeBox.style.transition = 'opacity 1s';
            welcomeBox.style.opacity = 1; // Fade in
        }, 500); // 500ms delay before fading in
    }

    // Add hover effect on buttons (only for button elements with the .btn class)
    const buttons = document.querySelectorAll('.btn');
    buttons.forEach(function(btn) {
        btn.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.05)'; // Slightly grow the button
            this.style.transition = 'transform 0.2s ease-in-out';
        });

        btn.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)'; // Reset size
        });
    });
});

document.addEventListener('DOMContentLoaded', function () {
    // Apply fade-up animation to each element when the page loads
    const animatedElements = document.querySelectorAll('.form-container, .entry-container, .welcome-box');
    animatedElements.forEach(element => {
        element.style.opacity = '0';
        element.style.transform = 'translateY(20px)';
        setTimeout(() => {
            element.style.opacity = '1';
            element.style.transform = 'translateY(0)';
            element.style.transition = 'opacity 0.8s ease-out, transform 0.8s ease-out';
        }, 100);
    });

    // Adding animation for buttons
    const buttons = document.querySelectorAll('.btn-primary, .btn-danger, .btn-warning');
    buttons.forEach(button => {
        button.addEventListener('mouseover', () => {
            button.style.transform = 'scale(1.05)';
        });
        button.addEventListener('mouseout', () => {
            button.style.transform = 'scale(1)';
        });
    });
});

function togglePasswordVisibility(fieldId) {
    const passwordField = document.getElementById(fieldId);
    const showButton = passwordField.nextElementSibling;

    if (passwordField.type === "password") {
        passwordField.type = "text";
        showButton.textContent = "Hide";
    } else {
        passwordField.type = "password";
        showButton.textContent = "Show";
    }
}

document.addEventListener('DOMContentLoaded', function() {
    // Smooth scroll for the login button, if present
    const loginButton = document.querySelector('.btn-primary');
    if (loginButton) {
        const href = loginButton.getAttribute('href');
        if (href) {
            loginButton.addEventListener('click', function(e) {
                e.preventDefault(); // Prevent default anchor behavior
                window.location.href = href; // Navigate to the login page
            });
        }
    }

    // Fade-in effect for the welcome box
    const welcomeBox = document.querySelector('.welcome-box');
    if (welcomeBox) {
        welcomeBox.style.opacity = 0;
        setTimeout(function() {
            welcomeBox.style.transition = 'opacity 1s';
            welcomeBox.style.opacity = 1; // Fade in after delay
        }, 500);
    }

    // Scroll Animation for Articles (entry cards)
    const entryCards = document.querySelectorAll('.entry-card');

    function handleScroll() {
        const windowHeight = window.innerHeight;

        entryCards.forEach(card => {
            const cardTop = card.getBoundingClientRect().top;
            const cardBottom = card.getBoundingClientRect().bottom;

            // If the card is within the viewport, add the 'visible' class
            if (cardTop < windowHeight && cardBottom > 0) {
                card.classList.add('visible');
            } else {
                card.classList.remove('visible'); // Remove visible class when out of view
            }
        });
    }

    // Check if entry cards are in view on scroll
    window.addEventListener('scroll', handleScroll);

    // Initial check in case any cards are already in view
    handleScroll();

    // Add hover animation on buttons
    const buttons = document.querySelectorAll('.btn');
    buttons.forEach(button => {
        button.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.05)';
            this.style.transition = 'transform 0.2s ease-in-out';
        });

        button.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    // Smooth Scroll for login button
    const loginButton = document.querySelector('.btn-primary');
    if (loginButton) {
        const href = loginButton.getAttribute('href');
        if (href) {
            loginButton.addEventListener('click', function(e) {
                e.preventDefault();
                window.location.href = href;
            });
        }
    }

    // Fade-in effect for the welcome box
    const welcomeBox = document.querySelector('.welcome-box');
    if (welcomeBox) {
        welcomeBox.style.opacity = 0;
        setTimeout(function() {
            welcomeBox.style.transition = 'opacity 1s';
            welcomeBox.style.opacity = 1;
        }, 500);
    }

    // Fade-in effect for features when scrolling
    const features = document.querySelectorAll('.feature');

    // Function to handle scroll animation
    function handleScroll() {
        const windowHeight = window.innerHeight;

        features.forEach((feature) => {
            const rect = feature.getBoundingClientRect();
            
            // Check if the feature is in the viewport
            if (rect.top <= windowHeight && rect.bottom >= 0) {
                feature.style.opacity = 1;
                feature.style.transform = 'translateY(0)';
                feature.style.transition = 'opacity 1s ease-out, transform 1s ease-out';
            } else {
                feature.style.opacity = 0;
                feature.style.transform = 'translateY(20px)';
            }
        });
    }

    // Check if features are in view on scroll
    window.addEventListener('scroll', handleScroll);

    // Initial check on page load
    handleScroll();

    // Hover effect for feature blocks
    const featureBlocks = document.querySelectorAll('.feature');
    featureBlocks.forEach(block => {
        block.addEventListener('mouseenter', function() {
            block.style.transform = 'scale(1.05)';
            block.style.transition = 'transform 0.3s ease-in-out';
        });
        block.addEventListener('mouseleave', function() {
            block.style.transform = 'scale(1)';
        });
    });
});
document.addEventListener('DOMContentLoaded', function() {
    // Select all text elements for the fade-in effect
    const fadeInElements = document.querySelectorAll('.terms-of-use-container');

    // Function to handle the scroll and apply fade-in effect
    function handleScroll() {
        const windowHeight = window.innerHeight; // Get the window height

        fadeInElements.forEach((element) => {
            const rect = element.getBoundingClientRect(); // Get the position of the element

            // Check if the element is within the viewport
            if (rect.top <= windowHeight && rect.bottom >= 0) {
                element.style.opacity = 1;
                element.style.transform = 'translateY(0)';
                element.style.transition = 'opacity 1s ease-out, transform 1s ease-out';
            } else {
                // Reset the opacity and transform for scrolling both up and down
                element.style.opacity = 0;
                element.style.transform = (rect.top > windowHeight) ? 'translateY(20px)' : 'translateY(-20px)';
            }
        });
    }

    // Attach the handleScroll function to the scroll event
    window.addEventListener('scroll', handleScroll);

    // Initial check on page load
    handleScroll();
});