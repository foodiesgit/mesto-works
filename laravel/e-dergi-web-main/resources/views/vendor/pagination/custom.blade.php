@if ($paginator->hasPages())
<div class="d-flex justify-content-between align-items-center flex-wrap">
    <div class="d-flex flex-wrap py-2 mr-3">
		{{-- Previous Page Link --}}
		@if ($paginator->onFirstPage())
		    <a aria-disabled="true" aria-label="@lang('pagination.previous')" class="disabled btn btn-icon btn-sm btn-light mr-2 my-1">
		    	<i class="ki ki-bold-arrow-back icon-xs" aria-hidden="true"></i>
		    </a>
		@else
		    <a href="{{ $paginator->previousPageUrl() }}" aria-label="@lang('pagination.previous')" class="btn btn-icon btn-sm btn-light mr-2 my-1">
                	<i class="ki ki-bold-arrow-back icon-xs"></i>
		    </a>
		@endif


																

		{{-- Pagination Elements --}}
		@foreach ($elements as $element)
			{{-- "Three Dots" Separator --}}
			@if (is_string($element))
				<a aria-disabled="true" class="disabled btn btn-icon btn-sm border-0 btn-light mr-2 my-1">{{ $element }}</a>
			@endif

			{{-- Array Of Links --}}
			@if (is_array($element))
				@foreach ($element as $page => $url)
					@if ($page == $paginator->currentPage())
						<a class="btn btn-icon btn-sm border-0 btn-light btn-hover-primary active mr-2 my-1" aria-current="page">{{ $page }}</a>
					@else
						<a href="{{ $url }}" class="btn btn-icon btn-sm border-0 btn-light mr-2 my-1">{{ $page }}</a>
					@endif
				@endforeach
			@endif
		@endforeach

		{{-- Next Page Link --}}
		@if ($paginator->hasMorePages())
			<a href="{{ $paginator->nextPageUrl() }}" class="btn btn-icon btn-sm btn-light mr-2 my-1" rel="next" aria-label="@lang('pagination.next')">
				<i class="ki ki-bold-arrow-next icon-xs"></i>
			</a>
		@else
			<a class="disabled btn btn-icon btn-sm btn-light mr-2 my-1" rel="next" aria-disabled="true" aria-label="@lang('pagination.next')">
				<i class="ki ki-bold-arrow-next icon-xs"></i>
			</a>
		@endif
    </div>
</div>
@endif
