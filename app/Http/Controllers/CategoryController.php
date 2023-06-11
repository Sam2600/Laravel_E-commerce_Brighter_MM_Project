<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryCreateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();

        return view('category.index', compact("categories"));
    }


    public function create()
    {
        return view('category.create');
    }


    public function store(CategoryCreateRequest $request)
    {
        $image = $request->file('image');
        $imageName = uniqid()."_".$image->getClientOriginalName();
        $image->move(public_path() . "/uploads/", $imageName);

        $name = $request->input('name');

        $category = new Category();
        $category->name = $name;
        $category->image = $imageName;

        if ($category->save()) {
            return redirect()->route('categories.index');
        } else {
            return redirect()->back()->with("error", "Category creation process error");
        }
    }


    public function show(Category $category)
    {
        //
    }


    public function edit($id)
    {
        $category = Category::find($id);
        return view('category.edit', compact('category'));
    }


    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            "name" => "required",
        ]);

        if ($validate) {

            $category = Category::find($id);
            $category->name = $request->name;

            if ($request->hasFile("image")) {

                $image = $request->file('image');
                $imageName = uniqid()."_".$image->getClientOriginalName();
                $image->move(public_path() . "/uploads", $imageName);
                $category->image = $imageName;
            }

            if ($category->update()) {
                return redirect()->route('categories.index');

            } else {
                return redirect()->back()->with("error", "Category update process error");
            }
        }
    }


    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect()->route('categories.index');
    }
}
