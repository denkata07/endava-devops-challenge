
<?php

// create the db

require "../config.php";

try {
    $connection = new PDO("mysql:host=$host", $username, $password, $options);
    $sql = file_get_contents("../data/init.sql");
    $connection->exec($sql);
} catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}
?>

<?php include "header.php"; ?>

<ul>
	<p style="text-align:center;"><a href="create.php"><strong>Create</strong></a> - add a user</p>
	<p style="text-align:center;"><a href="read.php"><strong>Read</strong></a> - find a user</p>
</ul>

<?php include "footer.php"; ?>

