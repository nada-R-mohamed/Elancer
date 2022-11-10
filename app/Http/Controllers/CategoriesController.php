<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Rules\FilterRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    protected $rules = [
        'name' => ['required','string','between:2,255','filter'],
        'parent_id' => ['nullable','int','exists:categories,id'],
        'description' => ['required','string'],
        'art_file' => ['nullable','mimes:png,jpg,jpeg'],
    ];
    public function index()
    {
        $categories = DB::table('categories')->get();
        // $category = Category::findOrFail();
        $title = 'Categories';

        return view('categories.index',compact('categories','title'));

    }

    public function show($id)
    {

        $category = Category::findOrFail($id);

        return view('categories.show',compact('category'));

    }

    public function create()
    {
        $parents = Category::all();
        $category=  new Category();

        return view('categories.create',compact('category','parents'));
    }

    public function store(Request $request)
    {

        $request->validate($this->rules);
        $category = new Category();
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->parent_id = $request->input('parent_id');
        $category->slug = Str::slug($category->name);
        $category->save();

        return redirect('/categories')->with('success','Category Created successfully!'); //PRG
    }

    public function edit($id)
    {

        $category = Category::findOrFail($id);
        $parents = Category::get();

        return view('categories.edit',compact('category','parents'));
    }

    public function update(Request $request,$id)
    {
        $request->validate($this->rules);
        $category = Category::findOrFail($id);
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->parent_id = $request->input('parent_id');
        $category->slug = Str::slug($category->name);
        $category->save();

        return redirect('/categories')->with('success','Category Updated successfully!'); //PRG
    }

    public function destroy($id)
    {

        Category::destroy($id);
        return redirect('/categories')->with('success','Category Deleted successfully!');

    }

    // protected function rules()
    // {
    //     $rules = $this->rules;
    //     $rules['name'][] = new FilterRule();

    //     return $rules;
    // }
}
