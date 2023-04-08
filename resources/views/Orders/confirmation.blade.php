<h2>Dear Customer</h2>
<p>Please confirm your order by
clicking the following link:</p>

<p><a  href="{{route('stripe',$order['id'])}}">Confirm Order</a></p>

<p>If you want to cancel your order,
please click the following link:</p>
<p><a href="{{route('orders.cancel',$order['id'])}}">Cancel Order</a></p>

<p>Order Information:</p>
<ul>
  
 @foreach ($medicine as $med)

<li>Product: {{$med->pluck('name')}} -Price: {{$med->pluck('price')}} LE</li>
@endforeach

<li>Total-Price: {{ $order->price}} LE </li>
</ul>
<p>Thank you for choosing our pharmacy!</p>