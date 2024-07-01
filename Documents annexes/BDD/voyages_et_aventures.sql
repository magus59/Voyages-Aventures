CREATE DATABASE voyages_et_aventures;

USE voyages_et_aventures;

-- Table Utilisateur
CREATE TABLE Utilisateur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_utilisateur VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(255) NOT NULL,
    nom VARCHAR(100),
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- Table Categorie
CREATE TABLE Categorie (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL
);

-- Table Administrateur
CREATE TABLE Administrateur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    utilisateur_id INT,
    FOREIGN KEY (utilisateur_id) REFERENCES Utilisateur(id)
);

-- Table Article
CREATE TABLE Article (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    contenu TEXT NOT NULL,
    image_url VARCHAR(255),
    date_publication date DEFAULT CURRENT_TIMESTAMP,
    utilisateur_id INT,
    categorie_id INT,
    FOREIGN KEY (utilisateur_id) REFERENCES Utilisateur(id),
    FOREIGN KEY (categorie_id) REFERENCES Categorie(id)
);

-- Table Commentaire
CREATE TABLE Commentaire (
    id INT AUTO_INCREMENT PRIMARY KEY,
    contenu TEXT NOT NULL,
    date_publication TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    utilisateur_id INT,
    article_id INT,
    FOREIGN KEY (utilisateur_id) REFERENCES Utilisateur(id),
    FOREIGN KEY (article_id) REFERENCES Article(id)
);

INSERT INTO Utilisateur (nom_utilisateur, email, mot_de_passe, nom, date_creation) VALUES
('user1', 'user1@example.com', SHA2('password1', 256), 'Nom1', '2023-06-01 10:00:00'),
('user2', 'user2@example.com', SHA2('password2', 256), 'Nom2', '2023-06-02 11:00:00'),
('user3', 'user3@example.com', SHA2('password3', 256), 'Nom3', '2023-06-03 12:00:00'),
('user4', 'user4@example.com', SHA2('password4', 256), 'Nom4', '2023-06-04 13:00:00'),
('user5', 'user5@example.com', SHA2('password5', 256), 'Nom5', '2023-06-05 14:00:00'),
('user6', 'user6@example.com', SHA2('password6', 256), 'Nom6', '2023-06-06 15:00:00'),
('user7', 'user7@example.com', SHA2('password7', 256), 'Nom7', '2023-06-07 16:00:00'),
('user8', 'user8@example.com', SHA2('password8', 256), 'Nom8', '2023-06-08 17:00:00'),
('user9', 'user9@example.com', SHA2('password9', 256), 'Nom9', '2023-06-09 18:00:00'),
('user10', 'user10@example.com', SHA2('password10', 256), 'Nom10', '2023-06-10 19:00:00'),
('user11', 'user11@example.com', SHA2('password11', 256), 'Nom11', '2023-06-11 10:00:00'),
('user12', 'user12@example.com', SHA2('password12', 256), 'Nom12', '2023-06-12 11:00:00'),
('user13', 'user13@example.com', SHA2('password13', 256), 'Nom13', '2023-06-13 12:00:00'),
('user14', 'user14@example.com', SHA2('password14', 256), 'Nom14', '2023-06-14 13:00:00'),
('user15', 'user15@example.com', SHA2('password15', 256), 'Nom15', '2023-06-15 14:00:00'),
('user16', 'user16@example.com', SHA2('password16', 256), 'Nom16', '2023-06-16 15:00:00'),
('user17', 'user17@example.com', SHA2('password17', 256), 'Nom17', '2023-06-17 16:00:00'),
('user18', 'user18@example.com', SHA2('password18', 256), 'Nom18', '2023-06-18 17:00:00'),
('user19', 'user19@example.com', SHA2('password19', 256), 'Nom19', '2023-06-19 18:00:00'),
('user20', 'user20@example.com', SHA2('password20', 256), 'Nom20', '2023-06-20 19:00:00');


INSERT INTO Categorie (nom) VALUES
('Adventure'),
('Beach'),
('Mountain'),
('Cruise'),
('Desert'),
('Mountain'),
('Adventure'),
('Historical'),
('Mountain'),
('Adventure'),
('Mountain'),
('Romantic'),
('Solo'),
('Adventure'),
('Winter Sports'),
('Mountain'),
('Adventure'),
('Cruise'),
('Mountain'),
('Road Trip');

