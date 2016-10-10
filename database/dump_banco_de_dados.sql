/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.7.11 : Database - callcenter
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`callcenter` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `callcenter`;

/*Table structure for table `atendente` */

DROP TABLE IF EXISTS `atendente`;

CREATE TABLE `atendente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `telefone` varchar(255) DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `login` varchar(20) DEFAULT NULL,
  `senha` varchar(20) DEFAULT NULL,
  `ativo` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

/*Data for the table `atendente` */

insert  into `atendente`(`id`,`nome`,`telefone`,`tipo`,`login`,`senha`,`ativo`) values (1,'Deodoro da Fonseca','1212121','admin','1',NULL,'1');
insert  into `atendente`(`id`,`nome`,`telefone`,`tipo`,`login`,`senha`,`ativo`) values (2,'Floriano Peixoto','1245454','atendente','2','741','1');
insert  into `atendente`(`id`,`nome`,`telefone`,`tipo`,`login`,`senha`,`ativo`) values (3,'Prodente de Moraes','54545','suporte','3','1233','1');
insert  into `atendente`(`id`,`nome`,`telefone`,`tipo`,`login`,`senha`,`ativo`) values (4,'Campos Sales','2544454','suporte','4','1212','1');
insert  into `atendente`(`id`,`nome`,`telefone`,`tipo`,`login`,`senha`,`ativo`) values (5,'Rodrigues Alves','2121','suporte','5','111','1');
insert  into `atendente`(`id`,`nome`,`telefone`,`tipo`,`login`,`senha`,`ativo`) values (6,'Afonso Pena','2913','suporte','7','1123','1');
insert  into `atendente`(`id`,`nome`,`telefone`,`tipo`,`login`,`senha`,`ativo`) values (7,'Nilo Pecanha','2913','suporte','8','7787','1');
insert  into `atendente`(`id`,`nome`,`telefone`,`tipo`,`login`,`senha`,`ativo`) values (8,'Hermes da Fonseca','1964164','admin','9','213','1');
insert  into `atendente`(`id`,`nome`,`telefone`,`tipo`,`login`,`senha`,`ativo`) values (9,'Venscelau Bras','9456464','suporte','10','131','1');
insert  into `atendente`(`id`,`nome`,`telefone`,`tipo`,`login`,`senha`,`ativo`) values (10,'Delfin Moreira','84','suporte','11','1311','1');
insert  into `atendente`(`id`,`nome`,`telefone`,`tipo`,`login`,`senha`,`ativo`) values (11,'Epitacio Pessoa','5488','suporte','12','13113','1');
insert  into `atendente`(`id`,`nome`,`telefone`,`tipo`,`login`,`senha`,`ativo`) values (12,'Arthur Bernardes','34112800','atendente','13','131','1');
insert  into `atendente`(`id`,`nome`,`telefone`,`tipo`,`login`,`senha`,`ativo`) values (13,'Whashinton Luis','34112800','atendente','14','154','1');
insert  into `atendente`(`id`,`nome`,`telefone`,`tipo`,`login`,`senha`,`ativo`) values (14,'Julio Prestes','34112800','atendente','15','1','1');
insert  into `atendente`(`id`,`nome`,`telefone`,`tipo`,`login`,`senha`,`ativo`) values (15,'Agusto Tasso','3425-1683','suporte','16','123456','1');
insert  into `atendente`(`id`,`nome`,`telefone`,`tipo`,`login`,`senha`,`ativo`) values (17,'Isaias de Noronha','34112813','atendente','17','852','1');
insert  into `atendente`(`id`,`nome`,`telefone`,`tipo`,`login`,`senha`,`ativo`) values (19,'Joao Barreto','34112813','suporte','18','741','1');
insert  into `atendente`(`id`,`nome`,`telefone`,`tipo`,`login`,`senha`,`ativo`) values (20,'Eurico Gaspar','341313131','suporte','29','111','1');
insert  into `atendente`(`id`,`nome`,`telefone`,`tipo`,`login`,`senha`,`ativo`) values (21,'Getulio Vargas','(66) 9627-6585','atendente','20','741','1');
insert  into `atendente`(`id`,`nome`,`telefone`,`tipo`,`login`,`senha`,`ativo`) values (22,'Aldair Gomes','123456','suporte','aldair','aldair','1');
insert  into `atendente`(`id`,`nome`,`telefone`,`tipo`,`login`,`senha`,`ativo`) values (23,'Julio Medeiros','123456','suporte','julio','julio','1');
insert  into `atendente`(`id`,`nome`,`telefone`,`tipo`,`login`,`senha`,`ativo`) values (24,'Lazaro Nascimento','1242121','suporte','lazaro','julio','1');
insert  into `atendente`(`id`,`nome`,`telefone`,`tipo`,`login`,`senha`,`ativo`) values (25,'Paulo Sergio Theodoro','112145','suporte','paulo','paulo','1');
insert  into `atendente`(`id`,`nome`,`telefone`,`tipo`,`login`,`senha`,`ativo`) values (26,'Valterlan Baiano','1215451','suporte','valterlan','baiano','1');

/*Table structure for table `chamado` */

DROP TABLE IF EXISTS `chamado`;

CREATE TABLE `chamado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_atendente` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `relato` varchar(255) DEFAULT NULL,
  `id_elemento` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'A',
  `dt_abertura` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_atendente` (`id_atendente`),
  KEY `id_cliente` (`id_cliente`),
  KEY `id_elemento` (`id_elemento`),
  CONSTRAINT `chamado_ibfk_1` FOREIGN KEY (`id_atendente`) REFERENCES `atendente` (`id`),
  CONSTRAINT `chamado_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Data for the table `chamado` */

insert  into `chamado`(`id`,`id_atendente`,`id_cliente`,`relato`,`id_elemento`,`status`,`dt_abertura`) values (2,1,2,'O sistema esta pedindo a atualizacao do java. Apos atualizar o sistema nao funciona mais.',5,'C','2016-10-08 21:11:26');
insert  into `chamado`(`id`,`id_atendente`,`id_cliente`,`relato`,`id_elemento`,`status`,`dt_abertura`) values (3,1,3,'Erro ao tentar imprimir o relatorio de faturamento. Aparece um erro de pagina nao encontrada',7,'A','2016-10-08 21:11:26');
insert  into `chamado`(`id`,`id_atendente`,`id_cliente`,`relato`,`id_elemento`,`status`,`dt_abertura`) values (4,1,3,'Sistema muito lento para emitir notas fiscais',6,'A','2016-10-08 21:21:55');
insert  into `chamado`(`id`,`id_atendente`,`id_cliente`,`relato`,`id_elemento`,`status`,`dt_abertura`) values (5,1,3,'Nao e possivel fazer o upload das fotos. Aparece que o o servidor esta com a memoria cheia',6,'E','2016-10-08 21:21:55');
insert  into `chamado`(`id`,`id_atendente`,`id_cliente`,`relato`,`id_elemento`,`status`,`dt_abertura`) values (6,1,3,'O sistema esta fechando sozinho. Aparece na tela uma mensagem escrito Appcrash',6,'A','2016-10-08 21:21:55');
insert  into `chamado`(`id`,`id_atendente`,`id_cliente`,`relato`,`id_elemento`,`status`,`dt_abertura`) values (7,1,1,'O programa XYZ nao abre. Esta pedindo o .NET 4.5',1,'E','2016-10-08 21:32:49');
insert  into `chamado`(`id`,`id_atendente`,`id_cliente`,`relato`,`id_elemento`,`status`,`dt_abertura`) values (8,1,3,'O sistema nao consegue imprimir notas fiscais. A opcao de impressao esta desativada',1,'A','2016-10-09 00:16:46');
insert  into `chamado`(`id`,`id_atendente`,`id_cliente`,`relato`,`id_elemento`,`status`,`dt_abertura`) values (9,1,3,'Favor corrigir algumas traducoes para o portugues da tela de cadastro de veiculos. Alugns campos aparecem em ingles',5,'C','2016-10-09 06:57:51');
insert  into `chamado`(`id`,`id_atendente`,`id_cliente`,`relato`,`id_elemento`,`status`,`dt_abertura`) values (10,1,1,'Programa A esta consumindo muita memoria. O PC trava sempre que abre.',1,'E','2016-10-09 09:54:40');
insert  into `chamado`(`id`,`id_atendente`,`id_cliente`,`relato`,`id_elemento`,`status`,`dt_abertura`) values (11,15,4,'Nao consigo logar no sistema. Esta informando que meu acesso foi bloqueado. Usuario: alberto',20,'C','2016-10-10 00:43:15');
insert  into `chamado`(`id`,`id_atendente`,`id_cliente`,`relato`,`id_elemento`,`status`,`dt_abertura`) values (12,17,3,'O sistema de chamada automatatica nao reproduz os sons',10,'A','2016-10-10 00:54:15');

/*Table structure for table `cliente` */

DROP TABLE IF EXISTS `cliente`;

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `telefone` varchar(255) DEFAULT NULL,
  `telefone2` varchar(255) DEFAULT NULL,
  `pessoa` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contato` varchar(255) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `cliente` */

