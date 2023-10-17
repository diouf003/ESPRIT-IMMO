<div class="row p-4 pt-5 ">
    <div class="col-12 ">
        <div class="card ">
            <div class="card-header  d-flex align-items-center" style="background-color:blue; color:white">
                <h3 class="card-title flex-grow-1 "><i class="fa fa-list fa-2x"></i>Tarification - {{$article->nom}}
                </h3>

                <div class="card-tools d-flex align-items-center ">
                    <a href="{{route('admin.gestarticles.articles')}}" class="btn btn-link text-white mr-4 d-block"><i class="fas fa-long-arrow-alt-left"></i>Retourner vers la liste</a>

                    <a href="#" class="btn btn-link btn-db text-white mr-4 d-block" wire:click="nouveauTarif"><i class="fas fa-user-plus"></i>Nouveau Tarif</a>

                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                @if($isAddTarif)
                <div class="p-4">
                    <div>
                        <div class="form-group">
                            <select wire:model="newTarif.duree_location_id" class="form-control @error('newTarif.duree_location_id')
                            
                            is-invalid

                            @enderror">
                                <option value="" selected> Choisissez la duree du logement</option>

                                @foreach($dureeLocations as $duree )
                                <option value="{{$duree->id}}">{{$duree->libelle}}</option>
                                @endforeach
                            </select>

                            @error('newTarif.duree_location_id')

                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control @error('newTarif.prix')    is-invalid

                            @enderror" wire:model="newTarif.prix">

                            @error('newTarif.prix')

                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>

                    <div>

                        <button class="btn btn-link" wire:click="saveTarif"><i class="fa fa-check">
                            </i>Valider</button>

                        <button class="btn btn-link" wire:click="cancel"><i class="fa fa-cancal"></i>Annuler</button>
                    </div>

                </div>
                @endif

                <div style="height: 350px;">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Durée Logement</th>
                                <th>Description</th>
                                <th class="text-center">Prix</th>
                                <!---->
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>


                            @forelse($tarifs as $tarif)

                            <tr>
                                <td>{{++$loop->index}}</td>
                                <td>{{ $tarif->dureeLocation->libelle }}</td>
                                <td>{{ $tarif->description}}</td>
                                <td class="text-center">{{ $tarif->prixForHumans }}</td>

                                <td class="text-center">
                                    <button wire:click="editTarif({{$tarif->id}})" class="btn btn-link"><i class="far fa-edit bg-dark"></i></button>

                                </td>
                            </tr>



                            @empty
                            <tr>
                                <td colspan="6">

                                    <div class="alert alert-info ">

                                        <h5><i class="icon fas fa-ban"></i> Information!</h5>
                                        Cet logement ne dispose pas encore de tarifs. désolé
                                    </div>
                                </td>
                            </tr>
                            @endforelse



                        </tbody>

                    </table>
                </div>
            </div>

        </div>
        <!-- /.card -->
    </div>
</div>