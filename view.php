<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Report</title>
    <link rel="stylesheet" href="view.css">
</head>
<body>
<?php
include "header.php" ;
?>  

    
    <div class="vtype">
        <a href="form.php"><button class="addnew">ADD NEW</button></a>
        <table class="vr" style=" position: relative; left:270px;">
            <thead>
                <tr>
                    <th scope="col">Event No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Venue</th>
                    <th class="a">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "db_conn.php";//dataase conector

                $sql = "SELECT * FROM `form`";//retreive in database
                
                
            
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['lacation'] ?></td>
                        <td><?php echo $row['date'] ?></td>
                        <td><?php echo $row['time'] ?></td>
                        <td><img src="upload/<?php echo $row['image']; ?>" alt="venue" width="200px" height="100px"></td>
                        
                        <td>
                            <a href="update_form.php?updateid=<?php echo $row['id'];?> "><button class="edit">Edit</button></a> 
                            <a href="delete.php?deleteid=<?php echo $row['id'];?> "><button class="delete">Delete</button></a>
                        </td>
                    </tr>
                    <?php
                }     
               ?>
                
            </tbody>
        </table>
    </div>
</body>
</html>