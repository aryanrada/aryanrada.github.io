<?php
  if ($_POST) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $errors = array();

    if (empty($name)) {
      $errors[] = 'Name is required.';
    }

    if (empty($email)) {
      $errors[] = 'Email is required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors[] = 'Invalid email address.';
    }

    if (empty($message)) {
      $errors[] = 'Message is required.';
    }

    if (empty($errors)) {
      $to = 'your@email.com';
      $subject = 'Contact Form Submission';
      $body = "Name: $name\nEmail: $email\nMessage:\n$message";

      if (mail($to, $subject, $body)) {
        echo 'Your message has been sent!';
      } else {
        echo 'There was a problem sending your message.';
      }
    } else {
      echo '<ul>';
      foreach ($errors as $error) {
        echo "<li>$error</li>";
      }
      echo '</ul>';
    }
  }
?>