<?php $title="WP Eatery - Removed Customers' List"; include 'header.php'; include './model/customContact.php'; include './dao/customContactDAO.php'?>
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

        <h1>Removed Customers' List</h1>
        <?php
        $customContactDAO = new customContactDAO();
        $Array = $customContactDAO->getItems('Deleted');

        echo '<table border=\'1\'>';
        echo '<tr><th>Name</th><th>Phone Number</th><th>Email Address</th></tr>';
        if($Array != false){
            for($i=0; $i<count($Array); $i++)
            {
                echo '<tr>';
                echo '<td>'. $Array[$i]->getName() .'</td>';
                echo '<td>'. $Array[$i]->getPhoneNumber() .'</td>';
                echo '<td>'. $Array[$i]->getEmailAddress() .'</td>';
                echo '</tr>';
            }
        }
        echo '</table>';
        ?>
    </div><!-- End Main -->
</div><!-- End Content -->
<?php include 'footer.php' ?>
</div><!-- End Wrapper -->
</body>
</html>
