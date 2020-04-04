<?php


namespace App\Http\Controllers\Api;


use App\Models\DossierBeneficiaire;
use Illuminate\Support\Facades\DB;

class BeneficiaireController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beneficiaires = DossierBeneficiaire::select('id', DB::raw("CONCAT(nom,' ',prenom) as info"))
            ->pluck('info', 'id');

        return response()->json($beneficiaires);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $beneficiaire = DossierBeneficiaire::where('id', $id)->get()->first();

        return response()->json($beneficiaire);
    }
}
