<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Calculo hora Extra</title>
    <link rel="stylesheet" href="public/assets/css/index.css">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
</head>

<body>

    <?php include("app/views/header.php"); ?>

    <div id="message" style="display: none;">Mensagem de confirmação aqui.</div>

    <form class="form-container" id="myForm" method="post" action="app/classes/inserirRegistro.php">
        <div class="form-group">
            <label for="data">Data</label>
            <input type="date" name="data" required>
        </div>
        <div class="form-group">
            <label for="entrada">Horas Entrada</label>
            <input type="time" name="entrada" required>

            <label for="inicioIntervalo">Inicio Intervalo</label>
            <input type="time" name="inicioIntervalo" required>
        </div>
        <div class="form-group">
            <label for="fimIntervalo">Fim Intervalo</label>
            <input type="time" name="fimIntervalo" required>

            <label for="saida">Saída</label>
            <input type="time" name="saida" required>
        </div>
        <button class="form-submit-btn" type="submit">Adicionar Ponto</button>
    </form>

    <?php include("app/views/footer.php"); ?>

    <script>
        document.getElementById("myForm").addEventListener("submit", function(e) {
            // Impede o envio padrão apenas temporariamente
            e.preventDefault();

            // Aqui você pode adicionar código para enviar o formulário com AJAX para o arquivo PHP de processamento

            // Exemplo de como mostrar a mensagem
            var message = document.getElementById("message");
            message.style.display = "block";
            setTimeout(function() {
                message.style.display = "none";

                // Agora, permita o envio padrão
                document.getElementById("myForm").submit();
            }, 2000); // A mensagem desaparecerá após 3 segundos (ajuste conforme necessário)
        });
    </script>

</body>


</html>