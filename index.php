<!DOCTYPE html>
<html>
<head>
    <title>PHPWNAGE BOOK</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>PHPWNED BOOK</h1>

<?php
if (file_exists("entries.json")) {
    $str=file_get_contents("entries.json");
    $json = json_decode($str, true);
    for ($i=0; $i<sizeof($json); $i++) {
        echo "<h2>";
        print_r($json[$i]['name']);
        echo "</h2>";
        echo "<p>";
        print_r($json[$i]['number']);
        echo "</p>";
        echo "
            <form action='post.php' method='POST'>
                <input type='hidden' name='do_what' value='delete' />
                <input type='hidden' name='delname' value='$i' />
                <button type='submit'>Delete</button>
            </form>
            ";
    };
    $encode = json_encode($json, true);
    file_put_contents("entries.json",$encode);
}
else {
    echo "Whiskey niner";
}
?>

<form method="POST" action="post.php">
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

</body>
</html>
