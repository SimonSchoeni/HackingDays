<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP and HTML Example</title>
</head>
<body>

    <!-- Button to call PHP function -->
    <button onclick="callPHPFunction()">Get Example of a serialized object</button>
    
    <!-- Display area for the result of the PHP function call -->
    <label id="phpResultLabel"></label>

    <hr>

    <!-- Textarea and button to post content to PHP function -->
    <textarea id="inputText" rows="4" cols="50" placeholder="Enter text..."></textarea><br>
    <button onclick="postContent()">Deserialize my Object!</button>

    <!-- Display area for the result of the second PHP function call -->
    <label id="phpResultLabel2"></label>

    <script>
        // Function to call PHP function without any parameter
        function callPHPFunction() {
            // Using AJAX to call the PHP function
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("phpResultLabel").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "serialize.php?serialize=true", true);
            xmlhttp.send();
        }

        // Function to post content to PHP function
        function postContent() {
            // Getting content from the textarea
            var content = document.getElementById("inputText").value;
            console.log(content);
            // Using AJAX to call the PHP function with a parameter
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("phpResultLabel2").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("POST", "serialize.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("content=" + content);
        }
    </script>

</body>
</html>
