create database if not exists veto;
use veto;

drop table if exists rdv;
drop table if exists belong;
drop table if exists animal;
drop table if exists client;
drop table if exists rtt;
drop table if exists planning;
drop table if exists day;
drop table if exists heal;
drop table if exists race;
drop table if exists job;
drop table if exists sex;


create table sex (
id integer primary key,
value varchar(10) not null);

create table job (
id integer primary key auto_increment,
job varchar(255) not null);

create table race (
id integer primary key,
name varchar(255) not null,
lifex decimal (5, 2) not null,
spec varchar(255));

create table heal (
id integer primary key auto_increment,
name varchar(30) not null,
spe varchar(255),
job integer not null,
mail varchar(50),
pass varchar(255),
unique key (name),
unique key (mail),
foreign key (job) references job (id));

create table day (
id integer primary key auto_increment,
day varchar(10) not null);

create table planning (
id integer primary key auto_increment,
heal integer not null,
day integer not null,
begin time not null,
finish time not null,
foreign key (day) references day (id),
foreign key (heal) references heal (id));

create table rtt (
id integer primary key auto_increment,
heal integer not null,
begin datetime default null,
finish datetime default null,
foreign key (heal) references heal (id));

create table client (
id integer primary key auto_increment,
name varchar(30) not null,
pass varchar(255) not null,
mail varchar(50) not null,
unique key (name),
unique key (mail));

create table animal (
id integer primary key auto_increment,
name varchar(20) not null,
race integer not null,
datebirth date not null,
sex integer not null,
immat varchar(20),
foreign key (race) references race (id),
foreign key (sex) references sex (id));

create table belong (
id integer primary key auto_increment,
client integer not null,
animal integer not null,
foreign key (client) references client (id),
foreign key (animal) references animal (id));

create table rdv (
id integer primary key auto_increment,
time datetime not null,
lenght integer default 1,
ope varchar (255) default 'consultation',
heal integer not null,
animal integer not null,
client integer not null,
foreign key (heal) references heal (id),
foreign key (animal) references animal (id),
foreign key (client) references client (id));
