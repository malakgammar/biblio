<?php
namespace App\Http\Controllers; 
 
use App\Models\Livre; 
use Illuminate\Http\Request; 
use App\Models\Categorie;
use Illuminate\Support\Facades\Storage; // à utiliser pour le stockage

class LivreController extends Controller 
{ 
    public function index(Request $request) 
    { 
        $search = $request->input('search');
        
        $livres = Livre::when($search, function ($query) use ($search) {
            return $query->where('nomlivre', 'like', "%{$search}%")
                         ->orWhere('nomauteur', 'like', "%{$search}%");
        })->get(); 
        
        return view('livres.index', compact('livres')); 
    }
 
    public function create() 
    { 
        $categories = Categorie::all();
        return view('livres.create', compact('categories')); 
    } 
 
    public function store(Request $request) 
    { 
        $request->validate([ 
            'nomlivre'    => 'required', 
            'nomauteur'   => 'required', 
            'description' => 'nullable', 
            'date_pub'    => 'required|date',
            'categorie_id'=> 'required|exists:categories,id',
            'image'       => 'nullable|image|max:2048' // validation de l'image (max 2Mo)
        ]); 
        
        $data = $request->all();
        
        if ($request->hasFile('image')) {
            // Stocker l'image dans le dossier "public/images"
            $data['image'] = $request->file('image')->store('images', 'public');
        }
        
        Livre::create($data); 
 
        return redirect()->route('livres.index')->with('success', 'Livre créé avec succès.'); 
    } 
 
    public function show(Livre $livre) 
    { 
        return view('livres.show', compact('livre')); 
    } 
 
    public function edit(Livre $livre) 
    { 
        $categories = Categorie::all();
        return view('livres.edit', compact('livre', 'categories'));
    } 
 
    public function update(Request $request, Livre $livre) 
    { 
        $request->validate([
            'nomlivre'    => 'required', 
            'nomauteur'   => 'required', 
            'description' => 'nullable',
            'date_pub'    => 'required|date',
            'categorie_id'=> 'required|exists:categories,id',
            'image'       => 'nullable|image|max:2048'
        ]);
        
        $data = $request->all();
        
        if ($request->hasFile('image')) {
            // Optionnel : Supprimer l'ancienne image si elle existe
            if ($livre->image) {
                Storage::disk('public')->delete($livre->image);
            }
            $data['image'] = $request->file('image')->store('images', 'public');
        }
 
        $livre->update($data); 
 
        return redirect()->route('livres.index')->with('success', 'Livre mis à jour avec succès.'); 
    } 
 
    public function destroy(Livre $livre) 
    { 
        // Optionnel : Supprimer l'image associée
        if ($livre->image) {
            Storage::disk('public')->delete($livre->image);
        }
        $livre->delete(); 
 
        return redirect()->route('livres.index')->with('success', 'Livre supprimé avec succès.'); 
    } 
}
