<?php
// Include database connection file
include '../assets/connection.php';

// USER LOGIN
if (isset($_POST['login'])) {
    // Get login form data and store it in variables
    $login_email = $_POST['login_email'];
    $login_password = $_POST['login_password'];


    // Check if inputs are blank
    if ($login_email == '') {
        echo "<script>alert('PLease Fill in your email')</script>";
    } else if ($login_password == '') {
        echo "<script>alert('PLease Fill in your password')</script>";
    } else {

        // Check if user exists
        $check = "SELECT * FROM LOGIN WHERE LOGIN_EMAIL = '$login_email'";
        $check_user = mysqli_query($db, $check);
        $user = mysqli_fetch_assoc($check_user);

        // IF USER EXISTS
        if (mysqli_num_rows($check_user) > 0) {
            // Get the database email and password, for associated user
            $db_email = $user['LOGIN_EMAIL'];
            $db_password = $user['LOGIN_PASSWORD'];

            // Check if email and passwords match
            if ($login_password !== $db_password) {
                echo "<script>alert('Incorrect password')</script>";
            } else {
                // CREATE A SESSION AND SAVE THE USER F_NAME

                // Get login_id of the user
                $login_id = $user['LOGIN_ID'];

                // Get associated user_fname
                $get_user_info = "SELECT * FROM USERS WHERE USER_LOGIN_ID = $login_id";
                $run = mysqli_query($db, $get_user_info);
                $user_info = mysqli_fetch_assoc($run);
                $user_id = $user_info['USER_ID'];
                $user_name = $user_info['USER_FNAME'];
                $user_lname = $user_info['USER_LNAME'];
                $profession = $user_info['USER_PROFESSION'];

                // Set session
                if (!isset($_SESSION)) {
                    session_start();
                }
                
                $_SESSION['user_id'] = $user_id;
                $_SESSION['user_name'] = $user_name;
                $_SESSION['user_lname'] = $user_lname;
                $_SESSION['profession'] = $profession;

                //  Redirect to user main page with the id as a link query
                header("Location: ../user/user.php");
            }
        } else {
            // User does not exist - alert
            echo "<script>alert('User does not exist. Please check your credentials or create an account')</script>";
        }
    }
}
