<x-layout title="Séries">
    @isset($mensagemSucesso)
    <div class="alert alert-success">
        {{$mensagemSucesso}}
    </div>
    @endisset

    <ul class="list-group">
        @foreach($series as $serie)
            <li class="list-group-item d-flex justify-content-between aling-items-center">
                <a href="{{route('seasons.index',$serie->id)}}">{{$serie->nome}} </a>
            <span class="d-flex">
                <a href="{{route('series.edit', $serie->id)}}" class="btn btn-success btn-sm">Editar</a>
            <form action="{{route('series.destroy', $serie->id)}}" method="post" class="ms-2">
                @csrf
                @method('DELETE')
            <button class="btn btn-danger btn-sm">Excluir</button>
              </form>
              </span>
            </li>
        @endforeach
    </ul>

   <a href="/series/create"><button class="btn btn-dark mt-4">Adicionar</button></a>

</x-layout>
