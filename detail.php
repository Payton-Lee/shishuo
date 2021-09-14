<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./css/comm.css">
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/detail.css">
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
    <div class="w introduce">
        <?php
            if(!empty($_GET['Iname'])){
                $Iname = $_GET['Iname'];
                $query = "SELECT intro.Iname,intro.Iintro,intro.Icontent,images.Iimage FROM `intro`,`images` WHERE intro.Iname=images.Iname AND intro.Iname='$Iname';";
                if($stmt = $mysqli -> prepare($query)){
                    $stmt -> execute();
                    $stmt -> bind_result($name,$intro,$content,$image);
                    while($stmt -> fetch()){
        ?>
         <div class="intro_nav">
            <img src="<?php echo $image?>" title="<?php echo $name;?>">
            <div class="intro_top">
                <h3><?php echo $name;?>
                <?php
                if (isset($_COOKIE['username_l'])) {
                            # 若记住了用户信息,则直接传给Session
                            $_SESSION['username_l'] = $_COOKIE['username_l'];
                            $_SESSION['islogin'] = 1;
                        }
                        if(isset($_SESSION['islogin']) &&  $_SESSION['username_l']== 'admin'){
                ?>
                <a href="./delete.php?Iname=<?php echo $name;?>">删除</a>
                <?php 
                        }
                ?>
                </h3>
            </div>
            <div class="intro_bottom">
                <p>
                    <?php echo $intro;?>
                </p>
            </div>
        </div>
        <div class="content">
            <div class="content-hd">
                <h3><span><?php echo $name;?></span>-人物简介</h3>
            </div>
            <div class="content-bd">
                <?php echo $content;?>
            </div>
        </div>

        <?php
                    }
                }
            }
        ?>
    </div>
    <div class="footer">
        <div class="w">
            <div class="links">
                <dl>
                    <dt>关于</dt>
                    <dd>
                        <a href="javasrcipt:;">关于士说</a>
                    </dd>
                    <dd>
                        <a href="gltd.html">管理团队</a>
                    </dd>

                    <dd>
                        <a href="mzsm.html">免责声明</a>
                    </dd>
                    <dd>
                        <a href="lxwm.html">联系我们</a>
                    </dd>
                </dl>
                <dl>
                    <dt>新手指南</dt>
                    <dd>
                        <a href="rhzc.html">如何注册</a>
                    </dd>
                    <dd>
                        <a href="ruhsy.html">如何使用</a>
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
</body>
</html>