<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title : 'Test Sayfası' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2c3e50;
            --light-color: #ecf0f1;
            --dark-color: #34495e;
            --success-color: #2ecc71;
        }

        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--dark-color);
            padding-top: 20px;
        }

        .page-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .content-card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 25px;
            margin-bottom: 30px;
        }

        .page-title {
            color: var(--primary-color);
            border-bottom: 2px solid var(--light-color);
            padding-bottom: 15px;
            margin-bottom: 25px;
            font-weight: 600;
        }

        .content-section {
            background-color: var(--light-color);
            padding: 20px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .debug-section {
            margin-top: 30px;
        }

        .debug-title {
            background-color: var(--secondary-color);
            color: white;
            padding: 10px 15px;
            border-radius: 6px 6px 0 0;
            margin-bottom: 0;
            font-size: 1.2rem;
        }

        .debug-item {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-top: none;
            padding: 12px 15px;
            margin-bottom: 8px;
            border-radius: 0 0 6px 6px;
            font-family: 'Courier New', Courier, monospace;
        }

        .debug-item:last-child {
            border-radius: 0 0 6px 6px;
        }

        footer {
            margin-top: 50px;
            text-align: center;
            padding: 20px 0;
            color: var(--dark-color);
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
<div class="page-container">
    <main class="content-card">
        <h1 class="page-title">
            <i class="fas fa-code me-2"></i><?= $title ?>
        </h1>

        <?php if(isset($content)): ?>
            <div class="content-section">
                <?= $content ?>
            </div>
        <?php endif; ?>

        <?php if(isset($data) && is_array($data)): ?>
            <div class="debug-section">
                <h2 class="debug-title">
                    <i class="fas fa-database me-2"></i>Gelen Veriler
                </h2>
                <?php foreach($data as $key => $item): ?>
                    <div class="debug-item">
                        <strong><?= is_numeric($key) ? 'Veri ' . ($key + 1) : $key ?>:</strong> <?= $item ?>
                    </div>
                <?php endforeach;?>
            </div>
        <?php endif; ?>
    </main>

    <footer>
        <p>Virtara Task &copy; <?= date('Y') ?> | MVC Örnek Projesi</p>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>