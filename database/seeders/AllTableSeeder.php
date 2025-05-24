<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AllTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
             // 1. intencao
        DB::table('intencao')->insert([
            ['descricao' => 'Namoro'],
            ['descricao' => 'Amizade'],
            ['descricao' => 'Passeio'],
        ]);

        // 2. socializa_com
        DB::table('socializa_com')->insert([
            ['descricao' => 'Adulto'],
            ['descricao' => 'Criança'],
            ['descricao' => 'Outros pets'],
            ['descricao' => 'Não socializa'],
        ]);

        // 3. detalhes_usuario
        DB::table('detalhes_usuario')->insert([
            [
                'id_detalhes_usuario' => 1, 'nome' => 'Alice', 'apelido' => 'Silva', 'bio' => 'Amo passear com meu pet',
                'foto' => 'https://cdn.pixabay.com/photo/2016/11/29/03/35/girl-1867092_960_720.jpg', 'data_nascimento' => '1990-04-15',
                'localizacao' => 'Lisboa, Portugal', 'cod_intencao' => 2, 'photo_fundo' => 'https://cdn.pixabay.com/photo/2020/09/05/13/47/landscape-5546579_960_720.jpg'
            ],
            [
                'id_detalhes_usuario' => 2, 'nome' => 'Bob', 'apelido' => 'Santos', 'bio' => 'Procuro amigos para o meu cão',
                'foto' => 'https://cdn.pixabay.com/photo/2016/11/21/12/42/beard-1845166_1280.jpg', 'data_nascimento' => '1988-07-22',
                'localizacao' => 'Porto, Portugal', 'cod_intencao' => 3, 'photo_fundo' => 'https://cdn.pixabay.com/photo/2020/09/05/13/47/landscape-5546579_960_720.jpg'
            ],
            [
                'id_detalhes_usuario' => 3, 'nome' => 'Carol', 'apelido' => 'Souza', 'bio' => 'Adoro conhecer novos pets',
                'foto' => 'https://cdn.pixabay.com/photo/2015/01/12/10/44/woman-597173_960_720.jpg', 'data_nascimento' => '1995-11-05',
                'localizacao' => 'Coimbra, Portugal', 'cod_intencao' => 1, 'photo_fundo' => 'https://cdn.pixabay.com/photo/2020/09/05/13/47/landscape-5546579_960_720.jpg'
            ],
            [
                'id_detalhes_usuario' => 4, 'nome' => 'David', 'apelido' => 'Oliveira', 'bio' => 'Quero apresentar meu gato',
                'foto' => 'https://cdn.pixabay.com/photo/2016/03/27/22/21/boy-1284509_1280.jpg', 'data_nascimento' => '1985-02-10',
                'localizacao' => 'Faro, Portugal', 'cod_intencao' => 3, 'photo_fundo' => 'https://cdn.pixabay.com/photo/2020/09/05/13/47/landscape-5546579_960_720.jpg'
            ],
            [
                'id_detalhes_usuario' => 5, 'nome' => 'Eva', 'apelido' => 'Costa', 'bio' => 'Busco companhia para passeios',
                'foto' => 'https://cdn.pixabay.com/photo/2017/03/17/04/07/woman-2150881_1280.jpg', 'data_nascimento' => '1992-09-30',
                'localizacao' => 'Braga, Portugal', 'cod_intencao' => 2, 'photo_fundo' => 'https://cdn.pixabay.com/photo/2020/09/05/13/47/landscape-5546579_960_720.jpg'
            ],
            [
                'id_detalhes_usuario' => 6, 'nome' => 'Felipe', 'apelido' => 'Lima', 'bio' => 'Gosto de socializar ao ar livre',
                'foto' => 'https://cdn.pixabay.com/photo/2024/07/30/12/36/man-8932177_1280.png', 'data_nascimento' => '1987-12-12',
                'localizacao' => 'Aveiro, Portugal', 'cod_intencao' => 1, 'photo_fundo' => 'https://cdn.pixabay.com/photo/2020/09/05/13/47/landscape-5546579_960_720.jpg'
            ],
            [
                'id_detalhes_usuario' => 7, 'nome' => 'Gabriela', 'apelido' => 'Rocha', 'bio' => 'Meu papagaio adora companhia',
                'foto' => 'https://cdn.pixabay.com/photo/2015/03/03/18/58/woman-657753_1280.jpg', 'data_nascimento' => '1991-03-18',
                'localizacao' => 'Leiria, Portugal', 'cod_intencao' => 2, 'photo_fundo' => 'https://cdn.pixabay.com/photo/2020/09/05/13/47/landscape-5546579_960_720.jpg'
            ],
            [
                'id_detalhes_usuario' => 8, 'nome' => 'Henrique', 'apelido' => 'Dias', 'bio' => 'Pretendo encontrar novos pets',
                'foto' => 'https://cdn.pixabay.com/photo/2019/10/22/13/43/man-4568761_1280.jpg', 'data_nascimento' => '1989-05-27',
                'localizacao' => 'Setúbal, Portugal', 'cod_intencao' => 3, 'photo_fundo' => 'https://cdn.pixabay.com/photo/2020/09/05/13/47/landscape-5546579_960_720.jpg'
            ],
            [
                'id_detalhes_usuario' => 9, 'nome' => 'Isabela', 'apelido' => 'Melo', 'bio' => 'Sou apaixonada por coelhos',
                'foto' => 'https://cdn.pixabay.com/photo/2019/08/07/07/05/woman-4390055_1280.jpg', 'data_nascimento' => '1994-08-14',
                'localizacao' => 'Viseu, Portugal', 'cod_intencao' => 1, 'photo_fundo' => 'https://cdn.pixabay.com/photo/2020/09/05/13/47/landscape-5546579_960_720.jpg'
            ],
            [
                'id_detalhes_usuario' => 10, 'nome' => 'João', 'apelido' => 'Pereira', 'bio' => 'Procuro parceiros de passeio',
                'foto' => 'https://cdn.pixabay.com/photo/2016/11/23/00/57/adult-1851571_1280.jpg', 'data_nascimento' => '1993-01-22',
                'localizacao' => 'Évora, Portugal', 'cod_intencao' => 2, 'photo_fundo' => 'https://cdn.pixabay.com/photo/2020/09/05/13/47/landscape-5546579_960_720.jpg'
            ],
            [
                'id_detalhes_usuario' => 11, 'nome' => 'Karina', 'apelido' => 'Alves', 'bio' => 'Gosto de encontros pet-friendly',
                'foto' => 'https://cdn.pixabay.com/photo/2022/04/30/14/04/woman-7165664_1280.jpg', 'data_nascimento' => '1996-06-08',
                'localizacao' => 'Viana, Portugal', 'cod_intencao' => 3, 'photo_fundo' => 'https://cdn.pixabay.com/photo/2020/09/05/13/47/landscape-5546579_960_720.jpg'
            ],
            [
                'id_detalhes_usuario' => 12, 'nome' => 'Lucas', 'apelido' => 'Ferreira', 'bio' => 'Adoro tirar fotos de pets',
                'foto' => 'https://cdn.pixabay.com/photo/2018/02/16/14/38/portrait-3157821_1280.jpg', 'data_nascimento' => '1990-10-03',
                'localizacao' => 'Guimarães, Portugal', 'cod_intencao' => 1, 'photo_fundo' => 'https://cdn.pixabay.com/photo/2020/09/05/13/47/landscape-5546579_960_720.jpg'
            ],
            [
                'id_detalhes_usuario' => 13, 'nome' => 'Mariana', 'apelido' => 'Gomes', 'bio' => 'Quero explorar trilhas com pets',
                'foto' => 'https://cdn.pixabay.com/photo/2018/01/29/17/01/woman-3116587_1280.jpg', 'data_nascimento' => '1997-04-21',
                'localizacao' => 'Sintra, Portugal', 'cod_intencao' => 2, 'photo_fundo' => 'https://cdn.pixabay.com/photo/2020/09/05/13/47/landscape-5546579_960_720.jpg'
            ],
            [
                'id_detalhes_usuario' => 14, 'nome' => 'Nicolas', 'apelido' => 'Matos', 'bio' => 'Meu labrador precisa de amigos',
                'foto' => 'https://cdn.pixabay.com/photo/2016/11/29/09/38/adult-1868750_1280.jpg', 'data_nascimento' => '1986-02-28',
                'localizacao' => 'Funchal, Portugal', 'cod_intencao' => 3, 'photo_fundo' => 'https://cdn.pixabay.com/photo/2020/09/05/13/47/landscape-5546579_960_720.jpg'
            ],
            [
                'id_detalhes_usuario' => 15, 'nome' => 'Olivia', 'apelido' => 'Ramos', 'bio' => 'Busco amigos para o meu gato',
                'foto' => 'https://cdn.pixabay.com/photo/2015/11/12/02/38/girl-1039532_1280.jpg', 'data_nascimento' => '1992-11-11',
                'localizacao' => 'Porto, Portugal', 'cod_intencao' => 1, 'photo_fundo' => 'https://cdn.pixabay.com/photo/2020/09/05/13/47/landscape-5546579_960_720.jpg'
            ],
            [
                'id_detalhes_usuario' => 16, 'nome' => 'Pedro', 'apelido' => 'Martins', 'bio' => 'Adoro eventos pet-friendly',
                'foto' => 'https://cdn.pixabay.com/photo/2017/06/29/21/51/man-2456349_1280.jpg', 'data_nascimento' => '1984-07-07',
                'localizacao' => 'Lisboa, Portugal', 'cod_intencao' => 2, 'photo_fundo' => 'https://cdn.pixabay.com/photo/2020/09/05/13/47/landscape-5546579_960_720.jpg'
            ],
            [
                'id_detalhes_usuario' => 17, 'nome' => 'Daniela', 'apelido' => 'Cardoso', 'bio' => 'Quero apresentar meu coelho',
                'foto' => 'https://cdn.pixabay.com/photo/2019/11/21/15/00/woman-4642701_1280.jpg', 'data_nascimento' => '1993-05-19',
                'localizacao' => 'Porto, Portugal', 'cod_intencao' => 3, 'photo_fundo' => 'https://cdn.pixabay.com/photo/2020/09/05/13/47/landscape-5546579_960_720.jpg'
            ],
            [
                'id_detalhes_usuario' => 18, 'nome' => 'Rafael', 'apelido' => 'Araújo', 'bio' => 'Meu papagaio fala muito',
                'foto' => 'https://cdn.pixabay.com/photo/2020/07/17/22/01/man-5415565_1280.jpg', 'data_nascimento' => '1988-09-09',
                'localizacao' => 'Coimbra, Portugal', 'cod_intencao' => 1, 'photo_fundo' => 'https://cdn.pixabay.com/photo/2020/09/05/13/47/landscape-5546579_960_720.jpg'
            ],
            [
                'id_detalhes_usuario' => 19, 'nome' => 'Sabrina', 'apelido' => 'Pinto', 'bio' => 'Gosto de passear à tarde',
                'foto' => 'https://cdn.pixabay.com/photo/2017/06/15/22/05/woman-2406963_1280.jpg', 'data_nascimento' => '1995-12-25',
                'localizacao' => 'Faro, Portugal', 'cod_intencao' => 2, 'photo_fundo' => 'https://cdn.pixabay.com/photo/2020/09/05/13/47/landscape-5546579_960_720.jpg'
            ],
            [
                'id_detalhes_usuario' => 20, 'nome' => 'Thiago', 'apelido' => 'Correia', 'bio' => 'Adoro socializar meu pet',
                'foto' => 'https://cdn.pixabay.com/photo/2024/11/22/13/20/man-9216455_1280.jpg', 'data_nascimento' => '1996-12-05',
                'localizacao' => 'Porto, Portugal', 'cod_intencao' => 3, 'photo_fundo' => 'https://cdn.pixabay.com/photo/2020/09/05/13/47/landscape-5546579_960_720.jpg'
            ]
        ]);

        // 4. pet
        DB::table('pet')->insert([
            ['usuario_id'=>1,'nome'=>'Rex','especie'=>'Cão','raca'=>'Labrador','sexo'=>'M','peso'=>25.00,'data_nascimento'=>'2018-06-10','castrado'=>1,'cod_socializa'=>1,'foto'=>'https://cdn.pixabay.com/photo/2016/02/11/16/59/dog-1194083_1280.jpg','bio'=>'Muito amigável'],
            ['usuario_id'=>1,'nome'=>'Mia','especie'=>'Gato','raca'=>'Siamês','sexo'=>'F','peso'=>4.50,'data_nascimento'=>'2020-08-20','castrado'=>0,'cod_socializa'=>2,'foto'=>'https://cdn.pixabay.com/photo/2017/02/15/12/12/cat-2068462_1280.jpg','bio'=>'Gosta de brincar com crianças'],
            ['usuario_id'=>2,'nome'=>'Bunny','especie'=>'Coelho','raca'=>'Anão','sexo'=>'F','peso'=>2.10,'data_nascimento'=>'2019-12-01','castrado'=>1,'cod_socializa'=>3,'foto'=>'https://cdn.pixabay.com/photo/2014/06/21/08/43/rabbit-373691_1280.jpg','bio'=>'Muito calmo'],
            ['usuario_id'=>2,'nome'=>'Kiki','especie'=>'Papagaio','raca'=>'Amazona','sexo'=>'M','peso'=>0.80,'data_nascimento'=>'2017-03-15','castrado'=>0,'cod_socializa'=>4,'foto'=>'https://cdn.pixabay.com/photo/2024/12/28/03/20/parrot-9295172_1280.jpg','bio'=>'Adora conversar'],
            ['usuario_id'=>3,'nome'=>'Nino','especie'=>'Hamster','raca'=>'Sírio','sexo'=>'M','peso'=>0.10,'data_nascimento'=>'2021-01-10','castrado'=>0,'cod_socializa'=>3,'foto'=>'https://cdn.pixabay.com/photo/2020/05/01/02/26/hamster-5115246_1280.jpg','bio'=>'Muito ativo'],
            ['usuario_id'=>3,'nome'=>'Luna','especie'=>'Cão','raca'=>'Beagle','sexo'=>'F','peso'=>10.00,'data_nascimento'=>'2019-04-22','castrado'=>1,'cod_socializa'=>1,'foto'=>'https://cdn.pixabay.com/photo/2010/12/13/10/20/beagle-puppy-2681_1280.jpg','bio'=>'Adora farejar'],
            ['usuario_id'=>4,'nome'=>'Whiskers','especie'=>'Gato','raca'=>'Persa','sexo'=>'F','peso'=>5.20,'data_nascimento'=>'2018-11-05','castrado'=>1,'cod_socializa'=>2,'foto'=>'https://cdn.pixabay.com/photo/2022/02/17/04/54/animal-7017939_1280.jpg','bio'=>'Muito preguiçoso'],
            ['usuario_id'=>4,'nome'=>'Pico','especie'=>'Papagaio','raca'=>'Calopsita','sexo'=>'M','peso'=>0.25,'data_nascimento'=>'2020-05-17','castrado'=>0,'cod_socializa'=>4,'foto'=>'https://cdn.pixabay.com/photo/2017/03/06/23/48/cockatiel-2122876_1280.jpg','bio'=>'Faz truques'],
            ['usuario_id'=>5,'nome'=>'Buddy','especie'=>'Cão','raca'=>'Golden Retriever','sexo'=>'M','peso'=>30.00,'data_nascimento'=>'2017-09-09','castrado'=>1,'cod_socializa'=>1,'foto'=>'https://cdn.pixabay.com/photo/2022/01/17/19/59/dog-6945696_1280.jpg','bio'=>'Adora nadar'],
            ['usuario_id'=>5,'nome'=>'Goldie','especie'=>'Peixe','raca'=>'Goldfish','sexo'=>'F','peso'=>0.05,'data_nascimento'=>'2022-02-02','castrado'=>0,'cod_socializa'=>4,'foto'=>'https://cdn.pixabay.com/photo/2020/07/24/06/57/fish-5433097_1280.jpg','bio'=>'Muito bonito'],
            ['usuario_id'=>6,'nome'=>'Bruno','especie'=>'Cão','raca'=>'Pastor Alemão','sexo'=>'M','peso'=>30.50,'data_nascimento'=>'2017-01-10','castrado'=>1,'cod_socializa'=>3,'foto'=>"https://cdn.pixabay.com/photo/2016/10/09/21/03/dog-1726931_960_720.jpg",'bio'=>'Inteligente'],
            ['usuario_id'=>7,'nome'=>'Lola','especie'=>'Gato','raca'=>'Persa','sexo'=>'F','peso'=>4.80,'data_nascimento'=>'2018-07-14','castrado'=>1,'cod_socializa'=>2,'foto'=>"https://cdn.pixabay.com/photo/2017/03/28/16/30/cat-2182624_1280.jpg",'bio'=>'Muito carinhosa'],
            ['usuario_id'=>8,'nome'=>'Nemo','especie'=>'Peixe','raca'=>'Betta','sexo'=>'M','peso'=>0.02,'data_nascimento'=>'2021-03-03','castrado'=>0,'cod_socializa'=>4,'foto'=>"https://cdn.pixabay.com/photo/2019/06/10/10/20/betta-fish-nemo-4263848_1280.jpg",'bio'=>'Colorido'],
            ['usuario_id'=>9,'nome'=>'Bolt','especie'=>'Hamster','raca'=>'Anão Russo','sexo'=>'M','peso'=>0.12,'data_nascimento'=>'2022-06-06','castrado'=>0,'cod_socializa'=>3,'foto'=>"https://cdn.pixabay.com/photo/2015/09/16/20/44/goldhamster-943373_1280.jpg",'bio'=>'Corre na roda'],
            ['usuario_id'=>10,'nome'=>'Bambi','especie'=>'Coelho','raca'=>'Angorá','sexo'=>'F','peso'=>2.25,'data_nascimento'=>'2020-12-12','castrado'=>1,'cod_socializa'=>1,'foto'=>"https://cdn.pixabay.com/photo/2017/04/10/12/51/hare-2218452_960_720.jpg",'bio'=>'Muito fofo'],
            ['usuario_id'=>11,'nome'=>'Thor','especie'=>'Cão','raca'=>'Bulldog','sexo'=>'M','peso'=>22.00,'data_nascimento'=>'2019-08-18','castrado'=>1,'cod_socializa'=>1,'foto'=>"https://cdn.pixabay.com/photo/2020/07/20/06/42/english-bulldog-5422018_960_720.jpg",'bio'=>'Teimoso'],
            ['usuario_id'=>12,'nome'=>'Luna','especie'=>'Gato','raca'=>'Maine Coon','sexo'=>'F','peso'=>6.00,'data_nascimento'=>'2018-02-02','castrado'=>1,'cod_socializa'=>2,'foto'=>"https://cdn.pixabay.com/photo/2024/08/06/13/02/cat-8949341_960_720.jpg",'bio'=>'Gosta de altura'],
            ['usuario_id'=>13,'nome'=>'Kiwi','especie'=>'Papagaio','raca'=>'Eclectus','sexo'=>'F','peso'=>0.70,'data_nascimento'=>'2017-11-11','castrado'=>0,'cod_socializa'=>4,'foto'=>"https://cdn.pixabay.com/photo/2024/12/28/03/20/parrot-9295172_960_720.jpg",'bio'=>'Muito falante'],
            ['usuario_id'=>14,'nome'=>'Spike','especie'=>'Cão','raca'=>'Poodle','sexo'=>'M','peso'=>8.50,'data_nascimento'=>'2020-05-05','castrado'=>1,'cod_socializa'=>3,'foto'=>"https://cdn.pixabay.com/photo/2022/07/12/17/12/dog-7317820_1280.jpg",'bio'=>'Enérgico'],
            ['usuario_id'=>15,'nome'=>'Cookie','especie'=>'Coelho','raca'=>'Lop','sexo'=>'F','peso'=>2.00,'data_nascimento'=>'2021-09-09','castrado'=>0,'cod_socializa'=>2,'foto'=>"https://cdn.pixabay.com/photo/2024/01/05/10/53/rabbit-8489271_1280.png",'bio'=>'Dócil'],
            ['usuario_id'=>16,'nome'=>'Max','especie'=>'Cão','raca'=>'Rottweiler','sexo'=>'M','peso'=>35.00,'data_nascimento'=>'2016-04-04','castrado'=>1,'cod_socializa'=>1,'foto'=>"https://cdn.pixabay.com/photo/2015/05/01/08/25/rottweiler-747859_1280.jpg",'bio'=>'Protetor'],
            ['usuario_id'=>17,'nome'=>'Barbie','especie'=>'Hamster','raca'=>'Dourado','sexo'=>'F','peso'=>0.11,'data_nascimento'=>'2022-01-01','castrado'=>0,'cod_socializa'=>3,'foto'=>"https://cdn.pixabay.com/photo/2020/08/15/11/06/hamster-5490235_1280.jpg",'bio'=>'Dorminhoca'],
            ['usuario_id'=>18,'nome'=>'Cleo','especie'=>'Gato','raca'=>'Bengal','sexo'=>'F','peso'=>4.20,'data_nascimento'=>'2019-06-06','castrado'=>1,'cod_socializa'=>2,'foto'=>"https://cdn.pixabay.com/photo/2018/01/19/13/30/cat-3092405_1280.jpg",'bio'=>'Extrovertida'],
            ['usuario_id'=>19,'nome'=>'Dory','especie'=>'Peixe','raca'=>'Tetra Neon','sexo'=>'F','peso'=>0.03,'data_nascimento'=>'2021-07-07','castrado'=>0,'cod_socializa'=>4,'foto'=>"https://cdn.pixabay.com/photo/2021/02/14/19/49/neon-tetra-6015626_1280.jpg",'bio'=>'Coloridíssimo'],
            ['usuario_id'=>20,'nome'=>'Darcy','especie'=>'Cão','raca'=>'Dachshund','sexo'=>'M','peso'=>7.00,'data_nascimento'=>'2018-10-10','castrado'=>1,'cod_socializa'=>1,'foto'=>"https://cdn.pixabay.com/photo/2017/05/10/19/50/dachshund-2301777_1280.jpg",'bio'=>'Curioso'],
        ]);

        // 5. pedido_conexao
        DB::table('conexao')->insert([
            ['usuario1_id'=>1, 'usuario2_id'=>2, 'pedido_em'=>'2025-05-10 09:00:00', 'status'=>'aceito'],
            ['usuario1_id'=>3, 'usuario2_id'=>4, 'pedido_em'=>'2025-05-12 14:30:00', 'status'=>'pendente'],
            ['usuario1_id'=>5, 'usuario2_id'=>6, 'pedido_em'=>'2025-05-13 16:45:00', 'status'=>'rejeitado'],
            ['usuario1_id'=>7, 'usuario2_id'=>8, 'pedido_em'=>'2025-05-09 11:15:00', 'status'=>'aceito'],
            ['usuario1_id'=>9, 'usuario2_id'=>10, 'pedido_em'=>'2025-05-14 10:00:00', 'status'=>'pendente'],
            ['usuario1_id'=>11, 'usuario2_id'=>12, 'pedido_em'=>'2025-05-01 13:00:00', 'status'=>'aceito'],
            ['usuario1_id'=>13, 'usuario2_id'=>14, 'pedido_em'=>'2025-05-03 10:20:00', 'status'=>'rejeitado'],
            ['usuario1_id'=>15, 'usuario2_id'=>16, 'pedido_em'=>'2025-05-05 17:00:00', 'status'=>'aceito'],
        ]);

        // // 6. conexao
        // DB::table('conexao')->insert([
        //     ['usuario1_id'=>1, 'usuario2_id'=>2, 'criado_em'=>'2025-05-11 09:00:00'],
        //     ['usuario1_id'=>7, 'usuario2_id'=>8, 'criado_em'=>'2025-05-10 08:00:00'],
        //     ['usuario1_id'=>11, 'usuario2_id'=>12, 'criado_em'=>'2025-05-02 14:00:00'],
        //     ['usuario1_id'=>15, 'usuario2_id'=>16, 'criado_em'=>'2025-05-06 18:00:00'],
        // ]);

        // 7. mensagem
        DB::table('mensagem')->insert([
            ['id_conexao'=>1,'destinatario_id'=>2,'remetente_id'=>1,'conteudo'=>'Olá, tudo bem?','criado_em'=>'2025-05-11 09:15:00','lido_em'=>'2025-05-11 10:00:00'],
            ['id_conexao'=>1,'destinatario_id'=>1,'remetente_id'=>2,'conteudo'=>'Oi! Tudo ótimo, e você?','criado_em'=>'2025-05-11 10:05:00','lido_em'=>null],
            ['id_conexao'=>4,'destinatario_id'=>8,'remetente_id'=>7,'conteudo'=>'Seu pet parece adorável!','criado_em'=>'2025-05-10 08:30:00','lido_em'=>'2025-05-10 09:00:00'],
            ['id_conexao'=>4,'destinatario_id'=>7,'remetente_id'=>8,'conteudo'=>'Obrigado! Ele adora companhia.','criado_em'=>'2025-05-10 09:10:00','lido_em'=>null],
            ['id_conexao'=>6,'destinatario_id'=>12,'remetente_id'=>11,'conteudo'=>'Oi, quer marcar um passeio?','criado_em'=>'2025-05-02 15:00:00','lido_em'=>'2025-05-02 16:00:00'],
            ['id_conexao'=>6,'destinatario_id'=>11,'remetente_id'=>12,'conteudo'=>'Claro, quando?','criado_em'=>'2025-05-02 16:05:00','lido_em'=>null],
            ['id_conexao'=>8,'destinatario_id'=>16,'remetente_id'=>15,'conteudo'=>'Seu gato é lindo!','criado_em'=>'2025-05-06 18:30:00','lido_em'=>'2025-05-06 19:00:00'],
            ['id_conexao'=>8,'destinatario_id'=>15,'remetente_id'=>16,'conteudo'=>'Obrigada! Vou avisar se quiser encontrar.','criado_em'=>'2025-05-06 19:15:00','lido_em'=>null],
        ]);
    }
}


