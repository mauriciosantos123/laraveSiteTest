@extends('comum.index')
@section('content')
<div class="g-pa-20">
    <h1 class="g-font-weight-300 g-font-size-28 g-color-black g-mb-30">Tables - Basic</h1>

    <header class="g-mb-20">
        <h2 class="g-font-weight-400 g-font-size-16 g-color-black mb-0">Basic Table</h2>
    </header>

    <div class="g-mb-80">

        <form action="{{route('contact.update',$reg->id)}}" method="POST" >
            {{ csrf_field() }}
            @method('PUT')
            <div class="form-group">
                <label for="inputName">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $reg
                 ->name }}">
            </div>

            <div class="form-group">
                <label for="inputCollection">Colection</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $reg
                 ->phone }}">
            </div>
            
                        <div class="form-group">
                <label for="inputMsg">Menssagem</label>
                <input type="text" class="form-control" id="msg" name="msg" value="{{ $reg
                 ->msg }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
