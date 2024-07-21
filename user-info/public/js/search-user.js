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
                        userHtml += '<div class="user-card">';
                        userHtml += '<div class="user-name">' + user.name + '</div>';
                        userHtml += '<div class="user-title">' + (user.designation ? user.designation.name : 'No designation') + '</div>';
                        userHtml += '<div class="user-department">' + (user.department ? user.department.name : 'No department') + '</div>';
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