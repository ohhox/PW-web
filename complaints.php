<?php
header('Content-Type: text/html; charset=utf-8');
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


            <div class="col-md-12" style="padding: 0px;">                
                <?php
                include './_Nav.php';
                ?>
                <div  id="MainContent">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="NewsTitle">

                                <div class="NewsTitleBox"> <span class="fa fa-comments "> </span> แจ้งเรื่องร้องเรียน / เสนอความคิดเห็น </div>

                            </div>
                            <div id="NewsPubic">
                                <div class="row"  style="padding-top: 20px;">
                                    <div class="col-md-6"  >
                                        <span class="fa fa-comments "> </span> แจ้งเรื่องร้องเรียน / เสนอความคิดเห็น
                                        <div class="panel panel-success" style="font-size: 14px;font-family: sans-serif;padding-top: 10px;">
                                            <div class="panel-heading style1"><b>ข้อตกลงเบื้องต้น </b></div>
                                            <div class="panel-body">
                                                <p style="padding-left: 15px;">
                                                    1. ข้อมูลของท่านจะถูกเก็บเป็นความลับ<br/>
                                                    2. ไม่เป็นข้อความที่ใส่ร้ายป้ายสีใครให้เดือดร้อน<br/>
                                                    3. ไม่เป็นข้อความที่มีลักษณะหยาบคาย <br/>
                                                    4. ท่านต้อง ระบุชื่อ-นามสกุล และ อีเมล์ จริงหากต้องการให้ตอบกลับ
                                                </p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <form action="_op_fontend.php?op=complaints" method="post"> 
                                            <div class="form-group">
                                                <label for="subject">เรื่องติดต่อ *</label>
                                                <input type="text" class="form-control" name="subject" id="subject"  required  placeholder="เรื่อง..">                                                    
                                            </div>
                                            <div class="form-group">
                                                <label for="name_lastname">ชื่อ-นามสกุล ผู้ติดต่อ *</label>
                                                <input type="text" class="form-control" name="name_lastname" id="subject" required  placeholder="ชื่อ-นามสกุล..">                                                    
                                            </div>
                                            <div class="form-group">
                                                <label for="email">อีเมล์  *</label>
                                                <input type="email" class="form-control" name="email" id="subject" required  placeholder="อีเมล์..">                                                    
                                            </div>
                                            <div class="form-group">
                                                <label for="message">ข้อความ  *</label>
                                                <textarea class="form-control" name="message" style="height: 150px;" required></textarea>
                                            </div>
                                            <div class="g-recaptcha" data-sitekey="6Lfr4EEUAAAAAG4-kVVr_8cwSbUYwWcqAXr0Gz0A"></div>

                                            <button type="submit" class="btn btn-primary">ส่ง</button>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>





                </div>

                <div class="clear"></div>


            </div>
        </div>



        <?php include '_foot.php'; ?>
        <script src='https://www.google.com/recaptcha/api.js?hl=th'></script>

    </body>

</html>
