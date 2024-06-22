<!DOCTYPE html>
<html lang="uz">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="">
    <link rel="stylesheet" href="{{ asset('assets/certificates/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/certificates/logo.png') }}" type="png">
    <script type="text/javascript" src="{{ asset('assets/certificates/qr-code-styling.js') }}" charset="UTF-8"></script>
    <title>Просмотр сертификата</title>
</head>

<body id="img">
    <button type="button" id="dw_bt" class="btn" title="Download this certificate">СКАЧАТЬ</button>

    <div class="wrapper" id="htmlContent">
        <div class="certificate" style="background-image: url('{{ asset('assets/certificates/image.png') }}');">
            <h1 class="certificate-name">
                {{ $sertificat['full_name'] }}
            </h1>
            <p class="certificate-body">
                <?php echo $sertificat->discription; ?>
            </p>
            <div class="certificate-qrcode" id="qrcode" data-name="{{ $sertificat['id']. '_' .$sertificat['full_name'] . '.png' }}" data-url="{{ route('sertificate', $sertificat['uuid']) }}"></div>
            <p class="certificate-id">
                ID: № {{ Str::padLeft($sertificat['id'], 6, '0') }}
            </p>
        </div>
    </div>

    <script async type="text/javascript" src="{{ asset('assets/dom-to-image.js') }}"></script>
    <script async type="text/javascript" src="{{ asset('assets/certificates/app.js') }}" charset="UTF-8" defer></script>
</body>

</html>
