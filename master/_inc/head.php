
<!-- Top Bar -->
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="index.php"> ระบบจัดการข้อมูลเว็บไซต์ </a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">

            <ul class="nav navbar-nav navbar-right">
                <li class=" waves-effect">
                    <a href="../" id="Logout" target="_BLANK" style="background: #3f004d;color: #ffffff;border-color: #ffffff;">
                        <i class="material-icons">launch</i>
                        <span class="iconName">หน้าเว็บ </span>
                    </a>
                </li>
                <li class=" waves-effect waves-block">
                    <a href="logout.php" id="Logout" >
                        <i class="material-icons">power_settings_new</i> 
                        <span class="iconName">ออกจากระบบ</span>
                    </a>
                </li>
            </ul> 
        </div>

    </div>
</nav>
<!-- #Top Bar -->
<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">


        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">เมนูหลัก</li>
                <li id="indexActive">
                    <a href="index.php">
                        <i class="material-icons">home</i>
                        <span>Home</span>
                    </a>
                </li>
                <?php
                if ($_COOKIE['t'] == 'e') {
                    ?>
                    <li  id="newsActive" >
                        <a href="news.php">
                            <i class="material-icons">perm_media</i>
                            <span>กิจกรรม</span>
                        </a>
                    </li>
                    <li  id="publicnewsActive" >
                        <a href="publicnews.php">
                            <i class="material-icons">rss_feed</i>
                            <span>ข่าวประชาสัมพันธ์</span>
                        </a>
                    </li>

                    <li  id="slideActive" >
                        <a href="slide.php">
                            <i class="material-icons">image</i>
                            <span>ภาพ สไลด์</span>
                        </a>
                    </li>
                    <li  id="teacherActive" >
                        <a href="teacher.php">
                            <i class="material-icons">perm_identity</i>
                            <span>บุคลากร</span>
                        </a>
                    </li>
                    <li  id="mittingActive" >
                        <a href="mitting.php">
                            <i class="material-icons">input</i>
                            <span>ห้องประชุม</span>
                        </a>
                    </li>
                    <li  id="hotelActive" >
                        <a href="hotel.php">
                            <i class="material-icons">equalizer</i>
                            <span>โรงแรม</span>
                        </a>
                    </li>
                 
                    <li  id="filesActive" >
                        <a href="file_download.php">
                            <i class="material-icons">assignment_returned</i>
                            <span>ไฟล์ดาวน์โหลด</span>
                        </a>
                    </li>
                  
                    <li  id="complaintsActive" >
                        <a href="complaints.php">
                            <i class="material-icons">speaker_notes</i>
                            <span>ข้อความร้องเรียน</span>
                        </a>
                    </li>

                   
                    <li  id="userActive" >
                        <a href="user.php">
                            <i class="material-icons">account_box</i>
                            <span>จัดการผู้ใช้</span>
                        </a>
                    </li>

                <?php } else {
                    ?> 
                    <li  id="eventActive" >
                        <a href="event.php">
                            <i class="material-icons">check</i>
                            <span>ประเมิน</span>
                        </a>
                    </li>
                <?php }
                ?>
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2019 - 2020 <a href="http://comcentre.lpru.ac.th/" target="_BLANK">พัฒนาโดย ศูนย์คอมพิวเตอร์</a>.
            </div>
            <div class="version">
                <b>มหาวิทยาลัยราชภัฏลำปาง </b>
            </div>


        </div>
        <!-- #Footer -->
    </aside>

</section>