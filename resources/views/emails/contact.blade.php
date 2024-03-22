<x-mail::message>
# Nouveau message pour un bien immobilier

Une nouvelle demande de contact a été faite pour le bien <a href="{{ route('show', ['slug' => $bien->getSlug(), 'bien' => $bien]) }}">{{ $bien->titre }}</a>
- Prénom: {{$data['prenom'] }} <br>
- Nom: {{$data['nom']}} <br>
- Téléphone: {{$data['telephone'] }} <br>
- Email: {{$data['email'] }} <br>
**Message :** <br>
{{$data['message'] }}

</x-mail::message>
