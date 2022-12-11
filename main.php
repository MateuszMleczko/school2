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
    <form action="main.php" method="post">
        <div class="form__inputs">

            <input type="text" name="pass" placeholder="change ur password" required>
            <input type="text" name="repeatPass" placeholder="repeat ur password" required>
            <label for="taken">are u in relationship?</label>
            <input type="checkbox" name="taken">
            <input type="text" name="fname" placeholder="change ur name" required>
            <input type="text" name="sname" placeholder="change ur surname" required>
            <input type="number" name="age" placeholder="change ur age" required>
            <input type="submit" value="SUBMIT">
            <input type="submit" onclick="location.href = 'adClass.php';" value="AD CLASS" >
            <input type="submit" onclick="location.href = 'adSubject.php';" value="AD SUBJECT" >
            <input type="submit" onclick="location.href = 'adStudent.php';" value="AD STUDENT" >
            <input type="submit" onclick="location.href = 'adTeacher.php';" value="AD TEACHER" >
            <input type="submit" onclick="location.href = 'showTables.php';" value="SHOW DATA" >
            

        <link rel="stylesheet" href="style.css">

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
                $pass = $_POST['pass'];
                $repeatPass = $_POST['repeatPass'];
                if(isset($_POST['takenn']))
                {
                    $isTaken = 1;
                }
                else
                {
                    $isTaken = 0; 
                }
                $fname = $_POST['fname'];
                $sname = $_POST['sname'];
                $age = $_POST['age'];
                
                if($pass == $repeatPass) {
                    $pass = password_hash($_POST['pass'],PASSWORD_DEFAULT); $change_columns = "UPDATE users 
                        SET pass = '{$pass}',
                            taken = '{$isTaken}',
                            name = '{$fname}',
                            surname = '{$sname}',
                            age = '{$age}' WHERE login = '{$_SESSION['logintoken']}'";
                        mysqli_query($conn, $change_columns);
                    }
                    else{
                        echo "passwords are not the same";
                    }
                    
                mysqli_close($conn);
            }
            ?>
        </div>
    </form>
    
    
    

    
    


</body>
</html>