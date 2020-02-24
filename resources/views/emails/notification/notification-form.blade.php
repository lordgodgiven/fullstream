@component('mail::message')
    **CONFIRMATION DE CRÉATION DE COMPTE**

    {{$data['civilite']}} **{{$data['nom'] .''.$data['prenom']}}**
    Votre compte utilisateur en tant que **{{$data['type_compte']}}** a été crée avec succès, ceci est un mail de confirmation.
    Prochaine étape, création et soumission de votre dossier.

    Cordialement.
    **{{ config('app.name') }}**
@endcomponent
