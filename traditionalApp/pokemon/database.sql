create database pokemondatabase
    default character set utf8
    collate utf8_unicode_ci;

use pokemondatabase;

create table pokemon (
  id bigint(20) not null auto_increment primary key,
  name varchar(100) not null unique,
  evolution int(1) not null,
  type varchar(50) not null

) engine=innodb default charset=utf8 collate=utf8_unicode_ci;

create user pokemonuser@localhost
    identified by 'pokemonpassword';

grant all
    on pokemondatabase.*
    to pokemonuser@localhost;

flush privileges;