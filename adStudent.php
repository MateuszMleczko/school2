<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="adStudent.php" method="post">
        <div class="form__inputs">
            <h1>Add Student</h1>
            <input type="text" name="fname" placeholder="Enter ur name" required>
            <input type="text" name="sname" placeholder="Enter ur surname" required>
            <input type="submit" value="SUBMIT">
            <input type="submit" onclick="location.href = 'adClass.php';" value="AD CLASS" >
            <input type="submit" onclick="location.href = 'adSubject.php';" value="AD SUBJECT" >
            <input type="submit" onclick="location.href = 'adStudent.php';" value="AD STUDENT" >
            <input type="submit" onclick="location.href = 'adTeacher.php';" value="AD TEACHER" >
            <?php

            session_start();
            
            $servername = "localhost";
            $username = "root";
            $password= "";
            
            $conn = mysqli_connect($servername, $username, $password, 'school2');

            if (!$conn) {
                error_log("Failed to connect to mysql: " . mysqli_error($conn));
                die("Connection failed: " . mysqli_connect_error());
            }

            else{
                mysqli_select_db($conn, 'school2');
                

                if(isset($_POST["fname"]) && isset($_POST["sname"])){
                    
                    $fname = $_POST['fname'];
                    $sname = $_POST['sname'];

                    $sql = "INSERT INTO student(fname, surname)  VALUES ('$fname', '$sname')";
                        if($conn -> query($sql)) {
                        echo "New record created successfully"; 
                        }
                }        
            }
        ?>
        </div>

    </form>
</body>
</html>