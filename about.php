<?php
session_start();
require 'includes/header.php';
?>

<div class="about-page-container">
    <section class="about-intro">
        <h1 class="text-fade-in">About MyJournal</h1>
        <p class="text-fade-in">Welcome to MyJournal! We are passionate about helping you capture and organize your thoughts, ideas, and memories. Our platform allows you to keep a private journal or share your writings with the world. Start documenting your journey with us!</p>
    </section>

    <section class="about-features">
        <!-- First feature with image on the left -->
        <div class="feature">
            <img src="images/our-mission.jpg" alt="Our Mission">
            <div class="text-fade-in">
                <h2>Our Mission</h2>
                <p>We believe that everyone has a story to tell. Our mission is to provide a simple, clean, and elegant space where you can write freely and reflect on your life's moments.</p>
            </div>
        </div>

        <!-- Second feature with image on the right -->
        <div class="feature">
            <img src="images/privacy-and-security.avif" alt="Privacy & Security">
            <div class="text-fade-in">
                <h2>Privacy & Security</h2>
                <p>Your thoughts and memories are safe with us. MyJournal ensures your data is encrypted, giving you the peace of mind to express yourself freely.</p>
            </div>
        </div>

        <!-- Third feature with image on the left -->
        <div class="feature">
            <img src="images/connect-share.webp" alt="Connect & Share">
            <div class="text-fade-in">
                <h2>Connect & Share</h2>
                <p>Share your journals with others or keep them private — the choice is yours. Connect with like-minded individuals, exchange ideas, and grow your network through the MyJournal community.</p>
            </div>
        </div>

        <!-- Fourth feature with image on the left -->
        <div class="feature">
            <img src="images/impact-life.avif" alt="Impact on Life">
            <div class="text-fade-in">
                <h2>Impact on Your Life</h2>
                <p>At MyJournal, we understand the importance of reflection and mindfulness. Journaling has been shown to help people reduce stress, set and achieve goals, and improve mental clarity. With MyJournal, we aim to bring this positive impact to your everyday life by offering a space where you can document your thoughts and experiences.</p>
            </div>
        </div>

        <!-- Fifth feature with image on the right -->
        <div class="feature">
            <img src="images/growth.avif" alt="Personal Growth">
            <div class="text-fade-in">
                <h2>Personal Growth</h2>
                <p>Writing is a powerful tool for personal development. MyJournal helps you track your progress over time, uncover insights about yourself, and foster self-awareness. Whether you’re journaling for personal growth or self-reflection, our platform is designed to support you every step of the way.</p>
            </div>
        </div>
    </section>

    <section class="about-call-to-action">
        <h2 class="text-fade-in">Join Our Community Today</h2>
        <p class="text-fade-in">Start your journal and document your life's moments with MyJournal. Sign up today to get started!</p>
        <a href="index.php" class="btn btn-primary text-fade-in">Get Started</a>
    </section>
</div>

<?php
require 'includes/footer.php';
?>