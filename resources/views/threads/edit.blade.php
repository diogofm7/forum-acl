@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-12">
            <h2>Editar Tópico</h2>
        </div>
        <div class="col-12">
            <form action="{{ route('threads.update', $thread->slug) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Titulo Tópico</label>
                    <input type="text" name="title" class="form-control" value="{{ $thread->title }}">
                </div>
                <div class="form-group">
                    <label>Conteúdo Tópico</label>
                    <textarea name="body" id="" cols="30" rows="10" class="form-control">{{ $thread->body }}</textarea>
                </div>

                <button type="submit" class="btn btn-lg btn-success">Atualizar Tópico</button>
            </form>
        </div>
    </div>

@endsection
