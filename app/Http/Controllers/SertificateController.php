<?php

namespace App\Http\Controllers;

use App\Models\{SertificateDiscriptions, Sertificate};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;


class SertificateController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        
        return view('sertificates.index', 
            [   'sertificates' =>  isset($query['q']) && !empty($query['q']) ? $this->filters($request) : $this->sort($request)     ]
        );
    }

    private function sort1(Request $request)
    {
        $query = $request->query();

        // Сортировка
        $sortKey = $query['sort'] ?? null;
        $sortDirection = $sortKey && $sortKey[0] === '-' ? 'desc' : 'asc';
        $sortColumn = $sortKey ? ltrim($sortKey, '-') : null;

        return Sertificate::when($sortColumn, function ($query, $sortColumn) use ($sortDirection) {
            return $query->orderBy($sortColumn, $sortDirection);
        })->paginate(80);
    }

    private function sort(Request $request)
    {
        $query = $request->query();

        // Сортировка
        $sortKey = $query['sort'] ?? null;
        $sortDirection = $sortKey && $sortKey[0] === '-' ? 'desc' : 'asc';
        $sortColumn = $sortKey ? ltrim($sortKey, '-') : null;

        // Создаем уникальный ключ кэша на основе параметров сортировки
        $cacheKey = 'sorted_certificates_' . md5(json_encode( $query ));

        // Проверяем наличие кэшированных результатов
        return Cache::remember($cacheKey, now()->addHours(1), function () use ($sortColumn, $sortDirection) {
            return Sertificate::when($sortColumn, function ($query) use ($sortColumn, $sortDirection) {
                return $query->orderBy($sortColumn, $sortDirection);
            })->paginate(80);
        });
    }

     // Фильтрация
    private function filters(Request $request)
    {
        $query = $request->query();

        // Фильтрация
        $searchQuery = htmlspecialchars($query['q']);

        $q = $query['q'];

        // Проверка наличия закэшированных результатов
        $cacheKey = 'search_results_' . md5($searchQuery);
        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        if (!strpos($searchQuery, ':')) {
            $results = Sertificate::where('full_name', 'like', '%' . $searchQuery. '%')->orWhere('id', $searchQuery)
                ->orWhere('telephone', 'like', '%' . $searchQuery . '%')
                // ->orWhereRaw("DATE_FORMAT(created_at, '%m.%d.%Y') LIKE ?", ['%' . $searchQuery . '%']) // ! TODO this bag
                ->get();
        } else {
            [$key, $value] = explode(':', $searchQuery);

            if ($key == 'id') {
                $results = Sertificate::where($key, $value)->get();
            } elseif ($key == 'date' || $key == 'created_at') {
                $results = Sertificate::orWhereRaw("DATE_FORMAT(created_at, '%m.%d.%Y') LIKE ?", ['%' . $value . '%'])
                    ->get();
            } else {
                $results = Sertificate::where($key, 'like', '%' . $value . '%')->get();
            }
        }

        // Кэширование результатов на 1 час (или любое другое удобное вам время)
        Cache::put($cacheKey, $results, now()->addHours(1));
        return $results;
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
        Cache::clear();

        return response()->json([
            'response' => 'ok'
        ], 201);
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
        Cache::clear();

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
            [ 'sertificat' => Sertificate::where('uuid', $uuid)->first() ?? abort(404)
        ]);
    }

    
}
