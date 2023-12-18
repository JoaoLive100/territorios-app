window.addEventListener('DOMContentLoaded', event => {

    $(document).ready(function(){
        $.ajax({
            url: '../model/home.php',
            type: 'POST',
            data: {
                'action': 'loadTerritorios'
            },
            success: function (data) {
                if (data != "erro") {
                    data.forEach(element =>{
                        const divContent = `<a href="#"><div class="numerador" value="${element.id_territorio}" numero="${element.numero_territorio}" nome="${element.nome_territorio}"><span>${element.numero_territorio}</span></div></a>`;
                        $("#territorios-list").append(divContent);
                    });
                }
            }
        });
    })

    $("#territorios-list").on("click", ".numerador", function () {
        $("#territorio-title").text("Território: " + $(this).attr('numero') + " (" + $(this).attr('nome') + ")");
        let territorioID = $(this).attr('value');
        $.ajax({
            url: '../model/home.php',
            type: 'POST',
            data: {
                'action': 'loadRuas',
                'territorioID': territorioID
            },
            success: function (data) {
                $("#accordionExample").empty();
                if (data != "erro") {
                    data.forEach((element, index) => {
                        const accordionItem = `
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading${index}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse${index}" aria-expanded="false" aria-controls="collapse${index}">
                                        ${element.nome_rua}
                                    </button>
                                </h2>
                                <div id="collapse${index}" class="accordion-collapse collapse" aria-labelledby="heading${index}" data-bs-parent="#accordionExample">
                                    <div id="accordion-add-button" class="m-3">
                                        <button type="button" class="btn btn-success btn-add w-100" data-bs-toggle="modal" data-bs-target="#staticBackdrop" value-index="${index}" value-id-territorio="${element.id_territorio}" value-id-territorio-rua="${element.id_territorio_rua}">Adicionar casa</button>
                                    </div>
                                    <div class="accordion-body">
                                    </div>
                                </div>
                            </div>`;
                        $("#accordionExample").append(accordionItem);
                        loadCasas(element.id_territorio_rua, index);
                    });
                    $("#territorio").css("visibility", "visible");
                }
            }
        });
    });

    function loadCasas(ruaID, index) {
        var accordionBody = $("#collapse" + index + " .accordion-body");
        $.ajax({
            url: '../model/home.php',
            type: 'POST',
            data: {
                'action': 'loadCasas',
                'ruaID': ruaID
            },
            success: function (data) {
                console.log(data);
                if (data != "erro") {
                    data.forEach(element => {
                        const accordionBodyContent = `
                            <div>
                                <span>${element.numero_casa}</span>
                                <button type="button" class="btn btn-outline-danger m-2"><i class="bi bi-trash3"></i></button>
                            <div>
                        `;
                        accordionBody.append(accordionBodyContent);
                    });
                }
            }
        });
        accordionBody.empty();
    }

    $("#accordionExample").on("click", ".btn-add", function () {
        let index = $(this).attr('value-index');;
        let territorioID = $(this).attr('value-id-territorio');
        let ruaID = $(this).attr('value-id-territorio-rua');
        $("#btn-registrar").attr('value-index', index);
        $("#btn-registrar").attr('value-id-territorio', territorioID);
        $("#btn-registrar").attr('value-id-territorio-rua', ruaID);
    });

    $("#btn-registrar").click(function () {
        let index = $(this).attr('value-index');
        let ruaID = $(this).attr('value-id-territorio-rua');
        let territorioID = $(this).attr('value-id-territorio');
        let numeroCasa = $("#inputNumero").val();

        $.ajax({
            url: '../model/home.php',
            type: 'POST',
            data: {
                'action': 'registrarCasa',
                'territorioID': territorioID,
                'ruaID': ruaID,
                'numeroCasa': numeroCasa
            },
            success: function (data) {
                if (data != "erro") {
                    loadCasas(ruaID, index);
                    $("#staticBackdrop").modal('hide');
                    $("#inputNumero").val("");
                }
            }
        });
    });
});
