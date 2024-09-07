@extends('telaLayouts')
@section('titulo', 'Registro')
@section('conteudo')
        <form action="{{route('registration.post')}}" method="POST" class="ms-auto me-auto mt-3" style="width: 500px">
          @csrf
            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input type="text" name="name" class="form-control">
              </div>
            <div class="mb-3">
              <label class="form-label">E-mail</label>
              <input type="email" name="email" class="form-control">
            </div>
            <div class="mb-3">
              <label class="form-label">Senha</label>
              <input type="senha" name="password" class="form-control">
              <div class="form-text">Suas informações não seram compartilhadas com terceiros!</div>
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
</style>
@endsection