insert  into `cliente`(`id`,`nome`,`telefone`,`telefone2`,`pessoa`,`email`,`contato`,`endereco`,`cidade`,`estado`) values (1,'Carlos Luz','454545','741741','fisica','teste@teste','Carlos','Av. Senador Atilio Fontana, 1001 - Distro Industrial','Rondonopolis','MT');
insert  into `cliente`(`id`,`nome`,`telefone`,`telefone2`,`pessoa`,`email`,`contato`,`endereco`,`cidade`,`estado`) values (2,'Nereu Ramos','232323','5645644','fisica','teste@teste','Nereu','Rua Fernando Correia da Costa, 1000 - Centro','Rondonopolis','MT');
insert  into `cliente`(`id`,`nome`,`telefone`,`telefone2`,`pessoa`,`email`,`contato`,`endereco`,`cidade`,`estado`) values (3,'Celia Marta Oliveira','5050505','464646556','fisica','teste@teste','Celia','Rua Barao do Melgaco, 364 - Centro','Cuiaba','MT');
insert  into `cliente`(`id`,`nome`,`telefone`,`telefone2`,`pessoa`,`email`,`contato`,`endereco`,`cidade`,`estado`) values (4,'Bungue Alimentos','7777777','464645','juridica','teste@teste','Alisson','Rua Afonso Pena, 144 - Centro','Rondonopolis','MT');
insert  into `cliente`(`id`,`nome`,`telefone`,`telefone2`,`pessoa`,`email`,`contato`,`endereco`,`cidade`,`estado`) values (5,'ADM do Brasil LTDA','34112800','644646','juridica','teste@teste','Herika','Rua Rio Braco, 785 - Vila Aurora','Rondonopolis','MT');
insert  into `cliente`(`id`,`nome`,`telefone`,`telefone2`,`pessoa`,`email`,`contato`,`endereco`,`cidade`,`estado`) values (6,'Soraya Neubern','15454','99999564','fisica','teste@teste','Soraya','Rua Margarida, 544 - Vila Mineira','Rondonopolis','MT');
insert  into `cliente`(`id`,`nome`,`telefone`,`telefone2`,`pessoa`,`email`,`contato`,`endereco`,`cidade`,`estado`) values (7,'Erica Inacio de Araujo','1545454','999964','fisica','teste@teste','Erica','Rua das Araras, 2914 - Pq. Universitario','Cuiaba','MT');
insert  into `cliente`(`id`,`nome`,`telefone`,`telefone2`,`pessoa`,`email`,`contato`,`endereco`,`cidade`,`estado`) values (8,'Julia Lopes','1545154','9154646','fisica','teste@teste','Julia','Av. Bandeiantes, 1004 - Centro','Goiania','GO');
insert  into `cliente`(`id`,`nome`,`telefone`,`telefone2`,`pessoa`,`email`,`contato`,`endereco`,`cidade`,`estado`) values (9,'Bruna Marquesine','15451','94594545','fisica','teste@teste','Bruna','Av. Beija Flor, 145 - Vila Olinda','Rio de Janeiro','RJ');
insert  into `cliente`(`id`,`nome`,`telefone`,`telefone2`,`pessoa`,`email`,`contato`,`endereco`,`cidade`,`estado`) values (10,'Casa Rosa','1515',NULL,'juridica','teste@teste','Oga','Rua A, QD12, LT13','Guiratinga','MT');

