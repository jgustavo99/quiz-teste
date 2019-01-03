@extends('quiz/app')

@section('content')
    <div class="container-fluid">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="text-center">Resultado do Quiz:</h3>
                </div>
                <div class="modal-body">
                    <ul class="ul-result">
                        @foreach ($flags as $flag)
                            <li><img src="{{ asset('images/flags/' . $flag . '.png') }}" class="img-responsive flag-image" /> </li>

                            <br>
                            @if ($answers[$loop->iteration] == config('quiz.answers.'.$flag))
                                <b>Acertou!</b>
                            @else
                                <b>Errou!</b>
                            @endif

                            <br>

                            Resposta correta: <b>{{ config('quiz.alternatives.' . $flag . '.' . config('quiz.answers.' . $flag)) }}</b>
                        @endforeach
                    </ul>
                    <a href="{{ route('quiz.index') }}" class="btn btn-success btn-start" title="Iniciar Quiz">Voltar a tela inicial</a>
                </div>
            </div>
        </div>
    </div>
@endsection
