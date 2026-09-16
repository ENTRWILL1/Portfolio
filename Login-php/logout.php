<?php

require_once 'auth.php';

clearAuthCookie();

header(
    'Location: login.php'
);

exit;