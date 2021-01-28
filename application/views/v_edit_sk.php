<div class="content-wrapper">
    <section class="content">
        <?php foreach ($surat as $srt) { ?>
                <?php echo form_open_multipart('surat/update_sk'); ?>
                    <div class="form-group">
                        <label for="">no surat</label>
                        <input type="hidden" name="id_surat" class="form-control" value="<?php echo $srt->id_surat ?>">
                        <input type="text" name="no_surat" class="form-control" value="<?php echo $srt->no_surat ?>"readonly>
                    </div>
                    <div class="form-group">
                        <label for="">tujuan</label>
                        <input type="text" name="tujuan" class="form-control" value="<?php echo $srt->tujuan ?>">
                    </div>
                    <div class="form-group">
                        <label for="">tgl_surat</label>
                         <input type="date" name="tgl_surat" class="form-control" value="<?php echo $srt->tgl_surat ?>">
                    </div>
                    <div class="form-group">
                        <label for="">tanggal catat</label>
                        <input type="date" name="tgl_catat" class="form-control" value="<?php echo $srt->tgl_catat ?>">
                    </div>
                    <div class="form-group">
                        <label for="">isi</label>
                        <input type="text" name="isi" class="form-control" value="<?php echo $srt->isi ?>">
                    </div>
                    <div class="form-group">
                        <label for="">file</label>
                        <input type="file" name="file" class="form-control" value="<?php echo $srt->file ?>">
                    </div>
                    <a href="<?php echo base_url('surat/surat_keluar');?>" class="btn btn-danger">Reset</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                <?php echo form_close(); ?>


        <?php } ?>
    </section>
</div>