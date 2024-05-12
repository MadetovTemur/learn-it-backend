<?php 


namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;


use App\Models\{SertificateDiscriptions, Sertificate};

class MainController extends Controller
{

	public function index()
	{
		$yearData = [];
		// $yearData['year'] = Sertificate::whereYear('created_at', \Carbon\Carbon::now()->year)->count();
		# whereMonth('created_at', \Carbon\Carbon::now()->month)
		for ($i = 1; $i <= \Carbon\Carbon::now()->month; ++$i) {
			$yearData[] = Sertificate::whereYear('created_at', \Carbon\Carbon::now()->year)
						->whereMonth('created_at', $i)->count();
		}	

		// dd($yearData);
		return view('dashboard',
			[
				'counts' => Sertificate::all()->count(),
				'chart_1'=> $yearData
			]
		);
	}



}