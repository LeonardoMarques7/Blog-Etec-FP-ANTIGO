<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog FP | Criando Post</title>
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
    <?php 
        include("conexao.php");
    ?>
    <header id="home">
        <nav id="navbar">
            <div id="navbar-inner">
                <img src="./img/288-logo-etec-fernando-prestes.svg" alt="" id="logo-page" style="filter: invert(100%);">
                <ul id="nav-links">
                    <li><a href="index.php" class="active">Home</a></li>
                    <li><a href="./dashbord.php">Administrador</a></li>
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
            <form name="produto" action="criarPost.php" class="form border rounded shadow-lg" method="post" enctype="multipart/form-data"><br><br>
                <h1 style="color: #39f;">Criando Post</h1><br>
                <div class="col text-start">
                    <b>Imagem do Post:</b><br><input class="form-control border-primary input-file" type="file" name="arquivo" id="arquivo" title="Imagem do Post">
                </div><br>
                <div class="col text-start">
                    <b>Código do Post:</b><br><input class="form-control border-primary" type="number" placeholder="Digite o Código do Post" name="codigo" id="codigo" title="Digite o Código do Post">
                </div><br>
                <div class="col text-start">
                    <b>Título do Post:</b><br><input class="form-control border-primary" placeholder="Digite o Título" type="text"  name="titulo" id="titulo" maxlength="80" title="Digite o Título"> 
                </div><br>
                <div class="col text-start">
                    <b>Assuno do Post:</b><br><textarea id="assunto" rows="10" cols="50" name="assunto"></textarea><br>
                    <button type="button" class="btn-small-textarea" onclick="adicionarAtalho('<strong></strong>')"><i class="fa-solid fa-bold"></i></button>
                    <button type="button" class="btn-small-textarea" onclick="adicionarAtalho('<em></em>')"><i class="fa-solid fa-italic"></i></button>
                    <button type="button" class="btn-small-textarea" onclick="adicionarAtalho('<a href=&quot;URL&quot;></a>')"><i class="fa-solid fa-link"></i></button>
                    <script>
                        function adicionarAtalho(atalho) {
                            var editor = document.getElementById("assunto");
                            var textoAtual = editor.value;
                            var selecaoInicio = editor.selectionStart;
                            var selecaoFim = editor.selectionEnd;
                            
                            var textoAntes = textoAtual.substring(0, selecaoInicio);
                            var textoDepois = textoAtual.substring(selecaoFim);
                            
                            var novoTexto = textoAntes + atalho + textoDepois;
                            
                            editor.value = novoTexto;
                            
                            // Atualize a posição do cursor após a inserção do atalho
                            var novaPosicaoCursor = selecaoInicio + atalho.length;
                            editor.setSelectionRange(novaPosicaoCursor, novaPosicaoCursor);
                        }
                    </script>
                </div><br>
                <div class="col text-start">
                    <b>Autor do Post:</b><br><input class="form-control border-primary" placeholder="Digite o Autor" type="text" name="autor" id="autor" required title="Digite o Autor"></input>
                </div><br>
                <div class="col text-start">
                    <b>Link do Post:</b><br><input class="form-control border-primary" placeholder="Digite o Link" type="text" name="link" id="link" title="Digite o Link do Post"></input>
                </div><br>
                <div class="col text-start">
                    <b>Data de Cadastra:</b><br><input class="form-control text-center border-primary" name="datePost" id="datePost" type="datetime-local" required title="Digite data do Post"></input>
                </div><br>
                <div class="d-grid col-md-9">
                    <button class="btn btn-primary" type="submit" title="Enviar" style="color: 444;">Enviar</button>
                    <button class="btn btn-outline-danger shadow" type="reset" title="Limpar">Limpar</button>
                    <a href="dashbord.php"><button class="btn btn-voltar shadow" type="button" title="Voltar">Voltar</button></a>
                </div>
                <br><br>
            </form>
        </main>
        <aside id="sidebar">
            <section id="search-bar">
            </section>
            <section id="categories">
                <h4>Links Úteis</h4>
                <nav>
                    <ul>
                        <li><a href="https://www.etecfernandoprestes.com.br/">Etec Fernando Prestes</a></li>
                        <li><a href="https://www.vestibulinhoetec.com.br/home/">Vestibulinho</a></li>
                        <li><a href="https://www.vestibulinhoetec.com.br/unidades-cursos/escola.asp?c=91">Cursos</a></li>
                        <li><a href="./criadores.html">Criadores</a></li>
                    </ul>
                </nav>
            </section>
            <section id="redes">
                <h4>Redes Socias</h4>
                <div id="tags-container-2">
                    <a href="https://www.instagram.com/etecfernandoprestes/" title="INSTAGRAM"><i class="fab fa-instagram"></i></a>   
                    <a href="https://www.facebook.com/etecfernando" title="FACEBOOK"><i class="fab fa-facebook"></i></a>
                    <a href="https://www.youtube.com/@EtecFernandoPrestesCPS" title="YOUTUBE"><i class="fa-brands fa-youtube"></i></a>
                </div>
            </section>
        </aside>
    </div>
    
    <script src="./js/script.js"></script>
    <script src="./js/awsome/all.min.js"></script>
    <!-- Finalizando Seção de Projeto de Blog Semântico com HTML5 e CSS3 (23.08.2023) => {19:05}; -->
</body>
</html>