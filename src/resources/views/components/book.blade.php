<div class="card mb-2" style="width: 18rem;">
    @if(is_null($previewImage))
        <img src="/storage/images/book/a-drawn-magic-book-isolated-on-a-white-background_477392-571.avif" class="card-img-top" alt="..." height="300">
    @else
    <img src="{{ $previewImage  }}" class="card-img-top" alt="...">
    @endif
    <div class="card-body">
        <h5 class="card-title"> {{ $title }} </h5>
        <h6 class="card-subtitle mb-2 text-body-secondary">{{ $description }}</h6>
        <span class="badge rounded-pill text-bg-info">{{ $createdAt }}</span>
        <a href="{{ route('showBook', ['book' => $id]) }}" class="btn btn-primary">К книге</a>
    </div>
</div>
