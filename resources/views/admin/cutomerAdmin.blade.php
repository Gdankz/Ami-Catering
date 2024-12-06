<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ami Catering</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .fade {
            transition: opacity 0.5s ease-in-out; /* Menambahkan transisi untuk opacity */
            opacity: 1;
        }
        .fade-out {
            opacity: 0; /* Opacity 0 untuk efek menghilang */
        }
        body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 10px 20px;
  background-color: #f8f8f8;
}

header .logo {
  font-size: 24px;
  font-weight: bold;
  font-style: italic;
}

nav a {
  margin: 0 10px;
  text-decoration: none;
  color: #000;
}

nav a:hover {
  text-decoration: underline;
}

.profile-pic img {
  width: 40px;
  height: 40px;
  border-radius: 50%;
}

.search-bar {
  text-align: center;
  margin: 20px 0;
}

.search-bar input {
    width: 300px;
  padding: 10px 20px; /* Tambahkan padding horizontal untuk efek lonjong */
  border: 1px solid #ccc;
  border-radius: 25px; /* Gunakan border-radius tinggi untuk membuat bentuk lonjong */
  outline: none;
  font-size: 14px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Opsional: Tambahkan bayangan untuk efek visual */
}

table {
  width: 90%;
  margin: 0 auto;
  border-collapse: collapse;
  border: 1px solid #000;
}

table th, table td {
  border: 1px solid #000;
  text-align: left;
  padding: 10px;
}

table th {
  background-color: #f4f4f4;
}

    </style>
</head>

<body class="bg-[#FFFFFF] min-h-screen flex flex-col">
    <!-- Memanggil navbar -->
    @include('partials.navBarAdmin')

  
    <main>
        <div class="search-bar">
          <input type="text" placeholder="Search">
        </div>
        <table>
          <thead>
            <tr>
              <th>Customer ID</th>
              <th>Name</th>
              <th>Address</th>
              <th>Phone Number</th>
            </tr>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
              </tr>
              <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
              </tr>
              <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
              </tr>
              <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
              </tr>
          </thead>
          <tbody>
            <!-- Add rows here -->
          </tbody>
        </table>
      </main>
    </body>
    </html>