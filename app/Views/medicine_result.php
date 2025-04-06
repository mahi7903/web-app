<!DOCTYPE html>
<html>
<head>
    <title>Search Result</title>
</head>
<body>

    <!-- At the top, we show what search term the user entered -->
    <!-- The esc() function is used to prevent any script injection (security best practice) -->
    <h1>Search Result for: <?= esc($searchTerm) ?></h1>

    <!-- Back link that allows user to return to the search page -->
    <a href="<?= site_url('medicine') ?>">← Back to Search</a>

    <!-- This section checks if API returned any data in 'results' -->
    <?php if (isset($data['results'])): ?>

        <!-- loop through each medicine result returned by the OpenFDA API -->
        <?php foreach ($data['results'] as $result): ?>

            <!-- Display the generic name of the medicine -->
            <!-- If not available, show "N/A" as fallback -->
            <h2><?= esc($result['openfda']['generic_name'][0] ?? 'N/A') ?></h2>

            <!-- Display the purpose of the medicine (if available) -->
            <p><strong>Purpose:</strong> <?= esc($result['purpose'][0] ?? 'N/A') ?></p>

            <!-- Display usage or indication info -->
            <p><strong>Indications:</strong> <?= esc($result['indications_and_usage'][0] ?? 'N/A') ?></p>

            <!-- Horizontal line to separate each result visually -->
            <hr>

        <?php endforeach; ?>

    <!-- If no result was returned from the API or limit is reached, show this message -->
    <?php else: ?>
        <p>No results found. Try again later!</p>
    <?php endif; ?>

</body>
</html>
