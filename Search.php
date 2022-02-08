<?php
error_reporting(0);
$conn = mysqli_connect("localhost", "root", "", "covid_19");
if (count($_POST) > 0) {
    $id = $_POST["id"];
    $result = mysqli_query($conn, "SELECT * FROM vaksina where id='$id' ");
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
                            <h2 class="mt-5">Qidiruv natijasi</h2>
                            <?php
                            echo '<table class="table table-bordered table-striped">';
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th>Id</th>";
                            echo "<th>Nomi</th>";
                            echo "<th>Mavjud soni</th>";
                            echo "<th>Qabul qilish soni</th>";
                            echo "<th>Ma'lumotlari</th>";
                            echo "<th>Oraliq kuni</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            $i = 0;
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['nomi'] . "</td>";
                                echo "<td>" . $row['mavjud_soni'] . "</td>";
                                echo "<td>" . $row['qabul_qilish_soni'] . "</td>";
                                echo "<td>" . $row['malumotlari'] . "</td>";
                                echo "<td>" . $row['oraliq_kuni'] . "</td>";
                                echo "</tr>";
                                $i++;
                            }
                            echo "</tbody>";
                            echo "</table>";
                            ?>
                            <p><a href="vaksina.php" class="btn btn-primary">Orqaga qaytish</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>