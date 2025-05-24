
-- 1) Lookup table de intenções (namoro, amizade, passeio)
INSERT INTO intencao (descricao) VALUES
  ('Namoro'),
  ('Amizade'),
  ('Passeio');

-- 2) Lookup table de como o pet se socializa
INSERT INTO socializa_com (descricao) VALUES
  ('Adulto'),
  ('Criança'),
  ('Outros pets'),
  ('Não socializa');

-- 3) Detalhes adicionais do usuário (apelido = sobrenome; cod_intencao ∈ {1=Namoro,2=Amizade,3=Passeio})
INSERT INTO detalhes_usuario (
  id_detalhes_usuario, nome, apelido, bio, foto,
  data_nascimento, localizacao, cod_intencao, photo_fundo
) VALUES
  (1,  'Alice',    'Silva',    'Amo passear com meu pet',         'https://cdn.pixabay.com/photo/2016/11/29/03/35/girl-1867092_960_720.jpg',    '1990-04-15', 'Lisboa, Portugal', 2,  'https://cdn.pixabay.com/photo/2020/09/05/13/47/landscape-5546579_960_720.jpg'),
  (2,  'Bob',     'Santos',   'Procuro amigos para o meu cão',   'https://cdn.pixabay.com/photo/2016/11/21/12/42/beard-1845166_1280.jpg',      '1988-07-22', 'Porto, Portugal',  3,  'https://cdn.pixabay.com/photo/2020/09/05/13/47/landscape-5546579_960_720.jpg'),
  (3,  'Carol',    'Souza',    'Adoro conhecer novos pets',       'https://cdn.pixabay.com/photo/2015/01/12/10/44/woman-597173_960_720.jpg',    '1995-11-05', 'Coimbra, Portugal',1,  'https://cdn.pixabay.com/photo/2020/09/05/13/47/landscape-5546579_960_720.jpg'),
  (4,  'David', 'Oliveira', 'Quero apresentar meu gato',       'https://cdn.pixabay.com/photo/2016/03/27/22/21/boy-1284509_1280.jpg',    '1985-02-10', 'Faro, Portugal',   3,  'https://cdn.pixabay.com/photo/2020/09/05/13/47/landscape-5546579_960_720.jpg'),
  (5,  'Eva',      'Costa',    'Busco companhia para passeios',   'https://cdn.pixabay.com/photo/2017/03/17/04/07/woman-2150881_1280.jpg',      '1992-09-30', 'Braga, Portugal',  2,  'https://cdn.pixabay.com/photo/2020/09/05/13/47/landscape-5546579_960_720.jpg'),
  (6,  'Felipe',    'Lima',     'Gosto de socializar ao ar livre', 'https://cdn.pixabay.com/photo/2024/07/30/12/36/man-8932177_1280.png',   '1987-12-12', 'Aveiro, Portugal', 1,  'https://cdn.pixabay.com/photo/2020/09/05/13/47/landscape-5546579_960_720.jpg'),
  (7,  'Gabriela', 'Rocha',    'Meu papagaio adora companhia',    'https://cdn.pixabay.com/photo/2015/03/03/18/58/woman-657753_1280.jpg', '1991-03-18', 'Leiria, Portugal', 2,  'https://cdn.pixabay.com/photo/2020/09/05/13/47/landscape-5546579_960_720.jpg'),
  (8,  'Henrique',  'Dias',     'Pretendo encontrar novos pets',   'https://cdn.pixabay.com/photo/2019/10/22/13/43/man-4568761_1280.jpg', '1989-05-27', 'Setúbal, Portugal',3,  'https://cdn.pixabay.com/photo/2020/09/05/13/47/landscape-5546579_960_720.jpg'),
  (9,  'Isabela',   'Melo',     'Sou apaixonada por coelhos',      'https://cdn.pixabay.com/photo/2019/08/07/07/05/woman-4390055_1280.jpg',  '1994-08-14', 'Viseu, Portugal',  1,  'https://cdn.pixabay.com/photo/2020/09/05/13/47/landscape-5546579_960_720.jpg'),
  (10, 'João',   'Pereira',  'Procuro parceiros de passeio',    'https://cdn.pixabay.com/photo/2016/11/23/00/57/adult-1851571_1280.jpg',     '1993-01-22', 'Évora, Portugal',  2,  'https://cdn.pixabay.com/photo/2020/09/05/13/47/landscape-5546579_960_720.jpg'),
