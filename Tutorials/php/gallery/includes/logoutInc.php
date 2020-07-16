<?php
    session_start();
    session_unset(); // Delete all the variables from the session (e.g. userId)
    session_destroy();
    header("Location: ../index.php?logout=success");