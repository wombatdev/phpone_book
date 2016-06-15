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
        header('Location:index.php');
    ?>
</body>
</html>
