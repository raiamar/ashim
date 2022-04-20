<table class="table">
    <thead>
        <tr>
            <th class="template_list_heading" scope="col">{{ __('ITEMS') }}</th>
            <th></th>
            <th class="template_list_heading" scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php $total = 0; ?>
        @foreach (session('cart') as $id => $item)
            <?php $total += $item['price'] * $item['quantity']; ?>
            <tr data-id="{{ $id }}">
                <td>
                    <?php
                    $check_file = ($item['image']);
                    ?>
                    @if (isset($check_file))
                        <img src="{{ asset('uploads/product/'. $item['image']) }}">
                    @else
                        <img src="{{ asset('image/no_image.jpg') }}" alt="no image">
                    @endif
                </td>
                <td class="cart_template_name">{{ $item['name'] }}</td>

                <td class="template_price">Rs {{ $item['price'] * $item['quantity'] }}.00</td>

                <td> <input type="number" onchange="updateCart({{$item['id']}})" min="1" name="quantity" value="{{ $item['quantity'] }}" style="width: 15%"> </td>

                <td class="actions" data-th="">
                    <a type="button" href="{{ route('remove.from.cart', $item['id']) }}" class="p-1 text-center remove-from-cart" data-toggle="tooltip"
                        data-placement="top" title="Remove Template"><i class="fa-solid fa-xmark"></i></a>
                </td>
            </tr>
        @endforeach

    </tbody>


    <div class="add_cart_footer mb-5">
        <tfoot style="border: none">
            <tr>
                <td colspan="5" class="text-right border-none">
                    <span class="float-right p-1">Total: Rs {{ $total }}.00</span>
                </td>
            </tr>
            <br>
            <tr>
                <td colspan="5" class="text-right border-none">
                    <a href="{{ url('menu') }}" class="btn btn-primary"><i class="fa fa-angle-left"></i>
                        Continue
                        Shopping</a>
                    <a class="btn btn-success" href={{route('checkout')}}>Checkout</a>
                </td>
            </tr>
        </tfoot>
    </div>
</table>