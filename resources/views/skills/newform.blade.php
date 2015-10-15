 <tr id="newForm" style='display: none'>
    <td></td>
    <td><a href='#' class='newRow required' data-type='text' id='skill' data-route='/skills/' data-original-title='Enter new skill name'></a></td>
     <td><a href='#' class='newRow' data-type='textarea' id='description' data-route='/skills/' data-original-title='Enter new skill description'></a></td>
     <td><a href='#' class='newRow' data-type='textarea' id='short_description' data-route='/skills/' data-original-title='Enter new short skill description'></a></td>
     <td>
         <a href="#" id='track_id' class="newRow editable-click selection" data-value="1" style="display: none"></a>
         {!! Form::select('track_id', $tracks, null,['data-url'=>'/skills/','class'=>'selection-new form-control']) !!}
     </td>
     <td>
         <a href="#" id='level_id' class="newRow editable-click selection" data-value="1" style="display: none"></a>
     {!! Form::select('level_id', $levels, null,['data-url'=>'/skills/','class'=>'selection-new form-control']) !!}
     <td>{{ $user->firstname }}</td>
    <td>
        <div class='btn-group-vertical' role='group' aria-label=''>
            <div class='btn-group' role='group'>
                <button id='status_id' class='newRow status btn-min btn btn-info' data-type='select' style='display: none' data-original-title='Status?'>Only Me</button>
                <button id='save-btn'class='btn btn-primary'>Create Skill</button>
                <button id='reset-btn' class='newRow btn btn-default'>Reset</button>
                <button id='copy-btn' type='button' class='newRow btn-copy btn btn-warning btn-min' style='display: none'>Copy</button>
            </div>
        </div>
    </td>
</tr>