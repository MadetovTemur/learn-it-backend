<?php


namespace App\Http\Controllers;


use App\Models\{SertificateDiscriptions, Sertificate};

class MainController extends Controller
{

	public function index()
	{
		$yearData = [];

		for ($i = 1; $i <= \Carbon\Carbon::now()->month; $i++) {
			$yearData[] = Sertificate::whereYear('created_at', \Carbon\Carbon::now()->year)
				->whereMonth('created_at', $i)->count();
		}

		return view('dashboard',
			[
				'counts' => Sertificate::all()->count(),
				'chart_1' => $yearData,
				'prosetn' => 0
			]
		);
	}


}