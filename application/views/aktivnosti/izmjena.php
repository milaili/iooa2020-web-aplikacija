
<body>

    <?php echo validation_errors('<p class="text-error">'); ?>
    <div class="container">

        <div class="row justify-content-md-center">
            <div class="col col-lg-6">
                <h3> Unos nove aktivnosti</h3>
                <hr/>
                <?php echo $this->session->flashdata('msg'); ?>
                <form action="<?php echo site_url('aktivnosti/get_edit'); ?>" method="post">

                    <div class="form-group">
                        <label>Datum</label>
                        <input type="date" class="form-control" name="datum_aktivnosti" required>
                    </div>

                    <div class="form-group">
                        <label>Vrsta</label>
                        <select class="form-control" name="vrsta_aktivnosti"  required>
                            <option value="">No Selected</option>
                            <?php foreach ($vrsta_aktivnosti as $row): ?>
                                <option value="<?php echo $row->id_vrste_aktivnosti; ?>"><?php echo $row->naziv_vrste_aktivnosti; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Trajanje</label>
                        <input type="number" class="form-control" name="trajanje_aktivnosti" placeholder="u minutama" required>
                    </div>

                    <div class="form-group">
                        <label>Komentar</label>
                        <textarea class="form-control" name="komentar_aktivnosti" placeholder="nije obavezan unos" required></textarea>
                    </div>

                    <input type="hidden" name="id_aktivnosti" value="<?php echo $id_aktivnosti ?>" required>

                    <button class="btn btn-primary" type="submit">Spremi</button>

                </form>
            </div>
        </div>

    </div>


    <script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery-3.5.1.js' ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'assets/js/bootstrap.js' ?>"></script>

    <script type="text/javascript">

        $(document).ready(function(){
        //call function get data edit
        get_data_edit();
        //load data for edit
        function get_data_edit(){
        var id_aktivnosti = $('[name="id_aktivnosti"]').val();
        $.ajax({
        url : "<?php echo site_url('aktivnosti/get_data_edit'); ?>",
                method : "POST",
                data :{id_aktivnosti :id_aktivnosti},
                async : true,
                dataType : 'json',
                success : function(data){
                $.each(data, function(i, item){
                $('[name="datum_aktivnosti"]').val(data[i].datum_aktivnosti);
                $('[name="trajanje_aktivnosti"]').val(data[i].trajanje_aktivnosti);
                $('[name="vrsta_aktivnosti"]').val(data[i].id_vrsta).trigger('change');
                $('[name="komentar_aktivnosti"]').val(data[i].komentar_aktivnosti);
                });
                }

        });
        }

        });
        });
    </script>
</body>

</div>


</div>

</body>
</html>
