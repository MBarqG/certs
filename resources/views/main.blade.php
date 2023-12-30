<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="images/mainicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css\Style.css') }}">
    <title>certs</title>
</head>

<body>
    @include('Layout.navigation')
    <!----------side bar------->
    @include('Layout.sidebar')
    <div class="container">
        <div class="list-container">
            @if (isset($domain))
                <div class="card" style="max-width: 80rem;">
                    @if ($cert['not_after'] > date("Y/m/d"))
                    <div class="card-header text-white bg-success">{{ $domain }}</div>
                    @else
                    <div class="card-header text-white bg-danger">{{ $domain }}</div>
                    @endif
                    <div class="card-body">
                        <p class="card-text">
                            @if (isset($cert))
                                <div>
                                    <strong>Issued By:</strong><br>
                                    @php
                                        $Issuer = $cert['issuer_name'];
                                        $myArray = explode(',', $Issuer);
                                    @endphp
                                    <strong>Issuer:</strong> {{ $myArray[0] }}<br>
                                    <strong>Issuer:</strong> {{ $myArray[1] }}<br>
                                    <strong>Issuer:</strong> {{ $myArray[2] }}<br><br>
                                    <strong>Issued To:</strong><br>
                                    <strong>Common Name:</strong> {{ $cert['common_name'] }}<br><br>
                                    <strong>Validity Period:</strong><br>
                                    <strong>Valid From:</strong> {{ $cert['not_before'] }}<br>
                                    <strong>Valid Until:</strong> {{ $cert['not_after'] }}<br><br>
                                    <strong>Serial Number:</strong> {{ $cert['serial_number'] }}<br>
                                    <br>
                                </div>
                            @else
                                <p>No certificate details available for the current index.</p>
                            @endif
                        </p>
                    </div>
                    <div class="card-footer">
                        <div class="arrow-container">
                            <button onclick="updateCertNumber({{ $certNumber - 1 }})"
                                class="arrow-button">&#9666;</button>
                            <span id="certNumber">{{ $certNumber }}</span>
                            <button onclick="updateCertNumber({{ $certNumber + 1 }})"
                                class="arrow-button">&#9656;</button>
                        </div>
                    </div>
                </div>
            @else
            @endif
        </div>
    </div>
    <script src="{{ asset('js\main.js') }}"></script>
    @if (isset($domain))
    <script>

        function updateCertNumber(newCertNumber) {
            window.location.href = '/Search?domain={{ $domain }}&certnumber=' + newCertNumber;
        }
    </script>
    @endif
</body>

</html>
