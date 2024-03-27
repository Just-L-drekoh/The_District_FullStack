-- Base de données : `the_district`
--
DROP DATABASE IF EXISTS `the_district`;

CREATE DATABASE IF NOT EXISTS `the_district`;

USE `the_district`;

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
    `id` int AUTO_INCREMENT PRIMARY KEY, `libelle` varchar(100) NOT NULL, `image` varchar(255) NOT NULL, `active` varchar(10) NOT NULL
);

INSERT INTO
    `categorie` (
        `id`, `libelle`, `image`, `active`
    )
VALUES (
        4, "Pizza", "Assets/images_the_district/category/cat_pizza.jpg", "Yes"
    ),
    (
        5, "Burger", "Assets/images_the_district/category/cat_burger.jpg", "Yes"
    ),
    (
        9, "Carnivore", "Assets/images_the_district/category/cat_carnivore.jpg", "Yes"
    ),
    (
        10, "Pasta", "Assets/images_the_district/category/cat_pasta.jpg", "Yes"
    ),
    (
        11, "Salade", "Assets/images_the_district/category/cat_salade.jpg", "Yes"
    ),
    (
        12, "Asian Food", "Assets/images_the_district/category/cat_sushi.jpg", "No"
    ),
    (
        13, "Sandwich", "Assets/images_the_district/category/cat_sandwich.jpg", "Yes"
    ),
    (
        14, "Poisson", "Assets/images_the_district/category/cat_poisson.jpg", "Yes"
    ),
    (
        16, "Partage", "Assets/images_the_district/category/cat_partage.jpg", "No"
    );
--
-- Structure de la table `plat`
--

CREATE TABLE `plat` (
    `id` int AUTO_INCREMENT PRIMARY KEY, `libelle` varchar(100) NOT NULL, `description` text NOT NULL, `prix` decimal(10, 2) NOT NULL, `image` varchar(255) NOT NULL, `id_categorie` int NOT NULL REFERENCES categorie (id), `active` varchar(10) NOT NULL
);

INSERT INTO
    `plat` (
        `id`, `libelle`, `description`, `prix`, `image`, `id_categorie`, `active`
    )
