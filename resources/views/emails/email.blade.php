<p>Welcome: {{$employee->last_name}}</p>
<table>
    <tr>
        <td>Name</td>
        <td>{{ $employee->last_name }}</td>
    </tr>
    <tr>
        <td>Email</td>
        <td>{{ $employee->email }}</td>
    </tr>
</table>
<p>Congratulations, you have been successfully registered to join our system.</p>
<style>
    table, td, th {
        border: 1px solid #ddd;
        text-align: left;
    }
    table {
        border-collapse: collapse;
        width: 100%;
    }
    th, td {
        padding: 15px;
        text-align: left;
    }
</style>