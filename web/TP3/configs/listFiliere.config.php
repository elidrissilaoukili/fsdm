<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['SMI'])) {
        $f = 'SMI';
        $std = getListeParFiliere($f);
    }

    if (isset($_POST['SMA'])) {
        $f = 'SMA';
        $std = getListeParFiliere($f);
    }

    if (isset($_POST['SMP'])) {
        $f = 'SMP';
        $std = getListeParFiliere($f);
    }

    if (isset($_POST['SMC'])) {
        $f = 'SMC';
        $std = getListeParFiliere($f);
    }
}


function getF($f){
    return $f;
}