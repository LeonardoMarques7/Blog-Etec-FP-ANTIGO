<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog FP | Editando Post</title>
    <link rel="shortcut icon" href="./img/288-logo-etec-fernando-prestes.svg" type="image/svg">
    <!-- Estilização -->
    <link id="style-link" rel="stylesheet" href="./css/style.css">
    <!-- Fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
</head>
<style>
    input[type="checkbox"] {
        appearance: none;
    }

    label, input[type="checkbox"]:hover {
        cursor: pointer;
    }

    #nav-links .img-modo {
        width: 18px;
        margin-top: 2px;
    }

    body {
        display: none;
    }

    a b {
        font-weight: bold;
        font-size: 12px;
        border: 1px solid #e50000;
        padding: 2px;
        border-radius: 2px;
        background-color: #e50000;
        color: #fff;
        transition: 0.4s;
    }

    .link-turne:hover b, .link-turne a:hover{
        color: #fff;
    }

    a:hover b {
        border: 1px solid #a70000;
        background-color: #a70000;
    }

    #foto-user {
        width: 24pt; 
        margin-right: 5px;
    }

    h2 b {
        font-weight: normal;
        color: #000;
    } 
</style>
<body>
    <header id="home">
        <nav id="navbar">
            <div id="navbar-inner">
                <img src="./img/288-logo-etec-fernando-prestes.svg" alt="" id="logo-page" style="filter: invert(100%);">
                <ul id="nav-links">
                    <li><a href="index.php" class="active">Home</a></li>
                    <li><a href="./login.php">Administrador</a></li>
                    <li>
                        <label class="switch">
                            <input type="checkbox" id="style-toggle">
                            <img src="./img/modo-escuro.png" id="img" alt="Toggle Image" class="img-modo" data-dark-image="./img/modo-claro.png">
                        </label>
                    </li>
                </ul>
            </div>
        </nav>
        
    </header>
    <?php echo '<link rel="stylesheet" href="./css/style-post.css">' ?>
    <div class="container">
        <main id="posts-container">
            <?php
                include('conexao.php');
                $codigo = $_POST['codigo'];

                $titulo = $_POST['titulo'];	
                $assunto = $_POST['assunto'];	
                $autor = $_POST['autor'];	
                $link = $_POST['link'];	
                $datePost = $_POST['datePost'];
                $foto = $_FILES['arquivo']['name']; 
                $foto_tmp = $_FILES['arquivo']['tmp_name']; 

                // Verificar se um novo arquivo foi enviado
                if (!empty($foto)) {
                    // Processar o upload do novo arquivo e mover para o destino desejado
                    move_uploaded_file($foto_tmp, "posts/" . $foto);
                
                    // Atualizar o campo "imagem" na consulta SQL apenas se um novo arquivo foi enviado
                    $sqlupdate = "UPDATE post SET foto='$foto', titulo='$titulo', assunto='$assunto', autor='$autor', link='$link', datePost='$datePost' WHERE codigo='$codigo'";
                } else {
                    // Se nenhum novo arquivo foi enviado, manter o valor atual do campo "imagem"
                    $sqlupdate = "UPDATE post SET titulo='$titulo', assunto='$assunto', autor='$autor', link='$link', datePost='$datePost' WHERE codigo='$codigo'";
                }


                // executando instrução SQL
                $resultado = @mysqli_query($conexao, $sqlupdate);
                if (!$resultado) {
                    echo '<a href="index.php" class="btn btn-outline-primary w-100">Voltar</a>';
                    die('<b>Query Inválida:</b>' . @mysqli_error($conexao)); 
                } else {
                    echo '<script>
                            setTimeout(function() {
                                window.location.href = "dashbord.php";
                            }, 1000);
                        </script>';
                } 
                mysqli_close($conexao);
            ?>
        </main>
    </div>
    
    <script src="./js/script.js"></script>
    <script src="./js/awsome/all.min.js"></script>
    <!-- Finalizando Seção de Projeto de Blog Semântico com HTML5 e CSS3 (23.08.2023) => {19:05}; -->
</body>
</html>