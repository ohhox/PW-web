<?php
include '_conn.php';
include 'functionx.php';
$fn = new functionx(); 

$hotel = $fn->getHotel($_GET['id']); 
$row = mysqli_fetch_assoc($hotel);

$gallery = $fn->mysqli->query("SELECT * FROM hotel_gallery WHERE hotel_id='{$_GET['id']}'");
?>
<!DOCTYPE html>
<html lang="en">

      <head>
        <meta charset="UTF-8">

        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title> ห้องพัก : งานสิทธิประโยชน์</title>
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
                            
                            <a href="hotel.php" class="text-white">
                                <i class="fas fa-hotel"></i>
                                โรงแรมที่พัก 
                            </a>  /
                            <span> <?= $row['room_name']; ?> </span>
                        </h4>
                        <div class="album ">
                            <div class="row">                                
                                    <div class="col-md-12 ">
                                        <div class="row blox" href="hotel_detail.php?id=<?= $row['room_id'] ?>" style="height: auto0">
                                            <div class="col-md-8 no-padding image" style="height: auto">
                                                <img src="./hotel_room/<?= $row['room_pic']; ?>" class="w-100">
                                                <div class="row" style="padding: 10px;">
                                                    <?php
                                                    while ($gl = mysqli_fetch_assoc($gallery)){
                                                        ?>
                                                    <div class="col-md-2"style="background: #EEE;">
                                                        <a href="./hotel_room/<?=$gl['image_name']?>" class="showImage">
                                                        <img src='./hotel_room/<?=$gl['image_name']?>'   style="width: 100%;"/>
                                                        </a>
                                                    </div>
                                                            <?php
                                                    }
                                                    ?>
                                                </div>
                                                
                                            </div>
                                            <div class="col-md-4 roomDetailMain">
                                                <h3>
                                                    <span> <?= $row['room_name']; ?> </span>
                                                </h3>
                                                <div class="price"> ราคา <?= number_format($row['price_rate'], 2); ?> บาท</div>
                                                <div class="roomDetailIndex" style="flex: 1;">
                                                    <?= $row['more_detail']; ?>
                                                </div>
                                                 
                                            </div>
                                        </div>
                                    </div>

                               




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