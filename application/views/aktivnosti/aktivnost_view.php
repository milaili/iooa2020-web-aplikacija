
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link href="<?php echo base_url() . 'assets/css/jquery.datatables.min.css' ?>" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container">
            <br><br>

            <form action="<?php echo site_url('aktivnosti2/skeyword'); ?>" method="post">
                <div class="row">
                    <h3>Izračuni aktivnosti</h3>

                    <div class="col-md-2">

                        <label>Od datuma:</label>
                        <div class="input-group date">
                            <div class="input-group-addon">

                            </div>
                            <input type="date" class="form-control pull-right" id="datum_aktivnosti1" name="datum_aktivnosti1">
                        </div>
                        <!-- /.input group -->

                    </div>

                    <div class="col-md-2">

                        <label>Do datuma:</label>
                        <div class="input-group date">
                            <div class="input-group-addon">

                            </div>
                            <input type="date" class="form-control pull-right" id="datum_aktivnosti2" name="datum_aktivnosti2">
                        </div>
                        <!-- /.input group -->

                    </div>

                    <div class="col-md-2">

                        <label>Vrsta aktivnosti:</label>
                        <div class="form-group"id="filter_col3">

                            <select name="id_vrste_aktivnosti" class="form-control column_filter" id="id_vrste_aktivnosti" >
                                <?php foreach ($vrsta->result() as $row) : ?>
                                    <option value="<?php echo $row->id_vrste_aktivnosti; ?>"><?php echo $row->naziv_vrste_aktivnosti; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>


                    <div class="col-md-3">
                        <label>Izračunaj ukupno vrijeme</label>
                        <button class="btn btn-warning btn-md" name = "search" id="search">IZRAČUNAJ</button> 

                    </div>
                </div>
                *ispunite sva polja
            </form>
            <hr/>

            <h3>Pregled Vaših aktivnosti</h3>
            <br>
            <button class="btn btn-primary" data-toggle="modal" data-target="#myModalAdd">Unesi novu</button>
            <br>
            <br>
            <div class="table-responsive">
                <table class="table table-striped" id="mytable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Datum</th>
                            <th>Trajanje</th>
                            <th>Vrsta</th>
                            <th>Komentar</th>
                            <th>Uredi</th>
                        </tr>
                    </thead>
            </div>
        </table>
    </div>

    <!-- Modal Add Product-->
    <form id="add-row-form" action="<?php echo site_url('aktivnosti2/save'); ?>" method="post">
        <div class="modal fade" id="myModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Unesi novu</h4>
                    </div>
                    <div class="modal-body">


                        <div class="form-group">
                            <input type="date" name="datum_aktivnosti" class="form-control" placeholder=" " required>
                        </div>
                        <div class="form-group">
                            <input type="number" name="trajanje_aktivnosti" class="form-control" placeholder="Trajanje u minutama" required>
                        </div>
                        <div class="form-group">
                            <select name="vrsta" class="form-control" placeholder="Vrsta" required>
                                <?php foreach ($vrsta->result() as $row) : ?>
                                    <option value="<?php echo $row->id_vrste_aktivnosti; ?>"><?php echo $row->naziv_vrste_aktivnosti; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" name="komentar_aktivnosti" class="form-control" placeholder="Komentar" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Zatvori</button>
                        <button type="submit" class="btn btn-success">Unesi</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Modal Update Product-->
    <form id="add-row-form" action="<?php echo site_url('aktivnosti2/update'); ?>" method="post">
        <div class="modal fade" id="ModalUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Izmjena aktivnosti</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" name="id_aktivnosti" class="form-control" placeholder="id" readonly>
                        </div>
                        <div class="form-group">
                            <input type="date" name="datum_aktivnosti" class="form-control" placeholder=" " required>
                        </div>
                        <div class="form-group">
                            <input type="number" name="trajanje_aktivnosti" class="form-control" placeholder="Trajanje u minutama" required>
                        </div>
                        <div class="form-group">
                            <select name="vrsta" class="form-control" required>
                                <?php foreach ($vrsta->result() as $row) : ?>
                                    <option value="<?php echo $row->id_vrste_aktivnosti; ?>"><?php echo $row->naziv_vrste_aktivnosti; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" name="komentar_aktivnosti" class="form-control" placeholder="Komentar" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Zatvori</button>
                        <button type="submit" class="btn btn-success">Spremi</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Modal delete Product-->
    <form id="add-row-form" action="<?php echo site_url('aktivnosti2/delete'); ?>" method="post">
        <div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Brisanje aktivnosti</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id_aktivnosti" class="form-control" required>
                        <strong>Jeste sigurni?</strong>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Ne</button>
                        <button type="submit" class="btn btn-success">Da</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="<?php echo base_url() . 'assets/js/jquery.datatables.min.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/dataTables.bootstrap.js' ?>"></script>

    <script>
        $(document).ready(function () {
            // Setup datatables
            $.fn.dataTableExt.oApi.fnPagingInfo = function (oSettings)
            {
                return {
                    "iStart": oSettings._iDisplayStart,
                    "iEnd": oSettings.fnDisplayEnd(),
                    "iLength": oSettings._iDisplayLength,
                    "iTotal": oSettings.fnRecordsTotal(),
                    "iFilteredTotal": oSettings.fnRecordsDisplay(),
                    "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                    "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                };
            };

            var table = $("#mytable").dataTable({

                initComplete: function () {
                    var api = this.api();
                    $('#mytable_filter input')
                            .off('.DT')
                            .on('input.DT', function () {
                                api.search(this.value).draw();
                            });
                },
                oLanguage: {
                    sProcessing: "loading..."
                },
                processing: true,
                serverSide: true,
                ajax: {"url": "<?php echo base_url() . 'aktivnosti2/get_aktivnost_json' ?>", "type": "POST"},
                columns: [
                    {"data": "id_aktivnosti"},
                    {"data": "datum_aktivnosti"},
                    {"data": "trajanje_aktivnosti"},
                    {"data": "naziv_vrste_aktivnosti"},
                    {"data": "komentar_aktivnosti"},
                    {"data": "view"}
                ],
                order: [[1, 'desc']],
                rowCallback: function (row, data, iDisplayIndex) {
                    var info = this.fnPagingInfo();
                    var page = info.iPage;
                    var length = info.iLength;
                    $('td:eq(0)', row).html();
                }

            });
            // end setup datatables
            // get Edit Records
            $('#mytable').on('click', '.edit_record', function () {
                var id = $(this).data('id');
                var datum = $(this).data('datum');
                var trajanje = $(this).data('trajanje');
                var vrsta = $(this).data('vrsta');
                var komentar = $(this).data('komentar')
                $('#ModalUpdate').modal('show');
                $('[name="id_aktivnosti"]').val(id);
                $('[name="datum_aktivnosti"]').val(datum);
                $('[name="trajanje_aktivnosti"]').val(trajanje);
                $('[name="vrsta"]').val(vrsta);
                $('[name="komentar_aktivnosti"]').val(komentar);
            });
            // End Edit Records
            // get delete Records
            $('#mytable').on('click', '.delete_record', function () {
                var id = $(this).data('id');
                $('#ModalDelete').modal('show');
                $('[name="id_aktivnosti"]').val(id);
            });
            // End delete Records
        });



        function filterGlobal() {
            $('#mytable').DataTable().search(
                    $('#global_filter').val(),
                    ).draw();
        }

        function filterColumn(i) {
            $('#mytable').DataTable().column(i).search(
                    $('#col' + i + '_filter').val()
                    ).draw();
        }

        $(document).ready(function () {
            $('#mytable').DataTable();

            $('input.global_filter').on('keyup click', function () {
                filterGlobal();
            });

            $('input.column_filter').on('keyup click', function () {
                filterColumn($(this).parents('div').attr('data-column'));
            });
        });

        $('select.column_filter').on('change', function () {
            filterColumn($(this).parents('div').attr('data-column'));
        });





        $.fn.dataTableExt.afnFiltering.push(
                function (oSettings, aData, iDataIndex) {

                    var today = new Date();
                    var dd = today.getDate();
                    var mm = today.getMonth() + 1;
                    var yyyy = today.getFullYear();

                    if (dd < 10)
                        dd = '0' + dd;

                    if (mm < 10)
                        mm = '0' + mm;

                    today = mm + '/' + dd + '/' + yyyy;

                    if ($('#min').val() != '' || $('#max').val() != '') {
                        var iMin_temp = $('#min').val();
                        if (iMin_temp == '') {
                            iMin_temp = '01/01/1980';
                        }

                        var iMax_temp = $('#max').val();
                        if (iMax_temp == '') {
                            iMax_temp = today;
                        }

                        var arr_min = iMin_temp.split("/");
                        var arr_max = iMax_temp.split("/");
                        var arr_date = aData[2].split("/");

                        var iMin = new Date(arr_min[2], arr_min[0], arr_min[1], 0, 0, 0, 0)
                        var iMax = new Date(arr_max[2], arr_max[0], arr_max[1], 0, 0, 0, 0)
                        var iDate = new Date(arr_date[2], arr_date[0], arr_date[1], 0, 0, 0, 0)

                        if (iMin == "" && iMax == "")
                        {
                            return true;
                        } else if (iMin == "" && iDate < iMax)
                        {
                            return true;
                        } else if (iMin <= iDate && "" == iMax)
                        {
                            return true;
                        } else if (iMin <= iDate && iDate <= iMax)
                        {
                            return true;
                        }
                        return false;
                    }
                }
        );

    </script>
</body>
</html>