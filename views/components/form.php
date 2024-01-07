<section>

	<legend><h2>Se connecter</h2></legend>
	<form method="<?php echo $config['config']['method']; ?>"
	      action="<?php echo $config['config']['action']; ?>"
	      class="<?php echo $config['config']['class']; ?>">
		<fieldset>

            <?php foreach ($config['inputs'] as $name => $configInput) { ?>
				<label for="<?php echo $name; ?>"><?php echo $name; ?></label>
				<input
						name="<?php echo $name; ?>"
						placeholder="<?php echo $configInput['placeholder']; ?>"
						class="<?php echo $configInput['class']; ?>"
						id="<?php echo $configInput['placeholder']; ?>"
						type="<?php echo $configInput['type']; ?>"
                    <?php echo $configInput['required'] ? 'required' : ''; ?>
				><br>
            <?php } ?>
			<input type="submit" name="submit" value="<?php echo $config['config']['submit']; ?>">
            <?php if (!empty($data['error'])) { ?>
				<p class="error"><?php echo $data['error']; ?></p>
            <?php } ?>
		</fieldset>
	</form>

</section>
