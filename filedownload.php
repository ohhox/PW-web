<?php
header('Content-Type: text/html; charset=utf-8');
include '_conn.php';
include 'functionx.php';
$fn = new functionx();


$page = isset($_GET['p']) ? $_GET['p'] : 1;
$limit = 25;
$page = $page - 1;
$file = $fn->getFileDownload('', $page, $limit);
$count = $fn->countFileDownload();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>สาขาวิชาหลักสตรและการสอน</title>

        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Pridi:300" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
        <link href="webfontkit/stylesheet.css" rel="stylesheet">
        <link href="css/css.css" rel="stylesheet">
        <link href="css/mobile.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/full-width-pics.css" rel="stylesheet">
    </head>

    <body>
        <?php include './_head_1.php'; ?>
        <div class="container " style=" background: #f2ecfb;;">
            <div class="col-md-12 Inview" style="padding: 0px;" >                
                <?php
                include './_Nav.php';
                ?>
                <div  id="MainContent" style="background: #f4f4f4;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="NewsTitle">
                                <div class="NewsTitleBox">
                                    <span class="fa fa-download "> </span>  เอกสารดาวน์โหลด
                                </div>
                            </div>
                            <div id="NewsPubic"  style="padding-top: 30px;">
                                <ul class="nav-tabs">
                                    <li class="active" ><a href="filedownload.php">เอกสารดาวน์โหลด</a></li>
                                    <li><a href="filedownloadnews.php">เอกสารดาวน์โหลด จากข่าวประชาสัมพันธ์</a></li> 
                                    <div class="clear"></div>
                                </ul>
                                <div class="TapBody">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ชื่อไฟล์</th>
                                                <th>download</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($row = $file->fetch_object()) {
                                                ?>
                                                <tr>
                                                    <td><?= $row->file_display_name ?></td>
                                                    <td><a href="file/<?= $row->file_name; ?>"> <i class="fa fa-download"></i> ดาวน์โหลด</a></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>

                                    <nav aria-label="Page navigation  ">

                                        <ul class="pagination">
                                            <?php
                                            $disble = "";
                                            if ($page == 0) {
                                                ?>
                                                <li class="page-item disabled">
                                                    <a class="page-link" >
                                                        <i class="fa fa-chevron-left"> </i> Previous
                                                    </a>
                                                </li>
                                                <?php
                                            } else {
                                                ?>
                                                <li class="page-item" >
                                                    <a href="?p=<?= $page ?>" class="page-link">
                                                        <i class="fa fa-chevron-left"> </i> Previous
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
                                                <li class="<?= $active ?> page-item"><a href="?p=<?= $i ?>" class="  page-link"><?= $i ?></a></li> 
                                                <?php
                                            }
                                            $disble = "";
                                            if ($page == $AllPage - 1) {
                                                ?>
                                                <li class="page-item disabled">
                                                    <a class="page-link">
                                                        Next <i class="fa fa-chevron-right"> </i> 
                                                    </a>
                                                </li>
                                                <?php
                                            } else {
                                                ?>
                                                <li class="page-item" >
                                                    <a class="page-link"  href="?p=<?= $page + 2 ?>" >
                                                        Next <i class="fa fa-chevron-right"> </i>  
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





                </div>

                <div class="clear"></div>


            </div>
        </div>
        <!-- Content section -->
        <?php include '_foot.php'; ?>

    </body>

</html>
