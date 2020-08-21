@extends('layout')

@section('content')
<div class="row my-5 ml-5">
  <div class="col-3">
    <div class="card" style="width: 12rem;">
      
      <div class="card-body">
        <h3 class="card-title">Total</h3>
        <div class="text-center mx-auto counters" >{{$countEmail->count()}}</div>
        <div class="text-center text-muted"><span>100%</span></div>
      </div>
    </div>
  </div>

  <div class="col-3">
    <div class="card" style="width: 12rem; text-left">
      
      <div class="card-body">
        <h3 class="card-title">Queja</h3>
        <div class="text-center mx-auto counters">{{$queja}}</div>
        <div class="text-center text-muted"><span>{{$quejaPercent}} %</span></div>
      </div>
    </div>
  </div>
  <div class="col-3">
    <div class="card" style="width: 12rem;">
      
      <div class="card-body">
        <h3 class="card-title">Solicitud</h3>
        <div class="text-center mx-auto counters">{{$solicitud}}</div>
        <div class="text-center text-muted"><span>{{$solicitudPercent}} %</span></div>
      </div>
    </div>
  </div>
  <div class="col-3">
    <div class="card" style="width: 12rem;">
      
      <div class="card-body">
        <h3 class="card-title">Reclamo</h3>
        <div class="text-center mx-auto counters">{{$reclamo}}</div>
        <div class="text-center text-muted"><span>{{$reclamoPercent}} %</span></div>
      </div>
    </div>
  </div>
</div>



@stop
