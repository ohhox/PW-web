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
        <title>  งานสิทธิประโยชน์</title>
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=K2D&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="fontawesome-free-5.9.0-web/css/all.css">
        <link href="css/css.css" rel="stylesheet">       
        <link href="css/main.css" rel="stylesheet">

        <link href="css/custom.css" rel="stylesheet">
    </head>

    <body>
        <?php include './_head_1.php'; ?>
        <div id="hotelBg" style="position: relative;">

            <div class='bgOverlay'>
                <div class=" container ">
                    <div class="newsevent">
                        <h4 class="contents-title">
                            <i class="fas fa-hotel"></i>
                            ห้องประชุม
                        </h4>
                        <div class="album ">
                            <div class="row">
                                <?php
                                while ($row = mysqli_fetch_assoc($mitting)) {
                                    ?>
                                    <div class="col-md-6 ">
                                        <a class="row blox" href="mitting_detail.php?id=<?= $row['room_id'] ?>">
                                            <div class="col-md-12 no-padding image">
                                                <img src="./hotel_room/<?= $row['room_pic']; ?>" class="w-100">
                                                <div class="price"> ความจุ <?= number_format($row['numberofguests']); ?> ที่นั่ง</div>
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




        <footer>
            <div class="container">
                @งานสิทธิประโยชน์
            </div>
        </footer>
    </body>

</html>