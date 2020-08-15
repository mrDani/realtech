<?php

$conn = mysqli_connect("localhost", "root", "", "realtech");




                           $sql = "INSERT INTO list_of_names (firstname, lastname, username, age, email, phone_number, password)
                                VALUES ('$firstname', '$lastname', '$username', '$age', '$email', '$phone_number', '$pass')";
                                mysqli_query($conn, $sql);

                          $sql = "SELECT * FROM list_of_names WHERE username ='$username'";
                                $result = mysqli_query($conn, $sql);
                       if (mysqli_num_rows($result) > 0) {
                       	while ($row = msqli_fetch_assoc($result)) {
                       		$userid = $row['id'];
                       		$sql = "INSERT INTO profileimg (userid, status)
                                VALUES ('$userid', 1)";
                                mysqli_query($conn, $sql);
                                header("Location: profile.php");
                       	}
                       }else{
                       	echo "You have an error somewhere";
                       }


?>