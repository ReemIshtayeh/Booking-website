<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Booking - Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
   <!-- page header  -->
   <nav>
    <div class="nav__logo">FlightBook</div>
    <ul class="nav__links">
    <li class="link"><a href="index.php">Home</a></li>
    <li class="link"><a href="about.php">About us</a></li>
    <li class="link"><a href="weather.php">Weather</a></li>
     <li class="link"><a href="login.php">Login</a></li>
    </ul>
    <buttton class="btn">Contact us</buttton>
</nav>

    <div class="login__body">
        
        <form action="loginInfo.php" method="POST">
            <h1>Login to Your Account</h1>
            <br>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn">Login</button>
            <p>Don't have an account? <a href="signup.php">Sign up here</a></p>
        </form>
    </div>

    <!-- footer page -->
    <footer class="footer">
        <div class="section__container footer__container">
          <div class="footer__col">
            <h3>Flivan</h3>
            <p>
              Where Excellence Takes Flight. With a strong commitment to customer
              satisfaction and a passion for air travel, Flivan Airlines offers
              exceptional service and seamless journeys.
            </p>
            <p>
              From friendly smiles to state-of-the-art aircraft, we connect the
              world, ensuring safe, comfortable, and unforgettable experiences.
            </p>
          </div>
          <div class="footer__col">
            <h4>INFORMATION</h4>
            <p>Home</p>
            <p>About</p>
            <p>Offers</p>
            <p>Seats</p>
            <p>Destinations</p>
          </div>
          <div class="footer__col">
            <h4>CONTACT</h4>
            <p>Support</p>
            <p>Media</p>
            <p>Socials</p>
          </div>
        </div>
        
 
        <div class="section__container footer__bar"></div>
        <p>&copy; 2024 FlightBook. All rights reserved.</p>
        <div class="socials">
            <span><i class="ri-facebook-fill"></i></span>
            <span><i class="ri-twitter-fill"></i></span>
            <span><i class="ri-instagram-line"></i></span>
            <span><i class="ri-youtube-fill"></i></span>
          </div>
        </div>
    </footer>
   

   

</body>
</html>
