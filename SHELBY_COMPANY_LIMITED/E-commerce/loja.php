<?php

session_start();
require("conexao.php");

// Verifica se o usuário está logado
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

    // Prepara e executa a consulta SQL
    $stmt = $conn->prepare("SELECT users FROM credenciais WHERE id = :id");
    $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Exibe as informações do usuário logado
    if ($user) {
        $userName = $user['users'];
        $WelcomeMessage = "<strong>Bem Vindo!</strong>  Você está conectado como <strong>$userName</strong>";
        $logoutLink = "<br><br><a href='logout.php'>Sair</a>";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imagens/icon e-commerce.png" type="image/x-icon">
    <link rel="stylesheet" href="loja.css">
    <title>Loja Física da Barbearia</title>

    <script type="" src=""></script>

</head>

<body>
    <header>
        <form id="search-form" action="loja.php" method="get">
            <input type="text" id="search-input" name="query" placeholder="Pesquisar produtos">
            <button type="submit">Pesquisar</button>
        </form>

        <h1>Nossos Produtos</h1>
        <nav>
            <ul>
                <li><a href="#inicio">Início</a></li>
                <li><a href="#produtos">Produtos</a></li>
                <li><a href="#contato">Contato</a></li>
            </ul>
        </nav>
    </header>

    <?php if (isset($WelcomeMessage)) {

        echo $WelcomeMessage;
        echo $logoutLink;
    } else { ?>

    <?php } ?>

    <section id="inicio">
        <h2>Observação: Nossos produtos estão disponíveis exclusivamente em nossa loja física.</h2>
        <p>Explore nossa seleção de produtos de alta qualidade.</p>
    </section>


    <div id="no-results-message" style="display: none;">
        <p>Nenhum produto correspondente encontrado.</p>
    </div>

    <section id="produtos">
    <div class="product" data-searchable="Gillete Creme para Barbear - R$ 23,90">
    <a href="imagens/Gillete Creme para Barbear.png" target="_blank">
        <img src="imagens/Gillete Creme para Barbear.png" alt="Gillette Creme para Barbear 150mL">
    </a>
    
    <h3>Gillette Creme para Barbear 150mL</h3>
    <p><strong>Descrição do Produto:</strong></p>
    <p> • Creme de barbear com aloe vera para hidratação e suavidade.</p>
    <p> • Ideal para uso no chuveiro, mantendo-se na pele mesmo quando molhada.</p>
    <p> • Aplicação semi-transparente para maior visibilidade durante o barbear.</p>
    <p> • Protege e cuida da pele durante o barbear.</p>
    <p> • Facilita o deslizar da lâmina para um barbear rente e confortável.</p>
    <p> • Produto de qualidade Gillette com 150ml.</p>

    <p><strong>Preço:</strong> R$ 23,90</p>
</div>

        <div class="product" data-searchable="Bio Extratus Homem Shampoo Cabelos Grisalhos - R$ 36,90">
        <a href="imagens/Bio Extratus Homem Shampoo Cabelos Grisalhos.png" target="_blank">
    <img src="imagens/Bio Extratus Homem Shampoo Cabelos Grisalhos.png" alt="Bio Extratus Homem Shampoo Cabelos Grisalhos 250mL">
    </a>

    <h3>Bio Extratus Homem Shampoo Cabelos Grisalhos 250mL</h3>
    <p>Protege os fios claros do amarelamento e dá brilho aos fios escuros, sem alterar a cor natural. Sem adição de sal. pH 5,5.</p>

    <p><strong>Modo de usar:</strong></p>
    <p>Aplique nos cabelos molhados, massageando suavemente. Enxágue.<br> Se necessário, repita a aplicação. Para barbear, espalhe o produto no rosto umedecido<br> e barbeie como de costume. Enxágue.</p>

    <p><strong>Preço:</strong> R$ 36,90</p>
</div>

<div class="product" data-searchable=" Gillette Prestobarba Espuma de Barbear - R$ 15,99">
<a href="imagens/Gillette Prestobarba Espuma de Barbear.png" target="_blank">
    <img src="imagens/Gillette Prestobarba Espuma de Barbear.png" alt="Gillette Prestobarba Espuma de Barbear 56g">
    </a>

    <h3>Gillette Prestobarba Espuma de Barbear 56g</h3>

    <p><strong>Descrição do Produto:</strong></p>

    <p> • Ideal para peles sensíveis.</p>
    <p> • Lubrifica até 33% mais que outras espumas concorrentes.</p>
    <p> •Textura cremosa que facilita o deslizar da lâmina.</p>
    <p> • Proporciona um barbear mais rente e confortável.</p>
    <p> • Ajuda a prevenir irritações na pele.</p>

    <p><strong>Preço:</strong> R$ 15,99</p>
</div>
 
    </section>

    <a href="login.php" class="link" target="_blank">Login</a>
    <a href="registration.php" class="link" target="_blank">Registro</a>

    <section id="contato">

        <h2>Entre em Contato</h2>
        Se você tiver alguma dúvida sobre nossos produtos,<br><br>

        <div class="social-icon">
            <a href="https://wa.me/558185230542" target="_blank">
                <img src="imagens/Zap-icon.jpg" alt="Ícone do WhatsApp">
            </a>

    </section>

    <footer>
        <p>&copy; 2023 Barbearia da Loja Física. Todos os direitos reservados.</p>
    </footer>

    <script>

        document.addEventListener("DOMContentLoaded", function () {
            // Seleciona o formulário de pesquisa e o campo de entrada
            const searchForm = document.getElementById("search-form");
            const searchInput = document.getElementById("search-input");

            // Seleciona todos os elementos com a classe "product"
            const products = document.querySelectorAll(".product");

            // Adiciona um evento de "submit" ao formulário de pesquisa
            searchForm.addEventListener("submit", function (e) {
                e.preventDefault(); // Impede o envio padrão do formulário

                // Obtém o valor de pesquisa digitado no campo de entrada
                const query = searchInput.value.toLowerCase();

                // Itera sobre todos os elementos com a classe "product"
                products.forEach(function (product) {
                    // Obtém os dados pesquisáveis do elemento
                    const searchableData = product.getAttribute("data-searchable").toLowerCase();

                    // Verifica se a consulta está presente nos dados pesquisáveis
                    if (searchableData.includes(query)) {
                        // Se a consulta corresponder, exibe o produto
                        product.style.display = "block";
                    } else {
                        // Caso contrário, oculta o produto
                        product.style.display = "none";
                    }
                });

                // Exibe uma mensagem se nenhum produto for encontrado
                const noResultsMessage = document.getElementById("no-results-message");
                if (products.length > 0 && !Array.from(products).some(product => product.style.display === "block")) {
                    noResultsMessage.style.display = "block";
                } else {
                    noResultsMessage.style.display = "none";
                }
            });
        });

    </script>

</body>

</html>