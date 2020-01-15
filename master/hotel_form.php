<?php
include '../_conn.php';
include '../functionx.php';
$fn = new functionx();
$fn->checkLogin();

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $data = $fn->mysqli->query("SELECT * FROM hotel WHERE room_id='{$_GET['id']}' ");
    $data = mysqli_fetch_assoc($data);
}
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

                    <h2>ฟอร์มเพิ่มประเภทห้องพัก </h2>
                </div>

                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    รายละเอียดห้องพัก                          
                                </h2>

                            </div>
                            <div class="body">
                                <form action="op_hotel.php?op=<?= isset($_GET['id']) && !empty($_GET['id']) ? 'updateRoom&id=' . $_GET['id'] : 'newroom' ?>" method="post" multipart='' enctype="multipart/form-data">
                                    <div class="row clearfix">
                                        <div class="col-md-9">
                                            <b> ประเถทห้องพัก *</b>
                                            <div class="input-group colorpicker">
                                                <div class="form-line">
                                                    <input type="text" required class="form-control" name="room_name"  value="<?= isset($data['room_name']) ? $data['room_name'] : '' ?>" placeholder="ประเถทห้องพัก">
                                                </div>

                                            </div>

                                            <b> ราคา *</b>
                                            <div class="input-group colorpicker">
                                                <div class="form-line">
                                                    <input type="text" required class="form-control" name="price_rate" placeholder="ราคา" value="<?= isset($data['price_rate']) ? $data['price_rate'] : '' ?>">
                                                </div>
                                            </div>

                                            <b> จำนวนผู้เข้าพัก *</b>
                                            <div class="input-group colorpicker">
                                                <div class="form-line">
                                                    <input type="text" required class="form-control" name="numberofguests" placeholder="จำนวนผู้เข้าพัก" value="<?= isset($data['numberofguests']) ? $data['numberofguests'] : '' ?>">
                                                </div>

                                            </div>

                                            <b> รายละเอียดห้องพัก *</b>  
                                            <div class="input-group colorpicker">
                                                <div class="form-line">
                                                    <textarea id="ckeditor"  required name="more_detail"><?= isset($data['more_detail']) ? $data['more_detail'] : '' ?></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <b>รูปภาพประเภทห้องพัก (รูปหลัก) * <br/> <small>(ขนาดของรูป 1024px X 730px) </small> </b> <br/>
                                            <small style="color: #0000ff">ควรทำการ resize รูปภาพก่อนนำเข้าระบบ</small>
                                            <div class="input-group colorpicker">
                                                <input type="file" name="room_pic" <?= isset($_GET['id']) && !empty($_GET['id']) ? '' : 'required' ?>   accept="image/*">
                                                <?php
                                                if (isset($data['room_pic']) && !empty($data['room_pic'])) {
                                                    ?>
                                                    <div style="margin-top: 10px;">
                                                        <a href="../hotel_room/<?= $data['room_pic'] ?>" target="_BLANK">
                                                            <img src="../hotel_room/thm/<?= $data['room_pic'] ?>" style="width: 200px;max-width: 100%;">
                                                        </a>
                                                    </div>
                                                <?php } ?>
                                            </div>

                                            <b>รูปภาพอัลบั้ม <small> (ขนาดของแต่ละภาพไม่ควรเกิน 1MB </small>) </b> <br/>
                                            <small style="color: #0000ff">ควรทำการ resize รูปภาพก่อนนำเข้าระบบ</small>

                                            <div class="input-group colorpicker">
                                                <input type="file" name="room_pic_gallery[]" multiple  accept="image/*" >
                                                <div class="row" style="margin-top: 10px;">
                                                    <?php
                                                    if (isset($_GET['id']) && isset($data)) {
                                                        $gl = $fn->mysqli->query("SELECT * FROM hotel_gallery WHERE hotel_id='{$_GET['id']}'");
                                                        while ($resx = mysqli_fetch_assoc($gl)) {
//                                                        $fn->s($resx);
                                                            ?>
                                                    <div class="col-md-5" style="border: 1px solid #b1b1b1;overflow: hidden;margin-right: 10px;padding: 0px;">
                                                                <div style="display: flex;justify-content: space-between;">
                                                                    <a class=" removeHotelGl"  style="cursor: pointer;color: red;"
                                                                         href="op_hotel.php?op=removeGl&thisId=<?= $resx['hotel_gallery_id'] ?>">
                                                                        <i class="material-icons">
                                                                            close
                                                                        </i>

                                                                    </a>
                                                                    <a  href="../hotel_room/<?= $resx['image_name'] ?>" target="_BLANK" style="display: block;height:100px;flex: 1;">
                                                                        <img src="../hotel_room/thm/<?= $resx['image_name'] ?>" style=" max-width: 100%;">
                                                                    </a>
                                                                </div>

                                                            </div>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="clearfix"></div>



                                        <div class="col-md-9">                                            
                                            <button type="submit" class="btn bg-green pull-right"> 
                                                <i class="material-icons">save</i>  
                                                <span class="icon-name">บันทึกข้อมูล</span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>       
        <?php include './_inc/jsimport.php'; ?>  
        <script src="ckeditor/ckeditor.js"></script>
        <script src="ckeditor/config.js"></script>
        <script src="js/news.js" type="text/javascript" ></script>
    </body>
</html>