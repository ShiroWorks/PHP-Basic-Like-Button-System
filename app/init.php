<?php

session_start();

$_SESSION['user_id'] = (int)2;

$db = new mysqli('localhost', 'root', '', 'like_button');