<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://unpkg.com/feather-icons"></script>
  <link rel="stylesheet" href="<?= base_url('asset/css/dashboard.css') ?>">

</head>
<body>
  <!-- Top Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">JPOT.id</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <form class="d-flex ms-auto" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-light" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 d-none d-md-block bg-dark text-white sidebar">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column mt-4">
            <li class="nav-item">
              <a class="nav-link text-white" href="#">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#">Layouts<i data-feather="search" class="ms-5"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#">Pages</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#">Charts</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#">Tables</a>
            </li>
          </ul>
        </div>
      </nav>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Dashboard</h1>
        </div>

<div class="row text-center">
  <div class="col-6 col-md-3 mb-4">
    <div class="card bg-primary text-white card-interactive">
      <div class="card-body">
        <a href="#" class="text-white d-flex flex-column align-items-center text-decoration-none">
          <i data-feather="user" class="mb-2"></i>
          <div>List Account</div>
        </a>
      </div>
    </div>
  </div>

  <div class="col-6 col-md-3 mb-4">
    <div class="card bg-success text-white card-interactive">
      <div class="card-body">
        <a href="#" class="text-white d-flex flex-column align-items-center text-decoration-none">
          <i data-feather="activity" class="mb-2"></i>
          <div>List Post</div>
        </a>
      </div>
    </div>
  </div>

  <div class="col-6 col-md-3 mb-4">
    <div class="card bg-warning text-white card-interactive">
      <div class="card-body">
        <a href="#" class="text-white d-flex flex-column align-items-center text-decoration-none">
          <i data-feather="bar-chart-2" class="mb-2"></i>
          <div>Reports</div>
          <div>View Details</div>
        </a>
      </div>
    </div>
  </div>

  <div class="col-6 col-md-3 mb-4">
    <div class="card bg-danger text-white card-interactive">
      <div class="card-body">
        <a href="#" class="text-white d-flex flex-column align-items-center text-decoration-none">
          <i data-feather="alert-triangle" class="mb-2"></i>
          <div>Alerts</div>
          <div>View Detail</div>
        </a>
      </div>
    </div>
  </div>
</div>


        <div class="row">
          <div class="col-md-6">
            <div class="card mb-4">
              <div class="card-header">Area Chart Example</div>
              <div class="card-body">
                <canvas id="areaChart"></canvas>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="card mb-4">
              <div class="card-header">Bar Chart Example</div>
              <div class="card-body">
                <canvas id="barChart"></canvas>
              </div>
            </div>
          </div>
        </div>

        <div class="card mb-4">
          <div class="card-header">DataTable Example</div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Position</th>
                  <th>Office</th>
                  <th>Age</th>
                  <th>Start date</th>
                  <th>Salary</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Airi Satou</td>
                  <td>Accountant</td>
                  <td>Tokyo</td>
                  <td>33</td>
                  <td>2008/11/28</td>
                  <td>$162,700</td>
                </tr>
                <tr>
                  <td>Angelica Ramos</td>
                  <td>Chief Executive Officer (CEO)</td>
                  <td>London</td>
                  <td>47</td>
                  <td>2009/10/09</td>
                  <td>$1,200,000</td>
                </tr>
                <tr>
                  <td>Ashton Cox</td>
                  <td>Junior Technical Author</td>
                  <td>San Francisco</td>
                  <td>66</td>
                  <td>2009/01/12</td>
                  <td>$86,000</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </main>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const areaCtx = document.getElementById('areaChart').getContext('2d');
    const barCtx = document.getElementById('barChart').getContext('2d');

    new Chart(areaCtx, {
      type: 'line',
      data: {
        labels: ['Mar 1', 'Mar 3', 'Mar 5', 'Mar 7', 'Mar 9', 'Mar 11', 'Mar 13'],
        datasets: [{
          label: 'Visitors',
          data: [5000, 3000, 4000, 6000, 7000, 6000, 8000],
          backgroundColor: 'rgba(0, 123, 255, 0.2)',
          borderColor: 'rgba(0, 123, 255, 1)',
          fill: true
        }]
      }
    });

    new Chart(barCtx, {
      type: 'bar',
      data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June'],
        datasets: [{
          label: 'Revenue',
          data: [5000, 7000, 8000, 10000, 11000, 15000],
          backgroundColor: 'rgba(0, 123, 255, 1)'
        }]
      }
    });
  </script>

    <script>
      feather.replace();
    </script>
</body>
</html>
