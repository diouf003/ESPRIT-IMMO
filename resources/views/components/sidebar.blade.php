<aside class="control-sidebar control-sidebar-dark" style="background-color:white;">

    <div class="bg-dark">
        <div class="card-body  box-profile" style="background-color:white;">
            <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="{{asset('img/user.png')}}" alt="User profile picture">
            </div>
            <h3 style="color: black;" class="profile-username text-center ellipsis">{{userFullName()}}</h3>
            <p class="text-muted text-center">{{getRolesName()}}</p>
            <ul class="list-group mb-3" style="background-color:white;">
                <li class="list-group-item">
                    <a href="#" class="d-flex align-items-center"><i class="fa fa-lock pr-2"></i><b>Mot de
                            passe</b></a>

                </li>
                <li class="list-group-item">
                    <a href="#" class="d-flex align-items-center"><i class="fa fa-user pr-2"></i><b>Mon Profile
                        </b></a>

                </li>

            </ul>

            <a class="btn btn-primary btn-block bg-dark" style=" color:black" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                Déconnexion
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>

    </div>
</aside>