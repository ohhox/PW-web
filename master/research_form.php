<?php
 
include '../_conn.php';
include '../functionx.php';
$fn = new functionx();
$fn->checkLogin();

$url = "saveResearch";
if (isset($_GET['id'])) {
    $id = $_GET['id']; 
    $StudentYear = $fn->getResearch($id);
    $url = "ModifileResearch&id=$id";
}
?>
<!DOCTYPE html>
<html lang="th">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>  ระบบจัดการข้อมูล  </title>
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

                    <h2>ข้อมูลผลงานวิจัย     </h2>
                </div>

                <div class="row clearfix">
                    <div class="col-md-3"></div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    ข้อมูลผลงานวิจัย                   
                                </h2>

                            </div>
                            <div class="body">
                                <form action="op_news.php?op=<?= $url ?>" method="post"  enctype="multipart/form-data">                                  
                                    <div  >
                                        <div >
                                            <div> 
                                                <div class="input-group ">
                                                    <label>ไฟล์ผลงานวิจัย</label>
                                                    <input type="file"  name="file" >
                                                    <?php
                                                    if (isset($StudentYear) && !empty($StudentYear->file)) {
                                                        ?>
                                                        <div>
                                                            <a target="_BLANK" href="../file/<?= $StudentYear->file ?>"> <?= $StudentYear->file ?> </a>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                                <div class="input-group ">
                                                    <label>ชื่อวิจัย</label>
                                                    <input type="text"  name="research_name" class="form-control" value="<?= isset($StudentYear) ? $StudentYear->research_name : '' ?>">
                                                </div>
                                                <div class="input-group ">
                                                    <label>ปี</label>
                                                    <input type="text"  name="research_year" class="form-control" value="<?= isset($StudentYear) ? $StudentYear->research_year : '' ?>">
                                                </div> 
                                                <div class="input-group ">
                                                    <label>ผู้วิจัย</label>
                                                    <textarea type="text" name="student_name" class="form-control" style="width: 100%;height: 150px; resize: vertical;" ><?= isset($StudentYear) ? $StudentYear->student_name : '' ?></textarea>
                                                    <small style="color: #eb7171;"> คั้นรายชื่อด้วยเครื่องหมาย , (คอมม่า) </small> 
                                                </div> 
                                            </div>

                                            <div >                                            
                                                <button type="submit" class="btn bg-green pull-right"> 
                                                    <i class="material-icons">save</i>  
                                                    <span class="icon-name">บันทึกข้อมูล</span>
                                                </button>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="clearfix"></div>
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
    </body>
</html>
