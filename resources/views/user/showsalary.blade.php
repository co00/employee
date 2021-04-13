@include('header')

<div class="panel panel-flat">
	<div class="panel-heading">
		<h4 class="panel-title">Employee Salary</h4>
		
        <div class="heading-elements">
            <a href="{{ url('/user') }}" class="btn btn-danger">Back</a>      
        </div><br>
	</div>

    <div class="panel-body">
    	<div class="table-responsive">
    		<table class="table" id="table">
    			<thead>
    				<tr>
    					<th>ID</th> 
    					<th>Date</th>
                        <th>Salary </th>
                        <th>Description</th>
                        <th>Actions</th>
                        <th>-</th>
    				</tr>
    			</thead>
    			<tbody>
    			</tbody>
    		</table>
    	</div>
    </div>
</div>




@include('footer')

<script type="text/javascript" src="{{ asset('assets') }}/js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript" src="{{ asset('assets') }}/js/plugins/forms/selects/select2.min.js"></script>
<script type="text/javascript" src="{{ asset('assets') }}/js/pages/datatables_basic.js"></script>

<script type="text/javascript" src="{{ asset('assets') }}/js/plugins/forms/styling/uniform.min.js"></script>
<script type="text/javascript" src="{{ asset('assets') }}/js/plugins/forms/styling/switchery.min.js"></script>


<script type="text/javascript">
    $(document).ready(function(){

        $(".datepicker-format").datepicker({
            dateFormat: "yy-mm-dd"
        });

        var dataTable = $('#table').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            pageLength: 10,
            // scrollX: true,
            "order": [[ 0, "desc" ]],
            ajax: "{{ route('salary-datatable',$id) }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'start_date', name: 'start_date'},
                {data: 'salary_amount', name: 'salary_amount'},
                {data: 'description', name: 'description'},
                {data: 'Actions', name: 'Actions',orderable:false,serachable:false,sClass:'text-center'},
                {data: 'Actions', name: 'Actions',orderable:false,serachable:false,sClass:'text-center'},
            ]

        });

    });
</script>