(11, 'Karina',   'Alves',    'Gosto de encontros pet-friendly', 'https://cdn.pixabay.com/photo/2022/04/30/14/04/woman-7165664_1280.jpg',   '1996-06-08', 'Viana, Portugal',  3,  'https://cdn.pixabay.com/photo/2020/09/05/13/47/landscape-5546579_960_720.jpg'),
  (12, 'Lucas', 'Ferreira', 'Adoro tirar fotos de pets',      'https://cdn.pixabay.com/photo/2018/02/16/14/38/portrait-3157821_1280.jpg',    '1990-10-03', 'Guimarães, Portugal',1,'https://cdn.pixabay.com/photo/2020/09/05/13/47/landscape-5546579_960_720.jpg'),
  (13, 'Mariana',  'Gomes',    'Quero explorar trilhas com pets', 'https://cdn.pixabay.com/photo/2018/01/29/17/01/woman-3116587_1280.jpg',  '1997-04-21', 'Sintra, Portugal', 2,  'https://cdn.pixabay.com/photo/2020/09/05/13/47/landscape-5546579_960_720.jpg'),
  (14, 'Nicolas',  'Matos',    'Meu labrador precisa de amigos',  'https://cdn.pixabay.com/photo/2016/11/29/09/38/adult-1868750_1280.jpg',  '1986-02-28', 'Funchal, Portugal',3,  'https://cdn.pixabay.com/photo/2020/09/05/13/47/landscape-5546579_960_720.jpg'),
  (15, 'Olivia',   'Ramos',    'Busco amigos para o meu gato',    'https://cdn.pixabay.com/photo/2015/11/12/02/38/girl-1039532_1280.jpg',   '1992-11-11', 'Porto, Portugal',  1,  'https://cdn.pixabay.com/photo/2020/09/05/13/47/landscape-5546579_960_720.jpg'),
  (16, 'Pedro',  'Martins',  'Adoro eventos pet-friendly',      'https://cdn.pixabay.com/photo/2017/06/29/21/51/man-2456349_1280.jpg',    '1984-07-07', 'Lisboa, Portugal', 2,  'https://cdn.pixabay.com/photo/2020/09/05/13/47/landscape-5546579_960_720.jpg'),
  (17, 'Daniela','Cardoso',  'Quero apresentar meu coelho',     'https://cdn.pixabay.com/photo/2019/11/21/15/00/woman-4642701_1280.jpg',  '1993-05-19', 'Porto, Portugal',  3,  'https://cdn.pixabay.com/photo/2020/09/05/13/47/landscape-5546579_960_720.jpg'),
  (18, 'Rafael',  'Araújo',   'Meu papagaio fala muito',         'https://cdn.pixabay.com/photo/2020/07/17/22/01/man-5415565_1280.jpg',   '1988-09-09', 'Coimbra, Portugal',1,  'https://cdn.pixabay.com/photo/2020/09/05/13/47/landscape-5546579_960_720.jpg'),
  (19, 'Sabrina',  'Pinto',    'Gosto de passear à tarde',        'https://cdn.pixabay.com/photo/2017/06/15/22/05/woman-2406963_1280.jpg',  '1995-12-25', 'Faro, Portugal',   2,  'https://cdn.pixabay.com/photo/2020/09/05/13/47/landscape-5546579_960_720.jpg'),
  (20, 'Thiago', 'Correia',  'Adoro socializar meu pet',        'https://cdn.pixabay.com/photo/2024/11/22/13/20/man-9216455_1280.jpg',   '1996-12-05', 'Porto, Portugal',  3,  'https://cdn.pixabay.com/photo/2020/09/05/13/47/landscape-5546579_960_720.jpg');;

