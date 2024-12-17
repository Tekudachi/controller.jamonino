<?php
header("Content-Type: application/json");

$request_uri = explode("/", trim($_SERVER['REQUEST_URI'], "/"));
$function = $request_uri[1] ?? null;
$numA = $request_uri[2] ?? null;
$numB = $request_uri[3] ?? null;

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
