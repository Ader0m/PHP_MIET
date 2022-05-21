@extends('template.main')
@section('body')
    <div>
        <form action='{{ route('boyer') }}' id="find" method="GET">
            <h4> Filter </h4>
            Locked <input type="text" name="locked">
            Phone <input type="text" name="phone">
            E-mail <input type="text" name="email">
            Name <input type="text" name="name">
            <button type="submit" id="find" style="width:100px;height: 30px "> Find </button>
        </form>
    </div>
    <br>
    <div>
        <table border="1">
            <td> ID </td>
            <td> Name </td>
            <td> Second name </td>
            <td> Locked </td>
            <td> Phone </td>
            <td> E-mail </td>
            <td> Created at </td>
            @foreach($boyers as $boyer)
                <tr>
                    <td> <a href="{{ route('dataCustomer', ['id' => $boyer->id]) }}"> {{ $boyer->id }} </a></td>
                    <td> {{ $boyer->name }}</td>
                    <td> {{ $boyer->secondName }} </td>
                    <td> {{ $boyer->locked }} </td>
                    <td> {{ $boyer->phone }} </td>
                    <td> {{ $boyer->email }}</td>
                    <td> {{ $boyer->created_at }}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <div>
        {{ $boyers->links() }}
    </div>

@endsection
