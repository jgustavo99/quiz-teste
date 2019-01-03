@extends('quiz/app')

@section('content')
    <div class="container-fluid">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="text-center">Bem-vindo ao Quiz Copa do Mundo 2018</h3>
                </div>
                <div class="modal-body">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>

                    <a href="{{ route('quiz.step', [1]) }}" class="btn btn-success btn-start" title="Iniciar Quiz">Iniciar Quiz</a>
                </div>
            </div>
        </div>
    </div>
@endsection
