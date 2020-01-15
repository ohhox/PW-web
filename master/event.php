<?php
include '../_conn.php';
include '../functionx.php';
$fn = new functionx();
$fn->checkLogin();
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
    <body class="theme-blue" data-page='event'>
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


                            <h2>รายการแบบประเมินของนักศึกษา</h2>

                        </div>
                        <div class="body">


                            <div class="card w-75" style="padding: 20px;">
                                <div class="card-body">
                                    <h5 class="card-title">แบบประเมินสิ่งสนับสนุนการเรียนรู้</h5>
                                    <p class="card-text">แบบประเมินสิ่งสนับสนุนการเรียนรู้</p>
                                    <a href="event_support.php" class="btn btn-success ">กรอกแบบประเมิน</a>
                                </div>
                            </div>
                            <div class="card w-75" style="padding: 20px;">
                                <div class="card-body">
                                    <h5 class="card-title">แบบประเมินรายวิชา</h5>
                                    <p class="card-text">แบบประเมินรายวิชา</p>
                                    <a href="event_course.php" class="btn btn-success">กรอกแบบประเมิน</a>
                                </div>
                            </div>
                            <div class="card w-75" style="padding: 20px;">
                                <div class="card-body">
                                    <h5 class="card-title">แบบประเมินความพึงพอใจของอาจารย์ประจำหลักสูตร</h5>
                                    <p class="card-text">แบบประเมินความพึงพอใจของอาจารย์ประจำหลักสูตร</p>
                                    <a href="event_lecturer.php" class="btn btn-success">กรอกแบบประเมิน</a>
                                </div>
                            </div>
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