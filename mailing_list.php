<?php $title="WP Eatery - Menu"; include 'header.php'; include './model/customContact.php'; include './dao/customContactDAO.php'?>
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
        <script type="text/javascript">
            function confirmDelete(contact){
                return confirm("Do you wish to delete " + contact + "?");
            }
        </script>

        <h1>Customer Mailing List</h1>
        <?php
        $customContactDAO = new customContactDAO();
        $Array = $customContactDAO->getItems('NotDelete');

        echo '<table border=\'1\'>';
            echo '<tr><th>Name</th><th>Phone Number</th><th>Email Address</th><th>How did you hear about us?</th><th>Delete?</th></tr>';
            if($Array != false){
                for($i=0; $i<count($Array); $i++)
                {
                    echo '<tr>';
                    echo '<td>'. $Array[$i]->getName() .'</td>';
                    echo '<td>'. $Array[$i]->getPhoneNumber() .'</td>';
                    echo '<td>'. $Array[$i]->getEmailAddress() .'</td>';
                    echo '<td>'. $Array[$i]->getReferral() .'</td>';
                    echo '<td>
                        <a onclick="return confirmDelete(\'' . $Array[$i]->getName() . '\')"
                            href="process_event.php?action=delete&id=' . $Array[$i]->getId() . '">
                            <input style=\'width:100%\' type=\'button\' value=\'Delete\'></a>
                      </td>';
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
