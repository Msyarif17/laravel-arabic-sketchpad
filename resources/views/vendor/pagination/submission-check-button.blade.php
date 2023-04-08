{{-- {{ dd($paginator->hasPages()) }} --}}

@if ($paginator->hasPages() || count($elements) >= 1)
    @if ($paginator->hasMorePages())
        <div class="col-6 ps-3 pe-1">
            <button href="{{ $paginator->nextPageUrl() }}" onclick="reject()" class="btn btn-danger w-100" id="reject"><i
                    class="fa-solid fa-x"></i> Reject</buttton>
        </div>
        <div class="col-6 pe-3 ps-1">
            <button href="{{ $paginator->nextPageUrl() }}" class="btn btn-primary w-100" id="accept"><i
                    class="fa-solid fa-check"></i> Accept</buttton>
        </div>
    @else
        <div class="col-6 ps-3 pe-1">
            <button href="{{ $paginator->nextPageUrl() }}" class="btn btn-danger w-100" id="reject"><i
                    class="fa-solid fa-x"></i> Reject</buttton>
        </div>
        <div class="col-6 pe-3 ps-1">
            <button href="{{ $paginator->nextPageUrl() }}" class="btn btn-primary w-100" id="accept"><i
                    class="fa-solid fa-check"></i> Accept</buttton>
        </div>
    @endif
@else
    <div class="col-12 text-center">
        <p class="text-secondary">
            Saat Ini Tidak Ada Yang Harus di Acc :)
        </p>
    </div>
@endif
