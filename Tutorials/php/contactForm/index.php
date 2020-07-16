<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Contact Form</title>
    <link rel="stylesheet" type="text/css" href="includes/style.css">
</head>
<body>
    <main>
        <div class="center">
            <h1>Send Email</h1>
            <form class="contactForm" action="contactForm.php" method="POST">
                <input type="text" name="name" placeholder="Full Name">
                <input type="text" name="mail" placeholder="Your email">
                <input type="text" name="subject" placeholder="Subject">
                <textarea name="message" rows="8" cols="80" placeholder="message"></textarea>
                <button type="submit" name="submit">Send Mail</button>
            </form>
        </div>
    </main>
</body>
</html>