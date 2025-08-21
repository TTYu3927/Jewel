@extends('layouts.index')

@section('content')
<link rel="stylesheet" href="{{ asset('css/adminorder.css') }}">
<style>
</style>

<div class="order-container">
    <i class="fa-solid fa-greater-than"></i>

    <h1>Orders</h1>
    <form class="admin-search-bar" action="#" method="get">
        <input type="text" placeholder="Search" name="search">
        <i class="fas fa-search" style="color: #D4AF37;"></i>
    </form>
</div>

<div class="table-responsive">
    <table class="order-table">
        <thead>
            <tr>
                <th>ORDER ID</th>
                <th>CUSTOMER'S NAME</th>
                <th>EMAIL</th>
                <th>PHONE NUMBER</th>
                <th>DELIVERY ADDRESS</th>
                <th>TOTAL AMOUNT</th>
                <th>STATUS</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr onclick="openOrderModal({{ $order->id }}, '{{ $order->customer->name ?? '-' }}', '{{ $order->customer->email ?? '-' }}', '{{ $order->customer->phone ?? '-' }}', '{{ $order->customer->address ?? '-' }}', '{{ number_format($order->total_price) }}', '{{ $order->status }}')">
                <td>{{ 'C' . str_pad($order->id, 4, '0', STR_PAD_LEFT) }}</td>
                <td><strong>{{ $order->customer->name ?? '-' }}</strong></td>
                <td>{{ $order->customer->email ?? '-' }}</td>
                <td>{{ $order->customer->phone ?? '-' }}</td>
                <td>{{ $order->customer->address ?? '-' }}</td>
                <td>{{ number_format($order->total_price) }} MMK</td>
                <td>
                    @if($order->status == 'pending')
                    <span class="pend">Pending</span>
                    @else
                    <span class="complete">Completed</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="modal-overlay" id="orderModal">
    <div class="modal-content">
        <span class="modal-close" onclick="closeOrderModal()">&times;</span>
        <h2>Order Detail</h2>
        <p><strong>Customer:</strong> <span id="modalCustomer"></span></p>
        <p><strong>Email:</strong> <span id="modalEmail"></span></p>
        <p><strong>Phone:</strong> <span id="modalPhone"></span></p>
        <p><strong>Address:</strong> <span id="modalAddress"></span></p>
        <p><strong>Total Amount:</strong> <span id="modalTotal"></span></p>
        
    </div>
</div>

<script>
function openOrderModal(id, name, email, phone, address, total) {
    document.getElementById('modalCustomer').textContent = name;
    document.getElementById('modalEmail').textContent = email;
    document.getElementById('modalPhone').textContent = phone;
    document.getElementById('modalAddress').textContent = address;
    document.getElementById('modalTotal').textContent = total + ' MMK';
    document.getElementById('orderModal').style.display = 'flex';
}

function closeOrderModal() {
    document.getElementById('orderModal').style.display = 'none';
}

window.onclick = function(event) {
    const modal = document.getElementById('orderModal');
    if (event.target === modal) {
        closeOrderModal();
    }
};
</script>
@endsection
