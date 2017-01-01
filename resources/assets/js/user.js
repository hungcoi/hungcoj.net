$(document).ready(function() {
    if ($('#user-management').length) {
        $('.change-status').click(function() {
            var userId = $(this).data('user-id');
            var status = $(this).data('status');
            var userName = $(this).data('user-name');
            if (!status) {
                $.ajax({
                    type: 'POST',
                    url: '/users/change-status',
                    data: {userId: userId},
                    success: function (response) {
                        if (response['status']) {
                            $('#user-status-' + userId).removeClass('change-status');
                            $('#user-status-' + userId).removeClass('btn-default').addClass('btn-success');
                            $('#user-status-' + userId).data('status', response['status']).html(response['button-text']);
                            toastrMessage('success', '', userName + ': ' + response['message']);
                        } else {
                            toastrMessage('error', '', userName + ': ' + response['message']);
                        }
                    },
                    error: function (e) {
                        toastrMessage('error', '', userName + ': ' + translations['changeStatusError']);
                    }
                });
            }
        });
    }
});
