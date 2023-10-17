<div class="row p-4 pt-5">
    <div class="col-md-6">

        <div class="card card-primary">
            <div class="card-header bg-dark">
                <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire d'édition client!
                </h3>
            </div>


            <form role="form" wire:submit.prevent="updateClient()">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">

                            <label>Nom</label>
                            <input type="text" wire:model="editClient.nom"
                                class="form-control @error('editClient.nom') is-invalid @enderror">

                            @error("editClient.nom")
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror


                        </div>



                        <div class="form-group flex-grow-1">
                            <label>Prenom</label>
                            <input type="text" wire:model="editClient.prenom"
                                class="form-control @error('editClient.prenom') is-invalid @enderror">

                            @error("editClient.prenom")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group">
                        <label>Sexe</label>
                        <select class="form-control @error('editClient.sexe') is-invalid @enderror"
                            wire:model="editClient.sexe">
                            <option value="">----------</option>
                            <option value="H">Homme</option>
                            <option value="F">Femme</option>
                        </select>

                        @error("editClient.sexe")

                        <span class="text-danger"> {{$message}} </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Date de naissance</label>
                        <input type="date" class="form-control @error('editClient.dateNaissance') @enderror"
                            wire:model="editClient.dateNaissance">

                        @error("editClient.dateNaissance")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Lieu de naissance</label>
                        <input type="text" class="form-control @error('editClient.lieuNaissance') @enderror"
                            wire:model="editClient.lieuNaissance">

                        @error("editClient.lieuNaissance")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label>Nationalite</label>
                        <input type="text" class="form-control @error('editClient.nationalite') @enderror"
                            wire:model="editClient.nationalite">

                        @error("editClient.nationalite")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Adresse e-mail</label>
                        <input type="email" class="form-control @error('editClient.email') @enderror"
                            wire:model="editClient.email">

                        @error("editClient.email")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Pays</label>
                        <input type="text" class="form-control @error('editClient.pays') @enderror"
                            wire:model="editClient.pays">

                        @error("editClient.pays")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Ville</label>
                        <input type="text" class="form-control @error('editClient.ville') @enderror"
                            wire:model="editClient.ville">

                        @error("editClient.ville")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Adresse</label>
                        <input type="text" class="form-control @error('editClient.ville') @enderror"
                            wire:model="editClient.adresse">

                        @error("editClient.adresse")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Statut</label>
                        <select class="form-control @error('editClient.statut') is-invalid @enderror"
                            wire:model="editClient.statut">
                            <option value="">----------</option>
                            <option value="CELIBATAIRE">CELIBATAIRE</option>
                            <option value="MARIE">MARIE</option>
                        </select>

                        @error("editClient.statut")

                        <span class="text-danger"> {{$message}} </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Choix</label>
                        <select class="form-control @error('editClient.choixDuLogement') is-invalid @enderror"
                            wire:model="editClient.choixDuLogement">
                            <option value="">----------</option>
                            <option value="Appartement">Appartement</option>
                            <option value="Maison">Maison</option>
                            <option value="Maison">Maison</option>
                            <option value="Studio">Studio</option>
                            <option value="Chalet">Chalet</option>
                            <option value="Maison Simple">Maison Simple</option>
                            <option value="Chambre Simple">Chambre Simple</option>
                            <option value="Chambre Salle de bain">Chambre Salle de bain</option>
                        </select>

                        @error("editClient.choixDuLogement")

                        <span class="text-danger"> {{$message}} </span>
                        @enderror
                    </div>

                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label>Telephone1</label>
                            <input type="numeric" class="form-control   @error('editClient.telephone1') @enderror"
                                wire:model="editClient.telephone1">

                            @error("editClient.telephone1")
                            <span class="text-primary"> {{ $message}}</span>
                            @enderror
                        </div>



                        <div class="form-group flex-grow-1">
                            <label>Telephone2</label>
                            <input type="numeric" class="form-control" wire:model="editClient.telephone2">
                        </div>

                    </div>

                    <div class="from-group">
                        <label for="">Piece d'identité</label>
                        <select class="form-control  @error('editClient.pieceIdentite') @enderror"
                            wire:model="editClient.pieceIdentite">
                            <option value="">----------</option>
                            <option value="CNI">CNI</option>
                            <option value="PASSPORT">PASSPORT</option>
                            <option value="PERMIS DE CONDUIRE">PERMIS DE CONDUIRE</option>
                        </select>

                        @error("editClient.pieceIdentite")
                        <span class="text-primary">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group ">
                        <label>Numero piece d'identite</label>
                        <input type="text" class="form-control @error('editClient.noPieceIdentite') @enderror"
                            wire:model="editClient.noPieceIdentite">

                        @error("editClient.noPieceIdentite")
                        <SPan class="text-primary">{{ $message }}</SPan>
                        @enderror
                    </div>



                </div>

                <div class="card-footer">
                    <button type="submit" class="btn bg-dark">Appliquer les Modifications</button>
                    <button type="button" wire:click="goToListClient()" class="btn btn-danger">Retour</button>
                </div>
            </form>
        </div>


    </div>
    <!-- double colone -->

</div>