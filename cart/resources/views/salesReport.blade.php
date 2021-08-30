<!DocTYPE html>
<html>

<head>
    <title>Southern Cart</title>
    
    <style>
        table {
            border: 1px solid black;
            text-align: center;
            border-collapse: collapse;
        }

        th {
            border: 1px solid black;
            padding: 5px;
        }

        td {
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>

<body>
    <h2>Sales Report</h2>

    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Date Time</th>
                <th>Amount</th>
            </tr>
        </thead>

        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->created_at}}</td>
                <td>{{$order->amount}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>