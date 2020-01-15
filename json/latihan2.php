<?php
    $data = file_get_contents('https://www.bola.net/');

    $mahasiswa = json_decode($data, true);

    var_dump($mahasiswa);
    // echo $mahasiswa;
?>