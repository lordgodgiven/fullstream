<?php


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
Route::get('/gestionnaires/prestataire/search', 'GestionnaireController@search')->name('gestionnaire.prestataire.search');
Route::get('/gestionnaires/prestataire/advanced-search', 'GestionnaireController@advancedSearch')->name('gestionnaire.prestataire.advanced.search');

Route::get('/gestionnaires/prestataire/accreditation-niveau-2', 'GestionnaireController@indexAccreditationNiveau2')->name('gestionnaire.accreditation_level_two');
Route::get('/gestionnaires/prestataire/{id}/accreditation-niveau-2', 'GestionnaireController@PrestataireAccreditationNiveau2')->name('gestionnaire.prestataire.accreditation_level_two');
Route::post('/gestionnaires/prestataire/{id}/accreditation-niveau-2', 'GestionnaireController@accreditationNiveau2Store')->name('gestionnaire.prestataire.store.accreditation_level_two');

Route::get('/gestionnaires/prestataire', 'GestionnaireController@indexPrestataire')->name('gestionnaire.prestataire');
Route::get('/gestionnaires/beneficiaire', 'GestionnaireController@indexBeneficiaire')->name('gestionnaire.beneficiaire');
Route::get('/gestionnaires/{id}/prestataire', 'GestionnaireController@showPrestataire')->name('gestionnaire.prestataire.show');
Route::get('/gestionnaires/{id}/benficiaire', 'GestionnaireController@showBeneficiaire')->name('gestionnaire.beneficiaire.show');
Route::get('/gestionnaires/cluster/create', 'GestionnaireController@createCluster')->name('gestionnaire-cluster.create');
Route::get('/gestionnaires/cluster/index', 'GestionnaireController@indexCluster')->name('gestionnaire-cluster.index');
Route::post('/gestionnaires/cluster/store', 'GestionnaireController@storeCluster')->name('gestionnaire-cluster.store');
Route::post('/gestionnaires/cluster/adhesion/store', 'GestionnaireController@storeClusterAdhesion')->name('gestionnaire-cluster-adhresion.store');

Route::post('/gestionnaires/{id}/prestataire', 'GestionnaireController@eligibilitePrestataire')->name('gestionnaire.prestataire.eligibilite');
Route::post('/gestionnaires/{id}/beneficiaire', 'GestionnaireController@eligibiliteBeneficiaire')->name('gestionnaire.beneficiaire.eligibilite');

Route::post('/gestionnaires/tdr/circuit-validation/store', 'GestionnaireController@storeCircuitValidation')->name('gestionnaire.tdr.circuit-validation.store');
Route::get('/gestionnaires/tdr/circuit-validation/index', 'GestionnaireController@indexTdr')->name('gestionnaire.tdr.circuit-validation.index');
Route::get('/gestionnaires/tdr/circuit-validation/{tdr}/show', 'GestionnaireController@showTdr')->name('gestionnaire.tdr.circuit-validation.show');
Route::get('/gestionnaires/tdr/circuit-validation/{tdr}/validation', 'GestionnaireController@showValidation')->name('gestionnaire.tdr.circuit-validation.validation');
Route::get('/gestionnaires/rapport-analyse/create', 'GestionnaireController@createRapportAnalyse')->name('gestionnaire.rapport.analyse.create');
Route::post('/gestionnaires/rapport-analyse/store', 'GestionnaireController@storeRapportAnalyse')->name('gestionnaire.rapport.analyse.store');
Route::get('/gestionnaires/contrats/create', 'GestionnaireController@createContrat')->name('gestionnaire.contrat.create');
Route::post('/gestionnaires/contrats/store', 'GestionnaireController@storeContrat')->name('gestionnaire.contrat.store');
Route::get('/gestionnaires/contribution-beneficiaire/create', 'GestionnaireController@createContributionBeneficiaire')->name('gestionnaire.contribution.beneficiaire.create');
Route::post('/gestionnaires/contribution-beneficiaire/store', 'GestionnaireController@storeContributionBeneficiaire')->name('gestionnaire.contribution.beneficiaire.store');

