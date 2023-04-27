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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@1,700&family=Roboto+Slab&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
   <title>admin panel</title>

    <link rel="stylesheet" href="./style.css">
</head>

<body style="background-color: rgb(207,245,235);">

    <div class="container">
        <!-- Create a table to display data from the database -->
        <table class="table table-bordered m-2">
            <thead>
                <tr class="text-center" style="background-color: black; color:white; text-transform: capitalize; border:3px solid white;">
                    <th>file</th>
                    <th>orientation</th>
                    <th>color</th>
                    <th>side</th>
                    <th>type</th>
                    <th>email</th>
                    <th>firstname</th>
                    <th>mobile</th>
                    <th>status</th>
                    <th>token</th>
                    <th>time</th>
                    <th>Select</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch data from the database and display it in the table
                $res = mysqli_query($conn, "select * from upload");
                while ($row = mysqli_fetch_array($res)) {
                    echo "<tr>";
                    // header('Content-Type: application/pdf');

                    if (!empty($row["file"])) {

                        header('Content-Type: application/pdf');
                        echo "<td>";
                        $res->fetch_assoc()["file"];
                        echo "</td>";
                        // echo "<td>";  echo $row['file']; echo "</td>";


                    }
                    header('Content-Type: text/html');
                    echo "<td>";
                    echo $row["orin"];
                    echo "</td>";
                    echo "<td>";
                    echo $row["color"];
                    echo "</td>";
                    echo "<td>";
                    echo $row["side"];
                    echo "</td>";
                    echo "<td>";
                    echo $row["type"];
                    echo "</td>";
                    echo "<td>";
                    echo $row["email"];
                    echo "</td>";
                    echo "<td>";
                    echo $row["firstname"];
                    echo "</td>";
                    echo "<td>";
                    echo $row["mobile"];
                    echo "</td>";
                    echo "<td>";
                    echo $row["status"];
                    echo "</td>";
                    echo "<td>";
                    echo $row["token"];
                    echo "</td>";
                    echo "<td>";
                    echo $row["time"];
                    echo "</td>";
                    echo "<td>";  ?><a href="delete.php?token=<?php echo  $row["token"]; ?> <button type=" button" class="btn btn-danger">delete</button></a> <?php echo "</td>";
                                                                                                                                                            echo "</tr>";
                                                                                                                                                        }
                                                                                                                                                            ?>
            </tbody>
        </table>
    </div>

</body>

</html>