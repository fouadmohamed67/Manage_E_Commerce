<?php 
include '../admin/function.php';
include 'connect.php';
session_start();

session_unset();
session_destroy();
?>
 <script type="text/javascript" src="layout/js/my_j_query_js.js"></script>
<script type="text/javascript">goto("../admin/index.php");</script><?php
 