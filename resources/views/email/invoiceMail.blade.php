<!DOCTYPE html>
<html>

<head>
    <title>Email Of Invoice</title>
</head>
<body>

    <section style="margin: 2% 0 0 5%; font-family:Times, Times New Roman, serif;">
        <div>
            <h4>Order Id: <span>{{$order_details->order_id}}</span></h4>
            @foreach (json_decode($order_details->details) as $item)
            <?php $temp = explode(',', $item) ?>
                <h4>Items: <span>{{$temp[1]}}</span></h4>
            @endforeach
            <h4>Purchased date: <span>{{$order_details->created_at->toDayDateTimeString()}}</span></h4>
            <h4>Total price:<span> Rs {{$order_details->total}}.00</span></h4>
            <p>We will deliver real soon.</p>
            <p>Thanks for making purchase!!!</p><br>
            <p>Thanks and Regards</p>
            <hr><br>

            <img src="https://scontent.fktm3-1.fna.fbcdn.net/v/t31.18172-8/13235364_1095255183865303_906161222930844399_o.jpg?_nc_cat=103&ccb=1-5&_nc_sid=09cbfe&_nc_ohc=ykiRFm8w_T0AX_-vfrj&tn=06VoWU7x0WRmr8YU&_nc_ht=scontent.fktm3-1.fna&oh=00_AT-SZFEOpdOX17Pww0ScLKwa_o217_4HKmlefIR60wromg&oe=628929A7" style="height: 60px; width: 60px">
            <p>Helmetsss</p>
            <p>01-123456, +977 9876543210</p>
        </div>
    </section>

</body>

</html>
