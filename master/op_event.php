<?php

include '../_conn.php';
include '../functionx.php';

class op_event extends functionx {

    public function __construct() {
        parent::__construct();
        $this->checkLogin();
    }

    public function saveEventSupport() {
        $data = $_POST;


        foreach ($_POST['ch'] as $key => $value) {
            $data['ans' . $key] = $value;
        }

        unset($data['ch']);
     //   echo "<pre>";
//print_r($data);exit;
        $this->insert("assessSupport", $data);

        header("Location: event_support.php");
    }

    public function saveEventCourse() {
        $data = $_POST;

        //$data = $this->UTF8TOtis620($data);


        foreach ($data['ch'] as $key => $value) {
            $data['ans' . $key] = $value;
        }

        unset($data['ch']);
  unset($data['course_name']);
//print_r($data);exit;
        $this->insert("assessCourse", $data);

        header("Location: event_course.php");
    }

    public function saveEventLecturer() {
        $data = $_POST;

        if($data['isResponsible']==true )
        {
            $data['isResponsible']=1;
        }else{
            $data['isResponsible']=0;
        }
        
         if($data['isFrequent']==true )
        {
            $data['isFrequent']=1;
        }else{
            $data['isFrequent']=0;
        }
        
        foreach ($data['ch'] as $key => $value) {
            $data['ans' . $key] = $value;
        }

        unset($data['ch']);

//print_r($data);exit;
        $this->insert("assessLecturer", $data);

        header("Location: event_lecturer.php");
    }
    
     public function saveCourse() {

        $data = $_POST;
        $this->insert("course", $data);

        header("Location: course.php");
    }
     public function ModifileCourse() {
        $cour_id = $_GET['id'];
        $data = $_POST;

        $this->update("course", $data, "course_id='$cour_id'");
        header("Location: course.php");
    }
    
        public function RemoveCourse() {
        $cour_id = $_GET['id'];
        $this->remove("course", "course_id='{$cour_id}'");
        echo "ok";
    }

}

$op = new op_event();
$fn = $_GET['op'];
$op->$fn();
