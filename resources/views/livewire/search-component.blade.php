@if(isset($product))
<p>{{$product->ProductName}}</p>
@elseif(isset($error))
<p>Khoong tim thay</p>
@else
<p>No data to be shown</p>
@endif