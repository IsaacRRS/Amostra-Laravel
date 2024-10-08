@extends('telaLayouts') <!-- Trazendo o layout -->
@section('titulo', 'Login') <!-- Substituição do título -->
@section('conteudo')
    <div class="container">

        <div class="mt-5">
            @if($errors->any())
              <div class="col-12">
                @foreach($errors->all() as $error)
                  <div class="alert alert-danger">{{$error}}</div>
                @endforeach
              </div> 
            @endif
  
            @if(session()->has('error')) <!-- Mensagem de erro -->
              <div class="alert alert-danger">{{session('error')}}</div>
            @endif
  
            @if(session()->has('sucesso')) <!-- Mensagem de sucesso -->
              <div class="alert alert-success">{{session('sucesso')}}</div>
            @endif
  
          </div>
          <!-- os dados irão para a rota login.post -->
        <form action="{{route('login.post')}}" method="POST" class="ms-auto me-auto mt-3" style="width: 500px">
            @csrf <!-- token -->
            <div class="mb-3">
              <label class="form-label">E-mail</label>
              <input name="email" type="email" class="form-control">
              <div class="form-text">Seu e-mail não irá ser compartilhado com terceiros!</div>
            </div>
            <div class="mb-3">
              <label class="form-label">Senha</label>
              <input name="password" type="password" class="form-control">
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input">
              <label class="form-check-label">Lembre de mim</label>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </form>
    </div>
<style>
    nav {
        font-weight: bold;
        box-shadow: 2px 3px rgb(22, 21, 21);
    }
    .ms-auto {
        padding-top: 110px;
    }
    .ms-auto label {
        font-weight: bold;
    }
    input[type='checkbox'] {
        box-shadow: 2px 2px black;
    }
    input {
        box-shadow: 2px 1px rgb(40, 39, 39);
    }
</style>
@endsection