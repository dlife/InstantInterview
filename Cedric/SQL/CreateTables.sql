use InterviewDB;
create table Competentie(
Id int primary key auto_increment,
Naam nvarchar(200));

/*create table Categorie(
Id int primary key auto_increment,
Naam nvarchar(200));*/

alter table Competentie
add foreign key (CategorieId) references Categorie(Id);

create table Vraag(
Id int primary key auto_increment,
Vraag text(500), CompetentieId int, foreign key (CompetentieId) references Competentie(Id));

create table Functie(
Id int primary key auto_increment, Naam nvarchar(200));

create table VraagFunctie(
Id int primary key auto_increment,FunctieId int, VraagId int,
foreign key (FunctieId) references Functie(Id),foreign key (VraagId) references Vraag(Id));

create table Gebruiker (
Id int primary key auto_increment, Voornaam nvarchar(200), Naam nvarchar(200), Username nvarchar(50), Paswoord nvarchar(200));
