<?php include 'header.php' ?>

<?php require_once('PasswordHash.php'); ?>

<?php require_once('abstractDAO.php'); ?>

<?php
$connection = mysqli_connect('127.0.0.1', 'root', '', 'wp_eatery');


session_start();
session_regenerate_id(false);


$AdminID = $_SESSION['AdminID'] = '1';
$_SESSION['username'] = 'admin';

echo ' Session AdminID = ' . $AdminID;


if (isset($_SESSION['abstractDAO'])) {
    if (!$_SESSION['abstractDAO']->isAuthenticated()) {
        header('Location:userlogin.php');
    }
} else {
    header('Location:userlogin.php');
}

?>
<?php


//connects to the database


//SQl Query to select requested data from the databse
$sqll = ('SELECT * FROM mailinglist');


//values from the database and sql query are stored in $result
$result = mysqli_query($connection, $sqll);

//creates table to contain the values returned from the database.
echo " <table border=2px, align=center>
    <tr>
        <th>Customer Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Referrer</th>
    </tr>";

while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['customerName'] . "</td>";
    echo "<td>" . password_hash($row['emailAddress'], PASSWORD_DEFAULT)  . "</td>";
    echo "<td>" . $row['phoneNumber'] . "</td>";
    echo "<td>" . $row['referrer'] . "</td>";

    echo "</tr>";
}
echo "
 </table>";



?>
<a href="logout.php">Logout!</a>
<?php include 'footer.php'; ?>