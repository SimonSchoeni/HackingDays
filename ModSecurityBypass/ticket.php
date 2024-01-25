<?php

function phpFunction2($content) {
    try{
        $servername = "localhost";
        $username = "root";
        $password = "password";
        $dbname = "tickets";
//	echo "set params";
        $conn = new mysqli($servername,$username, $password, $dbname);
        $insertstmt = $conn->prepare("INSERT INTO CurrentTickets(noteText) VALUES(?)");
//	echo "connected";
        $insertstmt->bind_param("s",$content);
        $insertstmt->execute();
    }
    catch(Exception $e){
        echo "error";
        echo $e->getMessage();
    }  
    
    echo "Ticket created sucessfully!";
}


// Check if the request is for the second PHP function
if (isset($_POST['content'])) {
    $input = urldecode($_POST['content']);
    phpFunction2($input);
}
?>
