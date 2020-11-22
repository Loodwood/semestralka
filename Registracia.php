<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>SOMFIT</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="styleLogin.css">




</head>

<body>
<header>
    <ul class="row p-3 center mainMenu">

        <li class="mainMenu"><a class="link" href="Ponuka.php">Ponuka</a></li>
        <li class="mainMenu"><a class="link" href="informacie.php">Informácie</a></li>
        <li class="mainMenu" ><a class="link" href="Prihlasenie.php">Prihlasenie</a></li>
        <li class="mainMenu"><h2>SOMFIT</h2></li>
    </ul>
</header>
<div class="mainContent transparent">
<div class="signup-form">
    <form action="pridaniePouzivatela.php" method="post">
        <h3>Registrácia</h3>
        <div class="form-group">
            <input type="text" class="form-control" name="prihlasovacieMeno" placeholder="Prihlasovacie meno" required="required">
        </div>
        <div class="form-group">

            <div class="row">
                <div class="col"><input type="text" class="form-control" name="meno" placeholder="Meno" required="required"></div>
                <div class="col"><input type="text" class="form-control" name="priezvisko" placeholder="Priezvisko" required="required"></div>
            </div>
        </div>
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="heslo" placeholder="Heslo" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="confirm_heslo" placeholder="Potvrdenie hesla" required="required">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block">Registruj sa</button>
        </div>
    </form>
    <div class="text-center">Už máš účet ? <a href="Prihlasenie.php">Prihlasenie</a></div>
</div>
</div>

<footer>Made by Holubcik™ 2020 </footer>
</body>
</html>