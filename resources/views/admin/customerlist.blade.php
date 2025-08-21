@extends('layouts.index')

@section('title', 'Customers')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admincustomerlis.css') }}">


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
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
