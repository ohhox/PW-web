<?php
include '../_conn.php';
include '../functionx.php';
$fn = new functionx();
$fn->checkLogin();

$page = isset($_GET['p']) ? $_GET['p'] : 1;
$limit = 30;
$page = $page - 1;
$newsList = $fn->getPublicNews($page, $limit);
$count = $fn->countAllPublicNews();




include './_event_master.php';

$y = date("Y") + 542;
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
        <link href="css/event.css" rel="stylesheet">
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
                    <div class="card"  style="padding: 30px;">                        
                        <header style="text-align: center;">
                            <h1 style="margin: 0px;">แบบประเมินสิ่งสนับสนุนการเรียนรู้ </h1>
                            <h4>คณะครุศาสตร์  มหาวิทยาลัยราชภัฏลำปาง</h4>
                            <h4> 
                                ภาคเรียนที่ ๑ ปีการศึกษา ๒๕๖๐
                            </h4>
                            คำชี้แจง	โปรดทำเครื่องหมาย <i class="material-icons">check</i> เพื่อระบุระดับความพึงพอใจของท่านตามความเป็นจริงมากที่สุด
                        </header>
                        <div class="onechoing">

                            <form name="frm1" method="post" action="op_event.php?op=saveEventSupport">



                                <div class="input-group " style="margin-top: 40px;">
                                    <label for="termSelect1" class="col-sm-1 labsel">ภาคเรียนที่</label>
                                    <div class="col-sm-2">
                                        <select class="form-control" id="termSelect1" name="term">
                                            <option>1</option>
                                            <option>2</option>

                                        </select>
                                    </div>
                                    <label for="yearSelect1" class="col-sm-1 labsel">ปีการศึกษา</label>
                                    <div class="col-sm-2">
                                        <select class="form-control" name="year" id="yearSelect1">

                                            <?php for ($i = $y; $i < $y + 3; $i++) {
                                                ?>
                                                <option><?= $i; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>





                                <table class="table table-striped table-hover  ">
                                    <thead >
                                        <tr>
                                            <th rowspan="2">รายการประเมิน</th>
                                            <th colspan="5">ระดับความพึงพอใจ</th>
                                        </tr>
                                        <tr>
                                            <th>มากที่สุด</th>
                                            <th>มาก</th>
                                            <th>ปานกลาง</th>
                                            <th>น้อย</th>
                                            <th>น้อยที่สุด</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        foreach ($event_ch1 AS $key => $value) {
                                            ?>
                                            <tr>
                                                <td colspan="6" style="background: #dadada"><?= $key ?></td>
                                            </tr>
                                            <?php
                                            $count = 5;
                                            foreach ($value as $key2 => $value2) {
                                                ?>
                                                <tr>
                                                    <td style="padding-left: 20px;"><?= $value2 ?> </td>
                                                    <td> 
                                                        <div class="input-group  ">
                                                            <span class="input-group-addon">
                                                                <input type="radio" id="ch<?= $key2 ?>-1" name="ch[<?= $key2 ?>]" value="5" class="filled-in"  >
                                                                <label for="ch<?= $key2 ?>-1">มากที่สุด</label>
                                                            </span>
                                                        </div>
                                                    </td>

                                                    <td> 
                                                        <div class="input-group  ">
                                                            <span class="input-group-addon">
                                                                <input type="radio" id="ch<?= $key2 ?>-2" name="ch[<?= $key2 ?>]" value="4" class="filled-in"  >
                                                                <label for="ch<?= $key2 ?>-2">มาก</label>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td> 
                                                        <div class="input-group  ">
                                                            <span class="input-group-addon">
                                                                <input type="radio" id="ch<?= $key2 ?>-3" name="ch[<?= $key2 ?>]" value="3" class="filled-in"  >
                                                                <label for="ch<?= $key2 ?>-3">ปานกลาง</label>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td> 
                                                        <div class="input-group  ">
                                                            <span class="input-group-addon">
                                                                <input type="radio" id="ch<?= $key2 ?>-4" name="ch[<?= $key2 ?>]" value="2" class="filled-in"  >
                                                                <label for="ch<?= $key2 ?>-4">น้อย</label>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td> 
                                                        <div class="input-group  ">
                                                            <span class="input-group-addon">
                                                                <input type="radio" id="ch<?= $key2 ?>-5" name="ch[<?= $key2 ?>]" value="1" class="filled-in"  >
                                                                <label for="ch<?= $key2 ?>-5">น้อยที่สุด</label>
                                                            </span>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>


                                <div style="margin-top: 40px;margin-bottom: 20px;">    
                                    <label style="font-size: medium; color: #eb7171;">ข้อเสนอแนะเพิ่มเติมและ/หรือปัญหาที่ต้องการให้มีการแก้ไขปรับปรุง</label>
                                </div>
                                <div class="input-group ">
                                    <label>๑. ความคิดเห็นเกี่ยวกับสื่อ/เอกสารและอุปกรณ์การเรียนการสอน</label>
                                    <textarea type="text" name="commentMedia" class="form-control" style="width: 100%;height: 150px; resize: vertical;" ></textarea>

                                </div> 

                                <div class="input-group ">
                                    <label>๒. ความคิดเห็นเกี่ยวกับสถานที่การเรียนการสอนและสิ่งอำนวยความสะดวก</label>
                                    <textarea type="text" name="commentPlace" class="form-control" style="width: 100%;height: 150px; resize: vertical;" ><?= isset($StudentYear) ? $StudentYear->student_name : '' ?></textarea>

                                </div> 
                                <div class="input-group ">
                                    <label>๓. ความคิดเห็นเกี่ยวกับการให้บริการด้านวิชาการ</label>
                                    <textarea type="text" name="commentService" class="form-control" style="width: 100%;height: 150px; resize: vertical;" ><?= isset($StudentYear) ? $StudentYear->student_name : '' ?></textarea>

                                </div> 




                                <div >           
                                    <input type="hidden" name="student_id" value="<?= $_COOKIE['a']; ?>">
                                    <button type="submit" class="btn bg-green pull-right"> 
                                        <i class="material-icons">save</i>  
                                        <span class="icon-name">บันทึกข้อมูล</span>
                                    </button>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="clearfix"></div>      


                            </form>
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