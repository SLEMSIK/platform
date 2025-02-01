<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Создание работы</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php require_once('navbar.php');
    session_start();
    ?>
    <form action="vendor/genPDF.php" method="GET">
    <div class="container rounded d-flex justify-content-center bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-6 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Создание работы</h4>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Название работы</label><input name="title" type="text" class="form-control" value="<?php echo $_GET['title']?>"></div>
                        <div class="col-md-12"><label class="labels">Краткое описание</label><input name="subtitle" type="text" class="form-control" value="<?php echo $_GET['subtitle']?>"></div>
                   </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Коэффициент изображений</label><input name="k" type="number" class="form-control" value="<?php echo $_GET['k']?>"></div>
                        <div class="col-md-12"><label class="labels">Максимальное количество изображений на странице</label><input name="maxImagesPerPage" type="number" class="form-control" value="<?php echo $_GET['maxImagesPerPage']?>"></div>
                        <div class="col-md-12"><label class="labels">Количество колонок на странице</label><input name="columns" type="number" class="form-control" value="<?php echo $_GET['columns']?>"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Отступы от края страницы (мм)</label><input name="margin" type="number" class="form-control" value="<?php echo $_GET['margin']?>"></div>
                        <div class="col-md-12"><label class="labels">Промежутки между изображениями по горизонтали (мм)</label><input name="horizontalGutter" type="number" class="form-control" value="<?php echo $_GET['horizontalGutter']?>"></div>
                        <div class="col-md-12"><label class="labels">Промежутки между изображениями по вертикали (мм)</label><input name="verticalGutter" type="number" class="form-control" value="<?php echo $_GET['verticalGutter']?>"></div>
                        
                    </div>
                    <div class="row mt-3">
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button class="btn btn-outline-success" type="submit">Создать</button></form>
                        </div>
                        
                        
                    </div>
                    <form action="vendor/genPDF.php" method="GET">
                    <div class="row mt-3">
                        <div class="d-grid gap-2 col-6 mx-auto">
                            
                            <button class="btn btn-outline-success" type="submit">Опубликовать</button></form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php $pdf_path = $_GET['iframe'];?>
            <iframe src="<?php echo $pdf_path; ?>" width="100%" height="500px"></iframe>
            
        </div>

        
    </div>

</body>
</html>