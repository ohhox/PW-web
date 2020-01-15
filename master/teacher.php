<?php
 
include '../_conn.php';
include '../functionx.php';
$fn = new functionx();
$fn->checkLogin();

$student = $fn->getTeacher();
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
    <body class="theme-blue" data-page='teacher'>
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
                            <a class="pull-right btn   bg-green waves-effect" href="teacher_form.php?syid=<?= $_GET['id'] ?>" >
                                <i class="material-icons">add</i> 
                                <span class="icon-name">เพิ่มบุคลากร</span>
                            </a>
                            <h2>รายชื่อบุคลากร (<?= $student->num_rows ?> คน) </h2>
                        </div>

                        <div class="body">
                            <form action="op_news.php?op=teacher_order" method="post">
                                <table class="table">

                                    <thead>
                                        <tr>


                                            <th>ชื่อ - นามสกุล</th>   
                                            <th>ตำแหน่ง</th>
                                            <th>ลำดับ</th>
                                            <th>จัดการ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        while ($row = $student->fetch_object()) {
                                            ?>
                                            <tr> 
                                                <td><?= $row->teacher_name; ?> </td> 
                                                <td><?= $row->teacher_position; ?> </td>
                                                <td> <input tabindex="<?=$i++?>" type="text" class="form-control" name="order_num[<?= $row->teacher_id; ?>]" style="width: 50px;" value="<?= $row->order_num ?>"></td>
                                                <td> 
                                                    <a class="btn btn-warning" href="teacher_form.php?id=<?= $row->teacher_id; ?>">แก้ไข</a> 
                                                    <a class="btn btn-danger removeNews" href="op_news.php?op=RemoveTeacher&id=<?= $row->teacher_id; ?>">ลบ</a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        <tr> 
                                            <td>  </td> 
                                            <td>  </td>
                                            <td> <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> บันทึก</button></td>
                                            <td> 

                                            </td>
                                        </tr>
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