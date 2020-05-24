
<h1> Unos nove aktivnosti</h1>

<body>

    <?php echo validation_errors('<p class="text-error">'); ?>
    <div class="container">

        <div class="row justify-content-md-center">
            <div class="col col-lg-6">
                <hr/>
                <?php echo $this->session->flashdata('msg'); ?>
                <form action="<?php echo site_url('aktivnosti/spremi_aktivnost'); ?>" method="post">

                    <div class="form-group">
                        <label>Datum</label>
                        <input type="date" class="form-control" name="datum_aktivnosti" required>
                    </div>

                    <div class="form-group">
                        <label>Vrsta</label>
                        <select class="form-control" name="vrsta_aktivnosti" id="vrsta_aktivnosti" required>
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


                    <button class="btn btn-primary" type="submit">Spremi</button>

                </form>
            </div>
        </div>

    </div>

</body>

</div>


</div>

