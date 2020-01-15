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
                            <h1 style="margin: 0px;">แบบประเมินความพึงพอใจของอาจารย์ประจำหลักสูตร </h1>
                            <h4>คณะครุศาสตร์  มหาวิทยาลัยราชภัฏลำปาง</h4>
                            <h4> 
                                ภาคเรียนที่ ๑ ปีการศึกษา ๒๕๖๐
                            </h4>
                            คำชี้แจง	โปรดทำเครื่องหมาย  เพื่อระบุระดับความพึงพอใจของท่านตามความเป็นจริงมากที่สุด
                        </header>
                        <div class="onechoing">

                            <form name="frm1" method="post" action="op_event.php?op=saveEventLecturer">
                                
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
             
                                 <label>ข้อมูลทั่วไปของผู้ตอบแบบสอบถาม (ตอบได้มากกว่า 1 ข้อ)</label>
                                <div class="form-group form-check"> 
    <input type="checkbox" class="form-check-input" name="isResponsible" id="exampleCheck1">
    <label class="form-check-label"  for="exampleCheck1">อาจารย์ผู้รับผิดชอบหลักสูตร </label>
      </div>
     <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="isFrequent" id="exampleCheck2">
    <label class="form-check-label"  for="exampleCheck2">อาจารย์ประจำหลักสูตร</label>
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
                                        foreach ($event_ch3 AS $key => $value) {
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


                                <div class="input-group ">
                                <p>
                                    <label>ด้านข้อร้องเรียนต่างๆ (ตบช.ที่ 3.3 ผลการจัดการข้อร้องเรียนของนักศึกษา)</label>
                                </p>
                                 <p>
                                    <label>•  ท่านเคยได้รับทราบข้อร้องเรียนจากนักศึกษาต่อการจัดการหลักสูตร สาขาวิชา ภาควิชา หรือคณะหรือไม่</label>
                                 </p>


                                </div>
                                <div class="input-group ">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="request" id="exampleRadios1" value="1" >
                                        <label class="form-check-label" for="exampleRadios1">
                                            เคย ระบุข้อร้องเรียน
                                        </label>
                                        <input type="text" class="form-control" name="requestTopic" id="requestTopic" aria-describedby="emailHelp" placeholder="">
                                    </div>
                                </div>
                                <div class="input-group ">
                                    <label>ข้อร้องเรียนได้รับการแก้ไขปรับปรุงหรือไม่อย่างไร</label>
                                    <textarea type="text" name="requestImprove" class="form-control" style="width: 100%;height: 100px; resize: vertical;" ></textarea>

                                </div> 
                                <div class="input-group ">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="request" id="exampleRadios2" value="0" >
                                        <label class="form-check-label" for="exampleRadios2">
                                            ไม่เคย
                                        </label>
                                    </div>
                                </div>
                                <div class="input-group ">
                                    <label>ความคิดเห็นเพิ่มเติม ด้านข้อร้องเรียนต่างๆ ของนักศึกษา</label>
                                    <textarea type="text" name="commentRequest" class="form-control" style="width: 100%;height: 100px; resize: vertical;" ><?= isset($StudentYear) ? $StudentYear->student_name : '' ?></textarea>

                                </div> 
                                <div class="input-group ">
                                    <label>ตอนที่ 3  ข้อเสนอแนะเพื่อการพัฒนาบริหารจัดการหลักสูตร</label>
                                    <textarea type="text" name="commentImprove" class="form-control" style="width: 100%;height: 100px; resize: vertical;" ></textarea>

                                </div> 




                                <div >                                            
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