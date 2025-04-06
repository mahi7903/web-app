<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Pain Relief Search Results</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #e4f8dc;
      font-family: 'Segoe UI', sans-serif;
    }

    .card-title {
      font-size: 1.1rem;
    }

    .btn-sm {
      font-size: 0.85rem;
    }

    .card img {
      max-height: 120px;
      object-fit: contain;
    }

    @media screen and (max-width: 768px) {
      .card img {
        max-height: 100px;
      }
      .card-title {
        font-size: 1rem;
      }
      .btn-sm {
        font-size: 0.8rem;
        padding: 6px 8px;
      }
      .container {
        padding: 0 12px;
      }
      h2, h4 {
        font-size: 1.2rem;
      }
    }
  </style>
</head>
<body>
<div class="container mt-4">

  <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
  <?php endif; ?>

  <h2 class="text-center mb-4">
    <?= isset($source) && $source === 'db' ? '📦 From Pharmacy Database' : '🌐 From OpenFDA API' ?>
  </h2>

  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
    <?php if (isset($meds)): ?>
      <?php foreach ($meds as $index => $med): ?>
        <div class="col">
          <div class="card h-100 p-3 shadow-sm">
            <img src="<?= $med['image_url'] ?? '/images/' . strtolower($med['name']) . '.jpg' ?>" class="img-fluid mb-2 w-100">
            <h5 class="card-title"><?= esc($med['name']) ?></h5>
            <p><strong>Purpose:</strong> <?= esc($med['purpose']) ?></p>
            <p><strong>Side Effects:</strong> <?= esc($med['side_effects']) ?></p>

            <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="collapse" data-bs-target="#collapse<?= $index ?>">
              🔎 More Info
            </button>

            <div class="collapse mt-2" id="collapse<?= $index ?>">
              <div class="card card-body">
                <strong>Purpose:</strong> <?= esc($med['purpose']) ?><br>
                <strong>Side Effects:</strong> <?= esc($med['side_effects']) ?>
              </div>
            </div>

            <button class="btn btn-success btn-sm mt-3 w-100">🛒 Add to Cart</button>
          </div>
        </div>
      <?php endforeach; ?>

    <?php elseif (isset($apiMeds)): ?>
      <?php foreach ($apiMeds as $index => $med): ?>
        <div class="col">
          <div class="card h-100 p-3 shadow-sm">
            <img src="<?= $med['image_url'] ?? '/images/' . strtolower($med['name']) . '.jpg' ?>" class="img-fluid mb-2 w-100">
            <h5 class="card-title"><?= esc($med['name']) ?></h5>
            <p><strong>Purpose:</strong> <?= esc($med['purpose']) ?></p>
            <p><strong>Side Effects:</strong> <?= esc($med['side_effects']) ?></p>

            <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="collapse" data-bs-target="#collapse<?= $index ?>">
              🔎 More Info
            </button>

            <div class="collapse mt-2" id="collapse<?= $index ?>">
              <div class="card card-body">
                <strong>Purpose:</strong> <?= esc($med['purpose']) ?><br>
                <strong>Side Effects:</strong> <?= esc($med['side_effects']) ?>
              </div>
            </div>

            <button class="btn btn-primary btn-sm w-100 saveBtn"
              data-name="<?= esc($med['name']) ?>"
              data-purpose="<?= esc($med['purpose']) ?>"
              data-side="<?= esc($med['side_effects']) ?>"
              data-image="<?= $med['image_url'] ?? '/images/' . strtolower($med['name']) . '.jpg' ?>">
              💾 Save to Pharmacy
            </button>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <p class="text-center">❌ No results found.</p>
    <?php endif; ?>
  </div>

  <div class="text-center mt-4">
    <a href="<?= base_url('/pain') ?>" class="btn btn-secondary">⬅️ Back to Pain Medications</a>
  </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // AJAX Save to Pharmacy Handler
  document.querySelectorAll('.saveBtn').forEach(button => {
    button.addEventListener('click', () => {
      const data = {
        name: button.dataset.name,
        purpose: button.dataset.purpose,
        side_effects: button.dataset.side,
        image_url: button.dataset.image
      };

      fetch("<?= base_url('/pain/save') ?>", {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams(data)
      })
      .then(res => res.json())
      .then(res => {
        if (res.status === 'success') {
          button.classList.remove('btn-primary');
          button.classList.add('btn-success');
          button.textContent = '✅ Saved!';
          setTimeout(() => button.textContent = '💾 Save to Pharmacy', 2000);
        } else {
          button.classList.remove('btn-primary');
          button.classList.add('btn-danger');
          button.textContent = '❌ Error';
          console.error(res.message);
        }
      })
      .catch(err => {
        button.classList.remove('btn-primary');
        button.classList.add('btn-danger');
        button.textContent = '❌ Error';
        console.error('AJAX error:', err);
      });
    });
  });
</script>
</body>
</html>
