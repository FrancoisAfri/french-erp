@extends('layouts.main_layout')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Product Search Results</h3>
                </div>
                <!-- /.box-header -->
                <!--<form class="form-horizontal" method="POST" action="/audits/print">-->
                {{ csrf_field() }}
                <div class="box-body">
                    <!-- Collapsible section containing the amortization schedule -->
                    <div class="box-group" id="accordion">
                        <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                        <div class="panel box box-primary">
                            <div class="box-body">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                    </tr>
                                    @if(count($tickets) > 0)
                                        @foreach($tickets as $product)
                                            <tr>
                                                <td>{{ (!empty($product->name)) ?  $product->name : ''}} </td>
                                                <td>{{ (!empty($product->catName)) ?  $product->catName : ''}} </td>
                                                <td>{{ (!empty($product->description)) ?  $product->description : ''}} </td>
                                                <td>
                                                    R {{ (!empty($product->price)) ?  'R' .number_format($product->price, 2) : ''}} </td>
                                            </tr>
                                        @endforeach
                                        <tr>

                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                        </tr>
                                    @endif
                                </table>
                                <div class="row no-print">
                                    <div class="col-xs-12">
                                        <button type="button" class="btn btn-default pull-left" id="back_button"><i
                                                    class="fa fa-arrow-left"></i> Back
                                        </button>
                                    </div>
                                </div>
                                <!-- End amortization /table -->
                            </div>
                        </div>
                    </div>
                    <!-- /. End Collapsible section containing the amortization schedule -->
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('page_script')
    <script>
        $(function () {
            //Cancel button click event
            $('#back_button').click(function () {
                location.href = '/product/Search';
            });
        });
    </script>
@endsection