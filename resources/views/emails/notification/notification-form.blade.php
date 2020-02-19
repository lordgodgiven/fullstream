@component('mail::message')
    # Confirmation de création de compte pour:

    Mr     :<strong>{{$data['nom'] .''.$data['prenom']}}</strong>
    E-mail :<strong>{{$data['email']}}</strong>

    Merci,<br>
    {{ config('app.name') }}
@endcomponent
