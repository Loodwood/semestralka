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



<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3>Prihlásenie</h3>

            </div>
            <div class="card-body">
                <form>
                    <div class="input-group form-group">

                        <input type="text" class="form-control" placeholder="Meno">
                    </div>
                    <div class="input-group form-group">

                        <input type="password" class="form-control" placeholder="Heslo">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Login" class="btn float-right login_btn">
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-center links">
                    Nie si registrovaný?<a href="Registracia.php">Registrácia</a>
                </div>
            </div>
        </div>
    </div>
</div>
<footer>Made by Holubcik™ 2020 </footer>
</body>
</html>