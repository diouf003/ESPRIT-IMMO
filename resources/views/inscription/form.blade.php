<!DOCTYPE html>
<html>

<head>
    <title>Formulaire d'inscription</title>
    <style>
    body {
        font-family: Arial, sans-serif;
    }

    h1 {
        text-align: center;
    }

    form {
        width: 300px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="email"],
    textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    textarea {
        resize: none;
    }

    input[type="submit"] {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }
    </style>
</head>

<body style="background-color:white;">
    <h1 style="color:blue">Formulaire d'inscription</h1>

    <form action="{{route('inscription.form')}}" method="GET" onsubmit="return validateForm()">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom">

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom">

        <label for="email">Email :</label>
        <input type="email" id="email" name="email">

        <label for="message">Message :</label>
        <textarea id="message" name="message" rows="4" cols="50"></textarea>

        <input type="submit" value="Envoyer">
        <button style=" background-color:#007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;background-color: #999;" onclick="window.history.back()">Retour</button>


        <script>
        function validateForm() {
            var nom = document.getElementById('nom').value;
            var prenom = document.getElementById('prenom').value;
            var email = document.getElementById('email').value;
            var message = document.getElementById('message').value;

            if (nom === "" || prenom === "" || email === "" || message === "") {
                alert("Veuillez remplir tous les champs du formulaire.");
                return false;
            }

            return true;
        }
        </script>
    </form>

</body>

</html>