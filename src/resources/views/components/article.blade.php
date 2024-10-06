<div class="card mb-2" style="width: 18rem;">
    <img src="{{ $previewImage }}" class="card-img-top" alt="..." height="200">
    <div class="card-body">
        <h5 class="card-title"> {{ $title }} </h5>
        <h6 class="card-subtitle mb-2 text-body-secondary">{{ $body }}</h6>
        <span class="badge rounded-pill text-bg-info">{{ $createdAt }}</span>
        <a href="{{ route('article', ['article' => $id]) }}" class="btn btn-primary">К новости</a>
    </div>
</div>
