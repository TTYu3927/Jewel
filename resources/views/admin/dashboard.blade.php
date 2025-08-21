@extends('layouts.index')
@section('title','Dashboard')
@section('content')
<link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">

<div class="dashboard-container">
    <div class="grid-4">
        <div class="card">
            <p>REVENUE</p>
            <h2>{{ $totalRevenue }} MMK</h2>
        </div>
        <div class="card">
            <p>ORDERS</p>
            <h2>{{ $totalOrders }}</h2>
        </div>
        <div class="card">
            <p>Net Profit</p>
            <h2>{{ $netProfit }} MMK</h2>
        </div>
        <div class="card">
            <p>Registered Customers</p>
            <h2>{{ $totalCustomers }}</h2>
        </div>
    </div>

    <div class="charts">
        <div class="chart-box">
            <div class="section-title">Total Sales (Last 7 Days)</div>
            <canvas id="salesChart"></canvas>
        </div>
        <div class="chart-box">
            <div class="section-title">Devices</div>
            <canvas id="deviceChart"></canvas>
        </div>
    </div>

    <div class="charts" style="margin-top:30px;">
        <div class="chart-box">
            <div class="section-title">Income & Profit</div>
            <canvas id="incomeChart"></canvas>
        </div>
        <div class="chart-box">
            <div class="section-title">Orders by Category</div>
            <canvas id="categoryChart"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const days = {!! json_encode($days) !!};
const dailyOrders = {!! json_encode($dailyOrders) !!};
const monthlyIncome = {!! json_encode($monthlyIncome) !!};
const monthlyProfit = {!! json_encode($monthlyProfit) !!};
const deviceCounts = {!! json_encode($deviceCounts) !!};
const categoryLabels = {!! json_encode($categoryLabels) !!};
const categoryData = {!! json_encode($categoryData) !!};

// Sales Chart
new Chart(document.getElementById('salesChart').getContext('2d'), {
    type: 'line',
    data: { labels: days, datasets: [{ label:'Orders', data: dailyOrders, borderColor:'#736024', backgroundColor:'#D4AF3733', fill:true, tension:0.4 }] },
    options:{ responsive:true, scales:{ y:{ beginAtZero:true } } }
});

// Device Chart
new Chart(document.getElementById('deviceChart').getContext('2d'), {
    type:'pie',
    data:{ labels:Object.keys(deviceCounts), datasets:[{ data:Object.values(deviceCounts), backgroundColor:['#321717','#736024','#474747'], borderColor:['#fff'] }] },
    options:{ responsive:true, }
});

// Income & Profit Chart
new Chart(document.getElementById('incomeChart').getContext('2d'), {
    type:'bar',
    data:{ labels:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"], datasets:[
        { label:'Income', data:monthlyIncome, backgroundColor:'#D4AF37' },
        { label:'Profit', data:monthlyProfit, backgroundColor:'#736024' }
    ]},
    options:{ responsive:true, scales:{ y:{ beginAtZero:true } } }
});

// Category Chart
new Chart(document.getElementById('categoryChart').getContext('2d'), {
    type:'bar',
    data:{ labels:categoryLabels, datasets:[{ label:'Orders', data:categoryData, backgroundColor:'#B58900' }] },
    options:{ responsive:true, scales:{ y:{ beginAtZero:true } } }
});
</script>
@endsection
