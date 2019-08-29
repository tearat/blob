<?php

if( $_FILES['image'] )
{
    $mysql = mysqli_connect('localhost', 'root', 'root', 'test') or die('Database connection error');
    $filepath = $_FILES['image']['tmp_name'];
    $handle = fopen($filepath, "rb");
    if ($handle) {
        $length = fstat($handle)['size']; // Full size
        $bytes = fread($handle, $length);

        $bytes_escaped = mysqli_real_escape_string($mysql, $bytes);

        $sql = "INSERT INTO `images` (`blob`) VALUES ('$bytes_escaped');";
        $result = mysqli_query($mysql, $sql);
    }
    header('location: /php/gallery.php');
}

?>
