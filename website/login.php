<?php
session_start(); // Start the session to allow use of session variables
include "conn.php"; // Include the connection file

if (isset($_POST['email']) && isset($_POST['password'])) // Check if email and password were provided
{
    // Function to validate input
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email = validate($_POST['email']); // Validate and store email
    $password = validate($_POST['password']); // Validate and store password

    // Check if email is empty
    if (empty($email)) {
        header("Location: index.php?error=email is required"); // Redirect to index page with error message
        exit();
    }
    // Check if password is empty
    else if (empty($password)) {
        header("Location: index.php?error=Password is required"); // Redirect to index page with error message
        exit();
    } else {
        $password = md5($password); // Hash the password

        $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'"; // Select the user with the provided email and password
        $result = mysqli_query($conn, $sql); // Execute the query

        if (mysqli_num_rows($result) === 1) // Check if only one user was found
        {
            $_SESSION['logged_in'] = true; // Set session variable to indicate that user is logged in
            $row = mysqli_fetch_assoc($result); // Get the user's data

            // Check if the email and password match the database
            if ($row['email'] === $email && $row['password'] === $password) {
                $_SESSION['firstname'] = $row['firstname']; // Set session variable for the user's first name
                $_SESSION['lastname'] = $row['lastname']; // Set session variable for the user's last name
                $_SESSION['email'] = $row['email']; // Set session variable for the user's email
                $_SESSION['mobile'] = $row['mobile']; // Set session variable for the user's mobile number
                $_SESSION['sem'] = $row['sem']; // Set session variable for the user's semester
                $_SESSION['enroll'] = $row['enroll']; // Set session variable for the user's enrollment number

                header("Location: http://localhost/DE/website/index.php#upload"); // Redirect to the home page
                exit();
            } else {
                header("Location: index.php?error=Incorrect User name or password"); // Redirect to index page with error message
                exit();
            }
            //header("Location: home.php"); // Redirect to the home page
        } else {
            header("Location: index.php"); // Redirect to index page
            exit();
        }
    }
} else {
    header("Location: index.php"); // Redirect to index page
    exit();
}
