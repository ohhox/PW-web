<?php
include '../_conn.php';
include '../functionx.php';
$fn = new functionx();
$fn->checkLogin();

$sum = $fn->getSumAssessSupport();
//print_r($sum);exit;





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
    <body class="theme-blue" data-page='publicnews'>
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
                            <h1 style="margin: 0px;">ผลรายงานการประเมินสิ่งสนับสนุนการเรียนรู้ </h1>
                            <h4>คณะครุศาสตร์  มหาวิทยาลัยราชภัฏลำปาง</h4>
<!--                            <h4> 
                                ภาคเรียนที่ ๑ ปีการศึกษา ๒๕๖๐
                            </h4>-->
                            <!--คำชี้แจง	โปรดทำเครื่องหมาย <i class="material-icons">check</i> เพื่อระบุระดับความพึงพอใจของท่านตามความเป็นจริงมากที่สุด-->
                        </header>
                        <div class="onechoing">

                            <form name="frm1" method="post" action="op_event.php?op=saveEventSupport">









                                <table class="table table-striped table-hover  ">
                                    <thead >
                                        <tr>
                                            <th rowspan="2">รายการประเมิน</th>
                                            <th colspan="5">ระดับความพึงพอใจ</th>
                                        </tr>
                                        <tr>
                                            <th>มากที่สุด (5)</th>
                                            <th>มาก (4)</th>
                                            <th>ปานกลาง (3)</th>
                                            <th>น้อย (2)</th>
                                            <th>น้อยที่สุด (1)</th>
                                            <th>ค่าเฉลี่ย</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        foreach ($event_ch1 AS $key => $value) {
                                            ?>
                                            <tr>
                                                <td colspan="7" style="background: #dadada"><?= $key ?></td>
                                            </tr>
                                            <?php
                                            $count = 5;
                                            foreach ($value as $key2 => $value2) {
                                                $s5 = 's' . $key2 . '_5';
                                                $s4 = 's' . $key2 . '_4';
                                                $s3 = 's' . $key2 . '_3';
                                                $s2 = 's' . $key2 . '_2';
                                                $s1 = 's' . $key2 . '_1';
                                                $per5 = ($sum->$s5 / $sum->c_ans) * 100;
                                                $per4 = ($sum->$s4 / $sum->c_ans) * 100;
                                                $per3 = ($sum->$s3 / $sum->c_ans) * 100;
                                                $per2 = ($sum->$s2 / $sum->c_ans) * 100;
                                                $per1 = ($sum->$s1 / $sum->c_ans) * 100;
                                                $avg = (($sum->$s5 * 5) + ($sum->$s4 * 4) + ($sum->$s3 * 3) + ($sum->$s2 * 2) + ($sum->$s1 * 1)) / $sum->c_ans;
                                                ?>
                                                <tr>
                                                    <td style="padding-left: 20px;"><?= $value2 ?> </td>
                                                    <td> 
                                                        <div class="input-group  ">
                                                            <span class="input-group-addon">

                                                                <label for="ch<?= $key2 ?>-1"><?php echo $sum->$s5 ?></label>
                                                                <br>
                                                                <label><?php echo "(" . $per5 . '%)' ?></label>
                                                            </span>

                                                        </div>
                                                    </td>

                                                    <td> 
                                                        <div class="input-group  ">
                                                            <span class="input-group-addon">

                                                                <label for="ch<?= $key2 ?>-2"><?php echo $sum->$s4 ?></label>
                                                                <br>
                                                                <label><?php echo "(" . $per4 . '%)' ?></label>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td> 
                                                        <div class="input-group  ">
                                                            <span class="input-group-addon">

                                                                <label for="ch<?= $key2 ?>-3"><?php echo $sum->$s3 ?></label>
                                                                <br>
                                                                <label><?php echo "(" . $per3 . '%)' ?></label>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td> 
                                                        <div class="input-group  ">
                                                            <span class="input-group-addon">

                                                                <label for="ch<?= $key2 ?>-4"><?php echo $sum->$s2 ?></label>
                                                                <br>
                                                                <label><?php echo "(" . $per2 . '%)' ?></label>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td> 
                                                        <div class="input-group  ">
                                                            <span class="input-group-addon">

                                                                <label for="ch<?= $key2 ?>-5"><?php echo $sum->$s1 ?></label>
                                                                <br>
                                                                <label><?php echo "(" . $per1 . '%)' ?></label>
                                                            </span>
                                                        </div>
                                                    </td>

                                                    <td> 
                                                        <div class="input-group  ">
                                                            <span class="input-group-addon">


                                                                <label><?php echo number_format($avg, 2, '.', ''); ?></label>
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