<?php

class functionx extends DATABASE {

    public $newsType = array(
        "news" => "ข่าวสาร",
        "event" => "กิจกรรม"
    );
    public $thai_day_arr = array("อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤหัสบดี", "ศุกร์", "เสาร์");
    public $thaimonth = array("มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
    public $thai_month_arr_short = array(
        "0" => "",
        "1" => "ม.ค.",
        "2" => "ก.พ.",
        "3" => "มี.ค.",
        "4" => "เม.ย.",
        "5" => "พ.ค.",
        "6" => "มิ.ย.",
        "7" => "ก.ค.",
        "8" => "ส.ค.",
        "9" => "ก.ย.",
        "10" => "ต.ค.",
        "11" => "พ.ย.",
        "12" => "ธ.ค."
    );
    public $user;

    public function __construct() {
        parent::__construct();
    }

    public function checkLogin() {
        if (isset($_COOKIE['a']) && !empty($_COOKIE['a']) && isset($_COOKIE['t']) && !empty($_COOKIE['t'])) {
            if ($_COOKIE['t'] == 'e') {
                $query = $this->mysqli->query("SELECT * FROM user WHERE user_id='{$_COOKIE['a']}' ");
                if (!empty($query)) {
                    $user = $query->fetch_object();
                    $this->user = $user;
                } else {
                    header("Location:logout.php");
                }
            } else if ($_COOKIE['t'] == 's') {
                $query = $this->mysqli->query("SELECT * FROM student WHERE student_id='{$_COOKIE['a']}' ");
                if (!empty($query)) {
                    $user = $query->fetch_object();
                    $this->user = $user;
                } else {
                    header("Location:logout.php");
                }
            } else {
                header("Location:logout.php");
            }
        } else {
            header("Location:logout.php");
        }
    }

    public function isLogin() {
        if (isset($_COOKIE['a']) && !empty($_COOKIE['a']) && isset($_COOKIE['t']) && !empty($_COOKIE['t'])) {
            if ($_COOKIE['t'] == 'e') {
                $query = $this->mysqli->query("SELECT * FROM user WHERE user_id='{$_COOKIE['a']}' ");
                if (!empty($query)) {
                    return true;
                } else {
                    return false;
                }
            } else if ($_COOKIE['t'] == 's') {
                $query = $this->mysqli->query("SELECT * FROM student WHERE student_id='{$_COOKIE['a']}' ");
                if (!empty($query)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function thai_date_shortx($time) {   // 19  ธ.ค. 2556
        $thai_date_return = date("d", strtotime($time));
        $thai_date_return .= " " . $this->thai_month_arr_short[date("n", strtotime($time))];
        $thai_date_return .= " " . (date("Y", strtotime($time)) + 543);
        return $thai_date_return;
    }

    public function getUserAll() {

        $query = $this->mysqli->query("SELECT * FROM user ORDER BY user_id DESC");
        return $query;
    }

    public function getUserById($id) {

        $query = $this->mysqli->query("SELECT * FROM user WHERE user_id='$id' ORDER BY user_id DESC");
        return $query->fetch_object();
    }

    public function getNewsFormid($news_id) {

        $query = $this->mysqli->query("SELECT * FROM news WHERE news_id='$news_id' ORDER BY news_id DESC LIMIT 0,30");
        return $query->fetch_object();
    }

    public function getPublicNews($page, $limit) {
        $start = $page * $limit;
        $res = $this->mysqli->query($sql = "SELECT * FROM publicnews ORDER BY news_id DESC limit $start,$limit");

        return $res;
    }

    public function countAllNews() {
        $count = $this->mysqli->query("SELECT count(*) as count FROM news ");
        $count = $count->fetch_object();
        return $count->count;
    }

    public function countStudentYear() {
        $count = $this->mysqli->query("SELECT count(*) as count FROM student_year ");
        $count = $count->fetch_object();
        return $count->count;
    }

    public function countAllPublicNews() {
        $count = $this->mysqli->query("SELECT count(*) as count FROM publicnews ");
        $count = $count->fetch_object();
        return $count->count;
    }

    public function getPublicNewsFormId($id) {
        $data = $this->mysqli->query("SELECT * FROM publicnews WHERE news_id='$id'");
        return $data->fetch_object();
    }

    public function getPublicNewsFileFormNewsId($id) {
        return $this->mysqli->query("SELECT * FROM publicnews_file WHERE news_id='$id'");
    }

    public function getCountPublicNewsfile($newsid) {
        $newsfile = $this->query("SELECT count(*) as count FROM publicnews_file WHERE news_id='$newsid'");
        $news = $newsfile->fetch_object();
        return $news->count;
    }

    public function getPublicNewsfile($newsid) {
        return $this->query("SELECT count(*) as count FROM publicnews_file WHERE news_id='$newsid'");
    }

    public function getNews($page, $limit) {
        $start = $page * $limit;
        return $this->mysqli->query("SELECT * FROM news ORDER BY news_id DESC LIMIT $start,$limit");
    }

    public function getListNews($news_id = NULL) {
        if (empty($id)) {
            return $this->mysqli->query("SELECT * FROM news ORDER BY news_id DESC LIMIT 0,30");
        } else {
            $query = $this->mysqli->query("SELECT * FROM news WHERE news_id='$news_id' ORDER BY news_id DESC LIMIT 0,30");
            return $query->fetch_object();
        }
    }

    public function getNewsGallery($newid) {
        return $this->mysqli->query("SELECT * FROM news_image_gallery WHERE news_id='$newid' ORDER BY nig_id DESC ");
    }

    public function getLastNewsID() {
        $query = $this->mysqli->query("SELECT * FROM news ORDER BY news_id DESC LIMIT 0,1");
        $res = $query->fetch_object();
        return $res->news_id;
    }

    public function getLastPublicNewsID() {
        $query = $this->mysqli->query("SELECT * FROM publicnews ORDER BY news_id DESC LIMIT 0,1");
        $res = $query->fetch_object();
        return $res->news_id;
    }

    public function getSumAssessSupport() {

        $query = $this->mysqli->query("SELECT sum(CASE WHEN ans1_1=5 THEN 1 ELSE 0 END)  s1_1_5,sum(CASE WHEN ans1_1=4 THEN 1 ELSE 0 END)  s1_1_4,sum(CASE WHEN ans1_1=3 THEN 1 ELSE 0 END)  s1_1_3,sum(CASE WHEN ans1_1=2 THEN 1 ELSE 0 END)  s1_1_2,sum(CASE WHEN ans1_1=1 THEN 1 ELSE 0 END)  s1_1_1,
sum(CASE WHEN ans1_2=5 THEN 1 ELSE 0 END)  s1_2_5,sum(CASE WHEN ans1_2=4 THEN 1 ELSE 0 END)  s1_2_4,sum(CASE WHEN ans1_2=3 THEN 1 ELSE 0 END)  s1_2_3,sum(CASE WHEN ans1_2=2 THEN 1 ELSE 0 END)  s1_2_2,sum(CASE WHEN ans1_2=1 THEN 1 ELSE 0 END)  s1_2_1,
sum(CASE WHEN ans1_3=5 THEN 1 ELSE 0 END)  s1_3_5,sum(CASE WHEN ans1_3=4 THEN 1 ELSE 0 END)  s1_3_4,sum(CASE WHEN ans1_3=3 THEN 1 ELSE 0 END)  s1_3_3,sum(CASE WHEN ans1_3=2 THEN 1 ELSE 0 END)  s1_3_2,sum(CASE WHEN ans1_3=1 THEN 1 ELSE 0 END)  s1_3_1,
sum(CASE WHEN ans1_4=5 THEN 1 ELSE 0 END)  s1_4_5,sum(CASE WHEN ans1_4=4 THEN 1 ELSE 0 END)  s1_4_4,sum(CASE WHEN ans1_4=3 THEN 1 ELSE 0 END)  s1_4_3,sum(CASE WHEN ans1_4=2 THEN 1 ELSE 0 END)  s1_4_2,sum(CASE WHEN ans1_4=1 THEN 1 ELSE 0 END)  s1_4_1,
sum(CASE WHEN ans1_5=5 THEN 1 ELSE 0 END)  s1_5_5,sum(CASE WHEN ans1_5=4 THEN 1 ELSE 0 END)  s1_5_4,sum(CASE WHEN ans1_5=3 THEN 1 ELSE 0 END)  s1_5_3,sum(CASE WHEN ans1_5=2 THEN 1 ELSE 0 END)  s1_5_2,sum(CASE WHEN ans1_5=1 THEN 1 ELSE 0 END)  s1_5_1,
sum(CASE WHEN ans2_1=5 THEN 1 ELSE 0 END)  s2_1_5,sum(CASE WHEN ans2_1=4 THEN 1 ELSE 0 END)  s2_1_4,sum(CASE WHEN ans2_1=3 THEN 1 ELSE 0 END)  s2_1_3,sum(CASE WHEN ans2_1=2 THEN 1 ELSE 0 END)  s2_1_2,sum(CASE WHEN ans2_1=1 THEN 1 ELSE 0 END)  s2_1_1,
sum(CASE WHEN ans2_2=5 THEN 1 ELSE 0 END)  s2_2_5,sum(CASE WHEN ans2_2=4 THEN 1 ELSE 0 END)  s2_2_4,sum(CASE WHEN ans2_2=3 THEN 1 ELSE 0 END)  s2_2_3,sum(CASE WHEN ans2_2=2 THEN 1 ELSE 0 END)  s2_2_2,sum(CASE WHEN ans2_2=1 THEN 1 ELSE 0 END)  s2_2_1,
sum(CASE WHEN ans2_3=5 THEN 1 ELSE 0 END)  s2_3_5,sum(CASE WHEN ans2_3=4 THEN 1 ELSE 0 END)  s2_3_4,sum(CASE WHEN ans2_3=3 THEN 1 ELSE 0 END)  s2_3_3,sum(CASE WHEN ans2_3=2 THEN 1 ELSE 0 END)  s2_3_2,sum(CASE WHEN ans2_3=1 THEN 1 ELSE 0 END)  s2_3_1,
sum(CASE WHEN ans2_4=5 THEN 1 ELSE 0 END)  s2_4_5,sum(CASE WHEN ans2_4=4 THEN 1 ELSE 0 END)  s2_4_4,sum(CASE WHEN ans2_4=3 THEN 1 ELSE 0 END)  s2_4_3,sum(CASE WHEN ans2_4=2 THEN 1 ELSE 0 END)  s2_4_2,sum(CASE WHEN ans2_4=1 THEN 1 ELSE 0 END)  s2_4_1,
sum(CASE WHEN ans2_5=5 THEN 1 ELSE 0 END)  s2_5_5,sum(CASE WHEN ans2_5=4 THEN 1 ELSE 0 END)  s2_5_4,sum(CASE WHEN ans2_5=3 THEN 1 ELSE 0 END)  s2_5_3,sum(CASE WHEN ans2_5=2 THEN 1 ELSE 0 END)  s2_5_2,sum(CASE WHEN ans2_5=1 THEN 1 ELSE 0 END)  s2_5_1,
sum(CASE WHEN ans2_6=5 THEN 1 ELSE 0 END)  s2_6_5,sum(CASE WHEN ans2_6=4 THEN 1 ELSE 0 END)  s2_6_4,sum(CASE WHEN ans2_6=3 THEN 1 ELSE 0 END)  s2_6_3,sum(CASE WHEN ans2_6=2 THEN 1 ELSE 0 END)  s2_6_2,sum(CASE WHEN ans2_6=1 THEN 1 ELSE 0 END)  s2_6_1,
sum(CASE WHEN ans2_7=5 THEN 1 ELSE 0 END)  s2_7_5,sum(CASE WHEN ans2_7=4 THEN 1 ELSE 0 END)  s2_7_4,sum(CASE WHEN ans2_7=3 THEN 1 ELSE 0 END)  s2_7_3,sum(CASE WHEN ans2_7=2 THEN 1 ELSE 0 END)  s2_7_2,sum(CASE WHEN ans2_7=1 THEN 1 ELSE 0 END)  s2_7_1,
count(ans1_1)  c_ans
FROM assessSupport");
        $sum = $query->fetch_object();
        return $sum;
    }

    public function getSumAssessCourse() {

        $query = $this->mysqli->query("SELECT sum(CASE WHEN ans1_1=5 THEN 1 ELSE 0 END)  s1_1_5,sum(CASE WHEN ans1_1=4 THEN 1 ELSE 0 END)  s1_1_4,sum(CASE WHEN ans1_1=3 THEN 1 ELSE 0 END)  s1_1_3,sum(CASE WHEN ans1_1=2 THEN 1 ELSE 0 END)  s1_1_2,sum(CASE WHEN ans1_1=1 THEN 1 ELSE 0 END)  s1_1_1,
sum(CASE WHEN ans1_2=5 THEN 1 ELSE 0 END)  s1_2_5,sum(CASE WHEN ans1_2=4 THEN 1 ELSE 0 END)  s1_2_4,sum(CASE WHEN ans1_2=3 THEN 1 ELSE 0 END)  s1_2_3,sum(CASE WHEN ans1_2=2 THEN 1 ELSE 0 END)  s1_2_2,sum(CASE WHEN ans1_2=1 THEN 1 ELSE 0 END)  s1_2_1,
sum(CASE WHEN ans1_3=5 THEN 1 ELSE 0 END)  s1_3_5,sum(CASE WHEN ans1_3=4 THEN 1 ELSE 0 END)  s1_3_4,sum(CASE WHEN ans1_3=3 THEN 1 ELSE 0 END)  s1_3_3,sum(CASE WHEN ans1_3=2 THEN 1 ELSE 0 END)  s1_3_2,sum(CASE WHEN ans1_3=1 THEN 1 ELSE 0 END)  s1_3_1,
sum(CASE WHEN ans1_4=5 THEN 1 ELSE 0 END)  s1_4_5,sum(CASE WHEN ans1_4=4 THEN 1 ELSE 0 END)  s1_4_4,sum(CASE WHEN ans1_4=3 THEN 1 ELSE 0 END)  s1_4_3,sum(CASE WHEN ans1_4=2 THEN 1 ELSE 0 END)  s1_4_2,sum(CASE WHEN ans1_4=1 THEN 1 ELSE 0 END)  s1_4_1,
sum(CASE WHEN ans1_5=5 THEN 1 ELSE 0 END)  s1_5_5,sum(CASE WHEN ans1_5=4 THEN 1 ELSE 0 END)  s1_5_4,sum(CASE WHEN ans1_5=3 THEN 1 ELSE 0 END)  s1_5_3,sum(CASE WHEN ans1_5=2 THEN 1 ELSE 0 END)  s1_5_2,sum(CASE WHEN ans1_5=1 THEN 1 ELSE 0 END)  s1_5_1,
sum(CASE WHEN ans1_6=5 THEN 1 ELSE 0 END)  s1_6_5,sum(CASE WHEN ans1_6=4 THEN 1 ELSE 0 END)  s1_6_4,sum(CASE WHEN ans1_6=3 THEN 1 ELSE 0 END)  s1_6_3,sum(CASE WHEN ans1_6=2 THEN 1 ELSE 0 END)  s1_6_2,sum(CASE WHEN ans1_6=1 THEN 1 ELSE 0 END)  s1_6_1,
sum(CASE WHEN ans1_7=5 THEN 1 ELSE 0 END)  s1_7_5,sum(CASE WHEN ans1_7=4 THEN 1 ELSE 0 END)  s1_7_4,sum(CASE WHEN ans1_7=3 THEN 1 ELSE 0 END)  s1_7_3,sum(CASE WHEN ans1_7=2 THEN 1 ELSE 0 END)  s1_7_2,sum(CASE WHEN ans1_7=1 THEN 1 ELSE 0 END)  s1_7_1,
sum(CASE WHEN ans1_8=5 THEN 1 ELSE 0 END)  s1_8_5,sum(CASE WHEN ans1_8=4 THEN 1 ELSE 0 END)  s1_8_4,sum(CASE WHEN ans1_8=3 THEN 1 ELSE 0 END)  s1_8_3,sum(CASE WHEN ans1_8=2 THEN 1 ELSE 0 END)  s1_8_2,sum(CASE WHEN ans1_8=1 THEN 1 ELSE 0 END)  s1_8_1,
sum(CASE WHEN ans1_9=5 THEN 1 ELSE 0 END)  s1_9_5,sum(CASE WHEN ans1_9=4 THEN 1 ELSE 0 END)  s1_9_4,sum(CASE WHEN ans1_9=3 THEN 1 ELSE 0 END)  s1_9_3,sum(CASE WHEN ans1_9=2 THEN 1 ELSE 0 END)  s1_9_2,sum(CASE WHEN ans1_9=1 THEN 1 ELSE 0 END)  s1_9_1,
sum(CASE WHEN ans1_10=5 THEN 1 ELSE 0 END)  s1_10_5,sum(CASE WHEN ans1_10=4 THEN 1 ELSE 0 END)  s1_10_4,sum(CASE WHEN ans1_10=3 THEN 1 ELSE 0 END)  s1_10_3,sum(CASE WHEN ans1_10=2 THEN 1 ELSE 0 END)  s1_10_2,sum(CASE WHEN ans1_10=1 THEN 1 ELSE 0 END)  s1_10_1,

sum(CASE WHEN ans2_1=5 THEN 1 ELSE 0 END)  s2_1_5,sum(CASE WHEN ans2_1=4 THEN 1 ELSE 0 END)  s2_1_4,sum(CASE WHEN ans2_1=3 THEN 1 ELSE 0 END)  s2_1_3,sum(CASE WHEN ans2_1=2 THEN 1 ELSE 0 END)  s2_1_2,sum(CASE WHEN ans2_1=1 THEN 1 ELSE 0 END)  s2_1_1,
sum(CASE WHEN ans2_2=5 THEN 1 ELSE 0 END)  s2_2_5,sum(CASE WHEN ans2_2=4 THEN 1 ELSE 0 END)  s2_2_4,sum(CASE WHEN ans2_2=3 THEN 1 ELSE 0 END)  s2_2_3,sum(CASE WHEN ans2_2=2 THEN 1 ELSE 0 END)  s2_2_2,sum(CASE WHEN ans2_2=1 THEN 1 ELSE 0 END)  s2_2_1,
sum(CASE WHEN ans2_3=5 THEN 1 ELSE 0 END)  s2_3_5,sum(CASE WHEN ans2_3=4 THEN 1 ELSE 0 END)  s2_3_4,sum(CASE WHEN ans2_3=3 THEN 1 ELSE 0 END)  s2_3_3,sum(CASE WHEN ans2_3=2 THEN 1 ELSE 0 END)  s2_3_2,sum(CASE WHEN ans2_3=1 THEN 1 ELSE 0 END)  s2_3_1,
sum(CASE WHEN ans2_4=5 THEN 1 ELSE 0 END)  s2_4_5,sum(CASE WHEN ans2_4=4 THEN 1 ELSE 0 END)  s2_4_4,sum(CASE WHEN ans2_4=3 THEN 1 ELSE 0 END)  s2_4_3,sum(CASE WHEN ans2_4=2 THEN 1 ELSE 0 END)  s2_4_2,sum(CASE WHEN ans2_4=1 THEN 1 ELSE 0 END)  s2_4_1,
sum(CASE WHEN ans2_5=5 THEN 1 ELSE 0 END)  s2_5_5,sum(CASE WHEN ans2_5=4 THEN 1 ELSE 0 END)  s2_5_4,sum(CASE WHEN ans2_5=3 THEN 1 ELSE 0 END)  s2_5_3,sum(CASE WHEN ans2_5=2 THEN 1 ELSE 0 END)  s2_5_2,sum(CASE WHEN ans2_5=1 THEN 1 ELSE 0 END)  s2_5_1,
sum(CASE WHEN ans2_6=5 THEN 1 ELSE 0 END)  s2_6_5,sum(CASE WHEN ans2_6=4 THEN 1 ELSE 0 END)  s2_6_4,sum(CASE WHEN ans2_6=3 THEN 1 ELSE 0 END)  s2_6_3,sum(CASE WHEN ans2_6=2 THEN 1 ELSE 0 END)  s2_6_2,sum(CASE WHEN ans2_6=1 THEN 1 ELSE 0 END)  s2_6_1,
sum(CASE WHEN ans2_7=5 THEN 1 ELSE 0 END)  s2_7_5,sum(CASE WHEN ans2_7=4 THEN 1 ELSE 0 END)  s2_7_4,sum(CASE WHEN ans2_7=3 THEN 1 ELSE 0 END)  s2_7_3,sum(CASE WHEN ans2_7=2 THEN 1 ELSE 0 END)  s2_7_2,sum(CASE WHEN ans2_7=1 THEN 1 ELSE 0 END)  s2_7_1,
sum(CASE WHEN ans2_8=5 THEN 1 ELSE 0 END)  s2_8_5,sum(CASE WHEN ans2_8=4 THEN 1 ELSE 0 END)  s2_8_4,sum(CASE WHEN ans2_8=3 THEN 1 ELSE 0 END)  s2_8_3,sum(CASE WHEN ans2_8=2 THEN 1 ELSE 0 END)  s2_8_2,sum(CASE WHEN ans2_8=1 THEN 1 ELSE 0 END)  s2_8_1,
sum(CASE WHEN ans2_9=5 THEN 1 ELSE 0 END)  s2_9_5,sum(CASE WHEN ans2_9=4 THEN 1 ELSE 0 END)  s2_9_4,sum(CASE WHEN ans2_9=3 THEN 1 ELSE 0 END)  s2_9_3,sum(CASE WHEN ans2_9=2 THEN 1 ELSE 0 END)  s2_9_2,sum(CASE WHEN ans2_9=1 THEN 1 ELSE 0 END)  s2_9_1,
sum(CASE WHEN ans2_10=5 THEN 1 ELSE 0 END)  s2_10_5,sum(CASE WHEN ans2_10=4 THEN 1 ELSE 0 END)  s2_10_4,sum(CASE WHEN ans2_10=3 THEN 1 ELSE 0 END)  s2_10_3,sum(CASE WHEN ans2_10=2 THEN 1 ELSE 0 END)  s2_10_2,sum(CASE WHEN ans2_10=1 THEN 1 ELSE 0 END)  s2_10_1,
sum(CASE WHEN ans2_11=5 THEN 1 ELSE 0 END)  s2_11_5,sum(CASE WHEN ans2_11=4 THEN 1 ELSE 0 END)  s2_11_4,sum(CASE WHEN ans2_11=3 THEN 1 ELSE 0 END)  s2_11_3,sum(CASE WHEN ans2_11=2 THEN 1 ELSE 0 END)  s2_11_2,sum(CASE WHEN ans2_11=1 THEN 1 ELSE 0 END)  s2_11_1,
sum(CASE WHEN ans2_12=5 THEN 1 ELSE 0 END)  s2_12_5,sum(CASE WHEN ans2_12=4 THEN 1 ELSE 0 END)  s2_12_4,sum(CASE WHEN ans2_12=3 THEN 1 ELSE 0 END)  s2_12_3,sum(CASE WHEN ans2_12=2 THEN 1 ELSE 0 END)  s2_12_2,sum(CASE WHEN ans2_12=1 THEN 1 ELSE 0 END)  s2_12_1,
sum(CASE WHEN ans2_13=5 THEN 1 ELSE 0 END)  s2_13_5,sum(CASE WHEN ans2_13=4 THEN 1 ELSE 0 END)  s2_13_4,sum(CASE WHEN ans2_13=3 THEN 1 ELSE 0 END)  s2_13_3,sum(CASE WHEN ans2_13=2 THEN 1 ELSE 0 END)  s2_13_2,sum(CASE WHEN ans2_13=1 THEN 1 ELSE 0 END)  s2_13_1,
sum(CASE WHEN ans2_14=5 THEN 1 ELSE 0 END)  s2_14_5,sum(CASE WHEN ans2_14=4 THEN 1 ELSE 0 END)  s2_14_4,sum(CASE WHEN ans2_14=3 THEN 1 ELSE 0 END)  s2_14_3,sum(CASE WHEN ans2_14=2 THEN 1 ELSE 0 END)  s2_14_2,sum(CASE WHEN ans2_14=1 THEN 1 ELSE 0 END)  s2_14_1,
sum(CASE WHEN ans2_15=5 THEN 1 ELSE 0 END)  s2_15_5,sum(CASE WHEN ans2_15=4 THEN 1 ELSE 0 END)  s2_15_4,sum(CASE WHEN ans2_15=3 THEN 1 ELSE 0 END)  s2_15_3,sum(CASE WHEN ans2_15=2 THEN 1 ELSE 0 END)  s2_15_2,sum(CASE WHEN ans2_15=1 THEN 1 ELSE 0 END)  s2_15_1,

count(ans1_1)  c_ans
FROM assessCourse");
        $sum = $query->fetch_object();
        return $sum;
    }

    public function getSumAssessLecturer() {

        $query = $this->mysqli->query("SELECT sum(CASE WHEN ans1_1=5 THEN 1 ELSE 0 END)  s1_1_5,sum(CASE WHEN ans1_1=4 THEN 1 ELSE 0 END)  s1_1_4,sum(CASE WHEN ans1_1=3 THEN 1 ELSE 0 END)  s1_1_3,sum(CASE WHEN ans1_1=2 THEN 1 ELSE 0 END)  s1_1_2,sum(CASE WHEN ans1_1=1 THEN 1 ELSE 0 END)  s1_1_1,
sum(CASE WHEN ans1_2=5 THEN 1 ELSE 0 END)  s1_2_5,sum(CASE WHEN ans1_2=4 THEN 1 ELSE 0 END)  s1_2_4,sum(CASE WHEN ans1_2=3 THEN 1 ELSE 0 END)  s1_2_3,sum(CASE WHEN ans1_2=2 THEN 1 ELSE 0 END)  s1_2_2,sum(CASE WHEN ans1_2=1 THEN 1 ELSE 0 END)  s1_2_1,
sum(CASE WHEN ans1_3=5 THEN 1 ELSE 0 END)  s1_3_5,sum(CASE WHEN ans1_3=4 THEN 1 ELSE 0 END)  s1_3_4,sum(CASE WHEN ans1_3=3 THEN 1 ELSE 0 END)  s1_3_3,sum(CASE WHEN ans1_3=2 THEN 1 ELSE 0 END)  s1_3_2,sum(CASE WHEN ans1_3=1 THEN 1 ELSE 0 END)  s1_3_1,
sum(CASE WHEN ans1_4=5 THEN 1 ELSE 0 END)  s1_4_5,sum(CASE WHEN ans1_4=4 THEN 1 ELSE 0 END)  s1_4_4,sum(CASE WHEN ans1_4=3 THEN 1 ELSE 0 END)  s1_4_3,sum(CASE WHEN ans1_4=2 THEN 1 ELSE 0 END)  s1_4_2,sum(CASE WHEN ans1_4=1 THEN 1 ELSE 0 END)  s1_4_1,
sum(CASE WHEN ans1_5=5 THEN 1 ELSE 0 END)  s1_5_5,sum(CASE WHEN ans1_5=4 THEN 1 ELSE 0 END)  s1_5_4,sum(CASE WHEN ans1_5=3 THEN 1 ELSE 0 END)  s1_5_3,sum(CASE WHEN ans1_5=2 THEN 1 ELSE 0 END)  s1_5_2,sum(CASE WHEN ans1_5=1 THEN 1 ELSE 0 END)  s1_5_1,
sum(CASE WHEN ans1_6=5 THEN 1 ELSE 0 END)  s1_6_5,sum(CASE WHEN ans1_6=4 THEN 1 ELSE 0 END)  s1_6_4,sum(CASE WHEN ans1_6=3 THEN 1 ELSE 0 END)  s1_6_3,sum(CASE WHEN ans1_6=2 THEN 1 ELSE 0 END)  s1_6_2,sum(CASE WHEN ans1_6=1 THEN 1 ELSE 0 END)  s1_6_1,
sum(CASE WHEN ans1_7=5 THEN 1 ELSE 0 END)  s1_7_5,sum(CASE WHEN ans1_7=4 THEN 1 ELSE 0 END)  s1_7_4,sum(CASE WHEN ans1_7=3 THEN 1 ELSE 0 END)  s1_7_3,sum(CASE WHEN ans1_7=2 THEN 1 ELSE 0 END)  s1_7_2,sum(CASE WHEN ans1_7=1 THEN 1 ELSE 0 END)  s1_7_1,
sum(CASE WHEN ans2_1=5 THEN 1 ELSE 0 END)  s2_1_5,sum(CASE WHEN ans2_1=4 THEN 1 ELSE 0 END)  s2_1_4,sum(CASE WHEN ans2_1=3 THEN 1 ELSE 0 END)  s2_1_3,sum(CASE WHEN ans2_1=2 THEN 1 ELSE 0 END)  s2_1_2,sum(CASE WHEN ans2_1=1 THEN 1 ELSE 0 END)  s2_1_1,
sum(CASE WHEN ans2_2=5 THEN 1 ELSE 0 END)  s2_2_5,sum(CASE WHEN ans2_2=4 THEN 1 ELSE 0 END)  s2_2_4,sum(CASE WHEN ans2_2=3 THEN 1 ELSE 0 END)  s2_2_3,sum(CASE WHEN ans2_2=2 THEN 1 ELSE 0 END)  s2_2_2,sum(CASE WHEN ans2_2=1 THEN 1 ELSE 0 END)  s2_2_1,
sum(CASE WHEN ans2_3=5 THEN 1 ELSE 0 END)  s2_3_5,sum(CASE WHEN ans2_3=4 THEN 1 ELSE 0 END)  s2_3_4,sum(CASE WHEN ans2_3=3 THEN 1 ELSE 0 END)  s2_3_3,sum(CASE WHEN ans2_3=2 THEN 1 ELSE 0 END)  s2_3_2,sum(CASE WHEN ans2_3=1 THEN 1 ELSE 0 END)  s2_3_1,
sum(CASE WHEN ans2_4=5 THEN 1 ELSE 0 END)  s2_4_5,sum(CASE WHEN ans2_4=4 THEN 1 ELSE 0 END)  s2_4_4,sum(CASE WHEN ans2_4=3 THEN 1 ELSE 0 END)  s2_4_3,sum(CASE WHEN ans2_4=2 THEN 1 ELSE 0 END)  s2_4_2,sum(CASE WHEN ans2_4=1 THEN 1 ELSE 0 END)  s2_4_1,
sum(CASE WHEN ans3_1=5 THEN 1 ELSE 0 END)  s3_1_5,sum(CASE WHEN ans3_1=4 THEN 1 ELSE 0 END)  s3_1_4,sum(CASE WHEN ans3_1=3 THEN 1 ELSE 0 END)  s3_1_3,sum(CASE WHEN ans3_1=2 THEN 1 ELSE 0 END)  s3_1_2,sum(CASE WHEN ans3_1=1 THEN 1 ELSE 0 END)  s3_1_1,
sum(CASE WHEN ans3_2=5 THEN 1 ELSE 0 END)  s3_2_5,sum(CASE WHEN ans3_2=4 THEN 1 ELSE 0 END)  s3_2_4,sum(CASE WHEN ans3_2=3 THEN 1 ELSE 0 END)  s3_2_3,sum(CASE WHEN ans3_2=2 THEN 1 ELSE 0 END)  s3_2_2,sum(CASE WHEN ans3_2=1 THEN 1 ELSE 0 END)  s3_2_1,
sum(CASE WHEN ans3_3=5 THEN 1 ELSE 0 END)  s3_3_5,sum(CASE WHEN ans3_3=4 THEN 1 ELSE 0 END)  s3_3_4,sum(CASE WHEN ans3_3=3 THEN 1 ELSE 0 END)  s3_3_3,sum(CASE WHEN ans3_3=2 THEN 1 ELSE 0 END)  s3_3_2,sum(CASE WHEN ans3_3=1 THEN 1 ELSE 0 END)  s3_3_1,
sum(CASE WHEN ans3_4=5 THEN 1 ELSE 0 END)  s3_4_5,sum(CASE WHEN ans3_4=4 THEN 1 ELSE 0 END)  s3_4_4,sum(CASE WHEN ans3_4=3 THEN 1 ELSE 0 END)  s3_4_3,sum(CASE WHEN ans3_4=2 THEN 1 ELSE 0 END)  s3_4_2,sum(CASE WHEN ans3_4=1 THEN 1 ELSE 0 END)  s3_4_1,
sum(CASE WHEN ans3_5=5 THEN 1 ELSE 0 END)  s3_5_5,sum(CASE WHEN ans3_5=4 THEN 1 ELSE 0 END)  s3_5_4,sum(CASE WHEN ans3_5=3 THEN 1 ELSE 0 END)  s3_5_3,sum(CASE WHEN ans3_5=2 THEN 1 ELSE 0 END)  s3_5_2,sum(CASE WHEN ans3_5=1 THEN 1 ELSE 0 END)  s3_5_1,
sum(CASE WHEN ans3_6=5 THEN 1 ELSE 0 END)  s3_6_5,sum(CASE WHEN ans3_6=4 THEN 1 ELSE 0 END)  s3_6_4,sum(CASE WHEN ans3_6=3 THEN 1 ELSE 0 END)  s3_6_3,sum(CASE WHEN ans3_6=2 THEN 1 ELSE 0 END)  s3_6_2,sum(CASE WHEN ans3_6=1 THEN 1 ELSE 0 END)  s3_6_1,
sum(CASE WHEN ans3_7=5 THEN 1 ELSE 0 END)  s3_7_5,sum(CASE WHEN ans3_7=4 THEN 1 ELSE 0 END)  s3_7_4,sum(CASE WHEN ans3_7=3 THEN 1 ELSE 0 END)  s3_7_3,sum(CASE WHEN ans3_7=2 THEN 1 ELSE 0 END)  s3_7_2,sum(CASE WHEN ans3_7=1 THEN 1 ELSE 0 END)  s3_7_1,
sum(CASE WHEN ans4_1=5 THEN 1 ELSE 0 END)  s4_1_5,sum(CASE WHEN ans4_1=4 THEN 1 ELSE 0 END)  s4_1_4,sum(CASE WHEN ans4_1=3 THEN 1 ELSE 0 END)  s4_1_3,sum(CASE WHEN ans4_1=2 THEN 1 ELSE 0 END)  s4_1_2,sum(CASE WHEN ans4_1=1 THEN 1 ELSE 0 END)  s4_1_1,
sum(CASE WHEN ans4_2=5 THEN 1 ELSE 0 END)  s4_2_5,sum(CASE WHEN ans4_2=4 THEN 1 ELSE 0 END)  s4_2_4,sum(CASE WHEN ans4_2=3 THEN 1 ELSE 0 END)  s4_2_3,sum(CASE WHEN ans4_2=2 THEN 1 ELSE 0 END)  s4_2_2,sum(CASE WHEN ans4_2=1 THEN 1 ELSE 0 END)  s4_2_1,
sum(CASE WHEN ans4_3=5 THEN 1 ELSE 0 END)  s4_3_5,sum(CASE WHEN ans4_3=4 THEN 1 ELSE 0 END)  s4_3_4,sum(CASE WHEN ans4_3=3 THEN 1 ELSE 0 END)  s4_3_3,sum(CASE WHEN ans4_3=2 THEN 1 ELSE 0 END)  s4_3_2,sum(CASE WHEN ans4_3=1 THEN 1 ELSE 0 END)  s4_3_1,
sum(CASE WHEN ans4_4=5 THEN 1 ELSE 0 END)  s4_4_5,sum(CASE WHEN ans4_4=4 THEN 1 ELSE 0 END)  s4_4_4,sum(CASE WHEN ans4_4=3 THEN 1 ELSE 0 END)  s4_4_3,sum(CASE WHEN ans4_4=2 THEN 1 ELSE 0 END)  s4_4_2,sum(CASE WHEN ans4_4=1 THEN 1 ELSE 0 END)  s4_4_1,
sum(CASE WHEN ans4_5=5 THEN 1 ELSE 0 END)  s4_5_5,sum(CASE WHEN ans4_5=4 THEN 1 ELSE 0 END)  s4_5_4,sum(CASE WHEN ans4_5=3 THEN 1 ELSE 0 END)  s4_5_3,sum(CASE WHEN ans4_5=2 THEN 1 ELSE 0 END)  s4_5_2,sum(CASE WHEN ans4_5=1 THEN 1 ELSE 0 END)  s4_5_1,
sum(CASE WHEN ans4_6=5 THEN 1 ELSE 0 END)  s4_6_5,sum(CASE WHEN ans4_6=4 THEN 1 ELSE 0 END)  s4_6_4,sum(CASE WHEN ans4_6=3 THEN 1 ELSE 0 END)  s4_6_3,sum(CASE WHEN ans4_6=2 THEN 1 ELSE 0 END)  s4_6_2,sum(CASE WHEN ans4_6=1 THEN 1 ELSE 0 END)  s4_6_1,
sum(CASE WHEN ans5_1=5 THEN 1 ELSE 0 END)  s5_1_5,sum(CASE WHEN ans5_1=4 THEN 1 ELSE 0 END)  s5_1_4,sum(CASE WHEN ans5_1=3 THEN 1 ELSE 0 END)  s5_1_3,sum(CASE WHEN ans5_1=2 THEN 1 ELSE 0 END)  s5_1_2,sum(CASE WHEN ans5_1=1 THEN 1 ELSE 0 END)  s5_1_1,
sum(CASE WHEN ans5_2=5 THEN 1 ELSE 0 END)  s5_2_5,sum(CASE WHEN ans5_2=4 THEN 1 ELSE 0 END)  s5_2_4,sum(CASE WHEN ans5_2=3 THEN 1 ELSE 0 END)  s5_2_3,sum(CASE WHEN ans5_2=2 THEN 1 ELSE 0 END)  s5_2_2,sum(CASE WHEN ans5_2=1 THEN 1 ELSE 0 END)  s5_2_1,
sum(CASE WHEN ans5_3=5 THEN 1 ELSE 0 END)  s5_3_5,sum(CASE WHEN ans5_3=4 THEN 1 ELSE 0 END)  s5_3_4,sum(CASE WHEN ans5_3=3 THEN 1 ELSE 0 END)  s5_3_3,sum(CASE WHEN ans5_3=2 THEN 1 ELSE 0 END)  s5_3_2,sum(CASE WHEN ans5_3=1 THEN 1 ELSE 0 END)  s5_3_1,
sum(CASE WHEN ans5_4=5 THEN 1 ELSE 0 END)  s5_4_5,sum(CASE WHEN ans5_4=4 THEN 1 ELSE 0 END)  s5_4_4,sum(CASE WHEN ans5_4=3 THEN 1 ELSE 0 END)  s5_4_3,sum(CASE WHEN ans5_4=2 THEN 1 ELSE 0 END)  s5_4_2,sum(CASE WHEN ans5_4=1 THEN 1 ELSE 0 END)  s5_4_1,
sum(CASE WHEN ans5_5=5 THEN 1 ELSE 0 END)  s5_5_5,sum(CASE WHEN ans5_5=4 THEN 1 ELSE 0 END)  s5_5_4,sum(CASE WHEN ans5_5=3 THEN 1 ELSE 0 END)  s5_5_3,sum(CASE WHEN ans5_5=2 THEN 1 ELSE 0 END)  s5_5_2,sum(CASE WHEN ans5_5=1 THEN 1 ELSE 0 END)  s5_5_1,
sum(CASE WHEN ans5_6=5 THEN 1 ELSE 0 END)  s5_6_5,sum(CASE WHEN ans5_6=4 THEN 1 ELSE 0 END)  s5_6_4,sum(CASE WHEN ans5_6=3 THEN 1 ELSE 0 END)  s5_6_3,sum(CASE WHEN ans5_6=2 THEN 1 ELSE 0 END)  s5_6_2,sum(CASE WHEN ans5_6=1 THEN 1 ELSE 0 END)  s5_6_1,
sum(CASE WHEN ans5_7=5 THEN 1 ELSE 0 END)  s5_7_5,sum(CASE WHEN ans5_7=4 THEN 1 ELSE 0 END)  s5_7_4,sum(CASE WHEN ans5_7=3 THEN 1 ELSE 0 END)  s5_7_3,sum(CASE WHEN ans5_7=2 THEN 1 ELSE 0 END)  s5_7_2,sum(CASE WHEN ans5_7=1 THEN 1 ELSE 0 END)  s5_7_1,
sum(CASE WHEN ans5_8=5 THEN 1 ELSE 0 END)  s5_8_5,sum(CASE WHEN ans5_8=4 THEN 1 ELSE 0 END)  s5_8_4,sum(CASE WHEN ans5_8=3 THEN 1 ELSE 0 END)  s5_8_3,sum(CASE WHEN ans5_8=2 THEN 1 ELSE 0 END)  s5_8_2,sum(CASE WHEN ans5_8=1 THEN 1 ELSE 0 END)  s5_8_1,
sum(CASE WHEN ans5_9=5 THEN 1 ELSE 0 END)  s5_9_5,sum(CASE WHEN ans5_9=4 THEN 1 ELSE 0 END)  s5_9_4,sum(CASE WHEN ans5_9=3 THEN 1 ELSE 0 END)  s5_9_3,sum(CASE WHEN ans5_9=2 THEN 1 ELSE 0 END)  s5_9_2,sum(CASE WHEN ans5_9=1 THEN 1 ELSE 0 END)  s5_9_1,

count(ans1_1)  c_ans
FROM assessLecturer");
        $sum = $query->fetch_object();
        return $sum;
    }

    function reArrayFiles(&$file_post) {

        $file_ary = array();
        $file_count = count($file_post['name']);
        $file_keys = array_keys($file_post);

        for ($i = 0; $i < $file_count; $i++) {
            foreach ($file_keys as $key) {
                $file_ary[$i][$key] = $file_post[$key][$i];
            }
        }

        return $file_ary;
    }

    public function showThaiDate($date) {
        echo (date('d/m/', strtotime($date))) . (date('Y', strtotime($date)) + 543);
    }

    public function getSlide() {
        return $this->mysqli->query("SELECT  * FROM slide ORDER BY img_id DESC");
    }

    public function getHotel($id = null) {
        $where = '';
        if (!empty($id)) {
            $where = " WHERE room_id='$id'";
        }
        return $this->mysqli->query("SELECT  * FROM hotel $where ORDER BY room_id DESC");
    }

    public function getmitting() {
        $where = '';
        if (!empty($id)) {
            $where = " WHERE room_id='$id'";
        }
        return $this->mysqli->query("SELECT  * FROM mitting $where ORDER BY room_id DESC");
    }

    public function getFirstSlide() {
        $rs = $this->mysqli->query("SELECT  * FROM slide ORDER BY img_id DESC LIMIT 0,1");
        return $rs->fetch_object();
    }

    public function updateNewsViews($id) {
        $news = $this->getNewsFormid($id);
        $data = array(
            "news_view" => ($news->news_view + 1)
        );
        $this->update("news", $data, " news_id=$id");
    }

    public function updatePublicNewsViews($id) {
        $news = $this->getPublicNewsFormId($id);
        $data = array(
            "view" => ($news->view + 1)
        );
        $this->update("publicnews", $data, " news_id=$id");
    }

    public function getStudentYear($id = NULL, $page = NULL, $limit = NULL) {
        if (!empty($id)) {
            $sql = "SELECT * FROM student_year WHERE sy_id='$id' ORDER BY  sy_year DESC";
            $res = $this->mysqli->query($sql);
            return $res->fetch_object();
        } else {
            $start = $page * $limit;
            $sql = "SELECT * FROM student_year ORDER BY sy_id DESC  LIMIT $start,$limit";
            return $this->mysqli->query($sql);
        }
    }

    public function getStudent($id = NULL, $idx = NULL) {
        if (!empty($id)) {
            $sql = "SELECT * FROM student WHERE student_id='$id'";
            $res = $this->mysqli->query($sql);
            return $res->fetch_object();
        } else if (!empty($idx)) {
            $sql = "SELECT * FROM student WHERE sy_id='$idx' ORDER BY student_code ASC  ";
            return $this->mysqli->query($sql);
        } else {
            return array();
        }
    }

    public function getTeacher($id = null) {
        if (!empty($id)) {
            $sql = "SELECT * FROM teacher WHERE teacher_id='$id'";
            $res = $this->mysqli->query($sql);
            return $res->fetch_object();
        } else {
            $sql = "SELECT * FROM teacher ORDER BY order_num ASC";
            return $this->mysqli->query($sql);
        }
    }

    public function countStudent($id) {
        $count = $this->mysqli->query("SELECT count(*) as count FROM student WHERE sy_id='$id'");
        $count = $count->fetch_object();
        return $count->count;
    }

    public function getFileDownload($id = NULL, $page = NULL, $limit = NULL) {
        if (!empty($id)) {
            $sql = "SELECT * FROM file_download WHERE file_id='$id'";
            $res = $this->mysqli->query($sql);
            return $res->fetch_object();
        } else {
            $start = $page * $limit;
            $sql = "SELECT * FROM file_download ORDER BY file_id DESC  LIMIT $start,$limit";
            return $this->mysqli->query($sql);
        }
    }

    public function countFileDownload() {
        $count = $this->mysqli->query("SELECT count(*) as count FROM file_download");
        $count = $count->fetch_object();
        return $count->count;
    }

    public function updatepublicNewsView($news_id, $view) {
        $view = ($view + 1);
        $sql = "UPDATE publicnews SET view='$view' WHERE news_id='{$news_id}'";
        $this->mysqli->query($sql);
    }

    public function updateGalleryView($gallery_id, $view) {
        $view = ($view + 1);
        $sql = "UPDATE news SET news_view='$view' WHERE news_id='{$gallery_id}'";
        $this->mysqli->query($sql);
    }

    public function getResearch($research_id = null, $page = 0, $limit = 25, $text = NULL) {
        if (!empty($research_id)) {
            $sql = "SELECT * FROM research WHERE research_id='$research_id'";
            $res = $this->mysqli->query($sql);
            return $res->fetch_object();
        } else {
            $start = $page * $limit;
            $w = "";
            if (!empty($text)) {
                $w = " WHERE research_name LIKE '%$text%'";
            }
            $sql = "SELECT * FROM research $w ORDER BY research_id DESC  LIMIT $start,$limit";
            return $this->mysqli->query($sql);
        }
    }

    public function countResearch($text = NULL) {
        $w = "";
        if (!empty($text)) {
            $w = " WHERE research_name LIKE '%$text%'";
        }
        $count = $this->mysqli->query("SELECT count(*) as count FROM research $w");
        $count = $count->fetch_object();
        return $count->count;
    }

    public function getComplaints($research_id = null, $page = 0, $limit = 25, $text = NULL) {
        if (!empty($research_id)) {
            $sql = "SELECT * FROM complaints WHERE id='$research_id'";
            $res = $this->mysqli->query($sql);
            return $res->fetch_object();
        } else {
            $start = $page * $limit;

            $sql = "SELECT * FROM complaints   ORDER BY id DESC  LIMIT $start,$limit";
            return $this->mysqli->query($sql);
        }
    }

    public function countComplaints($text = NULL) {
        $w = "";
        if (!empty($text)) {
            $w = " WHERE research_name LIKE '%$text%'";
        }
        $count = $this->mysqli->query("SELECT count(*) as count FROM research $w");
        $count = $count->fetch_object();
        return $count->count;
    }

    public function activeComplaints($id) {
        $data = array(
            'view' => 1
        );
        $this->update('complaints', $data, "id={$id}");
    }

    public function UTF8TOtis620($param) {
        $data = array();

        foreach ($param AS $k => $v) {
            $data[$k] = @iconv("utf-8", "tis-620", trim($v));
        }
        return $data;
    }

    public function getCourse($id = null) {
        if (!empty($id)) {
            $sql = "SELECT * FROM course WHERE course_id='$id'";
            $res = $this->mysqli->query($sql);
            return $res->fetch_object();
        } else {
            $sql = "SELECT * FROM course ORDER BY course_code ASC";
            return $this->mysqli->query($sql);
        }
    }

    public function searchCourse($txt = "") {
        if (!empty($txt)) {
            $sql = "SELECT * FROM course WHERE course_name like '" . $txt . "%' ORDER BY course_name limit 5";
            return $this->mysqli->query($sql);
        }
    }

}
