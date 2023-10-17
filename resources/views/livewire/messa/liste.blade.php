<div class="row p-4 pt-5">
    <div class="col-12">
        <div class="card" style="background: blue; color:white">
            <div class="card-header d-flex align-items-center">
                <h3 class="card-title flex-grow-1 "><i class="fas fa-users fa-2x"></i>Liste des Locataires</h3>

                <dsiv class="card-tools d-flex align-items-center">
                    <a href="#" class="btn btn-link text-white mr-4 d-block" wire:click.prevent="goToAddReponse()"><i
                            class="nav-icon fas fa-coins"></i> Paiement</a>
                    <div class="input-group input-group-md" style="width: 250px;">
                        <input type="text" name="table_search" class="form-control float-right"
                            wire:model.debounce="search" placeholder="Search">

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
                        <th style="width: 25%;">listes</th>
                        <th style="width: 20%;">-------------</th>
                        <th style="width: 20%;" class="text-center">Ajouté</th>
                        <th style="width: 30%;" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reponses as $reponse )

                    <tr>
                        <td>
                            @if( $reponse->sexe == "F")<img src="{{asset('img/woman.png')}}" width="24" />

                            @else
                            <img src="{{asset('img/groom.png')}}" width="24" />

                            @endif
                        </td>
                        <td>{{$reponse->prenom}} {{$reponse->nom}} </td>
                        <td>------------</td>
                        <td class="text-center"><span
                                class="tag tag-success">{{\Carbon\Carbon::parse($reponse['created_at'])->diffForHumans() }}</span>
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
        <div class="card-footer " style="background: blue; color:white">
            <div class="float-right">
                {{ $reponses->links() }}
            </div>
        </div>
    </div>
    <!-- /.card -->
</div>
</div>