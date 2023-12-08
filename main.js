
loadData();

let btnAction ="Insert";

$("#addNew").click(function(){
  $("#studentModal").modal("show");
});

$("#studentForm").submit(function(event) {

  event.preventDefault()

  //gets th form data
  let form_data = new FormData($("#studentForm")[0]);

  //adds the action to the form value
  if(btnAction == "Insert"){
    form_data.append("action","registerStudent");
  }else {
    form_data.append("action","updateStudent");
  }

  $.ajax( {
    //method
    //dataType
    //url

    method: "POST",
    dataType: "JSON",
    url : "api.php",
    data : form_data,
    processData: false,
    contentType: false,
    success: function(data){
      
      let status = data.status;
      let response = data.data;

      $("#studentForm")[0].reset();

      alert(response);
      btnAction = "Insert";
      $("#studentModal").modal("hide");
      loadData();

    },
    error : function(data){

    }
  })

});

function loadData() {

  $("#studentTable tbody").html("")

  let sendingData = {
    "action" : "readAll"
  }

  $.ajax({
    method: "POST",
    dataType: "JSON",
    url: "api.php",
    data : sendingData,
    success : function(data){

      let status = data.status;
      let response = data.data;

      let html = '';
      let tr = '';

      if(status){

        response.forEach(item => {
          // console.log(item);
          tr += "<tr>";

          for(let i in item){

            tr += `<td>${item[i]}</td>`;
          }
          
          tr += `<td> <a class="btn btn-info update_info" update_id=${item['id']}> <i class="fas fa-edit"></i> </a>
                      <a class="btn btn-danger delete_info" delete_id=${item['id']}> <i class="fas fa-trash"></i> </a>
                 </td>`;

          tr += "</tr>"

        });

        $("#studentTable tbody").append(tr)

      }

    },
    error : function(data){

    }
  })
}

function fetchInfo(id) {

  let sendingData = {
    "action" : "readStudentInfo",
    "id": id
  }

  $.ajax({
    method: "POST",
    dataType: "JSON",
    url: "api.php",
    data : sendingData,
    success : function(data){

      let status = data.status;
      let response = data.data;

      let html = '';
      let tr = '';

      if(status){

        $("#id").val(response[0].id)
        $("#name").val(response[0].name)
        $("#class").val(response[0].class)
        $("#studentModal").modal("show");
        btnAction = "Update"

        

      }

    },
    error : function(data){

    }
  })
}

function deleteStudent(id) {
  let sendingData = {
    "action" : "deleteStudent",
    "id": id
  }
  $.ajax({
    method: "POST",
    dataType: "JSON",
    url: "api.php",
    data : sendingData,
    success : function(data){

      let status = data.status;
      let response = data.data;

      let html = '';
      let tr = '';

      if(status){

        alert(response);
        loadData();


        

      }

    },
    error : function(data){

    }
  })
}

$("#studentTable").on("click","a.update_info",function() {
  // console.log("dd")

  let id = $(this).attr("update_id");
  // console.log(id)

  fetchInfo(id);

})


$("#studentTable").on("click","a.delete_info",function() {
  // console.log("dd")

  let id = $(this).attr("delete_id");
  // console.log(id)

  if(confirm("Are you sure to Delete ?")){
    deleteStudent(id);

  }

  

})