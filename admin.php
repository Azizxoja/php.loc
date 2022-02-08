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
            color: black;

        }

        .main {
            width: 80%;
            height: 50%;
            margin-left: 10%;
            margin-top: 5%;
            border: 1px solid pink;
        }

        .title {
            text-align: center;
            padding: 0.5em;
        }

        .container {
            width: 90%;
            margin: 5%;
            display: flex;
        }

        .orta {
            margin-left: 20%;
            margin-right: 20%;
        }

        body {
            background-image: url(fon.jpg);
        }
    </style>
    <title>Admin menyusi</title>
</head>

<body>
    <div class="sarlavha">
        <h2 class="title">Admin menyusi</h2>
    </div>
    <div class="main">
        <div class="container">
            <div class="card" style="width: 20rem;">
                <img src="vaksina.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Vaksina ma'lumotlarini boshqarish uchun tugmanini bosing</p>
                    <p><a href="vaksina.php" class="btn btn-primary">Vaksina ma'lumotlarini boshqarish</a></p>
                </div>
            </div>
            <div class="orta"></div>
            <div class="card" style="width: 20rem;">
                <img src="vaksina_jarayoni.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Vaksina ma'lumotlarini boshqarish uchun tugmanini bosing</p>
                    <p><a href="vaksina_jarayoni.php" class="btn btn-primary">Emlash jarayonini boshqarish</a></p>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>