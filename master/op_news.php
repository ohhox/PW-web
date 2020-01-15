<?php

if (!isset($_COOKIE['userid'])) {
    header("Location:login.php");
}
include '../_conn.php';
include '../functionx.php';

class op_news extends functionx {

    public function __construct() {
        parent::__construct();
    }

    public function removeNews() {
        $this->checkLogin();
        $id = $_GET['id'];
        $gallery = $this->getNewsGallery($id);
        $newsDatail = $this->getNewsFormid($id);

        while ($row = $gallery->fetch_object()) {

            if (!empty($row->file_name)) {
                if (file_exists("../gallery/{$row->file_name}")) {
                    unlink("../gallery/{$row->file_name}");
                    unlink("../gallery/thm/{$row->file_name}");
                }
            }
        }
        if (!empty($newsDatail->news_images)) {
            if (file_exists("../gallery/{$newsDatail->news_images}")) {
                unlink("../gallery/{$newsDatail->news_images}");
                unlink("../gallery/thm/{$newsDatail->news_images}");
            }
        }
        $this->remove("news_image_gallery", "news_id='{$id}'");
        $this->remove("news", "news_id='{$id}'");
        echo "ok";
    }

    public function saveNews() {
        $data = $_POST;

        if (!empty($_FILES['news_images'])) {
            $filename = $this->uploadMenberImage($_FILES['news_images']);
            if (!empty($filename))
                $this->resizeMenberImage($filename);

            $data['news_images'] = $filename;
        }

        $this->insert("news", $data);

        $lastNewsid = $this->getLastNewsID();
        if (!empty($_FILES['news_image_gallery'])) {
            $img = $_FILES['news_image_gallery'];
            $img_desc = $this->reArrayFiles($img);

            foreach ($img_desc as $val) {
                $newname = date('YmdHis', time()) . mt_rand() . '.jpg';
                $filename = $this->uploadMenberImage($val);
                if (!empty($filename)) {
                    $this->resizeMenberImage($filename);
                    $this->insert("news_image_gallery", array(
                        "file_name" => $filename,
                        "news_id" => $lastNewsid
                    ));
                }
            }
        }
        header("Location: news.php");
    }

    public function updateNews() {
        $data = $_POST;

        if (!empty($_FILES['news_images']) && !empty($_FILES['news_images']['name'])) {
            $filename = $this->uploadMenberImage($_FILES['news_images']);
            if (!empty($filename))
                $this->resizeMenberImage($filename);

            $data['news_images'] = $filename;
        }

        $this->update("news", $data, "news_id='{$_GET['id']}'");


        header("Location: news.php");
    }

    public function uploadMenberImage($file) {
        $uploadpath = "../gallery/";
        $temp = explode(".", $file['name']);
        $filename = rand(0, 1000000) . round(microtime(true)) . '.' . end($temp);
        $uploadpath = $uploadpath . $filename;
        if (move_uploaded_file($file["tmp_name"], $uploadpath)) {
            return $filename;
        } else {
            return "";
        }
    }

    public function resizeMenberImage($fileName) {
        include_once './class/resizeImage.php';
        $uploadpath = "../gallery/";
        $resize = new ResizeImage($uploadpath . $fileName);
        $resize->resizeTo(250, 250);
        $resize->saveImage($uploadpath . 'thm/' . $fileName);
    }
  

    public function removeGallery() {
        $news_id = $_GET['newsid'];
        if (isset($_POST['nig_id'])) {
            $img = $_POST['nig_id'];
            foreach ($img as $key => $value) {
                $res = $this->remove("news_image_gallery", "nig_id='{$value}'");
                if (!empty($res->file_name)) {
                    if (file_exists("../gallery/{$res->file_name}")) {
                        unlink("../gallery/{$res->file_name}");
                        unlink("../gallery/thm/{$res->file_name}");
                    }
                }
            }
        }
        header("Location: gallery.php?id=$news_id");
    }

    public function uploadGallery() {
        ini_set('upload_max_filesize', '0M');

        $lastNewsid = $_GET['news_id'];
        $img = $_FILES['news_image_gallery'];
        $img_desc = $this->reArrayFiles($img);

        foreach ($img_desc as $val) {
            $newname = date('YmdHis', time()) . mt_rand() . '.jpg';
            $filename = $this->uploadMenberImage($val);
            if (!empty($filename)) {
                $this->resizeMenberImage($filename);
                $this->insert("news_image_gallery", array(
                    "file_name" => $filename,
                    "news_id" => $lastNewsid
                ));
            }
        }
        header("Location: gallery.php?id=$lastNewsid");
    }

