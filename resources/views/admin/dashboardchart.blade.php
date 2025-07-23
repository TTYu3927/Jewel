@extends('layouts.index')
@section('title', 'Dashboard')
@section('content')

<style>
    body {
        font-family: 'Inter', sans-serif;
        background-color: #1f1f1f;
        color: #fff;
    }

    .dashboard-container {
        margin: 5px 30px;
    }

    .grid-4 {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        margin-bottom: 40px;
    }

    .card {
        background-color: #0f0f0f;
        padding: 14px;
        box-shadow: 0 0 5px #474747;
    }
    .card1 {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
    }

    .card h2 {
        font-size: 20px;
        margin-bottom: 5px;
    }

    .card p {
        color: #aaa;
        font-size: 12px;
        font-weight: bold;
    }

    .section-title {
        font-size: 20px;
        margin-bottom: 15px;
        color: #ccc;
    }

    .charts {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 20px;
    }

    .chart-box, .table-box {
        background-color: #0f0f0f;
        padding: 20px;
        box-shadow: 0 0 5px #474747;
    }

    canvas {
        width: 100% !important;
        height: 250px !important;
    }
    .room {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 0;
            margin-bottom: 20px;
            color: #7C7C7C;
            margin-right: 30px;
        }

        h2 {
            font-size: 16px;
            margin-top: 10px;
        }

        .room i {
            color: #7C7C7C;
            font-size: 16px;
            margin-right: 10px;
            margin-top: 10px;
            margin-left: 10px;
        }

</style>


<div class="dashboard-container">
<div class="room">
        <i class="fa-solid fa-greater-than"></i>
            <h2>Dashboard</h2>
    </div>

    <div class="grid-4">
        
    <div class="card">
        <p>REVENUE</p><br>
            <div class="card1">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
<path fill-rule="evenodd" clip-rule="evenodd" d="M15.0244 3.75C12.2012 3.75 9.62936 4.6825 8.10749 5.44438C7.96999 5.51313 7.84166 5.58021 7.72249 5.64562C7.48624 5.77437 7.28499 5.89438 7.12499 6L8.85624 8.54875L9.67124 8.87312C12.8562 10.48 17.1275 10.48 20.3131 8.87312L21.2381 8.39313L22.875 6C22.5355 5.77944 22.183 5.5797 21.8194 5.40187C20.305 4.64812 17.7944 3.75 15.025 3.75M10.9987 6.635C10.3858 6.51965 9.78037 6.36772 9.18561 6.18C10.6112 5.54687 12.7356 4.875 15.025 4.875C16.6106 4.875 18.11 5.1975 19.35 5.60625C17.8969 5.81063 16.3462 6.1575 14.8687 6.58437C13.7062 6.92062 12.3475 6.88438 10.9987 6.635ZM20.9737 9.8L20.82 9.8775C17.3162 11.645 12.6687 11.645 9.16499 9.8775L9.01936 9.80375C3.75499 15.5794 -0.263762 26.2481 15.0244 26.2481C30.3125 26.2481 26.1962 15.3813 20.9737 9.8ZM14.375 15C14.0435 15 13.7255 15.1317 13.4911 15.3661C13.2567 15.6005 13.125 15.9185 13.125 16.25C13.125 16.5815 13.2567 16.8995 13.4911 17.1339C13.7255 17.3683 14.0435 17.5 14.375 17.5V15ZM15.625 13.75V13.125H14.375V13.75C13.7119 13.75 13.0761 14.0134 12.6072 14.4822C12.1384 14.9511 11.875 15.587 11.875 16.25C11.875 16.913 12.1384 17.5489 12.6072 18.0178C13.0761 18.4866 13.7119 18.75 14.375 18.75V21.25C13.8312 21.25 13.3681 20.9031 13.1956 20.4169C13.17 20.3373 13.1287 20.2637 13.0742 20.2004C13.0197 20.1371 12.953 20.0853 12.8781 20.0482C12.8032 20.0111 12.7216 19.9894 12.6382 19.9844C12.5548 19.9794 12.4712 19.9911 12.3924 20.019C12.3136 20.0468 12.2412 20.0902 12.1795 20.1465C12.1177 20.2028 12.0679 20.2709 12.033 20.3468C11.998 20.4227 11.9786 20.5049 11.976 20.5884C11.9733 20.6719 11.9874 20.7552 12.0175 20.8331C12.1898 21.3207 12.5091 21.7428 12.9313 22.0413C13.3535 22.3398 13.8579 22.5001 14.375 22.5V23.125H15.625V22.5C16.288 22.5 16.9239 22.2366 17.3928 21.7678C17.8616 21.2989 18.125 20.663 18.125 20C18.125 19.337 17.8616 18.7011 17.3928 18.2322C16.9239 17.7634 16.288 17.5 15.625 17.5V15C16.1687 15 16.6319 15.3469 16.8044 15.8331C16.83 15.9127 16.8712 15.9863 16.9258 16.0496C16.9803 16.1129 17.047 16.1647 17.1219 16.2018C17.1968 16.2389 17.2783 16.2606 17.3618 16.2656C17.4452 16.2706 17.5287 16.2589 17.6075 16.231C17.6863 16.2032 17.7587 16.1598 17.8205 16.1035C17.8822 16.0472 17.9321 15.9791 17.967 15.9032C18.002 15.8273 18.0214 15.7451 18.024 15.6616C18.0267 15.5781 18.0126 15.4948 17.9825 15.4169C17.8102 14.9293 17.4909 14.5072 17.0687 14.2087C16.6465 13.9102 16.1421 13.7499 15.625 13.75ZM15.625 18.75V21.25C15.9565 21.25 16.2745 21.1183 16.5089 20.8839C16.7433 20.6495 16.875 20.3315 16.875 20C16.875 19.6685 16.7433 19.3505 16.5089 19.1161C16.2745 18.8817 15.9565 18.75 15.625 18.75Z" fill="#D4AF37" fill-opacity="0.8"/>
</svg>
            <h2>1,400K</h2>
        </div>
    </div>

        <div class="card">
        <p>ORDERS</p><br>
            <div class="card1">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
