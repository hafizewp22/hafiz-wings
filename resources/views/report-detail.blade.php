<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="container">
        <h2>Report Penjualan</h2>
        <table class="table table-bordered">
            <thead class="table table-bordered">
                <tr>
                    <th>Transaction</th>
                    <th>User</th>
                    <th>Total</th>
                    <th>Date</th>
                </tr>
            </thead>
            <thead>
                @foreach ($transactionHeaders as $item)
                    <tr>
                        <th>{{ $item->document_code }} - {{ $item->document_number }}</th>
                        <td>{{ $item->user }}</td>
                        <td>@currency($item->total)</td>
                        <td>{{ \Carbon\Carbon::parse($item->date)->format('d F Y') }}</td>
                    </tr>
                @endforeach
            </thead>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
