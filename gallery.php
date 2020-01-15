<?php
header('Content-Type: text/html; charset=utf-8');
include '_conn.php';
include 'functionx.php';
$fn = new functionx();



$page = isset($_GET['p']) ? $_GET['p'] : 1;
$limit = 25;
$page = $page - 1;
$newsList = $fn->getNews($page, $limit);
$count = $fn->countAllNews();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>สาขาวิชาหลักสตรและการสอน</title>

        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Pridi:300" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
        <link href="webfontkit/stylesheet.css" rel="stylesheet">
        <link href="css/css.css" rel="stylesheet">
        <link href="css/mobile.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/full-width-pics.css" rel="stylesheet">



    </head>

    <body>
        <?php include './_head_1.php'; ?>
        <div class="container " style=" background: #f2ecfb;;">
        
            <div class="col-md-12 Inview" style="padding: 0px;" >                
                <?php
                include './_Nav.php';
                ?>
                <div  id="MainContent">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="NewsTitle">
                                <div class="NewsTitleBox"><span class="fa fa-calendar-check-o"> </span> กิจกรรม 
                                    <small>( <?=$newsList->num_rows?> รายการ)</small></div>
                            </div>
                            <div id="NewsPubic" class="">
                                <div class="NewsBox  ">
                                    <div class="row" >
                                        <?php
                                        while ($value = $newsList->fetch_assoc()) {
                                            ?>
                                            <div class="col-md-6">
                                                <div class=" eventImage " >

                                                    <a href="new_gallery.php?id=<?= $value['news_id'] ?>" class="row">
                                                        <div class="image col-4 col-md-4">
                                                            <img src="gallery/thm/<?= $value['news_images'] ?>">
                                                        </div>
                                                        <div class="event_title col-8 col-md-8">
                                                            <div class="NewsTools">
                                                                 ประกาศเมื่อ : <?= $fn->thai_date_shortx($value['news_date']) ?>      <i class="fa fa-angle-right"></i>
                                                                อ่าน   <?= $value['news_view'] ?> ครั้ง  
                                                                                                    

                                                            </div>
                                                            <?= $value['news_name'] ?>
                                                        </div>
                                                    </a>
                                                </div>


                                            </div>
                                            <?php
                                        }
                                        ?>


                                    </div>


                                </div>
                                <nav aria-label="Page navigation  ">

                                    <ul class="pagination">
                                        <?php
                                        $disble = "";
                                        if ($page == 0) {
                                            ?>
                                            <li class="page-item disabled">
                                                <a class="page-link" >
                                                    <i class="fa fa-chevron-left"> </i> Previous
                                                </a>
                                            </li>
                                            <?php
                                        } else {
                                            ?>
                                            <li class="page-item" >
                                                <a href="?p=<?= $page ?>" class="page-link">
                                                    <i class="fa fa-chevron-left"> </i> Previous
                                                </a>
                                            </li>
                                            <?php
                                        }
                                        ?>

                                        <?php
                                        $AllPage = ceil($count / $limit);

                                        for ($i = 1; $i <= $AllPage; $i++) {
                                            $active = "";
                                            if ($i == ($page + 1)) {
                                                $active = 'active';
                                            }
                                            ?>
                                            <li class="<?= $active ?> page-item"><a href="?p=<?= $i ?>" class="  page-link"><?= $i ?></a></li> 
                                            <?php
                                        }
                                        $disble = "";
                                        if ($page == $AllPage - 1) {
                                            ?>
                                            <li class="page-item disabled">
                                                <a class="page-link">
                                                    Next <i class="fa fa-chevron-right"> </i> 
                                                </a>
                                            </li>
                                            <?php
                                        } else {
                                            ?>
                                            <li class="page-item" >
                                                <a class="page-link"  href="?p=<?= $page + 2 ?>" >
                                                    Next <i class="fa fa-chevron-right"> </i>  
                                                </a>
                                            </li>
                                            <?php
                                        }
                                        ?>



                                    </ul>
                                </nav>

                            </div>
                        </div>

                    </div>





                </div>

                <div class="clear"></div>


            </div>
        </div>
        <!-- Content section -->
        <?php include '_foot.php'; ?>

    </body>

</html>
