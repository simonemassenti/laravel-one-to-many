<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePortfolioRequest;
use App\Http\Requests\UpdatePortfolioRequest;
use App\Models\Portfolio;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$portfolios = Portfolio::all();
		return view('admin.portfolios.index', compact('portfolios'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
        $types = Type::all();
		return view('admin.portfolios.create', compact('types'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StorePortfolioRequest $request)
	{
		$form_data = $request->validated();
        
		$portfolio = new Portfolio;
		$portfolio->fill($form_data);
        //Se i dati del form contengono un file chiamato cover_image 
        //Allora salviamo in $img_path il percorso per il file caricato
        //E il percorso lo salviamo nel DB nella colonna cover_image
        if($request->hasFile('cover_image')){
           $img_path = Storage::put('portfolio_images', $request->cover_image); 
           $portfolio->cover_image = $img_path;
        }
        
		$portfolio->save();

		return redirect()->route('admin.portfolios.show', ['portfolio' => $portfolio->slug]);

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  Portfolio  $portfolio
	 * @return \Illuminate\Http\Response
	 */
	public function show(Portfolio $portfolio)
	{
		return view('admin.portfolios.show', compact('portfolio'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Portfolio $portfolio)
	{
        $types = Type::all();
		return view('admin.portfolios.edit', compact('portfolio'), compact('types'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  Portfolio  $portfolio
	 * @return \Illuminate\Http\Response
	 */
	public function update(UpdatePortfolioRequest $request, Portfolio $portfolio)
	{
		$form_data = $request->all();
		$portfolio->update($form_data);

		return redirect()->route('admin.portfolios.show', ['portfolio' => $portfolio->slug]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Portfolio $portfolio)
	{
		$portfolio->delete();
		return redirect()->route('admin.portfolios.index')->with('message', " Il portfolio: \"$portfolio->title\" è stato eliminato");
	}
}
