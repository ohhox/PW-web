<?php

include '_conn.php';
include 'functionx.php';
$fn = new functionx();
$news = $fn->getPublicNews(0, 10);
$gallery = $fn->getNews(0, 10);
$slide = $fn->getSlide();
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
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($slide)) {
                        ?>
                        <div class="carousel-item <?=$i == 1 ? 'active' : ''?>">
                            <img src="gallery/<?= $row['file']?>"  class="d-block w-100" alt="...">
                        </div>
                    <?php $i++;} ?>

                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <!--            <div >
                            <img style="width: 100%;" src="gallery/<?= $slide->file ?>" alt="Responsive image">
                        </div>-->

            <div class="col-md-12 previewNav" style="padding: 0px;">                
                <?php
                include './_Nav.php';
                ?>
                <div  id="MainContent">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="NewsTitle">

                                <div class="NewsTitleBox"> <span class="fa fa-bullhorn "> </span> ข่าวประชาสัมพันธ์</div>

                            </div>
                            <div id="NewsPubic" class="">
                                <div class="NewsBox  ">
                                    <div class="NewsList">
                                        <ul>
                                            <?php
                                            $i = 1;

                                            while ($value = $news->fetch_assoc()) {
                                                ?>
                                                <li>
                                                    <a href="newsdetail.php?id=<?= $value['news_id'] ?>">

                                                        <span class="count">0<?= $i++ ?></span>
                                                        <div class="content">
                                                            <span><?= $value['news_title'] ?></span> 

                                                            <div class="NewsTools">
                                                                อ่าน   <?= $value['view'] ?> ครั้ง  <i class="fa fa-angle-right"></i>
                                                                ประกาศเมื่อ : <?= $fn->thai_date_shortx($value['news_date']) ?>                                           

                                                            </div>
                                                        </div>
                                                        <div class="clear"></div>

                                                    </a> 
                                                </li>
                                                <?php
                                            }
                                            ?>




                                            <div class="clear"></div>


                                        </ul>
                                    </div>
                                    <a class="pull-right viewAll" href="news.php">ดูทั้งหมด</a>

                                </div>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="NewsTitle">

                                <div class="NewsTitleBox"> <span class="fa fa-calendar-check-o"> </span> กิจกรรม </div>

                            </div>
                            <div id="evnt">
                                <div class="row" >
                                    <?php
                                    while ($value = $gallery->fetch_assoc()) {
                                        ?>
                                        <div class="col-md-12">
                                            <div class=" eventImage " >
                                                <a href="new_gallery.php?id=<?= $value['news_id'] ?>" class="row">
                                                    <div class="image col-4 col-md-4">
                                                        <img src="gallery/thm/<?= $value['news_images'] ?>">
                                                    </div>
                                                    <div class="event_title col-8 col-md-8">
                                                        <?= $value['news_name'] ?>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>


                                </div>
                                <a class="pull-right viewAll" href="gallery.php">ดูทั้งหมด</a>
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
