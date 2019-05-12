<?php

// search for user

if (isset($_POST['submit'])) {
    try  {
        
        require "../config.php";
        require "../common.php";

        $connection = new PDO($dsn, $username, $password, $options);

        $sql = "SELECT * 
                        FROM users
                        WHERE email = :email";

        $email = $_POST['email'];
        $statement = $connection->prepare($sql);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->execute();     
        

        $result = $statement->fetchAll();
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
?>
<?php require "header.php"; ?>
        
<?php  
if (isset($_POST['submit'])) {
    if ($result && $statement->rowCount() > 0) { ?>
        <h2><p style="text-align:center;">Results</p></h2>
        <table>
        <table align="center">
            <thead>
                <tr>
                    <th># </th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email Address</th>
                    <th>Age</th>
                    <th>Date of Creation</th>
                </tr>
            </thead>
            <tbody>
        <?php foreach ($result as $row) { ?>
            <tr>
                <td><?php echo escape($row["id"]); ?></td>
                <td><?php echo escape($row["firstname"]); ?></td>
                <td><?php echo escape($row["lastname"]); ?></td>
                <td><?php echo escape($row["email"]); ?></td>
                <td><?php echo escape($row["age"]); ?></td>
                <td><?php echo escape($row["date"]); ?> </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <?php } else { ?>
        <blockquote>No results found.</blockquote>
    <?php } 
} ?> 

<h2><p style="text-align:center;">Find user based on email</p></h2>
<form align="center" method="post">
    <label for="email">Email</label>
    <input type="text" id="email" name="email">
    <input type="submit" name="submit" value="View Results">
</form>

<a href="index.php"><p style="text-align:center;">Back to home</p></a>

<?php require "footer.php"; ?>
