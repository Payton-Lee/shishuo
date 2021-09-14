<?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $mysqli = new mysqli("localhost","root","123456","shishuo");
    if($mysqli -> connect_errno){
        echo("数据库链接错误".$mysqli -> error);
    }
    $mysqli->set_charset("utf8");
