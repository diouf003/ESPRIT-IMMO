<?php

namespace App\Http\Livewire;

use App\Models\Role;
use App\Models\Client;
use App\Models\Messa;
use App\Models\Reponse;
use Livewire\Component;
use Carbon\Carbon;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;


class MessaComp extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";
    //pour addClient on aura:

    //une variable pour l'ajout 
    public $addReponse = [];
    public $addClient = [];

    //une variable pour la modification
    public $editClient = [];

    public $search = "";

    //variable pour Permission
    // public $rolePermissions = [];

    public $permission = [];
    //variable currentPage pour la modification
    public $currentPage = PAGELISTE;


    //variable pour les obligations
    public $rules = [

        'addReponse.nom' => 'required',
        'addReponse.prenom' => 'required',
        'addReponse.telephone' => 'required',
        'addReponse.montantPaye' => 'required',
        'addReponse.datePaiement' => 'required',

        // 'addClient.email' => 'required|email|unique:Clients,email',
        // 'addClient.telephone1' => 'required|numeric|unique:Clients,telephone1',
        // 'addClient.pieceTdentite' => 'required|',
        // 'addClient.sexe' => 'required',
        // 'addClient.NPI' => 'required|unique:Clients,NPI',

    ];

    public function render()
    {

        $query =  Client::query();
        $search = $this->search;

        if (isset($search))
            $this->resetPage();

        $query->when($search != "", function ($query) use ($search) {
            $query->where("nom", "like", "%{$search}%");
            $query->orWhere("nom", "like", "%{$search}%");
        });
        //Changeons lheur en français
        Carbon::setLocale("fr");
        // 

        return view('livewire.messa.index', [
            "reponses" => $query->latest()->paginate(5)
        ])
            ->extends("layouts.master")
            ->section("contenu");
    }

    //fonction pour les règles de mmodifications
    public function rules()
    {
        if ($this->currentPage == PAGEEDITFORM) {
            return [
                'editClient.nom' => 'required',
                'editClient.prenom' => 'required',
                'editClient.message' => 'required',
                'editClient.adresse' => 'required',
                'editClient.statut' => 'required',
                'editClient.choixDuLogement' => 'required',
                'editClient.ville' => 'required',
                'editClient.pays' => 'required',
                'editClient.nationalite' => 'required',
                'editClient.dateNaissance' => 'required',
                'editClient.lieuNaissance' => 'required',
                'editClient.email' => ['required', 'email', Rule::unique("clients", "email")->ignore($this->editClient['id'])],
                'editClient.telephone1' => ['required', 'numeric', Rule::unique("clients", "telephone1")->ignore($this->editClient['id'])],
                'editClient.pieceIdentite' => 'required|',
                'editClient.sexe' => 'required',
                'editClient.noPieceIdentite' => ['required',  Rule::unique("clients", "noPieceIdentite")->ignore($this->editClient['id'])],
            ];
        }
        return [
            'addReponse.nom' => 'required',
            'addReponse.prenom' => 'required',
            'addReponse.telephone' => 'required',
            'addReponse.montantPaye' => 'required',
            'addReponse.datePaiement' => 'required',
            // 'addClient.sexe' => 'required',
            // 'addClient.adresse' => 'required',
            // 'addClient.statut' => 'required',
            // 'addClient.choixDuLogement' => 'required',
            // 'addClient.ville' => 'required',
            // 'addClient.pays' => 'required',
            // 'addClient.nationalite' => 'required',
            // 'addClient.dateNaissance' => 'required',
            // 'addClient.lieuNaissance' => 'required',
            // 'addClient.email' => 'required|email|unique:Clients,email',
            // 'addClient.telephone1' => 'required|numeric|unique:Clients,telephone1',
            // 'addClient.pieceIdentite' => 'required|',
            // 'addClient.sexe' => 'required',
            // 'addClient.noPieceIdentite' => 'required|unique:Clients,noPieceIdentite',
        ];
    }

    //fonction pour Ajouter new Etudiant
    public function goToAddReponse()
    {
        $this->currentPage = PAGECREATEFORM;
    }

    //fonction pour editer Client
    public function goToEditClient($id)
    {
        $this->editClient = Client::find($id)->toArray();

        $this->currentPage = PAGEEDITFORM;

        //add populatePermissions
        // $this->populateRolePermissions();
    }
    //fonction populateRolePermissions

    //fonction pour retour
    public function goToListClient()
    {
        $this->currentPage = PAGELISTE;
        $this->editClient = [];
    }

    public function addReponse()
    {
        //Vérifiez que les informations envoyées par le formulaire sont correctes

        $validationAttributes = $this->validate();

        //Ajouter le mot de passe
        // $validationAttributes["addClient"]["password"] = "password";
        // $validationAttributes["addClient"]["photo"] = "";

        //Ajouter un nouvel utilisateur
        Messa::create($validationAttributes["addReponse"]);

        $this->addReponse = [];

        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Paiement éffectués avec succès!"]);
    }

    //fonction confirmPwdReset

    //fonction pour réinitialiser le mdp resetPassword

    //on crée la fonction Update
    public function updateClient()
    {
        $validationAttributes = $this->validate();


        Client::find($this->editClient["id"])->update($validationAttributes["editClient"]);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Client mis à jour avec succès!"]);
    }

    //On crée la fonction supprimer ici:
    public function confirmDelete($name, $id)
    {
        $this->dispatchBrowserEvent("showConfirmMessage", ["message" => [
            "text" =>  "Vous êtes sur le point de supprimer $name de la liste des clients.Voulez vous continuer?",
            "title" => "Etes-vous sûr de continuer?",
            "type" => "warning",
            "data" => [
                "client_id" => $id
            ]
        ]]);
    }
    //fonction deleteClient

    public function deleteClient($id)
    {
        Client::destroy($id);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Client supprimé avec succès!"]);
    }

    //Creation de la founction updateRoleAndPermissions


}
