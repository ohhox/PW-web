<?php
 
include '../_conn.php';
include '../functionx.php';
$fn = new functionx();
$fn->checkLogin();

$course = $fn->getCourse();
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
    <body class="theme-blue" data-page='course'>
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
                            <a class="pull-right btn   bg-green waves-effect" href="course_frm.php" >
                                <i class="material-icons">add</i> 
                                <span class="icon-name">เพิ่มรายวิชา</span>
                            </a>
                            <h2>รายวิชา (<?= $course->num_rows ?> วิชา) </h2>
                        </div>

                        <div class="body">
                            <form action="op_news.php?op=teacher_order" method="post">
                                <table class="table">

                                    <thead>
                                        <tr>

 <th>#</th>   
                                            <th>รหัสรายวิชา</th>   
                                            <th>ชื่อรายวิชา</th>
                                         <th>จัดการ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        while ($row = $course->fetch_object()) {
                                            ?>
                                            <tr> 
                                                <td><?php echo $i; ?> </td> 
                                                <td><?= $row->course_code; ?> </td> 
                                                <td><?= $row->course_name; ?> </td>
                                              
                                                <td> 
                                                    <a class="btn btn-warning" href="course_frm.php?id=<?= $row->course_id; ?>">แก้ไข</a> 
                                                    <a class="btn btn-danger removeNews" href="op_event.php?op=RemoveCourse&id=<?= $row->course_id; ?>">ลบ</a>
                                                </td>
                                            </tr>
                                            <?php
                                        $i++;}
                                        ?>
                              
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </section>       
        <?php include './_inc/jsimport.php'; ?>    
        <script src="js/news.js" type="text/javascript" ></script>

    </body>
</html>