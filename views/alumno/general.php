<div class="row">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item ps-3"><a href="<?= base_url ?>">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Datos personales</li>
            <li class="breadcrumb-item active" aria-current="page">General</li>
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
<div class="row">
    <div class="col-12 col-md-4 d-none d-md-flex">
        <div class="card align-items-center border-0" style="width: 18rem;">
            <img class="img-fluid" src="https://s2.qwant.com/thumbr/0x380/e/2/1dcae51df64ecca2a6a8eafd5fd420fcc23d09d4473b89678965fafa2bbfe1/user-icon-vector.jpg?u=https%3A%2F%2Fstatic.vecteezy.com%2Fsystem%2Fresources%2Fpreviews%2F000%2F551%2F599%2Foriginal%2Fuser-icon-vector.jpg&q=0&b=1&p=0&a=0" class="card-img-top" alt="foto">
            <div class="card-body">
                <br><br>
                <a href="#" class="btn btn-primary">Imprimir Datos</a>
                <br><br>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-8">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active px-1 px-md-2" id="generales-tab" data-bs-toggle="tab" data-bs-target="#generales" type="button" role="tab" aria-controls="generales" aria-selected="true">Generales</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link px-1 px-md-2" id="nacimiento-tab" data-bs-toggle="tab" data-bs-target="#nacimiento" type="button" role="tab" aria-controls="nacimiento" aria-selected="false">Nacimiento</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link px-1 px-md-2" id="direccion-tab" data-bs-toggle="tab" data-bs-target="#direccion" type="button" role="tab" aria-controls="direccion" aria-selected="false">Dirección</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link px-1 px-md-2" id="escolaridad-tab" data-bs-toggle="tab" data-bs-target="#escolaridad" type="button" role="tab" aria-controls="escolaridad" aria-selected="false">Escolaridad</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link px-1 px-md-2" id="tutor-tab" data-bs-toggle="tab" data-bs-target="#tutor" type="button" role="tab" aria-controls="tutor" aria-selected="false">Tutor</button>
            </li>
        </ul>
        <div class="tab-content p-4 border border-1" style="height: auto;" id="tabGeneral">
            <div class="tab-pane fade show active" id="generales" role="tabpanel" aria-labelledby="generales-tab">
                <form class="row ms-0 ms-md-4" method="POST">
                    <div class="col-6 col-sm-3 fw-bold">BOLETA:</div>
                    <div class="col fw-normal">
                        <?= $_SESSION['identity']->clave_usuario ?>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-6 col-sm-3 fw-bold">NOMBRE:</div>
                    <div class="col fw-normal text-uppercase text-break">
                        <?= $_SESSION['identity']->nombre ?>
                        <?= $_SESSION['identity']->apellidos ?>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-6 col-sm-3 fw-bold">PLANTEL:</div>
                    <div class="col fw-normal">
                        <?= $_SESSION['identity']->plantel ?>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-6 col-sm-3 fw-bold">CURP:</div>
                    <div class="col fw-normal text-break">
                        <?= $_SESSION['identity']->curp ?>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-6 col-sm-3 fw-bold">RFC:</div>
                    <div class="col fw-normal">
                        <?= $_SESSION['identity']->rfc ?>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-6 col-sm-3 fw-bold">CARTILLA:</div>
                    <div class="col">
                        <input id="cartilla" name="cartilla" type="text" value="<?= $alumno->cartilla ?>" class="form-control form-control-sm d-none">
                        <div id="cartillaDisplay" class="d-block">
                            <?= $_SESSION['identity']->cartilla ?>
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-6 col-sm-3 fw-bold">PASAPORTE:</div>
                    <div class="col fw-normal">
                        <input id="pasaporte" name="pasaporte" type="text" value="<?= $alumno->pasaporte ?>" class="form-control form-control-sm mt-2 d-none">
                        <div id="pasaporteDisplay" class="d-block">
                            <?= $_SESSION['identity']->pasaporte ?>
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-6 col-sm-3 fw-bold">SEXO:</div>
                    <div class="col fw-normal">
                        <select id="sexo" class="form-select form-select-sm mt-2 d-none" required>
                            <option selected disabled>Selecciona un sexo</option>
                            <?php if ($alumno->sexo == 'H') : ?>
                            <option value="<?= $alumno->sexo ?>" selected>
                                Hombre
                            </option>
                            <option value="M">
                                Mujer
                            </option>
                            <?php else : ?>
                            <option value="<?= $alumno->sexo ?>" selected>
                                Mujer
                            </option>
                            <option value="H">
                                Hombre
                            </option>
                            <?php endif; ?>
                        </select>
                        <div id="sexoDisplay" class="d-block">
                            <?= $_SESSION['identity']->sexo == 'H' ? 'Hombre' : 'Mujer' ?>
                        </div>
                    </div>
                    <div class="text-sm-center p-4">
                        <button class="btn btn-primary" id="modificarGeneral" type="button">Modificar</button>
                        <button class="btn btn-warning d-none" id="formGeneral" type="button">Guardar</button>
                    </div>
                </form>
            </div>
            <div class="tab-pane fade" id="nacimiento" role="tabpanel" aria-labelledby="nacimiento-tab">
                <div class="col-12 col-lg-9 mx-auto">
                    <div class="card alert-card-primary">
                        <div class="card-body">
                            Ej. de formato de feca de nacimiento '15 Mar 1992'
                        </div>
                    </div>
                </div>
                <br>
                <div class="row" style="text-indent: 30px;">
                    <div class="col-6 col-sm-3 fw-bold">FECHA:</div>
                    <div class="col fw-normal">05 Feb 1999</div>
                    <div class="w-100"></div>
                    <div class="col-6 col-sm-3 fw-bold">NACIONALIDAD:</div>
                    <div class="col fw-normal">MEXICANA</div>
                    <div class="w-100"></div>
                    <div class="col-6 col-sm-3 fw-bold">ENTIDAD:</div>
                    <div class="col fw-normal">EDO. MÉX.</div>
                    <div class="w-100"></div>
                </div>
                <div class="text-sm-center p-4 ">
                    <a href="#" class="btn btn-primary">Modificar</a>
                </div>
            </div>
            <div class="tab-pane fade" id="direccion" role="tabpanel" aria-labelledby="direccion-tab">
                <div class="row" style="text-indent: 30px;">
                    <div class="col-6 col-sm-3 fw-bold">CALLE:</div>
                    <div class="col fw-normal">SIN ESPECIFICAR</div>
                    <div class="w-100"></div>
                    <div class="col-6 col-sm-3 fw-bold">NO. EXT.:</div>
                    <div class="col fw-normal">0</div>
                    <div class="w-100"></div>
                    <div class="col-6 col-sm-3 fw-bold">NO. INT.:</div>
                    <div class="col fw-normal">0</div>
                    <div class="w-100"></div>
                    <div class="col-6 col-sm-3 fw-bold">COLONIA:</div>
                    <div class="col fw-normal">SIN ESPECIFICAR</div>
                    <div class="w-100"></div>
                    <div class="col-6 col-sm-3 fw-bold">C.P.:</div>
                    <div class="col fw-normal">0</div>
                    <div class="w-100"></div>
                    <div class="col-6 col-sm-3 fw-bold">ESTADO:</div>
                    <div class="col fw-normal"></div>
                    <div class="w-100"></div>
                    <div class="col-6 col-sm-3 fw-bold">DEL/MPO.:</div>
                    <div class="col fw-normal"></div>
                    <div class="w-100"></div>
                    <div class="col-6 col-sm-3 fw-bold">TELÉFONO:</div>
                    <div class="col fw-normal"></div>
                    <div class="w-100"></div>
                    <div class="col-6 col-sm-3 fw-bold">CORREO:</div>
                    <div class="col fw-normal"></div>
                    <div class="w-100"></div>
                    <div class="col-6 col-sm-3 fw-bold">LABORA:</div>
                    <div class="col fw-normal">NO</div>
                </div>
                <div class="text-sm-center p-4 ">
                    <a href="#" class="btn btn-primary">Modificar</a>
                </div>
            </div>
            <div class="tab-pane fade" id="escolaridad" role="tabpanel" aria-labelledby="escolaridad-tab">
                <div class="row" style="text-indent: 30px;">
                    <div class="col-6 col-sm-6 fw-bold">ESCUELA DE PROCEDENCIA:</div>
                    <div class="col fw-normal">CICS SANTO TOMAS</div>
                    <div class="w-100"></div>
                    <div class="col-6 col-sm-6 fw-bold">ENTIDAD FEDERATIVA:</div>
                    <div class="col fw-normal"></div>
                    <div class="w-100"></div>
                    <div class="col-6 col-sm-6 fw-bold">PROMEDIO SECUNDARIA:</div>
                    <div class="col fw-normal">0.00</div>
                    <div class="w-100"></div>
                    <div class="col-6 col-sm-6 fw-bold">PROMEDIO NIVEL MEDIO SUPERIOR:</div>
                    <div class="col fw-normal">0.00</div>
                </div>
                <div class="text-sm-center p-3 ">
                    <a href="#" class="btn btn-primary">Modificar</a>
                </div>
            </div>
            <div class="tab-pane fade" id="tutor" role="tabpanel" aria-labelledby="tutor-tab">
                <div class="row" style="text-indent: 30px;">
                    <div class="col-6 col-sm-5 fw-bold">NOMBRE DEL TUTOR:</div>
                    <div class="col fw-normal"></div>
                    <div class="w-100"></div>
                    <div class="col-6 col-sm-5 fw-bold">RFC DEL TUTOR:</div>
                    <div class="col fw-normal">XXXX999999</div>
                    <div class="w-100"></div>
                    <div class="col-6 col-sm-5 fw-bold">NOMBRE DEL PADRE:</div>
                    <div class="col fw-normal">SIN ESPECIFICAR</div>
                    <div class="w-100"></div>
                    <div class="col-6 col-sm-5 fw-bold">NOMBRE DE LA MADRE:</div>
                    <div class="col fw-normal">SIN ESPECIFICAR</div>
                </div>
                <div class="text-sm-center p-3 ">
                    <a href="#" class="btn btn-primary">Modificar</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>