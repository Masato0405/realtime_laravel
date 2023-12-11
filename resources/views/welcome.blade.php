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

        const channel = pusher.subscribe('products');
        channel.bind('products', function (data) {
            console.log(data.event);
        });
    </script>
</head>

<body>
    <h1>Pusher Test</h1>
    <div id="product"></div>
    @foreach ($products as $product)
    <div>
        <p>商品名：{{$product->product_name}} | 在庫数：{{$product->stock_quantity}}</p>
    </div>
    @endforeach
</body>