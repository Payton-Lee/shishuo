<?php
    include_once("conn.php");
    if(!empty($_GET['Iname'])){
        $name = $_GET['Iname'];
        $mysqli -> begin_transaction();
        try{
            $sql_1 = "DELETE FROM `images` WHERE `Iname` = '$name';";
            $sql_2 = "DELETE FROM `intro` WHERE `Iname` = '$name';";
            $result_1 = $mysqli -> query($sql_1);
            $result_2 = $mysqli -> query($sql_2);
            $mysqli -> commit();
            if ($result_1 && $result_2) {
                echo "<script>alert('删除成功');location.href = './index.php';</script>";
            } else {
                echo "<script>alert('删除失败');location.href = './detail.php?Iname=".$name."';</script>";
            }
        }catch(mysqli_sql_exception $exception){
            $mysqli -> rollback();
            throw $exception;
        }
    }else {
        echo "<script>location.href = './detail.php?Iname=".$name."';</script>";
    }
