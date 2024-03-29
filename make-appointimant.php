<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="make-appointimant.css">
  <title>appointiment page</title>

</head>

<header>
  <nav>
    <div class="logo"><img src="./images/logoicon3.png" alt="" />Tele mental</div>
    <ul>
      <li><a href="#index.html">Home</a></li>
      <li><a href="#About Us">About Us</a></li>
      <li><a href="#Services">Services</a></li>
      <li><a href="#Contact us">Contact us</a></li>
      <li><a href="#Call us on">Call us on</a></li>
    </ul>
  </nav>
</header>


<body>
  <div class="container">

  <form id="form1" action="process_appointment_request.php" method="post" onsubmit="return validateForm1()">
      <h3>Request Consultation Appointment</h3>

      <label for="nationalID">nationalID:</label>
      <input type="text" id="nationalID" name="nationalID" required>
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>

      <label for="phone">Phone:</label>
      <input type="tel" id="phone" name="phone" required>

      <label for="communication">Preferred Communication Method:</label>
      <select id="communication" name="communication">
        <option value="email">Email</option>
        <option value="phone">Phone Call</option>
        <option value="video">Video Call</option>
      </select>

      <label for="dob">Date of Birth:</label>
      <input type="date" id="dob" name="dob" required>

      <!-- Appointment Details -->
      <label for="consultationType">Type of Consultation:</label>
      <select id="consultationType" name="consultationType">
        <option value="individual">Individual</option>
        <option value="group">Group</option>
        <option value="family">Family</option>
      </select>

      <label for="preferredDateTime">Preferred Date and Time:</label>
      <input type="datetime-local" id="preferredDateTime" name="preferredDateTime" required>

      <label for="duration">Duration (in minutes):</label>
      <input type="number" id="duration" name="duration" required>


      <label for="payment-mode">Preferred payment mode:</label>
  <select id="payment-mode" name="payment_mode"> <!-- Updated name attribute -->
    <option value="momo">MOMO</option>
    <option value="bank">BANK</option>
  </select>


      <!-- Message Section -->
      <label for="comments">Additional Comments:</label>
      <textarea id="comments" name="comments" rows="4"></textarea>

      <!-- Privacy and Consent -->
      <label>
        <input type="checkbox" id="consent" name="consent" required>
        I agree to the privacy policy and terms of service.
      </label>

      <div class="btn-box">
        <!--<button type="button" id="next1">next</button> -->
        <button type="submit" name="next1" id="next1">next</button>
      </div>
    </form>

    <form id="form2" action="process_appointment_request.php" method="post" onsubmit="return validateForm2()">
      <h3>MAKE BANK PAYMENT</h3>
      <section>
        <label>Card number</label>
        <input>
      </section>

      <section>
        <label>Name on card</label>
        <input>
      </section>

      <section id="cc-exp-csc">
        <div>
          <label>Expiry date</label>
          <input>
        </div>
        <div>
          <label>Security code</label>
          <input>
          <div class="explanation">Last 3 digits on back of card</div>
        </div>
      </section>
      <div class="btn-box">
      <button type="submit" name="back1" id="back1">back</button>
        <button type="submit" name="next2" id="next2">next</button>
      </div>
    </form>
    <form id="form3" action="process_appointment_request.php" method="post">
      <h3>Confirm Request</h3>

      
      <p>Dear Valued Client,<br><br>

        We extend our heartfelt gratitude to you for taking the courageous step towards addressing your 
        mental health concerns. Embarking on the journey to mental well-being is a significant stride, and we commend your commitment to your personal growth.<br><br>
        
        In times of struggle, it's essential to remember that there is always hope, even when the mind tries to convince you otherwise.</p>
        <br><br><h4>Press submit to send your Appointment Request</h4>



      <div class="btn-box">
      <button type="submit" name="back2" id="back2">back</button>
        <button type="submit" name="submit" id="submit">submit</button>
      </div>
    </form>
    <div class="step-row">
      <div id="progress"></div>
      <div class="step-col"><small>step1</small></div>
      <div class="step-col"><small>step2</small></div>
      <div class="step-col"><small>step3</small></div>
    </div>

  </div>

  
  <script>
    var form1 = document.getElementById("form1");
    var form2 = document.getElementById("form2");
    var form3 = document.getElementById("form3");

    var progress = document.getElementById("progress");

    form1.onsubmit = function () {
        form1.style.left = "-570px";
        form2.style.left = "55px";
        progress.style.width = "240px";
        return false; // Prevents the form from submitting
    }

    form2.onsubmit = function () {
        form2.style.left = "-570px";
        form3.style.left = "55px";
        progress.style.width = "360px";
        return false; // Prevents the form from submitting
    }

    form3.onsubmit = function () {
        // Allow the form to submit for the final step
        return true;
    }

 function validateForm1() {
        form1.style.left = "-570px";
        form2.style.left = "55px";
        progress.style.width = "240px";
        return false; // Prevents the form from submitting
    }

    function validateForm2() {
        form2.style.left = "-570px";
        form3.style.left = "55px";
        progress.style.width = "360px";
        return false; // Prevents the form from submitting
    }

</script>



  <!--
  <footer>
    <div class="container">
        <p>Contact us at: hafidele9@gmail.com | Phone: +250789831961</p>
        <p>&copy; 2024 Tele Mental. All rights reserved.</p>
    </div>
</footer>
-->


</body>

</html>