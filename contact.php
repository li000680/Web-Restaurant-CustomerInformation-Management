<?php $title="WP Eatery - Contact"; include 'header.php'; include './dao/customContactDAO.php'; include './model/customContact.php'?>
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
                <?php
                $nameErr = $emailErr = $phoneErr = $referralErr = "";
                $customerName = $emailAddress = $phoneNumber = $referral = $deletedCustomerNames = "";
                $hasError = false;

                if ($_SERVER["REQUEST_METHOD"] == "POST")
                {
                    if (empty($_POST["customerName"]))
                    {
                        $nameErr = "Please input customer name";
                        $hasError = true;
                    }
                    else
                    {
                        $customerName = $_POST["customerName"];
                    }

                    if (empty($_POST["emailAddress"]))
                    {
                        $emailErr = "Please input email address";
                        $hasError = true;
                    }
                    else
                    {
                        $emailAddress = $_POST["emailAddress"];
                        if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$emailAddress))
                        {
                            $emailErr = "Invalid email address";
                            $hasError = true;
                        }
                    }

                    if (empty($_POST["phoneNumber"]))
                    {
                        $phoneErr = "Please input phone number";
                        $hasError = true;
                    }
                    else
                    {
                        $phoneNumber = $_POST["phoneNumber"];
                        if (!preg_match("/(^[1-9]+\d{2}+\-+\d{3}+\-+\d{4})/",$phoneNumber))
                        {
                            $phoneErr = "Invalid phone number";
                            $hasError = true;
                        }
                    }

                    if (empty($_POST["referral"]))
                    {
                        $referralErr = "How did you <br> hear about us?";
                        $hasError = true;
                    }
                    else
                    {
                        $referral = $_POST["referral"];
                    }

                    if(!$hasError){
                        $contact = new customContact('', $customerName,  $phoneNumber, $emailAddress, $referral);
                        $customContactDAO = new customContactDAO();
                        if($customContactDAO->checkEmailExists($emailAddress)){
                            echo "<script>alert('Email exists')</script>";
                        }
                        else{
                            if($customContactDAO->insertContact($contact))
                                echo "<script>alert('New contact added successfully')</script>";
                            else
                                echo "<script>alert('Fail to add the contact')</script>";
                        }
                    }
                }
                ?>

                <div class="main">
                    <h1>Sign up for our newsletter</h1>
                    <p>Please fill out the following form to be kept up to date with news, specials, and promotions from the WP eatery!</p>
                    <form name="frmNewsletter" id="frmNewsletter" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <table>
                            <tr>
                                <td>Name:</td>
                                <td><input type="text" name="customerName" id="customerName" size='40'></td>
                                <td><span class="error">* <?php echo $nameErr;?></span></td>
                            </tr>
                            <tr>
                                <td>Phone Number:</td>
                                <td><input type="text" name="phoneNumber" id="phoneNumber" size='40'></td>
                                <td><span class="error">* <?php echo $phoneErr;?></span></td>
                            </tr>
                            <tr>
                                <td>Email Address:</td>
                                <td><input type="text" name="emailAddress" id="emailAddress" size='40'></td>
                                <td><span class="error">* <?php echo $emailErr;?></span></td>
                            </tr>
                            <tr>
                                <td>How did you hear<br> about us?</td>
                                <td>Newspaper<input type="radio" name="referral" id="referralNewspaper" value="newspaper">
                                    Radio<input type="radio" name='referral' id='referralRadio' value='radio'>
                                    TV<input type='radio' name='referral' id='referralTV' value='TV'>
                                    Other<input type='radio' name='referral' id='referralOther' value='other'>
                                <td><span class="error">* <?php echo $referralErr;?></span></td>
                            </tr>
                            <tr>
                                <td colspan='2'><input type='submit' name='btnSubmit' id='btnSubmit' value='Sign up!'>&nbsp;&nbsp;<input type='reset' name="btnReset" id="btnReset" value="Reset Form"></td>
                            </tr>
                        </table>
                    </form>
                </div><!-- End Main -->
            </div><!-- End Content -->
			<?php include 'footer.php' ?>
        </div><!-- End Wrapper -->
    </body>
</html>
