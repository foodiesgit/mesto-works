// javascript for create.html
const form = document.querySelector('form')

const createPost = async (e) => {
  e.preventDefault()
  await fetch('http://localhost:3000/posts', {
    method: 'POST',
    body: JSON.stringify({
      title: form.title.value,
      body: form.body.value,
      likes: 0
    }),
    headers: { 'Content-Type': 'application/json;charset=UTF-8' }
  })

  window.location.replace('index.html')
}

form.addEventListener('submit', createPost)