
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


<ul class="nav nav-tabs" id="myTab" role="tablist">
    @foreach($templateDetails->layouts as $key => $layoutItem)
        @if($loop->first)
            <li class="nav-item-active" role="presentation">
                <button class="nav-link" id="{{$key}}-tab" data-bs-toggle="tab" data-bs-target="#{{$key}}" type="button" role="tab" aria-controls="{{$key}}" aria-selected="true">{{$layoutItem['name']}}</button>
            </li>
        @else
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="{{$key}}-tab" data-bs-toggle="tab" data-bs-target="#{{$key}}" type="button" role="tab" aria-controls="{{$key}}" aria-selected="true">{{$layoutItem['name']}}</button>
            </li>
        @endif

    @endforeach
</ul>

<form action="{{url('admin/template/builder')}}" method="post">
    <div class="tab-content" id="myTabContent">

        {{csrf_field()}}
        <input type="hidden" name="template_slug" value="{{$templateDetails->slug}}">

    @foreach($templateDetails->layouts as $key => $layoutItem)
            @if($loop->first)
                <div class="tab-pane fade show active" id="{{$key}}" role="tabpanel" aria-labelledby="{{$key}}-tab">

                        <input type="hidden" name="{{$key}}_form_data" id="{{$key}}_form_data">
                        <div id="{{$key}}-editor"></div>
                    <script>
                        jQuery(function($) {
                            var {{$key}}fbEditor = document.getElementById("{{$key}}-editor");
                            var {{$key}}options = {
                                disableFields: ['header','select','number','date','radio-group','checkbox-group' , 'paragraph','button','file','hidden','autocomplete'],
                            };
                            var {{$key}}formBuilder = $({{$key}}fbEditor).formBuilder({{$key}}options);
                            document.addEventListener("fieldAdded", function(){
                                $("#{{$key}}_form_data").val({{$key}}formBuilder.formData);
                            });
                            setTimeout(() => {
                                {{$key}}formBuilder.actions.setData('{!! $layoutItem['form_data'] !!}');
                                $("#{{$key}}_form_data").val({{$key}}formBuilder.formData);
                            },1000);
                        });
                    </script>
                </div>
            @else
                <div class="tab-pane fade show" id="{{$key}}" role="tabpanel" aria-labelledby="{{$key}}-tab">
                        <input type="hidden" name="{{$key}}_form_data" id="{{$key}}_form_data">
                        <div id="{{$key}}-editor"></div>
                    <script>
                        jQuery(function($) {
                            var {{$key}}fbEditor = document.getElementById("{{$key}}-editor");
                            var {{$key}}options = {
                                disableFields: ['header','select','number','date','radio-group','checkbox-group' , 'paragraph','button','file','hidden','autocomplete'],
                            };
                            var {{$key}}formBuilder = $({{$key}}fbEditor).formBuilder({{$key}}options);
                            document.addEventListener("fieldAdded", function(){
                                $("#{{$key}}_form_data").val({{$key}}formBuilder.formData);
                            });
                            setTimeout(() => {
                                {{$key}}formBuilder.actions.setData('{!!  $layoutItem['form_data']  !!}');
                                $("#{{$key}}_form_data").val({{$key}}formBuilder.formData);
                            },2000);
                        });
                    </script>


                </div>
            @endif
        @endforeach
            <button type="submit" class="btn btn-primary">Save Form</button>
    </div>
</form>





