<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use App\Rules\FilterRule;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    protected $rules = [
        'name' => ['required','string','between:2,255','filter'],
        'parent_id' => ['nullable','int','exists:categories,id'],
        'description' => ['required','string'],
        'art_file' => ['nullable','mimes:png,jpg,jpeg'],
    ];

    public function index($slug , $id = 0)
    {
        // $categories = DB::table('categories')->get();
        $categories = Category::leftJoin('categories as parents','parents.id','=','categories.parent_id')
            ->select([
                'categories.*',
                'parents.name as parent_name',
            ])->paginate(3);


        $title = 'Categories';

        return view('categories.index',compact('categories','title'));

    }

    public function show(Category $category)
    {

        // $category = Category::findOrFail($id);

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

        // $request->validate($this->rules);
        // $category = new Category();
        // $category->name = $request->input('name');
        // $category->description = $request->input('description');
        // $category->parent_id = $request->input('parent_id');
        // $category->slug = Str::slug($category->name);
        // $category->save();

        $data = $request->all();

        if (! $data['slug']){
            $data['slug'] = Str::slug($data['name']);
        }
        $category = Category::create($data);

        return redirect()
        ->route('categories.index')
        ->with('success','Category Created successfully!'); //PRG
    }

    public function edit(Category $category)
    {

        // $category = Category::findOrFail($id);
        $parents = Category::get();

        return view('categories.edit',compact('category','parents'));
    }

    public function update(Request $request,Category $category)
    {
        $request->validate($this->rules);
        // $category = Category::findOrFail($id);
        // $category->name = $request->input('name');
        // $category->description = $request->input('description');
        // $category->parent_id = $request->input('parent_id');
        // $category->slug = Str::slug($category->name);
        // $category->save();

        $category->update($request->all());

        return redirect()
        ->route('categories.index')
        ->with('success','Category Updated successfully!'); //PRG
    }

    public function destroy(Category $category)
    {

        Category::destroy($category);
        return redirect()
        ->route('categories.index')
        ->with('success','Category Deleted successfully!');

    }
}
