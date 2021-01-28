<div class="content-wrapper">
    <section class="conten-header" align="Center" style="font-family:times new roman">
        <h1>Surat Keluar</h1>
    </section>
    <section class="content">
        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-plus"> Tambah Surat Keluar</i>
        </button>
        <hr>
        <div class="navbar-form navbar-right">
            <?php echo form_open('surat/searchsk') ?>
            <input type="text" name="keyword"  placeholder="Search">
            <button type="submit" class="btn btn-secondary"> cari</button>
            <?php echo form_close() ?>
        </div>
        <table class="table">
                <tr>
                    <th>Nomor</th>
                    <th>Nomor Nurat</th>
                    <th>Tujuan</th>
                    <th>Tanggal Surat</th>
                    <th>Tanggal Catat</th>
                    <th>Isi Ringkas</th>
                    <th colspan="4">Aksi</th>
                </tr>
            <?php
            $no=1;
            foreach ($surat as $srt) : ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $srt->no_surat ?></td>
                    <td><?php echo $srt->tujuan ?></td>
                    <td><?php echo $srt->tgl_surat ?></td>
                    <td><?php echo $srt->tgl_catat ?></td>
                    <td><?php echo $srt->isi ?></td>
                    <td onclick="javascript: return confirm('anda yakin akan menghapus?')"><?php echo anchor('surat/hapus_sk/'.$srt->id_surat,'<div class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></div>') ?> </td>
                    <td><?php echo anchor('surat/edit_sk/'.$srt->id_surat,'<div class="btn btn-success btn-sm"><i class="fa fa-edit"></i></div>')?></td>
                    <td><?php echo anchor('surat/detail_sk/'.$srt->id_surat,'<div class="btn btn-info btn-sm"><i class="fa fa-search-plus"></i></div>')?></td>
                    <td><?php echo anchor('surat/print_sk/'.$srt->id_surat,'<div class="btn btn-warning btn-sm"><i class="fa fa-print"></i></div>')?></td>
                    <!-- <td><div class="btn btn-danger btn-sm"><i class="fa fa-file"></i></div></td>
                </tr> -->
            <?php endforeach; ?>
        </table>
    </section>
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Input Surat Keluar</h5>
                    <button type="button" class="btn btn-close-fill" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <?php echo validation_errors(); ?>
                <div class="modal-body">
                    <?php echo form_open_multipart('surat/tambah_sk'); ?>
                        <div class="form-group">
                            <label for="">No Surat</label>
                            <input type="text" name="no_surat" class="form-control" value="SK/"> 
                        </div>
                        <div class="form-group">
                            <label for="">tujuan</label>
                            <input type="text" name="tujuan" class="form-control">
                            <!-- <select name="tujuan" id="">
                                <option value="">-Pilih-</option>
                                <option value=""><?php foreach( $query as $bag) : ?>
                                    <?php echo $bag->nama_bagian ?>
                                <?php endforeach; ?>
                                </option>
                            </select> -->
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Surat</label>
                            <input type="date" name="tgl_surat" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Catat</label>
                            <input type="date" name="tgl_catat" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Isi Ringkas</label>
                            <input type="text" name="isi" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">File</label>
                            <input type="file" name="file" class="form-control">
                        </div>
                        <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                        
                    
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>