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
        <meta charset="UTF-8">

        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>บุคลากร : งานสิทธิประโยชน์</title>
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=K2D&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="fontawesome-free-5.9.0-web/css/all.css">
        <link href="css/css.css" rel="stylesheet">       
        <link href="css/main.css" rel="stylesheet">

        <link href="css/custom.css" rel="stylesheet">
    </head>

    <body>
        <?php include './_head_1.php'; ?>
        <div class="visual" style="background-color: #FF73FD;" >


            <div class="container "> 

                <div   >                
                    <h4 style="margin-bottom: 20px;"><i class="fas fa-user-secret"></i> บุคลากร</h4>
                    <div  id="MainContent">
                        <div class="row">
                            <div class="col-md-12">
                                
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
