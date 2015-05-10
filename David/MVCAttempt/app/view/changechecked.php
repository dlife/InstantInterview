<?php
session_start();

// get the values posted in combined.php (actually, one of the views)
if (isset($_POST)) {
    // something was posted, is there a value?
    $value = $_POST['v'];
    if (isset($value)) {
        // was it a question ?
        $vraagId = $_POST['q'];
        if (isset($vraagId)) {
            // create the array if it doesn't exist
            if (!isset($_SESSION['checkedVragen'])) {
                $_SESSION['checkedVragen'] = [];
            }
            $_SESSION['checkedVragen'][$vraagId] = $value;
            $_SESSION['testVragen'] = $_SESSION['checkedVragen'][$vraagId];
        }
        // or competence?
        $competenceId = $_POST['c'];
        if (isset($competenceId)) {
            // create the array if it doesn't exist
            if (!isset($_SESSION['checkedCompetenties'])) {
                $_SESSION['checkedCompetenties'] = [];
            }
            $_SESSION['checkedCompetenties'][$competenceId] = $value;
            $_SESSION['testComp'] = $_SESSION['checkedCompetenties'][$competenceId];
        }
    }
}
