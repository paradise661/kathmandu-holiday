<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>{{ $package->name }} - Tour Details</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            margin: 20px;
        }

        h1,
        h2,
        h3 {
            color: #2c3e50;
            margin-bottom: 5px;
        }

        .section {
            margin-bottom: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            font-size: 12px;
        }

        th {
            background: #f0f0f0;
        }

        ul {
            margin: 0;
            padding-left: 20px;
        }

        .title {
            text-align: center;
            border-bottom: 2px solid #333;
            margin-bottom: 20px;
            padding-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="title">
        <img height="40" src="{{ public_path('frontend/assets/images/khtt-logo-1-1-1.png') }}" alt="img">

        <h2>{{ $package->name }}</h2>
        <p><strong>Duration:</strong> {{ $package->activity->duration ?? 'N/A' }}</p>
    </div>

    @if($package->itenaries->isNotEmpty())
        <div class="section">
            <h3>Tour Plan</h3>
            <table>
                <thead>
                    <tr>
                        <th>Day</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($package->itenaries as $key => $itenary)
                        <tr>
                            <td>Day {{ $key + 1 }}</td>
                            <td>{!! $itenary->description !!}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    @if($package->inclusions || $package->exclusions)
        <div class="section">
            <h3>Inclusion / Exclusion</h3>
            <div style="display:flex; gap:30px;">
                @if($package->inclusions)
                    <div style="flex:1;">
                        <h4>Inclusions</h4>
                        {!! $package->inclusions !!}
                    </div>
                @endif
                @if($package->exclusions)
                    <div style="flex:1;">
                        <h4>Exclusions</h4>
                        {!! $package->exclusions !!}
                    </div>
                @endif
            </div>
        </div>
    @endif
</body>

</html>