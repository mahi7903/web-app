<!DOCTYPE html>
<html>
<head>
    <title>Search Result</title>
</head>
<body>
    <h1>Search Result for: <?= esc($searchTerm) ?></h1>
    <a href="<?= site_url('medicine') ?>">← Back to Search</a>

    <?php if (isset($data['results'])): ?>
        <?php foreach ($data['results'] as $result): ?>
            <h2><?= esc($result['openfda']['generic_name'][0] ?? 'N/A') ?></h2>
            <p><strong>Purpose:</strong> <?= esc($result['purpose'][0] ?? 'N/A') ?></p>
            <p><strong>Indications:</strong> <?= esc($result['indications_and_usage'][0] ?? 'N/A') ?></p>
            <hr>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No results found or API limit reached.</p>
    <?php endif; ?>
</body>
</html>
