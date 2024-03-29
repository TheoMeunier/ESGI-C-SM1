<form method="<?= $config['config']['method']; ?>"
      action="<?= $config['config']['action']; ?>"
      class="<?= $config['config']['class']; ?>"
      enctype="multipart/form-data"
>
    <fieldset>
        <?php foreach ($config['inputs'] as $name => $configInput) { ?>
            <label for="<?= $configInput['label'] ?? ''; ?>"><?= $configInput['label'] ?? ''; ?></label>

            <?php if (!isset($configInput['input'])) { ?>
                <input
                        name="<?= $name; ?>"
                        type="<?= $configInput['type']               ?? 'text'; ?>"
                        id="<?= $configInput['name']                 ?? ''; ?>"
                        class="<?= $configInput['class']             ?? ''; ?>"
                        placeholder="<?= $configInput['placeholder'] ?? ''; ?>"
                        value="<?= $configInput['value']             ?? ''; ?>"
                    <?= isset($configInput['type']) == 'file' && isset($configInput['multiple']) && $configInput['multiple'] === true ? 'multiple' : ''; ?>
                ><br>
            <?php } ?>

            <?php if (isset($configInput['input']) && $configInput['input'] === \App\Enum\FormTypeEnum::INPUT_TEXTAREA) { ?>
                <textarea
                        name="<?= $name; ?>"
                        id="<?= $configInput['id']                   ?? ''; ?>"
                        class="<?= $configInput['class']             ?? ''; ?>"
                        placeholder="<?= $configInput['placeholder'] ?? ''; ?>"
                        rows="<?= $configInput['rows']               ?? ''; ?>"
                ><?= $configInput['value']                           ?? ''; ?></textarea>
            <?php } ?>

            <?php if (isset($configInput['input']) && $configInput['input'] === \App\Enum\FormTypeEnum::INPUT_SELECT) { ?>
                <select
                        name="<?= $name; ?>"
                        id="<?= $configInput['name']     ?? ''; ?>"
                        class="<?= $configInput['class'] ?? ''; ?>"
                    <?= isset($configInput['multiple']) && $configInput['multiple'] === true ? 'multiple' : ''; ?>
                >
                    <option><?= $configInput['placeholder'] ?? ''; ?></option>
                    <?php foreach ($configInput['options'] as $option) { ?>
                        <option value="<?= $option->getId(); ?>"
                            <?= isset($configInput['value']) && is_array($configInput['value']) && in_array($option->getId(), $configInput['value']) ? 'selected' : ''; ?>
                        >
                            <?= $option->getName(); ?>
                        </option>
                    <?php } ?>
                </select>
            <?php } ?>

            <?php if (isset($configInput['input']) && $configInput['input'] === \App\Enum\FormTypeEnum::INPUT_SWITCH) { ?>
		        <label class="switch">
			        <input type="checkbox"
			               name="<?= $name; ?>"
			               id="<?= $configInput['name']                 ?? ''; ?>"
			               class="<?= $configInput['class']             ?? ''; ?>"
				            <?php if ($configInput['checked'] == 1) { ?>
						        checked
	                        <?php } ?>
			        />
			        <span class="slider"></span>
		        </label>

            <?php } ?>

            <?php if (!empty($configInput['errors'])) { ?>
                <?php foreach ($configInput['errors'] as $fieldErrors) { ?>
                    <ul class="alert-list alert alert-error">
                        <?php foreach ((array) $fieldErrors as $error) { ?>
                            <li><?= $error; ?></li>
                        <?php } ?>
                    </ul>
                <?php } ?>
            <?php } ?>

        <?php } ?>

        <input type="hidden" name="csrf_token" value="<?= $this->csrfToken; ?>">

        <input type="submit" name="submit" value="<?= $config['config']['submit']; ?>">
</form>
