@extends('base') @section('main')
<div class="row">    
    <div class="col-sm-8 offset-sm-2">        
        <h1 class="display-3">Személy adatlapja</h1>        
         
        <table class="table table-striped">
            <tbody>  
            <tr><td>Azonosító: </td><td> {{ $person->person_id  }} </td></tr>
            <tr><td>Adószám: </td><td> {{ $person->tax_number }} </td></tr>
            <tr><td>Név: </td><td> {{ $person->full_name  }} </td></tr>
            <tr><td>Egyéb id: </td><td> {{ $person->other_id }} </td></tr>
            <tr><td>Belépés:</td><td> {{ $person->entry_date  }} </td></tr>
            <tr><td>Kilépés: </td><td> {{ $person->leave_date }} </td></tr>
            <tr><td>Email cím </td><td> {{ $person->email_address }} </td></tr>
            <tr><td>Rögzítés ideje </td><td> {{ $person->record_created }} </td></tr>
            </tbody>  
        </table>
    
  
    </div>
</div>
@endsection