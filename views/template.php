<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="<?= BASE_URL?>assets/css/style.css">
    <script src="<?= BASE_URL;?>/assets/js/script.js"></script>
</head>
<body>
    <h1>Este é o topo.</h1>
    <a href="<?= BASE_URL;?>">Home</a>
    <a href="<?= BASE_URL;?>galeria">Galeria</a>
    <hr>
    <?php $this->loadViewInTemplate($viewName, $viewData);?>
    
</body>
</html>