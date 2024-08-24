
<style>
    .get-data{
        display: none !important;
    }
    .clear-all{
        display: none !important;
    }
    .save-template{
        display: none !important;
    }
</style>

<form action="{{url('admin/template/builder')}}"method="post">
    {{csrf_field()}}
    <input type="hidden" name="form_data" id="formbuilder">
    <input type="hidden" name="template_slug" value="{{$slug}}">
    <div id="fb-editor"></div>

    <br>
    <button type="submit" class="btn btn-primary">Save Form</button>
</form>


<script>jQuery(function($) {
        var $fbEditor = document.getElementById("fb-editor");
        var formBuilder = $($fbEditor).formBuilder();

        document.addEventListener("fieldAdded", function(){
            $("#formbuilder").val(formBuilder.formData);
        });

    });
</script>
