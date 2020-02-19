<div class="sidebar-footer hidden-small">
    <a data-toggle="tooltip" data-placement="top" title="Parametres" href="{{route('administration.home')}}">
        <i class="fa fa-cog"></i>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Plein écran">

        <i class="fa fa-expand"></i>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Vérrouillage">
        <i class="fa fa-lock"></i>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Déconnexion" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
        <i class="fa fa-power-off"></i>
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>
