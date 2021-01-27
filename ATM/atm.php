<?php

$denomimations = $_POST['denomination'];
$amount = intval($_POST['amount']);

$denomimations = explode(', ', $denomimations);
arsort($denomimations);

$response = $result_table = array();
$balance = 0;

foreach ($denomimations as $denomimation) {
    $count = 0;
    $balance = $amount;

    while(true) {
        if ($balance - $denomimation < 0) break;
        
        $balance -= $denomimation;
        $count++;
    }

    $result_table[strval($denomimation)] = $count;
}

if ($balance != 0) {
    $start = $amount - $balance;
    $end = $amount + end($denomimations) - $balance;

    $response['text'] = 'Неверная сумма. Выберите '.$start.' или '.$end.'.';
} else {
    $response['table'] = $result_table;
}

echo json_encode($response);