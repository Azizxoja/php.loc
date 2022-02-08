<?php
require_once "config.php";

$nomi = $mavjud_soni = $qabul_qilish_soni = $malumotlari = $oraliq_kuni = "";
$nomi_err = $mavjud_soni_err = $qabul_qilish_soni_err = $malumotlari_err = $oraliq_kuni_err = "";

if (isset($_POST["id"]) && !empty($_POST["id"])) {
    $id = $_POST["id"];

    $input_nomi = trim($_POST["nomi"]);
    if (empty($input_nomi)) {
        $nomi_err = "Iltimos nomini kiriting.";
    } elseif (!filter_var($input_nomi, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $nomi_err = "Nomini natog'ri kiritdingiz.";
    } else {
        $nomi = $input_nomi;
    }

    $input_mavjud_soni = trim($_POST["mavjud_soni"]);
    if (empty($input_mavjud_soni)) {
        $mavjud_soni_err = "Iltimos mavjud soni kiriting.";
    } elseif (!ctype_digit($input_mavjud_soni)) {
        $salary_err = "Iltimos son kiriting.";
    } else {
        $mavjud_soni = $input_mavjud_soni;
    }

    $input_qabul_qilish_soni = trim($_POST["qabul_qilish_soni"]);
    if (empty($input_qabul_qilish_soni)) {
        $qabul_qilish_soni_err = "Iltimos qabul qilish soni kiriting.";
    } elseif (!ctype_digit($input_qabul_qilish_soni)) {
        $qabul_qilish_soni_err = "Iltimos son kiriting.";
    } else {
        $qabul_qilish_soni = $input_qabul_qilish_soni;
    }

    $input_malumotlari = trim($_POST["malumotlari"]);
    if (empty($input_malumotlari)) {
        $malumotlari_err = "Iltimos Ma'lumotlarini kiriting.";
    } elseif (!filter_var($input_malumotlari, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $malumotlari_err = "Ma'lumotlarini natog'ri kiritdingiz.";
    } else {
        $malumotlari = $input_malumotlari;
    }

    $input_oraliq_kuni = trim($_POST["oraliq_kuni"]);
    if (empty($input_oraliq_kuni)) {
        $oraliq_kuni_err = "Iltimos oraliq kunini kiriting.";
    } elseif (!ctype_digit($input_oraliq_kuni)) {
        $oraliq_kuni_err = "Iltimos son kiriting.";
    } else {
        $oraliq_kuni  = $input_oraliq_kuni;
    }

    if (empty($nomi_err) && empty($mavjud_soni_err) && empty($qabul_qilish_soni_err) && empty($malumotlari_err) && empty($oraliq_kuni_err)) {
        $sql = "UPDATE vaksina SET nomi=?, mavjud_soni=?, qabul_qilish_soni=?, malumotlari=?, oraliq_kuni=? WHERE id=?";
        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "ssssss", $param_nomi, $param_mavjud_soni, $param_qabul_qilish_soni, $param_malumotlari, $param_oraliq_kuni, $param_id);

            $param_nomi = $nomi;
            $param_mavjud_soni = $mavjud_soni;
            $param_qabul_qilish_soni = $qabul_qilish_soni;
            $param_malumotlari = $malumotlari;
            $param_oraliq_kuni = $oraliq_kuni;
            $param_id = $id;

            if (mysqli_stmt_execute($stmt)) {
                header("location: admin.php");
                exit();
            } else {
                echo "Iltimos qayta urunib ko'ring";
            }
        }

        mysqli_stmt_close($stmt);
    }

    mysqli_close($link);
} else {
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        $id =  trim($_GET["id"]);

        $sql = "SELECT * FROM vaksina WHERE id = ?";
        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "i", $param_id);

            $param_id = $id;

            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    $nomi = $row["nomi"];
                    $mavjud_soni = $row["mavjud_soni"];
                    $qabul_qilish_soni = $row["qabul_qilish_soni"];
                    $malumotlari = $row["malumotlari"];
                    $oraliq_kuni = $row["oraliq_kuni"];
                } else {
                    header("location: error.php");
                    exit();
                }
            } else {
                echo "Iltimos qayta urunib ko'ring.";
            }
        }
        mysqli_stmt_close($stmt);

        mysqli_close($link);
    } else {
        header("location: error.php");
        exit();
    }
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
                                        <h2 class="mt-5">Vaksina ma'lumotlarini yangilash</h2>
                                        <p>Iltimos yangilamoqchi bo'lgan vaksina ma'lumotlarini kiriting!!!</p>
                                        <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                                            <div class="form-group">
                                                <label>Nomi</label>
                                                <input type="text" name="nomi" class="form-control <?php echo (!empty($nomi_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $nomi; ?>">
                                                <span class="invalid-feedback"><?php echo $nomi_err; ?></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Mavjud soni</label>
                                                <input type="text" name="mavjud_soni" class="form-control <?php echo (!empty($mavjud_soni_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $mavjud_soni; ?>">
                                                <span class="invalid-feedback"><?php echo $mavjud_soni_err; ?></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Qabul qilish soni</label>
                                                <input type="text" name="qabul_qilish_soni" class="form-control <?php echo (!empty($qabul_qilish_soni_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $qabul_qilish_soni; ?>">
                                                <span class="invalid-feedback"><?php echo $qabul_qilish_soni_err; ?></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Ma'lumotlari</label>
                                                <textarea name="malumotlari" class="form-control <?php echo (!empty($malumotlari_err)) ? 'is-invalid' : ''; ?>"><?php echo $malumotlari; ?></textarea>
                                                <span class="invalid-feedback"><?php echo $malumotlari_err; ?></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Oraliq Kuni</label>
                                                <input type="text" name="oraliq_kuni" class="form-control <?php echo (!empty($oraliq_kuni_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $oraliq_kuni; ?>">
                                                <span class="invalid-feedback"><?php echo $oraliq_kuni_err; ?></span>
                                            </div>
                                            <input type="hidden" name="id" value="<?php echo $id; ?>" />
                                            <input type="submit" class="btn btn-primary" value="Jo'natish">
                                            <a href="vaksina.php" class="btn btn-secondary ml-2">Bekor qilish</a>
                                        </form>
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