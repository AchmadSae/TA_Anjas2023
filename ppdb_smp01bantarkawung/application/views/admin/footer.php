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
      Copyright &copy;
      <?php echo date('Y'); ?> <a href="" class="navbar-link">
        <?php echo $id['nama_lengkap']; ?>
      </a>
    </div>
  </div>
</div>
<!-- /footer -->
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
  function alert_smart_start() {
    Swal.fire({
      title: 'MEMULAI SMART METODE?',
      text: "SMART METODE akan dilakukan, pastikan menutup pendaftaran setelah aksi ini !",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Mulai !!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "<?php echo base_url('Panel_admin/start_smart'); ?>";
      }
    })
  }

  function alert_smart_reset() {
    Swal.fire({
      title: 'RESET SMART METODE?',
      text: "SMART METODE akan direset, pastikan menutup pendaftaran setelah aksi ini !",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Mulai !!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "<?php echo base_url('Panel_admin/reset_smart'); ?>";
      }
    })
  }

  function start_pendaftaran() {
    Swal.fire({
      title: 'BUKA PENDAFTARAN ?',
      text: "Pendaftaran akan dibuka, periksa pengaturan antar muka pendaftaran terlebih dahulu!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Mulai !!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "<?php echo base_url('Panel_admin/start_pendaftaran'); ?>";
      }
    })
  }

  function stop_pendaftaran() {
    Swal.fire({
      title: 'TUTUP PENDAFTARAN ?',
      text: "Pendaftaran akan ditutup, pastikan sudah melakukan SMART Metode terlebih dahulu !",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Mulai !!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "<?php echo base_url('Panel_admin/stop_pendaftaran'); ?>";
      }
    })
  }

</script>
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