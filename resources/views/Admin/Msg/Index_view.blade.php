@extends('Layouts.Admin_app')

@section('title')
    Display Messages
@endsection

@section('content')
    <div class="col-lg-12">
        <a href="{{route('Msg.Index', ['type'=>'All'])}}" class="btn btn-primary" style="margin-bottom: 10px">All</a>
        <a href="{{route('Msg.Index', ['type'=>'Read'])}}" class="btn btn-primary" style="margin-bottom: 10px">Read</a>
        <a href="{{route('Msg.Index', ['type'=>'UnRead'])}}" class="btn btn-primary" style="margin-bottom: 10px">Unread</a>
        <div class="panel panel-primary">
            <div class="panel-heading">
                Notifications
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>E-mail</th>
                        <th>Phone</th>
                        <th>Read at</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($msgs as $msg)
                        <tr class="odd gradeX">
                            <td><i class="fa-envelope{{is_null($msg->read_at?'':'-o') }}"></i></td>
                            <td>{{$msg->data['name']}}</td>
                            <td>{{$msg->data['email']}}</td>
                            <td>{{$msg->data['phone']}}</td>
                            <td>{{$msg->read_at}}</td>

                            <form action="{{route('Msg.Delete', ['id'=>$msg->id])}}" method="post" id="deleteForm-{{$msg->id}}">
                                @csrf
                            </form>
                            <td>
                                <a class="btn btn-danger" href="{{route('Msg.Delete',['id'=>$msg->id])}}" onclick="deleteNotification('{{$msg->id}}')">Delete</a>
                                <a class="btn btn-primary" href="{{route('Msg.Read',['id'=>$msg->id])}}">Read</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <script>
                    function deleteNotification($id){
                        event.preventDefault();
                        var $flag = confirm("Are you sure?");
                        if($flag){
                            document.getElementById('deleteForm-' + $id).submit();
                        }
                    }
                </script>
                <!-- /.table-responsive -->
                <script>
                    $(document).ready(function () {
                        $('#dataTables-example').DataTable({
                            responsive: true
                        });
                    });
                </script>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
@endsection
