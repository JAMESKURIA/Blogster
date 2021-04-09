<?php
// Include database connection file
include '../assets/connection.php';

// REGISTER USER

// Get all input from the register form
if (isset($_POST['reg'])) {
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $phone_number = $_POST['phone_number'];
    $location = $_POST['location'];
    $email = $_POST['register_email'];
    $password = $_POST['register_password'];
    $profession = $_POST['profession'];

    // INSERT INTO LOGIN
    // check if user exists
    $check = "SELECT LOGIN_EMAIL FROM LOGIN WHERE LOGIN_EMAIL = '$email'";
    $check_user = mysqli_query($db, $check);

    // If more than one user exist, don't add & alert user else add new user
    if (mysqli_num_rows($check_user) > 0) {
        echo "<script>alert('User already exists')</script>";
    } else {
        $query = "INSERT INTO LOGIN (LOGIN_EMAIL,
                                     LOGIN_PASSWORD) 
                                     VALUES ('$email', '$password')";

        $result = mysqli_query($db, $query);

        if ($result) {
            $login_id = $db->insert_id;

            // INSERT INTO USERS
            // If adding data to login was successful, add data to users table
            $insert_into_user_query =
                "INSERT INTO USERS(USER_FNAME,
                                    USER_LNAME,
                                    USER_PROFESSION,
                                    USER_PHONE_NO,
                                    USER_LOCATION,
                                    USER_LOGIN_ID)
                                    VALUES('$f_name', '$l_name', '$profession', '$phone_number', '$location', $login_id)";

            $insert_into_user = mysqli_query($db, $insert_into_user_query);

            // If successfully added to user table, echo success
            if ($insert_into_user) {
                echo "<script>alert('Successfully submitted. You can now Login')</script>";
            }
        }
    }
}
