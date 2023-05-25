-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Maio-2023 às 13:17
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sebastiao_alves_bd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acessos`
--

CREATE TABLE `acessos` (
  `id` int(11) NOT NULL,
  `data` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `acessos`
--

INSERT INTO `acessos` (`id`, `data`, `id_user`) VALUES
(17, '10:54:25 - 11/05/2023', 1),
(18, '11:26:21 - 11/05/2023', 1),
(19, '11:26:45 - 11/05/2023', 1),
(20, '11:26:56 - 11/05/2023', 1),
(21, '11:47:24 - 11/05/2023', 1),
(22, '11:53:45 - 11/05/2023', 1),
(23, '11:54:03 - 11/05/2023', 1),
(24, '23:25:26 - 11/05/2023', 1),
(25, '09:42:07 - 12/05/2023', 1),
(26, '15:46:01 - 12/05/2023', 1),
(27, '15:46:17 - 12/05/2023', 1),
(28, '18:55:21 - 15/05/2023', 2),
(29, '10:10:41 - 16/05/2023', 1),
(30, '21:12:46 - 16/05/2023', 2),
(31, '21:28:58 - 16/05/2023', 1),
(32, '20:36:34 - 19/05/2023', 1),
(33, '20:36:46 - 19/05/2023', 2),
(34, '20:37:03 - 19/05/2023', 2),
(35, '10:05:11 - 20/05/2023', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(150) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `admins`
--

INSERT INTO `admins` (`id`, `login`, `senha`, `nome`) VALUES
(1, 'admin', '$2y$10$05amVL5UTsMhZ3qIn701p.CPVD8zyphK5PgBoCdN9J4w3m/xMrDC.', 'Sebastião Alves'),
(2, 'codemaster', '$2y$10$HzaJ2P3SSOb8PxnU1RQ/fOUOrhNIfvjZw/guHFNwBC1Fg9uPBMf3e', 'Programador Codemaster');

-- --------------------------------------------------------

--
-- Estrutura da tabela `autor`
--

CREATE TABLE `autor` (
  `id` int(11) NOT NULL,
  `imagem` varchar(150) NOT NULL,
  `texto` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `autor`
--

INSERT INTO `autor` (`id`, `imagem`, `texto`) VALUES
(1, 'http://localhost/sebastiao_alves/recursos/imagens_para_site/desktop/conteudo.jpg', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam ullam mollitia, voluptatem, quam corrupti nostrum doloremque, perspiciatis animi officia in cupiditate nihil. Dignissimos adipisci, cum distinctio deleniti harum vero rerum quidem minima minus. Esse debitis at, provident itaque aliquam nulla quasi eligendi quod reiciendis amet earum, unde in reprehenderit natus veniam? Possimus quasi accusamus ipsum assumenda, dicta voluptatibus molestiae quae veniam modi, eius sequi porro perspiciatis similique ipsa nam magnam optio ad. Dolorem consequatur laborum maxime accusamus. Eligendi fugit iste earum aliquam exercitationem, natus pariatur ipsam, assumenda sapiente tempore accusamus, tenetur animi aperiam nesciunt fugiat qui dolores. Iste in aliquam deleniti vero. Officia, facere nulla, cumque dicta nam aliquid magni accusamus odio velit, impedit rem molestiae natus accusantium beatae. Possimus perferendis dolore incidunt tempore temporibus inventore similique dolorem totam at sapiente consequatur explicabo nostrum ducimus aperiam eos quos tenetur aspernatur, odit labore cum ab! Enim quasi perferendis ea ipsa ex, reiciendis accusantium qui quis in saepe voluptas libero odit doloremque, temporibus, quibusdam consequatur ad nesciunt soluta tempore dolores. Ex ea dignissimos necessitatibus tenetur blanditiis, ratione est minus porro suscipit exercitationem animi quod autem ad! Expedita doloremque quisquam unde architecto voluptates alias exercitationem, neque error voluptas dicta at odit tenetur perspiciatis recusandae ad quae? Eaque ratione assumenda dignissimos quaerat accusamus unde dolores, amet ipsum quisquam. Necessitatibus, fugit eos dolorem nihil, dolorum expedita repellat est nostrum obcaecati explicabo repellendus optio illo, iste quaerat ex at voluptate corrupti quibusdam tempore enim porro. Excepturi, nostrum nam? Omnis inventore officiis dolorem</p><p>&nbsp;</p><p>&nbsp;consequuntur, alias numquam quae ducimus sunt sint molestias! Quasi quibusdam, at possimus veniam molestiae perspiciatis nesciunt eum cupiditate omnis ab eveniet iusto quod qui animi quis id laudantium magnam delectus praesentium, optio nam voluptas numquam? Odio obcaecati nostrum neque? Sapiente blanditiis numquam ab voluptas laboriosam aspernatur cupiditate eligendi ullam pariatur delectus! Expedita, ab cum neque enim officiis iste necessitatibus, nesciunt minus odit quam asperiores blanditiis. Ratione sint eos aspernatur distinctio voluptatem accusamus rerum accusantium veritatis? Debitis amet deserunt, quibusdam fuga consequatur placeat incidunt enim consequuntur, quis ab nobis labore maxime ratione fugiat explicabo aperiam eligendi porro, ut nihil. Quas assumenda suscipit nesciunt incidunt est modi ullam voluptas a alias ipsum neque, quos necessitatibus impedit fuga odio enim rem, vitae et, corrupti deleniti magnam eaque voluptate. Harum, quis? Ab, perspiciatis? Suscipit a nulla labore aspernatur. Corporis totam, nam amet doloremque voluptate placeat ab error consequuntur voluptatem, quaerat in voluptas unde nobis culpa neque autem voluptatibus, mollitia recusandae quibusdam vel! Deserunt dolorem, inventore doloribus quam excepturi veniam doloremque perspiciatis aperiam nisi laudantium? A voluptatibus ducimus quidem dolorum dignissimos! Labore ex delectus eos ab aspernatur praesentium vitae qui. Quas recusandae dolores optio, quam provident non ab veritatis, repellat quod culpa eum saepe enim sapiente est quis maxime esse magni repellendus assumenda, tempore asperiores ducimus reiciendis corrupti. Soluta voluptates magni exercitationem sunt alias nobis unde aspernatur est enim laudantium dolorem quisquam doloribus, pariatur repellendus dolorum odit a similique nam, eligendi debitis commodi assumenda temporibus sint. Culpa, accusamus aperiam veritatis hic natus debitis rerum vitae aliquid, repudiandae quisquam facere.</p>');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cabecalhos`
--

