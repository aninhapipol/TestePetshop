CREATE TABLE cliente(
 cli_id	int(11) AUTO_INCREMENT primary key,
 cli_nome varchar(30),
 cli_cpf varchar(30),
 cli_nasci varchar(30),
 cli_cep varchar(30), 
 cli_end varchar(60),
 cli_cidade varchar(30),
 cli_estado varchar(30),
 cli_animal varchar(30),
 cli_email varchar(30),
 cli_senha varchar(30),
 cli_foto blob
 );
 
CREATE TABLE produto(
 pro_id int AUTO_INCREMENT primary key,
 pro_nome varchar(50),
 pro_valor float(11,7),
 pro_tipo varchar(20),
 pro_descricao varchar(1000),
 pro_clique int(11),
 pro_foto blob
 );
 
CREATE TABLE estoque(
 estoque_id int(11) AUTO_INCREMENT primary key,
 pro_id int(11),
 estoque_qtde float(11,7),
	constraint estoque_pro_id_fk foreign key (pro_id) references produto(pro_id)
 );
 
CREATE TABLE pedido(
 ped_id int(11) AUTO_INCREMENT primary key,
 cli_id int(11),
 ped_data varchar(30),
 ped_valor float(11,7),
 ped_qtde float(11,7),
	constraint pedido_cli_id_fk foreign key (cli_id) references cliente(cli_id)
 );
 
CREATE TABLE itens_pedido(
 ped_id int(11),
 pro_id int(11),
 itensped_vlrunit float(11,7),
 itensped_qtde float(11,7),
 itensped_vlrtotal float(11,7),
	constraint itens_pedido_ped_id_fk foreign key (ped_id) references pedido(ped_id),
	constraint itens_pedido_pro_id_fk foreign key (pro_id) references produto(pro_id)
 );
 
