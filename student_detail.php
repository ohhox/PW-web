<?php
header('Content-Type: text/html; charset=utf-8');
include '_conn.php';
include 'functionx.php';
$fn = new functionx();
$student = $fn->getStudent($_GET['id']);
$year = $fn->getStudentYear($_GET['y']);
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


            <div class="col-md-12 Inview" style="padding: 0px;" >                
                <?php
                include './_Nav.php';
                ?>
                <div  id="MainContent">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="NewsTitle">
                                <div class="NewsTitleBox"> 
                                    <a class="btn btn-link" href="studentlist.php?id=<?= $_GET['y'] ?>"> <i class="fa fa-angle-left"></i> กลับ </a>
                                    <span class="fa fa-user-secret "> </span> 
                                    รุ่น <?= $year->sy_gen ?> ปีการศึกษา <?= $year->sy_year ?>
                                </div>
                            </div>
                            <div id="NewsPubic" style="padding-top: 30px;">
                                <div class="row" style="padding: 0px;">
                                    <div class="col-md-6" style="padding: 0px;">
                                        <img src="gallery/<?= $student->student_image ?>" style="width: 100%;border-radius: 6px;  -webkit-box-shadow: 7px 6px 18px -11px rgba(83,17,128,1);
                                             -moz-box-shadow: 7px 6px 18px -11px rgba(83,17,128,1);
                                             box-shadow: 7px 6px 18px -11px rgba(83,17,128,1);">
                                    </div>
                                    <div class="col-md-6" style="padding: 0px;">
                                        <div  class="blog">
                                            <div >
                                                <label>ชื่อ</label>  
                                                <div class="detail">
                                                    <?= $student->student_name ?>
                                                </div> 
                                            </div> 


                                            <div   >
                                                <label>รหัสนักศึกษา</label>  
                                                <div class="detail">
                                                    <?= $student->student_code ?>
                                                </div> 
                                            </div> 


                                            <div  >
                                                <label>วุฒิการศึกษา ระดับปริญญาตรี</label>  
                                                <div >
                                                    <?= $student->student_degree ?>
                                                </div> 
                                            </div> 


                                            <div  >
                                                <label>สถานที่ทำงาน</label>  
                                                <div >
                                                    <?= $student->student_work ?>
                                                </div> 
                                            </div> 

                                            <div  >
                                                <label>ตำแหน่ง</label>  
                                                <div >
                                                    <?= $student->student_position ?>
                                                </div> 
                                            </div> 

                                            <div  >
                                                <label>จบการศึกษาระดับปริญญาตรี จาก</label>  
                                                <div >
                                                    <?= $student->student_university ?>
                                                </div> 
                                            </div> 

                                            <div  >
                                                <label>ปีการศึกษาที่จบ</label>  
                                                <div >
                                                    <?= $student->student_year ?>
                                                </div> 
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
        <!-- Content section -->
        <?php include '_foot.php'; ?>

    </body>

</html>