INSERT INTO Article (titre, contenu, image_url, date_publication, utilisateur_id, categorie_id) VALUES
('Article 1', 'Contenu de l\'article 1', 'http://example.com/image1.jpg', '2023-06-01 10:00:00', 1, 1),
('Article 2', 'Contenu de l\'article 2', 'http://example.com/image2.jpg', '2023-06-02 11:00:00', 2, 2),
('Article 3', 'Contenu de l\'article 3', 'http://example.com/image3.jpg', '2023-06-03 12:00:00', 3, 3),
('Article 4', 'Contenu de l\'article 4', 'http://example.com/image4.jpg', '2023-06-04 13:00:00', 4, 4),
('Article 5', 'Contenu de l\'article 5', 'http://example.com/image5.jpg', '2023-06-05 14:00:00', 5, 5),
('Article 6', 'Contenu de l\'article 6', 'http://example.com/image6.jpg', '2023-06-06 15:00:00', 6, 6),
('Article 7', 'Contenu de l\'article 7', 'http://example.com/image7.jpg', '2023-06-07 16:00:00', 7, 7),
('Article 8', 'Contenu de l\'article 8', 'http://example.com/image8.jpg', '2023-06-08 17:00:00', 8, 8),
('Article 9', 'Contenu de l\'article 9', 'http://example.com/image9.jpg', '2023-06-09 18:00:00', 9, 9),
('Article 10', 'Contenu de l\'article 10', 'http://example.com/image10.jpg', '2023-06-10 19:00:00', 10, 10),
('Article 11', 'Contenu de l\'article 11', 'http://example.com/image11.jpg', '2023-06-11 10:00:00', 11, 11),
('Article 12', 'Contenu de l\'article 12', 'http://example.com/image12.jpg', '2023-06-12 11:00:00', 12, 12),
('Article 13', 'Contenu de l\'article 13', 'http://example.com/image13.jpg', '2023-06-13 12:00:00', 13, 13),
('Article 14', 'Contenu de l\'article 14', 'http://example.com/image14.jpg', '2023-06-14 13:00:00', 14, 14),
('Article 15', 'Contenu de l\'article 15', 'http://example.com/image15.jpg', '2023-06-15 14:00:00', 15, 15),
('Article 16', 'Contenu de l\'article 16', 'http://example.com/image16.jpg', '2023-06-16 15:00:00', 16, 16),
('Article 17', 'Contenu de l\'article 17', 'http://example.com/image17.jpg', '2023-06-17 16:00:00', 17, 17),
('Article 18', 'Contenu de l\'article 18', 'http://example.com/image18.jpg', '2023-06-18 17:00:00', 18, 18),
('Article 19', 'Contenu de l\'article 19', 'http://example.com/image19.jpg', '2023-06-19 18:00:00', 19, 19),
('Article 20', 'Contenu de l\'article 20', 'http://example.com/image20.jpg', '2023-06-20 19:00:00', 20, 20);

INSERT INTO Commentaire (contenu, date_publication, utilisateur_id, article_id) VALUES
('Commentaire 1', '2023-06-01 11:00:00', 1, 1),
('Commentaire 2', '2023-06-02 12:00:00', 2, 2),
('Commentaire 3', '2023-06-03 13:00:00', 3, 3),
('Commentaire 4', '2023-06-04 14:00:00', 4, 4),
('Commentaire 5', '2023-06-05 15:00:00', 5, 5),
('Commentaire 6', '2023-06-06 16:00:00', 6, 6),
('Commentaire 7', '2023-06-07 17:00:00', 7, 7),
('Commentaire 8', '2023-06-08 18:00:00', 8, 8),
('Commentaire 9', '2023-06-09 19:00:00', 9, 9),
('Commentaire 10', '2023-06-10 20:00:00', 10, 10),
('Commentaire 11', '2023-06-11 11:00:00', 11, 11),
('Commentaire 12', '2023-06-12 12:00:00', 12, 12),
('Commentaire 13', '2023-06-13 13:00:00', 13, 13),
('Commentaire 14', '2023-06-14 14:00:00', 14, 14),
('Commentaire 15', '2023-06-15 15:00:00', 15, 15),
('Commentaire 16', '2023-06-16 16:00:00', 16, 16),
('Commentaire 17', '2023-06-17 17:00:00', 17, 17),
('Commentaire 18', '2023-06-18 18:00:00', 18, 18),
('Commentaire 19', '2023-06-19 19:00:00', 19, 19),
('Commentaire 20', '2023-06-20 20:00:00', 20, 20);

