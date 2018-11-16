-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 16 2018 г., 17:14
-- Версия сервера: 5.6.38
-- Версия PHP: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `Sofastore`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `parent` int(11) NOT NULL,
  `sort` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `title`, `url`, `parent`, `sort`) VALUES
(1, 'Кухонные гарнитуры', 'kuhonnyie_garnituryi', 5, 0),
(2, 'Closet', 'Closet', 0, 0),
(3, 'Модульные детские', 'modulnyie_detskie', 40, 0),
(4, 'Sofa', 'Sofa', 0, 0),
(5, 'Kitchen', 'Kitchen', 0, 0),
(16, 'Office', 'Office', 0, 0),
(18, 'Прямые', 'pryamyie', 4, 0),
(39, 'Bedroom', 'Bedroom', 0, 0),
(40, 'Children', 'Children', 0, 0),
(52, 'Hall', 'Hall', 0, 0),
(53, 'Other', 'Other', 0, 0),
(54, 'Угловые-д', 'uglovyie-d', 4, 0),
(55, 'Модульные', 'modulnyie', 4, 0),
(56, 'Кресла', 'kresla', 4, 0),
(57, 'Пуфы', 'pufyi', 4, 0),
(58, 'Купе', 'kupe', 2, 0),
(59, 'Угловые-ш', 'uglovyie-sh', 2, 0),
(60, 'Распашные', 'raspashnyie', 2, 0),
(61, 'Гардеробные', 'garderobnyie', 2, 0),
(62, 'Lounge', 'Lounge', 0, 0),
(63, 'Модульные', 'modulnyie', 62, 0),
(64, 'Журнальные столики', 'jurnalnyie_stoliki', 62, 0),
(65, 'Тумбы', 'tumbyi', 62, 0),
(66, 'Книжные шкафы', 'knijnyie_shkafyi', 62, 0),
(67, 'Полки', 'polki', 62, 0),
(68, 'Кровати', 'krovati', 39, 0),
(69, 'Матрасы', 'matrasyi', 39, 0),
(70, 'Прикроватные тумбы', 'prikrovatnyie_tumbyi', 39, 0),
(71, 'Комоды', 'komodyi', 39, 0),
(72, 'Банкетки', 'banketki', 39, 0),
(74, 'Прихожие', 'prihojie', 52, 0),
(75, 'Шкафы-купе', 'shkafyi-kupe', 52, 0),
(76, 'Вешалки', 'veshalki', 52, 0),
(77, 'Комоды', 'komodyi', 52, 0),
(78, 'Обувницы', 'obuvnitsyi', 52, 0),
(79, 'Кухонные диваны и уголки', 'kuhonnyie_divanyi_i_ugolki', 5, 0),
(80, 'Столы и обеденные группы', 'stolyi_i_obedennyie_gruppyi', 5, 0),
(81, 'Стулья для кухни', 'stulya_dlya_kuhni', 5, 0),
(82, 'Детские кровати', 'detskie_krovati', 40, 0),
(83, 'Детские диваны', 'detskie_divanyi', 40, 0),
(84, 'Книжные шкафы и стеллажи', 'knijnyie_shkafyi_i_stellaji', 16, 0),
(85, 'Столы компьютерные', 'stolyi_kompyuternyie', 16, 0),
(86, 'Компьютерные кресла и стулья', 'kompyuternyie_kresla_i_stulya', 16, 0),
(87, 'Офисные диваны', 'ofisnyie_divanyi', 16, 0),
(88, 'Офисные кресла', 'ofisnyie_kresla', 16, 0),
(90, 'Товары для хранения', 'tovaryi_dlya_hraneniya', 53, 0),
(91, 'Средства по уходу за мебелью', 'sredstva_po_uhodu_za_mebelyu', 53, 0),
(92, 'Прочее', 'prochee', 53, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `message` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `message`) VALUES
(3, 'Иннокентьев Константин Филиппович', 'innokentiev1987@bk.ru', 'Я искал магазин, но так его и не нашёл, я кружил на улице Бологое много раз, но вас так там и не нашёл, поставьте крупную вывеску с указателем куда заезжать'),
(4, 'Валерьев Игорь Николаевич', 'valerievigor@yandex.ru', 'Здравствуйте');

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fio` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `adres` varchar(255) NOT NULL,
  `summ` varchar(255) NOT NULL,
  `order_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`id`, `date`, `fio`, `email`, `phone`, `adres`, `summ`, `order_content`) VALUES
