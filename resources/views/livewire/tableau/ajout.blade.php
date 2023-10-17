<!-- Ajout de mon Modal!-->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title">Ajout d'un logement
                </h5>

            </div>
            <form wire:submit.prevent="ajouterArticle">
                <div class="modal-body ">
                    <!-- div pour tableau static-->
                    <!-- div formulaire-->

                    <div class="d-flex">
                        <div class="my-4 bg-gray-light p-3 flex-grow-1">
                            @if($errors->any())

                            <div class="alert alert-info ">

                                <h5><i class="icon fas fa-ban"></i> Erreur!</h5>
                                <ul>
                                    @foreach($errors->all() as $error)
                                    <li>
                                        {{$error}}
                                    </li>
                                    @endforeach
                                </ul>

                            </div>
                            @endif
                            <div class="form-group">

                                <label for="">Nom</label>
                                <input type="text" wire:model="addArticle.nom" class="form-control" placeholder="nom">
                            </div>
                            <div class="form-group">
                                <label for="">Lieu</label>
                                <input type="text" wire:model="addArticle.noSerie" class="form-control"
                                    placeholder="NoSerie">
                            </div>
                            <div class="form-group">
                                <label for="">Type</label>
                                <select id="filtreEtat" class="form-control" wire:model="addArticle.type">
                                    <option value=""></option>
                                    @foreach( $typearticles as $typearticle)
                                    <option value="{{$typearticle->id}}">{{$typearticle->nom}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!--Les champs dynamique qui seront crées par rapport au type selectionné-->

                            @if($proprietesArticles != null)
                            <p>***************************************************</p>
                            <div class="my-3 bg-gray-light">

                                @foreach($proprietesArticles as $propriete)
                                <div class="form-group">
                                    <label for="">
                                        {{$propriete->nomPropriete}}
                                        @if(!$propriete->estObligatoire) (optionel) @endif

                                    </label>

                                    @php

                                    $field = "addArticle.prop.".$propriete->nomPropriete;

                                    @endphp
                                    <input type="text" wire:model="{{ $field}}" class="form-control">
                                </div>
                                @endforeach
                            </div>
                            @endif

                        </div>

                        <div class="flex-grow-1 p-4">
                            <div class="form-control">
                                <input type="file" wire:model="addPhoto" id="image{{$inputFileIterator}}">
                            </div>
                            <div
                                style="border : 1px solid #d0d1d3; border-radius: 20px; height: 400px; width: 700px; overflow:hidden;">

                                @if($addPhoto)

                                <img src="{{$addPhoto->temporaryUrl() }}" style="height: 400px; width: 700px;">

                                @endif

                            </div>

                        </div>

                    </div>


                    <!-- table-->



                </div>
                <div class="modal-footer bg-dark">
                    <button type="submit" style="color: white; background:black;">Ajouter</button>
                    <button type="button" style="color: white; background:black;"
                        wire:click="closeModal">Fermer</button>

                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Ajout de mon Modal!-->