<?php
header('Content-Type: text/html; charset=utf-8');
include '_conn.php';
include 'functionx.php';
$fn = new functionx();
$teacher = $fn->getTeacher();

$data = array();
$i = 1;
while ($row = $teacher->fetch_object()) {
    $data[$row->order_num][$i++] = $row;
}
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

                                    <span class="fa fa-user-secret "> </span>  บุคลากรประจำสาขาวิชา
                                </div>
                            </div>
                            <div id="NewsPubic"  style="padding-top: 30px;">
                                <div class="row justify-content-md-center" >
                                    <?php
                                    foreach ($data AS $key => $value) {

                                        foreach ($value as $count => $row) {
                                            ?>
                                            <a class="col-md-3 studentList"   >
                                                <div class="studentImage">
                                                    <img src="gallery/<?= $row->teacher_image ?>">
                                                    <div class="studentName">
                                                        <?= $row->teacher_name ?>
                                                        <div>
                                                            <small> <?= $row->teacher_position ?>  </small> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clear"></div>
                                            </a>

                                            <?php
                                        }
                                        ?> <div class="col-12"></div>    <?php
                                    }
                                    ?>
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
