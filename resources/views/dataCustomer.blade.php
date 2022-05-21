@extends('template/main')
@section('body')
    <div>
         <ul>Name {{ $boyers->name }}</ul>
        <ul>Second name {{ $boyers->secondName }}</ul>
        <ul>Phone {{ $boyers->phone }}</ul>
        <ul>Email {{ $boyers->email }}</ul>
        <ul>Locked {{ $boyers->locked ? 'Заблокирован': 'Доступен'}}</ul>
    </div>
    <div>
        <h4>Adresses: </h4>
        <table border="1">
            <td> Tag </td>
            <td> City </td>
            <td> Street </td>
            <td> Building </td>
            <td> Created at </td>
            @foreach($boyers->adresses as $adress)
                <tr>
                    <td> {{$adress->tag}} </td>
                    <td> {{$adress->city}} </td>
                    <td> {{$adress->street}} </td>
                    <td> {{$adress->building}} </td>
                    <td> {{$adress->created_at}} </td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection
