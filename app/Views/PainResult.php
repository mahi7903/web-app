<!DOCTYPE html>
<html>
<head><title>Results</title></head>
<body>
<?php $allMeds = $apiMeds ?? $meds ?? []; ?>
<?php foreach ($allMeds as $med): ?>
<form action="<?= base_url('/pain/save') ?>" method="post">
  <h3><?= esc($med['name']) ?></h3>
  <p>Purpose: <?= esc($med['purpose']) ?></p>
  <p>Side Effects: <?= esc($med['side_effects']) ?></p>
  <img src="<?= esc($med['image_url']) ?>" width="100" />
  <input type="hidden" name="name" value="<?= esc($med['name']) ?>" />
  <input type="hidden" name="purpose" value="<?= esc($med['purpose']) ?>" />
  <input type="hidden" name="side_effects" value="<?= esc($med['side_effects']) ?>" />
  <input type="hidden" name="image_url" value="<?= esc($med['image_url']) ?>" />
  <button type="submit">Save to Pharmacy</button>
</form>
<?php endforeach; ?>
</body>
</html>
