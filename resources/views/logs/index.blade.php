@extends('base')
@section('main')


<div class="row">
    <div class="col-sm-12">
    <h1 class="display-5">Logok</h1>
        <table class="table table-striped table-hover" >
            <thead>
                <tr><td>Azonsító</td><td>Adószám</td><td>Név</td><td>Egyéb ID</td><td>Belépés</td><td>Kilépés</td><td>Email cím</td><td>Rögzítés ideje</td><td>Státusz</td></tr>
            </thead>    
            <tbody>        
                @foreach($logs as $log)
                <tr onclick="window.location='/persons/{{$log->person_id}}'" style="cursor: pointer;">
                    <td>{{$log->person_id }}</td>
                    <td>{{$log->tax_number }}</td>
                    <td>{{$log->full_name }}</td> 
                    <td>{{$log->other_id }}</td>
                    <td>{{$log->entry_date }}</td>
                    <td>{{$log->leave_date }}</td>
                    <td>{{$log->email_address }}</td>
                    <td>{{$log->record_created }}</td>
                    <td>{{$log->insert_status == "successful" ? "✅ Sikeres" : "❌ Sikertelen" }}</td>
                </tr>        
                @endforeach    
            </tbody>  
        </table>
    </div>
</div>
@endsection