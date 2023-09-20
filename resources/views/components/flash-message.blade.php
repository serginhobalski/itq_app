@if(session('info'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong> {{ session('info')  }} </strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            {{-- <i class="fa-solid fa-xmark"></i> --}}
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if(session('warning'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong> {{ session('warning')  }} </strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            {{-- <i class="fa-solid fa-xmark"></i> --}}
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong> {{ session('success')  }} </strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            {{-- <i class="fa-solid fa-xmark"></i> --}}
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
