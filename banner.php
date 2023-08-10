<?php
header('Content-Type: image/jpeg');
$ipAddress = $_SERVER['REMOTE_ADDR'];
$userAgent = $_SERVER['HTTP_USER_AGENT'];
$pageUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://")
    . $_SERVER['HTTP_HOST']
    . $_SERVER['REQUEST_URI'];

$sql = "INSERT INTO banner_views (ip_address, user_agent, view_date, page_url, views_count)
                    VALUES ('$ipAddress', '$userAgent', NOW(), '$pageUrl', 1)
                    ON DUPLICATE KEY UPDATE view_date = NOW(), views_count = views_count + 1"
;

$connection = new mysqli('127.0.0.1','root',null,'INFUSEmedia-test');
$connection->query($sql);
$connection->close();

echo 'SL_031721_41490_20.jpg';