-- 4) Pets de cada usuário: usuários 1–5 têm 2 pets cada; 6–20 têm 1 pet cada
INSERT INTO pet (
  usuario_id, nome, especie, raca, sexo, peso,
  data_nascimento, castrado, cod_socializa, foto, bio
) VALUES
  -- Usuário 1 (2 pets)
  (1,  'Rex',    'Cão',    'Labrador',       'M', 25.00, '2018-06-10', 1, 1, 'https://cdn.pixabay.com/photo/2016/02/11/16/59/dog-1194083_1280.jpg',    'Muito amigável'),
  (1,  'Mia',    'Gato',   'Siamês',         'F',  4.50, '2020-08-20', 0, 2, 'https://cdn.pixabay.com/photo/2017/02/15/12/12/cat-2068462_1280.jpg,    'Gosta de brincar com crianças'),
  -- Usuário 2 (2 pets)
  (2,  'Bunny',  'Coelho', 'Anão',           'F',  2.10, '2019-12-01', 1, 3, 'https://cdn.pixabay.com/photo/2014/06/21/08/43/rabbit-373691_1280.jpg',  'Muito calmo'),
  (2,  'Kiki',   'Papagaio','Amazona',        'M',  0.80, '2017-03-15', 0, 4, 'https://cdn.pixabay.com/photo/2024/12/28/03/20/parrot-9295172_1280.jpg',   'Adora conversar'),
  -- Usuário 3 (2 pets)
  (3,  'Nino',   'Hamster','Sírio',          'M',  0.10, '2021-01-10', 0, 3, 'https://cdn.pixabay.com/photo/2020/05/01/02/26/hamster-5115246_1280.jpg',   'Muito ativo'),
  (3,  'Luna',   'Cão',    'Beagle',         'F', 10.00, '2019-04-22', 1, 1, 'https://cdn.pixabay.com/photo/2010/12/13/10/20/beagle-puppy-2681_1280.jpg',   'Adora farejar'),
  -- Usuário 4 (2 pets)
  (4,  'Whiskers','Gato',  'Persa',          'F',  5.20, '2018-11-05', 1, 2, 'https://cdn.pixabay.com/photo/2022/02/17/04/54/animal-7017939_1280.jpg','Muito preguiçoso'),
  (4,  'Pico',   'Papagaio','Calopsita',      'M',  0.25, '2020-05-17', 0, 4, 'https://cdn.pixabay.com/photo/2017/03/06/23/48/cockatiel-2122876_1280.jpg',   'Faz truques'),
  -- Usuário 5 (2 pets)
  (5,  'Buddy',  'Cão',    'Golden Retriever','M',30.00,'2017-09-09', 1, 1, 'https://cdn.pixabay.com/photo/2022/01/17/19/59/dog-6945696_1280.jpg',  'Adora nadar'),
  (5,  'Goldie', 'Peixe',  'Goldfish',       'F',  0.05, '2022-02-02', 0, 4, 'https://cdn.pixabay.com/photo/2020/07/24/06/57/fish-5433097_1280.jpg', 'Muito bonito'),
  -- Usuários 6–20 (1 pet cada)
  (6,  'Bruno',  'Cão',    'Pastor Alemão',  'M', 30.50,'2017-01-10', 1, 3, 'https://cdn.pixabay.com/photo/2016/10/09/21/03/dog-1726931_960_720.jpg%27',  'Inteligente'),
  (7,  'Lola',   'Gato',   'Persa',          'F',  4.80,'2018-07-14', 1, 2, 'https://cdn.pixabay.com/photo/2017/03/28/16/30/cat-2182624_1280.jpg%27',   'Muito carinhosa'),
  (8,  'Nemo',   'Peixe',  'Betta',          'M',  0.02,'2021-03-03', 0, 4, 'https://cdn.pixabay.com/photo/2019/06/10/10/20/betta-fish-nemo-4263848_1280.jpg%27',   'Colorido'),
  (9,  'Bolt',   'Hamster','Anão Russo',     'M',  0.12,'2022-06-06', 0, 3, 'https://cdn.pixabay.com/photo/2015/09/16/20/44/goldhamster-943373_1280.jpg%27',   'Corre na roda'),
  (10, 'Bambi',  'Coelho', 'Angorá',         'F',  2.25,'2020-12-12', 1, 1, 'https://cdn.pixabay.com/photo/2017/04/10/12/51/hare-2218452_960_720.jpg%27',  'Muito fofo'),
  (11, 'Thor',   'Cão',    'Bulldog',        'M', 22.00,'2019-08-18', 1, 1, 'https://cdn.pixabay.com/photo/2020/07/20/06/42/english-bulldog-5422018_960_720.jpg%27',   'Teimoso'),
  (12, 'Luna',   'Gato',   'Maine Coon',     'F',  6.00,'2018-02-02', 1, 2, 'https://cdn.pixabay.com/photo/2024/08/06/13/02/cat-8949341_960_720.jpg%27',  'Gosta de altura'),
  (13, 'Kiwi',   'Papagaio','Eclectus',       'F',  0.70,'2017-11-11', 0, 4, 'https://cdn.pixabay.com/photo/2024/12/28/03/20/parrot-9295172_960_720.jpg%27',   'Muito falante'),
  (14, 'Spike',  'Cão',    'Poodle',         'M',  8.50,'2020-05-05', 1, 3, 'https://cdn.pixabay.com/photo/2022/07/12/17/12/dog-7317820_1280.jpg',  'Enérgico'),
  (15, 'Cookie', 'Coelho', 'Lop',            'F',  2.00,'2021-09-09', 0, 2, 'https://cdn.pixabay.com/photo/2024/01/05/10/53/rabbit-8489271_1280.png', 'Dócil'),
  (16, 'Max',    'Cão',    'Rottweiler',     'M', 35.00,'2016-04-04', 1, 1, 'https://cdn.pixabay.com/photo/2015/05/01/08/25/rottweiler-747859_1280.jpg',    'Protetor'),
  (17, 'Barbie', 'Hamster','Dourado',        'F',  0.11,'2022-01-01', 0, 3, 'https://cdn.pixabay.com/photo/2020/08/15/11/06/hamster-5490235_1280.jpg', 'Dorminhoca'),
  (18, 'Cleo',   'Gato',   'Bengal',         'F',  4.20,'2019-06-06', 1, 2, 'https://cdn.pixabay.com/photo/2018/01/19/13/30/cat-3092405_1280.jpg',   'Extrovertida'),
  (19, 'Dory',   'Peixe',  'Tetra Neon',     'F',  0.03,'2021-07-07', 0, 4, 'https://cdn.pixabay.com/photo/2021/02/14/19/49/neon-tetra-6015626_1280.jpg',   'Coloridíssimo'),
  (20, 'Darcy',  'Cão',    'Dachshund',      'M',  7.00,'2018-10-10', 1, 1, 'https://cdn.pixabay.com/photo/2017/05/10/19/50/dachshund-2301777_1280.jpg',  'Curioso');

-- 5) Pedidos de conexão entre usuários
INSERT INTO pedido_conexao (usuario1_id, usuario2_id, pedido_em, status) VALUES
  (1,  2,  '2025-05-10 09:00:00', 'aceito'),
  (3,  4,  '2025-05-12 14:30:00', 'pendente'),
  (5,  6,  '2025-05-13 16:45:00', 'rejeitado'),
  (7,  8,  '2025-05-09 11:15:00', 'aceito'),
  (9, 10,  '2025-05-14 10:00:00', 'pendente'),
  (11, 12, '2025-05-01 13:00:00', 'aceito'),
  (13, 14, '2025-05-03 10:20:00', 'rejeitado'),
  (15, 16, '2025-05-05 17:00:00', 'aceito');

