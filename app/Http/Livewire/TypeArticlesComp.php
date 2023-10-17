<?php

namespace App\Http\Livewire;

use App\Models\ProprieteArticle;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\TypeArticle;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;

class TypeArticlesComp extends Component
{
    use WithPagination;
    //Pour la partie recherche on a besoin de public $search 1
    public $search = "";

    //variable ajouter pour type article
    public $isAddTypeArticle = false;
    //variable ajouter pour $newTypeArticleName

    public $newTypeArticleName = "";

    //variable pour la validation de typearticle
    public $newValue = "";

    public $showProp = "";

    //Variable pour selectioner typeArticle
    public $selectedTypeArticle;
    //Variable pour Ajout Propriete
    public $newPropModel = [];

    //update propriete
    public $editPropModel = [];
    //pour le bootstrap

    protected $paginationTheme = "bootstrap";

    public function render()
    {
        //c'est pour la date
        Carbon::setLocale("fr");
        //Pour la partie recherche on a besoin de public $search 2
        $searchCriteria = "%" . $this->search . "%";



        $data = [
            "typearticles" => TypeArticle::where("nom", "like", $searchCriteria)->latest()->paginate(5),
            "proprietesTypeArticles" => ProprieteArticle::where("type_article_id", optional($this->selectedTypeArticle)->id)->get()
        ];
        return view('livewire.typearticles.index', $data)
            ->extends("layouts.master")
            ->section("contenu");
    }

    //création d'une méthode ie une function et une function contraire pour type article
    public function toggleShowAddTypeArticleForm()
    {
        if ($this->isAddTypeArticle) {
            $this->isAddTypeArticle = false;
            $this->newTypeArticleName = "";
            //L'annulation de l'erreur
            $this->resetErrorBag(["newTypeArticleName"]);
        } else {

            $this->isAddTypeArticle = true;
        }
    }

    // Ici on implanter la méthode validated



    public function addNewTypeArticle()
    {
        $validated = $this->validate([
            "newTypeArticleName" => "required|max:50|unique:type_articles,nom"


        ]);
        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Type de logement ajouté avec  succès!"]);

        TypeArticle::create(["nom" => $validated["newTypeArticleName"]]);

        $this->toggleShowAddTypeArticleForm();
        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Logement ajouté avec succès!!"]);
    }
    //nouvelle fonction pour editer typeArticle avec sweetalert2

    public function  editTypeArticle(TypeArticle $typeArticle)
    {

        $this->dispatchBrowserEvent("showEditForm", ["typearticle" => $typeArticle]);
    }

    //fonction pour le update de typearticle


    public function updateTypeArticle($id, $valueFromJS)
    {
        $this->newValue = $valueFromJS;
        $validated = $this->validate([
            "newValue" => ["required", "max:50", Rule::unique("type_articles", "nom")->ignore($id)]

        ]);
        TypeArticle::find($id)->update(["nom" => $validated["newValue"]]);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Logement mis à jour avec succès!!"]);
    }

    // Function supprimer pour le typeArticle
    public function confirmDelete($name, $id)
    {
        $this->dispatchBrowserEvent("showConfirmMessage", ["message" => [
            "text" =>  "Vous êtes sur le point de supprimer $name de la liste des types logements.Voulez vous continuer?",
            "title" => "Etes-vous sûr de continuer?",
            "type" => "warning",
            "data" => [
                "type_article_id" => $id
            ]
        ]]);
    }

    // fonction pour confirmer la suppression : deleteTypeArticle
    public function deleteTypeArticle(TypeArticle $typeArticle)
    {
        $typeArticle->delete();
        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Type de logement supprimé avec succès!"]);
    }

    //Fonction showPro

    public function showProp(TypeArticle $typeArticle)
    {
        $this->selectedTypeArticle = $typeArticle;
        $this->dispatchBrowserEvent("showModal", []);
    }

    //Function pour ajouter une proprieté
    public function addProp()
    {
        $validated = $this->validate([
            "newPropModel.nomPropriete" => [
                "required",
                Rule::unique("propriete_articles", "nomPropriete")->where("type_article_id", $this->selectedTypeArticle->id)
            ],
            "newPropModel.estObligatoire" => "required"
        ]);

        ProprieteArticle::create([
            "nomPropriete" => $this->newPropModel["nomPropriete"],
            "estObligatoire" => $this->newPropModel["estObligatoire"],
            "type_article_id" => $this->selectedTypeArticle->id,
        ]);
        $this->newPropModel = [];
        $this->resetErrorBag();

        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Propriété ajoutée avec succès!"]);
    }
    // Fonction pour supprimer des propriétés
    function showDeletePrompt($nomPropriete, $id)
    {
        $this->dispatchBrowserEvent("showConfirmMessage", ["message" => [
            "text" =>  "Vous êtes sur le point de supprimer '$nomPropriete' de la liste des propriétés d'articles.Voulez vous continuer?",
            "title" => "Etes-vous sûr de continuer?",
            "type" => "warning",
            "data" => [
                "propriete_id" => $id
            ]
        ]]);
    }
    // suppression deleteProp
    public function deleteProp(ProprieteArticle $proprieteArticle)
    {
        $proprieteArticle->delete();
        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Propriété supprimée avec succès!"]);
    }
    //Editer une Propriete
    public function editProp(ProprieteArticle $proprieteArticle)
    {
        $this->editPropModel["nomPropriete"] = $proprieteArticle->nomPropriete;
        $this->editPropModel["estObligatoire"] = $proprieteArticle->estObligatoire;
        $this->editPropModel["id"] = $proprieteArticle->id;

        $this->dispatchBrowserEvent("showEditModal", []);
    }
    // Function pour updateProp propriete
    public function updateProp()
    {
        $this->validate([
            "editPropModel.nomPropriete" => [
                "required",
                Rule::unique("propriete_articles", "nomPropriete")->ignore($this->editPropModel["id"])
            ],
            "editPropModel.estObligatoire" => "required"
        ]);

        ProprieteArticle::find($this->editPropModel["id"])->update([

            "nomPropriete" => $this->editPropModel["nomPropriete"],
            "estObligatoire" => $this->editPropModel["estObligatoire"],
            "type_article_id" => $this->selectedTypeArticle->id

        ]);



        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Propriété mis à jour avec succès!"]);

        $this->closeEditModal();
    }
    //fonction fermuture 
    public function closeModal()
    {
        $this->dispatchBrowserEvent("closeModal", []);
    }

    //fonction fermer pour propriete
    public function closeEditModal()
    {
        $this->newPropModel = [];
        $this->resetErrorBag();
        $this->dispatchBrowserEvent("closeEditModal", []);
    }
}