<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getCategories()
    {
        $categories = Category::all();
        return view('admin.category.list', compact('categories'));
    }
    public function addCategory(Request $request)
    {
        // l validation des données
        $valideCategory = $request->validate([
            'name' => 'required|string'
        ]);
    // l'enregistrement de la catégorie dans la base de données
        Category::create($valideCategory);
        // redirection vers la liste des catégories avec un message de succès
        return redirect()->route('list-categories')->with('status', 'Category added successfully');

    }

    //la suppression d'une categorie dans la base de données
    public function deleteCategory($id)
    {
        $category = Category::find($id);// rrecupérer la catégorie à supprimer
        $category->delete();// supprimer la catégorie de la base de données
        return redirect()->route('list-categories')->with('status', 'Category deleted successfully');// redirection vers la liste des catégories avec un message de succès
    }

    public function editCategory(Request $request, $id) 
    {
        

    }
}
