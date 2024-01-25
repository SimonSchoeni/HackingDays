<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticketing</title>
</head>
<body>
    <h1>Hellas and welcome to our service desk. You may leave a ticket below.</h1>
    <!-- Textarea and button to post content to PHP function -->
    <textarea id="inputText" rows="4" cols="50" placeholder="Enter text..."></textarea><br>
    <button onclick="postContent()">Leave a Ticket....</button>

    <!-- Display area for the result of the second PHP function call -->
    <label id="phpResultLabel2"></label>

    <script>
        // Function to post content to PHP function
        function postContent() {
            // Getting content from the textarea
            var content = encodeURI(document.getElementById("inputText").value);
            console.log(content);
            // Using AJAX to call the PHP function with a parameter
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4) {
                    document.getElementById("phpResultLabel2").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("POST", "ticket.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("content=" + content);
        }
    </script>

</body>
</html>
