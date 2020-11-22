<html lang="sk">
<head>
    <meta charset="UTF-16">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php



$prmeno = 0;
 $heslo = 0;
 $email = 0;
 $meno= 0;
 $priezvisko = 0;

include "databaza.php";
$db = new DB();
$db->connect();

$conn = $db->getConn();
$qr= $conn->query("SELECT * FROM pouzivatelia");
$qr->execute();

//$pouzivatelia=$qr->setFetchMode(PDO::FETCH_ASSOC);//PDO ma staticke premenne (::) fetch_assoc
$pouzivatelia=$qr->fetchAll();

?><table class="table table-dark">
    <thead>
    <tr>
        <th scope="col">Index</th>
        <th scope="col">Pr. Meno</th>
        <th scope="col">Heslo</th>
        <th scope="col">Email</th>
        <th scope="col">Meno</th>
        <th scope="col">Priezvisko</th>
    </tr>
    </thead>
    <tbody>
    <?php



        ?><tr><?php
        $j=1;
    foreach ($pouzivatelia as $pouzivatel) {

                 for ($i = 0; $i <= 5; $i++) {
                ?><td><?php   echo utf8_encode($pouzivatel[$i]);
            }

            ?>
            <td>
            <a href="admin.php?id=<?php echo $j; ?>"><button class="form-control btn btn-success btn-lg btn-block">Submit</button></a>
<!--            <input formaction="admin.php" type="button" id="zaznam" name="zaznam" formmethod="get">-->
<!---->


            </td>
           <?php
           $j++;
    ?></tr><?php
}

?>
    </tbody>
    </table>




<?php function skusobnaFunkcia(){


if(isset($_GET["id"])){
    $db = new DB();
    $db->connect();
    $conn = $db->getConn();
    $qr= $conn->prepare("SELECT * FROM pouzivatelia WHERE indexP=?");//WHERE 'indexP'=?
    $qr->execute([$_GET["id"]]);//
    $zaznam=$qr->fetchAll();


foreach ($zaznam as $pouzivatel) {


?><?php
    $_POST["prihlasovacieMeno"]= $pouzivatel[1];
    $_POST["heslo"]= $pouzivatel[2];
    $_POST["email"] =$pouzivatel[3];
    $_POST["meno"] = $pouzivatel[4];
    $_POST["priezvisko"]= $pouzivatel[5];
    $prmeno = $pouzivatel[1];;
    $heslo = $pouzivatel[2];
    $email = $pouzivatel[3];
    $meno= $pouzivatel[4];
    $priezvisko = $pouzivatel[5];



}


}

?>

<?php }
skusobnaFunkcia();?>

<div class="mainContent transparent">
    <div class="signup-form">
        <form action="admin.php" method="post">

            <div class="form-group">
                <input type="text" class="form-control" name="index" value="<?php if(isset($_GET["id"])) echo $_GET["id"] ?>" placeholder="index" required="required">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="prihlasovacieMeno" value="<?php if(isset($_GET["id"]))  echo $_POST["prihlasovacieMeno"] ?>" placeholder="Prihlasovacie meno">
            </div>
            <div class="form-group">

                <div class="row">
                    <div class="col"><input type="text" class="form-control" name="meno" value="<?php if(isset($_GET["id"]))  echo utf8_encode($_POST["meno"]) ?>" placeholder="Meno" ></div>
                    <div class="col"><input type="text" class="form-control" name="priezvisko" value="<?php if(isset($_GET["id"]))  echo utf8_encode($_POST["priezvisko"]) ?>" placeholder="Priezvisko" ></div>
                </div>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" value="<?php if(isset($_GET["id"]))  echo $_POST["email"] ?>" placeholder="Email" >
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="heslo" value="<?php if(isset($_GET["id"]))  echo $_POST["heslo"] ?>" placeholder="Heslo" >
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-success btn-lg btn-block">Edituj !</button>
            </div>
        </form>

    </div>
    <?php
    $text = "čáčášáčášáčýľčáýľýščáýľčýľáýčšľčš";
    echo utf8_encode($text) ."<br>";
    echo utf8_decode($text);
    ?>

</body>
</html>