/*Table structure for table `tramite` */

DROP TABLE IF EXISTS `tramite`;

CREATE TABLE `tramite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hora_ini` time DEFAULT NULL,
  `hora_fin` time DEFAULT NULL,
  `tramite` varchar(255) DEFAULT NULL,
  `solucao` tinyint(1) DEFAULT NULL,
  `id_chamado` int(11) DEFAULT NULL,
  `data` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_chamado` (`id_chamado`),
  CONSTRAINT `tramite_ibfk_1` FOREIGN KEY (`id_chamado`) REFERENCES `chamado` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

/*Data for the table `tramite` */

insert  into `tramite`(`id`,`hora_ini`,`hora_fin`,`tramite`,`solucao`,`id_chamado`,`data`) values (1,'02:12:00','04:15:00','Foi feita uma tentativa de ligacao para o usuario porem o mesmo nao atendeu. Sera retornada a ligacao',0,2,'2016-10-18 02:42:15');
insert  into `tramite`(`id`,`hora_ini`,`hora_fin`,`tramite`,`solucao`,`id_chamado`,`data`) values (2,'04:15:00','08:12:00','Foi feita uma tentativa de ligacao para o usuario porem o mesmo nao atendeu. Sera retornada a ligacao',0,2,'2016-10-19 02:42:18');
insert  into `tramite`(`id`,`hora_ini`,`hora_fin`,`tramite`,`solucao`,`id_chamado`,`data`) values (3,'04:18:00','09:47:00','tentativa de ligacao - usuario nao responde',0,3,'2016-10-20 02:42:20');
insert  into `tramite`(`id`,`hora_ini`,`hora_fin`,`tramite`,`solucao`,`id_chamado`,`data`) values (4,'08:15:00','08:16:00','O relatorio e gerado em PDF e a maquina do cliente estava sem o Acrobat Reader. Apos a isntalacao do aplicativo o problema foi resolvido.',1,3,'2016-10-13 02:42:23');
insert  into `tramite`(`id`,`hora_ini`,`hora_fin`,`tramite`,`solucao`,`id_chamado`,`data`) values (5,'01:00:00','02:00:00','Foi feita uma tentativa de ligacao para o usuario porem o mesmo nao atendeu. Sera retornada a ligacao',0,2,'2016-10-09 03:59:59');
insert  into `tramite`(`id`,`hora_ini`,`hora_fin`,`tramite`,`solucao`,`id_chamado`,`data`) values (6,'01:15:00','14:22:00','Foi feita uma tentativa de ligacao para o usuario porem o mesmo nao atendeu. Sera retornada a ligacao',0,2,'2016-10-09 04:01:41');
insert  into `tramite`(`id`,`hora_ini`,`hora_fin`,`tramite`,`solucao`,`id_chamado`,`data`) values (7,'01:15:00','14:22:00','Foi feita uma tentativa de ligacao para o usuario porem o mesmo nao atendeu. Sera retornada a ligacao',0,2,'2016-10-09 04:01:48');
insert  into `tramite`(`id`,`hora_ini`,`hora_fin`,`tramite`,`solucao`,`id_chamado`,`data`) values (8,'01:15:00','14:22:00','Foi feita uma tentativa de ligacao para o usuario porem o mesmo nao atendeu. Sera retornada a ligacao',0,2,'2016-10-09 04:03:09');
insert  into `tramite`(`id`,`hora_ini`,`hora_fin`,`tramite`,`solucao`,`id_chamado`,`data`) values (9,'00:00:00','00:00:00','tentativa de ligacao - usuario nao responde',0,3,'2016-10-09 04:04:43');
insert  into `tramite`(`id`,`hora_ini`,`hora_fin`,`tramite`,`solucao`,`id_chamado`,`data`) values (10,'00:00:00','00:00:00','tentativa de ligacao - usuario nao responde',0,3,'2016-10-09 04:04:50');
insert  into `tramite`(`id`,`hora_ini`,`hora_fin`,`tramite`,`solucao`,`id_chamado`,`data`) values (11,'00:00:00','00:00:00','tentativa de ligacao - usuario nao responde',0,3,'2016-10-09 04:06:32');
insert  into `tramite`(`id`,`hora_ini`,`hora_fin`,`tramite`,`solucao`,`id_chamado`,`data`) values (12,'02:00:00','01:00:00','tentativa de ligacao - usuario nao responde',0,3,'2016-10-09 04:06:40');
insert  into `tramite`(`id`,`hora_ini`,`hora_fin`,`tramite`,`solucao`,`id_chamado`,`data`) values (13,'02:00:00','01:00:00','tentativa de ligacao - usuario nao responde',0,3,'2016-10-09 04:06:47');
insert  into `tramite`(`id`,`hora_ini`,`hora_fin`,`tramite`,`solucao`,`id_chamado`,`data`) values (14,'02:00:00','17:00:00','Traducoes foram realizadas e inseridas na build. Entar em producao em 11/11/2011',1,9,'2016-10-09 04:13:04');
insert  into `tramite`(`id`,`hora_ini`,`hora_fin`,`tramite`,`solucao`,`id_chamado`,`data`) values (15,'00:00:00','00:00:00','Foi feita uma tentativa de ligacao para o usuario porem o mesmo nao atendeu. Sera retornada a ligacao',1,2,'2016-10-09 05:14:49');
insert  into `tramite`(`id`,`hora_ini`,`hora_fin`,`tramite`,`solucao`,`id_chamado`,`data`) values (16,'20:20:00','16:30:00','Foi constatado que trata-se de uma instabilidade do SEFAZ. Ja esta normalziado',1,4,'2016-10-09 13:08:30');
insert  into `tramite`(`id`,`hora_ini`,`hora_fin`,`tramite`,`solucao`,`id_chamado`,`data`) values (17,'20:20:00','10:10:00','tentativa de ligacao - usuario nao responde',0,3,'2016-10-09 13:19:21');
insert  into `tramite`(`id`,`hora_ini`,`hora_fin`,`tramite`,`solucao`,`id_chamado`,`data`) values (18,'04:05:00','17:00:00','Solicitado para o usuario enviar a sugestao de traducao',0,9,'2016-10-09 15:10:34');
insert  into `tramite`(`id`,`hora_ini`,`hora_fin`,`tramite`,`solucao`,`id_chamado`,`data`) values (19,'20:20:00','20:02:00','A senha foi bloqueada por tentativas erradas de logon. O usuario foi desbloqueado',1,11,'2016-10-09 19:44:45');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
