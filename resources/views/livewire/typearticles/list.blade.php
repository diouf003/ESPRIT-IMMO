<div class="row p-4 pt-5">
    <div class="col-12 ">
        <div class="card ">
            <div class="card-header  d-flex align-items-center" style="background: blue; color:white">
                <h3 class="card-title flex-grow-1 "><i class="fa fa-list fa-2x"></i>Liste des types de logement</h3>

                <div class="card-tools d-flex align-items-center">
                    <a href="#" class="btn btn-link text-white mr-4 d-block"
                        wire:click="toggleShowAddTypeArticleForm"><i class="nav-icon fas fa-circle"></i>Nouveau type de
                        logement</a>
                    <div class="input-group input-group-md" style="width: 250px;">
                        <input type="text" name="table_search" wire:model.debounce="search"
                            class="form-control float-right" placeholder="Search">

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
                            <th style="width: 50%;">Type de logement</th>
                            <th style="width: 20%;" class="text-center">Ajouté</th>
                            <th style="width: 30%;" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--test pour isAddTypeArticle-->
                        @if($isAddTypeArticle)
                        <tr>
                            <td colspan="2">
                                <input type="text" wire:keydown.enter="addNewTypeArticle"
                                    class="form-control @error('newTypeArticleName') is-invalid @enderror"
                                    wire:model="newTypeArticleName">

                                @error('newTypeArticleName')
                                <span class="text-danger">{{$message}}</span>

                                @enderror
                            </td>

                            <td class="text-center">
                                <button class="btn btn-link" wire:click="addNewTypeArticle"><i class="fa fa-check">
                                    </i>Valider</button>

                                <button class="btn btn-link" wire:click="toggleShowAddTypeArticleForm"><i
                                        class="fa fa-cancal"></i>Annuler</button>
                            </td>
                        </tr>
                        @endif

                        @foreach($typearticles as $typearticle)
                        <tr>
                            <td>{{ $typearticle->nom }}</td>
                            <td class="text-center">
                                {{\Carbon\Carbon::parse($typearticle['created_at'])->diffForHumans() }}
                            </td>
                            <td class="text-center">
                                <button class="btn btn-link" wire:click="editTypeArticle({{ $typearticle->id }})"><i
                                        class="far fa-edit bg-dark"></i></button>

                                <button class="btn btn-link" wire:click="showProp({{$typearticle->id}})"><i
                                        class="fa fa-list bg-black"></i> <span
                                        style="color: bisque;">proprietes</span></button>

                                @if(count($typearticle->articles)==0)
                                <button class="btn btn-link"
                                    wire:click="confirmDelete('{{$typearticle->nom}}', {{$typearticle->id}})"><i
                                        class="far fa-trash-alt"></i></button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer " style="background: blue; color:white">
                <div class="float-right">
                    {{ $typearticles->links() }}
                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>