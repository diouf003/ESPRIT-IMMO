<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Article;
use Livewire\Component;
use App\Models\TypeArticle;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use App\Models\ArticlePropriete;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ClienttComp extends Component
{
    use WithPagination, WithFileUploads;

    protected $paginationTheme = "bootstrap";

    public $search = "";
    public $filtreType = "", $filtreEtat = "";
    //Ajout articl
    public $addArticle = [];
    public $editArticle = [];
    public $proprietesArticles = null;
    //variable pour la photo
    public $addPhoto = null;
    public $editPhoto = null;
    public $inputFileIterator = 0;
    public $inputEditFileIterator = 0;
    //création des variables

    public $editHasChanged;
    public $editArticleOldValues = [];


    public $articlePropriete = [];

    protected  $rules =


    [
        'editArticle.nom' => 'required',

        'editArticle.noSerie' => 'required',

        'editArticle.types_article_id' => 'required|exists:App\Models\TypeArticle,id',
        'editArticle.article_propriete.*.valeur' => 'required',
        // 'editAricle.article_propriete.*.nomPropriete' => 'required',

    ];

    //funcyion
    function showUpdateButton()
    {
        $this->editHasChanged = false;

        foreach ($this->editArticleOldValues["article_propriete"] as $index => $editArticleOld) {

            if ($this->editArticle["article_propriete"]["$index"]["valeur"] != $editArticleOld["valeur"]) {
                $this->editHasChanged = true;
            }
        }


        if (
            $this->editArticle["nom"] != $this->editArticleOldValues["nom"] ||
            $this->editArticle["noSerie"] != $this->editArticleOldValues["noSerie"] ||
            $this->editPhoto != null

        ) {
            $this->editHasChanged = true;
        }
        // return $this->editHasChanged;
    }

    public function render()
    {
        Carbon::setLocale("fr");

        $articleQuery = Article::query();

        $this->resetPage();

        if ($this->search != "") {
            $articleQuery->where("nom", "LIKE", "%" . $this->search . "%")
                ->orWhere("noSerie", "LIKE", "%" . $this->search . "%");
        }
        //other
        if ($this->filtreType != "") {
            $articleQuery->where("types_article_id",  $this->filtreType);
        }
        if ($this->filtreEtat != "") {
            $articleQuery->where("estDisponible",  $this->filtreEtat);
        }

        if ($this->editArticle != []) {
            $this->showUpdateButton();
        }

        return view('livewire.articles.index', [
            "articles" => $articleQuery->latest()->paginate(5),
            "typearticles" => TypeArticle::orderBy("nom", "ASC")->get()
        ])
            ->extends("layouts.master")
            ->section("contenu");
    }

    public function editArticle($Id)
    {

        $this->editArticle = Article::with("article_propriete", "article_propriete.proprietes", "types_article")->find($Id)->toArray();
        $this->dispatchBrowserEvent("showEditModal");

        $this->editArticleOldValues = $this->editArticle;

        $this->editPhoto = null;
        $this->inputEditFileIterator++;



        // dd($this->editArticle);
    }

    public function confirmDelete(Article $article)
    {

        $this->dispatchBrowserEvent("showConfirmMessage", ["message" => [
            "text" =>  "Vous êtes sur le point de supprimer " . $article->nom . " de la liste des logement.Voulez vous continuer?",
            "title" => "Etes-vous sûr de continuer?",
            "type" => "warning",
            "data" => [
                "article_id" => $article->id
            ]
        ]]);
    }

    //une foction qui vient par defaut 
    public function updated($property)
    {
        if ($property ==  "addArticle.type") {
            $this->proprietesArticles = optional(TypeArticle::find($this->addArticle["type"]))->proprietes;
        }
    }

    //function updateArticle
    public function updateArticle()
    {
        $this->validate();

        $article = Article::find($this->editArticle["id"]);

        $article->fill($this->editArticle);


        $article->fill($this->editArticle);

        if ($this->editPhoto != null) {
            $path = $this->editPhoto->store("upload", "public");
            $imagePath = "storage/" . $path;

            $image = Image::make(public_path($imagePath))->fit(200, 200);

            $image->save();

            Storage::disk("local")->delete(str_replace("storage/", "public/", $article->imageUrl));

            $article->imageUrl = $imagePath;
        }

        $article->save();

        collect($this->editArticle["article_propriete"])
            ->each(
                fn ($item) => ArticlePropriete::where([
                    "article_id" => $item["article_id"],
                    "propriete_article_id" => $item["propriete_article_id"]

                ])->update(["valeur" => $item["valeur"]])
            );

        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Logement mis à jour avec succès!"]);
        $this->dispatchBrowserEvent("closeEditModal");
    }
    // Fonction showAddArticleModal
    public function showAddArticleModal()
    {
        $this->resetValidation();
        $this->addArticle = [];
        $this->proprietesArticles = [];
        $this->addPhoto = null;
        $this->inputFileIterator++;
        $this->dispatchBrowserEvent("showModal");
    }
    public function closeModal()
    {
        $this->dispatchBrowserEvent("closeModal");
    }

    //closeModal fermer

    public function closeEditModal()
    {
        $this->dispatchBrowserEvent("closeEditModal");
    }

    // fonction ajouterArticle
    public function ajouterArticle()
    {
        $validateArr = [
            "addArticle.nom" => "string|min:3|required|unique:articles,nom",
            "addArticle.noSerie" => "string|max:50|min:3|required|unique:articles,noSerie",
            "addArticle.type" => "string|required",
            "addPhoto" => "image|max:10240" //10mb
        ];

        // $dynamicValidation = [];
        $customErrorMessage = [];
        $propIds = [];

        foreach ($this->proprietesArticles ?: [] as $propriete) {

            $field = "addArticle.prop." . $propriete->nomPropriete;
            $propIds[$propriete->nomPropriete] =  $propriete->id;

            if ($propriete->estObligatoire == 1) {

                $validateArr[$field] = "required";
                $customErrorMessage["$field.required"] = "Le champ<<" . $propriete->nomPropriete . ">> est obligatoire.";

                // $this->addArticle["prop"][$propriete->nomPropriete];
            } else {
                $validateArr[$field] = "nullable";
            }
        }


        //Validation des erreurs
        $validatedData = $this->validate($validateArr, $customErrorMessage);

        //Par défaut notre image sera un place holder
        $imagePath = "img/400.svg";

        if ($this->addPhoto != null) {

            $path = $this->addPhoto->store('upload', 'public');
            $imagePath = "storage/" . $path;

            $image = Image::make(public_path($imagePath))->fit(200, 200);
            $image->save();
        }

        $article = Article::create([
            "nom" => $validatedData["addArticle"]["nom"],
            "noSerie" => $validatedData["addArticle"]["noSerie"],
            "types_article_id" => $validatedData["addArticle"]["type"],
            "imageUrl" => $imagePath
        ]);


        foreach ($validatedData["addArticle"]["prop"] ?: [] as $key => $prop) {
            ArticlePropriete::create([
                "article_id " => $article->id,
                "propriete_article_id" => $propIds[$key],
                "valeur" => $prop

            ]);
        }

        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Logement ajouté avec succès!"]);
        $this->closeModal();
    }

    public function cleanupOldUploads()
    {
        $storage = Storage::disk("local");

        foreach ($storage->allFiles("livewire-tmp") as $pathFileName) {

            if (!$storage->exists($pathFileName)) continue;

            $fiveSecondsDelete = now()->subSeconds(5)->timestamp;

            if ($fiveSecondsDelete > $storage->lastModified($pathFileName)) {
                $storage->Delete($pathFileName);
            }
        }
    }
}
