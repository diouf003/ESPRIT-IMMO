<div class="modal fade" id="editModalProp" style="z-index: 1900;" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-dialog modal-xl" style="top: 100px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edition Propriété
                </h5>

            </div>
            <div class="modal-body" style="background: blue;">
                <!-- div pour tableau static-->
                <!-- div formulaire-->
                <div class="d-flex my-4 bg-gray-light p-3">
                    <div class="d-flex flex-grow-1 mr-2">
                        <div class="flex-grow-1 mr-2">
                            <input type="text" placeholder="Nom" wire:model="editPropModel.nomPropriete"
                                class="form-control @error('editPropModel.nomPropriete') is-invalid @enderror">
                            @error("editPropModel.nomPropriete")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="flex-grow-1">
                            <select class="form-control @error('editPropModel.estObligatoire') is-invalid @enderror"
                                wire:model="editPropModel.estObligatoire">
                                <option value="">--Champ Obligatoire--</option>
                                <option value="1">OUI</option>
                                <option value="0">NON</option>
                            </select>
                            @error("editPropModel.estObligatoire")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <button style="color: white; background:blue;" wire:click="updateProp()">Confirmer</button>
                    </div>
                </div>
                <!-- table-->



            </div>
            <div class="modal-footer">
                <button type="button" style="color: red; background:black;" wire:click="closeEditModal">Fermer</button>

            </div>
        </div>
    </div>
</div>