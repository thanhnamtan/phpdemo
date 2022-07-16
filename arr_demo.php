<?php

$a = [
    142 => [
        166 => [1804, 1805],
        167 => [1806, 1807, 1808]
    ],
    93 => [
        57 => [1806, 1809],
        59 => [1804, 1807]
    ]
    ,
    // 100 => [
    //     1 => [2000, 20001],
    //     2 => [1804, 20002]
    // ]
];

function pt($data)
{
    $arr = array_values($data);  $arr_data = [];
    for ($i=0; $i < count($arr); $i++) { 
        if ($i == 0) {
            $arr_data = $arr[$i];
        }else {
            foreach ($arr_data as $key => $value) {
                foreach ($arr[$i] as $k => $val) {
                    if (check_ar_2($value)) {
                        $er_ar = $value;
                        $er_ar[] = $val;
                        $tmp[$key."->".$k] = $er_ar;
                    }else{
                        $tmp[$key."->".$k] = [$value, $val];
                    }
                    
                }
            }
            $arr_data = $tmp;
            $tmp = [];
        }
    }
    return $arr_data;
}

function check_ar_2($arr1)
{
    if (is_array($arr1)) {
        foreach ($arr1 as $key => $value) {
            if (is_array($value)) {
                return true;
            }
        }
    }
    return false;
}

function apply($arr, $first = false)
{
    $keys = [];
    foreach ($arr as $key => $value) {
        if (count($val = call_user_func_array("array_intersect", $value)) > 0) {
            if ($first) {
                return ["key" => $key, "value" => $val];
            }
            $keys[] = ["key" => $key, "value" => $val];
        };
    }
    return $keys;
}

$op = var_export(apply(pt($a, true)));
?>