-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 04, 2024 at 06:10 PM
-- Server version: 10.5.23-MariaDB-0+deb11u1
-- PHP Version: 8.2.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travelblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `Articles`
--

CREATE TABLE `Articles` (
  `idArticles` int(11) NOT NULL,
  `title` varchar(120) NOT NULL,
  `content` longtext NOT NULL,
  `profileImg` varchar(45) DEFAULT NULL,
  `author` int(11) NOT NULL,
  `destination` int(11) NOT NULL,
  `datePublic` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Dumping data for table `Articles`
--

INSERT INTO `Articles` (`idArticles`, `title`, `content`, `profileImg`, `author`, `destination`, `datePublic`) VALUES
(1, 'Šumavské slatě', 'Šumavské slatě, známé svou jedinečnou biodiverzitou a křehkým ekosystémem, představují skvost středoevropské přírody. Tyto rašelinné oblasti, nacházející se na rozhraní České republiky a Bavorska, poskytují domov pro vzácné druhy rostlin a živočichů, a zároveň slouží jako důležité zdroje vody a přirozená regulace povodní.\n\nCharakteristické pro Šumavské slatě je jejich složitá geologie a klima, které vytvářejí ideální podmínky pro vznik rašelinišť a mokřadů. Tyto oblasti jsou domovem pro mnoho ohrožených druhů, jako jsou vzácné orchideje, chráněné ptáky jako je tetřívek obecný a vzácný motýl modrásek bahenní.\n\nEkologická rovnováha Šumavských slatí je však ohrožena různými faktory, včetně lidské činnosti, změn klimatu a znečištění. Nesprávné hospodaření, těžba rašeliny a přeměna přírodních oblastí na zemědělskou půdu mají potenciál narušit citlivé ekosystémy těchto míst.\n\nProto je ochrana Šumavských slatí klíčovou prioritou pro ochranu přírody v této oblasti. Zahrnuje to nejen zřizování chráněných území, ale také udržitelné zemědělské a lesnické praktiky, které minimalizují negativní dopady na životní prostředí. Edukace veřejnosti o významu těchto unikátních ekosystémů je také důležitým krokem k zachování této přírodní poklady pro budoucí generace.\n\nŠumavské slatě představují jedinečný kousek přírody, který nás učí hodnotě biodiverzity a křehkosti ekosystémů. Je naší odpovědností chránit a zachovávat tyto vzácné a krásné oblasti pro budoucí generace, abychom si mohli i nadále užívat jejich nesmírné bohatství a krásu.', 'slateSumava.jpg', 2, 2, '2017-06-15'),
(2, 'Materhorn v noci', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Pellentesque pretium lectus id turpis. Nullam lectus justo, vulputate eget mollis sed, tempor sed magna. Nulla quis diam. In enim a arcu imperdiet malesuada. Nulla pulvinar eleifend sem. Aenean placerat. Aliquam erat volutpat. In convallis. Phasellus faucibus molestie nisl. Suspendisse nisl. Nulla non lectus sed nisl molestie malesuada. Maecenas lorem. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Proin mattis lacinia justo.', 'Matterhorn.jpg', 3, 4, '2017-07-15'),
(3, 'Šumava slatě II', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Pellentesque pretium lectus id turpis. Nullam lectus justo, vulputate eget mollis sed, tempor sed magna. Nulla quis diam. In enim a arcu imperdiet malesuada. Nulla pulvinar eleifend sem. Aenean placerat. Aliquam erat volutpat. In convallis. Phasellus faucibus molestie nisl. Suspendisse nisl. Nulla non lectus sed nisl molestie malesuada. Maecenas lorem. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Proin mattis lacinia justo.', 'slateSumava.jpg', 2, 2, '2017-07-15'),
(5, 'Krása přírody', 'Příroda je úžasná věc, plná krásy a úžasu. Od vysokých hor po rozlehlé oceány je toho tolik k objevování a poznávání. Udělejte si chvíli času, abyste ocenili svět kolem sebe a obdivovali jeho nádheru.', 'nature.jpg', 1, 1, '2024-04-12'),
(6, 'Objevování starověkých ruin', 'Vraťte se v čase a prozkoumejte starověké ruiny kdysi slavných civilizací. Od majestátních pyramid v Egyptě po tajemné chrámy Angkor Wat je toho tolik historie čekající na objevení. Připojte se k nám na cestě časem a objevte divy starověkého světa.', 'ruins.jpg', 2, 2, '2024-04-13'),
(7, 'Umění vaření', 'Vaření je více než jen nutnost - je to umělecká forma. Od jemných chutí francouzské kuchyně po odvážné koření indického vaření je v kuchyni tolik k objevování a experimentování. Připojte se k nám, když se ponoříme do světa kulinářských lahůdek a objevíme radost z vaření.', 'cooking.jpg', 1, 3, '2024-04-14'),
(8, 'Síla hudby', 'Hudba má moc pohnout námi, inspirovat nás a sjednotit nás. Od duševních melodií jazzu po energické rytmické rocku a popu je žánr hudby pro každou náladu a příležitost. Připojte se k nám, když prozkoumáme svět hudby a objevíme její neuvěřitelnou sílu, aby nás povzbudila a sjednotila.', 'music.jpg', 2, 4, '2024-04-15'),
(9, 'Kouzlo vyprávění příběhů', 'Vyprávění příběhů je nadčasová umělecká forma, která má moc přenést nás do vzdálených zemí a rozdmýchat naše představivosti. Od epických příběhů dobrodružství po upřímné příběhy lásky a ztráty je zde příběh pro každou duši. Připojte se k nám, když vstoupíme do říše vyprávění příběhů a objevíme kouzlo, které v ní spočívá.', 'storytelling.jpg', 1, 5, '2024-04-16'),
(10, 'Cestování po historických památkách', 'Procestujte historické památky po celém světě a objevte bohatou historii lidského pokroku. Od starověkých egyptských pyramid po středověké hrady Evropy, každá památka vypráví svůj jedinečný příběh a nabízí pohled do minulosti.', 'historie.jpg', 1, 2, '2024-04-26'),
(11, 'Kulinářská dobrodružství kolem světa', 'Prozkoumejte různé kuchyně světa a ochutnejte exotické chutě a vůně. Od uličních stánků v Asii po rodinné trattorie v Itálii, každá kulinářská zastávka je novou dobrodružstvím plným objevů.', 'food.jpg', 2, 3, '2024-04-27'),
(12, 'Uklidňující zážitky z přírody', 'Ponořte se do klidného a harmonického prostředí přírody a obnovte svou energii a klid mysli. Procházka lesními stezkami, relaxace u jezera nebo pozorování hvězd večer - příroda nabízí nekonečné způsoby, jak se spojit s přírodou a najít pokoj.', 'calm_nature.jpg', 1, 1, '2024-04-28'),
(13, 'Zážitková hudba na festivalu', 'Připojte se k hudebním nadšencům z celého světa na hudebních festivalech plných živých vystoupení a nezapomenutelných zážitků. Od rockových gigů po elektronické sety, festivaly hudby slibují nekonečnou zábavu a společný zážitek.', 'concert_music.jpg', 2, 4, '2024-04-29'),
(14, 'Rozvíjející se svět uměleckých děl', 'Prozkoumejte svět umění a objevte inovativní a inspirativní umělecká díla od umělců z celého světa. Od moderních galerií po venkovní instalace, umění přináší nové perspektivy a podněcuje kreativitu a porozumění.', 'art.jpg', 1, 5, '2024-04-30'),
(15, 'Fascinující svět vědeckých objevů', 'Podívejte se do světa vědy a objevte nejnovější objevy a technologické inovace, které formují naši budoucnost. Od vesmírných průzkumů po biologické výzkumy, věda odkrývá tajemství vesmíru a života.', 'science.jpg', 1, 2, '2024-05-01'),
(16, 'Zpřítomnění v meditaci a józe', 'Najděte svou rovnováhu a klid mysli prostřednictvím meditace a jógy a prožijte zvýšenou harmonii a pohodu. Pravidelná praxe meditace a jógy posiluje tělo i mysl a přináší vnitřní klid a vyváženost.', 'yoga.jpg', 2, 3, '2024-05-02'),
(17, 'Dobrodružství pod hladinou', 'Ponořte se do podmořského světa a objevte bohatství života ve vodách naší planety. Šnorchlování v korálových zátočinách, potápění se s žraloky nebo pozorování podmořských krás pod hladinou - moře skrývá nekonečná dobrodružství.', 'underwater.jpg', 1, 1, '2024-05-03'),
(18, 'Explorace divočiny a dobrodružství v přírodě', 'Vydejte se na dobrodružství do divočiny a objevte neporušenou krásu přírody. Turistika v horách, táboření pod hvězdami nebo pozorování divoké zvěře v národních parcích - divočina nabízí nekonečná dobrodružství a poznání.', 'wilderness.jpg', 2, 2, '2024-05-04'),
(19, 'Kulturní odhalení v historických městech', 'Procházejte se uličkami historických měst a objevte bohatou historii a kulturu minulých civilizací. Návštěva památek, ochutnávka místní kuchyně a setkání s místními obyvateli - historická města přinášejí vzrušující kulturní zážitky.', 'city.jpg', 1, 3, '2024-05-05'),
(20, 'Návrat k přírodě: farmářské dobrodružství', 'Připojte se k farmářům na jejich farmách a objevte zemědělský život a udržitelné zemědělské praktiky. Sázení plodin, péče o zvířata nebo sklizeň sezónního ovoce a zeleniny - farmářství nabízí pohled na tradiční zemědělský způsob života.', 'farm.jpg', 2, 4, '2024-05-06'),
(21, 'Cestování na východ', 'Prozkoumejte tajemství východních kultur a objevte bohatou historii a tradice Asie a Blízkého východu. Návštěva starověkých chrámů, ochutnávka tradičních pokrmů a setkání s místními obyvateli - cestování na východ přináší nové perspektivy a poznání.', 'east.jpg', 1, 5, '2024-05-07'),
(22, 'Expedice do divočiny Amazonie', 'Ponořte se do nekonečného pralesa Amazonie a objevte úžasnou biodiverzitu a exotickou faunu a flóru. Průzkum tropických deštných lesů, pozorování vzácných druhů zvířat a setkání s původními kmeny - Amazonie nabízí dobrodružství plné objevů.', 'amazon.jpg', 2, 1, '2024-05-08'),
(23, 'Cestování po zlatých plážích Karibiku', 'Užijte si luxusní odpočinek a relaxaci na slunných plážích Karibiku a objevte nádherné tropické ostrovy a azurové vody. Lenošení na bílých písčitých plážích, potápění se v korálových zátočinách nebo procházky po malebných přímořských městech - Karibik nabízí nezapomenutelné dovolené plné exotiky.', 'caribbean.jpg', 1, 2, '2024-05-09'),
(24, 'Architektonická výprava po moderních metropolích', 'Procestujte svět moderní architektury a objevte inovativní a futuristické stavby ve velkých městech. Prohlídka mrakodrapů, návštěva designových muzeí a pozorování moderního urbanismu - architektura moderních metropolí nabízí pohled do budoucnosti.', 'architecture.jpg', 2, 3, '2024-05-10'),
(25, 'Duchovní cesta do starobylých chrámů', 'Podívejte se do světa spirituality a objevte klid a harmonii ve starobylých chrámech a svatých místech. Meditace v tichu buddhistických klášterů, modlitby ve svatých hinduistických chrámech a hluboké zamyšlení ve středověkých katedrálách - duchovní cesta nabízí osvícení a porozumění.', 'spirituality.jpg', 1, 4, '2024-05-11'),
(26, 'Rozpouštějící se ledovce: Ekologická výzva', 'Procestujte polární oblasti a sledujte důsledky klimatických změn na ledovcové krajině. Pozorování ledovců tajících do oceánů, setkání s místními komunitami a diskuse o ochraně životního prostředí - ochrana polárních oblastí představuje ekologickou výzvu pro budoucnost.', 'glacier.jpg', 2, 5, '2024-05-12'),
(27, 'Rozkvétající květinové zahrady', 'Procházka rozkvetlými květinovými zahradami a objevte rozmanitost barev a vůní květů z celého světa. Návštěva botanických zahrad, ochutnávka tradičního čaje a relaxace ve stínu stromů - květinové zahrady přinášejí okamžiky klidu a krásy.', 'flowers.jpg', 1, 1, '2024-05-13'),
(28, 'Zážitková expedice na safari v Africe', 'Vydejte se na safari do srdce divoké Afriky a objevte bohatství africké fauny a flóry. Pozorování velkých pěvců na savanách, setkání s kočovnými kmeny a noc v luxusních safari lodgích - safari nabízí nezapomenutelné zážitky v přírodě.', 'safari.jpg', 2, 2, '2024-05-14'),
(29, 'Kulinářská dobrodružství na trzích', 'Procházka trhy po celém světě a ochutnejte autentické místní lahůdky a speciality. Nakupování čerstvých potravin, ochutnávka tradičních pokrmů a setkání s místními obchodníky - trhy nabízejí jedinečné kulinářské zážitky.', 'market.jpg', 1, 3, '2024-05-15'),
(30, 'Zážitkové potápění v podmořských útesech', 'Ponořte se do fascinujícího světa podmořských útesů a objevte podvodní biodiverzitu a exotické mořské tvory. Potápění v korálových zátočinách, pozorování tropických ryb a setkání s mořskými želvami - podmořské potápění přináší dobrodružství plné krásy a divů.', 'diving.jpg', 2, 4, '2024-05-16'),
(31, 'Fotografické putování krajem', 'Vydejte se na fotografickou výpravu a zachyťte krásu světa skrze objektiv fotoaparátu. Fotografování malebných krajinek, portrétování místních obyvatel a experimentování s různými fotografickými technikami - fotografie nabízí možnost sdílet vaše zážitky a pohledy s ostatními.', 'photography.jpg', 1, 5, '2024-05-17'),
(32, 'Ekologická výzva: Ochrana ohrožených druhů', 'Zapojte se do ochrany ohrožených druhů a pomozte zachránit ohrožené živočišné druhy před vyhynutím. Práce na ochraně hnízdišť, sledování migračních cest a podpora ochranářských programů - ochrana ohrožených druhů představuje důležitou ekologickou výzvu.', 'endangeredspecies.jpg', 2, 1, '2024-05-18'),
(33, 'Kulturní cesta do historických paláců a zámků', 'Procházka historickými paláci a zámky a objevte bohatství kultury a umění minulých ér. Návštěva královských rezidencí, prohlídka uměleckých sbírek a pozorování architektonických detailů - kulturní cesta přináší pohled do slavné minulosti.', 'palace.jpg', 1, 2, '2024-05-19'),
(34, 'Spiritualita v přírodě: Meditace na horách', 'Vydejte se na horskou túru a prožijte meditaci a duchovní spojení s přírodou na vrcholcích hor. Meditace na horských špičkách, pozorování východu slunce a poslech ticha hor - horolezecká cesta přináší klid a harmonii v přírodě.', 'mountain.jpg', 2, 3, '2024-05-20');

-- --------------------------------------------------------

--
-- Table structure for table `Destinations`
--

CREATE TABLE `Destinations` (
  `idDestination` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Dumping data for table `Destinations`
--

INSERT INTO `Destinations` (`idDestination`, `name`) VALUES
(1, 'Vysoké Tatry'),
(2, 'Šumava'),
(3, 'Norsko'),
(4, 'Švýcarsko'),
(5, 'Itálie');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `idUsers` int(11) NOT NULL,
  `userName` varchar(45) NOT NULL,
  `user` varchar(45) NOT NULL,
  `userEmail` varchar(45) NOT NULL,
  `password` char(60) NOT NULL,
  `role` set('admin','delegate') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`idUsers`, `userName`, `user`, `userEmail`, `password`, `role`) VALUES
(1, 'Admin', 'Administrátor', 'admin@travelblog.cz', '$2y$10$vpKeKa.1C./F7ONdC.859O0jjaEzgowwarFWEAWm/mBkA3uv8OpBG', 'admin'),
(2, 'Delegat1', 'Karel Novák', 'novak@travelblog.cz', '$2y$10$ZU.J5AIAI39FzRkogPjfEuc4L7btBtXYI6J7N.vyt7ZC8ju.qTKGK', 'delegate'),
(3, 'Delegat2', 'Jana Malá', 'mala@travelblog.cz', '$2y$10$9eg0oIDPKHHNiir0rAqUBeSeioaLKLsz.zMyGZTyDqyiv1KXRTAza', 'delegate');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Articles`
--
ALTER TABLE `Articles`
  ADD PRIMARY KEY (`idArticles`),
  ADD KEY `Author_idx` (`author`),
  ADD KEY `Destination_idx` (`destination`);

--
-- Indexes for table `Destinations`
--
ALTER TABLE `Destinations`
  ADD PRIMARY KEY (`idDestination`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`idUsers`),
  ADD UNIQUE KEY `UserEmail_UNIQUE` (`userEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Articles`
--
ALTER TABLE `Articles`
  MODIFY `idArticles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `Destinations`
--
ALTER TABLE `Destinations`
  MODIFY `idDestination` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Articles`
--
ALTER TABLE `Articles`
  ADD CONSTRAINT `Author` FOREIGN KEY (`author`) REFERENCES `Users` (`idUsers`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Destination` FOREIGN KEY (`destination`) REFERENCES `Destinations` (`idDestination`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
