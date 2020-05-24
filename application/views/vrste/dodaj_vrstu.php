			<h1>Dodaj vrstu aktivnosti</h1>
			<hr/>
			<br>
			<?php echo $this->session->flashdata('msg');?>
			<p>Popunite polje kako bi kreirali novu vrstu aktivnosti</p>
			<?php echo validation_errors('<p class="text-error">'); ?>
			
			<?php echo form_open('vrste/unos'); ?>
			<p>
				<?php echo form_label('Naziv:'); ?>
				<?php
				$data = array(
											'name'        => 'naziv_vrste_aktivnosti',
											'value'       => set_value('naziv_vrste_aktivnosti')
										);
				?>
				<?php echo form_input($data); ?>
			</p>

			<?php $data = array("value" => "Dodaj vrstu",
													"name" => "submit",
													"class" => "btn btn-primary"); ?>
			<p>
				<?php echo form_submit($data); ?>
			</p> 
			<?php echo form_close(); ?>

