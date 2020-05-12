@extends('layouts.app')

@section('content')
<h2 class="text-center">Lista de tags</h2>

<div class="d-flex mb-2 justify-content-end">
    <a href="{{route('tags.create')}}" class="btn btn-success right"><i class="fas fa-plus-circle"></i> Nova</a>

    @if(!$trashed)
    <a href="{{route('trashed-tags.index')}}" class="btn btn-danger right ml-2"><i class="fas fa-recycle"></i>
        Lixeira</a>
    @endif
</div>

<div>
    <div class="row">

        <table class="table table-striped table-hover">
            <thead class="thead-light">
                <tr class="center">
                    <th scope="col">Nome</th>

                    @if(!$trashed)
                    <th scope="col">Visualizar</th>
                    <th scope="col">Editar</th>
                    @else
                    <th scope="col">Restaurar</th>
                    @endif

                    <th scope="col">{{ $trashed ? 'Excluir' : 'Mover pra lixeira' }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                <tr class="center">
                    <th scope="row">{{$tag->name}} - ({{$tag->products()->count()}})</th>

                    @if(!$trashed)
                    <td>
                        <a href="" class="btn btn-primary btn-sm">
                            <i class="fas fa-eye">
                            </i>
                        </a>
                    </td>

                    <td>
                        <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-warning btn-sm"><i
                                class="fas fa-pen"></i></a>
                    </td>
                    @else
                    <td>
                        <form action="{{ route('restore-tag.update', $tag->id) }}" method="POST"
                            onsubmit="return confirm('Deseja restaurar {{ $tag->name }}?')">
                            @csrf
                            @method('PUT')
                            <button type="submit" href="#" class="btn btn-warning btn-sm">
                                <i class="fas fa-undo"></i>
                            </button>
                        </form>
                    </td>
                    @endif

                    <td>
                        <form action="{{ route('tags.destroy', $tag->id) }}" method="POST"
                            onsubmit="return confirm('Deseja excluir {{ $tag->name }}?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" href="#" class="btn btn-danger btn-sm"><i
                                    class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection