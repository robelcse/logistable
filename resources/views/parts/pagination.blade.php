<div class="row justify-content-end mt-4">
    <div class="col-xl-2">

        <style>
            .active-color {
                background-color: red;
            }

            .disabled {
                pointer-events: none;
                cursor: default;
            }
        </style>

        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="?page={{ $paginator->onFirstPage() }}" aria-label="Previous">
                        <span aria-hidden="true">«</span>
                    </a>
                </li>


                @if($paginator->lastPage() > 6)
                @php
                $i = isset($_GET["page"]) ? $_GET["page"] : 1;
                $i = is_numeric($i) ? $i : 1;

                $endpoint = $paginator->lastPage()-3;
                $diff = $endpoint-$i;
                @endphp

                @if($diff > 2)

                @for($j = $i; $j < $i+3; $j++) <a class="{{ $i == $j ? 'disabled':'' }}" href="?page={{ $j }}">
                    <li class="page-item"><span class="{{ $i == $j ? 'page-link active-color':'page-link' }}">{{ $j }}</span></li>
                    </a>
                    @endfor


                    @else

                    @for($j = $i; $j <= $endpoint; $j++) <a class="{{ $i == $j ? 'disabled':'' }}" href="?page={{ $j }}">
                        <li class="page-item"><span class="{{ $i == $j ? 'page-link active-color':'page-link' }}">{{ $j }}</span></li>
                        </a>
                        @endfor

                        @endif


                        <li class="page-item"><span class="page-link">...</span></li>



                        @php
                        $diff = $paginator->lastPage() - $paginator->currentPage();
                        if($diff >= 3){
                        $diff = 2;
                        }
                        @endphp
                        @for($j = $diff; $j >= 0; $j--)

                        <a href="?page={{ $paginator->lastPage() - $j}}">
                            <li class="page-item"><span class="page-link">{{ $paginator->lastPage() - $j }}</span></li>
                        </a>
                        @endfor



                        @else


                @php
                $curretn_page = isset($_GET["page"]) ? $_GET["page"] : 1;
                $curretn_page = is_numeric($curretn_page) ? $curretn_page : 1; 
                @endphp


                        @for($i = 1; $i <= $paginator->lastPage(); $i++)

                            <a class="{{ $i == $curretn_page ? 'disabled':'' }}" href="?page={{ $i }}">
                                <li class="page-item"><span class="{{ $i == $curretn_page ? 'page-link active-color':'page-link' }}">{{ $i }}</span></li>
                            </a>

                            @endfor

                            @endif


                            <li class="page-item">

                                <a class="page-link" href="?page={{ $paginator->lastPage() }}" aria-label="Next">
                                    <span aria-hidden="true">»</span>
                                </a>
                            </li>
            </ul>
        </nav>

    </div>
</div>