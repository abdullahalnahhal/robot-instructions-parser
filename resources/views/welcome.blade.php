@extends('layouts.main')
@section('content')

    @include('robot.actions')

    @isset($robot)
        <div class='row mt-5'>
            <div class='col-3 bg-primary p-3 text-white'>
                {{ __("Final Position") }}
            </div>
            <div class='col-3 p-3 bg-white'> : X = {{ $robot->position['x'] }} , Y = {{ $robot->position['y'] }}</div>
            <div class='col-3 bg-primary p-3 text-white'>
                {{ __("Literal Instruction") }}
            </div>
            <div class='col-3 p-3 bg-white'> : {{ implode(', ', $robot->literal_history) }}</div>
        </div>

        <div class='row mt-5'>
            <div class="col-6 bg-primary p-3 text-white">
                {{ __('Full History') }}
            </div>
            <div class="col-6 row p-3 bg-white">
                @foreach($robot->history as $instruction)
                    <div class='col-md-4 mt-2'>
                        {{ $loop->index + 1 }} ) X = {{ $instruction['x'] }}, Y = {{ $instruction['y'] }}
                    </div>
                @endforeach
            </div>
        </div>

        <div class='row mt-5'>
            <div class="col-6 bg-primary p-3 text-white">
                {{ __('Instructions File List') }}
            </div>
            <div class="col-6 row p-3 bg-white">
                @foreach($old_files as $file)
                    <a href={{ asset('storage/'.$file) }}> {{ $loop->index + 1 }} ) {{ $file }}</a>
                    <br><br>
                @endforeach
            </div>
        </div>
    @endisset
@endsection
