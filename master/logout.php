<?php

setcookie('a', '', -time() + (3600 * 24));
setcookie('t', '', -time() + (3600 * 24));
header("Location: login.php");
