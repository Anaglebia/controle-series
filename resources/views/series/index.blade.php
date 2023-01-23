<x-layout title="Séries">

    <ul class="list-group">
        @foreach($series as $serie)
            <li class="list-group-item">{{$serie->nome}} </li>
        @endforeach
    </ul>
   <a href="/series/criar"><button class="btn btn-dark mb-2">Adicionar</button></a>

</x-layout>
