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
    StoredBooks.forEach((item) => UI.addBookToList(item));
  }
  static addBookToList(param) {
    document.getElementById("book_list").innerHTML += `
      <tr>
        <th>${param.title}</th>
        <th>${param.author}</th>
        <th>${param.price}</th>
        <th><button>Delete</button></th>
      </tr>
    `;
  }
}
UI.DisplayBooks();
// console.log(Object.keys(new Books))
