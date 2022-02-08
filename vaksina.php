<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .mt-5 {
            text-align: center;
        }

        #joylash {
            margin-left: 1em;
            margin-top: 2%;
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
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    <title>Dasturga kirish</title>
</head>

<body>
    <div class="sarlavha">
        <h2 class="title">Vaksina ma'lumotlarini boshqarish</h2>
    </div>
    <div class="main">
        <div class="container">
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Vaksina
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="wrapper">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mt-5 mb-3 clearfix">
                                            <h3 class="mt-5">Vaksina boshqarish menyusi</h3>
                                            <div class="pull-left">
                                                <form class="form-inline" method="post" action="Search.php">
                                                    <input type="text" name="id" class="form-control" placeholder="Id si bo'yicha qidirish">
                                                    <button type="submit" name="save" class="btn btn-primary">Qidirish</button>
                                                </form>
                                            </div>
                                            <a href="create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Vaksina qo'shish</a>
                                        </div>
                                        <?php
                                        require_once "config.php";
                                        $sql = "SELECT * FROM vaksina";
                                        if ($result = mysqli_query($link, $sql)) {
                                            if (mysqli_num_rows($result) > 0) {
                                                echo '<table class="table table-bordered table-striped">';
                                                echo "<thead>";
                                                echo "<tr>";
                                                echo "<th>Id</th>";
                                                echo "<th>Nomi</th>";
                                                echo "<th>Mavjud soni</th>";
                                                echo "<th>Qabul qilish soni</th>";
                                                echo "<th>Ma'lumotlari</th>";
                                                echo "<th>Oraliq kuni</th>";
                                                echo "<th>Action</th>";
                                                echo "</tr>";
                                                echo "</thead>";
                                                echo "<tbody>";
                                                while ($row = mysqli_fetch_array($result)) {
                                                    echo "<tr>";
                                                    echo "<td>" . $row['id'] . "</td>";
                                                    echo "<td>" . $row['nomi'] . "</td>";
                                                    echo "<td>" . $row['mavjud_soni'] . "</td>";
                                                    echo "<td>" . $row['qabul_qilish_soni'] . "</td>";
                                                    echo "<td>" . $row['malumotlari'] . "</td>";
                                                    echo "<td>" . $row['oraliq_kuni'] . "</td>";
                                                    echo "<td>";
                                                    echo '<a href="read.php?id=' . $row['id'] . '" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                                    echo '<a href="update.php?id=' . $row['id'] . '" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                                    echo '<a href="delete.php?id=' . $row['id'] . '" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                                    echo "</td>";
                                                    echo "</tr>";
                                                }
                                                echo "</tbody>";
                                                echo "</table>";
                                                mysqli_free_result($result);
                                            } else {
                                                echo '<div class="alert alert-danger"><em>Vaksinalar yoq</em></div>';
                                            }
                                        } else {
                                            echo "Qayta urunib koring.";
                                        }
                                        mysqli_close($link);
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <p><a href="admin.php" id="joylash" class="btn btn-primary">Orqaga qaytish</a></p>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>