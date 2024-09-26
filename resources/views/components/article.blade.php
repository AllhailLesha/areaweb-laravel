<div class="card mb-2" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title"> {{ $title }} </h5>
        <h6 class="card-subtitle mb-2 text-body-secondary">{{ $text }}</h6>
        <a href="{{ route('article', ['article' => $id]) }}" class="btn btn-primary">К новости</a>
    </div>
</div>
