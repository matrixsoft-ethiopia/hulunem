<?php
include_once 'login_h.php';
session_destroy();
header("Location:../home.php?logout=success");
