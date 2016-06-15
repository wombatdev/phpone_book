<!DOCTYPE html>
<html>
<head>
    <title>PHPWNAGE BOOK</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <!-- <script src="war.js"></script> -->
</head>
<body>

<h1>PHPWNED BOOK</h1>
<!-- <h2>Enter your name for PHPWNAGE:</h2> -->

<form method="post" action="index.php">
    <fieldset>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter your name" />
    </fieldset>
    <fieldset>
        <label for="number">Number:</label>
        <input type="text" id="number" name="number" placeholder="Enter your number" />
    </fieldset>
    <input type="submit" value="Submit your information" />
</form>

Welcome <?php echo $_POST["name"]; ?><br>
Your number is: <?php echo $_POST["number"]; ?>

</body>
</html>
