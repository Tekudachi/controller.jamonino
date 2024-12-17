<?php
header("Content-Type: application/json");

$function = $_SERVER['HTTP_FUNCTION'] ?? null;
$numA = $_SERVER['HTTP_NUMA'] ?? null;
$numB = $_SERVER['HTTP_NUMB'] ?? null;

if (!$function || !is_numeric($numA) || !is_numeric($numB)) {
    echo json_encode(["error" => "Parámetros inválidos"]);
    exit;
}

$numA = (float) $numA;
$numB = (float) $numB;

switch ($function) {
    case "suma":
        $result = $numA + $numB;
        break;
    case "resta":
        $result = $numA - $numB;
        break;
    case "multiplicacion":
        $result = $numA * $numB;
        break;
    case "division":
        $result = $numB != 0 ? $numA / $numB : "Error: División por cero";
        break;
    default:
        $result = "Operación no válida";
        break;
}

echo json_encode([
    "function" => $function,
    "num1" => $numA,
    "num2" => $numB,
    "resultado" => $result
]);
