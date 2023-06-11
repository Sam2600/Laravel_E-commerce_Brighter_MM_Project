<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryCreateRequest;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{

    public function index($id)
    {
        $category = Category::find($id)->load('subcategory');
        return view('subCategory.index', compact('category'));
    }


    public function create($id)
    {
        $category = Category::find($id);
        return view('subCategory.create', ["category" => $category]);
    }


    public function store(CategoryCreateRequest $request, $id)
    {
        $image = $request->file('image');
        $imageName = uniqid() . "_" . $image->getClientOriginalName();
        $image->move(public_path() . "/uploads/", $imageName);

        $name = $request->input('name');

        $category = new SubCategory();
        $category->category_id = $id; // This step is important
        $category->name = $name;
        $category->image = $imageName;

        if ($category->save()) {

            return redirect()->route('categories.subcategories.index', $id);
        } else {

            return redirect()->back()->with("error", "Sub category creation process error");
        }
    }


    public function show(SubCategory $subCategory)
    {
        //
    }


    public function edit(SubCategory $subCategory, $id)
    {
        $subcategory = SubCategory::find($id);
        return view('subCategory.edit', compact('subcategory'));
    }


    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            "name" => "required",
        ]);

        if ($validate) {

            $subcategory = SubCategory::find($id);

            $subcategory->name = $request->input('name');

            if ($request->hasFile('image')) {

                $file = $request->file('image');
                $fileName = uniqid() . "_" . $file->getClientOriginalName();
                $file->move(public_path() . "uploads/", $fileName);
                $subcategory->image = $fileName;
            }

            if ($subcategory->update()) {

                return redirect()->route('categories.subcategories.index', $subcategory->category_id);
            } else {

                return redirect()->back()->with('error', "Sub-category update process error");
            }
        }
    }


    public function destroy($id)
    {

        $category = SubCategory::find($id);
        $category->delete();
        return redirect()->route('categories.subcategories.index', $category->category_id);
    }
}
