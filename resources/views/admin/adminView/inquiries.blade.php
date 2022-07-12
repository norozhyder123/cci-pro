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
                                        <th>Message</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $count = 0; @endphp
                                    @foreach($contacts as $contact)
                                    @php $count++; @endphp
                                    <tr>
                                        <td>{{ $count }}</td>
                                        <td>{{$contact->name}}</td>
                                        <td>{{$contact->email}}</td>
                                        <td>{{$contact->message}}</td>
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
</div>

</div>
@endsection