-- 6) Conexões efetivas (após aceitação)
INSERT INTO conexao (usuario1_id, usuario2_id, criado_em) VALUES
  (1,  2,  '2025-05-11 09:00:00'),
  (7,  8,  '2025-05-10 08:00:00'),
  (11, 12, '2025-05-02 14:00:00'),
  (15, 16, '2025-05-06 18:00:00');

-- 7) Mensagens trocadas entre conexões
INSERT INTO mensagem (
  destinatario_id, remetente_id, conteudo, criado_em, lido_em
) VALUES
  (2,  1, 'Olá, tudo bem?',                       '2025-05-11 09:15:00', '2025-05-11 10:00:00'),
  (1,  2, 'Oi! Tudo ótimo, e você?',              '2025-05-11 10:05:00', NULL),
  (8,  7, 'Seu pet parece adorável!',             '2025-05-10 08:30:00', '2025-05-10 09:00:00'),
  (7,  8, 'Obrigado! Ele adora companhia.',       '2025-05-10 09:10:00', NULL),
  (12, 11,'Oi, quer marcar um passeio?',         '2025-05-02 15:00:00', '2025-05-02 16:00:00'),
  (11, 12,'Claro, quando?',                     '2025-05-02 16:05:00', NULL),
  (16, 15,'Seu gato é lindo!',                   '2025-05-06 18:30:00', '2025-05-06 19:00:00'),
  (15, 16,'Obrigada! Vou avisar se quiser encontrar.','2025-05-06 19:15:00', NULL);


-- verificar se as tabelas foram criadas corretamente
