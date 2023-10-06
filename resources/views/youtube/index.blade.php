<!DOCTYPE html>
<html>

<head>
    <title>YouTube Videos</title>
</head>

<body>
    <h1>YouTube Videos</h1>
    <ul>
        @foreach ($videos as $video)
            <li>
                <h2>{{ $video->getSnippet()->getTitle() }}</h2>
                <iframe width="560" height="315"
                    src="https://www.youtube.com/embed/{{ $video->getId()->getVideoId() }}" frameborder="0"
                    allowfullscreen></iframe>
            </li>
        @endforeach
    </ul>
</body>