VALUES (
        2, "Classic burger", "Dégustez le délice intemporel de notre Burger Classique, où chaque bouchée est une symphonie de saveurs parfaitement élaborée. Niché entre deux pains briochés moelleux et toastés se trouve une généreuse portion de steak de bœuf juteux, grillé à la perfection selon votre préférence, offrant un contraste alléchant entre la saveur fumée et la tendreté de la viande.", 12.00, "Assets/images_the_district/food/plat_burger_classic.jpg", 5, "Yes"
    ),
    (
        4, "burger traditionelle", "Plongez dans une expérience gustative inoubliable avec notre Burger Traditionnel, un véritable hymne à la simplicité et au plaisir culinaire. Ce chef-d'œuvre de saveurs réconfortantes commence par un généreux steak de bœuf grillé à la perfection, dégageant des arômes alléchants et une tendreté incomparable à chaque bouchée.", 11.00, "Assets/images_the_district/food/plat_burger.jpg", 5, "Yes"
    ),
    (
        6, "Giga burger", "Préparez-vous à une aventure culinaire hors du commun avec notre Giga Burger Épique, une création monumentale conçue pour satisfaire les appétits les plus voraces et éblouir les amateurs de sensations fortes gastronomiques. Ce chef-d'œuvre culinaire commence par une montagne de tendres steaks de bœuf grillés à la perfection, empilés les uns sur les autres pour former une tour de saveurs inégalée.", 14.00, "Assets/images_the_district/food/plat_burger_giga.jpg", 5, "Yes"
    ),
    (
        8, "Pizza 4 fromage", "Plongez dans un tourbillon de fromages exquis avec notre Pizza Quatre Fromages, une création délectable qui séduira les amateurs de fromage les plus exigeants. Sur une base de pâte à pizza artisanale, légère et croustillante, se déploie un festin de fromages fins soigneusement sélectionnés.", 13.00, "Assets/images_the_district/food/plat_pizza_fromage.jpg", 4, "Yes"
    ),
    (
        10, "Pizza pepperoni", "Plongez dans l'essence de l'Italie avec notre Pizza Pepperoni, une explosion de saveurs audacieuses et épicées qui ravira vos papilles à chaque bouchée. Sur une base de pâte à pizza fraîchement préparée, légère et croustillante, se déploie un festin de saveurs inégalées.", 12.00, "Assets/images_the_district/food/plat_pizza_peperoni.jpg", 4, "Yes"
    ),
    (
        12, "Pizza hawaienne", "Laissez-vous transporter vers des rivages ensoleillés avec notre Pizza Hawaïenne, une fusion exotique de saveurs tropicales qui éveillera vos sens à chaque bouchée. Sur une base de pâte à pizza fraîchement préparée, légère et dorée, se marient des ingrédients soigneusement sélectionnés pour créer une expérience culinaire inoubliable.", 14.00, "Assets/images_the_district/food/plat_pizza_hawai.jpg", 4, "Yes"
    ),
    (
        14, "Epaule d'Agneau braisée aux Herbes", "Plongez dans un festin de saveurs méditerranéennes avec notre épaule d'agneau braisée aux herbes, un plat réconfortant qui éveillera vos sens et éblouira vos convives. Préparée avec soin et amour, cette pièce d'agneau tendre et juteuse est imprégnée d'un mélange d'herbes fraîches et d'épices parfumées, offrant une explosion de saveurs à chaque bouchée.", 12.00, "Assets/images_the_district/food/plat_carnivore_agneau.jpg", 9, "Yes"
    ),
    (
        16, "Roti de boeuf aux Herbes", "Découvrez l'exquisité de notre Rôti de Bœuf aux Herbes, un plat qui incarne l'élégance et la simplicité de la cuisine traditionnelle. Ce rôti de bœuf est soigneusement sélectionné, assaisonné avec un mélange d'herbes fraîches et rôti lentement pour révéler toute sa tendreté et son arôme délicieux.", 14.00, "Assets/images_the_district/food/plat_carnivore_roti.jpg", 9, "Yes"
    ),
    (
        18, 'Steak Frites', 'Dégustez notre savoureux steak accompagné de frites croustillantes. Un classique réconfortant qui ravira vos papilles à chaque bouchée.', 15.00, 'Assets/images_the_district/food/plat_carnivore_steak.jpg', 9, 'Yes'
    ),
    (
        20, 'Pennes aux Poulet', 'Savourez nos délicieuses pennes accompagnées de tendres morceaux de poulet grillé, le tout enrobé d une sauce tomate maison et saupoudré de parmesan frais. Un plat réconfortant qui saura satisfaire toutes les papilles.', 14.50, 'Assets/images_the_district/food/plat_pasta_pennepoulet.jpg', 10, 'Yes'
    ),
    (
        22, 'Tagliatelles à la Sauce Tomate', 'Dégustez nos tagliatelles fraîches nappées d une délicieuse sauce tomate maison, relevée d herbes fraîches et d ail. Un plat italien classique qui vous transportera directement en Méditerranée.', 13.50, 'Assets/images_the_district/food/plat_pasta_tagliatelle.jpg', 10, 'Yes'
    ),
    (
        24, 'Spaghetti à la Sauce Tomate', 'Savourez nos spaghettis al dente enrobés d une sauce tomate maison, préparée avec des tomates mûries au soleil, de l ail, de l huile d olive et des herbes fraîches. Un plat simple mais délicieusement réconfortant.', 12.00, 'Assets/images_the_district/food/plat_pasta_spaghetti.jpg', 10, 'Yes'
    ),
    (
        26, "classic Salade", "Dégustez notre salade fraîche et croquante composée de laitue iceberg, de tomates juteuses, de concombres frais, de carottes râpées et de tranches d'oignon rouge. Accompagnée d'une vinaigrette maison légère et parfumée, cette salade est le choix parfait pour une entrée rafraîchissante ou un plat léger.", 11.00, "Assets/images_the_district/food/plat_salade_classic.jpg", 11, "Yes"
    ),
    (
        28, "Salade au Saumon", "Savourez notre délicieuse salade au saumon, un mélange équilibré de laitue croquante, d'épinards frais, de concombres tranchés, d'oignons rouges et de tomates cerises, accompagné de morceaux de saumon grillé ou fumé. Garnie de câpres et de quartiers de citron pour une touche de fraîcheur, cette salade est sublimée par une vinaigrette à l'aneth maison.", 13.00, "Assets/images_the_district/food/plat_salade_saumon.jpg", 11, "Yes"
    ),
    (
        30, "Salade au Poulet", "Dégustez notre savoureuse salade au poulet, composée de laitue croquante, de tomates juteuses, de concombres frais, d'avocat crémeux, de maïs doux, et de tranches d'oignon rouge, le tout agrémenté de morceaux de poulet grillé et assaisonné. Accompagnée d'une vinaigrette maison légère et parfumée, cette salade est un choix délicieux et équilibré pour un repas satisfaisant.", 14.00, "Assets/images_the_district/food/plat_salade_poulet.jpg", 11, "Yes"
    ),
    (
        32, "Sushis saumon", "Savourez nos délicieux sushis au saumon, préparés avec du riz vinaigré et des tranches de saumon frais, roulés dans de l'algue nori. Chaque bouchée offre un équilibre parfait entre le riz tendre et le saumon fondant, accompagné de wasabi et de sauce soja pour une expérience gustative authentique.", 12.00, "Assets/images_the_district/food/plat_sushi_saumon.jpg", 12, "Yes"
    ),
    (
        34, "Sushis Assortis", "Découvrez notre sélection d'exquis sushis assortis, préparés avec du riz vinaigré et une variété de garnitures savoureuses telles que le saumon, le thon, l'avocat, le concombre, et bien plus encore. Chaque bouchée offre une explosion de saveurs et une expérience culinaire authentique.", 15.00, "Assets/images_the_district/food/plat_sushi_sushi.jpg", 12, "Yes"
    ),
    (
        36, "Ramen", "Dégustez nos délicieux ramen, un plat japonais réconfortant composé de nouilles fraîches, d'un bouillon savoureux et d'une variété d'ingrédients tels que des tranches de porc, des œufs mollets, des légumes frais et des algues nori. Chaque bol est une explosion de saveurs et une expérience culinaire inoubliable.", 14.00, "Assets/images_the_district/food/plat_sushi_ramen.jpg", 12, "Yes"
    ),
    (
        38, "'Sandwich au Poulet", "Dégustez notre délicieux sandwich au poulet, composé de blancs de poulet grillés, de laitue croquante, de tomates juteuses et de mayonnaise, le tout enveloppé dans du pain moelleux et doré. Un classique réconfortant qui saura satisfaire vos papilles.", 10.00, "Assets/images_the_district/food/plat_sandwich_poulet.jpg", 13, "Yes"
    ),
    (
        40, "Tartine avocat", "Dégustez notre savoureuse tartine à l'avocat, garnie de tranches d'avocat mûr, de tomates cerises, de jeunes pousses d'épinards, et d'une touche de sel et de poivre. Servie sur du pain grillé, cette tartine est un choix délicieusement léger pour une pause déjeuner ou une collation.", 9.00, "Assets/images_the_district/food/plat_sandwich_tartine.jpg", 13, "Yes"
    ),
    (
        42, "Wrap", "Dégustez notre délicieux wrap au poulet, garni de blancs de poulet grillés, de laitue croquante, de tomates fraîches, de fromage râpé et de sauce ranch, le tout enveloppé dans une tortilla de blé moelleuse. Un repas rapide et savoureux pour combler vos envies.", 11.00, "Assets/images_the_district/food/plat_sandwich_wrap.jpg", 13, "Yes"
    ),
    (
        44, "Pavé de saumon grillé", "Savourez notre délicieux pavé de saumon grillé, servi avec un accompagnement de votre choix. Le saumon est grillé à la perfection, offrant une texture tendre et savoureuse, avec une légère caramélisation à l'extérieur. Un choix parfait pour les amateurs de fruits de mer.", 18.00, "Assets/images_the_district/food/plat_poisson_saumon.jpg", 14, "Yes"
    ),
    (
        46, "Filet de merlu Grillé", "Dégustez notre succulent filet de merlu grillé, accompagné d'une garniture de saison. Le merlu est grillé à la perfection, offrant une chair tendre et délicate, avec des arômes subtils de la mer. Un choix parfait pour les amateurs de poisson.", 16.00, "Assets/images_the_district/food/plat_poisson_merlu.jpg", 14, "Yes"
    ),
    (
        48, "Fish & Chips", "Dégustez notre délicieux fish & chips, composé de filets de poisson frais, enrobés d'une pâte croustillante et dorée, accompagnés de frites fraîchement préparées. Servi avec une sauce tartare maison et une tranche de citron, ce plat emblématique de la cuisine britannique est un régal pour les amateurs de fruits de mer.", 14.00, "Assets/images_the_district/food/plat_poisson_fish&chips.jpg", 14, "Yes"
    ),
    (
        50, "Plateau d'assortiment Partager", "Découvrez notre plateau de charcuterie à partager, garni d'une sélection de délices salés tels que du jambon cru, du saucisson, des terrines, des cornichons, des olives et du fromage. Accompagné de pain frais et de condiments, ce plateau est parfait pour partager un moment convivial entre amis ou en famille.", 18.00, "Assets/images_the_district/food/plat_partage_assortiment.jpg", 16, "Yes"
    ),
    (
        52, "Assiette de Charcuterie", "Savourez notre délicieuse assiette de charcuterie, garnie d'une sélection variée de spécialités charcutières telles que du jambon cru, du saucisson, du pâté, des rillettes et des cornichons. Un assortiment généreux de saveurs salées, parfait pour les amateurs de charcuterie.", 16.00, "Assets/images_the_district/food/plat_partage_charcuterie.jpg", 16, "Yes"
    );
