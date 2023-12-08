<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD Operation</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">;
</head>
<body>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-sm-8">
      <h1 class="fs-3 text-center">User Info</h1>
      <button class="btn btn-success m-1" id="addNew">Add New Student</button>
      <table class="table" id="studentTable">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Class</th>
            <th>Action</th>
          </tr>
        </thead>

        <tbody>

        </tbody>
      </table>
    </div>
    <div class="modal" tabindex="-1" id="studentModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">User Info</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

          <form id="studentForm">

          <div class="form-group">
            <input  type="text" name="id" id="id" class="form-control my-3 shadow-none" placeholder="Enter Student Id">
          </div>
          <div class="form-group">
            <input type="text" name="name" id="name" class="form-control my-3 shadow-none" placeholder="Enter Student Name">
          </div>
          <div class="form-group">
            <input type="text" name="class" id="class" class="form-control my-3 shadow-none" placeholder="Enter Student Class">
          </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" >Save changes</button>
             </div>
          </form>



      </div>
      
    </div>
  </div>
</div>
  </div>
</div>
  



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<script src="main.js"></script>
</body>
</html>