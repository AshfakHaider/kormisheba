<?php
    function connectDB(){
        $serverName = "localhost";
        $userName = "mysql";
        $pass = " ";
        $database = "kormisheba";
        // connecting to db
        $connect = new mysqli($serverName, $userName, $pass, $database);

        //check connectons
        if($connect->connect_error){
            die("Connection failed: " . $connect->connect_error);
        }//else echo "connected successfully"; 
        return $connect;
    }
    
    function selectQuery($query){
        $connect = connectDB();
        // Query
        //$sql = "SELECT title, description, price, days, images FROM service";
        $result = $connect->query($query);

        if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()) {
                return $row;
            }
        }else{
            return 'error';
        }
    }

    function selectAllQuery($query){
        $connect = connectDB();
        // Query
        //$sql = "SELECT title, description, price, days, images FROM service";
        $result = $connect->query($query);
        if ($result->num_rows > 0){
            $data = array();
            while($row = $result->fetch_assoc()) {
                // foreach($row as $r){}
                array_push($data, $row);
            }
            if(!empty($data)) return $data;
            else echo "Error no data";
        }
    }

    function insertQuery($query){
        $connect = connectDB();
        // Query
        //$sql = "SELECT title, description, price, days, images FROM service";
        if ($connect->query($query) === TRUE) {
            return TRUE;
        } else {
            echo "Error: " . $query . "<br>" . $connect->error;
        }
    }

    
?>