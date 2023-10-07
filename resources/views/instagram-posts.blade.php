<!DOCTYPE html>
<html>

<head>
    <title>Instagram Feeds</title>
</head>

<body>
    <h1>Instagram Feeds</h1>
    <ul>
        @foreach ($instagramFeeds as $feed)
            <li>
                <h2>{{ $feed['caption'] }}</h2>
                <p>Posted on: {{ $feed['timestamp'] }}</p>
                @if ($feed['media_type'] === 'IMAGE')
                    <img src="{{ $feed['media_url'] }}" alt="Instagram Image" width="150px">
                @elseif ($feed['media_type'] === 'VIDEO')
                    <video src="{{ $feed['media_url'] }}" controls></video>
                @endif
                <p><a href="{{ $feed['permalink'] }}" target="_blank">View on Instagram</a></p>
            </li>
        @endforeach
    </ul>
</body>

</html>
