<?php
use Devcon\Helpers\Url;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title><?php echo $title?></title>
    <link rel="stylesheet" href="<?php echo Url::baseUrl('assets/css/bootstrap/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?php echo Url::baseUrl('assets/css/style.css')?>">
    <script src="<?php echo Url::baseUrl('assets/js/jquery-3.3.1.min.js')?>"></script>
    <script src="<?php echo Url::baseUrl('assets/js/bootstrap/bootstrap.min.js')?>"></script>
    <script src="<?php echo Url::baseUrl('assets/js/main.js')?>"></script>
</head>
<body>
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
    <span class="navbar-brand mb-0 h1"><img src="<?php echo Url::baseUrl('assets/images/logo.png')?>"></span>
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="<?php echo Url::siteUrl()?>">Home <span class="sr-only">(current)</span></a>
        </li>
    </ul>
</nav>
<div class="container content">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10 col-sm-12 col-xs-12">
