<!DOCTYPE html>
<html>

<head>
    <style>
        body,
html {
    width: 297mm;
    height: 200mm;
    margin: 0;
}

.pdf {
    width: 100%;
    height: 100%;
    position: relative;
}

.header {
    margin: 2% 0%;
    background-color: #11436b;
    width: 90%;
    margin-left: auto;
    margin-right: auto;
    text-align: center;
    color: rgb(230, 223, 223);
}

.pdfh1 {
    padding: 5%;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: normal;
    word-wrap: break-word;
    max-width: 800px;
}

.content {
    margin-left: auto;
    margin-right: auto;
    background-color: #d8d8d8;
    width: 90%;
    display: table;
}

.infoContainer {
    display: table-row;
}

.divInfoEntrada,
.divInfoSessio, {
    display: table-cell;
    box-sizing: border-box;
    padding: 0% 2%;
    width: 50%;
    text-align: center;
}

.linea {
    display: table-cell;
    position: relative;
    border-left: 7px solid white;
    height: 10%;
    border-right: 1000px;
}

.dadesEntrades {
    margin-top: 0.5%;
    width: 90%;
    background-color: #d8d8d8;
    margin-left: auto;
    margin-right: auto;
}

.logoPDF {
    width: 150px;
    height: 150px;
}

.qr {
        position: absolute;
        top: 60%;
        left: 35%;
    }

    </style>
</head>

<body>
    @for ($i = 1; $i <= $nEntrades; $i++)
    <div class="pdf">
        <div class="header">
            <table style="width: 100%;">
                <tr>
                    <td style="width: 150px;">
                        <img src="{{ public_path('logo/logo.png') }}" class="logoPDF">
                    </td>
                    <td>
                        <h1 class="pdfh1">Evento en pdf con titulo</h1>
                    </td>
                </tr>
            </table>
        </div>
        <div class="content">
            <div class="infoContainer">
                <div class="divInfoEntrada">
                    <h3> Informació entrada </h3>
                    <p> Tipus: Normal </p>
                    <p> Preu: 10€ </p>
                </div>
                <div class="linea"></div>
                <div class="divInfoSessio">
                    <h3> Informació sessió </h3>
                    <p> Data: 14/07/2024 </p>
                    <p> Hora: 15:00 </p>
                    <p> Direcció: Torrent del Batlle, 10 08225 Terrassa Barcelona </p>
                </div>
            </div>
        </div>
        <div class="dadesEntrades">
            <p style="padding: 1% 2%"> Identificador entrada: 12345 </p>
        </div>
         <div class="qr">
            <img src="data:image/png;base64, {{ $qrCode }}" alt="Código QR">
        </div>
    </div>
    @endfor
</body>

</html>
