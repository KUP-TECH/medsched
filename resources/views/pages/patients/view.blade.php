<x-dashboard.basedashboard active_link="{{ $active_link }}">
    <div class="card">
        <x-dashboard.cardheader title="Patients">
            <div class="row mt-3 align-items-center pb-2 border-bottom">
                <div class="col">
                    
                    
                </div>
                <div class="col">
                    <x-dashboard.cardsearchbar search_route="patient.view" placeholder="Patient name"></x-dashboard.cardsearchbar>
                </div>
            </div>
        </x-dashboard.cardheader>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-info table-striped">
                <thead>
                    <tr class="text-center">
                        <th>Name</th>
                        <th>Date of Birth</th>
                        <th>Address</th>
                        <th>Contact No.</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($patients as $p)
                        <tr class="text-center">
                            <td>{{ "$p->fname $p->mname $p->lname" }}</td>
                            <td>{{ $p->dob }}</td> 
                            <td>{{ $p->address }}</td>
                            <td>{{ $p->contactno }}</td>
                            <td>{{ $p->email }}</td>
                        </tr>                    
                    @endforeach

                </tbody>

            </table>
            </div>
            

        </div>
        <x-dashboard.paginationcomponent page="{{$page}}" search="{{$search}}" totalPages="{{$totalPages}}"
            route="{{ 'patient.view' }}">
        </x-dashboard.paginationcomponent>

    </div>

</x-dashboard.basedashboard>