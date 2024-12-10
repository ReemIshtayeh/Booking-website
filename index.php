
<!DOCTYPE html>
<html lang="en">
<head>
   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Booking</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    

    <script>
        function validateDates() {
            const leaveDate = new Date(document.getElementById('leaveDate').value);
            const arriveDate = new Date(document.getElementById('arriveDate').value);

            if (leaveDate > arriveDate) {
                alert("Leave Date cannot be after Arrive Date.");
                return false; // Prevent form submission
            }
            return true; // Allow form submission
        }
    </script>

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
    
       <header class="section__container__">

        <h1 class="section__header">Find And Booh <br>A Great Experience</h1>
        <img src="images/header.jpg" alt="plan picture"/>
       </header>

       <section class="section__container booking__container">

        <form method="post" action="connect.php"   onsubmit="return validateDates();">
          <div class="form__group">
            <span><i class="ri-map-pin-line"></i></span>
            <div class="input__content">
              <div class="input__group">
                <input type="text"  name="location" placeholder="Location" required/>
                <label>Location</label>
              </div>
              <p>Where are you goung?</p>
            </div>
          </div>
          <div class="form__group">
            <span><i class="ri-user-3-line"></i></span>
            <div class="input__content">
              <div class="input__group">
                <input type="number" name="travellers" placeholder="Number of Travellers" required />
                <label>Travellers</label>
              </div>
              <p>Add guests</p>
            </div>
          </div>
          <div class="form__group">
            <span><i class="ri-calendar-line"></i></span>
            <div class="input__content">
              <div class="input__group">
                <input type="date" id="leaveDate"  name="leaveDate" required/>
                <label>Departure</label>
              </div>
              <p>Add date</p>
            </div>
          </div>
          <div class="form__group">
            <span><i class="ri-calendar-line"></i></span>
            <div class="input__content">
              <div class="input__group">
                <input type="date"  id="arriveDate" name="arriveDate" required/>
                <label>Return</label>
              </div>
              <p>Add date</p>
            </div>
          </div>
          <button class="btn" type="submit">
           Register Now!<i class="ri-search-line"></i>
          </button>
          
        </form>

         <!-- Manage Bookings Section -->
    <section class="manage-bookings">
        <h2><i class="fas fa-cog"></i> Manage Your Bookings</h2>
        <p>
            Click the icon below to manage your bookings.
        </p>
        <a href="manage_bookings.php" class="manage-bookings-link">
            <i class="fas fa-clipboard-list fa-3x"></i>
        </a>
    </section>
      </section>

      
  
      
  
      <section class="section__container lounge__container">
        <div class="lounge__image">
          <img src="images/lounge-1.jpg" alt="lounge" />
          <img src="images/lounge-2.jpg" alt="lounge" />
        </div>
        <div class="lounge__content">
          <h2 class="section__header">Unaccompanied Minor Lounge</h2>
          <div class="lounge__grid">
            <div class="lounge__details">
              <h4>Experience Tranquility</h4>
              <p>
                Serenity Haven offers a tranquil escape, featuring comfortable
                seating, calming ambiance, and attentive service.
              </p>
            </div>
            <div class="lounge__details">
              <h4>Elevate Your Experience</h4>
              <p>
                Designed for discerning travelers, this exclusive lounge offers
                premium amenities, assistance, and private workspaces.
              </p>
            </div>
            <div class="lounge__details">
              <h4>A Welcoming Space</h4>
              <p>
                Creating a family-friendly atmosphere, The Family Zone is the
                perfect haven for parents and children.
              </p>
            </div>
            <div class="lounge__details">
              <h4>A Culinary Delight</h4>
              <p>
                Immerse yourself in a world of flavors, offering international
                cuisines, gourmet dishes, and carefully curated beverages.
              </p>
            </div>
          </div>
        </div>
      </section>
  
      <section class="section__container travellers__container">
        <h2 class="section__header">Best travellers of the month</h2>
        <div class="travellers__grid">
          <div class="travellers__card">
            <img src="images/traveller-1.jpg" alt="traveller" />
            <div class="travellers__card__content">
              <img src="images/client-1.jpg" alt="client" />
              <h4>Emily Johnson</h4>
              <p>Dubai</p>
            </div>
          </div>
          <div class="travellers__card">
            <img src="images/traveller-2.jpg" alt="traveller" />
            <div class="travellers__card__content">
              <img src="images/client-2.jpg" alt="client" />
              <h4>David Smith</h4>
              <p>Paris</p>
            </div>
          </div>
          <div class="travellers__card">
            <img src="images/traveller-3.jpg" alt="traveller" />
            <div class="travellers__card__content">
              <img src="images/client-3.jpg" alt="client" />
              <h4>Olivia Brown</h4>
              <p>Singapore</p>
            </div>
          </div>
          <div class="travellers__card">
            <img src="images/traveller-4.jpg" alt="traveller" />
            <div class="travellers__card__content">
              <img src="images/client-4.jpg" alt="client" />
              <h4>Daniel Taylor</h4>
              <p>Malaysia</p>
            </div>
          </div>
        </div>
      </section>
  
      <section class="subscribe">
        <div class="section__container subscribe__container">
          <h2 class="section__header">Subscribe newsletter & get latest news</h2>
          <form class="subscribe__form">
            <input type="text" placeholder="Enter your email here" />
            <button class="btn">Subscribe</button>
          </form>
        </div>
      </section>

  
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
