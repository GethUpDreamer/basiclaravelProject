<!DOCTYPE html> 
<html>   
<head>     
    <meta charset="utf-8">     
    <meta http-equiv="X-UA-Compatible" content="IE=edge">     
    <title>Dark Bootstrap Admin</title>     
    <meta name="description" content="">     
    <meta name="viewport" content="width=device-width, initial-scale=1">     
    <meta name="robots" content="all,follow">     
    <!-- Bootstrap CSS-->
    @include('admin.css') 

    <style>
/* General Styles */
body {
    font-family: 'Poppins', sans-serif; /* Modern and clean font */
    background-color: #f7f7f7; /* Light background for better contrast */
}

h3 {
    font-size: 1.8rem;
    font-weight: bold;
    color: #333; /* Strong, dark color for headings */
}

.table {
    width: 100%;
    margin: 20px 0;
    border-radius: 8px; /* Rounded corners for the table */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
    background-color: #fff; /* White table background */
    color: #333; /* Text color */
}

.table thead th {
    background-color: #007bff; /* Primary blue for header */
    color: #fff; /* White text for header */
    font-size: 1.2rem;
    text-align: center;
}

.table tbody tr:hover {
    background-color: #f0f0f0; /* Light hover effect on rows */
}

.table-bordered {
    border: 1px solid #dee2e6; /* Subtle border */
    border-radius: 8px; /* Apply border radius to the table */
}

.table td, .table th {
    padding: 12px; /* Comfortable padding for table cells */
    vertical-align: middle;
    text-align: center;
}

.card-body {
    background-color: #fff;
    border-radius: 12px; /* More rounded card corners */
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15); /* Deeper shadow for the card */
    padding: 20px;
    margin: 20px auto;
    max-width: 90%;
}

.container-fluid {
    padding: 20px;
}

.page-header {
    margin-bottom: 40px;
}

/* Footer */
footer {
    text-align: center;
    padding: 10px;
    font-size: 0.9rem;
    color: #666;
}

/* Responsive Design */
@media (max-width: 768px) {
    .table thead {
        display: none;
    }
    .table tbody tr {
        display: block;
        margin-bottom: 20px;
    }
    .table tbody tr td {
        display: block;
        text-align: right;
        padding-left: 50%;
        position: relative;
    }
    .table tbody tr td:before {
        content: attr(data-label);
        position: absolute;
        left: 10px;
        top: 10px;
        font-weight: bold;
        text-align: left;
    }
}


    </style>
</head>   
<body>     
    @include('admin.header')     
    <div class="d-flex align-items-stretch">       
        <!-- Sidebar Navigation-->       
        @include('admin.sidebar')       
        <div class="page-content">         
            <div class="page-header">           
                <div class="container-fluid">             
                    <div class="card-body">             
                        <h3>All Messages</h3>         
                        <table class="table table-dark table-bordered table-box-shadow">                         
                            <thead>                             
                                <tr>  
                                    <th>Id</th>                       
                                    <th>Name</th>                                 
                                    <th>Email</th>                                 
                                    <th>Phone</th>                                 
                                    <th>Message</th>                             
                                    <th>Send Email</th>                             
                                </tr>                         
                            </thead>                         
                            <tbody>                                                       
                                @foreach($contact as $contact)                                 
                                <tr>  
                                    <td>{{$contact->id}}</td>                             
                                    <td>{{$contact->name}}</td>                                     
                                    <td>{{$contact->email}}</td>                                     
                                    <td>{{$contact->phone}}</td>                                     
                                    <td>{{$contact->message}}</td>       
                                    <td>
                                      <a class="btn btn-success" href="{{url('send_mail',$contact->id)}}">  send email</a>
                                    </td>       

                                </tr>                             
                                @endforeach                         
                            </tbody>                     
                        </table>   
                        {{-- <div class="pagination justify-content-center">
                            {{ $contact->links() }} <!-- This generates the pagination links -->
                        </div>                       --}}
                    </div>         
                </div>       
            </div>     
        </div>          
    @include('admin.footer')   
</body> 
</html>
