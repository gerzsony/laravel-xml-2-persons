@extends('base')
@section('main')


<div class="row">
    <div class="col-sm-12">
    <h1 class="display-5">Felhasználók</h1>
        <table class="table table-striped">
            <thead>
                <tr><td>Azonsító</td><td>Adószám</td><td>Név</td><td>Egyéb ID</td><td>Belépés</td><td>Kilépés</td><td>Email cím</td><td>Rögzítés ideje</td></tr>
            </thead>    
            <tbody>        
                @foreach($persons as $person)
                <tr>
                    <td>{{$person->person_id }}</td>
                    <td>{{$person->tax_number }}</td>
                    <td>{{$person->full_name }}</td> 
                    <td>{{$person->other_id }}</td>
                    <td>{{$person->entry_date }}</td>
                    <td>{{$person->leave_date }}</td>
                    <td>{{$person->email_address }}</td>
                    <td>{{$person->record_created }}</td>

                </tr>        
                @endforeach    
            </tbody>  
        </table>
    </div>
</div>
@endsection