<?php  
include "conn.php";
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the user has submitted a form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the PDF file from the database
    $token = $_POST['token'];
    $sql = "SELECT file FROM upload WHERE token = $token";
    $result = mysqli_query($conn, $sql);
    if ($result === false) {
        echo "Error retrieving file: " . mysqli_error($conn);
    } else {
        $row_count = mysqli_num_rows($result);
        if ($row_count == 1) {
            $row = mysqli_fetch_assoc($result);
            // Download the file
            // header('Content-Type: application/pdf');
            // header('Content-Disposition: attachment; filename="file.pdf"');
            // echo $row['file'];
            // exit;
        } else {
            echo "File not found.";
        }
    }
}

mysqli_close($conn);


?>