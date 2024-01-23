<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "Tele-mental-db";

$connection = new mysqli($host, $username, $password, $database);

$user_ID = "";
$Names = "";
$Email = "";
$User_type = "";
$Password = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    //GET ELEMENTS OF USERS TABLE
    $user_ID = $_GET["user_ID"];
    
    if(!isset($_GET["user_ID"])){
        header("location: users.php");
        exit;
    }

    $sql = "SELECT * FROM users WHERE user_ID = $user_ID";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    //if row is empty
    if (!$row) {
        header("location: users.php");
        exit;
    }

    $user_ID = $row["user_ID"];
    $Names = $row['Names'];
    $Email = $row['Email'];
    $User_type = $row['User_type'];
    $Password = $row['Password'];
}
else {
    //update elements of users
    $user_ID = $_POST['user_ID'];
    $Names = $_POST['Names'];
    $Email = $_POST['Email'];
    $User_type = $_POST['User_type'];
    $Password = $_POST['Password'];

    do {
        if (empty($user_ID) || empty($Names) || empty($Email) || empty($User_type) || empty($Password)) {
            $errorMessage = "All fields are required";
            break;
        }

        $sql = "UPDATE users SET Names='$Names', Email='$Email', User_type='$User_type', Password='$Password' WHERE user_ID=$user_ID";
        $result = $connection->query($sql);

        //CHECK IF QUERY IS EXECUTED CORRECTLY OR NOT
        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }

        $successMessage = "Successfully user updated";
        header("location: users.php");
        exit;
    } while (false);
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
        <h2>update users</h2>
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
        <input type="hidden" name="user_ID" value="<?php echo $user_ID; ?>">

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
                    <input type="text" class="form-control" name="User_type" value="<?php echo $User_type; ?>">
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
                    <button type="submit" class="btn btn-primary">update</button>
                </div>

                <div class="col-sm-3 d-grid">
                    <a class='btn btn-outline-primary' href='users.php' role='button'>cancel</a>
                </div>
            </div>

        </form>
    </div>
</body>

</html>