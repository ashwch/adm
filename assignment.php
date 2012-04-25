<?php
$title="ADM | Assignment";
include('header.php');
if ($_SESSION['iden']=='f')
{include('fassignment.php');}
include('showassignment.php');
include('footer.php');

?>