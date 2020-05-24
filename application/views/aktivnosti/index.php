<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <link href="<?php echo base_url() . 'assets/css/bootstrap.css' ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url() . 'assets/css/jquery.datatables.min.css' ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url() . 'assets/css/dataTables.bootstrap.css' ?>" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container">

            <div class="row justify-content-md-center">
                <div class="col col-lg-8">
                    <h3>Pregled aktivnosti</h3>
                    <?php echo $this->session->flashdata('msg'); ?>
                    <a href="<?php echo site_url('aktivnosti/unos_aktivnosti'); ?>" class="btn btn-success btn-sm">Unesi novu</a><hr/>
                    <table class="table table-striped" id="aktivnost" style="font-size: 14px;">
                        <thead>
                            <tr>
                                <th>Br.</th>
                                <th>Datum</th>
                                <th>Trajanje</th>
                                <th>Vrsta aktivnosti</th>
                                <th>Komentar</th>
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

                                    <td>
                                        <a href="<?php echo site_url('aktivnosti/get_edit/' . $row->id_aktivnosti); ?>" class="btn btn-sm btn-info">Izmijeni</a>
                                        <a onclick="return confirm('Da li ste sigurni?')" href="<?php echo base_url(); ?>aktivnosti/brisanje/<?php echo $row->id_aktivnosti; ?>" class="btn btn-sm btn-danger">Obriši</a>
                                    </td>
                                </tr>

                            <?php endforeach; ?>
                            <tr>
                                <td></td>

                                <td>UKUPNO:</td>
                                <td>SUMA</td>
                                <td></td>
                                <td></td>
                                <td></td>

                            </tr>
                        </tbody>
                    </table>

                    </form>

                </div>
            </div>

        </div>

        <script src="<?php echo base_url() . 'assets/js/jquery-3.2.1.js' ?>"></script>
        <script src="<?php echo base_url() . 'assets/js/bootstrap.js' ?>"></script>
        <script src="<?php echo base_url() . 'assets/js/jquery.datatables.min.js' ?>"></script>
        <script src="<?php echo base_url() . 'assets/js/dataTables.bootstrap.js' ?>"></script>

        <script type="text/javascript">
                                        $(document).ready(function () {
                                            $('#aktivnost').DataTable();
                                        });
        </script>
    </body>
</html>


