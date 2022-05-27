<?php

    
    define('DBINFO','mysql:host=localhost;dbname=u811015322_obms_db');
    define('DBUSER','u811015322_Systembanking6');
    define('DBPASS','Systembanking6@gmail');

    function performQuery($query){
        $con = new PDO(DBINFO,DBUSER,DBPASS);
        $stmt = $con->prepare($query);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    function fetchAll($query){
        $con = new PDO(DBINFO, DBUSER, DBPASS);
        $stmt = $con->query($query);
        return $stmt->fetchAll();
    }

?>