-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Авг 05 2024 г., 20:45
-- Версия сервера: 10.4.28-MariaDB
-- Версия PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `dw3_shevelev_maksim`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categorias`
--

CREATE TABLE `categorias` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'Caramelos'),
(2, 'Gomitas'),
(3, 'Chocolate');

-- --------------------------------------------------------

--
-- Структура таблицы `detalle_orden`
--

CREATE TABLE `detalle_orden` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_orden` int(11) UNSIGNED NOT NULL,
  `id_producto` int(10) UNSIGNED NOT NULL,
  `cantidad` int(10) UNSIGNED NOT NULL,
  `precio` float(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `detalle_orden`
--

INSERT INTO `detalle_orden` (`id`, `id_orden`, `id_producto`, `cantidad`, `precio`) VALUES
(5, 3, 10, 3, 4600.00),
(6, 3, 8, 3, 19990.00),
(7, 4, 3, 5, 2100.00),
(8, 4, 6, 3, 3600.00),
(9, 4, 14, 2, 3900.00),
(10, 4, 16, 1, 4600.00),
(11, 5, 9, 10, 4100.00),
(12, 5, 11, 10, 3900.00),
(13, 5, 13, 10, 3800.00),
(14, 6, 5, 1, 2200.00),
(15, 6, 4, 1, 2300.00),
(16, 6, 15, 3, 3800.00),
(17, 7, 3, 1, 2100.00);

-- --------------------------------------------------------

--
-- Структура таблицы `idoniedad`
--

CREATE TABLE `idoniedad` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre_completo` varchar(256) NOT NULL,
  `cantidad` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `idoniedad`
--

INSERT INTO `idoniedad` (`id`, `nombre_completo`, `cantidad`) VALUES
(1, 'Almacenamiento a 12 mes', '12 mes'),
(2, 'Almacenamiento a 6 mes', '6 mes'),
(3, 'Almacenamiento a 2 mes', '2 mes'),
(4, 'Almacenamiento a 14 días', '14 días');

-- --------------------------------------------------------

--
-- Структура таблицы `ordenes`
--

CREATE TABLE `ordenes` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `total` float(8,2) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `ordenes`
--

INSERT INTO `ordenes` (`id`, `id_usuario`, `total`, `fecha`) VALUES
(3, 2, 73770.00, '2024-07-30 20:12:38'),
(4, 4, 33700.00, '2024-07-31 10:47:12'),
(5, 3, 118000.00, '2024-07-31 11:10:35'),
(6, 5, 15900.00, '2024-07-31 15:38:17'),
(7, 5, 2100.00, '2024-07-31 16:19:44');

-- --------------------------------------------------------

--
-- Структура таблицы `productos`
--

CREATE TABLE `productos` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(256) NOT NULL,
  `categoria_principal_id` int(10) UNSIGNED NOT NULL,
  `idoniedad_id` int(10) UNSIGNED NOT NULL,
  `subcategoria_id` int(10) UNSIGNED NOT NULL,
  `tipo_id` int(10) UNSIGNED NOT NULL,
  `valor_energetico` smallint(5) UNSIGNED NOT NULL,
  `peso` smallint(5) UNSIGNED NOT NULL,
  `origen` varchar(256) NOT NULL,
  `ingridientes` varchar(256) NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` varchar(256) NOT NULL,
  `precio` float(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `productos`
--

INSERT INTO `productos` (`id`, `titulo`, `categoria_principal_id`, `idoniedad_id`, `subcategoria_id`, `tipo_id`, `valor_energetico`, `peso`, `origen`, `ingridientes`, `descripcion`, `imagen`, `precio`) VALUES
(1, 'Caramelos clasicos', 1, 1, 4, 1, 200, 100, 'Argentina', 'Azúcar, jarabe de glucosa, agua, mantequilla 82,5%, sal rosa del Himalaya.', 'Surtido de caramelos de varios sabores', 'golosinas2.webp', 1700.00),
(2, 'Caramelos cremosos', 1, 1, 4, 1, 250, 100, 'Argentina', 'Crema 35%, azúcar, jarabe de glucosa, agua, mantequilla 82,5%, sal rosa del Himalaya.', 'Surtido de caramelos cremosos', 'caramelos1.webp', 2200.00),
(3, 'Caramelos con dulce de leche', 1, 1, 4, 1, 350, 100, 'Argentina', 'Crema 35%, azúcar, jarabe de glucosa, agua, mantequilla 82,5%, dulce de leche, sal rosa del Himalaya.', 'Caramelos con dulce de leche', 'caramelos2.webp', 2100.00),
(4, 'Gomitas con jugo', 2, 3, 1, 2, 400, 100, 'Argentina', 'Puré de frutas, jugo de frutas azúcar, jarabe de glucosa, pectina.', 'Surtido de gomitas con agregado de jugo natural', 'con_jugo4.webp', 2300.00),
(5, 'Gomitas con forma de frutas', 2, 3, 1, 2, 300, 100, 'Argentina', 'Puré de frutas y bayas, azúcar, jarabe de glucosa, pectina.', 'Una variedad de sabores de frutas en las gomitas', 'formas_frutas3.webp', 2200.00),
(6, 'Gomitas artesanales', 2, 4, 4, 2, 400, 100, 'Argentina', 'Puré de frutas y bayas, azúcar, jarabe de glucosa, pectina.', 'Delicadas gomitas artesanales hechas por nuestros maestros', 'gomitas_artesanal2.webp', 3600.00),
(7, 'Ositos de goma', 2, 3, 4, 2, 300, 100, 'Argentina', 'Puré de frutas y bayas, azúcar, jarabe de glucosa, pectina.', 'Ositos de goma famosas', 'ositos2.webp', 2150.00),
(8, 'Set de regalo', 2, 3, 4, 2, 300, 1000, 'Argentina', 'Puré de frutas y bayas, azúcar, jarabe de glucosa, pectina.', '1 kg de gomitas en un bonito empaque de regalo', 'set_regalo.webp', 19990.00),
(9, 'Chocolate con coco', 3, 2, 2, 3, 650, 100, 'Brasil', 'Aceite de cacao, leche entera en polvo, azúcar de coco, semillas de trigo sarraceno, coco rallado, emulsionante natural lecitina de girasol.', 'Chocolate de alta calidad con coco', 'chocolate_con_coco.webp', 4100.00),
(10, 'Chocolate con avellanas', 3, 2, 3, 3, 850, 100, 'Brasil', 'Azúcar, aceite de cacao, leche entera en polvo, avellanas trituradas, cacao en polvo, suero de leche en polvo.', 'Chocolate de alta calidad con avellanas', 'chocolate_con_avellanas.webp', 4600.00),
(11, 'Chocolate con menta', 3, 2, 2, 3, 550, 100, 'Brasil', 'Cacao en polvo natural, miel de abeja, manteca de cacao sin refinar, aceite esencial de menta.', 'Chocolate de alta calidad con menta', 'chocolate_con_menta.webp', 3900.00),
(12, 'Chocolate con pimienta', 3, 2, 2, 3, 450, 100, 'Brasil', 'Cacao en polvo, azúcar, manteca de cacao, emulsionante: lecitina de soja, aroma natural: vainilla, pimienta de chile molida, sal.', 'Chocolate de alta calidad con pimienta', 'chocolate_con_pimienta.webp', 4000.00),
(13, 'Chocolate blanco', 3, 1, 4, 3, 500, 100, 'Argentina', 'Aceite de cacao, azúcar, leche en polvo y vainillina sin adición de polvo de cacao', 'Chocolate blanco de alta calidad', 'chocolate_blanco.webp', 3800.00),
(14, 'Chocolate amargo', 3, 1, 4, 3, 550, 100, 'Brasil', 'Aceite de cacao, cacao en polvo, azúcar.', 'Chocolate amargo de alta calidad', 'chocolate_amargo.webp', 3900.00),
(15, 'Chocolate con leche', 3, 2, 3, 3, 700, 100, 'Brasil', 'Aceite de cacao, cacao en polvo, azúcar, leche.', 'Chocolate de alta calidad con leche', 'chocolate_con_leche.webp', 3800.00),
(16, 'Chocolate con almendras', 3, 2, 3, 3, 850, 100, 'Brasil', 'Azúcar, aceite de cacao, leche entera en polvo, almendras, cacao en polvo, suero de leche en polvo.', 'Chocolate de alta calidad con almendras', 'chocolate_con_almendras.webp', 4600.00);

-- --------------------------------------------------------

--
-- Структура таблицы `producto_x_categoria`
--

CREATE TABLE `producto_x_categoria` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_producto` int(10) UNSIGNED NOT NULL,
  `id_categoria` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `subcategorias`
--

CREATE TABLE `subcategorias` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre_completo` varchar(256) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `subcategorias`
--

INSERT INTO `subcategorias` (`id`, `nombre_completo`, `descripcion`) VALUES
(1, 'Dietético', 'Menos azúcar y calorías, adecuados para quienes cuidan su figura y salud'),
(2, 'Veganos', 'Elaborados sin productos de origen animal, ideales para veganos'),
(3, 'Energéticos', 'Contienen alta cantidad de calorias para aumentar el nivel de energía y actividad'),
(4, 'Sin gluten', 'No contienen gluten, adecuados para personas con celiaquía o intolerancia al gluten');

-- --------------------------------------------------------

--
-- Структура таблицы `suscripciones`
--

CREATE TABLE `suscripciones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(256) NOT NULL,
  `apellido` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `telefono` varchar(256) NOT NULL,
  `comentario` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `suscripciones`
--

INSERT INTO `suscripciones` (`id`, `nombre`, `apellido`, `email`, `telefono`, `comentario`) VALUES
(9, 'Maksim', 'Shevelev', 'm.v.shevelev1991@gmail.com', '01129595959', 'Hola!');

-- --------------------------------------------------------

--
-- Структура таблицы `tipo`
--

CREATE TABLE `tipo` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `tipo`
--

INSERT INTO `tipo` (`id`, `nombre`) VALUES
(1, 'caramelos duros, piruletas/caramelo por peso'),
(2, 'gomitas, golosinas de gelatina/gomitas por peso'),
(3, 'dulces de chocolate/chocolate por peso');

-- --------------------------------------------------------

--
-- Структура таблицы `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `nombre_usuario` varchar(20) NOT NULL,
  `nombre_completo` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `roles` enum('usuario','admin','superadmin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `nombre_usuario`, `nombre_completo`, `password`, `roles`) VALUES
(1, 'maksim.shevelev@davinci.edu.ar', 'Max', 'Maxim Shevelev', '$2y$10$yn4NTb0Qsind9LTTpWApwe2dSA2aZDIt4cX.xlxos..4QX7tKhhvS', 'admin'),
(2, 'm.v.shevelev1991@gmail.com', 'Maksim', 'Maksim Shevelev', '$2y$10$gZrtbb1W9..SJ.iyldguD.WFlYim.9QBABlHJ6PYsUn9PhqwTxs9u', 'usuario'),
(3, 'maxi.shevelev@yandex.ru', 'Maxi', 'Maximelino Sheveliano', '$2y$10$5bBTkfDZL8dc2bFXffXs8.GtyjdPKSBIFHfAWPRsaAz6VIW6DnLNa', 'usuario'),
(4, 'sheveleva.tatiana@gmail.com', 'Tati', 'Sheveleva Tatiana', '$2y$10$5bBTkfDZL8dc2bFXffXs8.GtyjdPKSBIFHfAWPRsaAz6VIW6DnLNa', 'usuario'),
(5, 'sheveleva.sta@gmail.com', 'Tatia', 'Tatiana Sheveleva', '$2y$10$Vmb7NKVd/7Vi6Cl5xkSzb.GXLL7z4Zwv.84pMlsVNbOAhjY/EbtA2', 'usuario');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `detalle_orden`
--
ALTER TABLE `detalle_orden`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_orden` (`id_orden`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Индексы таблицы `idoniedad`
--
ALTER TABLE `idoniedad`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ordenes`
--
ALTER TABLE `ordenes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Индексы таблицы `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personaje_principal_id` (`categoria_principal_id`),
  ADD KEY `guionista_id` (`idoniedad_id`),
  ADD KEY `artista_id` (`subcategoria_id`),
  ADD KEY `serie_id` (`tipo_id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Индексы таблицы `producto_x_categoria`
--
ALTER TABLE `producto_x_categoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_comic` (`id_producto`),
  ADD KEY `id_personaje` (`id_categoria`);

--
-- Индексы таблицы `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `suscripciones`
--
ALTER TABLE `suscripciones`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `detalle_orden`
--
ALTER TABLE `detalle_orden`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `idoniedad`
--
ALTER TABLE `idoniedad`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `ordenes`
--
ALTER TABLE `ordenes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT для таблицы `producto_x_categoria`
--
ALTER TABLE `producto_x_categoria`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблицы `subcategorias`
--
ALTER TABLE `subcategorias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `suscripciones`
--
ALTER TABLE `suscripciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `detalle_orden`
--
ALTER TABLE `detalle_orden`
  ADD CONSTRAINT `detalle_orden_ibfk_1` FOREIGN KEY (`id_orden`) REFERENCES `ordenes` (`id`),
  ADD CONSTRAINT `detalle_orden_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`);

--
-- Ограничения внешнего ключа таблицы `ordenes`
--
ALTER TABLE `ordenes`
  ADD CONSTRAINT `ordenes_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categoria_principal_id`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`idoniedad_id`) REFERENCES `idoniedad` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_ibfk_3` FOREIGN KEY (`subcategoria_id`) REFERENCES `subcategorias` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_ibfk_4` FOREIGN KEY (`tipo_id`) REFERENCES `tipo` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `producto_x_categoria`
--
ALTER TABLE `producto_x_categoria`
  ADD CONSTRAINT `producto_x_categoria_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_x_categoria_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
