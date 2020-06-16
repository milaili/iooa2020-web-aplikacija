<!DOCTYPE html>
<html>
<head>
<style>
thead {color: green;}
tbody {color: blue;}
tfoot {color: red; back}

</style>
</head>

    <body>
        <br>
        <div class="container">
        <h2>Izračuni</h2>
<hr/>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>DATUM</th>
                    <th>KOMENTAR</th>
                    <th>TRAJANJE U MINUTAMA</th>
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
                        <td><label>UKUPNO: </label><?php echo " ". $row->trajanje_aktivnosti; ?></td>


                    </tr>
                </tfoot>
            <?php } ?>

        </table>
</div>


    </body>
</html>