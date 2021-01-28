<div class="content-wrapper">
    <section class="content">
        <body>
            <table class="table">
                <tr>
                    <th>tujuan</th>
                    <th>isi disposisi</th>
                    <th>sifat</th>
                    <th>batas waktu</th>
                </tr>

                <?php foreach ($result as $row) : ?>
                <tr>
                    <td><?php echo $row->tujuan; ?></td>
                    <td><?php echo $row->tujuan; ?></td>
                    <td><?php echo $row->sifat; ?></td>
                    <td><?php echo $row->batas_waktu; ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </body>
    </section>
</div>