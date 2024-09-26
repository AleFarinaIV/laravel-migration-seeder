@extends('layouts.app')

@section('content')

    <div class="container py-5">
        
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Azienda</th>
                        <th scope="col">Stazione di Partenza</th>
                        <th scope="col">Stazione di Arrivo</th>
                        <th scope="col">Orario di Partenza</th>
                        <th scope="col">Orario di Arrivo</th>
                        <th scope="col">Codice Treno</th>
                        <th scope="col">Numero di Carrozze</th>
                        <th scope="col">Treno in Orario</th>
                        <th scope="col">Treno Cancellato</th>
                      </tr>
                    </thead>
                    <tbody>

                        @foreach ($trains as $train)
                            <tr>
                                <th scope="row">{{ $train->id }}</th>
                                <td>{{ $train->azienda }}</td>
                                <td>{{ $train->stazione_partenza }}</td>
                                <td>{{ $train->stazione_arrivo }}</td>
                                @if (!$train->in_orario && $train->cancellato)

                                    <td></td>
                                @elseif ($train->orario_partenza > $train->orario_arrivo)
                                
                                    <td>Il treno è già partito!</td>
                                @else

                                    <td>{{ $train->orario_partenza }}</td>
                                @endif
                                @if (!$train->in_orario && $train->cancellato)

                                    <td></td>
                                @else

                                    <td>{{ $train->orario_arrivo }}</td>
                                @endif

                                <td>{{ Str::upper($train->codice_treno) }}</td>
                                <td>{{ $train->numero_carrozze }}</td>
                                @if ($train->in_orario && !$train->cancellato ||
                                    $train->in_orario && $train->cancellato)

                                    <td>In Orario</td>
                                @elseif (!$train->in_orario && $train->cancellato)
                                
                                    <td></td>
                                @else
                                
                                    <td>In Ritardo</td>
                                @endif

                                @if (!$train->in_orario && $train->cancellato)
                                    <td>Cancellato</td>
                                @else
                                    <td></td>
                                @endif
                            </tr>
                        @endforeach

                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection