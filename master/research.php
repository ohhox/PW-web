<?php
 
include '../_conn.php';
include '../functionx.php';
$fn = new functionx();
$fn->checkLogin();

$page = isset($_GET['p']) ? $_GET['p'] : 1;
$limit = 30;
$page = $page - 1;
$results = $fn->getResearch('', $page, $limit);
$count = $fn->countResearch();

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
    <body class="theme-blue" data-page='research'>
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
                            <a class="pull-right btn   bg-green waves-effect" href="research_form.php" >
                                <i class="material-icons">add</i> 
                                <span class="icon-name">เพิ่มผลงานวิจัย</span>
                            </a>
                            <h2> รายชื่อผลงานวิจัย (<?= $count ?> รายการ) </h2>
                        </div>

                        <div class="body">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ปี</th>
                                        <th>เรื่อง</th> 
                                        <th>จัดการ</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($row = $results->fetch_object()) {
                                        ?>
                                        <tr> 
                                            <td><?= $row->research_year; ?> </td> 
                                            <td>
                                                <?= $row->research_name; ?> 
                                                <div><small style="color: #eb7171;">ผู้วิจัย :  <?= $row->student_name; ?> </small></div>
                                            </td>
                                            <td> 
                                                <a class="btn btn-warning" href="research_form.php?id=<?= $row->research_id; ?>">แก้ไข</a> 
                                                <a class="btn btn-danger removeNews" href="op_news.php?op=removeResearch&id=<?= $row->research_id; ?>">ลบ</a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    
                                </tbody>
                            </table>
                             <nav>
                                <ul class="pagination">
                                    <?php
                                    $disble = "";
                                    if ($page == 0) {
                                        ?>
                                        <li class="disabled">
                                            <a  class="waves-effect">
                                                <i class="material-icons">chevron_left</i>
                                            </a>
                                        </li>
                                        <?php
                                    } else {
                                        ?>
                                        <li >
                                            <a href="?p=<?= $page ?>" class="waves-effect">
                                                <i class="material-icons">chevron_left</i>
                                            </a>
                                        </li>
                                        <?php
                                    }
                                    ?>

                                    <?php
                                    $AllPage = ceil($count / $limit);

                                    for ($i = 1; $i <= $AllPage; $i++) {
                                        $active = "";
                                        if ($i == ($page + 1)) {
                                            $active = 'active';
                                        }
                                        ?>
                                        <li class="<?= $active ?>"><a href="?p=<?= $i ?>" class="waves-effect"><?= $i ?></a></li> 
                                        <?php
                                    }
                                    $disble = "";
                                    if ($page == $AllPage - 1) {
                                        ?>
                                        <li class="disabled">
                                            <a class="waves-effect">
                                                <i class="material-icons">chevron_right</i>
                                            </a>
                                        </li>
                                        <?php
                                    } else {
                                        ?>
                                        <li>
                                            <a href="?p=<?= $page + 2 ?>" class="waves-effect">
                                                <i class="material-icons">chevron_right</i>
                                            </a>
                                        </li>
                                        <?php
                                    }
                                    ?>



                                </ul>
                            </nav>

                        </div>
                    </div>
                </div>

            </div>
        </section>       
        <?php include './_inc/jsimport.php'; ?>    
        <script src="js/news.js" type="text/javascript" ></script>

    </body>
</html>