<div class="modal-header">
    <div class="col row justify-content-center align-items-center">
        <h4 class="modal-title" id="modal_title"><i class="feather icon-hash"></i> Transaction Details</h4>
    </div>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="form-body mx-2">
        <div class="table-responsive">
            <table class="table modal-zero-configuration">
                <thead>
                <tr>
                    <th>Item</th>
                    <th>Detail</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Gift Card</td>
                    <td>
                        {{@$transaction['product']['title']}}
                    </td>
                </tr>
                <tr>
                    <td>Transaction Id</td>
                    <td>
                        {{@$transaction['response']['transactionId']}}
                    </td>
                </tr>
                <tr>
                    <td>Timestamp</td>
                    <td>{{ \Carbon\Carbon::parse(@$transaction['response']['timeStamp'])->format('Y-m-d H:i') }}</td>
                </tr>
                @if((\Illuminate\Support\Facades\Auth::user()['user_role']['id'] == 2) || (\Illuminate\Support\Facades\Auth::user()['user_role']['id'] == 3))
                    <tr>
                        <td>Redeem instruction</td>
                        <td>{{ @$transaction['product']['redeem_instruction']['verbose'] ?? ($transaction['product']['redeem_instruction']['concise'] ?? 'No Instructions Found') }}</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $('.modal-zero-configuration').DataTable({
        "paging":   false,
        "ordering": false,
        "info":     false,
        "searching":     false
    });
</script>
