$(document).ready(function () {
    $('#searchEmail').submit(function (e) {
        e.preventDefault();
        ucitajPorudzbine();
    });

    $('body').on('click', '.obrisi', function () {
        const id = $(this).attr('id');

        $.ajax({
            type: "GET",
            url: "http://localhost:8080/mekdonalds/api/obrisi_porudzbinu.php",
            data: {
                porudzbina_id: id
            },
            dataType: "text",
            success: function (response) {
                alert(response);
                ucitajPorudzbine();
            }
        });
    });


    function prikaziPorudzbineUTabeli(porudzbine) {
        $('#proizvodi tbody').html('');
        if (porudzbine)
            porudzbine.forEach(p => {
                $('#proizvodi tbody').append(
                    `
                    <tr>
                        <td scope="row">${p.porudzbina_id}</td>
                        <td>${p.naziv}</td>
                        <td>
                            <img class="card-img-top" height="100px" width="100px" src="img/${p.image_path}" alt="" />
                        </td>
                        <td>${p.kolicina}</td>
                        <td>
                            <div class="d-grid gap-2">
                                <button type="button" id="${p.porudzbina_id}" class="btn btn-danger obrisi">Obrisi</button>
                            </div>
                        </td>
                    </tr>
                    `
                );
            })
        else $('#proizvodi tbody').append(
            `
        <tr>
            <td colspan="5" scope="row">Tabela je trenutno prazna! Vratite se na kupovinu</td>
        </tr>
        `
        );
    }

    function ucitajPorudzbine() {
        $.ajax({
            type: "GET",
            url: "http://localhost:8080/mekdonalds/api/porudzbine_po_korisniku.php?korisnik_email=" + $('#search-email-input').val(),
            dataType: "JSON",
            success: function (porudzbine) {
                console.log(porudzbine);
                if (porudzbine.length)
                    prikaziPorudzbineUTabeli(porudzbine);
                else
                    alert('Korisnik nije pronadjen ili nema aktivnih porudzbina.');
            }
        });
    }
});


