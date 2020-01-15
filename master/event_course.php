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

        <style>


            #course-list{float:left;list-style:none;margin-top:-3px;padding:0;width:190px;position: absolute;}
            #course-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
            #course-list li:hover{background:#ece3d2;cursor: pointer;}
            #search-box{padding: 10px;border: #a8d4b1 1px solid;border-radius:4px;}
        </style>

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
                            <h1 style="margin: 0px;">แบบประเมินรายวิชา</h1>
                            <h4>คณะครุศาสตร์  มหาวิทยาลัยราชภัฏลำปาง</h4>
                            <h4> 
                                ภาคเรียนที่ ๑ ปีการศึกษา ๒๕๖๐
                            </h4>
                            คำชี้แจง	โปรดทำเครื่องหมาย  เพื่อระบุระดับความพึงพอใจของท่านตามความเป็นจริงมากที่สุด
                        </header>
                        <div class="onechoing">

                            <form name="frm1" method="post" action="op_event.php?op=saveEventCourse">



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
                                <div class="input-group ">
                                    <label for="course_id" class="col-sm-1 labsel">ชื่อรายวิชา</label>
                                    <div class="col-sm-2">
                                        <input type="hidden" id="course_id" name="course_id"  />
                                        <input type="text" id="search-box" name="course_name" placeholder="ค้นหาชื่อรายวิชา" />
                                        <div id="suggesstion-box"></div>
                                    </div>
                                </div>

                                <div style="margin-top: 40px;margin-bottom: 20px;">    
                                    <label style="font-size: medium; color: #eb7171;">ตอนที่ ๑  แบบประเมินตนเอง</label>
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
                                        foreach ($event_ch2_1 AS $key => $value) {
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
                                    <label>ข้อคิดเห็นและข้อเสนอแนะเพิ่มเติม</label>
                                    <textarea type="text" name="commentOneself" class="form-control" style="width: 100%;height: 120px; resize: vertical;" ></textarea>

                                </div> 
                                <div style="margin-top: 40px;margin-bottom: 20px;">    
                                    <label style="font-size: medium; color: #eb7171;">ตอนที่ ๒ แบบประเมินผู้สอน</label>
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
                                        foreach ($event_ch2_2 AS $key => $value) {
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
                                    <label>ข้อคิดเห็นและข้อเสนอแนะเพิ่มเติม</label>
                                    <textarea type="text" name="commentLecturer" class="form-control" style="width: 100%;height: 120px; resize: vertical;" ></textarea>

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
        <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>

        <script>
            // AJAX call for autocomplete 
            $(document).ready(function () {
                $("#search-box").keyup(function () {
                    $.ajax({
                        type: "POST",
                        url: "readCourse.php",
                        data: 'keyword=' + $(this).val(),
                        beforeSend: function () {
                            $("#search-box").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
                        },
                        success: function (data) {
                            $("#suggesstion-box").show();
                            $("#suggesstion-box").html(data);
                            $("#search-box").css("background", "#FFF");
                        }
                    });
                });
            });
//To select country name
            function selectCountry(val1,val2) {
                $("#search-box").val(val1);
                              $("#course_id").val(val2);
                $("#suggesstion-box").hide();
            }
        </script>
    </body>
</html> 