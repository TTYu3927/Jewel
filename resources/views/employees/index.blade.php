@extends('layouts.index')
@section('title', 'Employees')
@section('content')

<style>
.admin-header {
    display: flex;
    justify-content: start;
    align-items: center;
    margin-bottom: 20px;
    margin-left: 20px;
}

.admin-header h1 {
    font-size: 16px;
    color: #7C7C7C;
    margin: 0;
    margin-right: 30px;
}

.admin-header i {
    color: #7C7C7C;
    font-size: 16px;
    margin-right: 10px;
}

.admin-header a.btn-add {
    font-size: 10px;
    color: #dfdeda;
}
h1 {
    font-size: 16px;
    margin-bottom: 20px;
    color: #7C7C7C;
}

.btn-add {
    display: inline-block;
    margin-bottom: 20px;
    background-color: #541C1C;
    color: white;
    padding: 8px 12px;
    text-decoration: none;
    margin-top: 15px;
    margin-right: 30px;
}

a.btn-add {
    text-decoration: none;
}
.opt {
    margin-left: 400px;
    background: transparent;
    outline: none;
    padding: 2px;
    color: #787878;
}
.opt select {
    background-color: #2a2a2a;
    border: none;
    color: #dfdeda;
    padding: 7px;
    font-size: 12px;
}

.opt select option {
    color: #D4AF37;
}

.opt select:hover {
    background-color: #3a3a3a;
}

.opt select:focus {
    outline: none;
    border: 1px solid #D4AF37;
}

.opt select i {
    color: #D4AF37;
    margin-left: 5px;
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
.employee-table {
    width: 100%;
    border-collapse: collapse;
}

.employee-table th {
    padding: 12px;
    border: 1px solid #787878;
    text-align: left;
    color: #787878;
    border-left: none;
    border-right: none;
    font-size: 11px;
}

.employee-table td {
    padding: 12px;
    border: 1px solid #787878;
    border-radius: 1px;
    text-align: left;
    color: #dfdeda;
    border-left: none;
    border-right: none;
    font-size: 12px;
}

.employee-table tbody tr:hover {
    background-color: #2a2a2a;
    cursor: pointer;
}

.employee-table img.rounded-circle {
    object-fit: cover;
}
.employee-table select{
    background-color: transparent;
    border: none;
    color: #787878;
    padding: 7px;
    font-size: 12px;
}

.pagination {
    display: flex;
    justify-content: center;
    margin-top: 70px;
    color: #dfdeda;
    font-size: 14px;
    position: block;
}

.pagination nav {
    display: flex;
    justify-content: center;
}

.pagination span,
.pagination a {
    background: #333;
    color: #fff;
    padding: 6px 10px;
    margin: 0 2px;
    border-radius: 4px;
    text-decoration: none;
}

.pagination .active span {
    background: #D4AF37;
    color: #000;
}

</style>

<div class="admin-header">
    <i class="fa-solid fa-greater-than"></i>
    <h1 class="h1">Employees</h1>
    <a href="{{ route('employees.create') }}" class="btn-add"><i class="fa-solid fa-plus"></i> CREATE NEW</a>
    <div class="opt">
        <select onchange="filterTable('category', this.value)">
            <option value="">Select Category</option>
        </select>
    </div>
    
    <form class="admin-search-bar" action="#" method="get">
        <input type="text" placeholder="Search" name="search"><i class="fas fa-search" style="color: #D4AF37;"></i>
    </form>
</div>



<table class="employee-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>IMAGE</th>
            <th>
                <select onchange="filterTable('name', this.value)">
                    <option value="">EMPLOYEE NAME</option>
                    @foreach ($employees->unique('name') as $emp)
                        <option value="{{ $emp->name }}">{{ $emp->name }}</option>
                    @endforeach
                </select>
            </th>
            <th>
                <select onchange="filterTable('position', this.value)">
                    <option value="">POSITION</option>
                    @foreach ($employees->unique('position') as $emp)
                        <option value="{{ $emp->position }}">{{ $emp->position }}</option>
                    @endforeach
                </select>
            </th>
            <th>
                <select onchange="filterTable('status', this.value)">
                    <option value="">STATUS</option>
                    <option value="Online">Online</option>
                    <option value="Offline">Offline</option>
                </select>
            </th>
        </tr>
    </thead>

    <tbody>
        @foreach ($employees as $employee)
        <tr onclick="window.location='{{ route('employees.edit', $employee->id) }}'">
            <td>{{ 'E' . str_pad($employee->id, 4, '0', STR_PAD_LEFT) }}</td>
            <td>
                @if($employee->image)
                    <img src="{{ asset('storage/' . $employee->image) }}" width="40" height="40" class="rounded-circle">
                @endif
            </td>
            <td data-column="name">{{ $employee->name }}</td>
            <td data-column="position">{{ $employee->position }}</td>
            <td data-column="status" class="{{ $employee->status == 'Online' ? 'status-online' : 'status-offline' }}">
                {{ $employee->status }}
            </td>
        </tr>
        @if ($employees->isEmpty())
    <tr>
        <td colspan="6" style="color: red; text-align: center;">No employees found</td>
    </tr>
@endif

        @endforeach
    </tbody>
</table>


<script>
    function filterTable(column, value) {
        const rows = document.querySelectorAll(".employee-table tbody tr");
        rows.forEach(row => {
            const text = row.querySelector(`[data-column="${column}"]`)?.textContent.trim() || "";
            row.style.display = (!value || text === value) ? "" : "none";
        });
    }
</script>

@endsection
