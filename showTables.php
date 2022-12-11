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
    <table>
        
    </table>
        <?php
            session_start();
            $servername = "localhost";
            $username = "root";
            $password= "";
            
            $conn = mysqli_connect($servername, $username, $password, 'school2');

            $tableArr = array("class_name", "school_subject", "student", "teacher", "users");

            // public function MakeQuery($tableName, $connection)
            // {
            //     $query = "SELECT * FROM '$tableName'" 
            //     $result = mysqli_query($connection, $query);

            // }


            function show_table_data($table_name, $conn) {
                $data = $conn->query("SELECT * FROM $table_name")->fetchAll(PDO::FETCH_ASSOC);
                $columns = array_keys($data[0]);
              
                echo implode(',', $columns) . "\n";

                foreach ($data as $row) {
                  echo implode(',', $row) . "\n";
                }
              }

            if (!$conn) {
                        error_log("Failed to connect to mysql: " . mysqli_error($conn));
                        die("Connection failed: " . mysqli_connect_error());
            }              
            else{
                mysqli_select_db($conn, 'school2');             
               
                foreach ($tableArr as $value){
                    // echo $tableArr[$value];
                    show_table_data($value, $conn);
                }
                    
                mysqli_close($conn);
            }
            
        ?>
        </div>
    </form>
    
    
    

    
    


</body>
</html>