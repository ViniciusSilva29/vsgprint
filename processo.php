
    <?php

        $nome = $_POST['nome'];
        $valor = $_POST['valor'];
        $peso = $_POST['peso'];
        $distancia = $_POST['distancia'];
        $produto = $_POST['produto'];
        $entrega = $_POST['entrega'];

        $total = 0;
        $detalhes = [];

        $prazo = "";


        if ($valor > 500) {
            $total = 0;
            $detalhes[] = "Compra acima de R$500 → Frete grátis";
        } else {

            switch ($entrega) {

                case "economica":

                    if ($peso <= 5) {
                        $base = 10;
                    } else {
                        $base = 20;
                    }

                    $prazo = ($distancia <= 50) ? "3 dias" :
                            (($distancia <= 200) ? "5 dias" : "8 dias");

                    if ($distancia > 100) {
                        $base += 10;
                        $detalhes[] = "Taxa distância (>100km): +10";
                    }

                break;

                case "normal":

                    if ($peso <= 5) {
                        $base = 20;
                    } elseif ($peso <= 10) {
                        $base = 35;
                    } else {
                        $base = 50;
                    }

                    $prazo = ($distancia <= 50) ? "2 dias" :
                            (($distancia <= 200) ? "4 dias" : "6 dias");

                    if ($distancia > 100) {
                        $base += 15;
                        $detalhes[] = "Taxa distância (>100km): +15";
                    }

                break;

                case "expressa":

                    $base = 50;

                    if ($peso > 10) {
                        $base += 20;
                        $detalhes[] = "Peso >10kg: +20";
                    }

                    if ($distancia > 100) {
                        $base += 20;
                        $detalhes[] = "Distância >100km: +20";
                    }

                    $prazo = ($distancia <= 100) ? "1 dia" : "2 dias";

                break;

                case "retirada":
                    $base = 0;
                    $prazo = "Imediato";
                    $detalhes[] = "Retirada na loja → sem custo";
                break;
            }

            $total = $base;
            $detalhes[] = "Base: R$ $base";

            // KM (>200)
            if ($distancia > 200) {
                $extraKm = ($distancia - 200) * 1;
                $total += $extraKm;
                $detalhes[] = "Extra km (acima de 200): +$extraKm";
            }

            // fragil
            if ($produto == "fragil") {
                $total += 15;
                $detalhes[] = "Produto frágil: +15";
            }
        }

        ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Dados e cadastro!</title>
            <link rel="stylesheet" href="css/processo.css">
        </head>
        <body align = "center">

        <h1>Nota Fiscal de Frete</h1>

        <div class="container">

        <p><strong>Cliente:</strong> <?= $nome ?></p>
        <p><strong>Valor da compra:</strong> R$ <?= $valor ?></p>
        <p><strong>Peso:</strong> <?= $peso ?> kg</p>
        <p><strong>Distância:</strong> <?= $distancia ?> km</p>
        <p><strong>Tipo de entrega:</strong> <?= $entrega ?></p>
        <p><strong>Prazo:</strong> <?= $prazo ?></p>


        <h3>Detalhamento:</h3>

        <ul>
            <?php
            foreach ($detalhes as $item) {
                echo "<li>$item</li>";
            }
            ?>
        </ul>

        <h2>Total do Frete: R$ <?= number_format($total, 2, ',', '.') ?></h2>

        


        </div>

            <footer>
                &COPY; Todos os direitos reservados - VSG PRINT
            </footer>

        </body>
        </html>