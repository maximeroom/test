<?php $i=1; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Choose your product</title>
    <link href="/css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>Admin</h1>
<h2>Most chosen products</h2>
<table>
    <tr>
        <th>Rank</th>
        <th>Product</th>
        <th># Clicks</th>
    </tr>
    @foreach($clicks as $click)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $click->title }}</td>
            <td>{{ $click->total }}</td>
        </tr>

    @endforeach
</table>
</body>
</html>