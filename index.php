<?php 

    //DB CONNECTION
    $conn = mysqli_connect("localhost", "root", "", "LoginAndRegistrationSystem");
    if($conn->connect_error) {
        echo "Failed To Connect" . $conn->connect_error;
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login And Registration System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="container">

        <h1>Login Page</h1>

        <form action="index.php" method="post">

        <label>
            
            <span><i class="fa-solid fa-user"></i></span>
            <input type="text" name="username" placeholder="Username">

        </label>    
        <br>
        <label>

            <span><i class="fa-solid fa-lock"></i></span>
            <input type="password" name="password" placeholder="Password">

        </label>
        <br>
        <label>

            <span><i class="fa-solid fa-at"></i></span>
            <input type="email" name="email" placeholder="Email:">

        </label>
        <br>
        <button type="submit">Login</button>

        </form>

    <?php 
    
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["email"])) {
                $username = $_POST["username"];
                $password = $_POST["password"];
                $email = $_POST["email"];
                $result = mysqli_query($conn, "SELECT username, password, email FROM accounts");
                while ($row = mysqli_fetch_array($result)) {
                    if($username === $row[0] && $password === $row[1] && $email === $row[2]) {
                        header("Location: loggedIn.php");
                    }
                    else {
                        echo "Wrong details entered";
                    }
                }
            }
            else {
                echo "Enter all details!";
            }
        }
            
    
    ?>
    </div>


</body>
</html>