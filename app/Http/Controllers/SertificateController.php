<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;

use App\Models\{SertificateDiscriptions, Sertificate};


use chillerlan\QRCode\{QRCode, QROptions};
use chillerlan\QRCode\Data\QRMatrix;
use chillerlan\QRCode\Output\QRGdImagePNG;


class SertificateController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->query();
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
            'sertificate_discription_id' => ['required', 'exists:sertificate_discriptions,id']
        ]);
        $result['uuid'] = (string) Str::uuid();

        Sertificate::create($result);

        return $request->input('redirect') ? Redirect::route('sertificates.create') : Redirect::route('sertificates.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $sertificateDiscriptions = Sertificate::where('id', $id)->first() ?? abort(404);
        $qrcode = $this->qrcodegenerate( 
            (string) route('sertificate', $sertificateDiscriptions['uuid']) 
        );

        return view('sertificates.show', 
                ['sertificat' => $sertificateDiscriptions,
                'qrcode' => $qrcode
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

        return Redirect::route('sertificates.index');
    }

    public function qrcodegenerate(string $text)
    {

        $options = new QROptions;

        $options->version             = 7;
        $options->outputInterface     = QRGdImagePNG::class;
        $options->scale               = 20;
        $options->outputBase64        = true;
        $options->bgColor             = [200, 150, 200];
        $options->imageTransparent    = true;
        #$options->transparencyColor   = [233, 233, 233];
        $options->drawCircularModules = true;
        $options->drawLightModules    = true;
        $options->circleRadius        = 0.4;
        $options->keepAsSquare        = [
            QRMatrix::M_FINDER_DARK,
            QRMatrix::M_FINDER_DOT,
            QRMatrix::M_ALIGNMENT_DARK,
        ];
        $options->moduleValues        = [
            // finder
            QRMatrix::M_FINDER_DARK    => [0, 63, 255], // dark (true)
            QRMatrix::M_FINDER_DOT     => [0, 63, 255], // finder dot, dark (true)
            QRMatrix::M_FINDER         => [233, 233, 233], // light (false), white is the transparency color and is enabled by default
            // alignment
            QRMatrix::M_ALIGNMENT_DARK => [255, 0, 255],
            QRMatrix::M_ALIGNMENT      => [233, 233, 233],
            // timing
            QRMatrix::M_TIMING_DARK    => [255, 0, 0],
            QRMatrix::M_TIMING         => [233, 233, 233],
            // format
            QRMatrix::M_FORMAT_DARK    => [67, 159, 84],
            QRMatrix::M_FORMAT         => [233, 233, 233],
            // version
            QRMatrix::M_VERSION_DARK   => [62, 174, 190],
            QRMatrix::M_VERSION        => [233, 233, 233],
            // data
            QRMatrix::M_DATA_DARK      => [0, 0, 0],
            QRMatrix::M_DATA           => [233, 233, 233],
            // darkmodule
            QRMatrix::M_DARKMODULE     => [0, 0, 0],
            // separator
            QRMatrix::M_SEPARATOR      => [233, 233, 233],
            // quietzone
            QRMatrix::M_QUIETZONE      => [233, 233, 233],
            // logo (requires a call to QRMatrix::setLogoSpace()), see QRImageWithLogo
            QRMatrix::M_LOGO           => [233, 233, 233],
        ];


        $out = (new QRCode($options))->render($text);



        return $out;
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
        
        $sertificate = Sertificate::where('uuid', $uuid)->first() ?? abort(404);
        $qrcode = $this->qrcodegenerate( (string) route('sertificate', $sertificate['uuid']) );
        return view('sertificates.user');
    }
}
