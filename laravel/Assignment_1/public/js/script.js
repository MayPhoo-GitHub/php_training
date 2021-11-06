$.ajax({
    type: "GET",
    url: "/api/list",
    dataType: "json",
    success: function (res) {
        res.forEach((reservation) => {
            $("#api-reservation > tbody").append(
                `<tr><td>${reservation.id}</td><td>${reservation.hotel_name}</td>
                <td>${reservation.num_of_guests}</td><td>${reservation.arrival}</td>
                <td>${reservation.departure}</td><td>${reservation.created_at}</td>
                <td>${reservation.updated_at}</td>
                <td>
              
                <button onclick="deleteReservation(${reservation.id})" class="btn btn-danger">
                  <i class="fa fa-btn fa-trash"></i>Delete
                </button>
             
              </td>
             <!-- Update Button -->
            <td>
            <a href="/api-view/edit-view/${reservation.id}" class="btn btn-info mr-1" title="Update" data-toggle="tooltip"><span class="fa fa-pencil-alt"></span> Update</a>
            </td>
                </tr>`
            );
        });
    },
});

function add() {
    var data = {
        name: $("#name").val(),
        guest: $("#guest").val(),
        arrival: $("#arrival").val(),
        departure: $("#departure").val(),
    };
    $.ajax({
        type: "POST",
        url: "/api/add",
        data: data,
        dataType: "json",
        success: function (res) {
            alert("Added successfully!");
            location.reload();
        },
    });
}

//Delete
function deleteReservation(id) {
    if (confirm("Do you want to delete " + id + "?") == true) {
        $.ajax({
            url: "/api/delete/" + id,
            type: "DELETE",
            success: function () {
                location.reload();
            },
        });
    }
}

//Update
function edit(id) {
    if (confirm("Do you want to update?") == true) {
        var data = {
            name: $("#name").val(),
            guest: $("#guest").val(),
            arrival: $("#arrival").val(),
            departure: $("#departure").val(),
        };
        $.ajax({
            url: "/api/edit/" + id,
            type: "POST",
            data: data,
            success: function (res) {
                alert("Update Successful");
                window.location.href = "/api-view";
            },
        });
    }
}

$(function () {
    var id = window.location.pathname.split("/")[3];
    if (id != null) {
        $.ajax({
            url: "/api/edit-view/" + id,
            type: "GET",
            dataType: "json",
            success: function (data) {
                $("#edit-form").append(
                    ` 
                    <!-- reservation Name -->
                    <div class="form-group">
                      <label for="guest" class="col-sm-3 control-label">Hotel Name</label>
                      <div class="col-sm-6">
                        <input type="text" name="name" id="name" class="form-control" value="${data.hotel_name}" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="guest" class="col-sm-3 control-label">Number of guests</label>
                      <div class="col-sm-6">
                        <input type="number" min=0 name="guest" id="guest"  class="form-control" value="${data.num_of_guests}" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="arrival" class="col-sm-3 control-label">Arrival</label>
                      <div class="col-sm-6">
                        <input type="date" name="arrival" id="arrival" class="form-control" value="${data.arrival}" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="departure" class="col-sm-3 control-label">Departure</label>
                      <div class="col-sm-6">
                        <input type="date" name="departure" id="departure" class="form-control" value="${data.departure}" required>
                      </div>
                    </div>
                
                  
                  <!-- edit reservation Button -->
                
                    <div class="form-group">
                      <div class="col-sm-offset-3 col-sm-6">
                        <button class="btn btn-success" onclick="edit(${data.id})" >
                          <i class="fa fa-plus"></i> Update reservation
                        </button>
                      </div>
                    </div>
                </div>`
                );
            },
        });
    }
});
