<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="js/pretraga_porudzbine.js"></script>
    <title>Korpa</title>

</head>

<body>
    <nav class="navbar navbar-expand nav-color ">
        <div class="container">
            <div class="nav navbar-nav">
                <img src="https://1000logos.net/wp-content/uploads/2017/03/McDonalds-logo.png" height="50px" width="50px">
                <a class="nav-item nav-link" href="proizvodi.php"><b>Proizvodi</b><span class="visually-hidden">(current)</span></a>
                <a class="nav-item nav-link" href="korpa.php"><b>Korpa </b><span id="broj_proizvoda"></span></a>
                <a class="nav-item nav-link active" href="provera_porudzbine.php"> <b>Provera porudzbine</b></a>
            </div>
        </div>
    </nav>


    <div class="container">

        <div class="col-3">
            <div class="mt-3 d-flex">
                <form id="searchEmail">
                    <input type="email" placeholder="Unesite email za pretragu porudzbine" class="form-control" id="search-email-input" >
                    <input type="submit" hidden value="">
                </form>
            </div>
        </div>
        <table id="proizvodi" class="table table-bordered table-striped table-responsive mt-4 nav-color">
            <thead class="thead-default">
                <tr>
                    <th>Sifra</th>
                    <th>Naziv</th>
                    <th>Slika</th>
                    <th>Kolicina</th>
                    <th>Akcije</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</body>

</html>