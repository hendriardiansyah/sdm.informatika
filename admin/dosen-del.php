<?php

    include ('../koneksi.php');

    $id= $_POST['item_id'];

    // delete data dosen
    $q = "DELETE FROM t_dosen WHERE nidn = $id";
    $r = mysqli_query($koneksi, $q);

    if($r) {
        echo "success";
    }
    else
    {
        echo "failed: ".mysqli_error($koneksi);
    }
?>