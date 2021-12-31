<div class="row">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item ps-3"><a href="<?= base_url ?>">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profesor</li>
        </ol>
    </nav>
</div>
<div class="row pb-3">
    <div class="col-6 text-end">
        <h1 class="mb-5">Menú principal de profesores</h1>
        <h2 class="text-warning">
            <p class="mb-0">
                <?= Utils::saludar() ?>
            </p>
            <span class="text-success">
                <?= $profesor->general->nombre ?>
                <?= $profesor->general->apellidos ?>
            </span>
        </h2>
    </div>
    <div class="col-6">
        <div class="col-12 col-md-7 d-flex align-items-center justify-content-center">
            <img src="<?=base_url?>assets/img/logos/UPIICSA.svg" class="img-fluid float-start" width="200px" alt="UPIICSA">
        </div>
    </div>
</div>