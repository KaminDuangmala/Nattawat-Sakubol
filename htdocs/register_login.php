<?php
session_start();
include('database.php');

$errors = array();

// --- REGISTER USER ---
if (isset($_POST['reg_user'])) {
    // Receive all input values from the form
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);

    // Check if user already exists
    $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        if ($user['username'] === $username) {
            array_push($errors, "Username already exists");
        }
        if ($user['email'] === $email) {
            array_push($errors, "Email already exists");
        }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        // Encrypt the password before saving in the database
        $password = password_hash($password_1, PASSWORD_DEFAULT); 

        $query = "INSERT INTO users (username, email, password) 
                  VALUES('$username', '$email', '$password')";
        mysqli_query($conn, $query);
        
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        
        // Redirect to homepage or dashboard
        header('location: index.php'); 
    } else {
        // Handle errors (print them or redirect back)
        foreach($errors as $error){
            echo $error . "<br>";
        }
    }
}

// --- LOGIN USER ---
if (isset($_POST['login_user'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $query = "SELECT * FROM users WHERE email='$email'";
        $results = mysqli_query($conn, $query);

        if (mysqli_num_rows($results) == 1) {
            $user = mysqli_fetch_assoc($results);
            // Verify password
            if (password_verify($password, $user['password'])) {
                $_SESSION['username'] = $user['username'];
                $_SESSION['success'] = "You are now logged in";
                header('location: index3.php');
            } else {
                array_push($errors, "Wrong password");
                echo "Wrong email/password combination";
            }
        } else {
            array_push($errors, "User not found");
            echo "User not found";
        }
    }
}
?>