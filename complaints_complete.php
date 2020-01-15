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
                                        <div class="text-success text-center">
                                            <i class="fa fa-save fa-4x"></i> <br/>
                                            <span style="font-size: 1.5rem;"> บันทึกข้อมูลเรียบร้อย </span>
                                            <div style="padding: 20px;">
                                                <a class="btn btn-primary text-white" href="index.php"><i class="fa fa-home"></i> กลับหน้าแรก</a>
                                                <a class="btn btn-primary text-white" href="complaints.php"><i class="fa fa-refresh"></i> ส่งอีกครั้ง</a> 
                                            </div> 
                                        </div>
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

    </body>

</html>
