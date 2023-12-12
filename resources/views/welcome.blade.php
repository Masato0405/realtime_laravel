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
        channel.bind('ProductUpdated', function (data) {
            const productId = data.model.id;
            const stockQuantity = data.model.stock_quantity;

            document.getElementById(`stock_quantity_${productId}`).innerText = stockQuantity;
        });
    </script>
</head>

<body>
    <h1>Pusher Test</h1>
    <table>
        <thead>
            <tr>
                <th>商品名</th>
                <th>在庫数</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{$product->product_name}}</td>
                <td id="stock_quantity_{{ $product->id }}">{{$product->stock_quantity}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>