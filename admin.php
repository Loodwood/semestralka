<html lang="sk">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php





include "databaza.php";

$prmeno = "";
$heslo = "";
$email = "";
$meno= "";
$priezvisko = "";




function editovanieZaznamu(){


    if (isset($_POST["priezvisko"])){
        $db = new DB();
        $db->connect();
        $conn = $db->getConn();
        $qr= $conn->prepare("UPDATE pouzivatelia SET prMeno= ?,heslo= ?,email= ?,meno= ?,priezvisko= ? WHERE indexP= ?");//WHERE 'indexP'=?

        $qr->execute([$_POST["prihlasovacieMeno"], $_POST["heslo"],$_POST["email"], $_POST["meno"],$_POST["priezvisko"],$_GET["id"]]);//

    }
}

    if (isset($_GET["id"])){
        if(isset($_GET["kontrola"])){
        if (kontrola()){

        editovanieZaznamu();
        }
        }
    }

pripravZaznam();
vymaz();
vypis();

?>
<?php if(isset($_GET["id"])){ ?>
<div class="mainContent transparent">
    <div class="signup-form">
        <form action="admin.php?kontrola=1&id=<?php  if(isset($_GET["id"])) echo $_GET["id"] ?>" method="post">

            <div class="form-group">
                <input type="text" class="form-control" name="index" value="<?php if(isset($_GET["id"])) echo $_GET["id"] ?>" placeholder="index" required="required">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="prihlasovacieMeno" value="<?php if(isset($_GET["id"]))  echo  $prmeno ?>" placeholder="Prihlasovacie meno">
            </div>
            <div class="form-group">

                <div class="row">
                    <div class="col"><input type="text" class="form-control" name="meno" value="<?php if(isset($_GET["id"]))  echo $meno ?>" placeholder="Meno" ></div>
                    <div class="col"><input type="text" class="form-control" name="priezvisko" value="<?php if(isset($_GET["id"]))  echo $priezvisko ?>" placeholder="Priezvisko" ></div>
                </div>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" value="<?php if(isset($_GET["id"]))  echo $email ?>" placeholder="Email" >
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="heslo" value="<?php if(isset($_GET["id"]))  echo $heslo ?>" placeholder="Heslo" >
            </div>


            <div class="form-group">
                <a href=""></a><button type="submit" class="btn btn-success btn-lg btn-block">Edituj !</button>
            </div>
        </form>

    </div>
    <div class=".d-none "></div>
    <?php
    }

    function pripravZaznam(){
        global $prmeno , $heslo , $email , $meno , $priezvisko ;

        if(isset($_GET["id"])){
            $db = new DB();
            $db->connect();
            $conn = $db->getConn();
            $qr= $conn->prepare("SELECT * FROM pouzivatelia WHERE indexP=?");//WHERE 'indexP'=?
            $qr->execute([$_GET["id"]]);//
            $zaznam=$qr->fetchAll();


            foreach ($zaznam as $pouzivatel) {
                $prmeno = $pouzivatel[1];
                $heslo = $pouzivatel[2];
                $email = $pouzivatel[3];
                $meno= $pouzivatel[4];
                $priezvisko = $pouzivatel[5];







            }


        }

    }

    function vypis(){
        $db = new DB();
        $db->connect();

        $conn = $db->getConn();
        $qr= $conn->query("SELECT * FROM pouzivatelia");
        $qr->execute();
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
            ?><td><?php   echo $pouzivatel[$i];
                }

                ?>
            <td>
                <div class="row">
                    <a href="admin.php?id=<?php echo $pouzivatel[0]; ?>"><button class="form-control btn btn-success btn-lg btn-block">Edituj</button></a>
                    <a href="admin.php?a=<?php echo $pouzivatel[0]; ?>"><button class="form-control btn btn-danger btn-lg btn-block">Vymaž</button></a>
                    <!--            <input formaction="admin.php" type="button" id="zaznam" name="zaznam" formmethod="get">-->
                    <!----></div>


            </td>
            <?php
            $j++;
            ?></tr><?php

        }




        ?>
        </tbody>
        </table>




        <?php
    }

    function vymaz(){
        if(isset($_GET["a"])){
            $db = new DB();
            $db->connect();

            $conn = $db->getConn();
            $qr= $conn->prepare ("DELETE FROM pouzivatelia WHERE indexP=?");
            $qr->execute([$_GET["a"]]);

        }

    }

    function kontrola(){
        pripravZaznam();

        $odoslanie = true;
        if ( preg_match('/\s/',$_POST["email"]) || preg_match('/\s/',$_POST["prihlasovacieMeno"]) || preg_match('/\s/',$_POST["meno"]) ||
            preg_match('/\s/',$_POST["priezvisko"]) || preg_match('/\s/',$_POST["heslo"])){
            ?><p class="p-3 mb-2 bg-danger text-white"><?php  echo "Prosím nezadávaj prázdne znaky."; ?></p><?php
            $odoslanie=false;
        }
        echo $_POST["prihlasovacieMeno"];
        if (strlen($_POST["prihlasovacieMeno"])<3){
            ?><p class="p-3 mb-2 bg-danger text-white"><?php  echo "Prosím zadaj vačšie prihlasovacie meno ako 3."; ?></p><?php
            $odoslanie=false;
        }
        if (strlen($_POST["meno"])<3){
            ?><p class="p-3 mb-2 bg-danger text-white"><?php  echo "Prosím zadaj vačšie meno ako 3."; ?></p><?php
            $odoslanie=false;
        }
        if (strlen($_POST["priezvisko"])<3){
            ?><p class="p-3 mb-2 bg-danger text-white"><?php echo "Prosím zadaj vačšie priezvisko ako 3.";?></p><?php
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

            $qr= $conn->prepare("SELECT * FROM pouzivatelia WHERE prMeno=?");
            $qr->execute([$_POST["prihlasovacieMeno"]]);

            $zaznam=$qr->fetchAll();
            foreach ($zaznam as $zaznam) {
            echo $zaznam[0];
            }

            if(!($zaznam[0]==$_GET["id"])){
            $odoslanie=false;
            ?><p class="p-3 mb-2 bg-danger text-white"><?php echo "Už existuje užívateľ s tímto menom.";?></p><?php
            }
        }
        if($odoslanie){
            ?><p class="p-3 mb-2 bg-success text-white"><?php echo "Úspešne si editoval riadok s indexom: "  .$_GET["id"]."!";?></p><?php

        }

        return $odoslanie;
    }
    ?>

</body>
</html>