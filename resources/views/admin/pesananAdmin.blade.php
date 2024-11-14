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
        table {
    width: 90%;
    border-collapse: collapse;
    margin-top: 20px;
    font-family: Arial, sans-serif;
  }
  th, td {
    padding: 10px;
    text-align: left;
    border: 1px solid #ddd;
  }
  th {
    background-color: #f2f2f2;
    font-weight: bold;
  }
    </style>
</head>

<body class="bg-[#FFFFFF] min-h-screen flex flex-col">
    <!-- Memanggil navbar -->
    @include('partials.navBarAdmin')
<!-- Search Bar -->
<div class="flex justify-center mb-6">
    <input type="text" placeholder="Search" class="w-1/2 border rounded-full px-4 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-500 text-center">
</div>

<div class="flex justify-center">
    <table>
      <tr>
        <th>Order ID</th>
        <th>Name</th>
        <th>Menu Name</th>
        <th>Delivery Date</th>
        <th>Detail</th>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <!-- Tambahkan baris lainnya sesuai kebutuhan -->
    </table>
    
</div>
    </body>
    </html>