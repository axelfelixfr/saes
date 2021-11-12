<div class="row">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item ps-3"><a href="<?= base_url ?>">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Alumnos</li>
        </ol>
    </nav>
</div>
<div class="row pb-3">
    <div class="col-6 text-end">
        <h1 class="mb-5">Menú principal de alumnos</h1>
        <h2 class="text-warning">
            <p class="mb-0">
                <?= Utils::saludar() ?>
            </p>
            <span class="text-success">
                <?= $_SESSION['identity']->nombre ?>
                <?= $_SESSION['identity']->apellidos ?>
            </span>
        </h2>
    </div>
    <div class="col-6">
        <div class="col-12 col-md-7 d-flex align-items-center justify-content-center">
            <img src="<?=base_url?>assets/img/logos/UPIICSA.svg" class="img-fluid float-start" width="200px" alt="UPIICSA">
        </div>
    </div>
</div>
<div class="row p-2 m-3 small">
    <div class="col-2 text-primary text-wrap d-flex">
        <h1 class="align-self-center">AVISO</h1>
    </div>
    <div class="col-10 border-start border-3 border-primary">
        <p>Recuerda que la credencial del IPN te reconoce como alumno y es la forma de identificarte dentro del Instituto. Si la extraviaste puedes acudir a la Dirección de Administración Escolar a tramitarla</p>
        <p class="text-end">Atentamente. Dirección de Administración Escolar</p>
    </div>
</div>