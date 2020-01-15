<?php
include '../_conn.php';
include '../functionx.php';
$fn = new functionx();
$fn->checkLogin();

$page = isset($_GET['p']) ? $_GET['p'] : 1;
$limit = 30;
$page = $page - 1;
$results = $fn->getComplaints('', $page, $limit);
$count = $fn->countComplaints();
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
    <body class="theme-blue" data-page='complaints'>
        <?php
        include "_inc/head.php";
        ?>
        <section class="content">
            <div class="container-fluid" style="background: #FFF"> 

                <div class="header">                           
                    <h2> เรื่องร้องเรียน</h2>
                </div>
                <div class="row" >
                    <div class="col-md-4" style="background: #FFF;border-right: 1px solid #f0f0f0;margin-right: 0px;padding-right: 0px;">

                        <ul id="Compaints">

                            <?php
                            $i = 1;
                            while ($row = $results->fetch_object()) {
                                ?>
                                <li class="ListComplaint" data-id="<?= $row->id ?>">
                                    <div class="topcompaints">
                                        <span class="comname"> <?= ($row->view == '0') ? '<i class="dotStatus" title="NEW"></i>' : '' ?> <?= $row->name_lastname; ?> </span>
                                        <span class="comtime"> <?= date('Y/m/d H:i', strtotime($row->datetime)); ?> </span>
                                    </div>
                                    <div class="comSub">
                                        <div class="Sub"><?= $row->subject; ?> </div> 
                                        <div class="comMsg">
                                            <?= mb_substr($row->message, 0, 100, 'UTF-8'); ?> 
                                        </div>
                                    </div>




                                </li>
                                <?php
                            }
                            ?>


                        </ul>
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
                    <div class="col-md-8" style="margin-left: 0px;padding-left: 0px;">
                        <div id="ComDetail">
                            <div id="ComDetailTOP">
                                <span  class="comname">
                                    <span id="Complaintsname"></span>
                                    <div><small id="ComplaintsEmail"> </small></div>
                                </span>
                                <span  id="Complaintstime" class="comtime"> </span>
                            </div>
                            <div id="ComDetailCONTENT">
                                <div class="comSub">
                                    <div id="ComplaintsSub" class="Sub"></div> 
                                    <div id="ComplaintsMsg" class="comMsg"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

            </div>
        </section>       
        <?php include './_inc/jsimport.php'; ?>    
        <script src="js/news.js" type="text/javascript" ></script>

    </body>
</html>