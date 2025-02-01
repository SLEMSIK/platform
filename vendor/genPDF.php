<?php
require_once 'connect.php';
require_once 'fpdf/fpdf.php';
session_start();
$image = [];
$image = array_merge($image, $_SESSION['work_img']);
$k = $_GET['k'];
$images = [];


$image_id = [];
$image_id = array_merge($image, $_SESSION['work']);


for ($i = 0; $i < $k; $i++) {
    $images = array_merge($images, $image);
}

$title = $_GET['title'];
$subtitle = $_GET['subtitle'];
$maxImagesPerPage = $_GET['maxImagesPerPage'];
$columns = $_GET['columns'];
$margin = $_GET['margin'];
$horizontalGutter = $_GET['horizontalGutter'];
$verticalGutter = $_GET['verticalGutter'];
$creator_id = $_COOKIE['user_id'];

class MyPDF extends FPDF {
    function generatePDF($images, $maxImagesPerPage) {
        $columns = $_GET['columns'];
        $rows = ceil($maxImagesPerPage / $columns); // Количество рядов на странице

        $margin = $_GET['margin'];
        $horizontalGutter = $_GET['horizontalGutter'];
        $verticalGutter = $_GET['verticalGutter'];

        $pageWidth = $this->GetPageWidth() - 2 * $margin; // Ширина страницы без учёта отступов
        $pageHeight = $this->GetPageHeight() - 2 * $margin; // Высота страницы без учёта отступов

        $cellWidth = ($pageWidth - ($columns - 1) * $horizontalGutter) / $columns; // Ширина ячейки
        $cellHeight = ($pageHeight - ($rows - 1) * $verticalGutter) / $rows; // Высота ячейки

        $currentImageIndex = 0; // Индекс текущего изображения
        $temp = 0;
        foreach ($images as $image) {
            if (!file_exists($image)) {
                continue;
            }

            // Проверяем, осталась ли свободная ячейка на текущей странице
            if ($currentImageIndex >= $maxImagesPerPage) {
                $this->AddPage(); // Переход на следующую страницу
                $currentImageIndex = 0; // Сбрасываем счётчик изображений на новой странице
            }

            // Если это первая итерация, создаём первую страницу
            if ($temp === 0) {
                $this->AddPage();
                $temp = 1;
            }

            // Вычисление позиций изображения на странице
            $x = $margin + ($currentImageIndex % $columns) * ($cellWidth + $horizontalGutter);
            $y = $margin + floor($currentImageIndex / $columns) * ($cellHeight + $verticalGutter);

            // Вычисление размеров изображения
            list($width, $height) = getimagesize($image);
            $ratio = min($cellWidth / $width, $cellHeight / $height);
            $newWidth = $width * $ratio;
            $newHeight = $height * $ratio;

            // Центрируем изображение внутри ячейки
            $x += ($cellWidth - $newWidth) / 2;
            $y += ($cellHeight - $newHeight) / 2;

            // Вставляем изображение
            $this->Image($image, $x, $y, $newWidth, $newHeight);

            $currentImageIndex++; // Переходим к следующему изображению
        }

        return $this->Output('S'); // Возвращаем содержимое PDF как строку
    }
}

// Создаём объект класса MyPDF
$pdf = new MyPDF();

// Генерация PDF
$output = $pdf->generatePDF($images, $maxImagesPerPage);

// Сохраняем файл
$time = time().'-'.mt_rand();
$fileName = '../uploads/pdf/'.$time.'.pdf';
file_put_contents($fileName, $output);

mysqli_query($connect, "INSERT INTO `work` (`id`, `logo`, `title`, `subtitle`, `k`, `maxImagesPerPage`, `columns`, `margin`, `horizontalGutter`, `verticalGutter`, `creator_id`, `likes`, `status`) VALUES (NULL, '', '$title', '$subtitle', '$k', '$maxImagesPerPage', '$columns', '$margin', '$horizontalGutter', '$verticalGutter', '$creator_id', '0', '1');");

$sql = mysqli_query($connect, "SELECT MAX(id) FROM `work`");
$result = mysqli_fetch_assoc($sql);
$work_id = $result['MAX(id)'];


foreach ($image_id as $image) {
    mysqli_query($connect, "INSERT INTO `work_shapes` (`id`, `work_id`, `shapes_id`) VALUES (NULL, '$work_id', '$image');");
}
// Просматриваем PDF
header('Location: ../create_work_finalyStep.php'. '?iframe='.$fileName.'&k='. $k.'&maxImagesPerPage='. $_GET['maxImagesPerPage'] . '&columns=' . $_GET['columns'] . '&margin=' . $_GET['margin'] . '&horizontalGutter=' . $_GET['horizontalGutter'] . '&verticalGutter=' . $_GET['verticalGutter'] . ' ');
readfile($fileName);
?>