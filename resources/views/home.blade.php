@extends('layouts.principal')
@section('content')

@stack('scripts') 

</script>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Pagina Principal</div>

                <div class="panel-body">
                    Nome do user: {{session('user_name')}} Voce esta logado!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
