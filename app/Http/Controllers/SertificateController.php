<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;

use App\Models\{SertificateDiscriptions, Sertificate};


class SertificateController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sertificates = Sertificate::paginate(50);

        return view('sertificates.index', ['sertificates' 
                                        => $sertificates]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sertificates.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $result = $request->validate([
            'full_name' => ['required', 'max:255'],
            'telephone' => ['nullable', 'unique:sertificates,telephone'],
            'discription' => ['required']
        ]);
        $result['uuid'] = (string) Str::uuid();

        Sertificate::create($result);

        return  response()->json([
            'response' => 'ok',
            'csrf-token' => csrf_token()
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $sertificateDiscriptions = Sertificate::where('id', $id)->first() ?? abort(404);

        return view('sertificates.show', 
                ['sertificat' => $sertificateDiscriptions
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sertificate = Sertificate::where('id', $id)->first() ?? abort(404);

        return view('sertificates.edit', ['sertificate' => $sertificate]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $result = $request->validate([
            'full_name' => ['required', 'max:255'],
            'sertificate_discription_id' => ['required', 'exists:sertificate_discriptions,id']
        ]);

        $sertificate = Sertificate::where('id', $id)->first() ?? abort(404);
        $sertificate->update($result);

        return Redirect::route('sertificates.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        

        $sertificate = Sertificate::where('id', $id)->first() ?? abort(404);
        
        $sertificate->delete();

        return Redirect::route('sertificates.index');
    }

    public function viewUser(string $uuid)
    {
        Str::isUuid($uuid) ?? abort(404);

        return view('sertificates.user', 
                ['sertificat' => Sertificate::where('uuid', $uuid)->first() ?? abort(404)
            ]);
    }
}
