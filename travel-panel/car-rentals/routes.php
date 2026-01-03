<?php include_once __DIR__ . '/../includes/connection.php'; ?>

<?php include_once __DIR__ . '/../includes/header.php'; ?>
<?php include_once __DIR__ . '/../includes/sidebar.php'; ?>

  <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">
    <div class="row">
      <div class="col-md-4">
        <div class="card shadow-sm">
          <div class="card-header bg-dark text-white fw-bold">Add / Edit Route</div>
          <div class="card-body">
          <form id="routeForm">
            <input type="hidden" id="route_id" name="id">

            <div class="mb-3">
              <label class="form-label">Pickup Location</label>
              <input type="text" name="pickup_location" id="pickup_location" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Dropoff Location</label>
              <input type="text" name="dropoff_location" id="dropoff_location" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Save Route</button>
          </form>
        </div>
      </div>
    </div>

    <!-- Right Side: Listing -->
    <div class="col-md-8">
      <div class="card shadow-sm">
        <div class="card-header bg-dark text-white fw-bold d-flex justify-content-between align-items-center">
          <span>All Car Rental Routes</span>
          <button id="refreshRoutes" class="btn btn-sm btn-light">Refresh</button>
        </div>
        <div class="card-body">
          <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
              <tr>
                <th>ID</th>
                <th>Pickup Location</th>
                <th>Dropoff Location</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody id="routeTableBody">
              <tr><td colspan="4" class="text-center">Loading...</td></tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</div>

  </div>
  </div>
    <!-- Bootstrap Maxlength Plugin js -->
<?php include_once __DIR__ . '/../includes/footer.php'; ?>
<script>
$(document).ready(function() {
  fetchRoutes();

  // Fetch all routes
  function fetchRoutes() {
    $.ajax({
      url: 'routes_api.php',
      method: 'GET',
      dataType: 'json',
      success: function(response) {
        const tbody = $("#routeTableBody");
        tbody.empty();
        if (response.success && response.data.length > 0) {
          response.data.forEach(route => {
            tbody.append(`
              <tr>
                <td>${route.id}</td>
                <td>${route.pickup_location}</td>
                <td>${route.dropoff_location}</td>
                <td>
                  <button class="btn btn-sm btn-info editRoute" data-id="${route.id}" data-pickup="${route.pickup_location}" data-dropoff="${route.dropoff_location}">Edit</button>
                  <button class="btn btn-sm btn-danger deleteRoute" data-id="${route.id}">Delete</button>
                </td>
              </tr>
            `);
          });
        } else {
          tbody.html('<tr><td colspan="4" class="text-center">No routes found.</td></tr>');
        }
      }
    });
  }

  // Add / Update Route
  $("#routeForm").on("submit", function(e) {
    e.preventDefault();
    $.ajax({
      url: 'routes_api.php',
      method: 'POST',
      data: $(this).serialize(),
      dataType: 'json',
      success: function(response) {
        alert(response.message);
        if (response.success) {
          $("#routeForm")[0].reset();
          $("#route_id").val('');
          fetchRoutes();
        }
      }
    });
  });

  // Edit Route
  $(document).on("click", ".editRoute", function() {
    $("#route_id").val($(this).data("id"));
    $("#pickup_location").val($(this).data("pickup"));
    $("#dropoff_location").val($(this).data("dropoff"));
  });

  // Delete Route
  $(document).on("click", ".deleteRoute", function() {
    if (confirm("Are you sure you want to delete this route?")) {
      $.ajax({
        url: 'routes_api.php',
        method: 'POST',
        data: { delete_id: $(this).data("id") },
        dataType: 'json',
        success: function(response) {
          alert(response.message);
          if (response.success) fetchRoutes();
        }
      });
    }
  });

  // Refresh
  $("#refreshRoutes").click(fetchRoutes);
});
</script>

</body>
</html>
