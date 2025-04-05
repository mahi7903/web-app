<!DOCTYPE html>
<html>
<head>
    <title>Medicine Search</title>
</head>
<body>
    <h1>Search Medicine (OpenFDA API)</h1>
    <form action="<?= base_url('medicine/search') ?>" method="get">


        <input type="text" name="medicine_name" placeholder="Enter medicine name" required>
        <button type="submit">Search</button>
    </form>
</body>
</html>
