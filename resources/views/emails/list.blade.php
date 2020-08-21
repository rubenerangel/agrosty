@extends('layout')

@section('content')
<div class="row mt-3 col-10">
  <table class="table table-striped m-2">
    <thead>
      <tr>
        <th colspan="6" class="text-center"><h3>Emails enviados</h3></th>
      </tr>
      <tr>
        <th>
          <td colspan="6">
            <a class="btn btn-warning" href="{{ route('export') }}">Excel Emails</a> &nbsp;
            <a class="btn btn-danger" href="{{ route('exportPDF') }}">PDF Emails</a></td>
        </th>
      </tr>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">E-mail</th>
        <th scope="col">Asunto</th>
        <th scope="col">Mensaje</th>
        <th scope="col">Fecha</th>
      </tr>
    </thead>
    <tbody>
      @foreach($emails as $email)
        <tr>
          <td>{{$email->id}}</td>
          <td>{{$email->name}}</td>
          <td>{{$email->email}}</td>
          <td>{{$email->asunto}}</td>
          <td>{{$email->mensaje}}</td>
          <td>{{$email->created_at->format('d-m-Y')}}</td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>

@stop
