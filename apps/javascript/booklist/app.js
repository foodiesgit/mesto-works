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
    const StoredBooks = [
      {
        title: "Book1",
        author: "Author1",
        price: 30,
      },
      {
        title: "Book1",
        author: "Author2",
        price: 26,
      },
    ];
    StoredBooks.forEach((item) => UI.AddBookToList(item));
  }
  static AddBookToList(param) {
    el("#book_list").innerHTML += `
      <tr>
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
  const title = el("#title").value;
  const author = el("#author").value;
  const price = el("#price").value;
  const book = new Books(title, author, price);

  // el("#book_list").innerHTML=''
  UI.ClearForm();
  UI.DisplayBooks();
};

document.querySelectorAll(".del_btn").forEach((item) => {
  item.onclick = (e) => {
    UI.DeleteBook(e.target);
  };
});

// console.log(Object.keys(new Books))
