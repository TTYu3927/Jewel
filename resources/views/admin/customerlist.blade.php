@extends('layouts.index')

@section('title', 'Customers')

@section('content')
<style>

.customer-container {
    display: flex;
    justify-content: start;
    align-items: center;
    margin-bottom: 20px;
    margin-left: 20px;
    margin-top: 20px;
}
.customer-container h1{
    font-size: 16px;
    color: #7C7C7C;
    margin: 0;
    margin-right: 30px;
}
.customer-container i{
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

.customer-table {
    width: 100%;
    border-collapse: collapse;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
}

.customer-table td {
    padding: 12px;
    border: 1px solid #787878;
    border-radius: 1px;
    text-align: left;
    color: #dfdeda;
    border-left: none;
    border-right: none;
    font-size: 12px;
}

.customer-table th {
    padding: 12px;
    border: 1px solid #787878;
    text-align: left;
    color: #787878;
    border-left: none;
    border-right: none;
    font-size: 11px;
}

.customer-table td strong {
    color: #fff;
}

.customer-table td {
    color: #ccc;
}

.status-online {
    color: #00c853;
    font-weight: bold;
}

.status-offline {
    color: #d32f2f;
    font-weight: bold;
}

.customer-table tr:hover {
    background-color: #1e1e1e;
    transition: background 0.3s ease;
}
</style>


<div class="customer-container">
    <i class="fa-solid fa-greater-than"></i>
    <h1>Customer</h1>
    
    <form class="admin-search-bar" action="#" method="get">
            <input type="text" placeholder="Search" name="search"><i class="fas fa-search" style="color: #D4AF37;"></i>

        </form>
</div>



    <table class="customer-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>CUSTOMER NAME</th>
                <th>EMAIL</th>
                <th>PHONE NUMBER</th>
                <th>ADDRESS</th>
                <th>LAST LOGIN</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
            <tr>
                <td>{{ 'C' . str_pad($customer->id, 4, '0', STR_PAD_LEFT) }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->email ?? 0 }}</td>
                <td>{{ $customer->phone ?? 'N/A' }}</td>
                <td>{{ $customer->address ?? 'N/A' }}</td>
                <td>{{ $customer->last_login ? \Carbon\Carbon::parse($customer->last_login)->format('Y/m/d h:i a') : 'N/A' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
