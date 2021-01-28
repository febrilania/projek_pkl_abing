<div class="content-wrapper">
    <div class="content">
        <h4><strong>detail surat masuk</strong></h4>
        <table class="table">
            <tr>
                <th>no surat</td>
                <td><?php echo $detail->no_surat; ?></td>
            </tr>
            <tr>
                <th>asal surat</td>
                <td><?php echo $detail->asal_surat; ?></td>
            </tr>
            <tr>
                <th>isi</td>
                <td><?php echo $detail->isi; ?></td>
            </tr>
            <tr>
                <th>tanggal surat</td>
                <td><?php echo $detail->tgl_surat; ?></td>
            </tr>
            <tr>
                <th>tanggal diterima</td>
                <td><?php echo $detail->tgl_diterima; ?></td>
            </tr>
            <tr>
                <th>file</td>
                <td><?php echo $detail->file; ?></td>
            </tr>
        </table>
        <a href="<?php echo base_url('surat/surat_masuk');?>" class="btn btn-primary">kembali</a>
    </div>
</div>