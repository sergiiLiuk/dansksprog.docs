@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
         <div class="col-md-8 col-md-offset-2">
             <div class="panel panel-default">
                    <h1>User Dashboard</h1>
                 <a href="/documents/create" class="btn btn-primary">
                    Write Document
                 </a>
                 <a href="/files/upload" class="btn btn-primary">
                    Upload File
                 </a>
                 <hr>
                 <div class="panel-body">
                     <h3>Your Documents</h3>
                     @if (count($documents)>0)
                          <table class="table table-striped">
                         <tr>
                             <th>Title</th>
                             <th></th>
                             <th></th>
                         </tr>
                         @foreach ($documents as $document)
                            <tr>
                                <td>{{$document->title}}</td>
                                <td><a href="/documents/{{$document->id}}/edit"   class="btn btn-default">Edit</a></td>
                                <td>{!!Form::open(['action' => ['DocumentsController@destroy', $document->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                    {!!Form::close()!!}</td>
                            </tr>                             
                         @endforeach
                     </table> 
                     @else
                     <p>You have no documents</p>
                     @endif                   
                 </div>
             </div>
         </div>
    </div>
</div>
@endsection
