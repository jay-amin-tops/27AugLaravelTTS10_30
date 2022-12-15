
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    <div class="col-lg-12 mb-4 order-0">
      <div class="card">
        <div class="d-flex align-items-end row">
          <div class="col-sm-12">
            <div class="card-body">
              <table class="table table-bordered ">
                <tr class="bg-dark light-txt">
                  <th>Sr No</th>
                  <th>UserName</th>
                  <th>Gender</th>
                  <th>Email</th>
                  <th>Image</th>
                  <th>Mobile</th>
                  <th>Action</th>
                </tr>
                <tbody id="disp_users_data">
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  fetch("http://localhost/laravel/27AugLaravelTTS10_30/27AugLaravelTTS10_30/PHP/API/viewalluser").then((response)=>response.json()).then((res)=>{
    // console.log(res);
    // console.log(res.Data);
    let HTMLTableData =""
    res.Data.forEach(element => {
      console.log(element);
      // HTMLTableData +="<tr><td>"+element.username+"<td></tr>"
      HTMLTableData +=`<tr>
                          <td>${element.id}</td>
                          <td>${element.username}</td>
                          <td>${element.gender}</td>
                          <td>${element.email}</td>
                          <td> <img src="uploads/${element.prof_pic}" width="50px"> </td>
                          <td>${element.mobile}</td>
                          <td>${element.id}</td>
                      </tr>`
    });
    console.log(HTMLTableData);
    document.getElementById("disp_users_data").innerHTML = HTMLTableData
  })
</script>