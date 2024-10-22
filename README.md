<!--- The following README.md sample file was adapted from https://gist.github.com/PurpleBooth/109311bb0361f32d87a2#file-readme-template-md by Raghav Sampangi for academic use ---> 
<!--- You may delete any comments in this sample README.md file. Update information in this readme file with information from your work, and if there are sections that are marked "[OPTIONAL]" that you do not need in a specific section, simply delete them. Retain the other sections. --->
# Assignment 2: CSCI 2170

Introduction to Server-Side Scripting, Fall Semester 2024

## Assignment Information

### Author

Full Name: Malhar Datta Mahajan
Email: ml575444@dal.ca

### Code Information

Date Created: 11/10/2024
Last Modification Date: 11/10/2024

## Description

One Paragraph of assignment description goes here.

(I reccomend using test username: mafia test2, test password: Testpassword123).

For this assignment, I developed MyJournal, a web application that allows users to create, view, edit, and delete journal entries. The application includes functionality such as user registration, login, and secure session management. I also implemented a show and hide password feature to enhance user experience and security during login and registration.

Additionally, I created detailed About, Privacy Policy, temrs of use. pages to improve the website’s professionalism and provide users with clear information about data handling practices. These pages contribute to the overall credibility and aesthetic of the application.

## Citations/Attributions

1. Include citations in this format:
Author/Website URL, Year published (if available), Content used from the source, and Date accessed. Include a note as to what you used from this source and how you used it (max. 1-2 sentences).

2. Bootstrap. (2023). Navbar. Bootstrap 5.0 Documentation. Retrieved October 10, 2024, from https://getbootstrap.com/docs/5.0/components/navbar/.
I used the Navbar example from Bootstrap's documentation to create a responsive navigation bar in header.php for the journal application.

3. Bootstrap. (2023). Offcanvas Navbar. Bootstrap 5.0 Documentation. Retrieved October 10, 2024, from https://getbootstrap.com/docs/5.0/components/navbar/#offcanvas.
I adapted the offcanvas navbar to include links like Home, Create Entry, Preferences, and Login/Logout in both header.php and footer.php.

4. PHP Manual. (2023). password_hash() - Manual. PHP Documentation. Retrieved October 10, 2024, from https://www.php.net/manual/en/function.password-hash.php.
I used password_hash() to securely hash passwords before saving them in the users.csv file in the registration script (in register.php).

5. PHP Manual. (2023). password_verify() - Manual. PHP Documentation. Retrieved October 10, 2024, from https://www.php.net/manual/en/function.password-verify.php.
I used password_verify() to check hashed passwords against the stored values in the index.php login script.

6. Indian Type Foundry. Teko. Google Fonts. https://fonts.google.com/specimen/Teko. Accessed September 17, 2024.
I used the Teko font from Google Fonts to enhance the typography and readability of the headings on my website.

 7. Freepik, 2024, “Flat our mission infographics with details,”
 accessed on October 15, 2024.
Available at: https://www.freepik.com/free-vector/flat-our-mission-infographics-with-details_18775937.htm.
Image used for about page in "Our Misiion".

8. Brave Search, 2024, “Connection through the world earth globe,” accessed on October 15, 2024. Available at: https://search.brave.com/images?q=connection+throught+the+world+earth+globe&source=web. Image used for the “Connect & Share” section on the About page.

9. Unsplash, 2024, “Two women facing security camera above mounted on structure,” by an unknown author, accessed on October 15, 2024. Available at: https://unsplash.com/photos/two-women-facing-security-camera-above-mounted-on-structure-fPxOowbR6ls. Image used for the “Privacy & Security” section on the About page.

10. Unsplash, 2024, “Egg balancing on the edge of a table about to fall down and break due to domino tiles falling,” accessed on October 15, 2024. Available at: https://unsplash.com/photos/egg-balancing-on-the-edge-of-a-table-about-to-fall-down-and-break-due-to-domino-tiles-falling-fe0tQrcFTI8.
Image used for the “Impact on Life” section.

