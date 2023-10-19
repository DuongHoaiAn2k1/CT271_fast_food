<?php
include "./helper/user.php";

logOut();

redirect("?mod=user&act=login");
