<x-layout title="Nova Série">
    <form action="/series/salvar" method="post">
        @csrf
        <div class="mb-3">
        <label for="nome" class="form-label">Nome:</label>
        <input type="text" id="nome" name="nome" class="form-control">
        </div>
        <a href="/series/criar"><button class="btn btn-dark mt-3">Adicionar</button></a>
    </form>
</x-layout>