--
-- Structure de la table `utilisateur`
--
CREATE TABLE `utilisateur` (
    `id` int AUTO_INCREMENT PRIMARY KEY, `nom_prenom` varchar(100) NOT NULL, `email` varchar(100) NOT NULL, `password` varchar(255) NOT NULL
);

INSERT INTO
    `utilisateur` (
        `id`, `nom_prenom`, `email`, `password`
    )
values (
        1, 'Alice Johnson', 'alice@example.com', '$2y$10$6am1aelazku8Ish9Uoqk4eGm9Wc/xv6GTl2xf19anc.emYa4JWcDq'
    ),
    (
        2, 'Bob Smith', 'bob@example.com', '$2y$10$6am1aelazku8Ish9Uoqk4eGm9Wc/xv6GTl2xf19anc.emYa4JWcDq'
    ),
    (
        3, 'Emily Brown', 'emily@example.com', '$2y$10$6am1aelazku8Ish9Uoqk4eGm9Wc/xv6GTl2xf19anc.emYa4JWcDq'
    ),
    (
        4, 'David Wilson', 'david@example.com', '$2y$10$6am1aelazku8Ish9Uoqk4eGm9Wc/xv6GTl2xf19anc.emYa4JWcDq'
    ),
    (
        5, 'Sophia Martiniez', 'sophia@example.com', '$2y$10$6am1aelazku8Ish9Uoqk4eGm9Wc/xv6GTl2xf19anc.emYa4JWcDq'
    ),
    (
        6, 'Michael Johnson', 'michael@example.com', '$2y$10$6am1aelazku8Ish9Uoqk4eGm9Wc/xv6GTl2xf19anc.emYa4JWcDq'
    ),
    (
        7, 'Jessica Miller', 'jessica@example.com', '$2y$10$6am1aelazku8Ish9Uoqk4eGm9Wc/xv6GTl2xf19anc.emYa4JWcDq'
    ),
    (
        8, 'Daniel Davis', 'daniel@example.com', '$2y$10$6am1aelazku8Ish9Uoqk4eGm9Wc/xv6GTl2xf19anc.emYa4JWcDq'
    ),
    (
        9, 'Olivia Wilson', 'olivia@example.com', '$2y$10$6am1aelazku8Ish9Uoqk4eGm9Wc/xv6GTl2xf19anc.emYa4JWcDq'
    ),
    (
        10, 'James Taylor', 'james@example.com', '$2y$10$6am1aelazku8Ish9Uoqk4eGm9Wc/xv6GTl2xf19anc.emYa4JWcDq'
    ),
    (
        11, 'Emma Garcia', 'emma@example.com', '$2y$10$6am1aelazku8Ish9Uoqk4eGm9Wc/xv6GTl2xf19anc.emYa4JWcDq'
    ),
    (
        12, 'Willian Clark', 'willian@example.com', '$2y$10$6am1aelazku8Ish9Uoqk4eGm9Wc/xv6GTl2xf19anc.emYa4JWcDq'
    );
