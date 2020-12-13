<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Laravel8_A</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

  <div class="container my-3">
    <div class="row">
      <div class="col-md-6">
        <h6 class="display-6 my-2">Posts</h6>

        <!-- Update Success Alert -->
        <div id="updateSuccess"></div>
        <!-- Update Success Alert End -->
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
    <div class="modal fade" id="updatePostModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Post</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form name="postEditForm">
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
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Post Update Modal End -->
  </div>

  <script src="{{asset('js/eruda.js')}}"></script>
  <script src="{{asset('js/vconsole.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" type="text/javascript" charset="utf-8"></script>
  <script src="{{asset('js/axios.js')}}"></script>
  <script src="{{asset('js/app.js')}}"></script>
</body>
</html>