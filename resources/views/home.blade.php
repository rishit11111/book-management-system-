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

/* Style the search form */
form {
    text-align: center;
    margin-bottom: 20px;
}

input[type="search"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

/* Style the book list */
.book-list {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.book {
    background-color: #fff;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    width: calc(33.33% - 20px);
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
                <li><a href="#">Home</a></li>
                <li><a href="{{route('manage')}}">Manage</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
        <h1>Book Inventory</h1>
    </div>
    <div class="container">
    <form action="{{ route('search-book') }}" method="GET">
        <input type="search" placeholder="Search the book" name="search_book" id="search_book" onkeydown="return searchOnEnter(event)">
    </form>
        <div class="book-list">
            @foreach($books as $book)
                <div class="book">
                    <h2>{{$book->Book_Title}}</h2>
                    <p>Author:{{$book->Author}}</p>
                    <p>ISBN: {{$book->ISBN_No}}</p>
                    <p>Publisher: {{$book->Publisher}}</p>
                    <p>Edition: {{$book->Edition}}</p>
                    <p>Category: {{$book->Category}}</p>
                    <p>Rack: {{$book->Rack}}</p>
                    <p>Copies: {{$book->Copies}}</p>
                    <p>Price: {{$book->Price}}</p>
                </div>
            @endforeach
        </div>
    </div>
    <div class="footer">
        &copy; 2023 Book Inventory
    </div>
</body>
<script>
    function searchOnEnter(event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            document.forms[0].submit();
        }
    }
</script>
</html>
