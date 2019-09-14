<?php include 'header.php' ?>
<?php require_once('abstractDAO.php'); ?>
<?php require_once('customerDAO.php'); ?>



<?php
// $connection = mysqli_connect('127.0.0.1', 'root', '', 'wp_eatery');


session_start();
session_regenerate_id(false);


$AdminID = $_SESSION['AdminID'] = '1';
$_SESSION['username'] = 'admin';

echo ' Session AdminID = ' . $AdminID;


$customer = new CustomerDAO();

if (isset($_POST['delete']) && !empty(($_POST['delete']))) {

    $customer->deleteCustomer($_POST['delete']);
    echo "<br> Customer Id " . $_POST['delete'] . " Successfully Deleted";
} else {
    echo "<br> Please Enter a customer ID to be deleted";
}

?>

<form action="deleteCustomer.php" method="post">
    <table>
        <tr>
            <th>
                Enter a number to be deleted <input type="text" name='delete' id="delete" value=''>
            </th>
        </tr>
        <th> <button>Delete</button></th>

    </table>
</form>

<a href="logout.php">Logout!</a>

<?php include 'footer.php'; ?>