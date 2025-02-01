<?php

if (isset($_COOKIE['user_id'])) {
    unset($_COOKIE['user_id']); 
    setcookie('user_id', '', -1, '/'); 
    header('Location: ../');
    return true;
    
} else {
    return false;
}