<path fill-rule="evenodd" clip-rule="evenodd" d="M20.3513 15.2737C20.4386 15.3608 20.5078 15.4643 20.5551 15.5782C20.6024 15.6921 20.6267 15.8142 20.6267 15.9375C20.6267 16.0608 20.6024 16.1829 20.5551 16.2968C20.5078 16.4107 20.4386 16.5141 20.3513 16.6012L14.7263 22.2262C14.6392 22.3135 14.5357 22.3828 14.4218 22.4301C14.3079 22.4773 14.1858 22.5016 14.0625 22.5016C13.9392 22.5016 13.8171 22.4773 13.7032 22.4301C13.5893 22.3828 13.4859 22.3135 13.3988 22.2262L10.5863 19.4137C10.4991 19.3266 10.43 19.2231 10.3828 19.1092C10.3356 18.9953 10.3113 18.8732 10.3113 18.75C10.3113 18.6267 10.3356 18.5046 10.3828 18.3907C10.43 18.2769 10.4991 18.1734 10.5863 18.0862C10.7623 17.9102 11.0011 17.8113 11.25 17.8113C11.3733 17.8113 11.4954 17.8356 11.6092 17.8827C11.7231 17.9299 11.8266 17.9991 11.9138 18.0862L14.0625 20.2368L19.0238 15.2737C19.1109 15.1864 19.2143 15.1171 19.3282 15.0699C19.4421 15.0226 19.5642 14.9983 19.6875 14.9983C19.8108 14.9983 19.9329 15.0226 20.0468 15.0699C20.1607 15.1171 20.2642 15.1864 20.3513 15.2737Z" fill="#D4AF37" fill-opacity="0.8"/>
<path d="M15 1.875C16.2432 1.875 17.4355 2.36886 18.3146 3.24794C19.1936 4.12701 19.6875 5.3193 19.6875 6.5625V7.5H10.3125V6.5625C10.3125 5.3193 10.8064 4.12701 11.6854 3.24794C12.5645 2.36886 13.7568 1.875 15 1.875ZM21.5625 7.5V6.5625C21.5625 4.82202 20.8711 3.15282 19.6404 1.92211C18.4097 0.691404 16.7405 0 15 0C13.2595 0 11.5903 0.691404 10.3596 1.92211C9.1289 3.15282 8.4375 4.82202 8.4375 6.5625V7.5H1.875V26.25C1.875 27.2446 2.27009 28.1984 2.97335 28.9016C3.67661 29.6049 4.63044 30 5.625 30H24.375C25.3696 30 26.3234 29.6049 27.0266 28.9016C27.7299 28.1984 28.125 27.2446 28.125 26.25V7.5H21.5625ZM3.75 9.375H26.25V26.25C26.25 26.7473 26.0525 27.2242 25.7008 27.5758C25.3492 27.9275 24.8723 28.125 24.375 28.125H5.625C5.12772 28.125 4.65081 27.9275 4.29917 27.5758C3.94754 27.2242 3.75 26.7473 3.75 26.25V9.375Z" fill="#D4AF37" fill-opacity="0.8"/>
</svg>
            <h2>150</h2>
        </div>
    </div>

        <div class="card">
        <p>Net Profit</p><br>
            <div class="card1">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
