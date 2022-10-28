@if ($paginator->hasPages())
<div class="col-sm-6 number-of-items">
	<p>Showing {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }} of {{ $paginator->total()  }} ({{ $paginator->lastPage() }} Pages)</p>
</div>
<div class="col-sm-6 text-right">
<ul class="pagination">
	@if ($paginator->onFirstPage())
	<li>
        <a href="{{ $paginator->previousPageUrl() }}">PREV</a>
    </li>
    @else
    <li>
        <a href="{{ $paginator->previousPageUrl() }}">PREV</a>
    </li>
    @endif

    <!-- numbers -->
    @foreach ($elements as $element)
   
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li class="active">
            <a href="{{ $paginator->url($page) }}"><span>{{$page}}</span></a>
        </li>
        @else
        <li>
            <a href="{{ $paginator->url($page) }}">{{$page}}</a>
        </li>
        @endif
        @endforeach
        @endif

    @endforeach
    <!-- end numbers -->



     @if ($paginator->hasMorePages())
     <li>
        <a href="{{ $paginator->nextPageUrl() }}">NEXT</a>
    </li>
    @else
    <li>
		<a href="{{ $paginator->nextPageUrl() }}">NEXT</a>
	</li>
    @endif
</ul> 
</div> 

@endif      

