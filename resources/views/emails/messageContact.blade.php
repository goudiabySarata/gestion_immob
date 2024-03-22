<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nouveau message pour un bien immobilier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f8f9fa;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        h2 {
            color: #007bff;
            text-align: center;
        }
        h3 {
            color: #333;
        }
        p {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2 class="text-center">Nouveau message de contact :</h2>

    <div class="alert alert-info">
        <p>
            <strong>Bien en question :</strong>
            <a href="{{route('bien.show', ['slug' => $bien->getSlug(), 'bien' => $bien])}}">{{ $bien->titre }}</a>
        </p>
        <h5>De la part de :</h5>
        <p><strong>Prénom :</strong> {{ $data['prenom'] }}</p>
        <p><strong>Nom :</strong> {{ $data['nom'] }}</p>
        <p><strong>Téléphone :</strong> {{ $data['telephone'] }}</p>
        <p><strong>Email :</strong> {{ $data['email'] }}</p>

        <h3>Message :</h3>
        <p>{{ $data['message'] }}</p>
    </div>
</div>
</body>
</html>
