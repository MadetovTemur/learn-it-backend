try { 
  const box = document.getElementById("qrcode");
  box.title = box.dataset.url

  
  const setting = {
    width: 110,
    height: 110,
    data: box.dataset.url,
    // image: "./img/logo.png",
    dotsOptions:
    {
      type:"dots",
      gradient:
        {
          type:"linear",
          rotation:0,
          colorStops:[
            {offset:0,color:"#6a1a4c"},
            {offset:1,color:"#00ff00"}
          ]
        }
    },
    qrOptions:
    {
      typeNumber:"0",
      mode:"Byte",
      errorCorrectionLevel:"Q"
    },
    backgroundOptions:
    {
      color:"#ffffff",
      gradient:null
    },
    dotsOptionsHelper:
    {
      colorType:
        {
          single:true,
          gradient:false
        },
    },
    cornersSquareOptions: {
      color: "#029e02f7",
      type: "extra-rounded"
    },
    cornersDotOptions: {
      color: "#019101",
      type: "dot"
    },
    imageOptions: {
      crossOrigin: "anonymous",
      margin: 20,
      imageSize: 0.1 // Увеличение этого значения уменьшит размер логотипа
    }
  };
  
  new QRCodeStyling(setting).append(box);
} catch {
  
}
