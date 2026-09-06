<?php

// =====================================================
// CONTACT FORM PHP
// =====================================================

// Your receiving email address
$recipient = "g2stechmedia@gmail.com";

// =====================================================
// GET FORM DATA
// =====================================================

$name    = isset($_POST['name']) ? trim($_POST['name']) : '';
$mobile  = isset($_POST['mobile']) ? trim($_POST['mobile']) : '';
$email   = isset($_POST['email']) ? trim($_POST['email']) : '';
$message = isset($_POST['message']) ? trim($_POST['message']) : '';


// =====================================================
// CLEAN FORM DATA
// =====================================================

$name    = stripslashes($name);
$mobile  = stripslashes($mobile);
$email   = stripslashes($email);
$message = stripslashes($message);


// =====================================================
// VALIDATION
// =====================================================

// Name validation
if (empty($name)) {
    echo '<div class="alert alert-danger">
            Please enter your name.
          </div>';
    exit;
}

// Mobile validation
if (empty($mobile)) {
    echo '<div class="alert alert-danger">
            Please enter your mobile number.
          </div>';
    exit;
}

// Mobile number validation
if (!preg_match('/^[0-9+\-\s()]{7,20}$/', $mobile)) {
    echo '<div class="alert alert-danger">
            Please enter a valid mobile number.
          </div>';
    exit;
}

// Email validation
if (empty($email)) {
    echo '<div class="alert alert-danger">
            Please enter your email address.
          </div>';
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo '<div class="alert alert-danger">
            Please enter a valid email address.
          </div>';
    exit;
}

// Message validation
if (empty($message)) {
    echo '<div class="alert alert-danger">
            Please enter your message.
          </div>';
    exit;
}


// =====================================================
// EMAIL SUBJECT
// =====================================================

$subject = "New Contact Form Enquiry";


// =====================================================
// EMAIL CONTENT
// =====================================================

$email_message  = "You have received a new enquiry from your website.\n\n";

$email_message .= "Name: " . $name . "\n";
$email_message .= "Mobile Number: " . $mobile . "\n";
$email_message .= "Email: " . $email . "\n\n";

$email_message .= "Message:\n";
$email_message .= $message . "\n\n";

$email_message .= "----------------------------------\n";
$email_message .= "This message was sent from your website contact form.\n";


// =====================================================
// EMAIL HEADERS
// =====================================================

$headers  = "From: Website Contact Form <" . $recipient . ">\r\n";
$headers .= "Reply-To: " . $email . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";


// =====================================================
// SEND EMAIL
// =====================================================

if (mail($recipient, $subject, $email_message, $headers)) {

    // Success message

    echo '<div class="alert alert-success alert-dismissable fade in">

            <button type="button"
                    class="close"
                    data-dismiss="alert"
                    aria-hidden="true">
                    &times;
            </button>

            <p>
                Email Sent Successfully!
                We will get back to you shortly.
            </p>

          </div>';

} else {

    // Error message

    echo '<div class="alert alert-danger">

            <p>
                Sorry, your message could not be sent.
                Please try again later.
            </p>

          </div>';
}

?>
```

### HTML form

Make sure your contact form uses the same field names:

```html
<form action="contact-form.php" method="POST">

    <div class="form-group">
        <input
            type="text"
            name="name"
            class="form-control"
            placeholder="Your Name"
            required>
    </div>

    <div class="form-group">
        <input
            type="text"
            name="mobile"
            class="form-control"
            placeholder="Mobile Number"
            required>
    </div>

    <div class="form-group">
        <input
            type="email"
            name="email"
            class="form-control"
            placeholder="Email Address"
            required>
    </div>

    <div class="form-group">
        <textarea
            name="message"
            class="form-control"
            rows="5"
            placeholder="Your Message"
            required></textarea>
    </div>

    <button type="submit" class="btn btn-primary">
        Send Message
    </button>

</form>
```

### Form fields

**Name ? Mobile Number ? Email ? Message ? Send Message**

The email you currently have configured, `g2stechmedia@gmail.com`, remains the receiving address.
