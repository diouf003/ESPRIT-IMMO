<!DOCTYPE html>
<html>

<head>
    <title>Page d'accueil</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-NZ9ZjojzV7w/9neW4ynUy5nQ9zoC4EzLR04J5I3lg4zJoV8ETyu1N9vHBz0F/E+koVyJiEZvQ+o/WA16q2Yg2w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        /* Ajoutez ces styles directement dans la balise <style> de l'en-tête */
        .image-container {
            text-align: center;
            /* Centrer horizontalement */
        }

        .image-container img {
            border: 2px solid blue;
            /* Ajouter un cadre autour des images */
            margin: 10px;
            /* Espacement entre les images */
            width: 100%;
            /* Prendre toute la largeur disponible */
            max-width: 400px;
            /* Limitez la largeur maximale des images */
            transition: transform 0.3s ease-in-out;
        }

        .image-container img:hover {
            transform: scale(1.1);
        }

        .image-caption {
            font-size: 18px;
            /* Taille de police des sous-titres */
            opacity: 0;
            /* Masquer les sous-titres par défaut */
            transition: opacity 0.5s ease-in-out;
            /* Animation de transition pour les sous-titres */
            text-align: center;
            /* Centrer le texte horizontalement */
        }

        .image-container:hover .image-caption {
            opacity: 1;
            /* Afficher les sous-titres au survol */
        }

        h1 {
            text-align: center;
            font-size: 36px;
            /* Taille de police du titre */
            animation: increaseSize 1s ease-in-out;
        }

        @keyframes increaseSize {
            from {
                font-size: 20px;
            }

            to {
                font-size: 36px;
            }
        }

        /* Ajoutez cette classe pour afficher les images horizontalement */
        .horizontal-images {
            display: flex;
            justify-content: space-between;
            /* Espacement égal entre les images */
            align-items: center;
            /* Centrer verticalement les images */
        }

        /* Ajoutez cette classe pour espacer les éléments div contenant les images */
        .image-container {
            margin-right: 20px;
            /* Espacement à droite entre les images */
        }

        /* Animation pour les images */
        .image-container img {
            animation: fadeIn 3s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body style="background-color: blue; margin: 0; padding: 0;">
    <header style="background-color: white; display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0%;">
        <img src="img/fd2.jpg" alt="" class="logo" style="width: 120px; cursor: pointer; padding: 10px;" />
        <!-- Menu de navigation -->
        <nav style="display: flex; text-align: right;
            justify-content: space-between;
            align-items: center;
            text-align: right;
            flex-wrap: wrap;
            padding: 5px 0; width: 40px;
            cursor: pointer; width: 38%; text-align: right;">
            <ul style="display: flex;
                justify-content: flex-end;
                flex: 1;
                padding-right: 40px;
                list-style: none; padding: 0">
                <li style="margin-right: 10px; background-color: white; color: blue;"><a style="position: relative;padding: 10px; text-decoration: none; font-size: 20px;" href="#">Accueil</a></li>
                <li style="margin-right: 10px;background-color:white; color:blue;"><a style="position: relative;padding: 10px; text-decoration: none; font-size: 20px" href="{{route('home')}}">Se
                        connecter</a></li>
                <li style="margin-right: 10px;background-color:white; color:blue;"><a style="position: relative;padding: 10px; text-decoration: none; font-size: 20px" href="{{route('inscription.form')}}">S'inscrire</a></li>
                <li style="margin-right: 10px;background-color:white; color:blue;"><a style="position: relative;padding: 10px; text-decoration: none; font-size: 20px" href="#">Contact</a></li>
                <!-- Ajoutez d'autres éléments de menu ici -->
            </ul>
        </nav>
    </header>
    <h1 style="font-size: 90px; color:white;">Bienvenue dans la gestion des logements au Sénégal</h1>

    <main>
        <!-- Arrière-plan -->
        <div class="background-image" style="background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center; padding: 20px; background-position-y: 35px; flex-grow: 1;">

            <!-- Contenu principal de la page -->
            <section>
                <!-- Encadrez et positionnez horizontalement les images -->
                <div class="image-container">
                    <h1 style="color:white">Nos types de logements</h1>
                    <div class="horizontal-images">
                        <div>
                            <img src="{{ asset('img/fd1.jpg') }}" alt="Image 1">
                            <div style="color:white" class="image-caption">APPARTEMENT</div>
                        </div>
                        <div>
                            <img src="{{ asset('img/fd1.jpg') }}" alt="Image 2">
                            <div style="color:white" class="image-caption">STUDIO</div>
                        </div>
                        <div>
                            <img src="{{ asset('img/fd1.jpg') }}" alt="Image 3">
                            <div style="color:white" class="image-caption">CHAMBRE SALLE DE BAIN</div>
                        </div>
                        <div>
                            <img src="{{ asset('img/fd1.jpg') }}" alt="Image 4">
                            <div style="color:white" class="image-caption">CHAMBRE</div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <footer style="background-color: white; color: blue; text-align: center; padding: 20px;">
        <!-- Informations de contact sous forme d'icônes -->
        <p>&copy; 2023 ESPRIT IMMO</p>
        <p>Adresse : 123, POUT, THIES</p>

        <p>Téléphone : +221 77 531 03 61</p>
        <p>Email : dioufe@gmail.com</p>
    </footer>


    <script>
        // Fonction pour afficher/masquer le formulaire
        function toggleInscriptionForm() {
            var form = document.getElementById("inscription-form");
            if (form.style.display === "none") {
                form.style.display = "block";
            } else {
                form.style.display = "none";
            }
        }

        // Associez la fonction au bouton "S'inscrire"
        var inscrireButton = document.querySelector('a[href="#inscription-form"]');
        inscrireButton.addEventListener("click", toggleInscriptionForm);
    </script>


</body>

</html>