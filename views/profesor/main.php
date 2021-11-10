Bienvenido profesor(a) <p>
    <?= $_SESSION['identity']->nombre ?>
    <?= $_SESSION['identity']->apellidos ?>
</p>
<a href="<?= base_url ?>user/logout">Cerrar sesión aquí</a>