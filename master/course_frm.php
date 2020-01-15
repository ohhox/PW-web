<?php
include '../_conn.php';
include '../functionx.php';
$fn = new functionx();
$fn->checkLogin();

$url = "saveCourse";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $cour = $fn->getCourse($id);
    $url = "ModifileCourse&id=$id";
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
    <body class="theme-blue" data-page='course'>
        <?php
        include "_inc/head.php";
        ?>
        <section class="content">
            <div class="container-fluid">
                <div class="block-header">

                    <h2>ข้อมูลรายวิชา    </h2>
                </div>

                <div class="row clearfix">
                    <div class="col-md-3"></div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    รายละเอียดข้อมูลรายวิชา                      
                                </h2>

                            </div>
                            <div class="body">
                                <form action="op_event.php?op=<?= $url ?>" method="post" >                                  
                                    <div  >
                                        <div >
                                            <div> 
                                                <div class="input-group ">
                                                    <label>รหัสรายวิชา</label>
                                                    <input type="text"  name="course_code" class="form-control" value="<?= isset($cour) ? $cour->course_code : '' ?>">
                                                </div>

                                                <div class="input-group ">
                                                    <label>ชื่อรายวิชา</label>
                                                    <input type="text"  name="course_name" class="form-control" value="<?= isset($cour) ? $cour->course_name : '' ?>">
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
