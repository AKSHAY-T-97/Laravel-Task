<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'LILAC')</title>
    <link rel="stylesheet" href="{{ asset('css/search-theme.css') }}">
</head>
<body>
    <div class="search-container">
        <h4>Search</h4>
        <input type="text" class="search-box" placeholder="Search name / designation / department">
        <div class="user-list">
            @yield('user-list')
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      $(document).ready(function() {
    $('.search-box').on('keyup', function() {
        var searchQuery = $(this).val();

        $.ajax({
            url: '{{ route("search-user") }}',
            method: 'GET',
            data: {
                search: searchQuery
            },
            dataType: 'json',
            success: function(response) {
                var userHtml = '';
                if (Array.isArray(response)) {
                    $.each(response, function(index, user) {
                        userHtml += '<div class="user-card mt-1">';
                        userHtml += '<div class="user-name mt-1">' + user.name + '</div>';
                        userHtml += '<div class="user-title  mt-1">' + (user.designation ? user.designation.name : 'No designation') + '</div>';
                        userHtml += '<div class="user-department mt-1">' + (user.department ? user.department.name : 'No department') + '</div>';
                        userHtml += '</div>';
                    });
                } else {
                    userHtml = '<p>No users found.</p>';
                }
                $('.user-list').html(userHtml);
            },
            error: function(xhr) {
                console.error('An error occurred:', xhr);
            }
        });
    });
});
    </script>
</body>
</html>