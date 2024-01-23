<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>list of users</title>
    
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    
<div class="container my-5">
    <h2>LIST OF USERS</h2>
   <a class='btn btn-primary' href='create.php' role='button'>new user</a><br>
   <table border='1' class="table">
   <thead>
    <tr>
        <th>user_ID</th>
        <th>Names</th>
        <th>Email</th>
        <th>User-type</th>
        <th>Password</th>
    </tr>
   </thead>
   <tbody>

   <?php

// Database connection details
$host = "localhost";
$username = "root";
$password = "";
$database = "Tele-mental-db";

$connection=new mysqli($host,$username,$password,$database);
//to check our connection errors
if ($connection->connect_error){
    die("connection faled".$connection->connect_error);

}
 //if no connection error read all element of users table
 $sql="SELECT*FROM users";
 $result= $connection->query($sql);

if(!$result){
    die("invalid records".$connection->error);
}
//to read the data of each row
while($row = $result->fetch_assoc()){

    echo"
    <tr>
    <td >$row[user_ID]</td>
    <td>$row[Names]</td>
    <td>$row[Email]</td>
    <td>$row[User_type]</td>
    <td>$row[Password]</td>
    <td>
    <a class='btn btn-primary btn-sm' href='edit.php? user_ID=$row[user_ID]'>edit</a>
    <a class='btn btn-danger btn-sm' href='deleteUser.php?user_ID=$row[user_ID]'>delete</a>
    

    </td>
</tr>
 ";
}

?>

    
   </tbody>
</table>
</div>

</body>
</html>