@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            
            {{-- Adjust content if not sidebar present --}}
            @if( $sidebar )
                <div class="col-md-9">
            @else
                <div class="col-md-12">
            @endif

                <div class="card">
                    <a href="{{ url('/') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <div class="card-header">This is a user page, can see theirself tweets, except the hidden tweets.</div>
                    <div class="card-body">

                        <br/>
                        <br/>

                        <div class="table-responsive">
                            
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Title</th><th>Author</th>
                                        
                                        @if( $uid )
                                            <th>Actions</th>
                                        @endif

                                    </tr>
                                </thead>
                                
                                <tbody>

                                    @foreach($entries as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <a href="{{ url('/entries/' . $item->id) }}" title="View Entry">
                                                    {{ $item->title }}
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                
                                </tbody>

                            </table>

                            <div class="pagination-wrapper"> {!! $entries->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>

            @if( $sidebar )
                @include('sidebar')
            @endif

        </div>
    </div>
@endsection
