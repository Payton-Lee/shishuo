<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./css/comm.css">
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/upload.css">
    <script src="https://cdn.jsdelivr.net/npm/tinymce@5.8.1/tinymce.min.js"></script>
    <title>士说网</title>
</head>

<body>
    <?php 
        include_once("conn.php");
    ?>
    <div class="to_top">
        <a href="#">
            <p><i></i></p>
        </a>
    </div>
    <!-- logo搜索框 -->
    <div class="top">
        <div class="w nav">
            <div class="logo fl">
                <h1>
                    <a href="./index.php">士说</a>
                </h1>
            </div>
            <div class="biaoti">
                <h2>士&nbsp;说</h2>
            </div>
            <div class="fl search">
                <form action="./search.php" method="get">
                    <input type="text" class="text" name="search" id="">
                    <button class="btn" name="submit">搜索</button>
                </form>
            </div>
            <div class="fr login">
                <ul>
                <?php 
                        session_start();
                        if (isset($_COOKIE['username_l'])) {
                            # 若记住了用户信息,则直接传给Session
                            $_SESSION['username_l'] = $_COOKIE['username_l'];
                            $_SESSION['islogin'] = 1;
                        }
                        if(isset($_SESSION['islogin'])) {

                            ?>
                            <li>
                                <span>您好！<?php echo $_SESSION['username_l'];?></span>
                            </li>
                            <li>
                                |
                            </li>
                            <li>
                                <a href="./loginout.php">注销</a>
                            </li>
                            <?php
                            }else {
                                ?>
                                <li>
                                    <a href="./login.regist.php">登录</a>
                                </li>
                                <li>
                                    |
                                </li>
                                <li>
                                    <a href="./login.regist.php">注册</a>
                                </li>
                            <?php
                            }  
                    ?>
                </ul>

            </div>
        </div>
    </div>
    <!-- 导航栏 -->
    <div class="bottom-nav">
        <div class="w">
            <div class="daohang">
                <ul>
                    <li><a href="./index.php">首页</a></li>
                    <li>
                        <div class="dropdown">
                            <div class="drop">文学艺术<i></i></div>
                            <div class="drop-content">
                                <div><a href="./show.php?Iposition=文学">文学</a></div>
                                <div><a href="./show.php?Iposition=书画">书画</a></div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="dropdown">
                            <div class="drop">军事科技<i></i></div>
                            <div class="drop-content">
                                <div><a href="./show.php?Iposition=农业">农业</a></div>
                                <div><a href="./show.php?Iposition=发明">发明</a></div>
                            </div>
                        </div>
                    </li>
                    <li><a href="./show.php?Iposition=医学名家">医学名家</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="w upload">
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <div><span>姓名:</span><input type="text" name="name" ></div>
            <div><span>定位:</span><input type="text" name="position" ></div>
            <div><span>称号:</span><input type="text" name="work" ></div>
            <div><span>照片:</span><input type="file" name="photo" class="file"></div>
            <div><span>介绍:</span><input type="text" name="introduce" ></div>
            <div><span>简介:</span><textarea style="resize:none;" name="content" id="content" cols=80 rows=5></textarea></div>
            <div><input type="submit" name="submit" value="提交" class="submit"></div>
        </form>
    </div>
    <?php
        include_once("conn.php");
        if(!empty($_POST['submit'])){
            $name = $_POST['name'];
            $position = $_POST['position'];
            $work = $_POST['work'];
            $introduce = $_POST['introduce'];
            $content = $_POST['content'];
            if($_FILES["photo"]["error"]) {
                echo $_FILES["photo"]["error"];
            }else{
                if(($_FILES["photo"]["type"]=="image/jpeg" || $_FILES["photo"]["type"]=="image/png") && $_FILES["photo"]["size"]<10240000){
                    $filename = "upload/".date("YmdHis").$_FILES["photo"]["name"];
                    $filename1 = iconv("UTF-8","gb2312",$filename);
                    if(!file_exists($filename1)){
                        move_uploaded_file($_FILES["photo"]["tmp_name"],$filename);
                        $mysqli -> begin_transaction();
                        try{
                            $sql_1 = "INSERT INTO `intro` VALUES(?,?,?,?,?);";
                            $sql_2 = "INSERT INTO `images`(`Iname`,`Iimage`) VALUES(?,?);";
                            $stmt_1 = $mysqli -> prepare($sql_1);
                            $stmt_2 = $mysqli -> prepare($sql_2);
                            $stmt_1 -> bind_param("sssss",$name,$position,$work,$introduce,$content);
                            $stmt_2 -> bind_param("ss",$name,$filename);
                            $result_1 = $stmt_1 -> execute();
                            $result_2 = $stmt_2 -> execute();
                            $mysqli -> commit();
                            if($result_1 && $result_2){
                                echo "<script>alert('上传成功');location.href = './upload.php';</script>";
                            }else{
                                echo "<script>alert('上传失败');location.href = './upload.php';</script>";
                            }

                        }catch(mysqli_sql_exception $exception) {
                            $mysqli -> rollback();
                            throw $exception;
                        }
                    }
                }
            }
        }
    ?>
    <div class="footer">
        <div class="w">
            <div class="links">
                <dl>
                    <dt>关于</dt>
                    <dd>
                        <a href="javascript:;">关于士说</a>
                    </dd>
                    <dd>
                        <a href="javascript:;">管理团队</a>
                    </dd>

                    <dd>
                        <a href="javascript:;l">免责声明</a>
                    </dd>
                    <dd>
                        <a href="javascript:;">联系我们</a>
                    </dd>
                </dl>
                <dl>
                    <dt>新手指南</dt>
                    <dd>
                        <a href="javascript:;">如何注册</a>
                    </dd>
                    <dd>
                        <a href="javascript:;">如何使用</a>
                    </dd>
                </dl>
            </div>
            <div class="copyright">
                <p>
                    士说网——做中国文化的网站<br> 故士，穷不失义，达不离道也。
                </p>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    tinymce.init({
        "selector": "#content"
    })
</script>
</body>

</html>