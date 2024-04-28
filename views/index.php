<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css" rel="stylesheet">

<div id="index" style="margin-left: 20px; margin-top: 10%;  overflow-y: auto; overflow-x: hidden; height: 90%; width: 100%">

    <?php
        if (!empty($params['error_message'])) {
            echo '<p id="error_message" style="text-align: center; color:#F00; font-weight: bold;">' . $params['error_message'] . '</p>';
        }
    ?>

    <table id="operations" class="table table-striped" style="width:100%;">
        <thead>
            <tr>
                <th>Operation</th>
                <th>Cost</th>
                <th>Operation Response</th>
                <th>Requested At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($params['user_operations'] as $userOperation) {
                    $date = new DateTime($userOperation['created_at']);
                    $formattedDate = $date->format('Y-m-d H:i:s');
                    $operationResponse = $userOperation['operation_response'];
                    $operationId = $userOperation['id'];
                    if (strpos($operationResponse, '"') !== false) {
                        $operationResponse = json_decode($operationResponse);
                        $operationResponse = str_replace("\n", '<br/>', $operationResponse) ;
                    }
                    echo '<tr>';
                    echo '<td>' . $params['operation_names'][$userOperation['operation_id']] . '</td>';
                    echo '<td>' . $userOperation['amount'] . '</td>';
                    echo '<td>' . $operationResponse . '</td>';
                    echo '<td>' . $formattedDate . '</td>';
                    echo "<td><a class='btn btn-danger delete-btn' onClick='confirmDelete();' href='/dashboard/deleteUSerOperation?id=$operationId'>delete</a></td>";
                    echo '</tr>';
                }
            ?>
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        $('#operations').DataTable({
            columnDefs: [
                {
                    targets: [4],
                    orderable: false
                }
            ]
        });
    });

    function confirmDelete() {
    let confirmDelete = confirm('Confirm delete operation?');
    if (confirmDelete) {
        return true;
    }

    event.preventDefault();
    }
</script>