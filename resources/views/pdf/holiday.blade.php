<!DOCTYPE html>
<html>
<head>
    <title>Holiday Details</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 100%; margin: 0 auto; padding: 20px; }
        .title { font-size: 24px; font-weight: bold; }
        .details { margin-top: 20px; }
        .label { font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <div class="title">{{ $holiday->title }}</div>
        <div class="details">
            <div><span class="label">Description:</span> {{ $holiday->description }}</div>
            <div><span class="label">Date:</span> {{ $holiday->date }}</div>
            <div><span class="label">Location:</span> {{ $holiday->location }}</div>
            @if($holiday->participants)
                <div><span class="label">Participants:</span> {{ $holiday->participants }}</div>
            @endif
        </div>
    </div>
</body>
</html>
