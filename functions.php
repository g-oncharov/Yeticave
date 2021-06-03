<?php
function renderTemplate($file, $arr)
{
    $result = '';

    if (!file_exists($file)) {
        return $result;
    }

    ob_start();
    extract($arr);
    require_once($file);

    $result = ob_get_clean();

    return $result;
}

function pricefun($num)
{
    $num = ceil($num);
    if ($num > 1000) {
        $num = number_format($num, 0, '', ' ');
    }
    return $num . ' грн.';
}
