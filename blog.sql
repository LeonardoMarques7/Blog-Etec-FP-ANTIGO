CREATE DATABASE Blog;
USE Blog;

-- Criando TABELAS (Post e Users)

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `codigo` int(30) NOT NULL,
  `foto` varchar(30) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `assunto` varchar(1000) DEFAULT NULL,
  `autor` varchar(255) DEFAULT NULL,
  `link` varchar(1000) DEFAULT NULL,
  `datePost` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `users` (
  `login` varchar(255) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Cadastrando VALORES (Posts e Users)

INSERT INTO `post` (`id`, `codigo`, `foto`, `titulo`, `assunto`, `autor`, `link`, `datePost`) VALUES
(0, 11111, 'f1.png', 'Etecs recebem inscrições para processo seletivo do primeiro semestre de 2024', 'As Etecs (Escolas Técnicas Estaduais) abriram as inscrições para o processo seletivo do primeiro semestre de 2024. As inscrições vão até 8 de novembro e devem ser feitas pelo site <strong><a href=\"https://www.vestibulinhoetec.com.br/home/\">Vestibulinho</a></strong>. O valor da taxa de inscrição é de R$ 34. Já o exame será aplicado em 10 de dezembro.\r\n\r\n', 'Leonardo Marques', 'https://www.vestibulinhoetec.com.br/home/', '2023-10-09 07:53:00'),
(0, 22222, 'f2.png', 'Obra da construção FINALIZADA da nova cozinha do Fernando Prestes', 'Obra da construção da nova cozinha foi entregada, já começou a ser distribuída a merenda desde 20 setembro, essa obra foi feita em torno de 3 meses. As vantagens dessa nova cozinha, é que a distribuição da merenda é mais rápida e pratica, com os próprios alunos pegando sua comida e duas filas separadas. Isso não era possível na outra cozinha por seu espaço pequeno.', 'Gabriel Annuciato', 'https://www.etecfernandoprestes.com.br/', '2023-11-11 08:04:00'),
(0, 33333, 'f3.png', 'Começaram as provas esportivas da XXIV Gincana da Amizade do FP', 'Times da <strong>Etec Fernando Prestes (FP)</strong>, se unem para vencer provas em esportes(vôlei, futsal, tênis de mesa..). Cada equipe é formada pelos 3 anos de curso, por exemplo: (1°, 2°, 3° ano) de Desenvolvimento de Sistemas.\r\nE assim são formadas as equipes com essa mistura. Além disso com as participações e pódios, essas equipes arrecadam pontos, que vão sendo acumulados para no final do ano termos o OSCAR, neste evento a equipe que conseguir mais pontos ganha o troféu da gincana da amizade.', 'Manoela Moraes', 'www.instagram.com/etecfernandoprestes/', '2023-10-11 07:24:00');

INSERT INTO `users` (`login`, `senha`, `nome`) VALUES
('leo@gmail.com', '1608', 'Leonardo Marques'),
('dan@gmail.com', '7528', 'Daniel Moreira'),
('manu@gmail.com', '0808', 'Manoela Moraes');