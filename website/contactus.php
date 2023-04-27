<?php
// Start a new session
session_start();

// Include the database connection file
include "conn.php";

// Check if email, password, subject, and feedback are set
if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['subject']) && isset($_POST['feedback']))
{
    // Define a function to sanitize the input data
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
     }
 
     // Sanitize the input data
     $email = validate($_POST['email']);
     $password = validate($_POST['password']);
     $subject = validate($_POST['subject']);
     $feedback = validate($_POST['feedback']);

     // Check if the email is empty
     if (empty($email))
     { 
        header("Location: index.php?error=email is required");
	    exit();
	}
    
   // Check if the password is empty
   else if(empty($password))
   {       
       header("Location: index.php?error=Password is required");
       exit();
   }
   // Check if the subject is empty
   else if(empty($subject))
     {   
        header("Location: index.php?error=subject is required");
	    exit();
	}
    // Check if the feedback is empty
    else if(empty($feedback))
    {   
        header("Location: index.php?error=feedback is required");
	    exit();
	}
    else
    {
        // Encrypt the password using md5 encryption
        $password = md5($password);

        // Insert the sanitized input data into the database
        $sql2 = "INSERT INTO contactus(email,password,subject,feedback) VALUES('$email','$password','$subject','$feedback')";
        $result2 = mysqli_query($conn,$sql2);

        // Check if the query was successful
        if ($result2)
        {
            // Redirect to the index page with a success message
            header("Location: index.php?success=your request sent");
	        exit();
        }
        else
        {
	        // Redirect to the index page with an error message
	        header("Location: index.php?error=unknown error occurred");
		    exit();
        }
    }
}
else
{
	// Redirect to the index page
	header("Location: index.php");
	exit();
}
?>




