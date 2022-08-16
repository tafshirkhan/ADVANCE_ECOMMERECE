@extends('Admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">



                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add New State</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <form method="post" action="{{ route('store.state') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Select Division</h5>
                                                    <div class="controls">
                                                        <select name="division_id" class="form-control">
                                                            <option value="" selected="" disabled="">Select
                                                                Division </option>

                                                            @foreach ($shippingdivision as $division)
                                                                <option value="{{ $division->id }}">
                                                                    {{ $division->division_name }}</option>
                                                            @endforeach

                                                        </select>
                                                        @error('division_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5>Select District</h5>
                                                    <div class="controls">
                                                        <select name="district_id" class="form-control">
                                                            <option value="" selected="" disabled="">Select
                                                                District </option>

                                                            @foreach ($district as $district)
                                                                <option value="{{ $district->id }}">
                                                                    {{ $district->district_name }}</option>
                                                            @endforeach

                                                        </select>
                                                        @error('district_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror

                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <h5>State Name<span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="state_name" class="form-control">
                                                        @error('state_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror

                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="text-xs-right">
                                    <button type="submit" class="btn btn-info">Submit</button>
                                </div>
                            </form>



                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->


                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>


    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="division_id"]').on('change', function() {
                var division_id = $(this).val();
                if (division_id) {
                    $.ajax({
                        url: "{{ url('/division/district/ajax') }}/" + division_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            var d = $('select[name="district_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="district_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .district_name + '</option>'
                                );
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            })
        });
    </script>
@endsection
