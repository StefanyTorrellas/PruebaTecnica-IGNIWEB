@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex justify-content-between mb-5">
                <div>
                    <p><strong>Name:</strong>  {{$user->name}}</p>
                    <p><strong>Email:</strong>  {{$user->email}}</p>
                    <p><strong>Total reserves:</strong>   {{$books->count()}}</p>
                    <button type="button" class="btn btn-primary btn-sm">
                        <a class="nav-link" href="{{ route('books.index') }}">{{ __('Search book') }}</a>
                        
                    </button>

                </div>
                <div>
                <img src="https://mdbcdn.b-cdn.net/img/new/avatars/5.webp" class="rounded-3" style="width: 150px;"
  alt="Avatar" />
                </div>
            </div>
            <div class="card">
                <div class="card-header">My reserves</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>Id</th>
                                        
										<th>Title</th>
										<th>Author</th>
										<th>Description</th>
										<th>Category</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($books as $book)
                                        <tr>
                                            <td>{{ $book->id }}</td>
                                            
											<td>{{ $book->title }}</td>
											<td>{{ $book->author }}</td>
											<td>{{ $book->description }}</td>
											<td>{{ $book->category->nombre }}</td>

                                            <td>
                                                <form action="{{ route('books.delivery',$book->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
