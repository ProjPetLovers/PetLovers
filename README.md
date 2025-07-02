<h1>ProjPetLovers</h1>
<br>
🐾O Projeto
ProjPetLovers é uma aplicação web desenvolvida com Laravel, focada em conectar donos de pets, facilitando a socialização, o compartilhamento de experiências e a organização de encontros entre amantes de animais. O sistema permite que usuários criem perfis, cadastrem seus pets, enviem mensagens, troquem informações e construam uma rede social amigável e segura para todos os tipos de pets.
<br> <br>

<b> <h1> Screenshots </b> </h1>

<h2>Tela Inicial</h2>

![welcome](https://github.com/user-attachments/assets/1c0dedf0-36b3-4382-aa4a-8d6b5475ee4e)

<h2>Iniciar Sessão</h2>

![login](https://github.com/user-attachments/assets/7b7dbef3-b91f-4676-affe-3138161ea832)

<h2>Criar Conta</h2>

![register](https://github.com/user-attachments/assets/d316282f-d742-48dc-bebf-127e1ac3d2a9)

<h2>Detalhe do Usuário</h2>

![detalhes_create](https://github.com/user-attachments/assets/2f47fcc7-b76a-4f8a-b326-377d3fb834c8)

<h2>Detalhe do Pet</h2>

![pet_create](https://github.com/user-attachments/assets/b240a25c-42d5-45ae-a022-a34f7e056c95)

<h2>Revisar Dados</h2>

![registration_complete](https://github.com/user-attachments/assets/bad7aec0-1c5d-49e9-8455-b0726a468aae)

<h2>Feed de Usuários</h2>

![usuarios](https://github.com/user-attachments/assets/622001b5-2eca-4a75-ba26-84b5ef8c1eef)

<h2>Feed de usuários com layout responsivo</h2>

![FeedResponsivo](https://github.com/user-attachments/assets/c88bc861-8194-4fc2-b4b2-1da310857ed7)

<h2>Feed com usuários cadastrados</h2>

![usuarios2](https://github.com/user-attachments/assets/0549d29d-2435-4e53-b3be-40fc92262e1c)

<h2>Tela com pedido de conexão</h2>

![PedidosConexãoRecebidos](https://github.com/user-attachments/assets/934b5b92-8179-4657-9f76-3fce331f477d)

<h2>Tela inicial de mensagens</h2>

![mensagens_index](https://github.com/user-attachments/assets/231148d6-e1ed-469f-b35b-58d2f98f7384)

<h2>Tela de mensagens entre usuários</h2>

![chat](https://github.com/user-attachments/assets/f6aa6407-16fc-4705-96ab-633da57d694d)

<h2>Tela Administrador</h2>

![admin](https://github.com/user-attachments/assets/372aa5e5-3313-493b-897f-44b595e27a72)

<h2>Dashboard de métricas Administrador</h2>

![DashboardAdmin](https://github.com/user-attachments/assets/3866d6a6-9e0b-47c7-b554-9e54a1443e85)

<h2>Esquema da base de dados</h2>

![baseDeDados](https://github.com/user-attachments/assets/7dcae855-d525-4764-af66-562db89ff0ad)



🚀 <b>Tecnologias Utilizadas:</b>
<br>
Laravel ^12.0 — Framework PHP para desenvolvimento web <br>
Laravel Breeze ^2.3 — Autenticação simples e rápida <br>
Laravel Reverb ^1.5 — Broadcasting/WebSockets em tempo real <br>
Laravel Echo ^2.1.6 — Cliente JavaScript para eventos em tempo real <br>
PHP ^8.1 — Linguagem principal do backend <br>
Composer ^2.8.6 — Gerenciador de dependências PHP <br>
MySQL ^8.0.41 — Banco de dados relacional <br>
DBeaver — Client gráfico para banco de dados <br>
XAMPP ^8.2.12-0 — Servidor local (Apache, MySQL, PHP, Perl) <br>
Tailwind CSS ^4.0.0 — Framework CSS utilitário <br>
HTML5 & CSS3 — Estrutura e estilização do front-end <br>
JavaScript ^22.11.0 — Lógica do front-end <br>
Pusher ^8.4.0 — Serviço de eventos em tempo real/broadcasting <br>
Git — Controle de versão de código-fonte <br>
GitHub — Hospedagem e colaboração de projetos Git <br>
Miro — Quadro branco colaborativo e diagramas <br>
Notion — Organização, documentação e gestão de conhecimento <br>
Trello — Gestão ágil de tarefas e projetos <br> <br>
⚙️ <b> Como Rodar o Projeto: </b>
<br>
Pré-requisitos <br>
PHP 8.1 ou superior <br>
Composer <br>
Node.js e NPM <br>
MySQL ou MariaDB <br>

Passos para instalação
```bash
# Clone o repositório:
git clone https://github.com/ProjPetLovers/PetLovers
cd PetLovers

# Instale as dependências do backend:
composer install

# Fazer update do pacote composer, para certificar que está instalado

composer update
# Instale as dependências do frontend:
npm install
 
# Configure  as suas credenciais no arquivo .env
cp .env.example .env
 
#Abrir Vs Code
code .

#Gerar uma chave de segurança
php artisan key:generate

# Rode as migrations e seeders:
php artisan migrate
php artisan db:seed --class=UserSeeder
php artisan db:seed --class=AllTableSeeder
php artisan db:seed --class=AdminUserSeeder

# Configure as variáveis de ambiente:
# Obter as chaves Pusher
- Acesse: https://dashboard.pusher.com
- Faça login ou crie uma conta.
- Em `Channels`, crie um `New App` (somente dê nome e carregue em `Create`).
- Na navbar lateral, vá em `APP KEYS` e copie os valores para configurar o `.env`.
Então, poderá configurar as chaves:
PUSHER_APP_ID=#chave obtida https://pusher.com/ -- Login > Dashboard > App Keys
PUSHER_APP_KEY= #chave obtida https://pusher.com/ -- Login > Dashboard > App Keys
PUSHER_APP_SECRET=#chave obtida https://pusher.com/ -- Login > Dashboard > App Keys
PUSHER_APP_CLUSTER= # chave obtida https://pusher.com/ -- eu
PUSHER_PORT=6001 #443 para https
PUSHER_HOST=127.0.0.1
PUSHER_SCHEME=http

# Copiar para o seu .env
VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
VITE_PUSHER_HOST="${PUSHER_HOST}"
VITE_PUSHER_PORT="${PUSHER_PORT}"
VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
# No terminal, obtenha as chaves Reverb:
php -r "echo 'REVERB_APP_ID=' . bin2hex(random_bytes(8)) . PHP_EOL;"
# resposta será REVERB_APP_ID=valor_chave
php -r "echo 'REVERB_APP_KEY=' . bin2hex(random_bytes(16)) . PHP_EOL;"
# resposta será REVERB_APP_KEY=valor_chave
php -r "echo 'REVERB_APP_SECRET=' . bin2hex(random_bytes(32)) . PHP_EOL;"
# resposta será REVERB_APP_SECRET=valor_chave

REVERB_APP_ID=my-app-id
REVERB_APP_KEY=my-app-key
REVERB_APP_SECRET=my-app-secret
REVERB_HOST=127.0.0.1
REVERB_PORT=6001
REVERB_SCHEME=http

# Configuração do Broadcast:
# Verificar se não tem nada duplicado.
BROADCAST_CONNECTION=reverb
BROADCAST_DRIVER=reverb
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync


#Inicie o servidor:
php artisan serve
php artisan reverb:start --host=127.0.0.1 --port=6001 (pode ou não conter as flags, eles vão forçar a entrada na porta)
npm run dev
Acesse o sistema em: http://localhost:8000
```
<br> 

📝 <b> Funcionalidades </b>
<br>
Cadastro e autenticação de usuários. <br>
Criação e personalização de perfis (incluindo pets.) <br>
Upload de fotos de perfil e dos pets. <br>
Chat em tempo real entre usuários. <br>
Feed de publicações, mensagens e interações. <br>
Busca e filtro por localização, espécie, intenção de socialização, etc. <br>
Interface responsiva e intuitiva. <br>