(2, '2018-10-10 19:21:32', 'Валерьев Игорь Николаевич', 'valerievigor@yandex.ru', '8-905-655-49-78', 'г.Тверь, ул.Софьи Перовской 14', '65980 руб.', 'a:2:{i:59;a:3:{s:6:\\\"name_P\\\";s:28:\\\"Диван Плиди Grafit\\\";s:5:\\\"price\\\";s:8:\\\"35990.00\\\";s:5:\\\"count\\\";i:1;}i:72;a:3:{s:6:\\\"name_P\\\";s:58:\\\"Диван угловой Манхэттен Textile Brown\\\";s:5:\\\"price\\\";s:8:\\\"29990.00\\\";s:5:\\\"count\\\";i:1;}}'),
(3, '2018-10-17 12:19:28', 'Мелентьев Александр Геннадьевич', 'melalgen@mail.ru', '8-915-675-52-32', 'г.Тверь ул. Дарвина 8', '149459 руб.', 'a:3:{i:59;a:3:{s:6:\"name_P\";s:28:\"Диван Плиди Grafit\";s:5:\"price\";s:8:\"35990.00\";s:5:\"count\";i:2;}i:72;a:3:{s:6:\"name_P\";s:58:\"Диван угловой Манхэттен Textile Brown\";s:5:\"price\";s:8:\"29990.00\";s:5:\"count\";i:2;}i:75;a:3:{s:6:\"name_P\";s:55:\"Распашной шкаф Дизель-2 Энигма\";s:5:\"price\";s:8:\"17499.00\";s:5:\"count\";i:1;}}'),
(5, '2018-11-06 16:29:20', 'Иннокентьев Виктор Васильевич', 'innok1990@mail.ru', '8-919-239-39-19', 'г.Тверь, ул.Шишкова 93Б', '11837 руб.', 'a:1:{i:74;a:3:{s:6:\"name_P\";s:70:\"Угловой распашной шкаф Монблан Береза\";s:5:\"price\";s:8:\"11837.00\";s:5:\"count\";i:1;}}'),
(6, '2018-11-12 17:48:25', 'Викторов Юрий Николаевич', 'viktorov-y-n@yandex.ru', '8-944-125-39-18', 'г.Тверь, ул. Бебеля 32', '89970 $', 'a:3:{i:76;a:3:{s:6:\"name_P\";s:47:\"Кровать Плиди 160 Velvet Green\";s:5:\"price\";s:13:\"23990.00\";s:5:\"count\";s:6:\"1\";}i:59;a:3:{s:6:\"name_P\";s:33:\"Диван Плиди Grafit\";s:5:\"price\";s:13:\"35990.00\";s:5:\"count\";s:6:\"1\";}i:72;a:3:{s:6:\"name_P\";s:63:\"Диван угловой Манхэттен Textile Brown\";s:5:\"price\";s:13:\"29990.00\";s:5:\"count\";s:6:\"1\";}}'),
(7, '2014-11-18 17:50:00', 'Валерьев Игорь Николаевич', 'valerievigor@yandex.ru', '8-905-655-49-78', 'г.Тверь, ул.Софьи Перовской 14', '33990 $', 'a:1:{i:58;a:3:{s:6:\"name_P\";s:30:\"Диван Динс Sherst Sky\";s:5:\"price\";s:8:\"33990.00\";s:5:\"count\";i:1;}}');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `old_price` decimal(8,2) NOT NULL,
  `url` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `color_legs` varchar(255) NOT NULL,
  `sleep_size` varchar(255) NOT NULL,
  `set_size` varchar(255) NOT NULL,
  `fasad_karkas` varchar(255) NOT NULL,
  `mechanism` varchar(255) NOT NULL,
  `filling` varchar(255) NOT NULL,
  `drawer` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `removable_cover` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `cat_id`, `name`, `desc`, `price`, `old_price`, `url`, `image_url`, `code`, `color`, `size`, `color_legs`, `sleep_size`, `set_size`, `fasad_karkas`, `mechanism`, `filling`, `drawer`, `removable_cover`) VALUES
