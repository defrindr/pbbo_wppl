<?php

$list_user = [
    "Sidoarjo",
    "Balongbendo",
    "Buduran",
    "Candi",
    "Gedangan",
    "Jabon",
    "Krembung",
    "Krian",
    "Prambon",
    "Porong",
    "Sedati",
    "Sukodono",
    "Taman",
    "Tanggulangin",
    "Tarik",
    "Tulangan",
    "Waru",
    "Wonoayu",
];

$koneksi = mysqli_connect("localhost", "root", "defrindr", "db_pelatihan_online") or die("error");

foreach($list_user as $user){
    $userlower = strtolower($user);
    $password = md5("sidoarjo");
    $query = "INSERT INTO `user`(`username`, `password`, `name`, `role_id`) values ('kasibag_$userlower', '$password', 'Kasi Pembangunan $user', '2') , ('kasiperekonomian_$userlower', '$password', 'Kasi Perekonomian $user', '2');";
    echo $query;
    $res = mysqli_query($koneksi, $query);

}