<path d="M17 20.9162C17.2925 21.2525 17.685 21.4863 18.1187 21.5838C18.5362 21.7311 18.9941 21.7148 19.4 21.5381C19.8059 21.3613 20.1297 21.0373 20.3063 20.6312C20.5213 19.8625 19.7488 19.0225 18.7538 18.78C17.7588 18.5375 16.9913 17.7038 17.2025 16.9288C17.379 16.5227 17.7028 16.1987 18.1088 16.0219C18.5147 15.8452 18.9725 15.8289 19.39 15.9763C19.8188 16.0725 20.2075 16.3013 20.5 16.6313M18.8025 21.6525V22.4237M18.8025 15V15.9063M5 18.75V23.75M8.75 16.25V23.75M7.5 10.625L13.125 6.25L17.5 9.375L22.5 5M22.5 5H18.125M22.5 5V8.75M25 18.75C25 20.4076 24.3415 21.9973 23.1694 23.1694C21.9973 24.3415 20.4076 25 18.75 25C17.0924 25 15.5027 24.3415 14.3306 23.1694C13.1585 21.9973 12.5 20.4076 12.5 18.75C12.5 17.0924 13.1585 15.5027 14.3306 14.3306C15.5027 13.1585 17.0924 12.5 18.75 12.5C20.4076 12.5 21.9973 13.1585 23.1694 14.3306C24.3415 15.5027 25 17.0924 25 18.75Z" stroke="#D4AF37" stroke-opacity="0.8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
            <h2>150.7k</h2>
        </div>
    </div>

        <div class="card">
        <p>Registered Customers</p><br>
            <div class="card1">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
