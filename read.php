<?php
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    require_once "config.php";

    $sql = "SELECT * FROM vaksina WHERE id = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        $param_id = trim($_GET["id"]);
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $nomi = $row['nomi'];
                $mavjud_soni = $row['mavjud_soni'];
                $qabul_qilish_soni = $row['qabul_qilish_soni'];
                $malumotlari = $row['malumotlari'];
                $oraliq_kuni = $row['oraliq_kuni'];
            } else {
                header("location: error.php");
                exit();
            }
        } else {
            echo "Qayta urunib ko'ring !!!";
        }
    }

    mysqli_stmt_close($stmt);

    mysqli_close($link);
} else {
    header("location: error.php");
    exit();
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper {
            width: 96%;
            height: 96%;
            margin: 2%;
        }

        .mt-5 {
            text-align: center;
        }

        .pls {
            text-align: center;
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
            width: 98%;
            margin-top: 5%;
            margin-left: 6%;
            margin-bottom: 5%;
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

        .sarlavha {
            height: 30%;
            position: center;
            color: white;
        }


        .title {
            text-align: center;
            padding: 0.5em;
        }

        body {
            background-image: url(fon.jpg);
        }
    </style>
    <title>Vaksina</title>
</head>

<body>
    <div class="sarlavha">
        <h2 class="title">Vaksina ma'lumotlarini boshqarish</h2>
    </div>
    <div class="main">
        <div class="container">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Vaksina
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="wrapper">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h1 class="mt-5 mb-3">Vaksinani ko'rish</h1>
                                        <div class="form-group">
                                            <label>Nomi</label>
                                            <p><b><?php echo $row["nomi"]; ?></b></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Mavjud soni</label>
                                            <p><b><?php echo $row["mavjud_soni"]; ?></b></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Vaksina qabul qilish soni</label>
                                            <p><b><?php echo $row["qabul_qilish_soni"]; ?></b></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Vaksina ma'lumotlari</label>
                                            <p><b><?php echo $row["malumotlari"]; ?></b></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Qabul qilish oraliq kuni</label>
                                            <p><b><?php echo $row["oraliq_kuni"]; ?></b></p>
                                        </div>
                                        <p><a href="vaksina.php" class="btn btn-primary">Orqaga qaytish</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>