@extends('layouts.index')

@section('content')
<style>
.order-container {
    display: flex;
    justify-content: start;
    align-items: center;
    margin-bottom: 20px;
    margin-left: 20px;
    margin-top: 20px;
}
.order-container h1 {
    font-size: 16px;
    color: #7C7C7C;
    margin: 0;
    margin-right: 30px;
}
.order-container i {
    color: #7C7C7C;
    font-size: 16px;
    margin-right: 10px;
}
.admin-search-bar {
    display: flex;
    align-items: center;
    padding: 5px;
    border: 1px solid #787878;
}
form.admin-search-bar {
    margin-left: auto;
    margin-right: 20px;
    background: transparent;
    outline: none;
    padding: 2px;
    color: #787878;
}
.admin-search-bar input {
    background-color: transparent;
    border: none;
}
.admin-search-bar input::placeholder {
    color: #dfdeda;
    font-size: 12px;
}
.order-table {
    width: 100%;
    border-collapse: collapse;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
    cursor: pointer;
}
.order-table td, .order-table th {
    padding: 12px;
    border: 1px solid #787878;
    border-left: none;
    border-right: none;
    text-align: left;
    font-size: 12px;
}
.order-table th {
    color: #787878;
    font-size: 11px;
}
.order-table td strong {
    color: #fff;
}
.order-table td {
    color: #ccc;
}
.order-table td .pend {
    color: green;
    font-weight: bold;
}
.order-table td .complete {
    color: #D4AF37;
    font-weight: bold;
}
.modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background-color: rgba(0, 0, 0, 0.7);
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 999;
}
.modal-content {
    background-color: #141414;
    padding: 25px 30px;
    width: 460px;
    color: #fff;
    text-align: left;
    font-size: 13px;
    border: none;
    position: relative;
}
.modal-close {
    position: absolute;
    top: 12px;
    right: 16px;
    font-size: 20px;
    cursor: pointer;
    color: #D4AF37;
}
.modal-content h2 {
    font-size: 15px;
    margin-bottom: 20px;
    color: #7C7C7C;
    border-bottom: 1px solid #333;
    padding-bottom: 10px;
}
.modal-content p {
    margin: 8px 0;
    line-height: 1.6;
}
.modal-content p strong {
    width: 120px;
    display: inline-block;
    color: #888;
}
.modalStatus{
    color: greenyellow;
    font-weight: bold;
}
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

        <p>Status:
        <select>
        <span id="modalStatus" class="modalStatus"></span>
            <option value="pending">Pending</option>
            <option value="completed">Completed</option>
        </select></p>
        
    </div>
</div>

<script>
function openOrderModal(id, name, email, phone, address, total, status) {
    document.getElementById('modalCustomer').textContent = name;
    document.getElementById('modalEmail').textContent = email;
    document.getElementById('modalPhone').textContent = phone;
    document.getElementById('modalAddress').textContent = address;
    document.getElementById('modalTotal').textContent = total + ' MMK';
    document.getElementById('modalStatus').textContent = status.charAt(0).toUpperCase() + status.slice(1);
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
