@include('header')

<div class="panel panel-flat">
	<div class="panel-heading">
		<h4 class="panel-title">Employee User</h4>
		
        <div class="heading-elements">
            <a href="{{ url('/user/add') }}" class="btn btn-primary">Create user</a>      
        </div><br>
	</div>

    <div class="panel-body">
    	<div class="table-responsive">
    		<table class="table" id="table">
    			<thead>
    				<tr>
    					<th>ID</th> 
    					<th>Name</th>
                        <th>Email </th>
                        <th>Date of birth</th>
    					<th>Address</th>
                        <th>Salary</th>
                        <th>Action</th>
    				</tr>
    			</thead>
    			<tbody>
    			</tbody>
    		</table>
    	</div>
    </div>
</div>

<div class="modal fade" id="addSalaryModal" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Salary</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

            <div class="row">

                <input type="hidden" id="id" name="">

                <div class="col-md-6">
                    
                    <input type="radio" name="salary_type" value="monthly" checked="" class="salary_type"> Create Monthly Salary
                </div>

                <div class="col-md-6">
                    <input type="radio" name="salary_type" value="weekly" class="salary_type"> Create Weekly Salary
                </div>

                <div class="col-md-6">
                    <b>Start Date: <span class="text-danger">*</span></b>
                    <input type="date" name="start_date" id="start_date" value="" class="form-control">
                </div>

                <div class="col-md-6">
                    <b>End Date: <span class="text-danger">*</span></b>
                    <input type="date" name="end_date" id="end_date" value="" class="form-control">
                </div>

                <div class="col-md-6">
                    <b>Daily Salary: <span class="text-danger">*</span></b>
                    <input type="number" name="salary_amount" id="salary_amount" value="" class="form-control" placeholder="Enter Salary Amount">
                </div>

                <div class="col-md-6">
                    <b>Deductions: <span class="text-danger">*</span></b>
                    <input type="number" name="deductions" id="deductions" value="" class="form-control" placeholder="Enter deductions">
                </div>

                <div class="col-md-12">
                    <b>Deductions Description:</b>
                    <textarea class="form-control" name="description" id="description" placeholder="Enter Description"></textarea>
                </div>
                
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="submitSalary">Save changes</button>
      </div>
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
            pageLength: 5,
            // scrollX: true,
            "order": [[ 0, "desc" ]],
            ajax: '{{ route('users-datatable') }}',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'dob', name: 'dob'},
                {data: 'address', name: 'address'},
                {data: 'Salary', name: 'Salary'},
                {data: 'Actions', name: 'Actions',orderable:false,serachable:false,sClass:'text-center'},
            ]

        });



        
        $(document).off('click','.addSalarybtn').on('click','.addSalarybtn',function(){
            id = $(this).data('id');

            $('#id').val(id);

        });

        $(document).off('click','#submitSalary').on('click','#submitSalary',function(){

            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

            var total_day = diffinday($('#start_date').val(), $('#end_date').val()) + 1;
            var total_salary = (total_day * $('#salary_amount').val());
            var total_deductions = $('#deductions').val() * $('#salary_amount').val();
            var net_total = (total_salary - total_deductions);


            $.ajax({
                url: "user/addsalary",
                method: 'post',
                data: {
                    user_id: $('#id').val(),
                    salary_type: $('input[name="salary_type"]:checked').val(),
                    start_date: $('#start_date').val(),
                    end_date: $('#end_date').val(),
                    salary_amount: $('#salary_amount').val(),
                    deductions: $('#deductions').val(),
                    description: $('#description').val(),
                    total_day: total_day,
                    total_salary: total_salary,
                    total_deductions: total_deductions,
                    net_total: net_total,
                },
                success: function(response) {

                    if (response.statuscode) 
                    {
                        show_notify(response.msg, 'bg-success');
                        $('#addSalaryModal').modal('hide');
                    }else{
                        show_notify(response.msg, 'bg-success');
                    }

                    
                },
                error:function(response)
                {
                    show_notify('Somthings wrong.!', 'bg-danger');
                }
            });

        });

       

    });
   
function diffinday(startDate,endDate)
{
    var diffInMs   = new Date(endDate) - new Date(startDate);
    return  diffInMs / (1000 * 60 * 60 * 24);   
}
</script>