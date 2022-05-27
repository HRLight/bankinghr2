<?php
 require_once('includes/load.php');
if(isset($users_id["urlpath"])){
    // Get parameters
   
        $urlpath = $users_id["urlpath"];
        $id  = $users_id["id"];

        // Process download
         //SQL query update status
            $query = "UPDATE consol_report SET status = 'downloaded' WHERE users_id = '{$id}'";
            if($db->query($query)){
        if(file_exists($filepath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath));
            flush(); // Flush system output buffer
            readfile($filepath);

           
               
            }

            die();
        } else {
            http_response_code(404);
	        die();
        }
   
}
?>