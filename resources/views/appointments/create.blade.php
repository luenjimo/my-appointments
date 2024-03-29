@extends('layouts.panel')

@section('content')
<div class="card shadow">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Registrar nueva cita</h3>
      </div>
      <div class="col text-right">
        <a href="{{  url('patients')}}" class="btn btn-sm btn-default">
          Cancelar y volver
        </a>
      </div>
    </div>
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger" role="alert">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>

    @endif


    <form action="{{ url('patients') }}" method="post">
      @csrf
  <div class="form-group">
    <label for="name">Especialidad</label>
    <select name="" id="" class="form-control">
      @foreach ($specialties as $specialty)
        <option value="{{ $specialty->id }}">{{ $specialty->name }}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="name">Médico</label>
    <select name="" id="" class="form-control">
      @foreach ($specialties as $specialty)
        <option value="{{ $specialty->id }}">{{ $specialty->name }}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="email">Fecha</label>
    <div class="input-group">
      <div class="input-group-prepend">
          <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
      </div>
      <input class="form-control datepicker" placeholder="Selecciona fecha" type="text" value="{{ old('email') }}">
    </div>

  </div>
  <div class="form-group">
    <label for="dni">Hora de atención</label>
    <input type="text" name="dni" class="form-control" value="{{ old('dni') }}" >
  </div>
  <div class="form-group">
    <label for="address">Dirección</label>
    <input type="text" name="address" class="form-control" value="{{ old('address') }}" >
  </div>
  <div class="form-group">
    <label for="phone">Teléfono / Móvil</label>
    <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" >
  </div>
  <div class="form-group">
      <label for="password">Contraseña</label>
      <input type="text" name="password" class="form-control" value="{{ str_random(6) }}" >
  </div>
    <button type="submit" class="btn btn-primary">
      Guardar
    </button>
  </form>
  </div>

</div>

  
@endsection

@section('scripts')
<script src="{{ asset('/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
@endsection