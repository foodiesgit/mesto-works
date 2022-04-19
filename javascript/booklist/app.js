el = (param) => document.querySelector(param);
class Books {
  constructor(title, author, price) {
    this.title = title;
    this.author = author;
    this.price = price;
  }
}
class UI {
  static DisplayBooks() {
    if (localStorage.getItem("books") !== null) {
      const StoredBooks = JSON.parse(localStorage.getItem("books"));
      StoredBooks.forEach((item) => UI.AddBookToList(item));
    }
  }

  static AddBookToList(param) {
    el("#book_list").innerHTML += `
      <tr class="book_list">
        <th>${param.title}</th>
        <th>${param.author}</th>
        <th>${param.price}</th>
        <th><button class="del_btn">Delete</button></th>
      </tr>
    `;
  }

  static DeleteBook(param) {
    param.parentElement.parentElement.remove();
  }

  static ClearForm() {
    el("#title").value = "";
    el("#author").value = "";
    el("#price").value = "";
  }
}
//events
document.addEventListener("DomContentLoaded", UI.DisplayBooks());

el("#book_form").onsubmit = (e) => {
  e.preventDefault();

  const book = new Books(
    el("#title").value,
    el("#author").value,
    el("#price").value
  );
  const localBook = localStorage.getItem("books");
  let newBook = [];

  localBook === null ? (newBook = []) : (newBook = JSON.parse(localBook));
  newBook.push(book);
  localStorage.setItem("books", JSON.stringify(newBook));

  el("#book_list").innerHTML = "";
  UI.ClearForm();
  UI.DisplayBooks();
};

document.querySelectorAll(".book_list").forEach((item, index) => {
  item.onclick = (e) => {
    UI.DeleteBook(e.target);
    let books = JSON.parse(localStorage.getItem("books"));
    books.splice(index, 1);
    console.log(index);
    localStorage.setItem("books", JSON.stringify(books));
  };
});

// console.log(Object.keys(new Books))
