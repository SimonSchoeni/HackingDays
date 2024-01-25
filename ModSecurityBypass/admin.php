
<?php
$secondsWait = 10;
header("Refresh:$secondsWait");
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "tickets";
$conn = new mysqli($servername,$username, $password, $dbname);
$readSQL = "SELECT noteText FROM CurrentTickets;";
$result = mysqli_query($conn, $readSQL);
$htmlTemplateBegin = "<html><head></head><body><h1>Current Tickets</h1><br>";
$htmlTemplateEnd = "</body></html>";
while($row = mysqli_fetch_array($result)){
    $htmlTemplateBegin .= $row['noteText'];
}
$htmlTemplateBegin .=$htmlTemplateEnd;
echo $htmlTemplateBegin;
?>
