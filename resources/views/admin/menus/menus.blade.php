@extends('admin.layouts.app')

@section('content')
<div class="dashboard-panel">
<div class="role-management setting-menu">
<div class="content">
<div class="pull-left"><h2>Menu</h2></div>
<div class="container-fluid">
<div class="row">
		@if (session('status'))
		<div class="col-md-12">
            <h6 class="alert alert-success">{{ session('status') }}</h6>
        </div>
        @endif
                    <div class="pull-right">
                        <button id="btnOutput" type="button" class="view-btn">Save Changes</button>
                        <a href="{{ route('admin.home') }}" class="view-btn">Cancel</a>
                    </div>


                    
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="edit-item-menu">
                        <div class="card-header">Add/Edit</div>
                        <div class="form-setting">
                            <form id="frmEdit" class="form-horizontal">
                                <div class="form-label-group">
                                    <label for="text">Text</label>
                                    <div class="input-group">
                                        <input required="required" type="text" class="form-control item-menu" name="text" id="text" placeholder="Text">
                                        <div class="input-group-append">
                                            <button type="button" id="myEditor_icon" class="btn btn-outline-secondary"></button>
                                        </div>
                                    </div>
                                    <input type="hidden" name="icon" class="item-menu">
                                </div>
                                <div class="form-label-group">
                                    <label for="href">URL</label>
                                    <input required="required" type="text" class="form-control item-menu" id="href" name="href" placeholder="URL">
                                </div>
                                <div class="form-label-group">
                                    <label for="target">Target</label>
                                    <select name="target" id="target" class="form-control item-menu">
                                        <option value="_self">Self</option>
                                        <option value="_blank">Blank</option>
                                        <option value="_top">Top</option>
                                    </select>
                                </div>
                                <div class="form-label-group">
                                    <label for="title">Tooltip</label>
                                    <input type="text" name="title" class="form-control item-menu" id="title" placeholder="Tooltip">
                                </div>
                            </form>
                            <div class="card-footer">
                            <button type="button" id="btnUpdate" class="view-btn" disabled>Update</button>
                            <button type="button" id="btnAdd" class="view-btn">Add</button>
                        </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-4 mt">
                    <div class="edit-menuadd">
                        <ul id="myEditor" class="sortableLists list-group"></ul>
                    </div>
                </div>

        </div>
            <form action="{{url('admin/menus/save')}}" id="menu_form" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="out" id="out" value="">

            </form>
</div>
</div>
</div>
</div>
@endsection

@section('custom_js_scripts')
    <script src="{{ asset('admin/js/jquery-menu-editor.js')}}"></script>
	<script src="{{ asset('admin/js/iconset/fontawesome5-3-1.min.js')}}"></script>
	<script src="{{ asset('admin/js/bootstrap-iconpicker.min.js')}}"></script>

	<script>
	    $(document).ready(function () {
	      /* =============== DEMO =============== */
	      // menu items
	     
          var arrayjson = {!! $data !!};
	      // icon picker options
	      var iconPickerOptions = {searchText: "Buscar...", labelHeader: "{0}/{1}"};
	      // sortable list options
	      var sortableListOptions = {
	          placeholderCss: {'background-color': "#cccccc"}
	      };

	      var editor = new MenuEditor('myEditor', {listOptions: sortableListOptions, iconPicker: iconPickerOptions});
	      editor.setForm($('#frmEdit'));
	      editor.setUpdateButton($('#btnUpdate'));
	      //$('#btnReload').on('click', function () {
	          editor.setData(arrayjson);
	      //});

	      $('#btnOutput').on('click', function () {
	          var str = editor.getString();
	          $("#out").val(str);
	          //setTimeout(function () {
                 $('#menu_form').submit();
              // }, 2500);

	      });

            $("#btnUpdate").click(function(){
                $('.text-error').html('');
                $('.url-error').html('');
                if($('#text').val() == '' ){
                    $('#text').parent('.input-group').after('<lable class="text-error" style="color:red;">Text field is required</label>');
                    return false;
                }else if($('#href').val() == ''){
                    $('#href').after('<lable class="url-error" style="color:red;">URL field is required</label>');
                    return false;
                }else{
                    editor.update();
                }
            });

            $('#btnAdd').click(function(){
                $('.text-error').html('');
                $('.url-error').html('');
                if($('#text').val() == '' ){
                    $('#text').parent('.input-group').after('<lable class="text-error" style="color:red;">Text field is required</label>');
                    return false;
                }else if($('#href').val() == ''){
                    $('#href').after('<lable class="url-error" style="color:red;">URL field is required</label>');
                    return false;
                }else{
                    editor.add();
                }
            });
	      /* ====================================== */

	      /** PAGE ELEMENTS **/
	      $('[data-toggle="tooltip"]').tooltip();
	      $.getJSON( "https://api.github.com/repos/davicotico/jQuery-Menu-Editor", function( data ) {
	          $('#btnStars').html(data.stargazers_count);
	          $('#btnForks').html(data.forks_count);
	      });
	  });
	</script>
@stop
