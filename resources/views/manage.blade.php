<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Book Inventory</title>
        <style>
           /* Reset some default styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Set a background color and font styles */
body {
    background-color: #f5f5f5;
    font-family: Arial, sans-serif;
}

/* Style the header */
.header {
    background-color: #333;
    color: #fff;
    padding: 10px 0;
    text-align: center;
}

.header h1 {
    margin: 0;
}

.header nav ul {
    list-style: none;
    padding: 0;
}

.header nav ul li {
    display: inline;
    margin-right: 20px;
}

.header nav ul li a {
    text-decoration: none;
    color: #fff;
}

/* Style the container */
.container {
    background-color: #fff;
    padding: 20px;
    margin: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Style the book form */
.book-form {
    margin-bottom: 20px;
}

.book-form h2 {
    font-size: 18px;
    margin-bottom: 10px;
}

.book-form label {
    display: block;
    margin-top: 10px;
    font-weight: bold;
}

.book-form input[type="text"],
.book-form input[type="number"],
.book-form select {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

.book-form button {
    background-color: #333;
    color: #fff;
    border: none;
    padding: 10px 20px;
    margin-top: 10px;
    border-radius: 3px;
    cursor: pointer;
}

/* Style the book list table */
.book-list {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.book-list th, .book-list td {
    border: 1px solid #ccc;
    padding: 8px;
    text-align: left;
}

.book-list th {
    background-color: #333;
    color: #fff;
}

/* Style the dialog overlay */
.dialog-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
    z-index: 2;
}

/* Style the dialog box */
.dialog-box {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    width: 100%;
}

/* Style the footer */
.footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 10px 0;
}


        </style>
    </head>
    <body>
        <div class="header">
            <nav>
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="#">Manage</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </nav>
            <h1>Book Inventory</h1>
        </div>

        <div class="container">
            <div class="book-form">
                <h2>Add Book</h2>
                <form action="{{ route('add-book')  }}" method="post">
                    @csrf
                    <label for="book_title">Book Title:</label>
                    <input type="text" id="book_title" name="book_title" required>

                    <label for='ISBN'>ISBN no.</label>
                    <input type="text" id="ISBN" name="ISBN" required>

                    <label for="author">Author:</label>
                    <input type="text" id="author" name="author" required>

                    <label for="publisher">Publisher:</label>
                    <input type="text" id="publisher" name="publisher" required>

                    <label for="edition">Edition:</label>
                    <input type="text" id="edition" name="edition" required>
                    
                    <div class="category-container">
                        <span class="category-label">Category:</span><br>
                        <div class="category-options">
                            <div class="category-option">
                                <input type="radio" name="category" value="Comics"> Comics
                            </div>
                            <div class="category-option">
                                <input type="radio" name="category" value="Fiction"> Fiction
                            </div>
                            <div class="category-option">
                                <input type="radio" name="category" value="History"> History
                            </div>
                            <div class="category-option">
                                <input type="radio" name="category" value="Classic"> Classic
                            </div>
                            <div class="category-option">
                                <input type="radio" name="category" value="Romance"> Romance
                            </div>
                            <div class="category-option">
                                <input type="radio" name="category" value="Horror"> Horror
                            </div>
                            <div class="category-option">
                                <input type="radio" name="category" value="Fantasy Fiction"> Fantasy Fiction
                            </div>
                        </div>
                    </div>

                    <label>Rack:</label>
                    <select name="rack" id="rack">
                        <option value="">Select the rack</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>

                    <label for="copies">Total No of Copy</label>
                    <input type="number" id="copies" name="copies">

                    <label for="price">Price:</label>
                    <input  type="number" id="price" name="price">

                    <button type="submit">Add</button>
                </form>
            </div>

        <h2>Book List</h2>
        <table class="book-list"> 
            <thead>
                <tr>
                    <th>Book Title</th>
                    <th>ISBN No.</th>
                    <th>Author</th>
                    <th>Publisher</th>
                    <th>Edition</th>
                    <th>Category</th>
                    <th>Rack</th>
                    <th>Copies</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="book-list-body">
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->Book_Title }}</td>
                        <td>{{ $book->ISBN_No }}</td>
                        <td>{{ $book->Author }}</td>
                        <td>{{ $book->Publisher }}</td>
                        <td>{{ $book->Edition }}</td>
                        <td>{{ $book->Category }}</td>
                        <td>{{ $book->Rack }}</td>
                        <td>{{ $book->Copies }}</td>
                        <td>{{ $book->Price }}</td>
                        <td>
                            <button class="edit-button" onclick="showDialog('{{ $book->Book_Title }}','{{ $book->ISBN_No }}','{{ $book->Author }}','{{ $book->Publisher }}','{{ $book->Edition }}','{{ $book->Category }}','{{ $book->Rack }}','{{ $book->Copies }}','{{ $book->Price }}')">Edit</button>
                            <button class="delete-button" onclick="showDelete('{{ $book->ISBN_No }}')">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="dialog-overlay" id="dialog-overlay">
            <div class="dialog-box">
                <div class="book-form">
                    <h2>Edit Book</h2>
                    <form action="{{ route('edit-book') }}" method="post">
                        @csrf
                        <label for="edit_book_title">Book Title:</label>
                        <input type="text" id="edit_book_title" name="edit_book_title" required>

                        <label for='edit_ISBN'>ISBN no.</label>
                        <input type="text" id="edit_ISBN" name="edit_ISBN" required>

                        <label for="edit_author">Author:</label>
                        <input type="text" id="edit_author" name="edit_author" required>

                        <label for="edit_publisher">Publisher:</label>
                        <input type="text" id="edit_publisher" name="edit_publisher" required>

                        <label for="edit_edition">Edition:</label>
                        <input type="text" id="edit_edition" name="edit_edition" required>
                        
                        <div class="category-container">
                            <span class="category-label">Category:</span><br>
                            <div class="category-options">
                                <div class="category-option">
                                    <input type="radio" name="edit_category" value="Comics"> Comics
                                </div>
                                <div class="category-option">
                                    <input type="radio" name="edit_category" value="Fiction"> Fiction
                                </div>
                                <div class="category-option">
                                    <input type="radio" name="edit_category" value="History"> History
                                </div>
                                <div class="category-option">
                                    <input type="radio" name="edit_category" value="Classic"> Classic
                                </div>
                                <div class="category-option">
                                    <input type="radio" name="edit_category" value="Romance"> Romance
                                </div>
                                <div class="category-option">
                                    <input type="radio" name="edit_category" value="Horror"> Horror
                                </div>
                                <div class="category-option">
                                    <input type="radio" name="edit_category" value="Fantasy Fiction"> Fantasy Fiction
                                </div>
                            </div>
                        </div>

                        <label>Rack:</label>
                        <select name="edit_rack" id="edit_rack">
                            <option value="">Select the rack</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>

                        <label for="edit_copies">Total No of Copy</label>
                        <input type="number" id="edit_copies" name="edit_copies">

                        <label for="edit_price">Price:</label>
                        <input  type="number" id="edit_price" name="edit_price">
                    
                        <button type="submit" id="save-button">Save</button>
                        <button type="button" id="cancel-button" onclick="hideDialog()">Cancel</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="dialog-overlay" id="dialog-delete">
            <div class="dialog-box">
                <h3>Are you want to delete this???</h3>
                <form id='delete-book' method="post" action="{{ route('delete-book') }}">
                @csrf
                    <label for="delete_ISBN">ISBN No.</label>
                    <input type="text" name="delete_ISBN" id="delete_ISBN"><br>

                    <button type="submit">YES</button>
                    <button type="button" id="cancel-button" onclick="hideDialog()">NO</button>
                </form>
            </div>
        </div>

        <div class="footer">
            &copy; 2023 Book Inventory
        </div>

        <script>
            const dialogOverlay = document.getElementById('dialog-overlay');
            const dialogDelete = document.getElementById('dialog-delete');
            const bookForm = document.getElementById('book-form');
            const saveButton = document.getElementById('save-button');
            const cancelButton = document.getElementById('cancel-button');

            function showDialog(title, ISBN, author, publisher, edition, category, rack, copies, price) {
                dialogOverlay.style.display = 'flex';
                edit_book_title.value = title;
                edit_ISBN.value = ISBN;
                edit_author.value = author;
                edit_publisher.value = publisher;
                edit_edition.value = edition;
                edit_copies.value = copies;
                edit_price.value = price;
            }

            function showDelete(ISBN){
                dialogDelete.style.display = 'block';
                delete_ISBN.value = ISBN;
            }

            function hideDialog() {
                dialogOverlay.style.display = 'none';
                dialogDelete.style.display = 'none';
            }
        </script>
    </body>
</html>