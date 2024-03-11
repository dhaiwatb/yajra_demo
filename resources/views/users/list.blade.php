<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                Users List
            </h2>
            
        </div>
    </x-slot>
    
    {{-- {!! $dataTable->table(['class' => 'table table-bordered']) !!} --}}

    <div class="container mt-5">
        <h2 class="mb-4">Laravel 7|8 Yajra Datatables Example</h2>
        <table class="table table-bordered yajra-datatable" id="user-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    

    
    
</x-app-layout>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>


    <script type="text/javascript">
        $(function () {
            var table = $('#user-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('users.list') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'updated_at', name: 'updated_at'},
                    {
                    data: 'action', 
                    name: 'action', 
                    orderable: true, 
                    searchable: true
                    }
                ]
            });
        });
    </script>


