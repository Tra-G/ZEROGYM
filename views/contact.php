<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Sono:wght@400;500&family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?php echo assets('css/global.css'); ?>">
    <link rel="stylesheet" href="<?php echo assets('css/contacts.css'); ?>">
    <title><?php echo $title; ?></title>
</head>
<body>
    <section class="contact-container relative flex align-center justify-center">
        <span class="overlay absolute"></span>
        <div class="contact-box flex space-between relative">

            <article class="contact-list">
                 <h2 class="contact-heading">
                    Contact Us
                </h2>
                <ul class="official-contact_list">
                    <h4 class="list-heading">Official Lines</h4>
                    <li>
                        <i class="fa fa-phone"></i>
                        <span>+234-123-456-789</span>
                    </li>
                    <li>
                        <i class="fa-brands fa-whatsapp"></i>
                        <span>+234-0122-333-444</span>
                    </li>
                    <li>
                        <i class="fa fa-at"></i>
                        <span>hello@zerogym.com</span>
                    </li>
                </ul>

                <ul class="social-contact_list">
                    <h4 class="list-heading">Social Media Handles</h4>
                    <li>
                        <i class="fa-brands fa-twitter"></i>
                        <span>@zerogym</span>
                    </li>
                    <li>
                        <i class="fa-brands fa-linkedin"></i>
                        <span>thezerogym</span>
                    </li>
                    <li>
                        <i class="fa-brands fa-instagram"></i>
                        <span>zerogym</span>
                    </li>
                    <li>
                        <i class="fa-brands fa-facebook"></i>
                        <span>zerogym</span>
                    </li>

                </ul>
            </article>
            <article class="contact-message relative flex align-center ">
                <h2 class="heading">Kindly Leave us a message</h2>
                <textarea placeholder="message..." class="contact-textarea" name="contact-message" id="contact-message" cols="30" rows="8"></textarea>
                <button class="btn">Submit</button>
            </article>
            <section class="absolute contact-footer flex align-center space-between">
                <address class="contact-address">
                    Head Office: 55, Anytown, Lagos.
                    <p>- and various other branch offices across the country...</p>
                </address>

            </section>
        </div>
    </section>
</body>
</html>