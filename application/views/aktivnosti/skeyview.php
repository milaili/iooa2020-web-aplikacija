<!DOCTYPE html>
<html>
    <head>
        <title>Izračuni</title>
    </head>

    <body>
        <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>DATUM</th>
                    <th>TRAJANJE</th>
                    <th>KOMENTAR</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($aktivnosti as $aktivnost) { ?>
                    <tr>
                        <td><?php echo $aktivnost->datum_aktivnosti; ?></td>
                        <td><?php echo $aktivnost->komentar_aktivnosti; ?></td>
                        <td><?php echo $aktivnost->trajanje_aktivnosti; ?></td>

                    </tr>
                </tbody>
            <?php } ?>



            <?php foreach ($ukupno as $row) { ?>
                <tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><label>UKUPNO MINUTA: </label><?php echo $row->trajanje_aktivnosti; ?></td>


                    </tr>
                </tfoot>
            <?php } ?>

        </table>



    </body>
</html>