<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<style type="text/css">
  .required_cls
  {
    color: red;
  }
</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Add New Employee</h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Employee Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" role="form" action="<?php echo base_url('employee/add_submit') ?>" id="employee-form" enctype="multipart/form-data">
              <input type="hidden" name="emp_form" value="1">
              <div class="box-body">
                
                <div class="form-group col-md-6">
                  <label for="first_name">First Name <span class="required_cls">*</span></label>
                  <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" maxlength="20">
                </div>

                <div class="form-group col-md-6">
                  <label for="last_name" >Last Name <span class="required_cls">*</span></label>
                  <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" maxlength="20">
                </div>

                <div class="form-group col-md-6">
                  <label for="employee_id">Employee ID <span class="required_cls">*</span><span id="emp_status"></span></label>
                  <input type="hidden" id="emp_availability" value="0">
                  <input type="text" class="form-control" id="employee_id" name="employee_id" placeholder="Employee ID" maxlength="20" onkeyup="return check_employee_id();">
                </div>

                <div class="form-group col-md-6">
                  <label for="designation">Designation <span class="required_cls">*</span></label>
                  <select class="form-control" name="designation" id="designation">
                    <option value="">Select Designation</option>
                    <?php
                    foreach($designation_list as $designation)
                    {
                      ?>
                      <option value="<?php echo $designation['id']; ?>"><?php echo $designation['title']; ?></option>
                      <?php
                    }
                    ?>
                  </select>
                  
                </div>

                <div class="form-group col-md-6">
                  <label for="employee_id">Gender <span class="required_cls">*</span></label>
                  <select class="form-control" name="gender" id="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                  </select>
                </div>

                <div class="form-group col-md-6">
                  <label for="blood_group">Blood Group</label>
                  <select class="form-control" name="blood_group" id="blood_group">
                    <option value="UNKNOWN">Select Group</option>
                    <option value="A+">A RhD positive (A+)</option>
                    <option value="A-">A RhD negative (A-)</option>
                    <option value="B+">B RhD positive (B+)</option>
                    <option value="B-">B RhD negative (B-)</option>
                    <option value="O+">O RhD positive (O+)</option>
                    <option value="O-">O RhD negative (O-)</option>
                    <option value="AB+">AB RhD positive (AB+)</option>
                    <option value="AB-">AB RhD negative (AB-)</option>
                  </select>
                </div>

                <div class="form-group col-md-6">
                  <label for="datepicker">Date of Birth <span class="required_cls">*</span></label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="datepicker"  name="dob_date">
                    </div>
                </div>

                <div class="form-group col-md-6">
                  <label for="datepicker1">Date of Joining <span class="required_cls">*</span></label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="datepicker1"  name="doj_date">
                    </div>
                </div>

                <div class="form-group col-md-6" id="marital_status_div">
                  <label for="marital_status">Marital Status <span class="required_cls">*</span></label>
                  <select class="form-control" name="marital_status" id="marital_status" onchange="marital_status_change(this)">
                    <option value="S">Single</option>
                    <option value="M">Married</option>
                  </select>                  
                </div>
                <div class="form-group col-md-3" id="marriage_date_div" style="display:none;">
                    <label for="datepicker2">Marriage Date <span class="required_cls">*</span></label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="datepicker2"  name="marriage_date">
                    </div>
                  </div>

                <div class="form-group col-md-6">
                  <label for="profile_image">Profile Image</label>
                  <input type="file" class="form-control" id="profile_image" name="profile_image" >
                </div>

                <div class="form-group col-md-6">
                  <label for="official_email">Official Email <span class="required_cls">*</span></label>
                  <input type="email" class="form-control" id="official_email" name="official_email" placeholder="Official Email" maxlength="50">
                </div>

                <div class="form-group col-md-6">
                  <label for="personal_email">Personal Email </label>
                  <input type="email" class="form-control" id="personal_email" name="personal_email" placeholder="Pesonal Email" maxlength="50">
                </div>

                <div class="form-group col-md-6">
                  <label for="pesonal_phone">Personal Phone No <span class="required_cls">*</span></label>
                  <input type="text" class="form-control" id="pesonal_phone" name="pesonal_phone" placeholder="Personal Phone No" maxlength="10">
                </div>

                <div class="form-group col-md-6">
                  <label for="emergency_phone">Emergency Phone No <span class="required_cls">*</span></label>
                  <input type="text" class="form-control" id="emergency_phone" name="emergency_phone" placeholder="Emergency Phone No" maxlength="10">
                </div>

                <div class="form-group col-md-6">
                  <label for="address">Full Address <span class="required_cls">*</span></label>
                  <textarea class="form-control" name="address" id="address" cols="2" rows="5" placeholder="Full Address"></textarea>
                </div> 

                <div class="form-group col-md-6">
                  <label for="pan">PAN No <span class="required_cls">*</span></label>
                  <input type="text" class="form-control" id="pan" name="pan" placeholder="Pan Card No" maxlength="20" >
                  <br>
                  <label for="aadhar_no">Aadhar No <span class="required_cls">*</span></label>
                  <input type="text" class="form-control" id="aadhar_no" name="aadhar_no" placeholder="Aadhar Card No" maxlength="20" >
                </div>   
                <div class="clearfix"></div>
                <div class="form-group col-md-6">
                  <label><input type="checkbox" name="admin_privileges" id="admin_privileges" value="Y">&nbsp;&nbsp;&nbsp;Employee Portal Admin Privileges 
                                      
                </div>
                
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                

                <a href="<?php echo base_url('employee'); ?>"><button type="button" class="btn btn-primary ">Cancel</button></a>

                <button type="button" id="add-emp-btn" class="btn btn-primary pull-right" onclick="return add_employee_submit();">Add Employee</button>
              </div>
            </form>
          </div>

        </div>

      
      </div>
      

    </section>
    <!-- /.content -->
  </div>
  <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
  <script type="text/javascript">

    function check_employee_id()
    {
      $("#emp_status").text('');
      var employee_id = document.getElementById("employee_id").value;
      if(employee_id.length > 0)
      {
        employee_id = employee_id.toUpperCase();
        document.getElementById("employee_id").value = employee_id;


        // check start

        var dataString = 'employee_id=' + employee_id + '&id=0';

        $.ajax({
        type: "POST",
        url: "<?=base_url('employee/check_employee_id_availability')?>",
        data: dataString,
        cache: false,
        success: function(html) {
          var obj = $.parseJSON(html);
          if(obj.status == 'Y')
          {
            document.getElementById("emp_availability").value = 1;
            document.getElementById('emp_status').style.color = 'green';
            $("#emp_status").text(' ('+obj.message+')');
          }
          else if(obj.status == 'N')
          {
            document.getElementById("emp_availability").value = 0;
            document.getElementById('emp_status').style.color = 'red';
            $("#emp_status").text(' ('+obj.message+')');
          }
        }
        });

        // check end

        //document.getElementById("emp_availability").value = 1;
      }
      else
      {
        document.getElementById("emp_availability").value = 0;
      }
      
    }

    function marital_status_change(selectObject)
    {
      var select_value = selectObject.value;
      if(select_value == 'M')
      {
        $('#marital_status_div').removeClass('col-md-6');
        $('#marital_status_div').addClass('col-md-3');
        $("#marriage_date_div").show();
        $('#datepicker2').focus();
      }
      else
      {
        $('#marital_status_div').removeClass('col-md-3');
        $('#marital_status_div').addClass('col-md-6');        
        $("#marriage_date_div").hide();
      }
    }
  </script>
  <script type="text/javascript">


    // email check function start
    function validateEmail(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }
    // email check function end

    // date check start
    function date_check(date_is)
    {
      return moment(date_is, 'DD/MM/YYYY',true).isValid();
    }
    

    // date check end

    function add_employee_submit()
    {
      $('.form-control').removeClass('error_cls');
      var focusStatus = "N";

      var first_name = document.getElementById("first_name").value.trim();
      var last_name = document.getElementById("last_name").value.trim();
      var employee_id = document.getElementById("employee_id").value.trim();
      var emp_availability = document.getElementById("emp_availability").value;
      var designation = document.getElementById("designation").value;
      var gender = document.getElementById("gender").value;
      var blood_group = document.getElementById("blood_group").value.trim();
      var dob = document.getElementById("datepicker").value;
      var dob_check = date_check(dob);
      var doj = document.getElementById("datepicker1").value;
      var doj_check = date_check(doj);
      var marital_status = document.getElementById("marital_status").value;
      var marriage_date = document.getElementById("datepicker2").value;
      var marriage_date_check = date_check(marriage_date);
      var official_email = document.getElementById("official_email").value;
      var official_email_check = validateEmail(official_email);
      var personal_email = document.getElementById("personal_email").value;
      var personal_email_check = validateEmail(personal_email);
      var pesonal_phone = document.getElementById("pesonal_phone").value;
      var emergency_phone = document.getElementById("emergency_phone").value;
      var address = document.getElementById("address").value.trim();
      var pan = document.getElementById("pan").value.trim();
      var aadhar_no = document.getElementById("aadhar_no").value.trim();      
      

      if(first_name == '')
      {
        $('#first_name').addClass('error_cls');
        if(focusStatus == 'N')
        {
            $('#first_name').focus();
            focusStatus = 'Y';
        }     
      }

      if(last_name == '')
      {
        $('#last_name').addClass('error_cls');
        if(focusStatus == 'N')
        {
            $('#last_name').focus();
            focusStatus = 'Y';
        }     
      }

      if(employee_id == '' || emp_availability == '0')
      {
        $('#employee_id').addClass('error_cls');
        if(focusStatus == 'N')
        {
            $('#employee_id').focus();
            focusStatus = 'Y';
        }     
      }

      if(employee_id == '')
      {
        $('#employee_id').addClass('error_cls');
        if(focusStatus == 'N')
        {
            $('#employee_id').focus();
            focusStatus = 'Y';
        }     
      }

      if(designation == '')
      {
        $('#designation').addClass('error_cls');
        if(focusStatus == 'N')
        {
            $('#designation').focus();
            focusStatus = 'Y';
        }     
      }

      if(dob == '' || dob_check == false)
      {
        $('#datepicker').addClass('error_cls');
        if(focusStatus == 'N')
        {
            $('#datepicker').focus();
            focusStatus = 'Y';
        }     
      }

      if(doj == '' || doj_check == false)
      {
        $('#datepicker1').addClass('error_cls');
        if(focusStatus == 'N')
        {
            $('#datepicker1').focus();
            focusStatus = 'Y';
        }     
      }

      if(marital_status == 'M' && marriage_date_check == false)
      {
        $('#datepicker2').addClass('error_cls');
        if(focusStatus == 'N')
        {
            $('#datepicker2').focus();
            focusStatus = 'Y';
        }     
      }

      if(official_email == '' || official_email_check == false)
      {
        $('#official_email').addClass('error_cls');
        if(focusStatus == 'N')
        {
            $('#official_email').focus();
            focusStatus = 'Y';
        }     
      }

      if(personal_email != '' && personal_email_check == false)
      {
        $('#personal_email').addClass('error_cls');
        if(focusStatus == 'N')
        {
            $('#personal_email').focus();
            focusStatus = 'Y';
        }     
      }

      if(pesonal_phone == '' || pesonal_phone.length < 10 || isNaN(pesonal_phone))
      {
        $('#pesonal_phone').addClass('error_cls');
        if(focusStatus == 'N')
        {
            $('#pesonal_phone').focus();
            focusStatus = 'Y';
        }     
      }

      if(emergency_phone == '' || emergency_phone.length < 10 || isNaN(emergency_phone))
      {
        $('#emergency_phone').addClass('error_cls');
        if(focusStatus == 'N')
        {
            $('#emergency_phone').focus();
            focusStatus = 'Y';
        }     
      }

      if(address == '')
      {
        $('#address').addClass('error_cls');
        if(focusStatus == 'N')
        {
            $('#address').focus();
            focusStatus = 'Y';
        }     
      }

      if(pan == '')
      {
        $('#pan').addClass('error_cls');
        if(focusStatus == 'N')
        {
            $('#pan').focus();
            focusStatus = 'Y';
        }     
      }

      if(aadhar_no == '')
      {
        $('#aadhar_no').addClass('error_cls');
        if(focusStatus == 'N')
        {
            $('#aadhar_no').focus();
            focusStatus = 'Y';
        }     
      }      

      if(focusStatus == "N")
      {
        $('#add-emp-btn').attr("disabled", true);
        
        // no validation error.. now submit the form
        $("#employee-form").submit();
      }

      return false;
    }
  </script>


