<?php 
session_start(); 
if($is_nogin){
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
    }else{
        header('Location: login.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style/style.css">
    <title><?= $title;?></title>
    <script src="https://kit.fontawesome.com/0c0888491f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php $css;?>">
</head>
<body>
    <div class="universe">