<?php
require_once('./dao/customContactDAO.php');
if (isset($_GET['action'])) {
    if ($_GET['action'] == "delete") {
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $customContactDAO = new customContactDAO();
            $success = $customContactDAO->deleteContact($_GET['id']);
            if ($success) {
                header('Location:index.php?deleted=true');
            } else {
                header('Location:index.php?deleted=false');
            }
        }
    }
}
?>
