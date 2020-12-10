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
    <a href="" class="btn btn-outline-info btn-sm">
    Edit
    </a>
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
    if (titleInput.value == '') {
      document.querySelector("#titleError").innerHTML = `${res.data.title}`;
    }
    if (descInput.value == '') {
      document.querySelector("#descError").innerHTML = `${res.data.description}`;
    }
    if(res.data.msg){
    let successMsg = `
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    ${res.data.msg}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    `;
    document.querySelector('#status').innerHTML = successMsg;
    }
  })
  .catch((errors)=> {
    console.log(errors.response)
  })
}