<path d="M26.7403 22.3247C26.2547 21.8465 20.37 19.5703 19.3022 19.1409C18.24 18.719 17.8163 17.55 17.8163 17.55C17.8163 17.55 17.3381 17.8144 17.3381 17.0719C17.3381 16.3284 17.8163 17.55 18.2944 14.6831C18.2944 14.6831 19.6209 14.3109 19.3575 11.2331H19.0388C19.0388 11.2331 19.8356 7.94249 19.0388 6.82874C18.2391 5.71499 17.9259 4.97249 16.17 4.43999C14.4169 3.90842 15.0544 4.01436 13.7813 4.06874C12.5063 4.12217 11.445 4.81217 11.445 5.18249C11.445 5.18249 10.6481 5.23592 10.3313 5.55467C10.0125 5.87342 9.48188 7.35842 9.48188 7.72967C9.48188 8.10092 9.74719 10.5984 10.0125 11.1272L9.69656 11.2303C9.43125 14.309 10.7578 14.6822 10.7578 14.6822C11.2359 17.549 11.7141 16.3275 11.7141 17.0709C11.7141 17.8134 11.2359 17.549 11.2359 17.549C11.2359 17.549 10.8113 18.7172 9.75 19.14C8.68875 19.5647 2.7975 21.8465 2.31844 22.3237C1.84031 22.8112 1.89375 25.0387 1.89375 25.0387H13.1775L14.0006 21.795L13.2694 21.0637L14.5284 19.8028L15.7875 21.0628L15.0563 21.794L15.8794 25.0378H27.1631C27.1631 25.0378 27.2222 22.8084 26.7384 22.3219L26.7403 22.3247Z" fill="#D4AF37" fill-opacity="0.8"/>
</svg>
            <h2>20</h2>
            </div>
        </div>
    </div>

    <div class="charts">
        <div class="chart-box">
            <div class="section-title">Total Sales</div>
            <canvas id="salesChart"></canvas>
        </div>
        <div class="chart-box">
            <div class="section-title">Devices</div>
            <canvas id="deviceChart"></canvas>
        </div>
    </div>

    <div class="charts" style="margin-top: 30px;">
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

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctxSales = document.getElementById('salesChart');
    new Chart(ctxSales, {
        type: 'line',
        data: {
            labels: [1,2,3,4,5,6,7],
            datasets: [
                { label: 'This Month', data: [500,900,700,1000,800,600,900], borderColor: '#736024' },
                { label: 'Last Month', data: [300,500,400,600,700,900,500], borderColor: '#0e6974' }
            ]
        },
        options: { responsive: true, plugins: { legend: { labels: { color: '#fff' } } }, scales: { x: { ticks: { color: '#aaa' } }, y: { ticks: { color: '#aaa' } } } }
    });

    const ctxDevice = document.getElementById('deviceChart');
    new Chart(ctxDevice, {
        type: 'pie',
        data: {
            labels: ['Tablet', 'Desktop', 'Mobile'],
            datasets: [{
                data: [809, 120, 1400],
                backgroundColor: ['#321717', '#736024', '#474747'],
                borderColor: ['#7c7c7c']
            }]
        },
        options: { plugins: { legend: { labels: { color: '#fff' } } } }
    });

    const ctxIncome = document.getElementById('incomeChart');
    new Chart(ctxIncome, {
        type: 'bar',
        data: {
            labels: ['1 May', '2 May', '3 May', '4 May', '5 May', '6 May', '7 May'],
            datasets: [
                { label: 'Income', data: [200000, 30000, 150000, 220000, 180000, 240000, 190000], backgroundColor: '#736024' },
                { label: 'Profit', data: [120000, 15000, 100000, 170000, 120000, 190000, 130000], backgroundColor: '#474747' }
            ]
        },
        options: { responsive: true, plugins: { legend: { labels: { color: '#fff' } } }, scales: { x: { ticks: { color: '#aaa' } }, y: { ticks: { color: '#aaa' } } } }
    });

    const ctxCategory = document.getElementById('categoryChart');
    new Chart(ctxCategory, {
        type: 'bar',
        data: {
            labels: ['Gift Card', 'Rings', 'Earrings', 'Bracelets', 'Necklaces'],
            datasets: [{
                label: 'Orders',
                data: [60, 54, 20, 8, 4],
                backgroundColor: '#B58900'
            }]
        },
        options: { responsive: true, plugins: { legend: { display: false } }, scales: { x: { ticks: { color: '#aaa' } }, y: { ticks: { color: '#aaa' } } } }
    });

    document.addEventListener("DOMContentLoaded", function () {
    const counters = document.querySelectorAll('.counter');
    const speed = 200; // lower is faster

    counters.forEach(counter => {
        const updateCount = () => {
            const target = +counter.getAttribute('data-target');
            const count = +counter.innerText;

            const increment = target / speed;

            if (count < target) {
                counter.innerText = Math.ceil(count + increment);
                setTimeout(updateCount, 10);
            } else {
                counter.innerText = target;
            }
        };
        updateCount();
    });
});
</script>

@endsection
