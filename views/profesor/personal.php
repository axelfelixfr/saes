<div class="row">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item ps-3"><a href="<?= base_url ?>">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Información</li>
            <li class="breadcrumb-item active" aria-current="page">Personal</li>
        </ol>
    </nav>
    <div class="col d-flex justify-content-around align-items-center">
        <a id="ipn" href="#"><img class="img-fluid" width="130px" src="<?=base_url?>assets/img/logos/IPN.svg" alt="IPN"></a>
    </div>
    <div class="col-9 d-flex justify-content-around align-items-center">
        <h3 class="text-black mx-5 text-center">UNIDAD PROFESIONAL INTERDISCIPLINARIA DE INGENIERÍA Y CIENCIAS SOCIALES Y ADMINISTRATIVAS</h3>
    </div>
    <div class="col d-flex justify-content-around align-items-center">
        <a id="upiicsa" href="#"><img class="img-fluid" width="70px" src="<?=base_url?>assets/img/logos/UPIICSA.svg" alt="UPIICSA"></a>
    </div>
</div>
<div class="container">
    <h1 class="text-primary text-center">DATOS PERSONALES</h1>
    <div class="tab-pane fade show active" id="generales" role="tabpanel" aria-labelledby="generales-tab">
        <div class="row">
            <div class="col-3 fw-bold text-primary"> RFC:</div>
            <div class="col-3 text-uppercase">
                <?= $profesor->general->rfc ?>
            </div>
            <div class="col-3 fw-bold text-primary">GRADO ESCOLAR:</div>
            <div class="col fw-normal text-uppercase">Lic.</div>
        </div>
        <div class="row">
            <div class="col-3 fw-bold text-primary">NOMBRE:</div>
            <div class="col-3 text-uppercase">
                <?= $profesor->general->nombre ?>
            </div>
            <div class="col-3 fw-bold text-primary">APELLIDOS:</div>
            <div class="col-3 text-uppercase">
                <?= $profesor->general->apellidos ?>
            </div>
        </div>
        <div class="row">
            <div class="col-1 fw-bold text-primary"> CURP:</div>
            <div class="col-3 text-uppercase">
                <?= $profesor->general->curp ?>
            </div>
            <div class="col-2 fw-bold text-primary"> SEXO:</div>
            <div class="col-2 text-uppercase">
                <?= $profesor->general->sexo == 'H' ? 'Hombre' : 'Mujer' ?>
            </div>
            <div class="col-2 fw-bold text-primary"> ESTADO CIVIL:</div>
            <div class="col-2 text-uppercase"> SOLTERO</div>
        </div>
        <div class="row">
            <div class="col-4 fw-bold text-primary">FECHA NACIMIENTO(DD/MM/YY):</div>
            <div class="col-2">
                <?= $profesor->general->nacimiento ?>
            </div>
            <div class="col-3 fw-bold text-primary">NACIONALIDAD:</div>
            <div class="col-3 text-uppercase">
                <?= $profesor->general->nacionalidad ?>
            </div>
        </div>
        <div class="row">
            <div class="col-6 fw-bold text-primary">CALLE:</div>
            <div class="col w-100 text-uppercase">
                <?= $profesor->direccion->calle ?>
            </div>
        </div>
        <div class="row">
            <div class="col-2 fw-bold text-primary"> NÚMERO INT:</div>
            <div class="col-1 text-uppercase">
                <?= $profesor->direccion->num_int ?>
            </div>
            <div class="col-2 fw-bold text-primary"> NÚMERO EXT:</div>
            <div class="col-1 text-uppercase">
                <?= $profesor->direccion->num_ext ?>
            </div>
            <div class="col-2 fw-bold text-primary">COLONIA:</div>
            <div class="col-4 text-uppercase">
                <?= $profesor->direccion->colonia ?>
            </div>
        </div>
        <div class="row">
            <div class="col-2 fw-bold text-primary"> CÓDIGO POSTAL:</div>
            <div class="col-1">
                <?= $profesor->direccion->codigo_postal ?>
            </div>
            <div class="col-1 fw-bold text-primary"> ESTADO:</div>
            <div class="col-3 text-uppercase">
                <?= $profesor->direccion->estado ?>
            </div>
            <div class="col-3 fw-bold text-primary">DELEGACIÓN/MUNICIPIO:</div>
            <div class="col-2 text-uppercase">
                <?= $profesor->direccion->municipio ?>
            </div>
        </div>
        <div class="row">
            <div class="col-2 fw-bold text-primary">TELEFONO MOVIL:</div>
            <div class="col-3">
                <?= $profesor->direccion->movil ?>
            </div>
            <div class="col-3 fw-bold text-primary">TELEFONO OFICINA:</div>
            <div class="col-3">
                <?= $profesor->direccion->tel_oficina ?>
            </div>
        </div>
        <div class="row">
            <div class="col-6 fw-bold text-primary">EMAIL:</div>
            <div class="col w-100">
                <?= $profesor->direccion->email ?>
            </div>
        </div>
        <div class="w-100"></div>
        <div class="text-sm-center p-4 ">
            <a href="#" class="btn btn-primary">Modificar</a>
        </div>
    </div>
</div>