@extends('layouts.default')
    @section('content')
    <table class="table table-dark table-striped"> 
       <tr>
          <th>Name</th>
          <th>Email</th>
          <th class="ml-5">Action</th>
       </tr>
      @foreach($user as $u)
         <tr>
            <td>{{$u->name}}</td>
            <td>{{$u->email}}</td>
               <td>
               <a href="/show" class="btn p-3 gly" >
                     <span class="glyphicon glyphicon-eye-open " data-toggle="tooltip" data-placement="bottom" title="Show"></span>
                 </a>
                 <a href="{{route('user.edit',$u->slug)}}" class="btn p-3 gly">
                     <span class="glyphicon glyphicon-edit" data-toggle="tooltip" data-placement="bottom" title="Edit"></span>
                 </a>
                 <a href="/delete.php?id={{$u->id}}" class="btn p-3 gly">
                     <span class="glyphicon glyphicon-trash " data-toggle="tooltip" data-placement="bottom" title="delete"></span>
                 </a>
               </td>
             
         </tr>
      @endforeach

   </table>
    @stop

