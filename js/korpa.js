$(document).ready(function () {

    var proizvodi = [];
    ucitajProizvodeIzSessiona();



    $('#posalji').submit(function (e) {
        e.preventDefault();
        const ime = $('#ime').val();
        const prezime = $('#prezime').val();
        const email = $('#email').val();
        const napomena = $('#napomena').val();

        if (!email.includes('@'))
            alert('Email nije dobro formatiran!');
        else if (!proizvodi.length) alert('Korpa je prazna..')
        else reqNaruci({
            ime,
            prezime,
            email,
            napomena,
            kupljeniProizvodi: proizvodi
        })

    });
    function reqNaruci(podaci) {
        $.ajax({
            type: "POST",
            url: "http://localhost:8080/mekdonalds/api/napravi_porudzbinu.php",
            data: podaci,
            dataType: "text",
            success: function (response) {
                alert(response);
                console.log(response);
            }
        });
    }
    $('body').on('click', '.izbaci', function () {
        const id = $(this).attr('id');

        if (proizvodi) {
            for (let index = 0; index < proizvodi.length; index++) {
                if (proizvodi[index].id == id)
                    if (index == proizvodi.length - 1)
                        proizvodi.pop()
                    else if (index == 0)
                        proizvodi.shift();
                    else proizvodi.splice(index, 1);
            }
            console.log(proizvodi);
            sessionStorage.setItem('proizvodi', JSON.stringify(proizvodi))
            ucitajProizvodeIzSessiona();
        }
    });

    function ucitajProizvodeIzSessiona() {
        proizvodi = JSON.parse(sessionStorage.getItem('proizvodi')) || []
        console.log(proizvodi);
        prikaziProizvodeUTabeli(proizvodi)
    }

    function prikaziProizvodeUTabeli(proizvodi) {
        $('#proizvodi tbody').html('');
        if (proizvodi)
            proizvodi.forEach(p => {
                $('#proizvodi tbody').append(
                    `
                    <tr>
                        <td scope="row">${p.id}</td>
                        <td>${p.naziv}</td>
                        <td>
                            <img class="card-img-top" height="100px" width="100px" src="img/${p.image_path}" alt="" />
                        </td>
                        <td>${p.kolicina}</td>
                        <td>
                            <div class="d-grid gap-2">
                                <button type="button" id="${p.id}" class="btn btn-danger izbaci">Izbaci</button>
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
});