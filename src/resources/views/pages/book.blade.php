@extends('layouts.app')

@section('body')
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $title }}</h5>
                    <p class="card-text">{{ $description }}</p>
                    <p class="card-text"><small class="text-body-secondary">{{ $createdAt }}</small></p>
                </div>
            </div>
        </div>
    </div>
@endsection
