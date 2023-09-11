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
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="modal_keluarga"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Upload Berkas Keluarga</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="post" action="<?= base_url(); ?>/berkas/save" enctype="multipart/form-data">


          <div class="mb-3">
            <label for="fike_kk" class="form-label">Berkas Kartu Keluarga</label>
            <input type="file" class="form-control" id="file_kk" name="file_kk">
          </div>
          <div class="mb-3">
            <label for="file_akte" class="form-label">Berkas Akte</label>
            <input type="file" class="form-control" id="file_akte" name="file_akte">
            <input class="form-control d-none" value="" type="text" name="no_pendaftaran">
            <input class="form-control" type="text" value="" name="nama_siswa">
            <input class="form-control" type="text" value="" name="no_kk">

          </div>

          <div class="mb-3">
            <input type="submit" class="btn btn-info" value="Upload" />
          </div>
        </form>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="button" class="btn btn-primary">Save changes</button>
    </div>
  </div>
</div>
<!-- Modal Prestasi-->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="modal_prestasi"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Upload Prestasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="post" action="<?= base_url(); ?>/berkas/save" enctype="multipart/form-data">

          <div class="mb-3">
            <label for="file_sertifikat" class="form-label">Berkas Sertifikat</label>
            <input type="file" class="form-control" id="file_sertifikat" name="file_sertifikat">
          </div>
          <div class="mb-3">
            <label for="prestasi" class="form-label">Nama Kejuaraan</label>
            <input class="form-control" type="text" placeholder="Nama prestasi yang dicapai" name="prestasi">
          </div>
          <div class="mb-3">
            <label for="tingkat" class="form-label">SKHUN</label>
            <input class="form-control" type="text" placeholder="tingkat kejuaraan berdasarkan wilayah" name="tingkat">
            <input class="form-control d-none" value="" type="text" name="no_pendaftaran">
          </div>
          <div class="mb-3">
            <input type="submit" class="btn btn-info" value="Upload" />
          </div>
        </form>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="button" class="btn btn-primary">Save changes</button>
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
            <div class="panel bg-green">
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
          <a data-toggle="modal" data-target="modal_keluarga">
            <div class="panel bg-teal-400">
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
          <a data-toggle="modal" data-target="modal_prestasi">
            <div class="panel bg-orange-400">
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
                      <?php if ($user->no_skhun == null) {
                        echo 'upload berkas terlebih dahulu';
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
                      <?php if ($user->no_skhun == null) {
                        echo 'upload berkas terlebih dahulu';
                      } else {
                        echo $user - file_skhun;
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
                      <?php if ($user->no_skhun == null) {
                        echo 'upload berkas terlebih dahulu';
                      } else {
                        echo $user->file_skhun;
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
                      <?php if ($user->no_skhun == null) {
                        echo 'upload berkas terlebih dahulu';
                      } else {
                        echo $user->file_kk;
                      } ?>
                    </td>
                  </tr>
                  <tr>
                    <th>Berkas Akte Kelahiran</th>
                    <th>:</th>
                    <td>
                      <?php if ($user->no_skhun == null) {
                        echo 'upload berkas terlebih dahulu';
                      } else {
                        echo $user->file_akte;
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
                    <th>Berkas Prestasi</th>
                    <th>:</th>
                    <td>
                      <?php if ($user->no_skhun == null) {
                        echo 'upload berkas terlebih dahulu';
                      } else {
                        echo $user->file_sertifikat;
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