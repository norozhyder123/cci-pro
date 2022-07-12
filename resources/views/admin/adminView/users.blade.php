@extends('admin.index')
@section('content')
            <div class="col-lg-9 col-md-12 col-sm-12 ps-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="text_size-24 font_weight--500">All Users</div>
                            <div class="paragraph_medium text_color--green font_weight--500">Expand</div>
                        </div>
                        <div class="stock_update mb-3">
                            <table class="table table-responsive text-white">
                                <thead>
                                    <tr>
                                        <th>S.No#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $count = 0; @endphp
                                    @foreach($users as $user)
                                    @php $count++; @endphp
                                    <tr>
                                        <td>{{ $count }}</td>
                                        <td>{{$user->getFullName()}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td>{{$user->status}}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                            <a href="{{ route('admin.users.edit',['id' => $user->id]) }}"><i class="fa fa-pencil"></i></a>
                                            
                                            <form action="{{ route('admin.users.delete',['id' => $user->id]) }}" method="post">
                                                @csrf
                                                <button type="submit" class="btn bg-transparent text-danger"><i class="fa fa-trash"></i></button>
                                            </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
</div>

</div>
@endsection