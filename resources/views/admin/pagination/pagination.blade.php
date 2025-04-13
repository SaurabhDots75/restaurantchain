<div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-4 gap-3">
    <div>
        Showing {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }} of {{ $paginator->total() }} entries
    </div>
    <div class="d-flex align-items-center gap-2">
        <form id="perPageForm" method="GET" action="{{ request()->url() }}">
            <label class="me-2">Per Page:</label>
            <select name="per_page" class="form-select form-select-sm"
                onchange="document.getElementById('perPageForm').submit();">
                @foreach ([10, 20, 50, 100] as $limit)
                    <option value="{{ $limit }}" {{ request('per_page', 10) == $limit ? 'selected' : '' }}>
                        {{ $limit }}
                    </option>
                @endforeach
            </select>
            @foreach (request()->except('page', 'per_page') as $key => $value)
                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endforeach
        </form>

        {{-- Laravel Pagination --}}
        <div>
            {!! $paginator->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
    </div>
</div>
