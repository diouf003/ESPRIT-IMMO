<div class="row p-4 pt-5">
    <div class="col-md-12">

        <div class="card card-primary">
            <div class="card-header " style="background: blue; color:white">
                <h3 class="card-title"><i class="fa fa-id-badge fa-2x"></i> Veuillez effectuer votre mode de paiement!
                </h3>
            </div>
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <a href="javascript:void(0)" onclick="return false;">
                        <img src="{{asset('img/OM.jpg')}}" style="height: 200px; width: 200px; margin: 5px;   overflow: hidden; transition:cubic-bezier(0.075, 0.82, 0.165, 1); animation: blink 3s infinite;" class="img-circle elevation-2" alt="">
                    </a>
                    <a href="javascript:void(0)" onclick="return false;">

                        <img src="{{asset('img/wave.webp')}}" style="height: 200px;width: 200px; margin: 5px;" class="img-circle elevation-2" alt="">
                    </a>

                    <a href="javascript:void(0)" onclick="return false;">
                        <img src="{{asset('img/MS.png')}}" style="height: 200px;width: 200px; margin: 5px;" class="img-circle elevation-2" alt="">
                    </a>


                </div>

            </div>


            <form role="form" wire:submit.prevent="addReponse()" style="width: 90%; height: 10%; background-color:blue; margin: 20px;  background-image: url('img/payment-method.png'); background-size: cover; border: 2px solid #000;  border: 2px solid #000; border-radius: 10px;  background-image: url('img/MAISON.jpg');">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">

                            <label>Nom</label>
                            <input type="text" wire:model="addReponse.nom" class="form-control @error('addReponse.nom') is-invalid @enderror" placeholder="VEILLEZ METTRE VOTRE NOM">

                            @error("addReponse.nom")
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror


                        </div>

                        <div class="form-group flex-grow-1">
                            <label>Prenom</label>
                            <input type="text" wire:model="addReponse.prenom" class="form-control @error('addReponse.prenom') is-invalid @enderror" placeholder="VEILLEZ METTRE VOTRE PRENOM">

                            @error("addReponse.prenom")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group flex-grow-1">
                        <label>Telephone</label>
                        <input type="text" wire:model="addReponse.telephone" class="form-control @error('addReponse.telephone') is-invalid @enderror" placeholder="VEILLEZ METTRE VOTRE NUMERO">

                        @error("addReponse.telephone")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group flex-grow-1">
                        <label>Montant à payer</label>
                        <input type="numeric" wire:model="addReponse.montantPaye" class="form-control @error('addReponse.montantPaye') is-invalid @enderror" placeholder="VEILLEZ METTRE LE MONTANT A PAYER EN FCFA">

                        @error("addReponse.montantPaye")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group flex-grow-1">
                        <label>Date Paiement</label>
                        <input type="date" wire:model="addReponse.datePaiement" class="form-control @error('addReponse.datePaiement') is-invalid @enderror" placeholder="DATE DE PAIEMENT">

                        @error("addReponse.datePaiement")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>





                </div>

                <div class="card-footer">
                    <button type="submit" class="btn" style="background:blue; color:white">Valider le
                        paiement</button>
                    <button type="button" wire:click="goToListClient()" class="btn btn-danger" style="background:blue; color:white">Retour</button>
                </div>
            </form>
        </div>


    </div>
    <!-- double colone -->

</div>

<script>
    function redirectSamePage() {
        // Redirection vers la même page (remplacez 'nom-de-votre-page' par le nom réel de votre page)
        window.location.href = 'messa.index';
    }
</script>