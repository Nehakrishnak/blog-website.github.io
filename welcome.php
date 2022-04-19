<?php

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  header("location: login.php");
}


?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="stylee.css">
  <title>Blog</title>
  <style>
    .link {
      text-align: center;
      padding: 250px;
    }

    .button {
      background-color: rgba(19, 19, 31);
      border-radius: 5px;
      color: white;
      padding: .5em;
      text-decoration: none;
    }

    .button:focus,
    .button:hover {
      background-color: rgba(0, 0, 0, 0.4);
      color: White;
      text-decoration: none;
    }

    .content {
      display: none;
      margin: 1em 0;
    }

    .content.active,
    .no-js .content {
      display: block;
    }
    body{
    background-image: url(https://i.ytimg.com/vi/R9mXtzn8meE/maxresdefault.jpg);
}
  </style>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">EUPHORIA</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="home.html">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        



      </ul>

      <div class="navbar-collapse collapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#"> <img src="https://img.icons8.com/metro/26/000000/guest-male.png"> <?php echo "Welcome " . $_SESSION['username'] ?></a>
          </li>
        </ul>
      </div>


    </div>
  </nav>

  <div class="container mt-4">
    <h3><?php echo "Welcome " . $_SESSION['username'] ?>! You can now use this website</h3>
    <hr>

  </div>
  <div class="link">
    <nav><a href="http://127.0.0.1:5000/blogspresent" class="button js-button" role="button">    Explore   </a></nav><br>
    <nav><a href="http://127.0.0.1:5000/" class="button js-button" role="button">    Create    </a></nav>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script>
    (function(document, window, undefined) {
      'use strict';

      // Buttons
      var buttons = document.querySelectorAll('.js-button');

      var displayContent = function(button, content) {
        if (content.classList.contains('active')) {
          // Hide content
          content.classList.remove('active');
          button.setAttribute('aria-expanded', 'false');
          content.setAttribute('aria-hidden', 'true');
        } else {
          // Show content
          content.classList.add('active');
          button.setAttribute('aria-expanded', 'true');
          content.setAttribute('aria-hidden', 'false');
        }
      };

      [].forEach.call(buttons, function(button, index) {
        // Content var
        var content = button.nextElementSibling;

        // Set button attributes
        button.setAttribute('id', 'button-' + index);
        button.setAttribute('aria-expanded', 'false');
        button.setAttribute('aria-controls', 'content-' + index);

        // Set content attributes
        content.setAttribute('id', 'content-' + index);
        content.setAttribute('aria-hidden', 'true');
        content.setAttribute('aria-labelledby', 'button-' + index);

        button.addEventListener('click', function() {
          displayContent(this, content);
          return false;
        }, false);

        button.addEventListener('keydown', function(event) {
          // Handle 'space' key
          if (event.which === 32) {
            event.preventDefault();
            displayContent(this, content);
          }
        }, false);

      });

    })(document, window);
  </script>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>