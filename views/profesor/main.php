Bienvenido profesor(a) <p>
    <?= $_SESSION['identity']->general->nombre ?>
    <?= $_SESSION['identity']->general->apellidos ?>
</p>
<a href="<?= base_url ?>user/logout">Cerrar sesión aquí</a>