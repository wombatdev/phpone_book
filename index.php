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

<?php

if (file_exists("entries.json")) {
    $entry = array(
        'name' => $_POST["name"],
        'number' => $_POST["number"]
    );
    $str=file_get_contents("entries.json");
    $json = json_decode($str, true);
    if ($_POST["name"] != null && $_POST["number"] != null) {
        array_push($json, $entry);
    }
    if ($_POST["do_what"]) {
            $delnum = $_POST['delname'];
            unset($json[$delnum]);
            $json = array_values($json);
    }
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
    $_POST["name"] = null;
    $_POST["number"] = null;
    $_POST["do_what"] = null;
    echo $_POST["name"];
    echo $_POST["number"];
    echo $_POST["do_what"];
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
