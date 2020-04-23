<div style="position:absolute; left:1400px; top:30px;"><ul id="actions">
    <h4>Vrsta</h4>
    <li> <a href="<?php echo base_url(); ?>vrste/unos/<?php echo $vrsta_aktivnosti->id_vrste_aktivnosti; ?>">Dodaj obavezu</a></li> 
    <li> <a href="<?php echo base_url(); ?>vrste/izmjena/<?php echo $vrsta_aktivnosti->id_vrste_aktivnosti; ?>">Uredi kolegij</a></li> 
    <li> <a onclick="return confirm('Da li ste sigurni?')" href="<?php echo base_url(); ?>kolegiji/brisanje/<?php echo $kolegij->idKolegija; ?>">Obrisi kolegij</a></li>
</ul>
</div>
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


<br /><br />

<br />
