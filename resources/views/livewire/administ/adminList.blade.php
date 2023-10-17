<div class="row p-4 pt-5">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-dark d-flex align-items-center">
                <h3 class="card-title flex-grow-1 "><i class="fas fa-clients fa-2x"></i>Liste des demandes</h3>

                <dsiv class="card-tools d-flex align-items-center">
                    <a href="#" class="btn btn-link text-white mr-4 d-block" wire:click.prevent="goToAddClient()"><i class="fas fa-client-plus"></i>faire une demande</a>
                    <div class="input-group input-group-md" style="width: 250px;">
                        <input type="text" name="table_search" class="form-control float-right" wire:model.debounce="search" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 300px;">
            <table class="table table-head-fixed text-nowrap">
                <thead>
                    <tr>
                        <th style="width:5%;"></th>
                        <th style="width: 25%;">Clients</th>
                        <th style="width: 20%;">Roles</th>
                        <th style="width: 2%;">dateNaissance</th>
                        <th style="width: 20%;">lieuNaissance</th>
                        <th style="width: 20%;">nationnalite</th>
                        <th style="width: 20%;">ville</th>
                        <th style="width: 20%;">pays</th>
                        <th style="width: 20%;">adresse</th>
                        <th style="width: 20%;">statut</th>
                        <th style="width: 20%;">choixDuLogement</th>
                        <th style="width: 20%;">telephone1</th>
                        <th style="width: 20%;">email</th>
                        <th style="width: 20%;">telephone2</th>
                        <th style="width: 20%;">pieceIdentite</th>
                        <th style="width: 20%;">noPieceIdentite</th>
                        <th style="width: 20%;" class="text-center">Ajouté</th>
                        <th style="width: 30%;" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clients as $client )

                    <tr>
                        <td>
                            @if( $client->sexe == "F")<img src="{{asset('img/woman.png')}}" width="24" />

                            @else
                            <img src="{{asset('img/groom.png')}}" width="24" />

                            @endif
                        </td>
                        <td>{{$client->prenom}} {{$client->nom}} </td>
                        <td>------------</td>
                        <td>{{$client->dateNaissance}}</td>
                        <td>{{$client->lieuNaissance}}</td>
                        <td>{{$client->nationalite}}</td>
                        <td>{{$client->ville}}</td>
                        <td>{{$client->pays}}</td>
                        <td>{{$client->adresse}}</td>
                        <td>{{$client->statut}}</td>
                        <td>{{$client->choixDuLogement}}</td>
                        <td>{{$client->telephone1}}</td>
                        <td>{{$client->email}}</td>
                        <td>{{$client->telephone2}}</td>
                        <td>{{$client->pieceIdentite}}</td>
                        <td>{{$client->noPieceIdentite}}</td>

                        <td colspan="18" class="text-center"><span class="tag tag-success">{{\Carbon\Carbon::parse($client['created_at'])->diffForHumans() }}</span>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-link"><i class="far fa-edit"></i></button>
                            <button class="btn btn-link"><i class="far fa-trash-alt"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer bg-dark">
            <div class="float-right">
                {{ $clients->links() }}
            </div>
        </div>
    </div>
    <!-- /.card -->
</div>
</div>