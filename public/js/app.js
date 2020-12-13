/* Init of Eruda */
eruda.init();

/* api */

let tbody = document.querySelector("#tbody");
axios.get("/api/posts")
.then((response)=> {
  response.data.forEach((posts)=> {
    // @args pass data
    showData(posts);
  });
})
.catch((errors)=>console.log(errors));

/* Data Insert */
let postInputForm = document.forms['postInputForm'];
let titleInput = postInputForm['title'];
let descInput = postInputForm['description'];
postInputForm.onsubmit = function(e) {
  e.preventDefault();
  axios.post('/api/posts', {
    'title': titleInput.value,
    'description': descInput.value
  })
  .then((res)=> {
    // @args show data when data created
    showData(res.data.post);
    /*@return if title is empty */
    document.querySelector("#titleError").innerHTML = titleInput.value === '' ? `${res.data.title}`: '';
    document.querySelector("#descError").innerHTML = descInput.value == '' ?`${res.data.description}`: '';
    if (res.data.msg) {
      let successMsg = `
      <div class="alert alert-success alert-dismissible fade show" role="alert">
      ${res.data.msg}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      `;
      document.querySelector('#status').innerHTML = successMsg;
      postInputForm.reset();
    }
  })
  .catch((errors)=> {
    console.log(errors.response)
  })
}


let postEditForm = document.forms['postEditForm'];
let editTitle = postEditForm['title'];
let editDesc = postEditForm['description'];
let updateId;
// Post Edit Data Show
function postEdit(id) {
  updateId = id;
  axios.get(`api/posts/${id}`)
  .then((res)=> {
    editTitle.value = res.data.title;
    editDesc.value = res.data.description;
  })
  .catch(errors=> {
    console.log(errors.response);
  })
}

// Post Update
// Get Bootstrap Modal
postEditForm.onsubmit = function(e) {
  e.preventDefault();
  axios.put(`/api/posts/${updateId}`,
    {
      title: editTitle.value,
      description: editDesc.value
    })
  .then((res)=> {
    let updateSuccessMsg = `
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    ${res.data.msg}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    `;
    // Hide Modal When Data is Updated
    document.querySelector('#updateSuccess').innerHTML = updateSuccessMsg;
  })
  .catch(errors=>console.log(errors.response))
}

function postDelete(id) {
  axios.delete(`/api/posts/${id}`)
  .then((response)=> {
    let updateSuccessMsg = `
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    ${response.data.msg}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    `;
    // Hide Modal When Data is Updated
    document.querySelector('#updateSuccess').innerHTML = updateSuccessMsg;


  })
  .catch((errors)=>console.log(errors.response));
}


// Helper function
function showData(posts) {
  tbody.innerHTML += `
  <tr class="titles">
  <th scope="row">${posts.id}</th>
  <td>${posts.title}</td>
  <td>${posts.description}</td>
  <td>
  <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#updatePostModal" onclick="postEdit(${posts.id})">
  Edit
  </button>
  </td>
  <td>
  <button class="btn btn-danger btn-sm" onclick="postDelete(${posts.id})">
  Delete
  </button>
  </td>
  </tr>
  `;
}

let titles = document.getElementsByClassName('titles');