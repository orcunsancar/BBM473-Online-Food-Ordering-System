@extends('layouts.app')

@section('title')
    Add My Favourites
@endsection

@section('body')

<section class="vbox">
    <section class="scrollable padder">
        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Workset</li>
        </ul>
        <div class="m-b-md">
            <h3 class="m-b-none">Add My Favourites</h3>
        </div>
        <section class="panel panel-default">
            <header class="panel-heading">
                Add My Favourites
                <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>
            </header>

            <div class="panel-body">
                {!! Form::open(array('route'=>'scoreboard.store')) !!}
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Name</label>
                            {!! Form::text('name', '', ['placeholder'=>'Enter full name', 'class'=>'form-control input-lg','required']) !!}
                        </div>

                        <div class="form-group">
                            <label>Product ID</label>
                            {!! Form::select('product_id', $product, null, ['id'=>'product_id', 'class'=>'form-control m-b input-lg','required']) !!}
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="line line-dashed line-lg pull-in"></div>
                        {!! Form::submit('Create', [ 'class'=>'btn btn-default']) !!}
                    </div>
                {!! Form::close() !!}
            </div>

        </section>
    </section>
</section>

@endsection