    public function savePublicNews() {

        $data = $_POST;
        $data['news_date'] = date("Y-m-d");

        $this->insert("publicnews", $data);
        if (!empty($_FILES)) {
            $lastnews = $this->getLastPublicNewsID();
            $file = $_FILES['fileUpload'];
            $img_desc = $this->reArrayFiles($file);



            foreach ($img_desc as $val) {
                $filename = "";
                $uploadpath = "../file/";
                $temp = explode(".", $val['name']);
                $filename = rand(0, 100000) . round(microtime(true)) . '.' . end($temp);
                $uploadpath = $uploadpath . $filename;
                if (move_uploaded_file($val["tmp_name"], $uploadpath)) {
                    $data = array(
                        "filename" => "{$val['name']}",
                        "filename_path" => "$filename",
                        "news_id" => "$lastnews"
                    );
                    $this->insert('publicnews_file', $data);
                }
            }
        }
        header("Location: publicnews.php");
    }

    public function ModifilePublicNews() {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $news_id = $_GET['id'];
            $data = $_POST;
            $this->update("publicnews", $data, "news_id='$news_id'");

            if (!empty($_FILES)) {
                $lastnews = $news_id;
                $file = $_FILES['fileUpload'];
                $img_desc = $this->reArrayFiles($file);



                foreach ($img_desc as $val) {
                    $filename = "";
                    $uploadpath = "../file/";
                    $temp = explode(".", $val['name']);
                    $filename = rand(0, 100000) . round(microtime(true)) . '.' . end($temp);
                    $uploadpath = $uploadpath . $filename;
                    if (move_uploaded_file($val["tmp_name"], $uploadpath)) {
                        $data = array(
                            "filename" => "{$val['name']}",
                            "filename_path" => "$filename",
                            "news_id" => "$lastnews"
                        );
                        $this->insert('publicnews_file', $data);
                    }
                }
            }
        }
        header("Location: publicnews.php");
    }

    public function removeFile() {
        $news_id = $_GET['newsid'];
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = $_GET['id'];
            $res = $this->remove("publicnews_file", "file_id='{$id}'");
            if (!empty($res->filename_path)) {
                if (file_exists("../file/{$res->filename_path}")) {
                    unlink("../file/{$res->filename_path}");
                }
            }
        }
        header("Location: publicnews_form.php?id=$news_id");
    }

    public function removepublicNews() {

        $id = $_GET['id'];
        $publicNews = $this->getPublicNewsFormId($id);
        $file = $this->getPublicNewsFileFormNewsId($id);

        while ($row = $file->fetch_object()) {

            if (!empty($row->filename_path)) {
                if (file_exists("../file/{$row->filename_path}")) {
                    unlink("../file/{$row->filename_path}");
                }
            }
        }


        $this->remove("publicnews_file", "news_id='{$id}'");
        $this->remove("publicnews", "news_id='{$id}'");
        echo "ok";
    }

    public function saveStudentYear() {

        $data = $_POST;

        $this->insert("student_year", $data);

        header("Location: student.php");
    }

    public function ModifileStudentYear() {
        $news_id = $_GET['id'];
        $data = $_POST;
        $this->update("student_year", $data, "sy_id='$news_id'");
        header("Location: student.php");
    }

    public function RemoveStudentYear() {
        $news_id = $_GET['id'];
        $this->remove("student_year", "sy_id='{$news_id}'");
        echo "ok";
    }

    public function saveStudent() {

        $data = $_POST;
        if (!empty($_FILES['student_image']['name'])) {
            $filename = $this->uploadMenberImage($_FILES['student_image']);
            if (!empty($filename)) {
                $this->resizeMenberImage($filename);
                $data['student_image'] = $filename;
            }
        }
        $this->insert("student", $data);

        header("Location: studentList.php?id={$_POST['sy_id']}");
    }

    public function ModifileStudent() {
        $news_id = $_GET['id'];
        $data = $_POST;

        if (!empty($_FILES['student_image']['name'])) {
            $filename = $this->uploadMenberImage($_FILES['student_image']);
            if (!empty($filename)) {
                $this->resizeMenberImage($filename);
                $data['student_image'] = $filename;
            }
        }

        $this->update("student", $data, "student_id='$news_id'");
        header("Location: studentList.php?id={$_POST['sy_id']}");
    }

    public function RemoveStudent() {
        $news_id = $_GET['id'];
        $this->remove("student", "student_id='{$news_id}'");
        echo "ok";
    }

    public function savefileDownload() {

        $data = $_POST;
        if (!empty($_FILES['file_name']['name'])) {
            $name = explode('.', $_FILES['file_name']['name']);
            $filename = end($name) . "-" . date('YmdHis') . rand(1, 15555) . '.' . end($name);
            if (move_uploaded_file($_FILES['file_name']['tmp_name'], '../file/' . $filename)) {
                $data['file_name'] = $filename;
            }
        }

        $this->insert("file_download", $data);
        header("Location: file_download.php");
    }

    public function ModifilefileDownload() {
        $news_id = $_GET['id'];
        $data = $_POST;
        if (!empty($_FILES['file_name']['name'])) {
            $name = explode('.', $_FILES['file_name']['name']);
            $filename = end($name) . "-" . date('YmdHis') . rand(1, 15555) . '.' . end($name);
            if (move_uploaded_file($_FILES['file_name']['tmp_name'], '../file/' . $filename)) {
                $data['file_name'] = $filename;
            }
        }

        $this->update("file_download", $data, "file_id='$news_id'");
        header("Location: file_download.php");
    }

    public function removeFileUpload() {
        if (!empty($_GET['id'])) {
            $res = $this->getFileDownload($_GET['id']);
            if (!empty($res->file_name)) {
                if (file_exists('../file/' . $res->file_name)) {
                    unlink('../file/' . $res->file_name);
                }
            }
            $this->remove("file_download", "file_id='{$_GET['id']}'");
        }
        echo "ok";
    }

    public function saveTeacher() {

        $data = $_POST;
        if (!empty($_FILES['teacher_image']['name'])) {
            $filename = $this->uploadMenberImage($_FILES['teacher_image']);
            if (!empty($filename)) {
                $this->resizeMenberImage($filename);
                $data['teacher_image'] = $filename;
            }
        }
        $this->insert("teacher", $data);

        header("Location: teacher.php");
    }

    public function ModifileTeacher() {
        $news_id = $_GET['id'];
        $data = $_POST;

        if (!empty($_FILES['teacher_image']['name'])) {
            $filename = $this->uploadMenberImage($_FILES['teacher_image']);
            if (!empty($filename)) {
                $this->resizeMenberImage($filename);
                $data['teacher_image'] = $filename;
            }
        }

        $this->update("teacher", $data, "teacher_id='$news_id'");
        header("Location: teacher.php");
    }

    public function RemoveTeacher() {
        $news_id = $_GET['id'];
        $this->remove("teacher", "teacher_id='{$news_id}'");
        echo "ok";
    }

    public function teacher_order() {

        if ($_POST['order_num']) {
            foreach ($_POST['order_num'] as $key => $value) {
                $data = array(
                    'order_num' => $value
                );
                $this->update('teacher', $data, "teacher_id='$key'");
            }
        }
        header("Location: teacher.php");
    }

    public function saveResearch() {

        $data = $_POST;
        if (!empty($_FILES['file']['name'])) {
            $name = explode('.', $_FILES['file']['name']);
            $filename = end($name) . "-" . date('YmdHis') . rand(1, 15555) . '.' . end($name);
            if (move_uploaded_file($_FILES['file']['tmp_name'], '../file/' . $filename)) {
                $data['file'] = $filename;
            }
        }

        $this->insert("research", $data);
        header("Location: research.php");
    }

    public function ModifileResearch() {
        $news_id = $_GET['id'];
        $data = $_POST;
        if (!empty($_FILES['file']['name'])) {
            $name = explode('.', $_FILES['file']['name']);
            $filename = end($name) . "-" . date('YmdHis') . rand(1, 15555) . '.' . end($name);
            if (move_uploaded_file($_FILES['file']['tmp_name'], '../file/' . $filename)) {
                $data['file'] = $filename;
            }
        }

        $this->update("research", $data, "research_id='$news_id'");
        header("Location: research.php");
    }

    public function removeResearch() {
        
        if (!empty($_GET['id'])) {
            $res = $this->getResearch($_GET['id']);
            if (!empty($res->file)) {
                if (file_exists('../file/' . $res->file)) {
                    unlink('../file/' . $res->file);
                }
            }
            $this->remove("research", "research_id='{$_GET['id']}'");
        }
        echo "ok";
    }

}

$op = new op_news();
$fn = $_GET['op'];
$op->$fn();
