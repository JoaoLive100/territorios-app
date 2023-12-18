<?php
    $title = "Territórios - Home";
    $css = "./css/home.css";
    $js = "./js/home.js";
    include_once("./includes/header.php");
?>
<nav class="navbar navbar-expand-lg navbar-light py-3 navbar-shrink" id="mainNav">
    <div class="mx-auto">
        <h3>Territórios</h3>
    </div>
</nav>
<section class="page-section" id="territorios">
    <div class="px-4 px-lg-5">
        <h2>Selecione o Território</h2>
    </div>
    <div class="px-4 px-lg-5" id="territorios-list">
    </div>
</section>
<section class="page-section" id="territorio">
    <div class="px-4 px-lg-5">
        <h4 id="territorio-title"></h4>
    </div>
    <div class="px-4 px-lg-5">
        <div class="accordion" id="accordionExample">
        </div>
    </div>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Adicionar nova casa ou comércio</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="inputNumero">Número da casa ou nome do comércio:</label>
                            <input type="text" class="form-control" id="inputNumero" placeholder="Clique aqui!" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success" id="btn-registrar">Registrar</button>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
    include_once("./includes/footer.php");
?>
