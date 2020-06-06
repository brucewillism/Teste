/*----------------------------------------------Create Tables----------------------------------------------------------*/
/*CRIANDO A TABELA DE USUÁRIOS*/
DROP TABLE IF EXISTS tb_usuarios;
CREATE TABLE tb_usuarios
(
        id_usuario INT(16) NOT NULL
        AUTO_INCREMENT,
	ds_nome VARCHAR
        (60) NOT NULL,
	ds_foto LONGBLOB,
	ds_login VARCHAR
        (60) NOT NULL,
	ds_senha VARCHAR
        (40) NOT NULL,
	fl_ativo int
        (1) NOT NULL default 1,
	PRIMARY KEY
        (id_usuario)

);


        /*CRIANDO A TABELA DE CATEGORIAS*/
        DROP TABLE IF EXISTS tb_categorias;

        CREATE TABLE tb_categorias
        (
                cat_id int(11) NOT NULL
                AUTO_INCREMENT,
	nome_cat varchar
                (45) NOT NULL,
	PRIMARY KEY
                (cat_id)
);

                /*CRIANDO A TABELA DE PRODUTOS*/
                DROP TABLE IF EXISTS tb_produtos;

                CREATE TABLE tb_produtos
                (
                        pro_id INT(16) NOT NULL
                        AUTO_INCREMENT,
	pro_codigo_produto varchar
                        (45) NOT NULL,
	pro_nome varchar
                        (45) NOT NULL,
	pro_data_compra date NOT NULL,
	pro_preco_compra varchar
                        (45) NOT NULL,
	pro_preco_venda varchar
                        (45) NOT NULL,
	id_categoria int
                        (11) NOT NULL,
	usuario_id INT
                        (16) NOT NULL,
	PRIMARY KEY
                        (pro_id),
	FOREIGN KEY
                        (usuario_id) REFERENCES tb_usuarios
                        (id_usuario),
	FOREIGN KEY
                        (id_categoria) REFERENCES tb_categorias
                        (cat_id)
);


                        /*CRIANDO A TABELA DE CLIENTES*/
                        DROP TABLE IF EXISTS tb_clientes;
                        CREATE TABLE tb_clientes
                        (
                                CLI_ID INT(16) NOT NULL
                                AUTO_INCREMENT,
	nome_fantasia varchar
                                (100) NOT NULL,                    
	razao_social varchar
                                (100) NOT NULL,                    
	cgc varchar
                                (100) NOT NULL,                    
	cep varchar
                                (100) NOT NULL,                    
	rua varchar
                                (100) NOT NULL,                    
	numero varchar
                                (50) NOT NULL,                    
	bairro varchar
                                (50) NOT NULL, 
	cidade varchar
                                (50) NOT NULL,                    
	estado varchar
                                (50) NOT NULL,                    
	pais varchar
                                (100) NOT NULL,
	usuario_id INT
                                (16) NOT NULL,
	tipo varchar
                                (11) NOT NULL,
	FOREIGN KEY
                                (usuario_id) REFERENCES tb_usuarios
                                (id_usuario),
	PRIMARY KEY
                                (CLI_ID),
	UNIQUE KEY CLI_ID
                                (CLI_ID)
);
                                /*----------------------------------------------inserts----------------------------------------------------------*/

                                -- senha 123456
                                INSERT INTO tb_usuarios
                                        (
                                        id_usuario,
                                        ds_nome,
                                        ds_login,
                                        ds_senha,
                                        fl_ativo)
                                VALUES(1,
                                                'Bruce Willis',
                                                'bruce',
                                                'e10adc3949ba59abbe56e057f20f883e',
                                                1);

                                INSERT INTO tb_categorias
                                        (cat_id, nome_cat)

                                VALUES(1, 'Artigos Para Festas'),
                                        (2, 'Automotivo'),
                                        (3, 'Bebidas'),
                                        (4, 'Briquedos'),
                                        (5, 'Calcados'),
                                        (6, 'Comestiveis'),
                                        (7, 'Construcao'),
                                        (8, 'Eletronicos'),
                                        (9, 'Esportes e Lazer'),
                                        (10, 'Farmacia'),
                                        (11, 'Ferramentas'),
                                        (12, 'Games'),
                                        (13, 'Higiene pessoal'),
                                        (14, 'Informatica'),
                                        (15, 'Livros'),
                                        (16, 'Moda'),
                                        (17, 'Moveis'),
                                        (18, 'Pet Shop');

                                INSERT INTO tb_produtos
                                        (
                                        pro_id,
                                        pro_codigo_produto,
                                        pro_nome,
                                        pro_data_compra,
                                        pro_preco_compra,
                                        pro_preco_venda,
                                        id_categoria,
                                        usuario_id
                                        )
                                VALUES(
                                                1,
                                                'Bstock',
                                                'Bstock entreprise',
                                                '2020/06/05',
                                                '12000',
                                                '15000',
                                                14,
                                                1
        	);

                                INSERT INTO tb_clientes
                                        (
                                        CLI_ID,
                                        nome_fantasia,
                                        razao_social,
                                        tipo,
                                        cgc,
                                        cep,
                                        rua,
                                        numero,
                                        bairro,
                                        cidade,
                                        estado,
                                        pais,
                                        usuario_id)
                                VALUES(
                                                1,
                                                'Bstock',
                                                'Bstock entreprise',
                                                'PJ',
                                                '00.000.000/0000-00',
                                                '00.000.000',
                                                'rua teste',
                                                '00',
                                                'bairro teste',
                                                'cidade teste',
                                                'estado teste',
                                                'pais teste',
                                                1
        	);
