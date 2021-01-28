<div class="content-wrapper">
    <section class="content">
    <br>
        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-plus"> Tambah bagian</i>
        </button>
        <br>
        <br>
       <table class="table">
            <tr>
                <th>No</th>
                <th>nama bagian</th>
            </tr>
            <?php 
            $no = 1;
            foreach ($bagian as $bag) : ?>
            <tr>
                <th><?php echo $no++ ; ?> </th>
                <td><?php echo $bag->nama_bagian; ?> </td>
            </tr>
            <?php endforeach; ?>
        </table>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Input bagian</h5>
                        <button type="button" class="btn btn-close-fill" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <?php echo validation_errors(); ?>
                       <form method="post" action="<?php echo base_url().'surat/tambah_bagian';?>">
                            <div class="form-group">
                                <label for="">nama bagian</label>
                                <select name="nama_bagian" id="" class="form-control">
                                    <option value="kepala desa">kepala desa</option>
                                    <option value="bendahara">bendahara</option>
                                    <option value="sekretaris">sekretaris</option>
                                    <option value="kaur umum">kaur umum</option>
                                </select>
                            </div>
                            <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>