<?php
// Include the database connection file
include "conn.php";

// Get the token from the query string and convert it to an integer
$token = intval($_GET['token']);

try {
  // Delete the record with the matching token from the 'upload' table
  $result = mysqli_query($conn, "DELETE FROM upload WHERE token=$token") or die(mysqli_error($conn));
} catch (Exception $e) {
  // If an exception is caught, print the error message
  echo 'Caught exception: ', $e->getMessage();
}

// Redirect the user to the admin.php page
?>
<script type="text/javascript">
  window.location = "admin.php";
</script>