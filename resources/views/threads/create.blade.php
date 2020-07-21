@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-12">
            <h2>Criar Tópico</h2>
        </div>
        <div class="col-12">
            <form action="{{ route('threads.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label>Titulo Tópico</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label>Conteúdo Tópico</label>
                    <textarea name="body" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>

                <button type="submit" class="btn btn-lg btn-success">Criar Tópico</button>
            </form>
        </div>
    </div>

@endsection
