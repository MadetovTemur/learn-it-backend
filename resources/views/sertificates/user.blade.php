<!DOCTYPE html>
<html lang="uz">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="refresh" content="">
  <link rel="stylesheet" href="{{ asset('assets/certificates/style.css') }}">
  <link rel="shortcut icon" href="{{ asset('assets/certificates/logo.png') }}" type="png">
  <title>Certificate view</title>
  
  <style type="text/css">
  	.certificate {
		background-image: url('{{ asset('assets/certificates/image.png') }}');
		width: 29.7cm;
    	height: 22cm;
  	}
  </style>

</head>
<body id="img">
  <!--effectes hover active disabled -->
  <button type="button" id="dw_bt" class="btn" title="Download this certificate">DOWNLOAD</button>
  <a class="btn" href="{{ route('sertificate', $sertificat['uuid']) }}">View User</a>

  <div class="wrapper" id="htmlContent">
    <div class="certificate">
      <h1 class="certificate-name">
      	{{ $sertificat['full_name'] }}
  	  </h1>
      <p class="certificate-body">
      	<?php echo $sertificat->sertificate_discription->discription ?>
      </p>
      <div class="certificate-qrcode" id="qrcode" data-url="{{ route('sertificate', $sertificat['uuid'])  }}"></div>
      <p class="certificate-id">
        ID: {{ Str::padLeft($sertificat['id'], 6, '0') }}
      </p>
    </div>
  </div>


  <script async type="text/javascript" src="{{ asset('assets/certificates/qr-code-styling.js') }}" charset="UTF-8"></script>
  <script async type="text/javascript" src="{{ asset('assets/certificates/app.js') }}" charset="UTF-8"></script>
  <script async type="text/javascript" src="{{ asset('assets/dom-to-image.js') }}"></script>
  <script type="text/javascript">
		var ticket = document.getElementById('htmlContent');
		// var img = document.getElementById('img');
        var dowinload_button = document.getElementById('dw_bt');

        dowinload_button.addEventListener('click', () => {
            domtoimage.toPng(ticket).then((data) => {
                var link = document.createElement('a');
                link.download = '{{ $sertificat['full_name'] . '.png' }}'
                link.href = data;
                link.click();
                // var imge =  document.createElement('img');
                // imge.src = data;
                // img.append(imge);
            })
        })
	</script>
</body>

</html>