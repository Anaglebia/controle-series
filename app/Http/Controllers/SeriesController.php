<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Series;
use App\Http\Controllers\Season;
use App\Http\Requests\SeriesFormRequest;

class SeriesController extends Controller
{
    public function index(Request $request){
        // $series = Serie::query()->orderBy('nome')->get();
        //metodo ordeBy ordena em ordem algabetica a visualização das series
        $series = Series::all();
        $mensagemSucesso = session('mensagem.sucesso');


        return view('series.index')->with('series', $series)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create(){
        return view('series.create');
    }

    public function store(SeriesFormRequest $request){

        $serie=Series::create($request->all());

        $season =[];
            for($i=1; $i<=$request->seasonsQty; $i++){
            $season[] = ['series_id'=>$serie->id,'number'=>$i];
        }
        Season::insert($seasons);

            $episodes =[];
            foreach($serie->seasons as $season){
                for($j=1; $j <= $request->episodesPerSeason; $j++){
                    $episodes[] =['season_id'=>$season->id, 'number'=>$j];
                }
        }
        Episode::insert($episodes);
        // $request->session()->flash('mensagem.sucesso',"Serie '{$serie->nome}' adicionada com sucesso!");

        return redirect('/series.index')->with('mensagem.s

        ucesso',"Serie '{$serie->nome}' adicionada com sucesso");
    }

    public function destroy(Series $series){
        $series->delete();
        // Serie::destroy($request->serie);
        // $request->session()->flash('mensagem.sucesso',"Série removida com sucesso");
        return redirect('/series')->with('mensagem.sucesso',"Série '{$series->nome}' removida com sucesso");
    }

    public function edit(Series $series){
        return view('series.edit')->with('serie', $series);

    }

    public function update(Series $series, SeriesFormRequest $request){
        $series->fill($request->all());
        $series->save();

        return redirect('series.index')->with('mensagem.sucesso',"Serie '{$series->nome}' atualizada com sucesso!");
    }

}
