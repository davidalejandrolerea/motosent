<?php 


$conn = new mysqli("localhost","root","","moto_sent_fsa");
        $count=0;
        if(!empty($_POST['add'])) {
                $subject = mysqli_real_escape_string($conn,$_POST["subject"]);
                $comment = mysqli_real_escape_string($conn,$_POST["comment"]);
                $sql = "INSERT INTO comments (subject,comment) VALUES('" . $subject . "','" . $comment . "')";
                mysqli_query($conn, $sql);
        }
        $sql2="SELECT * FROM comments WHERE status = 0";
        $result=mysqli_query($conn, $sql2);
        $count=mysqli_num_rows($result);



 ?>