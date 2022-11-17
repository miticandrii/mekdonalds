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
    <script src="js/korpa.js"></script>
    <title>Korpa</title>

</head>

<body>
    <nav class="navbar navbar-expand nav-color ">
        <div class="container">
            <div class="nav navbar-nav">
                <img src="https://1000logos.net/wp-content/uploads/2017/03/McDonalds-logo.png" height="50px" width="50px">
                <a class="nav-item nav-link " href="proizvodi.php"> <b>Proizvodi </b><span class="visually-hidden">(current)</span></a>
                <a class="nav-item nav-link active" href="korpa.php"><b>Korpa</b> <span id="broj_proizvoda"></span></a>
                <a class="nav-item nav-link" href="provera_porudzbine.php"><b>Provera porudzbine</b></a>
            </div>
        </div>
    </nav>

    <div class="container">


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
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success btn-lg" data-bs-toggle="modal" data-bs-target="#narucivanje">
            Naruci
        </button>

        <!-- Modal -->
        <div class="modal fade" id="narucivanje" tabindex="-1" role="dialog" aria-labelledby="narucimodal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Potvrda porudzbine</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="posalji">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="ime" class="form-label">Ime</label>
                                            <input required type="text" class="form-control" name="ime" id="ime" aria-describedby="imeHelp" placeholder="">
                                            <small id="imeHelp" class="form-text text-muted">Unesite Vase ime</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="prezime" class="form-label">Prezime</label>
                                            <input required type="text" class="form-control" name="" id="prezime" aria-describedby="prezimeHelp" placeholder="">
                                            <small id="prezimeHelp" class="form-text text-muted">Unesite Vase
                                                prezime</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input required type="text" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="">
                                            <small id="emailHelp" class="form-text text-muted">Unesite Vas email</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3">
                                        <label for="napomena" class="form-label">Napomena</label>
                                        <textarea class="form-control" name="napomena" id="napomena" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Posalji</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>


    </div>
</body>

</html>