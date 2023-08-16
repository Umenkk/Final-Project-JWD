<?php
    function hitung($angka1, $angka2, $operasi){

        switch($operasi){
            default:
            case 'kali':
                $hasil = $angka1 * $angka2;
                break;
            case'bagi':
                $hasil = $angka1 / $angka2;
        }

        return $hasil;
    }

?>