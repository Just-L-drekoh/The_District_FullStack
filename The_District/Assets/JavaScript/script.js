$(document).ready(function () {


    //      Description De l'enseigne The District      //

    const description_thedistrict = $('#presentation_district_page');
    const description_title = $('<h2>').text("The District");
    const description_text = $('<p>').text("Bienvenue dans notre restaurant chic, où le luxe rencontre la gastronomie pour offrir une expérience culinaire incomparable. Niché au cœur de la ville, notre établissement vous invite à découvrir un monde de saveurs raffinées et d'élégance intemporelle Dès que vous franchissez nos portes, vous serez transporté dans un univers de sophistication et de charme. Notre ambiance sophistiquée et chaleureuse crée un cadre idéal pour une soirée mémorable, que ce soit pour une rencontre d'affaires, un dîner romantique ou une célébration spéciale.");


    const description_salle = $('#presentation_salle');
    const description_text_salle = $('<p>').text("Bienvenue dans notre élégante salle de restaurant & bar, un espace raffiné où l'ambiance chaleureuse rencontre le charme contemporain. Dès que vous franchissez nos portes, vous êtes accueilli par une atmosphère invitante, où la convivialité et le confort se marient harmonieusement. La salle de restaurant, baignée dans une lumière douce et tamisée, est aménagée avec goût pour offrir une expérience gastronomique inoubliable. Des tables joliment dressées, des chaises confortables et des touches de décoration soigneusement sélectionnées créent une ambiance accueillante et sophistiquée. Les grandes fenêtres laissent entrer la lumière naturelle et offrent une vue pittoresque sur l'extérieur, créant ainsi un cadre enchanteur pour vos repas.");


    description_thedistrict.append(description_title, description_text);
    description_salle.append(description_text_salle);



    //  Description De la page Categorie   (categorie.php)     //

    const categorie_thedistrict = $('#presentation_categorie_page');
    const title_cat_thedistrict = $('<h2>').text("Découvrez nos Catégories");
    const description_cat_thedistrict = $('<p>').text("Plongez dans un monde de délices culinaires avec notre panel de catégories de plats gastronomiques, conçu pour satisfaire les palais les plus exigeants et les amateurs de bonne cuisine. Chaque catégorie représente une facette unique de notre offre gastronomique, alliant savoir-faire artisanal, ingrédients de qualité supérieure et créativité culinaire. Que vous soyez à la recherche de plats traditionnels revisités ou de créations audacieuses, notre panel de catégories vous guide à travers une expérience culinaire incomparable.");


    categorie_thedistrict.append(title_cat_thedistrict, description_cat_thedistrict);



    //  Description De la page plat   (plat.php)     //

    const plats_thedistrict = $('#presentation_plats_page');
    const title_plats_thedistrict = $('<h2>').text("Découvrez nos Plats A la Carte");
    const description_plats_thedistrict = $('<p>').text("Bienvenue dans notre univers culinaire où chaque plat raconte une histoire de saveurs exquises et d'ingrédients soigneusement sélectionnés. Explorez notre menu varié, conçu pour satisfaire toutes les envies gastronomiques, des classiques intemporels aux créations audacieuses. Plongez dans un monde de délices avec nos entrées fraîches et appétissantes, parfaites pour démarrer votre expérience culinaire avec éclat. Poursuivez votre voyage gustatif avec nos plats principaux, où chaque bouchée est une fusion de textures et de goûts harmonieux. Que vous soyez adepte de viande, de poisson ou de plats végétariens, notre menu offre une sélection diversifiée pour combler tous les palais.");


    plats_thedistrict.append(title_plats_thedistrict, description_plats_thedistrict);

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    // fonction expresion regulière

    function isValidLastName(lastname) {
        return /^[a-zA-Z]+$/.test(lastname);
    }


    function isValidFirstName(firstname) {
        return /^[a-zA-Z]+$/.test(firstname);
    }



    function isValidEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }

    function isValidPhoneNumber(phoneNumber) {
        return /^\d{10}$/.test(phoneNumber);
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //  Verification JavaScript /Jquery de la commande     //


    $("#Form_Commande_Validate").submit(function (event) {
        event.preventDefault();


        let isValid = true;


        const lastname = $("#lastname").val().trim();
        const error_lastname = $("#error_lastname");

        if (lastname === "") {
            error_lastname.html("<p class='error'>Entrez un nom valide.</p>");
            isValid = false;
        } else {
            error_lastname.html("");
        }


        const firstname = $("#firstname").val().trim();
        const error_firstname = $("#error_firstname");

        if (firstname === "") {
            error_firstname.html("<p class='error'>Entrez un prénom valide.</p>");
            isValid = false;
        } else {
            error_firstname.html("");
        }


        const adress = $("#adress").val().trim();
        const error_adress = $("#error_adress");

        if (adress === "") {
            error_adress.html("<p class='error'>Veuillez entrez une Adresse Valide.</p>");
            isValid = false;
        } else {
            error_adress.html("");
        }

        // Phone Check
        const phone = $("#phone").val().trim();
        const error_phone = $("#error_phone");

        if (phone === "" || !isValidPhoneNumber(phone)) {
            error_phone.html("<p class='error'>Veuillez saisir un téléphone valide (10 chiffres).</p>");
            isValid = false; // Met à false si la validation échoue
        } else {
            error_phone.html("");
        }

        // Si toutes les validations passent, vous pouvez soumettre le formulaire
        if (isValid) {
            this.submit();
        }
    });





    //  Verification Contact    //


    $("#FormValidate").submit(function (event) {
        event.preventDefault();


        let isValid = true;


        const lastname = $("#lastname");
        const error_lastname = $("#error_lastname");

        if ($(lastname).val().trim() === "" || !isValidLastName($(lastname).val())) {
            $(error_lastname).html("<p class=error>Entrez un nom valide Uniquement des lettres.</p>");
            isValid = false;
        } else {
            $(error_lastname).html("");
        }


        const firstname = $("#firstname");
        const error_firstname = $("#error_firstname");

        if ($(firstname).val().trim() === "" || !isValidFirstName($(firstname).val())) {
            $(error_firstname).html("<p class=error>Entrez un prénom valide Uniquement des lettres.</p>");
            isValid = false;
        } else {
            $(error_firstname).html("");
        }

        // Email Check
        const email = $("#email");
        const error_email = $("#error_email");

        if ($(email).val().trim() === "" || !isValidEmail($(email).val())) {
            $(error_email).html("<p class=error>Veuillez saisir une adresse mail valide.</p>");
            isValid = false;
        } else {
            $(error_email).html("");
        }

        // Phone Check
        const phone = $("#phone");
        const error_phone = $("#error_phone");

        if ($(phone).val().trim() === "" || !isValidPhoneNumber($(phone).val())) {
            $(error_phone).html("<p class=error>Veuillez saisir téléphone valide (10chiffres).</p>");
            isValid = false; // Met à false si la validation échoue
        } else {
            $(error_phone).html("");
        }

        // Request Check
        const request = $("#demande");
        const error_request = $("#error_request");

        if ($(request).val().trim() === "") {
            $(error_request).html("<p class=error >Veuillez saisir votre demande.</p>");
            isValid = false; // Met à false si la validation échoue
        } else {
            $(error_request).html("");
        }

        // Si toutes les validations passent, vous pouvez soumettre le formulaire
        if (isValid) {
            $(this).unbind('submit').submit();
            this.reset();
        }
    });


    // Function Check to input





    // Validation Formulaire de la page login

    $("#loginForm").submit(function (event) {
        event.preventDefault(); // Empêche la soumission du formulaire par défaut

        // Initialisation de la variable pour garder une trace de l'état de validation
        let isValid = true;

        const email = $("#email");
        const email_error = $("#error_form_email");

        if ($(email).val().trim() === "" || !isValidEmail($(email).val())) {
            $(email_error).html("Veuillez entrer une adresse e-mail valide.");
            isValid = false; // Met à false si la validation échoue
        } else {
            $(email_error).html(""); // Efface le message d'erreur s'il n'y a pas d'erreur
        }

        const password = $("#password");
        const password_error = $("#error_form_password");

        if ($(password).val().trim() === "") {
            $(password_error).html("Veuillez entrer votre mot de passe.");
            isValid = false; // Met à false si la validation échoue
        } else {
            $(password_error).html(""); // Efface le message d'erreur s'il n'y a pas d'erreur
        }

        // Si toutes les validations passent, vous pouvez soumettre le formulaire
        if (isValid) {
            this.submit();
        }
    });


    // Validation de la page Inscription

    $("#inscriptionForm").submit(function (event) {
        event.preventDefault(); // Empêche la soumission du formulaire par défaut

        // Initialisation de la variable pour garder une trace de l'état de validation
        let isValid = true;

        const name = $("#name");
        const name_error = ('#error_form_name');

        if ($(name).val().trim() === "" || !isValidFirstName($(name).val())) {
            $(name_error).html("Veuillez entrer une adresse e-mail valide.");
            isValid = false; // Met à false si la validation échoue
        } else {
            $(name_error).html(""); // Efface le message d'erreur s'il n'y a pas d'erreur
        }



        const email = $("#email");
        const email_error = $("#error_form_email");

        if ($(email).val().trim() === "" || !isValidEmail($(email).val())) {
            $(email_error).html("Veuillez entrer une adresse e-mail valide.");
            isValid = false; // Met à false si la validation échoue
        } else {
            $(email_error).html(""); // Efface le message d'erreur s'il n'y a pas d'erreur
        }

        const password = $("#password");
        const password_error = $("#error_form_password");

        if ($(password).val().trim() === "") {
            $(password_error).html("Veuillez entrer votre mot de passe.");
            isValid = false; // Met à false si la validation échoue
        } else {
            $(password_error).html(""); // Efface le message d'erreur s'il n'y a pas d'erreur
        }

        // Si toutes les validations passent, vous pouvez soumettre le formulaire
        if (isValid) {
            this.submit();
        }
    });




});
