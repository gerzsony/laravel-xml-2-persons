@extends('base')@section('main')
<div class="row"> 
    <div class="col-sm-8 offset-sm-2">    
        <h1 class="display-5">Xml feltöltése és betöltése</h1>
        <div>

            @if (session()->has('messages'))
            <div class="alert alert-success">
                <ul>            
                    @foreach (session()->get('messages') as $msg)
                        <li>{{ $msg }}</li>
                    @endforeach
                </ul>
            </div>
            <br />
            @endif            

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>            
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                   @endforeach
                </ul>
            </div>
            <br />
            @endif
            
            <br /><br />
            <form method="post" action="/xmlupload" enctype="multipart/form-data" >
                @csrf

                <div class="form-group">
                    <label for="xmlfile">A feltöltendő XML fájl:</label>
                    <input type="file" class="form-control" name="xmlfile" accept="text/xml"/>
                </div>
                <br />
                <button type="submit" class="btn btn-primary btn-lg btn-block">Feltöltés és feldolgozás >></button>
            </form>
        </div>
    </div>
</div>
@endsection