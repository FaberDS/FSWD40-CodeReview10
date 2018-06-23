-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 23. Jun 2018 um 16:06
-- Server-Version: 5.6.38
-- PHP-Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Datenbank: `cr10_name_surname_biglibrary`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `authors`
--

CREATE TABLE `authors` (
  `author_id` int(11) NOT NULL,
  `author_firstname` varchar(30) DEFAULT NULL,
  `author_lastname` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `authors`
--

INSERT INTO `authors` (`author_id`, `author_firstname`, `author_lastname`) VALUES
(1, 'Christian', 'Bau'),
(2, 'Esben Holmboe', 'Bang'),
(3, 'Peter', 'Gilmore'),
(4, 'Daniel', 'Humm'),
(5, 'Bernd', 'Siefert'),
(6, 'Andree', 'Koethe'),
(7, 'Jordi', 'Roca'),
(8, 'Pierre', 'Herme');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `media_items`
--

CREATE TABLE `media_items` (
  `media_id` int(11) NOT NULL,
  `fk_media_publisher` int(11) DEFAULT NULL,
  `fk_media_type` int(11) DEFAULT NULL,
  `fk_rent_id` int(11) DEFAULT NULL,
  `fk_author_id` int(11) DEFAULT NULL,
  `media_title` varchar(50) DEFAULT NULL,
  `media_descri` text,
  `media_pub_date` date DEFAULT NULL,
  `available` enum('true','false') NOT NULL,
  `media_items_img` text,
  `lang` varchar(30) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `fk_regisseur_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `media_items`
--

INSERT INTO `media_items` (`media_id`, `fk_media_publisher`, `fk_media_type`, `fk_rent_id`, `fk_author_id`, `media_title`, `media_descri`, `media_pub_date`, `available`, `media_items_img`, `lang`, `rating`, `fk_regisseur_id`) VALUES
(2, 8, 1, NULL, 1, 'Bau.steine', 'Christian Bau, 3-Sterne-Koch und Patron von Victor’s Fine Dining by Christian Bau auf Schloss Berg in 	Perl/Nennig zeigt in seinem vierten Kochbuch eine Kochkunst, die ihresgleichen sucht. Kein Wunder, ist Bau doch einer der absolut besten Köche Deutschlands! Gleichzeitig feiert er 2018 ein Jubiläum: 20 Jahre Victor’s Fine Dining by Christian Bau. Daher ist dieses Prachtbuch mehr als gerechtfertigt.', '2018-01-01', 'true', 'https://media.buch.de/img-adb/112386036-00-00.jpg', 'German', 5, NULL),
(3, 8, 1, NULL, 2, 'Maemo', 'Maaemo“, zu Deutsch „Mutter Erde“, ist der Name des Restaurants von Esben Holmboe Bang in Oslo. Hier zeigt der junge kreative 3-Sterne-Koch, was aus erstklassigen Spitzenprodukten geschaffen werden kann. Dabei sind es die puren Aromen, der intensive Geschmack und die harmonischen Kompositionen, die seine Küche zur Kunst machen.', '2018-01-01', 'true', 'https://media.buch.de/img-adb/88533096-00-08.jpg', 'German', 4, NULL),
(4, 8, 1, NULL, 3, 'Quay', 'In seinem Restaurant \"Quay\" in Sydney hat Peter Gilmore, auf der San-Pellegrino-Liste unter den besten 30 Köchen der Welt, zurück zu den Ursprüngen gefunden. Der Schwerpunkt seiner Kreationen liegt auf der Verarbeitung von Früchten und Gemüse, immer im Einklang mit dem natürlichen Lebenszyklus des jeweiligen Produktes.Inspiriert von den Werten der asiatischen Küche, der tiefen Verbundenheit mit der Natur, dem Respekt gegenüber den Jahreszeiten und Traditionen und nicht zuletzt dem Streben nach Perfektion, geht Peter Gilmore seinen Weg.Er beherrscht es perfekt – das sensible Spiel mit Textur, Mundgefühl, Harmonie der Geschmacksrichtungenund der über allem stehenden Eleganz der Präsentation des Gerichtes. In seinem Buch ist es ihm gelungen, die Philosophie seiner Arbeit auf Papier zu bannen. Mit einer absolut einmaligen Ausstattung, der Haptik verschiedener Papierarten, der gestalterischen Umsetzung und den sinnlichen Fotografien der Kreationen, wird aus dem Buch ein absolutes Kunstwerk, das auf dem aktuellen Kochbuchmarkt seinesgleichen sucht.', '2017-01-01', 'true', 'https://media.buch.de/img-adb/30607955-00-00.jpg', 'German', 4, NULL),
(5, 8, 1, NULL, 4, 'Eleven Madison Park', 'Eleven Madison Park is one of New York Citys most popular fine-dining establishments, and one of only a handful to receive four stars from the New York Times. Under the leadership of Executive Chef Daniel Humm and General Manager Will Guidara since 2006, the restaurant has soared to new heights and has become one of the premier dining destinations in the world.', '2015-01-01', 'true', 'https://media.buch.de/img-adb/31779091-00-00.jpg', 'German', 5, NULL),
(6, 8, 1, NULL, 5, 'Vegan und süß', 'Bernd Siefert, Weltmeister der Konditoren zeigt, dass man weder Butter noch Eier braucht, um leckere Kuchen, Torten, Cookies oder Desserts zu zaubern. Mehr als 60 einfache bis anspruchsvolle Rezepte für vegane Köstlichkeiten werden vom Profikonditor anschaulich erläutert. Darüber hinaus enthält dieses Buch zahlreiche Tipps mit welchen Produkten sich tierische Zutaten ersetzen lassen. Vom Apfelstrudel über Creme Brûlée und Kokos-Cakepops bis hin zur Zitronentarte mit Blaubeeren – Sie müssen auf nichts verzichten.', '2015-01-01', 'true', 'https://media.buch.de/img-adb/40762653-00-00.jpg', 'German', 4, NULL),
(7, 9, 1, NULL, 6, 'Gemüse2', 'Im zweiten Buch der Tre Torri Sternereihe kochen die beiden gastronomischen Überflieger Andree Köthe und Yves Ollech wieder über 50 kreative Gerichte rund um Gemüse & Co. Jedes Gemüse wird detailliert beschrieben und in einem Rezept präsentiert. Auch Kräuter und Sprossen kommen dabei nicht zu kurz. Auch diesmal lautet ihr Motto: Nur was in der Region wächst, kann in optimaler Qualität in den Kochtopf wandern. So werden frische, saisonale und regionale Lebensmittel kombiniert, die sowohl geist- als auch genussreiche Eindrücke hinterlassen. Ein Standardwerk der kreativen Küche. Mit spektakulären Bildern und informativen Texten zu Salatgurke, Zuckerrübe, Löwenzahn und Co. ', '2015-01-01', 'true', 'https://media.buch.de/img-adb/40507892-00-00.jpg', 'German', 5, NULL),
(8, 8, 1, NULL, 7, 'Anarkia', 'Anarkia – die Welt der Desserts des El Celler de Can Roca, dem 3-Sterne Restaurant der Roca-Brüder in Girona. Jordi, der Patissier, wurde 2014 vom „Restaurant magazin“ als „World’s Best Pastry Chef“ gekürt. In Anarkia zeigt er in 115 Kreationen, 478 Rezepten und über 2000 Fotos seine ganze Meisterschaft. Es ist wie ein Kompendium der extravagantesten und kreativsten Desserts, die es zur Zeit gibt. Durch einen sehr guten Technikteil und viele Schritt-für-Schritt-Aufnahmen sind die Kunstwerke von Jordi Roca für Profis und sehr ambitionierte Hobbypatissiers verständlich und auch machbar. Ein Buch, das so aussergewöhnlich, kreativ, umfassend und exzellent ist, dass es ein must have in jeder gut sortierten kulinarischen Bibliothek ist.', '2018-01-01', 'true', 'https://media.buch.de/img-adb/88533098-00-00.jpg', 'German', 3, NULL),
(9, 8, 1, NULL, 8, 'ph10', 'PH10, das Buch von Pierre Hermé, zeigt seine Kunst in einer Vollständigkeit, die es bisher nicht gab: Torten, Kuchen, Gebäck, Desserts, Eis, Macarons, Fruchtgelees… So sind seine legendären Kreationen wie Ispahan, Millefeuille Vanille, Opéra oder Mahogany selbstverständlich genauso enthalten wie die grosse Bandbreite seiner weniger bekannten Kreationen – kein Wunder, sind doch mehrere Hundert Rezepte in diesem Buch vereint. Pierre Hermé liebt es, zu überraschen, Konsistenzen und Aromen zu kombinieren, die als unvereinbar galten, Heisses mit Kaltem zu servieren und selbst „müde“ Geschmacksnerven damit aufzuwecken. Die Ästhetik seiner Kreationen ist durch Klarheit und Schlichtheit gekennzeichnet. So ist es einfach undenkbar, seine Opéra als runde Torte anzubieten, denn sie war immer schon rechteckig. Pierre Hermés Kunst ist weltbekannt. Wenn er als „Picasso der Patisserie“ oder als „Dior der süssen Kunst“ bezeichnet wurde, so zeigt das, welch überragende Stellung er in der Branche einnimmt und wie sehr er die Konditorei/Patisserie geprägt hat. Ein Buch, das jedem Konditor, Patissier und Hobbybäcker zur Bibel gereichen und dem Nachwuchs den Blick für die Möglichkeiten dieses schönen Berufs erläutern kann.', '2012-01-01', 'true', 'https://media.buch.de/img-adb/31779050-00-00.jpg', 'German', 5, NULL),
(10, 7, 3, NULL, NULL, 'Coffee Tunes', 'Eine Kaffeebar in Mailand oder Paris. Das Kommen und Gehen der Menschen. Der Duft von Espresso und ein leises Lachen im Hintergrund. Ein Augenblick Zeit, der nur Ihnen gehört. So klingt Coffee Tunes - mit 15 starken Songs.', '2012-01-01', 'true', 'https://www.butlers.com/dw/image/v2/AAGD_PRD/on/demandware.static/-/Sites-BUTL_CATALOG-MASTER/default/dw65cd40d2/highres/10170366.jpg?sw=560&sh=560&sm=fit', 'English', 3, NULL),
(11, 7, 3, NULL, NULL, 'Lounge Tunes', 'Sie legen die Lounge Tunes-CD auf und schalten um auf Easy Living. 15 entspannende bis inspirierende Songs lassen Sie die Leichtigkeit des Lebens spüren und das Lachen mit Freunden genießen.', '2015-01-01', 'true', 'https://images-na.ssl-images-amazon.com/images/I/71IKBb11aqL._SX679_.jpg', 'English', 5, NULL),
(12, 7, 3, NULL, NULL, 'Cooking Tunes', 'CD mit 16 Weihnachtsliedern aus der Swing-Aera. Mit Künstlern wie Frank Sinatra, Perry Como, Dean Martin, Marlene Dietrich, Bing Crosby.', '2011-01-01', 'true', 'https://images-na.ssl-images-amazon.com/images/I/81QvxoSbGzL._SX522_.jpg', 'English', 2, NULL),
(13, 7, 3, NULL, NULL, 'Garden Party', 'Sie feiern die Feste, wie sie fallen, und laden die nettesten Leute in Ihren Garten ein. Dazu legen Sie ein paar Würsten auf den Grill und die Garden Party-CD in den Player. Mit 15 beschwingten Songs und gut 70 Minuten Spielzeit.', '2015-01-01', 'true', 'https://images-na.ssl-images-amazon.com/images/I/71olPHj61jL._SX679_.jpg', 'English', 5, NULL),
(14, 5, 2, NULL, NULL, 'No Reservation', 'Julia Child and Julie Powell - both of whom wrote memoirs - find their lives intertwined. Though separated by time and space, both women are at loose ends... until they discover that with the right combination of passion, fearlessness and butter, anything is possible.', '2011-01-01', 'true', 'https://ia.media-imdb.com/images/M/MV5BMTI1NzQ5MzU1OV5BMl5BanBnXkFtZTcwNzExODU0MQ@@._V1_UY209_CR0,0,140,209_AL_.jpg', 'English', 4, 2),
(15, 3, 2, NULL, NULL, 'Burnt', 'Chef Adam Jones (Bradley Cooper) had it all - and lost it. A two-star Michelin rockstar with the bad habits to match, the former enfant terrible of the Paris restaurant scene did everything different every time out, and only ever cared about the thrill of creating explosions of taste. To land his own kitchen and that third elusive Michelin star though, hell need the best of the best on his side, including the beautiful Helene (Sienna Miller).', '2015-01-01', 'false', 'https://ia.media-imdb.com/images/M/MV5BNjEzNTk2OTEwNF5BMl5BanBnXkFtZTgwNzExMTg0NjE@._V1_UX182_CR0,0,182,268_AL_.jpg', 'German', 5, 2),
(16, 2, 2, NULL, NULL, 'Madame Mallory', 'The family of talented cook, Hassan Kadam, has a life filled with both culinary delights and profound loss. Drifting through Europe after fleeing political violence in India that killed the family restaurant business and their mother, the Kadams arrive in France. Once there, a chance auto accident and the kindness of a young woman, Marguerite, in the village of Saint-Antonin-Noble-Val inspires Papa Kadam to set up a Indian restaurant there. Unfortunately, this puts the Kadams in direct competition with the snobbish Madame Mallorys acclaimed haute cuisine establishment across the street where Marguerite also works as a sous-chef. The resulting rivalry eventually escalates in personal intensity until it goes too far. In response, there is a bridging of sides initiated by Hassan, Marguerite and Madame Mallory herself, both professional and personal, that encourages an understanding that will change both sides forever.', '2009-01-01', 'false', 'https://ia.media-imdb.com/images/M/MV5BMTQ3Mjg2MTE4M15BMl5BanBnXkFtZTgwMzcyNDMwMjE@._V1_UY268_CR1,0,182,268_AL_.jpg', 'English', 5, 5),
(17, 1, 2, NULL, NULL, 'Der Koch', 'Maravan, ein charmanter junger Einwanderer aus Sri Lanka, arbeitet seit dem Tod seiner Eltern im srilankischen Bürgerkrieg in Zürich als Küchenhilfe in einem Sternelokal, träumt aber von einem eigenen Restaurant. Er möchte traditionelle indische Küche, wie sie ihn seine Großtante lehrte, mit avantgardistischer Molekularküche verbinden. Sein Wahlspruch lautet \"Kochen ist Verwandeln\": Kaltes in Warmes, Hartes in Weiches, Saures in Süßes. Es stellt sich heraus, dass seine Kreationen eine stark aphrodisierende Wirkung haben: Als er beiläufig seine Kollegin Andrea zum Essen einlädt, verführt diese ihn nach dem Essen, obwohl sie eine Lesbe ist und obwohl er sehr konservativ ist und arrangierte Ehen für richtig hält. Die beiden ziehen den gemeinsamen Catering-Service Love Food auf, mit dem sie in das Liebesleben sexual-therapeutisch behandelter Ehepaare neues Leben bringen.', '2016-01-01', 'false', 'https://ia.media-imdb.com/images/M/MV5BMjIwOTg1MTYwNV5BMl5BanBnXkFtZTgwODI4MjA5NTE@._V1_UY268_CR9,0,182,268_AL_.jpg', 'German', 5, 6);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `media_types`
--

CREATE TABLE `media_types` (
  `media_type_id` int(11) NOT NULL,
  `media_type_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `media_types`
--

INSERT INTO `media_types` (`media_type_id`, `media_type_name`) VALUES
(1, 'Book'),
(2, 'DVD'),
(3, 'CD'),
(4, 'Magazine');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `publishers`
--

CREATE TABLE `publishers` (
  `publisher_id` int(11) NOT NULL,
  `publisher_name` varchar(30) DEFAULT NULL,
  `publisher_size` enum('Tiny','Small','Medium','Large','Huge') DEFAULT NULL,
  `operating_area` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `publishers`
--

INSERT INTO `publishers` (`publisher_id`, `publisher_name`, `publisher_size`, `operating_area`) VALUES
(1, 'Ralf Hüttner', 'Tiny', NULL),
(2, 'Lasse Hallström', 'Tiny', NULL),
(3, 'John Wells', 'Tiny', NULL),
(4, 'Nora Ephron', 'Small', NULL),
(5, 'Brad Bird', 'Small', NULL),
(6, 'Scott Hicks', 'Tiny', NULL),
(7, 'Butlers', 'Huge', NULL),
(8, 'Matthaes', 'Large', NULL),
(9, 'Tre Torri', 'Medium', NULL),
(10, 'TEST', 'Tiny', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `regisseurs`
--

CREATE TABLE `regisseurs` (
  `regisseur_id` int(11) NOT NULL,
  `regisseur_firstname` varchar(30) DEFAULT NULL,
  `regisseur_lastname` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `regisseurs`
--

INSERT INTO `regisseurs` (`regisseur_id`, `regisseur_firstname`, `regisseur_lastname`) VALUES
(1, 'Scott', 'Hicks'),
(2, 'Brad', 'Bird'),
(3, 'Nora', 'Ephron'),
(4, 'John', 'Wells'),
(5, 'Lasse', 'Hallström'),
(6, 'Ralf', 'Hüttner');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `rents`
--

CREATE TABLE `rents` (
  `rent_id` int(11) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `fk_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userFirstName` varchar(30) NOT NULL,
  `userSurName` varchar(30) DEFAULT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`userId`, `userFirstName`, `userSurName`, `userEmail`, `userPass`) VALUES
(1, 'melanie', NULL, 'melanie@gmx.at', 'bcb15f821479b4d5772bd0ca866c00ad5f926e3580720659cc80d39c9d09802a'),
(2, 'denis', NULL, 'denis@gmx.at', 'bcb15f821479b4d5772bd0ca866c00ad5f926e3580720659cc80d39c9d09802a'),
(3, 'renate', NULL, 'renate@gmx.at', 'bcb15f821479b4d5772bd0ca866c00ad5f926e3580720659cc80d39c9d09802a'),
(4, 'hallo', NULL, 'hallo@gmx.at', 'bcb15f821479b4d5772bd0ca866c00ad5f926e3580720659cc80d39c9d09802a'),
(5, 'age', NULL, 'age@gmx.at', 'bcb15f821479b4d5772bd0ca866c00ad5f926e3580720659cc80d39c9d09802a'),
(6, 'Helga', 'Wrobel', 'helga@gmx.at', 'bcb15f821479b4d5772bd0ca866c00ad5f926e3580720659cc80d39c9d09802a'),
(7, 'Sigi', 'Wrobel', 'sigi@gmx.at', 'bcb15f821479b4d5772bd0ca866c00ad5f926e3580720659cc80d39c9d09802a'),
(8, 'Lena', 'Hoefler', 'lena@1.at', 'bcb15f821479b4d5772bd0ca866c00ad5f926e3580720659cc80d39c9d09802a'),
(9, 'aaa', 'aaa', 'a@a.a', '2558a34d4d20964ca1d272ab26ccce9511d880579593cd4c9e01ab91ed00f325');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`author_id`);

--
-- Indizes für die Tabelle `media_items`
--
ALTER TABLE `media_items`
  ADD PRIMARY KEY (`media_id`),
  ADD KEY `fk_media_type` (`fk_media_type`),
  ADD KEY `fk_rent_id` (`fk_rent_id`),
  ADD KEY `fk_media_publisher` (`fk_media_publisher`),
  ADD KEY `fk_author_id` (`fk_author_id`),
  ADD KEY `fk_regiseur_id` (`fk_regisseur_id`);

--
-- Indizes für die Tabelle `media_types`
--
ALTER TABLE `media_types`
  ADD PRIMARY KEY (`media_type_id`);

--
-- Indizes für die Tabelle `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`publisher_id`);

--
-- Indizes für die Tabelle `regisseurs`
--
ALTER TABLE `regisseurs`
  ADD PRIMARY KEY (`regisseur_id`);

--
-- Indizes für die Tabelle `rents`
--
ALTER TABLE `rents`
  ADD PRIMARY KEY (`rent_id`),
  ADD KEY `fk_user` (`fk_user`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `authors`
--
ALTER TABLE `authors`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT für Tabelle `media_items`
--
ALTER TABLE `media_items`
  MODIFY `media_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT für Tabelle `media_types`
--
ALTER TABLE `media_types`
  MODIFY `media_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `publishers`
--
ALTER TABLE `publishers`
  MODIFY `publisher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT für Tabelle `regisseurs`
--
ALTER TABLE `regisseurs`
  MODIFY `regisseur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `rents`
--
ALTER TABLE `rents`
  MODIFY `rent_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `media_items`
--
ALTER TABLE `media_items`
  ADD CONSTRAINT `media_items_ibfk_1` FOREIGN KEY (`fk_media_type`) REFERENCES `media_types` (`media_type_id`),
  ADD CONSTRAINT `media_items_ibfk_2` FOREIGN KEY (`fk_rent_id`) REFERENCES `rents` (`rent_id`),
  ADD CONSTRAINT `media_items_ibfk_3` FOREIGN KEY (`fk_media_publisher`) REFERENCES `publishers` (`publisher_id`),
  ADD CONSTRAINT `media_items_ibfk_4` FOREIGN KEY (`fk_author_id`) REFERENCES `authors` (`author_id`),
  ADD CONSTRAINT `media_items_ibfk_5` FOREIGN KEY (`fk_regisseur_id`) REFERENCES `regisseurs` (`regisseur_id`);

--
-- Constraints der Tabelle `rents`
--
ALTER TABLE `rents`
  ADD CONSTRAINT `rents_ibfk_1` FOREIGN KEY (`fk_user`) REFERENCES `users` (`userId`);
