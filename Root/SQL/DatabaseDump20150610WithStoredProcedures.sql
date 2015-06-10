CREATE DATABASE  IF NOT EXISTS `InterviewDB` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `InterviewDB`;
-- MySQL dump 10.13  Distrib 5.6.23, for Win64 (x86_64)
--
-- Host: trouw.benoot-cupers.com    Database: InterviewDB
-- ------------------------------------------------------
-- Server version	5.5.41-cll-lve

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Competentie`
--

DROP TABLE IF EXISTS `Competentie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Competentie` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Naam` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Competentie`
--

LOCK TABLES `Competentie` WRITE;
/*!40000 ALTER TABLE `Competentie` DISABLE KEYS */;
INSERT INTO `Competentie` VALUES (1,'Teamwork'),(2,'Resultaatgerichtheid'),(3,'Leervaardigheid'),(4,'Luistervaardigheid'),(5,'Vertrouwen'),(6,'Initiatief'),(7,'Discretie'),(8,'Zelfstandigheid'),(9,'Verantwoordelijkheid'),(10,'Discipline'),(11,'Nauwkeurigheid'),(12,'Flexibiliteit'),(13,'Klantgerichtheid'),(14,'Schriftelijke Communicatie'),(15,'Mondelinge Communicatie'),(16,'Stressbestendigheid'),(17,'Probleemoplossend Vermogen'),(18,'Eigen werk organiseren'),(19,'Loyaliteit'),(20,'Contactvaardig'),(21,'Analyserend Vermogen'),(22,'Doorzettingsvermogen'),(23,'Teamleiderschap'),(24,'Aansturen van Medewerkers'),(25,'Assertief Optreden'),(26,'Project Leiden'),(27,'Informatieverwerking'),(28,'Snelheid'),(29,'Managen van Verandering'),(30,'Innovatie'),(31,'Adviseren'),(32,'Impact'),(33,'Draagvlak creeren'),(34,'Creativiteit'),(35,'Observeren'),(36,'Onderhandelen'),(37,'Besluitvaardigheid'),(38,'Presenteren'),(39,'Plannen'),(40,'Organiseren'),(41,'Delegeren');
/*!40000 ALTER TABLE `Competentie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Functie`
--

DROP TABLE IF EXISTS `Functie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Functie` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Naam` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Functie`
--

LOCK TABLES `Functie` WRITE;
/*!40000 ALTER TABLE `Functie` DISABLE KEYS */;
INSERT INTO `Functie` VALUES (1,'Business Performance Analyst'),(2,'Poetsmedewerker'),(3,'CS Representative'),(4,'CS Documentation Administrator'),(5,'CS Warehouse Administrator'),(6,'Accountant'),(7,'Accountant Financial Projects'),(8,'Billing Clerk'),(9,'Receptionist'),(10,'Safety Administrator'),(11,'HES Manager'),(12,'HR Officer'),(13,'Analyst Programmer'),(14,'Systems Engineer'),(15,'Helpdesk Engineer'),(16,'Security Engineer'),(17,'Legal Advisor'),(18,'Assistant Manager OPS'),(19,'OPS Administrator'),(20,'OPS Planner'),(21,'Warehouse assistant'),(22,'Warehouse supervisor'),(23,'Purchase Administrator'),(24,'Quality Administrator'),(25,'Account Manager'),(26,'Representative Inspection Team'),(27,'Security Administrator'),(28,'Transport Administrator'),(29,'Transport Planner'),(31,'TestFunctie');
/*!40000 ALTER TABLE `Functie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Gebruiker`
--

DROP TABLE IF EXISTS `Gebruiker`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Gebruiker` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Voornaam` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `Naam` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `Username` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `Paswoord` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Gebruiker`
--

