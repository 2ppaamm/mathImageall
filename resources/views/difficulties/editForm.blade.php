 <tr id="newForm" style='display: none'>
    <td></td>
    <td><a href='#' class='newRow required' data-type='text' id='difficulty' data-route='/difficulties/' data-original-title='Enter new difficulty name'></a></td>
     <td><a href='#' class='newRow' data-type='textarea' id='description' data-route='/difficulties/' data-original-title='Enter new difficulty description'></a></td>
     <td><a href='#' class='newRow' data-type='textarea' id='short_description' data-route='/difficulties/' data-original-title='Enter new short difficulty description'></a></td>
    <td>{{ $user }}</td>
    <td>
        <div class='btn-group-vertical' role='group' aria-label=''>
            <div class='btn-group' role='group'>
                <button id='status_id' class='newRow status btn-min btn btn-info' data-type='select' style='display: none' data-original-title='Status?'>Only Me</button>
                <button id='save-btn'class='btn btn-primary'>Create Difficulty</button>
                <button id='reset-btn' class='newRow btn btn-default'>Reset</button>
                <button id='copy-btn' type='button' class='newRow btn-copy btn btn-warning btn-min' style='display: none'>Copy</button>
            </div>
        </div>
    </td>
</tr>