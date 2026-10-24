<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Nike Store</title>
    <link rel="stylesheet" href="../assets/css/contact.css">
</head>

<body>

<!-- YOUR HEADER (keep exactly same) -->
<?php view("partial/header.php") ?>

<section class="contact-hero">
    <h1>Contact Us</h1>
    <p>We are here to help you anytime</p>
</section>

<div class="contact-container">

    <div class="contact-form">
        <h2>Send Message</h2>

        <form>
            <input type="text" placeholder="Your Name" required>
            <input type="email" placeholder="Your Email" required>
            <input type="text" placeholder="Subject">
            <textarea placeholder="Your Message"></textarea>
            <button type="submit">Send Message</button>
        </form>
    </div>

    <div class="contact-info">
        <h2>Contact Info</h2>

        <div class="info-item">
            <span>Email:</span>
            support@nikestore.com
        </div>

        <div class="info-item">
            <span>Phone:</span>
            +1 234 567 890
        </div>

        <div class="info-item">
            <span>Address:</span>
            Portland, Oregon, USA
        </div>

        <div class="info-item">
            <span>Working Hours:</span>
            Mon - Fri | 9:00 AM - 6:00 PM
        </div>
    </div>

</div>

<footer class="footer-contact">
    <p>© 2026 Nike Store. All rights reserved.</p>
</footer>

</body>

<script src="../assets/js/index.js"></script>
</html>