<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Flight Booking</title>
        <link rel="stylesheet" href="styles.css">
    </head>

    <body >
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
        
        <div class="form__body">
            <form class="signup-form" action="register.php" method="POST" >
                <h2>Signup</h2>
                <div class="form-group">
                  <label for="userId">ID</label>
                  <input type="text" id="ID" name="ID" required>
                </div>
                <div class="form-group">
                  <label for="Name">Name</label>
                  <input type="text" id="Name" name="Name" required>
                </div>
                <div class="form-group">
                  <label for="userName">gmail</label>
                  <input type="email" id="userName" name="userName" required>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" id="pass" name="pass" required>
                </div>
                <div class="form-group">
                  <label for="dob">Date of Birth</label>
                  <input type="date" id="dob" name="dob" required>
                </div>
                <div class="form-group">
                  <label for="phoneNumber">Phone Number</label>
                  <input type="tel" id="phoneNumber" name="phoneNumber" pattern="[0-9]{10}" required>
                </div>
                <button type="submit" class="signup-btn"  value="Register">Sign Up</button>
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