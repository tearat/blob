<?php

$mysql = mysqli_connect('localhost', 'root', 'root', 'test') or die('Database connection error');

if ( isset($_GET['id']) )
{
    $id = $_GET['id'];
    $sql = "SELECT * FROM `images` WHERE id = $id;";
} else
{
    $sql = "SELECT * FROM `images`;";
}

$result = mysqli_query($mysql, $sql);
while ($row = mysqli_fetch_assoc($result))
{
    $images[] = $row;
}

function loadImage($image)
{
    // header('Content-type: image/jpeg');
    // header('data:image/jpeg;base64, ');
    echo 'data:image/jpeg;base64, ';
    echo base64_encode($image['blob']);
}

require '../html/gallery.html';

?>
