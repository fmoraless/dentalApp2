@extends('layouts.master')
@section('content')
<div class="col-md-12">

    {{--        success alert al crear--}}

</div>
<div class="col">
    @include('mensaje.list_mensajes')
    
    {{ $mensajes->links() }}
</div>
@stop
