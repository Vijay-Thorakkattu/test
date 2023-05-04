<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> --}}
        <style>
           body {
            background-color: #6c757d !important;
            }
        </style>

    </head>
    <body >
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            <div class="container bg-gray-100">
                <div class="row justify-content-center mt-1">
                  <div class="col-md-12">
                      <div class="card-body">
                        <div class="d-flex justify-content-between">
                          <h6 class="card-title">Search</h6>
                        </div>
                          <div class="input-group">
                            <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                              aria-describedby="search-addon" id="search-input" onkeyup="search(this.value)" />
                          </div>
                      </div>
                  </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="row mt-5" id="search-results-container">
                            <div class="row">
                                @foreach($users as $user)
                                  <div class="col-md-6">
                                    <div class="card mb-3">
                                      <div class="card-body">
                                        <h5 class="card-title"><b>{{ $user->name }}</b></h5>
                                        <p class="card-text"><b>{{ $user->department_name }}</b></p>
                                        <p class="card-text">{{ $user->designation_name }}</p>
                                        <p class="card-text">{{ $user->phone_number }}</p>
                                      </div>
                                    </div>
                                  </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
              
        </div>
    </body>
</html>


<script>
$(document).ready(function() {
    $('#search-input').on('keyup', function() {
        var query = $(this).val();
        
        $.ajax({
            url: "{{ route('search') }}",
            method: 'GET',
            data: {
                query: query
            },
            success: function(response) {
                $('#search-results-container').html(response.searchResults);
            }
        });
    });
});
</script>