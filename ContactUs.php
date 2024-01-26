<?php
include("header.php");
include("inc/contact_form.php");

$contactForm = new ContactForm();

$contactForm->handleFormSubmission();
?>
<main>
    <div class="site-container-contact">
        <div class="help-section">
            <h2>We're here to help</h2>
            <p>Got questions?</p>
        </div>

        <div class="site-container-number-chat-email">
            <div class="number">
                <img src="./images/contact-phone.webp" alt="phone">
                <h3>Phone</h3>
                <p>212-727-2800</p>
            </div>

            <div class="email">
                <img src="./images/contact-email.png" alt="email">
                <h3>Email</h3>
                <p>support@blumenshop.com</p>
            </div>

            <div class="number">
                <img src="./images/contact-chat.png" alt="chat">
                <h3>Chat</h3>
                <p>Chat with us</p>
            </div>
        </div>
    </div>

    <div class="contactUs">
        <h2>Contact Us</h2>
        <p>
            Whether you have a question about our services,
            need some advice on a project, or just want to say hello, we're here to help.</p>
        <p>For a detailed and accurate quote on your project, we invite you to complete the relevant form below with
            as much in
            formation as possible.Our team will promptly review your submission and contact you to discuss your
            project in greater detail.</p>
    </div>



    <div class="store-location">
        <div class="tekstiMrena">
            <h2>Store Location</h2>
            <p>Westfield Mall Level 3,</p>
            <p>277 Broadway, Newmarket</p>
            <p>Auckland 1141</p>
            <p>Standard Store Hours</p>
            <p>Mon-Fri: 9AM - 4PM</p>
            <p>Sat: 10AM - 2PM</p>
        </div>
        <img src="./images/Contact-Store.webp" alt="store-location">
    </div>

    <div class="contact-form">
        <h1>Contact Us</h1>
        <div class="container">
            <div class="main">
                <div class="content">
                    <h2>Contact Us</h2>
                    <form action="#" method="post">
                        <input type="text" name="name" placeholder="Enter your name" required>
                        <input type="email" name="email" placeholder="Enter your email" required
                            pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$">
                        <textarea name="message" placeholder="Your message" required></textarea>
                        <button type="submit" class="btn">Send <i class="fas fa-paper-plane"></i></button>
                    </form>
                </div>
                <div class="form-img">
                    <img src="images/contactus1.jpg" alt="">
                </div>
            </div>
        </div>
    </div>

    <script>
        let nameRegex = /^[A-Z][a-z]{3,8}$/;
        let emailRegex = /[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        let messageRegex = /^[a-zA-Z ]{5,}$/;

        function validateForm() {
            let nameInput = document.getElementById('name');
            let nameError = document.getElementById('nameError');

            let emailInput = document.getElementById('email');
            let emailError = document.getElementById('emailError');

            let messageInput = document.getElementById('message');
            let messageError = document.getElementById('messageError');

            nameError.innerText = '';
            emailError.innerText = '';
            messageError.innerText = '';

            if (!nameRegex.test(nameInput.value)) {
                nameError.innerText = 'Invalid name';
                return;
            }
            if (!emailRegex.test(emailInput.value)) {
                emailError.innerText = 'Invalid email';
                return;
            }
            if (!messageRegex.test(messageInput.value)) {
                messageError.innerText = 'Invalid message';
                return;
            }
            alert('Form submitted successfully!');
        }
    </script>
</main>

<?php include("footer.php") ?>