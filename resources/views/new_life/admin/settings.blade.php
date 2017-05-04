<div class="box-typical box-typical-padding">
        <h1>Настройки</h1>
    {!! Form::open(["url" => route('settings.update'), 'method' => "POST", "id" => "settingUpdate"]) !!}
    <div class="col-md-6">
        <div class="form-group">
            <label for="login">Объектов на странице</label>
            {!! Form::text('pagination', $settings["pagination"], ['id'=>'pagination', "class" => "form-control", "required" => ""]) !!}
        </div>
            <input type="hidden" name="_method" value="PUT">
            {!! Form::button('Сохранить', ['class' => 'btn btn-success','type'=>'submit']) !!}
    </div>
    {!! Form::close() !!}
</div>