CREATE TABLE `cabecalhos` (
  `id` int(11) NOT NULL,
  `imagem` varchar(150) NOT NULL,
  `imagem_mobile` varchar(150) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `sub_titulo` varchar(700) NOT NULL,
  `tag` varchar(50) NOT NULL,
  `data_atualizacao` varchar(50) NOT NULL,
  `link` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cabecalhos`
--

INSERT INTO `cabecalhos` (`id`, `imagem`, `imagem_mobile`, `titulo`, `sub_titulo`, `tag`, `data_atualizacao`, `link`) VALUES
(1, 'http://localhost/sebastiao_alves/recursos/imagens_para_site/desktop/cabecalho1.jpg', 'http://localhost/sebastiao_alves/recursos/imagens_para_site/mobile/cabecalho1.jpg', 'Senhora do amor e da guerra', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, autem. Saepe sapiente modi quam architecto, nostrum id reiciendis similique quisquam impedit rerum numquam odit, dolorem nesciunt soluta quas doloribus voluptatibus!</p>', 'Novidade', '09:42:21 - 12/05/2023', 'livro.php?livro=1'),
(2, 'http://localhost/sebastiao_alves/recursos/imagens_para_site/desktop/cabecalho2.jpg', 'http://localhost/sebastiao_alves/recursos/imagens_para_site/mobile/cabecalho2.jpg', 'O Caracol Estrábico', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, autem. Saepe sapiente modi quam architecto, nostrum id reiciendis similique quisquam impedit rerum numquam odit, dolorem nesciunt soluta quas doloribus voluptatibus!</p>', 'Novidade', '12:04:18 - 16/05/2023', 'livro.php?livro=2'),
(3, 'http://localhost/sebastiao_alves/recursos/imagens_para_site/desktop/cabecalho3.jpg', 'http://localhost/sebastiao_alves/recursos/imagens_para_site/mobile/cabecalho3.jpg', 'O Colecionador de amnésias', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, autem. Saepe sapiente modi quam architecto, nostrum id reiciendis similique quisquam impedit rerum numquam odit, dolorem nesciunt soluta quas doloribus voluptatibus!</p>', 'Mais vendido', '12:04:32 - 16/05/2023', 'livro.php?livro=3'),
(4, 'http://localhost/sebastiao_alves/recursos/imagens_para_site/desktop/cabecalho4.jpg', 'http://localhost/sebastiao_alves/recursos/imagens_para_site/mobile/cabecalho4.jpg', 'O Velho que pensava que fugia', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, autem. Saepe sapiente modi quam architecto, nostrum id reiciendis similique quisquam impedit rerum numquam odit, dolorem nesciunt soluta quas doloribus voluptatibus!</p>', '', '21:36:19 - 16/05/2023', 'livro.php?livro=4');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contactos`
--

CREATE TABLE `contactos` (
  `id` int(11) NOT NULL,
  `telefone` varchar(150) NOT NULL,
  `morada` varchar(150) NOT NULL,
  `e_mail` varchar(150) NOT NULL,
  `horario` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `contactos`
--

INSERT INTO `contactos` (`id`, `telefone`, `morada`, `e_mail`, `horario`) VALUES
(1, '+351 123 456 789', 'lorem ipsum dolor sit amet, 12 <br> 1234-543 Lorem', 'lorem@lorem.pt', 'De segunda a Sexta das 00:00h às 00:00h');

-- --------------------------------------------------------

--
-- Estrutura da tabela `destaques`
--

CREATE TABLE `destaques` (
  `id` int(11) NOT NULL,
  `livro` int(11) NOT NULL,
  `tag` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `destaques`
--

INSERT INTO `destaques` (`id`, `livro`, `tag`) VALUES
(1, 1, 'Novidade'),
(2, 4, ''),
(12, 3, 'Melhores Criticas!');

-- --------------------------------------------------------

--
-- Estrutura da tabela `home`
--

CREATE TABLE `home` (
  `id` int(11) NOT NULL,
  `imagem` varchar(150) NOT NULL,
  `ultimos_livros` varchar(15000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `home`
--

INSERT INTO `home` (`id`, `imagem`, `ultimos_livros`) VALUES
(1, 'http://localhost/sebastiao_alves/recursos/imagens_para_site/desktop/FOTO-editada.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis nam in libero nisi soluta ratione, praesentium ut dolor deleniti saepe! Voluptate adipisci obcaecati dolorem deserunt consectetur suscipit deleniti necessitatibus facere. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis nam in libero nisi soluta ratione, praesentium ut dolor deleniti saepe! Voluptate adipisci obcaecati dolorem deserunt consectetur suscipit deleniti necessitatibus facere. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis nam in libero nisi soluta ratione, praesentium ut dolor deleniti saepe! Voluptate adipisci obcaecati dolorem deserunt consectetur suscipit deleniti necessitatibus facere. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis nam in libero nisi soluta ratione, praesentium ut dolor deleniti saepe! Voluptate adipisci obcaecati dolorem deserunt consectetur suscipit deleniti necessitatibus facere. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis nam in libero nisi soluta ratione, praesentium ut dolor deleniti saepe! Voluptate adipisci obcaecati dolorem deserunt consectetur suscipit deleniti necessitatibus facere.</p>');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imprensa`
--

CREATE TABLE `imprensa` (
  `id` int(11) NOT NULL,
  `imagem` varchar(150) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `texto` varchar(15000) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `imprensa`
--

INSERT INTO `imprensa` (`id`, `imagem`, `titulo`, `texto`, `data`) VALUES
(1, 'http://localhost/sebastiao_alves/recursos/imagens_para_site/desktop/conteudo-imprensa1.jpg', 'lançamento | Senhora do amor e da guerra', '', '2020-06-17'),
(2, 'http://localhost/sebastiao_alves/recursos/imagens_para_site/desktop/conteudo-imprensa2.jpg', 'lançamento | O velho que achava que fugia', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. <br> \r\n                  Reprehenderit dolore iusto odit id magni quaerat voluptates fugit labore, doloribus, optio vel voluptas ut commodi earum quos excepturi sequi aliquid expedita!<br>\r\n                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium saepe odit, a iste, delectus veniam sunt eius quaerat dolorum inventore tenetur! <br>\r\n                  Nesciunt rerum quibusdam quisquam sed consequuntur architecto porro dolorem, sequi laudantium, optio repellat nulla esse? Doloribus, error et numquam commodi iste saepe quia id ducimus quasi praesentium quo fuga architecto asperiores laborum temporibus debitis. <br>\r\n                  Sed sint ipsam voluptas eligendi, magni modi! Porro perspiciatis, perferendis debitis quaerat voluptatum molestias architecto autem incidunt labore quis cumque, illo odio fugit voluptate nihil laboriosam eos necessitatibus suscipit numquam vero veritatis aperiam! <br>\r\n                  Soluta doloribus aperiam dolore neque.\r\n                  <br><br>\r\n                  Noticia de Técnico Lisboa\r\n                  htts://url.link/link-da-noticia/', '2017-12-06'),
(3, 'http://localhost/sebastiao_alves/recursos/imagens_para_site/desktop/conteudo-imprensa2.jpg', 'lançamento | O velho que achava que fugia', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. <br> \r\n                  Reprehenderit dolore iusto odit id magni quaerat voluptates fugit labore, doloribus, optio vel voluptas ut commodi earum quos excepturi sequi aliquid expedita!<br>\r\n                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium saepe odit, a iste, delectus veniam sunt eius quaerat dolorum inventore tenetur! <br>\r\n                  Nesciunt rerum quibusdam quisquam sed consequuntur architecto porro dolorem, sequi laudantium, optio repellat nulla esse? Doloribus, error et numquam commodi iste saepe quia id ducimus quasi praesentium quo fuga architecto asperiores laborum temporibus debitis. <br>\r\n                  Sed sint ipsam voluptas eligendi, magni modi! Porro perspiciatis, perferendis debitis quaerat voluptatum molestias architecto autem incidunt labore quis cumque, illo odio fugit voluptate nihil laboriosam eos necessitatibus suscipit numquam vero veritatis aperiam! <br>\r\n                  Soluta doloribus aperiam dolore neque.\r\n                  <br><br>\r\n                  Noticia de Técnico Lisboa\r\n                  htts://url.link/link-da-noticia/', '2023-05-10'),
(5, 'https://www.viagensecaminhos.com/wp-content/uploads/2020/10/porto-portugal.jpg', 'Lançamento | Cidade do Porto', '', '2022-05-05');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

CREATE TABLE `livros` (
  `id` int(11) NOT NULL,
  `imagem` varchar(150) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `texto` varchar(15000) NOT NULL,
  `ultima_atualizacao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`id`, `imagem`, `titulo`, `texto`, `ultima_atualizacao`) VALUES
(1, 'http://localhost/sebastiao_alves/recursos/imagens_para_site/desktop/livro-conteudo.jpg', 'Senhora do Amor e da guerra', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit reiciendis nobis nam aliquid consequuntur accusantium ipsum praesentium distinctio molestias aliquam. Eum, ad? Tempore, fuga! Sunt maxime unde odio nisi quis eos qui nostrum ad quasi eum vitae, sapiente repellendus et provident culpa exercitationem ullam. Facilis voluptatum temporibus aliquam, ut quae, consequatur recusandae alias, dolorum natus laborum veritatis suscipit quaerat earum velit ipsum magni blanditiis saepe. Aperiam praesentium adipisci possimus explicabo asperiores et laborum officiis temporibus expedita, exercitationem molestias, fugiat nisi fuga optio voluptates quod minima. Tempora.&nbsp;<br><br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non incidunt iste exercitationem accusantium asperiores iusto enim distinctio placeat aliquam voluptates, ipsa nam magnam nulla sunt voluptatem eos minima labore commodi officia odit fugit nobis atque deleniti vel? Soluta a excepturi ut error mollitia perspiciatis?&nbsp;<br><br>Edição: Junho de 2020&nbsp;<br>Dimensões: 150 x 230 x 10 mm&nbsp;<br>Encardenação: capa mole&nbsp;<br>Páginas: 240</p>', '09:45:18 - 12/05/2023'),
(2, 'http://localhost/sebastiao_alves/recursos/imagens_para_site/desktop/livro-conteudo2.jpg', 'O colecionador de amnésias', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit reiciendis nobis nam aliquid consequuntur accusantium ipsum praesentium distinctio molestias aliquam. Eum, ad? Tempore, fuga! Sunt maxime unde odio nisi quis eos qui nostrum ad quasi eum vitae, sapiente repellendus et provident culpa exercitationem ullam. Facilis voluptatum temporibus aliquam, ut quae, consequatur recusandae alias, dolorum natus laborum veritatis suscipit quaerat earum velit ipsum magni blanditiis saepe. Aperiam praesentium adipisci possimus explicabo asperiores et laborum officiis temporibus expedita, exercitationem molestias, fugiat nisi fuga optio voluptates quod minima. Tempora.&nbsp;<br><br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non incidunt iste exercitationem accusantium asperiores iusto enim distinctio placeat aliquam voluptates, ipsa nam magnam nulla sunt voluptatem eos minima labore commodi officia odit fugit nobis atque deleniti vel? Soluta a excepturi ut error mollitia perspiciatis?&nbsp;<br><br>Edição: Junho de 2020&nbsp;<br>Dimensões: 150 x 230 x 10 mm&nbsp;<br>Encardenação: capa mole&nbsp;<br>Páginas: 240</p>', '09:45:11 - 12/05/2023'),
(3, 'http://localhost/sebastiao_alves/recursos/imagens_para_site/desktop/livro-conteudo3.jpg', 'O caracol estrábico', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit reiciendis nobis nam aliquid consequuntur accusantium ipsum praesentium distinctio molestias aliquam. Eum, ad? Tempore, fuga! Sunt maxime unde odio nisi quis eos qui nostrum ad quasi eum vitae, sapiente repellendus et provident culpa exercitationem ullam. Facilis voluptatum temporibus aliquam, ut quae, consequatur recusandae alias, dolorum natus laborum veritatis suscipit quaerat earum velit ipsum magni blanditiis saepe. Aperiam praesentium adipisci possimus explicabo asperiores et laborum officiis temporibus expedita, exercitationem molestias, fugiat nisi fuga optio voluptates quod minima. Tempora.&nbsp;<br><br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non incidunt iste exercitationem accusantium asperiores iusto enim distinctio placeat aliquam voluptates, ipsa nam magnam nulla sunt voluptatem eos minima labore commodi officia odit fugit nobis atque deleniti vel? Soluta a excepturi ut error mollitia perspiciatis?&nbsp;<br><br>Edição: Junho de 2020&nbsp;<br>Dimensões: 150 x 230 x 10 mm&nbsp;<br>Encardenação: capa mole&nbsp;<br>Páginas: 240</p>', '12:04:03 - 16/05/2023'),
(4, 'http://localhost/sebastiao_alves/recursos/imagens_para_site/desktop/livro-conteudo4.jpg', 'O velho que pensava que fugia', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit reiciendis nobis nam aliquid consequuntur accusantium ipsum praesentium distinctio molestias aliquam. Eum, ad? Tempore, fuga! Sunt maxime unde odio nisi quis eos qui nostrum ad quasi eum vitae, sapiente repellendus et provident culpa exercitationem ullam. Facilis voluptatum temporibus aliquam, ut quae, consequatur recusandae alias, dolorum natus laborum veritatis suscipit quaerat earum velit ipsum magni blanditiis saepe. Aperiam praesentium adipisci possimus explicabo asperiores et laborum officiis temporibus expedita, exercitationem molestias, fugiat nisi fuga optio voluptates quod minima. Tempora.&nbsp;<br><br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non incidunt iste exercitationem accusantium asperiores iusto enim distinctio placeat aliquam voluptates, ipsa nam magnam nulla sunt voluptatem eos minima labore commodi officia odit fugit nobis atque deleniti vel? Soluta a excepturi ut error mollitia perspiciatis?&nbsp;<br><br>Edição: Junho de 2020&nbsp;<br>Dimensões: 150 x 230 x 10 mm&nbsp;<br>Encardenação: capa mole&nbsp;<br>Páginas: 240</p>', '23:22:02 - 11/05/2023');

-- --------------------------------------------------------

--
-- Estrutura da tabela `redes`
--

CREATE TABLE `redes` (
  `id` int(11) NOT NULL,
  `instagram` varchar(150) NOT NULL,
  `facebook` varchar(150) NOT NULL,
  `linkedin` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `redes`
--

INSERT INTO `redes` (`id`, `instagram`, `facebook`, `linkedin`) VALUES
(1, 'https://www.instagram.com', 'https://www.facebook.com', 'https://www.linkedin.com');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `acessos`
--
ALTER TABLE `acessos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cabecalhos`
--
ALTER TABLE `cabecalhos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `destaques`
--
ALTER TABLE `destaques`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `imprensa`
--
ALTER TABLE `imprensa`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `redes`
--
ALTER TABLE `redes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `acessos`
--
ALTER TABLE `acessos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de tabela `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `autor`
--
ALTER TABLE `autor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `cabecalhos`
--
ALTER TABLE `cabecalhos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `destaques`
--
ALTER TABLE `destaques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `home`
--
ALTER TABLE `home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `imprensa`
--
ALTER TABLE `imprensa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `livros`
--
ALTER TABLE `livros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `redes`
--
ALTER TABLE `redes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
