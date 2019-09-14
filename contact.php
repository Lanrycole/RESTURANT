<?php require_once('customerDAO.php'); ?>
<?php include 'header.php'; ?>
<?php include 'PasswordHash.php'; ?>

<?php
try {

    //create a new instance of the customerDAO.
    $customerDAO = new customerDAO();

    //boolean to check if certain conditons are met
    $hasError = false;

    $errorMessages = array();

    if (
        //gets values through post from the input form
        isset($_POST['customerName']) ||
        isset($_POST['phoneNumber']) ||
        isset($_POST['emailAddress']) ||
        isset($_POST['referral'])
    ) {


        //sets conditons to be met for valid customerName 
        if (empty($_POST["customerName"])) {
            $hasError = true;
            $errorMessages['NameError'] = 'Enter a valid Name.';
        }
        //sets conditons to be met for valid Phone Number 
        if (empty($_POST["phoneNumber"]) || !is_numeric($_POST["phoneNumber"])) {
            $errorMessages['PhoneError'] = "Enter a valid Phone.";
            $hasError = true;
        }
        //sets conditons to be met for valid emailaddress 
        if (empty($_POST["emailAddress"]) || filter_var($_POST["emailAddress"], FILTER_VALIDATE_EMAIL) == false) {
            $errorMessages['emailError'] = "Enter a valid Email.";
            $hasError = true;
        }
        //sets conditons to be met for valid referrer
        if (empty($_POST["referral"])) {
            $errorMessages['referError'] = "Choose a Referrer.";
            $hasError = true;
        }

        //if there are no errors in the value from $_POST, values from $_POST are extracted.
        if (!$hasError) {
            $customer = new Customer($_POST['customerName'], $_POST['phoneNumber'], $_POST['emailAddress'], $_POST['referral']);
            $customerAdded = $customerDAO->addCustomer($customer);
            echo '<h3>' . $customerAdded . '</h3>';
        }

        $target_path = "files/";
        $target_path = $target_path . basename($_FILES['myfile']['name']);

        if (move_uploaded_file($_FILES['myfile']['tmp_name'], $target_path)) {
            $fileUploaded = "The file " . basename($_FILES['myfile']['name']) . " has been uploaded";
            echo "<p>$fileUploaded</p>";
        } else {
            echo "There was an error uploading the file, please try again!";
        }
    }


    ?>
    <div id="wrapper">
        <div id="content" class="clearfix">
            <aside>
                <h2>Mailing Address</h2>
                <h3>1385 Woodroffe Ave<br>
                    Ottawa, ON K4C1A4</h3>
                <h2>Phone Number</h2>
                <h3>(613)727-4723</h3>
                <h2>Fax Number</h2>
                <h3>(613)555-1212</h3>
                <h2>Email Address</h2>
                <h3>info@wpeatery.com</h3>
            </aside>
            <div class="main">
                <h1>Sign up for our newsletter</h1>
                <p>Please fill out the following form to be kept up to date with news, specials, and promotions from the WP eatery!</p>


                <form name="frmNewsletter" id="frmNewsletter" method="post" enctype="multipart/form-data" action="contact.php">
                    <table>
                        <tr>
                            <td>Name:</td>
                            <td><input type="text" name="customerName" id="customerName" size='40'></td>

                            <?php
                            //If there was an error with the employeeId field, display the message
                            if (isset($errorMessages['NameError'])) {
                                echo '<td style=\'color:red\'>' . $errorMessages['NameError'] . '</td>';
                            }
                            ?>
                        </tr>
                        <tr>
                            <td>Phone Number:</td>
                            <td><input type="text" name="phoneNumber" id="phoneNumber" size='40'></td>
                            <?php
                            //If there was an error with the employeeId field, display the message
                            if (isset($errorMessages['PhoneError'])) {
                                echo '<td style=\'color:red\'>' . $errorMessages['PhoneError'] . '</td>';
                            }
                            ?>
                        </tr>
                        <tr>
                            <td>Email Address:</td>
                            <td><input type="text" name="emailAddress" id="emailAddress" size='40'>
                                <?php
                                //If there was an error with the employeeId field, display the message
                                if (isset($errorMessages['emailError'])) {
                                    echo '<td style=\'color:red\'>' . $errorMessages['emailError'] . '</td>';
                                }
                                ?>
                        </tr>
                        <tr>
                            <td>How did you hear<br> about us?</td>
                            <td>Newspaper<input type="radio" name="referral" id="referralNewspaper" value="newspaper">
                                Radio<input type="radio" name='referral' id='referralRadio' value='radio'>
                                TV<input type='radio' name='referral' id='referralTV' value='TV'>
                                Other<input type='radio' name='referral' id='referralOther' value='other'>

                                <?php
                                //If there was an error with the employeeId field, display the message
                                if (isset($errorMessages['referError'])) {
                                    echo '<td style=\'color:red\'>' . $errorMessages['referError'] . '</td>';
                                }
                                ?>
                        </tr>

                        <td>
                            File:
                        </td>
                        <td>
                            <input type="file" name="myfile" value="">
                        </td>
                        <tr>
                            <td colspan='2'><input type='submit' name='btnSubmit' id='btnSubmit' value='Sign up!'>&nbsp;&nbsp;<input type='reset' name="btnReset" id="btnReset" value="Reset Form"></td>
                        </tr>
                    </table>



                <?php
                //catches exception if there are any.
            } catch (Exception $e) {
                echo " Page contains error "  .      $e->getMessage();
            }


            ?>

                <?php include 'footer.php'; ?>