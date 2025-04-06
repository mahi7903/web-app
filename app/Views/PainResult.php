<!DOCTYPE html>
<html>
<head>
  <title>Results</title>
</head>
<body>

<?php 
// Here I'm merging the data source: either from API ($apiMeds) or DB ($meds).
// This ensures we always have a list of medicines to loop through regardless of the source.
$allMeds = $apiMeds ?? $meds ?? []; 
?>

<?php foreach ($allMeds as $med): ?>
  <!-- For every medicine entry, I create a form so the user can save it to the pharmacy database -->
  <form action="<?= base_url('/pain/save') ?>" method="post">
    
    <!-- This is where I show the medicine name -->
    <h3><?= esc($med['name']) ?></h3>

    <!-- Showing the purpose of the medicine -->
    <p>Purpose: <?= esc($med['purpose']) ?></p>

    <!-- Showing possible side effects -->
    <p>Side Effects: <?= esc($med['side_effects']) ?></p>

    <!-- Displaying the image of the medicine if available -->
    <img src="<?= esc($med['image_url']) ?>" width="100" />

    <!-- Passing the medicine data securely via hidden inputs when the form is submitted -->
    <input type="hidden" name="name" value="<?= esc($med['name']) ?>" />
    <input type="hidden" name="purpose" value="<?= esc($med['purpose']) ?>" />
    <input type="hidden" name="side_effects" value="<?= esc($med['side_effects']) ?>" />
    <input type="hidden" name="image_url" value="<?= esc($med['image_url']) ?>" />

    <!-- Button for user to save the medicine details to our local pharmacy DB -->
    <button type="submit">Save to Pharmacy</button>
  </form>
<?php endforeach; ?>

</body>
</html>
