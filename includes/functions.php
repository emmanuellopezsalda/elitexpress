<?php
function redirectWithError($url, $msg) {
    header("Location: $url?error=" . urlencode($msg));
    exit();
}
