<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Models\SertificateDiscriptions;

class SertificateDiscriptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // SertificateDiscriptions::factory(10)->create();
        $sertificateDiscriptions = SertificateDiscriptions::paginate(40);
        return view('discriptions.index', [
            'sertificateDiscriptions' => $sertificateDiscriptions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('discriptions.cerate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $result = $request->validate([
            'discription' => ['required']
        ]);
        
        SertificateDiscriptions::create($result);
        
        return Redirect::route('discriptions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(SertificateDiscriptions $sertificateDiscriptions)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sertificateDiscriptions = SertificateDiscriptions::where('id', $id)->first() ?? abort(404);
        return view('discriptions.edit', 
                ['sertificateDiscriptions' => $sertificateDiscriptions]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sertificateDiscriptions = SertificateDiscriptions::where('id', $id)->first();
        $result = $request->validate([
            'discription' => ['required']
        ]);

        if(is_null($sertificateDiscriptions)) {
            abort(404);
        }

        $sertificateDiscriptions->update($result);
        return Redirect::route('discriptions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
