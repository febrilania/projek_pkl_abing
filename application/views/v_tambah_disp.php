<div class="content-wrapper">
    <section class="content">

        <form action="<?php echo base_url().'surat/tambah_disposisi'; ?>" method ="post">
            <div class="form-group">
                <label for="">id_surat</label>
                <input type="text" name="id_surat" class="form-control" required="">
            </div>
            <div class="form-group">
                <label for="">Tujuan</label>
                <input type="text" name="tujuan" class="form-control" required="">
            </div>
            <div class="form-group">
                <label for="">Isi Disposisi</label>
                <input type="textarea" name="isi_disposisi" class="form-control" required="">
            </div>
            <div class="form-group">
                <label for="">Sifat</label>
                <select name="sifat" id="" class="form-control">
                    <option value="sangat penting" class="form-control">Sangat Penting</option>
                    <option value="penting" class="form-control">Penting</option>
                    <option value="biasa" class="form-control">Biasa</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Batas Waktu</label>
                <input type="date" name="batas_waktu" class="form-control" required="">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </form>

    </section>
</div>