<?php

use Carbon\Carbon;

function tgl_id($tgl)
{
    $tgl = new Carbon($tgl);
    setlocale(LC_TIME, 'IND');
    return $tgl->formatLocalized('%d %B %Y');
}
