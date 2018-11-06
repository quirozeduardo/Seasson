@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Ordered Article
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($orderedArticle, ['route' => ['admin.orderedArticles.update', $orderedArticle->id], 'method' => 'patch']) !!}

                        @include('admin.ordered_articles.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection