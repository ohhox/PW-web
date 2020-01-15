<?php
 
include '../_conn.php';
include '../functionx.php';
$fn = new functionx();
$fn->checkLogin();

$url = "savefileDownload";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $fn = new functionx();
    $StudentYear = $fn->getFileDownload($id);
    $url = "ModifilefileDownload&id=$id";
}
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
    <body class="theme-blue" data-page='files'>
        <?php
        include "_inc/head.php";
        ?>
        <section class="content">
            <div class="container-fluid">
                <div class="block-header">

                    <h2>ข้อมูลนักศึกษา     </h2>
                </div>

                <div class="row clearfix">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    ฟอร์มอัพโหลดไฟล์ดาวน์โหลด                 
                                </h2>

                            </div>
                            <div class="body">
                                <form action="op_news.php?op=<?= $url ?>" method="post"  enctype="multipart/form-data">
 
                                    <div  >
                                        <div >
                                            <div> 
                                                <div class="input-group ">
                                                    <label>เลือกไฟล์</label>
                                                    <input type="file"  name="file_name"  <?= !isset($StudentYear) ? 'required' :''  ?> >
                                                    <?php
                                                    if (isset($StudentYear) && !empty($StudentYear->file_name)) {
                                                        ?>
                                                        <div>
                                                            <a target="_BLANK" href="../file/<?= $StudentYear->file_name ?>">  <?= $StudentYear->file_name ?> </a>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                                <div class="input-group ">
                                                    <label>ชื่อไฟล์</label>
                                                    <input type="text"  name="file_display_name" class="form-control" value="<?= isset($StudentYear) ? $StudentYear->file_display_name : '' ?>"  required>
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
