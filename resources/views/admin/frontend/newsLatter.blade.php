@extends('layouts.admin')

@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">News Latter</h4>

                <div class="page-title-right">

                </div>

            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <form class="needs-validation" novalidate="" action="{{route('admin.send.newslatter')}}" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">News Latter Message</label>
                                <textarea type="text" cols="6" rows="10" name="newsmessage" class="form-control"></textarea>
                            </div>
                        </div>
                        <button class="btn btn-primary waves-effect waves-light" type="submit">Send To All</button>
                    </form>

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>


    <div class="row">
        <!-- end col -->

        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Email List</h4>

                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                            <tr>
                                <th>Email</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($news_latter as $nemail)
                                <tr>
                                    <td>{{$nemail->email}}</td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                        {{$news_latter->links()}}
                    </div>
                </div>
                <!-- end card-body-->
            </div>
            <!-- end card -->

        </div>
        <!-- end col -->
    </div>



    <div class="modal fade" id="sendnewslatter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Send News Latter</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.send.newslatter')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Category Name</label>
                            <textarea type="text" class="form-control" name="newsmessage"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>






@stop


@section('js')
    <script type="text/javascript" src="{{asset('assets/admin/js/nicEdit-latest.js')}}"></script>
    <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

@stop
