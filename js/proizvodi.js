$(document).ready(function () {

    var proizvodi = [];
    ucitajProizvodeIzSessiona();
    reqProizvodi();
    $('#korpa').click(function (e) {
        e.preventDefault();
        const unique = [];
        if (proizvodi)
            for (let index = 0; index < proizvodi.length; index++) {
                const element = proizvodi[index];
                let postoji = false;

                for (let j = 0; j < unique.length; j++) {

                    if (unique[j].id == element.id) {
                        postoji = true;
                        unique[j].kolicina += 1;
                    }
                }
                if (!postoji) {
                    if (!element.kolicina) element.kolicina = 1;
                    unique.push(element);
                }
            }

        sessionStorage.setItem('proizvodi', JSON.stringify(unique));
        location.href = 'korpa.php'
    });

    $('body').on('click', '.dodaj', function () {
        console.log(JSON.parse($(this).attr('id')));
        proizvodi.push(JSON.parse($(this).attr('id')))
    });
    $('#kategorija-select').change(function (e) {
        e.preventDefault();
        if ($(this).val() != 0)
            reqProizvodiPoKategoriji($(this).val());
        else reqProizvodi();
    });

    function reqProizvodiPoKategoriji(kategorija) {
        $.ajax({
            type: "GET",
            url: "http://localhost:8080/mekdonalds/api/proizvodi_po_kategoriji.php",
            data: {
                id_kategorija: kategorija
            },
            dataType: "JSON",
            success: function (proizvodi) {
                prikaziProizvodeUTabeli(proizvodi);
            }
        });
    }

    function ucitajProizvodeIzSessiona() {
        proizvodi = JSON.parse(sessionStorage.getItem('proizvodi')) || []
    }

    function reqProizvodi() {
        $.ajax({
            type: "GET",
            url: "http://localhost:8080/mekdonalds/api/proizvodi.php",
            dataType: "JSON",
            success: function (proizvodi) {
                prikaziProizvodeUTabeli(proizvodi);
            }
        });
    }

    function prikaziProizvodeUTabeli(proizvodi) {
        $('#proizvodi').html('');

        if (proizvodi && proizvodi.length)
            proizvodi.forEach(p => {
                $('#proizvodi').append(`

                    <div class="col-4 mt-2">
                        <div class="card">
                            <img class="card-img-top" src="img/${p.image_path}" alt="" />
                            <div class="card-body">
                                <h4 class="card-title">${p.naziv} (${p.kolicina_na_stanju})</h4>
                                <p class="card-text">${p.opis}</p>
                            </div>
                            <button id='${JSON.stringify(p)}' class='btn btn-primary dodaj'>Dodaj</button>
                        </div>
                    </div>
                `);
            })
        else $('#proizvodi').append(
            `
        <tr>
            <td colspan="5" scope="row">Trenutno nema proizvoda na stanju</td>
        </tr>
        `
        );
    }
});