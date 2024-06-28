cREATE DATABASE ARENAL_FRAMES_DB;

CREATE TABLE `Usuarios` (
  `id_usuario` int PRIMARY KEY,
  `nombre` varchar(45),
  `correo` varchar(45),
  `contrasenna` varchar(20),
  `direccion` varchar(100),
  `primer_apellido` varchar(45),
  `segundo_apellido` varchar(45),
  `estado` bit,
  `id_rol` int
);

CREATE TABLE `Rol` (
  `id_rol` int PRIMARY KEY,
  `nombre_rol` varchar(45)
);

CREATE TABLE `Orden` (
  `id_orden` int PRIMARY KEY,
  `fecha_orden` datetime,
  `id_usuario` int
);

CREATE TABLE `ProductoXOrden` (
  `consecutivo` int PRIMARY KEY,
  `id_orden_prodXorden` int,
  `id_producto_prodXorden` int,
  `cantidad` int
);

CREATE TABLE `Producto` (
  `id_producto` int PRIMARY KEY,
  `nombre_producto` varchar(30),
  `precio` double,
  `id_material` int,
  `id_categoria` int
);

CREATE TABLE `Material` (
  `id_material` int PRIMARY KEY,
  `descripcion` varchar(100),
  `id_proveedor` int
);

CREATE TABLE `Proveedor` (
  `id_proveedor` int PRIMARY KEY,
  `nombre_proveedor` varchar(30),
  `descripcion` varchar(100)
);

CREATE TABLE `Categoria` (
  `id_categoria` int PRIMARY KEY,
  `nombre_categoria` varchar(45),
  `tipo_categoria` varchar(45)
);

CREATE TABLE `Factura` (
  `id_factura` int PRIMARY KEY,
  `id_usuario` int,
  `id_orden` int,
  `id_delivery` int,
  `monto` double
);

CREATE TABLE `Delivery` (
  `id_delivery` int PRIMARY KEY,
  `direccion` varchar(100),
  `id_estado` int
);

CREATE TABLE `Estado` (
  `id_estado` int PRIMARY KEY,
  `descripcion` varchar(20)
);

CREATE TABLE `Proveedor_Material` (
  `Proveedor_id_proveedor` int,
  `Material_id_proveedor` int,
  PRIMARY KEY (`Proveedor_id_proveedor`, `Material_id_proveedor`)
);



ALTER TABLE `Factura` ADD FOREIGN KEY (`id_orden`) REFERENCES `Orden` (`id_orden`);
ALTER TABLE `Factura` ADD FOREIGN KEY (`id_delivery`) REFERENCES `Delivery` (`id_delivery`);
ALTER TABLE `Proveedor_Material` ADD FOREIGN KEY (`Material_id_proveedor`) REFERENCES `Material` (`id_material`);
ALTER TABLE `Producto` ADD FOREIGN KEY (`id_material`) REFERENCES `Material` (`id_material`);
ALTER TABLE `Proveedor_Material` ADD FOREIGN KEY (`Proveedor_id_proveedor`) REFERENCES `Proveedor` (`id_proveedor`);
ALTER TABLE `Producto` ADD FOREIGN KEY (`id_categoria`) REFERENCES `Categoria` (`id_categoria`);
ALTER TABLE `Usuarios` ADD FOREIGN KEY (`id_usuario`) REFERENCES `Rol` (`id_rol`);
ALTER TABLE `Orden` ADD FOREIGN KEY (`id_orden`) REFERENCES `Usuarios` (`id_usuario`);
ALTER TABLE `Delivery` ADD FOREIGN KEY (`id_delivery`) REFERENCES `Estado` (`id_estado`);
ALTER TABLE `Factura` ADD FOREIGN KEY (`id_usuario`) REFERENCES `Usuarios` (`id_usuario`);
ALTER TABLE `ProductoXOrden` ADD FOREIGN KEY (`id_orden_prodXorden`) REFERENCES `Orden` (`id_orden`);
ALTER TABLE ProductoXOrden ADD FOREIGN KEY (id_producto_prodXorden) REFERENCES Producto (id_producto);
commit;