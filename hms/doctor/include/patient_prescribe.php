<?php 
  if (isset($_GET['pat_id'])) {

      $_SESSION['pat_prescribe_id'] = $_GET['pat_id'];
    }


 ?>



<div class="col-lg-12"> 
    <br />            
    <br /> 
    <h2 align="center">Patient Prescribtion</h2> 
    <div class="col-xs-6">
      <div class="form-group">  
           <form name="add_name" id="add_name">  
                <div class="table-responsive">  
                     <table class="table table-bordered" id="dynamic_field">  
                          <tr style="" >  


                               <td><input type="text" name="name[]" placeholder="Enter Medicine id" class="form-control name_list" /></td>  
                               <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                            </tr>  
                     
                     </table>  
                     <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />  
                </div>  
           </form>  
      </div>
    </div> 

    <div class=" col-xs-6">
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>Id</th>
            <th>Medicine Title</th>
            <th>Contains</th>
          </tr>
        </thead>
        <tbody>

        <?php 
          $query = "SELECT * FROM medicine";
          $select_medicine = mysqli_query($connection,$query);

          while($row = mysqli_fetch_assoc($select_medicine)) {
          $med_id     = $row['m_id'];
          $med_title  = $row['m_name'];
          $med_details= $row['m_contain'];

          echo "<tr>";
              
          echo "<td>{$med_id}</td>";
          echo "<td>{$med_title}</td>";
          echo "<td>{$med_details}</td>";
         
          echo "</tr>";
        }
      ?>   
      </tbody>
    </table>

      
    </div>
  </div>  
   
 <script>  
 $(document).ready(function(){  
      var i=1;  
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="name[]" placeholder="Enter Medicine id" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
      $('#submit').click(function(){            
           $.ajax({  
                url:"include/prescribe.php",  
                method:"POST",  
                data:$('#add_name').serialize(),  
                success:function(data)  
                {  
                     alert(data);  
                     $('#add_name')[0].reset();  
                }  
           });  
      });  
 });  
 </script>