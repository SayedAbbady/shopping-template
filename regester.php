<?php 
    session_start();
    if(isset($_SESSION['valid']) && $_SESSION['valid'] == true){
        header('location:index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/test.css">
</head>
<body>
    <div class="contaner">
        <div class="signup">
            <?php
                if (isset($_POST['sign'])) {
                    require_once 'connection.php';
                    if(empty($_POST['nameSign']) || empty($_POST['emailSign']) || empty($_POST['passSign'])){
                        echo "<div class='alert alert-danger'>The field must be full</div>";
                    } else {
                        // $targetdir = 'img/user/';
                        // $targetfile = $targetdir . basename($_FILES['fileup']['name']);
                        // move_uploaded_file($_FILES["fileup"]["tmp_name"], $targetfile);
                        $name = $_POST['nameSign'];
                        $email = $_POST['emailSign'];
                        $phone = $_POST['phoneSign'];
                        $pass = $_POST['passSign'];
                        $Conpass = $_POST['conpassSign'];
                        $sql = "INSERT INTO `user` (`u_name`, `u_email`, `u_phone`, `u_password`)
                        VALUES (?,?,?,?)";
                        $stmt = $conn->prepare($sql);
                        $stmt->bindParam(1,$name,PDO::PARAM_STR);
                        $stmt->bindParam(2,$email);
                        $stmt->bindParam(3,$phone,PDO::PARAM_INT);
                        // $stmt->bindParam(5,$targetfile);
                        if($pass == $Conpass || $phone != 0){
                            $stmt->bindParam(4,$pass);
                            $stmt->execute();
                            echo"<div class='alert alert-success'>Now you are membership</div>";
                            // header("location:regester.php");
                        } else {
                            echo "<div class='alert alert-danger'>The password not matched</div>";
                        }   
                    }
                }
            ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <p>signup</p>
                <input type="text" placeholder="Username" name="nameSign">
                <input type="email" placeholder="Email" name="emailSign">
                <input type="text" placeholder="Phone" name="phoneSign">
                <!-- <input type="file" name="fileup"> -->
                <input type="password" placeholder="password" name="passSign">
                <input type="password" placeholder="Confirm password" name="conpassSign">
                <input type="submit" value="signup" name="sign">
            </form>
        </div>
        <div class="login">
            <form action="" method="POST">
                <?php
                    if(isset($_POST["login"])){
                        include 'connection.php';
                        $emaillog = $_POST["emaillog"];
                        $passlog = $_POST["passlog"];
                        $sql = "SELECT * FROM `user` where u_email= '$emaillog' and u_password= '$passlog'";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        if($stmt->rowCount() == 1 ){
                            $_SESSION['valid'] = true;
                            
                            $_SESSION["id"] = $stmt->fetchColumn(0);
                            
                            // echo $_SESSION["userpho"]; 
                            header('location: index.php');
                        } else {
                            echo "<div class='alert alert-danger'>Sorry you not allowed </div>";
                        }
                    }
                ?>
                <p>login</p>
                <input type="email" placeholder="Email" name="emaillog">
                <input type="password" placeholder="password" name="passlog">
                <input type="submit" value="login" name="login">
            </form>
        </div>
    </div>
<?php
    include 'footer.php';
?>

