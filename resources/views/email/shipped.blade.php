<!DOCTYPE html>
<html>

<head>
    <title>Ordered Shipped</title>
</head>
<body>

    <section style="margin: 2% 0 0 5%; font-family:Times, Times New Roman, serif;">
        <div>
            <h4>Dear: <span>{{$data->buyer_name}}</span></h4>
            <h5>Order placed date: <span>{{$data->created_at->toDayDateTimeString()}}</span></h5>
            <h5>Total price:<span> Rs {{$data->total}}.00</span></h5>
            <p>  {{$data->order_id}} has been shipped and will be delivered to {{$data->address}}, [{{$data->specefics}}] within 2 days.</p>
            <p>We will contact you at {{$data->contact}} so make sure to receive our call.</p>
            <p>Thanks for making purchase!!!</p><br>
            <p>Thanks and Regards</p>
            <hr><br>

            <img src="https://scontent.fktm8-1.fna.fbcdn.net/v/t39.30808-6/249501627_4627362814024567_596964763259410281_n.png?_nc_cat=105&ccb=1-5&_nc_sid=09cbfe&_nc_ohc=JdkSH8IeIy0AX9ip8pP&tn=06VoWU7x0WRmr8YU&_nc_ht=scontent.fktm8-1.fna&oh=00_AT8NGc-uUwCx1mb92pVX3g8N565e_PRVKbNsGa-TTXFgkQ&oe=623D4DBD" style="height: 60px; width: 60px">
            <p>Atmosphere</p>
            <p>01-123456, +977 9876543210</p>
        </div>
    </section>

</body>

</html>
