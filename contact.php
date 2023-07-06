<!DOCTYPE html>
<html lang="en">

<head>
    <!--Meta Data-->
    <title>Contact us</title>
    <meta name="description" content="Contact ProfitProton for expert support and assistance. Reach out to us at support@profitproton.com for all your inquiries, feedback, and technical assistance.">
    <meta name="keywords" content="contact us, support, assistance, online money-making, side-hustles, inquiries, feedback, technical support, maximize profits, business growth">
    <meta name="author" content="ProfitProton">
    <meta name="robots" content="index, follow">
    <!--Styles-->

    <?php include 'assets/head.php'; ?>
</head>

<body>
    <?php include 'assets/headernav.html'; ?>

    <main class="main-content">
        <article class="greytext">
            <section class="contact-page-holder">
                <img class="contact-page-illustration" src="images/illustrations/contact-page-illustration.webp" alt="Assistant reaching out and communicating with customers" loading="eager" decoding="sync">
                <div class="contact-page">
                    <h1 class="page-title">Get in touch</h1>
                    <div class="contact-page-info">
                        <p class="contact-page-info-description">
                            Have a question, comment or suggestion? We'd love to hear from you! We're always here to help with any question you may have.
                        </p>
                        <div class="contact-page-social">
                            <div class="contact-page-social-item">
                                <a href="https://www.instagram.com/profitproton/" target=”_blank”><button class="contact-page-button"><img class="contact-page-social-icon" src="icons/socials/instagram-white.png" alt="instagram logo" aria-label="Visit Instagram profile"></button></a>
                                <div class="contact-page-social-text">@profitproton</div>
                            </div>
                            <div class="contact-page-social-item">
                                <a href="mailto:support@profitproton.com" target=”_blank”><button class="contact-page-button"><img class="contact-page-social-icon" src="icons/socials/email-white.png" alt="email logo" aria-label="Send email to support@profitproton.com"></button></a>
                                <div class="contact-page-social-text">support@profitproton.com</div>
                            </div>
                        </div>
                        <form class="contact-page-form" action="https://formsubmit.co/profitproton@gmail.com" method="POST">
                            <input class="contact-page-form-email form-item" placeholder="Name" maxlength="100" type="name" name="name" required>
                            <input class="contact-page-form-email form-item" placeholder="Email" maxlength="100" type="email" name="email" required>
                            <input class="contact-page-form-email form-item" placeholder="Subject" maxlength="100" type="subject" name="subject" required>
                            <input type="hidden" name="_captcha" value="false">
                            <textarea class="contact-page-form-message form-item" maxlength="4000" placeholder="Message" name="message" cols="30" rows="10"></textarea>
                            <button aria-label="Submit email" class="contact-page-form-submit" type="submit">Submit</button>

                            <input type="hidden" name="_next" value="https://profitproton.com/thankyou">
                        </form>
                    </div>
                </div>
            </section>
        </article>
    </main>
    <?php include 'assets/footer.html'; ?>

    <script>
        function copyToClipboard() {
            /* Get the text you want to copy */
            var text = "support@profitproton.com";

            /* Create a temporary input element */
            var tempInput = document.createElement("input");
            tempInput.value = text;

            /* Append the input element to the body */
            document.body.appendChild(tempInput);

            /* Select the text inside the input element */
            tempInput.select();

            /* Copy the text to the clipboard */
            document.execCommand("copy");

            /* Remove the input element from the body */
            document.body.removeChild(tempInput);
        }
    </script>
</body>

</html>