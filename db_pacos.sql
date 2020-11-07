CREATE TABLE `users` (
`id` int NOT NULL AUTO_INCREMENT,
`name` varchar(255) NOT NULL,
`apellidos` varchar(255) NOT NULL,
`direccion` varchar(255),
`email` varchar(150) NOT NULL,
`contrasena` varchar(255) NOT NULL,
`password` varchar(255) NOT NULL,
`telefono` varchar(255) NOT NULL,
`tipo` bool NOT NULL,
`ciudad` int NOT NULL,
PRIMARY KEY (`id`)
);
CREATE TABLE `Departamento` (
`id` int NOT NULL AUTO_INCREMENT,
`Nombre` varchar(200) NOT NULL,
`Pais` int NOT NULL,
PRIMARY KEY (`id`)
);
CREATE TABLE `Ciudades` (
`id` int NOT NULL AUTO_INCREMENT,
`Departamento` int NOT NULL,
`Nombre` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
);
CREATE TABLE `EmpxRestaurante` (
`id_Rest` int NOT NULL,
`id_Emp` int NOT NULL,
`Tipo` bit NOT NULL,
`Admin` bool NOT NULL,
PRIMARY KEY (`id_Rest`,`id_Emp`)
);
CREATE TABLE `Restaurantes` (
`id` int NOT NULL AUTO_INCREMENT,
`nombre` varchar(170) NOT NULL,
`Direccion` varchar(170) NOT NULL,
`Telefono` varchar(255) NOT NULL,
`BarrioVere` varchar(100) NOT NULL,
`Ciudad` int NOT NULL,
`Nit` int NOT NULL,
`DigVer` bit NOT NULL,
`Domicilios` bool NOT NULL,
`Reservas` bool NOT NULL,
`ordenes` bool NOT NULL,
`FotoPerfil` int NOT NULL,
`FotoPortada` int NOT NULL,
`Capacidad` int NOT NULL,
`Promo` int,
`Descripcion` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
);
CREATE TABLE `Pais` (
`id` int NOT NULL AUTO_INCREMENT,
`Nombre` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
);
CREATE TABLE `ClientxRest` (
`idClient` int NOT NULL,
`idRest` int NOT NULL,
PRIMARY KEY (`idClient`)
);
CREATE TABLE `Horario` (
`id` int NOT NULL AUTO_INCREMENT,
`DIa_Ini` varchar(255) NOT NULL,
`Hora_APert` TIME NOT NULL,
`Hora_cierre` TIME NOT NULL,
`Dia_cierre` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
);
CREATE TABLE `Foto_Vid` (
`id` int NOT NULL AUTO_INCREMENT,
`Url` varchar(255) NOT NULL,
`Pricipal` bool NOT NULL,
PRIMARY KEY (`id`)
);
CREATE TABLE `PromoRest` (
`id` int NOT NULL AUTO_INCREMENT,
`Valor` int,
`Porcentaje` int,
`Fecha_ini` DATETIME NOT NULL,
`Fecha_fin` DATETIME NOT NULL,
`Tipo` bit NOT NULL,
PRIMARY KEY (`id`)
);
CREATE TABLE `FotosVidLugar` (
`idRest` int NOT NULL,
`id_Foto` int NOT NULL,
PRIMARY KEY (`idRest`,`id_Foto`)
);
CREATE TABLE `Platos` (
`id` int NOT NULL AUTO_INCREMENT,
`Categoria` int NOT NULL,
`Nombre` varchar(110) NOT NULL,
`Descripcion` varchar(255) NOT NULL,
`Precio` int NOT NULL,
PRIMARY KEY (`id`)
);
CREATE TABLE `HorarioxRest` (
`idRest` int NOT NULL,
`idHor` int NOT NULL,
PRIMARY KEY (`idRest`,`idHor`)
);
CREATE TABLE `configRest` (
`Iva` int NOT NULL,
`NumeFactIni` int NOT NULL,
`NumeFactFin` int NOT NULL,
`ResolDian` varchar(255) NOT NULL,
`id` int NOT NULL AUTO_INCREMENT,
`Restaurante` int NOT NULL,
PRIMARY KEY (`id`)
);
CREATE TABLE `Categoria` (
`id` int NOT NULL AUTO_INCREMENT,
`Nombre` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
);
CREATE TABLE `CatxRest` (
`id_Cat` int NOT NULL,
`id_Rest` int NOT NULL,
PRIMARY KEY (`id_Cat`,`id_Rest`)
);
CREATE TABLE `Mensajes` (
`id` int NOT NULL AUTO_INCREMENT,
`Remitente` int NOT NULL,
`Destinatario` int NOT NULL,
`Titulo` varchar(255) NOT NULL,
`Mensaje` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
);
CREATE TABLE `Reseñas` (
`id` int NOT NULL AUTO_INCREMENT,
`Restaurante` int NOT NULL,
`Usuario` int NOT NULL,
`Valor` int NOT NULL,
`Recomendacion` varchar(255) NOT NULL,
`Fecha` DATETIME NOT NULL,
PRIMARY KEY (`id`)
);
CREATE TABLE `TipoRedes` (
`id` int NOT NULL AUTO_INCREMENT,
`Nombre` int NOT NULL,
PRIMARY KEY (`id`)
);
CREATE TABLE `Redes` (
`id` int NOT NULL AUTO_INCREMENT,
`Url` int NOT NULL,
`Icono` varchar(255) NOT NULL,
`Tipo` int NOT NULL,
PRIMARY KEY (`id`)
);
CREATE TABLE `RedesxRest` (
`id_Rest` int NOT NULL,
`id_Redes` int NOT NULL,
PRIMARY KEY (`id_Rest`)
);
CREATE TABLE `CatPlatos` (
`id` int NOT NULL AUTO_INCREMENT,
`Descripcion` varchar(255) NOT NULL,
`Foto` int NOT NULL,
PRIMARY KEY (`id`)
);
CREATE TABLE `Promoplato` (
`id` int NOT NULL AUTO_INCREMENT,
`Valor` int NOT NULL,
`Fecha_ini` DATETIME NOT NULL,
`Fecha_Fin` DATETIME NOT NULL,
PRIMARY KEY (`id`)
);
CREATE TABLE `PromoxPlato` (
`id_Plato` int NOT NULL,
`id_PromoP` int NOT NULL,
PRIMARY KEY (`id_Plato`)
);
CREATE TABLE `Fotoxplato` (
`id_FotoVid` int NOT NULL,
`id_Plato` int NOT NULL,
PRIMARY KEY (`id_FotoVid`,`id_Plato`)
);
CREATE TABLE `Mesas` (
`id` int NOT NULL AUTO_INCREMENT,
`numero` int NOT NULL,
`Puestos` int NOT NULL,
`Restaurante` int NOT NULL,
PRIMARY KEY (`id`)
);
CREATE TABLE `Reservas` (
`id` int NOT NULL AUTO_INCREMENT,
`id_Restaurante` int NOT NULL,
`id_Usuario` int NOT NULL,
`id_Mesa` int NOT NULL,
`Fecha` DATETIME NOT NULL,
`Hora_Ini` TIME NOT NULL,
`Hora_Fin` TIME NOT NULL,
`Cant_Personas` int NOT NULL,
`informacionAdc` varchar(255) NOT NULL,
`total` double NOT NULL,
`total_desc` double NOT NULL,
`total_iva` double NOT NULL,
`Detalle_Reserv` int NOT NULL,
PRIMARY KEY (`id`)
);
CREATE TABLE `Detalle_Reserv` (
`id` int NOT NULL AUTO_INCREMENT,
`id_Plato` int NOT NULL,
`precio` double NOT NULL,
`cant` int NOT NULL,
`Subtotal` double NOT NULL,
`Sub_desc` double NOT NULL,
`Sub_Iva` double NOT NULL,
PRIMARY KEY (`id`)
);
CREATE TABLE `PlatosxRest` (
`id_Rest` int NOT NULL,
`id_Plat` int NOT NULL,
PRIMARY KEY (`id_Rest`)
);
ALTER TABLE `users` ADD CONSTRAINT `users_fk0` FOREIGN KEY (`ciudad`)
REFERENCES `Ciudades`(`id`);
ALTER TABLE `Departamento` ADD CONSTRAINT `Departamento_fk0` FOREIGN KEY
(`Pais`) REFERENCES `Pais`(`id`);
ALTER TABLE `Ciudades` ADD CONSTRAINT `Ciudades_fk0` FOREIGN KEY
(`Departamento`) REFERENCES `Departamento`(`id`);
ALTER TABLE `EmpxRestaurante` ADD CONSTRAINT `EmpxRestaurante_fk0` FOREIGN KEY (`id_Rest`) REFERENCES `Restaurantes`(`id`);
ALTER TABLE `EmpxRestaurante` ADD CONSTRAINT `EmpxRestaurante_fk1` FOREIGN KEY (`id_Emp`) REFERENCES `users`(`id`);
ALTER TABLE `Restaurantes` ADD CONSTRAINT `Restaurantes_fk0` FOREIGN KEY
(`Ciudad`) REFERENCES `Ciudades`(`id`);
ALTER TABLE `Restaurantes` ADD CONSTRAINT `Restaurantes_fk1` FOREIGN KEY
(`FotoPerfil`) REFERENCES `Foto_Vid`(`id`);
ALTER TABLE `Restaurantes` ADD CONSTRAINT `Restaurantes_fk2` FOREIGN KEY
(`FotoPortada`) REFERENCES `Foto_Vid`(`id`);
ALTER TABLE `Restaurantes` ADD CONSTRAINT `Restaurantes_fk3` FOREIGN KEY
(`Promo`) REFERENCES `PromoRest`(`id`);
ALTER TABLE `ClientxRest` ADD CONSTRAINT `ClientxRest_fk0` FOREIGN KEY
(`idClient`) REFERENCES `users`(`id`);
ALTER TABLE `ClientxRest` ADD CONSTRAINT `ClientxRest_fk1` FOREIGN KEY
(`idRest`) REFERENCES `Restaurantes`(`id`);
ALTER TABLE `FotosVidLugar` ADD CONSTRAINT `FotosVidLugar_fk0` FOREIGN KEY
(`idRest`) REFERENCES `Restaurantes`(`id`);
ALTER TABLE `FotosVidLugar` ADD CONSTRAINT `FotosVidLugar_fk1` FOREIGN KEY
(`id_Foto`) REFERENCES `Foto_Vid`(`id`);
ALTER TABLE `Platos` ADD CONSTRAINT `Platos_fk0` FOREIGN KEY (`Categoria`)
REFERENCES `CatPlatos`(`id`);
ALTER TABLE `HorarioxRest` ADD CONSTRAINT `HorarioxRest_fk0` FOREIGN KEY
(`idRest`) REFERENCES `Restaurantes`(`id`);
ALTER TABLE `HorarioxRest` ADD CONSTRAINT `HorarioxRest_fk1` FOREIGN KEY
(`idHor`) REFERENCES `Horario`(`id`);
ALTER TABLE `configRest` ADD CONSTRAINT `configRest_fk0` FOREIGN KEY
(`Restaurante`) REFERENCES `Restaurantes`(`id`);
ALTER TABLE `CatxRest` ADD CONSTRAINT `CatxRest_fk0` FOREIGN KEY (`id_Cat`)
REFERENCES `Categoria`(`id`);
ALTER TABLE `CatxRest` ADD CONSTRAINT `CatxRest_fk1` FOREIGN KEY (`id_Rest`)
REFERENCES `Restaurantes`(`id`);
ALTER TABLE `Mensajes` ADD CONSTRAINT `Mensajes_fk0` FOREIGN KEY
(`Remitente`) REFERENCES `users`(`id`);
ALTER TABLE `Mensajes` ADD CONSTRAINT `Mensajes_fk1` FOREIGN KEY
(`Destinatario`) REFERENCES `Restaurantes`(`id`);
ALTER TABLE `Reseñas` ADD CONSTRAINT `Reseñas_fk0` FOREIGN KEY
(`Restaurante`) REFERENCES `Restaurantes`(`id`);
ALTER TABLE `Reseñas` ADD CONSTRAINT `Reseñas_fk1` FOREIGN KEY (`Usuario`)
REFERENCES `users`(`id`);
ALTER TABLE `Redes` ADD CONSTRAINT `Redes_fk0` FOREIGN KEY (`Tipo`)
REFERENCES `TipoRedes`(`id`);
ALTER TABLE `RedesxRest` ADD CONSTRAINT `RedesxRest_fk0` FOREIGN KEY
(`id_Rest`) REFERENCES `Restaurantes`(`id`);
ALTER TABLE `RedesxRest` ADD CONSTRAINT `RedesxRest_fk1` FOREIGN KEY
(`id_Redes`) REFERENCES `Redes`(`id`);
ALTER TABLE `CatPlatos` ADD CONSTRAINT `CatPlatos_fk0` FOREIGN KEY (`Foto`)
REFERENCES `Foto_Vid`(`id`);
ALTER TABLE `PromoxPlato` ADD CONSTRAINT `PromoxPlato_fk0` FOREIGN KEY
(`id_Plato`) REFERENCES `Platos`(`id`);
ALTER TABLE `PromoxPlato` ADD CONSTRAINT `PromoxPlato_fk1` FOREIGN KEY
(`id_PromoP`) REFERENCES `Promoplato`(`id`);
ALTER TABLE `Fotoxplato` ADD CONSTRAINT `Fotoxplato_fk0` FOREIGN KEY
(`id_FotoVid`) REFERENCES `Foto_Vid`(`id`);
ALTER TABLE `Fotoxplato` ADD CONSTRAINT `Fotoxplato_fk1` FOREIGN KEY
(`id_Plato`) REFERENCES `Platos`(`id`);
ALTER TABLE `Mesas` ADD CONSTRAINT `Mesas_fk0` FOREIGN KEY (`Restaurante`)
REFERENCES `Restaurantes`(`id`);
ALTER TABLE `Reservas` ADD CONSTRAINT `Reservas_fk0` FOREIGN KEY
(`id_Restaurante`) REFERENCES `Restaurantes`(`id`);
ALTER TABLE `Reservas` ADD CONSTRAINT `Reservas_fk1` FOREIGN KEY
(`id_Usuario`) REFERENCES `users`(`id`);
ALTER TABLE `Reservas` ADD CONSTRAINT `Reservas_fk2` FOREIGN KEY (`id_Mesa`)
REFERENCES `Mesas`(`id`);
ALTER TABLE `Detalle_Reserv` ADD CONSTRAINT `Detalle_Reserv_fk0` FOREIGN KEY
(`id_Plato`) REFERENCES `Platos`(`id`);
ALTER TABLE `PlatosxRest` ADD CONSTRAINT `PlatosxRest_fk0` FOREIGN KEY
(`id_Rest`) REFERENCES `Restaurantes`(`id`);
ALTER TABLE `PlatosxRest` ADD CONSTRAINT `PlatosxRest_fk1` FOREIGN KEY
(`id_Plat`) REFERENCES `Platos`(`id`);