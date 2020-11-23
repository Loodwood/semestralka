<html lang="sk">
<head>
<meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="mainContent transparent" >

<?php
include 'databaza.php';
header('Content-Type: text/html; charset=utf-8');
function kontrola(){

$odoslanie = true;
    if ( preg_match('/\s/',$_POST["email"]) || preg_match('/\s/',$_POST["prihlasovacieMeno"])
        || preg_match('/\s/',$_POST["meno"]) || preg_match('/\s/',$_POST["priezvisko"])
        || preg_match('/\s/',$_POST["heslo"]) || preg_match('/\s/',$_POST["confirm_heslo"])){
        ?><p class="p-3 mb-2 bg-danger text-white"><?php  echo "Prosím nezadávaj prázdne znaky."; ?></p><?php
        $odoslanie=false;
    }
if (strlen($_POST["prihlasovacieMeno"])<3){
    ?><p class="p-3 mb-2 bg-danger text-white"><?php  echo "Prosím zadaj vačšie prihlasovacie meno ako 3."; ?></p><?php
    $odoslanie=false;
}
if (strlen($_POST["meno"])<3){
    ?><p class="p-3 mb-2 bg-danger text-white"><?php  echo "Prosím zadaj vačšie meno ako 3."; ?></p><?php
    $odoslanie=false;
}
if (strlen($_POST["priezvisko"])<3){
    ?><p class="p-3 mb-2 bg-danger text-white"><?php echo "Prosím zadaj vačšie priezvisko meno ako 3.";?></p><?php
    $odoslanie=false;
}
if (strcmp($_POST["heslo"],$_POST["confirm_heslo"])){
    ?><p class="p-3 mb-2 bg-danger text-white"><?php echo "Heslá sa nezhodujú."?></p><?php ;
    $odoslanie=false;
}
    ?><div class="d-none"><?php
    $db = new DB();
    $db->connect();
    $conn = $db->getConn();
    $qr= $conn->prepare ("SELECT COUNT(*) FROM `pouzivatelia` WHERE prMeno =? ");
    $qr->execute([$_POST["prihlasovacieMeno"]]);
    $count=$qr->fetch();
    ?></div><?php

if($count[0]>0){
   $odoslanie=false;
   ?><p class="p-3 mb-2 bg-danger text-white"><?php echo "Už existuje užívateľ s tímto menom.";?></p><?php
}
    if($odoslanie){
        ?><p class="p-3 mb-2 bg-success text-white"><?php echo "Úspešne si sa registroval!";?></p><?php

    }

return $odoslanie;
}

        ?><div class="d-none"><?php
$db = new DB();
$db->connect();
$conn = $db->getConn();

        ?></div><?php
if (kontrola()){

$qr= $conn->prepare("INSERT INTO `pouzivatelia`( `prMeno`, `heslo`, `email`, `meno`, `priezvisko`) 
VALUES (? ,? , ?, ?, ?)");
$qr->execute([$_POST["prihlasovacieMeno"],$_POST["heslo"],$_POST["email"],
    $_POST["meno"],$_POST["priezvisko"]]);

}



?>
    <div class="form-group">
        <a href="Registracia.php"><button type="button"  class="btn btn-success btn-lg btn-block">Okay</button></a>

    </div>
    <?php ;

die();
?>

</div>
</body>
</html>
