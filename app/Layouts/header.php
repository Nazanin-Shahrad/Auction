<?php
require_once (__DIR__ . "/../bootstrap.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo CONFIG_AUCTIONNAME; ?></title>
    <link rel="stylesheet" href="<?php echo CONFIG_URL ?>/css/stylesheet.css" type="text/css"/>
</head>
<body>
<div id="header">
    <h1><?php echo CONFIG_AUCTIONNAME; ?></h1>

</div>
<div id="menu">
    <a href="index.php">Home</a> &bull;
    <?php
if($session->isLogedIn()){
    echo "<a href='logout.php'>Logout</a> &bull;";

}else {
    echo "<a href='login.php'>Login</a> &bull;";
}
?>
    <a href="newitem.php">New Item </a> &bull;
    <a href="processauctions.php">ProcessAuction</a>
</div>
<div id="container">
    <div id="bar">
    </div>
    <div id="main">



