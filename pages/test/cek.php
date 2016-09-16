<?php
/**
 * Created by PhpStorm.
 * User: Hikman
 * Date: 31/12/15
 * Time: 22:04
 */

if($_POST['ambil_data'] == 'waktu'){
    echo 'Waktu sekarang adalah : ' . date('Y-m-d H:i:s');
} else if($_POST['ambil_data'] == 'nama'){
    echo 'Hikman';
}
