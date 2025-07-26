PRAGMA foreign_keys = ON;

DROP TABLE IF EXISTS Users;
CREATE TABLE Users (
  idUsers   INTEGER PRIMARY KEY AUTOINCREMENT,
  UserName  TEXT NOT NULL,
  User      TEXT NOT NULL,
  UserEmail TEXT NOT NULL UNIQUE,
  Pasword   TEXT NOT NULL,
  Role      TEXT NOT NULL
);
INSERT INTO Users (idUsers, UserName, User, UserEmail, Pasword, Role) VALUES
(1,'Admin','Administrátor','admin@travelblog.cz','efacc4001e857f7eba4ae781c2932dedf843865e','admin'),
(2,'Delegat1','Karel Novák','novak@travelblog.cz','bec6d274aba05aeeb195b870b6c595c44b05c086','delegate'),
(3,'Delegat2','Jana Malá','mala@travelblog.cz','8b0e26325bc7b6ff6a3c7c573dd8dd35932b23cc','delegate');

DROP TABLE IF EXISTS Destination;
CREATE TABLE Destination (
  idDestination INTEGER PRIMARY KEY AUTOINCREMENT,
  Name          TEXT NOT NULL
);
INSERT INTO Destination (idDestination, Name) VALUES
(1,'Vysoké Tatry'),
(2,'Šumava'),
(3,'Norsko'),
(4,'Švýcarsko'),
(5,'Itálie');

DROP TABLE IF EXISTS Articles;
CREATE TABLE Articles (
  idArticles   INTEGER PRIMARY KEY AUTOINCREMENT,
  Title        TEXT NOT NULL,
  Content      TEXT NOT NULL,
  ProfileImg   TEXT,
  Author       INTEGER NOT NULL,
  Destination  INTEGER NOT NULL,
  DatePublic   TEXT NOT NULL,
  FOREIGN KEY (Author)      REFERENCES Users(idUsers),
  FOREIGN KEY (Destination) REFERENCES Destination(idDestination)
);
INSERT INTO Articles (idArticles, Title, Content, ProfileImg, Author, Destination, DatePublic) VALUES
(1,'Šumavské slatě','Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Pellentesque pretium lectus id turpis. Nullam lectus justo, vulputate eget mollis sed, tempor sed magna. Nulla quis diam. In enim a arcu imperdiet malesuada. Nulla pulvinar eleifend sem. Aenean placerat. Aliquam erat volutpat. In convallis. Phasellus faucibus molestie nisl. Suspendisse nisl. Nulla non lectus sed nisl molestie malesuada. Maecenas lorem. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Proin mattis lacinia justo.','uploadImages/slateSumava.jpg',2,2,'2017-06-15'),
(2,'Materhorn v noci','Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Pellentesque pretium lectus id turpis. Nullam lectus justo, vulputate eget mollis sed, tempor sed magna. Nulla quis diam. In enim a arcu imperdiet malesuada. Nulla pulvinar eleifend sem. Aenean placerat. Aliquam erat volutpat. In convallis. Phasellus faucibus molestie nisl. Suspendisse nisl. Nulla non lectus sed nisl molestie malesuada. Maecenas lorem. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Proin mattis lacinia justo.','uploadImages/Matterhorn.jpg',3,4,'2017-07-15'),
(3,'Šumava slatě II','Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Pellentesque pretium lectus id turpis. Nullam lectus justo, vulputate eget mollis sed, tempor sed magna. Nulla quis diam. In enim a arcu imperdiet malesuada. Nulla pulvinar eleifend sem. Aenean placerat. Aliquam erat volutpat. In convallis. Phasellus faucibus molestie nisl. Suspendisse nisl. Nulla non lectus sed nisl molestie malesuada. Maecenas lorem. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Proin mattis lacinia justo.','uploadImages/slateSumava.jpg',2,2,'2017-07-15');
