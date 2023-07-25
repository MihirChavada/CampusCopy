<?php
// include database connection
include "conn.php";

// start session
session_start();

// check if form data is submitted
if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['mobile']) && isset($_POST['enroll']) && isset($_POST['sem']) && isset($_POST['password']))
{
    // function to validate form input data
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // validate form input data
    $firstname = validate($_POST['firstname']);
    $lastname = validate($_POST['lastname']);
    $email=validate($_POST['email']);
    $mobile=validate($_POST['mobile']);
    $enroll=validate($_POST['enroll']);
    $sem=validate($_POST['sem']);
    $password=validate($_POST['password']);

    // check if form input data is empty
    if(empty($firstname))
    {
        header("Location: index.php?error=first name is required");
        exit();
    }
    else if(empty($lastname))
    {
        header("Location: index.php?error=last name is required");
        exit();
    }
    else if(empty($email))
    {
        header("Location: registration.html?error=email is required");
        exit();

    }
    else if(empty($mobile))
    {
        header("Location: index.php?error=mobile number is required");
        exit();
    }
    else if(empty($enroll))
    {
        header("Location: index.php?error=enrollment/roll number is required");
        exit();
    }
    else if(empty($sem))
    {
        header("Location: index.php?error=semester/branch is required");
        exit();
    }
    else if(empty($password))
    {
        header("Location: index.php?error=pasword is required");
        exit();
    }
    else
    {
        // encrypt password with md5
        $password=md5($password);
        
        // check if email is already registered
        $sql="SELECT * FROM user WHERE email='$email'";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0)
        {
            header("Location: index.php?error=email is already registered");
            exit();
        }
        else
        {
            // insert user data into database
            $sql2="INSERT INTO user(firstname,lastname,email,mobile,enroll,sem,password) VALUES('$firstname','$lastname','$email','$mobile','$enroll','$sem','$password')";
            $result2=mysqli_query($conn,$sql2);
            if ($result2)
            {
                header("Location: index.php?success=Your account has been created successfully");
                exit();
            }
            else
            {
                header("Location: index.php?error=unknown error occurred");
                exit();
            }
        }
    }
}
else
{
    // redirect to index page if form data is not submitted
    header("Location: index.php");
    exit();
}
?>


