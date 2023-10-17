<!-- Ajout de mon Modal!-->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title">Edition d'un logement
                </h5>

            </div>
            <form wire:submit.prevent="updateArticle">
                <div class="modal-body">
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
                                <input type="text" wire:model="editArticle.nom" class="form-control" placeholder="nom">
                            </div>
                            <div class="form-group">
                                <label for="">Lieu</label>
                                <input type="text" wire:model="editArticle.noSerie" class="form-control"
                                    placeholder="NoSerie">
                            </div>
                            <div class="form-group">
                                <label for="">Type</label>
                                <select id="filtreEtat" class="form-control" wire:model="editArticle.types_article_id">
                                    <option value="{{$editArticle['types_article_id']}}">
                                        {{$editArticle['types_article']['nom']}}
                                    </option>
                                </select>
                            </div>

                            <!--Les champs dynamique qui seront crées par rapport au type selectionné-->

                            @if($editArticle["article_propriete"] != [])
                            <p>***************************************************</p>
                            <div class="my-3 bg-gray-light">

                                @foreach($editArticle["article_propriete"] as $index => $articlePopriete)
                                <div class="form-group">
                                    <label for="">
                                        {{$articlePopriete["nomPropriete"]}}
                                        @if(!nomPropriete["estObligatoire"]) (optionel) @endif

                                    </label>


                                    <input type="text" wire:model="editArticle.article_propriete.{{$index}}.nom"
                                        class="form-control">
                                </div>
                                @endforeach
                            </div>
                            @endif

                        </div>

                        <div class="flex-grow-1 p-4">
                            <div class="form-control">
                                <input type="file" wire:model="editPhoto" id="image{{$inputEditFileIterator}}">
                            </div>



                            <div style=" border : 1px solid #d0d1d3; border-radius: 20px; height: 400px; width: 700px;
                                    overflow:hidden;">

                                @if(isset($editPhoto))

                                <img src="{{$editPhoto->temporaryUrl() }}" style="height: 400px; width: 700px;">
                                @else
                                <img src="{{asset($editArticle['imageUrl'])}}" style="height: 400px; width: 700px;">

                                @endif

                            </div>
                            @isset($editPhoto)

                            <div>
                                <button type="button" class="btn btn-default btn-sm mt-2"
                                    wire:click="$set('editPhoto', null)">réinitialiser</button>
                            </div>
                            @endisset

                        </div>

                    </div>


                    <!-- table-->



                </div>
                <div class="modal-footer bg-dark">

                    <div>
                        @if($editHasChanged)
                        <button type="submit" style="color: red; background:black;">Valider la modification</button>

                        @endif
                    </div>

                    <button type="button" style="color: white; background:black;"
                        wire:click="closeEditModal">Fermer</button>

                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Ajout de mon Modal!-->