<!DOCTYPE html>
<html>
<head>
	<title></title>
<script type="text/javascript" src="./jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="./ajax_file.js"></script>
<script type="text/javascript" src="./datatables.min.js"></script>
<link  rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="./bootstrap.min.css">
</head>
<body>

<!-- <div>
showing data from database:<a href="./menu.js">menu.js</a><br>	
	<label>username</label>
	<select id="userdata" class="">
	</select>
</div> -->
<div>
  <h1>Employee form</h1>
  <div class="col-6">
      
      <form id="employeeform" autocomplete="off">
        <input type="hidden" name="action" value="add_data">
        <input type="hidden" name="userid" value="0">
        <div>
          <label>Emp name</label>
          <input type="text" class="form-control"  name="username" placeholder="enter user name">
        </div>
        <div>
          <label>Emp Number</label>
          <input type="text" class="form-control" name="number" placeholder="enter number">
        </div>
        <div>
          <label>Email</label>
          <input type="text" class="form-control" name="email" placeholder="enter email">
        </div>
        <div>
          <label>Password</label>
          <input type="text" class="form-control" name="password" placeholder="enter password">
        </div>
        <br>
        <div class="form-group">
          <button class="btn btn-success" type="button" onclick="save()">Submit</button>
          <button class="btn btn-danger" onclick="res()" type="reset">Reset</button>
        </div>
      </form>

  </div>
</div>
<div class="card">
           <div class="card-header">
             <h4>User table</h4>
           </div>
           <div class="card-body">
             <div class="table-responsive">
               <table class="table" id="sample">
                 <thead>
                   <tr>
                     <th>Userid</th>
                     <th>User name</th>
                     <th>Number</th>
                     <th>Email</th>
                     <th>Password</th>
                     <th>Action</th>
                   </tr>
                 </thead>
                 <tbody>
					                 
				</tbody>
               </table>
             </div>
           </div>
         </div>


</body>
</html>