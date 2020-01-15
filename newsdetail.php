<?php
header('Content-Type: text/html; charset=utf-8');
include '_conn.php';
include 'functionx.php';
$fn = new functionx();

$news = $fn->getPublicNewsFormId($_GET['id']);
if (empty($news)) {
    
}
$news_file = $fn->getPublicNewsFileFormNewsId($_GET['id']);

//Update View
$fn->updatepublicNewsView($_GET['id'], $news->view);
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

        <link href="css/custom.css" rel="stylesheet">
    </head>

    <body>
        <?php include './_head_1.php'; ?>
        <div class="visual" style="background-color: #FF73FD;" >


            <div class="container " > 

                <div   >                
                    <h4 style="margin-bottom: 20px;"><i class="fas fa-bullhorn"></i> ประชาสัมพันธ์</h4>
                    <div  id="MainContent" >
                        

                            <div class="NewsShowRa">
                                <div class="newsDetailTitle"> <?= $news->news_title ?></div>
                                <div class="NewsTools">

                                    <i class="fa fa-podcast"></i> ประกาศเมื่อ : <?= $fn->thai_date_shortx($news->news_date); ?>    
                                    <i class="fa fa-angle-right"></i> อ่าน   <?= $news->view ?> ครั้ง  

                                </div>

                                <div  >
                                    <article>
                                        <?= $news->news_detail; ?> 
                                    </article>
                                </div>
                                <div  style="margin-top: 30px;">
                                    <div class="fileTitle"> เอกสารที่เกี่ยวข้อง</div>
                                    <div class="filepadding">
                                        <ul>
                                            <?php
                                            if ($news_file->num_rows > 0) {
                                                while ($row = $news_file->fetch_object()) {
                                                    ?>
                                                    <li><a href="file/<?= $row->filename_path ?>" target="_BLANK"> <i class="fa  fa-caret-right"></i> <?= $row->filename ?></a></li>

                                                    <?php
                                                }
                                            } else {
                                                echo "<small>ไม่พบไฟล์แนบ</small>";
                                            }
                                            ?>

                                        </ul>

                                    </div>
                                </div>


                            
                        </div>
                    </div>

                    <div class="clear"></div>


                </div>
            </div>
        </div>
        <!-- Content section -->
        <?php include '_foot.php'; ?>

    </body>

</html>
