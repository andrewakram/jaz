<table dir="{{Session::get("lang") =="ar" ? 'rtl' : 'ltr'}}">
    <thead>
    
    <tr>
        <th>id</th>
        <th>type</th>
        <th>order action</th>
        <th>cancel reason</th>
        <th>cancelled by</th>
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
    </tr>
    </thead>
    <tbody>

    @foreach($orders as $order)
            <tr>
                <th>{{$order->id}}</th>
                <th>{{$order->type}}</th>
                <th>{{$order->order_action}}</th>
                <th>{{$order->cancel_reason}}</th>
                <th>{{$order->cancelled_by}}</th>
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
            </tr>
        @endforeach
    </tbody>
</table>
