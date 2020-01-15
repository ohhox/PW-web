<?php
include '_conn.php';
include 'functionx.php';
$fn = new functionx();
$news = $fn->getPublicNews(0, 5);
$gallery = $fn->getNews(0, 8);
$slide = $fn->getSlide();

$hotel = $fn->getHotel();
$mitting = $fn->getmitting();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">

        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>งานสิทธิประโยชน์</title>
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=K2D&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="fontawesome-free-5.9.0-web/css/all.css">
        <link href="css/main.css" rel="stylesheet">
        <link href="css/custom.css" rel="stylesheet">




    </head>

    <body>
         <?php 
         include './_head_1.php';
         ?>


        <div class="visual" >
            <div class='bgforest'></div>
            <div class="visual-contents">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="visual-title white">ยินดีต้อนรับสู่ ศูนย์ฝึกวิชาชีพ กาสะลอง </div>
                        </div>
                        <div class="col-md-12">
                            <ul class="visual-menu-list">

                                <li class="erp">
                                    <a href="mitting_booking.php" title="Web-based">
                                        <div class="icon-main-comm"></div>
                                        <div class="menu-label">จองโรงแรม</div>
                                    </a>
                                </li>
                                <li class="sales">
                                    <a href="" title="Inventory" style="background:#bc5393;">
                                        <div class="icon-main-comm"></div>
                                        <div class="menu-label">จองห้องประชุม</div>
                                    </a>
                                </li>

                                <li class="groupware">
                                    <a href="/ecount/product/sales_sales-management?p=Main" title="Sales" style="    background: #f7c44e;">
                                        <div class="icon-main-comm"></div>
                                        <div class="menu-label">ลงทะเบียนอบรม</div>
                                    </a>
                                </li>
                                <li class="inventory">
                                    <a href="/ecount/product/sales_sales-management?p=Main" title="Sales" style="    background: #accc30;">
                                        <div class="icon-main-comm"></div>
                                        <div class="menu-label">ลงทะเบียนอบรม</div>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div style="background: #e6e6e6;padding: 30px;border-top: 5px solid #8cb100">

            <div class="container">
                <div class="newsBorad">
                    <h4><i class="fas fa-bullhorn"></i> ประชาสัมพันธ์</h4>
                    <div>
                        <?php
                        while ($value = $news->fetch_assoc()) {
                            ?>
                            <div class="notice notice-warning">
                                <a href="newsdetail.php?id=<?= $value['news_id'] ?>">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-5">
                                            <div>
                                                <div>
                                                    <h1 class="text-center"> <?= date('d', strtotime($value['news_date'])) ?> </h1>
                                                </div>
                                                <div class="text-center">
                                                    <small><?= $fn->thaimonth[date('m', strtotime($value['news_date'])) * 1] ?></small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 text-center" style="top:20px;display:none;">
                                            <i class="fa fa-minus text-activity-to"></i>
                                        </div>

                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">

                                            <div>
                                                <div class="text-sm">ข่าวสารงานสิทธิประโยชน์</div>
                                                <?= $value['news_title'] ?>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php } ?>



                    </div>
                </div>
            </div>

        </div>

        <div style="background: #FAFAFA;padding-top: 30px;position: relative;">
            <div class=" container ">
                <div class="newsevent">
                    <h4 class="contents-title">
                        <i class="fas fa-bullhorn"></i>
                        กิจกรรม
                    </h4>
                    <div class="album ">
                        <div class="row">
                            <?php
                            while ($value = $gallery->fetch_assoc()) {
                                ?>
                                <div class="col-md-3 ">
                                    <a href="new_gallery.php?id=<?= $value['news_id'] ?>" class="row" target="_blank"> 
                                        <div class="album-box">
                                            <div class="img">
                                                <img src="gallery/thm/<?= $value['news_images'] ?>">
                                                <div class="TimeDate"> 12 ก.พ. 2562</div>

                                            </div>
                                            <div class="blog">
                                                <div class="cut-text-multi" style="font-size:15px;color:#000">
                                                     
                                                        <?= $value['news_name'] ?>
                                                     
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>


                        </div>
                    </div>
                </div>
            </div>
            <div class="bgo"></div>
        </div>

        <div id="hotelBg" style="position: relative;">

            <div class='bgOverlay'>
                <div class=" container ">
                    <div class="newsevent">
                        <h4 class="contents-title">
                            <i class="fas fa-hotel"></i>
                            ประเภทห้องพัก โรงแรมอาลัมพาง มหาวิทยาลัยราชภัฏลำปาง
                        </h4>
                        <div class="album ">
                            <div class="row">
                                <?php
                                while ($row = mysqli_fetch_assoc($hotel)) {
                                    ?>
                                    <div class="col-md-6 ">
                                        <a class="row blox" href="hotel_detail.php?id=<?= $row['room_id'] ?>">
                                            <div class="col-md-12 no-padding image">
                                                <img src="./hotel_room/<?= $row['room_pic']; ?>" class="w-100">
                                                <div class="price"> ราคา <?= number_format($row['price_rate'], 2); ?> บาท</div>
                                            </div>
                                            <div class="col-md-12 roomDetailMain">
                                                <h3>
                                                    <span> <?= $row['room_name']; ?> </span>
                                                </h3>
                                                <div class="roomDetailIndex" style="flex: 1;">
                                                    <?= $row['more_detail']; ?>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                <?php } ?>




                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div id="hotelBg" class="meeting" style="background: white;padding: 30px;position:relative">
            <div class="bgo"></div>
            <div>
                <div class=" container ">
                    <div class="newsevent">
                        <h4 class="contents-title" style="color: #000">
                            <i class="fas fa-hotel"></i>
                            ห้องประชุม
                        </h4>
                        <div class="album ">
                            <div class="row">
                                <?php
                                $i = 1;
                                while ($row = mysqli_fetch_assoc($mitting)) {
                                    if ($i % 2 == 0) {
                                        ?>
                                        <div class="col-md-12 ">
                                            <a class="row blox" href="mitting_detail.php?id=<?= $row['room_id']; ?>">
                                                <div class="col-md-6 no-padding image">
                                                    <img src="./hotel_room/<?= $row['room_pic']; ?>" class="w-100">

                                                </div>
                                                <div class="col-md-6 roomDetailMain">
                                                    <h3>
                                                        <span> <?= $row['room_name']; ?> </span>
                                                    </h3>
                                                    <div class="roomDetailIndex">
                                                        <?= $row['more_detail']; ?>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    <?php } else { ?>
                                        <div class="col-md-12  mt-5">
                                            <a class="row blox" href="mitting_detail.php?id=<?= $row['room_id']; ?>">

                                                <div class="col-md-6 roomDetailMain">
                                                    <h3>
                                                        <span> <?= $row['room_name']; ?> </span>
                                                    </h3>
                                                    <div class="roomDetailIndex">
                                                        <?= $row['more_detail']; ?>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 no-padding image">
                                                    <img src="./hotel_room/<?= $row['room_pic']; ?>" class="w-100">

                                                </div>

                                            </a>

                                        </div>
                                        <?php
                                    }
                                    $i++;
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       <?php include './_foot.php';?>
    </body>

</html>