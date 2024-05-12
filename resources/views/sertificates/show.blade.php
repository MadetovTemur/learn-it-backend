{{-- @dd($sertificat->sertificate_discription->discription) --}}

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Sertificat</title>
	<link rel="stylesheet" href="{{ asset('assets/style.css') }}">
	<script type="text/javascript" src="{{ asset('assets/dom-to-image.js') }}"></script>
</head>
<body>
	<button id="dw_bt" style="padding: 10px 15px; margin: 10px 20px; cursor: pointer;">Dowinload</button>
	<a href="{{ route('sertificate', $sertificat['uuid']) }}">View User</a>
	<div class="body-wrapper" id="htmlContent">
		<div class="wrapper">
			<div class="left-top-border"></div>
			<div class="left-bottom-border"></div>
			<div class="right-top-border"></div>
			<div class="right-bottom-border"></div>

			<div class="wrapper-content">
				<h1>sertifikat</h1>
				<h2>{{ $sertificat['full_name'] }}</h2>
				<h3>
					<?php echo $sertificat->sertificate_discription->discription ?>
				</h3>
			</div>

			<div class="bottom">
				<img src="{{ $qrcode }}" class="qrcode">

				<p>"LEARN IT" MCHJ DEREKTORI:</p>

				<img src="{{ asset('assets/image1.png') }}" class="imzo" width="100px">
				<div class="author">
					<p>M.Karimov</p>
					<p class="text-id">ID №: {{ Str::padLeft($sertificat['id'], 6, '0') }}</p>
				</div>
			</div>
		</div>
	</div>
	

	<script type="text/javascript">
		var ticket = document.getElementById('htmlContent');
        var dowinload_button = document.getElementById('dw_bt');

        dowinload_button.addEventListener('click', () => {
            domtoimage.toPng(ticket).then((data) => {
                var link = document.createElement('a');
                link.download = '{{ $sertificat['uuid'] . '.png' }}'
                link.href = data;
                link.click();
            })
        })
	</script>
</body>
</html>