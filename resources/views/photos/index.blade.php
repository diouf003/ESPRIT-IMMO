<div class="row p-4 pt-5">
    <div class="col-md-12">

        <div class="card card-primary">
            <div class="card-header bg-dark">
                <h3 class="card-title"><i class="fa fa-id-badge fa-2x"></i> Responses au clients!
                </h3>
                <h1>-------------------------------------------------------------------------</h1>
                <a href="#"></a>
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{asset('img/OM.jpg')}}" style="height: 70px; margin: 20px;" class="img-circle elevation-2" alt="">
                        <img src="{{asset('img/wave.webp')}}" style="height: 70px; margin: 20px;" class="img-circle elevation-2" alt="">
                        <img src="{{asset('img/MS.png')}}" style="height: 70px; margin: 20px;" class="img-circle elevation-2" alt="">

                    </div>

                </div>

            </div>


            <form role="form">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">

                            <label>Nom</label>
                            <input type="text" wire:model="addReponse.nom" class="form-control @error('addReponse.nom') is-invalid @enderror">

                            @error("addReponse.nom")
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror


                        </div>
                        <br>

                        <div class="form-group flex-grow-1">
                            <label>Prenom</label>
                            <input type="text" wire:model="addReponse.prenom" class="form-control @error('addReponse.prenom') is-invalid @enderror">

                            @error("addReponse.prenom")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <br>
                    </div>
                    <div class="form-group flex-grow-1">
                        <label>Telephone</label>
                        <input type="numeric" wire:model="addReponse.telephone" class="form-control @error('addReponse.telephone') is-invalid @enderror">

                        @error("addReponse.telephone")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group ">
                    <label>Montant à Payer</label>
                    <input type="numeric" wire:model="addReponse.montantPaye" class="form-control @error('addReponse.montantPaye') is-invalid @enderror">

                    @error("addReponse.montantPaye")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
        </div>





    </div>

    <div class="card-footer">
        <button type="submit" class="btn bg-dark">Envoyer la demande</button>
        <button type="button" class="btn btn-danger">Retour</button>
    </div>
    </form>
</div>


</div>
<!-- double colone -->

</div>