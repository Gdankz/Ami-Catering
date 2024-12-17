<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ami Catering</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .fade {
            transition: opacity 0.5s ease-in-out;
            opacity: 1;
        }

        .fade-out {
            opacity: 0;
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
        <div class="flex justify-center mb-6">
            <input type="text" placeholder="Search" class="w-1/2 border rounded-full px-4 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-500 text-center">
        </div>
        <table>
            <thead>
                <tr>
                    <th>Customer ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($customers as $customer)
                    <tr>
                        <td>{{ $customer->id }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>{{ $customer->phone_number }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No customers found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </main>
</body>

</html>
