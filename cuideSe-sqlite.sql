PRAGMA journal_mode = MEMORY;
PRAGMA synchronous = OFF;
PRAGMA foreign_keys = OFF;
PRAGMA ignore_check_constraints = OFF;
PRAGMA auto_vacuum = NONE;
PRAGMA secure_delete = OFF;
BEGIN TRANSACTION;

CREATE TABLE admins
(
admin_id TEXT NOT NULL DEFAULT 0,
admin_nome TEXT DEFAULT none,
posto_id bigint NOT NULL DEFAULT 0,
CONSTRAINT pk_admins PRIMARY KEY (admin_id)
);
CREATE TABLE estoques
(
estoque_id bigint NOT NULL,
item_id bigint NOT NULL,
quantidade bigint DEFAULT 0,
posto_id bigint NOT NULL DEFAULT 0,
CONSTRAINT pk_estoques PRIMARY KEY (estoque_id)
);
CREATE TABLE itens
(
item_id bigint NOT NULL,
descricao_item TEXT,
CONSTRAINT pk_itens PRIMARY KEY (item_id)
);
CREATE TABLE postos
(
posto_id bigint NOT NULL,
posto_nome bigint,
posto_endereco TEXT NOT NULL,
CONSTRAINT pk_postos PRIMARY KEY (posto_id)
);
CREATE TABLE usuarios
(
usuario_id TEXT NOT NULL DEFAULT 0,
usuario_nome TEXT NOT NULL DEFAULT none,
posto_id bigint NOT NULL DEFAULT 0,
CONSTRAINT pk_usuario PRIMARY KEY (usuario_id)
);
ALTER TABLE admins ADD CONSTRAINT fk_admins_posto
FOREIGN KEY (posto_id) REFERENCES postos (posto_id);
ALTER TABLE estoques ADD CONSTRAINT fk_estoques_itens
FOREIGN KEY (item_id) REFERENCES itens (item_id);
ALTER TABLE estoques ADD CONSTRAINT fk_estoques_posto
FOREIGN KEY (posto_id) REFERENCES postos (posto_id);
ALTER TABLE usuarios ADD CONSTRAINT fk_usuarios_posto
FOREIGN KEY (posto_id) REFERENCES postos (posto_id);





COMMIT;
PRAGMA ignore_check_constraints = ON;
PRAGMA foreign_keys = ON;
PRAGMA journal_mode = WAL;
PRAGMA synchronous = NORMAL;