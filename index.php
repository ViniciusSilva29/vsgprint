<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados e cadastro!</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body align = "center">

    <div class="container">
        
        <h1>CALCULE SEU FRETE!</h1>

        <div class="form">
            

    
            <form action="processo.php" method="post">

                <label for="nome"><strong>Escreva seu nome:</strong></label>   
                <br>    
                <input type="text" name="nome" placeholder="Nome" required>

                <br>
                <br>

                <label for="valor"><strong>Valo da sua compra (R$):</strong></label>
                <br>
                <input type="number" name="valor" placeholder="Valor da compra" required>

                <br>
                <br>

                <label for="peso"><strong>Peso do produto (kg):</strong></label>
                <br>
                <input type="number" name="peso" placeholder="Peso do produto (kg)" required>

                <br>
                <br>

                <label for="distancia"><strong>Distância (km):</strong></label>
                <br>
                <input type="number" name="distancia" placeholder="Distância (km)" required>

                <br>
                <br>

                <label for="produto"><strong>Tipo de produto:</strong></label>
                <br>
                <select name="produto" id="produto" required>
                    <option value="normal">Normal</option>
                    <option value="fragil">Frágil</option>
                </select>
        
                <br>
                <br>

                <label for="entrega"><strong>Escolha sua entrega:</strong></label>

                <br>

                <select name="entrega" id="entrega">
                    <option value="economica">Economica</option required>
                    <option value="normal">Normal</option>
                    <option value="expressa">Expressa</option>
                    <option value="retirada">Retirada</option>
                </select>

                <br>
                <br>

                <button type="submit">Enviar</button>

            </form>

        </div>
    
    </div>

    <footer>
        &COPY; Todos os direitos reservados - VSG PRINT
    </footer>

    

    
</body>
</html>