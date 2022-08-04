<?php
  
namespace App\Http\Controllers;
   
use App\Models\Category;
use Illuminate\Http\Request;
  
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = category::latest()->paginate(5);
    
        return view('category.index',compact('category'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_product' => 'required',
        ]);
    
        category::create($request->all());
     
        return redirect()->route('category.index')
                        ->with('success','category created successfully.');
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        return view('category.edit',compact('categor'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        $request->validate([
            'category_product' => 'required',
        ]);
    
        $category->update($request->all());
    
        return redirect()->route('category.index')
                        ->with('success','categor updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\categor  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        $category->delete();
    
        return redirect()->route('category.index')
                        ->with('success','category deleted successfully');
    }
}