<?php
session_start();
include("db.php");
if ($_SERVER['REQUEST_METHOD']=="POST"){

    $names= $_POST['names'];
    $email= $_POST['email'];
    $user_type= $_POST['user_type'];
    $password= $_POST['password'];

}
if (!empty($email) && !empty($password)){
$query = "INSERT INTO `users`(`Names`, `Email`, `User-type`, `Password`) VALUES ('$names','$email','$user_type','$password')";
mysqli_query($con,$query);
echo "<script type='text/javascript'> alert('sucessifully signed up')</script>";
}
else{
    echo "<script type='text/javascript'> alert('please provide usefull and correct informations')</script>"; 
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup-page.css">
    <title>Clients Sign Up</title>
</head>

<body>
    <header>
        <nav>
            <div class="logo">Tele Mental</div>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="index.html">About Us</a></li>
                <li><a href="index.html">Services</a></li>
                <li><a href="index.html">Contact us</a></li>
                <li><a href="index.html">Call us on</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="signup" class="signup">
            <div class="signup-container">
                <h2>Clients Sign Up</h2>
                <form method="POST">
                    <label for="Names">Names:</label>
                    <input type="text" id="Names" name="names" required>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>

                   <!-- <label for="User-type">User-type:</label>-->
                    <input type="text" id="User_type" name="user_type"  value="Clients" required readonly >

                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>

                    <button type="submit">Sign Up</button>
                </form>

                <p>Already have an account? <a href="login-page.html">Login</a></p>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
        <p>Contact us at: <a href="mailto:hafidele9@gmail.com">hafidele9@gmail.com</a> | Phone: +250789831961</p>
            <p>&copy; 2024 Tele Mental. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>