--
-- Structure de la table `commande`
--
CREATE TABLE `commande` (
    `id` int AUTO_INCREMENT PRIMARY KEY, `id_plat` int NOT NULL REFERENCES plat (id), `id_utilisateur` int NOT NULL REFERENCES `utilisateur` (id), `quantite` int NOT NULL, `total` decimal(10, 2) NOT NULL, `date_commande` datetime NOT NULL, `etat` varchar(50) NOT NULL, `nom_client` varchar(150) NOT NULL, `telephone_client` varchar(20) NOT NULL, `email_client` varchar(150) NOT NULL, `adresse_client` varchar(255) NOT NULL
);

INSERT INTO
    `commande` (
        id_utilisateur, `id_plat`, `quantite`, `total`, `date_commande`, `etat`, `nom_client`, `telephone_client`, `email_client`, `adresse_client`
    )
VALUES (
        1, 2, 3, "36.00", '2024-03-04 08:30:00', "En attente de traitement", "Alice Johnson", "7894561230", "alice@example.com", "123 Main Street"
    ),
    (
        2, 4, 2, "26.00", '2024-03-04 09:15:00', "En cours de livraison", "Bob Smith", "7418529630", "bob@example.com", "456 Elm Street"
    ),
    (
        3, 8, 1, "15.00", '2024-03-04 10:00:00', "Livrée", "Emily Brown", "7458963210", "emily@example.com", "789 Oak Avenue"
    ),
    (
        4, 12, 3, "42.00", '2024-03-04 11:45:00', "En attente de confirmation", "David Wilson", "7485963210", "david@example.com", "963 Pine Street"
    ),
    (
        5, 20, 2, "29.00", '2024-03-04 13:20:00', "En cours de préparation", "Sophia Martinez", "7412589630", "sophia@example.com", "258 Cedar Street"
    ),
    (
        6, 6, 4, "56.00", '2024-03-04 14:10:00', "En attente de traitement", "Michael Johnson", "7894569630", "michael@example.com", "753 Maple Street"
    ),
    (
        7, 14, 2, "12.00", '2024-03-04 15:05:00', "En cours de livraison", "Jessica Miller", "7458963210", "jessica@example.com", "852 Walnut Street"
    ),
    (
        8, 16, 1, "14.00", '2024-03-04 16:30:00', "Livrée", "Daniel Davis", "7485963210", "daniel@example.com", "369 Pine Street"
    ),
    (
        9, 22, 3, "40.50", '2024-03-04 17:20:00', "En attente de confirmation", "Olivia Wilson", "7412589630", "olivia@example.com", "963 Cedar Street"
    ),
    (
        10, 24, 2, "24.00", '2024-03-04 18:45:00', "En cours de préparation", "James Taylor", "7894569630", "james@example.com", "753 Maple Street"
    ),
    (
        11, 10, 2, "24.00", '2024-03-04 19:30:00', "Annulée", "Emma Garcia", "7412589630", "emma@example.com", "963 Oak Street"
    ),
    (
        12, 26, 1, "14.00", '2024-03-04 20:15:00', "Annulée", "William Clark", "7894569630", "william@example.com", "753 Pine Street"
    );

-- -- Script permettant d'ajouté une nouvelle catégorie et un plat dans cette catégorie

-- INSERT INTO `categorie` (`id`,`libelle`, `image`, `active`) VALUES
-- (15,"Glaces", "Assets/images_the_district/category/pizza_glaces.jpg", "Yes");

-- INSERT INTO `plat` (`id`,`libelle`, `description`, `prix`, `image`, `id_categorie`, `active`) VALUES
-- (23,"Glace Choco", "Glaces hyper basique xD.", 8.00, "Assets/images_the_district/food/hamburger.jpg", 15, "Yes");