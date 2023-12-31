<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\DureeLocation;
use Livewire\Component;
use App\Models\Tarification;
use Illuminate\Validation\Rule;

class TarifComp extends Component
{
    public Article $article;
    public $newTarif = [];
    public $isAddTarif = false;


    public function mount($articleId)
    {
        $this->article = Article::find($articleId);
    }
    public function render()
    {
        return view('livewire.tarifs.index', [
            "tarifs" => Tarification::with(["dureeLocation"])
                ->whereArticleId($this->article->id)  //whereArticleId = where("article_id",3)
                ->get(),
            "dureeLocations" => DureeLocation::all(),

        ])

            ->extends("layouts.master")
            ->section("contenu");
    }


    //public function pour save , cancel , nouveau tarif
    public function nouveauTarif()
    {
        $this->isAddTarif = true;
    }

    //editTarif
    public function editTarif(Tarification $tarif)
    {
        $this->isAddTarif = true;
        $this->newTarif = $tarif->toArray();
        $this->newTarif["edit"] = true;
    }
    public function saveTarif()
    {
        $articleId = $this->article->id;
        $newTarif = $this->newTarif;

        $uniqueRule = function () use ($newTarif, $articleId) {
            return (isset($newTarif["edit"])) ?


                Rule::unique((new Tarification)->getTable(), "duree_location_id")
                ->ignore($newTarif["id"], "id")
                ->where(function ($query) use ($articleId) {
                    return $query->where("article_id", $articleId);
                })
                :
                Rule::unique((new Tarification)->getTable(), "duree_location_id")

                ->where(function ($query) use ($articleId) {
                    return $query->where("article_id", $articleId);
                });
        };

        $this->validate(
            [
                "newTarif.duree_location_id" => [
                    "required",
                    $uniqueRule()
                ],

                "newTarif.prix" => "required|numeric",
            ],
            ["newTarif.duree_location_id.unique" => "Il existe déja un tarif pour cette durée de logement..."]

        );

        Tarification::updateOrCreate(
            [
                "duree_location_id" => $this->newTarif["duree_location_id"],
                "article_id" => $articleId
            ],
            [

                "prix" => $this->newTarif["prix"]
            ],

        );
        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Tarifs mis à jour avec succès!"]);


        $this->cancel();
    }
    public function cancel()
    {

        $this->isAddTarif = false;
        $this->resetErrorBag();
        $this->newTarif = [];
    }
}
