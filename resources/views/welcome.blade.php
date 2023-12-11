<!DOCTYPE html>

<head>
    <title>Pusher Test</title>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        const pusher = new Pusher("{{ $key }}", {
            cluster: "{{ $cluster }}"
        });

        const channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function (data) {
            document.getElementById('message').innerHTML = data.message;
        });
    </script>
</head>

<body>
    <h1>Pusher Test</h1>
    <div id="message"></div>
</body>