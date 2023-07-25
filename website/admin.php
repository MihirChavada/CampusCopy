<?php
// Include database connection
include "conn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- Include jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Include Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>admin panel</title>
</head>
<body>

<div class="container">
    <!-- Create a table to display data from the database -->
    <table class="table table-bordered" margin="20px;">
        <thead>
            <tr>
                <!-- <th>file</th> -->
                <th>view</th>
                <th>orin</th>
                <th>color</th>
                <th>side</th>
                <th>type</th>
                <th>email</th>
                <th>firstname</th>
                <th>mobile</th>
                <th>status</th>
                <th>token</th>
                <th>time</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch data from the database and display it in the table
            $res=mysqli_query($conn,"select * from upload");
            while($row=mysqli_fetch_array($res))
            {
                echo "<tr>";
                // header('Content-Type: application/pdf');
                
                // echo "<td>";  echo $row['file']; echo "</td>";
                echo "<td>";?> <form method="post" action="view.php">
                <input type="hidden" name="token" value="<?php echo $row["token"]; ?>">
                <button type="submit" class="btn btn-primary">view</button>
                </form> <?php echo "</td>";
                echo "<td>";  echo $row["orin"]; echo "</td>";
                echo "<td>";  echo $row["color"]; echo "</td>";
                echo "<td>";  echo $row["side"]; echo "</td>";
                echo "<td>";  echo $row["type"]; echo "</td>";
                echo "<td>";  echo $row["email"]; echo "</td>";
                echo "<td>";  echo $row["firstname"]; echo "</td>";
                echo "<td>";  echo $row["mobile"]; echo "</td>";
                echo "<td>";  echo $row["status"]; echo "</td>";
                echo "<td>";  echo $row["token"]; echo "</td>";
                echo "<td>";  echo $row["time"]; echo "</td>";
                echo "<td>";  ?><a href="delete.php?token=<?php echo  $row["token"]; ?> <button type="button" class="btn btn-danger">delete</button></a>  <?php echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
    
</body>
</html>
