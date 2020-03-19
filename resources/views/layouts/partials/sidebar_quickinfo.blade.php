<div class="profile clearfix">
    <div class="profile_pic">
        @if (auth()->user()->image)
            <img src="{{ asset(auth()->user()->image) }}"
                 alt="Cliquer pour changer l'image" class="img-circle profile_img"
                 title="Cliquer pour changer l'image">
        @else
            <img src="{{ asset('images/user.png') }}"
                 alt="Image profil" class="img-circle profile_img">
        @endif
    </div>
    <div class="profile_info">
        <span>Bienvenu,</span>
        <h2>{{Auth::user()->prenom. ' ' .Auth::user()->nom}}</h2>
    </div>
</div>
