<?php
    session_start();
    echo $_SESSION['username'];
    echo $_SESSION['nama'];
    echo $_SESSION['new'];

    echo '<p>'.$_SESSION['phone'].'</p>';
?>