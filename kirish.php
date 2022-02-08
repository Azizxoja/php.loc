<?php
session_start();
require_once "config.php";

if (isset($_POST['kirish'])) {
    $seria = $_POST['seria'];
    $jshir = $_POST['jshir'];

    $seria = mysqli_real_escape_string($link, $seria);
    $jshir = mysqli_real_escape_string($link, $jshir);

    $query = "SELECT * FROM fuqaro_malumotlari WHERE passport_seriya='{$seria}' AND passport_jshr='{$jshir}'";
    $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) > 0) {
        $result = mysqli_fetch_assoc($result);
        $_SESSION['seriya'] = $result['passport_seriya'];
        $_SESSION['jshir'] = $result['passport_jshr'];

        header("Location: covid.php");
    }
}
if (isset($_POST['kirish_admin'])) {
    $login = $_POST['login'];
    $parol = $_POST['parol'];

    $login = mysqli_real_escape_string($link, $login);
    $parol = mysqli_real_escape_string($link, $parol);

    $sorov = "SELECT * FROM hamshiralar WHERE login='{$login}' AND parol='{$parol}'";
    $natija = mysqli_query($link, $sorov);
    if (mysqli_num_rows($natija) > 0) {
        $natija = mysqli_fetch_assoc($natija);
        $_SESSION['login'] = $natija['login'];
        $_SESSION['parol'] = $natija['parol'];

        header("Location: admin.php");
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .sarlavha {
            height: 30%;
            position: center;
            color: white;
        }

        .main {
            width: 90%;
            height: 60%;
            margin: 5%;
            border: 1px solid white;
        }

        .title {
            text-align: center;
            padding: 0.5em;
        }

        .container {
            width: 97%;
            margin: 1.5%;
        }

        .form {
            width: 98%;
            margin: 1%;
        }

        .check {
            width: 20%;
            height: 100px;
            margin-left: 40%;
        }
    </style>
    <title>Dasturga kirish</title>
</head>

<body style="background-image: url(fon.jpg);">
    <div class="sarlavha">
        <h2 class="title">Covid-19 vaccination statistics platform</h2>
    </div>
    <div class="main">
        <div class="container">
            <div class="accordion accordion-flush" id="accordionFlushExample" style="border-radius: 10px;">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Fuqaro sifatida kirish
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="form">
                            <form action="" method="post">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Passport seriyasi</label>
                                    <input type="text" name="seria" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Jismoniy shaxs identfikator raqami</label>
                                    <input type="text" name="jshir" class="form-control" id="exampleInputPassword1">
                                </div>
                                <button name="kirish" type="submit" class="btn btn-primary">Jo'natish</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            Operator sifatida kirish
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                        <div class="form">
                            <form action="" method="post">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Loginingizni kiriting</label>
                                    <input type="text" name="login" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Parolingizni kiriting</label>
                                    <input type="password" name="parol" class="form-control" id="exampleInputPassword1">
                                </div>
                                <button name="kirish_admin" style="margin-bottom: 1%;" type="submit" class="btn btn-primary">Jo'natish</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>