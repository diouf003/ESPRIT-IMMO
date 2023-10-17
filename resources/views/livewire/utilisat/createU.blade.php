<div class="row p-4 pt-5">
    <div class="col-md-6">

        <div class="card card-primary">
            <div class="card-header bg-dark">
                <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Veuillez remplir les champs
                </h3>
            </div>


            <form role="form" wire:submit.prevent="newLog()">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label>Nom</label>
                            <input type="text" wire:model="newLog.nom"
                                class="form-control @error('newLog.nom') is-invalid @enderror">

                            @error("newLog.nom")
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror


                        </div>



                        <div class="form-group flex-grow-1">
                            <label>Prenom</label>
                            <input type="text" wire:model="newLog.prenom"
                                class="form-control @error('newLog.prenom') is-invalid @enderror">

                            @error("newLog.prenom")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="d-flex">

                        <div class="form-group flex grow-1 mr-2">
                            <label>Sexe</label>
                            <select class="form-control @error('newLog.sexe') is-invalid @enderror"
                                wire:model="newLog.sexe">
                                <option value="">----------</option>
                                <option value="H">Homme</option>
                                <option value="F">Femme</option>
                            </select>

                            @error("newLog.sexe")

                            <span class="text-danger"> {{$message}} </span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label>Date Naissance</label>
                            <input type="date" wire:model="newLog.dateNaissance"
                                class="form-control @error('newLog.dateNaissance') is-invalid @enderror">

                            @error("newLog.dateNaissance")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label>Nationalite</label>
                            <input type="text" wire:model="newLog.nationalite"
                                class="form-control @error('newLog.nationalite') is-invalid @enderror">

                            @error("newLog.nationalite")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group flex-grow-1">
                            <label>Ville</label>
                            <input type="text" wire:model="newLog.ville"
                                class="form-control @error('newLog.ville') is-invalid @enderror">

                            @error("newLog.ville")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label>Pays</label>
                            <input type="text" wire:model="newLog.pays"
                                class="form-control @error('newLog.pays') is-invalid @enderror">

                            @error("newLog.pays")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label>Adresse</label>
                            <input type="text" wire:model="newLog.adresse"
                                class="form-control @error('newLog.adresse') is-invalid @enderror">

                            @error("newLog.adresse")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label>Statut</label>
                            <select class="form-control @error('newLog.statut') is-invalid @enderror"
                                wire:model="newLog.statut">
                                <option value="">----------</option>
                                <option value="CELIBATAIRE">CELIBATAIRE</option>
                                <option value="MARIE">MARIE</option>
                            </select>

                            @error("newLog.statut")

                            <span class="text-danger"> {{$message}} </span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label>Choix</label>
                            <select class="form-control @error('newLog.choixDuLogement') is-invalid @enderror"
                                wire:model="newLog.choixDuLogement">
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

                            @error("newLog.choixDuLogement")

                            <span class="text-danger"> {{$message}} </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Adresse e-mail</label>
                        <input type="email" class="form-control @error('newLog.email') @enderror"
                            wire:model="newLog.email">

                        @error("newLog.email")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label>Telephone1</label>
                            <input type="numeric" class="form-control   @error('newLog.telephone1') @enderror"
                                wire:model="newLog.telephone1">

                            @error("newLog.telephone1")
                            <span class="text-primary"> {{ $message}}</span>
                            @enderror
                        </div>



                        <div class="form-group flex-grow-1">
                            <label>Telephone2</label>
                            <input type="numeric" class="form-control" wire:model="newLog.telephone2">
                        </div>

                    </div>

                    <div class="d-flex">
                        <div class="from-group flex-grow-1 mr-2 ">
                            <label for="">Piece d'identité</label>
                            <select class="form-control  @error('newLog.pieceIdentite') @enderror"
                                wire:model="newLog.pieceIdentite">
                                <option value="">----------</option>
                                <option value="CNI">CNI</option>
                                <option value="PASSPORT">PASSPORT</option>
                                <option value="PERMIS DE CONDUIRE">PERMIS DE CONDUIRE</option>
                            </select>

                            @error("newLog.pieceIdentite")
                            <span class="text-primary">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="from-groupflex-grow-1">
                            <label>Numero piece d'identite</label>
                            <input type="text" class="form-control @error('newLog.noPieceIdentite') @enderror"
                                wire:model="newLog.noPieceIdentite">

                            @error("newLog.noPieceIdentite")
                            <SPan class="text-primary">{{ $message }}</SPan>
                            @enderror
                        </div>


                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mot de passe</label>
                        <input type="password" class="form-control" desabled placeholder="Password">
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn bg-dark">Envoyer</button>
                    <button type="button" wire:click="goToListUser()" class="btn btn-danger">Retour</button>
                </div>
            </form>
        </div>


    </div>
</div>