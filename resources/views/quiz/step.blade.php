@extends('quiz/app')

@section('content')
    <div class="container-fluid">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3><span class="label label-warning" id="qid">{{ $step }}</span> <img src="{{ asset('images/flags/' . $flag_sorted . '.png') }}" class="img-responsive flag-image" /> </h3>
                </div>
                <div class="modal-body">
                    <form action="{{ route('quiz.step.save', [$step]) }}" method="post" id="form">
                        {!! csrf_field() !!}

                        <div class="quiz" id="quiz" data-toggle="buttons">
                            @foreach ($alternatives as $id => $value)
                                <label class="element-animation{{ $loop->iteration }} btn btn-lg btn-primary btn-block"><label class="btn-label"><i class="glyphicon glyphicon-chevron-right"></i></label> <input type="radio" name="selected_answer" data-url="{{ route('quiz.step.save', [$step, $id]) }}" value="{{ $id }}">{{ $loop->iteration }} {{ $value }}</label>
                            @endforeach
                        </div>
                    </form>
                </div>
                <div class="modal-footer text-muted">
                    <span id="answer"></span>
                </div>
            </div>
        </div>
    </div>
@endsection
