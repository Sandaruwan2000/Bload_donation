<?php
// database connect
include "db_conn.php";

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $location = $_POST['location'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    // File upload handling
    if (isset($_FILES['image'])) {
        $image = $_FILES['image']['name'];
        $temp_name = $_FILES['image']['tmp_name'];
        $target_path = 'upload/' . $image;

        // Check if a file was selected for upload
        if (!empty($image) && move_uploaded_file($temp_name, $target_path)) {
            // Insert the data into the database
            $sql = "INSERT INTO `form`(`id`, `name`, `lacation`, `date`, `time`, `image`) 
            VALUES (NULL, '$name', '$location', '$date', '$time', '$image')";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                header("Location: view.php?msg=New record created successfully");
                exit;
            } else {
                echo "Failed: " . mysqli_error($conn);
            }
        } else {
            echo "File upload failed.";
        }
    } else {
        echo "No file selected.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Camping</title>
    <link rel="stylesheet" href="project.css">
    
    <script>
        // script message
        function myFunction() {
            alert("The form was submitted");
        }
    </script>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Camping</title>
    <link rel="stylesheet" href="form.css">
    
 
</head>
<body>
    
<?php
include "header.php" ;
?>  


<div class=em >
    <form action="" method="post" class="pform" enctype="multipart/form-data" onsubmit="myFunction()">
        <table class="ptable">
            <tr>
                <td>Event:</td>
                <td><input type="text" id="name" name="name" required></td>
            </tr>
            <tr>
                <td><br>Location</td>
                <td><br><input type="text" id="location" name="location" required></td>
            </tr>
            
            <tr>
                <td><br>Date:</td>
                <td><br><input type="date" id="date" name="date"  required></td>
            </tr>

            <tr>
                <td><br>Time:</td>
                <td><br><input type="time" id="time" name="time"  required></td>
            </tr>

            <tr>
                <td><br>Venue:</td>
                <td><br><input type="file" id="image" accept=".jpg, .jpeg, .png" name="image" required> </td>
            </tr>
         
            <tr>
                <td><br><button type="submit" name="submit" value="submit">Submit</button></td>
            </tr>
        </table>
    </form>

    
    <script>//script masseage 
            function myFunction() {
            alert("The form was submitted");
            }
    </script>


</div>

        

</body>
</html>