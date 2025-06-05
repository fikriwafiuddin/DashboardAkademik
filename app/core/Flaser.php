<?php

class Flaser {
    public static function setFlash($message, $status, $action)
    {
        $_SESSION['flash'] = ['message' => $message, 'status' => $status, 'action' => $action];
    }

    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            require_once '../app/views/templates/flasher.php';
        }
    }
}