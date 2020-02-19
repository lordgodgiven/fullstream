<?php

namespace App\Http\Controllers;


use App\Models\DocumentUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentUploadController extends Controller
{
    public function fileStore(Request $request)
    {
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
