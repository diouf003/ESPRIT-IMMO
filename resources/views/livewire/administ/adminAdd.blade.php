<div class="row p-4 pt-5">
    <div class="col-md-6">

        <div class="card card-primary">
            <div class="card-header bg-dark">
                <h3 class="card-title"><i class="fa fa-id-badge fa-2x"></i> Formulaire de demande de logement!
                </h3>
            </div>


            <form role="form" wire:submit.prevent="addClient()">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">

                            <label>Nom</label>
                            <input type="text" wire:model="addClient.nom" class="form-control @error('addClient.nom') is-invalid @enderror">

                            @error("addClient.nom")
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror


                        </div>



                        <div class="form-group flex-grow-1">
                            <label>Prenom</label>
                            <input type="text" wire:model="addClient.prenom" class="form-control @error('addClient.prenom') is-invalid @enderror">

                            @error("addClient.prenom")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group">
                        <label>Sexe</label>
                        <select class="form-control @error('addClient.sexe') is-invalid @enderror" wire:model="addClient.sexe">
                            <option value="">----------</option>
                            <option value="H">Homme</option>
                            <option value="F">Femme</option>
                        </select>

                        @error("addClient.sexe")

                        <span class="text-danger"> {{$message}} </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Date de naissance</label>
                        <input type="date" class="form-control @error('addClient.dateNaissance') @enderror" wire:model="addClient.dateNaissance">

                        @error("addClient.dateNaissance")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Lieu de naissance</label>
                        <input type="text" class="form-control @error('addClient.lieuNaissance') @enderror" wire:model="addClient.lieuNaissance">

                        @error("addClient.lieuNaissance")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label>Nationalite</label>
                        <input type="text" class="form-control @error('addClient.nationalite') @enderror" wire:model="addClient.nationalite">

                        @error("addClient.nationalite")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Adresse e-mail</label>
                        <input type="email" class="form-control @error('addClient.email') @enderror" wire:model="addClient.email">

                        @error("addClient.email")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Pays</label>
                        <input type="text" class="form-control @error('addClient.pays') @enderror" wire:model="addClient.pays">

                        @error("addClient.pays")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Ville</label>
                        <input type="text" class="form-control @error('addClient.ville') @enderror" wire:model="addClient.ville">

                        @error("addClient.ville")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Adresse</label>
                        <input type="text" class="form-control @error('addClient.ville') @enderror" wire:model="addClient.adresse">

                        @error("addClient.adresse")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Statut</label>
                        <select class="form-control @error('addClient.statut') is-invalid @enderror" wire:model="addClient.statut">
                            <option value="">----------</option>
                            <option value="CELIBATAIRE">CELIBATAIRE</option>
                            <option value="MARIE">MARIE</option>
                        </select>

                        @error("addClient.statut")

                        <span class="text-danger"> {{$message}} </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Choix</label>
                        <select class="form-control @error('addClient.choixDuLogement') is-invalid @enderror" wire:model="addClient.choixDuLogement">
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

                        @error("addClient.choixDuLogement")

                        <span class="text-danger"> {{$message}} </span>
                        @enderror
                    </div>

                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label>Telephone1</label>
                            <input type="numeric" class="form-control   @error('addClient.telephone1') @enderror" wire:model="addClient.telephone1">

                            @error("addClient.telephone1")
                            <span class="text-primary"> {{ $message}}</span>
                            @enderror
                        </div>



                        <div class="form-group flex-grow-1">
                            <label>Telephone2</label>
                            <input type="numeric" class="form-control" wire:model="addClient.telephone2">
                        </div>

                    </div>

                    <div class="from-group">
                        <label for="">Piece d'identité</label>
                        <select class="form-control  @error('addClient.pieceIdentite') @enderror" wire:model="addClient.pieceIdentite">
                            <option value="">----------</option>
                            <option value="CNI">CNI</option>
                            <option value="PASSPORT">PASSPORT</option>
                            <option value="PERMIS DE CONDUIRE">PERMIS DE CONDUIRE</option>
                        </select>

                        @error("addClient.pieceIdentite")
                        <span class="text-primary">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group ">
                        <label>Numero piece d'identite</label>
                        <input type="text" class="form-control @error('addClient.noPieceIdentite') @enderror" wire:model="addClient.noPieceIdentite">

                        @error("addClient.noPieceIdentite")
                        <SPan class="text-primary">{{ $message }}</SPan>
                        @enderror
                    </div>



                </div>

                <div class="card-footer">
                    <button type="submit" class="btn bg-dark">Envoyer la demande</button>
                    <button type="button" wire:click="goToListClient()" class="btn btn-danger">Retour</button>
                </div>
            </form>
        </div>


    </div>
    <!-- double colone -->

</div>