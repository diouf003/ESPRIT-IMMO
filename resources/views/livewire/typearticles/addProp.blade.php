<!-- Ajout de mon Modal!-->
<div class="modal fade" id="modalProp" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header " style="background: blue; color:white">
                <h5 class="modal-title">Gestion des caractéristiques de "{{optional($selectedTypeArticle)->nom}}"
                </h5>

            </div>
            <div class="modal-body">
                <!-- div pour tableau static-->
                <!-- div formulaire-->
                <div class="d-flex my-4 bg-gray-light p-3">
                    <div class="d-flex flex-grow-1 mr-2">
                        <div class="flex-grow-1 mr-2">
                            <input type="text" placeholder="Nom" wire:model="newPropModel.nomPropriete"
                                class="form-control @error('newPropModel.nomPropriete') is-invalid @enderror">
                            @error("newPropModel.nomPropriete")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="flex-grow-1">
                            <select class="form-control @error('newPropModel.estObligatoire') is-invalid @enderror"
                                wire:model="newPropModel.estObligatoire">
                                <option value="">--Champ Obligatoire--</option>
                                <option value="1">OUI</option>
                                <option value="0">NON</option>
                            </select>
                            @error("newPropModel.estObligatoire")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <button style="color: white; background:blue; color:white"
                            wire:click="addProp()">Ajouter</button>
                    </div>
                </div>
                <!-- table-->
                <table class="table table-bordered">
                    <thead class="" style="background: blue; color:white">
                        <th>nom</th>
                        <th>est Obligatoire</th>
                        <th>Action</th>
                    </thead>
                    <tbody>

                        @forelse($proprietesTypeArticles as $prop)
                        <tr>
                            <td>{{$prop->nomPropriete}}</td>
                            <td>{{$prop->estObligatoire == 0 ? "NON": "OUI"}}</td>
                            <td>
                                <button class="btn btn-link" wire:click="editProp({{$prop->id}})"><i
                                        class="far fa-edit"></i></button>

                                @if(count($prop->articles)==0)
                                <button class="btn btn-link"
                                    wire:click="showDeletePrompt('{{$prop->nomPropriete}}', {{$prop->id}})"><i
                                        class="far fa-trash-alt"></i></button>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3">
                                <span class="text-info">Vous n'avez pas des proprietes définies pour ce type
                                    de logement</span>
                            </td>
                        </tr>
                        @endforelse

                    </tbody>

                </table>


            </div>
            <div class="modal-footer" style="background: blue; color:white">
                <button type="button" style="color: white; background:blue;" wire:click="closeModal">Fermer</button>

            </div>
        </div>
    </div>
</div>
<!-- End Ajout de mon Modal!-->