INSERT INTO `produto` (`pro_id`, `pro_nome`, `pro_valor`, `pro_tipo`, `pro_foto`, `pro_descricao`, `pro_clique`) VALUES
(1, 'Ração Royal Canin Premium Gatos Castrados', 122.90, 'Felino', 0x70726f6475746f5f312e706e67, 'A Ração Royal Canin Premium Cat para Gatos Adultos Castrados proporciona nutrição essencial diária para o gato adulto castrado. Contém ingredientes que favorecem ótima digestibilidade e palatabilidade, além de contribuírem para a manutenção do peso ideal\r\n                            e do trato urinário. Solicitações referentes à Garantia de Satisfação devem ser encaminhadas diretamente para o fabricante por meio do telefone 0800 703 5588. Para mais informações acesse: </br>\r\n                            <b>http://www.royalcanin.com.br/royal-canin/sobre-a-royal-canin/compromisso-publico-royal-canin</b>', 4),
(2, 'Ração Golden Special Sabor Frango e Carne para Cães Adultos', 115.99, 'Canino', 'produto_2.png', 'Ração completa e balanceada, que não possui corantes e aromatizantes artificiais em sua composição.', 0),
(3, 'Ração Nutrópica para Hamster', 17.90, 'Roedor', 0x70726f6475746f5f332e706e67, 'A Ração NuTrópica Hamster Natural contém ingredientes nobres como: alfafa, aveia, trigo, linhaça e ervilha, que proporcionam os nutrientes necessários para a saúde, bem-estar e vitalidade do seu amado hamster. A NuTrópica® produz exclusivamente alimentos de alta qualidade. Nosso maior compromisso é que você e seu pet fiquem completamente satisfeitos. Caso isso não aconteça, nós devolveremos o valor pago pelo produto ou substituiremos o mesmo por produto equivalente de nossa fabricação. Para maiores informações, ligue para 0800 779 99 99.', 10),
(4, 'Gaiola American Pets para Coelhos - Azul', 139.9, 'Roedor', 0x70726f6475746f5f342e706e67, 'A Gaiola American Pets para Coelhos - Azul é ideal para coelhos e coelhos anões. Uma gaiola feita com aço resistente, bandejas metálicas removíveis, que facilita a entrada de alimentos.\r\nPara que seu animal de estimação tenha uma boa saúde é necessário que o dono procure alimentá-lo com produtos de qualidade e mantenha seu habitat em ótimas condições de higiene.', 8),
(5, 'Tigela Chalesco de Inox ', 9.9, 'Canino', 0x70726f6475746f5f352e706e67, 'A Tigela Chalesco de Inox, pode ser utilizada para comedouro ou bebedouro.Considerando a importância em oferecer ao seu animal de estimação, alimentos da maneira mais livre possível de resíduos a Chalesco desenvolveu este alimentador em inox.', 6),
(6, 'Peitoral Pawise com Guia Azul para Gatos', 49.9, 'Felino', 0x70726f6475746f5f362e706e67, 'O Peitoral Pawise com Guia Azul para Gatos, confeccionado em nylon poliéster, é ajustável, proporciona mobilidade sem machucar ou atrapalhar os movimentos do seu pet. É muito importante fazer corretamente o ajuste, evitando que seu gatinho escape ou sofra algum problema respiratórios. É preciso ter paciência para que seu gato acostume com o peitoral, coloque em casa, um pouco por dia, e quando estiver tranquilo e confortável só curtirem os passeios com segurança e tranquilidade.', 1),
(7, 'Areia Sanitária Limpi Cat', 18, 'Felino', 'produto_7.png', 'Um granulado sanitário para gatos, higiênico e que rende mais pois aglutina os resíduos dos gatos em torrões bem formados com alta absorção de odores.', 0),
(8, 'Sachê Pedigree', 2.29, 'Canino', 'produto_8.png', 'É uma refeição completa e balanceada para ser servida todos os dias, além de deliciosa. Também possui um balanço ideal de fibras.', 0),
(9, 'Tapete Higiênico 30 Unidades', 68.90, 'Canino', 'produto_9.png', 'É Super Absorvente e pode ser usado por cães Adultos e Filhotes. Ideal para pets de todos os tamanhos e idades, contendo 30 Unidades.', 0),
(10, 'Antipulgas e Carrapatos para Cães', 21, 'Canino', 'produto_10.png', 'É um primeiro comprimido mastigável, indicado para o tratamento de infestações por carrapatos e pulgas, em cachorros, proporcionando 12 semanas de proteção.', 0),
(11, 'Ração Royal Canin Lata', 18.50, 'Canino', 'produto_11.png', 'Alimento úmido formulado especialmente para a recuperação de cães e gatos convalescentes, que têm o seu apetite reduzido, rico em proteína.', 0),
(12, 'Casinha Ecológica para Roedores', 20, 'Roedor', 'produto_12.png', 'Dimensões:Altura: 19 cm Largura: 16 cm Comprimento: 21 cm. Elaborada à base de polietileno de Baixa Densidade e misturas de fibras celulósicas vegetais.', 0),
(13, 'Ração Supra Funny Bunny', 9, 'Roedor', 'produto_13.png', 'Elaborada a partir de vegetais nobres, a ração possui alfafa verde, que aporta vitaminas e fibras importantes para a digestão do seu roedor.', 0),
(14, 'Granulado Higiênico para Roedores', 10.71, 'Roedor', 'produto_14.png', 'O Granulado Higiênico de Madeira Like Pet Roedores é um produto 100% natural fabricado a partir de pó de pinus (madeira), proveniente de reflorestamento.', 0),
(15, 'Brinquedo para Rodedores', 18.90, 'Roedor', 'produto_15.png', 'Talos de madeira em formato de frutas, é um produto natural elaborado com madeiras selecionadas e sem tratamento químico. Largura: 0,7cm Altura: 9,5cm', 0),
(16, 'Sachê Whiskas Atum', 2.99, 'Felino', 'produto_16.png', 'Refeição completa e balanceada com suculentos pedacinhos cozidos a vapor que ajudam a manter a saúde do trato urinário.', 0),
(17, 'Antipulgas Bravecto para Gatos', 70.89, 'Felino', 'produto_17.png', 'É um medicamento capaz de eliminar as pulgas em até 12 horas e mantendo a proteção por até 12 semanas! O princípio ativo é o Fluralaner, de ação imediata.', 0),
(18, 'Vermífugo Biovet para Gatos', 16.70, 'Felino', 'produto_18.png', 'O Vermífugo Vermivet Biovet 300 mg para Gatos é indicado no tratamento e controle das principais verminoses que acometem os gatos', 0);
