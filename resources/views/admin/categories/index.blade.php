@extends('layouts.app')

@section('content')
    <a href="{{route('admin.categories.create')}}" class="btn btn-lg btn-success">Criar Categoria</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $cat)
                <tr>
                    <td>{{$cat->id}}</td>
                    <td>{{$cat->name}}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{route('admin.categories.edit', ['category' => $cat->id])}}" class="btn btn-sm btn-primary">Editar</a>

                            <form action="{{route('admin.categories.destroy', ['category' => $cat->id])}}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-sm btn-danger">Remover</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{$categories->links()}}
@endsection
