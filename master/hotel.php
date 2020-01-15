<?php
include '../_conn.php';
include '../functionx.php';
$fn = new functionx();
$fn->checkLogin();

$data = $fn->mysqli->query("SELECT * FROM hotel");
?>

<!DOCTYPE html>
<html lang="th">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>  ระบบจัดการข้อมูล </title>
        <?php
        include "_inc/header.php";
        ?>
    </head>
    <body class="theme-blue" data-page='hotel'>
        <?php
        include "_inc/head.php";
        ?>
        <section class="content">
            <div class="container-fluid">
                <div class="block-header">


                </div>

                <!-- Widgets -->
                <div class="row clearfix" >
                    <div class="card" >
                        <div class="header">


                            <h2 style="justify-content: space-between;display: flex;">
                                <div> รายการห้องพัก</div>
                                <a class="btn btn-primary btn-sm" href="hotel_form.php"> + เพิ่มรายการ</a>
                            </h2>

                        </div>
                        <div class="body row">    
                            <?php
                            while ($row = mysqli_fetch_assoc($data)) {
                                ?>
                                <div class="card col-md-5" style="margin-right: 20px;padding: 0px;background-image: url(../hotel_room/<?= $row['room_pic'] ?>);background-size: 100%">
                                    <div class="card-body" style="background: rgba(0,0,0,0.5);padding: 20px;min-height: 300px;display: flex;flex-direction: column;">
                                        <div style="flex: 1;">
                                            <h3 class="card-title" style="color: #fff"><?= $row['room_name']; ?></h3>
                                            <p class="card-text" style="color: #eee">ราคา <?= $row['price_rate'] ?> บาท | จำนวนผู้เข้าพัก <?= $row['numberofguests'] ?> คน</p>
                                        </div>
                                        <div style="display:flex;justify-content: space-between;">
                                            <a href="hotel_form.php?id=<?= $row['room_id'] ?>" class="btn btn-success">แก้ไข / รายละเอียด </a>
                                            <a href="op_hotel.php?op=removeHotel&id=<?= $row['room_id'] ?>" class="removeHotel btn btn-danger"> ลบข้อมูล </a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>


                </div>

            </div>
        </section>       
        <?php include './_inc/jsimport.php'; ?>    
        <script src="js/news.js" type="text/javascript" ></script>
        <script>

        </script>

    </body>
</html>