<?php 
// Starting a session
session_start();

// Including the database connection file
include "conn.php";

// Checking if all the required fields are set
if(isset($_POST['orin']) && isset($_POST['color']) && isset($_POST['side']) && isset($_POST['type']))
{
    // Checking if the user is logged in or not
    if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) 
    {
        // If not logged in, redirecting to the login page
        header('Location: index.php#modal');
        exit();
    }
    else
    {
        // Displaying a success message and logout and upload links
        echo "Yes, session started"; ?>
        <a href="logout.php">Logout</a>
        <a href="index.php#upload">upload</a>
        <?php 

        // Storing the form data in variables
        // $file = $_POST['file'];
        $orin = $_POST['orin'];
        $color = $_POST['color'];
        $side = $_POST['side'];
        $type = $_POST['type'];
        $token = mt_rand(1000, 9999);
        $time = date('Y-m-d H:i:s');
        $firstname = $_SESSION['firstname'];
        $mobile = $_SESSION['mobile'];
        $email = $_SESSION['email'];
        $status = true;

        if ($_SERVER["REQUEST_METHOD"] == "POST"){

            // Check if a file was uploaded
            if ($_FILES["file"]["error"] == UPLOAD_ERR_OK) {
        
                // Get the contents of the uploaded file
                $filee = file_get_contents($_FILES["file"]["tmp_name"]);
        
                // Escape special characters in the file contents
                $filee = $conn->real_escape_string($filee);
        
                // Insert the file contents into the database
                $sql = "INSERT INTO upload(file,orin,color,side,type,email,firstname,mobile,status,token,time) VALUES('$filee','$orin','$color','$side','$type','$email','$firstname','$mobile','$status','$token','$time')";
        
                if ($conn->query($sql) === TRUE) {
                    echo "PDF file uploaded successfully";
                } else {
                    echo "Error uploading PDF file: " . $conn->error;
                }
            } else {
                echo "Error uploading PDF file: " . $_FILES["file"]["error"];
            }
        }

    
    }
}
else{
    echo "error";
}
?>

