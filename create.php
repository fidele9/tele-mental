<?php

// Database connection details
$host = "localhost";
$username = "root";
$password = "";
$database = "Tele-mental-db";

$connection=new mysqli($host,$username,$password,$database);

$Names = "";
$Email = "";
$User_type = "";
$Password = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $names = $_POST['Names'];
    $email = $_POST['Email'];
    $user_type = $_POST['User-type'];
    $password = $_POST['Password'];

    if (empty($names) || empty($email) || empty($user_type) || empty($password)) {
        $errorMessage = "All fields are required";

        

    } 
    
    
    else {
        $sql= "INSERT INTO `users`(`Names`, `Email`, `User_type`, `Password`) VALUES ('$names','$email','$user_type','$password')";
        $result= $connection->query($sql);
        // Adding new users
        $Names = "";
        $Email = "";
        $User_type = "";
        $Password = "";

        $successMessage = "Successfully added user";
        header("location: user.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>new_user</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container my-5">
        <h2>new user</h2>
        <?php
        if (!empty($errorMessage)) {
            echo "
        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>$errorMessage</strong>
        <button type='submit' class='btn-close'data-bs-dismiss='alert' aria-label='close'>submit</button>
        </div>
        ";
        }
        ?>
        <form method="POST">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Names</label>
                <div class="col sm-6">
                    <input type="text" class="form-control" name="Names" value="<?php echo $Names; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col sm-6">
                    <input type="text" class="form-control" name="Email" value="<?php echo $Email; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">User-type</label>
                <div class="col sm-6">
                    <input type="text" class="form-control" name="User-type" value="<?php echo $User_type; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Password</label>
                <div class="col sm-6">
                    <input type="text" class="form-control" name="Password" value="<?php echo $Password; ?>">
                </div>
            </div>

            <?php
            if (!empty($successMessage)) {
                echo "
        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>$successMessage</strong>
        <button type='submit' class='btn-close'data-bs-dismiss='alert' aria-label='close'>submit</button>
        </div>
        ";
            }
            ?>


            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">submit</button>
                </div>

                <div class="col-sm-3 d-grid">
                    <a class='btn btn-outline-primary' href='user.php' role='button'>cancel</a>
                </div>
            </div>

        </form>
    </div>
</body>

</html>