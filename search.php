<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./css/comm.css">
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/show.css">
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
                    <input type="text" class="text" name="search" value="<?php echo $_GET['search']; ?>">
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
    <div id="main" class="w">
        <div class="waterfall J_waterfall">
                <?php
                    include_once("conn.php");
                    if(!empty($_GET['search'])){
                        $search = $_GET['search'];
                        $query = "SELECT i.Iname,i.Iwork,m.Iimage FROM intro i INNER JOIN images m  ON i.Iname=m.Iname WHERE i.Iname LIKE '%$search%' OR i.Iposition LIKE '%$search%' OR i.Iwork LIKE '%$search%';";
                        if($stmt = $mysqli -> prepare($query)){
                            $stmt -> execute();
                            $stmt -> bind_result($name,$work,$image);
                            while($stmt -> fetch()){
                ?>
                <div class="wf-item">
                    <a href="./detail.php?Iname=<?php echo $name;?>">
                        <img class="wf-img" src="<?php echo $image;?>" alt="">
                        <h2><?php echo $name;?></h2>
                        <p><?php echo $work;?></p>
                    </a>
                </div>
                <?php
                            }
                        }
                    }    
                ?>
        </div>
    </div>
    <script type="text/javascript" src="./js/waterfall.js"></script>
    <script>
        new Waterfall({
            el: 'J_waterfall',
            colmun: 6,
            gap: 20
        })
    </script>
</body>
</html>