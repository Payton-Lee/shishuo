<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./css/comm.css">
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/index.css">
    <script src="./js/animate.js"></script>
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
    <div class="w">
        <div class="main">
            <!-- 轮播图 -->
            <div class="wrap fl" id="box">
                <ul id="navs" class="navs" style="left: -600px">
                    <li>
                        <a href="./detail.php?Iname=吴文超"><img src="./upload/lunbotu-4.jpg" /></a>
                    </li>
                    <li>
                        <a href="./detail.php?Iname=孔子"><img src="./upload/lunbotu-5.jpg" /></a>
                    </li>
                    <li>
                        <a href="./detail.php?Iname=袁隆平"><img src="./upload/lunbotu-1.jpg" /></a>
                    </li>
                    <li>
                        <a href="./detail.php?Iname=屠呦呦"><img src="./upload/lunbotu-2.jpg" /></a>
                    </li>
                    <li>
                        <a href="./detail.php?Iname=钟南山"><img src="./upload/lunbotu-3.jpg" /></a>
                    </li>
                    <li>
                        <a href="./detail.php?Iname=吴文超"><img src="./upload/lunbotu-4.jpg" /></a>
                    </li>
                    <li>
                        <a href="./detail.php?Iname=孔子"><img src="./upload/lunbotu-5.jpg" /></a>
                    </li>
                </ul>
                <a id="pre" class="left">&lt;</a>
                <a id="nex" class="right">&gt;</a>
                <ul id="bots">
                </ul>
            </div>
            <!-- 轮播图 -->
            <div class="mid-pic fl">
                <ul>
                    <li>
                        <a href="./show.php?Iposition=文学"><img src="./upload/lunbotu-8.jpg"></a>
                    </li>
                    <li>
                        <a href="./show.php?Iposition=农业"><img src="./upload/lunbotu-6.jpg"></a>
                    </li>
                </ul>
            </div>
            <div class="left-news fl">
                <div class="news">
                    <div class="news-hd">
                        士说新闻报
                        <a href="#">更多<i></i></a>
                    </div>
                    <div class="news-bd">
                        <ul>
                            <li>
                                <a href="http://k.sina.com.cn/article_6192877242_m1711fceba03300rl62.html" target="blank">袁隆平逝世</a>
                            </li>
                            <li>
                                <a href="https://tech.huanqiu.com/article/43hlPmRGXrj" target="blank">“深海一号”大气田正式投产</a>
                            </li>
                            <li>
                                <a href="https://china.huanqiu.com/article/43fKKY3ZYAG" target="blank">载人深潜英雄集体</a>
                            </li>
                            <li>
                                <a href="https://m.thepaper.cn/baijiahao_13284994" target="blank">重磅表彰！南昌32人、14个集体上榜！</a>
                            </li>
                            <li>
                                <a href="https://m.thepaper.cn/baijiahao_13262965" target="blank">危难显担当 ，抗疫战斗中的重要力量</a>
                            </li>
                            <li>
                                <a href="http://www.spacenews.com.cn/newsitem/278521570" target="blank">哈勃望远镜拍到罕见宇宙冲击波</a>
                            </li>
                            <li>
                                <a href="http://www.spacenews.com.cn/newsitem/278552439" target="blank">《大国飞天》发布航天日特辑 致敬中国航天人</a>
                            </li>
                            <li>
                                <a href="http://www.spacenews.com.cn/newsitem/278552439" target="blank">《大国飞天》发布航天日特辑 致敬中国航天人</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="box w">
        <div class="box-hd">
            <h3>文学</h3>
            <a href="./show.php?Iposition=文学" class="look">查看全部</a>
        </div>
        <div class="box-bd clearfix">
            <ul>
            <?php
                $wenxuesql = "SELECT intro.Iname ,intro.Iwork,intro.Iintro,intro.Icontent,images.Iimage FROM `intro`,`images` WHERE intro.Iname=images.Iname AND intro.Iposition LIKE '文学' LIMIT 0,5;";
                $wenxueres = $mysqli ->query($wenxuesql);
                $wenxuerows = $wenxueres ->fetch_all(MYSQLI_ASSOC);
                foreach($wenxuerows as $wenxuerow){
                    $wenxueimgdir = $wenxuerow['Iimage']
            ?>
                <li>
                    <a href="./detail.php?Iname=<?php echo $wenxuerow['Iname'];?>">
                        <img src="<?php echo $wenxueimgdir;?>" alt="">
                        <h4><?php echo $wenxuerow['Iname']?></h4>
                        <p>儒家学派创始人<?php echo $wenxuerow['Iwork']?></p>
                    </a>
                </li>
                <?php
                    }
                ?>
            </ul>
        </div>
    </div>
    <div class="box w">
        <div class="box-hd">
            <h3>书画</h3>
            <a href="./show.php?Iposition=书画" class="look">查看全部</a>
        </div>
        <div class="box-bd clearfix">
            <ul>
            <?php
                $shuhuasql = "SELECT intro.Iname ,intro.Iwork,intro.Iintro,intro.Icontent,images.Iimage FROM `intro`,`images` WHERE intro.Iname=images.Iname AND intro.Iposition LIKE '书画' LIMIT 0,5;";
                $shuhuares = $mysqli ->query($shuhuasql);
                $shuhuarows = $shuhuares ->fetch_all(MYSQLI_ASSOC);
                foreach($shuhuarows as $shuhuarow){
                    $shuhuaimgdir = $shuhuarow['Iimage']
            ?>
                <li>
                    <a href="./detail.php?Iname=<?php echo $shuhuarow['Iname'];?>">
                        <img src="<?php echo $shuhuaimgdir;?>" alt="">
                        <h4><?php echo $shuhuarow['Iname']?></h4>
                        <p><?php echo $shuhuarow['Iwork']?></p>
                    </a>
                </li>
                <?php
                    }
                ?>
            </ul>
        </div>
    </div>
    <div class="box w">
        <div class="box-hd">
            <h3>农业</h3>
            <a href="./show.php?Iposition=农业" class="look">查看全部</a>
        </div>
        <div class="box-bd clearfix">
            <ul>
            <?php
                $nailisql = "SELECT intro.Iname ,intro.Iwork,intro.Iintro,intro.Icontent,images.Iimage FROM `intro`,`images` WHERE intro.Iname=images.Iname AND intro.Iposition LIKE '农业' LIMIT 0,5;";
                $nailires = $mysqli ->query($nailisql);
                $nailiarows = $nailires ->fetch_all(MYSQLI_ASSOC);
                foreach($nailiarows as $nailiarow){
                    $nailiimgdir = $nailiarow['Iimage']
            ?>
                <li>
                    <a href="./detail.php?Iname=<?php echo $nailiarow['Iname'];?>">
                        <img src="<?php echo $nailiimgdir;?>" alt="">
                        <h4><?php echo $nailiarow['Iname']?></h4>
                        <p><?php echo $nailiarow['Iwork']?></p>
                    </a>
                </li>
                <?php
                    }
                ?>
            </ul>
        </div>
    </div>
    <div class="box w">
        <div class="box-hd">
            <h3>发明</h3>
            <a href="./show.php?Iposition=发明" class="look">查看全部</a>
        </div>
        <div class="box-bd clearfix">
            <ul>
            <?php
                $niangqisql = "SELECT intro.Iname ,intro.Iwork,intro.Iintro,intro.Icontent,images.Iimage FROM `intro`,`images` WHERE intro.Iname=images.Iname AND intro.Iposition LIKE '发明' LIMIT 0,5;";
                $niangqires = $mysqli ->query($niangqisql);
                $niangqirows = $niangqires ->fetch_all(MYSQLI_ASSOC);
                foreach($niangqirows as $niangqirow){
                    $niangqimgdir = $niangqirow['Iimage']
            ?>
                <li>
                    <a href="./detail.php?Iname=<?php echo $niangqirow['Iname'];?>">
                        <img src="<?php echo $niangqimgdir;?>" alt="">
                        <h4><?php echo $niangqirow['Iname']?></h4>
                        <p><?php echo $niangqirow['Iwork']?></p>
                    </a>
                </li>
                <?php
                    }
                ?>
            </ul>
        </div>
    </div>
    <div class="box w">
        <div class="box-hd">
            <h3>医学名家</h3>
            <a href="./show.php?Iposition=医学名家" class="look">查看全部</a>
        </div>
        <div class="box-bd clearfix">
            <ul>
            <?php
                $yixuesql = "SELECT intro.Iname ,intro.Iwork,intro.Iintro,intro.Icontent,images.Iimage FROM `intro`,`images` WHERE intro.Iname=images.Iname AND intro.Iposition LIKE '医学名家' LIMIT 0,5;";
                $yixueres = $mysqli ->query($yixuesql);
                $yixuerows = $yixueres ->fetch_all(MYSQLI_ASSOC);
                foreach($yixuerows as $yixuerow){
                    $yixueimgdir = $yixuerow['Iimage']
            ?>
                <li>
                    <a href="./detail.php?Iname=<?php echo $yixuerow['Iname'];?>">
                        <img src="<?php echo $yixueimgdir;?>" alt="">
                        <h4><?php echo $yixuerow['Iname']?></h4>
                        <p><?php echo $yixuerow['Iwork']?></p>
                    </a>
                </li>
                <?php
                    }
                ?>
            </ul>
        </div>
    </div>
    </div>
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
                        <a href="javascript:;">免责声明</a>
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
</body>

</html>