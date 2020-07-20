<table dir="{{Session::get("lang") =="ar" ? 'rtl' : 'ltr'}}">
    <thead>
    
    <tr>
        <th>costs</th>
    </tr>
    <tr>
        <th>id</th>
        <th>type</th>
        <th>address</th>
        <th>description</th>
        <th>date</th>
        <th>time</th>
        <th>order status</th>
        <th>rate</th>
        <th>order total</th>
        <th>total Paid</th>
        <th>created date</th>
        <th>created time</th>
        <th>category</th>
        <th>choice</th>
        <th>user name</th>
        <th>worker name</th>
        <th>payment way</th>
        {{--<th>paid status</th>
        <th>Jaz money</th>
        <th>worker money</th>--}}
    </tr>
    </thead>
    <tbody>

    @foreach($orders as $order)
        <tr>
            <th>{{$order->id}}</th>
            <th>{{$order->type}}</th>
            <th>{{$order->address}}</th>
            <th>{{$order->description}}</th>
            <th>{{$order->date}}</th>
            <th>{{$order->time}}</th>
            <th>{{$order->order_status}}</th>
            <th>{{$order->rate}}</th>
            <th>{{$order->order_total}}</th>
            <th>{{$order->finish_price}}</th>
            <th>{{$order->created_date}}</th>
            <th>{{$order->created_time}}</th>
            <th>{{$order->category}}</th>
            <th>{{$order->order_choice}}</th>
            <th>{{$order->user_name}}</th>
            <th>{{$order->worker_name}}</th>
            <th>{{$order->payment_way}}</th>
            {{--<th>{{$order->paid_status}}</th>
            <th>{{$order->jaz_money}}</th>
            <th>{{$order->worker_money}}</th>--}}
        </tr>
    @endforeach
    <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th>Total = {{$userTotalOrders}}</th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        {{--<th></th>
        <th>Total = {{$jazTotalMoney}}</th>
        <th></th>--}}
    </tr>
    </tbody>
</table>
