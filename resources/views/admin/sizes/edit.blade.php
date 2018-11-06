@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Talla
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($size, ['route' => ['admin.sizes.update', $size->id], 'method' => 'patch']) !!}

                        @include('admin.sizes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection