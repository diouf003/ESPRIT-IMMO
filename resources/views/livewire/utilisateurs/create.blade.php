<div class="row p-4 pt-5">
    <div class="col-md-6">

        <div class="card card-primary">
            <div class="card-header" style="background-color:blue; color:white">
                <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Ajout d'un locataire
                </h3>
            </div>


            <form role="form" wire:submit.prevent="addUser()">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label>Nom</label>
                            <input type="text" wire:model="newUser.name"
                                class="form-control @error('newUser.name') is-invalid @enderror">

                            @error("newUser.name")
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror


                        </div>



                        <div class="form-group flex-grow-1">
                            <label>Prenom</label>
                            <input type="text" wire:model="newUser.prenom"
                                class="form-control @error('newUser.prenom') is-invalid @enderror">

                            @error("newUser.prenom")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group">
                        <label>Sexe</label>
                        <select class="form-control @error('newUser.sexe') is-invalid @enderror"
                            wire:model="newUser.sexe">
                            <option value="">----------</option>
                            <option value="H">Homme</option>
                            <option value="F">Femme</option>
                        </select>

                        @error("newUser.sexe")

                        <span class="text-danger"> {{$message}} </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Adresse e-mail</label>
                        <input type="email" class="form-control @error('newUser.email') @enderror"
                            wire:model="newUser.email">

                        @error("newUser.email")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label>Telephone1</label>
                            <input type="numeric" class="form-control   @error('newUser.telephone1') @enderror"
                                wire:model="newUser.telephone1">

                            @error("newUser.telephone1")
                            <span class="text-primary"> {{ $message}}</span>
                            @enderror
                        </div>



                        <div class="form-group flex-grow-1">
                            <label>Telephone2</label>
                            <input type="numeric" class="form-control" wire:model="newUser.telephone2">
                        </div>

                    </div>

                    <div class="from-group">
                        <label for="">Piece d'identité</label>
                        <select class="form-control  @error('newUser.pieceTdentite') @enderror"
                            wire:model="newUser.pieceTdentite">
                            <option value="">----------</option>
                            <option value="CNI">CNI</option>
                            <option value="PASSPORT">PASSPORT</option>
                            <option value="PERMIS DE CONDUIRE">PERMIS DE CONDUIRE</option>
                        </select>

                        @error("newUser.pieceTdentite")
                        <span class="text-primary">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group ">
                        <label>Numero piece d'identite</label>
                        <input type="text" class="form-control @error('newUser.NPI') @enderror"
                            wire:model="newUser.NPI">

                        @error("newUser.NPI")
                        <SPan class="text-primary">{{ $message }}</SPan>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Mot de passe</label>
                        <input type="password" class="form-control" desabled placeholder="Password">
                    </div>

                </div>

                <div class="card-footer" style="background-color:blue; ">
                    <button type="submit" class="btn " style="background-color:beige; color:black">Enregistrer</button>
                    <button type="button" wire:click="goToListUser()" class="btn btn-danger"
                        style="background-color:beige; color:black">Retour</button>
                </div>
            </form>
        </div>


    </div>
</div>