<div class="profile clearfix">
    <div class="profile_pic">
        <img src="{{ asset('images/user.png') }}" alt="..." class="img-circle profile_img">
    </div>
    <div class="profile_info">
        <span>Bienvenu,</span>
        <h2>{{Auth::user()->prenom. ' ' .Auth::user()->nom}}</h2>
    </div>
</div>
