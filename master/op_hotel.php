<?php

include '../_conn.php';
include '../functionx.php';

class op_hotel extends functionx {

    public function __construct() {
        parent::__construct();
        $this->checkLogin();
    }

    public function removeHotel() {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = $_GET['id'];
            $this->remove('hotel', "room_id='$id'");
            header("Location: hotel.php");
        }
    }

    public function updateRoom() {
        $data = $_POST;
        $id = $_GET['id'];

        if (isset($_FILES['room_pic']['name']) && !empty($_FILES['room_pic']['name'])) {
            $filname = uniqid() . rand(1000, 99999);
            $name = explode('.', $_FILES['room_pic']['name']);
            $path = "../hotel_room/";

            $fullpath = $path . $filname . '.' . end($name);
            if (move_uploaded_file($_FILES['room_pic']['tmp_name'], $fullpath)) {
                $this->resizeHotelImage($filname . '.' . end($name));
                $data['room_pic'] = $filname . '.' . end($name);
            }
        }

        $this->update("hotel", $data, "room_id='$id'");
        
         foreach ($_FILES['room_pic_gallery']['name'] AS $key => $value) {

            if (!empty($value)) {
                $data_gallery = array();

                $filname = uniqid() . rand(1000, 99999);
                $name = explode('.', $value);
                $path = "../hotel_room/";

                $fullpath = $path . $filname . '.' . end($name);
                if (move_uploaded_file($_FILES['room_pic_gallery']['tmp_name'][$key], $fullpath)) {
                    $data_gallery['image_name'] = $filname . '.' . end($name);
                    $data_gallery['hotel_id'] = $id;
                    $this->resizeHotelImage($filname . '.' . end($name));
                    $this->insert("hotel_gallery", $data_gallery);
                }
            }
        }
        
          header("Location: hotel_form.php?id=$id");
        
    }

    public function newroom() {

        $data = $_POST;
        $data['room_id'] = uniqid();

        if (isset($_FILES['room_pic']['name']) && !empty($_FILES['room_pic']['name'])) {
            $filname = uniqid() . rand(1000, 99999);
            $name = explode('.', $_FILES['room_pic']['name']);
            $path = "../hotel_room/";

            $fullpath = $path . $filname . '.' . end($name);
            if (move_uploaded_file($_FILES['room_pic']['tmp_name'], $fullpath)) {
                $this->resizeHotelImage($filname . '.' . end($name));
                $data['room_pic'] = $filname . '.' . end($name);
            }
        }

        $this->insert("hotel", $data);

        foreach ($_FILES['room_pic_gallery']['name'] AS $key => $value) {

            if (!empty($value)) {
                $data_gallery = array();

                $filname = uniqid() . rand(1000, 99999);
                $name = explode('.', $value);
                $path = "../hotel_room/";

                $fullpath = $path . $filname . '.' . end($name);
                if (move_uploaded_file($_FILES['room_pic_gallery']['tmp_name'][$key], $fullpath)) {
                    $data_gallery['image_name'] = $filname . '.' . end($name);
                    $data_gallery['hotel_id'] = $data['room_id'];
                    $this->resizeHotelImage($filname . '.' . end($name));
                    $this->insert("hotel_gallery", $data_gallery);
                }
            }
        }
//        echo "<pre>";
//        print_r($_FILES);
//        print_r($data); 
        header("Location: hotel.php");
    }

    public function removeGl() {

        if (isset($_GET['thisId']) && !empty($_GET['thisId'])) {
            $sql = "SELECT * FROM hotel_gallery WHERE hotel_gallery_id='{$_GET['thisId']}'";
            $data = $this->mysqli->query($sql);
            $res = mysqli_fetch_assoc($data);

            $sql = "DELETE FROM  hotel_gallery WHERE  hotel_gallery_id='{$_GET['thisId']}'";
            $this->mysqli->query($sql);
            echo "ok";
        }
    }

    public function resizeHotelImage($fileName) {
        include_once './class/resizeImage.php';
        $uploadpath = "../hotel_room/";
        $resize = new ResizeImage($uploadpath . $fileName);
        $resize->resizeTo(250, 250);
        $resize->saveImage($uploadpath . 'thm/' . $fileName);
    }

}

$op = new op_hotel();
$fn = $_GET['op'];
$op->$fn();
