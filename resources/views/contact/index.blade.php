@extends('comum.index')

@section('content')
<div class="row">
    <div class="col-lg">
        <h1 class="g-font-weight-300 g-font-size-28 g-color-black g-mb-30">Contact</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg">
        <a href="{{route('contact.create')}}" class="btn btn-primary">Novo Contact</a>
    </div>
</div>
<div class="row">
    <div class="col-lg">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>

                    <th>Name</th>
                    <th>phone</th>
                    <th>mensagem</th>
                    <th>Actions</th>

                </tr>
            </thead>

            <tbody>

                @foreach($listContact as $i => $contt)
                <tr>
                    <td>{{ $contt->name }}</td>
                    <td>{{ $contt->phone }}</td>
                    <td>{{ $contt->msg}}</td>

                    <td>
                        <div class="g-pos-rel g-top-3 d-inline-block">
                            <a id="dropDown1Invoker{{$i}}}"
                                class="u-link-v5 g-line-height-0 g-font-size-24 g-color-gray-light-v6 g-color-secondary--hover"
                                href="#" aria-controls="dropDown1" aria-haspopup="true" aria-expanded="false"
                                data-dropdown-event="click" data-dropdown-target="#dropDown{{$i}}">
                                <i class="hs-admin-more-alt"></i>
                            </a>

                            <div id="dropDown{{$i}}"
                                class="u-shadow-v31 g-pos-abs g-right-0 g-z-index-2 g-bg-white u-dropdown--css-animation u-dropdown--hidden u-dropdown"
                                aria-labelledby="dropDown1Invoker">
                                <form action="{{route('contact.destroy', $contt->id)}}" method="POST">
                                    <ul class="list-unstyled g-nowrap mb-0">
                                        <li>
                                            <a class="d-flex align-items-center u-link-v5 g-bg-gray-light-v8--hover g-font-size-12 g-font-size-default--md g-color-gray-dark-v6 g-px-25 g-py-14 btn-info"
                                                href="{{route('contact.edit', $contt->id)}}">
                                                <i
                                                    class="hs-admin-pencil g-font-size-18 g-color-gray-light-v6 g-mr-10 g-mr-15--md"></i>
                                                Edit
                                            </a>
                                        </li>
                                        <li>
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="d-flex align-items-center u-link-v5 g-bg-gray-light-v8--hover g-font-size-12 g-font-size-default--md g-color-gray-dark-v6 g-px-25 g-py-14 btn-danger"
                                                type="submit">
                                                <i
                                                    class="hs-admin-trash g-font-size-18 g-color-gray-light-v6 g-mr-10 g-mr-15--md"></i>
                                                Delete
                                            </button>
                                        </li>
                                    </ul>
                                </form>

                            </div>
                        </div>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection()
