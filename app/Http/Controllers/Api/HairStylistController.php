<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\HairStylistResourceCollection;
use App\Models\HairStylist;
use Illuminate\Http\Request;

class HairStylistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stylist = HairStylist::all();
        return (new HairStylistResourceCollection($stylist))->response();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HairStylist  $hairStylist
     * @return \Illuminate\Http\Response
     */
    public function show(HairStylist $hairStylist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HairStylist  $hairStylist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HairStylist $hairStylist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HairStylist  $hairStylist
     * @return \Illuminate\Http\Response
     */
    public function destroy(HairStylist $hairStylist)
    {
        //
    }
}
