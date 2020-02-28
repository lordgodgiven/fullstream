<?php


Route::get('/passgenerator', function () {
    return bcrypt('admin');
});
Route::get('/', 'welcomeController@home')->name('home');

Route::get('/administrations', 'AdministrationController@index')->name('administration.home');
Route::get('/administrations/utilisateurs', 'AdministrationController@indexUtilisateur')->name('administration.utilisateurs');
Route::get('/administrations/{utilisateur}/utilisateur/edit', 'AdministrationController@edit')->name('administration.utilisateurs.edit');
Route::get('/administrations/{utilisateur}/utilisateur/show', 'AdministrationController@show')->name('administration.utilisateurs.show');
Route::get('/administrations/utilisateur/create', 'AdministrationController@create')->name('administration.utilisateurs.create');
Route::post('/administrations/utilisateur/store', 'AdministrationController@store')->name('administration.utilisateurs.store');
Route::post('/administrations/{utilisateur}/utilisateurs', 'AdministrationController@update')->name('administration.utilisateurs.update');

Route::get('/gestionnaires', 'GestionnaireController@index')->name('gestionnaire.home');
Route::get('/gestionnaires/prestataire/accreditation-niveau-1', 'GestionnaireController@indexAccreditationNiveau1')->name('gestionnaire.accreditation_level_one');
Route::get('/gestionnaires/prestataire/{id}/accreditation-niveau-1', 'GestionnaireController@PrestataireAccreditationNiveau1')->name('gestionnaire.prestataire.accreditation_level_one');
Route::post('/gestionnaires/prestataire/{id}/accreditation-niveau-1', 'GestionnaireController@accreditationNiveau1Store')->name('gestionnaire.prestataire.store.accreditation_level_one');

Route::get('/gestionnaires/prestataire/accreditation-niveau-2', 'GestionnaireController@indexAccreditationNiveau2')->name('gestionnaire.accreditation_level_two');
Route::get('/gestionnaires/prestataire/{id}/accreditation-niveau-2', 'GestionnaireController@PrestataireAccreditationNiveau2')->name('gestionnaire.prestataire.accreditation_level_two');
Route::post('/gestionnaires/prestataire/{id}/accreditation-niveau-2', 'GestionnaireController@accreditationNiveau2Store')->name('gestionnaire.prestataire.store.accreditation_level_two');

Route::get('/gestionnaires/prestataire', 'GestionnaireController@indexPrestataire')->name('gestionnaire.prestataire');
Route::get('/gestionnaires/beneficiaire', 'GestionnaireController@indexBeneficiaire')->name('gestionnaire.beneficiaire');
Route::get('/gestionnaires/{id}/prestataire', 'GestionnaireController@showPrestataire')->name('gestionnaire.prestataire.show');
Route::get('/gestionnaires/{id}/benficiaire', 'GestionnaireController@showBeneficiaire')->name('gestionnaire.beneficiaire.show');

Route::post('/gestionnaires/{id}/prestataire', 'GestionnaireController@eligibilitePrestataire')->name('gestionnaire.prestataire.eligibilite');
Route::post('/gestionnaires/{id}/beneficiaire', 'GestionnaireController@eligibiliteBeneficiaire')->name('gestionnaire.beneficiaire.eligibilite');

Route::get('/dossier-prestataires', 'DossierPrestataireController@index')->name('dossier-prestataire.home');
Route::post('/dossier-prestataires/store', 'DossierPrestataireController@store')->name('dossier-prestataire.store');
Route::get('/dossier-prestataires/create', 'DossierPrestataireController@create')->name('dossier-prestataire.create');
Route::patch('/dossier-prestataires/{id}', 'DossierPrestataireController@update')->name('dossier-prestataire.update');

Route::get('/dossier-benefiaires', 'DossierBeneficiaireController@index')->name('dossier-beneficiaire.home');
Route::post('/dossier-benefiaires/store', 'DossierBeneficiaireController@store')->name('dossier-beneficiaire.store');
Route::get('/dossier-benefiaires/create', 'DossierBeneficiaireController@create')->name('dossier-beneficiaire.create');
Route::patch('/dossier-benefiaires/{id}', 'DossierBeneficiaireController@update')->name('dossier-beneficiaire.update');


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
Route::post('/compte-utilisateurs/profile', 'CompteUtilisateurController@updatePhoto')->name('profile.update');

Auth::routes();

