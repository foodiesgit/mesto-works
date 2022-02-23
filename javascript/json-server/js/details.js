// javascript for details.html
const id = new URLSearchParams(window.location.search).get('id')

const details = async () => {
  const res = await fetch('http://localhost:3000/posts/' + id)
  if (!res.ok) {
    window.location.replace("/")
  }
  const post = await res.json()
  document.querySelector('.details').innerHTML = `<h1>${post.title}</h1><p>${post.body}</p>`
}

document.querySelector('.delete').addEventListener('click', async () => {
  const res = await fetch('http://localhost:3000/posts/' + id, {
    method: 'DELETE'
  })
  window.location.replace("index.html")
})

window.addEventListener('DOMContentLoaded', details)