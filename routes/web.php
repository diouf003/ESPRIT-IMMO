<?php

use App\Models\Article;
use App\Models\TypeArticle;
use App\Http\Livewire\AdminComp;
use App\Http\Livewire\MessaComp;
use App\Http\Livewire\TarifComp;
use App\Http\Livewire\clientComp;

use App\Http\Livewire\ArticleComp;
use App\Http\Livewire\ClienttComp;
use App\Http\Livewire\MessageComp;
use App\Http\Livewire\Utilisateurr;
use App\Http\Livewire\Utilisateurs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\TarifClientComp;
use App\Http\Controllers\AddController;
use App\Http\Livewire\TariffClientComp;
use App\Http\Livewire\TypeArticlesComp;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\AddminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\LocataireController;
use App\Http\Controllers\NouvellePageController;
use App\Http\Controllers\ProprietaireController;
use App\Http\Livewire\Clientt;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

// Route::get('/accueil', function () {
//     return view('acceuil');
// });
// Route::get('/login', [App\Http\Controllers\HomeController::class, 'index'])->name('login')->middleware('guest');
//page d'accueil
Route::get('/', [App\Http\Controllers\AcceuilController::class, 'index'])->name('page');
//page de connexion
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route Groupe pour habilitations ie pour acceder user qui est ds habilitation
Route::get('/inscription.form', [App\Http\Controllers\FormController::class, 'form'])->name('inscription.form');



Route::get('/admin/clients', [AdminController::class, "afficherClients"])->name("addclient.afficherClients");
//prop infos
Route::get('/information/prop', [InfoController::class, "infos"])->name("info.inf");
//Voir paiement pour le proprietaire
Route::get('/adPro/locat', [ProprietaireController::class, "voirPaiement"])->name("adPro.voirPaiement");
Route::get('/reponses', [AdminController::class, "voirDemandes"])->name("reponses.voirDemandes");
// Route::get('/photos', [AdminController::class, "modePaiement"])->name("photos.modePaiement");

Route::get('/photos', [PhotoController::class, 'index'])->name('photos.index');
///////////////////////// 1 2
// Route::get('/add/envoyer-pdf', [AdminController::class, "afficherFormulaireEnvoiPdf"])->name('add.pdf.formulaire');
// Route::post('/add/envoyer-pdf', [AdminController::class, "envoyerPdf"])->name('add.pdf.envoyer');

Route::get('/locataires/{id}/pdf', [LocataireController::class, "afficherPdf"])->name('locataire.pdf');
Route::get("/messa.index", MessaComp::class, "index")->name("messa.index");


///Photo
// Route::get('/nouvelle-page', [NouvellePageController::class, 'index']);




//
// Route::get('/administration/envoyer', [AdminController::class, "afficherFormulaireEnvoiPdf"])->name('administration.formulaire');
// Route::post('/administration/envoyer', [AdminController::class, "envoyerPdf"])->name('administration.envoyer');
// // Route::get('/locataires/show', [AdminController::class, "envoyerPdf"])->name('locataires.show');

// //
// Route::get('/locataires/pdf', [ClientController::class, "afficherPdf"])->name('locataire.pdf');






Route::group(
    [
        "middleware" => ["auth", "auth.admin"],
        "as" => "admin."
    ],

    function () {
        Route::group([
            "prefix" => "habilitations",
            "as" => "habilitations."
        ], function () {
            Route::get("/utilisateurs", Utilisateurs::class, "index")->name("users.index");
            // Route::get("/admin", AdminComp::class, "index")->name("add.index");

            ///Message

        });
        //Créons 1 deuxième rout group pour type Article
        Route::group([
            "prefix" => "gestarticles",
            "as" => "gestarticles."
        ], function () {
            //noublier pas de créer 1 Composant typearticles:php artisan make:livewire TypeArticlesCom
            Route::get("/types", TypeArticlesComp::class, "index")->name("types");
            Route::get("/articles", ArticleComp::class, "index")->name("articles");
            Route::get("/administ", AdminComp::class, "index")->name("administ");

            Route::get("/message.index", MessageComp::class, "index")->name("message.index");




            Route::get("/articles/{articleId}/tarifs", TarifComp::class, "index")->name("articles.tarifs");
        });
    }
);

Route::group(
    [
        "middleware" => ["auth", "auth.locataire"],
        "as" => "locataire."
    ],

    function () {
        Route::get("/clients", clientComp::class, "index")->name("clients.index");
    }
);
Route::group(
    [
        "middleware" => ["auth", "auth.locataire"],
        "as" => "locataire."
    ],

    function () {
        // Route::get("/clientt", Clientt::class, "index")->name("clientt.index");
        Route::get("/tableau", Clientt::class, "index")->name("tableau.index");
        //
        Route::get("/utilisat", Utilisateurr::class, "index")->name("users.index");

        //route Loc
    }


);
