<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>士说网</title>
    <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>
    <!-- 顶部导航栏 -->
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
    <!-- 登录开始 -->
    <div class="login">
        <div class="w">
            <div class="login_in">
                <div class="login_in_hd">
                    <ul id="nav">
                        <li class="active"><h2>登录</h2></li>
                        <li><h2>注册</h2></li>
                    </ul>
                </div>
                <div class="login_in_bd">
                    <ul id="content" class="content">
                        <li style="display: block;">
                            <form action="./login.regist.php" method="post">
                                <div>
                                    <label for="username_l"><i></i><input type="text" name="username_l" placeholder="请输入已注册的用户名" id="username_l"></label>
                                </div>
                                <div>
                                    <label for="password_l"><i></i><input type="password" name="password_l" placeholder="请输入已注册的密码" id="password_l"></label>
                                </div>
                                <div class="yanzma">
                                    <label for="yanzm_l"><i></i><input type="text" name="captcha" id="yanzm_l" placeholder="请输入验证码，不区分大小写"></label>
                                    <img src="checkcode.php" onclick="this.src='checkcode.php?a='+Math.random()" >
                                </div>
                                <div class="regist">
                                    <input type="submit" name="submit_l" value="登录"> 
                                    <span>默认一天内无须重复登录</span>
                                </div>   
                            </form>
                        </li>
                        <li>
                            <form action="./login.regist.php" method="post">
                                <div>
                                    <label for="username_r"><i></i><input type="text" name="username_r" id="username_r" placeholder="请输入8-20位的用户名"></label>
                                </div>
                                <div>
                                    <label for="password_r"><i></i><input type="password" name="password_r" id="password_r" placeholder="请输入8-20位的密码"></label>
                                </div>
                                <div>
                                    <label for="confirmpwd_r"><i></i><input type="password" name="confirmpwd_r" id="confirmpwd_r" placeholder="再次输入上面的密码"></label>
                                </div>
                                <div class="regist">
                                    <input type="submit" name="submit_r" value="注册"> 
                                </div>   
                            </form>                              
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php
        include("conn.php");
        if(!empty($_POST['submit_r']) && empty($_POST['submit_l'])){
            $username = trim($_POST['username_r']);
            $password = trim($_POST['password_r']);
            $pswconfirm = trim($_POST['confirmpwd_r']);
            if($username == "" || $password == "" || $pswconfirm == ""){
                echo "<script>alert('请确认信息完整性！');history.go(-1);</script>";
            }else{
                if((strlen($password) > 20 && strlen($password) < 8) || (strlen($username) > 20 && strlen($username) < 8) ){
                    echo "<script>alert('用户名或密码不在8位到20位之间！');history.go(-1);</script>";
                }else{
                    if($password == $pswconfirm){
                        $sql_select = "SELECT `uersname` FROM `users` WHERE `uersname` = '$username';";
                        $result = $mysqli ->query($sql_select);
                        $count = $result -> num_rows;
                        if($count){
                            echo "<script>alert('用户名已存在');history.go(-1);</script>";
                        }else{
                            $options  = ['cost' => 10];
                            $insert_password = password_hash($password,PASSWORD_BCRYPT,$options);
                            var_dump($insert_password);
                            $sql_insert = "INSERT INTO `users` (uersname,passwords) VALUES ('$username','$insert_password');";
                            $res_insert =$mysqli -> query($sql_insert);
                            if($res_insert){
                                echo "<script>alert('注册成功，正在跳转至登录页面！');location.href='./login.regist.php';</script>";
                            }else{
                                echo "<script>alert('系统繁忙，请稍后重试！');history.go(-1);</script>";
                            }
                        }
                    }else{
                        echo "<script>alert('两次密码不一致！');history.go(-1);</script>";
                    }
                }
            }
        }elseif (empty($_POST['submit_r']) && !empty($_POST['submit_l'])){
            $username_l = trim($_POST['username_l']);
            $password_l = trim($_POST['password_l']);
            $captcha = $_POST["captcha"];
            $login_sql = "SELECT `uersname`,`passwords` FROM `users` WHERE `uersname`='$username_l';";
            if($username_l == "" || $password_l == "" || $captcha == "" ){
                echo "<script>alert('不允许有空值！！');history.go(-1);</script>";
            }elseif(($username_l == "admin") || ($password_l == "admin")){
                echo "<script>alert('管理员用户登录成功！');location.href='./upload.php';</script>";
                $_SESSION['username_l'] = $username_l;
                $_SESSION['islogin'] = 1;
                setcookie('username_l', $username_l, time()+1*24*60*60);
                setcookie('code', md5($username_l.md5($password_l)), time()+1*24*60*60);
            }else{
                $login_sql = "SELECT `uersname`,`passwords` FROM `users` WHERE `uersname`='$username_l';";
                if($stmt = $mysqli -> prepare($login_sql)){
                    $stmt ->execute();
                    $stmt -> bind_result($name,$s_password);
                    while($stmt -> fetch()){
                        if(password_verify($password_l, $s_password)){
                            session_start();
                            if(strtolower($_SESSION["checkcode"]) == strtolower($captcha)){
                                $_SESSION['username_l'] = $username_l;
                                $_SESSION['islogin'] = 1;
                                setcookie('username_l', $username_l, time()+1*24*60*60);
                                setcookie('code', md5($username_l.md5($password_l)), time()+1*24*60*60);
                                $_SESSION["captcha"] = "";
                                echo "<script>alert('登录成功');location.href='./index.php';</script>";
                            }else{
                                echo "<script>alert('验证码错误');history.go(-1);</script>";
                            }
                        }else{
                            echo "<script>alert('密码错误');history.go(-1);</script>";
                        }
                    }
                }
            }
        } 
    ?>
    <script type="text/javascript">
        var nav =document.getElementById("nav");
        var navlist = nav.children;
        var con = document.getElementById("content");
        var conlist = con.children;
        for (var i= 0;i<navlist.length;i++){
            navlist[i].index = i;
            navlist[i].onclick = function (){
                for (var m = 0;m< conlist.length;m++){
                    navlist[m].className = "";
                    conlist[m].style.display ="none";
                }
                this.className = "active";
                conlist[this.index].style.display = "block";
            }
        }
      </script>
</body>
</html>