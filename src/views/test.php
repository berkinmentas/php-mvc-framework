<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title><?= isset($title) ? $title : 'Test Sayfası' ?></title>
</head>
<body>
<div class="container">
    <h1><?= $title ?></h1>

    <?php if(isset($content)): ?>
        <div class="content">
            <?= $content ?>
        </div>
    <?php endif; ?>

    <?php if(isset($data) && is_array($data)): ?>
        <div class="debug">
            <h2>Gelen Veriler:</h2>
        </div>
    <?php endif; ?>
</div>
</body>
</html>