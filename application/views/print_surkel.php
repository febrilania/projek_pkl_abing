<div class="content-wrapper">
    <div class="content">
        <body  onload="window.print()">
            <div class="tengah" style="text-align:center;">
            <h4><strong>Print surat masuk</strong></h4>
                <h5>aplikasi surat menyurat desa pagojengan</h5>
                <h5>kecamatan paguyangan</h5>
                <h5>kabupaten brebes</h5>
                <p>jl.raya pangeran diponegoro desa pagojengan,kecamatan paguyangan,kabupaten brebes, provinsi jawa tengah, kode pos: 52276</p>
                </div>
                <hr>
                
            <table class="" cellpadding="20" width="100%" border="1">

                    <tr>
                        <th>no surat</th>
                        <td><?php echo $cetak->no_surat; ?></td>
                    </tr>
                    <tr>
                        <th>tujuan</th>
                        <td><?php echo $cetak->tujuan; ?></td>
                    </tr>
                    <tr>
                        <th>isi Ringkas</th>
                        <td><?php echo $cetak->isi; ?></td>
                    </tr>
                    <tr>
                        <th>tanggal surat</th>
                        <td><?php echo $cetak->tgl_surat; ?></td>
                    </tr>
                    <tr>
                        <th>tanggal diterima</th>
                        <td><?php echo $cetak->tgl_catat; ?></td>
                    </tr>
               
            </table>
            <div style="height:8;float:right;margin-right:20"><p>kepala desa</p></div><br>
            <div style="height:50;float:right;padding-top:90;margin-right:20">suid nurohman</div>
        </body>
    </div>
</div>