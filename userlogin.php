<?php include 'header.php'; ?>

<?php
require_once('abstractDAO.php');
session_start();

if (isset($_SESSION['abstractDAO'])) {
    if ($_SESSION['abstractDAO']->isAuthenticated()) {
        session_write_close();
        header('Location:mailing_list.php');
    }
}
$missingFields = false;

if (isset($_POST['submit'])) {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        if ($_POST['username'] == "" || $_POST['password'] == "") {
            $missingFields = true;
        } else {
            //All fields set, fields have a value
            $adminUser = new abstractDAO();
            if (!$adminUser->hasDbError()) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $adminUser->authenticate($username, $password);
                if ($adminUser->isAuthenticated()) {
                    $_SESSION['abstractDAO'] = $adminUser;
                    header('Location:mailing_list.php');
                }
            }
        }
    }
}

?>


<?php
//Missing username/password
if ($missingFields) {
    echo '<h3 style="color:red;">Please enter both a username and a password</h3>';
}

//Authentication failed
if (isset($adminUser)) {
    if (!$adminUser->isAuthenticated()) {
        echo '<h3 style="color:red;">Login failed. Please try again.</h3>';
    }
}
?>

<!-- <?php echo '<p>Session ID: ' . session_id() . '</p>'; ?> -->
<form name="login" id="login" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <table>
        <tr>
            <td>Username:</td>
            <td><input type="text" name="username" id="username"></td>
        </tr>
        <tr>
            <td>Password:</td>
            <td><input type="password" name="password" id="password"></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" id="submit" value="Login"></td>

        </tr>
    </table>

</form>
</body>

</html>

<?php include 'footer.php'; ?>