LOCK TABLES `Gebruiker` WRITE;
/*!40000 ALTER TABLE `Gebruiker` DISABLE KEYS */;
/*!40000 ALTER TABLE `Gebruiker` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Vraag`
--

DROP TABLE IF EXISTS `Vraag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Vraag` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Vraag` text,
  `CompetentieId` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `CompetentieId` (`CompetentieId`)
) ENGINE=MyISAM AUTO_INCREMENT=208 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Vraag`
--

LOCK TABLES `Vraag` WRITE;
/*!40000 ALTER TABLE `Vraag` DISABLE KEYS */;
INSERT INTO `Vraag` VALUES (1,'Waarin ben je het best: teamwork of zelfstandig werken? Wat doe je het liefst? Waarom?',1),(2,'Wat versta jij onder teamwork?',1),(3,'Heb je in het verleden ooit als eens spanningen gekend in het team waar jij deel van uitmaakte? Schets de situatie.',1),(4,'Wat zou je ondernemen om het team waarin je terechtkomt succesvol te laten zijn?',1),(5,'Welke rol in een team past je het best?',1),(6,'Wat zou je willen realiseren in deze functie?',2),(7,'Hoe belangrijk vind je resultaat?',2),(8,'Heb je ooit het gewenste resultaat niet kunnen behalen? Hoe kwam dit? Wat heb je hieruit geleerd?',2),(9,'Wat heb je in het verleden gedaan in situaties waarin je in tijdsnood kwam?',2),(10,'Beschrijf een situatie waarin je met tegenslag te maken had. Hoe heb je ervoor gezorgd dat het doel toch werd bereikt?',2),(11,'Hoe lang heeft het geduurd vooraleer je je op je vorige werkplek ingewerkt voelde?',3),(12,'Vind je van jezelf dat je snel weg bent met nieuw aangereikte zaken?',3),(13,'Hoe zie jij jouw eigen leervaardigheid?',3),(14,'Van welke fouten tijdens de samenwerking met collega\'s heb je het meest geleerd?',3),(15,'Hebt u wel eens iets opgelost waarvoor u de vereiste kennis niet had? Hoe hebt u dit aangepakt?',3),(16,'Zie je jezelf als iemand die aandachtig kan luisteren? Wat doe je allemaal om dit te bewerkstelligen?',4),(17,'Welke technieken of ondersteuningen gebruik je om effectief en efficiënt te luisteren?',4),(18,'Maak je wel eens samenvattingen in een gesprek?',4),(19,'Kan je mij een voorbeeld geven van een situatie waarin het lastig was om de gezochte info te verkrijgen? Hoe verliep dit?',4),(20,'Wat hebben we de afgelopen 10 minuten besproken?',4),(21,'Zie je jezelf als een te vertrouwen iemand? Waaruit blijkt dit?',5),(22,'Hoe wek jij vertrouwen op?',5),(23,'Wat versta jij onder vertrouwen in een economische omgeving?',5),(24,'Ben je in het verleden ooit in aanraking gekomen met vertrouwelijke info? Hoe ben je hier mee omgegaan?',5),(25,'Vanaf welk moment durf je iemand te vertrouwen en op wat baseer je je hiervoor?',5),(26,'Ben je iemand die zijn mening durft uiten? Hoe pak je dit aan en kun je hiervan een voorbeeld geven?',6),(27,'Ben je initiatiefrijk? Geef een paar voorbeelden?',6),(28,'Wat heb je gedaan om in je baan promotie te verkrijgen?',6),(29,'Kun je een situatie beschrijven waarin je actie hebt ondernomen terwijl dat eigenlijk een taak was van iemand anders in de organisatie? Wat waren je redenen om dat te doen?',6),(30,'Wat stoort je in je huidige functie het meest? Wat heb je eraan gedaan om daar verandering in te brengen?',6),(31,'Heb je ooit een situatie meegemaakt waarin verwacht werd dat je discreet te werk moest gaan?',7),(32,'Hoe garandeer jij discretie in je manier van werken?',7),(33,'Wat versta jij onder discretie?',7),(34,'Zie je jezelf als een discreet werkend iemand? Waaruit blijkt dit?',7),(35,'Stel je leidinggevende ordert je om een opdracht zelfstandig en discreet uit te werken maar je ondervindt hierbij problemen, wat doe je?',7),(36,'Krijg je soms wel eens onduidelijk omschreven opdrachten?',8),(37,'Vanaf welk moment in een complexe opdracht zal je advies of hulp vragen?',8),(38,'Wat versta jij onder zelfstandigheid in een logistiek bedrijf?',8),(39,'Werk je aan je persoonlijke ontwikkeling?',8),(40,'Kun je me een situatie geven waarin je het voortouw hebt genomen zonder dat je daarvoor eerst goedkeuring gevraagd hebt?',8),(41,'Kun je mij een voorbeeld geven van een situatie waarin je de gang van zaken veranderd hebt? Waarom deed je dit en wat was het uiteindelijke resultaat?',9),(42,'Heb je in het verleden vaak de verantwoordelijkheid over complexe zaken op jou genomen?',9),(43,'Wat versta jij onder verantwoordelijkheid nemen?',9),(44,'Beschrijf een situatie waarin er plots veel werk binnenkwam, wat deed je?',9),(45,'Zie je jezelf als iemand die makkelijk de verantwoordelijkheid neemt? Waaruit blijkt dit?',9),(46,'Geef een voorbeeld van een situatie waarin je te maken kreeg met \"afspraak is afspraak\", ook al was die afspraak lastig na te komen. Hoe heb je gehandeld in dit geval?',10),(47,'Heb je wel eens een doel bereikt door een grote mate van discipline aan de dag te leggen? Wat voor doel was dit en wat heb je ondernomen om dit te bereiken?',10),(48,'Hoe zie jij discipline binnen  deze job?',10),(49,'Ben je gedisciplineerd? Waaruit blijkt dit?',10),(50,'Ben je wel eens geconfronteerd met opgelegde taken die je moest uitvoeren en die je eigen plannen in de war stuurden?',10),(51,'Wat is jouw verhouding kwaliteit/kwantiteit? Kwaliteit en afwerking of kwantiteit en snelheid?',11),(52,'Hoe garandeer jij precisie in je werk?',11),(53,'Heb je technieken om nauwkeurig te werk te kunnen gaan?',11),(54,'Wanneer heb je voor het laatste een fout gemaakt in je werk? Wat heb je daarna gedaan? Heb je actie ondernomen zodat het niet meer voorvalt?',11),(55,'Zie je jezelf als een nauwkeurig persoon? Kun je dit verduidelijkheden adhv een voorbeeld?',11),(56,'Hoe hebt u de eerste paar maanden bij u vorige werkgever(s) ervaren? Wat vond u minder prettig?',12),(57,'Wanneer ben je voor het laatst van een plan afgeweken? Wat was de reden?',12),(58,'Pas je je gemakkelijk aan aan veranderingen? Waaruit blijkt dit?',12),(59,'Zie je jezelf als een flexibel persoon? Waaruit blijkt dit?',12),(60,'Ben je bereid om afwijkende werktijden te volmaken?',12),(61,'Welke eigenschappen zijn voor jou van belang om goed met klanten te kunnen omgaan?',13),(62,'Heb je wel eens meegemaakt dat je een klant verloor terwijl je toch heel hard voor deze had gewerkt?',13),(63,'Heb je wel eens te maken met onredelijke eisen van een klant?',13),(64,'Wat versta jij onder een goede relatie met de klanten?',13),(65,'Heb je ooit al eens meer gedaan dan wat de klant initieel vroeg?',13),(66,'Welke ervaring heb je bij het opstellen van rapporten, brieven, verslagen, …?',14),(67,'Hoe pas je je schrijfstijl aan op het niveau van de ontvanger?',14),(68,'Hoe zie jij een algemene structuur van een brief?',14),(69,'Geef een voorbeeld van een situatie waarin je je taalgebruik hebt aangepast aan het niveau van de lezer?',14),(70,'Zie je jezelf als iemand met een vlotte schrijfstijl? Waaruit blijkt dit?',14),(71,'Kun je me een voorbeeld geven van een situatie waarin je je taalgebruik hebt aangepast aan je toehoorders?',15),(72,'Heb je ooit eens anderen tijdens een meeting overtuigd van je standpunt? Schets de situatie.',15),(73,'Heb je ooit je toon aangepast aan de gesprekspartner? Schet de situatie.',15),(74,'Heb je wel eens iets complex moeten uitleggen in een eenvoudige bewoording?',15),(75,'Wanneer heb je voor het laatst een presentatie gegeven? Vind je van jezelf dat je hier goed in bent? Waaruit blijkt dit?',15),(76,'Zie je jezelf als een stressbestendig iemand? Waaruit blijkt dit?',16),(77,'Heb je stress nodig om goed te kunnen functioneren?',16),(78,'Hoe bewaar je de kalmte tijdens een moeizaam proces?',16),(79,'Geef een voorbeeld van een situatie waarin je kalm bent gebleven ondanks de hectiek rondom je?',16),(80,'Tegen welke situaties in je werk zie je op? Hoe ga je hiermee om?',16),(81,'Beschrijf hoe je te werk bent gegaan bij de oplossing van een probleem dat je in je werk bent tegengekomen. Wat was het resultaat?',17),(82,'In het algemeen gesteld, je stuit op een probleem, hoe pak je dit aan?',17),(83,'Heb je ooit een verkeerde oplossing aangebracht voor een bepaald probleem?',17),(84,'Geef een voorbeeld waarin je achteraf gezien een probleem te grondig of juist niet grondig genoeg hebt aangepakt. Wat waren daarvoor de redenen?',17),(85,'Geef een voorbeeld van een situatie waarin je op een probleem bent gestoten en dat je dit dan hebt opgelost?',17),(86,'Wat doe je bewust om georganiseerd te werk te gaan?',18),(87,'Hoe bepaal je wat prioritair is ten opzichte van iets anders?',18),(88,'Hoe plan je je agenda in?',18),(89,'Zie je jezelf als een georganiseerd persoon? Waaruit blijkt dit?',18),(90,'Wat doe je als je iets vergeten bent?',18),(91,'Met welke gedragsregels bij je vorige werkgever was u het (totaal) niet eens?',19),(92,'Hoe stond je ten opzichte van je vorige leidinggevende?',19),(93,'Hoe zie jij loyaliteit binnen een havenbedrijf?',19),(94,'Heb je wel eens extra werk gedaan dat ten goede van het bedrijf kwam maar niet paste met je privéleven?',19),(95,'Ben je wel eens geconfronteerd geweest met een collega die klachten over de organisatie tegen een klant vertelde? Wat deed je dan?',19),(96,'Zie je zichzelf als iemand die makkelijk toegankelijk is? Komen collega\'s naar je toe als ze problemen hebben?',20),(97,'Hoe ga je om collega\'s die je qua persoonlijkheid niet liggen?',20),(98,'Hoe zie jij het contact tussen jou en je collega\'s en jou en je leidinggevende?',20),(99,'In welke mate vind je contact met collega\'s belangrijk tijdens het werk?',20),(100,'Zie je jezelf als een sociaalvaardig persoon? Waaruit blijkt dit?',20),(101,'Geef een voorbeeld van een situatie waarin een probleem meerdere oorzaken had. Hoe ben je daar achter gekomen? Verklaar u nader? Wat was het gevolg?',21),(102,'Geef een voorbeeld van een situatie waarin je te grondig te werk bent gegaan. Wat had dit tot gevolg?',21),(103,'Wanneer heb je voor het laatst een advies opgesteld? Hoe ben je te werk gegaan om het daadwerkelijke probleem te achterhalen?',21),(104,'Hoe pak je in het algemeen aan analyse van A tot Z aan?',21),(105,'Geef een voorbeeld van een situatie waarin je iets als te vanzelfsprekend hebt aangenomen. Hoe kwam dat? Wat heb je gedaan om dat in het vervolg te voorkomen?',21),(106,'Hoe ga je om met tegenkantingen of tegenstrubbelingen wanneer je een project of taak moet afwerken?',22),(107,'In welke situatie heeft het moeite gekost om door te zetten? Wat onthoud je hieruit?',22),(108,'Wat waren de redenen om uw opleiding niet af te maken?',22),(109,'Wat vond u de grootste hindernis die u heeft moeten nemen om te  bereiken waar u nu bent? Wat deed u toen? Wat heeft u daar over geleerd?',22),(110,'Wat is je grootste professionele tegenslag geweest? Wat heb je concreet daarna gedaan?',22),(111,'Hoe stuur jij je team aan? Maak je gebruik van bepaalde modellen of structuren?',23),(112,'Hoe zorg je ervoor dat alle neuzen in de zelfde richting wijzen?',23),(113,'Wat doe je om efficiëntie en effectiviteit in het team te garanderen?',23),(114,'Wat doe je om je mensen gemotiveerd te houden?',23),(115,'Hoe pak je een slechtnieuwsgesprek aan?',23),(116,'Hoe zou je een medewerker motiveren voor een bepaald project of opdracht?',24),(117,'Wat zou je ondernemen om een medewerker die niet in de juiste richting werkt toch op het rechte pad te brengen?',24),(118,'Hoe pak je een slechtnieuwsgesprek aan?',24),(119,'Geef een situatie waarbij een medewerker zichtbaar gedemotiveerd was / ondermaats presteerde? Welke acties heb je ondernomen? Wat was het resultaat? Wat heb je hieruit geleerd?',24),(120,'Hoe integreer je een nieuwe medewerker in de dynamiek van de afdeling?',24),(121,'Geef eens een voorbeeld van een situatie waarin je jouw standpunt moest verdedigen? Hoe verliep dit? Is het je gelukt of niet?',25),(122,'Heb je wel eens een opdracht uitgevoerd die je niet zag zitten? Wat heb je toen gedaan?',25),(123,'Wanneer heb je voor het laatste je standpunt moeten verdedigen? Schets de situatie.',25),(124,'Geef eens een voorbeeld van een situatie waarin u werd gekwetst, werd beschuldigd of neerbuigend werd behandeld? Hoe is uw reactie toen geweest?',25),(125,'Ben je in jouw eigen ogen wel eens te direct uit de hoek gekomen?',25),(126,'Heb je in het verleden ooit al eens een project van A tot Z begeleid?',26),(127,'Hoe verdeel jij het werk met je medewerkers en hoe bepaal je wie welke taken krijgt toegewezen?',26),(128,'Hoe garandeer jij effectiviteit en efficiëntie in het eindresultaat van het project?',26),(129,'Hoe begin jij persoonlijk aan een project? Wat organiseer je om je doelstellingen te behalen?',26),(130,'Wat is in jouw ogen het belangrijkste: je deadline halen (kwantiteit) of een goed resultaat afleveren (kwaliteit) ?',26),(131,'Ben je iemand die makkelijk de juiste informatie vindt? Welke kanalen gebruik je vooral?',27),(132,'Ben je ooit al eens in eens ituatie verzeild geraakt waarin je belangrijke info bent kwijtgeraakt? Hoe heb je dat aangepakt?',27),(133,'Welke tools gebruik je om info te verwerken?',27),(134,'Kan je hoofd- van bijzaken onderscheiden? Voorbeeld?',27),(135,'Hoe ziet voor jou de perfecte structuur van een rapport eruit?',27),(136,'Beschrijf een situatie waarin je alert hebt gehandeld?',28),(137,'Hoe zorg jij ervoor dat kwaliteit in je werk gepaard gaat met efficiëntie?',28),(138,'Hoe snel ben je in het verleden weg geweest met nieuwe zaken?',28),(139,'In welke activiteiten stel je prioriteiten? Hoe doe je dit?',28),(140,'Geef een voorbeeld waarin je je koers hebt gewijzigd op grond van nieuwe info? Hoe verliep dit?',28),(141,'Er moet iets nieuw geïmplementeerd worden op de werkvloer, hoe pak je dit aan?',29),(142,'Hoe verzeker je effectiviteit in een veranderingsproces?',29),(143,'Hoe verzeker je efficiëntie in een veranderingsproces?',29),(144,'Wat doe je als er iemand niet bereid is om mee te werken aan het veranderingsproces?',29),(145,'Hoe en met wie communiceer je wanneer je een verandering gaat implementeren?',29),(146,'Geeft u eens een voorbeeld van een innovatiedie het resultaat was van uw aanbrengen?',30),(147,'Heb je wel eens een creatieve oplossing bedacht in een moeilijke situatie? Hoe was de reactie?',30),(148,'Hoe breng je innovatie waar dit nogal moeilijk ligt?',30),(149,'Hoe blijf jij op de hoogte van verniewingen binnen het vakgebied?',30),(150,'Wat zie je voor onze organisatie voor mogelijkheden aan nieuwe producten of diensten?',30),(151,'Geef mij eens een voorbeeld of een situatie waar je iemand advies gegeven hebt? Wat was het resultaat daarvan?',31),(152,'Wat heb je in het verleden gedaan om ervoor te zorgen dat je advies daadwerkelijk werd uitgevoerd?',31),(153,'Wanneer heb je voor het laatsts een advies opgesteld? Hoe ben je te werk gegaan om tot het advies te komen? Wat heeft de opdrachtgever met je advies gedaan?',31),(154,'Is het wel eens voorgekomen dat een probleem een andere oorzaak had dan aanvankelijk dacht? Hoe ben je daar achter gekomen?',31),(155,'kan je goed luisteren? Waaruit blijkt dit?',31),(156,'Hoe bereidt u een gesprek voor waarin u een belangrijke invloed wilt uitoefenen op de uiteindelijke beslissing?',32),(157,'Welke impact zou jij graag binnen TBN uitoefenen?',32),(158,'Welke invloed denk je dat deze functie binnen TBN kan uistralen?',32),(159,'Wat heb je in een bepaalde situatie gedaan om een of meerdere leidinggevenden mee te krijgen voor een plan/project dat je had bedacht?',32),(160,'Wat onderneem je als iemand echt niet overtuigd raakt van jouw mening?',32),(161,'Stel je komt in een situatie waar de tegenpartij weigert om jouw advies te implementeren, wat doe je ?',33),(162,'Heb je wel eens te maken gehad met weerstand tegen een plan of besluit? Wat heb je gedaan om dit op te lossen?',33),(163,'Hoe zorg jij ervoor dat anderen overtuigd geraken van jouw voorstel?',33),(164,'Beschrijf wat je hebt moeten ondernemen om je plan daadwerkelijk te laten uitvoeren?',33),(165,'Welke partijen zou je betrekken wanneer je naar buiten komt met een nieuw idee of voorstel?',33),(166,'Wat is het laatste dat je werkgerelateerd hebt voorgesteld?',34),(167,'Kan je een voorbeeld geven van een situatie waarin u zaken creatief heeft aangepakt?',34),(168,'Wanneer heeft iemand je voor het laatst om advies gevraagd? Hoe heb je dit aangepakt?',34),(169,'Heb je ooit te maken gehad met een probleem waarvoor oude oplossingen niet meer werkten? Hoe heb je dit aangepakt?',34),(170,'Kan je mij een voorbeeld geven van een situatie waarin je iets helemaal anders naar voren hebt gebracht dan wat de anderen voorstelden? Wat is daar nog uit voortgekomen?',34),(171,'Geef een voorbeeld van een situatie waarin je te snel bent afgegaan op je eerste indruk? Hoe ga je dit naar de toekomst toe proberen vermijden?',35),(172,'Waarop let je vooral wanneer je je in een belangrijk gesprek bevindt en je wil je gesprekspartner overtuigen?',35),(173,'Waar let je vooral op wanneer je de gemoedstoestand van je gesprekspartner wil inschatten?',35),(174,'Zie je jezelf als een objectief persoon? Kun je dit verduidelijken adhv een voorbeeld?',35),(175,'Kun je goed observeren? Waaruit blijkt dit?',35),(176,'Zie je jezelf als iemand die goed kan onderhandelen? Waaruit blijkt dit? Welke argumenten gebruik je vaak?',36),(177,'Heb je laatst een situatie meegemaakt waarin onderhandelingen stroef verliepen?',36),(178,'Wat doe je wanneer het geschonken aanbod niet past bij wat jij als koper wil bereiken?',36),(179,'Beschrijf een onderhandelingssituatie waarin je tot een creatieve oplossing bent gekomen?',36),(180,'Kan je mij een concreet voorbeeld geven van een situatie waarin je stevig hebt moeten onderhandelen om je vooropgestelde doel te bereiken? Hoe ging dit?',36),(181,'Wat is de afgelopen tijd de meest complexe beslissing geweest die je hebt moeten nemen?',37),(182,'Heb je wel eens een beslissing uitgesteld omdat je meer tijd nodig had? Wat waren de eventuele risico\'s van dit besluit en wat waren de argumenten voor en tegen?',37),(183,'Vanaf wanneer beslis je om advies in te winnen vooraleer je een beslissing neemt?',37),(184,'Heb je ooit al eens een impopulaire beslissing genomen? Zou je dit nu anders aanpakken?',37),(185,'Is het wel eens voorgevallen dat je door te lang twijfelen een kans hebt laten lopen? Wat was hier de oorzaak van en hoe zou je dit naar de toekomst toe proberen vermijden?',37),(186,'Hebt u de laatste maanden presentaties verzorgd? Hoe verliep dit?',38),(187,'Wat onderneem je om je toehoorders geboeid te houden?',38),(188,'Welke middelen en technieken gebruik je tijdens je presentaties?',38),(189,'Wat vind je leuk aan presenteren en wat vind je minder leuk?',38),(190,'Wat onderneem je om mensen geboeid te houden?',38),(191,'Welke doelen heb je het afgelopen jaar gesteld? Welke heb je reeds afgewerkt?',39),(192,'Heb je ooit wel eens een deadline gemist? Hoe kwam dit? Wat heb je geleerd?',39),(193,'Welke acties of doelstellingen hebben prioriteit gekregen dezer dagen?',39),(194,'Heb je wel eens een project van A tot Z begeleidt? Wat verliep er heel vlot en wat verliep er minder vlot?',39),(195,'Op welke wijze hebt u zich voorbereidt op dit gesprek?',39),(196,'Waaruit blijkt dat je een echte doener bent en organisatietalent hebt? Beschrijf een concrete situatie?',40),(197,'Wat onderneem je om overal het overzicht in te bewaren?',40),(198,'Kan jij mensen meekrijgen voor jouw plannen? Hoe pak je dit aan?',40),(199,'Hoe ben je omgegaan met problemen die zich op het laatste moment stelden?',40),(200,'Heb je wel eens een event georganiseerd?',40),(201,'Ooit kritiek gehad op een voorstel of idee van jou? Hoe voelde je jezelf daarbij?',41),(202,'Wat heb je in je vorige job aan anderen overgelaten? Hoe hebben zij hierop gereageerd? Is er hierin ooit iets misgelopen?',41),(203,'Aan wat voor type medewerker kan je het best taken toevertrouwen wat is jouw visie hieromtrent?',41),(204,'Hoe zorg je ervoor dat je werk op een overzichtelijke manier overgedragen wordt?',41),(205,'Is er wel eens iets fout gegaan bij het delegeren van een taak aan iemand anders? Wat heb je hier uit geleerd?',41);
/*!40000 ALTER TABLE `Vraag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `VraagFunctie`
--

DROP TABLE IF EXISTS `VraagFunctie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `VraagFunctie` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `FunctieId` int(11) DEFAULT NULL,
  `VraagId` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `FunctieId` (`FunctieId`),
  KEY `VraagId` (`VraagId`)
) ENGINE=InnoDB AUTO_INCREMENT=1034 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `VraagFunctie`
--

LOCK TABLES `VraagFunctie` WRITE;
/*!40000 ALTER TABLE `VraagFunctie` DISABLE KEYS */;
INSERT INTO `VraagFunctie` VALUES (1,1,3),(2,3,5),(3,1,5),(4,3,6),(5,3,7),(6,1,1),(7,1,2),(8,1,3),(9,1,4),(10,1,5),(11,1,6),(12,1,7),(13,1,8),(14,1,9),(15,1,1),(16,1,11),(17,1,12),(18,1,13),(19,1,14),(20,1,15),(21,1,16),(22,1,17),(23,1,18),(24,1,19),(25,1,2),(26,1,21),(27,1,22),(28,1,23),(29,1,24),(30,1,25),(31,1,26),(32,1,27),(33,1,28),(34,1,29),(35,1,3),(36,1,31),(37,1,32),(38,1,33),(39,1,34),(40,1,35),(41,2,36),(42,2,37),(43,2,38),(44,2,39),(45,2,4),(46,2,41),(47,2,42),(48,2,43),(49,2,44),(50,2,45),(51,2,46),(52,2,47),(53,2,48),(54,2,49),(55,2,5),(56,2,51),(57,2,52),(58,2,53),(59,2,54),(60,2,55),(61,2,56),(62,2,57),(63,2,58),(64,2,59),(65,2,6),(66,2,61),(67,2,62),(68,2,63),(69,2,64),(70,2,65),(71,3,51),(72,3,52),(73,3,53),(74,3,54),(75,3,55),(76,3,61),(77,3,62),(78,3,63),(79,3,64),(80,3,65),(81,3,66),(82,3,67),(83,3,68),(84,3,69),(85,3,7),(86,3,71),(87,3,72),(88,3,73),(89,3,74),(90,3,75),(91,3,76),(92,3,77),(93,3,78),(94,3,79),(95,3,8),(96,3,81),(97,3,82),(98,3,83),(99,3,84),(100,3,85),(101,3,1),(102,3,2),(103,3,3),(104,3,4),(105,3,5),(106,4,86),(107,4,87),(108,4,88),(109,4,89),(110,4,9),(111,4,46),(112,4,47),(113,4,48),(114,4,49),(115,4,5),(116,4,41),(117,4,42),(118,4,43),(119,4,44),(120,4,45),(121,4,51),(122,4,52),(123,4,53),(124,4,54),(125,4,55),(126,4,71),(127,4,72),(128,4,73),(129,4,74),(130,4,75),(131,5,51),(132,5,52),(133,5,53),(134,5,54),(135,5,55),(136,5,71),(137,5,72),(138,5,73),(139,5,74),(140,5,75),(141,5,36),(142,5,37),(143,5,38),(144,5,39),(145,5,4),(146,5,91),(147,5,92),(148,5,93),(149,5,94),(150,5,95),(151,5,6),(152,5,7),(153,5,8),(154,5,9),(155,5,1),(156,5,66),(157,5,67),(158,5,68),(159,5,69),(160,5,7),(161,5,96),(162,5,97),(163,5,98),(164,5,99),(165,5,1),(166,6,86),(167,6,87),(168,6,88),(169,6,89),(170,6,9),(171,6,46),(172,6,47),(173,6,48),(174,6,49),(175,6,5),(176,6,41),(177,6,42),(178,6,43),(179,6,44),(180,6,45),(181,6,51),(182,6,52),(183,6,53),(184,6,54),(185,6,55),(186,6,81),(187,6,82),(188,6,83),(189,6,84),(190,6,85),(191,6,101),(192,6,102),(193,6,103),(194,6,104),(195,6,105),(196,6,106),(197,6,107),(198,6,108),(199,6,109),(200,6,11),(201,6,31),(202,6,32),(203,6,33),(204,6,34),(205,6,35),(206,7,111),(207,7,112),(208,7,113),(209,7,114),(210,7,115),(211,7,116),(212,7,117),(213,7,118),(214,7,119),(215,7,12),(216,7,121),(217,7,122),(218,7,123),(219,7,124),(220,7,125),(221,7,126),(222,7,127),(223,7,128),(224,7,129),(225,7,13),(226,7,51),(227,7,52),(228,7,53),(229,7,54),(230,7,55),(231,7,81),(232,7,82),(233,7,83),(234,7,84),(235,7,85),(236,7,101),(237,7,102),(238,7,103),(239,7,104),(240,7,105),(241,7,106),(242,7,107),(243,7,108),(244,7,109),(245,7,11),(246,7,31),(247,7,32),(248,7,33),(249,7,34),(250,7,35),(251,8,131),(252,8,132),(253,8,133),(254,8,134),(255,8,135),(256,8,136),(257,8,137),(258,8,138),(259,8,139),(260,8,14),(261,8,36),(262,8,37),(263,8,38),(264,8,39),(265,8,4),(266,8,51),(267,8,52),(268,8,53),(269,8,54),(270,8,55),(271,8,76),(272,8,77),(273,8,78),(274,8,79),(275,8,8),(276,8,26),(277,8,27),(278,8,28),(279,8,29),(280,8,3),(281,8,31),(282,8,32),(283,8,33),(284,8,34),(285,8,35),(286,9,131),(287,9,132),(288,9,133),(289,9,134),(290,9,135),(291,9,136),(292,9,137),(293,9,138),(294,9,139),(295,9,14),(296,9,36),(297,9,37),(298,9,38),(299,9,39),(300,9,4),(301,9,61),(302,9,62),(303,9,63),(304,9,64),(305,9,65),(306,9,51),(307,9,52),(308,9,53),(309,9,54),(310,9,55),(311,9,66),(312,9,67),(313,9,68),(314,9,69),(315,9,7),(316,9,71),(317,9,72),(318,9,73),(319,9,74),(320,9,75),(321,9,31),(322,9,32),(323,9,33),(324,9,34),(325,9,35),(326,10,81),(327,10,82),(328,10,83),(329,10,84),(330,10,85),(331,10,56),(332,10,57),(333,10,58),(334,10,59),(335,10,6),(336,10,46),(337,10,47),(338,10,48),(339,10,49),(340,10,5),(341,10,51),(342,10,52),(343,10,53),(344,10,54),(345,10,55),(346,10,71),(347,10,72),(348,10,73),(349,10,74),(350,10,75),(351,11,141),(352,11,142),(353,11,143),(354,11,144),(355,11,145),(356,11,101),(357,11,102),(358,11,103),(359,11,104),(360,11,105),(361,11,81),(362,11,82),(363,11,83),(364,11,84),(365,11,85),(366,11,51),(367,11,52),(368,11,53),(369,11,54),(370,11,55),(371,11,71),(372,11,72),(373,11,73),(374,11,74),(375,11,75),(376,12,131),(377,12,132),(378,12,133),(379,12,134),(380,12,135),(381,12,136),(382,12,137),(383,12,138),(384,12,139),(385,12,14),(386,12,36),(387,12,37),(388,12,38),(389,12,39),(390,12,4),(391,12,146),(392,12,147),(393,12,148),(394,12,149),(395,12,15),(396,12,31),(397,12,32),(398,12,33),(399,12,34),(400,12,35),(401,12,151),(402,12,152),(403,12,153),(404,12,154),(405,12,155),(406,12,156),(407,12,157),(408,12,158),(409,12,159),(410,12,16),(411,12,161),(412,12,162),(413,12,163),(414,12,164),(415,12,165),(416,13,81),(417,13,82),(418,13,83),(419,13,84),(420,13,85),(421,13,71),(422,13,72),(423,13,73),(424,13,74),(425,13,75),(426,13,151),(427,13,152),(428,13,153),(429,13,154),(430,13,155),(431,13,31),(432,13,32),(433,13,33),(434,13,34),(435,13,35),(436,13,166),(437,13,167),(438,13,168),(439,13,169),(440,13,17),(441,13,136),(442,13,137),(443,13,138),(444,13,139),(445,13,14),(446,14,136),(447,14,137),(448,14,138),(449,14,139),(450,14,14),(451,14,81),(452,14,82),(453,14,83),(454,14,84),(455,14,85),(456,14,71),(457,14,72),(458,14,73),(459,14,74),(460,14,75),(461,14,56),(462,14,57),(463,14,58),(464,14,59),(465,14,6),(466,14,151),(467,14,152),(468,14,153),(469,14,154),(470,14,155),(471,15,131),(472,15,132),(473,15,133),(474,15,134),(475,15,135),(476,15,136),(477,15,137),(478,15,138),(479,15,139),(480,15,14),(481,15,36),(482,15,37),(483,15,38),(484,15,39),(485,15,4),(486,15,81),(487,15,82),(488,15,83),(489,15,84),(490,15,85),(491,15,71),(492,15,72),(493,15,73),(494,15,74),(495,15,75),(496,15,101),(497,15,102),(498,15,103),(499,15,104),(500,15,105),(501,15,56),(502,15,57),(503,15,58),(504,15,59),(505,15,6),(506,15,151),(507,15,152),(508,15,153),(509,15,154),(510,15,155),(511,15,31),(512,15,32),(513,15,33),(514,15,34),(515,15,35),(516,16,131),(517,16,132),(518,16,133),(519,16,134),(520,16,135),(521,16,136),(522,16,137),(523,16,138),(524,16,139),(525,16,14),(526,16,36),(527,16,37),(528,16,38),(529,16,39),(530,16,4),(531,16,81),(532,16,82),(533,16,83),(534,16,84),(535,16,85),(536,16,71),(537,16,72),(538,16,73),(539,16,74),(540,16,75),(541,16,101),(542,16,102),(543,16,103),(544,16,104),(545,16,105),(546,16,56),(547,16,57),(548,16,58),(549,16,59),(550,16,6),(551,16,151),(552,16,152),(553,16,153),(554,16,154),(555,16,155),(556,16,31),(557,16,32),(558,16,33),(559,16,34),(560,16,35),(561,17,101),(562,17,102),(563,17,103),(564,17,104),(565,17,105),(566,17,31),(567,17,32),(568,17,33),(569,17,34),(570,17,35),(571,17,46),(572,17,47),(573,17,48),(574,17,49),(575,17,5),(576,17,106),(577,17,107),(578,17,108),(579,17,109),(580,17,11),(581,17,76),(582,17,77),(583,17,78),(584,17,79),(585,17,8),(586,17,151),(587,17,152),(588,17,153),(589,17,154),(590,17,155),(591,18,11),(592,18,12),(593,18,13),(594,18,14),(595,18,15),(596,18,16),(597,18,17),(598,18,18),(599,18,19),(600,18,2),(601,18,91),(602,18,92),(603,18,93),(604,18,94),(605,18,95),(606,18,146),(607,18,147),(608,18,148),(609,18,149),(610,18,15),(611,18,171),(612,18,172),(613,18,173),(614,18,174),(615,18,175),(616,18,176),(617,18,177),(618,18,178),(619,18,179),(620,18,18),(621,18,151),(622,18,152),(623,18,153),(624,18,154),(625,18,155),(626,18,181),(627,18,182),(628,18,183),(629,18,184),(630,18,185),(631,18,126),(632,18,127),(633,18,128),(634,18,129),(635,18,13),(636,18,186),(637,18,187),(638,18,188),(639,18,189),(640,18,19),(641,19,11),(642,19,12),(643,19,13),(644,19,14),(645,19,15),(646,19,16),(647,19,17),(648,19,18),(649,19,19),(650,19,2),(651,19,91),(652,19,92),(653,19,93),(654,19,94),(655,19,95),(656,19,51),(657,19,52),(658,19,53),(659,19,54),(660,19,55),(661,19,191),(662,19,192),(663,19,193),(664,19,194),(665,19,195),(666,19,136),(667,19,137),(668,19,138),(669,19,139),(670,19,14),(671,19,71),(672,19,72),(673,19,73),(674,19,74),(675,19,75),(676,20,131),(677,20,132),(678,20,133),(679,20,134),(680,20,135),(681,20,136),(682,20,137),(683,20,138),(684,20,139),(685,20,14),(686,20,36),(687,20,37),(688,20,38),(689,20,39),(690,20,4),(691,20,51),(692,20,52),(693,20,53),(694,20,54),(695,20,55),(696,20,191),(697,20,192),(698,20,193),(699,20,194),(700,20,195),(701,20,76),(702,20,77),(703,20,78),(704,20,79),(705,20,8),(706,21,11),(707,21,12),(708,21,13),(709,21,14),(710,21,15),(711,21,16),(712,21,17),(713,21,18),(714,21,19),(715,21,2),(716,21,91),(717,21,92),(718,21,93),(719,21,94),(720,21,95),(721,21,51),(722,21,52),(723,21,53),(724,21,54),(725,21,55),(726,21,71),(727,21,72),(728,21,73),(729,21,74),(730,21,75),(731,21,41),(732,21,42),(733,21,43),(734,21,44),(735,21,45),(736,22,196),(737,22,197),(738,22,198),(739,22,199),(740,22,2),(741,22,121),(742,22,122),(743,22,123),(744,22,124),(745,22,125),(746,22,201),(747,22,202),(748,22,203),(749,22,204),(750,22,205),(751,22,51),(752,22,52),(753,22,53),(754,22,54),(755,22,55),(756,22,81),(757,22,82),(758,22,83),(759,22,84),(760,22,85),(761,23,131),(762,23,132),(763,23,133),(764,23,134),(765,23,135),(766,23,136),(767,23,137),(768,23,138),(769,23,139),(770,23,14),(771,23,36),(772,23,37),(773,23,38),(774,23,39),(775,23,4),(776,23,31),(777,23,32),(778,23,33),(779,23,34),(780,23,35),(781,23,26),(782,23,27),(783,23,28),(784,23,29),(785,23,3),(786,23,176),(787,23,177),(788,23,178),(789,23,179),(790,23,18),(791,23,196),(792,23,197),(793,23,198),(794,23,199),(795,23,2),(796,23,76),(797,23,77),(798,23,78),(799,23,79),(800,23,8),(801,23,51),(802,23,52),(803,23,53),(804,23,54),(805,23,55),(806,23,66),(807,23,67),(808,23,68),(809,23,69),(810,23,7),(811,23,71),(812,23,72),(813,23,73),(814,23,74),(815,23,75),(816,24,51),(817,24,52),(818,24,53),(819,24,54),(820,24,55),(821,24,71),(822,24,72),(823,24,73),(824,24,74),(825,24,75),(826,24,66),(827,24,67),(828,24,68),(829,24,69),(830,24,7),(831,24,166),(832,24,167),(833,24,168),(834,24,169),(835,24,17),(836,24,106),(837,24,107),(838,24,108),(839,24,109),(840,24,11),(841,24,46),(842,24,47),(843,24,48),(844,24,49),(845,24,5),(846,24,156),(847,24,157),(848,24,158),(849,24,159),(850,24,16),(851,25,131),(852,25,132),(853,25,133),(854,25,134),(855,25,135),(856,25,136),(857,25,137),(858,25,138),(859,25,139),(860,25,14),(861,25,36),(862,25,37),(863,25,38),(864,25,39),(865,25,4),(866,25,61),(867,25,62),(868,25,63),(869,25,64),(870,25,65),(871,25,96),(872,25,97),(873,25,98),(874,25,99),(875,25,1),(876,25,126),(877,25,127),(878,25,128),(879,25,129),(880,25,13),(881,25,81),(882,25,82),(883,25,83),(884,25,84),(885,25,85),(886,25,31),(887,25,32),(888,25,33),(889,25,34),(890,25,35),(891,26,56),(892,26,57),(893,26,58),(894,26,59),(895,26,6),(896,26,51),(897,26,52),(898,26,53),(899,26,54),(900,26,55),(901,26,61),(902,26,62),(903,26,63),(904,26,64),(905,26,65),(906,26,96),(907,26,97),(908,26,98),(909,26,99),(910,26,1),(911,26,76),(912,26,77),(913,26,78),(914,26,79),(915,26,8),(916,26,31),(917,26,32),(918,26,33),(919,26,34),(920,26,35),(921,26,36),(922,26,37),(923,26,38),(924,26,39),(925,26,4),(926,26,41),(927,26,42),(928,26,43),(929,26,44),(930,26,45),(931,27,11),(932,27,12),(933,27,13),(934,27,14),(935,27,15),(936,27,16),(937,27,17),(938,27,18),(939,27,19),(940,27,2),(941,27,91),(942,27,92),(943,27,93),(944,27,94),(945,27,95),(946,27,151),(947,27,152),(948,27,153),(949,27,154),(950,27,155),(951,27,101),(952,27,102),(953,27,103),(954,27,104),(955,27,105),(956,27,81),(957,27,82),(958,27,83),(959,27,84),(960,27,85),(961,27,106),(962,27,107),(963,27,108),(964,27,109),(965,27,11),(966,27,51),(967,27,52),(968,27,53),(969,27,54),(970,27,55),(971,28,131),(972,28,132),(973,28,133),(974,28,134),(975,28,135),(976,28,136),(977,28,137),(978,28,138),(979,28,139),(980,28,14),(981,28,36),(982,28,37),(983,28,38),(984,28,39),(985,28,4),(986,28,51),(987,28,52),(988,28,53),(989,28,54),(990,28,55),(991,29,131),(992,29,132),(993,29,133),(994,29,134),(995,29,135),(996,29,136),(997,29,137),(998,29,138),(999,29,139),(1000,29,14),(1001,29,36),(1002,29,37),(1003,29,38),(1004,29,39),(1005,29,4),(1006,29,191),(1007,29,192),(1008,29,193),(1009,29,194),(1010,29,195),(1011,29,81),(1012,29,82),(1013,29,83),(1014,29,84),(1015,29,85),(1016,29,76),(1017,29,77),(1018,29,78),(1019,29,79),(1020,29,8),(1021,29,71),(1022,29,72),(1023,29,73),(1024,29,74),(1025,29,75),(1026,29,181),(1027,29,182),(1028,29,183),(1029,29,184),(1030,29,185),(1031,31,5),(1032,31,7),(1033,31,55);
/*!40000 ALTER TABLE `VraagFunctie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'InterviewDB'
--
/*!50003 DROP PROCEDURE IF EXISTS `CompetentieDelete` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`CvoProject`@`%` PROCEDURE `CompetentieDelete`(
    pId INT
  )
BEGIN
    DELETE FROM `Competentie`
    WHERE `Competentie`.`Id` = pId;
  END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `CompetentieInsert` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`CvoProject`@`%` PROCEDURE `CompetentieInsert`(
	OUT pId INT ,
	IN pName NVARCHAR (200)
)
BEGIN
INSERT INTO `Competentie`
	(
		`Competentie`.`Naam`
	)
	VALUES
	(
		pName
  );
	SELECT LAST_INSERT_ID() INTO pId;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `CompetentiesSelectAll` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`CvoProject`@`%` PROCEDURE `CompetentiesSelectAll`(
  )
BEGIN
    SELECT Competentie.Naam, Competentie.Id FROM `Competentie`
    ORDER BY Competentie.Naam;
  END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `CompetentiesSelectOne` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`CvoProject`@`%` PROCEDURE `CompetentiesSelectOne`(
    pId INT
  )
BEGIN
    SELECT Competentie.Naam, Competentie.Id FROM `Competentie`
    WHERE `Competentie`.`Id` = pId;
  END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `CompetentiesSelectQuestions` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`CvoProject`@`%` PROCEDURE `CompetentiesSelectQuestions`(
    IN pCompId INT
  )
BEGIN
    SELECT Vraag.Vraag, Competentie.Naam, Competentie.Id AS CId, Vraag.Id AS VId FROM `Vraag`
      INNER JOIN Competentie ON CompetentieId = Competentie.Id
    WHERE `Vraag`.`CompetentieId` = pCompId;
  END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `CompetentieUpdate` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`CvoProject`@`%` PROCEDURE `CompetentieUpdate`(
    pId INT ,
  pName NVARCHAR (200)
)
BEGIN
UPDATE `Competentie`
SET
  `Competentie`.`Naam` = pName
WHERE `Competentie`.`Id` = pId;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `FunctieDelete` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`CvoProject`@`%` PROCEDURE `FunctieDelete`(
    pId INT
  )
BEGIN
    DELETE FROM `Functie`
    WHERE `Functie`.`Id` = pId;
  END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `FunctieInsert` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`CvoProject`@`%` PROCEDURE `FunctieInsert`(
    OUT pId INT ,
IN pName NVARCHAR (200)
)
BEGIN
INSERT INTO `Functie`
(
`Functie`.`Naam`
)
VALUES
(
pName
);
SELECT LAST_INSERT_ID() INTO pId;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `FunctiesSelectAll` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`CvoProject`@`%` PROCEDURE `FunctiesSelectAll`(
  )
BEGIN
    SELECT Functie.Naam, Functie.Id FROM `Functie`;
  END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `FunctieUpdate` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`CvoProject`@`%` PROCEDURE `FunctieUpdate`(
    pId INT ,
  pName NVARCHAR (200)
)
BEGIN
UPDATE `Functie`
SET
  `Functie`.`Naam` = pName
WHERE `Functie`.`Id` = pId;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `FunctionSelectById` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`CvoProject`@`%` PROCEDURE `FunctionSelectById`(
    IN pId INT
  )
BEGIN
    SELECT * FROM `Functie`
    WHERE Id = pId;
  END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `QuestionsSelectAll` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`CvoProject`@`%` PROCEDURE `QuestionsSelectAll`(
  )
BEGIN
    SELECT * FROM `Vraag`;
  END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `SelectQuestionsCompetencesOnQuestion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`CvoProject`@`%` PROCEDURE `SelectQuestionsCompetencesOnQuestion`(
    IN pVraagId text
  )
BEGIN
    SELECT c.Naam as CompNaam ,V.Vraag as Vraag FROM `Vraag` as `V`
      INNER JOIN Competentie as c ON V.CompetentieId = c.Id
		Where V.Id = (pVraagId)
    ORDER BY CompNaam;
  END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `SelectQuestionsFunctionCompetencesOnFunction` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`CvoProject`@`%` PROCEDURE `SelectQuestionsFunctionCompetencesOnFunction`(
    IN pFuncId INT
  )
BEGIN
    SELECT f.Naam as FuncNaam,c.Naam as CompNaam ,v.Vraag FROM `VraagFunctie`
      INNER JOIN Vraag as v ON VraagId = v.Id
      INNER JOIN Functie as f ON FunctieId = f.Id
      INNER JOIN Competentie as c ON v.CompetentieId = c.Id
    WHERE `VraagFunctie`.`FunctieId` = pFuncId
    ORDER BY FuncNaam AND CompNaam;
  END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `SelectQuestionsFunctionCompetencesOrderByCompetence` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`CvoProject`@`%` PROCEDURE `SelectQuestionsFunctionCompetencesOrderByCompetence`(
    IN pCompId INT
  )
BEGIN
    SELECT f.Naam as FuncNaam,c.Naam as CompNaam ,v.Vraag FROM `VraagFunctie`
      INNER JOIN Vraag as v ON VraagId = v.Id
      INNER JOIN Functie as f ON FunctieId = f.Id
      INNER JOIN Competentie as c ON v.CompetentieId = c.Id
    WHERE `v`.`CompetentieId` = pCompId
    ORDER BY c.Naam;
  END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `SelectQuestionsIdsOnFunction` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`CvoProject`@`%` PROCEDURE `SelectQuestionsIdsOnFunction`(
    IN pFuncId INT
  )
BEGIN
    SELECT v.Id FROM `VraagFunctie`
      INNER JOIN Vraag as v ON VraagId = v.Id
      INNER JOIN Functie as f ON FunctieId = f.Id
    WHERE `VraagFunctie`.`FunctieId` = pFuncId;
  END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `SelectReportData` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`CvoProject`@`%` PROCEDURE `SelectReportData`(
    IN pListId nvarchar(255)
  )
BEGIN
    SELECT c.Naam as CompNaam ,V.Vraag as Vraag FROM `Vraag` as `V`
      INNER JOIN Competentie as c ON V.CompetentieId = c.Id
    WHERE FIND_IN_SET(V.Id, pListId)
    ORDER BY CompNaam;
  END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `VraagDelete` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`CvoProject`@`%` PROCEDURE `VraagDelete`(
    pId INT
  )
BEGIN
    DELETE FROM `Vraag`
    WHERE `Vraag`.`Id` = pId;
  END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `VraagFunctieDelete` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`CvoProject`@`%` PROCEDURE `VraagFunctieDelete`(
    pId INT
  )
BEGIN
    DELETE FROM `VraagFunctie`
    WHERE `VraagFunctie`.`Id` = pId;
  END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `VraagFunctieInsert` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`CvoProject`@`%` PROCEDURE `VraagFunctieInsert`(
    OUT pId INT ,
    IN FuncId INT,
      IN VraagId INT
  )
BEGIN
    INSERT INTO `Competentie`
    (
      `VraagFunctie`.`FunctieId`,
    `VraagFunctie`.`VraagId`
    )
    VALUES
    (
    FuncId,
      VraagId
    );
    SELECT LAST_INSERT_ID() INTO pId;
  END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `VraagFunctieUpdate` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`CvoProject`@`%` PROCEDURE `VraagFunctieUpdate`(
    pId INT ,
    IN FuncId INT,
    IN VraagId INT
)
BEGIN
UPDATE `VraagFunctie`
SET
  `VraagFunctie`.`VraagId` = VraagId,
  `VraagFunctie`.`FunctieId` = FuncId
WHERE `VraagFunctie`.`Id` = pId;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `VraagInsert` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`CvoProject`@`%` PROCEDURE `VraagInsert`(
	OUT pId INT ,
	IN pName text,
	IN pCompId INT
)
BEGIN
INSERT INTO `Vraag`
	(
		`Vraag`.`Vraag`,
		`Vraag`.`CompetentieId`
	)
	VALUES
	(
		pName,
		pCompId
  );
	SELECT LAST_INSERT_ID() INTO pId;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `VraagUpdate` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`CvoProject`@`%` PROCEDURE `VraagUpdate`(
    pId INT ,
  pName NVARCHAR (200)
)
BEGIN
UPDATE `Vraag`
SET
  `Vraag`.`Vraag` = pName
WHERE `Vraag`.`Id` = pId;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-06-10 17:05:34
