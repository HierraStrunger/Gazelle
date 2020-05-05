<?php

use \Gazelle\Manager\Notification;

if (!check_perms("users_mod")) {
    error(404);
}
$notification = new Notification($DB, $Cache);
if ($_POST['set']) {
    $Expiration = $_POST['length'] * 60;
    $notification->setGlobal($_POST['message'], $_POST['url'], $_POST['importance'], $Expiration);
} elseif ($_POST['delete']) {
    $notification->deleteGlobal();
}

header("Location: tools.php?action=global_notification");
