<nav class="mt-2" style="position: fixed; background-color:white;">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item">
            <a href="{{route('home')}}" class="nav-link {{ setMenuActive('home') }} ">
                <i class="nav-icon fas fa-home"></i>
                <p style="color: black;">Accueil</p>
            </a>

        </li>
        <!--manager-->
        @can("proprietaire")
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p style="color: black;">
                    Tableau de bord
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="#" class="nav-link-active">
                        <i class="nav-icon fas fa-chart-line"></i>
                        <p style="color: black;">Vue global</p>
                    </a>

                </li>
                <li class="nav-item">
                    <a href="{{route('adPro.voirPaiement')}}" class="nav-link">
                        <i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>
                        <p style="color: black;">Paiement</p>
                    </a>

                </li>
                <li class="nav-item">
                    <a href="{{route('info.inf')}}" class="nav-link">
                        <i class="fa fa-info" aria-hidden="true"></i>
                        <p style="color: black;">Infos</p>
                    </a>

                </li>

            </ul>

        </li>
        @endcan

        @can("admin")

        <li class="nav-item {{ setMenuClass('admin.habilitations.', 'menu-open') }}">
            <a href="#" class="nav-link  {{ setMenuClass('admin.habilitations.', 'active') }}">
                <i class="nav-icon fas fa-user-shield"></i>
                <p style="color: black;">
                    Habilitations
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('admin.habilitations.users.index')}}" class="nav-link {{setMenuActive('admin.habilitations.users.index')}}">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p style="color: black;">Locataires</p>
                    </a>

                </li>

                <!--<li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-fingerprint"></i>
                        <p>Roles et Permissions</p>
                    </a>

                </li> -->



            </ul>

        </li>
        <!-- on le fais com habilitation-->
        <li class="nav-item {{ setMenuClass('admin.gestarticles.', 'menu-open') }}">
            <a href="#" class="nav-link {{ setMenuClass('admin.gestarticles.', 'active') }}">
                <i class="nav-icon fas fa-cogs"></i>
                <p style="color: black;">
                    Gestion des logements
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('admin.gestarticles.articles')}}" class="nav-link {{setMenuActive('admin.gestarticles.articles')}}">
                        <i class="nav-icon fas fa-list-ul"></i>
                        <p style="color: black;">Logement</p>
                    </a>

                </li>

                <!-- -->
                <li class="nav-item">
                    <a href="{{route('admin.gestarticles.types')}}" class="nav-link {{setMenuActive('admin.gestarticles.types')}}">
                        <i class="nav-icon fas fa-circle"></i>
                        <p style="color: black;">Type de logement</p>
                    </a>

                </li>


                <li class="nav-item">
                    <a href="{{route('addclient.afficherClients')}}" class="nav-link {{setMenuActive('addclient.afficherClients')}}">
                        <i class="fa fa-book fa-fw" aria-hidden="true"></i>
                        <p style="color: black;"> demandes</p>
                    </a>

                </li>

                <!--<li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-sliders-h"></i>
                        <p>Tarifications</p>
                    </a>

                </li> -->


            </ul>

        </li>
        @endcan
        <!---->
        @can("locataire")
        <li class="nav-header">LOCATION</li>
        <li class="nav-item">
            <a href="{{route('locataire.clients.index')}}" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p style="color: black;">Gestion des clients</p>
            </a>

        </li>
        <li class="nav-item">
            <a href="{{route('locataire.tableau.index')}}" class="nav-link">
                <i class="nav-icon fas fa-exchange-alt"></i>
                <p style="color: black;">Gestion des locations</p>
            </a>

        </li>


        <li class="nav-header">CAISSE</li>
        <li class="nav-item">
            <a href="{{route('reponses.voirDemandes')}}" class="nav-link">
                <i class="nav-icon fas fa-coins"></i>
                <p style="color: black;">Gestion des paiements</p>
            </a>

        </li>
        @endcan
    </ul>
</nav>