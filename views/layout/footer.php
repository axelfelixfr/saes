</section>
<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
        <div class="text-center small">
            <div class="text-muted">Copyright &copy; SAES
                <?php echo date("Y") ?>
                <a href="https://www.ipn.mx/" target="_blank" class="fw-bold text-decoration-none text-muted">Instituto Politécnico Nacional</a>
            </div>
        </div>
        <!-- <div class="text-end">
    <a href="https://www.ipn.mx/" target="_blank">IPN</a>
    &middot;
    <a href="https://www.dae.ipn.mx/" target="_blank">IPN-DAE</a>
</div> -->
    </div>
</footer>
<script type="text/javascript" src="<?=base_url?>assets/js/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="<?=base_url?>assets/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="<?=base_url?>assets/js/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="<?=base_url?>assets/js/ajax.js"></script>
<script type="text/javascript" src="<?=base_url?>assets/js/validator.min.js"></script>
<script type="text/javascript" src="<?=base_url?>assets/js/toastr.min.js"></script>
<script type="text/javascript" src="<?=base_url?>assets/js/bootstrap-validate.js"></script>
<script type="text/javascript" src="<?=base_url?>assets/js/main.js"></script>
<script type="text/javascript">
$(document).ready(() => {
    const displayToast = $('div[data-function="handleShowToast"]');
    if (displayToast.length != 0) {
        let showToast = displayToast[0].dataset.boolean;
        if (showToast) {
            toastr.error(displayToast[0].outerText, 'Error');
            $('#errorLogin').attr("data-boolean", false);
        }
    }
});
</script>
</body>

</html>