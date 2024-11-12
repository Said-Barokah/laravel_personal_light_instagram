<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Archive PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Archive</h2>

    <table>
        <thead>
            <tr>
                <th>Media</th>
                <th>Date</th>
                <th>Caption</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($feeds as $feed)
                <tr>
                    <td>
                        @if ($feed->media_type === 'image')
                            <img src="{{ public_path('storage/'.$feed->media_path) }}" alt="Image" style="width: 100px; height: auto;">
                        @elseif ($feed->media_type === 'video')
                            Video
                        @endif
                    </td>
                    <td>{{ $feed->created_at->format('Y-m-d H:i') }}</td>
                    <td>{{ $feed->caption }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
