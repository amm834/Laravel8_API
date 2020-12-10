<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Laravel8_A</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://unpkg.com/eslint@7.5.0/lib/api.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>

  <div class="container my-3">
    <div class="row">
      <div class="col-md-6">
        <h6 class="display-6 my-2">Posts</h6>
        <!-- Posts Tables -->
        <div class="table-responsive">
          <table class="table table-hover">
            <thead class="table-light">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col" colspan="2" class="text-center">Action</th>
              </tr>
            </thead>
            <tbody id="tbody">
              <!-- Show All Posts -->
            </tbody>
          </table>

        </div>
      </div>
      <!-- Post Table End -->
      <!-- Post Create Form -->
      <div class="col-md-6">
        <h6 class="display-6 my-2">Create Post</h6>
        <div id="status"></div>
        <form name="postInputForm">
          <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title">
            <em id="titleError" class="text-danger"></em>
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" rows="5" class="form-control"></textarea>
            <div id="descError" class="text-danger"></div>
          </div>
          <button type="submit" class="btn btn-primary">Create</button>
        </form>
      </div>
      <!-- Post Create Form End -->
    </div>
    <!-- Post Update Modal
                <!-- Modal -->
    @include('edit')
    <!-- Post Update Modal End -->
  </div>

  <script src="{{asset('js/eruda.js')}}"></script>
  <script src="{{asset('js/axios.js')}}"></script>
  <script src="{{asset('js/app.js')}}"></script>
</body>
</html>