(58, 18, 'Диван Динс Sherst Sky', 'Лаконичные линии и простые формы, безупречный стиль и индивидуальность – все это диван «Динс». Его сдержанный скандинавский дизайн украсит любую современную обстановку. Высокие ножки из массива дерева прекрасно дополняют прямоугольное основание в обивке из фактурной ткани. Мягкие валики обеспечивают дополнительный комфорт, а механизм трансформации позволяет раскладывать диван в удобную кровать.', '33990.00', '39990.00', 'sherstsky', 'SherstSky.png', 'Sherst-Sky', 'Синий', 'длина 218 см   ширина 95 см   высота 90 см', 'Бук Орех Венгетёмный', 'длина 195 см   ширина 144 см   высота 44 см', 'глубина 50 см   высота 44 см', 'массив, мебельный щит', 'пантограф', 'пружинная змейка, ППУ', 'Да', 'Нет'),
(59, 18, 'Диван Плиди Grafit', 'Удобный диван «Плиди» сочетает в себе компактные габариты и многофункциональность. Продуманный дизайн в духе лаконичной Скандинавии создаст в гостиной атмосферу гармонии и уюта, а практичный механизм трансформации позволит использовать диван как кровать. Приятная мягкость обивки чувствуется при первом касании – ощутите этот комфорт!', '35990.00', '39990.00', 'plidigrafit', 'Grafit.png', 'Grafit', 'Серый', 'длина 218 см   ширина 95 см   высота 90 см', 'Бук Орех Венгетёмный', 'длина 195 см   ширина 144 см   высота 44 см', 'глубина 50 см   высота 44 см', 'массив, мебельный щит', 'пантограф', 'холлофайбер', 'Да', 'Нет'),
(72, 54, 'Диван угловой Манхэттен Textile Brown', '«Манхэттен» — диван для бурной и красивой жизни. Современный дизайн отражает передовые взгляды своих хозяев. Мягкие набивные подушки, удобный подлокотник с одной стороны и практичный столик с другой — все лучшее в одном диване. Раскладной механизм «пума» легко превращает стильный «Манхэттен» в идеально ровное спальное место.', '29990.00', '34100.00', 'divan_uglovoy_manhetten_Textile_Brown', 'ugol-Grafit.png', 'Textile-Brown', 'Черный орех', 'длина 247 см   ширина 163 см   высота 92 см', 'Черный орех', 'длина 200 см   ширина 145 см   высота 43 см', 'высота 43 см   глубина 57 см', 'массив, мебельный щит', 'пума', 'холлофайбер крошка ППУ', 'Да', 'Нет'),
(73, 58, 'Шкаф-купе Эконом-80-190 Комби без зеркал 2 двери', 'Скромный и привлекательный фасад, качественная фурнитура и хорошая эргономика – шкаф-купе серии «Эконом-2» станет прекрасным решением для организации пространства в городской квартире или в небольшом офисе. Благодаря компактным размерам, он не только надежно позаботится о хранении личного гардероба и домашних вещей, но и сэкономит место. Лицевая сторона модели может быть декорирована большим и удобным зеркалом. За дверцами вас ждет продуманное внутреннее наполнение. А наличие ленты-щетки предотвратит попадание пыли внутрь шкафа и обеспечит бесшумное открывание и закрывание створок (данный элемент в базовую комплектацию изделия не входит и приобретается отдельно).', '5220.00', '0.00', 'shkaf-kupe_ekonom-80-190_kombi_bez_zerkal_2_dveri', 'ekonom-kombi.png', 'Эконом-80-190-Комби', 'коричневый, бежевый', 'ширина 80 см   глубина 40 см   высота 190 см', '', '', '', 'ЛДСП', 'раздвижная подвесная', 'ЛДСП', '', ''),
(74, 59, 'Угловой распашной шкаф Монблан Береза', 'В отличие от большинства систем купе распашные системы дают большую гибкость при разработке дизайна и функциональности шкафа – учитывать меньший размер изделия, устанавливать дополнительные ящики или отсеки с лицевой стороны шкафа, а также не нарушать целостность фасада профилями', '11837.00', '0.00', 'uglovoy_raspashnoy_shkaf_monblan_bereza', 'Monblan-bereza.png', 'Monblan-bereza', 'белый, бежевый', 'ширина 65 см   глубина 65 см   высота 200 см', '', '', '', 'МДФ', 'распашные двери', 'ЛДСП', '', ''),
(75, 59, 'Распашной шкаф Дизель-2 Энигма', 'В отличие от большинства систем купе распашные системы дают большую гибкость при разработке дизайна и функциональности шкафа – учитывать меньший размер изделия, устанавливать дополнительные ящики или отсеки с лицевой стороны шкафа, а также не нарушать целостность фасада профилями.', '17499.00', '0.00', 'raspashnoy_shkaf_dizel-2_enigma', 'Disel-2-Enigma.png', 'Disel-2-Enigma', 'бежевый', 'ширина 85.8 см   глубина 59 см   высота 210.4 см', '', '', '', 'ЛДСП', 'распашные двери', 'ЛДСП', '', ''),
(76, 68, 'Кровать Плиди 160 Velvet Green', '«Плиди» – универсальная модель, которая легко адаптируется под потребности интерьера. Ее дизайн подчеркнуто строг и изящен. Декоративные пуговицы – по три на изголовье и изножье, выгодно дополняют скругленные формы кровати. Высокое качество материалов и сборки отвечают за долговечность и надежность конструкции.', '23990.00', '0.00', 'krovat_plidi_160_Velvet_Green', 'P160-Velvet.png', 'Plidi-160-Velvet', 'Зелёный', 'длина 210 см   ширина 170.5 см   высота 110 см', 'Лак светлый Венге темный', 'длина 210 см   ширина 170.5 см   высота 110 см', 'длина 200 см   ширина 160 см', 'ЛДСП, ткань', 'без механизма', 'ЛДСП, ткань', 'Нет', 'Нет');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `pass`, `role`) VALUES
(1, 'admin', 'vergo', 1),
(2, 'Grant', 'qwerty', 2),
(3, 'Alex', 'qwerty121', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
