<h1>Popis vrsta aktivnosti</h1>
<hr/>
<?php if($this->session->flashdata('vrsta_kreirana')) : ?>
    <?php echo '<p class="text-success">' .$this->session->flashdata('vrsta_kreirana') . '</p>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('vrsta_obrisana')) : ?>
    <?php echo '<p class="text-success">' .$this->session->flashdata('vrsta_obrisana') . '</p>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('vrsta_izmijenjena')) : ?>
    <?php echo '<p class="text-success">' .$this->session->flashdata('vrsta_izmijenjena') . '</p>'; ?>
<?php endif; ?>

<ul class="list_items">
<?php foreach ($vrste as $vrsta): ?>
    <li>
        <div><a href="<?php echo base_url(); ?>vrste/izmjena/<?php echo $vrsta->id_vrste_aktivnosti; ?>"><?php echo $vrsta->naziv_vrste_aktivnosti; ?></a></div>
      
    </li>
<?php endforeach; ?>
</ul>
	<br />
	<hr/>
<p>Za unos nove aktivnosti - <a href="<?php echo base_url(); ?>vrste/unos">Klikni ovdje</a>
