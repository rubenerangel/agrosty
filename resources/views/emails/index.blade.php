@extends('layout')

@section('content')

<div class="row mt-3 col-10">
    <div class="col-9 mx-auto">
        <h3>Envio de mensajes</h3>

        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
        @endif
    
        <form action="/sendemail" method="POST">
            @csrf <!-- {{ csrf_field() }} -->
            <div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="test" name="name" class="form-control" id="name" aria-describedby="emailHelp" required>
                </div>
            </div>

            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
            </div>

            <div class="form-group">
                <label for="asunto">Asunto</label>
                <select name="asunto" id="asunto" class="form-control" required>
                    <option value="">--SELECCIONE--</option>
                    <option value="reclamo">Reclamo</option>
                    <option value="solicitud">Solicitud</option>
                    <option value="queja">Queja</option>
                    </select>
            </div>

            <div class="form-group">
                <label for="mensaje">Mensaje</label>
                <textarea class="form-control" id="mensaje" name="mensaje" rows="3" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

@stop