@extends('layouts.app')

@section('title')
    Wishlist Products
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>My wishlist products</h2>
        </div>
        @if($favorites->count())
            <div class="table-responsive">
                <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($favorites as $favorite)
                    <tr data-id="{{$favorite->id}}">
                        <td>{{$favorite->name}}</td>
                        <td>
                            <a href="{{ $favorite->product_url }}"
                               class="btn btn-sm btn-primary" role="button"
                               title="Go to Product" target="_blank"
                               data-toggle="tooltip">
                                <i class="fa fa-eye"></i></a>
                            <a href="#"
                               class="btn btn-sm btn-danger delete" role="button"
                               title="Delete" target="_blank" data-id="{{$favorite->id}}"
                               data-name="{{$favorite->name}}" data-toggle="tooltip">
                                <i class="fa fa-close"></i></a>
                        </td>
                    </tr>
                 @endforeach
                </tbody>
            </table>
            </div>
        @else
            <div class="card-body card-padding">
                <h4>Your wish list is empty =(</h4>
            </div>
        @endif
        @include('frontend.wishlist.form')
    </div>
@endsection

@section('scripts')
    @include('frontend.wishlist.modal-script')
    <script src="{{asset('vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.min.js')}}"></script>
@endsection