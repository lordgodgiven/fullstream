<?php

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

Route::get('/passgenerator', function () {
    return bcrypt('admin');
});
Route::get('/', 'welcomeController@home');

Route::get('/administrations/', 'AdministrationController@index')->name('administration.home');;
Route::get('/administrations/utilisateurs', 'AdministrationController@indexUtilisateur')->name('administration.utilisateurs');;
Route::get('/administrations/{utilisateur}/utilisateur/edit', 'AdministrationController@edit')->name('administration.utilisateurs.edit');;
Route::get('/administrations/{utilisateur}/utilisateur/show', 'AdministrationController@show')->name('administration.utilisateurs.show');;
Route::get('/administrations/utilisateur/create', 'AdministrationController@create')->name('administration.utilisateurs.create');;
Route::post('/administrations/utilisateur/store', 'AdministrationController@store')->name('administration.utilisateurs.store');;
Route::post('/administrations/{utilisateur}/utilisateurs', 'AdministrationController@update')->name('administration.utilisateurs.update');;

Route::get('/dossier-prestataires', 'DossierPrestataireController@index')->name('dossier-prestataire.home');
Route::post('/dossier-prestataires/store', 'DossierPrestataireController@store')->name('dossier-prestataire.store');
Route::get('/dossier-prestataires/create', 'DossierPrestataireController@create')->name('dossier-prestataire.create');


Route::get('/dossier-benefiaires', 'DossierBeneficiaireController@index')->name('dossier-beneficiaire.home');
Route::post('/dossier-benefiaires/store', 'DossierBeneficiaireController@store')->name('dossier-beneficiaire.store');
Route::get('/dossier-benefiaires/create', 'DossierBeneficiaireController@create')->name('dossier-beneficiaire.create');

Route::get('/gestionnaires/prestataire', 'GestionnaireController@indexPrestataire')->name('gestionnaire.prestataire');
Route::get('/gestionnaires/beneficiaire', 'GestionnaireController@indexBeneficiaire')->name('gestionnaire.beneficiaire');
Route::get('/gestionnaires/{id}/prestataire', 'GestionnaireController@showPrestataire')->name('gestionnaire.prestataire.show');
Route::get('/gestionnaires/{id}/benficiaire', 'GestionnaireController@showBeneficiaire')->name('gestionnaire.beneficiaire.show');

Route::post('/individus', 'IndividuController@store')->name('individu.store');


Route::post('/document/upload/store', 'DocumentUploadController@fileStore')->name('document.fileStore');
Route::post('/document/delete', 'DocumentUploadController@fileDestroy')->name('document.fileDestroy');
Route::get('/document/{id}/files', 'DocumentUploadController@fileRetrieve')->name('document.fileRetrieve');


Route::post('/employeurs', 'EmployeurController@store')->name('employeur.store');
Route::post('/compet-ling-experts', 'CompetenceLinguistiqueExpertController@store')->name('compet-ling-expert.store');
Route::post('/type-prest-dis', 'TypePrestationDispenseeController@store')->name('type-prest-dis.store');
Route::post('/ref-client-exps', 'ReferenceClientExpertController@store')->name('ref-client-exps.store');
Route::post('/exp-chaine-valeur-exps', 'ExperienceChaineValeurExpertController@store')->name('exp-chaine-valeur-exps.store');

Route::post('/compte-utilisateurs', 'CompteUtilisateurController@store');
Route::get('/compte-utilisateurs/{compteUtilisateur}/profile', 'CompteUtilisateurController@show')->name('profile.show');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
