<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePortfolioRequest;
use App\Http\Requests\UpdatePortfolioRequest;
use App\Models\Portfolio;
use Illuminate\Http\Request;
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
		return view('admin.portfolios.create');
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
		return view('admin.portfolios.edit', compact('portfolio'));
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
