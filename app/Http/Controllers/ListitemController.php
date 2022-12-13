<?php

namespace App\Http\Controllers;

use App\Models\Listitem;
use Illuminate\Http\Request;

class ListitemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response, [1]
     */
    public function index()
    {
        return Listitem::orderBy('created_at', 'ASC')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newItem = new Listitem;
        $newItem->text = $request['text'];
        $newItem->save();
        return $newItem;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Listitem  $listitem
     * @return \Illuminate\Http\Response
     */
    public function show(Listitem $listitem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Listitem  $listitem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Listitem $listitem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Listitem  $listitem
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $itemToDelete = Listitem::find($id);
        if ($itemToDelete) {
            $itemToDelete->delete();
            return "Deleted.";
        };

        return "Not found.";
    }
}
