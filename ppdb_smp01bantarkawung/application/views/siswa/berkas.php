<style>
  #tbl_input {
    width: 50px;
    text-align: center;
  }

  #tbl_input2 {
    width: 100px;
    text-align: center;
  }

  #th_center>th {
    text-align: center;
  }

  #containerBtnUpload {
    background-color: #C5DFF8;
    transition: background-color 0.3s ease;
    /* Add smooth transition effect */

  }

  #containerBtnUpload:hover {
    background-color: #7895CB;
    /* Change to your desired hover color */
  }
</style>

<?php
error_reporting(0);
$user = $user; ?>
<!-- pop up modal  -->
<!-- Modal SKHUN-->
<div class="modal fade" id="modal_skhun" tabindex="-1" role="dialog" aria-labelledby="#modal_skhun" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Upload Berkas SKHUN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <fieldset class="content-group">
          <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
            <div class="mb-3 form-group">
              <label for="file_skhun" class="form-label">Berkas SKHUN</label>
              <input type="file" class="form-control" id="file_skhun" name="file_skhun">
            </div>
            <div class="mb-3 form-group">
              <label for="file_skhun" class="form-label">Berkas Raport</label>
              <input type="file" class="form-control" id="file_raport" name="file_raport">
            </div>
            <div class="mb-3 form-group">
              <label for="no_skhun" class="form-label">SKHUN</label>
              <input class="form-control" type="text" placeholder="Nomor SKHUN" name="no_skhun">
              <input class="form-control d-none" value="<?php echo $user->no_pendaftaran; ?>" type="text"
                name="no_pendaftaran">
              <input class="form-control d-none" type="text" value="<?php echo $user->nama_lengkap; ?>"
                name="nama_siswa">

            </div>
            <div class="mb-3 mt-3">
              <input type="submit" class="btn btn-info" value="Upload" name="btnSkhun" />
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </form>
        </fieldset>
      </div>
    </div>
  </div>
</div>
<!-- Modal Keluarga-->
<div class="modal fade" id="modal_keluarga" tabindex="-1" role="dialog" aria-labelledby="#modal_keluarga"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Upload Berkas Berkas Keluarga</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <fieldset class="content-group">
          <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
            <div class="mb-3 form-group">
              <label for="file_kk" class="form-label">Berkas Kartu Keluarga</label>
              <input type="file" class="form-control" id="file_kk" name="file_kk">
            </div>
            <div class="mb-3 form-group">
              <label for="file_akte" class="form-label">Berkas Akte Kelahiran</label>
              <input type="file" class="form-control" id="file_akte" name="file_akte">
            </div>
            <div class="mb-3 form-group">
              <label for="no_kk" class="form-label">Nomor Kartu Keluarga</label>
              <input class="form-control" type="text" placeholder="Nomor Kartu keluarga" name="no_kk"
                value="<?php echo ucwords($user->no_kk); ?>">
              <input class="form-control d-none" value="<?php echo $user->no_pendaftaran; ?>" type="text"
                name="no_pendaftaran">
              <input class="form-control d-none" type="text" value="<?php echo $user->nama_lengkap; ?>"
                name="nama_siswa">

            </div>
            <div class="mb-3 mt-3">
              <input type="submit" class="btn btn-info" value="Upload" name="btnKeluarga" />
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </form>
        </fieldset>
      </div>
    </div>
  </div>
</div>
<!-- Modal Prestasi-->
<div class="modal fade" id="modal_prestasi" tabindex="-1" role="dialog" aria-labelledby="#modal_prestasi"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Upload Berkas Prestasi/Lomba</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <fieldset class="content-group">
          <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
            <div class="mb-3 form-group">
              <label for="file_sertifikat" class="form-label">File Sertifikat</label>
              <input type="file" class="form-control" id="file_sertifikat" name="file_sertifikat">
            </div>
            <div class="mb-3 form-group">


              <label for="prestasi" class="form-label">Nama Prestasi</label>
              <input class="form-control mb-3" type="text" placeholder="Nama Prestasi" name="prestasi">

              <div class="col-sm-12" style="margin-top:3px;">
                <select class="form-control bg-blue class" placeholder="Tingkat kejuaraan wilayah" name="tingkat"
                  data-parsley-group="block4" data-parsley-errors-container='div[id="error-lokasi_sekolah"]'>
                  <option value="">Pilih Tingkat Area Kejuaraan</option>
                  <option value="20">Dalam Desa</option>
                  <option value="40">Dalam Kecamatan</option>
                  <option value="60">Dalam Kabupaten</option>
                  <option value="80">Dalam Provinsi</option>
                  <option value="100">Dalam Negeri</option>
                </select>
                <div id="error-lokasi_sekolah"
                  style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
              </div>
              <input class="form-control d-none" value="<?php echo $user->no_pendaftaran; ?>" type="text"
                name="no_pendaftaran" style="display:none">
              <input class="form-control d-none" type="text" value="<?php echo $user->nama_lengkap; ?>"
                name="nama_siswa" style="display:none">

            </div>
            <div class="mb-3 mt-3">
              <input type="submit" class="btn btn-info" value="Upload" name="btnPrestasi" />
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </form>
        </fieldset>
      </div>
    </div>
  </div>
