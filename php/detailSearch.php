<?php   
    include "includes/dbh.inc.php";
?>
    

<h1>Detail Search</h1>

<div class="container-fluid">
    <?php

        $profileId = mysqli_real_escape_string($conn, $_GET['id']);

        $sql = "SELECT * FROM profile WHERE id='$profileId'";
        $result = mysqli_query($conn, $sql);
        $queryResults = mysqli_num_rows($result);

        if ($queryResults > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='article-box'>
                    <h2>Personal Information</h2>
                    <p>".$row['fullName']."</p>
                    <p>".$row['address']."</p>
                    <p>".$row['city']."</p>
                    <p>".$row['country']."</p>
                    <p>".$row['dob']."</p>
                    <p>".$row['ethnicity']."</p>
                    <p>".$row['martialStatus']."</p>
                    <p>".$row['nationality']."</p>
                    <p>".$row['phoneNum']."</p>
                </div>";
            }
        }

        $sql1 = "SELECT * FROM student WHERE profile_id='$profileId'";
        $result1 = mysqli_query($conn, $sql1);
        $queryResults1 = mysqli_num_rows($result);

        if ($queryResults1 > 0) {
            while ($row1 = mysqli_fetch_assoc($result1)) {
                echo "<div class='article-box'>
                    <h2>Major</h2>
                    <p>".$row1['id']."</p>
                </div>";
            }
        }

    ?>
</div>

</body>
</html>