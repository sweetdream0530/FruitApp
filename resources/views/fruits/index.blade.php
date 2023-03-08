@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1 class="text-primary mb-4">Filter Fruits</h1>
            <form action="{{ route('fruits.filter') }}" method="GET">
                <div class="form-group">
                    <label for="name" class="text-secondary">Name</label>
                    <input type="text" name="name" value="{{ request('name') }}" class="form-control" placeholder="Enter fruit name">
                </div>
                <div class="form-group">
                    <label for="family" class="text-secondary">Family</label>
                    <input type="text" name="family" value="{{ request('family') }}" class="form-control" placeholder="Enter fruit family">
                </div>
                <button type="submit" class="btn btn-primary mt-3">Filter</button>
            </form>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <h1 class="text-primary mb-4">All Fruits</h1>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="text-secondary">Name</th>
                        <th class="text-secondary">Family</th>
                        <th class="text-secondary">Genus</th>
                        <th class="text-secondary">Order</th>
                        <th class="text-secondary">Carbohydrates</th>
                        <th class="text-secondary">Protein</th>
                        <th class="text-secondary">Fat</th>
                        <th class="text-secondary">Calories</th>
                        <th class="text-secondary">Sugar</th>
                        <th class="text-secondary">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($fruits as $fruit)
                    <tr>
                        <td>{{ $fruit->name }}</td>
                        <td>{{ $fruit->family }}</td>
                        <td>{{ $fruit->genus }}</td>
                        <td>{{ $fruit->order }}</td>
                        <td>{{ $fruit->carbohydrates }}</td>
                        <td>{{ $fruit->protein }}</td>
                        <td>{{ $fruit->fat }}</td>
                        <td>{{ $fruit->calories }}</td>
                        <td>{{ $fruit->sugar }}</td>
                        <td>
                            @if (session('favorite_fruits', []) && in_array($fruit->id, session('favorite_fruits')))
                                <form action="{{ route('fruits.unfavorite', $fruit) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Remove from Favorites</button>
                                </form>
                            @else
                                <form action="{{ route('fruits.favorite', $fruit) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Add to Favorites</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $fruits->links() }}
        </div>
    </div>
</div>
@endsection