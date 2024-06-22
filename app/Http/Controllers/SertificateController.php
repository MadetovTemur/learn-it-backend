<?php

namespace App\Http\Controllers;

use App\Models\{SertificateDiscriptions, Sertificate};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Str;


class SertificateController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index1(Request $request)
    {
        $query = $request->query();

        if (array_key_exists('sort', $query) and empty($query['sort'])) {
            $sertificates = Sertificate::paginate(50);
        } else if(array_key_exists('sort', $query) and $query['sort'][0] == '-') {
            $sertificates = Sertificate::orderByDesc(str_replace('-', '', $query['sort']))->paginate(50);
        }elseif(array_key_exists('sort', $query)) {
            $sertificates = Sertificate::orderBy($query['sort'])->paginate(50);
        } else {
            $sertificates = Sertificate::paginate(50);
        }

        if (array_key_exists('q', $query) and !empty($query['q'])) {
            $q = $query['q'];
            if(!strpos($q, ':')) {

                $sertificates = Sertificate::where('full_name', 'like', '%'.$q.'%')
                    ->orWhere('id', $q)
                    ->orWhere('telephone', 'like', '%'.$q.'%')
                    ->orWhereRaw("DATE_FORMAT(created_at, '%m.%d.%Y') LIKE ?", ['%' . $q . '%'])   
                    ->get();
            }else {
                [$key, $value] = explode(':', $q);
                if($key == 'id') {
                    $sertificates = Sertificate::where($key,  $value)->get();
                }elseif($key == 'date' or $key == 'created_at') { 
                    $sertificates = Sertificate::orWhereRaw("DATE_FORMAT(created_at, '%m.%d.%Y') LIKE ?", ['%' . $value . '%'])   
                        ->get();
                }else {
                    $sertificates = Sertificate::where($key, 'like', '%'.$value.'%')->get();
                }
                
            }
           
        }
        // dd($sertificate);
        return view('sertificates.index', ['sertificates' 
                                        => $sertificates]);
    }

    public function index(Request $request)
    {
        $query = $request->query();

        // Сортировка
        $sortKey = $query['sort'] ?? null;
        $sortDirection = $sortKey && $sortKey[0] === '-' ? 'desc' : 'asc';
        $sortColumn = $sortKey ? ltrim($sortKey, '-') : null;

        $sertificates = Sertificate::when($sortColumn, function ($query, $sortColumn) use ($sortDirection) {
            return $query->orderBy($sortColumn, $sortDirection);
        })->paginate(50);

        // Фильтрация
        if (isset($query['q']) && !empty($query['q'])) {
            $searchQuery = $query['q'];
            // Обработка фильтрации...
            // Добавьте соответствующую логику для фильтрации поискового запроса

            $q = $query['q'];
            if(!strpos($q, ':')) {

                $sertificates = Sertificate::where('full_name', 'like', '%'.$q.'%')
                    ->orWhere('id', $q)
                    ->orWhere('telephone', 'like', '%'.$q.'%')
                    ->orWhereRaw("DATE_FORMAT(created_at, '%m.%d.%Y') LIKE ?", ['%' . $q . '%'])   
                    ->get();
            }else {
                [$key, $value] = explode(':', $q);
                if($key == 'id') {
                    $sertificates = Sertificate::where($key,  $value)->get();
                }elseif($key == 'date' or $key == 'created_at') { 
                    $sertificates = Sertificate::orWhereRaw("DATE_FORMAT(created_at, '%m.%d.%Y') LIKE ?", ['%' . $value . '%'])   
                        ->get();
                }else {
                    $sertificates = Sertificate::where($key, 'like', '%'.$value.'%')->get();
                }
                
            }
        }

        return view('sertificates.index', ['sertificates' => $sertificates]);
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
        $sertificate = Sertificate::where('id', $id)->first() ?? abort(404);

        $result = $request->validate([
            'full_name' => ['required', 'max:255'],
            'telephone' => ['nullable', 'unique:sertificates,telephone,' . $sertificate->id],
            'discription' => ['required']
        ]);

        $sertificate->update($result);

        return  response()->json([
            'response' => 'ok',
            'csrf-token' => csrf_token()
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sertificate = Sertificate::where('id', $id)->first() ?? abort(404);
        $sertificate->delete();

        return response()->json([
            'response' => 'ok',
            'id' => $id
        ], 200);
    }

    public function viewUser(string $uuid)
    {
        Str::isUuid($uuid) ?? abort(404);

        return view('sertificates.user', 
                ['sertificat' => Sertificate::where('uuid', $uuid)->first() ?? abort(404)
            ]);
    }

    
}
