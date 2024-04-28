<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css" rel="stylesheet">

<div id="index" style="margin-left: 20px; margin-top: 7%;  overflow-y: auto; overflow-x: hidden; height: 90%; width: 100%">
    <table id="operations" class="table table-striped" style="width:100%;">
        <thead>
            <tr>
                <th>Operation</th>
                <th>Cost</th>
                <th>Operation Response</th>
                <th>Requested At</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($params['user_operations'] as $userOperation) {
                    $date = new DateTime($userOperation['created_at']);
                    $formattedDate = $date->format('Y-m-d H:i:s');
                    echo '<tr>';
                    echo '<td>' . $params['operation_names'][$userOperation['operation_id']] . '</td>';
                    echo '<td>' . $userOperation['amount'] . '</td>';
                    echo '<td>' . $userOperation['operation_response'] . '</td>';
                    echo '<td>' . $formattedDate . '</td>';
                    echo '</tr>';
                }
            ?>
        </tbody>
    </table>
</div>

<script>
  new DataTable('#operations');
</script>