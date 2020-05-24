<h1><?php echo $vrsta->naziv_vrste_aktivnosti; ?></h1>

<?php if($this->session->flashdata('vrsta_obrisana')) : ?>
    <?php echo '<p class="text-success">' .$this->session->flashdata('vrsta_obrisana') . '</p>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('vrsta_kreirana')) : ?>
    <?php echo '<p class="text-success">' .$this->session->flashdata('vrsta_kreirana') . '</p>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('vrsta_izmijenjena')) : ?>
    <?php echo '<p class="text-success">' .$this->session->flashdata('vrsta_izmijenjena') . '</p>'; ?>
<?php endif; ?>

