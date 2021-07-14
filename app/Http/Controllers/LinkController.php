<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\Group;
use App\Models\Variable;
use Illuminate\Http\Request;
use PHPUnit\TextUI\XmlConfiguration\Groups;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('link.index', [
            'items' => $this->replaceVariables(
                Link::with('group')
                    ->get()
                    ->sortBy(function ($link) {
                        return strtoupper("{$link->group->name}{$link->name}");
                    })
                    ->values()
                    ->all()
            )
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required',
            'href' => 'required',
            'id_group' => 'required',
        ]);
//        return $request->all();
        Link::create($request->all());
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function show(Link $link)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function edit(Link $link)
    {
        return view('link.edit', compact('link'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Link $link)
    {
        $request['public'] = $request->input("public") ? $request['public'] : "0";
        $request->validate([
            'name' => 'required',
            'href' => 'required',
            'public' => 'required',
        ]);
        $link->update($request->all());
        return redirect()->route('group.show', ['group' => $link->id_group]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function destroy(Link $link)
    {
        $link->delete();
        return $this->return();
    }

    public function return(){
        return back();
    }

    public function replaceVariables($links){
        $variables = Variable::all();
        foreach ($links as $l) {
            foreach ($variables as $v) {
                $l->href = str_replace($v->key, $v->value, $l->href);
            }
        }
        return $links;
    }
}
