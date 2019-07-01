
<div class="row">
    <div class="col-md-12">
        <h1>Beasiswa Pascasarjana</h1>
        <hr/>
                    <?php
                        if($this->session->flashdata('message_alert')){
                            echo $this->session->flashdata('message_alert');
                        }
                    ?>
    </div>
</div>
<div class="row">
    <?php
        if($this->session->userdata('user_type_id')==FALSE){
    ?>
    <form class="form-horizontal" role="form" method="POST" action="">
        <div class="form-group">
            <div class="col-md-6">
                <span class="float-md-right kotak float-kanan">
                    <h4 class="text-center">Daftar Akun</h4>
                    <br/>
                    <table>
                        <tr>
                            <td><label style="padding: 20px">Nama Lengkap</label></td>
                            <td style="width: 15px">:</td>
                            <td><input style="width: 280px; margin-right: 20px" type="text" name="nama_lengkap" id="nama_lengkap" required="required" placeholder="Nama Lengkap"></td>
                        </tr>
                        <tr>
                            <td><label style="padding: 20px">Jenis Kelamin</label></td>
                            <td>:</td>
                            <td>
                                <label class="radio-inline">
                                    <input type="radio" name="jenis_kelamin" id="jenis_kelamin1" value="1"> Laki-laki 
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="jenis_kelamin" id="jenis_kelamin2" value="2"> Perempuan
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td><label style="padding: 20px">No. Ijazah</label></td>
                            <td>:</td>
                            <td><input style="width: 280px" type="text" name="no_ijazah" id="no_ijazah" required="required" placeholder="Nomor Ijazah Universitas S1"></td>
                        </tr>
                        <tr>
                            <td><label style="padding: 20px">email</label></td>
                            <td>:</td>
                            <td><input style="width: 280px" type="text" name="email" id="email" required="required" placeholder="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"></td>
                        </tr>
                        <tr>
                            <td><label style="padding: 20px">username</label></td>
                            <td>:</td>
                            <td><input style="width: 280px" type="text" name="username" id="username" required="required" placeholder="username"></td>
                        </tr>
                        <tr>
                            <td><label style="padding: 20px">password</label></td>
                            <td>:</td>
                            <td><input style="width: 280px"type="text" name="password" id="password" required="required" placeholder="password"></td>
                        </tr>
                    </table>
                    <!-- <td style="width:10%;text-align:center;padding:10px;"> -->
                    <br/>
                    <div style="padding-left: 155px">
                        <!-- <button style="padding-left: 30px; padding-right: 30px; background-color: #1485CC; color: white" id="add_alasan_request" class="btn btn-default">Daftar</button> -->
                        <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Daftar">
                    </div>
                </span>
            </div>
        </div>
    </form>
    <?php
        }
    ?>
</div>
<?php
    if($this->session->userdata('user_type_id') == '1' OR $this->session->userdata('user_type_id') == '2' OR $this->session->userdata('user_type_id') == '3')
?>
<!-- <div class="content-wrapper"> -->
<section class="content">  <!-- Info boxes -->
  <div class="row">
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="info-box">
        <a href="<?php echo base_url();?>peserta"><span class="info-box-icon bg-aqua"><i class="fa fa-inbox"></i></span></a>
        <div class="info-box-content">
          <span class="info-box-text">Jumlah Peserta beasiswa</span>
          <span class="info-box-number"><?php echo $count;?> Peserta</span>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box -->
    </div><!-- /.col -->
    <div class="col-md-4 col-sm-5 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="fa fa-bookmark"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Peserta beasiswa diterima</span>
          <span class="info-box-number"><?php echo $diterima;?> Peserta</span>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box -->
    </div><!-- /.col -->
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-users"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Peserta beasiswa ditolak</span>
          <span class="info-box-number"><?php echo $ditolak;?> Peserta</span>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box -->
    </div><!-- /.col -->
    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>
  </div><!-- /.row -->
</section><!-- /.content -->
    <!-- </div> -->
<div class="row">
    <div class="col-md-6">
        Informasi terkait beasiswa pascasarjana<br/>
        link jenis beasiswa<br/>
        link program studi<br/>
        <br/>
        <!-- Pascasarjana Universitas Diponegoro<br/> -->
        <?php echo validation_errors();
        ?>
    </div>
</div>
<style type="text/css">
    input[type=text]{
        border: none;
        border-bottom: 2px solid orange;
        color: black;
        padding-top: 5px;
        padding-bottom: 5px;
        padding-left: 5px;
    }
</style>