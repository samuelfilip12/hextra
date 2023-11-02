<?php

date_default_timezone_set('America/Sao_Paulo');

$data = new DateTime($_POST["data"]);
$diaSemana = date('w', $data->getTimestamp());

$entrada = $_POST["entrada"];
$inicioIntervalo = $_POST["inicioIntervalo"];
$fimIntervalo = $_POST["fimIntervalo"];
$saida = $_POST["saida"];
function calcularHoras($diaSemana, $entrada, $saida, $inicioIntervalo, $fimIntervalo)
{
    // Converter as horas para timestamps
    $entradaTimestamp = strtotime($entrada);
    $saidaTimestamp = strtotime($saida);
    $inicioIntervaloTimestamp = strtotime($inicioIntervalo);
    $fimIntervaloTimestamp = strtotime($fimIntervalo);

    // Calcular a diferença entre a hora de saída e a hora de entrada
    $diferencaHoras = ($saidaTimestamp - $entradaTimestamp) / 3600;

    // Calcular a duração do intervalo
    $duracaoIntervalo = ($fimIntervaloTimestamp - $inicioIntervaloTimestamp) / 3600;

    // Calcular as horas trabalhadas subtraindo a duração do intervalo
    $totalHoras = $diferencaHoras - $duracaoIntervalo;

    $cargaHorasDiaSemana = 8;
    $cargaHorasSabado = 4;

    if ($diaSemana == 6) {
        // A data é um sábado.
        $cargaHoras = $cargaHorasSabado;
    } else if ($diaSemana >=1 && $diaSemana <= 6) {
        // A data não é um sábado.
        $cargaHoras = $cargaHorasDiaSemana;
    }

    $horasExtras = $totalHoras - $cargaHoras;

    return [$horasExtras, $totalHoras];
}

$urlHome = "http://localhost/hextra";

include ("conexao.php");

list($horasExtras, $totalHoras) = calcularHoras($diaSemana, $entrada, $saida, $inicioIntervalo, $fimIntervalo);

$sql = "INSERT INTO registro_ponto (data, horaEntrada, inicioIntervalo, fimIntervalo, horaSaida, horasTrabalhadas, horasExtras) VALUES (?, ?, ?, ?, ?, ?, ?)";

// Preparar a declaração SQL
if ($stmt = $mysqli->prepare($sql)) {
    // Vincular parâmetros e seus tipos (s = string, d = double)
    $stmt->bind_param("sssssdd", $_POST["data"], $entrada, $inicioIntervalo, $fimIntervalo,  $saida, $totalHoras, $horasExtras);

    // Executar a declaração
    if ($stmt->execute()) {
        echo "<script>location.href='$urlHome'</script>";
    } else {
        echo "Erro ao inserir dados: " . $stmt->error;
    }
    // Fechar a declaração
    $stmt->close();
} else {
    echo "Erro na preparação da declaração: ";
}

// Fechar a conexão
$mysqli->close();
