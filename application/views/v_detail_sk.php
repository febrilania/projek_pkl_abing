<div class="content-wrapper">
    <div class="content">
        <h4><strong>detail surat keluar</strong></h4>
        <table class="table">
            <tr>
                <th>no surat</td>
                <td><?php echo $detail->no_surat; ?></td>
            </tr>
            <tr>
                <th>tujuan</td>
                <td><?php echo $detail->tujuan; ?></td>
            </tr>
            <tr>
                <th>tanggal surat</td>
                <td><?php echo $detail->tgl_surat; ?></td>
            </tr>
            <tr>
                <th>tanggal catat</td>
                <td><?php echo $detail->tgl_catat; ?></td>
            </tr>
            <tr>
                <th>isi</td>
                <td><?php echo $detail->isi; ?></td>
            </tr>
            <tr>
                <th>file</td>
                <td><?php echo $detail->file; ?></td>
            </tr>
        </table>
        <a href="<?php echo base_url('surat/surat_keluar');?>" class="btn btn-primary">kembali</a>
    </div>
</div>