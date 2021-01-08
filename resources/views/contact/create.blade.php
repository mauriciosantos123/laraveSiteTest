@extends('comum.index')
@section('content')
<div>
<div class="g-pa-20 " >
    <h1 class="g-font-weight-300 g-font-size-28 g-color-black g-mb-30">Contatos</h1>
    <div class="g-mb-80">
        <form action="{{route('contact.store')}}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="inputName">Name</label>
                <input type="text" class="form-control" id="name" name="name" >
            </div>
            <div class="form-group">
                <label for="inputphone">telefone</label>
                <input type="text" class="form-control" id="phone" name="phone" >
            </div>

            <div class="form-group">
                <label for="inputmsg">Menssagem</label>
                <input type="text" class="form-control" id="msg" name="msg" >
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
</div>


@endsection()
@section('footer')
@endsection()
