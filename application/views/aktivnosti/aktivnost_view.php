
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Crud ignited datatables in CodeIgniter</title>
        <link href="<?php echo base_url() . 'assets/css/bootstrap.css' ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url() . 'assets/css/jquery.datatables.min.css' ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url() . 'assets/css/dataTables.bootstrap.css' ?>" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container">



            <div class="card">
                <div class="card-body">
                    <form id="clear">
                        <div class="row">

                            <!--Vrste-->
                            <div class="col-md-2 pl-1">

                                <label>Vrsta</label>
                                <div class="form-group"id="filter_col3" data-column="3">

                                    <select name="vrsta" class="form-control column_filter" id="col3_filter">
                                        <?php foreach ($vrsta->result() as $row) : ?>
                                            <option value="<?php echo $row->id_vrste_aktivnosti; ?>"><?php echo $row->naziv_vrste_aktivnosti; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </form>
                    <div class="text-center">
                        <a class="btn btn-primary " href="#"><i class="fa fa-filter "></i> Filter</a>
                        <Button type="button" onclick="ClearFields();" class="btn btn-primary"> Clear Filter</Button>
                    </div>
                </div>
            </div>

            <hr>




            <div class="card row">
                <h2>Sve aktivnosti</h2>
                <button class="btn btn-success pull-right" data-toggle="modal" data-target="#myModalAdd">Unesi novu</button>
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
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Save</button>
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
                            <h4 class="modal-title" id="myModalLabel">Update Product</h4>
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
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Update</button>
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
                            <h4 class="modal-title" id="myModalLabel">Delete Product</h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id_aktivnosti" class="form-control" required>
                            <strong>Are you sure to delete this record?</strong>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-success">Yes</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <script src="<?php echo base_url() . 'assets/js/jquery-3.2.1.js' ?>"></script>
        <script src="<?php echo base_url() . 'assets/js/bootstrap.js' ?>"></script>
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


        </script>
    </body>
</html>