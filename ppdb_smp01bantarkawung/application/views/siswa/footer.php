<?php
defined('BASEPATH') or exit('No direct script access allowed');
$id = $this->db->get('tbl_user')->row_array();
?>
</div>
</div>
<!-- /main content -->
</div>
<!-- /page content -->
</div>
<!-- /page container -->
<!-- Footer -->
<div class="navbar navbar-default navbar-fixed-bottom footer" style="background-color:#4A55A2;">
  <ul class="nav navbar-nav visible-xs-block">
    <li><a class="text-center collapsed" data-toggle="collapse" data-target="#footer"><i
          class="icon-circle-up2"></i></a></li>
  </ul>
  <div class="navbar-collapse collapse" id="footer">
    <div class="navbar-text" style="color: ivory;">
      <label class="label label-danger" style="margin-bottom: -10px;">
        <?php echo $id['nama_lengkap']; ?>
      </label> Copyright &copy;
      <?php echo date('Y'); ?>
    </div>
  </div>
</div>
<script type="text/javascript" src="assets/panel/js/sweetalert2.all.min.js"></script>
<script>
  var swal_icon = "<?php echo $this->session->flashdata('swal_icon'); ?>";
  var swal_title = "<?php echo $this->session->flashdata('swal_title'); ?>";
  var swal_text = "<?php echo $this->session->flashdata('swal_text'); ?>";

  // Memeriksa apakah session flash data tersedia
  if (swal_icon && swal_title && swal_text) {
    Swal.fire({
      icon: swal_icon,
      title: swal_title,
      text: swal_text
    });
  }
  function konfirmasi_hapus_berkas() {
    Swal.fire({
      title: 'HAPUS BERKAS ?',
      text: "Berkas SKHUN, RAPORT, KK, SERTIFIKAT akan terhapus",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Hapus !!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "<?php echo base_url('Panel_siswa/hapus_berkas'); ?>";
      }
    })
  }

</script>







<!-- /footer -->
<script type="text/javascript">
  function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
      return false;
    return true;
  }
</script>
</body>

</html>