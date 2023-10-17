<div class="row p-4 pt-5 ">
    <div class="col-12 ">
        <div class="card ">
            <div class="card-header d-flex align-items-center" style="background: blue; color:white">
                <h3 class="card-title flex-grow-1 "><i class="fa fa-list fa-2x"></i>Liste des logements
                </h3>

                <div class="card-tools d-flex align-items-center ">
                    <a href="#" class="btn btn-link text-white mr-4 d-block"><i></i></a>
                    <div class="input-group input-group-md" style="width: 250px;">
                        <input type="text" name="table_search" wire:model.debounce="search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <div class="d-flex justify-content-end p-4 bg-aliceblue">
                    <div class="form-group mr-3 ">
                        <label for="filtreType"> Filtrer par type</label>
                        <select id="filtreType" wire:model="filtreType" class="form-control">
                            <option value=""></option>
                            @foreach( $typearticles as $typearticle)
                            <option value="{{$typearticle->id}}">{{$typearticle->nom}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="filtreEtat"> Filtrer par etat</label>
                        <select id="filtreEtat" wire:model="filtreEtat" class="form-control">
                            <option value=""></option>
                            <option value="1">Disponible</option>
                            <option value="0">Non Disponible</option>
                        </select>
                    </div>
                </div>
                <div style="height: 350px;">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Logement- lieu</th>
                                <th class="text-center">Logement</th>
                                <th class="text-center">Etat</th>
                                <th class="text-center">Ajouté</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>


                            @forelse($articles as $article)
                            <tr>
                                <td>

                                    <img src="{{asset($article->imageUrl)}}" alt="" style="width: 60px; height: 60px;">



                                </td>
                                <td>{{ $article->nom }} - {{ $article->noSerie }}</td>
                                <td class="text-center">{{ $article->nom }}</td>
                                <td class="text-center">
                                    @if($article->estDisponible)
                                    <span class="badge badge-success">Disponible</span>
                                    @else
                                    <span class="badge badge-danger">Non Disponible</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    {{\Carbon\Carbon::parse($article['created_at'])->diffForHumans() }}
                                </td>
                                <td class="text-center">
                                    <a title="Tarifs {{$article->nom}}" href="{{route('admin.gestarticles.articles.tarifs', ['articleId'=> $article->id]) }}" class="btn btn-link"><i></i></a>

                                    <button class="btn btn-link"><i></i></button>

                                    <button class="btn btn-link"><i></i></button>

                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6">

                                    <div class="alert alert-info ">

                                        <h5><i class="icon fas fa-ban"></i> Information!</h5>
                                        Aucun élément trouvée pour la recherche
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer " style="background: blue; color:white">
                <div class="float-right">
                    {{ $articles->links() }}
                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>