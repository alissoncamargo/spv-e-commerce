@if (isset($errors) && (count($errors) > 0))
<!-- mostra este bloco se existe uma chave na sessão chamada mensagem-erro -->
    <div class='alert alert-danger'>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (Session::has('mensagens-sucesso'))
    <!-- mostra este bloco se existe uma chave na sessão chamada mensagens-sucesso -->
    <div class='alert alert-success'>
        @if (is_array(Session::get('mensagens-sucesso')))
            <ul>
            @foreach (Session::get('mensagens-sucesso') as $msg)
                <li>{{$msg}}</li>
            @endforeach
            </ul>
        @else
            {{Session::get('mensagens-sucesso')}}
        @endif
    </div>
@endif

@if (Session::has('mensagens-danger'))
    <!-- mostra este bloco se existe uma chave na sessão chamada mensagens-sucesso -->
    <div class='alert alert-danger'>
        @if (is_array(Session::get('mensagens-danger')))
            <ul>
            @foreach (Session::get('mensagens-danger') as $msg)
                <li>{{$msg}}</li>
            @endforeach
            </ul>
        @else
            {{Session::get('mensagens-danger')}}
        @endif
    </div>
@endif
