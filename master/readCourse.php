<?php
include '../_conn.php';
include '../functionx.php';
$fn = new functionx();

    //$keyword = @iconv("utf-8", "tis-620", $_POST["keyword"]);
    
    $keyword =  $_POST["keyword"];
    
        $result= $fn->searchCourse($keyword);
        

//$result = $fn->query("SELECT TOP 6 * FROM REF_TCI WHERE Name_Th like '" . $keyword . "%' ORDER BY Name_Th");

if (!empty($result)) {
    ?>
    <ul id="course-list">
        <?php
 
        foreach ($result as $key => $value) {

           // $value = $fn->tis620toutf8($value);

            ?>
            <li onClick="selectCountry('<?php echo $value["course_name"]; ?>','<?php echo $value["course_id"]; ?>');"><?php echo $value["course_name"]; ?></li>
        <?php } ?>
    </ul>
<?php } ?>