Route::get('/dossier-prestataires', 'DossierPrestataireController@index')->name('dossier-prestataire.home');
Route::post('/dossier-prestataires/store', 'DossierPrestataireController@store')->name('dossier-prestataire.store');
Route::get('/dossier-prestataires/create', 'DossierPrestataireController@create')->name('dossier-prestataire.create');
Route::patch('/dossier-prestataires/{id}', 'DossierPrestataireController@update')->name('dossier-prestataire.update');

Route::get('/dossier-benefiaires', 'DossierBeneficiaireController@index')->name('dossier-beneficiaire.home');
Route::post('/dossier-benefiaires/store', 'DossierBeneficiaireController@store')->name('dossier-beneficiaire.store');
Route::get('/dossier-benefiaires/create', 'DossierBeneficiaireController@create')->name('dossier-beneficiaire.create');
Route::patch('/dossier-benefiaires/{id}', 'DossierBeneficiaireController@update')->name('dossier-beneficiaire.update');
Route::get('/dossier-benefiaires/prestation/create', 'DossierBeneficiaireController@prestationCreate')->name('dossier-beneficiaire.prestation.create');
Route::get('/dossier-benefiaires/prestation/index', 'DossierBeneficiaireController@indexPrestation')->name('dossier-beneficiaire.prestation.index');
Route::post('/dossier-benefiaires/prestation/prestationStore', 'DossierBeneficiaireController@prestationStore')->name('dossier-beneficiaire.prestation.store');
Route::get('/dossier-benefiaires/tdr/create', 'DossierBeneficiaireController@createTdr')->name('dossier-benefiaires.tdr.create');
Route::get('/dossier-benefiaires/tdr/index', 'DossierBeneficiaireController@indexTdr')->name('dossier-benefiaires.tdr.index');
Route::get('/dossier-benefiaires/tdr/{tdr}/show', 'DossierBeneficiaireController@showTdr')->name('dossier-benefiaires.tdr.show');
Route::post('/dossier-benefiaires/tdr/store', 'DossierBeneficiaireController@storeTdr')->name('dossier-benefiaires.tdr.store');

Route::get('/cluster/create', 'ClusterController@create')->name('cluster-beneficiaire.create');
Route::post('/cluster/store', 'ClusterController@store')->name('cluster-beneficiaire.store');
Route::get('/cluster/index', 'ClusterController@index')->name('cluster-beneficiaire.index');
Route::get('/cluster/structuration/index', 'ClusterController@indexStructuration')->name('cluster-beneficiaire.structuration.index');
Route::get('/cluster/structuration/create', 'ClusterController@createStructuration')->name('cluster-beneficiaire.structuration.create');
Route::post('/cluster/structuration/store', 'ClusterController@storeStructuration')->name('cluster-beneficiaire.structuration.store');


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
Route::post('/compte-utilisateurs/password', 'CompteUtilisateurController@updatePassword')->name('password.update');

Route::post('/assemblee-generale/store', 'AssembleeGeneraleController@store')->name('assemblee-generale.store');
Route::post('/projet-cluster/store', 'ProjetClusterController@store')->name('projet-cluster.store');
Route::post('/risque-projet/store', 'RisqueProjetController@store')->name('risque-projet.store');
Route::post('/resultat-projet/store', 'ResultatProjetController@store')->name('resultat-projet.store');
Route::post('/reunion-projet/store', 'ReunionProjetController@store')->name('reunion-projet.store');
Route::post('/activite-projet/store', 'ActiviteProjetController@store')->name('activite-projet.store');
Route::post('/adhesion-cluster/store', 'AdhesionClusterController@store')->name('adhesion-cluster.store');

Auth::routes();