</div>

<!-- Main content -->
<div class="content-wrapper">

  <!-- Content area -->
  <div class="content">

    <!-- Dashboard content -->
    <div class="row">
      <div class="col-lg-3">
        <!-- Current server load -->
        <center>
          <a data-toggle="modal" data-target="#modal_skhun">
            <div id="containerBtnUpload" class="panel bg-green">
              <div class="panel-body">
                <div class="heading-elements">
                  <span class="heading-text"></span>
                </div>
                <h1 class="no-margin">
                  <i class="icon-file-check2" style="font-size:100px;"></i>
                </h1>
                <br><b>SKHUN</b>
                <br>
              </div>
            </div>
          </a>
        </center>
        <!-- /current server load -->
      </div>

      <div class="col-lg-3">
        <!-- Current server load -->
        <center>
          <a data-toggle="modal" data-target="#modal_keluarga">
            <div id="containerBtnUpload" class="panel bg-teal-300">
              <div class="panel-body">
                <div class="heading-elements">
                  <span class="heading-text"></span>
                </div>
                <h1 class="no-margin">
                  <i class="icon-file-check2" style="font-size:100px;"></i>
                </h1>
                <br><b>KELUARGA</b>
              </div>
            </div>
          </a>
        </center>
        <!-- /current server load -->
      </div>
      <div class="col-lg-3">
        <center>
          <a data-toggle="modal" data-target="#modal_prestasi">
            <div id="containerBtnUpload" class="panel bg-orange-300">
              <div class="panel-body">
                <div class="heading-elements">
                  <span class="heading-text"></span>
                </div>
                <h1 class="no-margin">
                  <i class="icon-file-check2" style="font-size:100px;"></i>
                </h1>
                <br><b>PRESTASI</b>
              </div>
            </div>
          </a>
        </center>
      </div>
      <div class="col-md-3">
        <div class="panel panel-flat">
          <div class="panel-body">
            <center>
              <img src="img/logo.png" alt="<?php echo $user->nama_lengkap; ?>" class="" width="176">
            </center>
            <br>
            <fieldset class="content-group">
              <hr style="margin-top:0px;">
              <b>Tanggal Daftar</b> : <br>
              <?php echo $this->lib_data->tgl_id(date('d-m-Y H:i:s', strtotime($user->tgl_siswa))); ?>
              <hr>
              <b>No. Pendaftaran : </b>
              <?php echo $user->no_pendaftaran; ?>
            </fieldset>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="panel panel-flat">
          <div class="panel-body">
            <fieldset class="content-group">
              <legend class="text-bold"><i class="icon-user"></i> Berkas Sekolah</legend>
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <tr>
                    <th width="20%">Nama Lengkap</th>
                    <th width="1%">:</th>
                    <td>
                      <?php echo ucwords($user->nama_lengkap); ?>
                    </td>
                  </tr>
                  <tr>
                    <th width="20%">Nomor NISN</th>
                    <th width="1%">:</th>
                    <td>
                      <?php echo ucwords($user->nisn); ?>
                    </td>
                  </tr>
                  <tr>
                    <th>SKHUN</th>
                    <th>:</th>
                    <td>
                      <?php if (!isset($user->no_skhun) || $user->no_skhun === null) {
                        echo 'Upload berkas terlebih dahulu';
                      } else {
                        echo $user->no_skhun;
                      } ?>
                    </td>
                  </tr>
                  <tr>
                    <th>Nilai Rata-Rata SKHUN</th>
                    <th>:</th>
                    <td>
                      <?php echo $user->rata_skhun; ?>
                    </td>
                  </tr>
                  <tr>
                    <th>Berkas SKHUN</th>
                    <th>:</th>
                    <td>
                      <?php if (!isset($user->no_skhun) || $user->no_skhun === null) {
                        echo 'Upload berkas terlebih dahulu';
                      } else {
                        echo '<img src="' . base_url() . '/public/files/skhun/' . $user->file_skhun . '" alt="" srcset="" class="img-thumbnail" width="100px">';
                      } ?>
                    </td>
                  </tr>
                  <tr>
                    <th>Nilai Rata-Rata Raport</th>
                    <th>:</th>
                    <td>
                      <?php echo $user->rata_raport; ?>
                    </td>
                  </tr>
                  <tr>
                    <th>Berkas Raport</th>
                    <th>:</th>
                    <td>
                      <?php if (!isset($user->file_raport) || $user->file_raport === null) {
                        echo 'Upload berkas terlebih dahulu';
                      } else {
                        echo '<img src="' . base_url() . '/public/files/skhun/' . $user->file_raport . '" alt="" srcset="" class="img-thumbnail" width="100px">';
                      } ?>
                    </td>
                  </tr>
                </table>
              </div>
            </fieldset>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="panel panel-flat">
          <div class="panel-body">
            <fieldset class="content-group">
              <legend class="text-bold"><i class="icon-user"></i> Berkas Keluarga</legend>
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <tr>
                    <th width="20%">Nama Lengkap</th>
                    <th width="1%">:</th>
                    <td>
                      <?php echo ucwords($user->nama_lengkap); ?>
                    </td>
                  </tr>
                  <tr>
                    <th width="20%">Nomor KK</th>
                    <th width="1%">:</th>
                    <td>
                      <?php echo ucwords($user->no_kk); ?>
                    </td>
                  </tr>
                  <tr>
                    <th>Berkas Kartu Keluarga</th>
                    <th>:</th>
                    <td>
                      <?php if (!isset($user->file_kk) || $user->file_kk === null) {
                        echo 'Upload berkas terlebih dahulu';
                      } else {
                        echo '<img src="' . base_url() . '/public/files/keluarga/' . $user->file_kk . '" alt="" srcset="" class="img-thumbnail" width="100px">';
                      } ?>
                    </td>
                  </tr>
                  <tr>
                    <th>Berkas Akte Kelahiran</th>
                    <th>:</th>
                    <td>
                      <?php if (!isset($user->file_akte) || $user->file_akte === null) {
                        echo 'Upload berkas terlebih dahulu';
                      } else {
                        echo '<img src="' . base_url() . '/public/files/keluarga/' . $user->file_akte . '" alt="" srcset="" class="img-thumbnail" width="100px">';
                      } ?>
                    </td>
                  </tr>
                </table>
              </div>
            </fieldset>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="panel panel-flat">
          <div class="panel-body">
            <fieldset class="content-group">
              <legend class="text-bold"><i class="icon-user"></i>Berkas Prestasi</legend>
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <tr>
                    <th width="20%">Nama Lengkap</th>
                    <th width="1%">:</th>
                    <td>
                      <?php echo ucwords($user->nama_lengkap); ?>
                    </td>
                  </tr>
                  <tr>
                    <th width="20%">Nama Prestasi</th>
                    <th width="1%">:</th>
                    <td>
                      <?php echo ucwords($user->prestasi); ?>
                    </td>
                  </tr>
                  <tr>
                    <th width="20%">Tingkat Prestasi</th>
                    <th width="1%">:</th>
                    <td>
                      <?php echo ucwords($user->tingkat); ?>
                    </td>
                  </tr>
                  <tr>
                    <th>Berkas Prestasi</th>
                    <th>:</th>
                    <td>
                      <?php if (!isset($user->file_sertifikat) || $user->file_sertifikat === null) {
                        echo 'Upload berkas terlebih dahulu';
                      } else {
                        echo '<img src="' . base_url() . '/public/files/prestasi/' . $user->file_sertifikat . '" alt="" srcset="" class="img-thumbnail" width="100px">';
                      } ?>
                    </td>
                  </tr>

                </table>
              </div>
            </fieldset>
          </div>
        </div>
      </div>
    </div>
    <!-- /dashboard content -->