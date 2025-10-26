<x-dashboard.basedashboard active_link="{{ $active_link }}">
    <div class="card">
        <x-dashboard.cardheader title="Records">
            <div class="row mt-3 align-items-center pb-2 border-bottom">
                <div class="col">

                    
                </div>
                <div class="col">
                    <x-dashboard.cardsearchbar search_route="medical_records" placeholder="Patient name"></x-dashboard.cardsearchbar>
                </div>
            </div>
        </x-dashboard.cardheader>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-info table-striped">
                    <thead>
                        <tr class="text-center">
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($patients as $p)
                            <tr class="text-center align-center">
                                <td>{{$p->fname}}</td>
                                <td>{{$p->lname}}</td>
                                <td>
                                    <a class="btn btn-outline-primary btn-sm py-1 px-2" target="_blank" href="{{ route('download_pdf', ['id' => $p->user_id]) }}">
                                        <i class="bi bi-cloud-arrow-down-fill fs-5 "></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>
            

        </div>
        <x-dashboard.paginationcomponent page="{{$page}}" search="{{$search}}" totalPages="{{$totalPages}}"
            route="{{ 'medical_records' }}">
        </x-dashboard.paginationcomponent>

    </div>

    


    

</x-dashboard.basedashboard>