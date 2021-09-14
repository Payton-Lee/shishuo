<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/loginout.css">
    <title>士说网</title>
</head>
<body>
    <div class="logout">
        <div class="w">
            <div class="logo">
                <!-- h1提权 -->
                <!-- a返回首页 -->
                <a href="./index.php" title="士说">士说</a>
                <span>士&nbsp;说</span>
            </div>
        </div>
    </div>
    <?php 
        // 注销后的操作
        session_start();
        // 清除Session
        $username = $_SESSION['username_l']; //用于后面的提示信息
        $_SESSION = array();
        session_destroy();
        
        // 清除Cookie
        setcookie('username_l', '', time()-99);
        setcookie('code', '', time()-99);
        
        // 提示信息
    ?>
    <div class="loginout">
        <div class="w">
            <div class="loginout_done">
                <div class="nav">
                    <h2>欢迎下次光临,<?php echo $username;?></h2>
                </div>
                <div class="content">
                    <div class="content-bd">
                        <div>
                            <p><a href='./login.regist.php'>重新登录</a></p>
                        </div>
                        <div>
                            <p><a href='./index.php'>返回首页</a></p>
                        </div>                  
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>