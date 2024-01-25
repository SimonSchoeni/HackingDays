<?php
require 'thing.php';
// PHP function without parameter
function phpFunction1() {
    echo "<br><br>";
    echo "Constructed a new very verbose object. <br> You will see a lot of its output throughout this call.<br>";
    $obj = new Test();
    echo "<br> Following output was received from the object: <br>";
    echo $obj->PrintVariable();
    echo "<br>--------------------------------------------------------<br>";
    echo "serialized it looks like the following: <br>";
    $serialized = serialize($obj);
    echo $serialized;
}

// PHP function with a parameter
function phpFunction2($content) {
    echo "<br>-------------------------------------------<br>";
    echo "Beginning to unserialize.... <br>";
    $obj = unserialize($content);
    echo "<br>-------------------------------------------<br>";
    echo "Content of the PrintVariable method: <br>";
    echo $obj->PrintVariable();
    echo "<br> end of print variable method";
}

// Check if the request is for the first PHP function
if (isset($_GET['serialize'])) {
    phpFunction1();
}

// Check if the request is for the second PHP function
if (isset($_POST['content'])) {
    $input = $_POST['content'];
   // $input = urldecode($tmp);
    //$input = urldecode($_POST['content']);
    echo "<br>-------------------------------------------<br>";
    echo "I received the following: <br>";
    echo $input;
    echo "<br>-------------------------------------------<br>";
    echo "Now for the deserialization: <br>";
    phpFunction2($input);
}
?>
