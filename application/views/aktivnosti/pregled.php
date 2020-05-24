<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    </head>
    <body>

        <div class="container">

            <div class="row justify-content-md-center">
                <div class="col col-lg-8">
                    <h3>Vaše aktivnosti</h3>
                    <?php echo $this->session->flashdata('msg'); ?>
                    <a href="<?php echo site_url('aktivnosti/unos_aktivnosti'); ?>" class="btn btn-success btn-sm">Unesi novu aktivnost</a><hr/>
                    <table class="table table-striped" id="mytable" style="font-size: 14px;">
                        <thead>
                            <tr>
                                <th>Br</th>
                                <th>Datum</th>
                                <th>Trajanje</th>
                                <th>Vrsta aktivnosti</th>
                                <th>Komentar</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($aktivnosti->result() as $row):
                                $no++;
                                ?>
                                <tr>

                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row->datum_aktivnosti; ?></td>
                                    <td><?php echo number_format($row->trajanje_aktivnosti); ?></td>
                                    <td><?php echo $row->naziv_vrste_aktivnosti; ?></td>
                                    <td><?php echo $row->komentar_aktivnosti; ?></td>
                                    <td type="hidden" name="id_aktivnosti" value="><?php echo $row->id_aktivnosti ?>"></td>

                                    <td>
                                        <a href="<?php echo site_url('aktivnosti/get_edit/' . $row->id_aktivnosti); ?>" class="btn btn-sm btn-info">Izmijeni</a>
                                        <a href="<?php echo site_url('aktivnosti/brisanje_aktivnosti/' . $row->id_aktivnosti); ?>" class="btn btn-sm btn-danger">Obriši</a>
                                    </td>>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>



        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#mytable').DataTable();
            });
        </script>
    </body>
</html>

