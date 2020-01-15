<?php
header('Content-Type: text/html; charset=utf-8');
include '_conn.php';
include 'functionx.php';
$fn = new functionx();
$news = $fn->getNewsFormid($_GET['id']);
$news_file = $fn->getNewsGallery($_GET['id']);

$fn->updateGalleryView($_GET['id'], $news->news_view);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">

        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title><?= $news->news_title ?> : งานสิทธิประโยชน์</title>
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=K2D&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="fontawesome-free-5.9.0-web/css/all.css">
        <link href="css/css.css" rel="stylesheet">       
        <link href="css/main.css" rel="stylesheet">
        <link href="node_modules/lightgallery.js/dist/css/lightgallery.min.css" rel="stylesheet">
        <link href="css/custom.css" rel="stylesheet">
    </head>

    <body>
        <?php include './_head_1.php'; ?>
        <div class="visual" style="background-color: #FF73FD;" >
            <div class="container " > 
                <div   >          
                    <h4  >
                        <i class="fas fa-bullhorn"></i>
                        กิจกรรม
                    </h4>
                    <div   id="MainContent" >     
                        <div class="row" style="margin-top: 15px;">
                            <div   class="col-md-8">
                                <img src="gallery/<?= $news->news_images ?>" style="width: 100%;">
                            </div>
                            <div class="col-md-4">
                                <div class="fileTitle" style="border-top: 0px;color: #a50299 ;font-weight: bold;"> อัลบั้มภาพ  <?= $news_file->num_rows; ?> ภาพ </div>
                                <div class="Gallery"  id="lightgallery">
                                    <div class="row">
                                        <?php
                                        while ($row = $news_file->fetch_object()) {
                                            ?>
                                            <a class="col-4 item"   href="./gallery/<?= $row->file_name ?>" >
                                                <img src="gallery/thm/<?= $row->file_name ?>">  
                                            </a>
                                        <?php } ?>

                                    </div>

                                </div>
                            </div>
                            <div class="NewsShowRa col-md-12">
                                <div class="newsDetailTitle"><?= $news->news_name ?></div>
                                <div class="NewsTools">

                                    <i class="fa fa-podcast"></i> ประกาศเมื่อ : <?= $fn->thai_date_shortx($news->news_date) ?>    <i class="fa fa-angle-right"></i> 
                                    อ่าน   <?= $news->news_view ?> ครั้ง  

                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <article>
                                            <?= $news->news_detail ?> 
                                        </article>
                                    </div>

                                </div>

                            </div>
                            <div>

                            </div>
                        </div>
                    </div>

                    <div class="clear"></div>


                </div>
            </div>
        </div>
        <!-- Content section -->
        <?php include '_foot.php'; ?>
        <script src="node_modules/lightgallery.js/dist/js/lightgallery.min.js" ></script>
        <script>
            lightGallery(document.getElementById('lightgallery'), {selector: '.item'});
        </script>
    </body>

</html>
