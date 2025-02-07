<?php
if(!isset($_SESSION["aid"]))
{
     echo "<script>";
     echo "alert('please login');";
     echo "window.location.replace('../admin/');";
     echo "</script>";
}
?>