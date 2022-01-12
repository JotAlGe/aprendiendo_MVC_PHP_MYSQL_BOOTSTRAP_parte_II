create table levels
(
    cod_level      INTEGER               not null,
    desc_level     VARCHAR(255)          not null,
    primary key (cod_level)
);

create table users
(
    id_user        INTEGER               not null,
    cod_level      INTEGER               not null,
    name_user      VARCHAR(250)          not null,
    lastname_user  VARCHAR(250)          not null,
    nick_user      VARCHAR(250)          not null,
    email_user     VARCHAR(255)          not null,
    pass_user      VARCHAR(255)          not null,
    photo_user     VARCHAR(255)                  ,
    date_register  DATE                  not null,
    primary key (id_user),
    foreign key  (cod_level)
       references levels (cod_level)
);

create table posts
(
    id_post        INTEGER               not null,
    id_user        INTEGER               not null,
    desc_post      LONG VARBINARY        not null,
    date_post      TIMESTAMP             not null,
    photo_post     VARCHAR(255)                  ,
    primary key (id_post),
    foreign key  (id_user)
       references users (id_user)
);

create table comments
(
    id_user        INTEGER               not null,
    id_post        INTEGER               not null,
    id_comment     INTEGER               not null,
    desc_comment   LONG VARBINARY        not null,
    date_comment   DATE                  not null,
    primary key (id_user, id_post, id_comment),
    foreign key  (id_post)
       references posts (id_post),
    foreign key  (id_user)
       references users (id_user)
);

create table likes
(
    id_user        INTEGER               not null,
    id_post        INTEGER               not null,
    id_like        INTEGER               not null AUTO_INCREMENT,
    set_like       NUMERIC(1)            not null,
    primary key (id_like),
    foreign key  (id_user)
       references users (id_user),
    foreign key  (id_post)
       references posts (id_post)
);

