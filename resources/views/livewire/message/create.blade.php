<div class="row p-4 pt-5">
    <div class="col-md-12">

        <div class="card card-primary">
            <div class="card-header " style="bg:blue; color:white">
                <h3 class="card-title"><i class="fa fa-id-badge fa-2x"></i> Responses au clients!
                </h3>
            </div>


            <form role="form" wire:submit.prevent="addReponse()">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">

                            <label>Nom</label>
                            <input type="text" wire:model="addReponse.nom" class="form-control @error('addReponse.nom') is-invalid @enderror">

                            @error("addReponse.nom")
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror


                        </div>

                        <div class="form-group flex-grow-1">
                            <label>Prenom</label>
                            <input type="text" wire:model="addReponse.prenom" class="form-control @error('addReponse.prenom') is-invalid @enderror">

                            @error("addReponse.prenom")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group flex-grow-1">
                        <label>message</label>
                        <button>
                            <textarea type="text" wire:model="addReponse.message" class="form-control @error('addReponse.message') is-invalid @enderror" name="" id="" cols="150" rows="15"></textarea>

                        </button>

                        @error("addReponse.message")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>



                </div>

                <div class="card-footer">
                    <button type="submit" class="btn " style="background: blue; color:white">Envoyer la demande</button>
                    <button type="button" wire:click="goToListClient()" class="btn " style="background: blue; color:white">Retour</button>
                </div>
            </form>
        </div>


    </div>
    <!-- double colone -->

</div>