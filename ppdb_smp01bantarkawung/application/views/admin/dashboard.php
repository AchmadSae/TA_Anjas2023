<?php
$cek = $user;
$id_user = $cek->id_user;
$nama = $cek->nama_lengkap;
$level = $cek->level;

$tgl = date('m-Y');
?>
<style>
  #alert_ppdb {
    display: flex;
    flex-direction: column;
    justify-content: center;
    /* Mengatur elemen secara vertikal ke tengah */
    align-items: center;
    /* Mengatur elemen secara horizontal ke tengah */
  }
</style>
<!-- Main content -->
<div class="content-wrapper">
  <!-- Content area -->
  <div class="content">

    <!-- Dashboard content -->
    <div class="row">
      <!-- Basic datatable -->
      <div class="panel panel-success">
        <div class="panel-heading" style="background-color:#4A55A2;">
          <h3 class="panel-title">
            <i class="glyphicon glyphicon-send"></i> <b>DASHBOARD</b>
          </h3>
        </div>
        <div class="panel-body">
          <left>Selamat Datang,
            <?php echo ucwords($nama); ?>
          </left>
        </div>
      </div>
      <!-- /basic datatable -->

      <div class="row">
        <div class="col-lg-12">

          <!-- Quick stats boxes -->
          <div class="row">
            <div class="col-lg-4">
              <!-- Current server load -->
              <div class="panel bg-teal-400">
                <div class="panel-body">
                  <div class="heading-elements">
                    <span class="heading-text"></span>
                  </div>
                  <h3 class="no-margin">
                    <?php
                    $thn_ini = date('Y');
                    $this->db->like('tgl_siswa', $thn_ini, 'after');
                    echo number_format($this->db->get('tbl_siswa')->num_rows(), 0, ",", "."); ?>
                  </h3>
                  JUMLAH PENDAFTAR
                </div>
              </div>
              <!-- /current server load -->
            </div>

            <div class="col-lg-4">
              <!-- Current server load -->
              <div class="panel bg-orange-400">
                <div class="panel-body">
                  <div class="heading-elements">
                    <span class="heading-text"></span>
                  </div>
                  <h3 class="no-margin">
                    <?php
                    $this->db->like('tgl_siswa', $thn_ini, 'after');
                    echo number_format($this->db->get_where('tbl_siswa', "status_pendaftaran='lulus'")->num_rows(), 0, ",", "."); ?>
                  </h3>
                  TOTAL LULUS PPDB
                </div>
              </div>
              <!-- /current server load -->
            </div>

            <div class="col-lg-4">
              <!-- Current server load -->
              <div class="panel bg-green">
                <div class="panel-body">
                  <div class="heading-elements">
                    <span class="heading-text"></span>
                  </div>
                  <h3 class="no-margin">
                    <?php
                    $this->db->like('tgl_siswa', $thn_ini, 'after');
                    echo number_format($this->db->get_where('tbl_siswa', "status_pendaftaran='tdk_lulus'")->num_rows(), 0, ",", "."); ?>
                  </h3>
                  TOTAL TIDAK LULUS PPDB
                  <?php echo $thn_ini; ?>
                </div>
              </div>
              <!-- /current server load -->
            </div>

          </div>
          <!-- /quick stats boxes -->


        </div>

      </div>

      <?php if ($web_ppdb->status_ppdb == 'buka') { ?>
        <div class="row">
          <div class="alert alert-info alert-dismissible col-md-12" role="alert" id="alert_ppdb">

            <button type="submit" name="btnnonaktif" class="btn-warning" onclick="stop_pendaftaran()">
              <div class="button-content">
                <img class="button-icon" src="img/btn-off.png" alt="off">
              </div>
            </button>

            <h2>Status Pendaftaran PPDB Online telah BUKA. <i>Klik untuk menutup Pendaftaran</i> !</h2> <br> Terakhir
            diubah
            <?php echo date('d-m-Y H:i:s', strtotime($web_ppdb->tgl_diubah)); ?>.
          </div>
        </div>
        <div class="row">
          <div class="alert alert-info alert-dismissible col-md-6" role="alert" id="alert_ppdb">
            <button type="submit" name="btnStartVerifSmart" class="btn btn-primary" onclick="alert_smart_start()"><i
                class="icon-laptop"></i> MULAI SMART VERIFICATION</button>
          </div>
          <div class="alert alert-info alert-dismissible col-md-6" role="alert" id="alert_ppdb">

            <button type="submit" name="btnResetSmart" class="btn btn-primary" onclick="alert_smart_reset()"><i
                class="icon-reset"></i> RESET METODE SMART</button>

          </div>
        </div>
      <?php } else { ?>
        <div class="row">
          <div class="alert alert-warning alert-dismissible col-md-12" role="alert" id="alert_ppdb">

            <button type="submit" name="btnaktif" class="btn btn-success" onclick="start_pendaftaran()">
              <div class="button-content">
                <img class="button-icon" src="img/btn-on.png" alt="off">
              </div>
            </button>

            <h2>Status Pendaftaran PPDB Online telah TUTUP. <i>Klik untuk membuka Pendaftaran</i> !</h2> <br> Terakhir
            diubah
            <?php echo date('d-m-Y H:i:s', strtotime($web_ppdb->tgl_diubah)); ?>.
          </div>
        </div>
      <?php } ?>

    </div>
    <!-- /dashboard content -->