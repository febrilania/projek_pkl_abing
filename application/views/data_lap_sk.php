<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body onload="window.print()">
    <div class="content-wrapper">
        <section class="content">
            <h2><?php echo $title ?></h2>
            <h3><?php echo $subtitle ?></h3>
           
            <table class="table">
                <thead>
                    <tr>
                        <th>no</th>
                        <th>no surat</th>
                        <th>tujuan</th>
                        <th>tanggal surat</th>
                        <th>tanggal catat</th>
                        <th>isi</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no = 1;
                        foreach ($datafilter as $df):?>
                    <tr>
                        <td><?php echo $no++; ?> </td>
                        <td><?php echo $df->no_surat; ?> </td>
                        <td><?php echo $df->tujuan; ?> </td>
                        <td><?php echo $df->tgl_surat; ?> </td>
                        <td><?php echo $df->tgl_catat; ?> </td>
                        <td><?php echo $df->isi; ?> </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </div>
    
</body>
</html>