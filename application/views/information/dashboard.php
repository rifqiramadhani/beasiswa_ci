<?php
   if($this->session->userdata('user_type_id')=='1'){
?>
<div class="row">
    <div class="col-md-12">
        <h1>Sistem Informasi Absensi Kepegawaian</h1>
        <hr/>
        Informasi terbaru Absensi Kepegawaian<br/>
        Pascasarjana Universitas Diponegoro
        <?php echo validation_errors();

        // echo $ym;
        // echo var_dump($ym);

        ?>
    </div>
</div>
<div class="row">
    <?php ?>
    <div class="col-md-4">
        <h3><a href="?ym=<?php echo $prev; ?>">&lt;</a><?php echo $html_title; ?> <a href="?ym=<?php echo $next; ?>">&gt;</a></h3>
        <br>
        <table class="table table-bordered dashboard th_custom">
            <tr>
                <th class="th_custom" width="30px">Minggu</th>
                <th class="th_custom" width="30px">Senin</th>
                <th class="th_custom" width="30px">Selasa</th>
                <th class="th_custom" width="30px">Rabu</th>
                <th class="th_custom" width="30px">Kamis</th>
                <th class="th_custom" width="30px">Jum'at</th>
                <th class="th_custom" width="30px">Sabtu</th>
            </tr>
            <?php
                foreach ($weeks as $week) {
                    echo $week;
                }   
            ?>
        </table>
    </div>
</div>
<?php }
else{?>
    <h3>Silahkan login sebagai admin terlebih dahulu</h3>
<?php }?>