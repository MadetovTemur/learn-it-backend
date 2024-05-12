@if ($paginator->hasPages())

    <div class="container pagination-nav">
        <ul class="pagination-mobile">
            @if ($paginator->onFirstPage())
                <li>
                    <a href="" >Prev</a>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}">Prev</a>
                </li>
            @endif
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" class="">
                        Naxt
                    </a>
                </li>
            @else
                <li>
                    <a  class="">
                        Naxt
                    </a>
                </li>
            @endif 
        </ul> 
        <ul class="pagination">  

            @foreach ($elements as $element)
                
                @if (is_string($element))
                    <li>
                        <a>..</a>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active">
                              <a href="#">{{ $page }}</a>
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}">
                                    {{ $page }}
                                </a>                                
                            </li>

                        @endif
                    @endforeach
                @endif
            @endforeach   
            
                    {{-- Next Page Link --}}
            {{-- @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:active:bg-gray-700 dark:focus:border-blue-800" aria-label="{{ __('pagination.next') }}">
                    Next
                </a>
            @else
                <li>
                    <a aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                        Naxt
                    </a>
                </li>
            @endif --}}
        </ul>
    </div>
    <div>
        {!! __('Showing') !!}
        @if ($paginator->firstItem())
            <span class="font-medium">{{ $paginator->firstItem() }}</span>
            {!! __('to') !!}
            <span class="font-medium">{{ $paginator->lastItem() }}</span>
        @else
            {{ $paginator->count() }}
        @endif
        {!! __('of') !!}
        <span class="font-medium">{{ $paginator->total() }}</span>
        {!! __('results') !!}
    </div>

    <style type="text/css">
        * {
          margin: 0;
          padding: 0;
          font-family: sans-serif;
        }

        .pagination-nav .pagination-mobile {
            width: 100%;
            justify-content: space-around;
        }

        @media screen and (min-width: 500px) {
            .pagination-nav .pagination-mobile {
                display: none !important;
            }

            .pagination-nav .pagination {
                display: flex !important;
            }
        }
        @media screen and (max-width: 500px) { 
            .container .pagination {
                display: none !important;
            }
        }


        .pagination-nav .pagination-mobile {
            display: flex ;
        }

        .container {
/*          position: relative;*/
/*          height: 100vh;*/
          /*width: 100%;
          background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
            url("https://images.pexels.com/photos/247431/pexels-photo-247431.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940");
          background-size: cover;
          background-position: center;*/
        }
        .container .pagination {
          position: relative;
          height: 60px;
          background: rgba(255, 255, 255, 0.05);
          box-shadow: 5px 5px 30px rgba(0, 0, 0, 0.3);
          display: flex;
          align-items: center;
          justify-content: center;
          backdrop-filter: blur(3px);
          border-radius: 2px;
        }
        .container .pagination li {
          list-style-type: none;
          display: inline-block;
        }
        .container .pagination li a {
          position: relative;
          padding: 20px 25px;
          text-decoration: none;
          color: #fff;
          font-weight: 500;
        }
        .container .pagination li a:hover,
        .container .pagination li.active a {
          background: rgba(255, 255, 255, 0.2);
        }
    </style>
@endif