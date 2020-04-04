<?php

namespace App\Http\Controllers;


use App\Models\AssembleeGenerale;
use App\Models\Cluster;
use App\Models\DocumentUpload;
use App\Models\ProjetCluster;
use App\Models\ReunionProjet;
use App\Traits\ImageUploaderTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DocumentUploadController extends Controller
{
    use ImageUploaderTrait;

    public function fileStore(Request $request)
    {

        if ($request->has('file')) {
            if ($request->has('identite')) {
                $document = $request->file('file');
                $name = Str::slug('identite' . '_' . Auth::user()->id . '_' . Auth::user()->nom . '_' . Auth::user()->prenom . '_' . time());
                $folder = '/documents/cluster/identite';
                $this->uploadOne($document, $folder, 'uploads', $name);
                $doc = new DocumentUpload();
                $doc->filename = $name . '.' . $document->getClientOriginalExtension();
                $doc->compte_utilisateur_id = Auth::user()->id;
                $doc->save();
                Cluster::where('compte_utilisateur_id', Auth::user()->id)->update(['document_upload_id' => $doc->id]);
                return response()->json(['success' => $name]);
            }

            if ($request->has('assemblee_generale')) {
                $document = $request->file('file');
                $name = Str::slug('assemblee-generale' . '_' . Auth::user()->id . '_' . Auth::user()->nom . '_' . Auth::user()->prenom . '_' . time());
                $folder = '/documents/cluster/assemblee_generale';
                $this->uploadOne($document, $folder, 'uploads', $name);
                $doc = new DocumentUpload();
                $doc->filename = $name . '.' . $document->getClientOriginalExtension();
                $doc->compte_utilisateur_id = Auth::user()->id;
                $doc->save();
                $cluster = Cluster::where('compte_utilisateur_id', Auth::user()->id)->get()->first();
                AssembleeGenerale::where('cluster_beneficiaire_id', $cluster->id)->update(['document_upload_id' => $doc->id]);
                return response()->json(['success' => $name]);
            }

            if ($request->has('projet_cluster')) {
                $document = $request->file('file');
                $name = Str::slug('projet-cluster' . '_' . Auth::user()->id . '_' . Auth::user()->nom . '_' . Auth::user()->prenom . '_' . time());
                $folder = '/documents/cluster/projet_cluster';
                $this->uploadOne($document, $folder, 'uploads', $name);
                $doc = new DocumentUpload();
                $doc->filename = $name . '.' . $document->getClientOriginalExtension();
                $doc->compte_utilisateur_id = Auth::user()->id;
                $doc->save();
                $cluster = Cluster::where('compte_utilisateur_id', Auth::user()->id)->get()->first();
                ProjetCluster::where('cluster_beneficiaire_id', $cluster->dossier_beneficiaire_id)->update(['document_upload_id' => $doc->id]);
                return response()->json(['success' => $name]);
            }

            if ($request->has('reunion_projet_cluster')) {
                $document = $request->file('file');
                $name = Str::slug('reunion-projet-cluster' . '_' . Auth::user()->id . '_' . Auth::user()->nom . '_' . Auth::user()->prenom . '_' . time());
                $folder = '/documents/cluster/reunion_projet_cluster';
                $this->uploadOne($document, $folder, 'uploads', $name);
                $doc = new DocumentUpload();
                $doc->filename = $name . '.' . $document->getClientOriginalExtension();
                $doc->compte_utilisateur_id = Auth::user()->id;
                $doc->save();
                $cluster = Cluster::where('compte_utilisateur_id', Auth::user()->id)->get()->first();
                $projetCluster = ProjetCluster::where('cluster_beneficiaire', $cluster->id)->get()->first();
                ReunionProjet::where('projet_cluster_id', $projetCluster->id)->update(['document_upload_id' => $doc->id]);
                return response()->json(['success' => $name]);
            }

            if ($request->has('demande_prestations')) {
                $document = $request->file('file');
                $name = Str::slug('demande-prestations' . '_' . Auth::user()->id . '_' . Auth::user()->nom . '_' . Auth::user()->prenom . '_' . time());
                $folder = '/documents/prestation/demande_prestations';
                $this->uploadOne($document, $folder, 'uploads', $name);
                $doc = new DocumentUpload();
                $doc->filename = $name . '.' . $document->getClientOriginalExtension();
                $doc->compte_utilisateur_id = Auth::user()->id;
                $doc->save();
                return response()->json(['success' => $name]);
            }

        }
        $image = $request->file('file');
        $fileOwner = Auth::user()->id;
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('documents'), $imageName);

        $imageUpload = new DocumentUpload();
        $imageUpload->filename = $imageName;
        $imageUpload->compte_utilisateur_id = $fileOwner;
        $imageUpload->save();

        return response()->json(['success' => $imageName]);
    }

    public function fileDestroy(Request $request)
    {
        $filename = $request->get('filename');
        DocumentUpload::where('filename', $filename)->delete();
        $path = public_path() . '/documents/' . $filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;
    }

    public function fileRetrieve($id)
    {
        $filenames = DocumentUpload::where('compte_utilisateur_id', $id)->get();
        $path = public_path() . '/documents/' . $filenames;

        return view('prestataire.profile', compact('filenames'));

    }
}
