<script>
	const base_url = "<?= base_url(); ?>";
</script>
<!-- Essential javascripts for application to work-->
<script src="<?= media(); ?>/js/jquery-3.3.1.min.js"></script>
<script src="<?= media(); ?>/js/popper.min.js"></script>
<script src="<?= media(); ?>/js/bootstrap.min.js"></script>
<script src="<?= media(); ?>/js/main.js"></script>
<script src="<?= media();?>/js/fontawesome.js"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="<?= media(); ?>/js/plugins/pace.min.js"></script>
<!-- Page specific javascripts-->
<script type="text/javascript" src="<?= media(); ?>/js/plugins/sweetalert.min.js"></script>

<!-- Data table plugin-->
<script type="text/javascript" src="<?= media(); ?>/js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?= media(); ?>/js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?= media();?>/js/plugins/bootstrap-select.min.js"></script>
<script type="text/javascript" language="javascript" src="<?= media(); ?>/js/plugins/js5.js"></script>
<script type="text/javascript" language="javascript" src="<?= media(); ?>/js/plugins/js1.js"></script>
<script type="text/javascript" language="javascript" src="<?= media(); ?>/js/plugins/js2.js"></script>
<script type="text/javascript" language="javascript" src="<?= media(); ?>/js/plugins/js3.js"></script>
<script type="text/javascript" language="javascript" src="<?= media(); ?>/js/plugins/js4.js"></script>

<script type="text/javascript" src="<?= media();?>/js/functions_admin.js"></script>
<script src="<?= media(); ?>/js/<?= $data['page_functions_js']; ?>"></script>


    <!--Captura del codigo QR-->
    <script>
    function enviar_texto() {
        $.ajax({
          url: "<?= base_url(); ?>/qrcode/Gen/generarqr.php",
          type: "POST",
          data: "texto="+document.getElementById("texto_usuario").value,
          success: function(resp){
            datos= JSON.parse(resp);
            //alert(datos.mensaje);
            $("#cont_img").html("<img src='<?= base_url(); ?>/qrcode/Gen/"+datos.datos+"'>")
          }
        })
      }
    </script>

</body>
</html>