11. Unsplash, 2024, “Plant growing process cycle with sunflower seeds and sunflowers sprouts in different stages of growing on white wooden background,” accessed on October 15, 2024. Available at: https://unsplash.com/photos/plant-growing-process-cycle-sunflower-seeds-and-sunflowers-sprouts-in-different-stages-of-growing-on-white-wooden-background-top-view-sunflower-VZ0f6uWbMUI.
Image used for the “Growth and Development” section.

12. ChatGPT, OpenAI
Year Published: 2024
Content Used: The content for the “About Page,” “Terms of Use,” and “Privacy Policy” sections was generated using ChatGPT, a large language model developed by OpenAI.
Date Accessed: October 15, 2024
 I used ChatGPT to draft the informational text on the about page, including sections on MyJournal’s mission, privacy, and user engagement. Additionally, I used ChatGPT to create a comprehensive “Terms of Use” and “Privacy Policy” to align with standard web content practices.

13. Google Fonts. Font Selection Embed. Available at: https://fonts.google.com/selection/embed. Accessed: October 15, 2024.
Note: I used the Akaya Kanadaka font from Google Fonts and embedded it in the website for applying specific styles to h1 headings.

14. Google Fonts. Font Selection Embed. Available at: https://fonts.google.com/selection/embed. Accessed: October 15, 2024.
Note: Used the embedded font selection feature to implement the “Akaya Kanadaka” font for specific heading styles in the project.

15. PHP Manual. (2024). session_destroy() - Manual. PHP Documentation.
    Retrieved September 19, 2024, from https://www.php.net/manual/en/function.session-destroy.php.  
    I used session_destroy() to log users out of their sessions in the `logout.php` file.

16. PHP Manual. (2024). fgetcsv() - Manual. PHP Documentation.
    Retrieved October 10, 2024, from https://www.php.net/manual/en/function.fgetcsv.php.  
    I used `fgetcsv()` to parse user data from the CSV file in the `login.php` script.

17. PHP Manual. (2024). setcookie() - Manual. PHP Documentation.
    Retrieved October 10, 2024, from https://www.php.net/manual/en/function.setcookie.php.  
    I used `setcookie()` in the `logout.php` script to store the user's last login attempt for display purposes.

18. JavaScript Info. (2024). Event: mouseenter
    Retrieved October 15, 2024, from https://javascript.info/mousemove-mouseover-mouseout-mouseenter-mouseleave.  
    I used the `mouseenter` and `mouseleave` event listeners in `main.js` to add hover effects to buttons throughout the application.

19. Bootstrap. (2023). Buttons. Bootstrap 5.0 Documentation. 
    Retrieved October 10, 2024, from https://getbootstrap.com/docs/5.0/components/buttons/.  
    I used Bootstrap button classes like `.btn-primary` to style the buttons throughout the application.

20. Bootstrap. (2023). Offcanvas Navbar. Bootstrap 5.0 Documentation.  
    Retrieved October 10, 2024, from https://getbootstrap.com/docs/5.0/components/navbar/#offcanvas.  
    Used the Bootstrap Offcanvas Navbar for adaptive navigation in `header.php` and `footer.php`.

21. PHP Manual. (2023). htmlspecialchars() - Manual. PHP Documentation.  
    Retrieved October 15, 2024, from https://www.php.net/manual/en/function.htmlspecialchars.php.  
    I used `htmlspecialchars()` to sanitize user inputs in `login.php` to prevent XSS attacks.

22. PHP Manual. (2023). file_exists() - Manual. PHP Documentation.  
    Retrieved October 15, 2024, from https://www.php.net/manual/en/function.file-exists.php.  
    I used `file_exists()` in `login.php` to check if the `users.csv` file is present before processing user login attempts.

23. Lipsum. (n.d.). Lorem Ipsum Generator. Retrieved October 15, 2024, from https://www.lipsum.com/
I used the generated placeholder text "Lorem Ipsum" as temporary content on the homepage.

24. PHP Manual. (2023). ob_start() - Manual. Retrieved October 17, 2024, from https://www.php.net/manual/en/function.ob-start.php.
I used ob_start() to initiate output buffering in order to prevent header errors and ensure that page redirection works correctly after form submission.