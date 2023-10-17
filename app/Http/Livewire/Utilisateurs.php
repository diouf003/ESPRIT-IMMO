<?php

namespace App\Http\Livewire;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use App\Models\Permission;
use Carbon\Carbon;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Utilisateurs extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";
    //pour addUser on aura:

    //une variable pour l'ajout 
    public $newUser = [];

    //une variable pour la modification
    public $editUser = [];

    //variable pour Permission
    public $rolePermissions = [];

    public $permission = [];
    //variable currentPage pour la modification
    public $currentPage = PAGELISTE;


    //variable pour les obligations
    public $rules = [

        'newUser.name' => 'required',
        'newUser.prenom' => 'required',
        'newUser.email' => 'required|email|unique:users,email',
        'newUser.telephone1' => 'required|numeric|unique:users,telephone1',
        'newUser.pieceTdentite' => 'required|',
        'newUser.sexe' => 'required',
        'newUser.NPI' => 'required|unique:users,NPI',

    ];

    public function render()
    {
        //Changeons lheur en français
        Carbon::setLocale("fr");
        // 

        return view('livewire.utilisateurs.index', [
            "users" => User::latest()->paginate(5)
        ])
            ->extends("layouts.master")
            ->section("contenu");
    }

    //fonction pour les règles de mmodifications
    public function rules()
    {
        if ($this->currentPage == PAGEEDITFORM) {
            return [
                'editUser.name' => 'required',
                'editUser.prenom' => 'required',
                'editUser.email' => ['required', 'email', Rule::unique("users", "email")->ignore($this->editUser['id'])],
                'editUser.telephone1' => ['required', 'numeric', Rule::unique("users", "telephone1")->ignore($this->editUser['id'])],
                'editUser.pieceTdentite' => 'required|',
                'editUser.sexe' => 'required',
                'editUser.NPI' => ['required',  Rule::unique("users", "NPI")->ignore($this->editUser['id'])],
            ];
        }
        return [
            'newUser.name' => 'required',
            'newUser.prenom' => 'required',
            'newUser.email' => 'required|email|unique:users,email',
            'newUser.telephone1' => 'required|numeric|unique:users,telephone1',
            'newUser.pieceTdentite' => 'required|',
            'newUser.sexe' => 'required',
            'newUser.NPI' => 'required|unique:users,NPI',
        ];
    }

    //fonction pour Ajouter new Etudiant
    public function goToAddUser()
    {
        $this->currentPage = PAGECREATEFORM;
    }

    //fonction pour editer user
    public function goToEditUser($id)
    {
        $this->editUser = User::find($id)->toArray();

        $this->currentPage = PAGEEDITFORM;

        //add populatePermissions
        $this->populateRolePermissions();
    }
    //fonction populateRolePermissions
    public function populateRolePermissions()
    {
        $this->rolePermissions["roles"] = [];
        $this->rolePermissions["permissions"] = [];

        $mapForCB = function ($value) {
            return $value["id"];
        };
        $roleIds = array_map($mapForCB, User::find($this->editUser["id"])->roles->toArray());
        //1p


        foreach (Role::all() as $role) {
            if (in_array($role->id, $roleIds)) {
                array_push($this->rolePermissions["roles"], ["role_id" => $role->id, "role_nom" => $role->nom, "active" => true]);
            } else {
                array_push($this->rolePermissions["roles"], ["role_id" => $role->id, "role_nom" => $role->nom, "active" => false]);
            }
        }

        foreach (Role::all() as $role) {
            if (in_array($role->id, $roleIds)) {
                array_push($this->rolePermissions["permissions"], ["permission_id" => $role->id, "permission_nom" => $role->nom, "active" => true]);
            } else {
                array_push($this->rolePermissions["permissions"], ["permission_id" => $role->id, "permission_nom" => $role->nom, "active" => false]);
            }
        }
    }

    //fonction pour retour
    public function goToListUser()
    {
        $this->currentPage = PAGELISTE;
        $this->editUser = [];
    }

    public function addUser()
    {
        //Vérifiez que les informations envoyées par le formulaire sont correctes

        $validationAttributes = $this->validate();

        //Ajouter le mot de passe
        $validationAttributes["newUser"]["password"] = "password";
        $validationAttributes["newUser"]["photo"] = "";

        //Ajouter un nouvel utilisateur
        User::create($validationAttributes["newUser"]);

        $this->newUser = [];

        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Locataire crée avec succès!"]);
    }

    //fonction confirmPwdReset
    public function confirmPwdReset()
    {
        $this->dispatchBrowserEvent("showConfirmMessage", ["message" => [
            "text" =>  "Vous êtes sur le point de réinitialiser le mot de passe de cet locataire.Voulez vous continuer?",
            "title" => "Etes-vous sûr de continuer?",
            "type" => "warning",

        ]]);
    }
    //fonction pour réinitialiser le mdp resetPassword
    public function resetPassword()
    {
        User::find($this->editUser["id"])->update(["password" => hash::make(DEFAULTPASSWORD)]);
        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Mot de pass utilisateur réinitialisé avec succès!"]);
    }
    //on crée la fonction Update
    public function updateUser()
    {
        $validationAttributes = $this->validate();


        User::find($this->editUser["id"])->update($validationAttributes["editUser"]);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Locataire mis à jour avec succès!"]);
    }

    //On crée la fonction supprimer ici:
    public function confirmDelete($name, $id)
    {
        $this->dispatchBrowserEvent("showConfirmMessage", ["message" => [
            "text" =>  "Vous êtes sur le point de supprimer $name de la liste des locataires.Voulez vous continuer?",
            "title" => "Etes-vous sûr de continuer?",
            "type" => "warning",
            "data" => [
                "user_id" => $id
            ]
        ]]);
    }
    //fonction deleteUser

    public function deleteUser($id)
    {
        User::destroy($id);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Locataire supprimé avec succès!"]);
    }

    //Creation de la founction updateRoleAndPermissions

    public function updateRoleAndPermissions()
    {
        //dabord on va supprimer les que l'utilisateur à de certain id
        DB::table("user_role")->where("user_id", $this->editUser["id"])->delete();
        DB::table("us_per")->where("user_id", $this->editUser["id"])->delete();

        //et ainsi on va parcourir

        foreach ($this->rolePermissions["roles"] as $role) {
            if ($role["active"]) {
                user::find($this->editUser["id"])->roles()->attach($role["role_id"]);
            }
        }


        foreach ($this->rolePermissions["permissions"] as $permission) {
            if ($permission["active"]) {
                user::find($this->editUser["id"])->permissions()->attach($permission["permission_id"]);
            }
        }
        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Role & Permission mis à jour avec succés!"]);
    }
}
