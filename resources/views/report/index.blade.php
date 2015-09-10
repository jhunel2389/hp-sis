@extends('layouts.master')

@section('head')
	@parent
	<title>Reports</title>
@stop

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-2 col-md-offset-0">
				<h5>Generate Report</h5>
					 <div class="list-group">
						  <div class="list-group-item active">
						    Sidebar Text
						  </div>
						  <a href="#all-student"  onclick="allStudent();"class="list-group-item">All Student:
						  </a>
						  <a href="#student-by" onclick="studentBy();" class="list-group-item">Student By:
						  </a>
						  <a href="#student-by-age"  onclick="cityForm();" class="list-group-item">Student by Age:
						  </a>
					</div>
			</div>

			<div class="col-md-10 col-md-offset-0">
				<h1 id="hTitle"></h1>
				
				<div class="row">
					<div id="inputForm">
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<div id="divdrpYearLvl" class="form-group has-feedback">
							<label for="drpYearLvl">Lastname</label>
						</div>
					</div>
					<div class="col-md-3">
						<div id="divdrpSection" class="form-group has-feedback">
							<label for="drpSection">Firstname</label>
						</div>
					</div>
					<div class="col-md-3">
						<div id="divdrpYearLvl" class="form-group has-feedback">
							<label for="drpYearLvl">Year Level</label>
						</div>
					</div>
					<div class="col-md-3">
						<div id="divdrpSection" class="form-group has-feedback">
							<label for="drpSection">Section</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="" id="dataList">
					</div>
				</div>
			</div>	
			
		</div>
	</div>
<script type="text/javascript">
	function studentBy()
	{
		$("#hTitle").text('Student by:');
		$("#inputForm").empty();
		$("#inputForm").append('<div class="col-md-4">\
									<div class="form-group has-feedback">\
										<label for="drpYear">Select Type</label>\
										<div>\
											<select id="drpType" name="drpType" onchange="fieldsParam();" style="color:#000" class="form-control">\
												<option value="1">Year Level</option>\
												<option value="2">Section</option>\
												<option value="3">City</option>\
												<option value="4">Zip</option>\
											</select>\
										</div>\
									</div>\
									<div id="fieldsParam">\
									</div>\
									<div class="form-group">\
									<input type="submit" value="Generate" onClick="generateReportBy();" class="btn btn-default">\
								</div>\
								</div>');
		fieldsParam();
	}

	function fieldsParam()
	{
		$paramVal = $("#drpType").val();
		if($paramVal == 1)
		{
			$("#fieldsParam").empty();
			$("#fieldsParam").append('<div class="form-group has-feedback">\
											<label for="drpYear">Select Year</label>\
											<div>\
												<select id="drpYear" name="drpYear" style="color:#000" class="form-control">\
												</select>\
											</div>\
										</div>\
									</div>');
			yearList();
		}
		else if($paramVal == 2)
		{
			$("#fieldsParam").empty();
			$("#fieldsParam").append('<div class="form-group has-feedback">\
											<label for="drpSection">Select Section</label>\
											<div>\
												<select id="drpSection" name="drpSection" style="color:#000" class="form-control">\
												</select>\
											</div>\
										</div>\
									</div>');
			allSections();
		}
		else if($paramVal == 3)
		{
			$("#fieldsParam").empty();
			$("#fieldsParam").append('<div class="form-group has-feedback">\
											<label for="drpCity">Select City</label>\
											<div>\
												<select id="drpCity" name="drpCity" style="color:#000" class="form-control">\
												</select>\
											</div>\
										</div>\
									</div>');
			allCity();
		}
		else if($paramVal == 4)
		{
			$("#fieldsParam").empty();
			$("#fieldsParam").append('<div id="divzip" class="form-group has-feedback">\
											<label for="zip">Zip</label>\
											<input id="zip" name="zip" type="text" class="form-control">\
										</div>');
		}
	}

	function generateReportBy()
	{
		if($paramVal == 1)
		{
			$value = $("#drpYear").val();
			$dbColumn = "year_lvl";
		}
		else if($paramVal == 2)
		{
			$value = $("#drpSection").val();
			$dbColumn = "section";
		}
		else if($paramVal == 3)
		{
			$value = $("#drpCity").val();
			$dbColumn = "city";
		}
		else if($paramVal == 4)
		{
			$value = $("#zip").val();
			$dbColumn = "zip";
		}

		$.get('{{URL::Route('generateReportBy')}}', { dbColumn :  $dbColumn , value :  $value } , function(data)
		{
			$('#dataList').empty();
			if(data.length != 0)
			{
				for(var i = 0; i< data.length; i++)
				{
					$('#dataList').append('<div class="row">\
											<div class="col-md-3">\
													<input type="text" class="form-control" value="'+data[i].stud_lname+'" disabled>\
											</div>\
											<div class="col-md-3">\
													<input type="text" class="form-control" value="'+data[i].stud_fname+'" disabled>\
											</div>\
											<div class="col-md-3">\
													<input type="text" class="form-control" value="'+data[i].stud_year+'" disabled>\
											</div>\
											<div class="col-md-3">\
													<input type="text" class="form-control" value="'+data[i].stud_section+'" disabled>\
											</div>\
										</div>');				
				}
			}
			else
			{
				$('#dataList').append('<option value = "">No Result fund.</option>');
			}
		});
	}
	function allStudent()
	{
		$("#hTitle").text('All Student:');
		$("#inputForm").empty();
		$("#inputForm").append('<div class="form-group">\
									<input type="submit" value="Generate" onClick="generateReport();" class="btn btn-default">\
								</div>');
	}

	function yearList()
	{
		$.get('{{URL::Route('allYears')}}' , function(response)
		{
			if(response.length != 0)
			{
				for(var i = 0; i< response.length; i++)
				{
					$('#drpYear').append('<option value="'+response[i].info_id+'">'+response[i].data_description+'</option>');				
				}
			}
		});
	}

	function allSections()
	{
		$.get('{{URL::Route('allSections')}}', { drpYearLvl :  $('#drpYearLvl').val() } , function(response)
		{
				$('#drpSection').empty();
			if(response.length != 0)
			{
				for(var i = 0; i< response.length; i++)
				{
					$('#drpSection').append('<option value="'+response[i].info_id+'">'+response[i].data_description+'</option>');				
				}
			}
		});
	}

	function allCity()
	{
		$.get('{{URL::Route('allCity')}}' , function(response)
		{
				$('#drpCity').empty();
			if(response.length != 0)
			{
				for(var i = 0; i< response.length; i++)
				{
					$('#drpCity').append('<option value="'+response[i].info_id+'">'+response[i].data_description+'</option>');				
				}
			}
		});
	}
</script>
@stop