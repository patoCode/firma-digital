<?php

function format($fecha) {
    $year = substr($fecha, 2, 4);
    $month = substr($fecha, 6, 2);
    $day = substr($fecha, 8, 2);
    $hour = substr($fecha, 10, 2);
    $min = substr($fecha, 12, 2);
    $seg = substr($fecha, 14, 2);
    return $year.'-'.$month.'-'.$day.' '.$hour.':'.$min.':'.$seg;
}

function getOID($OID, $ssl) {
    preg_match('/\/' . $OID  . '=([^\/]+)/', $ssl, $matches);
    return $matches[1];
}

$json = json_decode(pdfsig_php('./prueba.pdf'));

echo "<b>Nro de firmas: ".count($json)."</b></br></br>";

for ($i = 0; $i < count($json); $i++) {
    echo "<b>Estado:</b> ".$json[$i]->estadoFirma."</br>";
    echo "<b>Fecha:</b> ".format($json[$i]->fechaFirma)."</br>";
    echo "<b>Usuario:</b> ".$json[$i]->certificados[0]->nombre."</br>";
    $str = $json[$i]->certificados[0]->certificado;
    $ssl = openssl_x509_parse($str);
    echo "<b>CI:</b> ".getOID('1.3.6.1.1.1.1.0', $ssl['name'])."</br>";
}
