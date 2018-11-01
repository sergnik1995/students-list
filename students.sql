SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `students`
--

CREATE TABLE `students` (
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sex` enum('m','f') CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `gro` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `exams` int(11) NOT NULL,
  `y` year(4) NOT NULL,
  `locate` enum('y','n') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `students`
--

INSERT INTO `students` (`name`, `surname`, `sex`, `gro`, `email`, `exams`, `y`, `locate`) VALUES
('Ева', 'Фёдоров', 'f', '3d649', 'albert00@vorobev.org', 181, 1998, 'n'),
('Родион', 'Захаров', 'm', 'f64ex', 'aleksandr.fadeev@koklov.org', 19, 1990, 'n'),
('Ефим', 'Суханов', 'm', '299a3', 'aleksandra.lazarev@ya.ru', 117, 1991, 'y'),
('Регина', 'Селезнёв', 'f', '7789i', 'alla27@vorontov.ru', 64, 1998, 'n'),
('Софья', 'Казаков', 'f', 'ufvzn', 'antonin12@medvedev.ru', 45, 1991, 'n'),
('Василиса', 'Власов', 'f', '834hg', 'apollon.korolev@sidorov.org', 200, 1993, 'y'),
('Константин', 'Шашков', 'm', 'd97wg', 'avdeev.alina@romanov.ru', 183, 1999, 'n'),
('Маргарита', 'Брагин', 'f', 'pa005', 'belozerov.rodion@bk.ru', 214, 2000, 'y'),
('Никодим', 'Кондратьев', 'm', '6ok59', 'bfedotov@dyckov.ru', 140, 2000, 'y'),
('Родион', 'Калинин', 'm', '33g4k', 'bkrykov@inbox.ru', 79, 1999, 'y'),
('Капитолина', 'Фокин', 'f', 'fyh0m', 'blinov.galina@komarov.ru', 22, 1991, 'y'),
('test', 'Виноградов', 'f', '6tcqy', 'bronislav94@savelev.ru', 274, 2000, 'y'),
('Альбина', 'Агафонов', 'f', '909b8', 'bzimin@mail.ru', 123, 1993, 'n'),
('Викентий', 'Михеев', 'm', '4j8ko', 'davydov.vladlen@gmail.com', 101, 1991, 'n'),
('Эмма', 'Архипов', 'f', 'i39g7', 'dbelykov@yandex.ru', 167, 1991, 'y'),
('Олеся', 'Зуев', 'f', '9egtc', 'dkuzmin@inbox.ru', 208, 1999, 'n'),
('Трофим', 'Родионов', 'm', '12846', 'donat.borisov@gmail.com', 206, 2000, 'y'),
('Нонна', 'Михайлов', 'f', '7m063', 'doronin.svytoslav@konovalov.ru', 234, 1993, 'y'),
('Лада', 'Новиков', 'f', '3f167', 'eduard79@subin.com', 158, 1990, 'n'),
('Давид', 'Ситников', 'm', 'pdv3m', 'ekaterina.sidorov@mail.ru', 6, 1998, 'n'),
('Майя', 'Тарасов', 'f', '067dg', 'elvira.nikolaev@bk.ru', 232, 1997, 'y'),
('Вера', 'Фомичёв', 'f', '0en7y', 'elvira23@maslov.ru', 8, 1996, 'y'),
('Тамара', 'Кабанов', 'f', 'ss2mi', 'erik07@narod.ru', 220, 1995, 'y'),
('Лада', 'Куликов', 'f', 'wts16', 'eva24@lapin.com', 205, 1995, 'n'),
('Жанна', 'Тихонов', 'f', 'q845d', 'falekseev@krasilnikov.ru', 267, 1991, 'y'),
('Анжелика', 'Логинов', 'f', '88505', 'fedor77@bk.ru', 161, 1998, 'n'),
('Алёна', 'Баранов', 'f', 'qg7qv', 'fedoseev.vsevolod@antonov.ru', 95, 1999, 'n'),
('Василиса', 'Андреев', 'f', 'imw95', 'fedosy.andreev@list.ru', 295, 1998, 'y'),
('Антонина', 'Лаврентьев', 'f', '6a3dy', 'fsuvorov@mironov.ru', 131, 1994, 'n'),
('Вера', 'Михеев', 'f', 'zv7ry', 'ftimofeev@rambler.ru', 103, 1991, 'y'),
('Олег', 'Третьяков', 'm', 'pvkc3', 'gennadii.bykov@blinov.net', 18, 1999, 'n'),
('Гордей', 'Харитонов', 'm', '862v4', 'german.eliseev@mail.ru', 287, 1997, 'n'),
('Клементина', 'Аксёнов', 'f', 'k02q4', 'german.siryev@bk.ru', 255, 1993, 'n'),
('Ярослав', 'Нестеров', 'm', 'v654b', 'gleb18@list.ru', 258, 1999, 'n'),
('Валентина', 'Мельников', 'f', '4487l', 'gorbunov.lydmila@mail.ru', 217, 1994, 'n'),
('Радислав', 'Селиверстов', 'm', '6ap12', 'gorskov.sofy@inbox.ru', 220, 1992, 'y'),
('Владимир', 'Щукин', 'm', '7n524', 'grigorev.roman@hotmail.com', 221, 1994, 'y'),
('Богдан', 'Кудрявцев', 'm', '4p70t', 'hrodionov@artemev.com', 271, 1992, 'y'),
('Вячеслав', 'Вишняков', 'm', 'nekeb', 'ignatii.abramov@mail.ru', 170, 1999, 'n'),
('Антонина', 'Назаров', 'f', '5mfvh', 'illarion.kuznetov@antonov.ru', 133, 1998, 'n'),
('Милан', 'Костин', 'm', 'fmem9', 'inna72@lapin.com', 28, 2000, 'y'),
('Святослав', 'Орехов', 'm', '1o859', 'isaev.aleksandr@narod.ru', 80, 1995, 'y'),
('Розалина', 'Зимин', 'f', '2k157', 'iserbakov@rambler.ru', 21, 1990, 'y'),
('Михаил', 'Казаков', 'm', 'a9mz0', 'jdenisov@bk.ru', 4, 1990, 'n'),
('Виль', 'Лазарев', 'm', '91c10', 'jgromov@belousov.ru', 281, 1996, 'n'),
('Гордей', 'Фёдоров', 'm', 'b0gtc', 'jserbakov@zuravlev.net', 233, 1999, 'n'),
('Доминика', 'Тетерин', 'f', 'd0e5p', 'kabanov.alina@yandex.ru', 108, 2000, 'y'),
('Артур', 'Беспалов', 'm', '41g0z', 'kirill.sazonov@tikonov.com', 183, 1996, 'y'),
('Полина', 'Фомин', 'f', 'k00fa', 'kirill27@narod.ru', 14, 1992, 'n'),
('Майя', 'Гущин', 'f', '7n885', 'kirillov.semen@hotmail.com', 25, 1993, 'n'),
('Елизавета', 'Лихачёв', 'f', 's4p3h', 'kiselev.renata@pestov.org', 174, 1993, 'y'),
('Гарри', 'Зайцев', 'm', 'qwz8l', 'kkudryvtev@list.ru', 200, 1991, 'y'),
('Клим', 'Королёв', 'm', 'vpj2a', 'klara.zakarov@pakomov.net', 285, 1996, 'y'),
('Ярослав', 'Морозов', 'm', '3n6db', 'klementina.ykusev@gmail.com', 147, 1993, 'y'),
('Алексей', 'Данилов', 'm', '4l44x', 'kmedvedev@borisov.com', 278, 2000, 'n'),
('Иннокентий', 'Денисов', 'm', 'go2q7', 'kolesnikov.vadim@birykov.ru', 149, 1992, 'n'),
('Спартак', 'Суворов', 'm', 'd4r8f', 'kozlov.varvara@karpov.net', 157, 1990, 'y'),
('Клементина', 'Волков', 'f', '01c75', 'ksestakov@bk.ru', 186, 1990, 'n'),
('Назар', 'Гаврилов', 'm', '66qx2', 'kudryvtev.lidiy@list.ru', 171, 1999, 'n'),
('Людмила', 'Блохин', 'f', 'q8g25', 'kuzmin.yliy@belousov.com', 292, 1990, 'n'),
('Наталья', 'Ермаков', 'f', '1m90o', 'lada.grisin@misin.ru', 259, 1993, 'n'),
('Альбина', 'Кузнецов', 'f', '3z5t6', 'lada.noskov@gmail.com', 7, 1994, 'n'),
('Владлена', 'Мясников', 'f', '8fgjb', 'lada.simonov@pavlov.net', 124, 1991, 'n'),
('Иммануил', 'Соколов', 'm', 'hz611', 'lada.sobolev@rambler.ru', 291, 1999, 'y'),
('Артур', 'Игнатов', 'm', '4qape', 'lada91@rambler.ru', 118, 1997, 'n'),
('Инесса', 'Миронов', 'f', 'ax0sy', 'larkipov@koklov.org', 118, 1992, 'n'),
('Август', 'Аксёнов', 'm', '4t324', 'lazarev.nadezda@frolov.ru', 242, 1993, 'y'),
('Елизавета', 'Виноградов', 'f', 'aq89x', 'lbolsakov@rambler.ru', 193, 1991, 'y'),
('Лидия', 'Калинин', 'f', '2e6fh', 'lermakov@filippov.ru', 194, 1991, 'n'),
('Виктор', 'Калашников', 'm', '67j6z', 'lgurev@mamontov.org', 61, 1993, 'n'),
('Данила', 'Николаев', 'm', '263x8', 'lidiy22@bk.ru', 130, 1995, 'n'),
('Нестор', 'Жуков', 'm', 'h9whq', 'mandreev@belozerov.ru', 53, 1991, 'y'),
('Кузьма', 'Комиссаров', 'm', 'b9g64', 'marat05@ya.ru', 270, 1997, 'n'),
('Екатерина', 'Сидоров', 'f', '4n08q', 'mark.gorbunov@danilov.net', 163, 1995, 'y'),
('Екатерина', 'Сорокин', 'f', 'w59d9', 'mark58@maslov.ru', 168, 1995, 'y'),
('Тарас', 'Гуляев', 'm', 'ei134', 'markov.lydmila@rusakov.com', 234, 1996, 'y'),
('Кузьма', 'Громов', 'm', 'wc14w', 'matvei.zdanov@yandex.ru', 273, 1994, 'n'),
('Фаина', 'Авдеев', 'f', '37r35', 'mdavydov@vorontov.ru', 182, 1995, 'y'),
('Виктор', 'Бобров', 'm', 'jm6gq', 'mironov.nonna@yandex.ru', 41, 2000, 'n'),
('Тамара', 'Зимин', 'f', '6j365', 'miroslav.burov@list.ru', 184, 1997, 'n'),
('Эрик', 'Голубев', 'm', 'm6yom', 'nadezda16@blinov.ru', 168, 1999, 'y'),
('Валерий', 'Казаков', 'm', '5l3mr', 'naumov.mark@gmail.com', 132, 1990, 'n'),
('Клавдия', 'Капустин', 'f', '24x81', 'nikita00@yandex.ru', 226, 1997, 'n'),
('Егор', 'Игнатьев', 'm', 'bt05s', 'novikov.nelli@gmail.com', 118, 1997, 'y'),
('awdawdawdawd', 'igegejgieg', 'm', '201B', 'nsobolev@sokolov.ru', 300, 1995, 'y'),
('Регина', 'Рогов', 'f', '7fj8f', 'obogdanov@belousov.net', 273, 1990, 'y'),
('Яна', 'Лукин', 'f', '2f7zy', 'oksana.panov@alekseev.ru', 76, 1999, 'n'),
('Лада', 'Дмитриев', 'f', 'nq572', 'oksana.panov@ya.ru', 71, 1995, 'y'),
('Феликс', 'Алексеев', 'm', 'a20l4', 'olesy41@yandex.ru', 117, 1991, 'n'),
('Антон', 'Селиверстов', 'm', 'x2x64', 'olesy76@sazonov.net', 137, 1991, 'y'),
('Александра', 'Захаров', 'f', 'gfba6', 'orlov.stanislav@rambler.ru', 141, 1995, 'n'),
('Лада', 'Костин', 'f', '36mj4', 'pakomov.nestor@mamontov.com', 178, 1990, 'y'),
('Валерий', 'Вишняков', 'm', '4f119', 'petrov.dmitrii@konstantinov.com', 291, 1998, 'n'),
('Татьяна', 'Виноградов', 'f', '5zng9', 'plapin@ya.ru', 96, 1990, 'y'),
('Клара', 'Артемьев', 'f', '4lie9', 'ploginov@bk.ru', 107, 1992, 'n'),
('Алёна', 'Анисимов', 'f', 'r6z11', 'pnikitin@list.ru', 81, 2000, 'y'),
('Клара', 'Кошелев', 'f', 'f7226', 'pzykov@list.ru', 12, 1992, 'n'),
('Константин', 'Суворов', 'm', 'ls15h', 'qkaritonov@ya.ru', 72, 1994, 'y'),
('Иосиф', 'Морозов', 'm', '0o4t1', 'radislav91@gmail.com', 66, 1995, 'n'),
('Тит', 'Фёдоров', 'm', '9q5ls', 'refimov@sergeev.ru', 23, 1996, 'n'),
('Искра', 'Стрелков', 'f', 'zt031', 'rkoklov@pavlov.ru', 263, 1996, 'y'),
('Вениамин', 'Гришин', 'm', '9d6ru', 'rmisin@rambler.ru', 86, 1999, 'n'),
('Искра', 'Пахомов', 'f', '8w3n9', 'rozalina01@ya.ru', 11, 1990, 'y'),
('Ева', 'Кузьмин', 'f', 'u7cx3', 'savelev.filipp@kazakov.ru', 298, 2000, 'n'),
('Валентин', 'Субботин', 'm', '0l9c3', 'seliverstov.iskra@zaitev.ru', 215, 1991, 'y'),
('Роберт', 'Цветков', 'm', '9aquj', 'sergei98@nesterov.ru', 269, 1994, 'n'),
('Андрей', 'Селиверстов', 'm', '6r5p6', 'sestakov.yna@gmail.com', 147, 1992, 'n'),
('Владимир', 'Белов', 'm', '9ee92', 'sfrolov@mikeev.com', 14, 1995, 'n'),
('Илья', 'Зуев', 'm', 'do0js', 'silov.efim@eliseev.ru', 245, 1990, 'y'),
('Искра', 'Мясников', 'f', '16g21', 'sofiy.panfilov@kapustin.net', 105, 2000, 'n'),
('Диана', 'Галкин', 'f', '5l61m', 'sofy34@rambler.ru', 59, 1996, 'y'),
('Мария', 'Щукин', 'f', '406qm', 'solovev.rada@gmail.com', 123, 1996, 'y'),
('Семён', 'Никитин', 'm', '608fz', 'sorokin.faina@yandex.ru', 40, 1996, 'n'),
('Станислав', 'Михайлов', 'm', 's25rq', 'stepanov.viktor@emelynov.com', 240, 1992, 'n'),
('Гарри', 'Громов', 'm', '4ope6', 'sukin.aleksandr@egorov.ru', 9, 1998, 'n'),
('Инесса', 'Дементьев', 'f', '7q351', 'svytoslav.vorontov@narod.ru', 29, 1994, 'n'),
('Регина', 'Лыткин', 'f', '301ra', 'tkolobov@sukin.net', 229, 1992, 'n'),
('Ольга', 'Гуляев', 'f', 'v9iz8', 'trofimov.ylian@evdokimov.ru', 120, 1995, 'n'),
('Алёна', 'Архипов', 'f', '8mi76', 'umolcanov@evseev.com', 6, 2000, 'n'),
('Иван', 'Якушев', 'm', '2726l', 'valentin86@fedoseev.ru', 199, 2000, 'y'),
('Лада', 'Куликов', 'f', 'l85ys', 'valentin98@ykusev.com', 295, 1994, 'n'),
('Платон', 'Александров', 'm', '0bkaz', 'valerian33@kapustin.com', 135, 1998, 'n'),
('Донат', 'Хохлов', 'm', '23q2j', 'valeriy70@kirillov.com', 62, 1992, 'n'),
('Никодим', 'Стрелков', 'm', '3n81e', 'vasilisa.bobrov@bobylev.com', 31, 2000, 'y'),
('Юлия', 'Быков', 'f', '8n7yq', 'vfilippov@bk.ru', 127, 1999, 'y'),
('Ксения', 'Дементьев', 'f', '803dr', 'vil.merkusev@kuznetov.net', 148, 1997, 'y'),
('Ярослава', 'Федотов', 'f', 'ni8l7', 'vil83@lapin.com', 5, 1997, 'y'),
('Дина', 'Лебедев', 'f', '68z30', 'vladlena.fokin@mail.ru', 100, 1991, 'y'),
('Богдан', 'Тимофеев', 'm', 'cl6vo', 'voronov.marina@inbox.ru', 31, 1998, 'y'),
('Валерий', 'Носков', 'm', '9q3t2', 'vorontov.maksim@moiseev.net', 157, 1995, 'n'),
('Марат', 'Мартынов', 'm', '2v7kc', 'wblinov@gmail.com', 218, 1993, 'n'),
('Алла', 'Шашков', 'f', 'g0413', 'wdoronin@inbox.ru', 83, 1991, 'n'),
('Сава', 'Виноградов', 'm', '983hm', 'wzukov@turov.com', 297, 1995, 'n'),
('Витольд', 'Шилов', 'm', '86ao8', 'xdrozdov@yandex.ru', 92, 1997, 'n'),
('Анна', 'Кулаков', 'f', 'ixds8', 'xkrasilnikov@melnikov.ru', 140, 1999, 'y'),
('Антонин', 'Пахомов', 'm', '5h7ip', 'xpetukov@bk.ru', 204, 1994, 'y'),
('Гавриил', 'Агафонов', 'm', '7hyn9', 'xsidorov@solovev.org', 247, 1991, 'y'),
('Лаврентий', 'Орехов', 'm', '16610', 'yliy.fokin@abramov.ru', 112, 1991, 'y'),
('Искра', 'Рябов', 'f', 'ou5sv', 'zkalinin@smirnov.ru', 204, 1990, 'y'),
('Марк', 'Молчанов', 'm', 'hrvah', 'zmikailov@inbox.ru', 157, 1998, 'n'),
('adadad', 'ddddadad', 'm', 'фффф', 'фвфцвфц@wad.ru', 300, 1995, 'y');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
