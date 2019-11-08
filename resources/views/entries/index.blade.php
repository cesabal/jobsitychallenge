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
                    <div class="card-header">Entries</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                @if( $userId )
                                    <a href="{{ url('/entries/create') }}" class="btn btn-success btn-sm" title="Add New Entry">
                                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                                    </a>
                                @endif
                            </div>
                            
                            <div class="col-md-4">
                            <form method="GET" action="{{ url('/entries') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                                <div class="input-group">
                                    <input type="text" class="form-control input-text" name="search" placeholder="Search..." value="{{ request('search') }}">
                                    <span class="input-group-append">
                                        <button class="btn btn-secondary" type="submit">
                                            <i class="fa fa-search"> Search </i>
                                        </button>
                                    </span>
                                </div>
                            </form>
                            </div>
                        </div>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Title</th><th>Author</th>
                                        
                                        @if( $userId )
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
                                        <td>{{ $item->author }}</td>
                                        {{-- <td>{{ $item->content }}</td> --}}
                                        
                                        @if( $userId )

                                            <td>

                                                @can('update', $item)
                                                    
                                                    <a href="{{ url('/entries/' . $item->id . '/edit') }}" title="Edit Entry">
                                                        <button class="btn btn-primary btn-sm">
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                             Edit
                                                        </button>
                                                    </a>

                                                @endcan

                                                @can('delete', $item)
                                                    <form method="POST" action="{{ url('/entries' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                            {{ method_field('DELETE') }}
                                                            {{ csrf_field() }}
                                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Entry" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                                 Delete
                                                            </button>
                                                    </form>
                                                @endcan

                                            </td>

                                        @endif

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
