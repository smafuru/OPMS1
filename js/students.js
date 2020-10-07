$(document).ready(function(){
	var studentData = $('#studentList').DataTable({
		"lengthChange": false,
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"action.php",
			type:"POST",
			data:{action:'listStudent'},
			dataType:"json"
		},
		"columnDefs":[
			{
				"targets":[0, 7, 8],
				"orderable":false,
			},
		],
		"pageLength": 10
	});	

	$('#addStudent').click(function(){
		$('#studentModal').modal('show');
		$('#studentForm')[0].reset();		
		$('.modal-title').html("<i class='fa fa-plus'></i> Student Admission");
		$('#action').val('addStudent');
		$('#save').val('Save');
	});	
	
	$(document).on('submit','#studentForm', function(event){
		event.preventDefault();
		$('#save').attr('disabled','disabled');		
		$.ajax({
			url:"action.php",
			method:"POST",
			data: new FormData(this),
			processData: false,
			contentType: false,
			success:function(data){				
				$('#studentForm')[0].reset();
				$('#studentModal').modal('hide');				
				$('#save').attr('disabled', false);
				studentData.ajax.reload();
			}
		})
	});	
	
	$(document).on('click', '.update', function(){
		var studentid = $(this).attr("id");
		var action = 'getStudentDetails';
		$.ajax({
			url:'action.php',
			method:"POST",
			data:{studentid:studentid, action:action},
			dataType:"json",
			success:function(data){
				$('#studentModal').modal('show');
				$('#studentid').val(data.student_id);
				$('#sname').val(data.student_name);
				if(data.gender == 'male') {
					$('#male').prop("checked", true);
				} else if(data.gender == 'female') {
					$('#female').prop("checked", true);
				}
				$('#dob').val(data.dob);
                                $('#photo').val(data.photo);
				$('#mobile').val(data.mobile);
                                $('#email').val(data.email);
                                $('#address').val(data.current_address);
                                $('#fname').val(data.father_name);
                                $('#alternative_mobile').val(data.alternative_mobile);
                                $('#mname').val(data.mother_name);
                                $('#domicile_place').val(data.domicile_place);
				$('#registerNo').val(data.admission_no);
				$('#rollNo').val(data.roll_no);
                                $('#class_name').val(data.class_name);
				$('#talent').val(data.talent);
				$('#hobby').val(data.hobby);
				$('#future_dream').val(data.future_dream);
				$('#stream').val(data.stream);
				$('#admission_date').val(data.admission_date);
				$('#category').val(data.category);
				$('#academic_year').val(data.acadfemic_year);
				$('#registered_by').val(data.registered_by);
				$('#admission_status').val(data.admission_status);
                                $('#registered_on').val(data.registered_on);
				
				
								
				$('.modal-title').html("<i class='fa fa-plus'></i> Edit Student");
				$('#action').val('updateStudent');
				$('#save').val('Save');
			}
		})
	});	
	
	$(document).on('click', '.delete', function(){
		var studentid = $(this).attr("id");		
		var action = "deleteStudent";
		if(confirm("Are you sure you want to delete this Student?")) {
			$.ajax({
				url:"action.php",
				method:"POST",
				data:{studentid:studentid, action:action},
				success:function(data) {					
					studentData.ajax.reload();
				}
			})
		} else {
			return false;
		}
	});	
	
	
	
});