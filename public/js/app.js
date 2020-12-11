/* Init of Eruda */
eruda.init();

/* api */
let tbody = document.querySelector("#tbody");
axios.get("/api/posts")
.then((response)=> {
  response.data.forEach((posts)=> {
    tbody.innerHTML += `
    <tr>
    <th scope="row">${posts.id}</th>
    <td>${posts.title}</td>
    <td>${posts.description}</td>
    <td>
    <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#updatePost" onclick="postEdit(${posts.id})">
    Edit
    </button>

    </td>
    <td>
    <a href="" class="btn btn-danger btn-sm">
    Delete
    </a>
    </td>
    </tr>

    `;
  })
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

let postEditForm =  document.forms['postEditForm'];
let editTitle = postEditForm['title'];
let editDesc = postEditForm['description'];
function postEdit(id){
  axios.get(`api/posts/${id}`)
  .then((res)=>{
    editTitle.value = res.data.title;
    editDesc.value = res.data.description;
  })
  .catch(errors=>{
    console.log(errors.response);
  })
}