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
        <link rel="stylesheet" href="./css/">

        <link href="css/bootstrap-datepicker-custom/dist/css/bootstrap-datepicker.css" rel="stylesheet" />

        <script src="css/bootstrap-datepicker-custom/jquery-2.1.3.min.js"></script>

        <script src="css/bootstrap-datepicker-custom/dist/js/bootstrap-datepicker-custom.js"></script>
        <script src="css/bootstrap-datepicker-custom/dist/locales/bootstrap-datepicker.th.min.js" charset="UTF-8"></script>

        <script src="./RobinHerbots-Inputmask-e11ee84/dist/jquery.inputmask.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.datepicker').datepicker({
                    format: 'dd/mm/yyyy',
                    todayBtn: true,
                    language: 'th',             //เปลี่ยน label ต่างของ ปฏิทิน ให้เป็น ภาษาไทย   (ต้องใช้ไฟล์ bootstrap-datepicker.th.min.js นี้ด้วย)
                    thaiyear: true              //Set เป็นปี พ.ศ.
                }).datepicker("setDate", "0");  //กำหนดเป็นวันปัจุบัน

                $('.time-input').inputmask("99:99");

            });
        </script>
    
    </head>

    <body>
        <?php include './_head_1.php'; ?>
        <div id="hotelBg" style="position: relative;">

            <div class='bgOverlay'>
                <div class=" container " >
                    <div class="newsevent">
                        <h4 class="contents-title">
                            <i class="fas fa-hotel"></i>
                            จองห้องประชุม
                        </h4>
                        <div class="album " style="background: #FFF;padding: 15px;">
                    <form action="Meetingroomreservation.php" method="post">
                            <div class="row">
                                <div class="col-md-4">

                                    <label class='title'>เลือกห้องประชุม</label>
                                    <div  >
                                        <?php
                                        while ($row = mysqli_fetch_assoc($mitting)) {
                                            ?>
                                            <div  >
                                                <label class="radio">
                                                    <input type="radio" name="room" value="<?= $row['room_id'] ?>"> 
                                                    <span><?= $row['room_name']; ?></span>
                                                    <div ><small>อาคาร <?= ($row['building']); ?></small></div>
                                                </label>

                                            </div>

                                        <?php } ?>




                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <label class='title'>ระยะเวลาการใช้ห้องประชุม</label>
                                    <div class="form-group">
                                        <label>เริ่มวันที่</label>
                                        <input type="text" name='reservations_date_start' class="datePicker datepicker form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>ถึงวันที่</label>
                                        <input type="text" name='reservations_date_end' class="datePicker datepicker form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>ช่วงเวลา</label> 
                                        <div style="margin-left: 30px;">
                                            <div  > 
                                                <input type="text" name='req_time_s' class="datePicker form-control time-input" style='width:100px;display:inline-block'> ถึง 
                                                <input type="text" name='req_time_e' class="datePicker form-control time-input" style='width:100px;display:inline-block'> น.
                                            </div>
                                             
                                            
                                        </div>
                                    </div>

                                    <label class='title'>ระยะเวลาการเตรียมงาน</label>
                                    <div class="form-group">
                                        <label>เริ่มวันที่</label>
                                        <input type="text" class="datePicker datepicker form-control" name='Preparation_date' >
                                    </div>

                                    <div class="form-group">
                                        <label>เวลา</label>
                                        <div style="margin-left: 30px;">
                                            <input type="text" name='Preparation_time_s' class="datePicker form-control time-input" style='width:100px;display:inline-block'> ถึง 
                                            <input type="text" name='Preparation_time_e' class="datePicker form-control time-input" style='width:100px;display:inline-block'>   น.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class='title'>รายละเอียดผู้จอง</label>
                                    <div class='form-group'>
                                        <label for="">ชื่อ - นามสกุล</label>
                                        <input type="text" name="customer_name" id="customer_name" class="form-control">
                                    </div>
                                    <div class='form-group'>
                                        <label for="">ตำแหน่ง</label>
                                        <input type="text" name="posiotion" id="posiotion" class="form-control">
                                    </div>
                                    <div class='form-group'>
                                        <label for="">จากหน่วยงาน</label>
                                        <label   class='radio' style='font-size:1rem;'> 
                                            <input type="radio"  name="office" id="office1"> หน่วยงานภายในมหาวิทยาลัยราชภัฏลำปาง
                                        </label>
                                        <label   class='radio' style='font-size:1rem;'> 
                                            <input type="radio" name="office" id="office2"> หน่วยงานภายนอก
                                        </label>
                                    </div>
                                    <div class='form-group'>
                                        <label for="">จากหน่วยงาน</label>
                                        <input type="text" name="company" id="company" class="form-control">
                                    </div>

                                    <div class='form-group'>
                                        <label for="">เบอร์โทรศัพท์สำนักงาน</label>
                                        <input type="text" name="tel" id="tel" class="form-control">
                                    </div>
                                     <div class='form-group'>
                                        <label for="">เบอร์โทรศัพท์มือถือ</label>
                                        <input type="text" name="m_tel" id="m_tel" class="form-control">
                                    </div>
                                    <div class='form-group'>
                                        <label for="">จำนวนผู้เข้าร่วม</label>
                                        <input type="text" name="Number_of_participants" id="Number_of_participants" class="form-control">
                                    </div>

                                            <button type='submit' class='btn btn-primary'>บันทึกการจอง</button>
                                </div>

                            </div>

                            </form>
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