CREATE TABLE IF NOT EXISTS intencao (
  cod_intencao   BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  descricao      VARCHAR(30) NOT NULL
);

CREATE TABLE IF NOT EXISTS socializa_com (
  cod_socializa  BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  descricao      VARCHAR(30) NOT NULL
);

CREATE TABLE IF NOT EXISTS detalhes_usuario (
  id_detalhes_usuario BIGINT UNSIGNED       NOT NULL PRIMARY KEY,
  nome             VARCHAR(30),
  apelido          VARCHAR(50),
  bio              TEXT,
  foto             VARCHAR(255),
  data_nascimento  DATE,
  localizacao      VARCHAR(255),
  cod_intencao     BIGINT UNSIGNED,
  photo_fundo      VARCHAR(255),
  FOREIGN KEY (id_detalhes_usuario) REFERENCES users(id),
  FOREIGN KEY (cod_intencao) REFERENCES intencao(cod_intencao)
);

CREATE TABLE IF NOT EXISTS pet (
  id_pet            BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  usuario_id        BIGINT UNSIGNED       NOT NULL,
  nome              VARCHAR(30),
  especie           VARCHAR(30),
  raca              VARCHAR(50),
  sexo              CHAR(1),
  peso              DECIMAL(5,2),
  data_nascimento   DATE,
  castrado          TINYINT(1) DEFAULT 0,
  cod_socializa     BIGINT UNSIGNED,
  foto              VARCHAR(255),
  bio               TEXT,
  FOREIGN KEY (usuario_id) REFERENCES users(id),
  FOREIGN KEY (cod_socializa) REFERENCES socializa_com(cod_socializa)
);

CREATE TABLE IF NOT EXISTS conexao (
  id_conexao         BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  usuario1_id   BIGINT UNSIGNED NOT NULL,
  usuario2_id   BIGINT UNSIGNED NOT NULL,
  pedido_em  DATETIME DEFAULT CURRENT_TIMESTAMP,
  status     VARCHAR(20) DEFAULT 'pendente',
  FOREIGN KEY (usuario1_id) REFERENCES users(id),
  FOREIGN KEY (usuario2_id) REFERENCES users(id)
);

CREATE TABLE IF NOT EXISTS mensagem (
  id_mensagem          BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  id_conexao         BIGINT UNSIGNED NOT NULL,
  destinatario_id    BIGINT UNSIGNED NOT NULL,
  remetente_id   BIGINT UNSIGNED NOT NULL,
  conteudo    TEXT,
  criado_em  DATETIME DEFAULT CURRENT_TIMESTAMP,
  lido_em     DATETIME,
    FOREIGN KEY (id_conexao) REFERENCES conexao(id_conexao),
  FOREIGN KEY (destinatario_id)  REFERENCES users(id),
  FOREIGN KEY (remetente_id) REFERENCES users(id)
);
