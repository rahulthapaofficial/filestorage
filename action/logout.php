<?php
session_start();
include '../config/config.php';
session_destroy();

header('Location: ' . BASE_URL);
