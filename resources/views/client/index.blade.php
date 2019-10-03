@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h4>Clients</h4>
            <div class="col-2"><a class="btn  btn-primary" href="/clients/new">ADD NEW CLIENT</a></div>

            <table class="table">
                <thead>
                <tr>
                    <th width="200">Name</th>
                    <th width="200">Email</th>
                    <th width="200">Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($clients as $client)
                    <tr>
                        <td>{{$client->title}} . {{$client->name}} {{$client->last_name}}</td>
                        <td>{{$client->email}}</td>
                        <td>
                            <a class="btn btn-success" href="{{route('show_client',['client_id' => $client->id])}}">EDIT</a>
                            <a class="btn btn-success" href="{{route('check_room',['client_id' => $client->id])}}">BOOK A ROOM</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

        </div>

@endsection

