<div class="row justify-content-end mt-4">
    <div class="col-xl-2">

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
                @endphp
                @for($j = 0; $j < 3; $j++) <a href="?page={{ $i+$j }}">
                    <li class="page-item"><span class="page-link">{{ $i+$j }}</span></li>
                    </a>
                    @endfor
                    .......

                    @php
                    $diff = $paginator->lastPage() - $paginator->currentPage(); 
                    if($diff >= 3){
                    $diff = 2;
                    }
                    @endphp
                    @for($j = $diff; $j >= 0; $j--)

                    <a href="?page={{ $paginator->lastPage() - $j}}">
                        <li class="page-item"><span class="page-link active">{{ $paginator->lastPage() - $j }}</span></li>
                    </a>
                    @endfor



                    @else


                    @for($i = 1; $i <= $paginator->lastPage(); $i++)

                        <a href="?page={{ $i }}">
                            <li class="page-item"><span class="page-link">{{ $i }}</span></li>
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