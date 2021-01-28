<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <div class = content-wrapper>
        <section class = content>
            <div class="row">
                <div class="form-group col-md-4">
                <br>
                    <label for="">form filter by tanggal</label> 
                    <hr>
                    <form action="<?php echo base_url() .'surat/filtersk';?>" method="post" target='_blank'>
                        <input type="hidden" name="nilaifilter" value="1">
                            <label for="">tanggal awal</label>
                        <input type="date" name="tanggalawal" required="" class="form-control">
                            <label for="">tanggal akhir</label>
                        <input type="date" name="tanggalakhir" required="" class="form-control">
                        <br>
                        <input type="submit" value="print" class="btn btn-primary">
                    </form>
                </div>
                <div class="form-group col-md-4">
                <br>
                    <label for="">form filter by bulan</label> 
                    <hr>
                    <form action="<?php echo base_url().'surat/filtersk';?>" method="post" target='_blank'>
                        <input type="hidden" name="nilaifilter" value="2">
                            <label for="">pilih tahun</label> 
                        <select name="tahun1" required="" class="form-control">
                            <?php foreach ($tahun as $thn) :?>
                            <option value="<?php echo $thn->tahun  ?>"><?php echo $thn->tahun  ?></option>
                            <?php endforeach; ?>
                        </select>
                        <label for="">bulan awal</label>
                        <select name="bulanawal" required="" class="form-control">
                            <option value="januari">januari</option>
                            <option value="februari">februari</option>
                            <option value="maret">maret</option>
                            <option value="april">april</option>
                            <option value="mei">mei</option>
                            <option value="juni">juni</option>
                            <option value="juli">juli</option>
                            <option value="agustus">agustus</option>
                            <option value="september">september</option>
                            <option value="oktober">oktober</option>
                            <option value="november">november</option>
                            <option value="desember">desember</option>
                        </select>
                        <label for="">bulan akhir</label>
                        <select name="bulanakhir" required="" class="form-control">
                            <option value="1">januari</option>
                            <option value="2">februari</option>
                            <option value="3">maret</option>
                            <option value="4">april</option>
                            <option value="5">mei</option>
                            <option value="6">juni</option>
                            <option value="7">juli</option>
                            <option value="8">agustus</option>
                            <option value="9">september</option>
                            <option value="10">oktober</option>
                            <option value="11">november</option>
                            <option value="12">desember</option>
                        </select><br>
                        <input type="submit" value="Print" class="btn btn-primary">
                    </form>
                </div>
                <div class="col-md-4">
                <br>
                    <label for="">form filter by tahun</label>
                    <hr>
                    <form action="<?php echo base_url().'surat/filtersk';?>" method="post" target='_blank'>
                        <input type="hidden" name="nilaifilter" value="3">
                            <label for="">pilih tahun</label>
                        <select name="tahun2" required="" class="form-control">
                            <?php foreach ($tahun as $thn) :?>
                             <option value="<?php echo $thn->tahun  ?>"><?php echo $thn->tahun  ?></option>
                             option 
                            <?php endforeach; ?>
                        </select><br>
                        <input type="submit" value="print" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </section>
    </div>
</body>
</html>