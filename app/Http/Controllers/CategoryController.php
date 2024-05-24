<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Exception;

class CategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Retrieve categories with their children and order by ID
        $categories = Category::whereNull('parent_id')->with('children')->orderBy('id')->get();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Get a specific category by ID.
     *
     * @param  int  $id
     * @return \App\Models\Category
     */
    public function get($id)
    {
        return Category::find($id);
    }

    /**
     * Store a new category.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validation rules
        $rules = array(
            'name' => 'required'
        );

        // Validate the request data
        $validator = Validator::make($request->all(), $rules);

        // Check for validation failure
        if ($validator->fails()) {
            return redirect()->back()->withInput()->with(['status' => 'danger', 'message' => $validator->errors()->first()]);
        }

        try {
            // Create a new category instance
            $category = new Category();

            // Set parent category information if available
            if ($request->category != "") {
                $parentCat = $this->get($request->category);
                $category->parent_id = $request->category;
                $category->position = $parentCat->position + 1;
            }

            // Set category name and save
            $category->name = $request->name;
            $category->save();

            return redirect()->back()->with(['status' => 'success', 'message' => 'Category stored successfully']);
        } catch (Exception $e) {
            // Handle exception and redirect with an error message
            return redirect()->back()->withInput()->with(['status' => 'danger', 'message' => $e->getMessage()]);
        }
    }
}
