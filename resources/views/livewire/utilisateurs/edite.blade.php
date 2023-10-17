<div class="row p-4 pt-5">
    <div class="col-md-6">

        <div class="card card-primary">
            <div class="card-header " style="background-color:blue; color:white">
                <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Modifier L'ocataire!
                </h3>
            </div>


            <form role="form" wire:submit.prevent="updateUser()">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label>Nom</label>
                            <input type="text" wire:model="editUser.name"
                                class="form-control @error('editUser.name') is-invalid @enderror">

                            @error("editUser.name")
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror


                        </div>



                        <div class="form-group flex-grow-1">
                            <label>Prenom</label>
                            <input type="text" wire:model="editUser.prenom"
                                class="form-control @error('editUser.prenom') is-invalid @enderror">

                            @error("editUser.prenom")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group">
                        <label>Sexe</label>
                        <select class="form-control @error('editUser.sexe') is-invalid @enderror"
                            wire:model="editUser.sexe">
                            <option value="">----------</option>
                            <option value="H">Homme</option>
                            <option value="F">Femme</option>
                        </select>

                        @error("editUser.sexe")

                        <span class="text-danger"> {{$message}} </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Adresse e-mail</label>
                        <input type="email" class="form-control @error('editUser.email') @enderror"
                            wire:model="editUser.email">

                        @error("editUser.email")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label>Telephone1</label>
                            <input type="numeric" class="form-control   @error('editUser.telephone1') @enderror"
                                wire:model="editUser.telephone1">

                            @error("editUser.telephone1")
                            <span class="text-primary"> {{ $message}}</span>
                            @enderror
                        </div>



                        <div class="form-group flex-grow-1">
                            <label>Telephone2</label>
                            <input type="numeric" class="form-control" wire:model="editUser.telephone2">
                        </div>

                    </div>

                    <div class="from-group">
                        <label for="">Piece d'identité</label>
                        <select class="form-control  @error('editUser.pieceTdentite') @enderror"
                            wire:model="editUser.pieceTdentite">
                            <option value="">----------</option>
                            <option value="CNI">CNI</option>
                            <option value="PASSPORT">PASSPORT</option>
                            <option value="PERMIS DE CONDUIRE">PERMIS DE CONDUIRE</option>
                        </select>

                        @error("editUser.pieceTdentite")
                        <span class="text-primary">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group ">
                        <label>Numero piece d'identite</label>
                        <input type="text" class="form-control @error('editUser.NPI') @enderror"
                            wire:model="editUser.NPI">

                        @error("editUser.NPI")
                        <SPan class="text-primary">{{ $message }}</SPan>
                        @enderror
                    </div>



                </div>

                <div class="card-footer" style="background-color:blue">
                    <button type="submit" class="btn " style="background-color:beige; color:black">Appliquer les
                        Modifications</button>
                    <button type="button" wire:click="goToListUser()" class="btn btn-danger"
                        style="background-color:beige; color:black">Retour</button>
                </div>
            </form>
        </div>


    </div>
    <!-- double colone -->
    <div class="col-md-6">
        <div class="row">

            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header " style="background-color:blue; color:white">
                        <h3 class="card-title"><i class="fas fa-key fa-2x"></i> Réinitialisation de mot de passe!
                        </h3>
                    </div>



                    <div class="card-body">
                        <!-- réinitialiser le mdp -->
                        <ul>
                            <li>
                                <a href="" class="btn btn-link" wire:click.prevent="confirmPwdReset">Réinitialiser le
                                    mot de passe </a><span>(par défaut:
                                    "password")</span>
                            </li>
                        </ul>
                    </div>



                </div>
            </div>
            <div class="col-md-12 mst-4  ">
                <div class="card card-primary">
                    <div class="card-header d-flex  align-items-center " style="background-color:blue; color:white">
                        <h3 class="card-title flex-grow-1"><i class="fas fa-fingerprint fa-2x"></i> Rôles & Permissions
                        </h3>
                        <!-- Ajouton un bouton Appliquer les
                                modifications-->
                        <button class="btn bg-gradient-success" style="background-color:beige; color:black"
                            wire:click="updateRoleAndPermissions"><i class="fas fa-check">Appliquer les
                                modifications</i></button>
                    </div>



                    <div class="card-body">

                        <div id="accordion">
                            @foreach($rolePermissions["roles"] as $role)
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <h4 class="card-title flex-grow-1">
                                        <a data-parent="#accordion" href="#"
                                            aria-expanded="true">{{$role["role_nom"]}}</a>
                                    </h4>
                                    <div class="custom-control custom-switch-off-danger custom-switch-on-success">


                                        <input type="checkbox" class="custom-control-input"
                                            wire:model.lazy="rolePermissions.roles.{{$loop->index}}.active"
                                            @if($role["active"]) checked @endif id="customSwitch {{$role['role_id']}}">
                                        <label class="custom-control-label" for="customSwitch {{$role['role_id']}}">
                                            {{$role["active"]? "activé" : "désactivé" }}</label>
                                    </div>

                                </div>

                            </div>
                            @endforeach

                            <!-- @json($rolePermissions["roles"])-->


                        </div>

                    </div>

                    <div class="p-3">
                        <table class="table table-bordered">
                            <thead>
                                <th>Permission</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach($rolePermissions["permissions"] as $permission)
                                <tr>
                                    <td>{{ $permission["permission_nom"] }}</td>
                                    <td>
                                        <div
                                            class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">

                                            <input type="checkbox" class="custom-control-input"
                                                @if($permission["active"]) checked @endif
                                                wire:model.lazy="rolePermissions.permissions.{{$loop->index}}.active"
                                                id="customSwitchPermission{{$permission['permission_id']}}">
                                            <label class="custom-control-label"
                                                for="customSwitchPermission{{$permission['permission_id']}}">
                                                {{ $permission["active"]? "Activé" : "Desactivé" }}</label>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <!--@json($rolePermissions["permissions"]) -->



                        </table>
                    </div>



                </div>
            </div>
        </div>

    </div>
</div>